<?php

include 'connect.php';

if (isset($_GET['rate'])) {
    $rate = $_GET['rate'];
    $query = "SELECT * FROM restaurant JOIN review ON restaurant.resto_id = review.resto_id WHERE rating >= '$rate'";
} else {
    $query = "SELECT * FROM restaurant JOIN review ON restaurant.resto_id = review.resto_id";
}


$ex = $conn->query($query);

return $ex;
?>
