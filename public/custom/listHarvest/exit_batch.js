$(document).ready(function (){

    jQuery(document).off('click', '#exit_batch_view');
    jQuery(document).on('click', '#exit_batch_view', function(e) {
      e.preventDefault();

      console.log("exit");
  
      Swal.fire({
          html: `Are you sure you want to exit?`,
          icon: "info",
          buttonsStyling: false,
          showCancelButton: true,
          confirmButtonText: "Exit",
          cancelButtonText: 'Cancel',
          customClass: {
              confirmButton: "btn btn-primary",
              cancelButton: 'btn btn-danger'
          }
      }).then(function (result) {

        if(result.isConfirmed){
        window.location.href ="/list/harvest";
          // var target = document.querySelector("#application_type_dt");
          // var blockUI = new KTBlockUI(target, {
          //     message: '<div class="blockui-message"><span class="spinner-border text-primary"></span> Loading...</div>',
          // });
          // blockUI.block();

        
        }
      });

    });

  });