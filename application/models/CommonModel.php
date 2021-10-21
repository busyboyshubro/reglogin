<?php 
		
	class CommonModel extends CI_Model {
		public function __construct()
		{
			parent::__construct();
        }
        
        function GetUserBymail($email)
        {
            $result = $this->db->get_where('adminlogin',array('email'=>$email))->row();
            return $result ;
        }

        function GetUserBydbUsername($username)
        {
            $result = $this->db->get_where('adminlogin',array('username'=>$username))->row();	

            return $result ;
        }

        //register
        function GetUserByEmail($email)
        {
            $result = $this->db->get_where('adminlogin',array('email'=>$email))->row();
            return $result ;
        }

        function GetUserByUsername($username)
        {
            $result = $this->db->where('adminlogin',array('username'=>$username))->row();	

            return $result ;
        }
        //login
        public function UsernameExistCount($username)
        {
            return $this->db->where('username',$username)
                                ->or_where('email = ',$username)
                                ->get('adminlogin')
                                ->num_rows();
        }	

        public function UserEmailExistCount($email='')
        {
            // return $this->db->get_where('adminlogin',array('email'=>$email))->num_rows();
        
			$this->db->select('adminlogin.*, ');	
			$this->db->from('adminlogin');
			$this->db->where('adminlogin.username = ',$email);
			$this->db->or_where('adminlogin.email = ',$email);
            $query = $this->db->get();
            // $result = $query->last_query();
            // print_r($this->db->last_query()); die();
            $result = $query->num_rows();
            return $result ;
        }	

        function GetUserByEmailUsername($username='')
        {
            // $result = $this->db->get_where('adminlogin',array('phone_no'=>$phone_no, 'deleted_flag'=>0))->row();	

			$this->db->select('adminlogin.*, ');	
			$this->db->from('adminlogin');
			$this->db->where('adminlogin.username = ',$username);
			$this->db->or_where('adminlogin.email = ',$username);
            // print_r($this->db->last_query());
            $query = $this->db->get();
            $result = $query->row();
            return $result ;
        }

        function GetUsersession($user_id='')
        {
            // $result = $this->db->get_where('adminlogin',array('phone_no'=>$phone_no, 'deleted_flag'=>0))->row();	

			$this->db->select('login_session.*, ');	
			$this->db->from('login_session');
			$this->db->where('login_session.user_id = ',$user_id);
			// $this->db->or_where('login_session.email = ',$username);
            $this->db->order_by('id','desc');	
            // print_r($this->db->last_query());
            $query = $this->db->get();
            $result = $query->row();
            return $result ;
        }

        function email_otp_optout($userid='')
        {
			$this->db->select('email_otp_optout.*, ');	
			$this->db->from('email_otp_optout');
			$this->db->where('email_otp_optout.userid = ',$userid);
			// $this->db->where('email_otp_optout.token = ',$token);
			// $this->db->where('email_otp_optout.status = ',1);
			// $this->db->or_where('login_session.email = ',$username);
            $this->db->order_by('id','desc');	
            // print_r($this->db->last_query());
            $query = $this->db->get();
            $result = $query->row();
            return $result ;
            // if($query->num_rows() > 0) {
            //     // return $result->result_array();
            //     return true;
            // } else {
            //     return false;
            // }
        }

        function check_email_otp($token='',$email_otp='')
        {
			$this->db->select('email_otp_optout.*, ');	
			$this->db->from('email_otp_optout');
			$this->db->where('email_otp_optout.token = ',$token);
			$this->db->where('email_otp_optout.email_otp = ',$email_otp);
			// $this->db->or_where('login_session.email = ',$username);
            $this->db->order_by('id','desc');	
            // print_r($this->db->last_query());
            $query = $this->db->get();
            // $result = $query->row();
            // return $result ;
            if($query->num_rows() > 0) {
                // return $result->result_array();
                return true;
            } else {
                return false;
            }
        }

        function security_que($array_ans)
        {
			$this->db->select('security_que.*, ');	
			$this->db->from('security_que');
			$this->db->where_in('security_que.id',$array_ans);
            // $this->db->where_in(RAND(0,1));
            // $this->db->limit(2);
            $query = $this->db->get();
            // print_r($this->db->last_query()); die;
            $result = $query->result();
            return $result ;
        }

        function security_que_byId($ans)
        {
			$this->db->select('security_que.*, ');	
			$this->db->from('security_que');
			$this->db->where('security_que.id',$ans);
            $query = $this->db->get();
            // print_r($this->db->last_query()); die;
            $result = $query->result();
            return $result ;
        }

        function getuserfromtoken($token)
        {
			$this->db->select('email_otp_optout.*, ');	
			$this->db->from('email_otp_optout');
			$this->db->where('email_otp_optout.token = ',$token);
			$this->db->where('email_otp_optout.status = ',1);
            // print_r($this->db->last_query());
            $query = $this->db->get();
            $result = $query->row();
            return $result ;
        }

        function check_security_ans($userid)
        {
			$this->db->select('security_ans.*, ');	
			$this->db->from('security_ans');
			$this->db->where('security_ans.userid = ',$userid);
            $this->db->order_by('id','desc');	
            // print_r($this->db->last_query());
            $query = $this->db->get();
            if($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }

        function get_security_ans($que_id,$answer,$userid)
        {
			$this->db->select('security_ans.*, ');	
			$this->db->from('security_ans');
			$this->db->where('security_ans.userid = ',$userid);
			$this->db->where_in('security_ans.que_id',$que_id);
			$this->db->where_in('security_ans.answer',$answer);	
            // print_r($this->db->last_query());
            $query = $this->db->get();
            if($query->num_rows() > 1) {
                return true;                
                // return $query->result();
            } else {
                return false;
            }
        }
        //login
    }

?>