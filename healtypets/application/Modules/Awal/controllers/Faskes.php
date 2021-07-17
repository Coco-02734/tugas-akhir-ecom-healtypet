<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Faskes extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Janji Fasilitas Kesehatan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['iklan'] = $this->db->get_where('tb_iklan', ['is_active' => 1])->result_array();

        if (isset($_GET['q'])) {
            $data['faskes'] = $this->db->like('nama', $_GET['q'])->get('biodata_puskeswan')->result_array();
        } else {
            $data['faskes'] = $this->db->get('biodata_puskeswan')->result_array();
        }

        if ($data['user']) {
            $data['jml_cart']   = $this->db->select_sum('jml')->get_where('tb_keranjang', ['id_user' => $data['user']['id'], 'status' => 0])->row_array();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('user/faskes', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Fasilitas Kesehatan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['faskes'] = $this->db->get_where('biodata_puskeswan', ['id_puskeswan' => $id])->row_array();

        $data['produk'] = $this->db->get_where('tb_fasilitas', ['id_puskeswan' => $id])->result_array();

        if ($data['user']) {
            $data['jml_cart']   = $this->db->select_sum('jml')->get_where('tb_keranjang', ['id_user' => $data['user']['id'], 'status' => 0])->row_array();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('user/faskes_detail', $data);
        $this->load->view('templates/footer');
    }

    public function janji($id)
    {
        $data['title'] = 'Check Payment Healty Pets';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['bio'] = $this->db->get_where('biodata_user', ['id_user' => $data['user']['id']])->row_array();

        $data['faskes'] = $this->db->get_where('tb_fasilitas', ['id_fasilitas' => $id])->row_array();

        $data['pet'] = $this->db->get_where('biodata_peliharaan', ['id_user' => $data['user']['id']])->result_array();

        if ($data['user']) {
            $data['jml_cart']   = $this->db->select_sum('jml')->get_where('tb_keranjang', ['id_user' => $data['user']['id'], 'status' => 0])->row_array();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('user/janji_payment', $data);
        $this->load->view('templates/footer');
    }
}
