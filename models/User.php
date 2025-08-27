<?php
class User {
    private $conn;
    private $table = 'users';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $sql = "INSERT INTO {$this->table} (name, email, password, role) VALUES (:name, :email, :password, :role)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':name' => $data['name'],
            ':email' => $data['email'],
            ':password' => password_hash($data['password'], PASSWORD_DEFAULT),
            ':role' => $data['role'] ?? 'Staff'
        ]);
        return $this->conn->lastInsertId();
    }

    public function findByEmail($email) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE email = :email");
        $stmt->execute([':email' => $email]);
        return $stmt->fetch();
    }

    public function all() {
        $stmt = $this->conn->query("SELECT id, name, email, role FROM {$this->table}");
        return $stmt->fetchAll();
    }

    public function updateRole($id, $role) {
        $stmt = $this->conn->prepare("UPDATE {$this->table} SET role=:role WHERE id=:id");
        return $stmt->execute([':role' => $role, ':id' => $id]);
    }
}
?>
