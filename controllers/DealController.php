<?php
require_once __DIR__ . '/../models/Deal.php';

class DealController {
    private $db;
    public function __construct($db) { $this->db = $db; }

    public function index() {
        $model = new Deal($this->db);
        return $model->all();
    }

    public function store($data) {
        $model = new Deal($this->db);
        return $model->create($data);
    }

    public function update($id, $data) {
        $model = new Deal($this->db);
        return $model->update($id, $data);
    }

    public function delete($id) {
        $model = new Deal($this->db);
        return $model->delete($id);
    }
}
?>
