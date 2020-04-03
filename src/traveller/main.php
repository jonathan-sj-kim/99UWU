<?php
function login($conn, $sql, $username)
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
include '../connect.php';
echo 'Logging in...';
$username = $_POST['username'];
$password = $_POST['password'];
$connection = OpenCon();
$sql = "SELECT u.Name FROM traveller u WHERE u.Username = '$username' AND u.Password = '$password'";
login($connection, $sql, $username);
CloseCon($connection);
