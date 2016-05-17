<?php

$tasks = new Query($conn, "SELECT * FROM orders");
$tasks->exec("");
