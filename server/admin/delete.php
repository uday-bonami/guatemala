<?php
require "../model/users.php";

session_start();
$isLogin = isset($_SESSION["admin_email"]);
if ($isLogin) {
    $face = $_GET["face"];
    if ($face === "admin-user") {
        $userId = $_GET["id"];
        $users = new Users();
        $userData = $users->getUserById($userId);

        if ($userData[0]["role"] === "admin") {
            $users->delete($userId);
            header("Location: /admin/admin.php");
            die();
        }
        header("Location: /admin/admin.php");
        die();
    }
}
