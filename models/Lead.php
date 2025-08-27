<?php
class Lead {
    private $conn;
    private $table = 'leads';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $sql = "INSERT INTO {$this->table} (client_id, status, source) VALUES (:client_id, :status, :source)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':client_id' => $data['client_id'],
            ':status' => $data['status'],
            ':source' => $data['source']
        ]);
    }

    public function all($search='') {
        if ($search) {
            $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE status LIKE :search");
            $stmt->execute([':search' => "%$search%"]);
        } else {
            $stmt = $this->conn->query("SELECT * FROM {$this->table}");
        }
        return $stmt->fetchAll();
    }

    public function update($id, $data) {
        $sql = "UPDATE {$this->table} SET client_id=:client_id, status=:status, source=:source WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':client_id' => $data['client_id'],
            ':status' => $data['status'],
            ':source' => $data['source'],
            ':id' => $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id=:id");
        return $stmt->execute([':id' => $id]);
    }

    public function search($keyword) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE status LIKE :kw OR source LIKE :kw");
        $stmt->execute([':kw' => "%$keyword%"]);
        return $stmt->fetchAll();
    }
}
?>
