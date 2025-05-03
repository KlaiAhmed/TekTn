<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/signup.php';

session_start();
if ($_SESSION['logged_in']) {
    header("Location: /tektn/view/index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $error = null;

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $mobile = trim($_POST['mobile']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

if (empty($username) || empty($email) || empty($mobile) || empty($password)) {
    $error = "All fields are required!";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = "Invalid email format!";
} elseif ($password !== $confirm_password) {
    $error = "Passwords do not match!";
} elseif (strlen($password) < 8) {
    $error = "Password must be at least 8 characters!";
}

if (!$error) {
    try {
        echo "Trying to create user...";
        $signup = new Signup();
        
        if ($signup->checkUserExists($email, $username)) {
            $error = "Username or email already exists!";
        } else {
            $userId = $signup->createUser($username, $email, $mobile, $password);
            
            if ($userId) {
                $_SESSION['success'] = "Registration successful! Please login.";
                header("Location: /tektn/view/pages/login/login.php");
                exit();
            } else {
                $error = "Registration failed. Please try again.";
            }
        }
    } catch (PDOException $e) {
        $error = "Database error: " . $e->getMessage();
    }
}

    $_SESSION['error'] = $error;
    header("Location: /tektn/view/pages/login/login.php?form=signup");
    exit();
}
?>