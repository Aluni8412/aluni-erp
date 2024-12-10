<?php
namespace Global\Models;

use PDO;

class Article {
    public static function all() {
        $pdo = new PDO($_ENV['DB_DSN'], $_ENV['DB_USER'], $_ENV['DB_PASS']);
        $stmt = $pdo->query('SELECT * FROM artikel');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}