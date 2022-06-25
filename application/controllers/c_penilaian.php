<?php

class c_penilaian extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_penilaian', 'penilaian');
	}

	public function index()
	{
		$data['paket_wisata'] = $this->penilaian->get_data_paket_wisata_db('paket_wisata')->result_array();
		$data['durasi'] = $this->penilaian->getDurasi('subkriteria')->result_array();
		$data['usia'] = $this->penilaian->getUsia('subkriteria')->result_array();
		$data['harga_paket'] = $this->penilaian->getHargaPaket('subkriteria')->result_array();
		$data['nilai'] = $this->penilaian->get_data_penilaian_db()->result();

		$data['title'] = 'Data Penilaian';
		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('v_saw/penilaian', $data);
		$this->load->view('templates/admin/footer');
	}

	public function tambah_data()
	{
		$data = array(
			'id_paket_wisata'	=> $this->input->post('id_paket_wisata'),
			'C1'		=> $this->input->post('C1'),
			'C2'		=> $this->input->post('C2'),
			'C3'		=> $this->input->post('C3')
		);
		$this->penilaian->tambah_data_db($data);
		$this->session->set_flashdata('message', '
			<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<i class="fas fa-check-circle"></i>
			Data Penilaian berhasil ditambahkan!
			</div>
			');
		redirect('c_penilaian');
	}

	public function edit_data($id)
	{
		$data['title'] = 'Edit Data Penilaian';
		$data['nilai'] = $this->penilaian->getDataById($id);
		$data['paket_wisata'] = $this->penilaian->get_data_paket_wisata_db('paket_wisata')->result();
		$data['durasi'] = $this->penilaian->getDurasi('subkriteria')->result();
		$data['usia'] = $this->penilaian->getUsia('subkriteria')->result();
		$data['harga_paket'] = $this->penilaian->getHargaPaket('subkriteria')->result();

		$this->form_validation->set_rules('id_paket_wisata', 'Nama Paket Wisata', 'required', array('required' => 'Nama paket wisata harus diisi'));
		$this->form_validation->set_rules('C1', 'Komponen C1', 'required', array('required' => 'Komponen C1 harus diisi'));
		$this->form_validation->set_rules('C2', 'Komponen C2', 'required', array('required' => 'Komponen C2 harus diisi'));
		$this->form_validation->set_rules('C3', 'Komponen C3', 'required', array('required' => 'Komponen C3 harus diisi'));

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/admin/header', $data);
			$this->load->view('templates/admin/sidebar', $data);
			$this->load->view('templates/admin/topbar', $data);
			$this->load->view('v_saw/penilaian_edit', $data);
			$this->load->view('templates/admin/footer');
		} else {
			$id_paket_wisata   = $this->input->post('id_paket_wisata');
			$C1			   = $this->input->post('C1');
			$C2			   = $this->input->post('C2');
			$C3			   = $this->input->post('C3');

			$data =	array(
				'id_paket_wisata'	=> $id_paket_wisata,
				'C1'   			=> $C1,
				'C2'   			=> $C2,
				'C3'   		=> $C3

			);
			$this->penilaian->edit_data_db($data, $id);
			$this->session->set_flashdata('message', '
			<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<i class="fas fa-check-circle"></i>
			Data Penilaian berhasil diupdate!
			</div>
			');
			redirect('c_penilaian');
		}
	}
	
	public function hapus_data($id)
	{
		$id = [
			'id_penilaian' => $id
		];
		$this->penilaian->hapus_data_db($id);
		$this->session->set_flashdata('message', '
	<div class="alert alert-success alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<i class="fas fa-check-circle"></i>
	Data penilaian berhasil dihapus!
	</div>
	');
		redirect('c_penilaian');
	}
}
