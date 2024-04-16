<?php

include_once (__DIR__ . '/../controllers/UserColorController.php');

class User {
    protected $connection;
    private $userColorController;

    public function __construct($connection) {
        $this->connection = $connection;
        $this->userColorController = new UserColorController($connection);
    }

    public function listUsers() {
        try {
            $pdo = $this->connection->getConnection();
            $stmt = $pdo->prepare("SELECT id, name, email FROM users");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            die("DB Error: " . $e->getMessage());
        }
    }

    public function addUser($name, $email, $cores) {
        $pdo = $this->connection->getConnection();
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existingUser) {
            return ["status" => 0, "mensagem" => "O E-mail digitado já existe."];
        }

        $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        $stmt->execute([$name, $email]);
        $userId = $pdo->lastInsertId();
    
        if (!empty($cores)) {
            foreach ($cores as $colorId) {
                $this->userColorController->insertColor($userId, $colorId);
            }
        }
    
        return ["status" => 1, "mensagem" => "Usuário adicionado com sucesso!"];
        return $userId;
    }

    public function updateUser($id, $name, $email) {
        $pdo = $this->connection->getConnection();
        $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
        $stmt->execute([$name, $email, $id]);
    }

    public function deleteUser($userId) {
        $pdo = $this->connection->getConnection();
        $stmt = $pdo->prepare("DELETE FROM user_colors WHERE user_id = ?");
        $stmt->execute([$userId]);

        $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$userId]);
    }
}

?>