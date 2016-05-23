<?php
require dirname(__FILE__,2).'\Models\Database\Query.php';
require dirname(__FILE__,2).'\Models\Settings\Conn.php';

$reports = new Query($conn, "SELECT * FROM REPORTS");
$reports->exec("");
