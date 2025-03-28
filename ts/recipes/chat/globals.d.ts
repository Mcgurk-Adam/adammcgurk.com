type RecipeSection = {
    sectionTitle: string;
    sectionIngredients: string[];
};
interface Window {
    AI_SERVER_URL: string;
    RECIPE: {
        title: string;
        steps: string[];
        ingredients: RecipeSection[] | string[];
    }
}