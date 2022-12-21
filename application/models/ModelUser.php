<?php

/**
 * Description of ModelUser
 *
 * @author Joko Yan Zai
 */
class ModelUser extends CI_Model
{
    var $table = 'user';
    
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
        $this->db->like('tgl_warta', $keyword);
        $this->db->or_like('judul_warta', $keyword);
        $this->db->or_like('isi_warta', $keyword);
        $this->db->or_like('url_dokumen', $keyword);
        return $this->db->get()->result();
    }
}
