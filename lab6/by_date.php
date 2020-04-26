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
    require_once __DIR__ . "/vendor/autoload.php";
    $start = $_POST['start'];
    $end = $_POST['end'];
    echo $start . ' - ' . $end . '<br>';

    $format_start = strtotime($start);
    $format_end = strtotime($end);
    echo $format_start . ' - ' . $format_end . '<br>';

    try {
        $collection = (new MongoDB\Client)->itech_var6->rent;
        $startQuery = array('start' => array( '$gte' => (int)$start));
        $endQuery = array('end' => array('$lte' => (int)$end));
        $query = array('$and' => array($startQuery, $endQuery));
        $cursor = $collection->find($query);
        foreach ($cursor as $doc) {
            echo $doc['mark'] . "<br>";
        }
    } catch (PDOException $e) {
        echo $e;
    }
    ?>
</body>

</html>
