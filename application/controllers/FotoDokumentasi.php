<?php

/**
 * Description of FotoDokumentasi
 * ini adalah controler untuk foto dokumentasi
 *
 * @author Joko Yan Zai
 */
class FotoDokumentasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->model("ModelFotoDokumentasi");
        $this->load->model('ModelDokumentasi');
        if (!$this->auth_model->current_user())
        {
            redirect('auth/login');
        }
        
        $config['upload_path'] = './upload/foto/FotoDokumentasi/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|webp';
        $config['overwrite'] = true;
        $this->upload->initialize($config);
    }

    //Read all data
    public function index($idDokumentasi)
    {
        $where = array('id_dokumentasi' => $idDokumentasi);
        $data['dokumentasi'] = $this->ModelDokumentasi->detailData($where)->result();
        $data['foto_dokumentasi'] = $this->ModelFotoDokumentasi->getData($where)->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('foto_dokumentasi/v_foto_dokumentasi', $data);
        $this->load->view('templates/footer');
    }

    //Create data (insert)
    public function tambah($idDokumentasi)
    {
        if (!$this->upload->do_upload('url_foto'))
        {
            echo 'upload gagal';
            exit();
//            $urlFoto = $this->input->post('url_foto');
        }
        else
        {
            $urlFoto = $this->upload->data('file_name');
        }
        
        $data = array(
            'url_foto' => $urlFoto,
            'id_dokumentasi' => $idDokumentasi
        );

        $this->ModelFotoDokumentasi->inputData($data);
        redirect("FotoDokumentasi/index/$idDokumentasi");
    }

    //Delete
    public function hapus($idFoto, $idDokumentasi)
    {
        $where = array('id_foto' => $idFoto);
        $getData = $this->ModelFotoDokumentasi->editData($where)->row();
        
        //hapus file
        unlink(FCPATH."/upload/foto/FotoDokumentasi/$getData->url_foto");
        
        $this->ModelFotoDokumentasi->hapusData($where, 'foto_dokumentasi');
        redirect("FotoDokumentasi/index/$idDokumentasi");
    }

//    //Update dan edit
//    public function edit($idFotoDokumentasi)
//    {
//        $where = array('id_foto_dokumentasi' => $idFotoDokumentasi);
//        $data['foto_dokumentasi'] = $this->ModelFotoDokumentasi->editData($where)->result();
//        $this->load->view('templates/header');
//        $this->load->view('templates/sidebar');
//        $this->load->view('foto_dokumentasi/v_edit_foto_dokumentasi', $data);
//        $this->load->view('templates/footer');
//    }
//
//    public function update()
//    {
//        if (!$this->upload->do_upload('url_foto'))
//        {
//            $urlFoto = $this->input->post('url_foto');
//        }
//        else
//        {
//            $urlFoto = $this->upload->data('file_name');
//        }
//        $idFotoDokumentasi = $this->input->post('id_foto_dokumentasi');
//        $tglFotoDokumentasi = $this->input->post('tgl_foto_dokumentasi');
//        $judulFotoDokumentasi = $this->input->post('judul_foto_dokumentasi');
//        $isiFotoDokumentasi = $this->input->post('isi_foto_dokumentasi');
//
//        $data = array(
//            'tgl_foto_dokumentasi' => $tglFotoDokumentasi,
//            'judul_foto_dokumentasi' => $judulFotoDokumentasi,
//            'isi_foto_dokumentasi' => $isiFotoDokumentasi,
//            'url_foto' => $urlFoto
//        );
//
//        $where = ['id_foto_dokumentasi' => $idFotoDokumentasi];
//        $this->ModelFotoDokumentasi->updateData($where, $data);
//        redirect('FotoDokumentasiGereja/index');
//    }

    public function detail($idFoto)
    {
        $where = array('id_foto' => $idFoto);
        $data['foto_dokumentasi'] = $this->ModelFotoDokumentasi->detail_data($where)->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('foto_dokumentasi/v_detail_foto_dokumentasi', $data);
        $this->load->view('templates/footer');
    }
    
    //cari
    public function search($idDokumentasi)
    {
        $where = array('id_dokumentasi' => $idDokumentasi);
        $data['dokumentasi'] = $this->ModelDokumentasi->detailData($where)->result();
        $keyword = $this->input->post('keyword');
        $data['foto_dokumentasi'] = $this->ModelFotoDokumentasi->getKeyword($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('foto_dokumentasi/v_foto_dokumentasi', $data);
        $this->load->view('templates/footer');
    }
}
