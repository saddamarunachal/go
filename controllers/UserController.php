<?php
require_once __DIR__ . '/../models/User.php';

class UserController {
    private $db;
    public function __construct($db) { $this->db = $db; }

    public function index() {
        $model = new User($this->db);
        return $model->all();
    }

    public function store($data) {
        $model = new User($this->db);
        return $model->create($data);
    }

    public function updateRole($id, $role) {
        $model = new User($this->db);
        return $model->updateRole($id, $role);
    }
}
?>
