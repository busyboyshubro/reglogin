$(document).ready(function() {

	$("#google-ver").change(function() {
		if($(this).is(":checked")) {
			$('#verification-otp').show();
            $('#verification-security').hide();
		} else {
			$('#verification-otp').hide();
		}
	});

	$("#security-ver").change(function() {
		if($(this).is(":checked")) {
			$('#verification-security').show();
            $('#verification-otp').hide();
		} else {
			$('#verification-security').hide();
		}
	});

    $.validator.addMethod('mypassword', function(value, element) {
            return this.optional(element) || (value.match(/[a-zA-Z]/) && value.match(/[0-9]/) && value.match(/[!@#$%^&*():;?_~+=]/));
        },
        'Password must contain at least one alphabetic, one numeric and one special character.');

    $("#signup-user").validate({
        ignore: ':hidden:not("#hiddenRecaptcha")',
        //ignore: ".ignore",
        rules: {
            inputFname: {
                required: true,
            },
            inputLname: {
                required: true,
            },
            inputEmail: {
                required: true,
                email: true
            },
            inputMobile: {
                required: true,
                digits: true,
                minlength: 10,
                minlength: 10

            },
            password: {
                required: true,
                minlength: 8,
                mypassword: true
            },
            inputConfPassword: {
                equalTo: "#password"
            },
            hiddenRecaptcha: {
                required: function() {
                    if (grecaptcha.getResponse() == '') {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
        },
        messages: {
            // inputMobile: { "minlength": "Please enter 10 digit number." },
            password: { "minlength": "Please enter 8 or more characters." },
            confirmpassword: "Confirm Password does not match."
        },
        submitHandler: function(form) {

            // var phone_no = $("#inputMobile").val();

            $.ajax({
                url: form.action,
                type: 'ajax',
                method: form.method,
                dataType: 'json',
                data: $(form).serialize(),
                success: function(response) {

                    if (response.flag == 1) {

                        $.toast({
                            heading: '',
                            text: response.msg,
                            showHideTransition: 'slide',
                            icon: 'success'
                        })
                        setTimeout(function() {
                            window.location.href = response.redirect;

                        }, 1000);

                    } else {
                        grecaptcha.reset();
                        $.toast({
                            heading: '',
                            text: response.msg,
                            showHideTransition: 'slide',
                            icon: 'error'
                        })
                        setTimeout(function() {}, 1000);
                    }
                }
            });
        }
    });

    $("#verification-user").validate({
        ignore: ':hidden',
        rules: {
            userotp: {
                required: true,
                minlength: 4
            }
        },
        messages: {
            // username: { "required": "Please enter valid username or email." },
            userotp: { "minlength": "Please enter 4 characters." }
        },
        submitHandler: function(form) {
            $.ajax({
                url: form.action,
                type: 'ajax',
                method: form.method,
                dataType: 'json',
                data: $(form).serialize(),
                success: function(response) {
                    console.log(response);
                    if (response.flag == 1) {
                        $.toast({
                            heading: '',
                            text: response.msg,
                            showHideTransition: 'slide',
                            icon: 'success'
                        })
                        setTimeout(function() {
                            window.location.href = response.redirect;
                        }, 1000);
                    } else {
                        // grecaptcha.reset();
                        $.toast({
                            heading: '',
                            text: response.msg,
                            showHideTransition: 'slide',
                            icon: 'error'
                        })
                        setTimeout(function() {}, 1000);
                    }
                }
            });
        }
    });

    $("#verification_security").validate({
        ignore: ':hidden',
        // rules: {
        //     userotp: {
        //         required: true,
        //         minlength: 4
        //     }
        // },
        // messages: {
        //     // username: { "required": "Please enter valid username or email." },
        //     userotp: { "minlength": "Please enter 4 characters." }
        // },
        submitHandler: function(form) {
            $.ajax({
                url: form.action,
                type: 'ajax',
                method: form.method,
                dataType: 'json',
                data: $(form).serialize(),
                success: function(response) {
                    console.log(response);
                    if (response.flag == 1) {
                        $.toast({
                            heading: '',
                            text: response.msg,
                            showHideTransition: 'slide',
                            icon: 'success'
                        })
                        setTimeout(function() {
                            window.location.href = response.redirect;
                        }, 1000);
                    } else {
                        // grecaptcha.reset();
                        $.toast({
                            heading: '',
                            text: response.msg,
                            showHideTransition: 'slide',
                            icon: 'error'
                        })
                        setTimeout(function() {}, 1000);
                    }
                }
            });
        }
    });

    $("#f_verification_user").validate({
        ignore: ':hidden',
        rules: {
            userotp: {
                required: true,
                minlength: 4
            }
        },
        messages: {
            // username: { "required": "Please enter valid username or email." },
            userotp: { "minlength": "Please enter 4 characters." }
        },
        submitHandler: function(form) {
            $.ajax({
                url: form.action,
                type: 'ajax',
                method: form.method,
                dataType: 'json',
                data: $(form).serialize(),
                success: function(response) {
                    console.log(response);
                    if (response.flag == 1) {
                        $.toast({
                            heading: '',
                            text: response.msg,
                            showHideTransition: 'slide',
                            icon: 'success'
                        })
                        setTimeout(function() {
                            window.location.href = response.redirect;
                        }, 1000);
                    } else {
                        // grecaptcha.reset();
                        $.toast({
                            heading: '',
                            text: response.msg,
                            showHideTransition: 'slide',
                            icon: 'error'
                        })
                        setTimeout(function() {}, 1000);
                    }
                }
            });
        }
    });

    $("#f_verification_security").validate({
        ignore: ':hidden',
        rules: {
            ans_1: {
                required: true,
            },
            ans_2: {
                required: true,
            },
            ans_3: {
                required: true,
            },
            ans_4: {
                required: true,
            },
            ans_5: {
                required: true,
            }
        },
        messages: {
            ans_1: { "required": "Please enter Your Answer." },
            ans_2: { "required": "Please enter Your Answer." },
            ans_3: { "required": "Please enter Your Answer." },
            ans_4: { "required": "Please enter Your Answer." },
            ans_5: { "required": "Please enter Your Answer." }
        },
        submitHandler: function(form) {
            $.ajax({
                url: form.action,
                type: 'ajax',
                method: form.method,
                dataType: 'json',
                data: $(form).serialize(),
                success: function(response) {
                    console.log(response);
                    if (response.flag == 1) {
                        $.toast({
                            heading: '',
                            text: response.msg,
                            showHideTransition: 'slide',
                            icon: 'success'
                        })
                        setTimeout(function() {
                            window.location.href = response.redirect;
                        }, 1000);
                    } else {
                        $.toast({
                            heading: '',
                            text: response.msg,
                            showHideTransition: 'slide',
                            icon: 'error'
                        })
                        setTimeout(function() {}, 1000);
                    }
                }
            });
        }
    });

    $("#login-user").validate({
        ignore: ':hidden:not("#hiddenRecaptcha")',
        //ignore: ".ignore",
        rules: {
            username: {
                required: true,
            },
            inputPassword: {
                required: true,
                minlength: 8,
                mypassword: true
            },
            hiddenRecaptcha: {
                required: function() {
                    if (grecaptcha.getResponse() == '') {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
        },
        messages: {
            username: { "required": "Please enter valid username or email." },
            inputPassword: { "minlength": "Please enter 8 or more characters." }
        },
        submitHandler: function(form) {

            $.ajax({
                url: form.action,
                type: 'ajax',
                method: form.method,
                dataType: 'json',
                data: $(form).serialize(),
                success: function(response) {
                    console.log(response);
                    if (response.flag == 1) {

                        $.toast({
                            heading: '',
                            text: response.msg,
                            showHideTransition: 'slide',
                            icon: 'success'
                        })
                        setTimeout(function() {
                            window.location.href = response.redirect;

                        }, 1000);

                    } else if (response.flag == 2) {
                        $.toast({
                            heading: '',
                            text: response.msg,
                            showHideTransition: 'slide',
                            icon: 'success'
                        })
                        setTimeout(function() {
                            window.open(response.qrCodeUrl,'MyWindow','width=600,height=300');
                            window.location.href = response.redirect;
                            $('#qrCodeUrl').val(response.qrCodeUrl);
                            // $('#appending').append(response.qrCodeUrl);	
                            // $('#oneCode').append(response.oneCode);	
                        }, 1000);

                    } else {
                        grecaptcha.reset();
                        $.toast({
                            heading: '',
                            text: response.msg,
                            showHideTransition: 'slide',
                            icon: 'error'
                        })
                        setTimeout(function() {}, 1000);
                    }
                }
            });
        }
    });

});


function recaptchaCallback() {
    $('#hiddenRecaptcha').valid();
};

// function recaptchaCall() {
//     $('#hiddenRecaptcha').valid();
// };