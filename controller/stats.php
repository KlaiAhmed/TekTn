<?php
require_once __DIR__ . '/../model/stats.php';
require_once __DIR__ . '/../config/database.php';

class Statscontroller
{
    public function getCounts(): array
    {
        global $cnx;

        $model = new Stats($cnx);
        return $model->getAllCounts();
    }
}
