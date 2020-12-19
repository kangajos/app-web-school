<?php

class User extends CI_Controller
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
		$this->load->model("UserModel", "user");
	}

	public function index()
	{
		$data["active"] = "user";
		$data["title"] = "user";
		$data["user"] = $this->user->all();
		$data["page"] = "user/index";
		$this->load->view("layouts/backend", array("contents" => $data));
	}

	public function add()
	{
		$data["active"] = "user";
		$data["title"] = "user";
		$data["page"] = "user/add";
		$this->load->view("layouts/backend", array("contents" => $data));
	}

	public function create()
	{
		$cek = $this->user->edit(array("user_id" => $this->input->post("username")));

		if (!empty($cek)) {
			$this->session->set_flashdata("error", "username alredy.");
			redirect("admin/user");
		}
		if ($this->input->post("password1") !== $this->input->post("password2")) {
			$this->session->set_flashdata("error", "Confirm password not match!");
			redirect("admin/user");
		}
		$params = array(
			"full_name" => $this->input->post("full_name"),
			"username" => $this->input->post("username"),
			"password" => password_hash($this->input->post("password1"), PASSWORD_DEFAULT),
		);
		if ($this->user->save($params) === true) {
			$this->session->set_flashdata("success", "user successfully created");
		} else {
			$this->session->set_flashdata("error", "user failed to create");
		}

		redirect("admin/user");
	}

	public function edit($id = null)
	{
		$data["active"] = "user";
		$data["title"] = "user Edit";
		$data["user"] = $this->user->edit(array("user_id" => $id));
		$data["page"] = "user/user_edit";
		if (empty($data['user'])) {
			redirect("admin/user");
		}
		$this->load->view("layouts/backend", array("contents" => $data));
	}

	public function update()
	{
		if ($this->input->post('password1') !== null || $this->input->post('password1') != '') {
			if ($this->input->post("password1") !== $this->input->post("password2")) {
				$this->session->set_flashdata("error", "Confirm password not match!");
				redirect("admin/user");
			}
			$params = array(
				"full_name" => $this->input->post("full_name"),
				"full_name" => $this->input->post("full_name"),
				"password" => password_hash($this->input->post("password1"), PASSWORD_DEFAULT),
			);
		} else {
			$params = array(
				"full_name" => $this->input->post("full_name"),
				"full_name" => $this->input->post("full_name"),
			);
		}
		$where = array("user_id" => $this->input->post("user_id"));

		if ($this->user->update($params, $where) === true) {
			$this->session->set_flashdata("success", "user changed successfully.");
		} else {
			$this->session->set_flashdata("error", "user failed to changed.");
		}
		redirect("admin/user");

	}

	public function delete($id = null)
	{
		$where = array("user_id" => $id);
		if ($this->user->delete($where) === true) {
			$this->session->set_flashdata("success", "user deleted successfully.");
		} else {
			$this->session->set_flashdata("error", "user failed to deleted.");
		}
		redirect("admin/user");
	}
}
