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

        $sql = "SELECT SUM(cost) as price FROM rent WHERE '$date' BETWEEN Date_start and Date_end";
        $dom = new DOMDocument();
        $dom->encoding = 'utf-8';
        $dom->xmlVersion = '1.0';
        $dom->formatOutput = true;

        $root = $dom->createElement('DateMoney');
        foreach ($dbh->query($sql) as $row) {
            $client_node = $dom->createElement('money');
            $client_node->appendChild($dom->createElement('Date', $date));
            $client_node->appendChild($dom->createElement('Money', $row['price']));
            $root->appendChild($client_node);
        }
        $dom->appendChild($root);
        echo $dom->saveXML();
    } catch (PDOException $e) {
        echo $e;
    }

    ?>

