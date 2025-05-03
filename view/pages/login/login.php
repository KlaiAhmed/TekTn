<?php
session_start();
$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
unset($_SESSION['error']);
if (isset($_GET['logout'])) {
  session_unset();
  session_destroy();
}
$show_signup = isset($_GET['form']) && $_GET['form'] === 'signup';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TekTN</title>
    <link rel="icon" type="image/png" href="../../assets/icons/icon.png" id="icon" />



    <!-- local script-->
    <script src="./script1.js" defer></script>
    <script src="./script2.js" defer></script>
    <script src="login.js" defer></script>
    <script src="signup.js" defer></script>
    <script src="/tektn/view/global/scripts/islogged.js.php" defer></script>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
      if (isLogged) {
        window.location.href = '/tektn/view/index.php';
      }
    });
    </script>

    <script defer>
          <?php if ($show_signup): ?>
              document.querySelector('.container').classList.add('sign-up-mode');
          <?php endif; ?>
    </script>

    <!-- external style-->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

    <!-- local style -->
    <link rel="stylesheet" href="./login.css" />

</head>

<body>
  <section class="login">
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <!--Login-->
          <form id="login_form" class="sign-in-form alignment" method="post" action="/tektn/controller/login.php">
            <h2 class="title user_logged_in">Log in</h2>
            <h2 class="title" id="logged_user"></h2>
            <div class="input-field user_logged_in" style="margin-right: 70px">
              <i class="fas fa-user"></i>
              <input type="email" validate id="email" name="email" placeholder="Email" style="width: 100%; padding: left 5px"/>
            </div>
            <div class="input-field user_logged_in password" style="margin-right: 70px">
              <i class="fas fa-lock lock"></i>
              <input type="password" id="password" name="password" placeholder="Password" style="width: 90%;"/>
              <i class="fas fa-eye-slash eye" id="eye"></i>
            </div>
            <br>
            <span class="error" id="err_msg">
                <?php if (!empty($error)): ?>
                    <div class="error"><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>
            </span>
            <div class="proper" style="margin-right: 50px">
              <input type="submit" value="Login" class="btn solid user_logged_in" />
            </div>
            <input type="submit" value="Logout" class="btn solid logout" style="display: none" />
          </form>

          <!-- SIGNUP -->
          <form id="signup_form" class="sign-up-form" method="post" action="/tektn/controller/signup.php">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input id="username" name="username" type="text" placeholder="Username" autofocus required/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input id="signup_email" name="email" type="email" placeholder="Email" required/>
            </div>
            <div class="input-field">
              <i class="bx bxs-phone-call"></i>
              <input id="mobile_number" name="mobile" type="tel" placeholder="mobile number" pattern="^\+[0-9]{11}$" title="Enter a valid phone number starting with +216, followed by 8 digits" required>
            </div>
            <div class="input-field password">
              <i class="fas fa-lock lock"></i>
              <input id="signup_password" name="password" type="password" placeholder="Password"  minlength="8" style="width: 90%;" required />
              <i class="fas fa-eye-slash eye" id="signup_eye"></i>
            </div>
            <div class="input-field password">
              <i class="fas fa-lock lock"></i>
              <input id="confirm_signup_password" name="confirm_password" type="password" placeholder="Confirm Password"  minlength="8" style="width: 90%;" required/>
              <i class="fas fa-eye-slash eye" id="confirm_signup_eye"></i>
            </div>
            <br>
            <span class="error" id="err_msg">
                <?php if ($error): ?>
                    <div class="error"><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>
            </span>           
            <input type="submit" class="btn" value="Sign up"/>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3 id="signed_user_welcome">New here?</h3>
            <p>New to the website? Join now and level up your skills.</p>
            <button class="btn transparent user_logged_in" id="sign-up-btn">Sign up</button>
          </div>
          <img src="../../assets/images/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us?</h3>
            <p>Already a member? Log in now and continue learning.</p>
            <button class="btn transparent" id="sign-in-btn">Sign in</button>
          </div>
          <img src="../../assets/images/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>
  </section>

</body>
</html>
