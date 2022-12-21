<?php

/**
 * Description of Dokumentasi
 * ini adalah controller dokumentasi
 *
 * @author Joko Yan Zai
 */
class Dokumentasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->model("ModelFotoDokumentasi");
        $this->load->model("ModelDokumentasi");
        if (!$this->auth_model->current_user())
        {
            redirect('auth/login');
        }
    }

    //Read all data
    public function index()
    {
        $data['dokumentasi'] = $this->ModelDokumentasi->getData()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dokumentasi/v_dokumentasi', $data);
        $this->load->view('templates/footer');
    }

    //Create data (insert)
    public function tambah()
    {
        $tglDokumentasi = $this->input->post('tgl_dokumentasi');
        $judulDokumentasi = $this->input->post('judul_dokumentasi');
        $deskripsiDokumentasi = $this->input->post('deskripsi_dokumentasi');

        $data = array(
            'tgl_dokumentasi' => $tglDokumentasi,
            'judul_dokumentasi' => $judulDokumentasi,
            'deskripsi_dokumentasi' => $deskripsiDokumentasi
        );

        $this->ModelDokumentasi->inputData($data);
        redirect('Dokumentasi/index');
    }

    //Delete
    public function hapus($idDokumentasi)
    {
        $where = array('id_dokumentasi' => $idDokumentasi);
        $fotoDokumentasi = $this->ModelFotoDokumentasi->getData($where)->result();
        
        foreach ($fotoDokumentasi as $fdkt)
        {
            $this->hapusFile($fdkt->url_foto); // panggil hapus file
        }
        
        $this->ModelDokumentasi->hapusData($where, 'dokumentasi');
        redirect('Dokumentasi/index');
    }
    
    public function hapusFile($namaFile)
    {
        unlink(FCPATH."/upload/foto/FotoDokumentasi/$namaFile");
    }

    //Update dan edit
    public function edit($idDokumentasi)
    {
        $where = array('id_dokumentasi' => $idDokumentasi);
        $data['dokumentasi'] = $this->ModelDokumentasi->editData($where)->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dokumentasi/v_edit_dokumentasi', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        
        $idDokumentasi = $this->input->post('id_dokumentasi');
        $tglDokumentasi = $this->input->post('tgl_dokumentasi');
        $judulDokumentasi = $this->input->post('judul_dokumentasi');
        $deskripsiDokumentasi = $this->input->post('deskripsi_dokumentasi');

        $data = array(
            'tgl_dokumentasi' => $tglDokumentasi,
            'judul_dokumentasi' => $judulDokumentasi,
            'deskripsi_dokumentasi' => $deskripsiDokumentasi
        );

        $where = ['id_dokumentasi' => $idDokumentasi];
        $this->ModelDokumentasi->updateData($where, $data);
        redirect('Dokumentasi/index');
    }

    public function detail($idDokumentasi)
    {
        $where = array('id_dokumentasi' => $idDokumentasi);
        $data['dokumentasi'] = $this->ModelDokumentasi->detailData($where)->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dokumentasi/v_detail_dokumentasi', $data);
        $this->load->view('templates/footer');
    }
    
    //cari
    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['dokumentasi'] = $this->ModelDokumentasi->getKeyword($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dokumentasi/v_dokumentasi', $data);
        $this->load->view('templates/footer');
    }
}
