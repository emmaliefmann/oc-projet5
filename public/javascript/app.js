const registrationForm = document.querySelector("#registrationForm");

//registration form validation
const newUsername = document.querySelector("#registrationUsername");
const newPassword = document.querySelector("#registrationPassword");
const newEmail = document.querySelector("#registrationEmail");
const passwordConfirm = document.querySelector("#registrationPassCheck");

if (registrationForm) {
  registrationForm.addEventListener("submit", (e) => {
    if (newPassword.value !== passwordConfirm.value) {
      e.preventDefault();
      alert("The passwords do not match");
    }
  });
}

//adding nb of ingredients to recipe field test
const recipeForm = document.querySelector("#addRecipeForm");
const ingredientContainer = document.querySelector("#ingredient-container");
if (recipeForm) {
  //get the ingredient nb from url ($get from previous page)
  let site = window.location.href;
  let url = new URL(site);
  let ingredientsNb = url.searchParams.get("ing");
  //make sure it's not a massive number
  if (ingredientsNb > 30) {
    ingredientsNb = 29;
  }
  console.log(ingredientsNb);
  for (let i = 0; i < ingredientsNb; i++) {
    //all outer divs
    let outerDiv = document.createElement("div");
    outerDiv.classList.add("w3-row-padding");
    let numberDiv = document.createElement("div");
    let unitDiv = document.createElement("div");
    let nameDiv = document.createElement("div");
    numberDiv.classList.add("w3-third");
    nameDiv.classList.add("w3-third");
    unitDiv.classList.add("w3-third");

    //append to container. Shorter syntax?
    outerDiv.append(numberDiv, unitDiv, nameDiv);
    ingredientContainer.appendChild(outerDiv);

    //number fields
    let numberInput = document.createElement("INPUT");
    numberInput.setAttribute("type", "number");
    numberInput.setAttribute("name", "quantity");
    numberInput.classList.add("w3-input", "w3-border");
    numberDiv.appendChild(numberInput);

    //unit, how do i do a select??
    let unitInput = document.createElement("select");

    let grams = document.createElement("option");
    grams.value = "grams";
    grams.text = "grams";
    let ml = document.createElement("option");
    ml.value = "ml";
    ml.text = "ml";
    let tablespoons = document.createElement("option");
    tablespoons.value = "tablespoons";
    tablespoons.text = "teaspoons";
    let teaspoons = document.createElement("option");
    teaspoons.value = "tablespoons";
    tablespoons.text = "tablespoons";

    unitInput.classList.add("w3-select", "w3-border");
    unitInput.append(grams, ml, teaspoons);
    unitDiv.appendChild(unitInput);

    let nameInput = document.createElement("INPUT");
    nameInput.setAttribute("type", "text");
    nameInput.setAttribute("name", "ingredient");
    nameInput.classList.add("w3-input");
    nameInput.classList.add("w3-border");
    nameDiv.appendChild(nameInput);
  }
}
