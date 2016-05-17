<?php

class Connect{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    public function __construct($servername, $username, $password, $dbname)
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    public function __set($property, $value)
    {
        if(property_exists($property, $value)){
            $this->$property = $value;
        }
        return $this;
    }

    public function __get($value)
    {
        return $this->$value;
    }

    public function connectToDB()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    }

    public function checkConnection()
    {
        if($this->conn->connect_error){
            die("Connection failed: " . $this->conn->connect_error);
        }
        echo "Connect successfully ";
    }
}
