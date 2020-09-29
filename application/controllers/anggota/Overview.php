<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Overview extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('anggota/login'));
	}

	public function index()
	{
        // load view anggota/overview.php
        $this->load->view("anggota/overview");
	}
}
