<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Tanya Dokter - Healty Pets';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['dokter'] = $this->db->from('biodata_dokter')->join('user', 'user.id=biodata_dokter.id_dokter')->where('biodata_dokter.is_verify', 2)->get()->result_array();

        if ($data['user']) {
            $data['jml_cart']   = $this->db->select_sum('jml')->get_where('tb_keranjang', ['id_user' => $data['user']['id'], 'status' => 0])->row_array();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('dokter/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Tanya Dokter - Healty Pets';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['dokter'] = $this->db->from('biodata_dokter')->join('user', 'user.id=biodata_dokter.id_dokter')->where('biodata_dokter.is_verify', 2)->where('id_dokter', $id)->get()->row_array();

        if ($data['user']) {
            $data['jml_cart']   = $this->db->select_sum('jml')->get_where('tb_keranjang', ['id_user' => $data['user']['id'], 'status' => 0])->row_array();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('dokter/detail', $data);
        $this->load->view('templates/footer');
    }

    public function cek_transaksi($id)
    {

        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $trans = $this->db->from('transaksi')->join('transaksi_dokter', 'transaksi_dokter.id_transaksi=transaksi.id_transaksi')->where('id_user', $user['id'])->where('id_dokter', $id)->where('transaksi.statusd', 200 || 1)->get()->row_array();

        $bio = $this->db->get_where('biodata_dokter', ['id_dokter' => $trans['id_faskes']])->row_array();


        if ($trans == null) {
            redirect('awal/dokter/check_out/' . $id);
        } else {
            $this->db->set('statusd', 1);
            $this->db->where('id_transaksi', $trans['id_transaksi']);
            $this->db->update('transaksi');

            $this->db->set('status', 1);
            $this->db->where('id_transaksi', $trans['id_transaksi']);
            $this->db->update('transaksi_dokter');

            redirect('./chatapp/chat.php?id_user=' . $trans['id_dokter'] . '&id_dokter=' . $trans['id_user']);
        }
    }

    public function check_out($id)
    {
        $data['title'] = 'Tanya Dokter - Healty Pets';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['dokter'] = $this->db->from('biodata_dokter')->join('user', 'user.id=biodata_dokter.id_dokter')->where('biodata_dokter.is_verify', 2)->where('id_dokter', $id)->get()->row_array();

        if ($data['user']) {
            $data['jml_cart']   = $this->db->select_sum('jml')->get_where('tb_keranjang', ['id_user' => $data['user']['id'], 'status' => 0])->row_array();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('dokter/order_summary', $data);
        $this->load->view('templates/footer');
    }

    public function back_list()
    {
        session_unset($_SESSION['id']);
        redirect('awal/dokter');
    }

    public function kirim_pesan()
    {
        $id_trans = $this->input->post('idTrans');
        $id_user = $this->input->post('idUser');
        $pesan = $this->input->post('pesan');
        $role = $this->input->post('role');

        $data = [
            'id_transaksi' => $id_trans,
            'id_user' => $id_user,
            'pesan' => $pesan,
            'time_send' => time(),
            'role' => $role
        ];

        $this->db->insert('transkip_chat', $data);
    }
}
