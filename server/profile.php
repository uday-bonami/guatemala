<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("Location: /login.php");
    die();
}

require "./model/users.php";

$email = $_SESSION["email"];

$users = new Users();
$userData = $users->read($email)[0];


function getHeader()
{
    require "./getHeader.php";
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
    <title>Guatemala</title>
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top navbar" style="background-color: #D4FFFF">
        <a class="navbar-brand" href="/">
            <img src="/img/logo.png" alt="brand-logo" style="width: 150px">
        </a>
    </nav>
    <div class="center">
        <div class="profile">
            <img src="/user_content/default.png" alt="profile-picture" class="profile-picture">
            <div style="display: flex;justify-content: center;flex-direction:column">
                <h1><?php echo $userData['username'] ?></h1>
                <a href="#"><?php echo $userData['email'] ?></a>
            </div>
        </div>
    </div>
    <div class="center" style="width: 100%; height: 375px">
        <div class="card" style="width: 70%;height: 100%;padding: 0px;">
            <div class="tabs" style="grid-template-columns: 20% 80%;height: 100%;">
                <div class="btn-section" style="width: 100%; height: 100%;display: block">
                    <div class="tabs-btn">
                        <button class="tab-btn active">Bookings</button>
                        <button class="tab-btn"> Cancled Bookings</button>
                        <button class="tab-btn">Profile Settings</button>
                    </div>
                </div>
                <div class="content-section">
                    <div class="tabs-content">
                        <div class="tab-content-active">test1</div>
                        <div class="tab-content">test2</div>
                        <div class="tab-content">test3</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/index.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="/js/global.js"></script>
    <script>
        $('.responsive2').slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        infinite: true,
                        dots: false,
                        nav: true,
                    }
                },
                {
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    </script>
</body>

</html>