<?php
class Signup {

    public function __construct() {
        global $cnx;
        require_once __DIR__ . '/../config/database.php';
        
        if(!$cnx instanceof PDO) {
            die("Model: Database connection failed - Check config/database.php");
        }
        $this->pdo = $cnx;
    }

    public function checkUserExists($email, $username) {
        $stmt = $this->pdo->prepare("
            SELECT COUNT(*) 
            FROM users 
            WHERE email = :email OR username = :username
        ");
        $stmt->execute([
            ':email' => $email,
            ':username' => $username
        ]);
        return $stmt->fetchColumn() > 0;
    }

    public function createUser($username, $email, $mobile, $password) {
        try {
            $this->pdo->beginTransaction();
            
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            
            $stmt = $this->pdo->prepare("
                INSERT INTO users (username, email, mobile, password) 
                VALUES (:username, :email, :mobile, :password)
            ");
            $stmt->execute([
                ':username' => $username,
                ':email' => $email,
                ':mobile' => $mobile,
                ':password' => $hashedPassword
            ]);
            
            $userId = $this->pdo->lastInsertId();
            $this->pdo->commit();
            return $userId; 
            
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            error_log("Insert error: " . $e->getMessage());
            return false; 
        }
    }
}
?>