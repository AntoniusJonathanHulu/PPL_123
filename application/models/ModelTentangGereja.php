<?php

/**
 * Description of ModelTentangGereja
 *
 * @author Joko Yan Zai
 */
class ModelTentangGereja extends CI_Controller
{
    var $table = 'tentang_gereja';
    
    //Read all
    public function getData()
    {
        return $this->db->get($this->table);
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
        $this->db->like('visi', $keyword);
        $this->db->or_like('misi', $keyword);
        $this->db->or_like('jadwal_ibadah', $keyword);
        $this->db->or_like('alamat', $keyword);
        $this->db->or_like('google_map', $keyword);
        $this->db->or_like('kontak', $keyword);
        $this->db->or_like('profil_pendeta', $keyword);
        $this->db->or_like('sosmed_fb', $keyword);
        $this->db->or_like('sosmed_ig', $keyword);
        $this->db->or_like('logo_gereja', $keyword);
        $this->db->or_like('tema', $keyword);
        $this->db->or_like('sub_tema', $keyword);
        return $this->db->get()->result();
    }
}
