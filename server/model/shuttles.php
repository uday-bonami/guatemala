<?php
require $_SERVER["DOCUMENT_ROOT"] . "/model/base.php";

class Shuttles extends Base
{
    private $tableName = 'Shuttles';
    private $exceptedTypes = array("jpg", "png", "jpeg");
    private $uploadDir = "../shuttles_imgs/";

    public function read($to = null)
    {
        if (!$to) {
            $sql = "SELECT * FROM " . $this->tableName;
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
        } else {
            $sql = "SELECT * FROM " . $this->tableName . " WHERE " . "_to='$to'";

            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
        }
        return $result;
    }

    public function create($data)
    {
        if (
            array_key_exists("shuttle_name", $data) &&
            array_key_exists("price", $data) &&
            array_key_exists("passenger_capacity", $data) &&
            array_key_exists("date", $data) &&
            array_key_exists("return_date", $data) &&
            array_key_exists("thumbnail", $data) &&
            array_key_exists("preview1", $data) &&
            array_key_exists("preview2", $data) &&
            array_key_exists("preview3", $data) &&
            array_key_exists("discription", $data) &&
            array_key_exists("_to", $data) &&
            array_key_exists("_from", $data)
        ) {
            $shuttle_name = $data["shuttle_name"];
            $price = $data["price"];
            $passenger_capacity = $data["passenger_capacity"];
            $price = $data["price"];
            $date = $data["date"];
            $return_date = $data["return_date"];
            $thumbnail = $data["thumbnail"];
            $preview1 = $data["preview1"];
            $preview2 = $data["preview2"];
            $preview3 = $data["preview3"];
            $discription = $data["discription"];
            $_from = $data["_from"];
            $_to = $data["_to"];

            $sql = "INSERT INTO " . $this->tableName . " (
                shuttle_name,
                price,
                passenger_capacity,
                _date,
                return_date,
                discription,
                thumbnail,
                preview1,
                preview2,
                preview3,
                _from,
                _to) VALUES (
                    '$shuttle_name',
                    '$price',
                    '$passenger_capacity',
                    '$date',
                    '$return_date',
                    '$discription',
                    '$thumbnail',
                    '$preview1',
                    '$preview2',
                    '$preview3',
                    '$_from',
                    '$_to')";

            $this->connection->exec($sql);
        }
        return null;
    }

    public function update($updatedData, $id)
    {
        $updatedFeild = $updatedData["updateFeild"];
        $data = $updatedData["data"];
        foreach ($updatedFeild as $feild) {
            $d = $data[$feild];
            $sql = "UPDATE " . $this->tableName . " SET $feild = $d WHERE id = $id";
            $this->connection->query($sql);
        }
    }

    public function uploadFiles($thumbnail, $preview)
    {
        $previewPaths = $this->uploadPreview($preview);
        $thumbnailPaths = $this->uploadThumbnail($thumbnail);
        return array($previewPaths, $thumbnailPaths);
    }

    private function uploadPreview($preview)
    {
        $types = $preview["type"];
        $tmpName = $preview["tmp_name"];
        $imgsPaths = array();

        // Validating file types
        for ($i = 0; $i < count($types); $i++) {
            $type = strtolower(explode("/", $types[$i])[1]);
            if (!in_array($type, $this->exceptedTypes)) {
                throw new Exception("Unexpected file type");
            }
        }


        // Validating size of images and upload images
        $i = 0;
        foreach ($tmpName as $name) {
            $imgSize = getimagesize($name);
            $fileType = strtolower(explode("/", $types[$i])[1]);
            if ($imgSize[0] < 2000 || $imgSize[1] < 2000) {
                $fileName = uniqid("", true) . "." . $fileType;
                $fileDestination = $this->uploadDir . $fileName;
                move_uploaded_file($name, $fileDestination);
                array_push($imgsPaths, $fileDestination);
            } else {
                throw new Exception("Image size must be between 2000 and 2000");
            }
            $i++;
        }
        return $imgsPaths;
    }

    private function uploadThumbnail($thumbnail)
    {
        $fileType = strtolower(explode('/', $thumbnail["type"])[1]);

        if (in_array($fileType, $this->exceptedTypes)) {
            $imgSize = getimagesize($thumbnail["tmp_name"]);
            if ($imgSize[0] === $imgSize[1] && $imgSize[0] < 1000 && $imgSize[1] < 1000) {
                $fileName = uniqid("", true) . "." . $fileType;
                $fileDestination = $this->uploadDir . $fileName;
                move_uploaded_file($thumbnail["tmp_name"], $fileDestination);
                return $fileDestination;
            } else {
                throw new Exception("Image size must be between 1000 and 1000");
            }
        } else {
            throw new Exception("Unexpected file type");
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM " . $this->tableName . "WHERE id = $id";
        $this->connection->exec($sql);
    }
}
