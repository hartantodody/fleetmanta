<?php

class Task{
    private $container;
    private $amount;
    private $trips;

    public function __set($property, $value)
    {
        $this->$property = $value;
        return $this;
    }

    public function __get($value)
    {
        return $this->$value;
    }

    public function getTasks($prepend,$column,$append,$msg)
    {
        require dirname(__FILE__,2).'\Models\Settings\Conn.php';
        $s_truck = new Query($conn, "SELECT * FROM tasks");
        $s_truck->exec($msg);
        $s_truck->fetch($prepend,$column,$append);
    }

    public function saveTasks($msg)
    {
        require dirname(__FILE__,2).'\Models\Settings\Conn.php';
        $i_truck = new Query($conn, "INSERT INTO orders VALUES(NULL, '$this->container', '$this->amount', '$this->trips', NULL)");
        $i_truck->exec($msg);
    }

}
