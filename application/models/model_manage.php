<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_manage extends CI_Model {
 
    var $tabel = 'PushMail'; //variabel tabel
 	var $tbl   = 'tbluser';
    function __construct() {
        parent::__construct();
    }
	
    function get_all_mail() {
        $this->db->from($this->tabel);
        $query = $this->db->get();
 
        //cek apakah ada ba
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }
	
	 function get_user() {
        $this->db->from($this->tbl);
        $query = $this->db->get();
 
        //cek apakah ada ba
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }
 
    function Get_ID_PUSH($id) {
        $this->db->from($this->tabel);
        $this->db->where('idpush', $id);
 
        $query = $this->db->get();
 
        if ($query->num_rows() == 1) {
            return $query->result();
        }
    }
 
 function Get_iduser($id) {
        $this->db->from($this->tbl);
        $this->db->where('iduser', $id);
 
        $query = $this->db->get();
 
        if ($query->num_rows() == 1) {
            return $query->result();
        }
    }
 
    function get_insert($data){
       $this->db->insert($this->tabel, $data);
       return TRUE;
    }
 
   function get_update($id,$data) {
 
        $this->db->where('no_cmd', $id);
        $this->db->update($this->tabel, $data);
 
        return TRUE;
    }
    function del_set_mail($id) {
        $this->db->where('idpush', $id);
        $this->db->delete($this->tabel);
        if ($this->db->affected_rows() == 1) {
 
            return TRUE;
        }
        return FALSE;
    }
}
?>