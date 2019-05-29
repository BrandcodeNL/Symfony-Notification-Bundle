$('.notification-set-read').on('click', function() {
    let url = Routing.generate('notification_ajax_read_all');
    $.ajax({
        url:  url,
        method: "POST",
        success: function (response) {
            $(".notificationCounter").remove();
            $(".notification-content").html(response["html"]);
        }
    });

});