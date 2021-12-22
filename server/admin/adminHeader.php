<?php
session_start();

$isLogin = isset($_SESSION["admin_email"]);
if ($isLogin) {
    $username = $_SESSION["username"];
    $profile_pic = $_SESSION["profile_pic"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />

    <link href="/css/global.css" rel="stylesheet" />
    <link href="/css/navigation.css" rel="stylesheet" />
    <link href="/css/footer.css" rel="stylesheet" />
    <link href="/css/home.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/about.css" />
    <link rel="stylesheet" href="/css/faq.css">
    <link rel="stylesheet" href="/css/main.css" />
    <!-- <link rel="stylesheet" href="css/Contact.css"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
    <link href="/css/responsive.css" rel="stylesheet">
    <!--Slick-->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" />
    <title>Guatemala-Admin</title>
</head>
<nav class="admin-nav" style="background-color: #D4FFFF;">
    <div class="left-section">
        <a class="navbar-brand" href="/">
            <img src="/img/logo.png" alt="brand-logo" style="width: 150px">
        </a>
        <div class="links">
            <a href="/admin">Dashboard</a>
            <a href="/admin/users.php">Users</a>
            <a href="/admin/bookings.php">Bookings</a>
            <a href="/admin/shuttles.php">Shuttles</a>
            <a href="/admin/admin.php">Admins</a>
        </div>
    </div>
    <div class="right-section" style="display: flex; align-items: center;">
        <div class="profile">
            <img class="profile-picture" style="margin: 0px; width: 20%; height: 20%; border-radius: 50%" src="<?php echo $profile_pic; ?>" alt="avatar" id="user-nav-p-img" />
            <div class="btn-group">
                <button style="background-color: transparent; color: black; border: none;" class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo $username ?>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/admin/adminProfile.php">View Profile</a></li>
                    <li><a class="dropdown-item" href="/logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>