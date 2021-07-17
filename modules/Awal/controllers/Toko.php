<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Toko extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Toko Obat | Healty Pets';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();;
        if ($data['user']) {
            $data['jml_cart']   = $this->db->select_sum('jml')->get_where('tb_keranjang', ['id_user' => $data['user']['id'], 'status' => 0])->row_array();
        }
        $data['iklan'] = $this->db->get_where('tb_iklan', ['is_active' => 1])->result_array();

        if (isset($_GET['q'])) {
            $data['produk'] = $this->db->like('nama_produk', $_GET['q'])->get('tb_produk_rs')->result_array();
        } else {
            $data['produk'] = $this->db->get('tb_produk_rs')->result_array();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('user/toko', $data);
        $this->load->view('templates/footer');
    }
}
