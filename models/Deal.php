<?php
class Deal {
    private $conn;
    private $table = 'deals';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($data) {
        $sql = "INSERT INTO {$this->table} (client_id, amount, stage) VALUES (:client_id, :amount, :stage)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':client_id' => $data['client_id'],
            ':amount' => $data['amount'],
            ':stage' => $data['stage']
        ]);
    }

    public function all() {
        $stmt = $this->conn->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll();
    }

    public function update($id, $data) {
        $sql = "UPDATE {$this->table} SET client_id=:client_id, amount=:amount, stage=:stage WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':client_id' => $data['client_id'],
            ':amount' => $data['amount'],
            ':stage' => $data['stage'],
            ':id' => $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id=:id");
        return $stmt->execute([':id' => $id]);
    }
}
?>
