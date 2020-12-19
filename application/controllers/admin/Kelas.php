<?php

class Kelas extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata("is_login") !== true) {
			redirect("auth/out");
		}
		if ($this->session->userdata("level") == "siswa") {
			redirect("siswa/dashboard");
		}
		$this->load->model("KelasModel", "kelas");
	}

	public function index()
	{
		$data["active"] = "kelas";
		$data["title"] = "kelas";
		$data["kelas"] = $this->kelas->all();
		$data["page"] = "kelas/index";
		$this->load->view("layouts/backend", array("contents" => $data));
	}

	public function add()
	{
		$data["active"] = "kelas";
		$data["title"] = "kelas";
		$data["page"] = "kelas/add";
		$this->load->view("layouts/backend", array("contents" => $data));
	}

	public function create()
	{
		$cek = $this->kelas->edit(array("kode_kelas" => $this->input->post("kode_kelas")));

		if (!empty($cek)) {
			$this->session->set_flashdata("error", "kode kelas alredy.");
			redirect("admin/kelas");
		}

		$params = array(
			"kode_kelas" => $this->input->post("kode_kelas"),
			"nama_kelas" => $this->input->post("nama_kelas"),
		);
		if ($this->kelas->save($params) === true) {
			$this->session->set_flashdata("success", "kelas successfully created");
		} else {
			$this->session->set_flashdata("error", "kelas failed to create");
		}

		redirect("admin/kelas");
	}

	public function edit($id = null)
	{
		$data["active"] = "kelas";
		$data["title"] = "kelas Edit";
		$data["kelas"] = $this->kelas->edit(array("kelas_id" => $id));
		$data["page"] = "kelas/kelas_edit";
		if (empty($data['kelas'])) {
			redirect("admin/kelas");
		}
		$this->load->view("layouts/backend", array("contents" => $data));
	}

	public function update()
	{

		$params = array(
			"kode_kelas" => $this->input->post("kode_kelas"),
			"nama_kelas" => $this->input->post("nama_kelas"),
		);

		$where = array("kelas_id" => $this->input->post("kelas_id"));

		if ($this->kelas->update($params, $where) === true) {
			$this->session->set_flashdata("success", "kelas changed successfully.");
		} else {
			$this->session->set_flashdata("error", "kelas failed to changed.");
		}
		redirect("admin/kelas");

	}

	public function delete($id = null)
	{
		$where = array("kelas_id" => $id);
		if ($this->kelas->delete($where) === true) {
			$this->session->set_flashdata("success", "kelas deleted successfully.");
		} else {
			$this->session->set_flashdata("error", "kelas failed to deleted.");
		}
		redirect("admin/kelas");
	}
}
