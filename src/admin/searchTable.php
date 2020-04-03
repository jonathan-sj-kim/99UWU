<?php
function getTable($conn, $sql) {
    $result = mysqli_query($conn, $sql) or die((mysqli_error($conn)));
    CloseCon($conn);
    return $result;
}
include '../connect.php';
$connection = OpenCon();
$sql = "SHOW TABLES";

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
    <? $tables = getTable($connection, $sql);
    while ( $table = mysqli_fetch_array($tables) ){
        echo $table[0]; ?>
        <input id="<?php echo $table[0]; ?>" name="table[]" type="checkbox" value="<?php echo $table[0]; ?>">
        </br>
    <?php } ?>
    <input type="submit" name="Search" value="Search" />
</form>

</body>
</html>
