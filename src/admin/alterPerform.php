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

echo"<h2> Here is the current data in the table. </h2>";
displayQueryResults($conn, "SELECT * FROM ".$table);
CloseCon($conn);

echo"<h3> Please fill in the relevant data below: </h3>";



if ($choice == 'INSERT') {
    $query = "INSERT INTO " . $table . " (";
    for ($i = 0; $i < count($columns); $i++) {
        if ($i > 0) {
            $query = $query . ", " . $columns[$i]["Field"];
        } else {
            $query = $query . " " . $columns[$i]["Field"];
        }
    }
    $query = $query . ") VALUES (";
    echo "<form action='alterInsert.php' method='post'>";

        for ($i = 0; $i < count($columns); $i++){
            echo $columns[$i]["Field"];
            echo "<input name='values[]' type='text' placeholder=".$columns[$i]['Type']." required/>";
            echo "<br>";
        }
        echo"<input type='hidden' value=".$query." name='query'/>";
        echo"<input type='hidden' value=".$table." name='table'/>";
        echo"<input type='submit' value='Insert'/>
</form>";
} else if ($choice == 'UPDATE') {
    $query = "UPDATE " . $table . " SET ";
    echo $query;
    echo "<form action='alterUpdate.php' method='post'>";

        for ($i = 0; $i < count($columns); $i++) {
            echo "<br>" . $columns[$i]['Field'] . " = ";
            echo"<input type='text' name='values[]' placeholder=".$columns[$i]['Type'].">";
        }
        echo"<br>";
        echo"From entries matching this condition:
        <input type='text' name='cond' placeholder=''> <br>";
        echo"<input type='hidden' value=".$query." name='query'/>";
        echo"<input type='hidden' value=".$columns." name='columns'/>";
        echo"<input type='hidden' value=".$table." name='table'/>";
        echo"<input type='submit' value='Update'/>
    </form>";
} else {
    $query = 'DELETE FROM '.$table.' WHERE ';
    echo"Here are the columns available and their types <br>";
    for ($i = 0; $i < count($columns); $i++) {
        echo $columns[$i]["Field"]." ".$columns[$i]["Type"];
        echo"<br>";
    }
    echo"<form action='alterDelete.php' method='post'>
        What kind of entries do you want to delete?
        Enter conditions like its part of a WHERE clause. <br>
        <input type='text' name='cond' placeholder=''>
        <input type='hidden' value=".$query." name='query'/>
        <input type='hidden' value=".$table." name='table'/>
        <input type='submit' value='Delete' />
    </form>";
} ?>
</body>
</html>

