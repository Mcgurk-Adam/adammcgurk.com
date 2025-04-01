const OPEN_AI_KEY_STORAGE_CONST = "open-ai-key";
const chatMessageContainer = document.getElementById("mobile-chat-messages");
const desktopAiChatbot = document.getElementById("desktop-ai-chatbot") as HTMLDialogElement;
["#mobile-recipe-ai form", "#desktop-ai-chatbot form"].forEach((selector) => {
    document.querySelector(selector).addEventListener("submit", async (ev: Event) => await handleSubmittedForm(ev));
});
desktopAiChatbot.querySelector("textarea").addEventListener("keydown", (ev:KeyboardEvent) => {
    if (ev.key === "Enter") {
        ev.preventDefault();
        (desktopAiChatbot.querySelector("form button[type=submit]") as HTMLButtonElement).click();
    }
});

function scrollChatWindow() {
    const mobileChatMessageContainer = document.getElementById("mobile-chat-messages");
    mobileChatMessageContainer.scrollTop = mobileChatMessageContainer.scrollHeight;
    const topLevelMobileChatMessageContainer = document.getElementById("mobile-chat-message-container");
    topLevelMobileChatMessageContainer.scrollTop = topLevelMobileChatMessageContainer.scrollHeight;
    const desktopChatMessageContainer = document.getElementById("desktop-chat-messages");
    desktopChatMessageContainer.scrollTop = desktopChatMessageContainer.scrollHeight;
    const topLevelDesktopChatMessageContainer = document.getElementById("desktop-chat-message-container");
    topLevelDesktopChatMessageContainer.scrollTop = topLevelDesktopChatMessageContainer.scrollHeight;
}
document.getElementById("desktop-recipe-ai-button").addEventListener("click", () => {
    const apiKey = localStorage.getItem(OPEN_AI_KEY_STORAGE_CONST);
    if (!apiKey || apiKey.length === 0) {
        // need to do the no auth flow
        return;
    }
    desktopAiChatbot.show();
    scrollChatWindow();
});
document.addEventListener("keydown", (ev: KeyboardEvent) => {
    if (ev.key === "Escape") {
        if (document.activeElement.id === "desktop-chat-input") {
            (document.activeElement as HTMLElement).blur();
        } else if (desktopAiChatbot.open) {
            desktopAiChatbot.close();
        }
    }
    const cmdK = (ev.metaKey && ev.key === "k") || (ev.ctrlKey && ev.key === "k");
    if (cmdK && !desktopAiChatbot.open) {
        desktopAiChatbot.show();
        return;
    }
});
window.addEventListener("load", () => {
    const chatHistory = localStorage.getItem(`recipe-chat-${window.RECIPE.title}`);
    if (!chatHistory) {
        return;
    }
    const chatHistoryParsed = JSON.parse(chatHistory) as {role:"assistant"|"user", content: string}[];
    if (chatHistoryParsed.length === 0) {
        return;
    }
    chatHistoryParsed.forEach((message) => {
        chatMessageContainer.appendChild(createChatMessageElement(message.role, message.content, message.role === "assistant"));
        const desktopChatMessageContainer = document.getElementById("desktop-chat-messages");
        desktopChatMessageContainer.appendChild(createChatMessageElement(message.role, message.content, message.role === "assistant"));
    });
    scrollChatWindow();
});

const useOwnApiKeyForm = document.getElementById("own-api-key-form") as HTMLFormElement;
useOwnApiKeyForm.addEventListener("submit", (ev: Event) => {
    ev.preventDefault();
    try {
        const apiKey = (document.getElementById("open-ai-api-key") as HTMLInputElement).value;
        localStorage.setItem(OPEN_AI_KEY_STORAGE_CONST, apiKey);
        const mobileRecipeBodies = document.querySelectorAll('.mobile-recipe-body');
        mobileRecipeBodies.forEach(body => body.classList.remove('active'));
        document.querySelector('#mobile-recipe-ai').classList.add('active');
        // @ts-ignore does exist
        showToast("API key saved!");
    } catch (e) {
        console.log("something went wrong when trying to save the API key - ", e);
        // @ts-ignore does exist
        showToast("Something went wrong.", "error");
    }
    return false;
});

