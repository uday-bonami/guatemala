<?php
require "./model/users.php";

function getUserData($email)
{
    $user = new Users();
    $userData = $user->read($userEmail = $email);
    return $userData;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $userData = getUserData($email)[0];
    $userPassword = $userData["password"];
    if (sha1($password) === $userPassword) {
        session_start();
        $_SESSION["email"] = $email;
        $_SESSION["username"] = $userData["username"];
        $_SESSION["profile_pic"] = $userData["profile_pic"] ? "/" . $userData["profile_pic"] : "/user_content/default.png";
        $_SESSION["user_id"] = $userData["id"];
        header("Location: /profile.php");
        die();
    } else {
        print_r($userData);
        echo "Invalid password or email";
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
    <title>Guatemala</title>
</head>

<body>
    <style>
        button.com-btn {
            margin: 0px 10px;
        }
    </style>
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
            <div class="center" style="height: 55%">
                <form action="/login.php" method="post">
                    <input class="custom-input" type="email" name="email" placeholder="Enter email" />
                    <input class="custom-input" type="password" name="password" name="password" placeholder="Enter password" />
                    <a href="#" style="width: 85%; text-align: right;">forget password?</a>
                    <div class="buttons">
                        <button class="com-btn" type="submit">Sign in</button>
                        <button id="create-account" type="button" style="background-color: #1F4056; color: white" class="com-btn">Create Account</button>
                    </div>
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
        const createAccountBtn = document.getElementById('create-account');
        if (createAccountBtn) {
            createAccountBtn.onclick = () => window.location.replace('/createAccount.php');
        }
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