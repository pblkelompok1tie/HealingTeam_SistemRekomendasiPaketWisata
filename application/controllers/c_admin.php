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

class c_admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_admin', 'admin');
  }

  public function autentikasi()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $where = array(
      'username' => $username,
      'password' => $password
    );
    $cek = $this->admin->cekDataAdmin("admin", $where);
    $data_user = $cek->row();
    if ($data_user > 0) {
      $this->session->set_userdata('username', $username);
      $this->session->set_userdata('nama_admin', $data_user->nama_admin);
      $this->session->set_userdata('foto_admin', $data_user->foto_admin);
      $this->session->set_userdata('id_admin', $data_user->id_admin);
      $this->session->set_userdata('is_login', TRUE);
      redirect(base_url("c_dashboard"));
    } else {
      $this->session->set_flashdata('error', 'Username atau Password salah');
      redirect(base_url("c_admin/tampil_login"));
    }
  }

  public function tampil_login()
  {
    $data['title'] = 'Halaman Login';
    $this->load->view('v_login', $data);
  }

  public function tampil_data()
  {

    $data['title'] = 'Data Admin';
    $data['admin'] = $this->admin->get_data_db();
    
    $this->load->view('templates/admin/header', $data);
    $this->load->view('templates/admin/sidebar', $data);
    $this->load->view('templates/admin/topbar', $data);
    $this->load->view('v_admin/index');
    $this->load->view('templates/admin/footer', $data);
  }

  public function tambah_data()
  {
    $data['title'] = 'Tambah Data Admin';
    $data['admin'] = $this->admin->get_data_db();

    $this->form_validation->set_rules(
      'nama_admin',
      'Nama',
      'required|is_unique[admin.nama_admin]|regex_match[/^([a-z ])+$/i]',
      //Buat Custom Notifikasi Alert Error Form Validation
      array('required' => 'Nama Admin harus diisi', 'is_unique' => 'Nama yang Anda isikan sudah ada', 'regex_match' => 'Karakter yang Anda ketikan harus berupa Alpabet')
    );
    $this->form_validation->set_rules(
      'username',
      'Username',
      'required|is_unique[admin.username]|alpha_numeric',
      array('required' => 'Username harus diisi', 'is_unique' => 'Username yang Anda isikan sudah ada', 'alpha_numeric' => 'Karakter yang Anda ketikan harus berupa Alpabet atau Angka')
    );
    $this->form_validation->set_rules(
      'password',
      'Password',
      'required|is_unique[admin.password]|min_length[6]',
      array('required' => 'Password harus diisi', 'is_unique' => 'Password yang Anda isikan sudah ada', 'min_length' => 'Panjang password yang Anda isikan harus lebih dari atau sama dengan 6 digit')
    );
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/admin/header', $data);
      $this->load->view('templates/admin/sidebar', $data);
      $this->load->view('templates/admin/topbar', $data);
      $this->load->view('v_admin/tambah');
      $this->load->view('templates/admin/footer', $data);
    } else {
      $foto_admin = $_FILES['foto_admin']['name'];
      if ($foto_admin = '') {
      } else {
        $config['upload_path'] = './assets/img/admin';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = 2048;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto_admin')) {
          $this->session->set_flashdata('message', '
                        <div class="alert alert-danger" role="alert">
                        <i class="fas fa-exclamation-triangle "></i>
                        Data gagal ditambahkan, check foto yang diupload
                        </div>
                        ');
          redirect('c_admin/tampil_data');
        } else {
          $foto_admin = $this->upload->data('file_name', true);

          $data = array(
            'nama_admin' => $this->input->post('nama_admin', true),
            'username' => $this->input->post('username', true),
            'password' => $this->input->post('password', true),
            'foto_admin' => $foto_admin
          );
        }
        $this->admin->tambah_data_db($data, 'admin');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <i class="fas fa-check-circle"></i>
              Data Admin berhasil ditambahkan
              </div>');
        redirect('c_admin/tampil_data');
      }
    }
  }

  public function edit_data($id)
  {
    $data['title'] = 'Edit Data Admin';
    $data['admin'] = $this->admin->getDataById($id);

    $this->form_validation->set_rules(
      'nama_admin',
      'Nama Admin',
      'required|regex_match[/^([a-z ])+$/i]',
      array('required' => 'Nama admin harus diisi', 'regex_match[/^([a-z ])+$/i]' => 'Karakter yang Anda ketikan harus aplhabet dan angka saja')
    );
    $this->form_validation->set_rules(
      'username',
      'Username',
      'required|alpha_numeric',
      array('required' => 'Username harus diisi', 'alpha_numeric' => 'Karakter yang Anda ketikan harus berupa Alpabet atau Angka')
    );
    $this->form_validation->set_rules(
      'password',
      'Password',
      'required|min_length[6]',
      array('required' => 'Password harus diisi', 'min_length' => 'Panjang password yang Anda isikan harus lebih dari atau sama dengan 6 digit')
    );

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/admin/header', $data);
      $this->load->view('templates/admin/sidebar', $data);
      $this->load->view('templates/admin/topbar', $data);
      $this->load->view('v_admin/edit', $data);
      $this->load->view('templates/admin/footer');
    } else {
      $this->admin->edit_data_db($id);
      $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fas fa-check-circle"></i>
        Data Admin berhasil diupdate
        </div>
        ');
      redirect('c_admin/tampil_data');
    }
  }

  public function hapus_data($id)
  {
    $where = [
      'id_admin' => $id
    ];
    $data = $this->admin->getDataById($id);
    if ($this->session->userdata('username') == $data['username']) {
      $this->session->set_flashdata('message', ' <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <i class="fa fa-window-close"></i>
      Login dengan akun berbeda untuk dapat menghapus data ini
      </div>');
      redirect('c_admin/tampil_data');
    } else {
      if (file_exists("./assets/img/admin/" . $data['foto_admin'])) {
        unlink("./assets/img/admin/" . $data['foto_admin']);
      }
      $this->admin->hapus_data_db($where);
      $this->session->set_flashdata('message', '
          <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <i class="fas fa-check-circle"></i>
          Data Admin berhasil dihapus
          </div>
          ');
      redirect('c_admin/tampil_data');
    }
  }

  public function pdf()
  {
    $this->load->library('dompdf_gen');

    $data['admin'] = $this->admin->get_data_db();

    // filename dari pdf ketika didownload
    $file_pdf = 'laporan_data_admin';
    // setting paper
    $paper = 'A4';
    //orientasi paper potrait / landscape
    $orientation = "potrait";

    $html = $this->load->view('v_admin/laporan_pdf', $data, true);

    // run dompdf
    $this->dompdf_gen->generate($html, $file_pdf, $paper, $orientation);
  }

  public function Excel()
  {
    $data = $this->admin->get_data_db();


    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'No');
    $sheet->setCellValue('B1', 'Nama Admin');
    $sheet->setCellValue('C1', 'Username');
    $sheet->setCellValue('D1', 'Password');


    $rows = 2;
    $no = 1;
    foreach ($data as $val) {
      $sheet->setCellValue('A' . $rows, $no++);
      $sheet->setCellValue('B' . $rows, $val['nama_admin']);
      $sheet->setCellValue('C' . $rows, $val['username']);
      $sheet->setCellValue('D' . $rows, $val['password']);

      $rows++;
    }
    $writer = new Xlsx($spreadsheet);
    $filename = 'laporan-admin';

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

    $data['admin'] = $this->admin->get_data_db();


    //$admin = $this->admin->get_data_db();
    $this->load->view('v_admin/word', $data);

    header("Content-type=application/vnd.ms-word");
    header("content-disposition:attachment;filename=laporan-admin.doc");
  }

  function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url('c_admin/tampil_login'));
  }
}
