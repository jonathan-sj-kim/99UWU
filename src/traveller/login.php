<html>
<body>
<br>
Authenticating...
<br>
<form action="welcome.php" method="post">
    <input type="hidden" name="input" value="<?php echo $username; ?>">
    <input type="submit" value="Edit">
</form>
</body>
</html>
<?php
    function login($conn, $sql, $username) {
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 0) {
            header('Location: welcome.php');
        } else {
            header('Location: ../../html/failedLogin.html');
        }
    }

    include '../connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $connection = OpenCon();
    $sql = "SELECT username FROM users u WHERE u.username = $username AND u.password = $password";
    login($connection, $sql, $username);

