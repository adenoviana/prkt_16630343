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
        if ($this->ceklogin->is_role() != "pelanggan") {
            redirect('login');
        }
    }

    function index()
    {

        $this->load->view('pelanggan/dashboard');
    }
}
