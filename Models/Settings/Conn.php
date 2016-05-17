<?php
require dirname(__DIR__,2)."\Models\Database\Connect.php";
//Connect to db
$conn = new Connect("localhost","root","","mydb");
$conn->connectToDB();
