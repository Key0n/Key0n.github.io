<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
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
                <form action="vendor_car.php" method="POST">
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
                    <button>Submit</button>
                </form>
            </td>
            <td>
                <form action="money_date.php" method="post">
                    <label for="date_start">Дата</label>
                    <input type="date" name="date" id="date"> <br>
                    <button>Submit</button>
                </form>
            </td>
            <td>
                <form action="free_car.php" method="post">
                    <label for="date_start">Дата</label>
                    <input type="date" name="date_1" id="date_1"> <br>
                    <button>Submit</button>
                </form>
            </td>
        <tr style="height: 200px"></tr>
        <tr>
            <th>добавление информации об аренде для выбранного автомобиля на указанные даты</th>
            <th>изменения данных о пробеге</th>
        </tr>
        <tr>
            <td>
                <form action="insert.php" method="post">
                    <select id="car_id" name="car_id">
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
                            $sql = "SELECT `ID_Cars`, `Name` FROM cars";
                            foreach ($dbh->query($sql) as $row) {
                                echo $row;
                                $id = $row['ID_Cars'];
                                $name = $row['Name'];
                                print "<option value='$id'>$name</option>";
                            }
                        } catch (PDOException $e) {
                            echo $e;
                        }
                        ?>
                    </select><br><br>
                    <label for="date_start">Дата Начала</label>
                    <input type="date" name="date_start" id="date_start"> <br>
                    <label for="time_start">Время начала</label>
                    <input type="time" name="time_start" id="time_start"> <br>
                    <label for="date_end">Дата Конца</label>
                    <input type="date" name="date_end" id="date_end"> <br>
                    <label for="time_end">Время конца</label>
                    <input type="time" name="time_end" id="time_end"> <br>
                    <label for="price">Цена</label>
                    <input type="number" name="price" id="price"> <br>
                    <button>Submit</button>
                </form>
            </td>
            <td>
                <form action="update.php" method="post">
                    <select id="car_id_1" name="car_id_1">
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
                            $sql = "SELECT `ID_Cars`, `Name` FROM cars";
                            foreach ($dbh->query($sql) as $row) {
                                echo $row;
                                $id = $row['ID_Cars'];
                                $name = $row['Name'];
                                print "<option value='$id'>$name</option>";
                            }
                        } catch (PDOException $e) {
                            echo $e;
                        }
                        ?>
                    </select><br><br>
                    <label for="new_race">New Race</label>
                    <input type="number" name="new_race" id="new_race"> <br>
                    <button>Submit</button>
                </form>
            </td>
        </tr>

        </tr>
    </table>
</body>

</html>