const modal = document.getElementById('editModal');
  const closeBtn = document.getElementById('modalClose');
  const formUserId = document.getElementById('form_user_id');
  const formUsername = document.getElementById('form_username');
  const formEmail = document.getElementById('form_email');
  const formMobile = document.getElementById('form_mobile');
  const formRole = document.getElementById('form_role');

  document.querySelectorAll('.btn-edit').forEach(btn => {
    btn.addEventListener('click', () => {
      formUserId.value = btn.dataset.id;
      formUsername.value = btn.dataset.username;
      formEmail.value = btn.dataset.email;
      formMobile.value = btn.dataset.mobile;
      formRole.value = btn.dataset.role;
      modal.style.display = 'block';
    });
  });

  closeBtn.addEventListener('click', () => modal.style.display = 'none');
  window.addEventListener('click', e => { if (e.target === modal) modal.style.display = 'none'; });

  window.onpopstate = function(event) {
    window.location.href = '/tektn/view/index.php';
  };
  
  window.onload = function() {
    history.pushState(null, document.title, window.location.href);
  };
  