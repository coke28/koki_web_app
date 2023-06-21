// Class definition
var accountSettingsValidation = (function () {
    // Private functions
    var initSettings = function initSettings() {
    
    // UI elements
    var passwordMainEl = document.getElementById('change_password');
    var passwordEditEl = document.getElementById('password_edit'); 
    
    // button elements
    var passwordChange = document.getElementById('change_password_button');
    var passwordCancel = document.getElementById('cancel_change_password_button'); 
    
    // toggle UI
    passwordChange.querySelector('button').addEventListener('click', function () {
        toggleChangePassword();
    });
    passwordCancel.addEventListener('click', function () {
        toggleChangePassword();
    });

    var toggleChangePassword = function toggleChangePassword() {
        passwordMainEl.classList.toggle('d-none');
        passwordChange.classList.toggle('d-none');
        passwordEditEl.classList.toggle('d-none');
    };
    };

    //Change Password
    var handleChangePassword = function handleChangePassword(e) {
        var validation; // form elements

        var form = document.getElementById('change_password_form');
        var submitButton = form.querySelector('#save_change_password_button');
        
        validation = FormValidation.formValidation(form, {
            fields: {
                // current_password: {
                //     validators: {
                //         notEmpty: {
                //             message: 'Current Password is required'
                //         },
                //         stringLength: {
                //             min: 8,
                //             message: 'Password must be more than 8 characters long',
                //         },
                //     }
                // },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'New Password is required'
                        },
                        regexp: {
                            regexp: /^(?=.*[!@#\$%\^&\*])[\S]+$/,
                            message: '\u00B7 Password must contain at least one special character',
                        },
                        stringLength: {
                            min: 8,
                            message: '\u00B7 Password must be more than 8 characters long',
                        }
                    }
                },
                password_confirmation: {
                    validators: {
                        notEmpty: {
                            message: 'You must Confirm your New Password '
                        },
                        identical: {
                            compare: function compare() {
                                return form.querySelector('[name=\"password\"]').value;
                            },
                        message: ' The password did not match'
                        }
                    }
                }
            },
            plugins: {
                //Learn more: https://formvalidation.io/guide/plugins
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: 
                    new FormValidation.plugins.Bootstrap5({
                    rowSelector: '.fv-row'
                    })
            }
        });

        submitButton.addEventListener('click', function (e) {
            e.preventDefault();
            validation.validate().then(function (status) {
                if (status == 'Valid') {
                    // Show loading indication
                    submitButton.setAttribute('data-kt-indicator', 'on'); 
                    // Disable button to avoid multiple click
                    submitButton.disabled = true; // Send ajax request

                    axios.post(form.getAttribute('action'), new FormData(form)).then(function (response) {
                        // Show message popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                        Swal.fire({
                            text: "Your password has been successfully reset.",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-light-primary"
                            }
                        });
                    })["catch"](function (error) {
                        var dataMessage = error.response.data.message;
                        var dataErrors = error.response.data.errors;

                        for (var errorsKey in dataErrors) {
                            if (!dataErrors.hasOwnProperty(errorsKey)) continue;
                            dataMessage += " " + dataErrors[errorsKey];
                        }

                        if (error.response) {
                            Swal.fire({
                                text: dataMessage + " : Logging out ",
                                icon: "error",
                                buttonsStyling: false,
                                // confirmButtonText: "Ok, got it!",
                                // customClass: {
                                //     confirmButton: "btn btn-primary"
                                // }
                            });
                        }
                    }).then(function () {
                        // always executed
                        // Hide loading indication
                        window.location.href="/";
                        submitButton.removeAttribute('data-kt-indicator'); // Enable button
                        submitButton.disabled = false;
                    });
                } else {
                    Swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    });
                }
            });
        });
    }; 
// Public methods
    return {
        init: function init() {
            initSettings();        
            handleChangePassword();
        }
    };
})();

$(document).ready(function () {
     //DONT FOGET THIS!!!
     accountSettingsValidation.init();

    $(document).on('change', '.address', function(e){
        e.preventDefault();
        var house_number = "#" + $('#houseNumber').val();
        var block_lot = $('#blockLotStreet').val();
        var street = $('#barangay').val();
        var address = house_number + "/" + block_lot + "/" + street;
        console.log("address:: "+ address);
        $("#address").attr('value', address);
    });
    // DOB :: max date 
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0
    var yyyy = today.getFullYear() ;

    if (dd < 10) {
    dd = '0' + dd;
    }
    if (mm < 10) {
    mm = '0' + mm;
    } 
        
    today = yyyy + '-' + mm + '-' + dd;
    $("#birthdate").attr('max', today);

    $(document).on('change', '#birthdate', function(e){
        var dob = new Date($('#birthdate').val());
        var month_diff = Date.now() - dob.getTime();
        var age_dt = new Date(month_diff); 
        var year = age_dt.getUTCFullYear();

        var age = Math.abs(year - 1970);
        console.log(age);
        $("#age").attr('value', age);
    });
});