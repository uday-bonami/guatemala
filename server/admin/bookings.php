<?php
require "../model/users.php";
require "../model/bookings.php";

function getUsername($userId)
{
    $users = new Users();
    $userData = $users->getUserById($userId);
    $username = $userData[0]['username'];
    return $username;
}

$bookings = new Bookings();
$bookingsData = $bookings->read();
?>

<?php require "./adminHeader.php" ?>
<div class="container">
    <div class="c-container">
        <h1>Bookings</h1>
    </div>
    <div class="table">
        <div class="t-row thead">
            <span class="t-data t-data-b">id</span>
            <span class="t-data">username</span>
            <span class="t-data">Shuttle Name</span>
            <span class="t-data">Date</span>
            <span class="t-data">Return Date</span>
            <span class="t-data">Total Passenger</span>
            <span class="t-data">Booking price</span>
        </div>
        <?php foreach ($bookingsData as $_booking) : ?>
            <div class="t-row t-body">
                <span class="t-data t-data-b"><?php echo $_booking["id"] ?></span>
                <span class="t-data"><?php echo getUsername($_booking['user_id']) ?></span>
                <span class="t-data"><?php echo $_booking["shuttle_name"] ?></span>
                <span class="t-data"><?php echo $_booking["_date"] ?></span>
                <span class="t-data"><?php echo $_booking["return_date"] ?></span>
                <span class="t-data"><?php echo $_booking["total_passenger"] ?></span>
                <span class="t-data">$<?php echo $_booking["booking_price"] ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php require "./adminFootter.php" ?>