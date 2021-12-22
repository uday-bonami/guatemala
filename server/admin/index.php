<?php
session_start();
require "../model/users.php";
require "../model/bookings.php";

$users = new Users();
$bookings = new Bookings();
$recentUsers = $users->getRecentUsers();
$recentBookings = $bookings->getRecentBookings();

function getUsername($userId)
{
    $users = new Users();
    $userData = $users->getUserById($userId);
    $username = $userData[0]['username'];
    return $username;
}

if (!isset($_SESSION['admin_email'])) {
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
?>

<?php getHeader(); ?>
<style>
    img.avatar {
        border-radius: 50%;
    }
</style>
<main>
    <div class="cards" style="flex-direction: column;">
        <h1>Site Pages</h1>
        <div class="cards" style="padding: 20px">
            <div class="card">
                <img src="/img/about.svg" class="card-img-top" alt="about">
                <div class="card-body">
                    <h5 class="card-title" style="font-weight: bold">About Page</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="/admin/editor" style="border-radius: 100px;padding: 5px 25px;border: none; background-color: #2F2E41;" class="btn btn-primary">Update</a>
                </div>
            </div>
            <div class="card">
                <img src="/img/faq.svg" class="card-img-top" alt="faq">
                <div class="card-body">
                    <h5 class="card-title" style="font-weight: bold">FAQ Page</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="/admin/editor" style="border-radius: 100px;padding: 5px 25px;border: none; background-color: #2F2E41;" class="btn btn-primary">Update</a>
                </div>
            </div>
            <div class="card">
                <img src="/img/blog.svg" class="card-img-top" alt="blog">
                <div class="card-body">
                    <h5 class="card-title" style="font-weight: bold">Blog Page</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="/admin/editor" style="border-radius: 100px;padding: 5px 25px;border: none; background-color: #2F2E41;" class="btn btn-primary">Update</a>
                </div>
            </div>
        </div>
    </div>
    <section class="users-bookings">
        <section id="join-users">
            <div class="card user-section" style="width: 100%;height: 678px">
                <div class="c-header">
                    <h4 class="card-title">Recently Joined Users</h4>
                </div>
                <div class="list-container">
                    <?php foreach ($recentUsers as $user) : ?>
                        <div class="list">
                            <div class="avatar-container" style="background-color: transparent">
                                <?php if ($user['profile_pic']) : ?>
                                    <img class="avatar" width="80px" height="80px" src="<?php echo "/" . $user['profile_pic'] ?>" alt="profile-pic">
                                <?php else : ?>
                                    <img class="avatar" width="80px" height="80px" src="/user_content/default.png" alt="profile-pic">
                                <?php endif; ?>
                            </div>
                            <div class="details">
                                <h5><?php echo $user['username'] ?></h5>
                                <span class="subtitle"><?php echo $user["email"] ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <section id="recent-bookings">
            <div class="card user-section" style="width: 100%;height: 678px">
                <div class="c-header">
                    <h4 class="card-title">Most Recent Bookings</h4>
                </div>
                <div class="table" style="box-shadow: none; margin-top: 0px;">
                    <div class="t-row thead">
                        <span class="t-data t-data-b">id</span>
                        <span class="t-data">username</span>
                        <span class="t-data">Shuttle Name</span>
                        <span class="t-data">Date</span>
                        <span class="t-data">Return Date</span>
                        <span class="t-data">Total Passenger</span>
                        <span class="t-data">Booking price</span>
                    </div>
                    <?php foreach ($recentBookings as $_booking) : ?>
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
        </section>
    </section>
</main>
<?php getFooter(); ?>