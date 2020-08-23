class Popup {
  constructor() {
    this.redirect = document.querySelector("#redirectAddress");
    this.redirectAddress = this.redirect.innerText;
  }

  start() {
    console.log("start");
    setTimeout(() => {
      window.location.href = this.redirectAddress;
    }, 4000);
  }
}
