<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/Profile.php';

session_start();

if (
    empty($_SESSION['logged_in']) ||!isset($_SESSION['role']) ||$_SESSION['role'] !== 'admin') {
    header("Location: /tektn/view/pages/login/login.php");
    exit();
}

$profile = new Profile();

if (isset($_GET['delete'])) {
    try {
        $profile->deleteUser((int)$_GET['delete']);
        $_SESSION['success'] = "User deleted ";
    } catch (Exception $e) {
        $_SESSION['error'] = "Delete error: " . $e->getMessage();
    }
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}


if (isset($_POST['update'])) {
    try {
        $profile->updateUser((int)$_POST['user_id'], [
            'username' => trim($_POST['username']),
            'email'    => trim($_POST['email']),
            'mobile'   => trim($_POST['mobile']),
            'role'     => trim($_POST['role'])
        ]);
        $_SESSION['success'] = "User updated successfully";
    } catch (Exception $e) {
        $_SESSION['error'] = "Update error: " . $e->getMessage();
    }
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

$search = $_GET['search'] ?? '';
try {
    $users = $profile->getUsers($search);
} catch (Exception $e) {
    $_SESSION['error'] = "Error: " . $e->getMessage();
    $users = [];
}

while (ob_get_level()) ob_end_clean();
include __DIR__ . '/../view/pages/dashboard/users_table/users.php';
unset($_SESSION['error'], $_SESSION['success']);
?>
