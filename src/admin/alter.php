<?php
$sql = "SHOW TABLES";
include 'retrieve.php';
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
    <form action="alterInput.php" method="post">
        <h1> Which table do you want to alter? </h1>
        <h3> Please refer to the options listed below to make your choice.</h3>
        <p>
            <select name="table" required>
                <?php $tables = retrieve($sql);
                while ( $table = mysqli_fetch_array($tables) ):
                    echo"<option value=".$table[0].">";
                        echo $table[0];
                    echo"</option>";
                endwhile; ?>
            </select>
            <input type="submit" name="Search" value="Alter" /> </p>
    </form>
    <input type="button" onclick="window.location.href='main.html'" value="Go Back" />
</div>
</body>
</html>