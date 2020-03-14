$(function () {
    $('button').click(function () {
        const name = $('#last_name').val();

        if (!name) {
            alert('Все поля должны быть заполнены!')
        } else {
            let marks = [];
            for (let i = 0; i < 5; i++)
                marks.push(Math.floor(Math.random() * 5) + 1);

            filter(name, marks);
        }
        clear_input();
    });

    function filter(student, marks) {
        let list = $('#excellent');
        for (let i=0; i <=marks.length; i++) {
            if (marks[i] <= 2) {
                list = $('#underperforming');
                break;
            }
            if (marks[i] <= 4)
                list = $('#good-looking');
        }
        list.append(`<li>${student} ${marks}</li>`);
    }

    function clear_input() {
        $('#last_name').val('');
        $('#work_time').val('');
    }


});