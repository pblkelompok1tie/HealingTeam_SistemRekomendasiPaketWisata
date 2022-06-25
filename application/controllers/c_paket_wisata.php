<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Load library phpspreadsheet
require('./vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// End load library phpspreadsheet

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;

class c_paket_wisata extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_paket_wisata', 'paket_wisata');
    $this->load->model('m_admin', 'admin');
    $this->load->model('m_penginapan', 'penginapan');
    $this->load->model('m_tic', 'tic');
    $this->load->model('m_tempat_makan', 'tempat_makan');
    $this->load->model('m_destinasi_tujuan', 'destinasi_tujuan');
    $this->load->model('m_detail_paket_wisata', 'detail_paket_wisata');
    $this->load->model('m_detail_rating', 'detail_rating');
    $this->load->model('m_penilaian', 'penilaian');
  }

  public function tampil_data()
  {

    $data['title'] = 'Data Paket Wisata';
    $data['paket_wisata'] = $this->paket_wisata->get_data_db();
    $data['admin'] = $this->admin->get_data_db();
    $data['penginapan'] = $this->penginapan->get_data_db();
    $data['tic'] = $this->tic->get_data_db();
    $data['tempat_makan'] = $this->tempat_makan->get_data_db();

    $this->load->view('templates/admin/header', $data);
    $this->load->view('templates/admin/sidebar', $data);
    $this->load->view('templates/admin/topbar', $data);
    $this->load->view('v_paket_wisata/index');
    $this->load->view('templates/admin/footer', $data);
  }

  public function tambah_data()
  {
    $data['title'] = 'Tambah Data Paket Wisata';
    $data['paket_wisata'] = $this->paket_wisata->get_data_db();
    $data['admin'] = $this->admin->get_data_db();
    $data['penginapan'] = $this->penginapan->get_data_db();
    $data['tic'] = $this->tic->get_data_db();
    $data['tempat_makan'] = $this->tempat_makan->get_data_db();
    $data['destinasi_tujuan'] = $this->destinasi_tujuan->get_data_db();

    $this->form_validation->set_rules('id_penginapan', 'Nama Penginapan', 'required');
    $this->form_validation->set_rules('id_tempat_makan', 'Nama Tempat Makan', 'required');
    $this->form_validation->set_rules('id_tic', 'Nama TIC', 'required');
    $this->form_validation->set_rules(
      'nama_paket_wisata',
      'Nama Paket Wisata',
      'required|is_unique[paket_wisata.nama_paket_wisata]|alpha_numeric_spaces',
      array('required' => 'Nama Paket Wisata harus diisi', 'is_unique' => 'Nama yang Anda ubah sudah ada', 'alpha_numeric_spaces' => 'Karakter yang Anda ketikan harus berupa Alpabet atau Angka')
    );
    $this->form_validation->set_rules('deskripsi_paket_wisata', 'Deskripsi Paket Wisata', 'required');
    $this->form_validation->set_rules(
      'harga_paket_wisata',
      'Harga Paket Wisata',
      'required|numeric',
      array('required' => 'Nama Paket Wisata harus diisi', 'numeric' => 'Yang dimasukan harus berupa Angka')
    );
    $this->form_validation->set_rules(
      'durasi_paket_wisata',
      'Durasi Paket Wisata',
      'required|alpha_numeric_spaces',
      array('required' => 'Durasi Paket Wisata harus diisi', 'numeric' => 'Yang dimasukan harus berupa Angka')
    );
    $this->form_validation->set_rules('id_destinasi_tujuan[]', 'Nama destinasi_tujuan', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/admin/header', $data);
      $this->load->view('templates/admin/sidebar', $data);
      $this->load->view('templates/admin/topbar', $data);
      $this->load->view('v_paket_wisata/tambah');
      $this->load->view('templates/admin/footer', $data);
    } else {
      $id_penginapan = $this->input->post('id_penginapan');
      $id_tempat_makan = $this->input->post('id_tempat_makan');
      $id_tic = $this->input->post('id_tic');
      $nama_paket_wisata = $this->input->post('nama_paket_wisata');
      $deskripsi_paket_wisata = $this->input->post('deskripsi_paket_wisata');
      $harga_paket_wisata = $this->input->post('harga_paket_wisata');
      $durasi_paket_wisata  = $this->input->post('durasi_paket_wisata');
      $foto_paket_wisata = $_FILES['foto_paket_wisata'];
      if ($foto_paket_wisata = '') {
      } else {
        $config['upload_path'] = './assets/img/paket_wisata';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = 2048;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto_paket_wisata')) {
          echo "Upload Gagal";
          die();
        } else {
          $foto_paket_wisata = $this->upload->data('file_name');
        }
      }
      $data = array(
        'id_penginapan' => $id_penginapan,
        'id_tempat_makan' => $id_tempat_makan,
        'id_tic' => $id_tic,
        'nama_paket_wisata' => $nama_paket_wisata,
        'deskripsi_paket_wisata' => $deskripsi_paket_wisata,
        'harga_paket_wisata' => $harga_paket_wisata,
        'durasi_paket_wisata' => $durasi_paket_wisata,
        'foto_paket_wisata' => $foto_paket_wisata,
        'rating_paket_wisata' => 0,
      );
      $this->paket_wisata->tambah_data_db($data, 'paket_wisata');
      $id_pk_paket_wisata = $this->db->insert_id();
      $data2 = array();
      $id_destinasi_tujuan = $this->input->post('id_destinasi_tujuan');
      $jumlah = count($this->input->post('id_destinasi_tujuan'));
      for ($i = 0; $i < $jumlah; $i++) {
        $data2[] = array(
          'id_paket_wisata' => $id_pk_paket_wisata,
          'id_destinasi_tujuan' => $id_destinasi_tujuan[$i]
        );
      }
      $ip = $this->input->ip_address();
      $data3 = array(
        'id_paket_wisata' => $id_pk_paket_wisata,
        'ip_address' => $ip,
        'rating' => NULL
      );
      $this->detail_paket_wisata->tambah_data_db($data2, 'detail_paket_wisata');
      $this->detail_rating->tambah_data_db($data3, 'detail_rating');
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fas fa-check-circle"></i>
        Data paket wisata berhasil ditambahkan
        </div>');
      redirect('c_paket_wisata/tampil_data');
    }
  }
  public function tampil_detail($id)
  {
    $data['title'] = 'Detail Data Paket Wisata';
    $data['data_detail_paket_wisata'] = $this->paket_wisata->get_data_with_relation($id);
    $data['detail_paket_wisata'] = $this->detail_paket_wisata->get_data_with_relation($id)->result_array();;

    $this->load->view('templates/admin/header', $data);
    $this->load->view('templates/admin/sidebar', $data);
    $this->load->view('templates/admin/topbar', $data);
    $this->load->view('v_paket_wisata/detail', $data);
    $this->load->view('templates/admin/footer');
  }

  public function edit_data($id)
  {
    $data['title'] = 'Edit Data Paket Wisata';
    $data['paket_wisata'] = $this->paket_wisata->get_data_with_relation($id);
    $data['detail_paket_wisata'] = $this->detail_paket_wisata->get_data_with_relation($id)->result_array();
    $data['admin'] = $this->admin->get_data_db();
    $data['penginapan'] = $this->penginapan->get_data_db();
    $data['tic'] = $this->tic->get_data_db();
    $data['tempat_makan'] = $this->tempat_makan->get_data_db();
    $data['destinasi_tujuan'] = $this->destinasi_tujuan->get_data_db();

    $this->form_validation->set_rules(
      'id_penginapan',
      'id_penginapan',
      'required',
      array('required' => 'Penginapan harus diisi')
    );
    $this->form_validation->set_rules(
      'id_tempat_makan',
      'id_tempat_makan',
      'required',
      array('required' => 'Tempat makan harus diisi')
    );
    $this->form_validation->set_rules(
      'id_tic',
      'id_tic',
      'required',
      array('required' => 'TIC harus diisi')
    );
    $this->form_validation->set_rules(
      'nama_paket_wisata',
      'nama_paket_wisata',
      'required|alpha_numeric_spaces',
      array('required' => 'Nama Paket Wisata harus diisi', 'alpha_numeric_spaces' => 'Karakter yang Anda ketikan harus berupa Alpabet atau Angka')
    );
    $this->form_validation->set_rules(
      'deskripsi_paket_wisata',
      'deskripsi_paket_wisata',
      'required',
      array('required' => 'Deskripsi Paket Wisata harus diisi')
    );
    $this->form_validation->set_rules(
      'harga_paket_wisata',
      'harga_paket_wisata',
      'required|numeric',
      array('required' => 'Harga Paket Wisata harus diisi', 'numeric' => 'Karakter yang Anda ketikan harus berupa Angka')
    );
    $this->form_validation->set_rules('rating_paket_wisata', 'rating_paket_wisata');
    $this->form_validation->set_rules(
      'durasi_paket_wisata',
      'durasi_paket_wisata',
      'required|numeric',
      array('required' => 'Durasi paket wisata harus diisi', 'numeric' => 'Karakter yang Anda ketikan harus berupa Angka')
    );
    $this->form_validation->set_rules(
      'id_destinasi_tujuan[]',
      'Nama Destinasi Tujuan',
      'required',
      array('required' => 'Nama destinasi tujuan harus diisi')
    );

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/admin/header', $data);
      $this->load->view('templates/admin/sidebar', $data);
      $this->load->view('templates/admin/topbar', $data);
      $this->load->view('v_paket_wisata/edit', $data);
      $this->load->view('templates/admin/footer');
    } else {
      $this->paket_wisata->edit_data_db($id);
      $id_paket_wisata = $this->input->post('id_paket_wisata', TRUE);
      $id_destinasi_tujuan = $this->input->post('id_destinasi_tujuan', TRUE);
      $this->detail_paket_wisata->edit_data_db($id_paket_wisata, $id_destinasi_tujuan);
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fas fa-check-circle"></i>
        Data paket wisata berhasil diupdate
        </div>
        ');
      redirect('c_paket_wisata/tampil_data');
    }
  }

  public function hapus_data($id)
  {
    $data = $this->paket_wisata->getDataById($id);
    if (file_exists("./assets/img/paket_wisata/" . $data['foto_paket_wisata'])) {
      unlink("./assets/img/paket_wisata/" . $data['foto_paket_wisata']);
    }
    $id = [
      'id_paket_wisata' => $id
    ];
    $this->penilaian->hapus_data_db($id);
    $this->detail_rating->hapus_data_db($id);
    $this->detail_paket_wisata->hapus_data_db($id);
    $this->paket_wisata->hapus_data_db($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <i class="fas fa-check-circle"></i>
        Data paket wisata berhasil dihapus
        </div>
        ');
    redirect('c_paket_wisata/tampil_data');
  }

  public function pdf()
  {
    $this->load->library('dompdf_gen');

    $data['paket_wisata'] = $this->paket_wisata->get_data_db();
    // $paper_size = 'A4';
    // $orientation = 'landscape';
    // $html = $this->output->get_output();
    // $this->dompdf->set_paper($paper_size, $orientation);

    // $this->dompdf->load_html($html);
    // $this->dompdf->render();
    // $this->dompdf->stream('laporan_paket_wisata.pdf', array('Attachment' => 0));
    // filename dari pdf ketika didownload
    $file_pdf = 'laporan_data_paket_wisata';
    // setting paper
    $paper = 'A3';
    //orientasi paper potrait / landscape
    $orientation = "landscape";

    $html = $this->load->view('v_paket_wisata/laporan_pdf', $data, true);

    // run dompdf
    $this->dompdf_gen->generate($html, $file_pdf, $paper, $orientation);
  }



  public function Excel()
  {
    $data = $this->paket_wisata->get_data_db();
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'No');
    $sheet->setCellValue('B1', 'Nama Penginapan');
    $sheet->setCellValue('C1', 'Nama Tempat Makan');
    $sheet->setCellValue('D1', 'Nama TIC');
    $sheet->setCellValue('E1', 'Nama Paket Wisata');
    $sheet->setCellValue('F1', 'Deskripsi');
    $sheet->setCellValue('G1', 'Harga Paket Wisata');
    $sheet->setCellValue('H1', 'Rating');
    $sheet->setCellValue('I1', 'Durasi (Hari)');
    $rows = 2;
    $no = 1;
    foreach ($data as $val) {
      $sheet->setCellValue('A' . $rows, $no++);
      $sheet->setCellValue('B' . $rows, $val['nama_penginapan']);
      $sheet->setCellValue('C' . $rows, $val['nama_tempat_makan']);
      $sheet->setCellValue('D' . $rows, $val['nama_tic']);
      $sheet->setCellValue('E' . $rows, $val['nama_paket_wisata']);
      $sheet->setCellValue('F' . $rows, $val['deskripsi_paket_wisata']);
      $sheet->setCellValue('G' . $rows, $val['harga_paket_wisata']);
      $sheet->setCellValue('H' . $rows, $val['rating_paket_wisata']);
      $sheet->setCellValue('I' . $rows, $val['durasi_paket_wisata']);
      $rows++;
    }
    $writer = new Xlsx($spreadsheet);
    $filename = 'laporan-paket-wisata';

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
    header('Cache-Control: max-age=0');

    header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

    ob_end_clean(); // tambahin ini biar bisa buka excelnya
    flush();
    $writer->save('php://output');
  }

  public function word()
  {

    $data['paket_wisata'] = $this->paket_wisata->get_data_db();


    //$admin = $this->admin->get_data_db();
    $this->load->view('v_paket_wisata/word', $data);

    header("Content-type=application/vnd.ms-word");
    header("content-disposition:attachment;filename=laporan-paket-wisata.doc");
  }
}
