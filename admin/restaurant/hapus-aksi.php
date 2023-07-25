 <?php
include('../../config.php');

$id = $_GET['idResto'];
$query = mysqli_query($conn, "DELETE FROM restaurant WHERE resto_id='$id'");
if($query){
header("location: ./tables.php?successDelete");
} else{
    header("location: ./admin/restaurant/tables?failedDelete");
}

?>