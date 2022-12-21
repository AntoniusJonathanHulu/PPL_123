<?php

/**
 * Description of ModelWarta
 * ini model warta gereja
 * @author Joko Yan Zai
 */
class ModelWarta extends CI_Model
{
    var $table = 'warta_gereja';
    
    //Read all
    public function getData()
    {
//        return $this->db->get($this->table);
        return $this->db->query("SELECT * FROM $this->table ORDER BY id_warta DESC");
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
    
    //pagination
    public function getDataListCount()
    {
        $query = $this->getData();
        return $query->num_rows();
    }
    
    public function getDataList($limit = null, $offset = null)
    {
        if (!$limit && !$offset)
        {
            $query = $this->getData();
        } else
        {
            $query = $this->db->query("SELECT * FROM $this->table ORDER BY id_warta DESC LIMIT $limit OFFSET $offset");
        }
        
        return $query;
    }
}
