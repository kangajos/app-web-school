<?php

class Spp extends CI_Controller
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
		$this->load->model("SppModel", "spp");
		$this->siswaID = $this->session->userdata("siswa_id");
	}

	public function index()
	{
		$data["title"] = "Spp";
		$data["active"] = "spp";
		$data["spp"] = $this->spp->all(array("spp.siswa_id" => $this->siswaID));
		$data["page"] = "_siswa/spp/index";

		$this->load->view("layouts/backend", array("contents" => $data));
	}
}
