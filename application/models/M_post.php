<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_post extends CI_Model {
	
		function __construct(){
	        parent::__construct();
	    }

      	function get_posts(){
		    $this->db->order_by('post_id');
			$query = $this->db->get('tblposts');
			return $query->result_array();
		}


		function get_post_by_id($post_id){
		    $this->db->where('post_id',$post_id);
			$query = $this->db->get('tblposts');
			return $query->result_array();
		}

		function get_post($post_id){
   		    $this->db->where('post_id',$post_id);
			$query = $this->db->get('tblposts')->result_array();
			if(count($query) > 0){
				foreach ($query as $row) {
					return $row['post'];
				}
			}else {
				return '';
			}
			
		}
}

