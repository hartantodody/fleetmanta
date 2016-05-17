<?php

class Trips{
    private $description;

    public function __set($property, $value)
    {
        $this->$property = $value;
        return $this;
    }

    public function __get($value)
    {
        return $this->$value;
    }

    public function saveTrips($msg)
    {
        require dirname(__FILE__,2).'\Models\Settings\Conn.php';
        $i_truck = new Query($conn, "INSERT INTO trips VALUES(NULL, '$this->trips')");
        $i_truck->exec($msg);
    }
}
