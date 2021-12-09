<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_users(){
		    $this->db->where('deleted',0);
   		    $this->db->where('role','user');
		    $this->db->order_by('user_id');
			$query = $this->db->get('tblusers');
			return $query->result_array();
		}

		function get_females(){
		    $this->db->where('deleted',0);
   		    $this->db->where('gender','female');
   		    $this->db->order_by('user_id');
			$query = $this->db->get('tblusers');
			return $query->result_array();
		}

		function get_males(){
		    $this->db->where('deleted',0);
   		    $this->db->where('gender','male');
   		    $this->db->order_by('user_id');
			$query = $this->db->get('tblusers');
			return $query->result_array();
		}

		function get_name($user_id){
   		    $this->db->where('user_id',$user_id);
			$query = $this->db->get('tblusers')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['name'];
				}
			}else {
				return '';
			}
			
		}

		function get_gender($user_id){
   		    $this->db->where('user_id',$user_id);
			$query = $this->db->get('tblusers')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['gender'];
				}
			}else {
				return '';
			}
			
		}

		function get_photo($user_id){
   		    $this->db->where('user_id',$user_id);
			$query = $this->db->get('tblusers')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['photo'];
				}
			}else {
				return '';
			}
			
		}


		function get_reg_no($user_id){
   		    $this->db->where('user_id',$user_id);
			$query = $this->db->get('tblusers')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['reg_no'];
				}
			}else {
				return '';
			}
			
		}


		function get_program($user_id){
   		    $this->db->where('user_id',$user_id);
			$query = $this->db->get('tblusers')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['program'];
				}
			}else {
				return '';
			}
			
		}


		function get_level($user_id){
   		    $this->db->where('user_id',$user_id);
			$query = $this->db->get('tblusers')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['level'];
				}
			}else {
				return '';
			}
			
		}


	
}

