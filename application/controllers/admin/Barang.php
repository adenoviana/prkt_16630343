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

    function tambah()
    {
        $this->load->model('jenis_model');
        $this->load->model('satuan_model');

        //mengambil nama user
        $data['nama'] = $this->session->userdata['nama'];

        //mengambil semua isi tabel jenis
        $data['jenis'] = $this->jenis_model->getAllJenis();

        //mengambil semua isi tabel satuan
        $data['satuan'] = $this->satuan_model->getAllSatuan();

        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/barang/tambah', $data);
        $this->load->view('template/footer');
    }

    function simpan()
    {
        $nama_barang    = $this->input->post('nama_barang');
        $stok           = $this->input->post('stok');
        $harga          = $this->input->post('harga');
        $id_jenis       = $this->input->post('id_jenis');
        $id_satuan      = $this->input->post('id_satuan');

        $data = array(
            'nama_barang' => $nama_barang,
            'stok' => $stok,
            'harga' => $harga,
            'id_jenis' => $id_jenis,
            'id_satuan' => $id_satuan,
        );

        //load Barang_model
        $this->load->model('barang_model');

        ///memanggil fungsi simpan
        $this->barang_model->simpan($data, 'barang');

        redirect('admin/barang');
    }
}
