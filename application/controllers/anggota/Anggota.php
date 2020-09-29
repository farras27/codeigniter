<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("anggota_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('anggota/login'));
    }

    public function index()
    {
        $data["anggota"] = $this->anggota_model->getAll();
        $this->load->view("anggota/anggota/list", $data);
    }

    public function add()
    {
        $anggota = $this->anggota_model;
        $validation = $this->form_validation;
        $validation->set_rules($anggota->rules());

        if ($validation->run()) {
            $anggota->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("anggota/anggota/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('anggota/anggota');
       
        $anggota = $this->anggota_model;
        $validation = $this->form_validation;
        $validation->set_rules($anggota->rules());

        if ($validation->run()) {
            $anggota->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["anggota"] = $anggota->getById($id);
        if (!$data["anggota"]) show_404();
        
        $this->load->view("anggota/anggota/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->anggota_model->delete($id)) {
            redirect(site_url('anggota/anggota'));
        }
    }
}
