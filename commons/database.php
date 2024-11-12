<?php

class Database{
    public $conn;
    public function __construct(){
        $servername = DB_HOST;
        $dbname= DB_NAME;
        $username = DB_USERNAME;
        $password = DB_PASSWORD;
        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
    }
    public function getAll($sql){
        $stsm = $this->conn->prepare($sql);
        $stsm->execute();
        $result = $stsm->fetCHAll();
        return $result;
    }
    public function getOne($sql){
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }

    public function insert($sql){
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function date($date)
    {
        return date("d-m-y", strtotime($date));
    }

    public function __destruct(){
        $this->conn = null;
    }
}