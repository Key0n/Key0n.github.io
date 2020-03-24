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
        $date = $_POST['date'];
        $date = '2014-09-01';

        print "$date <br><br>";
        $sql = "SELECT SUM(cost) as price FROM rent WHERE '$date' BETWEEN Date_start and Date_end";
            foreach ($dbh->query($sql) as $row) {
                print "Money: " . $row['price'];
            }
    } catch (PDOException $e) {
        echo $e;
    }

    ?>
</body>

</html>
