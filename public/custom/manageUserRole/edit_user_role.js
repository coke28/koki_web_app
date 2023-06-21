// Class definition
var editUserRoleValidation = (function () {
    // Private functions
    var initDatatable = function () {
        const fv = FormValidation.formValidation(
            document.getElementById("edit_user_role_form"),
            {
                fields: {
                    user_role: {
                        validators: {
                            notEmpty: {
                                message: "This field is required.",
                            },
                        },
                    },
                    application_access: {
                        validators: {
                            notEmpty: {
                                message: "This field is required.",
                            },
                        },
                    },
                    user_role_description: {
                        validators: {
                            notEmpty: {
                                message: "This field is required.",
                            },
                        },
                    },
                    status: {
                        validators: {
                            notEmpty: {
                                message: "This field is required.",
                            },
                        },
                    },
                },

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
                .getElementById("editUserRoleSubmitBtn")
                .setAttribute("data-kt-indicator", "on");

            // Disable button to avoid multiple click
            document.getElementById("editUserRoleSubmitBtn").disabled = true;

            // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
            var formx = $("#edit_user_role_form")[0]; // You need to use standart javascript object here
            var formDatax = new FormData(formx);
            $.ajax({
                url: "/userRoleEdit",
                type: "POST",
                data: formDatax,
                contentType: false,
                cache: false,
                processData: false,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (data) {
                    data = JSON.parse(data);
                    if (data.success) {
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
                        $("#edit_user_role_form").trigger("reset");
                        $("#edit_user_role_modal").modal("toggle");
                        $("#user_role_dt").DataTable().ajax.reload();
                    } else {
                        Swal.fire({
                            text: data.message,
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            },
                        });
                        // window.location.reload();
                    }
                    document
                        .getElementById("editUserRoleSubmitBtn")
                        .setAttribute("data-kt-indicator", "off");
                    document.getElementById(
                        "editUserRoleSubmitBtn"
                    ).disabled = false;
                    //  event.preventDefault();
                },
            });
        });
    };
    return {
        // public functions
        init: function () {
            console.log("here");
            // form is binded and initiliazed here
            initDatatable();
        },
    };
})();

jQuery(document).ready(function () {
    //DONT FOGET THIS!!!
    editUserRoleValidation.init();
    

    //
    jQuery(document).off('click', '#edit_user_role_btn');
    jQuery(document).on('click', '#edit_user_role_btn', function(e) {
      var selectedID = $(this).data('id');
      var target = document.querySelector("#userRoleModalContent");
      var blockUI = new KTBlockUI(target, {
          message: '<div class="blockui-message"><span class="spinner-border text-primary"></span> Loading...</div>',
      });
      blockUI.block();

      var formDatax = new FormData();
      formDatax.append('id', selectedID);

      $.ajax({
        url: "/userRoleGetEdit",
        type: "POST",
        data: formDatax,
        contentType: false,
        cache: false,
        processData:false,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function (data){
          blockUI.release();
          blockUI.destroy();
          var obj = JSON.parse(data);
          if(obj){
            $('#edit_user_role_form [name="id"]').val(obj.id);
            $('#edit_user_role_form [name="user_role"]').val(obj.user_role);
            $('#edit_user_role_form [name="application_access"]').val(obj.application_access);
            $('#edit_user_role_form [name="user_role_description"]').val(obj.user_role_description);
            $('#edit_user_role_form [name="status"]').val(obj.status);
          } else {
            // window.location.reload();
          }
        }
      });
    });
});
