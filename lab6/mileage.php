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
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
<body>
<ul id="mileage">
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
                $mark = $doc['mark'];
                echo "<li>$mark</li>";
            }
        } catch (PDOException $e) {
            echo $e;
        }
    ?>
</ul>
    <script>
        $(document).ready(function() {
            localStorage.mileage = $('#mileage').html();
        });
        </script>
</body>
</html>