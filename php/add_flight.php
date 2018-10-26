<? //handles adding a flight
if(isset($_POST['submit']) && isset($_POST['destination']) && isset($_POST['origin']) && isset($_POST['duration']) ) {
    require('db_conx.php');
    //variables that are sent through the form
    $duration = $_POST['duration'];
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];
    
    $sql = "INSERT INTO flights (origin, destination, duration) 
    VALUES (:origin, :destination, :duration)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['origin' => $origin, 'destination' => $destination, 'duration' => $duration]);
    echo 'Flight Added <br>';
    echo '<a href="http://localhost/airport/">Back to full listing</a>';
}
?>