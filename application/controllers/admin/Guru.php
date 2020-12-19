<?php

class Guru extends CI_Controller
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
		$this->load->model("GuruModel", "guru");
	}

	public function index()
	{
		$data["active"] = "guru";
		$data["title"] = "guru";
		$data["guru"] = $this->guru->all();
		$data["page"] = "guru/index";
		$this->load->view("layouts/backend", array("contents" => $data));
	}

	public function add()
	{
		$data["active"] = "guru";
		$data["title"] = "guru";
		$data["page"] = "guru/add";
		$this->load->view("layouts/backend", array("contents" => $data));
	}

	public function create()
	{
		$cek = $this->guru->edit(array("nip" => $this->input->post("nip")));

		if (!empty($cek)) {
			$this->session->set_flashdata("error", "NIP guru alredy.");
			redirect("admin/guru");
		}

		$params = array(
			"nip" => $this->input->post("nip"),
			"nama_guru" => $this->input->post("nama_guru"),
			"jk" => $this->input->post("jk"),
			"no_hp" => $this->input->post("no_hp"),
			"alamat" => $this->input->post("alamat"),
		);
		if ($this->guru->save($params) === true) {
			$this->session->set_flashdata("success", "guru successfully created");
		} else {
			$this->session->set_flashdata("error", "guru failed to create");
		}

		redirect("admin/guru");
	}

	public function edit($id = null)
	{
		$data["active"] = "guru";
		$data["title"] = "guru Edit";
		$data["guru"] = $this->guru->edit(array("guru_id" => $id));
		$data["page"] = "guru/guru_edit";
		if (empty($data['guru'])) {
			redirect("admin/guru");
		}
		$this->load->view("layouts/backend", array("contents" => $data));
	}

	public function update()
	{
		$params = array(
			"nip" => $this->input->post("nip"),
			"nama_guru" => $this->input->post("nama_guru"),
			"jk" => $this->input->post("jk"),
			"no_hp" => $this->input->post("no_hp"),
			"alamat" => $this->input->post("alamat"),
		);

		$where = array("guru_id" => $this->input->post("guru_id"));

		if ($this->guru->update($params, $where) === true) {
			$this->session->set_flashdata("success", "guru changed successfully.");
		} else {
			$this->session->set_flashdata("error", "guru failed to changed.");
		}
		redirect("admin/guru");

	}

	public function delete($id = null)
	{
		$where = array("guru_id" => $id);
		if ($this->guru->delete($where) === true) {
			$this->session->set_flashdata("success", "guru deleted successfully.");
		} else {
			$this->session->set_flashdata("error", "guru failed to deleted.");
		}
		redirect("admin/guru");
	}
}
