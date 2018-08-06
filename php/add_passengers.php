<?
if(isset($_POST['add_passenger']) ){
    require('db_conx.php');
    $pid = $_POST['passenger'];
    $fid = $_POST['flight_id'];
    if($pid == -1){
        echo "No passenger selected";
        exit();
    }
    $sql = "INSERT INTO flights_passengers (flight_id, passenger_id) VALUES (:fid, :pid)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['pid' => $pid, 'fid' => $fid]);
    echo "added passenger";

}
?>