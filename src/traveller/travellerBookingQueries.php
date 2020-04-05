<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Traveller bookings page</title>
</head>
<body>
Hi <?php echo $_GET['name']; ?>! <br>
Here is your booking history!
</body>
</html>
<?php
include "../connect.php";
include "../display.php";
$connect = OpenCon();
$username = $_GET['username'];
$name = $_GET['name'];
$sql = "SELECT b.Address, b.BookedDate, b.Duration, l.Price*b.Duration as Cost, l.Price as One_Day_Price
FROM BookedListing b, Users u, Listing l
WHERE u.Username = b.Username AND u.username = '$username'
AND l.Address = b.Address" ;
displayQueryResults($connect, $sql);
?>

