<?php


class SweetAlert
{
    public static function setAlert($title, $text, $icon)
    {
        $_SESSION['alert'] = [
            'title' => $title,
            'text' => $text,
            'icon' => $icon
        ];
    }

    public static function alert()
    {
        if (isset($_SESSION['alert'])) {
            echo "<script>Swal.fire({title:'".$_SESSION['alert']['title']."', text:'".$_SESSION['alert']['text']."', icon:'".$_SESSION['alert']['icon']."' })</script>";
            unset($_SESSION['alert']);
        }
    }
}