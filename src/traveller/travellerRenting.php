<html lang="'en">
<?php
$address = $_POST['address'];
$rentalDate = $_POST['rentalDate']." 00:00:00";
$duration = $_POST['duration'];
$username = $_POST['username'];
$name = $_POST['name'];
$sql = "INSERT INTO BookedListing(Address, Duration, Username, BookedDate)
VALUES ('$address', $duration, '$username', '$rentalDate')";
include "../connect.php";
$conn = OpenCon();
echo $sql.'<br>';
echo "For ".$username." ".$name."<br>";
$result = mysqli_query($conn, $sql);
$dest = 'travellerBookingQueries.php?username='.$username.'&name='.$name;
if($result) {
    echo "Successfully booked listing!";
} else {
    echo "Failed to book listing";
}
?>
<input type="button" value="View Bookings"
       onclick="window.location.href='<?php echo $dest; ?>'"/>
</html>
