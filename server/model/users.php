<?php
class Users
{
    public function __construct()
    {
        $servername = "127.0.0.1";
        $connectionStatement = "mysql:host=$servername;dbname=Guatemala";
        $cred = $this->getUsernamePassword();
        $dbUsername = $cred[0];
        $dbPassword = $cred[1];
        $this->tableName = "Users";
        $this->connection = new PDO($connectionStatement, $dbUsername, $dbPassword);
    }


    private function getUsernamePassword()
    {
        $json = file_get_contents("config.json");
        $jsonData = json_decode($json, true);
        $username = $jsonData['db_username'];
        $password = $jsonData['db_password'];
        return [$username, $password];
    }

    public function read($userId = null)
    {
        if (!$userId) {
            $sql = "SELECT * FROM " . $this->tableName;
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
        } else {
            $sql = "SELECT * FROM " . $this->tableName . " WHERE id=$userId";
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
            $sql = "UPDATE " . $this->tableName . " SET $feild = $d WHERE id = $user_id";
            $this->connection->query($sql);
        }
    }

    public function create($data)
    {
        if (in_array("username", $data) && in_array("password", $data) && in_array("email", $data)) {
            $username = $data["username"];
            $email = $data["email"];
            $password = $data["password"];
            $role = $data["role"];
            $sql = "CREATE " . $this->tableName . "(username, email, password, role) VALUES ($username, $email, $password, $role)";
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
