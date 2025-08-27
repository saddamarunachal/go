<?php
class Client {
    private $conn;
    private $table = 'clients';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $sql = "INSERT INTO {$this->table} (name, email, phone, company) VALUES (:name, :email, :phone, :company)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':name' => $data['name'],
            ':email' => $data['email'],
            ':phone' => $data['phone'],
            ':company' => $data['company']
        ]);
    }

    public function all($search = '') {
        if ($search) {
            $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE name LIKE :search OR email LIKE :search");
            $stmt->execute([':search' => "%$search%"]);
        } else {
            $stmt = $this->conn->query("SELECT * FROM {$this->table}");
        }
        return $stmt->fetchAll();
    }

    public function find($id) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function update($id, $data) {
        $sql = "UPDATE {$this->table} SET name=:name, email=:email, phone=:phone, company=:company WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':name' => $data['name'],
            ':email' => $data['email'],
            ':phone' => $data['phone'],
            ':company' => $data['company'],
            ':id' => $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id=:id");
        return $stmt->execute([':id' => $id]);
    }

    public function search($keyword) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE name LIKE :kw OR email LIKE :kw");
        $stmt->execute([':kw' => "%$keyword%"]); 
        return $stmt->fetchAll();
    }
}
?>
