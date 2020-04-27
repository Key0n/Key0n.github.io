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
        a {
            color: white;
        } 
        .hiden {
            display: none;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
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
                <a id="last_mark" style="display: none" href="#">Show last</a>
                    <ul id="mark_list">
                    </ul>
                </form>
            </td>
            <td>
            <form action="mileage.php" method="post">
                <label for="mileage">Mileage</label>
                <input type="number" name="mileage" id="mileage">
                <button type="submit">Submit</button>
                <a id="last_mileage" style="display: none" href="#">Show last</a>
                    <ul id="mileage_lat">
                    </ul>
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
    <script>
        $(document).ready(function() {
            if(localStorage.getItem('mark_list') !== null) {
                $('#last_mark').css('display', 'block');
            }

            if(localStorage.getItem('mileage') !== null) {
                $('#last_mileage').css('display', 'block');
            }

            $('#last_mark').click(function() {
                let mark_list = $('#mark_list');
                if(!mark_list.children().length) {
                    mark_list.html(localStorage.getItem('mark_list'));
                    $(this).html('Hide');
                } else if(mark_list.hasClass('hiden')) {
                    mark_list.removeClass('hiden');
                    $(this).html('Hide');
                } else {
                    mark_list.addClass('hiden');
                    $(this).html('Show last');
                }
            });

            $('#last_mileage').click(function() {
                let mileage_lat = $('#mileage_lat');
                if(!mileage_lat.children().length) {
                    mileage_lat.html(localStorage.getItem('mileage'));
                    $(this).html('Hide');
                } else if(mileage_lat.hasClass('hiden')) {
                    mileage_lat.removeClass('hiden');
                    $(this).html('Hide');
                } else {
                    mileage_lat.addClass('hiden');
                    $(this).html('Show last');
                }
            });
        });
    </script>
</body>

</html>
