<?php
$searchKind = $_POST['search_btn'];
if($searchKind == 'Search'){
    header("Location: searchTable.php");
} else {
    header('Location: advanceTable');

}