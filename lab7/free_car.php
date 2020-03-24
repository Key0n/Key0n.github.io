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
        $date = $_POST['date_1'];

        $div = "<div>$date <br>";
        $sql = "SELECT * FROM cars WHERE ID_Cars NOT IN (SELECT FID_Car FROM rent WHERE '$date' BETWEEN Date_start and Date_end)";
        foreach ($dbh->query($sql) as $row) {
            $str = implode(', ', array_map(
                function ($v, $k) { return sprintf("%s='%s'", $k, $v); },$row,
                array_keys($row)));

            $div .= "<p>$str</p><br>";
        }
        $div .= "</div>";
        echo $div;
    } catch (PDOException $e) {
        echo $e;
    }

    ?>
