<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . "/model/base.php";

class Users extends Base
{
    private $tableName = "Users";

    public function getAdmins($email)
    {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE email='$email'";
        $stmt =  $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function read($userEmail = null)
    {
        if (!$userEmail) {
            $sql = "SELECT * FROM " . $this->tableName;
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
        } else {
            $sql = "SELECT * FROM " . $this->tableName . " WHERE email='$userEmail'";
            $stmt =  $this->connection->prepare($sql);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
        }
        return $result;
    }

    public function getUserById($userId)
    {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE id='$userId'";
        $stmt =  $this->connection->prepare($sql);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function update($updatedData, $user_id)
    {
        $updatedFeild = $updatedData["updateFeild"];
        $data = $updatedData["data"];
        foreach ($updatedFeild as $feild) {
            $d = $data[$feild];
            $sql = "UPDATE " . $this->tableName . " SET $feild='$d' WHERE id='$user_id'";
            $stmt =  $this->connection->prepare($sql);
            $stmt->execute();
        }
    }

    public function create($data)
    {
        if (
            array_key_exists("username", $data) &&
            array_key_exists("password", $data) &&
            array_key_exists("email", $data) &&
            array_key_exists("joining_date", $data)
        ) {
            $username = $data["username"];
            $email = $data["email"];
            $password = $data["password"];
            $joining_date = $data["joining_date"];
            $role = $data["role"];
            $sql = "INSERT INTO " . $this->tableName . "(
                username,
                email, 
                password, 
                joining_date, 
                role) VALUES (
                    '$username', 
                    '$email', 
                    '$password', 
                    '$joining_date', 
                    '$role'
                )";
            $this->connection->exec($sql);
            return true;
        }
        return null;
    }

    public function delete($user_id)
    {
        $sql = "DELETE FROM " . $this->tableName . "WHERE id = $user_id";
        $this->connection->exec($sql);
    }
}
