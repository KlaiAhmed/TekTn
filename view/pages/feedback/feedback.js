window.onpopstate = function(event) {
    window.location.href = '/tektn/view/index.php';
};

window.onload = function() {
    history.pushState(null, document.title, window.location.href);
};