<?php

/**
 * Description of TentangGereja
 *
 * @author Joko Yan Zai
 */
class TentangGereja extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->model("ModelTentangGereja");
        if (!$this->auth_model->current_user())
        {
            redirect('auth/login');
        }

        $config['upload_path'] = './upload/foto/TentangGereja';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|webp';
        $config['overwrite'] = true;
        $this->upload->initialize($config);
    }

    //Read all data
    public function index()
    {
        $data['tentang'] = $this->ModelTentangGereja->getData()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('tentang/v_tentang_gereja', $data);
        $this->load->view('templates/footer');
    }

    //Create data (insert)
    public function tambah()
    {
        $namaGereja = $this->input->post('nama_gereja'); // <-------
        $namaLengkapGereja = $this->input->post('nama_lengkap_gereja'); // <----
        $visi = $this->input->post('visi');
        $misi = $this->input->post('misi');
        $jadwalIbadah = $this->input->post('jadwal_ibadah');
        $alamat = $this->input->post('alamat');
        $googleMap = $this->input->post('google_map');
        $kontak = $this->input->post('kontak');
        $profilPendeta = $this->input->post('profil_pendeta');

        if (!$this->upload->do_upload('foto_pendeta')) //<--------
        {
            $fotoPendeta = $this->input->post('foto_pendeta');
        } else
        {
            $fotoPendeta = $this->upload->data('file_name');
        }

        $sosmedFB = $this->input->post('sosmed_fb');
        $sosmedIG = $this->input->post('sosmed_ig');
        if (!$this->upload->do_upload('logo_gereja'))
        {
            $logoGereja = $this->input->post('logo_gereja');
        } else
        {
            $logoGereja = $this->upload->data('file_name');
        }

        if (!$this->upload->do_upload('wallpaper_homepage')) //<--------------
        {
            $wallpaperHomepage = $this->input->post('wallpaper_homepage');
        } else
        {
            $wallpaperHomepage = $this->upload->data('file_name');
        }

        $tema = $this->input->post('tema');
        $subTema = $this->input->post('sub_tema');

        $data = array(
            'nama_gereja' => $namaGereja, // <------------
            'nama_lengkap_gereja' => $namaLengkapGereja, // <--------------
            'visi' => $visi,
            'misi' => $misi,
            'jadwal_ibadah' => $jadwalIbadah,
            'alamat' => $alamat,
            'google_map' => $googleMap,
            'kontak' => $kontak,
            'profil_pendeta' => $profilPendeta,
            'foto_pendeta' => $fotoPendeta, // <-------------------------
            'sosmed_fb' => $sosmedFB,
            'sosmed_ig' => $sosmedIG,
            'logo_gereja' => $logoGereja,
            'wallpaper_homepage' => $wallpaperHomepage, // <-----------------
            'tema' => $tema,
            'sub_tema' => $subTema
        );

        $this->ModelTentangGereja->inputData($data);
        redirect('TentangGereja/index');
    }

    //Delete
    public function hapus($idTentang)
    {
        if ($idTentang == 1)
        {
            redirect('TentangGereja/index');
        } else
        {
            $where = array('id_tentang' => $idTentang);
            $this->ModelTentangGereja->hapusData($where, 'tentang_gereja');
            redirect('TentangGereja/index');
        }
    }

    //Update dan edit
    public function edit($idTentang)
    {
        $where = array('id_tentang' => $idTentang);
        $data['tentang'] = $this->ModelTentangGereja->editData($where)->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('tentang/v_edit_tentang_gereja', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $idTentang = $this->input->post('id_tentang');
        $namaGereja = $this->input->post('nama_gereja'); // <-------
        $namaLengkapGereja = $this->input->post('nama_lengkap_gereja'); // <----
        $visi = $this->input->post('visi');
        $misi = $this->input->post('misi');
        $jadwalIbadah = $this->input->post('jadwal_ibadah');
        $alamat = $this->input->post('alamat');
        $googleMap = $this->input->post('google_map');
        $kontak = $this->input->post('kontak');
        $profilPendeta = $this->input->post('profil_pendeta');

        if (!$this->upload->do_upload('foto_pendeta')) //<--------
        {
            $fotoPendeta = $this->input->post('prev_foto_pendeta');
        } else
        {
            $fotoPendeta = $this->upload->data('file_name');
        }

        $sosmedFB = $this->input->post('sosmed_fb');
        $sosmedIG = $this->input->post('sosmed_ig');
        if (!$this->upload->do_upload('logo_gereja'))
        {
            $logoGereja = $this->input->post('prev_logo');
        } else
        {
            $logoGereja = $this->upload->data('file_name');
        }

        if (!$this->upload->do_upload('wallpaper_homepage')) //<--------------
        {
            $wallpaperHomepage = $this->input->post('prev_wallpaper');
        } else
        {
            $wallpaperHomepage = $this->upload->data('file_name');
        }

        $tema = $this->input->post('tema');
        $subTema = $this->input->post('sub_tema');

        $data = array(
            'nama_gereja' => $namaGereja, // <------------
            'nama_lengkap_gereja' => $namaLengkapGereja, // <--------------
            'visi' => $visi,
            'misi' => $misi,
            'jadwal_ibadah' => $jadwalIbadah,
            'alamat' => $alamat,
            'google_map' => $googleMap,
            'kontak' => $kontak,
            'profil_pendeta' => $profilPendeta,
            'foto_pendeta' => $fotoPendeta, // <-------------------------
            'sosmed_fb' => $sosmedFB,
            'sosmed_ig' => $sosmedIG,
            'logo_gereja' => $logoGereja,
            'wallpaper_homepage' => $wallpaperHomepage, // <-----------------
            'tema' => $tema,
            'sub_tema' => $subTema
        );

        $where = ['id_tentang' => $idTentang];
        $this->ModelTentangGereja->updateData($where, $data);
        redirect("TentangGereja/detail/$idTentang");
    }

    public function hapusFile($namaFile)
    {
        unlink(FCPATH . "/upload/foto/TentangGereja/$namaFile");
    }

    public function hapusLogo($idTentang, $logoGereja = null)
    {
        if (!isset($logoGereja))
        {
            echo "File yang tidak ada tidak bisa dihapus, klik tombol kembali pada browser anda";
        } else
        {
            //get data
            $where = array('id_tentang' => $idTentang);

            //hapus file
            $this->hapusFile($logoGereja);

            //set data null
            $data = array(
                'logo_gereja' => null
            );

            //update
            $this->ModelTentangGereja->updateData($where, $data);
            redirect("TentangGereja/edit/$idTentang");
        }
    }

    public function hapusFotoPendeta($idTentang, $fotoPendeta = null)
    {
        if (!isset($fotoPendeta))
        {
            echo "File yang tidak ada tidak bisa dihapus, klik tombol kembali pada browser anda";
        } else
        {
            //get data
            $where = array('id_tentang' => $idTentang);

            //hapus file
            $this->hapusFile($fotoPendeta);

            //set data null
            $data = array(
                'foto_pendeta' => null
            );

            //update
            $this->ModelTentangGereja->updateData($where, $data);
            redirect("TentangGereja/edit/$idTentang");
        }
    }

    public function hapusWallpaperHomepage($idTentang, $wallpaperHomepage = null)
    {
        if (!isset($wallpaperHomepage))
        {
            echo "File yang tidak ada tidak bisa dihapus, klik tombol kembali pada browser anda";
        } else
        {
            //get data
            $where = array('id_tentang' => $idTentang);

            //hapus file
            $this->hapusFile($wallpaperHomepage);

            //set data null
            $data = array(
                'wallpaper_homepage' => null
            );

            //update
            $this->ModelTentangGereja->updateData($where, $data);
            redirect("TentangGereja/edit/$idTentang");
        }
    }

    public function detail($idTentang)
    {
        $where = array('id_tentang' => $idTentang);
        $data['tentang'] = $this->ModelTentangGereja->detailData($where)->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('tentang/v_detail_tentang_gereja', $data);
        $this->load->view('templates/footer');
    }

    //cari
    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['tentang'] = $this->ModelTentangGereja->getKeyword($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('tentang/v_tentang_gereja', $data);
        $this->load->view('templates/footer');
    }

}
