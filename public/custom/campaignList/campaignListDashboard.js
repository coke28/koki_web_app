jQuery(document).ready(function () {
    //DONT FOGET THIS!!!
    // event.preventDefault();
    // console.log("LOG");
    // $('#campaignsRunning').text("New Text");
    // $('#campaignsRunning').text("new dialog title");
    jQuery(document).off('change', '#statusSelect');
    jQuery(document).on('change', '#statusSelect', function(e) {

      // console.log($(this).data().val());
      // var campaignID = $(this).data('campaignID');
      
    var campaignID = $('#statusSelect').find(":selected").val();
    //   var target = document.querySelector("#applicationTypeModalContent");
    //   var blockUI = new KTBlockUI(target, {
    //       message: '<div class="blockui-message"><span class="spinner-border text-primary"></span> Loading...</div>',
    //   });
    //   blockUI.block();

      var formDatax = new FormData();
      formDatax.append('campaignID', campaignID);

      $.ajax({
        url: "/list/campaignListDashboard",
        type: "POST",
        data: formDatax,
        contentType: false,
        cache: false,
        processData:false,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function (data){
        //   blockUI.release();
        //   blockUI.destroy();
          var obj = JSON.parse(data);

          if(obj){
            $('#totalLeads').text(obj.totalLeads);
            $('#called').text(obj.called);
            $('#notCalled').text(obj.notCalled);
            var contactPercentage = (obj.called/obj.totalLeads)*100;
            console.log(obj);
            console.log(obj.called/obj.totalLeads);
            $('#percentageContacted').text(contactPercentage+"%");

   


            // $('#edit_application_type_form [name="product"]').val(obj.product);
            // $('#edit_application_type_form [name="applicationTypeDescription"]').val(obj.statusDefinition);
            // $('#edit_application_type_form [name="status"]').val(obj.status);
          
        
        
          } else {
            // window.location.reload();
          }
        }
      });
    });
});
