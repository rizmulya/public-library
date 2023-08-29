<?php
class Auth {
    private $conn;
    private $crud;

    public function __construct($database, $table) {
        $this->conn = $database->getConnection();
        $this->crud = new Crud($database);
        $this->table = $table;
    }

    public function login($table, $username, $password) {
        $table = $this->conn->real_escape_string($table);
        $username = $this->conn->real_escape_string($username);
    
        $userData = $this->crud->readDataOne($this->table, "username='$username'");

        if ($userData !== false) {
            $hashedPassword = md5($password);
            if ($hashedPassword === $userData['password'] && $userData['role'] == 0) {
                $_SESSION[SESSION_USER] = $userData['id'];
                return $userData['role'];
            } else if ($hashedPassword === $userData['password'] && $userData['role'] == 1) {
                $_SESSION[SESSION_ADMIN] = $userData['id'];
                return $userData['role'];
            }

        }
        return false;
    }

    public function logout() {
        session_unset(); 
        session_destroy();  

        header("Location: ".BASEURL); 
        exit();
    }
}
?>