class Spoonacular {
  constructor() {
    this.search = document.querySelector("#search");
    this.button = document.querySelector("#searchButton");
    this.apiKey = "094914fc0c704151b19e4963ad4322ba";
    this.clear = document.querySelector("#clear");
    this.output = document.querySelector("#output");
    this.button.addEventListener("click", () => {
      let search = this.search.value;
      this.getResults(search);
    });
    this.clear.addEventListener("click", () => {
      this.removeResults();
    });
  }

  getResults(search) {
    this.removeResults();
    fetch(
      "https://api.spoonacular.com/recipes/search?query=" +
        search +
        "&apiKey=" +
        this.apiKey
    )
      .then((response) => response.json())
      .then((data) => {
        let results = data.results;
        if (results.length == 0) {
          this.noResults(search);
        } else {
          results.map((result) => {
            this.showResults(result);
          });
        }
      });
  }

  noResults(search) {
    const outerDiv = document.createElement("div");
    const text = document.createElement("h5");
    text.innerText = "Sorry we couldn't find any results for " + search;
    outerDiv.append(text);
    this.output.append(outerDiv);
  }
  showResults(result) {
    const titleText = result.title;
    const prepTime = result.readyInMinutes;
    const link = result.sourceUrl;
    const id = result.id;
    //get image type, most are jpg anyway
    const imageSrc =
      "https://spoonacular.com/recipeImages/" + id + "-636x393.jpg";

    //make HTML
    let outerDiv = document.createElement("div");
    outerDiv.classList.add("w3-third", "w3-container", "search-result");
    let innerDiv = document.createElement("div");
    innerDiv.classList.add("w3-container", "recipe-info");
    let list = document.createElement("li");
    let image = document.createElement("img");
    let title = document.createElement("h5");
    let recipeLink = document.createElement("a");
    //attributes
    image.setAttribute("src", imageSrc);
    image.classList.add("w3-container", "w3-white");
    title.classList.add("title");
    title.innerText = titleText;
    recipeLink.setAttribute("href", link);
    recipeLink.innerText = "go to recipe";

    //append
    innerDiv.append(title, recipeLink);
    list.append(image, innerDiv);
    outerDiv.append(list);
    this.output.append(outerDiv);
  }

  removeResults() {
    let results = document.querySelectorAll(".search-result");
    let length = results.length;
    console.log(length);
    if (length == 0) {
      return;
    } else {
      for (let i = 0; i < length; i++) {
        results[i].remove();
      }
    }
  }
}
