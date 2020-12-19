<?php

class Siswa extends CI_Controller
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
		$this->load->model("SiswaModel", "siswa");
		$this->load->model("KelasModel", "kelas");
	}

	public function index()
	{
		$data["active"] = "siswa";
		$data["title"] = "siswa";
		$data["siswa"] = $this->siswa->all();
		$data["page"] = "siswa/index";
		$this->load->view("layouts/backend", array("contents" => $data));
	}

	public function add()
	{
		$data["active"] = "siswa";
		$data["title"] = "siswa";
		$data["page"] = "siswa/add";
		$data["kelas"] = $this->kelas->all();
		$this->load->view("layouts/backend", array("contents" => $data));
	}

	public function create()
	{
		$cek = $this->siswa->edit(array("nis" => $this->input->post("nis")));

		if (!empty($cek)) {
			$this->session->set_flashdata("error", "nis alredy.");
			redirect("admin/siswa");
		}
		$cek2 = $this->siswa->edit(array("no_hp" => $this->input->post("no_hp")));

		if (!empty($cek2)) {
			$this->session->set_flashdata("error", "No HP alredy.");
			redirect("admin/siswa");
		}
		if ($this->input->post("password1") !== $this->input->post("password2")) {
			$this->session->set_flashdata("error", "Confirm password not match!");
			redirect("admin/siswa");
		}
		$params = array(
			"kelas_id" => $this->input->post("kelas_id"),
			"nis" => $this->input->post("nis"),
			"nama" => $this->input->post("nama"),
			"jk" => $this->input->post("jk"),
			"no_hp" => $this->input->post("no_hp"),
			"alamat" => $this->input->post("alamat"),
			"username" => $this->input->post("username"),
			"password" => password_hash($this->input->post("password1"), PASSWORD_DEFAULT),
			'created_at' => date("Y-m-d"),
		);
		if ($this->siswa->save($params) === true) {
			$this->session->set_flashdata("success", "siswa successfully created");
		} else {
			$this->session->set_flashdata("error", "siswa failed to create");
		}

		redirect("admin/siswa");
	}

	public function edit($id = null)
	{
		$data["active"] = "siswa";
		$data["title"] = "siswa Edit";
		$data["siswa"] = $this->siswa->edit(array("siswa_id" => $id));
		$data["kelas"] = $this->kelas->all();
		$data["page"] = "siswa/siswa_edit";
		if (empty($data['siswa'])) {
			redirect("admin/siswa");
		}
		$this->load->view("layouts/backend", array("contents" => $data));
	}

	public function update()
	{

		$params = array(
			"kelas_id" => $this->input->post("kelas_id"),
			"nis" => $this->input->post("nis"),
			"nama" => $this->input->post("nama"),
			"jk" => $this->input->post("jk"),
			"no_hp" => $this->input->post("no_hp"),
			"alamat" => $this->input->post("alamat"),
		);

		$where = array("siswa_id" => $this->input->post("siswa_id"));

		if ($this->siswa->update($params, $where) === true) {
			$this->session->set_flashdata("success", "siswa changed successfully.");
		} else {
			$this->session->set_flashdata("error", "siswa failed to changed.");
		}
		redirect("admin/siswa");

	}

	public function delete($id = null)
	{
		$where = array("siswa_id" => $id);
		if ($this->siswa->delete($where) === true) {
			$this->session->set_flashdata("success", "siswa deleted successfully.");
		} else {
			$this->session->set_flashdata("error", "siswa failed to deleted.");
		}
		redirect("admin/siswa");
	}
}
