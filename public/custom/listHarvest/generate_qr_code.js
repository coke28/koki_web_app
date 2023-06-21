

  jQuery(document).ready(function() {
    jQuery(document).off('click', '#generateQrCodeBtn');
    jQuery(document).on('click', '#generateQrCodeBtn', function(e) {
      var selectedID = $(this).data('id');
      document.getElementById('generateQrCodeBtn').setAttribute('data-kt-indicator', 'on');
      // Disable button to avoid multiple click
      document.getElementById('generateQrCodeBtn').disabled = true;
      var formDatax = new FormData();
      formDatax.append('id', selectedID);

      $.ajax({
        url: "/list/generate",
        type: "POST",
        data: formDatax,
        contentType: false,
        cache: false,
        processData:false,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function (data){
            // data = JSON.parse(data);
    
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
               "hideMethod": "fadeOut"
             };
    
             toastr.success("Svg file successfully downloaded.", "Success");
        
            document.getElementById('generateQrCodeBtn').setAttribute('data-kt-indicator', 'off');
            document.getElementById('generateQrCodeBtn').disabled = false;
           //  event.preventDefault();
          }
      });
    });

  });