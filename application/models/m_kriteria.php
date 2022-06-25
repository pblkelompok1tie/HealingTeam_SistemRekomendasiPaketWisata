<?php 

class m_kriteria extends CI_Model
{

	public function get_data_db()
	{
		return $this->db->get('kriteria');
	}

	public function getDataById($id)
    {
        return $this->db->get_where('kriteria', ['kd_kriteria' => $id])->result();
    }

	public function banyak_data()
	{
		$query = $this->db->get('kriteria');
		if($query->num_rows()>0){
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	public function tambah_data_db($data)
	{ 
		return $this->db->insert('kriteria', $data);
	}

	public function edit_data_db($data, $id)
	{
		return $this->db->update('kriteria',$data, ['kd_kriteria' => $id]);
	}

	public function hapus_data_db($id)
	{
		$this->db->where('kd_kriteria', $id);
		$this->db->delete('kriteria');
	}
}