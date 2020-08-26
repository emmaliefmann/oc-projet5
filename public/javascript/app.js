class App {
  constructor() {}
}
let myApp;

window.addEventListener("load", () => {
  myApp = new App();
  let site = window.location.href;
  let url = new URL(site);
  let page = url.searchParams.get("action");

  if (page == "register") {
    registration = new Registration("#registrationForm");
  }
  if (page == "allrecipes") {
    //listName is id of div to paginate
    let listName = "recipeContainer";
    library = new Library(listName);
    spoonacular = new Spoonacular();
    library.createFilters();
  }
  if (page == "message") {
    console.log("page");
    popup = new Popup();
    popup.start();
  }
  if (page == "member") {
    page = url.searchParams.get("page");
    if (page == "newrecipe") {
      recipeForm = new RecipeForm("addRecipeForm");
      recipeForm.startAddRecipe();
    } else if (page == "changerecipe") {
      let validate = new RecipeForm("edit-recipe");
    }
  }
});
