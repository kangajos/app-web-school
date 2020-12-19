<?php

class Jadwal extends CI_Controller
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
		$this->load->model("JadwalModel", "jadwal");
		$this->siswaID = $this->session->userdata("siswa_id");
	}

	public function index()
	{
		$data["title"] = "jadwal";
		$data["active"] = "jadwal";
		$data["jadwal"] = $this->jadwal->all(array("kelas.kelas_id" => $this->session->userdata("kelas_id")));
		$data["page"] = "_siswa/jadwal/index";

		$this->load->view("layouts/backend", array("contents" => $data));
	}
}
