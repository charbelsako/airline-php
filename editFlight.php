<? // get the flight info
//add passengers later
require('php/db_conx.php');
$id = $_POST['id'];
$sql = "SELECT a.id, a.duration, b1.city, b1.code, b2.city, b2.code, b1.id, b2.id FROM flights a JOIN airport b1 ON b1.id = a.origin JOIN airport b2 ON b2.id = a.destination WHERE a.id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
$flight = $stmt->fetch();

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title></title>
        <style>
        form {
            margin-top: 20px;
        }
        form > input, form > select{
            margin: 10px;
        }
        form > label{
            margin: 10px;
        }
        </style>
    </head>

    <body>
        <form action="php/edit_flight.php" method="POST">
            <input type="hidden" value="<? echo $id ?>" name="id">
            <label for="duration">Duration: </label>
            <input type="text" name="duration" id="duration" value="<? echo $flight[1] ?>">
            <br>
            <label for="origin">Origin: </label>
            <select name="origin" id="origin">
                <option value="<? echo $flight[6] ?>"><? echo $flight[2]. ' ('. $flight[3] .')' ?></option>
            </select>
            <br>
            <label for="destination">Destination: </label>
            <select name="destination" id="destination">
            <option value="<? echo $flight[7] ?>"><? echo $flight[4]. ' ('. $flight[5] .')' ?></option>
            </select>
            <br>
            <input type="submit" name="submit">
        </form>
    </body>

</html>