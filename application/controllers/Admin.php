<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		// cek session yang login, jika session status tidak sama dengan session admin_login,maka halaman akan di alihkan kembali ke halaman login.
		if ($this->session->userdata('level') != "admin") {
			redirect(base_url() . 'login?alert=belum_login');
		}
	}

	function index()
	{
		$data['invoice'] = $this->db->query("SELECT MONTHNAME(created_at) AS bulan, COUNT(*) AS jumlah_invoice FROM invoice GROUP BY MONTH(created_at)")->result_array();
		$data['nilai'] = $this->db->query("SELECT MONTHNAME(created_at) AS bulan, SUM(nilai) AS jumlah_nilai FROM invoice GROUP BY MONTH(created_at)")->result_array();
		$data['jml_nilai'] = $this->db->query("SELECT SUM(nilai) AS jumlah_nilai FROM invoice")->result_array();
		$data['jns_kkt'] = $this->m_invoice->get_invkd('KKT');
		$data['jns_rjl'] = $this->m_invoice->get_invkd('RJL');
		$data['jns_rdl'] = $this->m_invoice->get_invkd('RDL');
		$data['jns_utd'] = $this->m_invoice->get_invkd('UTD');
		$data['jns_lab'] = $this->m_invoice->get_invkd('LAB');
		$data['jns_rin'] = $this->m_invoice->get_invkd('RIN');
		$data['log'] = $this->m_invoice->get_logs();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_sidebar');
		$this->load->view('admin/v_content', $data);
		$this->load->view('admin/v_footer');
	}

	function user()
	{
		// mengambil data dari database
		$data['user'] = $this->m_invoice->get_user();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_sidebar');
		$this->load->view('admin/v_user', $data);
		$this->load->view('admin/v_footer');
	}

	function user_tambah()
	{
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_sidebar');
		$this->load->view('admin/v_user_tambah');
		$this->load->view('admin/v_footer');
	}

	function user_tambah_aksi()
	{
		$nama = $this->input->post('nama');
		$no_user = $this->input->post('no_user');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level');
		$status = $this->input->post('status');

		$data = array(
			'nama' => $nama,
			'no_user' => $no_user,
			'username' => $username,
			'password' => $password,
			'level' => $level,
			'status' => $status
		);

		$activity_data = json_encode($data); // mengubah data ke format JSON
		$session1 = $this->session->userdata('username');
		$session2 = $this->session->userdata('no_user');
		$this->m_invoice->buat_log($session1, $session2, 'menambahkan', 'user', $activity_data); // log aksi "created"

		// insert data ke database
		$this->m_invoice->insert_data($data, 'user');

		// mengalihkan halaman ke halaman data petugas
		$this->session->set_flashdata('flash', 'Menambahkan Data');
		redirect(base_url() . 'admin/user');
	}

	function user_edit($id)
	{
		$where = array('id' => $id);
		// mengambil data dari database sesuai id
		$data['user'] = $this->m_invoice->edit_data($where, 'user')->result();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_sidebar');
		$this->load->view('admin/v_user_edit', $data);
		$this->load->view('admin/v_footer');
	}

	function user_update()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$no_user = $this->input->post('no_user');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level');
		$status = $this->input->post('status');

		$where = array(
			'id' => $id
		);

		// cek apakah form password di isi atau tidak
		if ($password == "") {
			$data = array(
				'nama' => $nama,
				'no_user' => $no_user,
				'username' => $username,
				'level' => $level,
				'status' => $status
			);
		} else {
			$data = array(
				'nama' => $nama,
				'username' => $username,
				'no_user' => $no_user,
				'password' => $password,
				'level' => $level,
				'status' => $status
			);
		}
		$this->m_invoice->update_data($where, $data, 'user');
		$activity_data = json_encode($data); // mengubah data ke format JSON
		$this->m_invoice->buat_log($this->session->userdata('username'), $this->session->userdata('no_user'), 'mengubah', 'user', $activity_data); // log aksi "created"
		$this->session->set_flashdata('flash', 'Mengupdate Data');

		// mengalihkan halaman ke halaman data petugas
		redirect(base_url() . 'admin/user');
	}


	function user_hapus($id)
	{
		$where = array(
			'id' => $id
		);

		$activity_data = json_encode($where); // mengubah data ke format JSON
		$this->m_invoice->buat_log($this->session->userdata('username'), $this->session->userdata('no_user'), 'menghapus', 'user', $activity_data); // log aksi "created"
		$this->session->set_flashdata('flash', 'dihapus');
		// menghapus data petugas dari database sesuai id
		$this->m_invoice->delete_data($where, 'user');

		// mengalihkan halaman ke halaman data petugas
		redirect(base_url() . 'admin/user');
	}

	function invoice()
	{
		$data['invoice'] = $this->m_invoice->get_inv();
		$data['jenis'] = $this->m_invoice->get_jns();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_sidebar');
		$this->load->view('admin/v_invoice', $data);
		$this->load->view('admin/v_footer');
	}

	function invoice_tambah()
	{
		$kode = $this->input->post('kode');
		$data = [
			'in' => $this->m_invoice->get_inisial($kode),
			'pelayanan' => $this->m_invoice->get_data('jns_pelayanan')->result()
		];
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_sidebar');
		$this->load->view('admin/v_input', $data);
		$this->load->view('admin/v_footer');
	}

	function invoice_tambah_aksi()
	{
		$kode = $this->input->post('kode');
		$jenis = $this->input->post('jenis');
		// buat kode invoice
		$a =  $this->m_invoice->auto_code($kode)['nomor_invoice'];
		$hari = date('Y');
		$rs = ('RSK');
		$garing = ('/');
		$urut = (int)substr($a, 13, 4);
		$urut++;
		$kd = $kode . $garing . $rs . $garing . $hari  . $garing . sprintf("%04s", $urut);
		// akhir buat kode
		$nama = $this->input->post('nama');
		$rm = $this->input->post('rm');
		$tanggal = $this->input->post('tanggal');
		$alamat = $this->input->post('alamat');
		$nilai_awal = $this->input->post('nilai');
		$keterangan = $this->input->post('keterangan');
		$tb = $this->input->post('tb');
		$bb = $this->input->post('bb');
		$sh = $this->input->post('sb');
		$layanan = $this->input->post('layanan');
		$pelayanan = implode('<br>', $layanan);
		$nilai = preg_replace('/[^0-9]/', '', $nilai_awal);
		$data = array(
			'jenis_invoice' => $jenis,
			'nomor_invoice' => $kd,
			'kode_invoice' => $kode,
			'nama' => $nama,
			'no_rm' => $rm,
			'tgl_lahir' => $tanggal,
			'nilai' => $nilai,
			'tinggi_badan' => $tb,
			'berat_badan' => $bb,
			'suhu_badan' => $sh,
			'alamat' => $alamat,
			'keterangan' => $keterangan,
			'jns_pelayanan' => $pelayanan
		);
		$activity_data = json_encode($data); // mengubah data ke format JSON
		$this->m_invoice->buat_log($this->session->userdata('username'), $this->session->userdata('no_user'), 'menambahkan', 'invoice', $activity_data); // log aksi "created"
		$this->m_invoice->insert_data($data, 'invoice');

		$this->session->set_flashdata('flash', 'Membuat Invoice');
		redirect('admin/invoice');
	}

	function invoice_edit($id)
	{
		$where = array('id' => $id);
		$data['invoice'] = $this->m_invoice->edit_data($where, 'invoice')->result();
		$data['pelayanan'] = $this->m_invoice->get_data('jns_pelayanan')->result();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_sidebar');
		$this->load->view('admin/v_invoice_edit', $data);
		$this->load->view('admin/v_footer');
	}

	function invoice_update()
	{
		$id = $this->input->post('id');
		$kode = $this->input->post('kode');
		$jenis = $this->input->post('jenis');
		$invoice = $this->input->post('invoice');
		$nama = $this->input->post('nama');
		$tb = $this->input->post('tb');
		$bb = $this->input->post('bb');
		$sb = $this->input->post('sb');
		$rm = $this->input->post('rm');
		$tanggal = $this->input->post('tanggal');
		$alamat = $this->input->post('alamat');
		$nilai_awal = $this->input->post('nilai');
		$nilai = preg_replace('/[^0-9]/', '', $nilai_awal);
		$keterangan = $this->input->post('keterangan');
		$layanan = $this->input->post('layanan');
		$pelayanan = implode('<br>', $layanan);
		$data = array(
			'jenis_invoice' => $jenis,
			'nomor_invoice' => $invoice,
			'kode_invoice' => $kode,
			'nama' => $nama,
			'tinggi_badan' => $tb,
			'berat_badan' => $bb,
			'suhu_badan' => $sb,
			'no_rm' => $rm,
			'tgl_lahir' => $tanggal,
			'nilai' => $nilai,
			'alamat' => $alamat,
			'keterangan' => $keterangan,
			'jns_pelayanan' => $pelayanan
		);

		$where = array(
			'id' => $id
		);

		$activity_data = json_encode($data); // mengubah data ke format JSON
		$this->m_invoice->buat_log($this->session->userdata('username'), $this->session->userdata('no_user'), 'mengubah', 'invoice', $activity_data); // log aksi "created"
		$this->m_invoice->update_data($where, $data, 'invoice');
		$this->session->set_flashdata('flash', 'Update Invoice');
		redirect('admin/invoice');
	}

	function invoice_hapus($id)
	{
		$where = array(
			'id' => $id
		);
		$data = $this->db->get_where('invoice', array('id' => $id))->row_array();
		$activity_data = json_encode($data); // mengubah data ke format JSON
		$this->m_invoice->buat_log($this->session->userdata('username'), $this->session->userdata('no_user'), 'menghapus', 'invoice', $activity_data); // log aksi "created"
		$this->m_invoice->delete_data($where, 'invoice');
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('admin/invoice_list');
	}

	function invoice_list()
	{
		$data['invoice'] = $this->m_invoice->get_in();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_sidebar');
		$this->load->view('admin/v_invoice_list', $data);
		$this->load->view('admin/v_footer');
	}

	function invoice_jenis()
	{
		$data['jenis'] = $this->m_invoice->get_jns();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_sidebar');
		$this->load->view('admin/v_invoice_jenis', $data);
		$this->load->view('admin/v_footer');
	}

	function invoice_jenis_tambah()
	{
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_sidebar');
		$this->load->view('admin/v_invoice_jenis_tambah');
		$this->load->view('admin/v_footer');
	}

	function invoice_jenis_tambah_aksi()
	{
		$this->form_validation->set_rules('kode', 'Kode', 'required');
		$this->form_validation->set_rules('jenis', 'Jenis', 'required');
		if ($this->form_validation->run() != false) {
			$kode = $this->input->post('kode');
			$jenis = $this->input->post('jenis');
			$data = [
				'kode_invoice' => $kode,
				'jenis_invoice' => $jenis
			];

			$this->m_invoice->insert_data($data, 'jns_invoice');
			$this->session->set_flashdata('flash', 'Menambahkan Data');
			redirect('admin/invoice_jenis');
		} else {
			$this->session->set_flashdata('flash', 'Menambahkan Data');
			redirect('admin/invoice_jenis_tambah');
		}
	}

	function invoice_jenis_hapus($id)
	{
		$id = [
			'kode_invoice' => $id
		];
		$this->m_invoice->delete_data($id, 'jns_invoice');
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('admin/invoice_jenis');
	}

	function print()
	{
		$data['invoice'] = $this->m_invoice->get_in();
		$this->load->view('admin/v_cetak', $data);
	}

	function cetak_invoice($id)
	{
		$where = array('id' => $id);
		$data['invoice'] = $this->m_invoice->edit_data($where, 'invoice')->result();
		$this->load->view('admin/v_cetak1', $data,);
	}

	function detail_invoice($id)
	{
		$where = array('id' => $id);
		$data['invoice'] = $this->m_invoice->edit_data($where, 'invoice')->result();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_sidebar');
		$this->load->view('admin/v_detail', $data,);
		$this->load->view('admin/v_footer');
	}

	function detail_log($id)
	{
		$where = array('id' => $id);
		$data['log'] = $this->m_invoice->edit_data($where, 'log')->result();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_sidebar');
		$this->load->view('admin/v_content', $data);
		$this->load->view('admin/v_footer');
	}

	function invoice_pelayanan()
	{
		$data['pelayanan'] = $this->m_invoice->get_data('jns_pelayanan')->result();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_sidebar');
		$this->load->view('admin/v_pelayanan', $data,);
		$this->load->view('admin/v_footer');
	}
	function invoice_tambah_pelayanan()
	{
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_sidebar');
		$this->load->view('admin/v_invoice_tambah_pelayanan');
		$this->load->view('admin/v_footer');
	}

	function invoice_tambah_pelayanan_aksi()
	{
		$this->form_validation->set_rules('jenis', 'Jenis Pelayanan', 'required');
		if ($this->form_validation->run() != false) {
			$jenis = $this->input->post('jenis');
			$data = [
				'nama' => $jenis
			];

			$this->m_invoice->insert_data($data, 'jns_pelayanan');
			$this->session->set_flashdata('flash', 'Menambahkan Data');
			redirect('admin/invoice_pelayanan');
		} else {
			$this->session->set_flashdata('flash', 'Menambahkan Data');
			redirect('admin/invoice_tambah_pelayanan');
		}
	}

	function invoice_pelayanan_hapus($id)
	{
		$id = [
			'id' => $id
		];
		$this->m_invoice->delete_data($id, 'jns_pelayanan');
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('admin/invoice_pelayanan');
	}

	function penilaian_user()
	{
		$data['user1'] = $this->db->query("SELECT COUNT(*) AS jumlah_invoice FROM log WHERE no_user = 'user1' and aktifitas = 'menambahkan' ")->result_array();
		$data['user2'] = $this->db->query("SELECT COUNT(*) AS jumlah_invoice FROM log WHERE no_user = 'user2' and aktifitas = 'menambahkan' ")->result_array();
		$data['user3'] = $this->db->query("SELECT COUNT(*) AS jumlah_invoice FROM log WHERE no_user = 'user3' and aktifitas = 'menambahkan' ")->result_array();
		$data['nilai1'] = $this->db->query("SELECT MONTHNAME(waktu_log) AS bulan, COUNT(*) AS jumlah_user FROM log WHERE no_user = 'user1' and aktifitas = 'menambahkan'  GROUP BY MONTH(waktu_log)")->result_array();
		$data['nilai2'] = $this->db->query("SELECT MONTHNAME(waktu_log) AS bulan, COUNT(*) AS jumlah_user FROM log WHERE no_user = 'user2' and aktifitas = 'menambahkan' GROUP BY MONTH(waktu_log)")->result_array();
		$data['nilai3'] = $this->db->query("SELECT MONTHNAME(waktu_log) AS bulan, COUNT(*) AS jumlah_user FROM log WHERE no_user = 'user3' and aktifitas = 'menambahkan' GROUP BY MONTH(waktu_log)")->result_array();
		$data['log'] = $this->m_invoice->get_logs();
		$data['user'] = $this->m_invoice->get_user();
		$this->load->view('admin/v_header');
		$this->load->view('admin/v_sidebar');
		$this->load->view('admin/v_penilaian', $data);
		$this->load->view('admin/v_footer');
	}
}
