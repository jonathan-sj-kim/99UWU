<html lang="'en">
<?php
$address = $_POST['address'];
$rentalDate = $_POST['rentalDate']." 00:00:00";
$duration = $_POST['duration'];
$username = $_POST['username'];
$sql = "INSERT INTO BookedListing(Address, Duration, Username, BookedDate)
VALUES ('$address',$duration,'$username','$rentalDate')";
include "../connect.php";
$conn = OpenCon();
$result = mysqli_query($conn, $sql);
if($result) {
    echo "Successfully booked listing!";
} else {
    echo "Failed to book listing";
}
?>
<input type="button" value="View Bookings"
       onclick="window.location.href='travellerBookingQueries.php'"/>
</html>
