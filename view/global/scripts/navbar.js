/*SEARCH*/
document.addEventListener('DOMContentLoaded', () => {
    const search = document.getElementById('search'),
          searchBtn = document.getElementById('search-btn'),
          searchClose = document.getElementById('search-close');
          const searchInput = document.querySelector('.search__input');
  
    searchBtn.addEventListener('click', () => {
      search.classList.add('show-search');
    });
  
    searchClose.addEventListener('click', () => {
      search.classList.remove('show-search');
      searchInput.value = '';
    });
});

/*verification de login*/
window.onload = () => {
    const links = document.querySelectorAll(".links");
    const profiles = document.querySelectorAll(".profile-btn");
    if (isLogged) {
        links.forEach(link => link.style.display = "none");
        profiles.forEach(btn => btn.style.display = "block");
    } else {
        links.forEach(link => link.style.display = "block");
        profiles.forEach(btn => btn.style.display = "none");
    }
};

/* profile drop menu*/
function toggledrop() {
    var menu = document.getElementById("drop");
    menu.style.display = (menu.style.display === "block") ? "none" : "block";
}

document.addEventListener("click", function(event) {
    var menu = document.getElementById("drop");
    var button = document.querySelector(".profile-btn");

    if (!menu.contains(event.target) && !button.contains(event.target)) { 
        menu.style.display = "none";
    }
});
