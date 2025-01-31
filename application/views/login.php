<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Login - Admin</title>
        <?php include('csslinks.php'); ?>
    </head>

    <body ng-app >
        <div class="container">
            <div class="row ">
                <div class="col-md-3">                    
                <a href="<?php echo base_url().'register';?>" class="btn btn-primary">Register page</a>
                </div>
                <div class="col-md-6">
                    <div class="form">
                        <h2>Login user</h2>
                        <form id="login-user" name="studentForm" method="POST" action="<?php echo base_url()?>home/loginpost" novalidate>
                            <div class="form-content">
                                <div class="form-box"> 
                                    <label for="username">Username or Email</label>
                                    <input type="text" placeholder="Your username" name="username"/> 
                                    <span ng-show="studentForm.username.$touched && studentForm.username.$error.minlength">min 3 chars.</span>
                                    <span ng-show="studentForm.username.$touched && studentForm.username.$error.maxlength">Max 10 chars.</span>
                                    <span ng-show="studentForm.username.$touched && studentForm.username.$error.required">username name is required.</span>
                                </div>
                               
                                <div class="form-box">
                                    <label>Password</label>
                                    <input type="Password" placeholder="••••••••" id="inputPassword" ng-model="student.inputPassword" name="inputPassword" ng-pattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[_!@#\$%\^&\*])(?=.{8,})/" ng-required="true" >
                                    <span ng-show="studentForm.inputPassword.$touched && studentForm.inputPassword.$error.pattern">Please enter 1 uppercase, 1 lowercase, 1 digits and pattern also the min length would be 8 characters.</span>
                                    <span ng-show="studentForm.inputPassword.$touched && studentForm.inputPassword.$error.required">Please enter password</span>
                                </div>
                                
                                <!-- Google reCAPTCHA box -->
                                <div class="form-box captcha-code">
                                    <div class="g-recaptcha" data-sitekey="<?php echo GOOGLE_RECAPTCHA_SITE_KEY; ?>" data-callback="recaptchaCall"></div>
                                    <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
                                </div>

                                <div class="form-box">
                                    <input type="submit" name="submit" value="LogIn">
                                    <!-- <input data-toggle="modal" data-target="#LogIn-popup" value="LogIn" /> -->
                                    <!-- <input class="btn btn-primary nextBtn btn-lg" type="submit" name="campFormbtn3" id="campFormbtn3" value="PREVIEW" /> -->
                                </div>
                            </div>
                        </form>
                    </div>                
                </div>
            </div>
        </div>  
        <?php include('jslinks.php'); ?>
    </body>
</html>
