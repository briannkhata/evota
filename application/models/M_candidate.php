<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_candidate extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_candidates(){
		    $this->db->order_by('candidate_id');
			$query = $this->db->get('tblcandidates');
			return $query->result_array();
		}

		function get_votes(){
		    $this->db->order_by('vote_date');
			$query = $this->db->get('tblvotes');
			return $query->result_array();
		}

		function get_votes_by_candidate($candidate_id,$post_id){
		    $this->db->order_by('vote_date');
		    $this->db->where('post_id',$post_id);
		    $this->db->where('candidate_id',$candidate_id);
			$query = $this->db->get('tblvotes');
			return $query->result_array();
		}

		function get_candidate_by_id($candidate_id){
		    $this->db->where('candidate_id',$candidate_id);
			$query = $this->db->get('tblcandidates');
			return $query->result_array();
		}

		function get_candidate_by_post_id($post_id){
		    $this->db->where('post_id',$post_id);
			$query = $this->db->get('tblcandidates');
			return $query->result_array();
		}

		function get_user_id($candidate_id){
   		    $this->db->where('candidate_id',$candidate_id);
			$query = $this->db->get('tblcandidates')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['user_id'];
				}
			}else {
				return '';
			}
			
		}

		function get_post_id($candidate_id){
   		    $this->db->where('candidate_id',$candidate_id);
			$query = $this->db->get('tblcandidates')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['post_id'];
				}
			}else {
				return '';
			}
			
		}
}

