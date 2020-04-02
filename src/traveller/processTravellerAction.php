<?php
$username = $_POST['username'];
if ($_POST['user-input'] == 'Search for listings'){
    header('Location: travellerListingQueries.html?username='.$username);
} else {
    header('Location: travellingBookingQueries.html?username='.$username);
}
