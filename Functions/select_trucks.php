<?php
require dirname(__FILE__,2).'\Models\Database\Query.php';
require dirname(__FILE__,2).'\Models\Settings\Conn.php';

$trucks = new Query($conn, "SELECT * FROM TRUCKS");
$trucks->exec("");
