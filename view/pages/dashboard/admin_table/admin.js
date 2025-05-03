document.querySelectorAll('.btn-edit').forEach(btn => {
    btn.addEventListener('click', () => {
      document.getElementById('form_user_id').value = btn.dataset.id;
      document.getElementById('form_username').value = btn.dataset.username;
      document.getElementById('form_email').value    = btn.dataset.email;
      document.getElementById('form_mobile').value   = btn.dataset.mobile;
      document.getElementById('form_admin_since').value = btn.dataset.admin_since;
      document.getElementById('editModal').style.display = 'block';
    });
});

document.getElementById('modalClose').onclick = () => {
  document.getElementById('editModal').style.display = 'none';
};

window.onpopstate = function(event) {
  window.location.href = '/tektn/view/index.php';
};

window.onload = function() {
  history.pushState(null, document.title, window.location.href);
};
