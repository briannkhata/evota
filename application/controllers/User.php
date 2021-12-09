<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class user extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$this->load->view($this->session->userdata('role').'/dashboard');			
    }

	function dashboard(){
		$this->check_session();
		$data['page_title']  = 'Dashboard';
		$this->load->view($this->session->userdata('role').'/dashboard',$data);			
    }

    function users(){
		$this->check_session();
		$data['page_title']  = 'Users/Students  |';
		$this->load->view($this->session->userdata('role').'/users',$data);			
    }

    function votes(){
		$this->check_session();
		$data['page_title']  = 'Votes  |';
		$this->load->view($this->session->userdata('role').'/votes',$data);			
    }

   function get_data_from_post(){
        $data['name']    = $this->input->post('name');
        $data['gender']   = $this->input->post('gender');
   		$data['username']  = $this->input->post('username');
		$data['password'] = md5($this->input->post('username'));
		$data['role']  = 'user';
		$data['program']  = $this->input->post('program');
		$data['level']  = $this->input->post('level');
		return $data;
    }

   function get_data_from_db($update_id){
		$query = $this->M_user->get_user_by_id($update_id);
		foreach ($query as $row) {
		  $data['name']    = $row['name'];
          $data['gender']   = $row['gender'];
  		  $data['username']  = $row['username'];
		  $data['role']  = $row['role'];
		  $data['program']  = $row['program'];
		  $data['level']  = $row['level'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);

		 if (!empty($_FILES['photo']['name'])):
			move_uploaded_file($_FILES['photo']['tmp_name'],'uploads/'.$_FILES['photo']['name']);
	      $data['photo']   = $_FILES['photo']['name'];
	    endif;


		if (isset($update_id)){
			$this->db->where('user_id',$update_id);
			$this->db->update('tblusers',$data);
		 }else{
			$this->db->insert('tblusers',$data);
		}

	 $this->session->set_flashdata('message','Student/User saved successfully');
			if($update_id !=''):
    			redirect('user/users');
			else:
				redirect('user/read');
			endif;
	}

	function read(){
		$update_id = $this->uri->segment(3);
		if(!isset($update_id)){
			$update_id = $this->input->post('update_id',$update_id);
		}
		if(is_numeric($update_id)){
			$data = $this->get_data_from_db($update_id);
			$data['update_id'] = $update_id;
		}
		else{
			$data = $this->get_data_from_post();
		}
	   
		 $data['page_title']  = 'Create User |';
		 $this->load->view($this->session->userdata('role').'/add_user',$data);
	}

	function delete($param=''){
		$data['deleted'] = 1;
		$this->db->where('user_id',$param);
        $this->db->update('tblusers',$data);
    	$this->session->set_flashdata('message','Student/User Deleted successfully');
		redirect('user/users');
	}
 
}