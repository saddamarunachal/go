<?php
require_once __DIR__ . '/../models/Lead.php';

class LeadController {
    private $db;
    public function __construct($db) { $this->db = $db; }

    public function index($search='') {
        $model = new Lead($this->db);
        return $model->all($search);
    }

    public function store($data) {
        $model = new Lead($this->db);
        return $model->create($data);
    }

    public function update($id, $data) {
        $model = new Lead($this->db);
        return $model->update($id, $data);
    }

    public function delete($id) {
        $model = new Lead($this->db);
        return $model->delete($id);
    }
}
?>
