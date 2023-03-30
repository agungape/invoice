<?php
class M_invoice extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_inv()
    {
        $tanggal = date('Y-m-d');
        $this->db->like('created_at', $tanggal);
        $this->db->order_by('created_at', 'desc');
        $query = $this->db->get('invoice');
        return $query->result_array();
    }

    public function get_in()
    {
        $this->db->order_by('created_at', 'desc');
        $query = $this->db->get('invoice');
        return $query->result_array();
    }
    public function get_user()
    {
        $query = $this->db->get('user');
        return $query->result_array();
    }

    public function get_jns()
    {
        $query = $this->db->get('jns_invoice');
        return $query->result_array();
    }

    public function auto_code($kode)
    {
        $this->db->select_max('nomor_invoice');
        $this->db->from('invoice');
        $this->db->where('kode_invoice', $kode);
        // $query = $this->db->query("SELECT MAX(nomor_invoice) FROM invoice WHERE kode_invoice ='$jenis'");
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_inisial($kode)
    {
        $query = $this->db->get_where('jns_invoice', ['kode_invoice' => $kode]);
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

    function get_invkd($kode_invoice)
    {
        $this->db->where('kode_invoice', $kode_invoice);
        $this->db->from('invoice');
        return $this->db->get()->num_rows();
    }

    function get_userlog($user)
    {
        $this->db->where('no_user', $user);
        $this->db->from('log');
        return $this->db->get()->num_rows();
    }

    function get_data($table)
    {
        return $this->db->get($table);
    }

    function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function buat_log($username, $no_user, $aktifitas, $tb_aktifitas, $data_aktifitas)
    {
        $data = array(
            'username' => $username,
            'no_user' => $no_user,
            'aktifitas' => $aktifitas,
            'tb_aktifitas' => $tb_aktifitas,
            'data_aktifitas' => $data_aktifitas
        );
        $this->db->insert('log', $data);
    }

    public function get_logs()
    {
        $this->db->order_by('waktu_log', 'desc');
        $query = $this->db->get('log');
        return $query->result_array();
    }
}
