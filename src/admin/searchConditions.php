<?php
$tables = $_POST['tables'];
$columns = $_POST['columns'];
if (!isset($_POST["selectedColumns"])) {
    echo 'No columns were selected, please select at least one column. Returning back';
    header('Refresh: 3; Location: searchColumn.php');
}
$selectedColumns = $_POST['selectedColumns'];
$cond = [];
if (isset($_POST['cond'])) {
    $cond = $_POST['cond'];
}
$queryColumns = [];
if (isset($_POST['queryColumns'])) {
    $queryColumns = $_POST['queryColumns'];
}
$count = 0;
if (isset($_POST["submit"]) AND $_POST["submit"] == "Add") {
    if(isset($_POST["queryColumns"])) {
        $count = count($_POST["queryColumns"]) + 1;
    } else {
        $count = 1;
    }
} else if (isset($_POST['submit']) AND $_POST["submit"] == "Done") {
    session_start();
    $_SESSION['adminQuery'] = $_POST;
    header('Location: doSearch.php');
}
?>
<html lang="en">

<head>
<link rel="stylesheet" type="text/css" href="adminmain.css">
</head>

<body>
<div class="header">
<h1> Here are the tables.columns that you have selected:</h1>
<?php foreach ($selectedColumns as $tc) {
    echo $tc . "<br>";
}
echo"Would you like to add any conditions? <br>
Click on done if you do not want to impose any conditions on this search or if you are done adding conditions. <br>
<form method='post'>";

    for ($i = 0; $i < $count; $i++) {
        echo "<p class='field'>";
            echo "Condition ".($i+1);
            if (count($queryColumns) > $i) {
                echo"<select  for='queryColumn' id='queryColumns' name='queryColumns[]'>
                    <option disabled selected value> -- select an option -- </option>";
                    for ($c = 0; $c < count($columns); $c++) {
                        echo "<option value=".$columns[$c];
                            if ($queryColumns[$i] == $columns[$c]) {
                                echo "selected";
                            } echo">";
                            echo $columns[$c];
                        echo "</option>";
                    }
                echo "</select>";
            } else {
                echo"<select  for='queryColumn' id='queryColumn' name='queryColumns[]' required>
                    <option disabled selected value> -- select an option -- </option>";
                    for ($c = 0; $c < count($columns); $c++) {
                        echo "<option value=".$columns[$c].">";
                            echo $columns[$c];
                        echo "</option>";
                    }
                echo "</select>";
            }
            echo"<select for='operator' id='operator' name='operators[]' value='operators' required>
                <option disabled selected value> -- select an option -- </option>
                <option value='='> = </option>
                <option value='<'> < </option>
                <option value='>'> > </option>
                <option value='<='> <= </option>
                <option value='>='> >= </option>
                <option value='!='> != </option>
                <option value='LIKE'> LIKE </option>
            </select>
            <label for='cond'>to</label>";
            if (count($cond) > $i) {
                echo"<input type='text' name='cond[]' id='cond'
                       value=".$cond[$i];
                       echo"placeholder='for strings please use double quotes' required>";
            } else {
                echo "<input type='text' name='cond[]' id='cond'
                       placeholder='for strings please use double quotes' required>";
            }
            echo "<br></p>";
    }echo "<p>";
        foreach ($tables as $t):
            echo"<input type='hidden' id='tables' name='tables[]' value=".$t.">";
        endforeach;
        foreach ($columns as $c):
            echo"<input type='hidden' id='columns' name='columns[]' value=".$c.">";
        endforeach;
        foreach ($selectedColumns as $sc):
            echo "<input type='hidden' id='selectedColumns' name='selectedColumns[]' value=".$sc.">";
        endforeach;

        echo "Order By: <select name='orderBy'>
            <option disabled selected value> -- select an option -- </option>";
            foreach($selectedColumns as $sc):
                echo"<option value='selectedColumns[]' value=".$sc."/>";
                echo $sc;
                echo "</option>";
                endforeach;?>


        </select>
        <input type='submit' name='submit' value='Add'>
        <input type='submit' name='submit' value='Done'>
    </p>


</form>
</div>
</body>
</html>
