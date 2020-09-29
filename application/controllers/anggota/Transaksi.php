<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller
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
        $data["transaksi"] = $this->jabatan_model->getAll();
        $this->load->view("anggota/transaksi/list", $data);
    }

    public function add()
    {
        $transaksi = $this->transaksi_model;
        $validation = $this->form_validation;
        $validation->set_rules($transaksi->rules());

        if ($validation->run()) {
            $transaksi->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("anggota/transaksi/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('anggota/transaksi');
       
        $transaksi = $this->transaksi_model;
        $validation = $this->form_validation;
        $validation->set_rules($transaksi->rules());

        if ($validation->run()) {
            $transaksi->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["transaksi"] = $transaksi->getById($id);
        if (!$data["transaksi"]) show_404();
        
        $this->load->view("anggota/transaksi/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->transaksi_model->delete($id)) {
            redirect(site_url('anggota/transaksi'));
        }
    }
}
