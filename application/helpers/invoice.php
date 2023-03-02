<?php
function kodeInvoice()
{
    $ci = get_instance();
    $query = "SELECT max(id_inv) as maxKode FROM tb_invoice WHERE jns_inv='rawat jalan'";
    $data = $ci->db->query($query)->row_array();
    $kode = $data['maxKode'];
    $noUrut = (int) substr($kode, 4, 5);
    $noUrut++;
    $char = "RJ";
    $kodeBaru = $char . sprintf("%05s", $noUrut);
    return $kodeBaru;
}
