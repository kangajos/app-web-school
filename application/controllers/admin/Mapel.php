<?php

class Mapel extends CI_Controller
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
		$this->load->model("MapelModel", "mapel");
	}

	public function index()
	{
		$data["active"] = "mapel";
		$data["title"] = "mapel";
		$data["mapel"] = $this->mapel->all();
		$data["page"] = "mapel/index";
		$this->load->view("layouts/backend", array("contents" => $data));
	}

	public function add()
	{
		$data["active"] = "mapel";
		$data["title"] = "mapel";
		$data["page"] = "mapel/add";
		$this->load->view("layouts/backend", array("contents" => $data));
	}

	public function create()
	{
		$cek = $this->mapel->edit(array("kode_mapel" => $this->input->post("kode_mapel")));

		if (!empty($cek)) {
			$this->session->set_flashdata("error", "kode mapel alredy.");
			redirect("admin/mapel");
		}

		$params = array(
			"kode_mapel" => $this->input->post("kode_mapel"),
			"nama_mapel" => $this->input->post("nama_mapel"),
		);
		if ($this->mapel->save($params) === true) {
			$this->session->set_flashdata("success", "mapel successfully created");
		} else {
			$this->session->set_flashdata("error", "mapel failed to create");
		}

		redirect("admin/mapel");
	}

	public function edit($id = null)
	{
		$data["active"] = "mapel";
		$data["title"] = "mapel Edit";
		$data["mapel"] = $this->mapel->edit(array("mapel_id" => $id));
		$data["page"] = "mapel/mapel_edit";
		if (empty($data['mapel'])) {
			redirect("admin/mapel");
		}
		$this->load->view("layouts/backend", array("contents" => $data));
	}

	public function update()
	{

		$params = array(
			"kode_mapel" => $this->input->post("kode_mapel"),
			"nama_mapel" => $this->input->post("nama_mapel"),
		);

		$where = array("mapel_id" => $this->input->post("mapel_id"));

		if ($this->mapel->update($params, $where) === true) {
			$this->session->set_flashdata("success", "mapel changed successfully.");
		} else {
			$this->session->set_flashdata("error", "mapel failed to changed.");
		}
		redirect("admin/mapel");

	}

	public function delete($id = null)
	{
		$where = array("mapel_id" => $id);
		if ($this->mapel->delete($where) === true) {
			$this->session->set_flashdata("success", "mapel deleted successfully.");
		} else {
			$this->session->set_flashdata("error", "mapel failed to deleted.");
		}
		redirect("admin/mapel");
	}
}
