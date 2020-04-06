<html lang="en">
<?php
$query = $_POST['query'];
$values = $_POST['values'];
$cond = $_POST['cond'];
$columns = $_POST['columns'];
$table = $_POST['table'];
include "../display.php";
include "../connect.php";
$sql = $query;
$query = NULL;

$sqlpre = "SHOW COLUMNS FROM " . $table;
$conn = OpenCon();
$result = mysqli_query($conn, $sqlpre) or die((mysqli_error($conn)));
$columns = [];
while ($col = mysqli_fetch_assoc($result    )) {
    array_push($columns, $col);
}


for($i = 0; $i < count($values); $i++){
    if($values[$i]!=''){
        if ($i == count($values) - 1) {
            $query = $query.$columns[$i]["Field"]."='".$values[$i]."',";
        } else {
            $query = $query.$columns[$i]["Field"]."='".$values[$i]."',";
        }
    }
}
$query = rtrim($query,",");


$sql = $sql." ".$table." SET ".$query." WHERE ".$cond;

echo $sql."<br>";
if(!mysqli_query($conn, $sql)){
    echo "Failed to insert - table data will be displayed below <br>";
    echo mysqli_error($conn);
} else {
    echo "Successfully inserted - table data will be displayed below <br>";
}
displayQueryResults($conn, "SELECT * FROM ".$table);
CloseCon($conn);
?>
<input type="submit" value="Main Menu" onclick="window.location.href='main.html'"/>
</html>