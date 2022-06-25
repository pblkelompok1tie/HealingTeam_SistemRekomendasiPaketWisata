<?php

class m_tic extends CI_Model
{

    public function get_data_db()
    {
        $this->db->order_by('id_tic', 'asc');
        return  $this->db->get('tic')->result_array();
    }

    public function tambah_data_db($data, $tabel)
    {
        $this->db->insert($tabel, $data);
    }

    public function getDataById($id)
    {
        return $this->db->get_where('tic', ['id_tic' => $id])->row_array();
    }

    public function edit_data_db($id)
    {
        $data['tic'] = $this->db->get_where('tic', ['id_tic' => $id])->row_array();
        $data = [
            "id_tic" => $this->input->post('id_tic', true),
            "nama_tic" => $this->input->post('nama_tic', true),
            "alamat_tic" => $this->input->post('alamat_tic',  true),
            "kontak_tic" => $this->input->post('kontak_tic', true)
        ];
        $this->db->where('id_tic', $this->input->post('id_tic'));
        $this->db->update('tic', $data);
    }

    public function hapus_data_db($id)
    {
        $this->db->where($id);
        return $this->db->delete('tic');
    }
    
    public function jumlah_tic()
    {
        $query = $this->db->get('tic');
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
