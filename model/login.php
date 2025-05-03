<?php
class Login {
    private $pdo;

    public function __construct() {
        global $cnx;
        require_once __DIR__ . '/../config/database.php';
        $this->pdo = $cnx;
    }

    public function checkUserCredentials($email, $password) {
        $stmt = $this->pdo->prepare("
            SELECT user_id, username, email, password, role
            FROM users 
            WHERE email = :email
            LIMIT 1
        ");
        
        if (!$stmt->execute([':email' => $email])) {
            throw new PDOException("Query execution failed");
        }

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                unset($user['password']);
                return $user;
            }
        }
        
        return false;
    }
}