<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Welcome Page for Traveller</title>
    <link rel="stylesheet" type="text/css" href="travellermain.css">

</head>
<?php
function login($conn, $sql, $username)
{
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        header('Location: ../create/failedLogin.html');
    }
    $rows = mysqli_fetch_assoc($result);
    $name = array_values($rows);

    if (count($name) == 0) {
        header('Location: ../create/failedLogin.html');
    } else {
        header('Location: welcome.php?name='.urlencode($name[0]).'&username='.urlencode($username));
    }

    CloseCon($conn);
}
include '../connect.php';
echo 'Logging in...';
$username = $_POST['username'];
$password = $_POST['password'];
$connection = OpenCon();
$sql = "SELECT u.Name FROM Traveller t, Users u WHERE t.Username = u.Username AND u.Username = '$username' AND u.Password = '$password';";
login($connection, $sql, $username);
?>