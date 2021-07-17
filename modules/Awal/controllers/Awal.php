<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Awal extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Selamat Datang Di Healty Pet';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['iklan'] = $this->db->get_where('tb_iklan', ['is_active' => 1])->result_array();
        $data['berita'] = $this->db->get_where('tb_berita', ['is_active' => 1])->result_array();
        $data['jns_suntik'] = $this->db->get_where('tb_vaksin', ['is_active' => 1])->result_array();
        if ($data['user']) {
            $data['jml_cart']   = $this->db->select_sum('jml')->get_where('tb_keranjang', ['id_user' => $data['user']['id'], 'status' => 0])->row_array();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('index', $data);
        $this->load->view('templates/footer');
    }
}
