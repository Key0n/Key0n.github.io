<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            background: #282828;
            color: white;
        }

        input {
            margin: 5px;
        }
    </style>
</head>

<body>
    <?php
    $database = "iteh2lb1var7";
    $username = "root";
    $password = "";
    $dsn = "mysql:host=127.0.0.1;port=3306;dbname=$database;charset=utf8";

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];
    try {
        $dbh = new PDO($dsn, $username, $password, $options);
        $car_id = $_POST['car_id'];
        $date_start = $_POST['date_start'];
        $time_start = $_POST['time_start'];
        $date_end = $_POST['date_end'];
        $time_end = $_POST['time_end'];
        $price = $_POST['price'];


        $sql = "INSERT rent(FID_Car, Date_start, Time_start, Date_end, Time_end, Cost) VALUES ('$car_id', '$date_start', '$time_start', '$date_end', '$time_end', '$price')";
        $sth = $dbh->prepare($sql);
        $sth->execute();
        echo "$car_id $date_start $time_start $date_end $time_end $price";
    } catch (PDOException $e) {
        echo $e;
    }
    ?>
</body>

</html>