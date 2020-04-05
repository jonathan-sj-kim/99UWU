<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin starter</title>
</head>
<body>
<form action="travellerAnalytics.php" method="post">
    <br>
    What would you like to find?
    <br>
    The traveller(s) with
    <select name="cond" id="cond">
        <option value="MAX"> most </option>
        <option value="MIN"> least </option>
        <option value="AVG"> average </option>
    </select>
    number of bookings
    <br>
    <input type="submit" name="Search" value="Search this query" />
</form>
Or would you like to find the agent that manages all the listings in zone
<form action="agentAnalytics.php" method="post">
    <select name="zone">
        <option value="North Vancouver"> North Vancouver </option>
        <option value="UBC"> UBC </option>
        <option value="Kitsilano"> Kitsilano </option>
        <option value="Kerrisdale"> Kerrisdale </option>
        <option value="Downtown"> Downtown </option>
    </select>
    <input type="submit" value="Find" />
</form>

</body>
</html>
