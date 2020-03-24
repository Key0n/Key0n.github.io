$(document).ready(function () {
    $('#vendor_car').click(function () {
        $.ajax({
            url: 'vendor_car.php',
            type: "post",
            data: { vendor_id: $('#vendor_id').val() },
            success: function (data) {
                let jsonVal = JSON.parse(data);
                $('#json').val(JSON.stringify(jsonVal));
            },
            error: function (data) {
                console.log("Something went wrong!");
            }
        });
    });

    $('#free_car').click(function () {
        $.ajax({
            url: 'free_car.php',
            type: "post",
            data: { date_1: $('#date_1').val() },
            success: function (data) {
                $('#html').val(data);
                
            },
            error: function (data) {
                console.log("Something went wrong!");
            }
        });
    });

    $('#money_date').click(function () {
        var xhr = new XMLHttpRequest();
        let date = $('#date').val();
        var params = `date=${date}`;
        xhr.open('POST', `money_date.php`, true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
       
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                $('#xml').val(xhr.response);
            }
        }
        xhr.send(params);
    });
});
