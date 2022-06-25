<?php

class c_subkriteria extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_subkriteria', 'subkriteria');
        $this->load->model('m_kriteria', 'kriteria');
    }

    public function index()
    {
        $data['kriteria']    = $this->kriteria->get_data_db()->result();
        $data['subkriteria'] = $this->subkriteria->get_data_db()->result();
        $data['title'] = 'Data Kriteria';
        $this->load->view('templates/admin/header', $data);
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar', $data);
        $this->load->view('v_saw/kriteria', $data);
        $this->load->view('templates/admin/footer');
    }

    public function tambah_data()
    {
        $data = array(
            'kd_kriteria'    => $this->input->post('kd_kriteria'),
            'ket_sub'        => $this->input->post('ket_sub'),
            'bobot'            => $this->input->post('bobot')
        );

        $this->subkriteria->tambah_data_db($data);
        $this->session->set_flashdata('message', '
		<div class="alert alert-success alert-dismissible" role="alert">`
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<i class="fas fa-check-circle"></i>
		Data Subkriteria berhasil ditambahkan!
		</div>
		');
        redirect('c_subkriteria');
    }

    public function edit_data($id)
    {
        $data['title'] = 'Edit SubKriteria';
        $data['subkriteria'] = $this->subkriteria->getDataById($id);

        $this->form_validation->set_rules('kd_kriteria', 'Kd', 'required', array('required' => 'Kode Kriteria harus diisi'));
        $this->form_validation->set_rules('ket_sub', 'Keterangan', 'required', array('required' => 'Keterangan harus diisi'));
        $this->form_validation->set_rules('bobot', 'Bobot', 'required', array('required' => 'Bobot harus diisi'));

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin/header', $data);
            $this->load->view('templates/admin/sidebar', $data);
            $this->load->view('templates/admin/topbar', $data);
            $this->load->view('v_saw/subkriteria_edit', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $kd_kriteria   = $this->input->post('kd_kriteria');
            $ket_sub = $this->input->post('ket_sub');
            $bobot = $this->input->post('bobot');

            $data = array(
                'kd_kriteria'       => $kd_kriteria,
                'ket_sub'           => $ket_sub,
                'bobot'             => $bobot
            );
            $this->subkriteria->edit_data_db($data, $id);
            $this->session->set_flashdata('message', '
			<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<i class="fas fa-check-circle"></i>
			Data Subkriteria berhasil diupdate!
			</div>
			');
            redirect('c_subkriteria');
        }
    }

    public function hapus_data($id)
    {
        $this->subkriteria->hapus_data_db($id);
        $this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fas fa-check-circle"></i>
        Data Subkriteria berhasil dihapus!
        </div>
        ');
        redirect('c_subkriteria');
    }
}
