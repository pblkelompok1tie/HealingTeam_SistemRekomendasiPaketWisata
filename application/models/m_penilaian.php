<?php

class m_penilaian extends CI_Model
{
	public function get_data_paket_wisata_db()/*menampilkan data transaksi paket_wisata*/
	{
		$this->db->select('*');
		$this->db->from('paket_wisata');
		$this->db->join('penginapan', 'paket_wisata.id_penginapan = penginapan.id_penginapan');
		$this->db->join('tic', 'paket_wisata.id_tic = tic.id_tic');
		$this->db->join('tempat_makan', 'paket_wisata.id_tempat_makan = tempat_makan.id_tempat_makan');
		$query = $this->db->get();
		return $query;
	}

	public function get_data_penilaian_db()/*menampilkan data penilaian*/
	{
		$this->db->select('*,paket_wisata.nama_paket_wisata as nm_ag, sk.ket_sub as nm_sub, sb.ket_sub as sub, st.ket_sub as nmsub');
		$this->db->order_by('id_nilai ASC');
		$this->db->from('nilai n');
		$this->db->join('paket_wisata', 'paket_wisata.id_paket_wisata=n.id_paket_wisata');
		$this->db->join('subkriteria sk', 'sk.id_subkriteria=n.C1');
		$this->db->join('subkriteria sb', 'sb.id_subkriteria=n.C2');
		$this->db->join('subkriteria st', 'st.id_subkriteria=n.C3');
		$query = $this->db->get();
		return $query;
	}

	public function get_data_rating_db()/*menampilkan rating kecocokan*/
	{
		$this->db->select('*,paket_wisata.nama_paket_wisata as nm_ag, sk.bobot as b1, sb.bobot as b2, st.bobot as b3, ((sk.bobot / sk.id_subkriteria) * 0.25)*((sb.bobot / sb.id_subkriteria) * 0.25)*((st.bobot / st.id_subkriteria) * 0.5) as combination');
		$this->db->order_by('combination', 'ASC');
		$this->db->from('nilai n');
		$this->db->join('paket_wisata', 'paket_wisata.id_paket_wisata=n.id_paket_wisata');
		$this->db->join('detail_rating', 'paket_wisata.id_paket_wisata=detail_rating.id_paket_wisata');
		$this->db->join('subkriteria sk', 'sk.id_subkriteria=n.C1');
		$this->db->join('subkriteria sb', 'sb.id_subkriteria=n.C2');
		$this->db->join('subkriteria st', 'st.id_subkriteria=n.C3');
		$this->db->select_avg('rating', 'rating');
		$this->db->group_by('nama_paket_wisata');
		$query = $this->db->get();
		return $query;
	}

	public function getHargaPaket()
	/*menampilkan berdasarkan kode kriteria C1*/
	{
		$this->db->select('*');
		$this->db->from('subkriteria');
		$this->db->where('subkriteria.kd_kriteria="C1"');
		$query = $this->db->get();
		return $query;
	}


	public function getDurasi()
	/*menampilkan berdasarkan kode kriteria C2*/
	{
		$this->db->select('*');
		$this->db->from('subkriteria');
		$this->db->where('subkriteria.kd_kriteria="C2"');
		$query = $this->db->get();
		return $query;
	}

	public function getUsia()
	/*menampilkan berdasarkan kode kriteria C3*/
	{
		$this->db->select('*');
		$this->db->from('subkriteria');
		$this->db->where('subkriteria.kd_kriteria="C3"');
		$query = $this->db->get();
		return $query;
	}

	public function tambah_data_db($data)
	{
		$this->db->insert('nilai', $data);
	}

	public function hapus_data_db($id)
	{
		$this->db->where($id);
		return $this->db->delete('nilai');
	}

	public function get_maxC1()/*mencari nilai max C1*/
	{
		$this->db->select('*, sb.bobot as b1');
		$this->db->select_max('bobot');
		$this->db->join('subkriteria sb', 'sb.id_subkriteria=n.C1');
		$query = $this->db->get('nilai n');
		if ($query->num_rows() > 0) {
			return $query->row()->bobot;
		} else {
			return 0;
		}
	}

	public function get_maxC2()/*mencari nilai max C2*/
	{
		$this->db->select('*, sb.bobot as b2');
		$this->db->select_max('bobot');
		$this->db->join('subkriteria sb', 'sb.id_subkriteria=n.C2');
		$query = $this->db->get('nilai n');
		if ($query->num_rows() > 0) {
			return $query->row()->bobot;
		} else {
			return 0;
		}
	}

	public function get_maxC3()/*mencari nilai max C3*/
	{
		$this->db->select('*, st.bobot as b3');
		$this->db->select_max('bobot');
		$this->db->join('subkriteria st', 'st.id_subkriteria=n.C3');
		$query = $this->db->get('nilai n');
		if ($query->num_rows() > 0) {
			return $query->row()->bobot;
		} else {
			return 0;
		}
	}

	public function get_minC1()/*mencari nilai max C1*/
	{
		$this->db->select('*, sb.bobot as b1');
		$this->db->select_min('bobot');
		$this->db->join('subkriteria sb', 'sb.id_subkriteria=n.C1');
		$query = $this->db->get('nilai n');
		if ($query->num_rows() > 0) {
			return $query->row()->bobot;
		} else {
			return 0;
		}
	}

	public function get_minC2()/*mencari nilai max C2*/
	{
		$this->db->select('*, sb.bobot as b2');
		$this->db->select_min('bobot');
		$this->db->join('subkriteria sb', 'sb.id_subkriteria=n.C2');
		$query = $this->db->get('nilai n');
		if ($query->num_rows() > 0) {
			return $query->row()->bobot;
		} else {
			return 0;
		}
	}

	public function get_minC3()/*mencari nilai max C3*/
	{
		$this->db->select('*, st.bobot as b3');
		$this->db->select_min('bobot');
		$this->db->join('subkriteria st', 'st.id_subkriteria=n.C3');
		$query = $this->db->get('nilai n');
		if ($query->num_rows() > 0) {
			return $query->row()->bobot;
		} else {
			return 0;
		}
	}

	public function get_bobotc1()/*ambil bobot berdasarkan kriteria*/
	{
		$this->db->select('bobot_nilai');
		$this->db->where('kriteria.kd_kriteria="C1"');
		$query = $this->db->get('kriteria');
		if ($query->num_rows() > 0) {
			return $query->row()->bobot_nilai;
		} else {
			return 0;
		}
	}

	public function get_bobotc2()
	{
		$this->db->select('bobot_nilai');
		$this->db->where('kriteria.kd_kriteria="C2"');
		$query = $this->db->get('kriteria');
		if ($query->num_rows() > 0) {
			return $query->row()->bobot_nilai;
		} else {
			return 0;
		}
	}

	public function get_bobotc3()
	{
		$this->db->select('bobot_nilai');
		$this->db->where('kriteria.kd_kriteria="C3"');
		$query = $this->db->get('kriteria');
		if ($query->num_rows() > 0) {
			return $query->row()->bobot_nilai;
		} else {
			return 0;
		}
	}

	public function get_sifat()
	{
		$this->db->select('*');
		$query = $this->db->get('kriteria');
		return $query;
	}

	public function getDataById($id)
	{
		return $this->db->get_where('nilai', ['id_nilai' => $id])->result();
	}

	public function edit_data_db($data, $id)
	{
		return $this->db->update('nilai', $data, ['id_nilai' => $id]);
	}
}
