<?php
require "DatabaseConnection.php";
class Task {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function addTask($userId, $title, $description, $priority) {
        $this->db->query("INSERT INTO tasks (user_id, title, description, priority) 
        VALUES (?, ?, ?, ?)", [$userId, $title, $description, $priority]);
    }

    public function readTasks($userId) {
        return $this->db->query("SELECT * FROM tasks WHERE user_id = ?", [$userId])->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateTask($id, $userId, $title, $description, $status, $priority) {
        $this->db->query("UPDATE tasks SET user_id = ?, title = ?, description = ?, status = ?, priority = ? WHERE id = ?", 
        [$userId, $title, $description, $status, $priority, $id]);
    }

    public function deleteTask($id) {
        $this->db->query("DELETE FROM tasks WHERE id = ?", [$id]);
    }

    public function getTaskByid($id) {
        return $this->db->query("SELECT * FROM tasks WHERE id = ?", [$id])->fetch(PDO::FETCH_ASSOC);
    }
}