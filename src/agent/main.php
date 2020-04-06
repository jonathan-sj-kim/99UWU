<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agent Login</title>
    <link rel="stylesheet" type="text/css" href="../agent/agentmain.css">

</head>
<body class = "body">
<h1>Hello Agent, welcome back!</h1>
<form class="form" action="../agent/main.php" method="post">
    <br>
    Please enter your login details below
    </br>
    <br>
    <label for="username">Username</label>
    <input class="input" id="username" name="username" type="email" placeholder="type your username here" required>
    </br>
    <label for="password">Password</label>
    <input class="input" id="password" name="password" type="password" placeholder="type your pass in here (case sensitive)">
    </br>
    <button class="button" name="login" type="submit">Login</button>
    <div class="nextstep">
        <a href = "../../src">Cancel</a>
    </div>
</form>

<?php

function agentlogin($conn, $username, $toursql, $transql, $propsql, $houssql)
{
    $tourresult = mysqli_query($conn, $toursql);
    $tranresult = mysqli_query($conn, $transql);
    $propresult = mysqli_query($conn, $propsql);
    $housresult = mysqli_query($conn, $houssql);
    if(!($tourresult || $tranresult || $propresult || $housresult)){
        echo "failed query";
    }
    $type = NULL;
    
    $name = NULL;

    if (0===mysqli_num_rows($tourresult)){
        if (0===mysqli_num_rows($tranresult)) {
            if (0===mysqli_num_rows($propresult)) {
                if (0===mysqli_num_rows($housresult)) {
                    header('Location: ../create/failedLogin.html');
                } else {
                    $name = mysqli_fetch_field_direct($housresult,0);
                    $type = "housekeeping/main.html";
                }
            } else {
                $name = mysqli_fetch_field_direct($propresult,0);
                $type = "property/main.html";
            }
        } else {
            $name = mysqli_fetch_field_direct($tranresult,0);
            $type = "transportation/main.html";
        }
    } else {
        $name = mysqli_fetch_field_direct($tourresult,0);
        $type = "tourism/main.html";
    }

    if ($name) {
        header('location: '.$type.'?name=' . urlencode($name) . '&username=' . urlencode($username));
    } else {
        header('Location: ../create/failedLogin.html');

    }
    CloseCon($conn);
}

if (isset($_POST['login'])) {
    handlePOSTRequest();
}

function handlePOSTRequest()
{

    echo 'Logging in...';
    $username = $_POST['username'];
    $password = $_POST['password'];
    include '../connect.php';
    $connection = OpenCon();
    $toursql = "SELECT u.Name FROM tourismagent t, Users u WHERE u.Username = '$username' AND u.Password = '$password' AND t.Username = u.Username";
    $transql = "SELECT u.Name FROM transportationagent t, Users u WHERE u.Username = '$username' AND u.Password = '$password' AND t.Username = u.Username";
    $propsql = "SELECT u.Name FROM propertyagent p, Users u WHERE u.Username = '$username' AND u.Password = '$password' AND p.Username = u.Username";
    $houssql = "SELECT u.Name FROM housekeepingagent h, Users u WHERE u.Username = '$username' AND u.Password = '$password' AND h.Username = u.Username";

    agentlogin($connection, $username, $toursql, $transql, $propsql, $houssql);
    CloseCon($connection);

}


?>

</body>
</html>
