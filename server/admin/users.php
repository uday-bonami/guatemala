<?php
session_start();
require "../model/users.php";
require "../model/bookings.php";

if (!isset($_SESSION["admin_email"])) {
    header("Location: /admin/adminLogin.php");
    die();
}

function getHeader()
{
    require "./adminHeader.php";
}

function getFooter()
{
    require "./adminFooter.php";
}

function numberOfBooking($userId)
{
    $bookings = new Bookings();
    $totalBooking = count($bookings->read($userId = $userId));
    return $totalBooking;
}

$users = new Users();

$usersData = $users->read();
?>


<?php getHeader() ?>
<div class="container">
    <div class="c-container">
        <h1>Users</h1>
    </div>
    <div class="table">
        <div class="t-row thead">
            <span class="t-data t-data-b">id</span>
            <span class="t-data">Username</span>
            <span class="t-data">email</span>
            <span class="t-data">Number of bookings</span>
            <span class="t-data">Joining Date</span>
        </div>
        <?php foreach ($usersData as $user) : ?>
            <div class="t-row t-body">
                <span class="t-data t-data-b"><?php echo $user["id"] ?></span>
                <span class="t-data t-data-b"><?php echo $user["username"] ?></span>
                <span class="t-data t-data-b"><?php echo $user["email"] ?></span>
                <span class="t-data t-data-b"><?php echo numberOfBooking($user["id"]) ?></span>
                <span class="t-data t-data-b"><?php echo $user["joining_date"] ?></span>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php getFooter() ?>