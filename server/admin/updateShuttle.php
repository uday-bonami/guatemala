<?php
require "../model/shuttles.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $shuttleName = $_POST["shuttle-name"];
    $shuttlePrice = $_POST["shuttle-price"];
    $capcity = $_POST["capcity"];
    $date = $_POST["date"];
    $from = $_POST["from"];
    $to = $_POST["to"];
    $shuttleId = $_POST["id"];
    $discription = $_POST["discription"];
    $returnDate = $_POST["return-date"];
    $pickupTime = $_POST["pickup_time"];
    $arrivalTime = $_POST["arrival_time"];
    $thumbnail = $_FILES["thumbnail"];
    $preview = $_FILES["preview"];


    $updatedData = array(
        "updateFeild" => array(
            "shuttle_name",
            "price",
            "passenger_capacity",
            "_date",
            "discription",
            "return_date",
            "_from",
            "_to",
            "pickup_time",
            "arrival_time"
        ),
        "data" => array(
            "shuttle_name" =>  $shuttleName,
            "price" => $shuttlePrice,
            "passenger_capacity" => $capcity,
            "_date" => $date,
            "discription" => $discription,
            "return_date" => $returnDate,
            "_from" => $from,
            "_to" => $to,
            "pickup_time" => $pickupTime,
            "arrival_time" => $arrivalTime,
        )
    );

    $shuttles =  new Shuttles();

    if (!empty($thumbnail) && !empty($preview)) {
        try {
            if (count($preview["name"]) === 3) {
                $imgPaths = $shuttles->uploadFiles($thumbnail, $preview);
                $previewImgPath = $imgPaths[0];
                $thumbnail = explode("..", $imgPaths[1])[1];
                $previewImgPath1 = explode("..", $previewImgPath[0])[1];
                $previewImgPath2 = explode("..", $previewImgPath[1])[1];
                $previewImgPath3 = explode("..", $previewImgPath[2])[1];
                $updatedData["preview1"] = $previewImgPath1;
                $updatedData["preview2"] = $previewImgPath2;
                $updatedData["preview3"] = $previewImgPath3;
                $updatedData["thumbnail"] = $thumbnail;

                array_push($updatedData["updatedFeild"], "preview1");
                array_push($updatedData["updatedFeild"], "preview2");
                array_push($updatedData["updatedFeild"], "preview2");
                array_push($updatedData["updatedFeild"], "thumbnail");
            } else {
                throw new Exception("Select upto 3 images");
            }
        } catch (Exception $e) {
            strval($e);
        }
    }

    $shuttles->update($updatedData, $shuttleId);
    header("Location: /admin/shuttles.php");
    die();
}
