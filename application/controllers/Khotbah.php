<?php

/**
 * ini adalah controller tabel khotbah/renungan
 *
 * @author Joko Yan Zai
 */
class Khotbah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->model("ModelKhotbah");
        if (!$this->auth_model->current_user())
        {
            redirect('auth/login');
        }
    }

    //Read all data
    public function index()
    {
        $data['khotbah'] = $this->ModelKhotbah->getData()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('khotbah/v_khotbah', $data);
        $this->load->view('templates/footer');
    }

    //Create data (insert)
    public function tambah()
    {
        $config['upload_path'] = './upload/foto/Khotbah/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|webp';
        $config['overwrite'] = true;
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('url_foto'))
        {
            $urlFoto = $this->input->post('url_foto');
        } else
        {
            $urlFoto = $this->upload->data('file_name');
        }
        $tglKhotbah = $this->input->post('tgl_khotbah');
        $judulKhotbah = $this->input->post('judul_khotbah');
        $ayatKhotbah = $this->input->post('ayat_khotbah');
        $isiKhotbah = $this->input->post('isi_khotbah');

        $data = array(
            'tgl_khotbah' => $tglKhotbah,
            'judul_khotbah' => $judulKhotbah,
            'ayat_khotbah' => $ayatKhotbah,
            'isi_khotbah' => $isiKhotbah,
            'url_foto' => $urlFoto,
        );

        $this->ModelKhotbah->inputData($data);
        redirect('Khotbah/index');
    }

    //Delete
    public function hapus($id_khotbah)
    {
        $where = array('id_khotbah' => $id_khotbah);
        $getData = $this->ModelKhotbah->editData($where)->row();
        $namaFile = $getData->url_foto;
        $this->hapusFile($namaFile); // panggil hapus file

        $this->ModelKhotbah->hapusData($where, 'khotbah');
        redirect('Khotbah/index');
    }

    //Update dan edit
    public function edit($idKhotbah)
    {
        $where = array('id_khotbah' => $idKhotbah);
        $data['khotbah'] = $this->ModelKhotbah->editData($where)->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('khotbah/v_edit_khotbah', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $config['upload_path'] = './upload/foto/Khotbah/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|webp';
        $config['overwrite'] = true;
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('url_foto'))
        {
            $urlFoto = $this->input->post('prev_data');
        } else
        {
            $urlFoto = $this->upload->data('file_name');
        }
        $idKhotbah = $this->input->post('id_khotbah');
        $tglKhotbah = $this->input->post('tgl_khotbah');
        $judulKhotbah = $this->input->post('judul_khotbah');
        $ayatKhotbah = $this->input->post('ayat_khotbah');
        $isiKhotbah = $this->input->post('isi_khotbah');

        $data = array(
            'tgl_khotbah' => $tglKhotbah,
            'judul_khotbah' => $judulKhotbah,
            'ayat_khotbah' => $ayatKhotbah,
            'isi_khotbah' => $isiKhotbah,
            'url_foto' => $urlFoto,
        );

        $where = ['id_khotbah' => $idKhotbah];
        $this->ModelKhotbah->updateData($where, $data);
        redirect('Khotbah/index');
    }

    public function hapusFile($namaFile)
    {
        unlink(FCPATH . "/upload/foto/Khotbah/$namaFile");
    }

    public function hapusGambar($idKhotbah, $urlFoto = null)
    {
        if (!isset($urlFoto))
        {
            echo "File yang tidak ada tidak bisa dihapus, klik tombol kembali pada browser anda";
        } else
        {
            //get data
            $where = array('id_khotbah' => $idKhotbah);

            //hapus file
            $this->hapusFile($urlFoto);

            //set data null
            $data = array(
                'url_foto' => null
            );

            //update
            $this->ModelKhotbah->updateData($where, $data);
            redirect("Khotbah/edit/$idKhotbah");
        }
    }

    public function detail($idKhotbah)
    {
        $where = array('id_khotbah' => $idKhotbah);
        $data['khotbah'] = $this->ModelKhotbah->detailData($where)->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('khotbah/v_detail_khotbah', $data);
        $this->load->view('templates/footer');
    }

    //cari
    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['khotbah'] = $this->ModelKhotbah->getKeyword($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('khotbah/v_khotbah', $data);
        $this->load->view('templates/footer');
    }

}
