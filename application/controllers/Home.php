<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('encryption');
		$this->load->library('GoogleAuthenticator');
		$this->load->model("CommonModel");
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
		if(!$this->session->userdata("UserId")){
			$this->load->view('login');
		} else{
			redirect(base_url().'Home');
		}		
	}

	// Register Page
	public function register()
	{
		$this->load->view('register');
	}

	public function enter()
	{
		if(!$this->session->userdata("UserId")){
			$this->load->view('enter');
		} else{
			redirect(base_url().'Home');
		}		
	}

	public function verification_page()
	{
		// $otpRecord = $this->CommonModel->email_otp_optout($token);
		// $otpStatus$otpRecord->status;
		// print_r($otpRecord); die();
		// if($otpRecord){
			// $data['security_que']  = $this->CommonModel->security_que();
			$data['token'] ='';
			$this->load->view('verification_page',$data);
		// } else{
		// 	redirect(base_url().'Home');
		// }		
	}

	public function re_verification_page()
	{
		// $otpRecord = $this->CommonModel->email_otp_optout($token);
		// $otpStatus$otpRecord->status;
		// print_r($otpRecord); die();
		// if($otpRecord){
			$string = '12';
			$string_shuffled = str_shuffle($string);
			$rand = substr($string_shuffled, 0, 1);
			$string1 = '345';
			$string_shuffled1 = str_shuffle($string1);
			$rand1 = substr($string_shuffled1, 0, 1);
			$array_ans=array($rand, $rand1);
			$data['security_que']  = $this->CommonModel->security_que($array_ans);
		// 	$data['token'] =$token;
			$this->load->view('re_verification_page',$data);
		// } else{
		// 	redirect(base_url().'Home');
		// }		
	}

	public function verification()
	{
		if(isset($_POST) && $_POST != '') {
			if(empty($_POST['userotp'])) {
				echo json_encode(array('flag'=>0, 'msg'=>"Please enter valid OTP."));
				exit;
			} else{
				$this->load->library('GoogleAuthenticator');
				$otpRecord = $this->CommonModel->email_otp_optout($_SESSION['UserId']);
				$secret = $otpRecord->token;
				$oneCode=$_POST['userotp'];
				  $checkResult = $this->googleauthenticator->verifyCode($secret, $oneCode, 2); // 2 = 2*30sec clock tolerance
				// echo '<br>';
				// die();
				if($checkResult == 1){
					// $insertdata = array( 
					// 	'status'  => 2,
					// );
					// $this->db->where(array('token'=>$token));
					// $this->db->update('email_otp_optout', $insertdata);

					$redirect = base_url()."home/enter";							                   
					echo json_encode(array(
						'flag' => 1,
						'msg' => "Success",
						'redirect' => $redirect,
					));
					exit;
				} else{
					echo json_encode(array('flag'=>0, 'msg'=>"Please enter valid OTP.."));
					exit;
				}	
			}
		} else {
			echo json_encode(array('flag'=>0, 'msg'=>"Please enter Your OTP..."));
			exit;
		}
	}

	public function securityVerification()
	{
		if(isset($_POST) && $_POST != '') {
			// if(empty($_POST['token'])) {
			// 	echo json_encode(array('flag'=>0, 'msg'=>"Please enter valid OTP."));
			// 	exit;
			// } else{
				// $token=$_POST['token'];
				$ans_1=$this->input->post('ans_1');
				$ans_2=$this->input->post('ans_2');
				$ans_3=$this->input->post('ans_3');
				$ans_4=$this->input->post('ans_4');
				$ans_5=$this->input->post('ans_5');
				// $array_ans=array($ans_1, $ans_2, $ans_3, $ans_4, $ans_5);
				// print_r($this->session->userdata());
				// $userfromtoken = $this->CommonModel->getuserfromtoken($token);
				
				if ($ans_1 != '') {
					$insertanswersData=array(  
						'answer'	=> $ans_1,
						'userid' 	=> $_SESSION['UserId'],
						'que_id' 	=> 1,
					);	
					$this->db->insert('security_ans', $insertanswersData);
				}

				if ($ans_2 != '') {
					$insertanswersData=array(  
						'answer'	=> $ans_2,
						'userid' 	=> $_SESSION['UserId'],
						'que_id' 	=> 2,
					);	
					$this->db->insert('security_ans', $insertanswersData);
				}

				if ($ans_3 != '') {
					$insertanswersData=array(  
						'answer'	=> $ans_3,
						'userid' 	=> $_SESSION['UserId'],
						'que_id' 	=> 3,
					);	
					$this->db->insert('security_ans', $insertanswersData);
				}

				if ($ans_4 != '') {
					$insertanswersData=array(  
						'answer'	=> $ans_4,
						'userid' 	=> $_SESSION['UserId'],
						'que_id' 	=> 4,
					);	
					$this->db->insert('security_ans', $insertanswersData);
				}

				if ($ans_5 != '') {
					$insertanswersData=array(  
						'answer'	=> $ans_5,
						'userid' 	=> $_SESSION['UserId'],
						'que_id' 	=> 5,
					);	
					$this->db->insert('security_ans', $insertanswersData);
				}
				// return redirect(base_url()."home/enter");
				$redirect = base_url() . "home/enter";
				echo json_encode(array('flag'=>1, 'msg'=>"Success.", 'redirect'=>$redirect));
				
			// }
		} else {
			echo json_encode(array('flag'=>0, 'msg'=>"Please enter Your OTP."));
			exit;
		}
	}

	public function confirmsecurityVerification()
	{
		// print_r($_POST); //die();
		if(isset($_POST) && $_POST != '') {
			
			$ans_1 = isset($_POST['ans_1'])?$_POST['ans_1']:'';
			$ans_2 = isset($_POST['ans_2'])?$_POST['ans_2']:'';
			$ans_3 = isset($_POST['ans_3'])?$_POST['ans_3']:'';
			$ans_4 = isset($_POST['ans_4'])?$_POST['ans_4']:'';
			$ans_5 = isset($_POST['ans_5'])?$_POST['ans_5']:'';
		
			$answer = array();
			$que_id = array();
			foreach ($_POST as $key => $value) {
				$questn_id = preg_replace('/[ans_]+/', '', $key);
				$que_id[]=number_format($questn_id);
				$answer[] = $value;
			}
			
			$userAns = $this->CommonModel->get_security_ans($que_id,$answer,$_SESSION['UserId']);
			// echo '<pre>'; print_r($que_id); print_r($userAns); echo '</pre>'; //die();
			$redirect = base_url() . "home/enter";

			if ($userAns == 1) {
				echo json_encode(array('flag'=>1, 'msg'=>"Success.", 'redirect'=>$redirect));
				// exit;
			} else {
				echo json_encode(array('flag'=>0, 'msg'=>"Please enter Your Answer."));
				// exit;
			}

		} else {
			echo json_encode(array('flag'=>0, 'msg'=>"Please enter Your Answer."));
			// exit;
		}
	}

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
					$user_email = $UserDetails->email;

					if ($UserDetails != '') {
						$Pass1 = $UserDetails->password;
					}               
					$Pass2 = $_POST['inputPassword'];     
					if ($RecorduserName > 0 && password_verify($Pass2, $Pass1)) { 
						$this->session->set_userdata('UserId', $UserDetails->userid); 
						$sessionRecord  = $this->CommonModel->GetUsersession($UserDetails->userid);
						$otpRecord = $this->CommonModel->email_otp_optout($UserDetails->userid);
						// echo '<pre>'; print_r($otpRecord); echo '</pre>'; //die();
						// print_r($this->session->userdata()); 
						if ($sessionRecord != '') {
							
							$this->load->library('GoogleAuthenticator');
							$secret = $otpRecord->token;
							// $qrCodeUrl = $this->googleauthenticator->getQRCodeGoogleUrl('Shubro', $user_email, $secret);
							$securityAnsCheck = $this->CommonModel->check_security_ans($UserDetails->userid);
							if ($securityAnsCheck == 1) {
								$redirect = base_url()."home/re_verification_page/";							                   
							} else {
								$redirect = base_url()."home/verification_page/";
							}
							
								echo json_encode(array(
									'flag' => 1,
									'msg' => "Success",
									'redirect' => $redirect,
									// 'qrCodeUrl' => $qrCodeUrl,
								));
								exit;
						}else {
							$this->load->library('GoogleAuthenticator');
							$token = $this->googleauthenticator->createSecret();
							$qrCodeUrl = $this->googleauthenticator->getQRCodeGoogleUrl('Shubro', $user_email, $token);
							
							$this->session->set_userdata('UserId', $UserDetails->userid);     
							$this->session->set_userdata('LoginToken', $this->generateToken());       
							$this->db->insert('login_session', array(
								'user_id' => $UserDetails->userid,
								'access_token' => $this->session->userdata('LoginToken'),
								'login_time' => strtotime(date('Y-m-d H:i:s'))
							));    
												
							$oneCode = $this->googleauthenticator->getCode($token);
							$insertOTPdata = array(
								'userid' => $UserDetails->userid,
								'status' => 1, 
								'email_otp'	=> $oneCode,
								'token'	=> $token,
								
							);
							$this->db->insert('email_otp_optout', $insertOTPdata);
							$securityAnsCheck = $this->CommonModel->check_security_ans($UserDetails->userid);
							if ($securityAnsCheck == 1) {
								$redirect = base_url()."home/re_verification_page/";							                   
							} else {
								$redirect = base_url()."home/verification_page/";
							}
												                   								                   
								echo json_encode(array(
									'flag' => 2,
									'msg' => "Success",
									'redirect' => $redirect,
									'qrCodeUrl' => $qrCodeUrl,
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
