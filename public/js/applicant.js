var socket = io('http://127.0.0.1:8423/applicants');

$(document).ready(function () {
    socket.emit('join_room', 'APP_1');

    setInterval(function () {
        httpAjax('post', '/Applicant/checkSchedule/', {}).then((result) => {
            schedule_list(result.data);
        })
    }, 3000);
});

socket.on('receive_notif', function (data) {
    console.log(data);
});

socket.on('receive_message', function (data) {
    console.log(data);
});

function schedule_list(result) {
    $('#schedule-list').empty();
    var json = JSON.parse(result);
    $.each(json, (e, i) => {
        var options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        var date = new Date(i.scheduled_date);
        $('#schedule-list').append("<div class='list-group-item'><h6>" + i.purpose + "</h6><small><i>" + date.toLocaleDateString("en-US", options) + "</i></small><br><br><i class='btn btn-xs text-white bg-" + checkStatus(i.status, date).c + "'>" + checkStatus(i.status, date).m + "</i></div>")
    });
}

function checkStatus(stats, sDate) {
    var json;
    var cDate = new Date();
    switch (stats) {
        case "0":
            if (sDate <= cDate) {
                json = '{"c" : "danger","m": "No Confirmation"}'
            } else {
                json = '{"c" : "success", "m": "Upcoming Schedule"}'
            }
            break;

        case '1':
            json = '{"c" : "success","m": "You have arrived"}'
            break;

        case '2':
            json = '{"c" : "danger","m": "You did not arrived"}'
            break;

        case '3':
            json = '{"c" : "danger","m": "Cancelled Schedule"}'
            break;

        default:
            json = '{"c" : "danger","m": "No Confirmation"}'
            break;
    }

    return JSON.parse(json);
}
