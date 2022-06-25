<?php
class m_destinasi_tujuan extends CI_Model
{

    public function get_data_db()
    {
        $this->db->order_by('id_destinasi_tujuan', 'asc');
        return  $this->db->get('destinasi_tujuan')->result_array();
    }

    public function tambah_data_db($data, $tabel)
    {
        $this->db->insert($tabel, $data);
    }

    public function getDataById($id)
    {
        return $this->db->get_where('destinasi_tujuan', ['id_destinasi_tujuan' => $id])->row_array();
    }
    public function edit_data_db($id)
    {
        $data['destinasi_tujuan'] = $this->db->get_where('destinasi_tujuan', ['id_destinasi_tujuan' => $id])->row_array();

        // cek jika ada foto destinasi_tujuan yang di upload
        $upload_image = $_FILES['foto_destinasi_tujuan'];

        if ($upload_image) {
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/destinasi_tujuan';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_destinasi_tujuan')) {
                $old_image = $data['destinasi_tujuan']['foto_destinasi_tujuan'];
                $path = './assets/img/destinasi_tujuan/';

                if ($old_image != 'default.jpeg') {
                    unlink(FCPATH . $path . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('foto_destinasi_tujuan', $new_image);
            } else {
                $this->upload->display_errors();
            }
        }
        $data = [
            "nama_destinasi_tujuan" => $this->input->post('nama_destinasi_tujuan', true),
            "durasi_jam" => $this->input->post('durasi_jam', true),
            // "username" => $this->input->post('username',  true),
            // "password" => $this->input->post('password', true)
        ];
        $this->db->where('id_destinasi_tujuan', $this->input->post('id_destinasi_tujuan'));
        $this->db->update('destinasi_tujuan', $data);
    }

    public function hapus_data_db($id)
    {
        $this->db->where($id);
        return $this->db->delete('destinasi_tujuan');
    }

    public function jumlah_destinasi_tujuan()
    {
        $query = $this->db->get('destinasi_tujuan');
        return $query->num_rows();
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
