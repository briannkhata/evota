<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class post extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function check_session(){
	   if ($this->session->userdata('user_login') != 1)//not logged in
       redirect(base_url(),'refresh');
	}

	function index(){
		$this->check_session();
		$data['page_title'] = 'Posts';
		$this->load->view($this->session->userdata('role').'/posts',$data);			
    }

    function get_data_from_post(){
        $data['post'] = $this->input->post('post');
		return $data;
    }

    function get_data_from_db($update_id){
		$query = $this->M_post->get_post_by_id($update_id);
		foreach ($query as $row) {
           $data['post'] = $row['post'];
		}
		return $data;
	}

	function save(){
		$data = $this->get_data_from_post();
		$update_id = $this->input->post('update_id', TRUE);
		if (isset($update_id)){
			$this->db->where('post_id',$update_id);
			$this->db->update('tblposts',$data);
		 }else{
			$this->db->insert('tblposts',$data);
		}

		$this->session->set_flashdata('message','post saved successfully');
			if($update_id !=''):
    			redirect('post');
			else:
				redirect('post/read');
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
		$data['page_title'] = 'Create post';
		$this->load->view($this->session->userdata('role').'/add_post',$data);			
	}

	
	function delete($param='',){
		$this->db->where('post_id',$param);
        $this->db->delete('posts');
    	$this->session->set_flashdata('message','post deleted successfully');
		redirect('post');
	}
	
}