<?php
class Activity {
    private $conn;
    private $table = 'activities';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function countAll() {
        $stmt = $this->conn->query("SELECT COUNT(*) as cnt FROM {$this->table}");
        $row = $stmt->fetch();
        return $row['cnt'] ?? 0;
    }
}
?>
