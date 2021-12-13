<?php
session_start();
// require "./model/users.php";
require "./model/shuttles.php";

$from = $_GET["from"];
$destination = $_GET["destination"];
$date = $_GET["date"];
$return_date = $_GET["return-date"];
$passenger = $_GET["passenger"];

$shuttle = new Shuttles();
$shuttleData = $shuttle->read($to = $destination);
?>
<?php require "./userHeader.php" ?>
<div class="banner">
    <img src="/img/big-logo.png" style="width: 291px; height: 71px" alt="logo">
    <div class="card" style="width: 80%; min-height: 172px; position: absolute; bottom: -93px; left: 184px">
        <div class="row  gx-0">
            <div class=" col-12 bg-white booking-form p-3 mt-3">
                <form method="get" action="/bookings.php" class="row" style="flex-direction: row">
                    <div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xxl-2">
                        <label for="inputEmail4" class="form-label">From</label>
                        <input value="<?php echo $from ?>" type="text" class="form-control" name="from" placeholder="Guatemala" id="inputEmail4" />
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xxl-2">
                        <label for="inputPassword4" class="form-label">Destination</label>
                        <input value="<?php echo $destination ?>" type="text" name="destination" class="form-control" placeholder="Honduras" id="inputPassword4" />
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xxl-2">
                        <label for="date" class="form-label">Date</label>
                        <input value="<?php echo $date ?>" type="date" name="date" class="form-control" id="date" />
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xxl-2">
                        <label for="return" class="form-label">Return Date</label>
                        <input value="<?php echo $return_date ?>" type="date" name="return-date" class="form-control" id="return" />
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xxl-2">
                        <label for="passenger" class="form-label">Passenger</label>
                        <input value="<?php echo $passenger ?>" type="number" name="passenger" class="form-control" placeholder="2 Passenger" value="Passenger" id="passenger" />
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-2 col-xxl-2">
                        <label for="passenger" class="form-label"></label>
                        <button type="submit" class="btn main-btn text-center">Search</button>
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
            <div class="card mb-3" style="width: 100%; padding: 0px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img style="border-radius: 25px" src="<?php echo $shuttle["thumbnail"] ?>" class="img-fluid rounded-start" alt="...">
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
<?php require "./getFooter.php" ?>