<?php

/**
 * Description of Dashboard
 *
 * @author Joko Yan Zai
 */
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
//        $this->load->view('templates/header');
//        $this->load->view('templates/sidebar');
        $this->load->view('dashboard/v_dashboard');
//        $this->load->view('templates/footer');
    }
}
