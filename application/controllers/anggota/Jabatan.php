<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("jabatan_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('anggota/login'));
    }

    public function index()
    {
        $data["jabatan"] = $this->jabatan_model->getAll();
        $this->load->view("anggota/jabatan/list", $data);
    }

    public function add()
    {
        $jabatan = $this->jabatan_model;
        $validation = $this->form_validation;
        $validation->set_rules($jabatan->rules());

        if ($validation->run()) {
            $jabatan->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("anggota/jabatan/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('anggota/jabatan');
       
        $jabatan = $this->jabatan_model;
        $validation = $this->form_validation;
        $validation->set_rules($jabatan->rules());

        if ($validation->run()) {
            $jabatan->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["jabatan"] = $jabatan->getById($id);
        if (!$data["jabatan"]) show_404();
        
        $this->load->view("anggota/jabatan/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->jabatan_model->delete($id)) {
            redirect(site_url('anggota/jabatan'));
        }
    }
}
