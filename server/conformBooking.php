<?php
session_start();
require "./model/shuttles.php";
require "./calculateBookings.php";

$shuttle = new Shuttles();
$shuttleId = $_GET["id"];
$totalPassenger = $_GET["total_passenger"];
$calculateAvailableSeats = new CalculateAvailableSeats($shuttleId);
$availableSeats = $calculateAvailableSeats->getTotalSeats();

$selectedShuttleData = $shuttle->getShuttleById($shuttleId)[0];
$pricePerSeats = $selectedShuttleData["price"];

$isLogin = isset($_SESSION["email"]);
if ($isLogin) {
    $username = $_SESSION["username"];
    $profile_pic = $_SESSION["profile_pic"];
    $userId = $_SESSION["user_id"];
} else {
    header("Location: /login.php");
    die();
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
    <script src="https://unpkg.com/vue@next"></script>
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
    <style>
        div.grid {
            display: grid;
            width: 100%;
            grid-template-columns: 60% 40%;
        }

        div.carousel {
            width: 100%;
            height: 800px;
        }

        div.carousel-item {
            width: 100%;
            height: 100%;
            background-size: cover;
        }

        img.carousel-img {
            width: 100%;
            height: 100%;
            background-size: cover;
        }

        div.about {
            padding-top: 30px;
        }

        div.right-side-content {
            width: 100%;
            height: 100%;
            padding: 20px;
        }

        div.left-side-content {
            padding: 20px;
        }

        div.shuttle-detaile {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 10px
        }

        div.shuttle-detaile>span {
            font-size: 20px;
        }

        button.counter-btn {
            background-color: #68EFEF;
            padding: 5px 10px;
            border-radius: 10px;

        }

        div.counter {
            display: flex;
            border: 1px solid rgba(0, 0, 0, 0.33);
            align-items: center;
            border-radius: 10px;
        }
    </style>
    <div class="grid">
        <div class="left-side-content">
            <h1><?php echo $selectedShuttleData["shuttle_name"] ?></h1>
            <div class="section-container" style="padding-top: 40px">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner" style="width: 100%; height: 100%;">
                        <div class="carousel-item active">
                            <img class="carousel-img" src="<?php echo $selectedShuttleData["preview1"] ?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img class="carousel-img" src="<?php echo $selectedShuttleData["preview2"] ?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img class="carousel-img" src="<?php echo $selectedShuttleData["preview3"] ?>" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="about">
                    <h2>About the shuttle</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Aut atque sequi asperiores praesentium! Ducimus laboriosam
                        velit mollitia. Iusto suscipit culpa error consequatur odio
                        vero excepturi, cumque praesentium minima deleniti!
                        Dignissimos!
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam, in maiores, corrupti illo dolore iure reiciendis rerum inventore incidunt quaerat, placeat voluptatum. Doloremque provident aliquid exercitationem odio, deserunt ea vero aperiam pariatur excepturi amet, dolore facere, cum dicta. Aliquid labore porro quibusdam nam voluptatum harum ipsa voluptas ut fugiat dolor.
                    </p>
                </div>
            </div>
        </div>
        <div class="right-side-content">
            <div class="card" style="width:100%; padding: 20px; position: sticky; top: 40px;margin-top: 40px">
                <div id="v-app">
                    <h4 class="card-title">{{shuttleName}}</h4>
                    <div class="shuttle-detaile">
                        <span>Total seats:</span>
                        <span>{{totalSeats}}</span>
                    </div>
                    <div class="shuttle-detaile">
                        <span>Available seats:</span>
                        <span>{{availableSeats}}</span>
                    </div>
                    <div class="shuttle-detaile">
                        <span>Pickup Time:</span>
                        <span><?php echo $selectedShuttleData["pickup_time"] ?></span>
                    </div>
                    <div class="shuttle-detaile">
                        <span>Arrival Time:</span>
                        <span><?php echo $selectedShuttleData["arrival_time"] ?></span>
                    </div>
                    <div class="shuttle-detaile">
                        <span>Number of pasenger:</span>
                        <div class="counter">
                            <button @click="add" type="button" class="counter-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                                </svg>
                            </button>
                            <span style="margin: 0px 10px">{{numberOfPassenger}}</span>
                            <button @click="sub" type="button" class="counter-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path d="M19 13H5v-2h14v2z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="shuttle-detaile">
                        <span><b>Total price:</b></span>
                        <span>${{totalPrice}}</span>
                    </div>
                    <div class="buttons">
                        <button @click="book" style="background-color: #68EFEF; color: black; border: none" class="btn btn-primary">Book</button>
                        <a class="btn btn-outline-info" href="/" role="button">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const vue = Vue.createApp({
            data() {
                return {
                    shuttleName: "<?php echo $selectedShuttleData["shuttle_name"]; ?>",
                    totalSeats: "<?php echo $selectedShuttleData["passenger_capacity"] ?>",
                    availableSeats: <?php echo $availableSeats ?>,
                    totalPrice: <?php echo $_GET["total_passenger"] * $pricePerSeats ?>,
                    numberOfPassenger: <?php echo $_GET["total_passenger"] ?>,
                    valuePerSeat: <?php echo $pricePerSeats ?>
                }
            },

            methods: {
                add() {
                    if (this.numberOfPassenger !== this.availableSeats) {
                        this.numberOfPassenger++;
                        this.totalPrice += this.valuePerSeat;
                    }
                },

                sub() {
                    if (this.numberOfPassenger !== 1) {
                        this.numberOfPassenger--;
                        this.totalPrice -= this.valuePerSeat;
                    }
                },

                book() {
                    window.location.replace(`/greeting.php/?shuttle_id=<?php echo $shuttleId ?>&user_id=<?php echo $userId ?>&shuttle_name=<?php echo $selectedShuttleData["shuttle_name"] ?>&date=<?php echo $selectedShuttleData["_date"] ?>&return_date=<?php echo $selectedShuttleData["return_date"] ?>&booking_price=${this.totalPrice}&total_passenger=${this.numberOfPassenger}`);
                }
            }
        });
        vue.mount("#v-app");
    </script>
    <?php require "./getFooter.php" ?>