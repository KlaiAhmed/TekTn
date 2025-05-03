const SignUpForm = document.getElementById("signup_form");
const username = document.getElementById("username");
const signup_email = document.getElementById("signup_email");
const phone = document.getElementById("mobile_number");
const signup_password = document.getElementById("signup_password");
const signup_confirm_password = document.getElementById("confirm_signup_password");
const confirm_eye = document.getElementById("confirm_signup_eye");

var passwordEyeView = false;

document.getElementById("signup_eye").addEventListener("click", (e) => {
  passwordEyeView = !passwordEyeView;
  if (passwordEyeView) {
    document
      .getElementById("signup_eye")
      .setAttribute("class", "fas fa-eye eye");
    document.getElementById("signup_password").setAttribute("type", "text");
  } else {
    document
      .getElementById("signup_eye")
      .setAttribute("class", "fas fa-eye-slash eye");
    document.getElementById("signup_password").setAttribute("type", "password");
  }
});

var confirmPasswordEyeView = false;

document.getElementById("confirm_signup_eye").addEventListener("click", (e) => {
  confirmPasswordEyeView = !confirmPasswordEyeView;
  if (confirmPasswordEyeView) {
    document
      .getElementById("confirm_signup_eye")
      .setAttribute("class", "fas fa-eye eye");
    document
      .getElementById("confirm_signup_password")
      .setAttribute("type", "text");
  } else {
    document
      .getElementById("confirm_signup_eye")
      .setAttribute("class", "fas fa-eye-slash eye");
    document
      .getElementById("confirm_signup_password")
      .setAttribute("type", "password");
  }
});
