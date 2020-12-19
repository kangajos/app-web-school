<?php

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data["active"] = "home";
		$data["pages"] = "";
		$data["query"] = "";
		$this->load->view("layouts/frontend", $data);
	}
}
