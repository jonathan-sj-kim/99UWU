<?php
include 'retrieve.php';
$sql = "SHOW TABLES";

if(!isset($_POST["tables"])){
    echo 'No tables were selected, please select at least one table. Returning back';
    header('Refresh: 3; Location: "main.html"');
}

$tables = $_POST["tables"];
$columns = [];
$sqlTemplate = "SHOW columns FROM ";
foreach ($tables as $table) {
    $sql = $sqlTemplate.$table.";";
    $newColumns = retrieve($connection, $sql);
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
    Which columns do you want to keep? CHOOSE AT LEAST ONE FROM EACH TABLE OR RESULTS WILL NOT SHOW.
    </br>
    You will be able to choose a group by option later on.
    </br>
    Please refer to the options listed below to make your choice.
    </br>
    <? foreach($columns as $column):?>
        <?php echo $column; ?>
        <input name="selectedColumns[]" type="checkbox" value="<?php echo $column; ?>">
        </br>
    <?php endforeach; ?>
    <?php foreach($tables as $t): ?>
        <input type="hidden" id="tables" name="tables[]" value="<?php echo $t; ?>" />
    <?php endforeach; ?>
    <?php foreach($columns as $c): ?>
        <input type="hidden" id="columns" name="columns[]" value="<?php echo $c; ?>" />
    <?php endforeach; ?>
    <input type="submit" name="Search" value="Search" />
</form>

</body>
</html>