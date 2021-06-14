<?php


class AuthManager
{
    public static function setLogin($data) {
        $_SESSION['user_id'] = $data['id'];
        $_SESSION['role'] = $data['role'];
        $_SESSION['user_name'] = $data['full_name'];
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
        if (!AuthManager::isLoggedIn()) {
            return false;
        }
        if ($_SESSION['role'] != 1) {
            return false;
        }
        return true;
    }

    public static function isUser() {
        if (!AuthManager::isLoggedIn()) {
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

    public static function getUserId(){
        return (int)$_SESSION['user_id'];
    }

    public static function getUserName(){
        return $_SESSION['user_name'];
    }
}