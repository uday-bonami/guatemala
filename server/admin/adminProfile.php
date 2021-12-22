<?php
session_start();
require "../model/users.php";

$adminEmail = $_SESSION["admin_email"];
$users = new Users();

function uploadFile($fileObj)
{
    $exceptedTypes = array("jpg", "png", "jpeg");
    $fileType = strtolower(explode("/", $fileObj["type"])[1]);

    if (in_array($fileType, $exceptedTypes)) {
        $imgSize = getimagesize($fileObj["tmp_name"]);
        if ($imgSize[0] === $imgSize[1] && $imgSize[0] < 1000 && $imgSize[1] < 1000) {
            $fileName = uniqid("", true) . "." . $fileType;
            $fileDestination = "../user_content/" . $fileName;
            move_uploaded_file($fileObj["tmp_name"], $fileDestination);
            return $fileDestination;
        } else {
            echo "Invalid upload try to upload a smaller image";
        }
    } else {
        echo "Invalid file type. " . $fileType . " is not excepted.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userData = $users->read($adminEmail)[0];
    $username = $userData["username"];
    $email = $userData["email"];
    $updateData = array();
    $updatedFeilds = array();
    $updatedData = array();

    if ($username !== $_POST["username"]) {
        $updatedUsername = $_POST["username"];
        array_push($updatedFeilds, "username");
        $updatedData["username"] = $updatedUsername;
    }

    if ($email !== $_POST["email"]) {
        $updateEmail = $_POST["email"];
        array_push($updatedFeilds, "email");
        $updatedData["email"] = $updateEmail;
    }

    $selectFile = $_FILES["profile-pic"];

    if ($selectFile["size"] !== 0) {
        $fileLocation = uploadFile($selectFile);
        if ($fileLocation) {
            array_push($updatedFeilds, "profile_pic");
            $updatedData["profile_pic"] = $fileLocation;
            $_SESSION["profile_pic"] = $fileLocation;
        }
    }

    if (!empty($updatedData) && !empty($updatedFeilds)) {
        $updateData["updateFeild"] = $updatedFeilds;
        $updateData["data"] = $updatedData;
        $users->update($updateData, $userData["id"]);
    }
    header("Location: /admin/adminProfile.php");
    die();
}
$userData = $users->read($userEmail = $adminEmail)[0];
$profilePic = $userData["profile_pic"] ? $userData["profile_pic"] : "/user_content/default.png";
?>
<?php require "./adminHeader.php" ?>
<div class="center" style="border-bottom: 1px solid #F8F8FF">
    <div class="profile">
        <img src="<?php echo $profilePic ?>" alt="profile-picture" width="260px" height="260px" class="profile-picture">
        <div style="display: flex;justify-content: center;flex-direction:column">
            <h1><?php echo $userData['username'] ?></h1>
            <a href="#"><?php echo $userData['email'] ?></a>
        </div>
    </div>
</div>
<div class="container" style="padding: 20px">
    <h2>Profile Settings</h2>
    <div class="container">
        <form enctype="multipart/form-data" action="/admin/adminProfile.php" method="post">
            <input type="text" value="<?php echo $userData['username'] ?>" placeholder="Enter username" name="username" class="c-input">
            <input type="email" value="<?php echo $userData['email'] ?> " placeholder="Enter email" name="email" class="c-input">
            <div class="col" style="width: 100%;">
                <label for="profile-pic">Update profile pic
                </label>
                <input type="file" id="profile-pic" name="profile-pic" />
            </div>
            <div class="buttons">
                <button class="btn c-button" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
<?php require "./adminFooter.php" ?>