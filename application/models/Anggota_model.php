<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_model extends CI_Model
{
    private $_table = "anggota";

    public $id_anggota;
    public $nik;
    public $nama;
    public $jabatan;

    public function rules()
    {
        return [
            ['field' => 'nik',
            'label' => 'Nik',
            'rules' => 'required'],

            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'jabatan',
            'label' => 'Jabatan',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_anggota" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_anggota = uniqid();
        $this->nik = $post["nik"];
		$this->nama = $post["nama"];
        $this->jabatan = $post["jabatan"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_anggota = $post["id"];
        $this->nik = $post["nik"];
        $this->nama = $post["nama"];
        $this->jabatan = $post["jabatan"];
        $this->db->update($this->_table, $this, array('id_anggota' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_anggota" => $id));
	}
	

}
