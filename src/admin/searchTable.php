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
<form action="searchColumn.php" method="post">
    <h1> Which tables do you want to look at?</h1>
    <h3>Please refer to the options listed below to make your choice. </h3>
    <p>
    <?php $tables = retrieve($sql);
    while ( $table = mysqli_fetch_array($tables) ):
        echo $table[0]; ?>
        <input id="<?php echo $table[0]; ?>" name="tables[]" type="checkbox" value="<?php echo $table[0]; ?>">
        </br>
    <?php endwhile; ?>
    </p>
    <input type="submit" name="Search" value="Search" />
</form>
</div>
</body>
</html>
