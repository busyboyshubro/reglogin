<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superuser extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		if(!$this->session->userdata("UserId"))
	    return redirect(base_url().'home');

		$this->load->model("SuperUserModel","sup");
	}

	public function index()
	{
		if($this->session->userdata("role") != 'admin'){
			$ResponseMessage = $this->session->set_flashdata('ErrorAlert', 'You are not a Admin !!');
			$this->load->view('login');
		} else {
			$this->load->view('gozoop');
		}

		
	}

		function runproject()
	{
		if($this->session->userdata("role") != 'admin'){
			$ResponseMessage = $this->session->set_flashdata('ErrorAlert', 'You are not a Admin !!');
			return redirect(base_url().'home');
		}
		$UserId = $this->session->userdata("UserId");
		// die();
		$winCount = $this->input->post('winCount');
		if ($winCount == 2) {
			$points = 200;
		}
		if ($winCount == 3) {
			$points = 500;
		}
		$data = array(				
			'UserId'=> $UserId, 	
			'points'=> $points, 
		);

		$DataInsert = $this->sup->InsertCommon('points', $data);

		echo json_encode($DataInsert);
	}

	public function checkusercount()
	{
		// $userid = $this->input->post('userid');
		$userid = 1;
		$currenttime = date("Y-m-d H:i:s", strtotime("now")) . "\n";
		echo $currenttime;
		echo '<br>';
		$minustime = date("Y-m-d H:i:s", strtotime("-30 minutes"));
		echo $minustime;
		$select = '*';
		$table ='points';
		$Condition = "`userid` = '".$userid."'" AND "`timestamp` = '".$minustime."' " ;
		echo $Condition;
		$data = $this->sup->GetTableRecordsbyCondition($select, $table, $Condition);
		echo '<pre>';
		print_r($data);
	}


	public function logout(){
        // $this->session->unset_userdata("UserId");

        $LoginToken = $this->session->userdata('LoginToken');
		$LoginID = $this->session->userdata('UserId');
		$LoginUserType = $this->session->userdata('role');
		$updatetime = array('logout_time' => time());
		$this->db->where(array('user_id' => $LoginID, 'access_token' => $LoginToken, 'user_type' => $LoginUserType));
		$this->db->update('login_session', $updatetime);
		session_destroy();
        return redirect(base_url().'home');
	}
	
	// public function getprojectlist()
	// {
	// 	if($this->session->userdata("role") != 'admin'){
	// 		$ResponseMessage = $this->session->set_flashdata('ErrorAlert', 'You are not a Admin !!');
	// 		return redirect(base_url().'home');
	// 	}
	// 	$Table = 'projects';

	// 	$data = $this->sup->GetSingleTableAllRecords($Table);
	// 		if (is_array($data) || is_object($data))
	// 		{
	// 			foreach ($data as $key => $value) {
	// 				$delbutton = "";
 //            		$delbutton .= "<button class='btn btn-danger anticon anticon-delete' title='Delete' onclick='DeleteFunction(".$value->id.")'></button> ";

	// 				$editbutton = "";
 //            		$editbutton .= "<a class='btn btn-warning' title='Edit' href=".base_url()."EditProject/".$value->id."><i class='anticon anticon-edit'></i> Edit</a> ";

	// 				$result['data'][$key] = array(
	// 						$value->projectname,
	// 						$value->startdate,
	// 						$value->projectvalue,
	// 						$value->currency,							
	// 						$value->valueineur,
	// 						$editbutton.$delbutton,
	// 						);
	// 			}
	// 		}
	// 		echo json_encode($result);
	// }

	// function addproject()
	// {
	// 	if($this->session->userdata("role") != 'admin'){
	// 		$ResponseMessage = $this->session->set_flashdata('ErrorAlert', 'You are not a Admin !!');
	// 		return redirect(base_url().'home');
	// 	}

	// 	$data = array(				
	// 		'projectname'=> $this->input->post('projectname'), 
	// 		'startdate'=> $this->input->post('startdate'), 
	// 		'currency'=> $this->input->post('currency'), 
	// 		'projectvalue'=> $this->input->post('projectvalue'), 
	// 		'valueineur'=> $this->input->post('totalprojvalue'), 
	// 	);

	// 	$DataInsert = $this->sup->InsertCommon('projects', $data);

	// 	echo json_encode($DataInsert);
	// }

	// public function deleteproject()
	// {
	// 	if($this->session->userdata("role") != 'admin'){
	// 		$ResponseMessage = $this->session->set_flashdata('ErrorAlert', 'You are not a Admin !!');
	// 		return redirect(base_url().'home');
	// 	}
	// 	$id=$this->input->post('projid');

	// 	$DeleteItem = $this->sup->DeleteSingleRecordById('projects', $id, 'id');

	// 	echo json_encode($DeleteItem);
	// }

	// public function updateproject()
	// {	
	// 	if($this->session->userdata("role") != 'admin'){
	// 		$ResponseMessage = $this->session->set_flashdata('ErrorAlert', 'You are not a Admin !!');
	// 		return redirect(base_url().'home');
	// 	}
		
	// 	$id = $this->input->post('projectid');
	// 	$data = array(				
	// 		'projectname'=> $this->input->post('projectname'), 
	// 		'startdate'=> $this->input->post('startdate'), 
	// 		'currency'=> $this->input->post('currency'), 
	// 		'projectvalue'=> $this->input->post('projectvalue'), 
	// 		'valueineur'=> $this->input->post('totalprojvalue'), 
	// 	);
	// 	$column_id = 'id';
	// 	$TableName = 'projects';
	// 	$UpdateData = $this->sup->UpdateCommon($id, $TableName, $data, $column_id);

	// 	echo json_encode($UpdateData);
	// }

}
