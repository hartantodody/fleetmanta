<?php
require dirname(__FILE__,2).'\Models\Database\Query.php';
require dirname(__FILE__,2).'\Models\Settings\Conn.php';

$vname = $_POST['name'];
$capacity = $_POST['capacity'];
$load = $_POST['load'];
$cost = $_POST['cost'];

$reports = new Query($conn, "INSERT INTO trucks VALUES(NULL,'{$load}',{$capacity},{$cost})");
$reports->exec("Berhasil");
