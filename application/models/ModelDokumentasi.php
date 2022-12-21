<?php

/**
 * Description of ModelDokumentasi
 * ini adalah model dokumentasi
 *
 * @author Joko Yan Zai
 */
class ModelDokumentasi extends CI_Model
{
    var $table = 'dokumentasi';
    
    //Read all
    public function getData()
    {
//        return $this->db->get($this->table);
        return $this->db->query("SELECT * FROM $this->table ORDER BY id_dokumentasi DESC");
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
        $this->db->delete('foto_dokumentasi');
        
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
    
    public function detailData($where)
    {
        return $this->db->get_where($this->table, $where);
    }
    
        //cari
    public function getKeyword($keyword)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->like('tgl_dokumentasi', $keyword);
        $this->db->or_like('judul_dokumentasi', $keyword);
        $this->db->or_like('deskripsi_dokumentasi', $keyword);
        return $this->db->get()->result();
    }
}
