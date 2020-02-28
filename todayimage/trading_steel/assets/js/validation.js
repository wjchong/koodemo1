$(document).ready( function () {
    // Registration Form
    $("#member-registration").validate({
        rules: {
            referId: {
                required: true,
                minlength: 5
            },
            fullname: {
                required: true,
                minlength: 5
            },
            email: {
                required: true,
                email: true
            },
            pswd: {
                required: true,
                minlength: 5
            },
            cpswd: {
                required: true,
                minlength: 5,
                equalTo: "#pswd"
            }
        },
        messages: {
            referId: {
                required: "Reference ID is required !",
                minlength: "Reference ID required atleast 5 characters !"
            },
            fullname: {
                required: "Fullname is required !",
                minlength: "Fullname required atleast 5 characters !"
            },
            email: {
                required: "Email is required !",
                email: "Enter the valid email !"
            },
            pswd: {
                required: "Password is required !",
                minlength: "Password required atleast 5 characters !"
            },
            cpswd: {
                required: "Password is required !",
                minlength: "Password required atleast 5 characters !",
                equalTo: "Password not match !"
            }
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            error.addClass( "help-block" );
            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
        }
    });



    // Login Form
    $("#member-login").validate({
        rules: {
            lemail: {
                required: true,
                email: true
            },
            lpassword: {
                required: true,
                minlength: 5
            }
        },
        messages: {
            lemail: {
                required: "Email is required !",
                email: "Enter the valid email !"
            },
            lpassword: {
                required: "Password is required !",
                minlength: "Password required atleast 5 characters !"
            }
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            error.addClass( "help-block" );
            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
        }
    });


    // Password Change Email Form
    $("#member-forget").validate({
        rules: {
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            email: {
                required: "Email is required !",
                email: "Enter the valid email !"
            }
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            error.addClass( "help-block" );
            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
        }
    });

    // Reset Password Form
    $("#member-resetPswd").validate({
        rules: {
            password: {
                required: true,
                minlength: 5
            },
            cpassword: {
                required: true,
                minlength: 5,
                equalTo: "#password"
            }
        },
        messages: {
            password: {
                required: "Password is required !",
                minlength: "Password required atleast 5 characters !"
            },
            cpassword: {
                required: "Password is required !",
                minlength: "Password required atleast 5 characters !",
                equalTo: "Password not match !"
            }
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            error.addClass( "help-block" );
            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
        }
    });

    // Member Profile Form
    $("#member-profile-update").validate({
        rules: {
            fullname: {
                required: true,
                minlength: 5
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                minlength: 5
            },
            country: {
                required: true
            },
            address: {
                required: true,
                minlength: 5
            }
        },
        messages: {
            fullname: {
                required: "Fullname is required !",
                minlength: "Fullname required atleast 5 characters !"
            },
            email: {
                required: "Email is required !",
                email: "Enter the valid email !"
            },
            phone: {
                required: "Phone# is required !",
                minlength: "Phone# required atleast 5 characters !"
            },
            country: {
                required: "Country name is required !"
            },
            address: {
                required: "Address is required !",
                minlength: "Address required atleast 5 characters !"
            }
        },
        errorElement: "div",
        errorPlacement: function ( error, element ) {
            error.addClass( "help-block" );
            error.css({"font-style": "italic"});
            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
        }
    });

    // Update Password Form
    $("#member-password-update").validate({
        rules: {
            oldPassword: {
                required: true,
                equalTo: "#oldPswd"
            },
            password: {
                required: true,
                minlength: 5
            },
            cpassword: {
                required: true,
                minlength: 5,
                equalTo: "#password"
            }
        },
        messages: {
            oldPassword: {
                required: "Your old password is required !",
                equalTo: "Enter your old password !"
            },
            password: {
                required: "Password is required !",
                minlength: "Password required atleast 5 characters !"
            },
            cpassword: {
                required: "Password is required !",
                minlength: "Password required atleast 5 characters !",
                equalTo: "Password not match !"
            }
        },
        errorElement: "em",
        errorPlacement: function ( error, element ) {
            error.addClass( "help-block" );
            error.css({"font-style": "italic"});
            if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
            } else {
                error.insertAfter( element );
            }
        },
        highlight: function ( element, errorClass, validClass ) {
            $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
        },
        unhighlight: function (element, errorClass, validClass) {
            $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
        }
    });


});

