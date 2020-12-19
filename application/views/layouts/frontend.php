<?php
$this->load->view("partials/frontend/head");
$this->load->view("partials/frontend/navbar");
if (!empty($pages)){
	$this->load->view("pages/frontend/".$pages);
}else{
	$this->load->view("pages/frontend/carousel/index");
	$this->load->view("pages/frontend/brochure/index");
}
$this->load->view("partials/frontend/footer");
