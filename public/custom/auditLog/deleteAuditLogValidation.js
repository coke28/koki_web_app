$(document).ready(function (){

    jQuery(document).off('click', '#delete_audit_log');
    jQuery(document).on('click', '#delete_audit_log', function(e) {
      e.preventDefault();
        //makes sent data name in dt to lowercase
      //console.log($(this).data());
      var id = $(this).data('id');
      Swal.fire({
          html: `Are you sure you want to delete ID: `+$(this).data('id')+` `+$(this).data('action')+`?`,
          icon: "info",
          buttonsStyling: false,
          showCancelButton: true,
          confirmButtonText: "Delete",
          cancelButtonText: 'Cancel',
          customClass: {
              confirmButton: "btn btn-primary",
              cancelButton: 'btn btn-danger'
          }
      }).then(function (result) {

          if(result.isConfirmed){
            var target = document.querySelector("#audit_log_dt");
            var blockUI = new KTBlockUI(target, {
                message: '<div class="blockui-message"><span class="spinner-border text-primary"></span> Loading...</div>',
            });
            blockUI.block();

            var formDatax = new FormData();
            formDatax.append('id', id);

            $.ajax({
              url: "/auditLogDelete",
              type: "POST",
              data: formDatax,
              contentType: false,
              cache: false,
              processData:false,
              headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
              success: function (data){
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

               toastr.success(data, "Success");
               blockUI.release();
               blockUI.destroy();
               $('#audit_log_dt').DataTable().ajax.reload();
              }
            });
          }
      });

    });

  });
