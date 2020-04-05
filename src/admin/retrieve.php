<?php
function retrieve($conn, $sql) {
    $result = mysqli_query($conn, $sql) or die((mysqli_error($conn)));
    return $result;
}
include '../connect.php';
$connection = OpenCon();