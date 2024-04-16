<?php

class UserColor {
    protected $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function insertColor($userId, $colorId) {
        $pdo = $this->connection->getConnection();
        $stmt = $pdo->prepare("INSERT INTO user_colors (user_id, color_id) VALUES (?, ?)");
        $stmt->execute([$userId, $colorId]);
        return $pdo->lastInsertId();
    }

    public function deleteColor($userId, $colorId) {
        $pdo = $this->connection->getConnection();
        $stmt = $pdo->prepare("DELETE FROM user_colors WHERE user_id = ? AND color_id = ?");
        $stmt->execute([$userId, $colorId]);
    }

    public function getUserColors($userId) {
        $pdo = $this->connection->getConnection();
        $stmt = $pdo->prepare("SELECT color_id FROM user_colors WHERE user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function getColor($id) {
        $pdo = $this->connection->getConnection();
        $stmt = $pdo->prepare("SELECT name FROM colors WHERE id = ?");
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result ? $result['name'] : null;
    }
}

?>
