const useOwnApiKeyForm = document.getElementById("own-api-key-form") as HTMLFormElement;
useOwnApiKeyForm.addEventListener("submit", (ev: SubmitEvent) => {
    ev.preventDefault();
    try {
        const apiKey = (document.getElementById("open-ai-api-key") as HTMLInputElement).value;
        localStorage.setItem("open-ai-key", apiKey);
        const mobileRecipeBodies = document.querySelectorAll('.mobile-recipe-body');
        mobileRecipeBodies.forEach(body => body.classList.remove('active'));
        document.querySelector('#mobile-recipe-ai').classList.add('active');
        showToast("API key saved!");
    } catch (e) {
        console.log("something went wrong when trying to save the API key - ", e);
        showToast("Something went wrong.", "error");
    }
});
const chatMessageContainer = document.getElementById("mobile-chat-messages");
const mobileChatForm = document.querySelector("form#recipe-ai-input-container");
const mobileChatButton = mobileChatForm.querySelector("button[type=submit]");
const loadingSlide = document.getElementById("loading-slide");
mobileChatForm.addEventListener("submit", async (ev: SubmitEvent) => {
    ev.preventDefault();
    const rawQuestionElement = mobileChatForm.querySelector(`[name="chat-message"]`) as HTMLTextAreaElement;
    const rawQuestion = rawQuestionElement.value.trim();
    if (!rawQuestion || rawQuestion.length === 0) {
        return;
    }
    mobileChatButton.setAttribute("disabled", "true");
    loadingSlide.classList.add("visible");
    rawQuestionElement.value = "";
    let messageReturned: string;
    chatMessageContainer.appendChild(createChatMessageElement("user", rawQuestion));
    chatMessageContainer.scrollTop = chatMessageContainer.scrollHeight;
    try {
        messageReturned = await sendQuestionToServer(rawQuestion);
    } catch (e) {
        console.log("something went wrong when trying to send the question to the server - ", e);
        showToast("Something went wrong.", "error");
        mobileChatButton.removeAttribute("disabled");
        return;
    }
    const markdownConverter = new showdown.Converter();
    chatMessageContainer.appendChild(createChatMessageElement("assistant", markdownConverter.makeHtml(messageReturned), true));
    chatMessageContainer.scrollTop = chatMessageContainer.scrollHeight;
    mobileChatButton.removeAttribute("disabled");
    loadingSlide.classList.remove("visible");
});

const sendQuestionToServer = async (question: string): Promise<string> => {
    const apiKey = localStorage.getItem("open-ai-key");
    const recipeIngredients: string[] = window.RECIPE_INGREDIENTS;
    const recipeSteps: string[] = window.RECIPE_STEPS;
    const recipeName: string = window.RECIPE_NAME;
    const messagesAlreadyExisting = document.querySelectorAll("[data-message]:not(:last-child)");
    const history: {role:"assistant"|"user", content: string}[] = [];
    messagesAlreadyExisting.forEach((message: HTMLElement) => {
        const role = message.getAttribute("data-message") as "assistant"|"user";
        const content = message.innerText;
        history.push({role, content});
    });
    const fullRecipePartOfPrompt: string = `RECIPE NAME: ${recipeName} INGREDIENTS: ${recipeIngredients.join("|")} STEPS: ${recipeSteps.join("|")}`;
    const apiRequest = await fetch("https://recipe-ai.adammcgurk.com", {
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
    const response = await apiRequest.json();
    return response.response;
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