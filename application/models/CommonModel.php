<?php 
		
	class CommonModel extends CI_Model {
		public function __construct()
		{
			parent::__construct();
        }
        
        // public function InsertCommon($TableName, $InsertArray)
		// {
		//     $insertRecord = $this->db->insert($TableName, $InsertArray);
		// 	return $insertRecord;
		// }
		
		// public function GetTableRecordsbyCondition($Select, $Table, $Condition)
		// {			
        //     $this->db->select($Select);
        //     $this->db->from($Table);
        //     $this->db->where($Condition);
        //     $query = $this->db->get();
        //     return $query->result();
		// }

		// public function GetSingleTableAllRecords($Table)
		// {			
        //     $this->db->select('*');
        //     $this->db->from($Table);
        //     $query = $this->db->get();
        //     return $query->result();
		// }

		// public function UpdateCommon($id, $TableName, $UpdateArray, $column_id)
        // {
		// 	$this->db->where($column_id, $id);
        //     $UpdateQuery = $this->db->update($TableName, $UpdateArray);
        //     return $UpdateQuery;
        // }
        
        // public function GetUserByUsername($username)
        // {
        //     return $this->db->get_where('adminlogin',array('username'=>$username))->num_rows();
        // }	

        // public function UserEmailExistCount($email)
        // {
        //     return $this->db->get_where('adminlogin',array('email'=>$email))->num_rows();
        // }	
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

        //login
    }

?>