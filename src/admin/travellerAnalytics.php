<html lang="'en">
<?php
$cond = $_POST['cond'];
echo $cond."<br>";
$sql = "SELECT t.Username, COUNT(*) as num_bookings FROM Traveller t, BookedListing b WHERE t.Username = b.Username
GROUP BY t.Username HAVING COUNT(*) = (SELECT $cond(sq1.counted) 
FROM (SELECT COUNT(*) as counted FROM BookedListing GROUP BY Username) sq1)";
include "../display.php";
include "../connect.php";
$conn = OpenCon();
echo "Here are the travellers that have the ";
if ($cond == "MAX") {
    echo "most";
}
if ($cond == "MIN") {
    echo "least";
}
if ($cond == "AVG") {
    echo "average";
}
echo " number of bookings!".'<br>';
displayQueryResults($conn, $sql);
echo "Here are all users! <br>";
$sql = "SELECT t.Username, COUNT(*) as num_bookings 
FROM Traveller t, BookedListing b 
WHERE t.Username = b.Username
GROUP BY t.Username";
displayQueryResults($conn, $sql);
?>
</html>
