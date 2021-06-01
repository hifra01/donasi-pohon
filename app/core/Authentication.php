<?php


class Authentication
{
    public static function setLogin($data) {
        $_SESSION['email'] = $data['email'];
        $_SESSION['user_id'] = $data['id'];
        $_SESSION['role'] = $data['role'];
    }
}