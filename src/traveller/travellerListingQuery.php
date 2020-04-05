<html lang="en">

<head>
    <title>Traveller Query Result</title>
</head>
<body>
<br>
Here are the results!
</br>
</body>
</html>
<?php
include '../connect.php';
include '../display.php';
$budget = 100000000;
if ($_POST['budget']){
    $budget = $_POST['budget'];
}
$noBedroom = 1000;
if ($_POST['noBedrooms']){
    $noBedroom = $_POST['noBedrooms'];
}
$zone = $_POST['zone'];
$parking = 0;
if (!empty($_POST['parking'])){
    $parking = 1;
}

$username = $_POST['username'];
$connection = OpenCon();
$sql = '';
if ($zone){
    $sql = "SELECT l.address, l.rating, l.price 
    FROM  listing l
    WHERE l.price <= $budget AND l.capacity >= $noBedroom 
    AND l.zone LIKE '$zone' AND l.parking = '$parking' AND l.active = 1";
} else {
    $sql = "SELECT l.address, l.rating, l.price 
    FROM  listing l
    WHERE l.price <= $budget AND l.capacity >= $noBedroom  AND l.parking = '$parking' AND l.active = 1";
}

displayQueryResults($connection, $sql);
?>
<html lang="en">
<body>
<br action="travellerRenting.php" method="post">
    <br>
    <label for="address"> Which address would you like to rent?</label>
    <input type="text" id="address" name="address" placeholder="please copy and paste from above">
    </br>
    <br>
    <label for="rentalDate"> When would you like to rent?</label>
    <input type="text" id="rentalDate" name="rentalDate" placeholder="YYYY-MM-DD">
    </br>
    <label for="duration">How long would you like to stay for?</label>
    <input type="number" id="duration" name="duration" value="1" />
    <input type="submit" value="Make booking!"
</form>
</body>
</html>
