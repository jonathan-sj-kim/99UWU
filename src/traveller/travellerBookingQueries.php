<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Traveller bookings page</title>
</head>
<body>
Hi <?php echo $_GET['name']; ?>! </br>
Here is your booking history!
</body>
</html>
<?php
include "../connect.php";
include "../display.php";
$connect = OpenCon();
$username = $_GET['username'];
$name = $_GET['name'];
$sql = "SELECT b.address, b.date, b.price 
FROM bookings b LEFT INNER JOIN users u ON u.username = b.username
WHERE u.username LIKE '$username'";
displayQueryResults($connect, $sql);
?>

