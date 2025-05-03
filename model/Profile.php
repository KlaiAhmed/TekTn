<?php
class Profile {
    private $pdo;

    public function __construct() {
        global $cnx;
        require_once __DIR__ . '/../config/database.php';
        $this->pdo = $cnx;
    }

    public function getAdminUsers(string $search = ''): array {
        $sql = "
          SELECT
            u.user_id,
            u.username,
            u.email,
            u.mobile,
            u.created_at,
            a.admin_since
          FROM users u
          JOIN admin a ON u.user_id = a.user_id
        ";
        $params = [];
    
        if ($search !== '') {
            $sql .= " WHERE u.username LIKE :search
                      OR u.email    LIKE :search
                      OR u.mobile   LIKE :search";
            $params[':search'] = "%{$search}%";
        }
    
        $sql .= " ORDER BY a.admin_since DESC";
    
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateAdmin($userId, $data) {
        $fields = [];
        $params = [':user_id' => $userId];

        foreach (['username', 'email', 'mobile'] as $field) {
            if (isset($data[$field])) {
                $fields[] = "u.$field = :$field";
                $params[":$field"] = $data[$field];
            }
        }

        if (!empty($data['admin_since'])) {
            $fields[] = "a.admin_since = :admin_since";
            $params[':admin_since'] = date('Y-m-d', strtotime($data['admin_since']));
        }

        if (empty($fields)) {
            throw new Exception('No fields to update for admin');
        }

        $sql = "UPDATE users u
                JOIN admin a ON u.user_id = a.user_id
                SET " . implode(', ', $fields) . "
                WHERE u.user_id = :user_id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }

    public function deleteAdmin($userId) {
        try {
            $this->pdo->beginTransaction();
            $del = $this->pdo->prepare("DELETE FROM admin WHERE user_id = :user_id");
            $del->execute([':user_id' => $userId]);
            $demote = $this->pdo->prepare("UPDATE users SET role = 'user' WHERE user_id = :user_id");
            $demote->execute([':user_id' => $userId]);

            return $this->pdo->commit();
        } catch (Exception $e) {
            $this->pdo->rollBack();
            throw $e;
        }
    }

    public function deleteUser(int $userId): bool
    {
        try {
            $this->pdo->beginTransaction();

            $this->pdo->prepare("DELETE FROM admin WHERE user_id = :user_id")
            ->execute([':user_id' => $userId]);

            $stmt = $this->pdo->prepare("DELETE FROM users WHERE user_id = :user_id");
            $stmt->execute([':user_id' => $userId]);

            return $this->pdo->commit();
        } catch (Exception $e) {
            $this->pdo->rollBack();
            throw $e;
        }
    }

    public function getUserById($userId) {
        $stmt = $this->pdo->prepare("
            SELECT user_id, username, email, mobile 
            FROM users 
            WHERE user_id = :user_id
            LIMIT 1
        ");
        
        $stmt->execute([':user_id' => $userId]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$user) {
            throw new Exception("User not found in database");
        }
        
        return $user;
    }

    public function updateProfile($userId, $data) {
        $fields = [];
        $params = [':user_id' => $userId];
        
        if (!empty($data['username'])) {
            $fields[] = 'username = :username';
            $params[':username'] = $data['username'];
        }
        
        if (!empty($data['email'])) {
            $fields[] = 'email = :email';
            $params[':email'] = $data['email'];
        }
        
        if (!empty($data['mobile'])) {
            $fields[] = 'mobile = :mobile';
            $params[':mobile'] = $data['mobile'];
        }
        
        if (!empty($data['password'])) {
            $fields[] = 'password = :password';
            $params[':password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }

        if (empty($fields)) {
            throw new Exception('No fields to update');
        }

        $sql = "UPDATE users SET " . implode(', ', $fields) . " WHERE user_id = :user_id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }

    public function verifyCurrentPassword($userId, $password) {
        $stmt = $this->pdo->prepare("
            SELECT password 
            FROM users 
            WHERE user_id = :user_id
        ");
        $stmt->execute([':user_id' => $userId]);
        $user = $stmt->fetch();
        
        return $user && password_verify($password, $user['password']);
    }


    public function getUsers($search = '') {
        $sql = "SELECT user_id, username, email, mobile, created_at, role 
                FROM users";
        $params = [];
    
        if (!empty($search)) {
            $sql .= " WHERE username LIKE :search OR email LIKE :search OR mobile LIKE :search";
            $params[':search'] = "%$search%";
        }
    
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function updateUser($userId, $data) {
        $allowedFields = ['username', 'email', 'mobile', 'role'];
        $fields = [];
        $params = [':user_id' => $userId];
    
        foreach ($allowedFields as $field) {
            if (isset($data[$field])) {
                $fields[] = "$field = :$field";
                $params[":$field"] = $data[$field];
            }
        }
    
        if (empty($fields)) {
            throw new Exception('No valid fields to update');
        }
    
        $sql = "UPDATE users SET " . implode(', ', $fields) . " WHERE user_id = :user_id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }
}
?>