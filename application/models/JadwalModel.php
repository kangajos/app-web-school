<?php

class JadwalModel extends CI_Model
{
	protected $table = "jadwal";
	protected $table_kelas = "kelas";
	protected $table_mapel = "mapel";
	protected $table_guru = "guru";
	protected $table_absensi = "absensi";
	protected $table_siswa = "siswa";

	public function all($where = array())
	{
		$this->db->join("$this->table_kelas", "$this->table.kelas_id=$this->table_kelas.kelas_id", "LEFT");
		$this->db->join("$this->table_mapel", "$this->table.mapel_id=$this->table_mapel.mapel_id", "LEFT");
		$this->db->join("$this->table_guru", "$this->table.guru_id=$this->table_guru.guru_id", "LEFT");
		if (!empty($where)) {
			$this->db->where($where);
		}
		return $this->db->order_by("jadwal_id", "DESC")->get($this->table)->result();
	}

	public function absensi($where = array())
	{
		$this->db->join("$this->table_kelas", "$this->table.kelas_id=$this->table_kelas.kelas_id", "LEFT");
		$this->db->join("$this->table_mapel", "$this->table.mapel_id=$this->table_mapel.mapel_id", "LEFT");
		$this->db->join("$this->table_guru", "$this->table.guru_id=$this->table_guru.guru_id", "LEFT");
		if (!empty($where)) {
			$this->db->where($where);
		}
		return $this->db->order_by("jadwal_id", "DESC")->get($this->table)->row();
	}

	public function save($params = array())
	{
		$this->db->insert($this->table, $params);
		return true;
	}

	public function getAbsensi($where, $dateNow = null)
	{
		if (!empty($where)) {
			$this->db->where($where);
		}
		if ($dateNow == null) {
			$dateStart = date("Y-m-d") . " 00:00:00";
			$dateEnd = date("Y-m-d") . " 23:59:59";
			$this->db->join($this->table_siswa, "$this->table_absensi.siswa_id=$this->table_siswa.siswa_id")->where("$this->table_absensi.created_at BETWEEN '$dateStart' AND '$dateEnd'");
		}
		return $this->db->get($this->table_absensi)->result();
	}

	public function save_absensi($params = array())
	{
		$this->db->insert($this->table_absensi, $params);
		return true;
	}

	public function update_absensi($params = array(), $where = array())
	{
		$this->db->update($this->table_absensi, $params, $where);
		return true;
	}

	public function edit($where = array())
	{
		return $this->db->get_where($this->table, $where)->row();
	}

	public function update($params = array(), $where = array())
	{
		$this->db->update($this->table, $params, $where);
		return $this->db->affected_rows() > 0 ? true : false;
	}

	public function delete($where = array())
	{
		$this->db->delete($this->table, $where);
		return $this->db->affected_rows() > 0 ? true : false;
	}
}
