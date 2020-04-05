<?php
function retrieve($sql) {
    $conn = OpenCon();
    $result = mysqli_query($conn, $sql) or die((mysqli_error($conn)));
    CloseCon($conn);
    return $result;
}
include '../connect.php';
