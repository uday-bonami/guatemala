<?php
session_start();
$isLogin = isset($_SESSION["email"]);
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
    <!-- <link rel="stylesheet" href="/css/faq.css"> -->
    <link rel="stylesheet" href="/css/main.css" />
    <link rel="stylesheet" href="css/Contact.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
    <link href="/css/responsive.css" rel="stylesheet">
    <!--Slick-->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" />
    <title>Guatemala</title>
</head>

<body>
    <nav class="user-nav" style="background-color: #D4FFFF;">
        <div class="left-section" style="display: block">
            <a class="navbar-brand" href="/">
                <img src="/img/logo.png" alt="brand-logo" style="width: 150px">
            </a>
        </div>
        <div class="right-section">
            <?php if (!$isLogin) : ?>
                <a style="background: #1E3D57;
                        box-shadow: 0px 4px 13px 5px rgba(0, 0, 0, 0.25);
                        border-radius: 10px;padding: 10px 20px; color: white" class="sign-btn" href="/login.php">Sign in</a>
            <?php else : ?>
                <div class="profile">
                    <img class="profile-picture" style="margin: 0px;" src="<?php echo $profile_pic; ?>" alt="avatar" id="user-nav-p-img" />
                    <div class="btn-group">
                        <button style="background-color: transparent; color: black; border: none;" class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $username ?>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/profile.php">View Profile</a></li>
                            <li><a class="dropdown-item" href="/logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </nav>