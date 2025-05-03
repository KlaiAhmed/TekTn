<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/login.php';

session_start();

session_regenerate_id(true);

if ($_SESSION['logged_in'== true]) {
    header("Location: /tektn/view/index.php");
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION = [];
    
    $error = '';
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        $error = "Email and password are required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format!";
    }

    if (empty($error)) {
        try {
            $login = new Login();
            $user = $login->checkUserCredentials($email, $password);

            if ($user) {
                session_regenerate_id(true);
                
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['logged_in'] = true;

                unset($_SESSION['error']);

                $redirect = ($user['role'] === 'admin') 
                    ? '/tektn/controller/dashboard_admin.php' 
                    : '/tektn/controller/profile.php';
                
                header("Location: $redirect");
                exit();
            } else {
                $error = "Invalid email or password!";
            }
        } catch (PDOException $e) {
            $error = "Database error: " . $e->getMessage();
        }
    }

    $_SESSION['error'] = $error;
    header("Location: /tektn/view/pages/login/login.php");
    exit();
}