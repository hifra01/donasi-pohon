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

    public function authenticate()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data['email'] = $_POST['login_email'];
            $data['password'] = $_POST['login_password'];
            $login = $this->model('UsersModel')->getLogin($data);
            if ($login) {
                Authentication::setLogin($login);
            }
            var_dump($_SESSION);
        }
    }

    public function registration()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if(!filter_var($_POST['reg_email'], FILTER_VALIDATE_EMAIL)) {
                return "Error!";
            }
            if($_POST['reg_password'] != $_POST['reg_password_confirm']) {
                return "Error!";
            }
            if ($this->model('UsersModel')->isEmailExist($_POST['reg_email'])) {
                return "Error!";
            }
            $data['full_name'] = $_POST['reg_fullname'];
            $data['email'] = $_POST['reg_email'];
            $data['password'] = $_POST['reg_password'];

            $result = $this->model('UsersModel')->addUser($data);
            if ($result > 0) {
//                success
            }
        }
    }
}