<?
require('db_conx.php');
$id = $_POST['id'];
$sql = "DELETE FROM flights WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
echo 'Deleted the flight <br>';
echo '<a href="http://localhost/airport/">Back to full listing</a>';
?>