<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("Location: /login.php");
    die();
}

require "./model/users.php";

$email = $_SESSION["email"];

$users = new Users();
$userData = $users->read($email);

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
    <h1><?php echo $email ?></h1>
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