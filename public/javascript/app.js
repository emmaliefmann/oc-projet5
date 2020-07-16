const registrationForm = document.querySelector("#registrationForm");

//registration form validation
const newUsername = document.querySelector("#registrationUsername");
const newPassword = document.querySelector("#registrationPassword");
const newEmail = document.querySelector("#registrationEmail");
const passwordConfirm = document.querySelector("#registrationPassCheck");

if (registrationForm) {
  registrationForm.addEventListener("submit", (e) => {
    if (newPassword.value !== passwordConfirm.value) {
      e.preventDefault();
      alert("The passwords do not match");
    }
  });
}
