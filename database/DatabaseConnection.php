<?php
Class DatabaseConnection {
    public $db;
    public function __construct($db = "stage", $user="root", $pwd="", $host="localhost") {
        try {
            $this->db = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function query($sql, $params = []) {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}