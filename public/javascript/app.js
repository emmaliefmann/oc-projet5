const registrationForm = document.querySelector("#registrationForm");

//registration form validation
const newUsername = document.querySelector("#registrationUsername");
const password = document.querySelector("#password");
const newEmail = document.querySelector("#registrationEmail");
const passwordConfirm = document.querySelector("#passCheck");
const passwordReset = document.querySelector("#passwordReset");
const recipeContainer = document.querySelector("#recipeContainer");

if (registrationForm) {
  registrationForm.addEventListener("submit", (e) => {
    if (password.value !== passwordConfirm.value) {
      e.preventDefault();
      alert("The passwords do not match");
    }
  });
}

if (registrationForm) {
  registrationForm.addEventListener("submit", (e) => {
    if (password.value !== passwordConfirm.value) {
      e.preventDefault();
      alert("The passwords do not match");
    }
  });
}

//pagination, filtering for allrecipes page
if (recipeContainer) {
  let recipeSearch = new List("recipeContainer", {
    valueNames: ["title", "category"],
    page: 3,
    pagination: true,
  });
  const starterFilter = document.querySelector("#filter-starter");
  const filters = document.getElementsByClassName("filter");
  const noFilter = document.querySelector("#filter-none");
  noFilter.addEventListener("click", () => {
    recipeSearch.filter();
    return false;
  });

  for (let i = 0; i < filters.length; i++) {
    filters[i].addEventListener("click", () => {
      recipeSearch.filter(function (item) {
        if (item.values().category == filters[i].id) {
          return true;
        } else {
          return false;
        }
        return false;
      });
    });
  }
}

//adding nb of ingredients to recipe field test
const recipeForm = document.querySelector("#addRecipeForm");
const ingredientContainer = document.querySelector("#ingredient-container");
const inpfile = document.querySelector("#inpFile");

if (recipeForm) {
  //prevent default to upload image via fetch API
  recipeForm.addEventListener("submit", (e) => {
    e.preventDefault();
    const endpoint = "model/UploadImage.php";
    const formData = new FormData();

    formData.append("inpfile", inpFile.files[0]);

    fetch(endpoint, {
      method: "POST",
      body: formData,
    }).then((response) => {
      console.log(response);
    });
  });
}

//get the ingredient nb from url ($get from previous page)
// let site = window.location.href;
// let url = new URL(site);
// let ingredientsNb = url.searchParams.get("ing");
// //make sure it's not a massive number
// if (ingredientsNb > 21) {
//   ingredientsNb = 20;
// }
// for (let i = 0; i < ingredientsNb; i++) {
//   //all outer divs
//   let outerDiv = document.createElement("div");
//   outerDiv.classList.add("w3-row-padding");
//   let numberDiv = document.createElement("div");
//   let unitDiv = document.createElement("div");
//   let nameDiv = document.createElement("div");
//   numberDiv.classList.add("w3-third");
//   nameDiv.classList.add("w3-third");
//   unitDiv.classList.add("w3-third");

//   //append to container. Shorter syntax?
//   outerDiv.append(numberDiv, unitDiv, nameDiv);
//   ingredientContainer.appendChild(outerDiv);

//   //number fields
//   let numberInput = document.createElement("INPUT");
//   numberInput.setAttribute("type", "number");
//   numberInput.setAttribute("name", "ingredient[" + i + "][0]");
//   numberInput.classList.add("w3-input", "w3-border");
//   numberDiv.appendChild(numberInput);

//   let unitInput = document.createElement("select");
//   unitInput.setAttribute("name", "ingredient[" + i + "][1]");
//   let grams = document.createElement("option");
//   grams.value = "grams";
//   grams.text = "grams";
//   let ml = document.createElement("option");
//   ml.value = "ml";
//   ml.text = "ml";
//   let tablespoons = document.createElement("option");
//   tablespoons.value = "tablespoons";
//   tablespoons.text = "tablespoons";
//   let teaspoons = document.createElement("option");
//   teaspoons.value = "teaspoons";
//   teaspoons.text = "teaspoons";

//   unitInput.classList.add("w3-select", "w3-border");
//   unitInput.append(grams, ml, tablespoons, teaspoons);
//   unitDiv.appendChild(unitInput);

//   let nameInput = document.createElement("INPUT");
//   nameInput.setAttribute("type", "text");
//   nameInput.setAttribute("name", "ingredient[" + i + "][2]");
//   nameInput.classList.add("w3-input");
//   nameInput.classList.add("w3-border");
//   nameDiv.appendChild(nameInput);
//}
//}
