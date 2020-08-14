class Spoonacular {
  constructor() {
    this.search = document.querySelector("#search");
    this.button = document.querySelector("#searchButton");
    this.apiKey = "094914fc0c704151b19e4963ad4322ba";

    this.button.addEventListener("click", () => {
      let search = this.search.value;
      this.getResults(search);
    });
  }

  getResults(search) {
    fetch(
      "https://api.spoonacular.com/recipes/search?query=" +
        search +
        "&apiKey=" +
        this.apiKey
    )
      .then((response) => response.json())
      .then((data) => {
        let results = data.results;
        results.map((result) => {
          console.log(result);
          this.showResults(result);
        });
      });
  }

  showResults(result) {
    const output = document.querySelector("#output");
    const titleText = result.title;
    const prepTime = result.readyInMinutes;
    const link = result.sourceUrl;
    const id = result.id;
    //get image type, most are jpg anyway
    const imageSrc =
      "https://spoonacular.com/recipeImages/" + id + "-636x393.jpg";

    //make HTML
    let outerDiv = document.createElement("div");
    outerDiv.classList.add("w3-third", "w3-container");
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
    output.append(outerDiv);
  }

  removeResults() {
    //Check if results already showing
    //remove those results before showing new ones.
  }
}
