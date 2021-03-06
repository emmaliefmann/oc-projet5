class RecipeForm {
  constructor(id) {
    this.recipeForm = document.getElementById(id);
    this.ingredientContainer = document.querySelector("#ingredient-container");
    this.ingredientNumber = 4;
    this.ingredientLimit = 20;
    this.addButton = document.querySelector("#addIng");
    this.removeButton = document.querySelector("#removeIng");
    this.ingredientCount = 0;
    this.ingredientRows = document.getElementsByClassName("ingredientsrow");
    this.pristine = new Pristine(this.recipeForm);

    //event listeners
    this.addButton.addEventListener("click", () => {
      if (this.ingredientRows.length < this.ingredientLimit) {
        let index = this.ingredientRows.length;
        this.addIngredientFields(index);

        this.pristine = new Pristine(this.recipeForm);
        console.log(this.pristine);
      } else {
        alert("You cannot add more than 20 ingredients to a recipe");
      }
    });

    this.removeButton.addEventListener("click", () => {
      this.removeIngredientField();
      this.pristine = new Pristine(this.recipeForm);
      console.log(this.pristine);
    });

    this.recipeForm.addEventListener("submit", (e) => {
      let valid = this.pristine.validate();
      if (valid == true) {
        return;
      } else {
        e.preventDefault();
        //if ingredient field empty show message suggesting deleting boxes
      }
    });
  }

  startAddRecipe() {
    this.inpfile = document.querySelector("#inpFile");
    this.fileName = document.querySelector("#filename");
    for (let i = 0; i < this.ingredientNumber; i++) {
      this.addIngredientFields(i);
    }
    this.pristine = new Pristine(this.recipeForm);
    this.inpfile.addEventListener("input", (e) => {
      if (this.inpfile.files.length == 0) {
        return;
      } else {
        this.uploadImage();
      }
    });
  }
  checkImage() {
    let isValid = true;
    const file = this.inpfile.files[0];
    let type = file.type.split("/").pop().toLowerCase();
    if (type != "jpeg" && type != "png" && type != "jpg" && type != "jpeg") {
      alert("Invalid file type");
      isValid = false;
    }
    if (file.size > 2097152) {
      alert("This file exceeds the maximum size");
      isValid = false;
    }
    return isValid;
  }
  uploadImage() {
    const isValid = this.checkImage();
    if (isValid == true) {
      const fileName = "uploads/recipes/" + this.inpfile.files[0].name;
      this.fileName.innerText = fileName;
      this.fileName.setAttribute("value", fileName);
      const endpoint = "model/UploadImage.php";
      const formData = new FormData();
      formData.append("inpfile", inpFile.files[0]);
      fetch(endpoint, {
        method: "POST",
        body: formData,
      }).then((response) => {
        console.log(response);
      });
    } else {
      return;
    }
  }

  removeIngredientField() {
    let last = this.ingredientRows[this.ingredientRows.length - 1];
    if (this.ingredientRows.length > 2) {
      last.remove();
    } else {
      return;
    }
  }

  addIngredientFields(i) {
    let outerDiv = document.createElement("div");
    outerDiv.classList.add("w3-row-padding", "ingredientsrow");
    let numberDiv = document.createElement("div");
    let unitDiv = document.createElement("div");
    let nameDiv = document.createElement("div");
    numberDiv.classList.add("w3-third", "form-group");
    nameDiv.classList.add("w3-third", "form-group");
    unitDiv.classList.add("w3-third");

    outerDiv.append(numberDiv, unitDiv, nameDiv);
    this.ingredientContainer.appendChild(outerDiv);

    //number fields
    let numberInput = document.createElement("INPUT");
    numberInput.setAttribute("type", "number");
    numberInput.required = true;
    numberInput.setAttribute("name", "ingredient[" + i + "][0]");
    numberInput.classList.add("w3-input", "w3-border", "form-control");
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
    nameInput.required = true;
    nameInput.setAttribute("name", "ingredient[" + i + "][2]");
    nameInput.classList.add("w3-input");
    nameInput.classList.add("w3-border");
    nameDiv.appendChild(nameInput);
    this.ingredientCount++;
  }
}
