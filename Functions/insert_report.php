<?php
require dirname(__FILE__,2).'\Models\Database\Query.php';
require dirname(__FILE__,2).'\Models\Settings\Conn.php';
require dirname(__FILE__,2).'\Models\VRP\Trips.php';
require dirname(__FILE__,2).'\Models\VRP\TripsHasStops.php';
require dirname(__FILE__,2).'\Models\VRP\Task.php';

$optimname      = $_POST['optimname'];
$optimdesc      = $_POST['optimdesc'];

$insertTask     = new Query($conn, "
SELECT @reportsid:= AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'mydb' AND TABLE_NAME = 'reports';

START TRANSACTION;
INSERT INTO reports VALUE(NULL, '{$optimname}', '{$optimdesc}', NULL, 'new');
COMMIT;

START TRANSACTION;
INSERT INTO reports_has_orders SELECT @reportsid, orderid from orders where flag = 'new';
COMMIT;

START TRANSACTION;
UPDATE orders SET flag = 'old';
COMMIT;
");
$insertTask->execTransaction("Berhasil");
