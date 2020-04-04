<?php
print_r($_POST);
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
$count = 1;
if (isset($_POST["submit"]) AND $_POST["submit"] == "Add") {
    echo count($_POST['queryColumns']);
    $count = count($_POST["queryColumns"]) + 1;
} else if (isset($_POST['submit']) AND $_POST["submit"] == "Done") {
    session_start();
    $_SESSION['adminQuery'] = $_POST;
    header('Location: doSearch.php');
}
?>
<html lang="en">
<body>
Here are the tables.columns that you have selected:
<br>
<?php foreach ($selectedColumns as $tc) {
    echo $tc . "<br>";
} ?>
Would you like to add any conditions? <br>
Click on done if you do not want to impose any conditions on this search or if you are done adding conditions.
<br>
<form method="post">
    <?php for ($i = 0; $i < $count; $i++) { ?>
        <p class="field">
            Condition <?php echo $i + 1; ?>
            <?php if (count($queryColumns) > $i) { ?>
                <select id="queryColumns" name="queryColumns[]">
                    <?php for ($c = 0; $c < count($columns); $c++) { ?>
                        <option value="<?php echo $columns[$c]; ?>"
                            <?php if($queryColumns[$i] == $columns[$c]){ ?>
                                selected
                            <?php } ?>>
                            <?php echo $columns[$c]; ?>
                        </option>
                    <?php } ?>
                </select>
            <?php } else { ?>
                <select id="queryColumn" name="queryColumns[]">
                    <?php for ($c = 0; $c < count($columns); $c++) { ?>
                        <option value="<?php echo $columns[$c]; ?>">
                            <?php echo $columns[$c]; ?>
                        </option>
                    <?php } ?>
                </select>
            <?php } ?>
            <select id="operator" name="operators[]" value="operators">
                <option value="=">
                    =
                </option>
                <option value="<">
                    <
                </option>
                <option value=">">
                    >
                </option>
                <option value="=<">
                    =<
                </option>
                <option value="=>">
                    =>
                </option>
                <option value="!="> !=</option>
                <option value="LIKE"> LIKE</option>
            </select>
            <label for="cond">to</label>
            <input type="text" name="cond[]" id="cond"
                   value="<?php if (count($cond) > $i) {
                       echo $cond[$i];
                   } else {
                       echo '';
                   } ?>">
            <br>
        </p>
    <?php } ?>
    <p>
        <?php foreach ($tables as $t): ?>
            <input type="hidden" id="tables" name="tables[]" value="<?php echo $t; ?>"/>
        <?php endforeach; ?>
        <?php foreach ($columns as $c): ?>
            <input type="hidden" id="columns" name="columns[]" value="<?php echo $c; ?>"/>
        <?php endforeach; ?>
        <?php foreach ($selectedColumns as $sc): ?>
            <input type="hidden" id="selectedColumns" name="selectedColumns[]" value="<?php echo $sc; ?>"/>
        <?php endforeach; ?>
<!--        --><?php //foreach ($queryColumns as $qc): ?>
<!--            <input type="hidden" id="queryColumns" name="queryColumns[]" value="--><?php //echo $qc; ?><!--"/>-->
<!--        --><?php //endforeach; ?>
        <input type="submit" name="submit" value="Add"/>
        <input type="submit" name="submit" value="Done"/>
    </p>
</form>

</body>
</html>
