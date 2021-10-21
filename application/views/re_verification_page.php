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
                <div class="col-md-12">   
                    <?php //echo '<pre>'; print_r($security_que); echo '</pre>'; ?>
                </div>
                                   
                <div class="col-md-3">   
                    <fieldset class="form-group">
                        <legend class="mt-4">re_verification_page</legend>
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
                        <h2>verification</h2>
                        <div >

                            <!-- <img  src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?=$qrCodeUrl?>&chld=H"  /> -->
                        </div>
                        <form id="f_verification_user" name="studentForm" method="POST" action="<?php echo base_url()?>home/verification" novalidate>
                            <div class="form-content">
                                <div class="form-box"> 
                                    <label for="userotp">OTP</label>
                                    <input type="text" placeholder="Your OTP" name="userotp"/> 
                                    <span ng-show="studentForm.userotp.$touched && studentForm.userotp.$error.minlength">min 4 chars.</span> 
                                    <span ng-show="studentForm.userotp.$touched && studentForm.userotp.$error.maxlength">Max 4 chars.</span> 
                                    <span ng-show="studentForm.userotp.$touched && studentForm.userotp.$error.required">OTP is required.</span>
                                </div>
                                
                                <input id="qrCodeUrl" type="hidden" value="" name="qrCodeUrl"/> 
                                <!-- <input type="hidden" value="<?php echo $token; ?>" name="token"/>  -->
                                <div class="form-box">
                                    <input type="submit" name="submit" value="Submit">
                                </div>
                            </div>
                        </form>
                    </div>     

                    <div class="form" id="verification-security" style="display:none">
                        <h2>verification</h2>
                        <form id="verification_security" method="POST" action="<?php echo base_url()?>home/confirmsecurityVerification" novalidate>
                            <div class="form-content">
                                <?php if(isset($security_que) && count($security_que) > 0) 
                                    {
                                    foreach($security_que as $security){ ?>
                                <div class="form-box"> 
                                    <label for="ans_<?php echo $security->id; ?>"><?php echo $security->questions; ?></label>
                                    <input type="text" name="ans_<?php echo $security->id; ?>"/>
                                    <!-- <span ng-show="userForm.ans_<?php echo $security->id; ?>.$touched && userForm.ans_<?php echo $security->id; ?>.$error.required">Answer is required.</span> -->
                                </div>
                                <?php } } ?>

                                <div class="form-box">
                                    <input type="submit" value="Submit">
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
