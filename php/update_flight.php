<?
require('db_conx.php');
$id = $_POST['id'];
$duration = $_POST['duration'];
$origin = $_POST['origin'];
$destination = $_POST['destination'];

$sql = "UPDATE flights SET duration=$duration, origin=$origin, destination=$destination WHERE id=$id";
$query = mysqli_query($db_conx, $sql);

if($query){
    echo "succesfully update the flight.";
}

?>