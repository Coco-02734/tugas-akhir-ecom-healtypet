<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Artikel dan Berita';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if (isset($_GET['q'])) {
            $data['berita'] = $this->db->like('judul', $_GET['q'])->get('tb_berita')->result_array();
        } else {
            $data['berita'] = $this->db->get('tb_berita')->result_array();
        }

        if ($data['user']) {
            $data['jml_cart']   = $this->db->select_sum('jml')->get_where('tb_keranjang', ['id_user' => $data['user']['id'], 'status' => 0])->row_array();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('berita/index', $data);
        $this->load->view('templates/footer');
    }
    public function lengkap($id)
    {
        $data['title'] = 'Artikel dan Berita';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['berita'] = $this->db->get_where('tb_berita', ['id_berita' => $id])->row_array();
        $data['tmb'] = $this->db->limit(3)->get('tb_berita')->result_array();

        if ($data['user']) {
            $data['jml_cart']   = $this->db->select_sum('jml')->get_where('tb_keranjang', ['id_user' => $data['user']['id'], 'status' => 0])->row_array();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('berita/lengkap', $data);
        $this->load->view('templates/footer');
    }
}
