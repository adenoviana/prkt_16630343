<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //load model CekLogin
        $this->load->model('ceklogin');
        //cek session dan level user
        if ($this->ceklogin->is_role() != "admin") {
            redirect('login');
        }
    }

    function index()
    {
        $this->load->view('template/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/dashboard');
        $this->load->view('template/footer');
    }
}
