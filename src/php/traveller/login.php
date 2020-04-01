<?php
    function login($conn, $sql, $username) {
        $result = mysqli($conn, $sql);
        if (mysqli_num_rows($result) == 0) {
            header('Location: ../../html/traveller/mainFail.html?username='.$username);
        } else {
            header('Location: ../../html/failedLogin.html');
        }
    }

    include '../connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $connection = OpenCon();
    $sql = "SELECT username FROM users u LEFT INNER JOIN travelers t ON u.username = t.username 
WHERE u.username = $username AND u.password = $password";
    login($connection, $sql, $username);

?>