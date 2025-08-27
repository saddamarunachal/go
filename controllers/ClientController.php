<?php
require_once __DIR__ . '/../models/Client.php';

class ClientController {
    private $db;
    public function __construct($db) { $this->db = $db; }

    public function index($search = '') {
        $model = new Client($this->db);
        return $model->all($search);
    }

    public function store($data) {
        $model = new Client($this->db);
        return $model->create($data);
    }

    public function update($id, $data) {
        $model = new Client($this->db);
        return $model->update($id, $data);
    }

    public function delete($id) {
        $model = new Client($this->db);
        return $model->delete($id);
    }
}
?>
