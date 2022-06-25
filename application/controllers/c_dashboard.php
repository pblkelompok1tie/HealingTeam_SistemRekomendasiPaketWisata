<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_admin', 'admin');
		$this->load->model('m_paket_wisata', 'paket_wisata');
		$this->load->model('m_tic', 'tic');
		$this->load->model('m_destinasi_tujuan', 'destinasi_tujuan');
	}


	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['labelnya'] = $this->admin->get_chart_data();
		$data['jumlah_admin'] = $this->admin->jumlah_admin();
		$data['jml_paket_wisata'] = $this->paket_wisata->jumlah_paket_wisata();
		$data['jml_tic'] = $this->tic->jumlah_tic();
		$data['jml_destinasi_tujuan'] = $this->destinasi_tujuan->jumlah_destinasi_tujuan();

		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('v_dashboard/index');
		$this->load->view('templates/admin/footer');
	}
}
