<?php

$orders = new Query($conn, "SELECT * FROM reports_has_orders AS r JOIN orders AS o ON o.orderid = r.orderid RIGHT JOIN trucks_has_orders AS to ON to.orderid = o.orderid WHERE r.reportid='$reportid'");
$orders->exec("");
