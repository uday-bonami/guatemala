<?php
class Base
{
    public function __construct()
    {
        $servername = "127.0.0.1";
        $connectionStatement = "mysql:host=$servername;dbname=Guatemala";
        $cred = $this->getUsernamePassword();
        $dbUsername = "uday";
        $dbPassword = "software";
        $this->connection = new PDO($connectionStatement, $dbUsername, $dbPassword);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    private function getUsernamePassword()
    {
        $json = file_get_contents("config.json");
        $jsonData = json_decode($json, true);
        $username = $jsonData['db_username'];
        $password = $jsonData['db_password'];
        return [$username, $password];
    }
}
