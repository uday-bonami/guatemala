<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/model/base.php";

class Bookings extends Base
{
    private $tableName = "Bookings";

    public function read($userId = null)
    {
        if (!$userId) {
            $sql = "SELECT * FROM " . $this->tableName;
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
        } else {
            $sql = "SELECT * FROM " . $this->tableName . " WHERE user_id=$userId";
            $stmt =  $this->connection->prepare($sql);
            $result = $stmt->fetchAll();
        }
        return $result;
    }

    public function update($updatedData, $user_id)
    {
        $updatedFeild = $updatedData["updateFeild"];
        $data = $updatedData["data"];
        foreach ($updatedFeild as $feild) {
            $d = $data[$feild];
            $sql = "UPDATE " . $this->tableName . " SET $feild = $d WHERE user_id = $user_id";
            $this->connection->query($sql);
        }
    }

    public function create($data)
    {
        if (array_key_exists("user_id", $data) && array_key_exists("shuttle_id", $data) && array_key_exists("booking_price", $data)) {
            $user_id = $data["user_id"];
            $shuttle_id = $data["shuttle_id"];
            $booking_price = $data["booking_price"];

            $sql = "INSERT INTO " . $this->tableName . "(user_id, shuttle_id, booking_price) VALUES ('$user_id', '$shuttle_id', '$booking_price')";
            $this->connection->exec($sql);
            return true;
        }
        return null;
    }

    public function delete($user_id)
    {
        $sql = "DELETE FROM " . $this->tableName . "WHERE user_id = $user_id";
        $this->connection->exec($sql);
    }
}
