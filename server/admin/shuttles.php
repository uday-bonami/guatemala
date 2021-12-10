<?php
require "../model/shuttles.php";

session_start();

if (!isset($_SESSION["admin_email"])) {
    header("Location: /admin/adminLogin.php");
    die();
}

function getHeaders()
{
    require "./adminHeader.php";
}

function getFooter()
{
    require "./adminFooter.php";
}

function getShuttles()
{
    $shuttles = new Shuttles();
    return $shuttles->read();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $shuttleName = $_POST["shuttle-name"];
    $shuttlePrice = $_POST["shuttle-price"];
    $capcity = $_POST["capcity"];
    $date = $_POST["date"];
    $returnDate = $_POST["return-date"];

    $data = array(
        "shuttle_name" =>  $shuttleName,
        "price" => $shuttlePrice,
        "passenger_capacity" => $capcity,
        "date" => $date,
        "return_date" => $returnDate
    );
    $shuttles = new Shuttles();
    $shuttles->create($data);
}

$shuttles = getShuttles();
?>

<?php getHeaders(); ?>
<div class="container">
    <div class="c-container">
        <h1>Shuttles</h1>
        <button class="c-button" id="open-popup">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                <path d="M0 0h24v24H0z" fill="none" />
                <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" />
            </svg>
            Add
        </button>
    </div>
    <div class="c-container" style="padding: 0px 25px">
        <div class="input-container">
            <input type="text" style="border: none; width: 100%;margin: 0px" id="search" class="c-input" placeholder="Search by name" />
            <svg xmlns="http://www.w3.org/2000/svg" height="35px" viewBox="0 0 24 24" width="35px" fill="rgba(0, 0, 0, 0.67)">
                <path d="M0 0h24v24H0z" fill="none" />
                <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
            </svg>
        </div>
    </div>
    <div id="popup" style="display: none">
        <div class="card" style="box-shadow: none; width: 50%; position: relative;">
            <div class="close-btn">
                <button type="button" id="popup-close" class="btn-close popup-close" aria-label="Close"></button>
            </div>
            <div class="popup-body" style="padding: 15px;">
                <h3>Add Shuttles</h3>
                <div class="form-container">
                    <form method="post" style="padding: 35px;">
                        <input type="text" placeholder="Enter Shuttle Name" name="shuttle-name" class="c-input">
                        <input type="number" placeholder="Enter Shuttle Price" name="shuttle-price" class="c-input">
                        <input type="number" placeholder="Passenger capacity" name="capcity" class="c-input">
                        <input type="date" placeholder="Date" name="date" class="c-input">
                        <input type="date" placeholder="Return Date" name="return-date" class="c-input">
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
            <span class="t-data">Shuttle</span>
            <span class="t-data">Price</span>
            <span class="t-data">Capacity</span>
            <span class="t-data">Date</span>
            <span class="t-data">Return Date</span>
            <span class="t-data">Edit</span>
        </div>
        <?php foreach ($shuttles as $shuttle) : ?>
            <div class="t-row t-body">
                <span class="t-data t-data-b"><?php echo $shuttle["id"] ?></span>
                <span class="t-data"><?php echo $shuttle["shuttle_name"] ?></span>
                <span class="t-data">$<?php echo $shuttle["price"] ?></span>
                <span class="t-data"><?php echo $shuttle["passenger_capacity"] ?></span>
                <span class="t-data"><?php echo $shuttle["_date"] ?></span>
                <span class="t-data"><?php echo $shuttle["return_date"] ?></span>
                <span class="t-data"><a href="#">Edit</a></span>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php getFooter(); ?>