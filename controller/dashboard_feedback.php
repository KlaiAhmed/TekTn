<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/Feedback.php';
session_start();
if (
    !isset($_SESSION['logged_in']) 
    || $_SESSION['logged_in'] !== true 
    || !isset($_SESSION['role']) 
    || $_SESSION['role'] !== 'admin' ) {
    header("Location: /tektn/view/pages/login/login.php");
    exit();
}
$fb = new Feedback();
$feedbacks = $fb->getAll();

include __DIR__ . '/../view/pages/dashboard/feedback/feedback.php';
?>