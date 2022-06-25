<?php

class m_admin extends CI_Model
{

    public function cekDataAdmin($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function get_data_db()
    {
        $this->db->order_by('id_admin', 'asc');
        return  $this->db->get('admin')->result_array();
    }

    public function tambah_data_db($data, $tabel)
    {
        $this->db->insert($tabel, $data);
    }

    public function getDataById($id)
    {
        return $this->db->get_where('admin', ['id_admin' => $id])->row_array();
    }

    function get_chart_data()
    {
        $this->db->order_by('id_paket_wisata', 'asc');
        return  $this->db->get('paket_wisata')->result_array();
    }

    public function edit_data_db($id)
    {
        $data['admin'] = $this->db->get_where('admin', ['id_admin' => $id])->row_array();

        // cek jika ada foto admin yang di upload
        $upload_image = $_FILES['foto_admin'];

        if ($upload_image) {
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/admin';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_admin')) {
                $old_image = $data['admin']['foto_admin'];
                $path = './assets/img/admin/';

                if ($old_image != 'default.jpeg') {
                    unlink(FCPATH . $path . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('foto_admin', $new_image);
            } else {
                $this->upload->display_errors();
            }
        }
        $data = [
            "nama_admin" => $this->input->post('nama_admin', true),
            "username" => $this->input->post('username',  true),
            "password" => $this->input->post('password', true)
        ];
        $this->db->where('id_admin', $this->input->post('id_admin'));
        $this->db->update('admin', $data);
    }

    public function hapus_data_db($id)
    {
        $this->db->where($id);
        return $this->db->delete('admin');
    }
    public function jumlah_admin()
    {
        $query = $this->db->get('admin');
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
