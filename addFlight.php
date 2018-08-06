<? //get flight options
require('php/db_conx.php');
$flight_options = '';
$sql = 'SELECT * FROM airport';
$stmt = $pdo->query($sql);
$num_rows = $stmt->rowCount();

if($num_rows > 0){
    while($row = $stmt->fetch(PDO::FETCH_OBJ) ){
        $id = $row->id;
        $code = $row->code;
        $city = $row->city;
        $flight_options .= '<option value='.$id.'>'.$city.' ('.$code.')</option>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
<form action="php/add_flight.php" method="POST">
        <label for="duration">Duration: </label>
        <input type="text" name="duration">
        <br>
        <label for="origin">Origin: </label>
        <select name="origin">
            <?
                echo $flight_options;
            ?>
        </select>
        <br>
        <label for="destination">Destination: </label>
        <select name="destination">
            <?
                echo $flight_options;
            ?>
        </select>
        <br>
        <input type="submit" name="submit">

    </form>
</body>
</html>