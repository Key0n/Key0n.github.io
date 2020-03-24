<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
    <script src="scripts.js" type="text/javascript"></script>
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
            <th>автомобили выбранного производителя</th>
            <th>полученный доход с проката по состоянию на выбранную дату</th>
            <th>свободные автомобили на выбранную дату</th>
        </tr>
        <tr>
            <td>
                <select id="vendor_id" name="vendor_id">
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
                        $sql = "SELECT `ID_Vendors`, `Name` FROM vendors";
                        foreach ($dbh->query($sql) as $row) {
                            echo $row;
                            $id = $row['ID_Vendors'];
                            $name = $row['Name'];
                            print "<option value='$id'>$name</option>";
                        }
                    } catch (PDOException $e) {
                        echo $e;
                    }
                    ?>
                </select>
                <button id="vendor_car">Submit</button>
            </td>
            <td>
                <label for="date">Дата</label>
                <input type="date" name="date" id="date"> <br>
                <button id='money_date'>Submit</button>
            </td>
            <td>
                <label for="date_1">Дата</label>
                <input type="date" name="date_1" id="date_1"> <br>
                <button id="free_car">Submit</button>
            </td>
        </tr>
        <tr>
            <td><label for="json">JSON</label><br><textarea id="json" cols="30" rows="10"></textarea></td>
            <td><label for="xml">XML</label><br><textarea id="xml" cols="30" rows="10"></textarea></td>
            <td><label for="html">HTML</label><br><textarea id="html" cols="30" rows="10"></textarea></td>
        </tr>
    </table>
</body>

</html>