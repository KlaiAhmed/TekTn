<?php

require_once __DIR__ . '/../config/database.php';

class CourseModel {
    private $pdo;
    public function __construct() {
        $this->pdo = Database::getConnection();
    }

    public function getAll($search = '') {
        if ($search !== '') {
            $stmt = $this->pdo->prepare(
              "SELECT * FROM cours WHERE nom LIKE :search"
            );
            $stmt->execute([ 'search' => "%{$search}%" ]);
        } else {
            $stmt = $this->pdo->query("SELECT * FROM cours");
        }
        return $stmt->fetchAll();
    }
}

?>