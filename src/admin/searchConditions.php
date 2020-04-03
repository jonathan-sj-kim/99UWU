<?php
include "../connect.php";
$tables[] = $_POST['tables'];
$columns[] = $_POST['columns'];
$sColumns[] = $_POST['sColumns'];
$cond[] = $_POST["cond"];
$conn = OpenCon();

$count = 1;

if (isset($_POST["submit"])) {
    if ($_POST["submit"] == "Add" AND ($cond[$count - 1] == "EXISTS" OR $cond[$count - 1] == "NOT EXISTS")) {
        $count = count($_POST["sColumns"]) + 1;
    } else if ($_POST["submit"] == "Add") {

    } else if ($_POST["submit"] == "Done") {

            print "<pre>";
            print_r($_POST["firstname"]);
            print_r($_POST["lastname"]);
            print "</pre>";

        }
}

?>
?>
<html>
<body>
Here are the tables.columns that you have selected:
<br>
<?php foreach($columns as $tc){
    echo $tc." <br>";
}?>
Would you like to add any conditions? <br>
Click on done if you do not want to impose any conditions on this search or if you are done adding conditions.
<br>
<form method="post">
    <?php for($i = 0; $i < $count; $i++) { ?>
        <p class="field">
            <label> Condition <?php echo $i ?>
                <input id="sColumn" type="text" name="sColumns[]" value="<?php print $sColumns[$i]; ?>" />
                <select id="operator" name="operators[]" value="<">
                    <option value="=">=</option>
                    <option value="<"> < </option>
                    <option value=">"> > </option>
                    <option value="=<"> =< </option>
                    <option value="=>"> => </option>
                    <option value="!="> != </option>
                    <option value="LIKE"> LIKE </option>
                </select>
                <label for="cond">Enter the condition here</label>
                <input type="text" name="cond[]" id="cond">
            </label>
            <?php if ($i < $count - 1) { echo "AND"; } ?>
            <br>
        </p>
    <?php } ?>
    <p>
        <input type="submit" name="submit" value="Add" />
        <input type="submit" name="submit" value="Done" />
    </p>
</form>

</body>
</html>
