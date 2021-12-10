<?php
require "./model/users.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $comformPassword = $_POST["comform-password"];
    if (!empty($name) && !empty($email) && !empty($password) && !empty($comformPassword)) {
        if ($password === $comformPassword) {
            $users = new Users();
            $password = sha1($password);
            $data = array(
                "username" => $name,
                "email" => $email,
                "password" => $password,
                "role" => "user",
            );
            $users->create($data);
        } else {
            echo "Password did not match";
        }
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
    <div class="container-center" style="height: 90vh">
        <div class="card" style="width: 30%;height: 60%; padding: 20px">
            <div class="center">
                <h2>Welcome</h2>
                <h5>To Guatwmala Shuttles</h5>
            </div>
            <div class="center" style="height: 70%">
                <form action="/createAccount.php" method="post">
                    <input class="custom-input" required type="text" name="username" placeholder="Enter your name" />
                    <input class="custom-input" required type="email" name="email" placeholder="Enter email" />
                    <input class="custom-input" required type="password" name="password" name="password" placeholder="Enter password" />
                    <input class="custom-input" required type="password" name="comform-password" name="password" placeholder="Conform password" />
                    <button class="com-btn" type="submit">Create</button>
                </form>
            </div>
            <div class="center">
                <footer style="width: 80%; text-align: center">&#169; Copyrights 2021 Bonami Software. All rights reserved</footer>
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