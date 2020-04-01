<?php
include '../connect.php';
include '../display.php';
$budget = $_POST['budget'];
$noBedroom = $_POST['noBedrooms'];
$zone = $_POST['zone'];
$parking = $_POST['parking'];
$connection = OpenCon();
$sql = "SELECT l.address, l.rating, l.price 
FROM  listings l
WHERE l.price <= $budget AND l.capacity >= $noBedroom AND l.zone LIKE $zone AND l.parking = $parking";
displayQueryResults($connection, $sql);
