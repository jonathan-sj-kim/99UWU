<!DOCTYPE html>
<html lang="en">
<?php
$table = $_POST['table'];
?>
<head>
    <meta charset="UTF-8">
    <title>Admin starter</title>
</head>
<body>
<br>
What would you like to do with the <?php echo $table; ?> table?

<br>
<form action="alterPerform.php" method="post">
    <label for="choice"> Please refer to the options listed below to make your choice. </label>
    <select id="choice" name="choice">
        <option value="INSERT"> Insert </option>
        <option value="UPDATE"> Update </option>
        <option value="DELETE"> Delete </option>
    </select>
    <input type="hidden" name="table" value="<?php echo $table; ?>"/>
    <input type="submit" value="Go"/>
</form>

</body>
</html>
