<?php 
		
	class SuperUserModel extends CI_Model {
		public function __construct()
		{
			parent::__construct();
        }
        
        public function InsertIntoLoginSession($userid, $accessToken, $role)
		{
			$insertdata = array(
				'user_id'	=> $userid,
				'access_token'	=> $accessToken,
				'user_type'	=> $role,
				'login_time' => time()
			);
			$this->db->insert('login_session', $insertdata);
		}

        public function InsertCommon($TableName, $InsertArray)
		{
		    $insertRecord = $this->db->insert($TableName, $InsertArray);
			return $insertRecord;
		}
		
		public function GetTableRecordsbyCondition($Select, $Table, $Condition)
		{			
            $this->db->select($Select);
            $this->db->from($Table);
            $this->db->where($Condition);
            $query = $this->db->get();
            return $query->result();
		}

        public function GetSingleRecordByCondition($TableName, $Condition)
		{			
            $this->db->select('*');
            $this->db->from($TableName);
			$this->db->where($Condition);
			$query = $this->db->get();
			return $query->row();
		}

		public function GetSingleTableAllRecords($Table)
		{			
            $this->db->select('*');
            $this->db->from($Table);
            $this->db->order_by('id', 'DESC');
            $query = $this->db->get();
            return $query->result();
		}

		public function UpdateCommon($id, $TableName, $UpdateArray, $column_id)
        {
			$this->db->where($column_id, $id);
            $UpdateQuery = $this->db->update($TableName, $UpdateArray);
            return $UpdateQuery;
        }

        public function DeleteSingleRecordById($table, $id, $column_id)
		{			
			$this->db->where($column_id, $id);
            $DeleteRecord = $this->db->delete($table); 
			return $this->db->affected_rows();	
		}
        
    }

?>