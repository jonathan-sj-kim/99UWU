<?php
$searchKind = $_POST['search_btn'];
if($searchKind == 'Search'){
    header("Location: searchTable.php");
} else if ($searchKind == 'Traveller Analytics'){
    header('Location: aggregatedSearch.php');
} else if ($searchKind == 'Alter Database') {
    header('Location: alter.php');
} else {
    header('Location: ../index.html');
}