<?php
session_start();
$query = $_SESSION['adminQuery'];/// Use this as the POST variable.
$tables = $query["tables"];
$selectedColumns = $query["selectedColumns"];
$queryColumns = $query["queryColumns"];
$operators = $query["operators"];
$cond = $query["cond"];
//After finishing the code:
$sql = "SELECT ";
for ($i = 0; $i < count($selectedColumns); $i++) {
    if ($i == 0) {
        $sql = $sql.$selectedColumns[$i].", ";
    } else if ($i == count($selectedColumns) - 1) {
        $sql = $sql." ".$selectedColumns[$i]."\nFROM ";
    } else {
        $sql = $sql.$selectedColumns[$i].", ";
    }
}
for ($i = 0; $i < count($tables); $i++) {
    if ($i == 0){
        $sql = $sql.$tables[$i]." ".$tables[$i];
    }else {
        $sql = $sql.", ".$tables[$i]." ".$tables[$i];
    }
}
if (count($cond) > 0) {
    $sql = $sql."\nWHERE ";
    for ($i = 0; $i < count($cond); $i++){
        if ($i > 0) {
            $sql = $sql." AND ".$queryColumns[$i]." ".$operators[$i]." ".$cond[$i];
        } else {
            $sql = $sql.$queryColumns[$i]." ".$operators[$i]." ".$cond[$i];
        }
    }
}
$sql = $sql.";";
echo $sql;
unset($_SESSION['adminQuery']);
include "../display.php";
include "../connect.php";
$conn = OpenCon();
displayQueryResults($conn, $sql);
?>
<html lang="en">
<title>Search</title>
<body>
Would you like to make this an aggregated search?
</br>
<form action="aggregatedSearch.php" method="post">
    <input type="hidden" value="<?php echo $sql ?>" name="sql">
    <input type="hidden" value="<?php echo $tables; ?>" name="tables">
    <input type="hidden" value="<?php echo $queryColumns; ?>" name="queryColumns">
    <input type="hidden" value="<?php echo $selectedColumns; ?>" name="selectedColumns">
    <input type="submit" name="yes" value="yes">
</form>
<a href = "main.html">No</a>
</body>
</html>
