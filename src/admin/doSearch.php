<?php
session_start();
$query = $_SESSION['adminQuery'];/// Use this as the POST variable.
$tables = $query["tables"];
$selectedColumns = $query["selectedColumns"];
$queryColumns = [];
if (isset($query["queryColumns"])) {
    $queryColumns = $query["queryColumns"];
}
$operators = [];
if (isset($query["operators"])){
    $operators = $query["operators"];
}
$cond = [];
if (isset($query["cond"])){
    $cond = $query["cond"];
}
//After finishing the code:
$sql = "SELECT ";
if (count($tables) > 1){
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
            $sql = $sql.$tables[$i]." ".$tables[$i][0];
        }else {
            $sql = $sql.", ".$tables[$i]." ".$tables[$i];
        }
    }
    if (isset($cond) AND count($cond) > 0) {
        $sql = $sql."\nWHERE ";
        for ($i = 0; $i < count($cond); $i++){
            if ($i > 0) {
                $sql = $sql." AND ".$queryColumns[$i]." ".$operators[$i]." ".$cond[$i];
            } else {
                $sql = $sql.$queryColumns[$i]." ".$operators[$i]." ".$cond[$i];
            }
        }
    }
} else {
    for ($i = 0; $i < count($selectedColumns); $i++) {
        $col = explode(".",$selectedColumns[$i])[1];
         if ($i == count($selectedColumns) - 1) {
            $sql = $sql." ".$col."\nFROM ";
         } else if ($i == 0) {
             $sql = $sql.$col.", ";
         } else {
            $sql = $sql.$col.", ";
         }
    }
    $sql = $sql.$tables[0];
    if (isset($cond) AND count($cond) > 0) {
        $sql = $sql."\nWHERE ";
        for ($i = 0; $i < count($cond); $i++){
            if ($i > 0) {
                $sql = $sql." AND ".explode(".", $queryColumns[$i])[1]." ".$operators[$i]." ".$cond[$i];
            } else {
                $sql = $sql.explode(".", $queryColumns[$i])[1]." ".$operators[$i]." ".$cond[$i];
            }
        }
    }
}


$sql = $sql.";";
echo $sql."<br>";
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
<br>
<form action="aggregatedSearch.php" method="post">
    <input type="hidden" value="<?php echo $sql; ?>" name="sql">
    <input type="hidden" value="<?php echo $tables; ?>" name="tables">
    <input type="hidden" value="<?php echo $queryColumns; ?>" name="queryColumns">
    <input type="hidden" value="<?php echo $selectedColumns; ?>" name="selectedColumns">
    <input type="submit" name="yes" value="yes">
</form>
<form action="main.html">
    <input type="submit" value="No" />
</form>
</body>
</html>
