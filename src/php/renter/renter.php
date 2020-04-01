<?php
function renterQuery($connection, $sql)
{
    $result = mysqli($connection, $sql) or die(mysqli_error($connection));
    if (mysqli_num_rows($result) > 0) {
        echo "<table width=\"100%\" border=\"0\" cellspacing=\"2\"
cellpadding=\"0\"><tr align=\"center\" bgcolor=\"#CCCCCC\">";
        $i=0;
        while ($i < mysqli_num_fields($result)) {
            $field = mysqli_fetch_field_direct($result, $i);
            $fieldName = $field->name;
            echo "<td><strong>$fieldName</strong></td>";
            $i = $i + 1;
        }
        echo "</tr>";

        $bolWhite = true;
        while ($row = mysqli_fetch_assoc($result)) {
            echo $bolWhite ? "<tr bgcolor=\"#CCCCCC\">" : "<tr bgcolor=\"#FFF\">";
            $bolWhite = !$bolWhite;
            foreach ($row as $data) {
                echo "<td>$data</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}

include 'connect.php';
$budget = $_POST['budget'];
$noBedroom = $_POST['noBedrooms'];
$zone = $_POST['zone'];
$parking = $_POST['parking'];
$connection = OpenCon();
$sql = "SELECT l.address, l.rating, l.price 
FROM  listings l
WHERE l.price <= $budget AND l.capacity >= $noBedroom AND l.zone LIKE $zone AND l.parking = $parking";
renterQuery($connection, $sql);
?>