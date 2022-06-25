<?php

class c_kriteria extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_kriteria', 'kriteria');
		$this->load->model('m_subkriteria', 'subkriteria');
	}

	public function index()
	{
		$data['kriteria']	= $this->kriteria->get_data_db()->result();
		$data['subkriteria']	= $this->subkriteria->get_data_db()->result();
		$data['title'] = 'Data Kriteria';
		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/sidebar', $data);
		$this->load->view('templates/admin/topbar', $data);
		$this->load->view('v_saw/kriteria', $data);
		$this->load->view('templates/admin/footer');
	}


	public function tambah_data()
	{
		$data['kriteria']	= $this->kriteria->get_data_db()->result();
		$data['subkriteria']	= $this->subkriteria->get_data_db()->result();
		$data['title'] = 'Data Kriteria';
		$this->form_validation->set_rules('kd_kriteria', 'Kd', 'required|is_unique[kriteria.kd_kriteria]', array('required' => 'Kode Kriteria harus diisi', 'is_unique' => 'Kode Kriteria yang Anda isikan sudah ada'));
		$this->form_validation->set_rules('ket', 'Keterangan', 'required', array('required' => 'Keterangan harus diisi'));
		$this->form_validation->set_rules('bobot', 'Bobot', 'required', array('required' => 'Bobot harus diisi'));
		$this->form_validation->set_rules('attribut', 'Atribut', 'required', array('required' => 'Atribut harus diisi'));
		$this->form_validation->set_rules('bobot_nilai', 'Bobot nilai', 'required', array('required' => 'Bobot nilai harus diisi'));

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/admin/header', $data);
			$this->load->view('templates/admin/sidebar');
			$this->load->view('templates/admin/topbar');
			$this->load->view('v_saw/kriteria', $data);
			$this->load->view('templates/admin/footer');
		} else {
			$data = array(
				'kd_kriteria'	=> $this->input->post('kd_kriteria'),
				'ket'			=> $this->input->post('ket'),
				'bobot'			=> $this->input->post('bobot'),
				'attribut'		=> $this->input->post('attribut'),
				'bobot_nilai'		=> $this->input->post('bobot_nilai')
			);
			$cek_kriteria = $this->kriteria->get_data_db();
			if ($cek_kriteria->num_rows() < 3) {
				$this->kriteria->tambah_data_db($data);
				$this->session->set_flashdata('message', '
				<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<i class="fas fa-check-circle"></i>
				Data Kriteria berhasil ditambahkan!
				</div>
				');
			} else {
				$this->session->set_flashdata('message', '
				<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<i class="fas fa-check-circle"></i>
				Data Kriteria Maximal yang diinputkan 3, Hapus salah satu data dahulu
				</div>
				');
			}
			redirect('c_kriteria');
		}
	}

	public function edit_data($id)
	{
		$data['title'] = 'Edit Data Kriteria';
		$data['kriteria'] = $this->kriteria->getDataById($id);

		$this->form_validation->set_rules('kd_kriteria', 'Kd', 'required', array('required' => 'Kode Kriteria harus diisi'));
		$this->form_validation->set_rules('ket', 'Keterangan', 'required', array('required' => 'Keterangan harus diisi'));
		$this->form_validation->set_rules('bobot', 'Bobot', 'required', array('required' => 'Bobot harus diisi'));
		$this->form_validation->set_rules('attribut', 'Atribut', 'required', array('required' => 'Atribut harus diisi'));
		$this->form_validation->set_rules('bobot_nilai', 'Bobot nilai', 'required', array('required' => 'Bobot nilai harus diisi'));

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/admin/header', $data);
			$this->load->view('templates/admin/sidebar', $data);
			$this->load->view('templates/admin/topbar', $data);
			$this->load->view('v_saw/kriteria_edit', $data);
			$this->load->view('templates/admin/footer');
		} else {
			$kd_kriteria   = $this->input->post('kd_kriteria');
			$ket = $this->input->post('ket');
			$bobot = $this->input->post('bobot');
			$attribut = $this->input->post('attribut');
			$bobot_nilai = $this->input->post('bobot_nilai');
			$data =	array(
				'kd_kriteria'		=> $kd_kriteria,
				'ket'   			=> $ket,
				'bobot'   			=> $bobot,
				'attribut'   		=> $attribut,
				'bobot_nilai'   		=> $bobot_nilai
			);
			$this->kriteria->edit_data_db($data, $id);
			$this->session->set_flashdata('message', '
			<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<i class="fas fa-check-circle"></i>
			Data Kriteria berhasil diupdate!
			</div>
			');
			redirect('c_kriteria');
		}
	}

	public function hapus_data($id)
	{
		$this->kriteria->hapus_data_db($id);
		$this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fas fa-check-circle"></i>
        Data kriteria berhasil dihapus!
        </div>
        ');
		redirect('c_kriteria');
	}
}
