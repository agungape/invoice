<?php
class M_invoice extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_mhs()
    {
        $query = $this->db->get('mahasiswa');
        return $query->result_array();
    }

    public function get_fk()
    {
        $query = $this->db->get('fakultas');
        return $query->result_array();
    }
    public function auto_code($a)
    {
        $query = $this->db->query("SELECT MAX(id) as max_code FROM mahasiswa WHERE fakultas ='$a'");
        return $query->row_array();
    }

    public function get_inisial($a)
    {
        $query = $this->db->get_where('fakultas', ['id_fakultas' => $a]);
        return $query->row_array();
    }
}
