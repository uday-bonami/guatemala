<?php
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
            <a href="#">Bookings</a>
            <a href="/admin/shuttles.php">Shuttles</a>
            <a href="#">Admins</a>
            <a href="/admin/pages.php">Pages</a>
        </div>
    </div>
    <div class="right-section">
        <div class="profile">
            <img class="profile-content" src="/img/avatar.svg" alt="admin-avatar" id="admin-nav-p-img" />
            <span class="admin-name profile-content">Admin Name</span>
            <div class="drop-down profile-content">
                <svg xmlns="http://www.w3.org/2000/svg" height="36px" viewBox="0 0 24 24" width="36px" fill="#1E3D57">
                    <path d="M0 0h24v24H0z" fill="none" />
                    <path d="M16.59 8.59L12 13.17 7.41 8.59 6 10l6 6 6-6z" />
                </svg>
            </div>
        </div>
    </div>
</nav>