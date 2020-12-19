<?php

class Dashboard extends CI_Controller
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
	}

	public function index()
	{
		$data["title"] = "Dashboard";
		$data["jml_siswa"] = $this->db->get("siswa")->num_rows();
		$data["jml_mapel"] = $this->db->get("mapel")->num_rows();
		$data["jml_kelas"] = $this->db->get("kelas")->num_rows();
		$data["page"] = "dashboard/index";
		$data['active'] = "dashboard";
		$this->load->view("layouts/backend", array("contents" => $data));
	}
}
