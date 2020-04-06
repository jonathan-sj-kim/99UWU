<html lang="en">

<head>
    <title>Traveller Query Result</title>
</head>
<body>
<br>
Here are the results!
<br>
<?php
include '../connect.php';
include '../display.php';
$budget = 100000000;
if ($_POST['budget']){
    $budget = $_POST['budget'];
}
$zone = $_POST['zone'];
$parking = 0;
if (!empty($_POST['parking'])){
    $parking = 1;
}

$username = $_POST['username'];
$name = $_POST['name'];
$connection = OpenCon();
$sql = '';
if ($zone){
    $sql = "SELECT l.address, l.rating, l.price 
    FROM  Listing l, PropertyAgent p
    WHERE p.Username = l.Username AND p.zone = '$zone' AND 
          l.price <= $budget AND l.parking = '$parking' AND l.active = 1";
} else {
    $sql = "SELECT l.address, l.rating, l.price 
    FROM  Listing l
    WHERE l.price <= $budget AND l.parking = '$parking' AND l.active = 1";
}

displayQueryResults($connection, $sql);
?>
<form action="travellerRenting.php" method="post">
    <br>
    <label for="address"> Which address would you like to rent?</label>
    <input type="text" id="address" name="address" placeholder="please copy and paste from above" />
    <br>
    <label for="rentalDate"> When would you like to rent?</label>
    <input type="text" id="rentalDate" name="rentalDate" placeholder="YYYY-MM-DD" />
    <br>
    <label for="duration">How long would you like to stay for?</label>
    <br>
    <input type="number" id="duration" name="duration" required />
    <br>
    <input type="hidden" name="username" value="<?php echo $username; ?>" />
    <input type="hidden" name="name" value="<?php echo $name; ?>" />
    <input type="submit" value="Make booking!"/>
</form>
<br>
<input type="button" value="Logout" onclick="location.href='main.html'"/>
</body>
</html>
