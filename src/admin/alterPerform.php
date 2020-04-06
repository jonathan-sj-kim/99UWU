<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Perform Alter Table</title>
    <link rel="stylesheet" type="text/css" href="adminmain.css">
</head>
<body>
<?php
$table = $_POST['table'];
$choice = $_POST['choice'];
include '../display.php';
include "../connect.php";
$sql = "SHOW COLUMNS FROM " . $table;
$conn = OpenCon();
$result = mysqli_query($conn, $sql) or die((mysqli_error($conn)));
$columns = [];
$query = '';
while ($col = mysqli_fetch_assoc($result)) {
    array_push($columns, $col);
}
?>
<h2> Here is the current data in the table. </h2>
<?php

displayQueryResults($conn, "SELECT * FROM ".$table);
CloseCon($conn);
?>
<h3> Please fill in the relevant data below: </h3>
<?php
if ($choice == 'INSERT') {
    $query = "INSERT INTO " . $table . " (";
    for ($i = 0; $i < count($columns); $i++) {
        if ($i > 0) {
            $query = $query . ", " . $columns[$i]["Field"];
        } else {
            $query = $query . " " . $columns[$i]["Field"];
        }
    }
    $query = $query . ") VALUES ("; ?>
    <form action="alterInsert.php" method="post">
        <?php
        for ($i = 0; $i < count($columns); $i++){
            echo $columns[$i]["Field"]; ?>
            <input name="values[]" type="text" placeholder="<?php echo $columns[$i]['Type']; ?>" required/>
            <br>
        <?php } ?>
        <input type="hidden" value="<?php echo $query; ?>" name="query"/>
        <input type="hidden" value="<?php echo $table; ?>" name="table"/>
        <input type="submit" value="Insert"/>
    </form>
<?php } else if ($choice == 'UPDATE') {
    $query = "UPDATE " . $table . " SET ";
    echo $query; ?>
    <form action="alterUpdate.php" method="post">
        <?php
        for ($i = 0; $i < count($columns); $i++) {
            echo "<br>" . $columns[$i]['Field'] . " = " ?>
            <input type="text" name="values[]" placeholder="<?php echo $columns[$i]['Type']; ?>">
        <?php } ?>
        <br>
        From entries matching this condition:
        <input type="text" name="cond" placeholder=""> <br>
        <input type="hidden" value="<?php echo $query; ?>" name="query"/>
        <input type="hidden" value="<?php echo $columns; ?>" name="columns"/>
        <input type="hidden" value="<?php echo $table; ?>" name="table"/>
        <input type="submit" value="Insert"/>
    </form>
<?php } else {
    $query = "DELETE FROM ".$table." WHERE "; ?>
    Here are the columns available and their types <br>
    <?php for ($i = 0; $i < count($columns); $i++) {
        echo $columns[$i]["Field"]." ".$columns[$i]["Type"]; ?>
        <br>
    <?php } ?>
    <form action="alterDelete.php" method="post">
        What kind of entries do you want to delete?
        Enter conditions like its part of a WHERE clause. <br>
        <input type="text" name="cond" placeholder="">
        <input type="hidden" value="<?php echo $query; ?>" name="query"/>
        <input type="hidden" value="<?php echo $table; ?>" name="table"/>
        <input type="submit" value="Delete" />
    </form>
<?php } ?>
</body>
</html>

