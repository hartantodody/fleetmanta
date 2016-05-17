<?php
require dirname(__FILE__,2).'\Models\Database\Query.php';
require dirname(__FILE__,2).'\Models\Settings\Conn.php';
require dirname(__FILE__,2).'\Models\VRP\Trips.php';
require dirname(__FILE__,2).'\Models\VRP\TripsHasStops.php';
require dirname(__FILE__,2).'\Models\VRP\Task.php';

$goods          = $_POST['goods'];
$loadAmount     = $_POST['loadAmount'];
$origin         = $_POST['origin'];
$destination    = $_POST['destination'];

$originbreak    = explode(" ",$origin);
$destbreak      = explode(" ",$destination);

$insertTask     = new Query($conn, "
SELECT @tripsid:= AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'mydb' AND TABLE_NAME = 'trips';
SELECT @ordersid:= AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'mydb' AND TABLE_NAME = 'orders';
SELECT @reportsid:= AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'mydb' AND TABLE_NAME = 'reports';

START TRANSACTION;
INSERT INTO trips VALUE(NULL,'GOODS-{$goods} dari {$originbreak[1]} dikirim ke {$destbreak[1]}');
COMMIT;

START TRANSACTION;
INSERT INTO trips_has_stops VALUE(@tripsid, {$originbreak[0]}, 'origin');
INSERT INTO trips_has_stops VALUE(@tripsid, {$destbreak[0]}, 'destination');
INSERT INTO orders VALUE(NULL,{$goods}, {$loadAmount}, @tripsid, NULL, NULL);
COMMIT;

START TRANSACTION;
INSERT INTO reports VALUE(NULL, 'Reports for today', NULL, 'new');
COMMIT;

START TRANSACTION;
INSERT INTO reports_has_orders VALUE('1', @ordersid);
COMMIT;
");
$insertTask->execTransaction("Berhasil");
