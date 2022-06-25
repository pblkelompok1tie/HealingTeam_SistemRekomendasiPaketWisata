<?php
class m_artikel_destinasi_wisata extends CI_Model
{

    public function get_data_db()
    {
        $this->db->select('*');
        $this->db->from('artikel_destinasi_wisata');
        return $this->db->get()->result_array();
    }

    public function get_data_banner_db()
    {
        $this->db->select('*');
        $this->db->from('artikel_destinasi_wisata');
        $this->db->limit(6);
        return $this->db->get();
    }

    public function tambah_data_db($data, $tabel)
    {
        $this->db->insert($tabel, $data);
    }

    public function getDataById($id)
    {
        return $this->db->get_where('artikel_destinasi_wisata', ['id_artikel_destinasi_wisata' => $id])->row_array();
    }

    public function get_data_detail($id)
    {
        $this->db->select('*');
        $this->db->from('artikel_destinasi_wisata');
        $this->db->where('artikel_destinasi_wisata.id_artikel_destinasi_wisata', $id);
        return $this->db->get()->result_array();
    }

    public function edit_data_db($id)
    {
        $data['artikel_destinasi_wisata'] = $this->db->get_where('artikel_destinasi_wisata', ['id_artikel_destinasi_wisata' => $id])->row_array();

        // cek jika ada foto artikel_destinasi_wisata yang di upload
        $upload_image = $_FILES['foto_destinasi_wisata'];
        $upload_image_banner = $_FILES['foto_banner_artikel'];

        if ($upload_image) {
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/artikel_destinasi_wisata';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_destinasi_wisata')) {
                $old_image = $data['artikel_destinasi_wisata']['foto_destinasi_wisata'];
                $path = './assets/img/artikel_destinasi_wisata/';

                if ($old_image != 'default.jpeg') {
                    unlink(FCPATH . $path . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('foto_destinasi_wisata', $new_image);
            } else {
                $this->upload->display_errors();
            }
        }
        if ($upload_image_banner) {
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/artikel_destinasi_wisata';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_banner_artikel')) {
                $old_image = $data['artikel_destinasi_wisata']['foto_banner_artikel'];
                $path = './assets/img/artikel_destinasi_wisata/';

                if ($old_image != 'default.jpeg') {
                    unlink(FCPATH . $path . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('foto_banner_artikel', $new_image);
            } else {
                $this->upload->display_errors();
            }
        }
        $data = [
            "nama_destinasi_wisata" => $this->input->post('nama_destinasi_wisata', true),
            "alamat_destinasi_wisata" => $this->input->post('alamat_destinasi_wisata', true),
            "deskripsi_destinasi_wisata" => $this->input->post('deskripsi_destinasi_wisata',  true),
            "tiket_masuk" => $this->input->post('tiket_masuk',  true),
            "jam_operational" => $this->input->post('jam_operational', true),
        ];
        $this->db->where('id_artikel_destinasi_wisata', $this->input->post('id_artikel_destinasi_wisata'));
        $this->db->update('artikel_destinasi_wisata', $data);
    }
    
    public function hapus_data_db($id)
    {
        $this->db->where($id);
        return $this->db->delete('artikel_destinasi_wisata');
    }
}