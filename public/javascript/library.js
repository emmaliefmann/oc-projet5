class Library {
  constructor(listId) {
    this.recipeContainer = document.querySelector("#recipeContainer");
    this.noFilter = document.querySelector("#filter-none");
    this.filters = document.getElementsByClassName("filter");
    this.output = document.querySelector("#output");

    this.noResultDiv = document.querySelector("#no-com-results");
    this.recipeSearch = new List(listId, {
      valueNames: ["title", "category"],
      page: 6,
      pagination: true,
    });

    this.recipeSearch.on("updated", (results) => {
      let container = document.createElement("div");
      container.setAttribute("id", "no-com-results");
      this.output.append(container);
      if (results.matchingItems.length == 0) {
        //need to create html as if it is already coded it will delete when updated event occurs
        container.classList.add("display");
        let title = document.createElement("h5");
        title.classList.add("w3-center");
        title.innerText =
          "Click search for results from our global recipe book!";
        let image = document.createElement("img");
        image.setAttribute("src", "public/images/picnic.jpg");
        image.classList.add("image-dimension");
        container.append(title, image);
      } else {
        return;
      }
    });
  }

  createFilters() {
    this.noFilter.addEventListener("click", () => {
      this.recipeSearch.filter();
      return false;
    });

    for (let i = 0; i < this.filters.length; i++) {
      this.filters[i].addEventListener("click", () => {
        let id = this.filters[i].id;
        this.recipeSearch.filter(function (item) {
          if (item.values().category == id) {
            return true;
          } else {
            return false;
          }
          return false;
        });
      });
    }
  }
}
