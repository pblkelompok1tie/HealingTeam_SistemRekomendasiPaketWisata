<?php

class m_penginapan extends CI_Model
{

    public function get_data_db()
    {
        $this->db->order_by('id_penginapan', 'asc');
        return  $this->db->get('penginapan')->result_array();
    }

    public function tambah_data_db($data, $tabel)
    {
        $this->db->insert($tabel, $data);
    }

    public function getDataById($id)
    {
        return $this->db->get_where('penginapan', ['id_penginapan' => $id])->row_array();
    }

    public function edit_data_db($id)
    {
        $data['penginapan'] = $this->db->get_where('penginapan', ['id_penginapan' => $id])->row_array();

        // cek jika ada foto penginapan yang di upload
        $upload_image = $_FILES['foto_penginapan'];

        if ($upload_image) {
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/penginapan';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_penginapan')) {
                $old_image = $data['penginapan']['foto_penginapan'];
                $path = './assets/img/penginapan/';

                if ($old_image != 'default.jpeg') {
                    unlink(FCPATH . $path . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('foto_penginapan', $new_image);
            } else {
                $this->upload->display_errors();
            }
        }
        $data = [
            "id_penginapan" => $this->input->post('id_penginapan', true),
            "nama_penginapan" => $this->input->post('nama_penginapan', true),
            "alamat_penginapan" => $this->input->post('alamat_penginapan',  true),
            "jumlah_orang" => $this->input->post('jumlah_orang', true),
            "fasilitas_penginapan" => $this->input->post('fasilitas_penginapan', true)

        ];
        $this->db->where('id_penginapan', $this->input->post('id_penginapan'));
        $this->db->update('penginapan', $data);
    }

    public function hapus_data_db($id)
    {
        $this->db->where($id);
        return $this->db->delete('penginapan');
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
