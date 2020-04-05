<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agent Login</title>
    <style>

        body {
            background-image: url("https://images.pexels.com/photos/2007401/pexels-photo-2007401.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
        }

        form {
            background-color: #f2f2f2;
            opacity: 0.8;
            padding: 10px;
        }

        input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #333;
            color: #f2f2f2;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }

        .nextstep a {
            background-color: #333;
            color: white;
            display: inline-block;;
            text-align: center;
            padding: 5px;
            text-decoration: none;
            border: 2px solid white;
            border-radius: 12px;
            margin: 2px 1px;
        }

    </style>
</head>
<body>
<h1>Hello Agent, welcome back!</h1>
<form action="../agent/main.php" method="post">
    <br>
    Please enter your login details below
    </br>
    <br>
    <label for="username">Username</label>
    <input id="username" name="username" type="text" placeholder="type your username here" required>
    </br>
    <label for="password">Password</label>
    <input id="password" name="password" type="text" placeholder="type your pass in here (case sensitive)">
    </br>
    <button name="login" type="submit">Login</button>
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
                    header('Location: ../main/failedLogin.html');
                } else {
                    $name = mysqli_fetch_field_direct($housresult,0);
                    $type = "housekeeping/main.html";
                }
            } else {
                $name = mysqli_fetch_field_direct($housresult,0);
                $type = "property/main.html";
            }
        } else {
            $name = mysqli_fetch_field_direct($housresult,0);
            $type = "transportation/main.html";
        }
    } else {
        $name = mysqli_fetch_field_direct($housresult,0);
        $type = "tourism/main.html";
    }

    if ($name) {
        echo "lit shit";
        header('location: '.$type.'?name=' . urlencode($name) . '&username=' . urlencode($username));
    } else {
        //header('Location: ../main/failedLogin.html');
        echo "fail2";
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
