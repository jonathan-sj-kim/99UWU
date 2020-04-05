<?php

include "../connect.php";
openCon();

$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$connection = OpenCon();
$sql = "INSERT INTO Users (username, password, name)
VALUES ($username, $password, $name)";


if ($conn->query($sql) === TRUE) {
    echo "New account created successfully";
} else {
    echo "Something went wrong :(";
}
    closeCon($conn);




