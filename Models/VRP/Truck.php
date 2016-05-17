<?php

class Truck{
    private $no_seri;
    private $jenis_angkutan;
    private $capacity;
    private $unit;

    public function __set($property, $value)
    {
        $this->$property = $value;
        return $this;
    }

    public function __get($value)
    {
        return $this->$value;
    }

    public function getTruck($prepend,$column,$append,$msg)
    {
        require('Settings/Conn.php');
        $s_truck = new Query($conn, "SELECT * FROM trucks");
        $s_truck->exec($msg);
        $s_truck->fetch($prepend,$column,$append);
    }

    public function saveTruck($msg)
    {
        require('Settings/Conn.php');
        $i_truck = new Query($conn, "INSERT INTO trucks VALUES(NULL, '$this->no_seri', '$this->jenis_angkutan', '$this->capacity', '$this->unit', '')");
        $i_truck->exec($msg);
    }
}
