<?php
session_start();
// require "./model/users.php";
require "./model/shuttles.php";
$isLogin = isset($_SESSION["email"]);
// if ($isLogin) {
//     $users = new Users();
//     $userData = $users->read($_SESSION["email"])[0];
// }
$isLogin = false;

$from = $_GET["from"];
$destination = $_GET["destination"];
$date = $_GET["date"];
$return_date = $_GET["return_date"];
$passenger = $_GET["passenger"];

$shuttle = new Shuttles();
$shuttleData = $shuttle->read();
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
    <style>
        div.card {
            width: 100%;
        }
    </style>
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
                    <img class="profile-picture" style="margin: 0px;" src="<?php echo $userData["profile_pic"]; ?>" alt="avatar" id="user-nav-p-img" />
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
    <div class="banner">
        <img src="/img/big-logo.png" style="width: 291px; height: 71px" alt="logo">
        <div class="card" style="width: 80%; min-height: 172px; position: absolute; bottom: -93px; left: 184px">
            <div class="row  gx-0">
                <div class=" col-12 bg-white booking-form p-3 mt-3">
                    <form class="row" style="flex-direction: row">
                        <div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xxl-2">
                            <label for="inputEmail4" class="form-label">From</label>
                            <input type="text" class="form-control" name="from" placeholder="Guatemala" id="inputEmail4" />
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xxl-2">
                            <label for="inputPassword4" class="form-label">Destination</label>
                            <input type="text" name="destination" class="form-control" placeholder="Honduras" id="inputPassword4" />
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xxl-2">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" name="date" class="form-control" id="date" />
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xxl-2">
                            <label for="return" class="form-label">Return Date</label>
                            <input type="date" name="return-date" class="form-control" id="return" />
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xxl-2">
                            <label for="passenger" class="form-label">Passenger</label>
                            <input type="number" name="passenger" class="form-control" placeholder="2 Passenger" value="Passenger" id="passenger" />
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xxl-2">
                            <label for="passenger" class="form-label"></label>
                            <button class="btn main-btn text-center">Search</button>
                        </div>

                        <div class="col-12 mt-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                <label class="form-check-label" for="flexCheckDefault">
                                    Return car to different location
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 150px;">
        <div class="center">
            <?php foreach ($shuttleData as $shuttle) : ?>
                <div class="card mb-3" style="width: 100%;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?php echo $shuttle["thumbnail"] ?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $shuttle["shuttle_name"] ?></h5>
                                <p class="card-text"><?php echo $shuttle["discription"] ?></p>
                                <p class="card-text"><?php echo $shuttle["_from"] ?>-<?php echo $shuttle["_to"] ?></p>
                                <a href="#" class="btn btn-primary btn-lg">Just at $<?php echo $shuttle["price"] ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
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