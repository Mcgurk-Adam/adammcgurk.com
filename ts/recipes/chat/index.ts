const OPEN_AI_KEY_STORAGE_CONST = "open-ai-key";
const chatMessageContainer = document.getElementById("mobile-chat-messages");
const topLevelMobileChatMessageContainer = document.getElementById("mobile-chat-message-container");
const desktopRecipeAiButton = document.getElementById("desktop-recipe-ai-button");
const desktopAiChatbot = document.getElementById("desktop-ai-chatbot") as HTMLDialogElement;

function scrollMobileChatWindow() {
    chatMessageContainer.scrollTop = chatMessageContainer.scrollHeight;
    topLevelMobileChatMessageContainer.scrollTop = topLevelMobileChatMessageContainer.scrollHeight;
}
desktopRecipeAiButton.addEventListener("click", () => {
    const apiKey = localStorage.getItem(OPEN_AI_KEY_STORAGE_CONST);
    if (!apiKey || apiKey.length === 0) {
        //
        return;
    }
    desktopAiChatbot.show();
});
document.addEventListener("keydown", (ev: KeyboardEvent) => {
    if (ev.key === "Escape" && desktopAiChatbot.open) {
        desktopAiChatbot.close();
        return;
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
    });
    scrollMobileChatWindow();
});

const useOwnApiKeyForm = document.getElementById("own-api-key-form") as HTMLFormElement;
useOwnApiKeyForm.addEventListener("submit", (ev: SubmitEvent) => {
    ev.preventDefault();
    try {
        const apiKey = (document.getElementById("open-ai-api-key") as HTMLInputElement).value;
        localStorage.setItem(OPEN_AI_KEY_STORAGE_CONST, apiKey);
        const mobileRecipeBodies = document.querySelectorAll('.mobile-recipe-body');
        mobileRecipeBodies.forEach(body => body.classList.remove('active'));
        document.querySelector('#mobile-recipe-ai').classList.add('active');
        showToast("API key saved!");
    } catch (e) {
        console.log("something went wrong when trying to save the API key - ", e);
        showToast("Something went wrong.", "error");
    }
    return false;
});
const mobileChatForm = document.querySelector("form#recipe-ai-input-container");
const mobileChatButton = mobileChatForm.querySelector("button[type=submit]");
const loadingSlide = document.getElementById("loading-slide");
mobileChatForm.addEventListener("submit", async (ev: SubmitEvent) => {
    ev.preventDefault();
    const rawQuestionElement = mobileChatForm.querySelector(`[name="chat-message"]`) as HTMLTextAreaElement;
    const rawQuestion = rawQuestionElement.value.trim();
    if (!rawQuestion || rawQuestion.length === 0) {
        return false;
    }
    mobileChatButton.setAttribute("disabled", "true");
    loadingSlide.classList.add("visible");
    rawQuestionElement.value = "";
    let messageReturned: string;
    chatMessageContainer.appendChild(createChatMessageElement("user", rawQuestion));
    scrollMobileChatWindow();
    rawQuestionElement.blur();
    rawQuestionElement.style.height = "40px";
    try {
        messageReturned = await sendQuestionToServer(rawQuestion);
    } catch (e) {
        console.log("something went wrong when trying to send the question to the server - ", e);
        showToast("Something went wrong.", "error");
        mobileChatButton.removeAttribute("disabled");
        loadingSlide.classList.remove("visible");
        return false;
    }
    chatMessageContainer.appendChild(createChatMessageElement("assistant", messageReturned, true));
    scrollMobileChatWindow();
    mobileChatButton.removeAttribute("disabled");
    loadingSlide.classList.remove("visible");
    return false;
});

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
    const rawIngredients = window.RECIPE.ingredients;
    if (typeof rawIngredients[0] === "string") {
        return rawIngredients.join("|");
    }
    let fullIngredientString = "";
    rawIngredients.forEach((ingredientObject:{sectionTitle:string, sectionIngredients: string[]}) => {
        fullIngredientString += `${ingredientObject.sectionTitle.toUpperCase()}: ${ingredientObject.sectionIngredients.join("|")} `;
    });
    return fullIngredientString;
}