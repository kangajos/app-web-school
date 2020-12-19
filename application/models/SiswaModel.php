<?php

class SiswaModel extends CI_Model
{
	protected $table = "siswa";
	protected $table_kelas = "kelas";

	public function all($where = array())
	{
		if (!empty($where)){
			$this->db->where($where);
		}
		return $this->db->join($this->table_kelas, "$this->table.kelas_id=$this->table_kelas.kelas_id")->order_by("created_at", "DESC")->get($this->table)->result();
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
