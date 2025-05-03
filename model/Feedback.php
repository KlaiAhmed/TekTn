<?php
class Feedback {
    private $pdo;

    public function __construct() {
        global $cnx;
        require_once __DIR__ . '/../config/database.php';
        $this->pdo = $cnx;
    }

    public function create($userId, $topic, $txt) {
        $stmt = $this->pdo->prepare(
            "INSERT INTO feedback (user_id, topic, txt, created_at)
             VALUES (:user_id, :topic, :txt, NOW())"
        );
        return $stmt->execute([
            ':user_id' => $userId,
            ':topic'   => $topic,
            ':txt'     => $txt,
        ]);
    }

    public function getAll() {
        $stmt = $this->pdo->prepare(
            "SELECT
                f.id,
                f.user_id,
                u.email,
                f.topic,
                f.txt,
                f.created_at
             FROM feedback f
             JOIN users u ON f.user_id = u.user_id
             ORDER BY f.created_at DESC"
        );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
