<?php
$cond = $_POST['cond'];
echo $cond."<br>";
$sql = "SELECT t.Username FROM Traveller t, BookedListing b WHERE t.Username = b.Username
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
echo " number of listings".'<br>';
displayQueryResults($conn, $sql);