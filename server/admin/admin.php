<?php
require "../model/users.php";

$users = new Users();
$usersData = $users->getAllAdminUsers();

session_start();
$isLogin = isset($_SESSION["admin_email"]);
if ($isLogin && $_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $conform_password = $_POST["conform-password"];

    if ($conform_password === $password) {
        $data = array(
            "username" => $username,
            "email" => $email,
            "password" => sha1($password),
            "role" => "admin",
            "joining_date" => date("d-m-Y")
        );
        $users->create($data);
        header("Location: /admin/admin.php");
        die();
    } else {
        header("Location: /admin/admin.php");
        die();
    }
}

?>

<?php require "./adminHeader.php" ?>
<div class="container">
    <div class="c-container">
        <h1>Admin Users</h1>
        <button class="c-button" id="open-popup">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                <path d="M0 0h24v24H0z" fill="none" />
                <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" />
            </svg>
            Add
        </button>
    </div>
    <div id="popup" style="display: none">
        <div class="card" style="box-shadow: none; width: 50%; position: relative;">
            <div class="close-btn">
                <button type="button" id="popup-close" class="btn-close popup-close" aria-label="Close"></button>
            </div>
            <div class="popup-body" style="padding: 15px;">
                <h3>Enter deatils</h3>
                <div class="form-container">
                    <form method="post" action="/admin/admin.php" style="padding: 35px; display: block;">
                        <input type="text" placeholder="Enter username" name="username" class="c-input">
                        <input type="email" placeholder="Enter email" name="email" class="c-input">
                        <input type="password" placeholder="Enter password" name="password" class="c-input">
                        <input type="password" placeholder="Conform password" name="conform-password" class="c-input">
                        <div class="buttons">
                            <button class="btn c-button" type="submit">Submit</button>
                            <a style="display: flex; align-items: center;" role="button" class="btn btn-outline-info popup-close">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="table">
        <div class="t-row thead">
            <span class="t-data t-data-b">id</span>
            <span class="t-data t-data-b">Username</span>
            <span class="t-data">Email</span>
            <span class="t-data">Joining Date</span>
            <span class="t-data">Delete</span>
        </div>
        <?php foreach ($usersData as $_userData) : ?>
            <div class="t-row t-body">
                <span class="t-data t-data-b"><?php echo $_userData["id"] ?></span>
                <span class="t-data"><?php echo $_userData["username"] ?></span>
                <span class="t-data"><?php echo $_userData["email"] ?></span>
                <span class="t-data"><?php echo $_userData["joining_date"] ?></span>

                <span class="t-data">
                    <a href="/admin/delete.php/?face=admin-user&id=<?php echo $_userData["id"] ?>" class="btn cancle-btn btn-outline-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                        </svg>
                        Delete
                    </a>
                </span>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php require "./adminFooter.php" ?>