<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin starter</title>
    <link rel="stylesheet" type="text/css" href="adminmain.css">

</head>

<?php
$zone = $_POST['zone'];
$sql = "SELECT Username 
FROM PropertyAgent pa 
WHERE NOT EXISTS (
    SELECT * FROM Listing lt1, PropertyAgent pa1 
    WHERE pa1.Username = lt1.Username AND pa1.Zone = '$zone' AND lt1.Address NOT IN
    (SELECT DISTINCT lt2.Address FROM Listing lt2, PropertyAgent pa2
    WHERE pa2.Username = lt2.Username AND pa2.Username = pa.Username)
);";

include "../display.php";
include "../connect.php";
$conn = OpenCon();
echo "Here are the agents that manages all the listings in zone: ".$zone.'<br>';
displayQueryResults($conn, $sql);
CloseCon($conn);