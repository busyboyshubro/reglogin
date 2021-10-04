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
                <a href="<?php echo base_url().'register';?>" class="btn btn-primary">Login page</a>
                </div>
                <div class="col-md-6">
                    <div class="form">
                        <h2>Register user</h2>
                        <form id="signup-user" name="studentForm" method="POST" action="<?php echo base_url()?>signup/postData" novalidate>
                            <div class="form-content">
                                <div class="form-box">
                                    <label for="firstName">First Name: </label>
                                    <input type="text" name="firstName" ng-minlength="3" ng-maxlength="10" ng-model="firstName" placeholder="Shubro" ng-required="true" /> 
                                    <span ng-show="studentForm.firstName.$touched && studentForm.firstName.$error.minlength">min 3 chars.</span>
                                    <span ng-show="studentForm.firstName.$touched && studentForm.firstName.$error.maxlength">Max 10 chars.</span>
                                    <span ng-show="studentForm.firstName.$touched && studentForm.firstName.$error.required">First name is required.</span>
                                </div>
                                
                                <div class="form-box">
                                    <label for="lastName">Last Name</label>
                                    <input placeholder="Purkait" type="text" name="lastName" ng-minlength="3" ng-maxlength="10" ng-model="lastName" ng-required="true" /> 
                                    <span ng-show="studentForm.lastName.$touched && studentForm.lastName.$error.minlength">min 3 chars.</span>
                                    <span ng-show="studentForm.lastName.$touched && studentForm.lastName.$error.maxlength">Max 10 chars.</span>
                                    <span ng-show="studentForm.lastName.$touched && studentForm.lastName.$error.required">Last name is required.</span>
                                </div>
                                
                                <div class="form-box"> 
                                    <label for="username">Username</label>
                                    <input type="text" placeholder="Your username" name="username" ng-minlength="3" ng-maxlength="10" ng-model="username" ng-required="true" /> 
                                    <span ng-show="studentForm.username.$touched && studentForm.username.$error.minlength">min 3 chars.</span>
                                    <span ng-show="studentForm.username.$touched && studentForm.username.$error.maxlength">Max 10 chars.</span>
                                    <span ng-show="studentForm.username.$touched && studentForm.username.$error.required">username name is required.</span>
                                </div>
                                
                                <div class="form-box">
                                    <label>Email</label>
                                    <input type="email" id="email" ng-model="student.email" name="email" ng-required="true" placeholder="example@mail.com"/> 
                                    <span ng-show="studentForm.email.$touched && studentForm.email.$error.email">Please enter valid email id.</span>
                                    <span ng-show="studentForm.email.$touched && studentForm.email.$error.required">Email is required.</span>
                                </div>
                                
                                <div class="form-box">
                                    <label>Password</label>
                                    <input type="password" placeholder="••••••••" id="password" ng-model="student.password" name="password" ng-pattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[_!@#\$%\^&\*])(?=.{8,})/" ng-required="true" >
                                    <span ng-show="studentForm.password.$touched && studentForm.password.$error.pattern">Please enter 1 uppercase, 1 lowercase, 1 digits and pattern also the min length would be 8 characters.</span>
                                    <span ng-show="studentForm.password.$touched && studentForm.password.$error.required">Please enter password</span>
                                </div>
                                
                                <div class="form-box">
                                    <label>Confirm Password</label>
                                    <input type="password" placeholder="••••••••" id="confirmpassword" ng-model="student.confirmpassword" name="confirmpassword" ng-pattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[_!@#\$%\^&\*])(?=.{8,})/" ng-required="true" >
                                    <span ng-show="studentForm.confirmpassword.$touched && studentForm.confirmpassword.$error.pattern">Please enter 1 uppercase, 1 lowercase, 1 digits and pattern also the min length would be 8 characters.</span>
                                    <span ng-show="studentForm.confirmpassword.$touched && studentForm.confirmpassword.$error.required">Please enter password</span>
                                </div>

                                <!-- Google reCAPTCHA box -->
                                <div class="form-box captcha-code">
                                    <div class="g-recaptcha" data-sitekey="<?php echo GOOGLE_RECAPTCHA_SITE_KEY; ?>" data-callback="recaptchaCallback"></div>
                                    <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
                                </div>

                                <div class="form-box">
                                    <input type="submit" name="submit" value="Sign Up">
                                    
                                <!-- <button type="submit" class="btn btn-primary">Sign Up</button> -->
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