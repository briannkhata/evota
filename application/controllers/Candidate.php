<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class candidate extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title']  = 'Candidates ';
		$this->load->view($this->session->userdata('role').'/candidates',$data);			
    }

    function vote($param=''){
		$this->check_session();
		$data['page_title']  = 'Vote | '.$this->M_post->get_post($param);
		$data['post_id']  = $param;
		$this->load->view($this->session->userdata('role').'/vote',$data);			
    }

    function vote2(){
        $data['user_id'] = $this->session->userdata('user_id');
        $data['post_id'] = $this->input->post('post_id');
        $data['candidate_id']= $this->input->post('candidate_id');
        $data['vote_date']= date('Y-m-d h:s:i');
        $this->db->insert('tblvotes',$data);
		$this->session->set_flashdata('message','Your vote has been submitted successfully');
		redirect('user/dashboard');
    }

    function get_data_from_post(){
        $data['user_id']    = $this->input->post('user_id');
        $data['post_id'] = $this->input->post('post_id');
        $data['motto']= $this->input->post('motto');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_candidate->get_candidate_by_id($update_id);
		foreach ($query as $row) {
		   $data['user_id'] = $row['user_id'];
           $data['post_id'] = $row['post_id'];
           $data['motto']= $row['motto'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('candidate_id',$update_id);
			$this->db->update('tblcandidates',$data);
		 }else{
			$this->db->insert('tblcandidates',$data);
		}

		$this->session->set_flashdata('message','Candidate saved successfully');
			if($update_id !=''):
    			redirect('candidate');
			else:
				redirect('candidate/read');
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
		$data['page_title'] = 'Create Candidate';
		$this->load->view($this->session->userdata('role').'/add_candidate',$data);			
	}

	
	function delete($param='',$param2=''){
		$this->db->where('candidate_id',$param);
		$this->db->where('user_id',$param2);
        $this->db->delete('tblcandidates');
    	$this->session->set_flashdata('message','Candidate deleted successfully');
		redirect('candidate');
	}
	
}