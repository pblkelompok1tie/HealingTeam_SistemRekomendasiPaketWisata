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

class c_tempat_makan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_tempat_makan', 'tempat_makan');
    $this->load->model('m_paket_wisata', 'paket_wisata');
  }

  public function tampil_data()
  {

    $data['title'] = 'Data Tempat Makan';
    $data['tempat_makan'] = $this->tempat_makan->get_data_db();
    $data['paket_wisata'] = $this->paket_wisata->get_data_db();

    $this->load->view('templates/admin/header', $data);
    $this->load->view('templates/admin/sidebar', $data);
    $this->load->view('templates/admin/topbar', $data);
    $this->load->view('v_tempat_makan/index');
    $this->load->view('templates/admin/footer', $data);
  }

  public function tambah_data()
  {

    $data['title'] = 'Tambah Data Tempat Makan';
    $data['tempat_makan'] = $this->tempat_makan->get_data_db();
    $data['paket_wisata'] = $this->paket_wisata->get_data_db();

    $this->form_validation->set_rules(
      'nama_tempat_makan',
      'Nama Tempat Makan',
      'required|is_unique[tempat_makan.nama_tempat_makan]',
      array('required' => 'Nama tempat makan harus diisi', 'is_unique' => 'Nama tempat makan sudah terdaftar')
    );
    $this->form_validation->set_rules(
      'alamat_tempat_makan',
      'Alamat Tempat Makan',
      'required',
      array('required' => 'Alamat tempat makan harus diisi')
    );
    $this->form_validation->set_rules(
      'menu_favorite',
      'Menu Favorite',
      'required',
      array('required' => 'Menu favorite harus diisi')
    );

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/admin/header', $data);
      $this->load->view('templates/admin/sidebar', $data);
      $this->load->view('templates/admin/topbar', $data);
      $this->load->view('v_tempat_makan/tambah');
      $this->load->view('templates/admin/footer', $data);
    } else {

      $nama_tempat_makan = $this->input->post('nama_tempat_makan');
      $alamat_tempat_makan = $this->input->post('alamat_tempat_makan');
      $menu_favorite = $this->input->post('menu_favorite');
      $foto_tempat_makan = $_FILES['foto_tempat_makan'];
      if ($foto_tempat_makan = '') {
      } else {
        $config['upload_path'] = './assets/img/tempat_makan';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = 2048;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto_tempat_makan')) {
          echo "Upload Gagal";
          die();
        } else {
          $foto_tempat_makan = $this->upload->data('file_name');
        }
      }
      $data = array(
        'nama_tempat_makan' => $nama_tempat_makan,
        'alamat_tempat_makan' => $alamat_tempat_makan,
        'menu_favorite' => $menu_favorite,
        'foto_tempat_makan' => $foto_tempat_makan
      );

      $this->tempat_makan->tambah_data_db($data, 'tempat_makan');
      $this->session->set_flashdata('message', '
    <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <i class="fas fa-check-circle"></i>
    Data Tempat Makan berhasil ditambahkan
    </div>
    ');
      redirect('c_tempat_makan/tampil_data');
    }
  }
  
  public function edit_data($id)
  {
    $data['title'] = 'Edit Data Tempat Makan';
    $data['tempat_makan'] = $this->tempat_makan->getDataById($id);
    $data['paket_wisata'] = $this->paket_wisata->get_data_db();

    $this->form_validation->set_rules(
      'nama_tempat_makan',
      'nama_tempat_makan',
      'required',
      array('required' => 'Nama tempat makan harus diisi')
    );
    $this->form_validation->set_rules(
      'alamat_tempat_makan',
      'alamat_tempat_makan',
      'required',
      array('required' => 'Alamat tempat makan harus diisi')
    );
    $this->form_validation->set_rules(
      'menu_favorite',
      'menu_favorite',
      'required',
      array('required' => 'Menu favorite harus diisi')
    );

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/admin/header', $data);
      $this->load->view('templates/admin/sidebar', $data);
      $this->load->view('templates/admin/topbar', $data);
      $this->load->view('v_tempat_makan/edit', $data);
      $this->load->view('templates/admin/footer');
    } else {
      $this->tempat_makan->edit_data_db($id);
      $this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fas fa-check-circle"></i>
        Data Tempat Makan berhasil diupdate
        </div>
        ');
      redirect('c_tempat_makan/tampil_data');
    }
  }

  public function hapus_data($id)
  {
    $where = [
      'id_tempat_makan' => $id
    ];
    $cek_tempat_makan = count((array) $this->tempat_makan->cek_data_direlasi('paket_wisata', $where));

    if ($cek_tempat_makan > 0) {
      $this->session->set_flashdata('message', ' <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <i class="fa fa-window-close"></i>
      Data yang Kaka ingin hapus masih digunakan di data paket wisata, Hapus data tersebut di data paket wisata dahulu untuk menghapus
      </div>');
      redirect('c_tempat_makan/tampil_data');
    } else {
      $data = $this->tempat_makan->getDataById($id);
      if (file_exists("./assets/img/tempat_makan/" . $data['foto_tempat_makan'])) {
        unlink("./assets/img/tempat_makan/" . $data['foto_tempat_makan']);
      }
      $this->tempat_makan->hapus_data_db($where);
      $this->session->set_flashdata('message', '
          <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <i class="fas fa-check-circle"></i>
          Data Tempat Makan berhasil dihapus
          </div>
          ');
      redirect('c_tempat_makan/tampil_data');
    }
  }

  public function pdf()
  {
    $this->load->library('dompdf_gen');

    $data['tempat_makan'] = $this->tempat_makan->get_data_db();

    // filename dari pdf ketika didownload
    $file_pdf = 'laporan_data_tempat_makan';
    // setting paper
    $paper = 'A4';
    //orientasi paper potrait / landscape
    $orientation = "potrait";

    $html = $this->load->view('v_tempat_makan/laporan_pdf', $data, true);

    // run dompdf
    $this->dompdf_gen->generate($html, $file_pdf, $paper, $orientation);
  }
  public function Excel()
  {
    $data = $this->tempat_makan->get_data_db();


    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'No');
    $sheet->setCellValue('B1', 'Nama Tempat Makan');
    $sheet->setCellValue('C1', 'Alamat');
    $sheet->setCellValue('D1', 'Menu Favorite');


    $rows = 2;
    $no = 1;
    foreach ($data as $val) {
      $sheet->setCellValue('A' . $rows, $no++);
      $sheet->setCellValue('B' . $rows, $val['nama_tempat_makan']);
      $sheet->setCellValue('C' . $rows, $val['alamat_tempat_makan']);
      $sheet->setCellValue('D' . $rows, $val['menu_favorite']);

      $rows++;
    }
    $writer = new Xlsx($spreadsheet);
    $filename = 'laporan-tempat-makan';

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

    $data['tempat_makan'] = $this->tempat_makan->get_data_db();


    //$admin = $this->admin->get_data_db();
    $this->load->view('v_tempat_makan/word', $data);

    header("Content-type=application/vnd.ms-word");
    header("content-disposition:attachment;filename=laporan-tempat-makan.doc");
  }
}
