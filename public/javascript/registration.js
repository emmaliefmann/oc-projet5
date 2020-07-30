class Registration {
  //id of the form? m e.g. registration, signin etc.
  //make a reusable form
  constructor(id) {
    this.form = document.querySelector(id);
    this.newUsername = document.querySelector("#registrationUsername");
    this.password = document.querySelector("#password");
    this.newEmail = document.querySelector("#registrationEmail");
    this.passwordConfirm = document.querySelector("#passCheck");
    this.passwordReset = document.querySelector("#passwordReset");
    this.recipeContainer = document.querySelector("#recipeContainer");

    this.form.addEventListener("submit", (e) => {
      if (this.password.value !== this.passwordConfirm.value) {
        e.preventDefault();
        alert("The passwords do not match");
      }
    });
  }
}
