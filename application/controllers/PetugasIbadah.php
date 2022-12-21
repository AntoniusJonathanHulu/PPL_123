<?php

/**
 * Description of PetugasIbadah
 *
 * @author Joko Yan Zai
 */
class PetugasIbadah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->model("ModelPetugasIbadah");
        if (!$this->auth_model->current_user())
        {
            redirect('auth/login');
        }
    }

    //Read all data
    public function index()
    {
        $data['petugas_ibadah'] = $this->ModelPetugasIbadah->getData()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('petugas_ibadah/v_petugas_ibadah', $data);
        $this->load->view('templates/footer');
    }

    //Create data (insert)
    public function tambah()
    {
        $tglPetugasIbadah = $this->input->post('tgl_petugas_ibadah');
        $pembawaAcara = $this->input->post('pembawa_acara');
        $singer = $this->input->post('singer');
        $pemainMusik = $this->input->post('pemain_musik');
        $doaSyafaat = $this->input->post('doa_syafaat');
        $pengkhotbah = $this->input->post('pengkhotbah');
        $operatorLCD = $this->input->post('operator_lcd');

        $data = array(
            'tgl_petugas_ibadah' => $tglPetugasIbadah,
            'pembawa_acara' => $pembawaAcara,
            'singer' => $singer,
            'pemain_musik' => $pemainMusik,
            'doa_syafaat' => $doaSyafaat,
            'pengkhotbah' => $pengkhotbah,
            'operator_lcd' => $operatorLCD
        );

        $this->ModelPetugasIbadah->inputData($data);
        redirect('PetugasIbadah/index');
    }

    //Delete
    public function hapus($idPetugasIbadah)
    {
        $where = array('id_petugas_ibadah' => $idPetugasIbadah);
        $this->ModelPetugasIbadah->hapusData($where, 'petugas_ibadah');
        redirect('PetugasIbadah/index');
    }

    //Update dan edit
    public function edit($idPetugasIbadah)
    {
        $where = array('id_petugas_ibadah' => $idPetugasIbadah);
        $data['petugas_ibadah'] = $this->ModelPetugasIbadah->editData($where)->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('petugas_ibadah/v_edit_petugas_ibadah', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $idPetugasIbadah = $this->input->post('id_petugas_ibadah');
        $tglPetugasIbadah = $this->input->post('tgl_petugas_ibadah');
        $pembawaAcara = $this->input->post('pembawa_acara');
        $singer = $this->input->post('singer');
        $pemainMusik = $this->input->post('pemain_musik');
        $doaSyafaat = $this->input->post('doa_syafaat');
        $pengkhotbah = $this->input->post('pengkhotbah');
        $operatorLCD = $this->input->post('operator_lcd');

        $data = array(
            'tgl_petugas_ibadah' => $tglPetugasIbadah,
            'pembawa_acara' => $pembawaAcara,
            'singer' => $singer,
            'pemain_musik' => $pemainMusik,
            'doa_syafaat' => $doaSyafaat,
            'pengkhotbah' => $pengkhotbah,
            'operator_lcd' => $operatorLCD
        );

        $where = ['id_petugas_ibadah' => $idPetugasIbadah];
        $this->ModelPetugasIbadah->updateData($where, $data);
        redirect('PetugasIbadah/index');
    }

    public function detail($idPetugasIbadah)
    {
        $where = array('id_petugas_ibadah' => $idPetugasIbadah);
        $data['petugas_ibadah'] = $this->ModelPetugasIbadah->detailData($where)->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('petugas_ibadah/v_detail_petugas_ibadah', $data);
        $this->load->view('templates/footer');
    }

    //cari
    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['petugas_ibadah'] = $this->ModelPetugasIbadah->getKeyword($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('petugas_ibadah/v_petugas_ibadah', $data);
        $this->load->view('templates/footer');
    }
}
