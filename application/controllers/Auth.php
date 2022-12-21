<?php

/**
 * Description of Auth
 * ini adalah controller otentikasi
 *
 * @author Joko Yan Zai
 */
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("session");
    }

    public function index()
    {
        show_404();
    }

    public function login()
    {
        $this->load->model('auth_model');
        $this->load->library('form_validation');

        $rules = $this->auth_model->rules();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE)
        {
            return $this->load->view('login/v_login_form'); // <------
        }

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($this->auth_model->login($username, $password))
        {
            echo 'login berhasil';
            redirect('admin'); // login ke admin dashboard
        } else
        {
            $this->session->set_flashdata('message_login_error', 'Login Gagal, pastikan username dan passwrod benar!');
        }

        $this->load->view('login/v_login_form');
    }

    public function logout()
    {
        $this->load->model('auth_model');
        $this->auth_model->logout();
        redirect('admin');// balik ke halaman login
    }

}
