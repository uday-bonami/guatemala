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
    $from = $_POST["from"];
    $to = $_POST["to"];
    $discription = $_POST["discription"];
    $returnDate = $_POST["return-date"];
    $pickupTime = $_POST["pickup_time"];
    $arrivalTime = $_POST["arrival_time"];
    $thumbnail = $_FILES["thumbnail"];
    $preview = $_FILES["preview"];


    $data = array(
        "shuttle_name" =>  $shuttleName,
        "price" => $shuttlePrice,
        "passenger_capacity" => $capcity,
        "date" => $date,
        "discription" => $discription,
        "return_date" => $returnDate,
        "_from" => $from,
        "_to" => $to,
        "pickup_time" => $pickupTime,
        "arrival_time" => $arrivalTime,
    );
    $shuttles = new Shuttles();

    try {
        if (count($preview["name"]) === 3) {
            $imgPaths = $shuttles->uploadFiles($thumbnail, $preview);
            $previewImgPath = $imgPaths[0];
            $thumbnail = explode("..", $imgPaths[1])[1];
            $previewImgPath1 = explode("..", $previewImgPath[0])[1];
            $previewImgPath2 = explode("..", $previewImgPath[1])[1];
            $previewImgPath3 = explode("..", $previewImgPath[2])[1];

            $data["preview1"] = $previewImgPath1;
            $data["preview2"] = $previewImgPath2;
            $data["preview3"] = $previewImgPath3;
            $data["thumbnail"] = $thumbnail;

            $shuttles->create($data);
            header("Location: /admin/shuttles.php");
        } else {
            throw new Exception("Select upto 3 images");
        }
    } catch (Exception $e) {
        echo strval($e);
    }
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
    <div id="popup" style="display: none">
        <div class="card" style="box-shadow: none; width: 50%;height: 75%; overflow: scroll; position: relative;">
            <div class="close-btn">
                <button type="button" id="popup-close" class="btn-close popup-close" aria-label="Close"></button>
            </div>
            <div class="popup-body" style="padding: 15px;">
                <h3>Add Shuttles</h3>
                <div class="form-container">
                    <form method="post" enctype="multipart/form-data" action="/admin/shuttles.php" style="padding: 35px; display: block;">
                        <input type="text" placeholder="Enter Shuttle Name" name="shuttle-name" class="c-input">
                        <input type="text" placeholder="from" name="from" class="c-input">
                        <input type="text" placeholder="to" name="to" class="c-input">
                        <input type="number" placeholder="Price per passenger" name="shuttle-price" class="c-input">
                        <input type="number" placeholder="Passenger capacity" name="capcity" class="c-input">
                        <div class="col">
                            <label for="date">Date</label>
                            <input type="date" id="date" placeholder="Date" name="date" class="c-input">
                            <label for="return-date">Return Date</label>
                            <input type="date" id="return-date" placeholder="Return Date" name="return-date" class="c-input">
                        </div>
                        <div class="col">
                            <label for="pickup-time">Pickup Time</label>
                            <input type="time" id="pickup-time" placeholder="Date" name="pickup_time" class="c-input">
                            <label for="arrival-time">Arrival Time</label>
                            <input type="time" id="arrival-time" placeholder="Return Date" name="arrival_time" class="c-input">
                        </div>
                        <textarea placeholder="Write a short discription" name="discription" rows="4" cols="50" style="margin-top: 0px;margin-bottom: 0px;height: 219px;border: 1px solid #0000009c;outline: none;border-radius: 5px;padding: 10px;"></textarea>
                        <div class="col" style="justify-content: space-between; margin: 10px">
                            <label class="shuttle-img" for="thumbnail">Shuttle thumbnail</label>
                            <input type="file" id="thumbnail" name="thumbnail" />
                            <label class="shuttle-img" for="preview">Shuttle preview</label>
                            <input type="file" id="preview" multiple name="preview[]" />
                        </div>
                        <div class="buttons">
                            <button class="btn c-button" type="submit">Submit</button>
                            <a style="display: flex; align-items: center;" role="button" class="btn btn-outline-info popup-cancel">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php foreach ($shuttles as $shuttle) : ?>
        <div id="popup-<?php echo $shuttle['id'] ?>" class="popup" style="display: none">
            <div class="card" style="box-shadow: none; width: 50%;height: 75%; overflow: scroll; position: relative;">
                <div class="close-btn">
                    <button type="button" id="popup-close" class="btn-close popup-close" aria-label="Close"></button>
                </div>
                <div class="popup-body" style="padding: 15px;">
                    <h3>Update <?php echo $shuttle["shuttle_name"] ?></h3>
                    <div class="form-container">
                        <form method="post" enctype="multipart/form-data" action="/admin/updateShuttle.php" style="padding: 35px; display: block;">
                            <input type="text" value="<?php echo $shuttle['shuttle_name'] ?>" placeholder="Enter Shuttle Name" name="shuttle-name" class="c-input">
                            <input type="text" value="<?php echo $shuttle['_from'] ?>" placeholder="from" name="from" class="c-input">
                            <input type="text" value="<?php echo $shuttle['_to'] ?>" placeholder="to" name="to" class="c-input">
                            <input type="number" value="<?php echo $shuttle['price'] ?>" placeholder="Price per passenger" name="shuttle-price" class="c-input">
                            <input type="hidden" value="<?php echo $shuttle['id'] ?>" placeholder="Price per passenger" name="id" class="c-input">
                            <input type="number" value="<?php echo $shuttle['passenger_capacity'] ?>" placeholder="Passenger capacity" name="capcity" class="c-input">
                            <div class="col">
                                <label for="date">Date</label>
                                <input value="<?php echo $shuttle['_date'] ?>" type="date" id="date" placeholder="Date" name="date" class="c-input">
                                <label for="return-date">Return Date</label>
                                <input value="<?php echo $shuttle['return_date'] ?>" type="date" id="return-date" placeholder="Return Date" name="return-date" class="c-input">
                            </div>
                            <div class="col">
                                <label for="pickup-time">Pickup Time</label>
                                <input value="<?php echo $shuttle['pickup_time'] ?>" type="time" id="pickup-time" placeholder="Date" name="pickup_time" class="c-input">
                                <label for="arrival-time">Arrival Time</label>
                                <input type="time" value="<?php echo $shuttle['arrival_time'] ?>" id="arrival-time" placeholder="Return Date" name="arrival_time" class="c-input">
                            </div>
                            <textarea placeholder="Write a short discription" name="discription" rows="4" cols="50" style="margin-top: 0px;margin-bottom: 0px;height: 219px;border: 1px solid #0000009c;outline: none;border-radius: 5px;padding: 10px;"><?php echo $shuttle['discription'] ?></textarea>
                            <div class="col" style="justify-content: space-between; margin: 10px">
                                <label class="shuttle-img" for="thumbnail">Shuttle thumbnail</label>
                                <input type="file" id="thumbnail" name="thumbnail" />
                                <label class="shuttle-img" for="preview">Shuttle preview</label>
                                <input type="file" id="preview" multiple name="preview[]" />
                            </div>
                            <div class="buttons">
                                <button class="btn c-button" type="submit">Update</button>
                                <a style="display: flex; align-items: center;" role="button" class="btn btn-outline-info popup-cancel">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="table">
        <div class="t-row thead">
            <span class="t-data t-data-b">id</span>
            <span class="t-data">Shuttle Name</span>
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
                <span class="t-data">
                    <button type="button" id="<?php echo $shuttle['id'] ?>" class="btn btn-outline-info edit-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                        </svg>
                        Edit
                    </button>
                </span>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<script>
    const editButtons = document.getElementsByClassName("edit-button");
    for (let editButton of editButtons) {
        editButton.onclick = (e) => {
            const buttonElement = e.target.id;
            const popup = document.getElementById(`popup-${buttonElement}`);
            popup.style.display = "flex";
        }
    }
</script>
<?php getFooter(); ?>