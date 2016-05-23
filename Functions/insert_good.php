<?php

require dirname(__FILE__,2).'\Models\Database\Query.php';
require dirname(__FILE__,2).'\Models\Settings\Conn.php';

$width = $_POST['width'];
$length = $_POST['length'];
$height = $_POST['height'];
$weight = $_POST['weight'];

$reports = new Query($conn, "INSERT INTO containers VALUES(NULL,'{$width}',{$length},{$height}, {$weight})");
$reports->exec("Berhasil");
