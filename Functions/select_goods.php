<?php


$containers = new Query($conn, "SELECT * FROM CONTAINERS");
$containers->exec("");
