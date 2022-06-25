<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_pengunjung extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_artikel_destinasi_wisata', 'artikel_destinasi_wisata');
        $this->load->model('m_destinasi_tujuan', 'destinasi_tujuan');
        $this->load->model('m_paket_wisata', 'paket_wisata');
        $this->load->model('m_detail_paket_wisata', 'detail_paket_wisata');
        $this->load->model('m_detail_rating', 'detail_rating');
        $this->load->model('m_penilaian', 'penilaian');
        $this->load->model('m_admin', 'admin');
        $this->load->model('m_filter', 'filter');
        header('Cache-Control: no-cache, must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
    }

    public function index()
    {
        $data['title'] = 'Halaman Home';
        $data['artikel_destinasi_wisata'] = $this->artikel_destinasi_wisata->get_data_db();
        $data['data_banner'] = $this->artikel_destinasi_wisata->get_data_banner_db()->result();
        $data['destinasi_tujuan'] = $this->destinasi_tujuan->get_data_db();

        $this->load->view('templates/pengunjung/header', $data);
        $this->load->view('v_pengunjung/index', $data);
        $this->load->view('templates/pengunjung/footer', $data);
    }

    public function rekomendasi()
    {
        $data['title'] = 'Halaman Rekomendasi Paket Wisata';
        $data['durasi'] = $this->penilaian->getDurasi('subkriteria')->result_array();
        $data['usia'] = $this->penilaian->getUsia('subkriteria')->result_array();
        $data['harga_paket'] = $this->penilaian->getHargaPaket('subkriteria')->result_array();
        $data['paket_wisata'] = $this->penilaian->get_data_paket_wisata_db('paket_wisata')->result_array();
        $data['destinasi_tujuan'] = $this->destinasi_tujuan->get_data_db();

        $this->load->view('templates/pengunjung/header', $data);
        $this->load->view('v_pengunjung/rekomendasi', $data);
        $this->load->view('templates/pengunjung/footer', $data);
    }

    public function contact()
    {
        $data['title'] = 'Halaman Hubungi Kami';
        $data['destinasi_tujuan'] = $this->destinasi_tujuan->get_data_db();

        $this->load->view('templates/pengunjung/header', $data);
        $this->load->view('v_pengunjung/contact', $data);
        $this->load->view('templates/pengunjung/footer', $data);
    }

    public function generate_search_by_filter()
    {
        $durasi_paket = $this->input->post('C1');
        $usia = $this->input->post('C2');
        $harga_paket = $this->input->post('C3');
        $rating_paket = $this->input->post('rating_paket_wisata');

        $data['title'] = 'Halaman Hasil Rekomendasi| Sisrepawa';
        $data['hasil_generate'] = $this->filter->get_data_filter($harga_paket, $durasi_paket, $usia, $rating_paket);
        $data['nilai'] = $this->penilaian->get_data_penilaian_db()->result();
        $data['c1max'] = $this->penilaian->get_maxC1();
        $data['c2max'] = $this->penilaian->get_maxC2();
        $data['c3max'] = $this->penilaian->get_maxC3();
        $data['bobotc1'] = $this->penilaian->get_bobotc1();
        $data['bobotc2'] = $this->penilaian->get_bobotc2();
        $data['bobotc3'] = $this->penilaian->get_bobotc3();
        $data['destinasi_tujuan'] = $this->destinasi_tujuan->get_data_db();

        $this->load->view('templates/pengunjung/header', $data);
        $this->load->view('v_pengunjung/hasilrekomendasibyfilter', $data);
        $this->load->view('templates/pengunjung/footer', $data);
    }

    public function paketpilihan($id)
    {
        $data['title'] = 'Halaman Paket Pilihan';
        $data['paket_wisata'] = $this->paket_wisata->get_data_with_relation($id);
        $data['rata_rata_rating'] = $this->detail_rating->rata_rata($id);
        $ip = $this->input->ip_address();
        $data['check'] = $this->detail_rating->cek_rate($id, $ip)->num_rows();
        $data['deteksi_post_rating'] = $this->detail_rating->cek_rate($id, $ip)->result_array();
        $data['detail_paket_wisata'] = $this->detail_paket_wisata->get_data_with_relation($id)->result();
        $data['destinasi_tujuan'] = $this->destinasi_tujuan->get_data_db();

        $this->load->view('templates/pengunjung/header', $data);
        $this->load->view('v_pengunjung/paketpilihan', $data);
        $this->load->view('templates/pengunjung/footer', $data);
    }

    public function artikel($id)
    {
        $data['destinasi_tujuan'] = $this->destinasi_tujuan->get_data_db();
        $data['title'] = 'Halaman Artikel';
        $data['artikel_destinasi_wisata'] = $this->artikel_destinasi_wisata->get_data_detail($id);

        $this->load->view('templates/pengunjung/header', $data);
        $this->load->view('v_pengunjung/artikel', $data);
        $this->load->view('templates/pengunjung/footer', $data);
    }

    public function cari_paket()
    {
        $data['title'] = 'Halaman hasil pencarian paket wisata';
        $data['destinasi_tujuan'] = $this->destinasi_tujuan->get_data_db();
        $keyword = $this->input->post('keyword');
        $cari = array();
        foreach ($keyword as $k) {
            $cari[] = 'destinasi_tujuan.nama_destinasi_tujuan LIKE "%' . $k . '%"';
        };
        $final = implode(" OR ", $cari);
        $query = $this->db->query("SELECT paket_wisata.*,GROUP_CONCAT(destinasi_tujuan.id_destinasi_tujuan) as idt, group_concat(destinasi_tujuan.nama_destinasi_tujuan) as ndt FROM paket_wisata INNER JOIN detail_paket_wisata ON detail_paket_wisata.id_paket_wisata = paket_wisata.id_paket_wisata INNER JOIN destinasi_tujuan ON detail_paket_wisata.id_destinasi_tujuan = destinasi_tujuan.id_destinasi_tujuan WHERE $final GROUP BY paket_wisata.id_paket_wisata, paket_wisata.nama_paket_wisata");
        $data['data_cari'] = $query->result_array();
        $this->load->view('templates/pengunjung/header', $data);
        $this->load->view('v_pengunjung/searchresult', $data);
        $this->load->view('templates/pengunjung/footer');
    }

    public function tambah_data_rating()
    {
        $id_paket_wisata = $this->input->post('id_paket_wisata');
        $ip = $this->input->ip_address();
        $rating = $this->input->post('rating');
        $data['destinasi_tujuan'] = $this->destinasi_tujuan->get_data_db();
        $data = array(
            'id_paket_wisata' => $id_paket_wisata,
            'ip_address' => $ip,
            'rating' => $rating
        );
        $this->detail_rating->tambah_data_db($data, 'detail_rating');
        $this->session->set_flashdata('message', '<script type="text/javascript"> alert("Terimakasih telah mengisi ratingnya Kakak");</script>');
        redirect("c_pengunjung/paketpilihan/" . $id_paket_wisata);
    }

    public function ubah_data_rating()
    {
        $data['destinasi_tujuan'] = $this->destinasi_tujuan->get_data_db();
        $id_paket_wisata = $this->input->post('id_paket_wisata');
        $ip = $this->input->ip_address();
        $rating = $this->input->post('rating');
        $data = array(
            'id_paket_wisata' => $id_paket_wisata,
            'rating' => $rating
        );
        $where = array('id_paket_wisata' => $id_paket_wisata, 'ip_address' => $ip);
        $this->detail_rating->edit_data_db($where, $data, 'detail_rating');
        $this->detail_rating->edit_avg_data_rating($id_paket_wisata);
        $this->session->set_flashdata('message', '<script type="text/javascript"> alert("Berhasil memperbarui ratingnya kakak");</script>');
        redirect("c_pengunjung/paketpilihan/" . $id_paket_wisata);
    }

}
