<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Traveller listings page</title>
    <link rel="stylesheet" type="text/css" href="travellermain.css">
</head>
<body>
<form action="travellerListingQuery.php" method="post">
    <input name="username" type="hidden" value="<?php echo $_GET['username']; ?>" />
    <input name="name" type="hidden" value="<?php echo $_GET['name']; ?>" />
    Welcome <?php echo $_GET['name']; ?>!
    <br>
    What kind of rentals are you looking for?
    <br>
    What is your budget?
    <label for="budget">Please use the format X..X.XX</label>
    <br>
    <input id="budget" name="budget" type="number" step="0.01" placeholder="i.e. 1000.11">
    <br>
    <label for="parking">Would you like to have parking?</label>
    <input id="parking" name="parking" type="checkbox" value="parking" />
    <br>
    <label for="zone">Which zone would you like to stay in?:</label>

    <select name="zone" id="zone">
        <option value="UBC">UBC</option>
        <option value="Kitsilano">Kitsilano</option>
        <option value="Metrotown">Metrotown</option>
        <option value="Downtown">Downtown</option>
        <option value="Kerrisdale">Kerrisdale</option>
    </select>
    </br>
    <input type="submit" value="Search">

</form>
</body>
</html>