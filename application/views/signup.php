<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Register Page</title>
        <?php include('csslinks.php'); ?>
    </head>

    <body>
        <div class="container">
            <div class="login-form" id="login_form">
                <div class="main-div">
                    <div class="panel">
                        <h2>Sign Up</h2>
                    </div>
                    <form id="signup-user" method="POST" action="<?php echo base_url()?>signup/postData">
                        <div class="form-group">
                            <label>Name</label><br>
                            <input type="text" class="form-control validate-char" name="inputFname" id="inputFname">
                        </div>
                        <div class="form-group">
                            <label>Username</label><br>
                            <input type="text" class="form-control validate-char" name="username" id="username">
                        </div>
                        <div class="form-group">
                            <label>Email</label><br>
                            <input type="text" class="form-control" name="inputEmail" id="inputEmail">
                        </div>
                        <div class="form-group mobile-prefix">
                            <label>Username</label><br>
                            <input type="text" class="form-control validate-number" maxlength="10" name="inputMobile"
                                id="inputMobile"><span>+91 - </span>
                        </div>
                        <div class="form-group">
                            <label>Password</label><br>
                            <input type="password" class="form-control" name="inputPassword" id="inputPassword">
                            <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span>

                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label><br>
                            <input type="password" class="form-control" name="inputConfPassword" id="inputConfPassword">
                            <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-Confpassword"></span>
                        </div>
                        <!-- Google reCAPTCHA box -->
                        <div class="form-group captcha-code">
                            <div class="g-recaptcha" data-sitekey="<?php echo GOOGLE_RECAPTCHA_SITE_KEY; ?>"
                                data-callback="recaptchaCallback"></div>
                            <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha"
                                id="hiddenRecaptcha">
                        </div>
                        <button type="submit" class="btn btn-primary">Sign Up Using OTP</button>
                        <p class="new-user-text">Alread have an account? <a href="<?php echo base_url()?>signin">Sign In</a>
                        </p>
                    </form>
                </div>
            </div>

            <div class="otp-form" id="otp_form" style="display: none;">
                <p><img class="otp-img" src="skin/images/verifyOTP.png"></p>
                <h4>OTP Verfication</h4>
                <p>Please enter OTP sent to <span class="blk-clr">+91</span> <span class="blk-clr" id="phn-label"></span>
                </p>
                <div class="pad-top-bot-25"></div>
                <form id="verify-otp" method="POST" action="<?php echo base_url()?>signup/verifyOtp">
                    <input type="hidden" name="phone" id="otp-phone" value="">
                    <div id="divOuter">
                        <div id="divInner">
                            <input id="otpNumber" name="otpNumber" type="text" maxlength="4" />
                        </div>
                    </div>
                    <p>Didn't receive OTP? <a class="blue-link" href="javascript:void(0)" onclick="resendOtp();">Resend OTP</a> <span class="one-of-three">(1 of 3)</span></p>
                    <div class="pad-top-bot-25"></div>
                    <button type="submit" class="btn btn-primary">VERIFY AND PROCEED</button>
                </form>
            </div>

            <div id="success-otp" class="success-otp" style="display: none;">
                <p><img class="otp-img" src="skin/images/congratulation.png"></p>
                <h4>Congratulations !</h4>
                <p>You have successfully Signed Up.</p>
                <p>Login to continue</p>
                <div class="pad-top-bot-25"></div>
                <a href="<?php echo base_url()?>signin"><button type="submit" class="btn btn-primary">LOG IN</button></a>
            </div>
        </div>
        <?php include('jslinks.php'); ?>
    </body>
</html>