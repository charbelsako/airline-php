<? // gets the flight information with all the passengers in it

require('php/db_conx.php');
$id = $_GET['id'];
$sql = "SELECT a.fname, a.lname, a.id
FROM flights_passengers as fp 
JOIN passengers AS a ON a.id = fp.passenger_id
JOIN flights AS f ON fp.flight_id = f.id
JOIN airport AS b ON f.origin = b.id
JOIN airport AS c ON f.destination = c.id
WHERE f.id = :id";

$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);

$content = '';
$passengers = array(); //array of all the passengers

while($person = $stmt->fetch()){
    $content .= '<tr>';
    $content .= '<td> '. $person[0] .'</td>';
    $content .= '<td> '. $person[1] .'</td>';
    $content .= '<td><a href="php/remove_passenger.php?id='. $person[2] .'&fid='. $id .'"> Remove '. $person[0] .' From This Flight </a> </td>';
    $content .= '</tr>';
    
    array_push($passengers, $person[2]); //adding the passengers id's
}

$non_passengers = '';

if(count($passengers) > 0){
    $sql = "SELECT id, fname, lname FROM passengers WHERE id NOT IN (".join(',',$passengers).")";
}else{
    $sql = "SELECT id, fname, lname FROM passengers";        
}
$stmt = $pdo->query($sql);

while($row = $stmt->fetch()){
    $non_passengers .= '<option value="'. $row[0] .'">'. $row[1] .' '. $row[2] .'</option>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th colspan="3">
                    <h1>Passengers</h1>
                </th>
            </tr>
        </thead>
        <tbody>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Actions</td>
            <? echo $content; ?>
        </tbody>
    
    </table>

    <br>
    <br>
    <br>
    <h2>Add New Passengers</h2>
    <form action="php/add_passengers.php" method="POST">
        <input type="hidden" name="flight_id" value="<? echo $id ?>">
        <select name="passenger">
            <option value="-1">Add Passenger</option>
            <? echo $non_passengers; ?> 
        </select>
        <br>
        <br>
        <input type="submit" name="add_passenger">
    </form>
</body>
</html>