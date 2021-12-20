<?php
session_start();
require "./model/bookings.php";
require "./model/shuttles.php";

$userId = $_GET["user_id"];
$shuttleId = $_GET["shuttle_id"];
$bookingPrice = $_GET["booking_price"];
$isLogin = isset($_SESSION["email"]);
$booking = new Bookings();
$shuttles = new Shuttles();

$result = $shuttles->getShuttleById($shuttleId);

if ($isLogin && !empty($userId) && !empty($result) && !empty($shuttleId) && !empty($bookingPrice)) {
    $data = array(
        "user_id" => $userId,
        "shuttle_id" => $shuttleId,
        "booking_price" => $bookingPrice
    );
    $booking->create($data);
} else {
    header("Location: /");
    die();
}

?>
<?php require "./userHeader.php" ?>
<div class="center">
    <h1>Thank you</h1>
    <h4>Your shuttle is successful booked</h4>
</div>
<?php require "./getFooter.php" ?>