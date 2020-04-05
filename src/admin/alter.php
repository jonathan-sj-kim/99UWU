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
<form action="alterInput.php" method="post">
    <br>
    Which table do you want to alter?
    </br>
    Please refer to the options listed below to make your choice.
    </br>
    <select name="table" required>
        <?php $tables = retrieve($sql);
        while ( $table = mysqli_fetch_array($tables) ): ?>
            <option value="<?php echo $table[0]; ?>">
                <?php echo $table[0]; ?>
            </option>
        <?php endwhile; ?>
    </select>
    <input type="submit" name="Search" value="Search" />
</form>
<input type="button" onclick="window.location.href='main.html'" value="Go Back" />
</body>
</html>
