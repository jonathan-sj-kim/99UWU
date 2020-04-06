<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin starter</title>
    <link rel="stylesheet" type="text/css" href="adminmain.css">

</head>
<body>
<div class="header">
<form action="travellerAnalytics.php" method="post">
    <h1> What would you like to find? </h1>
    <p>
    The traveller(s) with
    <select name="cond" id="cond">
        <option value="MAX"> most </option>
        <option value="MIN"> least </option>
        <option value="AVG"> average </option>
    </select>
        number of bookings </p>
    <input type="submit" name="Search" value="Search this query" />
</form>

<p>
Or would you like to find the agent that manages all the listings in zone
<form action="agentAnalytics.php" method="post">
    <select name="zone">
        <option value="North Vancouver"> North Vancouver </option>
        <option value="UBC"> UBC </option>
        <option value="Kitsilano"> Kitsilano </option>
        <option value="Kerrisdale"> Kerrisdale </option>
        <option value="Downtown"> Downtown </option>
</p>
    </select>
    <input type="submit" value="Find" />
</form>

</div>
</body>
</html>
