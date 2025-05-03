const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});

const urlParams = new URLSearchParams(window.location.search);
const formParam = urlParams.get('form');

if (formParam === 'signup') {
    const container = document.querySelector('.container');
    container.classList.add('sign-up-mode');
        history.replaceState({}, document.title, window.location.pathname);
}