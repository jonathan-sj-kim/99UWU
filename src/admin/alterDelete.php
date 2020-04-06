<html lang="en">
<?php
$query = $_POST['query'];
$cond = $_POST['cond'];
$table = $_POST['table'];
include "../display.php";
include "../connect.php";

$sql = $query." FROM ".$table." WHERE ".$table.".".$cond;

echo $sql."<br>";
$conn = OpenCon();
if(!mysqli_query($conn, $sql)){
    echo "Failed to delete - table data will be displayed below <br>";
    echo mysqli_error($conn);
} else {
    echo "Successfully delete - table data will be displayed below <br>";
}
displayQueryResults($conn, "SELECT * FROM ".$table);
CloseCon($conn);
?>
<input type="submit" value="Main Menu" onclick="window.location.href='main.html'"/>
</html>
