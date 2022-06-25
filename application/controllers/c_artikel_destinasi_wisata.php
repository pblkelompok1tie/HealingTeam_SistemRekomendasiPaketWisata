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

class c_artikel_destinasi_wisata extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_artikel_destinasi_wisata', 'adw');
    $this->load->model('m_admin', 'admin');
  }

  public function tampil_data()
  {
    $data['title'] = 'Data Artikel Destinasi Wisata';
    $data['artikel_destinasi_wisata'] = $this->adw->get_data_db();
    $data['admin'] = $this->admin->get_data_db();

    $this->load->view('templates/admin/header', $data);
    $this->load->view('templates/admin/sidebar', $data);
    $this->load->view('templates/admin/topbar', $data);
    $this->load->view('v_artikel_destinasi_wisata/index');
    $this->load->view('templates/admin/footer', $data);
  }

  public function tambah_data()
  {
    $data['title'] = 'Tambah Data Artikel Destinasi Wisata';
    $data['artikel_destinasi_wisata'] = $this->adw->get_data_db();
    $data['admin'] = $this->admin->get_data_db();

    $this->form_validation->set_rules(
      'nama_destinasi_wisata',
      'Nama Destinasi Wisata',
      'required|is_unique[artikel_destinasi_wisata.nama_destinasi_wisata]',
      array('required' => 'Nama Destinasti Wisata harus diisi', 'is_unique' => 'Nama yang Anda isikan sudah ada')
    );
    $this->form_validation->set_rules(
      'tiket_masuk',
      'Tiket Masuk',
      'required|numeric',
      array('required' => 'Harga Tiket Masuk harus diisi', 'numeric' => 'Karakter yang ketikan harus berupa Angka')
    );
    $this->form_validation->set_rules(
      'alamat_destinasi_wisata',
      'Alamat Destinasi Wisata',
      'required',
      array('required' => 'Alamat destinasi wisata harus diisi')
    );
    $this->form_validation->set_rules(
      'deskripsi_destinasi_wisata',
      'Deskripsi Destinasi Wisata',
      'required',
      array('required' => 'Deskripsi destinasi wisata harus diisi')
    );
    $this->form_validation->set_rules(
      'jam_operational',
      'Jam Operasional',
      'required',
      array('required' => 'Jam operasional harus diisi')
    );

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/admin/header', $data);
      $this->load->view('templates/admin/sidebar', $data);
      $this->load->view('templates/admin/topbar', $data);
      $this->load->view('v_artikel_destinasi_wisata/tambah');
      $this->load->view('templates/admin/footer', $data);
    } else {
      $nama_destinasi_wisata = $this->input->post('nama_destinasi_wisata');
      $tiket_masuk = $this->input->post('tiket_masuk');
      $alamat_destinasi_wisata = $this->input->post('alamat_destinasi_wisata');
      $deskripsi_destinasi_wisata = $this->input->post('deskripsi_destinasi_wisata');
      $jam_operational = $this->input->post('jam_operational');
      $foto_destinasi_wisata = $_FILES['foto_destinasi_wisata'];
      $foto_banner_artikel = $_FILES['foto_banner_artikel'];
      if ($foto_destinasi_wisata = '') {
      } else {
        $config['upload_path'] = './assets/img/artikel_destinasi_wisata';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = 2048;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto_destinasi_wisata')) {
          echo "Upload Gagal";
          die();
        } else {
          $foto_destinasi_wisata = $this->upload->data('file_name');
        }
      }
      if ($foto_banner_artikel = '') {
      } else {
        $config['upload_path'] = './assets/img/artikel_destinasi_wisata';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = 2048;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto_banner_artikel')) {
          echo "Upload Gagal";
          die();
        } else {
          $foto_banner_artikel = $this->upload->data('file_name');
        }
      }
      $data = array(
        'nama_destinasi_wisata' => $nama_destinasi_wisata,
        'tiket_masuk' => $tiket_masuk,
        'alamat_destinasi_wisata' => $alamat_destinasi_wisata,
        'deskripsi_destinasi_wisata' => $deskripsi_destinasi_wisata,
        'jam_operational' => $jam_operational,
        'foto_destinasi_wisata' => $foto_destinasi_wisata,
        'foto_banner_artikel' => $foto_banner_artikel
      );

      $this->adw->tambah_data_db($data, 'artikel_destinasi_wisata');
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fas fa-check-circle"></i>
        Data Artikel Destinasi Wisata berhasil ditambahkan
        </div>');
      redirect('c_artikel_destinasi_wisata/tampil_data');
    }
  }
  
  public function edit_data($id)
  {
    $data['title'] = 'Edit Data Artikel Destinasi Wisata';
    $data['artikel_destinasi_wisata'] = $this->adw->getDataById($id);
    $data['admin'] = $this->admin->get_data_db();

    $this->form_validation->set_rules(
      'nama_destinasi_wisata',
      'nama_destinasi_wisata',
      'required',
      array('required' => 'Nama destinasi wisata harus diisi')
    );
    $this->form_validation->set_rules(
      'alamat_destinasi_wisata',
      'alamat_destinasi_wisata',
      'required',
      array('required' => 'Alamat destinasi wisata harus diisi')
    );
    $this->form_validation->set_rules(
      'tiket_masuk',
      'tiket_masuk',
      'required|numeric',
      array('required' => 'Harga Tiket harus diisi', 'numeric' => 'Karakter yang ketikan harus berupa Angka')
    );
    $this->form_validation->set_rules(
      'deskripsi_destinasi_wisata',
      'deskripsi_destinasi_wisata',
      'required',
      array('required' => 'Deskripsi destinasi wisata harus diisi')
    );
    $this->form_validation->set_rules(
      'jam_operational',
      'jam_operational',
      'required',
      array('required' => 'Jam Operasional harus diisi')
    );
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/admin/header', $data);
      $this->load->view('templates/admin/sidebar', $data);
      $this->load->view('templates/admin/topbar', $data);
      $this->load->view('v_artikel_destinasi_wisata/edit', $data);
      $this->load->view('templates/admin/footer');
    } else {
      $this->adw->edit_data_db($id);
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fas fa-check-circle"></i>
        Data Artikel Destinasi Wisata berhasil diupdate
        </div>
        ');
      redirect('c_artikel_destinasi_wisata/tampil_data');
    }
  }

  public function hapus_data($id)
  {
    $data = $this->adw->getDataById($id);
    if(file_exists("./assets/img/artikel_destinasi_wisata/".$data['foto_destinasi_wisata'])){
      unlink("./assets/img/artikel_destinasi_wisata/".$data['foto_destinasi_wisata']);
    }
    if(file_exists("./assets/img/artikel_destinasi_wisata/".$data['foto_banner_artikel'])){
      unlink("./assets/img/artikel_destinasi_wisata/".$data['foto_banner_artikel']);
    }
    $id = [
      'id_artikel_destinasi_wisata' => $id
    ];
    $this->adw->hapus_data_db($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <i class="fas fa-check-circle"></i>
        Data artikel destinasi wisata berhasil dihapus
        </div>
        ');
    redirect('c_artikel_destinasi_wisata/tampil_data');
  }

  public function pdf()
  {
    $this->load->library('dompdf_gen');

    $data['artikel_destinasi_wisata'] = $this->adw->get_data_db();

    // filename dari pdf ketika didownload
    $file_pdf = 'laporan_data_artikel_destinasi_wisata';
    // setting paper
    $paper = 'A3';
    //orientasi paper potrait / landscape
    $orientation = "landscape";

    $html = $this->load->view('v_artikel_destinasi_wisata/laporan_pdf', $data, true);

    // run dompdf
    $this->dompdf_gen->generate($html, $file_pdf, $paper, $orientation);
  }
  public function Excel()
  {
    $data = $this->adw->get_data_db();


    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'No');
    $sheet->setCellValue('B1', 'Nama Destinasi Wisata');
    $sheet->setCellValue('C1', 'Alamat');
    $sheet->setCellValue('D1', 'Deskripsi');
    $sheet->setCellValue('E1', 'Jam Operasional');
    $sheet->setCellValue('F1', 'Tiket Masuk');

    $rows = 2;
    $no = 1;
    foreach ($data as $val) {
      $sheet->setCellValue('A' . $rows, $no++);
      $sheet->setCellValue('B' . $rows, $val['nama_destinasi_wisata']);
      $sheet->setCellValue('C' . $rows, $val['alamat_destinasi_wisata']);
      $sheet->setCellValue('D' . $rows, $val['deskripsi_destinasi_wisata']);
      $sheet->setCellValue('E' . $rows, $val['jam_operational']);
      $sheet->setCellValue('F' . $rows, $val['tiket_masuk']);

      $rows++;
    }
    $writer = new Xlsx($spreadsheet);
    $filename = 'laporan-destinasi-tujuan';

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

    $data['artikel_destinasi_wisata'] = $this->adw->get_data_db();

    //$admin = $this->admin->get_data_db();
    $this->load->view('v_artikel_destinasi_wisata/word', $data);

    header("Content-type=application/vnd.ms-word");
    header("content-disposition:attachment;filename=laporan-artikel-destinasi-wisata.doc");
  }
}
