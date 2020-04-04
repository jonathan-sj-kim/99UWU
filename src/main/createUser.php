<?php
function createAccount($conn, $sql, $username)
{
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        header('Location: ../../html/failedLogin.html');
    }
    $rows = mysqli_fetch_assoc($result);
    $name = array_values($rows)[0];
    if ($name) {
        header('Location: welcome.php?name='.urlencode($name).'&username='.urlencode($username));
    } else {
        header('Location: ../main/failedLogin.html');
    }
    CloseCon($conn);
}
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




