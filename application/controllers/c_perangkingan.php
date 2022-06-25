<?php

class c_perangkingan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_penilaian', 'penilaian');
	}

	public function index()
	{
		$data['nilai'] = $this->penilaian->get_data_penilaian_db()->result();
		$data['rating'] = $this->penilaian->get_data_rating_db()->result_array();
		$data['sifat'] = $this->penilaian->get_sifat()->result_array();
		/*Ambil model nilai max*/
		$data['c1max'] = $this->penilaian->get_maxC1();
		$data['c2max'] = $this->penilaian->get_maxC2();
		$data['c3max'] = $this->penilaian->get_maxC3();
		/*Ambil model nilai min*/
		$data['c1min'] = $this->penilaian->get_minC1();
		$data['c2min'] = $this->penilaian->get_minC2();
		$data['c3min'] = $this->penilaian->get_minC3();

		$data['bobotc1'] = $this->penilaian->get_bobotc1();
		$data['bobotc2'] = $this->penilaian->get_bobotc2();;
		$data['bobotc3'] = $this->penilaian->get_bobotc3();;

		$data['title'] = 'Data Proses SPK';
		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('v_saw/perangkingan', $data);
		$this->load->view('templates/admin/footer');
	}
}
