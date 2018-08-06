<?
require('db_conx.php');
$id = $_GET['id'];
$fid = $_GET['fid'];
$sql = "DELETE FROM flights_passengers WHERE passenger_id = :id AND flight_id = :fid";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id, 'fid' => $fid]);
echo "removed the passenger";
?>