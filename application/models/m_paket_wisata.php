<?php
class m_paket_wisata extends CI_Model
{

    public function get_data_db()
    {
        $this->db->select('*');
        $this->db->from('paket_wisata');
        $this->db->join('penginapan', 'paket_wisata.id_penginapan = penginapan.id_penginapan');
        $this->db->join('tic', 'paket_wisata.id_tic = tic.id_tic');
        $this->db->join('tempat_makan', 'paket_wisata.id_tempat_makan = tempat_makan.id_tempat_makan');
        return $this->db->get()->result_array();
    }

    public function get_data_with_relation($id)
    {
        $this->db->select('*');
        $this->db->from('paket_wisata');
        $this->db->join('penginapan', 'penginapan.id_penginapan = paket_wisata.id_penginapan');
        $this->db->join('tempat_makan', 'tempat_makan.id_tempat_makan = paket_wisata.id_tempat_makan');
        $this->db->join('tic', 'tic.id_tic = paket_wisata.id_tic');
        $this->db->where('paket_wisata.id_paket_wisata', $id);
        return $this->db->get()->result_array();
    }

    public function tambah_data_db($data, $tabel)
    {
        $this->db->insert($tabel, $data);
    }

    public function getDataById($id)
    {
        return $this->db->get_where('paket_wisata', ['id_paket_wisata' => $id])->row_array();
    }

    public function edit_data_db($id)
    {
        $data['paket_wisata'] = $this->db->get_where('paket_wisata', ['id_paket_wisata' => $id])->row_array();

        // cek jika ada foto paket_wisata yang di upload
        $upload_image = $_FILES['foto_paket_wisata'];

        if ($upload_image) {
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/paket_wisata';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_paket_wisata')) {
                $old_image = $data['paket_wisata']['foto_paket_wisata'];
                $path = './assets/img/paket_wisata/';

                if ($old_image != 'default.jpeg') {
                    unlink(FCPATH . $path . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('foto_paket_wisata', $new_image);
            } else {
                $this->upload->display_errors();
            }
        }
        $data = [
            "id_penginapan" => $this->input->post('id_penginapan', true),
            "id_tempat_makan" => $this->input->post('id_tempat_makan', true),
            "id_tic" => $this->input->post('id_tic', true),
            "nama_paket_wisata" => $this->input->post('nama_paket_wisata', true),
            "deskripsi_paket_wisata" => $this->input->post('deskripsi_paket_wisata', true),
            "harga_paket_wisata" => $this->input->post('harga_paket_wisata', true),
            "durasi_paket_wisata" => $this->input->post('durasi_paket_wisata', true),
        ];
        $this->db->where('id_paket_wisata', $this->input->post('id_paket_wisata'));
        $this->db->update('paket_wisata', $data);
    }

    public function hapus_data_db($id)
    {
        $this->db->where($id);
        return $this->db->delete('paket_wisata');
    }

    public function jumlah_paket_wisata()
    {
        $query = $this->db->get('paket_wisata');
        return $query->num_rows();
    }
}
