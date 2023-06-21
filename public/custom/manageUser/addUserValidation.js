// Class definition
var addUserValidation = (function () {
    // Private functions
    var initDatatable = function () {
        const fv = FormValidation.formValidation(
            document.getElementById("add_user_form"),
            {
                fields: {
                    username: {
                        validators: {
                            notEmpty: {
                                message: "This field is required.",
                            },
                            stringLength: {
                                min: 4,
                                message: "Must be at least 4 characters.",
                            },
                            regexp: {
                                regexp: "^[a-zA-Z0-9]*$",
                                message: "Must not have special characters.",
                            },
                        },
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: "This field is required.",
                            },
                            stringLength: {
                                min: 4,
                                message: "Must be at least 4 characters.",
                            },
                        },
                    },
                    first_name: {
                        validators: {
                            notEmpty: {
                                message: "This field is required.",
                            },
                        },
                    },
                    // middleName: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: "This field is required.",
                    //         },
                    //     },
                    // },
                    last_name: {
                        validators: {
                            notEmpty: {
                                message: "This field is required.",
                            },
                        },
                    },
                    contact_number: {
                        validators: {
                            // notEmpty: {
                            //     message: "This field is required.",
                            // },
                            digits: {
                                message: "Must be an extension.",
                            },
                            stringLength: {
                                min: 3,
                                max: 10,
                                message:
                                    "Must be maximum 10 & minimum 3 digits.",
                            },
                        },
                    },
                    user_role: {
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
                .getElementById("addUserSubmitBtn")
                .setAttribute("data-kt-indicator", "on");

            // Disable button to avoid multiple click
            document.getElementById("addUserSubmitBtn").disabled = true;

            // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
            var formx = $("#add_user_form")[0]; // You need to use standart javascript object here
            var formDatax = new FormData(formx);
            $.ajax({
                url: "/userAdd",
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
                        $("#add_user_form").trigger("reset");
                        // $('#add_user_form [name="supervisor_id"]').val('').trigger('change');
                        // $('#add_user_form [name="crm_user_group_id"]').val('').trigger('change');
                        // $('#add_user_form [name="user_level_id"]').val('').trigger('change');
                        $("#addUser").modal("toggle");
                        $("#user_dt").DataTable().ajax.reload();
                        $("#add_user_form .userImagePreview").html("");
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
                        .getElementById("addUserSubmitBtn")
                        .setAttribute("data-kt-indicator", "off");
                    document.getElementById(
                        "addUserSubmitBtn"
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
    addUserValidation.init();
    // event.preventDefault();

    //File Upload And preview
    jQuery(document).off("change", '#add_user_form [name="file"]');
    jQuery(document).on("change", '#add_user_form [name="file"]', function (e) {
        console.log(this.files);
        var goodInput = true;

        if (!(this.files && this.files[0])) {
            goodInput = false;
        }

        if (goodInput) {
            var file = this.files[0];
            var fileType = file["type"];
            var validImageTypes = ["image/jpg", "image/jpeg"];
            if ($.inArray(fileType, validImageTypes) < 0) {
                goodInput = false;
                console.log("yep invalid file type");
            }
        }

        if (goodInput) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $("#add_user_form .userImagePreview").html(
                    `
                    <img class="img-fluid" src="` +
                        e.target.result +
                        `">
              `
                );
            };

            reader.readAsDataURL(this.files[0]);
        } else {
            Swal.fire({
                text: "Invalid image format",
                icon: "info",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-primary",
                },
            });
            $(this).val("");
        }
    });
});
