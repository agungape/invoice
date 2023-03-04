<?php
class M_invoice extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }


    public function get_inv()
    {
        $query = $this->db->get('jns_invoice');
        return $query->result_array();
    }
    public function auto_code($a)
    {
        $query = $this->db->query("SELECT MAX(id) as max_code FROM invoice WHERE jns_inv ='$a'");
        return $query->row_array();
    }

    public function get_inisial($a)
    {
        $query = $this->db->get_where('jns_invoice', ['id' => $a]);
        return $query->row_array();
    }
}
