// Class definition
var adminReportValidation = (function () {
    // Private functions
    var initDatatable = function () {
        const fv = FormValidation.formValidation(
            document.getElementById("admin_report_form"),
            {
                // fields: {
                //     select_report_type: {
                //         validators: {
                //             notEmpty: {
                //                 message: "This field is required.",
                //             },
                //         },
                //     },
                    //    'product_bd_list':{
                    //     validators:{
                    //       notEmpty:{
                    //         message: 'This field is required.'
                    //       },
                    //     }
                    //   },
                // },

                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: "",
                    }),
                    // Validate fields when clicking the Submit button
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    excluded: new FormValidation.plugins.Excluded({
                        excluded: function (field, element, elements) {
                            // field is the field name
                            // element is the field element
                            // elements is the list of field elements in case
                            // we have multiple elements with the same name
                            return $(element).is(":hidden");
                            // return true if you want to exclude the field
                        },
                    }),
                },
            }
        );

        // this function listens to the form validation
        fv.on("core.form.valid", function () {
            // Show loading indication

            document
                .getElementById("btn-submit")
                .setAttribute("data-kt-indicator", "on");

            // Disable button to avoid multiple click
            document.getElementById("btn-submit").disabled = true;

            // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
            var formx = $("#admin_report_form")[0]; // You need to use standart javascript object here
            var formDatax = new FormData(formx);

            console.log(formx);
            $.ajax({
                url: "/list/generateReport",
                method: "POST",
                xhrFields: {
                    responseType: "blob",
                },
                data: formDatax,
                contentType: false,
                cache: false,
                processData: false,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (data, status, xhr) {
                    let disposition = xhr.getResponseHeader(
                        "content-disposition"
                    );
                    let matches = /"([^"]*)"/.exec(disposition);
                    let filename =
                        matches != null && matches[1]
                            ? matches[1]
                            : "Reports.csv";

                    let blob = new Blob([data], {
                        type: "octet/stream",
                    });
                    let link = document.createElement("a");
                    link.href = window.URL.createObjectURL(blob);
                    link.download = filename;
                    link.style.display = "none";
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                    //  data = JSON.parse(data);

                    toastr.options = {
                        closeButton: false,
                        debug: false,
                        newestOnTop: false,
                        progressBar: false,
                        positionClass: "toast-bottom-right",
                        preventDuplicates: false,
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "1000",
                        timeOut: "5000",
                        extendedTimeOut: "1000",
                        showEasing: "swing",
                        hideEasing: "linear",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                    };

                    toastr.success(data.message, "Success");
                    // $("#admin_report_form").trigger("reset");

                    document
                        .getElementById("btn-submit")
                        .setAttribute("data-kt-indicator", "off");
                    document.getElementById("btn-submit").disabled = false;
                    //  event.preventDefault();
                },
            });
        });
    };
    return {
        // public functions
        init: function () {
            // form is binded and initiliazed here
            initDatatable();
        },
    };
})();

jQuery(document).ready(function () {
    //DONT FOGET THIS!!!
    adminReportValidation.init();
    jQuery(document).on('change', '#select_date_type', function(e){
      e.preventDefault();
      var datetype = $('#select_date_type').val();
      $('#start_date').val('');
      $('#end_date').val('');
      if(datetype == 'date_range')
        {
            console.log("koki date range");
            $('#date_filter').show('fadeIn');
            $('#btn-submit').hide('fadeOut');
        }else{
            console.log("koki all time");
            $('#date_filter').hide('fadeOut');
            $('#btn-submit').show('fadeIn');
        }
     });

     jQuery(document).on('change', '#start_date', function(e){
        var hideSubmit = true;
        var toDate = new Date($('#start_date').val());
        var fromDate = new Date($('#end_date').val());
        if($('#start_date').val() == ""){
            // console.log("1 start date")
            hideSubmit = false;
        }
        if( $('#end_date').val() == ""){
            // console.log("1 start date")
            hideSubmit = false;
        }
        if(toDate > fromDate){
            console.log("1 end date is greater than start date")
            hideSubmit = false;
        }
        // console.log($('#start_date').val());
        // console.log($('#end_date').val());
        if(hideSubmit){
            $('#start_date').val('');
            $('#end_date').val('');
            $('#btn-submit').show('fadeIn');
        }else{
            $('#btn-submit').hide('fadeOut');
        }
     });
     jQuery(document).on('change', '#end_date', function(e){
        var hideSubmit = true;
        var toDate = new Date($('#start_date').val());
        var fromDate = new Date($('#end_date').val());
        if($('#start_date').val() == ""){
            // console.log("2 start date")
            hideSubmit = false;
        }
        if( $('#end_date').val() == ""){
            // console.log("2 end date")
            hideSubmit = false;
        }
        if(toDate > fromDate){
            // console.log("2 end date is greater than start date")
            hideSubmit = false;
        }
        // console.log($('#start_date').val());
        // console.log($('#end_date').val());
        if(hideSubmit){
            $('#btn-submit').show('fadeIn');
        }else{
            $('#start_date').val() == "";
            $('#end_date').val() == "";
            $('#btn-submit').hide('fadeOut');  
        }  
     });
});
