<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {
    private $db;
    public function __construct($db) { $this->db = $db; }

    public function login($email, $password) {
        $user = (new User($this->db))->findByEmail($email);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = ['id'=>$user['id'], 'name'=>$user['name'], 'role'=>$user['role']];
            session_regenerate_id(true);
            return true;
        }
        return false;
    }

    public function register($data) {
        $userModel = new User($this->db);
        if ($userModel->findByEmail($data['email'])) {
            return false;
        }
        $userModel->create($data);
        return true;
    }

    public function logout() {
        session_unset();
        session_destroy();
    }
}
?>
