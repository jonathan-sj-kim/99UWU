<html lang="en">
<?php
$query = $_POST['query'];
$values = $_POST['values'];
$table = $_POST['table'];
include "../display.php";
include "../connect.php";
for($i = 0; $i < count($values); $i++){
    if ($i == count($values) - 1) {
        $query = $query.$values[$i].")";
    } else {
        $query = $query.$values[$i].",";
    }
}
$conn = OpenCon();
echo $query."<br>";
if(mysqli_query($conn, $sql)){
    echo "Successfully inserted - table data will be displayed below <br>";
} else {
    echo "Failed to insert - table data will be displayed below <br>";
}
displayQueryResults($conn, "SELECT * FROM ".$table);
CloseCon($conn);
?>
<input type="submit" value="Menu" onclick="window.location.href='main.html'"/>
</html>
