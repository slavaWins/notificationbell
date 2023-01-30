var NotificationBell = {};


NotificationBell.LoadList = function () {

    EasyApi.Post("/notificationbell", {}, function (response, error) {
        if (error) {
            return;
        }

        console.log(response);
        //if (response.html)
        $('.notifybellContent').html(response.response.html);


    });
}

NotificationBell.Click = function () {
    $('.iconBellA').removeClass('iconBell_new');
    NotificationBell.LoadList();
}

NotificationBell.Init = function () {

}


$(document).ready(function () {
    NotificationBell.Init();
});

window.NotificationBell = NotificationBell;
