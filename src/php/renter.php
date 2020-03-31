<?php
function renterQuery($connection, $sql)
{
    $result = mysqli($connection, $sql) or die(mysqli_error($connection));
    if (mysqli_num_rows($result) > 0) {
        echo "<table width=\"100%\" border=\"0\" cellspacing=\"2\"
cellpadding=\"0\"><tr align=\"center\" bgcolor=\"#CCCCCC\">";
        $i = 0;
        while ($i < mysqli_num_fields($rsResult)) {
            $field = mysqli_fetch_field_direct($rsResult, $i);
            $fieldName = $field->name;
            echo "<td><strong>$fieldName</strong></td>";
            $i = $i + 1;
        }
        echo "</tr>";

        $bolWhite = true;
        while ($row = mysqli_fetch_assoc($rsResult)) {
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
$connection = OpenCon();
$sql = "select l.address, l.rating, l.price 
from listings l left inner join addresses a on l.address = a.address 
where l.price <= $budget AND a.capacity >= $noBedroom AND a.zone LIKE $zone";
renterQuery($connection, $sql);
?>