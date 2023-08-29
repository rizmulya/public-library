<?php
class Validate extends Controller {
    public function index(){
        $data = [
            'title' => 'login',
        ];
        $this->view('front/templates/header', $data);
        $this->view('front/auth/index', $data);
        $this->view('front/templates/footer');
    }

    public function login(){
        if(!$_POST) {
            header('Location: '.BASEURL.'/validate');
        }

        $data = [
            'email' => $_POST['email'],
            'password' => $_POST['password'],
        ];

        $authModel = $this->model('Auth_model');
        $result = $authModel->login($data);
        if ($result == 0) {
            Flasher::setFlash('✅ berhasil', 'login', 'green');
            header('Location: ' . BASEURL . '/borrow');
            exit();
        } else if ($result == 1) {
            Flasher::setFlash('✅ berhasil', 'login sebagai admin', 'green');
            header('Location: ' . BASEURL . '/borrow');
            exit();
        } else {
            Flasher::setFlash('⛔ gagal', ', username atau password salah', 'red');
            header('Location: ' . BASEURL . '/validate');
            exit();
        }     
    }

    public function signup(){
        $data = [
            'title' => 'signup',
        ];
        $this->view('front/templates/header', $data);
        $this->view('front/auth/signup', $data);
        $this->view('front/templates/footer');
    }

    public function signup_exec(){
        if(!$_POST) {
            header('Location: '.BASEURL.'/validate');
        }

        $password = $_POST['password'];
        $hashedPassword = md5($password);
        $data = [
            'nama' => $_POST['nama'],
            'nik' => $_POST['nik'],
            'username' => $_POST['email'],
            'password' => $hashedPassword,
        ];

        if($this->model('Auth_model')->signup($data)){
            Flasher::setFlash('✅ berhasil', ', silahkan login', 'green');
            header('Location: '. BASEURL .'/validate');
            exit();
        } else {
            Flasher::setFlash('⛔ gagal', ', silahkan Sign Up ulang', 'red');
            header('Location: '. BASEURL .'/validate/signup');
            exit();
        }
    }

    public function signup_admin(){
        $data = [
            'title' => 'signup admin',
        ];
        $this->view('front/templates/header', $data);
        $this->view('front/auth/signup_admin', $data);
        $this->view('front/templates/footer');
    }

    public function signup_admin_exec(){
        if(!$_POST) {
            header('Location: '.BASEURL.'/validate');
        }

        $password = $_POST['password'];
        $hashedPassword = md5($password);
        $data = [
            'nama' => $_POST['nama'],
            'nik' => $_POST['nik'],
            'username' => $_POST['email'],
            'password' => $hashedPassword,
            'role' => 1
        ];

        if($this->model('Auth_model')->signup($data)){
            Flasher::setFlash('✅ berhasil', ', silahkan login', 'green');
            header('Location: '. BASEURL .'/validate');
            exit();
        } else {
            Flasher::setFlash('⛔ gagal', ', silahkan Sign Up ulang', 'red');
            header('Location: '. BASEURL .'/validate/signup');
            exit();
        }
    }
}
?>