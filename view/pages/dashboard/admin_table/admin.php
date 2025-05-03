<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tek TN - Admin</title>
    <link rel="icon" type="image/png" href="/tektn/view/assets/icons/icon.png"/>
    <link rel="stylesheet" href="/tektn/view/pages/dashboard/admin_table/admin.css">
    <link rel="stylesheet" href="/tektn/view/global/styles/sidebar.css">
    <script src="/tektn/view/pages/dashboard/admin_table/admin.js" defer></script>
</head>
<body>
  <section>
  <nav id="sidebar">
    <div id="home">
      <a  class="lien" href="/tektn/view/index.php">
        <img src="/tektn/view/assets/icons/icon.png" alt="logo" id="logo">
      </a>
    </div>
    <ul>
      <li class="active">
        <a  href="/tektn/controller/dashboard_admin.php">
          <img src="/tektn/view/assets/icons/admins.png" alt="admin">
          <span>Admins</span>
        </a>
      </li>
      <li>
        <a  href="/tektn/controller/dashboard_users.php">
          <img src="/tektn/view/assets/icons/users.png" alt="users">
          <span>Users</span>
        </a>
      </li>
      <li>
        <a href="/tektn/controller/dashboard_feedback.php">
          <img src="/tektn/view/assets/icons/feedback.png" alt="feedback">          
          <span>Feedbacks</span>
        </a>
      </li>
    </ul>
  </nav>
  </section>

  <div class="container">

    <h2>Admins Table</h2>
    <div class="container">
    <?php if (!empty($_SESSION['success'])): ?>
      <div class="alert alert-success"><?= htmlspecialchars($_SESSION['success']) ?></div>
    <?php endif; ?>
    <?php if (!empty($_SESSION['error'])): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($_SESSION['error']) ?></div>
    <?php endif; ?>

    <br>
    <!-- Search Box -->
    <div class="search-box">
      <form method="GET">
        <input
          type="text"
          name="search"
          placeholder="Search admins..."
          value="<?= htmlspecialchars($search) ?>"
        >
        <button type="submit">Search</button>
      </form>
    </div>

    <ul class="responsive-table">
      <li class="table-header">
        <div class="col col-1">ID</div>
        <div class="col col-2">Username</div>
        <div class="col col-3">Email</div>
        <div class="col col-4">Mobile</div>
        <div class="col col-5">Registered</div>
        <div class="col col-6">Admin Since</div>
        <div class="col col-7">Actions</div>
      </li>

      <?php if ($admins): foreach ($admins as $a): ?>
      <li class="table-row">
        <div class="col col-1"><?= htmlspecialchars($a['user_id']) ?></div>
        <div class="col col-2"><?= htmlspecialchars($a['username']) ?></div>
        <div class="col col-3"><?= htmlspecialchars($a['email']) ?></div>
        <div class="col col-4"><?= htmlspecialchars($a['mobile'] ?? '–') ?></div>
        <div class="col col-5"><?= date('M d, Y', strtotime($a['created_at'])) ?></div>
        <div class="col col-6"><?= date('M d, Y', strtotime($a['admin_since'])) ?></div>
        <div class="col col-7">
          <button
            class="btn-edit"
            data-id="<?= $a['user_id'] ?>"
            data-username="<?= htmlspecialchars($a['username'], ENT_QUOTES) ?>"
            data-email="<?= htmlspecialchars($a['email'],    ENT_QUOTES) ?>"
            data-mobile="<?= htmlspecialchars($a['mobile'],   ENT_QUOTES) ?>"
            data-admin_since="<?= date('Y-m-d', strtotime($a['admin_since'])) ?>"
          >Edit</button>
          <a
            href="?delete=<?= $a['user_id'] ?>"
            class="btn-delete"
            onclick="return confirm('Remove admin rights?');"
          >Demote</a>
        </div>
      </li>
      <?php endforeach; else: ?>
      <li class="table-row">
        <div class="col col-1" style="flex-basis:100%">No admins found.</div>
      </li>
      <?php endif; ?>
    </ul>
  </div>

  <!-- Edit Modal -->
  <div id="editModal" class="modal">
    <div class="modal-content">
      <span id="modalClose" class="modal-close">&times;</span>
      <h2>Edit Admin</h2>
      <form method="post" action="/tektn/controller/dashboard_admin.php">
        <input type="hidden" name="update" value="1">
        <input type="hidden" id="form_user_id"   name="user_id">
        <div class="form-group">
          <label for="form_username">Username</label>
          <input type="text" id="form_username" name="username" required>
        </div>
        <div class="form-group">
          <label for="form_email">Email</label>
          <input type="email" id="form_email" name="email" required>
        </div>
        <div class="form-group">
          <label for="form_mobile">Mobile</label>
          <input type="text" id="form_mobile" name="mobile">
        </div>
        <div class="form-group">
          <label for="form_admin_since">Admin Since</label>
          <input type="date" id="form_admin_since" name="admin_since" required>
        </div>
        <button type="submit" class="btn-save">Save</button>
      </form>
    </div>
  </div>
</body>
</html>