<?php

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ($this->session->userdata("is_login") === true) {
			redirect("admin/dashboard");
		}
		$this->load->view("auth/index");
	}

	public function login_post()
	{
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$cek = $this->db->get_where("user", array("username" => $username))->row();
		if (!empty($cek)) {
			if (password_verify($password, $cek->password)) {
				$dataSessions = array(
					"is_login" => true,
					'user_id' => $cek->user_id,
					'username' => $cek->username,
					'level' => "admin",
				);
				$this->session->set_userdata($dataSessions);
				redirect("admin/dashboard");
			} else {
				$this->session->set_flashdata("message", "Password not match!");
			}
		} else {
			$this->session->set_flashdata("message", "Username not match!");
		}

		redirect("auth/");
	}

	public function out()
	{
		$this->session->sess_destroy();
		redirect("");
	}

	public function register()
	{
		$data["active"] = "register";
		$data["pages"] = "auth/register";
		$this->load->view("layouts/frontend", $data);
	}

	public function register_post()
	{
		$nis = strip_tags($this->input->post("nis"));
		$nama = strip_tags($this->input->post("nama"));
		$jk = strip_tags($this->input->post("jk"));
		$no_hp = strip_tags($this->input->post("no_hp"));
		$alamat = strip_tags($this->input->post("alamat"));
		$username = strip_tags($this->input->post("username"));
		$password = password_hash(strip_tags($this->input->post("password")), PASSWORD_DEFAULT);
		$params = array(
			"kelas_id" => 1,
			"nis" => $nis,
			"nama" => $nama,
			"jk" => $jk,
			"no_hp" => $no_hp,
			"alamat" => $alamat,
			"username" => $username,
			"password" => $password,
			"created_at" => date("Y-m-d")
		);
		$cek = $this->db->get_where("siswa", array("username" => $username))->row();
		if (!empty($cek)) {
			$this->session->set_flashdata("message", "Username yang Anda masukkan sudah terdaftar, harap gunakan yang lainnya");
			redirect("auth/register");
		}

		$cek = $this->db->get_where("siswa", array("nis" => $nis))->row();
		if (!empty($cek)) {
			$this->session->set_flashdata("message", "NIS yang Anda masukkan sudah terdaftar, silahkan gunaka yang lainnya");
			redirect("auth/register");
		}

		$save = $this->db->insert("siswa", $params);
		if ($save) {
			$this->session->set_flashdata("message", "Selamat!, Anda telah berhasil mendaftar sebagai siswa.<br>Silahkan login");
			redirect("auth/login");
		} else {
			$this->session->set_flashdata("message", "Anda Gagal mendaftar, silahkan isi form ini dengan benar");
			redirect("auth/register");
		}
	}

	public function login()
	{
		if ($this->session->userdata("is_login") === true && $this->session->userdata("level") ==  "siswa") {
			redirect("siswa/dashboard");
		}
		if ($this->session->userdata("is_login") === true && $this->session->userdata("level") ==  "admin") {
			redirect("admin/dashboard");
		}
		$data["active"] = "login";
		$data["pages"] = "auth/index";
		$this->load->view("layouts/frontend", $data);
	}

	public function login_siswa()
	{
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$cek = $this->db->get_where("siswa", array("username" => $username))->row();
		if (!empty($cek)) {
			if (password_verify($password, $cek->password)) {
				$dataSessions = array(
					"is_login" => true,
					'siswa_id' => $cek->siswa_id,
					'kelas_id' => $cek->kelas_id,
					'nis' => $cek->nis,
					'username' => $cek->username,
					'nama' => $cek->nama,
					'level' => "siswa"
				);
				$this->session->set_userdata($dataSessions);
				redirect("siswa/dashboard");
			} else {
				$this->session->set_flashdata("message", "Password salah!");
			}
		} else {
			$this->session->set_flashdata("message", "Username salah!");
		}

		redirect("auth/login");
	}
}
