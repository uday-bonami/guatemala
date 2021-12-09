<?php
require $_SERVER["DOCUMENT_ROOT"] . "/model/base.php";

class Shuttles extends Base
{
    private $tableName = 'Shuttles';

    public function read($id = null)
    {
        if (!$id) {
            $sql = "SELECT * FROM " . $this->tableName;
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
        } else {
            $sql = "SELECT * FROM " . $this->tableName . " WHERE " . "id=$id";
            $stmt = $this->connection->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
        }
        return $result;
    }

    public function create($data)
    {
        if (array_key_exists("shuttle_name", $data) && array_key_exists("price", $data) && array_key_exists("passenger_capacity", $data) && array_key_exists("date", $data) && array_key_exists("return_date", $data)) {
            $shuttle_name = $data["shuttle_name"];
            $price = $data["price"];
            $passenger_capacity = $data["passenger_capacity"];
            $price = $data["price"];
            $date = $data["date"];
            $return_date = $data["return_date"];

            $sql = "CREATE " . $this->tableName . "(shuttle_name, price, passenger_capacity, date, return_date) VALUES ($shuttle_name, $price, $passenger_capacity, $date, $return_date)";
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

    public function delete($id)
    {
        $sql = "DELETE FROM " . $this->tableName . "WHERE id = $id";
        $this->connection->exec($sql);
    }
}
