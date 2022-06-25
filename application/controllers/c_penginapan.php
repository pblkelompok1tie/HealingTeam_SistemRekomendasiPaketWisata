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

class c_penginapan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_penginapan', 'penginapan');
    $this->load->model('m_paket_wisata', 'paket_wisata');
  }

  public function tampil_data()
  {

    $data['title'] = 'Data Penginapan';
    $data['penginapan'] = $this->penginapan->get_data_db();
    $data['paket_wisata'] = $this->paket_wisata->get_data_db();

    $this->load->view('templates/admin/header', $data);
    $this->load->view('templates/admin/sidebar', $data);
    $this->load->view('templates/admin/topbar', $data);
    $this->load->view('v_penginapan/index');
    $this->load->view('templates/admin/footer', $data);
  }

  public function tambah_data()
  {
    $data['title'] = 'Tambah Data Penginapan';
    $data['penginapan'] = $this->penginapan->get_data_db();
    $data['paket_wisata'] = $this->paket_wisata->get_data_db();

    $this->form_validation->set_rules(
      'nama_penginapan',
      'Nama Penginapan',
      'required|is_unique[penginapan.nama_penginapan]',
      array('required' => 'Nama penginapan harus diisi', 'is_unique' => 'Nama penginapan sudah terdaftar')

    );
    $this->form_validation->set_rules(
      'alamat_penginapan',
      'Alamat Penginapan',
      'required',
      array('required' => 'jumlah orang harus diisi')

    );
    $this->form_validation->set_rules(
      'jumlah_orang',
      'Jumlah Orang',
      'required|numeric',
      array('required' => 'jumlah orang harus diisi', 'numeric' => 'Karakter yang Anda ketikan harus berupa Angka')

    );
    $this->form_validation->set_rules(
      'fasilitas_penginapan',
      'Fasilitas Penginapan',
      'required',
      array('required' => 'Fasilitas penginapan harus diisi')

    );

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/admin/header', $data);
      $this->load->view('templates/admin/sidebar', $data);
      $this->load->view('templates/admin/topbar', $data);
      $this->load->view('v_penginapan/tambah');
      $this->load->view('templates/admin/footer', $data);
    } else {
      $nama_penginapan = $this->input->post('nama_penginapan');
      $alamat_penginapan = $this->input->post('alamat_penginapan');
      $jumlah_orang = $this->input->post('jumlah_orang');
      $fasilitas_penginapan = $this->input->post('fasilitas_penginapan');
      $foto_penginapan = $_FILES['foto_penginapan'];
      if ($foto_penginapan = '') {
      } else {
        $config['upload_path'] = './assets/img/penginapan';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = 2048;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto_penginapan')) {
          echo "Upload Gagal";
          die();
        } else {
          $foto_penginapan = $this->upload->data('file_name');
        }
      }
      $data = array(
        'nama_penginapan' => $nama_penginapan,
        'alamat_penginapan' => $alamat_penginapan,
        'jumlah_orang' => $jumlah_orang,
        'fasilitas_penginapan' => $fasilitas_penginapan,
        'foto_penginapan' => $foto_penginapan
      );

      $this->penginapan->tambah_data_db($data, 'penginapan');
      $this->session->set_flashdata('message', '
    <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <i class="fas fa-check-circle"></i>
    Data Penginapan berhasil ditambahkan
    </div>
    ');
      redirect('c_penginapan/tampil_data');
    }
  }

  public function edit_data($id)
  {
    $data['title'] = 'Edit Data Penginapan';
    $data['penginapan'] = $this->penginapan->getDataById($id);
    $data['paket_wisata'] = $this->paket_wisata->get_data_db();

    $this->form_validation->set_rules(
      'nama_penginapan',
      'nama_penginapan',
      'required',
      array('required' => 'Nama penginapan harus diisi')
    );
    $this->form_validation->set_rules(
      'alamat_penginapan',
      'alamat_penginapan',
      'required',
      array('required' => 'Alamat penginapan harus diisi')
    );
    $this->form_validation->set_rules(
      'jumlah_orang',
      'jumlah_orang',
      'required|numeric',
      array('required' => 'Jumlah orang harus diisi', 'numeric' => 'Karakter yang Anda ketikan harus berupa Angka')
    );
    $this->form_validation->set_rules(
      'fasilitas_penginapan',
      'fasilitas_penginapan',
      'required',
      array('required' => 'Fasilitas penginapan harus diisi')
    );
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/admin/header', $data);
      $this->load->view('templates/admin/sidebar', $data);
      $this->load->view('templates/admin/topbar', $data);
      $this->load->view('v_penginapan/edit', $data);
      $this->load->view('templates/admin/footer');
    } else {
      $this->penginapan->edit_data_db($id);
      $this->session->set_flashdata('message', '
      <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <i class="fas fa-check-circle"></i>
      Data Penginapan berhasil diupdate
      </div>
      ');
      redirect('c_penginapan/tampil_data');
    }
  }

  public function hapus_data($id)
  {
    $where = [
      'id_penginapan' => $id
    ];
    $cek_penginapan = count((array) $this->penginapan->cek_data_direlasi('paket_wisata', $where));

    if ($cek_penginapan > 0) {
      $this->session->set_flashdata('message', ' <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <i class="fa fa-window-close"></i>
      Data yang Kaka ingin hapus masih digunakan di data paket wisata, Hapus data tersebut di data paket wisata dahulu untuk menghapus
      </div>');
      redirect('c_penginapan/tampil_data');
    } else {
      $data = $this->penginapan->getDataById($id);
      if (file_exists("./assets/img/penginapan/" . $data['foto_penginapan'])) {
        unlink("./assets/img/penginapan/" . $data['foto_penginapan']);
      }
      $this->penginapan->hapus_data_db($where);
      $this->session->set_flashdata('message', '
      <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <i class="fas fa-check-circle"></i>
      Data penginapan berhasil dihapus
      </div>
      ');
      redirect('c_penginapan/tampil_data');
    }
  }

  public function pdf()
  {
    $this->load->library('dompdf_gen');

    $data['penginapan'] = $this->penginapan->get_data_db();

    // filename dari pdf ketika didownload
    $file_pdf = 'laporan_data_penginapan';
    // setting paper
    $paper = 'A4';
    //orientasi paper potrait / landscape
    $orientation = "potrait";

    $html = $this->load->view('v_penginapan/laporan_pdf', $data, true);

    // run dompdf
    $this->dompdf_gen->generate($html, $file_pdf, $paper, $orientation);
  }
  public function Excel()
  {
    $data = $this->penginapan->get_data_db();


    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'No');
    $sheet->setCellValue('B1', 'Nama Penginapan');
    $sheet->setCellValue('C1', 'Jumlah Orang');
    $sheet->setCellValue('D1', 'Alamat');
    $sheet->setCellValue('E1', 'Fasilitas');


    $rows = 2;
    $no = 1;
    foreach ($data as $val) {
      $sheet->setCellValue('A' . $rows, $no++);
      $sheet->setCellValue('B' . $rows, $val['nama_penginapan']);
      $sheet->setCellValue('C' . $rows, $val['jumlah_orang']);
      $sheet->setCellValue('D' . $rows, $val['alamat_penginapan']);
      $sheet->setCellValue('E' . $rows, $val['fasilitas_penginapan']);

      $rows++;
    }
    $writer = new Xlsx($spreadsheet);
    $filename = 'laporan-penginapan';

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

    $data['penginapan'] = $this->penginapan->get_data_db();


    //$admin = $this->admin->get_data_db();
    $this->load->view('v_penginapan/word', $data);

    header("Content-type=application/vnd.ms-word");
    header("content-disposition:attachment;filename=laporan-penginapan.doc");
  }
}
