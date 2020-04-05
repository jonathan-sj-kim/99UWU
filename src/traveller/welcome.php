<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Welcome Page for Traveller</title>
    <link rel="stylesheet" type="text/css" href="travellermain.css">

</head>
<body>
<h1>
    Welcome Traveller <?php echo $_GET["name"]; ?>!
</h1>
<h3> What would you like to do today? </h3>
<div>
    <form action="processTravellerAction.php" method="post">
        Please choose the service you are looking for from below
        <input name="username" type="hidden" id="hiddenUserName" value="<?php echo $_GET['username']; ?>" />
        <input name="name" type="hidden" id="hiddenName" value="<?php echo $_GET['name']; ?>" />
        <input name="user-input" id="search-listing-btn" type="submit" value="Search for listings"/>
        <input name="user-input" id="booking-btn" type = "submit" value = "See booking history" />
        <br>
    </form>
</div>
<input type="button" value="Log out" onclick="location.href='../index.html'">
</body>
</html>
