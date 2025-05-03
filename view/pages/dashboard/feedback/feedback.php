<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    <title>Tek TN - Admin</title>
    <link rel="icon" type="image/png" href="/tektn/view/assets/icons/icon.png"/>
    <link rel="stylesheet" href="/tektn/view/pages/dashboard/feedback/feedback.css">
    <link rel="stylesheet" href="/tektn/view/global/styles/sidebar.css"></head>
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
      <li>
        <a href="/tektn/controller/dashboard_users.php">
          <img src="/tektn/view/assets/icons/users.png" alt="users">
          <span>Users</span>
        </a>
      </li>
      <li class="active">
        <a href="/tektn/controller/dashboard_feedback.php">
        <img src="/tektn/view/assets/icons/feedback.png" alt="feedback">          
        <span>Feedbacks</span>
        </a>
      </li>
    </ul>
  </nav>
  </section>

  <div class="container">
  <h2>Feedback Table</h2>
  <ul class="responsive-table">
    <li class="table-header">
      <div class="col col-1">ID</div>
      <div class="col col-2">User ID</div>
      <div class="col col-3">Email</div>
      <div class="col col-4">Topic</div>
      <div class="col col-5">Feedback</div>
    </li>

    <?php if (!empty($feedbacks)): ?>
      <?php foreach ($feedbacks as $feedback): ?>
        <li class="table-row">
          <div class="col col-1"><?= htmlspecialchars($feedback['id']) ?></div>
          <div class="col col-2"><?= htmlspecialchars($feedback['user_id']) ?></div>
          <div class="col col-3"><?= htmlspecialchars($feedback['email']) ?></div>
          <div class="col col-4"><?= htmlspecialchars($feedback['topic']) ?></div>
          <div class="col col-5"><p><?= nl2br(htmlspecialchars($feedback['txt'])) ?></p></div>
        </li>
      <?php endforeach; ?>
    <?php else: ?>
      <li class="table-row">
        <div class="col col-1" style="flex-basis: 100%;">No feedback available</div>
      </li>
    <?php endif; ?>
    </ul>
  </div>
  <script>
      window.onpopstate = function(event) {
      window.location.href = '/tektn/view/index.php';
    };
    </script>
</body>
</html>
