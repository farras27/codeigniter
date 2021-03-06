<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    private $_table = "transaksi";

    public $id_transaksi;
    public $tanggal;
    public $debet;
    public $kredit;
    public $saldo;

    public function rules()
    {
        return [
            ['field' => 'tanggal',
            'label' => 'Tanggal',
            'rules' => 'required'],

            ['field' => 'kode',
            'label' => 'Kode',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_jabatan" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_jabatan = uniqid();
        $this->jabatan = $post["jabatan"];
		$this->kode = $post["kode"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_jabatan = $post["id"];
        $this->jabatan = $post["jabatan"];
        $this->kode = $post["kode"];
        $this->db->update($this->_table, $this, array('id_jabatan' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_jabatan" => $id));
	}
	

}
