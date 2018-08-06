<? //handles editing a flight's details
if(isset($_POST['submit'])){
    echo $_POST['origin'] . '<br>';
    echo $_POST['destination'] . '<br>';
    echo $_POST['duration'] . '<br>';
    echo $_POST['id'] . '<br>';
    require('db_conx.php');
    $id = $_POST['id'];
    $origin = $_POST['origin'];
    $destination = $_POST['destination'];
    $duration = $_POST['duration'];
    $sql = 'UPDATE flights SET origin = :origin, destination = :destination, duration = :duration WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['origin' => $origin, 'destination' => $destination, 'duration' => $duration, 'id' => $id]);
    echo 'Updated the flight <br>';
    echo '<a href="http://localhost/airport/">Back to full listing</a>';
}
?>