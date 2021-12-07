<?php
require "../model/users.php";

$users = new Users();
function getHeader()
{
    require "./adminHeader.php";
}

function getFooter()
{
    require "./adminFooter.php";
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $adminData = $users->getAdmins($email);
    if ($password === $adminData[0]["password"]) {
        session_start();
        $_SESSION["admin_email"] = $email;
        echo $_SESSION["admin_email"];
        header("Location: /admin/");
        die();
    }
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

<body>
    <nav class="navbar navbar-default navbar-fixed-top navbar" style="background-color: #D4FFFF">
        <a class="navbar-brand" href="/">
            <img src="/img/logo.png" alt="brand-logo" style="width: 150px">
        </a>
    </nav>
    <div class="container-center">
        <div class="card" style="height: 50%">
            <div class="center">
                <h2>Welcome, Back</h2>
                <span>For admins at Guatemalam Shuttles.</span>
            </div>
            <div class="center" style="height: 60%">
                <form action="/admin/adminLogin.php" method="post">
                    <input class="custom-input" type="email" name="email" placeholder="Enter email" />
                    <input class="custom-input" type="password" name="password" name="password" placeholder="Enter password" />
                    <button class="com-btn" type="submit">Sign in</button>
                </form>
            </div>
            <div class="center">
                <footer style="width: 80%; text-align: center">&#169; Copyrights 2021 Bonami Software. All rights reserved</footer>
            </div>
        </div>
    </div>
    <?php getFooter(); ?>