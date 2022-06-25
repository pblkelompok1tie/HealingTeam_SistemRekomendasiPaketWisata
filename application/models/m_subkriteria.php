<?php 

class m_subkriteria extends CI_Model
{

	public function get_data_db()
	{
		$this->db->select('subkriteria.*,kriteria.ket as nm_kriteria');
		$this->db->from('subkriteria');
		$this->db->join('kriteria','kriteria.kd_kriteria=subkriteria.kd_kriteria');
		$query = $this->db->get();
		return $query;
	}

	public function getDataById($id)
    {
        return $this->db->get_where('subkriteria', ['id_subkriteria' => $id])->result();
    }

	public function tambah_data_db($data)
	{ 
		$this->db->insert('subkriteria', $data);
	}

	public function edit_data_db($data, $id)
	{
		return $this->db->update('subkriteria',$data,['id_subkriteria' => $id]);
	}

	public function hapus_data_db($id)
	{
		$this->db->where('id_subkriteria', $id);
		$this->db->delete('subkriteria');
	}
}