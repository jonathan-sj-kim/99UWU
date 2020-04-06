<?php
$sql = "SHOW TABLES";
include 'retrieve.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin starter</title>
</head>
<body>
<form action="searchColumn.php" method="post">
    <br>
    Which tables do you want to look at?
    </br>
    Please refer to the options listed below to make your choice.
    </br>
    <?php $tables = retrieve($connection, $sql);
    while ( $table = mysqli_fetch_array($tables) ):
        echo $table[0]; ?>
        <input for="option" id="<?php echo $table[0]; ?>" name="tables[]" type="checkbox" value="<?php echo $table[0]; ?>">
        </br>
    <?php endwhile; ?>
    <input for="submit" type="submit" name="Search" value="Search" />
</form>

</body>
</html>
