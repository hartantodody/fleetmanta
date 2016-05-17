<?php

class Query{
    private $conn;
    private $query;
    private $array = array();

    public function __construct(Connect $conn, $query)
    {
        $this->conn = $conn;
        $this->query = $query;
    }

    public function __set($property, $value)
    {
        if (property_exists($property, $value)) {
            $this->$property = $value;
        }
        return $this;
    }

    public function __get($value)
    {
        return $this->$value;
    }

    public function exec($msg)
    {
        $result = $this->conn->conn->query($this->query);
        $splits = explode(" ",$this->query);

        if (!in_array("INSERT", $splits)) {
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    array_push($this->array, $row);
                }
            }
            echo $msg;
        } else {
            if ($result === TRUE) {
                echo $msg;
            } else {
                echo $this->conn->conn->error.'<br>';
            }
        }
    }

    public function execTransaction($msg)
    {
        $result = $this->conn->conn->multi_query($this->query);
        if ($result === TRUE) {
            echo $msg;
        } else {
            echo $this->conn->conn->error.'<br>';
        }
    }

    public function fetch($prepend, $column, $append)
    {
        foreach ($this->array as $a) {
            echo $prepend . $a[$column] . $append;
        }
    }
}
