<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("Location: /login.php");
    die();
}

require "./model/users.php";

$email = $_SESSION["email"];

function uploadFile($fileObj)
{
    $exceptedTypes = array("jpg", "png", "jpeg");
    $fileType = strtolower(explode("/", $fileObj["type"])[1]);

    if (in_array($fileType, $exceptedTypes)) {
        $imgSize = getimagesize($fileObj["tmp_name"]);
        if ($imgSize[0] === $imgSize[1] && $imgSize[0] < 1000 && $imgSize[1] < 1000) {
            $fileName = uniqid("", true) . "." . $fileType;
            $fileDestination = "user_content/" . $fileName;
            move_uploaded_file($fileObj["tmp_name"], $fileDestination);
            return $fileDestination;
        } else {
            echo "Invalid upload try to upload a smaller image";
        }
    }
}

$users = new Users();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userData = $users->read($email)[0];
    $username = $userData["username"];
    $updateData = array();
    $updatedFeilds = array();
    $updatedData = array();

    if ($username !== $_POST["username"]) {
        $updatedUsername = $_POST["username"];
        array_push($updatedFeilds, "username");
        $updatedData["username"] = $updatedUsername;
    }
    $selectFile = $_FILES["profile-img"];

    if ($selectFile["size"] !== 0) {
        $fileLocation = uploadFile($selectFile);
        if ($fileLocation) {
            array_push($updatedFeilds, "profile_pic");
            $updatedData["profile_pic"] = $fileLocation;
        }
    }

    if (!empty($updatedData) && !empty($updatedFeilds)) {
        $updateData["updateFeild"] = $updatedFeilds;
        $updateData["data"] = $updatedData;
        $users->update($updateData, $userData["id"]);
    }
}

$userData = $users->read($email)[0];
$profilePic = ($userData["profile_pic"]) ? $userData["profile_pic"] : "/user_content/default.png";


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
    <!-- <link href="/css/navigation.css" rel="stylesheet" /> -->
    <!-- <link href="/css/footer.css" rel="stylesheet" /> -->
    <!-- <link href="/css/home.css" rel="stylesheet" /> -->
    <!-- <link rel="stylesheet" href="/css/about.css" /> -->
    <!-- <link rel="stylesheet" href="/css/faq.css"> -->
    <link rel="stylesheet" href="/css/main.css" />
    <!-- <link rel="stylesheet" href="css/Contact.css"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
    <!-- <link href="/css/responsive.css" rel="stylesheet"> -->
    <!--Slick-->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" />
    <title>Guatemala</title>
</head>

<body>
    <style>
        div.form-group {
            margin: 10px 0px;
        }
    </style>
    <nav class="user-nav" style="background-color: #D4FFFF;">
        <div class="left-section" style="display: block">
            <a class="navbar-brand" href="/">
                <img src="/img/logo.png" alt="brand-logo" style="width: 150px">
            </a>
        </div>
        <div class="right-section">
            <div class="profile">
                <img class="profile-picture" style="margin: 0px" src="<?php echo $profilePic; ?>" alt="avatar" id="user-nav-p-img" />
                <div class="btn-group">
                    <button style="background-color: transparent; color: black; border: none;" class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $userData["username"] ?>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item active" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="center">
        <div class="profile">
            <img src="<?php echo $profilePic ?>" alt="profile-picture" width="260px" height="260px" class="profile-picture">
            <div style="display: flex;justify-content: center;flex-direction:column">
                <h1><?php echo $userData['username'] ?></h1>
                <a href="#"><?php echo $userData['email'] ?></a>
            </div>
        </div>
    </div>
    <div class="center" style="width: 100%; height: 375px">
        <div class="card" style="width: 80%;height: 100%;padding: 0px;">
            <div class="tabs" style="grid-template-columns: 20% 80%;height: 100%;">
                <div class="btn-section" style="width: 100%; height: 100%;display: block">
                    <div class="tabs-btn">
                        <button class="tab-btn active">Bookings</button>
                        <button class="tab-btn"> Cancled Bookings</button>
                        <button class="tab-btn">Profile Settings</button>
                    </div>
                </div>
                <div class="content-section" style="padding: 20px">
                    <div class="tabs-content">
                        <div class="tab-content-active">test1</div>
                        <div class="tab-content">test2</div>
                        <div class="tab-content">
                            <form action="/profile.php" method="post" style="display: block" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="input-username">Username</label>
                                    <input type="text" name="username" class="form-control" value="<?php echo $userData["username"]; ?>" id="input-username" aria-describedby="update username" placeholder="Enter username">
                                </div>
                                <div class="form-group">
                                    <label for="input-email">Email</label>
                                    <input type="email" readonly class="form-control" id="input-email" placeholder="email" value="<?php echo $userData["email"]; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="update-profile-img">Profile img</label>
                                    <input type="file" name="profile-img" class="form-control-file" id="update-profile-img">
                                </div>
                                <button type="submit" class="btn btn-outline-info">Update</button>
                            </form>
                        </div>
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