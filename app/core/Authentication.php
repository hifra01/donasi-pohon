<?php


class Authentication
{
    public static function setLogin($data) {
        $_SESSION['user_id'] = $data['id'];
        $_SESSION['role'] = $data['role'];
    }

    public static function isLoggedIn() {
        if (!isset($_SESSION['user_id'])) {
            return false;
        }
        if (!isset($_SESSION['role'])) {
            return false;
        }
        return true;
    }

    public static function isAdmin() {
        if (!Authentication::isLoggedIn()) {
            return false;
        }
        if ($_SESSION['role'] != 1) {
            return false;
        }
        return true;
    }

    public static function isUser() {
        if (!Authentication::isLoggedIn()) {
            return false;
        }
        if ($_SESSION['role'] != 2) {
            return false;
        }
        return true;
    }

    public static function logout() {
        session_unset();
        session_destroy();
        session_write_close();
        setcookie(session_name(), '', 0, '/');
    }
}