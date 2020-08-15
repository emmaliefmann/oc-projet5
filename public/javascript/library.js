class Library {
  constructor() {
    this.recipeContainer = document.querySelector("#recipeContainer");
    this.noFilter = document.querySelector("#filter-none");
    this.filters = document.getElementsByClassName("filter");
    this.recipeSearch = new List("recipeContainer", {
      valueNames: ["title", "category"],
      page: 6,
      pagination: true,
    });
  }

  createFilters() {
    this.noFilter.addEventListener("click", () => {
      console.log("click");
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

  paginate() {}
}
