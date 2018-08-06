<?
require('php/db_conx.php');

$sql = "SELECT a.id, a.duration, b1.city, b1.code, b2.city, b2.code FROM flights a JOIN airport b1 ON b1.id = a.origin JOIN airport b2 ON b2.id = a.destination";
$stmt = $pdo->query($sql);
$row_count = $stmt->rowCount();
$content = '';

if($row_count > 0){
    while ($row = $stmt->fetch()){
        $content .= '<tr>';
        //flight info
        $content .= '<td> <a href="flightDetails.php?id='.$row[0].'">Flight: '.$row[0].' </a></td>' ;
        $content .= '<td> <span class="from">'.$row[2]. ' ('. $row[3].') </span> </td>';
        $content .= '<td>'.$row[4]. ' ('. $row[5].') </td>';
        $content .= '<td>'.$row[1].' minutes </td>';
        //the delete button
        $content .= '<td> <form method="POST" action="php/delete_flight.php">';
        $content .= '<input type="hidden" value="'.$row[0].'" name="id">';
        $content .= '<input type="submit" value="Delete">';
        $content .= '</form> </td>';
        //the edit button
        $content .= '<td> <form method="POST" action="editFlight.php">';
        $content .= '<input type="hidden" value="'.$row[0].'" name="id">';
        $content .= '<input type="submit" value="Edit">';
        $content .= '</form> </td>';

        $content .= '</tr>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Display all flights</title>
    <style>
        span {
            color: crimson;
        }
    </style>
</head>

<body>
    <table border="1" cellpadding="10">
        <thead>
            <h1>flights</h1>
        </thead>
        <tbody>
            <tr>
                <td>Flight Number</td>
                <td>Origin</td>
                <td>Destination</td>
                <td>Duration</td>
                <td>Delete</td>
                <td>Edit</td>
            </tr>
            <? echo $content ?>
        </tbody>
    </table>
    
    <a href="addFlight.php">Add a new Flight</a>
</body>

</html>