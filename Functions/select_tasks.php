<?php
$tasks = new Query($conn, "SELECT * FROM orders WHERE flag = 'new'");
$tasks->exec("");
