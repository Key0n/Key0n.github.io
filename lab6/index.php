<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">

    <title>Itech</title>
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
    <table width="100%">
        <tr>
            <td>полученный доход с проката по состоянию на выбранную дату</td>
            <td>автомобили с пробегом меньше указанного</td>
            <td>имеющиеся в данном пункте марки автомобилей</td>
        </tr>
        <tr>
            <td>
            <form action="by_date.php" method="post">
                <label for="start">Start</label>
                <input type="date" name="start"><br>
                <label for="end">End</label>
                <input type="date" name="end"><br>
                <button type="submit">Submit</button>
                </form>
            </td>
            <td>
            <form action="mileage.php" method="post">
                <label for="mileage">Mileage</label>
                <input type="number" name="mileage" id="mileage">
                <button type="submit">Submit</button>
                </form>
            </td>
            <td>
            <textarea cols="40" rows="10">
                    <?php
                        require_once __DIR__ . "/vendor/autoload.php";

                        try {
                            $collection = (new MongoDB\Client)->itech_var6->car;
                            $cursor = $collection->distinct("mark");
                            foreach ($cursor as $doc) {
                                echo $doc . "\n";
                            }
                        } catch (PDOException $e) {
                            echo $e;
                        }
                        ?>
                    </textarea>
            </td>
        </tr>
    </table>
</body>

</html>
