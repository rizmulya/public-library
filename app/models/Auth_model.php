<?php
class Auth_model {
    private $table = 'users';
    private $db;
    private $auth;
    private $crud;

    public function __construct() {
        $this->db = new Database;
        $this->auth = new Auth($this->db, $this->table);
        $this->crud = new Crud($this->db);
    }

    public function login($data) {
        return $this->auth->login($this->table, $data['email'], $data['password']);
    }

    public function signup($data) {
        return $this->crud->createData($this->table, $data);
    }

    public function logout() {
        return $this->auth->logout($this->table);
    }
}
?>