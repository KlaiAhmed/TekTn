<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tek TN - Admin</title>
    <link rel="icon" type="image/png" href="/tektn/view/assets/icons/icon.png"/>
    <link rel="stylesheet" href="/tektn/view/pages/dashboard/users_table/users.css">
    <link rel="stylesheet" href="/tektn/view/global/styles/sidebar.css">
    <script src="/tektn/view/pages/dashboard/users_table/users.js" defer></script>
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
      <li>
        <a  href="/tektn/controller/dashboard_admin.php">
          <img src="/tektn/view/assets/icons/admins.png" alt="admin">
          <span>Admins</span>
        </a>
      </li>
      <li class="active">
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
    <h2>Users Table</h2>
    <br>
    <div class="search-box">
        <form method="GET">
            <input type="text" name="search" placeholder="Search users..." value="<?= htmlspecialchars($search) ?>">
            <button type="submit">Search</button>
        </form>
    </div>

    <ul class="responsive-table">
      <li class="table-header">
        <div class="col col-1">ID</div>
        <div class="col col-2">Username</div>
        <div class="col col-3">Email</div>
        <div class="col col-4">Mobile</div>
        <div class="col col-5">Role</div>
        <div class="col col-6">Registered</div>
        <div class="col col-7">Actions</div>
      </li>

      <?php if (!empty($users)): ?>
        <?php foreach ($users as $user): ?>
          <li class="table-row">
            <div class="col col-1" data-label="User ID"><?= htmlspecialchars($user['user_id'], ENT_QUOTES) ?></div>
            <div class="col col-2" data-label="Username"><?= htmlspecialchars($user['username'], ENT_QUOTES) ?></div>
            <div class="col col-3" data-label="Email"><?= htmlspecialchars($user['email'], ENT_QUOTES) ?></div>
            <div class="col col-4" data-label="Mobile"><?= htmlspecialchars($user['mobile'] ?? 'N/A', ENT_QUOTES) ?></div>
            <div class="col col-5" data-label="Role"><?= htmlspecialchars($user['role'], ENT_QUOTES) ?></div>
            <div class="col col-6" data-label="Registered"><?= date('M d, Y', strtotime($user['created_at'])) ?></div>
            <div class="col col-7" data-label="Actions">
              <button class="btn-edit" 
                      data-id="<?= $user['user_id'] ?>" 
                      data-username="<?= htmlspecialchars($user['username'], ENT_QUOTES) ?>" 
                      data-email="<?= htmlspecialchars($user['email'], ENT_QUOTES) ?>" 
                      data-mobile="<?= htmlspecialchars($user['mobile'], ENT_QUOTES) ?>" 
                      data-role="<?= htmlspecialchars($user['role'], ENT_QUOTES) ?>">
                Edit
              </button>
              <a href="?delete=<?= $user['user_id'] ?>" class="btn-delete" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
            </div>
          </li>
        <?php endforeach; ?>
      <?php else: ?>
        <li class="table-row"><div class="col col-1" colspan="7">No users found.</div></li>
      <?php endif; ?>
    </ul>

    <div id="editModal" class="modal" style="display:none;">
      <div class="modal-content">
        <span id="modalClose" class="modal-close">&times;</span>
        <h2>Edit User</h2>
        <form method="post" action="">
          <input type="hidden" name="update" value="1">
          <input type="hidden" id="form_user_id" name="user_id">
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
            <label for="form_role">Role</label>
            <select id="form_role" name="role">
              <option value="user">User</option>
              <option value="admin">Admin</option>
            </select>
          </div>
          <button type="submit" class="btn-save">Save</button>
        </form>
      </div>
    </div>

  </div>
</body>
</html>