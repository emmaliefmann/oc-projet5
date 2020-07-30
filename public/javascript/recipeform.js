class RecipeForm {
  constructor(number) {
    console.log(number);
    this.recipeForm = document.querySelector("#addRecipeForm");
    this.ingredientContainer = document.querySelector("#ingredient-container");
    this.inpfile = document.querySelector("#inpFile");
    this.ingredientNumber = this.numberCheck(number);

    for (let i = 0; i < this.ingredientNumber; i++) {
      this.addIngredientFields(i);
    }
  }
  //number check
  numberCheck(number) {
    if (number == null || number == 0) {
      number = 5;
    }
    if (number > 20) {
      number = 20;
    } else {
      number = number;
    }
    return number;
  }

  // uploadImage() {
  // //adding nb of ingredients to recipe field test
  // const recipeForm = document.querySelector("#addRecipeForm");
  // const ingredientContainer = document.querySelector("#ingredient-container");
  // const inpfile = document.querySelector("#inpFile");

  // if (recipeForm) {
  //   //prevent default to upload image via fetch API
  //   recipeForm.addEventListener("submit", (e) => {
  //     e.preventDefault();
  //     const endpoint = "model/UploadImage.php";
  //     const formData = new FormData();

  //     formData.append("inpfile", inpFile.files[0]);

  //     fetch(endpoint, {
  //       method: "POST",
  //       body: formData,
  //     }).then((response) => {
  //       console.log(response);
  //     });
  //   });
  // }
  //}

  addIngredientFields(i) {
    let outerDiv = document.createElement("div");
    outerDiv.classList.add("w3-row-padding");
    let numberDiv = document.createElement("div");
    let unitDiv = document.createElement("div");
    let nameDiv = document.createElement("div");
    numberDiv.classList.add("w3-third");
    nameDiv.classList.add("w3-third");
    unitDiv.classList.add("w3-third");

    outerDiv.append(numberDiv, unitDiv, nameDiv);
    this.ingredientContainer.appendChild(outerDiv);

    //number fields
    let numberInput = document.createElement("INPUT");
    numberInput.setAttribute("type", "number");
    numberInput.setAttribute("name", "ingredient[" + i + "][0]");
    numberInput.classList.add("w3-input", "w3-border");
    numberDiv.appendChild(numberInput);

    let unitInput = document.createElement("select");
    unitInput.setAttribute("name", "ingredient[" + i + "][1]");
    let grams = document.createElement("option");
    grams.value = "grams";
    grams.text = "grams";
    let ml = document.createElement("option");
    ml.value = "ml";
    ml.text = "ml";
    let tablespoons = document.createElement("option");
    tablespoons.value = "tablespoons";
    tablespoons.text = "tablespoons";
    let teaspoons = document.createElement("option");
    teaspoons.value = "teaspoons";
    teaspoons.text = "teaspoons";

    unitInput.classList.add("w3-select", "w3-border");
    unitInput.append(grams, ml, tablespoons, teaspoons);
    unitDiv.appendChild(unitInput);

    let nameInput = document.createElement("INPUT");
    nameInput.setAttribute("type", "text");
    nameInput.setAttribute("name", "ingredient[" + i + "][2]");
    nameInput.classList.add("w3-input");
    nameInput.classList.add("w3-border");
    nameDiv.appendChild(nameInput);
  }

  //apiCheck for existing username

  //apiCheck for email already in DB

  //Check for empty fields
}
