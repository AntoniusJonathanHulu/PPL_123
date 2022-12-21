<?php

/**
 * Description of ModelPetugasIbadah
 *
 * @author Joko Yan Zai
 */
class ModelPetugasIbadah extends CI_Model
{
    var $table = 'petugas_ibadah';
    
    //Read all
    public function getData()
    {
//        return $this->db->get($this->table);
        return $this->db->query("SELECT * FROM $this->table ORDER BY id_petugas_ibadah DESC");
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
    
    public function detailData($where)
    {
        return $this->db->get_where($this->table, $where);
    }
    
    //cari
    public function getKeyword($keyword)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->like('tgl_petugas_ibadah', $keyword);
        $this->db->or_like('pembawa_acara', $keyword);
        $this->db->or_like('singer', $keyword);
        $this->db->or_like('pemain_musik', $keyword);
        $this->db->or_like('doa_syafaat', $keyword);
        $this->db->or_like('pengkhotbah', $keyword);
        $this->db->or_like('operator_lcd', $keyword);
        return $this->db->get()->result();
    }
}
