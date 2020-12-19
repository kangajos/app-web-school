<?php

class About extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("AboutModel", "about");
	}

	public function index()
	{
		$data["active"] = "about";
		$data["title"] = "about";
		$data["about"] = $this->about->all();
		$data["page"] = "about/index";
		$this->load->view("layouts/backend", array("contents" => $data));
	}

	public function add()
	{
		$data["active"] = "about";
		$data["title"] = "about";
		$data["page"] = "about/add";
		$this->load->view("layouts/backend", array("contents" => $data));
	}

	public function create()
	{
		$params = array(
			"description" => $this->input->post("description"),
			'created_at' => date("Y-m-d H:i:s"),
		);
		if ($this->about->save($params) === true) {
			$this->session->set_flashdata("success", "about successfully created");
		} else {
			$this->session->set_flashdata("error", "about failed to create");
		}

		redirect("admin/about");
	}

	public function edit($id = null)
	{
		$data["active"] = "about";
		$data["title"] = "about Edit";
		$data["about"] = $this->about->edit(array("about_id" => $id));
		$data["page"] = "about/about_edit";
		if (empty($data['about'])) {
			redirect("admin/about");
		}
		$this->load->view("layouts/backend", array("contents" => $data));
	}

	public function update()
	{
		$where = array("about_id" => $this->input->post("about_id"));
		$params = array(
			"description" => $this->input->post("description"),
		);
		if ($this->about->update($params, $where) === true) {
			$this->session->set_flashdata("success", "about changed successfully.");
		} else {
			$this->session->set_flashdata("error", "about failed to changed.");
		}
		redirect("admin/about");

	}

	public function delete($id = null)
	{
		$where = array("about_id" => $id);
		if ($this->about->delete($where) === true) {
			$this->session->set_flashdata("success", "about deleted successfully.");
		} else {
			$this->session->set_flashdata("error", "about failed to deleted.");
		}
		redirect("admin/about");
	}
}