async function handleSubmittedForm(ev: Event) {
    ev.preventDefault();
    const currentSubmittingForm = ev.target as HTMLFormElement;
    const rawQuestionElement = currentSubmittingForm.querySelector("textarea") as HTMLTextAreaElement;
    const chatButton = currentSubmittingForm.querySelector("button[type=submit]") as HTMLButtonElement;
    const loadingSlide = currentSubmittingForm.parentElement.querySelector(".loading-slide") as HTMLElement;
    const rawQuestion = rawQuestionElement.value.trim();
    const chatMessageContainer = currentSubmittingForm.parentElement.id === "desktop-ai-chatbot" ? document.getElementById("desktop-chat-messages") : document.getElementById("mobile-chat-messages");
    if (!rawQuestion || rawQuestion.length === 0) {
        return false;
    }
    chatButton.setAttribute("disabled", "true");
    loadingSlide.classList.add("visible");
    rawQuestionElement.value = "";
    let messageReturned: string;
    chatMessageContainer.appendChild(createChatMessageElement("user", rawQuestion));
    scrollChatWindow();
    rawQuestionElement.blur();
    rawQuestionElement.classList.add("reset");
    if (rawQuestionElement.id === "chat-input") {
        rawQuestionElement.classList.remove("reset");
        rawQuestionElement.style.height = "auto";
        rawQuestionElement.style.height = (rawQuestionElement.scrollHeight) + "px";
    } else {
        rawQuestionElement.classList.add("reset");
    }
    try {
        messageReturned = await sendQuestionToServer(rawQuestion);
    } catch (e) {
        console.log("something went wrong when trying to send the question to the server - ", e);
        // @ts-ignore does exist
        showToast("Something went wrong.", "error");
        chatButton.removeAttribute("disabled");
        loadingSlide.classList.remove("visible");
        return false;
    }
    chatMessageContainer.appendChild(createChatMessageElement("assistant", messageReturned, true));
    scrollChatWindow();
    chatButton.removeAttribute("disabled");
    loadingSlide.classList.remove("visible");
    return false;
}

const sendQuestionToServer = async (question: string): Promise<string> => {
    const apiKey = localStorage.getItem(OPEN_AI_KEY_STORAGE_CONST);
    const recipeSteps: string[] = window.RECIPE.steps;
    const recipeName: string = window.RECIPE.title;
    const messagesAlreadyExisting = document.querySelectorAll("[data-message]:not(:last-child)");
    const history: {role:"assistant"|"user", content: string}[] = [];
    messagesAlreadyExisting.forEach((message: HTMLElement) => {
        const role = message.getAttribute("data-message") as "assistant"|"user";
        const content = message.innerText;
        history.push({role, content});
    });
    const fullRecipePartOfPrompt: string = `RECIPE NAME: ${recipeName} INGREDIENTS: ${getRecipeIngredients()} STEPS: ${recipeSteps.join("|")}`;
    const apiRequest = await fetch(window.AI_SERVER_URL, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "Authorization": apiKey,
        },
        body: JSON.stringify({
            question,
            recipeContext: fullRecipePartOfPrompt,
            history,
        }),
    });
    if (!apiRequest.ok) {
        if (apiRequest.status === 401 || apiRequest.status === 403) {
            localStorage.removeItem(OPEN_AI_KEY_STORAGE_CONST);
        }
        throw new Error("API request failed - status code is " + apiRequest.status + " and message is " + await apiRequest.text());
    }
    const response = await apiRequest.json();
    // @ts-ignore does exist
    const markdownConverter = new showdown.Converter();
    history.push({
        "role": "user",
        "content": question,
    });
    history.push({
        "role": "assistant",
        "content": markdownConverter.makeHtml(response.response),
    });
    localStorage.setItem(`recipe-chat-${recipeName}`, JSON.stringify(history));
    return markdownConverter.makeHtml(response.response);
};

function createChatMessageElement(role:"user"|"assistant", message: string, useHTML: boolean = false) {
    const messageContainer = document.createElement("div");
    messageContainer.classList.add(`${role}-message`);
    messageContainer.setAttribute("data-message", role);
    if (useHTML) {
        messageContainer.innerHTML = message;
        return messageContainer;
    }
    messageContainer.innerText = message;
    return messageContainer;
}

function getRecipeIngredients() {
    if (typeof window.RECIPE.ingredients[0] === "string") {
        return window.RECIPE.ingredients.join("|");
    }
    const rawIngredientSections = window.RECIPE.ingredients as RecipeSection[];
    let fullIngredientString = "";
    rawIngredientSections.forEach((ingredientObject: RecipeSection) => {
        fullIngredientString += `${ingredientObject.sectionTitle.toUpperCase()}: ${ingredientObject.sectionIngredients.join("|")} `;
    });
    return fullIngredientString;
}