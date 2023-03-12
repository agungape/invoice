<?php
class M_invoice extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_inv()
    {
        // $tanggal = date('Y-m-d');
        // $this->db->like('created_at', $tanggal);
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get('invoice');
        return $query->result_array();
    }

    public function get_in()
    {
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get('invoice');
        return $query->result_array();
    }

    public function get_jns()
    {
        $query = $this->db->get('jns_invoice');
        return $query->result_array();
    }

    public function auto_code($a)
    {
        $query = $this->db->query("SELECT MAX(nomor_invoice) as InvoiceMax FROM invoice WHERE kode_invoice ='$a'");
        return $query->row_array();
    }

    public function get_inisial($a)
    {
        $query = $this->db->get_where('jns_invoice', ['kode_invoice' => $a]);
        return $query->row_array();
    }

    function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
