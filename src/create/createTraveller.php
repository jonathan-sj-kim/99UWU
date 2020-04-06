<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Traveller Account </title>
    <link rel="stylesheet" type="text/css" href="../create/createmain.css">

</head>
<div class="header">
    <h1>Welcome to create your traveller account!</h1>
    <form action="createTraveller.php" method="post">
        <br>
        Please provide the following information to create an account.
        <br>
        Your username will be the email address we use to contact you!
        <br>
        <label for="username"> Username</label>
        <input id="username" name="username" type="email" maxlength="40" placeholder="type your username here (email address you wish to login with" required><br>

        <label for="password"> Password</label>
        <input id="password" name="password" type="password" maxlength="20" placeholder="type your pass in here (case sensitive)" required><br>

        <label for="name"> Name</label>
        <input id="name" name="name" type="text" maxlength="40" placeholder="type your name or nickname of how you want others to call you!" required>
        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

        <div class="nextstep">
            <a href = "../../src">Cancel</a>
            <button name="create" type="submit">Create</button>
        </div>
        <?php
        global $message;
        echo $message;
        ?>
<?php
/**
 * Created by IntelliJ IDEA.
 * User: jonat
 * Date: 2020-04-03
 * Time: 8:24 PM
 */

$conn = NULL;
$global = NULL;

if (isset($_POST['create'])) {
    handlePOSTRequest();
}

function handlePOSTRequest(){
    global $conn, $message;

    include "../connect.php";
    $conn = OpenCon();


    if ($conn) {
        handleCreateRequest();
    } else $message = "UWU Was not able to connect :(";

    header('Location: ../create/success.php/message='.urlencode($message));

}

function handleCreateRequest()
{
    global $message, $conn;

    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $usersql = "INSERT INTO Users (username, password, name)
VALUES ('$username', '$password', '$name')";
    $travellersql = "INSERT INTO Traveller (username)
VALUES ('$username')";

    if(!executePlainSQL($usersql)){
        $message = $message."#"."Could not create user";
    }else if(!executePlainSQL($travellersql)){
        $message = $message."#"."Very weird error, could not create traveller. Try again";
    } else $message = $message."Account was successfully created UWU";

    CloseCon($conn);
}

function executePlainSQL($cmdstr) { //takes a plain (no bound variables) SQL command and executes it
    global $conn, $message;

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $statement = mysqli_query($conn, $cmdstr);

    if (!$statement) {
        $message = $message."#"."<br>Cannot parse the following command: " . $cmdstr . "<br>";
        $e = mysqli_error($conn); // For OCIParse errors pass the connection handle
        $message = $message."#".htmlentities($e);
    }

    return $statement;
}

?>



    </form>
</div>

</html>