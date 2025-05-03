<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/Feedback.php';
session_start();

if (!isset($_SESSION['logged_in'])) {
    header("Location: /tektn/view/pages/login/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user_id'];
    $topic  = trim($_POST['topic'] ?? '');
    $txt    = trim($_POST['txt']   ?? '');

    if ($topic === '' || $txt === '') {
        $_SESSION['feedback_error'] = 'Both topic and message are required.';
    } else {
        $fb = new Feedback();
        if ($fb->create($userId, $topic, $txt)) {
            $_SESSION['feedback_message'] = 'Thank you for your feedback!';
        } else {
            $_SESSION['feedback_error'] = 'Failed to submit feedback. Please try again.';
        }
    }
}

header('Location: /tektn/view/pages/feedback/feedback.php');
exit();
