<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Welcome Page for Traveller</title>
</head>
<body>
Welcome Traveller <?php echo $_GET["name"]; ?>!
</br>
What you you like to do?
</br>
<form action="processTravellerAction.php" method="post">
    <input name="username" type="hidden" id="hiddenUserName" value="<?php echo $_GET['username']; ?>" />
    <input name="user-input" id="search-listing-btn" type="submit" value="Search for listings"/>
    <input name="user-input" id="booking-btn" type = "submit" value = "See booking history" />
</form>

</body>
</html>
