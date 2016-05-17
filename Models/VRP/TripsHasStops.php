<?php

class TripsHasStops{
    private $trips;
    private $stops;

    public function __set($property, $value)
    {
        $this->$property = $value;
        return $this;
    }

    public function __get($value)
    {
        return $this->$value;
    }
}
