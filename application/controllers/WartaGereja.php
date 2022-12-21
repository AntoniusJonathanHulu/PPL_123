<?php

/**
 * ini adalah controller warta gereja
 * 
 * @author Joko Yan Zai
 */
class WartaGereja extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->model("ModelWarta");
        if (!$this->auth_model->current_user())
        {
            redirect('auth/login');
        }

        $config['upload_path'] = './upload/foto/WartaGereja/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|webp';
        $config['overwrite'] = true;
        $this->upload->initialize($config);
    }

    //Read all data
    public function index()
    {
        $data['warta'] = $this->ModelWarta->getData()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('warta/v_warta', $data);
        $this->load->view('templates/footer');
    }

    //Create data (insert)
    public function tambah()
    {
        if (!$this->upload->do_upload('url_dokumen'))
        {
            $urlDokumen = $this->input->post('url_dokumen');
        } else
        {
            $urlDokumen = $this->upload->data('file_name');
        }
        $tglWarta = $this->input->post('tgl_warta');
        $judulWarta = $this->input->post('judul_warta');
        $isiWarta = $this->input->post('isi_warta');

        $data = array(
            'tgl_warta' => $tglWarta,
            'judul_warta' => $judulWarta,
            'isi_warta' => $isiWarta,
            'url_dokumen' => $urlDokumen
        );

        $this->ModelWarta->inputData($data);
        redirect('WartaGereja/index');
    }

    //Delete
    public function hapus($idWarta)
    {
        $where = array('id_warta' => $idWarta);
        $getData = $this->ModelWarta->editData($where)->row();
        $namaFile = $getData->url_dokumen;
        $this->hapusFile($namaFile); // panggil hapus file

        $this->ModelWarta->hapusData($where, 'warta_gereja'); // hapus data di db
        redirect('WartaGereja/index');
    }

    //Update dan edit
    public function edit($idWarta)
    {
        $where = array('id_warta' => $idWarta);
        $data['warta'] = $this->ModelWarta->editData($where)->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('warta/v_edit_warta', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        if (!$this->upload->do_upload('url_dokumen'))
        {
            $urlDokumen = $this->input->post('prev_data');
        } else
        {
            $urlDokumen = $this->upload->data('file_name');
        }
        $idWarta = $this->input->post('id_warta');
        $tglWarta = $this->input->post('tgl_warta');
        $judulWarta = $this->input->post('judul_warta');
        $isiWarta = $this->input->post('isi_warta');

        $data = array(
            'tgl_warta' => $tglWarta,
            'judul_warta' => $judulWarta,
            'isi_warta' => $isiWarta,
            'url_dokumen' => $urlDokumen
        );

        $where = ['id_warta' => $idWarta];
        $this->ModelWarta->updateData($where, $data);
        redirect('WartaGereja/index');
    }

    public function hapusFile($namaFile)
    {
        unlink(FCPATH . "/upload/foto/WartaGereja/$namaFile");
    }

    public function hapusGambar($idWarta, $urlDokumen = null)
    {
        if (!isset($urlDokumen))
        {
            echo "File yang tidak ada tidak bisa dihapus, klik tombol kembali pada browser anda";
        } else
        {
            //get data
            $where = array('id_warta' => $idWarta);

            //hapus file
            $this->hapusFile($urlDokumen);

            //set data null
            $data = array(
                'url_dokumen' => null
            );

            //update
            $this->ModelWarta->updateData($where, $data);
            redirect("WartaGereja/edit/$idWarta");
        }
    }

    public function detail($idWarta)
    {
        $where = array('id_warta' => $idWarta);
        $data['warta'] = $this->ModelWarta->detailData($where)->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('warta/v_detail_warta', $data);
        $this->load->view('templates/footer');
    }

    //cari
    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['warta'] = $this->ModelWarta->getKeyword($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('warta/v_warta', $data);
        $this->load->view('templates/footer');
    }

}
