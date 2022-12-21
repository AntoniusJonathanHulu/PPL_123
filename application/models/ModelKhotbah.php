<?php

/**
 * Description of ModelKhotbah
 * ini adalah model khotbah/renungan
 * 
 * @author Joko Yan Zai
 */
class ModelKhotbah extends CI_Controller
{
    var $table = 'khotbah';
    
    //Read all
    public function getData()
    {
//        return $this->db->get($this->table);
        return $this->db->query("SELECT * FROM $this->table ORDER BY id_khotbah DESC");
    }
    
    //Create data (input)
    public function inputData($data)
    {
        $this->db->insert($this->table, $data);
    }
    
    //Delete data
    public function hapusData($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    
    //Update dan edit data
    public function editData($where)
    {
        return $this->db->get_where($this->table, $where);
    }
    
    public function updateData($where, $data)
    {
        $this->db->where($where);
        $this->db->update($this->table, $data);
    }
    
    //get data untuk halaman detail
    public function detailData($where)
    {
        return $this->db->get_where($this->table, $where);
    }
    
    //cari
    public function getKeyword($keyword)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->like('tgl_khotbah', $keyword);
        $this->db->or_like('judul_khotbah', $keyword);
        $this->db->or_like('ayat_khotbah', $keyword);
        $this->db->or_like('isi_khotbah', $keyword);
        $this->db->or_like('url_foto', $keyword);
        return $this->db->get()->result();
    }
}
