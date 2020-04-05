<?php
$username = $_POST['username'];
$name = $_POST['name'];
if ($_POST['user-input'] == 'Search for listings'){
    header('Location: travellerListingQueries.html?username='.$username.'&name='.$name);
} else {
    header('Location: travellingBookingQueries.php?username='.$username.'&name='.$name);
}
