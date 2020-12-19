<?php

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata("is_login") !== true) {
			redirect("auth/out");
		}
		if ($this->session->userdata("level") ==  "admin") {
			redirect("admin/dashboard");
		}
	}

	public function index()
	{
		$data["title"] = "dashboard";
		$data["active"] = "dashboard";
		$data["page"] = "_siswa/dashboard/index";

		$this->load->view("layouts/backend", array("contents" => $data));
	}
}
