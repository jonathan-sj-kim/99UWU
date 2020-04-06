<html lang="en">
<?php
$query = $_POST['query'];
$values = $_POST['values'];
$cond = $_POST['cond'];
$columns = $_POST['columns'];
$table = $_POST['table'];
include "../display.php";
include "../connect.php";
for($i = 0; $i < count($values); $i++){
    if ($i == count($values) - 1) {
        $query = $query.$columns["Fields"][$i]."=".$values[$i].")";
    } else {
        $query = $query.$columns["Fields"][$i]."=".$values[$i].",";
    }
}
$conn = OpenCon();
if(mysqli_query($conn, $sql)){
    echo "Successfully updated - table data will be displayed below <br>";
} else {
    echo "Failed to update - table data will be displayed below <br>";
}
displayQueryResults($conn, "SELECT * FROM ".$table);
CloseCon($conn);
?>
<input type="submit" value="Main Menu" onclick="window.location.href='main.html'"/>
</html>