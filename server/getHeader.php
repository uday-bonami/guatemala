<?php
session_start();
require "./model/users.php";
$isLogin = isset($_SESSION["email"]);
if ($isLogin) {
    $users = new Users();
    $userData = $users->read($_SESSION["email"])[0];
    $profile_pic = $userData['profile_pic'] ? $userData["profile_pic"] : "/user_content/default.png";
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

    <link href="css/global.css" rel="stylesheet" />
    <link href="css/navigation.css" rel="stylesheet" />
    <link href="css/footer.css" rel="stylesheet" />
    <link href="css/home.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/about.css" />
    <link rel="stylesheet" href="css/faq.css">
    <!-- <link rel="stylesheet" href="/css/main.css" /> -->
    <!-- <link rel="stylesheet" href="css/Contact.css"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
    <link href="css/responsive.css" rel="stylesheet">
    <!--Slick-->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" />
    <title>Guatemala</title>
</head>

<body>
    <!-- navgation  -->
    <header class="position-absolute w-100 mt-4">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container px-5 py-2 NavbarDiv">
                <a class="navbar-brand" href="index.html">
                    <img src="img/logo.png" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse ms-auto text-center justify-content-center bg-dark-small" id="navbarSupportedContent">
                    <ul class="navbar-nav  mb-2 mb-lg-0 py-2">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./about.html">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./LearnMore.html">Learn more</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./faq.html">FAQ</a>
                        </li>
                        <!-- <li class="nav-item">
              <a class="nav-link" href="./Contact.html">Contact</a>
            </li> -->
                    </ul>
                </div>
                <?php if (!$isLogin) : ?>
                    <a style="background: #1E3D57;
                        box-shadow: 0px 4px 13px 5px rgba(0, 0, 0, 0.25);
                        border-radius: 10px;padding: 10px 20px; color: white" class="sign-btn" href="/login.php">Sign in</a>
                <?php else : ?>
                    <div class="profile">
                        <img class="profile-picture" style="margin: 0px; width: 10%; height: 10%; border-radius: 50%" src="<?php echo $profile_pic; ?>" alt="avatar" id="user-nav-p-img" />
                        <div class="btn-group">
                            <button style="background-color: transparent; color: black; border: none;" class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $userData["username"] ?>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/profile.php">View Profile</a></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </nav>
    </header>