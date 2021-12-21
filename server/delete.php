<?php
require "./model/bookings.php";
require "./model/users.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    session_start();
    $bookings = new Bookings();
    $users = new Users();

    $userId = $_GET['user_id'];
    $bookingId = $_GET['booking_id'];

    $isLogin = isset($_SESSION["email"]);
    $userData = $users->getUserById($userId);
    if ($isLogin && !empty($userData)) {
        $bookings->delete($bookingId);
        header("Location: /profile.php");
        die();
    } else {
        header("Location: /login.php");
        die();
    }
}
