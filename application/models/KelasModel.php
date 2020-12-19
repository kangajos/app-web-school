<?php

class KelasModel extends CI_Model
{
	protected $table = "kelas";

	public function all()
	{
		return $this->db->order_by("kelas_id", "DESC")->get($this->table)->result();
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
