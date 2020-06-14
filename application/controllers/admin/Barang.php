<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //load Login_model
        $this->load->model('login_model');
        //cek session dan level user
        if ($this->login_model->is_role() != "admin") {
            redirect("login");
        }
    }

    function index()
    {
        //load Barang_model
        $this->load->model('barang_model');

        //mengambil nama user
        $data['nama'] = $this->session->userdata['nama'];

        //mengambil semua data barang
        $data['barang'] = $this->barang_model->getAllBarang();

        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/barang/list', $data);
        $this->load->view('template/footer');
    }
}
