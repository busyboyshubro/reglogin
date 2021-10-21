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
                <!-- <div class="col-md-12">   
                </div>
                                    -->
                <div class="col-md-3">   
                    <fieldset class="form-group">
                        <legend class="mt-4">Choose Your Option</legend>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="optionsRadios" id="google-ver" value="" >
                            OTP
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="optionsRadios" id="security-ver" value="">
                            Security Question
                            </label>
                        </div>
                    </fieldset>       

                    <a href="<?php echo base_url().'register';?>" class="btn btn-primary">Register page</a>
                </div>
                <div class="col-md-6">
                    <div class="form" id="verification-otp" style="display:none">
                        <h4>Please Download Google Authenticator App on Your Phone</h4>
                        <h2>verification</h2>
                        <form id="verification-user" name="studentForm" method="POST" action="<?php echo base_url()?>home/verification" novalidate>
                            <div class="form-content">
                                <div class="form-box"> 
                                    <label for="userotp">OTP</label>
                                    <input type="text" placeholder="Your OTP" name="userotp"/> 
                                    <span ng-show="studentForm.userotp.$touched && studentForm.userotp.$error.minlength">min 4 chars.</span> 
                                    <span ng-show="studentForm.userotp.$touched && studentForm.userotp.$error.maxlength">Max 4 chars.</span> 
                                    <span ng-show="studentForm.userotp.$touched && studentForm.userotp.$error.required">OTP is required.</span>
                                </div>
                                
                                <input type="hidden" value="<?php echo $token; ?>" name="token"/> 
                                <div class="form-box">
                                    <input type="submit" name="submit" value="Submit">
                                </div>
                            </div>
                        </form>
                    </div>     

                    <div class="form" id="verification-security" style="display:none">
                        <h2>verification</h2>
                        <form id="f_verification_security" name="F_s_Form" method="POST" action="<?php echo base_url()?>home/securityVerification" novalidate>
                            <div class="form-content">
                                <div class="form-box"> 
                                    <label for="ans_1">1. What is your date of birth?</label>
                                    <input type="text" placeholder="Your DOB" name="ans_1"/>
                                </div>
                                
                                <div class="form-box"> 
                                    <label for="ans_2">2. What was your favorite school teacher’s name?</label>
                                    <input type="text" placeholder="Your school teacher’s name" name="ans_2"/>
                                </div>
                                
                                <div class="form-box"> 
                                    <label for="ans_3">3. What’s your favorite movie?</label>
                                    <input type="text" placeholder="Your favorite movie" name="ans_3"/>
                                </div>
                                
                                <div class="form-box"> 
                                    <label for="ans_4">4. What was your first car?</label>
                                    <input type="text" placeholder="Your DOB" name="ans_4"/>
                                </div>
                                
                                <div class="form-box"> 
                                    <label for="ans_5">5. What is your astrological sign?</label>
                                    <input type="text" placeholder="Your DOB" name="ans_5"/>
                                </div>
                                
                                <input type="hidden" value="<?php echo $token; ?>" name="token"/> 
                                <div class="form-box">
                                    <input type="submit" name="submit" value="Submit">
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
