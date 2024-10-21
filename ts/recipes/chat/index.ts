const useOwnApiKeyForm = document.getElementById("own-api-key-form") as HTMLFormElement;
useOwnApiKeyForm.addEventListener("submit", (ev) => {
    ev.preventDefault();
    const apiKey = (document.getElementById("open-ai-api-key") as HTMLInputElement).value;
    localStorage.setItem("open-ai-key", apiKey);
    // send success message
});