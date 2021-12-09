<?php
return $_SERVER["DOCUMENT_ROOT"] . "/model/base.php";

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
        if (in_array("user_id", $data) && in_array("shuttle_name", $data) && in_array("from_", $data) && in_array("date", $data) && in_array("return_date", $data) && in_array("passenger", $data)) {
            $user_id = $data["user_id"];
            $shuttle_name = $data["shuttle_name"];
            $from_ = $data["from_"];
            $date = $data["date"];
            $return_date = $data["return_date"];
            $passenger = $data["passenger"];

            $sql = "INSERT INTO " . $this->tableName . "(user_id, shuttle_name, from_, date, return_date, passenger) VALUES ($user_id, $shuttle_name, $from_, $date, $return_date, $passenger)";
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
