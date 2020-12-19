<?php

class Spp extends CI_Controller
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
		$this->load->model("SppModel", "spp");
		$this->load->model("SiswaModel", "siswa");
	}

	public function index()
	{
		$data["active"] = "spp";
		$data["title"] = "spp";
		$data["spp"] = $this->spp->all();
		$data["page"] = "spp/index";
		$this->load->view("layouts/backend", array("contents" => $data));
	}

	public function add()
	{
		$data["active"] = "spp";
		$data["title"] = "spp";
		$data["siswa"] = $this->siswa->all();
		$data["page"] = "spp/add";
		$this->load->view("layouts/backend", array("contents" => $data));
	}

	public function create()
	{
		$params = array(
			"siswa_id" => $this->input->post("siswa_id"),
			"jumlah" => $this->input->post("jumlah"),
			"catatan" => $this->input->post("catatan"),
			"created_at" => date("Y-m-d H:i:s"),
			"created_by" => $this->session->userdata("username"),
		);
		if ($this->spp->save($params) === true) {
			if ($this->input->post("simpan_sms") == "simpan_sms") {
				$siswa = $this->siswa->edit(array("siswa_id" => $this->input->post("siswa_id")));
				$jumlah = number_format($this->input->post("jumlah"), 0, ",", ".");
				$message = "Kpd Yth Bpk/ibu wali murid dari " . $siswa->nama . ", telah melakukan pembayaran SPP sejumlah $jumlah";
				$no_hp = $siswa->no_hp;
				SendAPI_SMS(urlencode($no_hp), urlencode($message));
			}
			$this->session->set_flashdata("success", "spp successfully created");
		} else {
			$this->session->set_flashdata("error", "spp failed to create");
		}

		redirect("admin/spp");
	}

	public function edit($id = null)
	{
		$data["active"] = "spp";
		$data["title"] = "spp Edit";
		$data["spp"] = $this->spp->edit(array("spp_id" => $id));
		$data["siswa"] = $this->siswa->edit(array("siswa_id" => $data["spp"]->siswa_id));
		$data["page"] = "spp/spp_edit";
		if (empty($data['spp'])) {
			redirect("admin/spp");
		}
		$this->load->view("layouts/backend", array("contents" => $data));
	}

	public function update()
	{
		$params = array(
			"jumlah" => $this->input->post("jumlah"),
			"catatan" => $this->input->post("catatan"),
			"created_by" => $this->session->userdata("username"),
		);

		$where = array("spp_id" => $this->input->post("spp_id"));

		if ($this->spp->update($params, $where) === true) {
			if ($this->input->post("simpan_sms") == "simpan_sms") {
				$siswa = $this->siswa->edit(array("siswa_id" => $this->input->post("siswa_id")));
				$jumlah = number_format($this->input->post("jumlah"), 0, ",", ".");
				$message = "Kpd Yth Bpk/ibu wali murid dari " . $siswa->nama . ", telah melakukan edit pembayaran SPP sejumlah $jumlah";
				$no_hp = $siswa->no_hp;
				SendAPI_SMS(urlencode($no_hp), urlencode($message));
			}
			$this->session->set_flashdata("success", "spp changed successfully.");
		} else {
			$this->session->set_flashdata("error", "spp failed to changed.");
		}
		redirect("admin/spp");

	}

	public function delete($id = null)
	{
		$where = array("spp_id" => $id);
		if ($this->spp->delete($where) === true) {
			$this->session->set_flashdata("success", "spp deleted successfully.");
		} else {
			$this->session->set_flashdata("error", "spp failed to deleted.");
		}
		redirect("admin/spp");
	}
}
