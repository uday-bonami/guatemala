<?php
session_start();

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
?>


<?php getHeader() ?>
<div class="container">
    <div class="c-container">
        <h1>Users</h1>
    </div>
    <div class="c-container" style="padding: 0px 25px">
        <div class="input-container">
            <input type="text" style="border: none; width: 100%;margin: 0px" id="search" class="c-input" placeholder="Search by name" />
            <svg xmlns="http://www.w3.org/2000/svg" height="35px" viewBox="0 0 24 24" width="35px" fill="rgba(0, 0, 0, 0.67)">
                <path d="M0 0h24v24H0z" fill="none" />
                <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
            </svg>
        </div>
    </div>
    <div class="table">
        <div class="t-row thead">
            <span class="t-data t-data-b">id</span>
            <span class="t-data">Shuttle</span>
            <span class="t-data">Price</span>
            <span class="t-data">Capacity</span>
            <span class="t-data">Date</span>
            <span class="t-data">Return Date</span>
            <span class="t-data">Edit</span>
        </div>
    </div>
</div>
<?php getFooter() ?>