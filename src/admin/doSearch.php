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
    if ($i == count($tables) - 1 ) {
        $sql = $sql." ".$tables[$i]."\nWHERE ";
    } else if ($i == 0) {
        $sql = $sql.$tables[$i];
    } else {
        $sql = $sql.", ".$tables[$i];
    }
}
for ($i = 0; $i < count($cond); $i++){
    if ($i == count($cond) - 1) {
        $sql = $sql." AND ".$queryColumns[$i]." ".$operators[$i]." ".$cond[$i].";";
    } else if ($i > 0) {
        $sql = $sql." AND ".$queryColumns[$i]." ".$operators[$i]." ".$cond[$i];
    } else {
        $sql = $sql.$queryColumns[$i]." ".$operators[$i]." ".$cond[$i];
    }
}
echo $sql;
;unset($_SESSION['adminQuery']);
include "../display.php";
include "../connect.php";
$conn = OpenCon();
displayQueryResults($conn, $sql);