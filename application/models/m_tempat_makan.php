<?php

class m_tempat_makan extends CI_Model
{

    public function get_data_db()
    {
        $this->db->order_by('id_tempat_makan', 'asc');
        return  $this->db->get('tempat_makan')->result_array();
    }

    public function tambah_data_db($data, $tabel)
    {
        $this->db->insert($tabel, $data);
    }

    public function getDataById($id)
    {
        return $this->db->get_where('tempat_makan', ['id_tempat_makan' => $id])->row_array();
    }

    public function edit_data_db($id)
    {
        $data['tempat_makan'] = $this->db->get_where('tempat_makan', ['id_tempat_makan' => $id])->row_array();

        // cek jika ada foto tempat_makan yang di upload
        $upload_image = $_FILES['foto_tempat_makan'];

        if ($upload_image) {
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/tempat_makan';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_tempat_makan')) {
                $old_image = $data['tempat_makan']['foto_tempat_makan'];
                $path = './assets/img/tempat_makan/';

                if ($old_image != 'default.jpeg') {
                    unlink(FCPATH . $path . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('foto_tempat_makan', $new_image);
            } else {
                $this->upload->display_errors();
            }
        }
        $data = [
            "id_tempat_makan" => $this->input->post('id_tempat_makan', true),
            "nama_tempat_makan" => $this->input->post('nama_tempat_makan', true),
            "alamat_tempat_makan" => $this->input->post('alamat_tempat_makan',  true),
            "menu_favorite" => $this->input->post('menu_favorite', true)
        ];
        $this->db->where('id_tempat_makan', $this->input->post('id_tempat_makan'));
        $this->db->update('tempat_makan', $data);
    }

    public function hapus_data_db($getId)
    {
        $this->db->where($getId);
        return $this->db->delete('tempat_makan');
    }

    public function cek_data_direlasi($table, $where)
    {
        $query = $this->db->get_where($table, $where);

        if ($query->num_rows() > 1) {
            return $query->result();
        } else {
            return $query->row();
        }
    }
}
