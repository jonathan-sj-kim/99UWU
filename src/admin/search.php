<?php
function getColumns($conn, $sql) {
    $col = mysqli_num_rows($conn, $sql);

}