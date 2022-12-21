<?php

/**
 * Description of DokumenGereja
 * ini controller dokumen gereja.
 * 
 * @author Joko Yan Zai
 */
class DokumenGereja extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->model("ModelDokumen");
        if (!$this->auth_model->current_user())
        {
            redirect('auth/login');
        }
    }

    //Read all data
    public function index()
    {
        $data['dokumen'] = $this->ModelDokumen->getData()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dokumen/v_dokumen', $data);
        $this->load->view('templates/footer');
    }

    //Create data (insert)
    public function tambah()
    {
        $config['upload_path'] = './upload/dokumen/';
        $config['allowed_types'] = 'pdf|docx|doc|html|';
        $config['overwrite'] = true;
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('url_dokumen'))
        {
            $urlDokumen = $this->input->post('url_dokumen');
        } else
        {
            $urlDokumen = $this->upload->data('file_name');
        }
        $judulDokumen = $this->input->post('judul_dokumen');
        $deskripsiDokumen = $this->input->post('deskripsi_dokumen');

        $data = array(
            'judul_dokumen' => $judulDokumen,
            'deskripsi_dokumen' => $deskripsiDokumen,
            'url_dokumen' => $urlDokumen
        );

        $this->ModelDokumen->inputData($data);
        redirect('DokumenGereja/index');
    }

    //Delete
    public function hapus($id_dokumen)
    {
        $where = array('id_dokumen' => $id_dokumen);
        $getData = $this->ModelDokumen->editData($where)->row();
        $namaFile = $getData->url_dokumen;
        $this->hapusFile($namaFile); // panggil hapus file

        $this->ModelDokumen->hapusData($where, 'dokumen_gereja');
        redirect('DokumenGereja/index');
    }

    //Update dan edit
    public function edit($idDokumen)
    {
        $where = array('id_dokumen' => $idDokumen);
        $data['dokumen'] = $this->ModelDokumen->editData($where)->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dokumen/v_edit_dokumen', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $config['upload_path'] = './upload/dokumen/';
        $config['allowed_types'] = 'pdf|docx|doc|html|';
        $config['overwrite'] = true;
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('url_dokumen'))
        {
            $urlDokumen = $this->input->post('prev_data');
        } else
        {
            $urlDokumen = $this->upload->data('file_name');
        }
        $idDokumen = $this->input->post('id_dokumen');
        $judulDokumen = $this->input->post('judul_dokumen');
        $deskripsiDokumen = $this->input->post('deskripsi_dokumen');

        $data = array(
            'judul_dokumen' => $judulDokumen,
            'deskripsi_dokumen' => $deskripsiDokumen,
            'url_dokumen' => $urlDokumen
        );

        $where = ['id_dokumen' => $idDokumen];
        $this->ModelDokumen->updateData($where, $data);
        redirect('DokumenGereja/index');
    }

    public function hapusFile($namaFile)
    {
        unlink(FCPATH . "/upload/dokumen/$namaFile");
    }

    public function hapusDokumen($idDokumen, $urlDokumen = null)
    {
        if (!isset($urlDokumen))
        {
            echo "File yang tidak ada tidak bisa dihapus, klik tombol kembali pada browser anda";
        } else
        {
            //get data
            $where = array('id_dokumen' => $idDokumen);

            //hapus file
            $this->hapusFile($urlDokumen);

            //set data null
            $data = array(
                'url_dokumen' => null
            );

            //update
            $this->ModelDokumen->updateData($where, $data);
            redirect("DokumenGereja/edit/$idDokumen");
        }
    }

    // untuk halaman detail
    public function detail($idDokumen)
    {
        $where = array('id_dokumen' => $idDokumen);
        $data['dokumen'] = $this->ModelDokumen->detail_data($where)->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dokumen/v_detail_dokumen', $data);
        $this->load->view('templates/footer');
    }

    //cari
    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['dokumen'] = $this->ModelDokumen->getKeyword($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dokumen/v_dokumen', $data);
        $this->load->view('templates/footer');
    }

}
