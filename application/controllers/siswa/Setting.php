<?php

class Setting extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata("is_login") !== true) {
			redirect("auth/out");
		}
		if ($this->session->userdata("level") == "admin") {
			redirect("admin/dashboard");
		}
		$this->load->model("SiswaModel", "siswa");
		$this->siswaID = $this->session->userdata("siswa_id");
	}

	public function index()
	{
		$data["title"] = "Ganti Kata Sandi";
		$data["active"] = "setting";
		$data["page"] = "_siswa/setting/index";

		$this->load->view("layouts/backend", array("contents" => $data));
	}

	public function gantiKataSandi()
	{

		$sandi_baru = $this->input->post("sandi_baru");
		$sandi_baru2 = $this->input->post("sandi_baru2");
		if ($sandi_baru != $sandi_baru2){
			$this->session->set_flashdata("error", "Konfirmasi kata sandi baru salah.");
			redirect("siswa/setting");
		}
		$sandi_lama = $this->input->post("sandi_lama");
		$cek = $this->siswa->edit(array("siswa_id" => $this->siswaID));
		if (!empty($cek)) {
			if (password_verify($sandi_lama, $cek->password)){
				$where = array("siswa_id" =>$this->siswaID);
				$params = array("password" => password_hash($sandi_baru, PASSWORD_DEFAULT));
				if ($this->siswa->update($params, $where)){
					$this->session->set_flashdata("success", "Kata sandi berhasil di ubah.");
				}else{
					$this->session->set_flashdata("error", "Kata sandi Gagal diubah.");
				}
			}else{
				$this->session->set_flashdata("error", "Kata sandi lama tidak cocok.");
			}
		}
		redirect("siswa/setting");
	}
}
