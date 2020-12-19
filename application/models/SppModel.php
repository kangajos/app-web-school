<?php

class SppModel extends CI_Model
{
	protected $table = "spp";
	protected $table_siswa = "siswa";

	public function all($where = array())
	{
		if (!empty($where)){
			$this->db->where($where);
		}
		return $this->db->select("$this->table_siswa.*,$this->table.*,$this->table.created_at as spp_created_at")->join($this->table_siswa, "$this->table.siswa_id=$this->table_siswa.siswa_id")->order_by("spp_id", "DESC")->get($this->table)->result();
	}

	public function save($params = array())
	{
		$this->db->insert($this->table, $params);
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
