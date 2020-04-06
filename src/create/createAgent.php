<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Agent Account</title>
    <link rel="stylesheet" type="text/css" href="../create/createmain.css">


</head>
<div class="header">
    <h1>Welcome to create your agent account!</h1>
    <form action="createAgent.php" method="post">
        <br>
        Please provide the following information to create an account
        <br>
        Your username will be the email address we use to contact you!
        <br>
        <label for="username"> Username</label>
        <input id="username" name="username" type="email" maxlength="40" placeholder="type your username here (email address you wish to login with" required><br>        <label for="password"> Password</label>
        <input id="password" name="password" type="password" maxlength="20" placeholder="type your pass in here (case sensitive)" required><br>        <label for="name"> Name</label>
        <input id="name" name="name" type="text" maxlength="40" placeholder="type your name or nickname of how you want others to call you!" required>
        <label for="zone"> Zone</label>
        <input id="zone" name="zone" type="text" required>
        Please choose the category of the service you are providing:<br><br>

        <select name="type" class="ui selection dropdown">
            <option value="prop">Property</option>
            <option value="tour">Tourism</option>
            <option value="tran">Transportation</option>
            <option value="hous">Housekeeping</option>
        </select> <br><br>

        <label for='website'> Website (for Tourism Agents)</label>
        <input id='website' name='website' type='url'>

        <label for='commission'> Commission Rate (for Transportation Agents)</label>
        <input id='commission' name='commission' type='number' min='0' max='100' step="0.1">

        <div class="nextstep">
            <a href = "../../src">Cancel</a>
            <button name="create" type="submit">Create</button>
        </div>

        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

        <?php
        /**
         * Created by IntelliJ IDEA.
         * User: jonat
         * Date: 2020-04-03
         * Time: 8:24 PM
         */

        $conn = NULL;
        $message = NULL;

        if (isset($_POST['create'])) {
            handlePOSTRequest();
        }


        function handlePOSTRequest(){
            global $conn, $message;
            include "../connect.php";
            $conn = OpenCon();
            if ($conn) {
                $result = handleCreateRequest();
                if($result === "success"){
                    $message = $message."Account was successfully created UWU";
                    echo $message;
                    //header('Location: ../create/success.php/message='.urlencode($message));
                    CloseCon($conn);
                }
                if($result === "failure"){
                    echo $message;
                    CloseCon($conn);
                }
                if($result === "tourism"){
                    echo "Tourism Agents should have websites, please try again";
                    CloseCon($conn);
                }
                if($result === "transportation"){
                    echo "Transportation Agents should have commission rates, please try again";
                    CloseCon($conn);
                }
            } else $message = "UWU Was not able to connect :(";
        }

        function handleCreateRequest(){
            global $message, $conn, $username;

            $username = $_POST['username'];
            $password = $_POST['password'];
            $name = $_POST['name'];
            $type = $_POST['type'];
            $zone = $_POST['zone'];

            $usersql = "INSERT INTO Users (username, password, name) VALUES ('$username', '$password', '$name')";

            if ($type === "tour") {
                $website = $_POST['website'];
                if($website==="")
                    return "tourism";
                $agentsql = "INSERT INTO TourismAgent (username, zone, website) VALUES ('$username', '$zone', '$website')";
            } else if ($type === "tran") {
                $commission = $_POST['commission'];
                if($commission==="")
                    return "transportation";
                $agentsql = "INSERT INTO TransportationAgent (username, zone, CRate) VALUES ('$username', '$zone', '$commission')";
            } else if ($type === "hous") {
                $agentsql = "INSERT INTO HousekeepingAgent (username, zone) VALUES ('$username', '$zone')";
            } else if ($type === "prop") {
                $agentsql = "INSERT INTO PropertyAgent (username, zone) VALUES ('$username', '$zone')";
            }

            if(insert($usersql, $agentsql)){
                return "success";
            }else{
                return "failure";
            }
        }


        function insert($usersql, $agentsql){
            global $message, $username;
            if(!executePlainSQL($usersql)){
                $message = $message."#"."Could not create user";
                return false;
            }else if(!executePlainSQL($agentsql)){
                $message = $message."#"."There is already an agent in that zone. Try again";
                executePlainSQL("DELETE FROM Users WHERE Users.Username LIKE '$username'");
                return false;
            }
            return true;
        }

        function executePlainSQL($cmdstr){ //takes a plain (no bound variables) SQL command and executes it

            global $conn, $message;

            if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
            }
            $statement = mysqli_query($conn, $cmdstr);

            if (!$statement) {
                $message = $message."#"."Cannot parse the following command: " . $cmdstr . "<br>";
                $e = mysqli_error($conn); // For OCIParse errors pass the connection handle
                $message = $message."#".htmlentities($e);
            }

            return $statement;
        }

        ?>

    </form>
</div>
</html>
