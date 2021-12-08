<?php
session_start();
if (!isset($_SESSION['admin_email']) && empty($_SESSION["admin_email"])) {
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
                    <div class="list">
                        <div class="avatar-container">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="rgb(236, 236, 236)" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            </svg>
                        </div>
                        <div class="details">
                            <h5>Users Name</h5>
                            <span class="subtitle">username@mail.com</span>
                        </div>
                    </div>
                    <div class="list">
                        <div class="avatar-container">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="rgb(236, 236, 236)" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            </svg>
                        </div>
                        <div class="details">
                            <h5>Users Name</h5>
                            <span class="subtitle">username@mail.com</span>
                        </div>
                    </div>
                    <div class="list"></div>
                    <div class="list"></div>
                    <div class="list"></div>
                    <div class="list"></div>
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