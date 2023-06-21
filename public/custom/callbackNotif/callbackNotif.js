$(document).ready(function() {
  var user_id = $('#agentIDDiv').text().trim();
  $('#agentIDDiv').remove();
  Echo.channel("notifications").listen("CallbackNotification", (e) => {
    console.log('event received');
    console.log(e);
    // console.log(user_id);
    // console.log(e.notification.user_id);
    if (e.notification.user_id == user_id) {

      toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "preventDuplicates":true
      };

      toastr.info(e.notification.message, "Warning");
    }
  });
});
