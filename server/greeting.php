<?php
session_start();
require "./model/bookings.php";
require "./model/shuttles.php";

$userId = $_GET["user_id"];
$shuttleName = $_GET["shuttle_name"];
$_date = $_GET["date"];
$shuttleId = $_GET["shuttle_id"];
$returnDate = $_GET["return_date"];
$bookingPrice = $_GET["booking_price"];
$isLogin = isset($_SESSION["email"]);
$totalPassenger = $_GET["total_passenger"];
$shuttles = new Shuttles();

$result = $shuttles->getShuttleById($shuttleId);
if (
    $isLogin &&
    !empty($userId) &&
    !empty($result) &&
    !empty($shuttleId) &&
    !empty($bookingPrice) &&
    !empty($totalPassenger)
) {
    $booking = new Bookings();
    $data = array(
        "user_id" => $userId,
        "shuttle_name" => $shuttleName,
        "booking_price" => $bookingPrice,
        "_date" => $_date,
        "return_date" => $returnDate,
        "shuttle_id" => $shuttleId,
        "total_passenger" => $totalPassenger
    );
    $booking->create($data);
} else {
    header("Location: /");
    die();
}

?>
<?php require "./userHeader.php" ?>
<div class="center" style="height: 50vh">
    <h1>Thank you</h1>
    <h4>Your shuttle is successful booked</h4>
</div>
<?php require "./getFooter.php" ?>