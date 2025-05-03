var myTabs = document.getElementById('myTab');
if (myTabs) {
    var tabNav = new bootstrap.Tab(myTabs);
}

document.querySelectorAll('.nav-link').forEach(function(tab) {
    tab.addEventListener('click', function() {
        document.querySelectorAll('.nav-link').forEach(function(t) {
            t.classList.remove('active');
        });

        this.classList.add('active');

        var targetId = this.getAttribute('href').substring(1); 
        document.querySelectorAll('.tab-pane').forEach(function(content) {
            content.classList.remove('show', 'active');
        });
        document.getElementById(targetId).classList.add('show', 'active');
    });
});