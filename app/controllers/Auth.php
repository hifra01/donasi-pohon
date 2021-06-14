<?php


class Auth extends Controller
{
    public function index()
    {
        header("Location:" . BASEURL);
    }

    public function login()
    {
        $data['judul'] = 'Login';
        $this->view('auth/login', $data);
    }

    public function register()
    {
        $data['judul'] = 'Register';
        $this->view('auth/register', $data);
    }

    public function logout()
    {
        AuthManager::logout();
        header('Location: '.BASEURL);
    }

    public function authenticate()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data['email'] = $_POST['login_email'];
            $data['password'] = $_POST['login_password'];
            $login = $this->model('UsersModel')->getLogin($data);
            if ($login) {
                AuthManager::setLogin($login);
                return header('Location: '.BASEURL);
            } else {
                SweetAlert::setAlert('Login Gagal!', 'Username atau Password salah!', 'error');
                return header('Location: '.BASEURL.'auth/login');
            }
        }
    }

    public function registration()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if(!filter_var($_POST['reg_email'], FILTER_VALIDATE_EMAIL)) {
                SweetAlert::setAlert("Format E-mail salah!", "", "error");
                return header("Location: ".BASEURL."auth/register");
            }
            if($_POST['reg_password'] != $_POST['reg_password_confirm']) {
                SweetAlert::setAlert("Konfirmasi password tidak sesuai", "", "error");
                return header("Location: ".BASEURL."auth/register");
            }
            if ($this->model('UsersModel')->isEmailExist($_POST['reg_email'])) {
                SweetAlert::setAlert("E-mail sudah pernah digunakan!", "", "error");
                return header("Location: ".BASEURL."auth/register");
            }
            $data['full_name'] = $_POST['reg_fullname'];
            $data['email'] = $_POST['reg_email'];
            $data['password'] = md5($_POST['reg_password']);

            $result = $this->model('UsersModel')->addUser($data);
            if ($result > 0) {
                SweetAlert::setAlert("Registrasi Berhasil!", "Silakan masuk dengan akun baru Anda.", "success");
                return header("Location: ".BASEURL."auth/login");
            } else {
                SweetAlert::setAlert("Registrasi Gagal!", "Terjadi kesalahan.", "error");
                return header("Location: ".BASEURL."auth/register");
            }
        }
    }
}