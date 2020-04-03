<?php
function getColumns($conn, $sql) {
    $result = mysqli_query($conn, $sql) or die((mysqli_error($conn)));
    CloseCon($conn);
    return $result;
}
include '../connect.php';
$tables = $_POST["table"];

$connection = OpenCon();
$sqlTemplate = "SHOW columns FROM ";
$columns = [];
foreach ($tables as $table) {
    echo $table."\n";
    $sql = $sqlTemplate.$table.";";
    $newColumns = getColumns($connection, $sql);
    while ($row = mysqli_fetch_assoc($newColumns)) {
        $entry = $table.".".$row["Field"];
        array_push($columns, $entry);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin starter</title>
</head>
<body>
<form action="searchConditions.php" method="post">
    <br>
    Which columns do you want to keep?
    </br>
    Please refer to the options listed below to make your choice.
    </br>
    <? foreach($columns as $column):?>
        <?php echo $column; ?>
        <input id="<?php echo $column; ?>" name="columns[]" type="checkbox" value="<?php echo $column; ?>">
        </br>
    <?php endforeach; ?>
    <input type="hidden" id="tables" name="tables" value="<?php echo $tables ?>"
    <input type="submit" name="Search" value="Search" />
</form>

</body>
</html>