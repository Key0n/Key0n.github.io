<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    require_once __DIR__ . "/vendor/autoload.php";
    $mileage = $_POST['mileage'];

    try {
        $collection = (new MongoDB\Client)->itech_var6->car;
        $cursor = $collection->aggregate(array(
            array(
                '$match' => array(
                    'mileage' => array(
                        '$gt' => (int)$mileage
                    )
                )
            )
        ));
        foreach ($cursor as $doc) {
            echo $doc['mark'] . "<br>";
        }
    } catch (PDOException $e) {
        echo $e;
    }
?>
</body>
</html>