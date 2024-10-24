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
mobileChatForm.addEventListener("submit", async (ev: SubmitEvent) => {
    ev.preventDefault();
    console.log("submitted");
    const rawQuestionElement = mobileChatForm.querySelector(`[name="chat-message"]`) as HTMLTextAreaElement;
    const rawQuestion = rawQuestionElement.value.trim();
    if (!rawQuestion || rawQuestion.length === 0) {
        return;
    }
    rawQuestionElement.value = "";
    let messageReturned: string;
    const userMessageElement = document.createElement("div");
    userMessageElement.classList.add("user-message");
    userMessageElement.innerText = rawQuestion;
    chatMessageContainer.appendChild(userMessageElement);
    try {
        messageReturned = await sendQuestionToServer(rawQuestion);
    } catch (e) {
        console.log("something went wrong when trying to send the question to the server - ", e);
        showToast("Something went wrong.", "error");
    }
    const assistantMessageContainer = document.createElement("div");
    assistantMessageContainer.classList.add("assistant-message");
    assistantMessageContainer.innerText = messageReturned;
    chatMessageContainer.appendChild(assistantMessageContainer);
});

const sendQuestionToServer = async (question: string): Promise<string> => {
    const apiKey = localStorage.getItem("open-ai-key");
    const recipeIngredients: string[] = window.RECIPE_INGREDIENTS;
    const recipeSteps: string[] = window.RECIPE_STEPS;
    console.log("recipe steps are ", recipeSteps);
    const recipeName: string = window.RECIPE_NAME;
    const fullRecipePartOfPrompt: string = `RECIPE NAME: ${recipeName} INGREDIENTS: ${recipeIngredients.join("|")} STEPS: ${recipeSteps.join("|")}`;
    const apiRequest = await fetch("https://recipe-ai.adammcgurk.com", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "Authorization": apiKey,
        },
        body: JSON.stringify({
            question: question,
            recipeContext: fullRecipePartOfPrompt,
        }),
    });
    const response = await apiRequest.json();
    return response.response;
};