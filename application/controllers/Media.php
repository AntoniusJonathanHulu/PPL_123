<?php

/**
 * Description of Media
 *
 * @author Joko Yan Zai
 */
class Media extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("ModelWarta");
        $this->load->model("ModelPetugasIbadah");
        $this->load->model("ModelDokumentasi");
        $this->load->model("ModelFotoDokumentasi");
        $this->load->model("ModelDokumen");
        $this->load->model("ModelKhotbah");
    }
    
    //-----------------------warta dan berita-----------------------------------
    public function listWarta()
    {
        $data['warta'] = $this->ModelWarta->getData()->result();
        $data['petugas_ibadah'] = $this->ModelPetugasIbadah->getData()->result();
        $this->load->view('media/m_warta/v_m_warta_list', $data);
    }
    
    public function detailWarta($idWarta)
    {
        $where = array('id_warta' => $idWarta);
        $data['warta'] = $this->ModelWarta->detailData($where)->result();
        $this->load->view('media/m_warta/v_m_warta_detail', $data);
    }
    
    public function detailPetugas($idPetugasIbadah)
    {
        $where = array('id_petugas_ibadah' => $idPetugasIbadah);
        $data['petugas_ibadah'] = $this->ModelPetugasIbadah->detailData($where)->result();
        $this->load->view('media/m_warta/v_m_petugas_detail', $data);
    }
    
    //-----------------------khotbah--------------------------------------------
    public function listKhotbah()
    {
        $data['khotbah'] = $this->ModelKhotbah->getData()->result();
        $this->load->view('media/m_khotbah/v_m_khotbah_list', $data);
    }
    
    public function detailKhotbah($idKhotbah)
    {
        $where = array('id_khotbah' => $idKhotbah);
        $data['khotbah'] = $this->ModelKhotbah->detailData($where)->result();
        $this->load->view('media/m_khotbah/v_m_khotbah_detail', $data);
    }
    
    //-----------------------dokumentasi----------------------------------------
    public function listDokumentasi()
    {
        $data['dokumentasi'] = $this->ModelDokumentasi->getData()->result();
        $this->load->view('media/m_dokumentasi/v_m_dokumentasi_list', $data);
    }
    
    public function detailDokumentasi($idDokumentasi)
    {
        $where = array('id_dokumentasi' => $idDokumentasi);
        $data['dokumentasi'] = $this->ModelDokumentasi->detailData($where)->result();
        $data['foto_dokumentasi'] = $this->ModelFotoDokumentasi->getData($where)->result();
        $this->load->view('media/m_dokumentasi/v_m_dokumentasi_detail', $data);
    }
    
    //--------------------dokumen-----------------------------------------------
    public function listDokumen()
    {
        $data['dokumen'] = $this->ModelDokumen->getData()->result();
        $this->load->view('media/m_dokumen/v_m_dokumen_list', $data);
    }
}
