<?php

/**
 * Description of User
 *
 * @author Joko Yan Zai
 */
class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->model("ModelUser");
        if (!$this->auth_model->current_user())
        {
            redirect('auth/login');
        }

        $config['upload_path'] = './upload/foto/User/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|webp';
        $config['overwrite'] = true;
        $this->upload->initialize($config);
    }

    //Read all data
    public function index()
    {
        $data['user'] = $this->ModelUser->getData()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('user/v_user', $data);
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
        $tglUser = $this->input->post('tgl_user');
        $judulUser = $this->input->post('judul_user');
        $isiUser = $this->input->post('isi_user');

        $data = array(
            'tgl_user' => $tglUser,
            'judul_user' => $judulUser,
            'isi_user' => $isiUser,
            'url_dokumen' => $urlDokumen
        );

        $this->ModelUser->inputData($data);
        redirect('User/index');
    }

    //Delete
    public function hapus($idUser)
    {
        $where = array('id_user' => $idUser);
        $this->ModelUser->hapusData($where, 'user');
        redirect('User/index');
    }

    //Update dan edit
    public function edit($idUser)
    {
        $where = array('id' => $idUser);
        $data['user'] = $this->ModelUser->editData($where)->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('user/v_edit_user', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        if (!$this->upload->do_upload('avatar'))
        {
            $avatar = $this->input->post('prev_data');
        } else
        {
            $avatar = $this->upload->data('file_name');
        }
        $idUser = $this->input->post('id');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $userName = $this->input->post('username');
        $password = $this->input->post('password');

        $data = array(
            'name' => $name,
            'email' => $email,
            'username' => $userName,
            'password' => $password,
            'avatar' => $avatar
        );

        $where = ['id' => $idUser];
        $this->ModelUser->updateData($where, $data);
        redirect("User/detail/$idUser");
    }
    
    public function hapusFile($idUser)
    {
        //get data
        $where = array('id' => $idUser);
        $getData = $this->ModelUser->editData($where)->row();
        
        //hapus file
        unlink(FCPATH."/upload/foto/User/$getData->avatar");
        
        //set data null
        $data = array(
            'avatar' => null
        );
        
        //update
        $this->ModelUser->updateData($where, $data);
        redirect("User/edit/$idUser");
    }

    public function detail($idUser)
    {
        $where = array('id' => $idUser);
        $data['user'] = $this->ModelUser->detailData($where)->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('user/v_detail_user', $data);
        $this->load->view('templates/footer');
    }

    //cari
    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['user'] = $this->ModelUser->getKeyword($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('user/v_user', $data);
        $this->load->view('templates/footer');
    }
}
