<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/SearchModel.php';


$model = new SearchModel($cnx);

$query = $_GET['q'] ?? '';
$results = $model->search($query);

header('Content-Type: application/json');
echo json_encode($results);
exit();