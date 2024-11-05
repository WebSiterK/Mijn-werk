<?php
require "DatabaseConnection.php";
class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function signup($gebruikersnaam, $email, $wachtwoord) {
        $hashedWachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);
        $this->db->query("INSERT INTO users (username, email, password) VALUES (?, ?, ?)", [$gebruikersnaam, $email, $hashedWachtwoord]);
    }

    public function signin($gebruikersnaam, $wachtwoord) {
        $user = $this->db->query("SELECT * FROM users WHERE username = ?", [$gebruikersnaam])->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($wachtwoord, $user['password'])) {
            $_SESSION['is_logged_in'] = true;
            $_SESSION['user_id'] = $user['id'];
            return true;
        }
        return false;
    }

    public function getUser($id) {
        return $this->db->query("SELECT * FROM users WHERE id = ?", [$id])->fetch(PDO::FETCH_ASSOC);
    }

}