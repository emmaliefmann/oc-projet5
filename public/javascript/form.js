class form {
  //id of the form? e.g. registration, signin etc.
  constructor(id) {
    this.form = document.getElementById(id);
    this.password = document.querySelector("#password");
    this.passwordCheck = document.querySelector("#passCheck");
  }

  //apiCheck for existing username

  //apiCheck for email already in DB

  //Check for empty fields

  passwordMatch() {
    if (this.password.value !== this.passwordCheck.value) {
      e.preventDefault();
      alert("The passwords do not match");
    }
  }
}
