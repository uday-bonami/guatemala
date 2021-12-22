<?php
session_start();
require "../model/users.php";

$users = new Users();
$recentUsers = $users->getRecentUsers();

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
    <section class="statics">
        <div class="cards">
            <div class="card statics-card card-activate" style="background-color: #8CF0F0">
                <h4 class="statics statics-card">120k</h4>
                <span>Requests per day</span>
            </div>
            <div class="card statics-card">
                <h4 class="statics ">129k</h4>
                <span>New Users Register</span>
            </div>
            <div class="card statics-card">
                <h4 class="statics">140k</h4>
                <span>Booking Registers</span>
            </div>
        </div>
        <section class="graph">
            <div class="graph-container">
                <div class="card" style="width:87%;margin-top: 20px;height: 471px;padding: 15px;box-shadow: 0px 4px 19px 4px rgba(0, 0, 0, 0.25);">
                    <h5 class="card-title">Site traffic</h5>
                    <canvas id="graph" style="height: 100%"></canvas>
                </div>
            </div>
        </section>
    </section>
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
                    <div class="c-column c-thead">
                        <span class="thead-data">Date</span>
                        <span class="thead-data">From</span>
                        <span class="thead-data">Destination</span>
                        <span class="thead-data">Return Date</span>
                        <span class="thead-data">Passenger</span>
                        <span class="thead-data">Status</span>
                    </div>
                </div>
            </div>
        </section>
    </section>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.1/chart.min.js"></script>
<script src="/js/chart.js"></script>
<?php getFooter(); ?>