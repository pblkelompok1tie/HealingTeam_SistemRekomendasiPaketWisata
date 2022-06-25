<?php
class m_detail_paket_wisata extends CI_Model
{
    public function get_data_db()
    {
        $this->db->select('*');
        $this->db->from('detail_paket_wisata');
        $this->db->join('paket_wisata', 'detail_paket_wisata.id_paket_wisata = paket_wisata.id_paket_wisata');
        $this->db->join('destinasi_tujuan', 'detail_paket_wisata.id_destinasi_tujuan = destinasi_tujuan.id_destinasi_tujuan');
        return $this->db->get()->result_array();
    }

    public function get_data_with_relation($id)
    {
        $this->db->select('*');
        $this->db->from('destinasi_tujuan');
        $this->db->join('detail_paket_wisata', 'detail_paket_wisata.id_destinasi_tujuan = destinasi_tujuan.id_destinasi_tujuan');
        $this->db->join('paket_wisata', 'paket_wisata.id_paket_wisata = detail_paket_wisata.id_paket_wisata');
        $this->db->where('paket_wisata.id_paket_wisata', $id);
        return $this->db->get();
    }

    public function getDataById($id)
    {
        return $this->db->get_where('detail_paket_wisata', ['id_detail_paket_wisata' => $id])->row_array();
    }

    public function edit_data_db($id_paket_wisata,$id_destinasi_tujuan)
    {
        //DELETE DETAIL PACKAGE
        $this->db->delete('detail_paket_wisata', array('id_paket_wisata' => $id_paket_wisata));
        $result = array();
        foreach ($id_destinasi_tujuan as $key => $val) {
            $result[] = array(
                'id_paket_wisata'   => $id_paket_wisata,
                'id_destinasi_tujuan'   => $_POST['id_destinasi_tujuan'][$key]
            );
        }
        //MULTIPLE INSERT TO DETAIL TABLE
        $this->db->insert_batch('detail_paket_wisata', $result);
        $this->db->trans_complete();
    }

    public function tambah_data_db($data2 = array(), $tabel)
    {
        $this->db->insert_batch($tabel, $data2);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }

    public function hapus_data_db($id)
    {
        $this->db->where($id);
        return $this->db->delete('detail_paket_wisata');
    }
}
