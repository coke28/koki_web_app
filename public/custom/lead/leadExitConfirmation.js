$(document).ready(function (){

    jQuery(document).off('click', '#exitLead');
    jQuery(document).on('click', '#exitLead', function(e) {
      e.preventDefault();
  
      Swal.fire({
          html: `Are you sure you want to exit? Changes made will not be saved.`,
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
            window.location.href = "/list/lead"
          }
      });

    });

    jQuery(document).off('click', '#exitLeadAgent');
    jQuery(document).on('click', '#exitLeadAgent', function(e) {
      e.preventDefault();
  
      Swal.fire({
          html: `Are you sure you want to exit? Changes made will not be saved.`,
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
            window.location.href = "/agent/lead"
          }
      });

    });

  });