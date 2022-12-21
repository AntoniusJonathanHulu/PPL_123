<?php

/**
 * Description of ModelDokumen
 * ini adalah model dokumen gereja
 *
 * @author Joko Yan Zai
 */
class ModelDokumen extends CI_Model
{
    var $table = 'dokumen_gereja';
    
    //Read all
    public function getData()
    {
//        return $this->db->get($this->table);
        return $this->db->query("SELECT * FROM $this->table ORDER BY id_dokumen DESC");
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
    
    // get detail
    public function detail_data($where)
    {
        return $this->db->get_where($this->table, $where);
    }
    
    //cari
    public function getKeyword($keyword)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->like('judul_dokumen', $keyword);
        $this->db->or_like('deskripsi_dokumen', $keyword);
        $this->db->or_like('url_dokumen', $keyword);
        return $this->db->get()->result();
    }
}
