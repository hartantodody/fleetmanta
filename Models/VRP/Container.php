<?php

class Container{
    private $width;
    private $length;
    private $height;
    private $weight;
    private $type;

    public function __set($property, $value)
    {
        $this->$property = $value;
        return $this;
    }

    public function __get($value)
    {
        return $this->$value;
    }

    public function getContainers($prepend,$column,$append,$msg)
    {
        require('Settings/Conn.php');
        $s_truck = new Query($conn, "SELECT * FROM containers");
        $s_truck->exec($msg);
        $s_truck->fetch($prepend,$column,$append);
    }

    public function saveContainer($msg)
    {
        require('Settings/Conn.php');
        $i_truck = new Query($conn, "INSERT INTO containers VALUES(NULL, '$this->width', '$this->length', '$this->height', '$this->weight', '$this->type')");
        $i_truck->exec($msg);
    }

}
