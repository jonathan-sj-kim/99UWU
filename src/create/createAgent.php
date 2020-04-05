<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Agent Account</title>
    <link rel="stylesheet" type="text/css" href="createmain.css">

</head>
<div class="header">
    <body>
    <h1>Welcome to create your agent account!</h1>
    <form action="createUser.php" method="post">
        <br>
        Please provide the following information to create an account </br>
        Your username will be the email address we use to contact you!
        <br>
        </br>
        <label for="username"> Username</label>
        <input id="username" name="username" type="text" required>
        </br>
        <label for="password"> Password</label>
        <input id="password" name="password" type="text" required>
        </br>
        <label for="service name"> Service Name</label>
        <input id="service name" name="service name" type="text">
        </br>
        Please choose the category of the service you are providing: </br>
        <label for="Property"> Property </label>
        <input id="Property" name="Property" type="checkbox" value="Property">
        <label for="Transportation"> Transportation </label>
        <input id="Transportation" name="Transportation" type="checkbox" value="Transportation">
        <label for="Tourism"> Tourism </label>
        <input id="Tourism" name="Tourism" type="checkbox" value="Tourism">
        <label for="Housekeeping"> Housekeeping </label>
        <input id="Housekeeping" name="Housekeeping" type="checkbox" value="Housekeeping">
        </br>


        <div class="nextstep">
            <a href = "../../src">Cancel</a>
            <a href="../agent/main.php">Finish</a>
        </div>
    </form>
    </body>
</div>
</html>
