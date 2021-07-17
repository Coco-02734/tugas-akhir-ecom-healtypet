<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Selamat Datang Di Healty Pet';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['biodata'] = $this->db->get_where('biodata_user', ['id_user' =>  $data['user']['id']])->row_array();
        $data['bio_hewan'] = $this->db->get_where('biodata_peliharaan', ['id_user' =>  $data['user']['id']])->result_array();
        if ($data['user']) {
            $data['jml_cart']   = $this->db->select_sum('jml')->get_where('tb_keranjang', ['id_user' => $data['user']['id'], 'status' => 0])->row_array();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit_bio()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data = [
            'kota' => $this->input->post('kota'),
            'provinsi' => $this->input->post('provinsi'),
            'alamat' => $this->input->post('alamat'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin')
        ];

        $this->db->set($data);
        $this->db->where('id_user', $user['id']);
        $this->db->update('biodata_user');

        $this->session->set_flashdata('message', 'Yeay Update Data Berhasil!');
        $this->session->set_flashdata('status', 'success');
        redirect('awal/user');
    }

    public function update_foto()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        //cek jika ada gambar upload
        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '60000';
            $config['upload_path'] = './assets/user/img/profil/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {

                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
                $this->db->where('email', $user['email']);
                $this->db->update('user');
            } else {
                echo $this->upload->display_errors();
            }
        }

        $this->session->set_flashdata('message', 'Yeay Update Foto Berhasil!');
        $this->session->set_flashdata('status', 'success');
        redirect('awal/user');
    }

    public function add_peliharaan()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = [
            'id_user' => $user['id'],
            'nama' => $this->input->post('nama'),
            'tgl_lahir' => $this->input->post('tgl_lahir')
        ];
        //cek jika ada gambar upload
        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '60000';
            $config['upload_path'] = './assets/user/img/peliharaan/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {

                $new_image = $this->upload->data('file_name');
                $this->db->set('img', $new_image);

                $this->db->insert('biodata_peliharaan', $data);
                $this->session->set_flashdata('message', 'Berhasil menambahkan biodata hewan !');
                $this->session->set_flashdata('status', 'success');
                redirect('awal/user');
            } else {

                $this->session->set_flashdata('message', $this->upload->display_errors());
                $this->session->set_flashdata('status', 'error');
                redirect('awal/user');
            }
        }
    }

    public function delete_pet($id)
    {
        $this->db->where('id_peliharaan', $id);
        $this->db->delete('biodata_peliharaan');
        $this->session->set_flashdata('message', 'Berhasil menghapus biodata hewan !');
        $this->session->set_flashdata('status', 'success');
        redirect('awal/user');
    }

    public function riwayat()
    {
        $data['title'] = 'Riwayat Pemesanan | Healty Pets';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['biouser'] = $this->db->get_where('biodata_user', ['id_user' => $data['user']['id']])->row_array();
        $data['transaksi'] = $this->db->get_where('transaksi', ['id_user' => $data['user']['id']])->result_array();

        if ($data['user']) {
            $data['jml_cart']   = $this->db->select_sum('jml')->get_where('tb_keranjang', ['id_user' => $data['user']['id'], 'status' => 0])->row_array();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('user/riwayat', $data);
        $this->load->view('templates/footer');
    }
    public function transaksi_detail($id)
    {
        $data['title'] = 'Riwayat Pemesanan Detail | Healty Pets';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['biouser'] = $this->db->get_where('biodata_user', ['id_user' => $data['user']['id']])->row_array();
        $data['transaksi'] = $this->db->get_where('transaksi', ['id_user' => $data['user']['id'], 'id_transaksi' => $id])->row_array();

        if ($data['user']) {
            $data['jml_cart']   = $this->db->select_sum('jml')->get_where('tb_keranjang', ['id_user' => $data['user']['id'], 'status' => 0])->row_array();
        }


        $this->load->view('templates/header', $data);
        $this->load->view('user/transaksi_detail', $data);
        $this->load->view('templates/footer');
    }

    public function tambahKeranjang()
    {
        $user =  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $produk_id = $this->input->post('produkId');
        $dataProduk = $this->db->get_where('tb_produk_rs', ['id_produk' => $produk_id])->row_array();
        $cek = $this->db->get_where('tb_keranjang', ['id_produk' => $produk_id, 'id_user' => $user['id'], 'status' => 0])->num_rows();
        $prod = $this->db->get_where('tb_keranjang', ['id_produk' => $produk_id, 'id_user' => $user['id'], 'status' => 0])->row_array();

        $data = [
            'id_produk' => $dataProduk['id_produk'],
            'id_user' => $user['id'],
            'jml' => 1,
            'total_harga' => $dataProduk['harga'],
            'status' => 0
        ];

        if ($cek > 0) {
            $this->db->set([
                'jml' => $prod['jml'] + 1,
                'total_harga' => $dataProduk['harga'] * ($prod['jml'] + 1)
            ]);
            $this->db->where('id_keranjang', $prod['id_keranjang']);
            $this->db->update('tb_keranjang');
        } else {
            $this->db->insert('tb_keranjang', $data);
        }
        $this->session->set_flashdata('message', 'Berhasil Menambahkan ke keranjang !');
        $this->session->set_flashdata('status', 'success');
    }

    public function keranjang()
    {
        $data['title'] = 'Riwayat Pemesanan Detail | Healty Pets';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['biouser'] = $this->db->get_where('biodata_user', ['id_user' => $data['user']['id']])->row_array();

        $data['keranjang'] = $this->db->get_where('tb_keranjang', ['id_user' => $data['user']['id'], 'status' => 0])->result_array();

        if ($data['user']) {
            $data['jml_cart']   = $this->db->select_sum('jml')->get_where('tb_keranjang', ['id_user' => $data['user']['id'], 'status' => 0])->row_array();
        }

        $data['subtotal']   = $this->db->select_sum('total_harga')->get_where('tb_keranjang', ['id_user' => $data['user']['id'], 'status' => 0])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('user/keranjang', $data);
        $this->load->view('templates/footer');
    }

    public function update_produk()
    {
        $user =  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $produk_id = $this->input->post('produkId');
        $jml = $this->input->post('jml');
        $dataProduk = $this->db->get_where('tb_produk_rs', ['id_produk' => $produk_id])->row_array();
        $prod = $this->db->get_where('tb_keranjang', ['id_produk' => $produk_id, 'id_user' => $user['id'],  'status' => 0])->row_array();

        $data = [
            'id_produk' => $produk_id,
            'id_user' => $user['id'],
            'jml' => $jml,
            'total_harga' => $dataProduk['harga'] * $jml,
            'status' => 0
        ];

        $this->db->set($data);
        $this->db->where('id_keranjang', $prod['id_keranjang']);
        $this->db->update('tb_keranjang');

        $this->session->set_flashdata('message', 'Berhasil Update Keranjang !');
        $this->session->set_flashdata('status', 'success');
    }

    public function payment()
    {
        $data['title'] = 'Check Payment Healty Pets';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['bio'] = $this->db->get_where('biodata_user', ['id_user' => $data['user']['id']])->row_array();

        $data['keranjang'] = $this->db->get_where('tb_keranjang', ['id_user' => $data['user']['id'], 'status' => 0])->result_array();

        if ($data['user']) {
            $data['jml_cart']   = $this->db->select_sum('jml')->get_where('tb_keranjang', ['id_user' => $data['user']['id'], 'status' => 0])->row_array();
        }

        $data['subtotal']   = $this->db->select_sum('total_harga')->get_where('tb_keranjang', ['id_user' => $data['user']['id'], 'status' => 0])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('user/order_summary', $data);
        $this->load->view('templates/footer');
    }

    public function hapus_produk()
    {
        $idKeranjang = $this->input->post('keranjangId');
        $this->db->where('id_keranjang', $idKeranjang);
        $this->db->delete('tb_keranjang');
        $this->session->set_flashdata('message', 'Berhasil Menghapus Produk !');
        $this->session->set_flashdata('status', 'success');
    }
}
