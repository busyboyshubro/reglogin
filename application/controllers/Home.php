<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('encryption');
		$this->load->library('GoogleAuthenticator');
		$this->load->model("CommonModel");
		$this->load->model("SuperUserModel","sup");
	}

	private function generateToken($length = 20)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	// Login Page
	public function index()
	{
		// if(!$this->session->userdata("UserId")){
			$this->load->view('login');
		// } else{
			// redirect(base_url().'superuser');
		// }		
	}

	// Register Page
	public function register()
	{
		$this->load->view('register');
	}

	public function enter()
	{
		// if(!$this->session->userdata("UserId")){
			$this->load->view('enter');
		// } else{
			// redirect(base_url().'superuser');
		// }		
	}

	// Login Function
	// public function LoginUser()
	// {
	// 	$username = $this->input->post('Username');
	// 	$password = $this->input->post('password');
		
	// 	$Select = '*';
	// 	$Table = 'adminlogin';
	// 	$Condition = "`username` = '".$username."'";
        
	// 	$userExist = $this->sup->GetTableRecordsbyCondition($Select, $Table, $Condition);
    //     if( $userExist ){
	// 		foreach($userExist as $row){
	// 			$dbpassword = $row->password;
	// 			$dbpassword = $this->encryption->decrypt($dbpassword);

	// 			$adminemail = $row->email;
	// 			$userid = $row->userid;
	// 			$username = $row->username;
	// 			$role = $row->role;

	// 		}
	// 		if($password ==  $dbpassword){
	// 					$accessToken = $this->generateToken();
	// 					// $login_type = 1;
	// 					$this->sup->InsertIntoLoginSession($userid, $accessToken, $role);
	// 			$sessionData = array(
	// 				'UserId' => $userid,
	// 				'useremail' => $useremail,
	// 				'username' => $username,
	// 				'role' => $role,
	// 				'LoginToken' => $accessToken,
	// 			);
	// 			$this->session->set_userdata($sessionData);
	// 			redirect(base_url().'superuser');
	// 		} else {
	// 			$ResponseMessage = $this->session->set_flashdata('ErrorAlert', 'Password Does not Match !!');
	// 			redirect(base_url().'home');				
	// 		}

    //     } else {
    //     	$ResponseMessage = $this->session->set_flashdata('ErrorAlert', 'User Does not Exist !!');
	// 		redirect(base_url().'home');
    //     }
	// }	

	public function signUpPostData()
	{
		if(isset($_POST) && $_POST != '') {
			if(empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])) {
					echo json_encode(array('flag'=>0, 'msg'=>"Please enter all mandatory / compulsory fields."));
					exit;
			} elseif(!isset($_POST['g-recaptcha-response']) || empty($_POST['g-recaptcha-response'])) {
				echo json_encode(array( 
					'flag' => 0,
                    'msg' => "Please check on the reCAPTCHA box."
                ));
                exit;
            } else if( !preg_match("/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/i", $_POST["email"])) {
				echo json_encode(array('flag'=>0, 'msg'=>"Please enter a valid Email address."));
				exit;
			} elseif($_POST['password'] != $_POST['confirmpassword']) {
				echo json_encode(array('flag'=>0, 'msg'=>"Confirm Password does not match."));
				exit;
			} else {					
				// Verify the reCAPTCHA response 
				$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.GOOGLE_RECAPTCHA_SECRET_KEY.'&response='.$_POST['g-recaptcha-response']); 
				 
				// Decode json data 
				$responseData = json_decode($verifyResponse); 
				 
				// If reCAPTCHA response is valid 
				if($responseData->success) {

					$UserEmail = $this->CommonModel->GetUserBymail($_POST['email']);
					$userName = $this->CommonModel->GetUserBydbUsername($_POST['username']);
						
					if(isset($UserEmail) && $UserEmail->userid!='')
					{	
						echo json_encode(array('flag'=>0, 'msg'=>"User already registered with this email address."));
						exit;
					}elseif (isset($userName) && $userName->userid!='') {
						
						echo json_encode(array('flag'=>0, 'msg'=>"User already registered with this Username."));
						exit;
					} else {	
						
						$HashPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
						
						$insertdata = array( 
							'first_name'  => $_POST['firstName'],
							'last_name'   => $_POST['lastName'],
							'username'	  => $_POST['username'], 
							'email'		  => $_POST['email'],
							'password'	  => $HashPassword,
							'created_at'  => strtotime(date('Y-m-d H:i:s')),
								
						);
						$this->db->insert('adminlogin', $insertdata);
						$LastInsertID= $this->db->insert_id();

						// $string = '0123456789';
						// $string_shuffled = str_shuffle($string);
						// $getOTP = substr($string_shuffled, 0, 4);

						// $insertOTPdata = array( 
							
						// 	'phone_no' => $_POST['username'], 
						// 	'otp'	   => $getOTP,
							
						// );
						// $this->db->insert('otp', $insertOTPdata);
						
							
							// $mtd = "sms";
							// //$mesg = 'Thank You for Signing up in truCSR. Your 4 digits OTP is '.$getOTP.'. Use this to complete the Signup process.';
							// $mesg1 = 'Welcome to truCSR.';
							// $mesg1 .= 'Your 4 digit OTP to complete the Signup process is '.$getOTP.'. Kindly don\'t share your OTP with anyone.';
							// $mesg1 .= '-';
							// $mesg1 .= 'truCSR.in';
                            // $mesg=urlencode($mesg1);

							// $mob = $_POST['username'];
							// $send = "truCSR";
							// $key = "A6caf2ce090e57e969d65c6111ef27bb9";
							// //$template_id = "1007160093502103810";
							// $template_id = "1007162762935940433";

							// $url = 'https://api-alerts.kaleyra.com/v4/?api_key='.$key.'&method='.$mtd.'&message='.$mesg.'&to='.$mob.'&sender='.$send.'&template_id='.$template_id.'';  // API URL
							// //print_r($url);exit;

							// $ch = curl_init();
							// curl_setopt($ch, CURLOPT_URL, $url);
							// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
							// curl_setopt($ch, CURLOPT_POST, 0);
							// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1); // change to 1 to verify cert
							// curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
							// $result = curl_exec($ch);

							$redirect = base_url()."login";
							echo json_encode(array('flag'=>1, 'msg'=>"User Signed Up Successfully.", 'Username'=> $_POST['username'], 'redirect'=> $redirect));
							exit;
					}
				} else {
					echo json_encode(array( 
						'flag' => 0,
						'msg' => "Robot verification failed, please try again."
					));
					exit;
				}
			}
		} else {
			echo json_encode(array('flag'=>0, 'msg'=>"Please enter all mandatory / compulsory fields."));
			exit;
		}

	}
	
    function loginpost()
    {
        if (empty($_POST)) {
            echo json_encode(array(
                'flag' => 0,
                'msg' => "Please enter all mandatory / compulsory fields."
            ));
            exit;
        } else {
            if (empty($_POST['username']) || empty($_POST['inputPassword'])) {
                echo json_encode(array( 
					'flag' => 0,
                    'msg' => "Please enter all mandatory / compulsory fields."
                ));
                exit;
            } elseif(!isset($_POST['g-recaptcha-response']) || empty($_POST['g-recaptcha-response'])) {
				echo json_encode(array( 
					'flag' => 0,
                    'msg' => "Please check on the reCAPTCHA box."
                ));
                exit;
            // } elseif (!preg_match("/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/i",  $_POST['username'])) {
            //     echo json_encode(array(
            //         'flag' => 0,
            //         'msg' => "Please enter valid EMAIL."
            //     ));
            //     exit;
            } else {

				if($this->session->userdata('loginAttempts')){
					if($this->session->userdata('loginAttempts')['noofattempts'] >= 3 ){
						if($this->session->userdata('loginAttempts')['firstattempt']){
							// $time = date($this->session->userdata('loginAttempts')['firstattempt'], strtotime('-5 minutes'));
							$time = date("h:i:sa", strtotime('-5 minutes'));
							if($time < $this->session->userdata('loginAttempts')['firstattempt']){
								echo json_encode(array( 
									'flag' => 0,
									'msg' => "User id blocked for 5 Minutes",
								));
								exit;
							}
						}
					}
				}

				// Verify the reCAPTCHA response 
				$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.GOOGLE_RECAPTCHA_SECRET_KEY.'&response='.$_POST['g-recaptcha-response']);

				// Decode json data 
				$responseData = json_decode($verifyResponse);

				// If reCAPTCHA response is valid 
				if($responseData->success) {				
					$RecorduserName = $this->CommonModel->UsernameExistCount($_POST['username']);
					// print_r($RecorduserName); die;
					$UserDetails = $this->CommonModel->GetUserByEmailUsername($_POST['username']);
					
					if ($UserDetails != '') {
						$Pass1 = $UserDetails->password;
					}               
					$Pass2 = $_POST['inputPassword'];     
					if ($RecorduserName > 0 && password_verify($Pass2, $Pass1)) { 
						$sessionRecord  = $this->CommonModel->GetUsersession($UserDetails->userid);
						// print_r($sessionRecord); die();
						// print_r($this->session->userdata()); 
						if ($sessionRecord != '') {
							$redirect = base_url()."home/enter";							                   
								echo json_encode(array(
									'flag' => 1,
									'msg' => "Success",
									'redirect' => $redirect
								));
								exit;
						}else {
							$this->load->library('GoogleAuthenticator');
							// generates the secret code
							$secret = $this->googleauthenticator->createSecret();
							// echo '<br>';
							// generates the QR code for the link the user's phone with the service
							$qrCodeUrl = $this->googleauthenticator->getQRCodeGoogleUrl('Service Name', 'user@email.com', $secret);
							// echo '<br>';

							// echo '<a href="'.$qrCodeUrl.'">'.$qrCodeUrl.'</a>';
							// echo '<br>';
							
							$oneCode = $this->googleauthenticator->getCode($secret);
							// echo 'Code will get from 2 steps Authenticator App - '.$oneCode = $this->googleauthenticator->getCode($secret);
							// echo '<br>';
							// get the user's phone code and the secret code that was generated, and verify
							$checkResult = $this->googleauthenticator->verifyCode($secret, $oneCode, 2); // 2 = 2*30sec clock tolerance
							// echo '<br>';				
							$this->session->set_userdata('UserId', $UserDetails->userid);     
							$this->session->set_userdata('LoginToken', $this->generateToken());       
							$this->db->insert('login_session', array(
								'user_id' => $UserDetails->userid,
								'access_token' => $this->session->userdata('LoginToken'),
								'login_time' => strtotime(date('Y-m-d H:i:s'))
							));    
							
							$redirect = base_url()."home/enter";							                   
								echo json_encode(array(
									'flag' => 2,
									'msg' => "Success",
									'redirect' => $redirect,
									'qrCodeUrl' => $qrCodeUrl,
									'oneCode' => $oneCode
								));
								exit;
						}
					} else {
						// print_r($this->session->userdata('loginAttempts'));
						// die();
						// $this->session->unset_userdata('loginAttempts');

						if($this->session->userdata('loginAttempts')){
							if($this->session->userdata('loginAttempts')['noofattempts'] >= 1 ){

								$AttemptDetails = array(
									'noofattempts'  => ++$this->session->userdata('loginAttempts')['noofattempts'],
									// 'firstattempt'     => $this->session->userdata('loginAttempts')['firstattempt'],
									'firstattempt'     => date("h:i:sa"),
								);								
								$this->session->set_userdata('loginAttempts', $AttemptDetails);
							}
						} else {

							$AttemptDetails = array(
								'noofattempts'  => 1,
								'firstattempt'     => date("h:i:sa"),
							);
							$this->session->set_userdata('loginAttempts', $AttemptDetails);
						}
											

						// print_r($this->session->userdata('loginAttempts'));
						// die();

						echo json_encode(array(
							'flag' => 0,
							'msg' => "Invalid Password."
						));
						exit;
					}
				} else {
					echo json_encode(array( 
						'flag' => 0,
						'msg' => "Robot verification failed, please try again."
					));
					exit;
				}
            }
        }
    }    
				
}
