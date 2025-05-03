const LoginForm = document.querySelector("#login_form");
const email = document.querySelector("#email");
const password = document.querySelector("#password");
const eye = document.getElementById("eye");

var eyeView = false;
eye.addEventListener("click", (e) => {
  eyeView = !eyeView;
  if (eyeView) {
    eye.setAttribute("class", "fas fa-eye eye");
    document.getElementById("password").setAttribute("type", "text");
  } else {
    eye.setAttribute("class", "fas fa-eye-slash eye");
    document.getElementById("password").setAttribute("type", "password");
  }
});

window.onpopstate = function(event) {
  window.location.href = '/tektn/view/index.php';
};

window.onload = function() {
  history.pushState(null, document.title, window.location.href);
};