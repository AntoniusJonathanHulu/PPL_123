<?php

/**
 * Description of ModelFotoDokumentasi
 * sesuai deskripsi
 *
 * @author Joko Yan Zai
 */
class ModelFotoDokumentasi extends CI_Model
{
    var $table = 'foto_dokumentasi';
    
    //Read all
    public function getData($where)
    {
        return $this->db->get_where($this->table, $where);
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
    
    public function detail_data($where)
    {
        return $this->db->get_where($this->table, $where);
    }
    
    //cari
    public function getKeyword($keyword)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->like('url_foto', $keyword);
        $this->db->or_like('id_dokumentasi', $keyword);
        return $this->db->get()->result();
    }
}
