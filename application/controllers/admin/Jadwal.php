<?php

class Jadwal extends CI_Controller
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
		$this->load->model("JadwalModel", "jadwal");
		$this->load->model("KelasModel", "kelas");
		$this->load->model("MapelModel", "mapel");
		$this->load->model("GuruModel", "guru");
		$this->load->model("SiswaModel", "siswa");
	}

	public function index()
	{
		$data["active"] = "jadwal";
		$data["title"] = "jadwal";
		$data["jadwal"] = $this->jadwal->all();
		$data["page"] = "jadwal/index";
		$this->load->view("layouts/backend", array("contents" => $data));
	}

	public function absensi()
	{
		if ($this->input->get("hari") != "") {
			$hari = $this->input->get("hari");
		}else{
			$getDay = date("l");
			$hari = getDay($getDay);
		}
		$data["active"] = "absensi";
		$data["title"] = "absensi";
		$data["jadwal"] = $this->jadwal->all(array("hari" => $hari));
		$data["page"] = "jadwal/absensi";
		$this->load->view("layouts/backend", array("contents" => $data));
	}

	public function isi_absensi($jadwalID = null, $kelas_id = null, $mapel_id = null)
	{
		$getDay = date("l");
		$hari = getDay($getDay);
		$data["active"] = "absensi";
		$data["title"] = "Isi Absensi";
		$data["absensi"] = $this->jadwal->absensi(array("hari" => $hari, "jadwal_id" => $jadwalID, "jadwal.kelas_id" => $kelas_id));
		$data["detail_absensi"] = $this->jadwal->getAbsensi(array("jadwal_id" => $jadwalID));
		if (empty($data["detail_absensi"])) {
			$data["edit"] = TRUE;
			$data["detail_absensi"] = $this->siswa->all(array("siswa.kelas_id" => $kelas_id));
		}
		$data["page"] = "jadwal/isi_absensi";
		$this->load->view("layouts/backend", array("contents" => $data));
	}

	public function save_absensi()
	{
		$siswa_id = $this->input->post("siswa_id");
		$absensi = $this->input->post("absensi");
		$kelas_id = $this->input->post("kelas_id");
		$mapel_id = $this->input->post("mapel_id");
		$jadwal_id = $this->input->post("jadwal_id");
		foreach ($siswa_id as $key => $value) {
			$params = array(
				"jadwal_id" => $jadwal_id,
				"kelas_id" => $kelas_id,
				"mapel_id" => $mapel_id,
				"siswa_id" => $siswa_id[$key],
				"absensi" => $absensi[$key],
				"created_at" => date("Y-m-d H:i:s"),
				"created_by" => $this->session->userdata("username"));
			if ($this->input->post("simpan_sms") == "simpan_sms") {
				$absensiText = $absensi[$key] == "H" ? "mengikuti" : ($absensi[$key] == "I" ? "IZIN tidak mengikuti" : "TIDAK mengikuti");
				$nama_siswa = $this->input->post("nama")[$key];
				$mapel = $this->input->post("mapel");
				$no_hp = $this->input->post("no_hp")[$key];
				$message = "Kpd Yth Bpk/ibu wali murid dari $nama_siswa, $absensiText Mata Pelajaran $mapel";
				SendAPI_SMS(urlencode($no_hp), urlencode($message));
			}
			$this->jadwal->save_absensi($params);
		}
		$this->session->set_flashdata("success", "Anda telah berhasil melakukan absensi");
		redirect("admin/jadwal/absensi");
	}

	public function update_absensi()
	{
		$siswa_id = $this->input->post("siswa_id");
		$absensi = $this->input->post("absensi");
		$kelas_id = $this->input->post("kelas_id");
		$mapel_id = $this->input->post("mapel_id");
		$jadwal_id = $this->input->post("jadwal_id");
		foreach ($siswa_id as $key => $value) {
			$params = array(
				"jadwal_id" => $jadwal_id,
				"kelas_id" => $kelas_id,
				"mapel_id" => $mapel_id,
				"siswa_id" => $siswa_id[$key],
				"absensi" => $absensi[$key],
				"created_by" => $this->session->userdata("username"));
			$where = array("absensi_id" => $this->input->post("absensi_id")[$key]);
			if ($this->input->post("simpan_sms") == "simpan_sms") {
				$absensiText = $absensi[$key] == "H" ? "mengikuti" : ($absensi[$key] == "I" ? "IZIN tidak mengikuti" : "TIDAK mengikuti");
				$nama_siswa = $this->input->post("nama")[$key];
				$mapel = $this->input->post("mapel");
				$no_hp = $this->input->post("no_hp")[$key];
				$message = "Kpd Yth Bpk/ibu wali murid dari $nama_siswa, $absensiText Mata Pelajaran $mapel";
				SendAPI_SMS(urlencode($no_hp), urlencode($message));
			}
			$this->jadwal->update_absensi($params, $where);
		}
		$this->session->set_flashdata("success", "Anda telah berhasil melakukan Edit absensi");
		redirect("admin/jadwal/absensi");
	}

	public function add()
	{
		$data["active"] = "jadwal";
		$data["title"] = "jadwal";
		$data["kelas"] = $this->kelas->all();
		$data["mapel"] = $this->mapel->all();
		$data["guru"] = $this->guru->all();
		$data["page"] = "jadwal/add";
		$this->load->view("layouts/backend", array("contents" => $data));
	}

	public function create()
	{
		$cek = $this->jadwal->edit(array("kelas_id" => $this->input->post("kelas_id"), "mapel_id" => $this->input->post("mapel_id")));

		if (!empty($cek)) {
			$this->session->set_flashdata("error", "Mapel di kelas terpilih sudah ada.");
			redirect("admin/jadwal");
		}

		$awalj = $this->input->post("awalj");
		$akhirm = $this->input->post("akhirm");
		$jam_awal = $awalj . ":" . $akhirm;

		$awalj2 = $this->input->post("awalj2");
		$akhirm2 = $this->input->post("akhirm2");
		$jam_akhir = $awalj2 . ":" . $akhirm2;
		$params = array(
			"kelas_id" => $this->input->post("kelas_id"),
			"mapel_id" => $this->input->post("mapel_id"),
			"guru_id" => $this->input->post("guru_id"),
			"hari" => $this->input->post("hari"),
			"awal" => $jam_awal,
			"akhir" => $jam_akhir,
		);
		if ($this->jadwal->save($params) === true) {
			$this->session->set_flashdata("success", "jadwal successfully created");
		} else {
			$this->session->set_flashdata("error", "jadwal failed to create");
		}

		redirect("admin/jadwal");
	}

	public function edit($id = null)
	{
		$data["active"] = "jadwal";
		$data["title"] = "jadwal Edit";
		$data["jadwal"] = $this->jadwal->edit(array("jadwal_id" => $id));
		$data["kelas"] = $this->kelas->all();
		$data["mapel"] = $this->mapel->all();
		$data["guru"] = $this->guru->all();
		$data["page"] = "jadwal/jadwal_edit";
		if (empty($data['jadwal'])) {
			redirect("admin/jadwal");
		}
		$this->load->view("layouts/backend", array("contents" => $data));
	}

	public function update()
	{

		$awalj = $this->input->post("awalj");
		$akhirm = $this->input->post("akhirm");
		$jam_awal = $awalj . ":" . $akhirm;

		$awalj2 = $this->input->post("awalj2");
		$akhirm2 = $this->input->post("akhirm2");
		$jam_akhir = $awalj2 . ":" . $akhirm2;
		$params = array(
			"kelas_id" => $this->input->post("kelas_id"),
			"mapel_id" => $this->input->post("mapel_id"),
			"guru_id" => $this->input->post("guru_id"),
			"hari" => $this->input->post("hari"),
			"awal" => $jam_awal,
			"akhir" => $jam_akhir,
		);

		$where = array("jadwal_id" => $this->input->post("jadwal_id"));

		if ($this->jadwal->update($params, $where) === true) {
			$this->session->set_flashdata("success", "jadwal changed successfully.");
		} else {
			$this->session->set_flashdata("error", "jadwal failed to changed.");
		}
		redirect("admin/jadwal");

	}

	public function delete($id = null)
	{
		$where = array("jadwal_id" => $id);
		if ($this->jadwal->delete($where) === true) {
			$this->session->set_flashdata("success", "jadwal deleted successfully.");
		} else {
			$this->session->set_flashdata("error", "jadwal failed to deleted.");
		}
		redirect("admin/jadwal");
	}

	public function sms()
	{
		$no_hp_tujuan = urlencode("081324275549"); // pisahkan dengan koma bila lebih dari 1 nomer tujuan
		$isi_pesan = urlencode("Coba kirim SMS");

		$result = SendAPI_SMS($no_hp_tujuan, $isi_pesan);
		echo $result;
	}
}
