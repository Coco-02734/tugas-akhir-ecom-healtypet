<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Klinik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        if (!$this->session->userdata('email')) {
            redirect('klinik/auth');
        }
    }
    public function index()
    {
        $data['title'] = 'Home Klinik | Healty Pets';
        //wajib ada
        $data['title'] = 'Daftar Janji | Healty Pets';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['bio_pus'] =  $this->db->get_where('biodata_puskeswan', ['id_puskeswan' => $data['user']['id']])->row_array();
        if ($data['bio_pus']['is_verify'] == 0) {
            $this->session->set_flashdata('message', 'Silahkan lengkapi data ini untuk proses pengajuan akun!');
            $this->session->set_flashdata('status', 'warning');
            redirect('klinik/pengajuan');
        }
        //wajib ada
        $data['jml_transaksi'] = $this->db->get_where('transaksi_faskes', ['id_faskes' => $data['user']['id']])->num_rows();

        $data['jml_fasilitas'] = $this->db->get_where('tb_fasilitas', ['id_puskeswan' => $data['user']['id']])->num_rows();

        $data['saldo'] = $this->db->select_sum('harga')->get_where('transaksi_faskes', ['id_faskes' => $data['user']['id'], 'status' => 200])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('index', $data);
        $this->load->view('templates/footer');
    }

    public function transaksi_produk()
    {
        //wajib ada
        $data['title'] = 'Daftar Transaksi | Healty Pets';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['bio_pus'] =  $this->db->get_where('biodata_puskeswan', ['id_puskeswan' => $data['user']['id']])->row_array();
        if ($data['bio_pus']['is_verify'] == 0) {
            $this->session->set_flashdata('message', 'Silahkan lengkapi data ini untuk proses pengajuan akun!');
            $this->session->set_flashdata('status', 'warning');
            redirect('klinik/pengajuan');
        }
        //wajib ada

        $data['transaksi'] = $this->db->get_where('transaksi', ['id_faskes' => $data['user']['id']])->result_array();

        $data['detail'] = $this->db->from('transaksi')->join('tb_keranjang', 'tb_keranjang.id_user=transaksi.id_user')->where('id_faskes', $data['user']['id'])->get()->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('transaksi_produk', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_produk()
    {
        $data['title'] = 'Home Tambah Produk | Healty Pets';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['bio_pus'] =  $this->db->get_where('biodata_puskeswan', ['id_puskeswan' => $data['user']['id']])->row_array();
        if ($data['bio_pus']['is_verify'] == 0) {
            $this->session->set_flashdata('message', 'Silahkan lengkapi data ini untuk proses pengajuan akun!');
            $this->session->set_flashdata('status', 'warning');
            redirect('klinik/pengajuan');
        }


        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('tambah_produk', $data);
        $this->load->view('templates/footer');
    }
    public function prosestambahPro()
    {
        $data['title'] = 'Home Klinik | Healty Pets';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['bio_pus'] =  $this->db->get_where('biodata_puskeswan', ['id_puskeswan' => $data['user']['id']])->row_array();

        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data = [
            'id_puskeswan' => $user['id'],
            'nama_produk' => $this->input->post('nama_produk'),
            'katagori' => $this->input->post('katagori'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok'),
            'keterangan' => $this->input->post('keterangan'),
            'is_active' => 1

        ];

        $image = $_FILES['image']['name'];

        if ($image) {
            $config['file_name'] = $image;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '60000';
            $config['upload_path'] = './assets/user/img/barang/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);

                $this->db->insert('tb_produk_rs', $data);
                $this->session->set_flashdata('message', 'Data berhasil disimpan!');
                $this->session->set_flashdata('status', 'success');
            } else {
                $this->session->set_flashdata('message', $this->upload->display_errors());
                $this->session->set_flashdata('status', 'error');
            }
        }
        redirect('Klinik/list_produk');
    }

    public function detail_trans($id)
    {
        $data['title'] = 'Detail Transaksi | Healty Pets';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['bio_pus'] =  $this->db->get_where('biodata_puskeswan', ['id_puskeswan' => $data['user']['id']])->row_array();

        $data['trans'] = $this->db->get_where('transaksi', ['id_transaksi' => $id])->row_array();
        $data['pembeli'] = $this->db->from('user')->join('biodata_user', 'biodata_user.id_user=user.id')->where('id', $data['trans']['id_user'])->get()->row_array();
        if ($data['bio_pus']['is_verify'] == 0) {
            $this->session->set_flashdata('message', 'Silahkan lengkapi data ini untuk proses pengajuan akun!');
            $this->session->set_flashdata('status', 'warning');
            redirect('klinik/pengajuan');
        }



        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('detail', $data);
        $this->load->view('templates/footer');
    }

    public function updateresi()
    {
        $id = $this->input->post('id');
        $this->db->set('no_resi', $this->input->post('no_resi'));
        $this->db->where('id_transaksi', $id);
        $this->db->update('transaksi');

        $this->db->set('statusd', 3);
        $this->db->where('id_transaksi', $id);
        $this->db->update('transaksi');

        $this->session->set_flashdata('message', 'Resi berhasil disimpan!');
        $this->session->set_flashdata('status', 'success');
        redirect('Klinik/detail_trans/' . $id);
    }

    public function tambah_jadwal()
    {
        $data['title'] = 'Home Tambah Jadwal | Healty Pets';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['bio_pus'] =  $this->db->get_where('biodata_puskeswan', ['id_puskeswan' => $data['user']['id']])->row_array();
        if ($data['bio_pus']['is_verify'] == 0) {
            $this->session->set_flashdata('message', 'Silahkan lengkapi data ini untuk proses pengajuan akun!');
            $this->session->set_flashdata('status', 'warning');
            redirect('klinik/pengajuan');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('tambah_jadwal', $data);
        $this->load->view('templates/footer');
    }
    public function prosestambahjadwal()
    {

        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data = [
            'id_puskeswan' => $user['id'],
            'nama_fasilitas' => $this->input->post('nama_fasilitas'),
            'jadwal' => $this->input->post('jadwal'),
            'penaggung_jawab' => $this->input->post('penaggung_jawab'),
            'harga' => $this->input->post('harga')

        ];

        $this->db->insert('tb_fasilitas', $data);
        $this->session->set_flashdata('message', 'Jadwal berhasil disimpan!');
        $this->session->set_flashdata('status', 'success');
        redirect('Klinik/list_jadwal');
    }
    public function daftar_janji()
    {
        $data['title'] = 'Daftar Janji Dokter | Healty Pets';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['bio_pus'] =  $this->db->get_where('biodata_puskeswan', ['id_puskeswan' => $data['user']['id']])->row_array();
        $data['transaksi'] =  $this->db->get_where('transaksi_faskes', ['id_faskes' => $data['user']['id']])->result_array();
        if ($data['bio_pus']['is_verify'] == 0) {
            $this->session->set_flashdata('message', 'Silahkan lengkapi data ini untuk proses pengajuan akun!');
            $this->session->set_flashdata('status', 'warning');
            redirect('klinik/pengajuan');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('daftarjanji', $data);
        $this->load->view('templates/footer');
    }
    public function endsesi($id)
    {
        $cek = $this->db->get_where('transaksi', ['id_transaksi' => $id])->row_array();

        if (1 == 0) {
            $this->session->set_flashdata('message', 'Transaksi telah diselesaikan');
            $this->session->set_flashdata('status', 'success');
        } else {
            $this->db->set('status', 0);
            $this->db->where('id_transaksi', $id);
            $this->db->update('transaksi_faskes');

            $this->db->set('statusd', 0);
            $this->db->where('id_transaksi', $id);
            $this->db->update('transaksi');
            $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $trans = $this->db->get_where('transaksi_faskes', ['id_faskes' => $user['id']])->row_array();

            $bio = $this->db->get_where('biodata_puskeswan', ['id_puskeswan' => $user['id']])->row_array();

            $this->db->set('saldo', $bio['saldo'] + $trans['harga']);
            $this->db->where('id_puskeswan', $user['id']);
            $this->db->update('biodata_puskeswan');

            $this->session->set_flashdata('message', 'Transaksi Berhasil diselesaikan!');
            $this->session->set_flashdata('status', 'success');
        }
        redirect('Klinik/daftar_janji');
    }
    public function list_produk()
    {
        $data['title'] = 'List Produk | Healty Pets';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['bio_pus'] =  $this->db->get_where('biodata_puskeswan', ['id_puskeswan' => $data['user']['id']])->row_array();

        $data['produk'] = $this->db->get_where('tb_produk_rs', ['id_puskeswan' => $data['user']['id']])->result_array();
        if ($data['bio_pus']['is_verify'] == 0) {
            $this->session->set_flashdata('message', 'Silahkan lengkapi data ini untuk proses pengajuan akun!');
            $this->session->set_flashdata('status', 'warning');
            redirect('klinik/pengajuan');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('listproduk', $data);
        $this->load->view('templates/footer');
    }
    public function list_jadwal()
    {
        $data['title'] = 'List Jadwal | Healty Pets';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['bio_pus'] =  $this->db->get_where('biodata_puskeswan', ['id_puskeswan' => $data['user']['id']])->row_array();

        $data['jadwal'] = $this->db->get_where('tb_fasilitas', ['id_puskeswan' => $data['user']['id']])->result_array();
        if ($data['bio_pus']['is_verify'] == 0) {
            $this->session->set_flashdata('message', 'Silahkan lengkapi data ini untuk proses pengajuan akun!');
            $this->session->set_flashdata('status', 'warning');
            redirect('klinik/pengajuan');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('listjadwal', $data);
        $this->load->view('templates/footer');
    }
    public function editproduk($id)
    {
        $data['title'] = 'Edit Produk | Healty Pets';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['bio_pus'] =  $this->db->get_where('biodata_puskeswan', ['id_puskeswan' => $data['user']['id']])->row_array();

        $data['produk'] = $this->db->get_where('tb_produk_rs', ['id_produk' => $id])->row_array();
        if ($data['bio_pus']['is_verify'] == 0) {
            $this->session->set_flashdata('message', 'Silahkan lengkapi data ini untuk proses pengajuan akun!');
            $this->session->set_flashdata('status', 'warning');
            redirect('klinik/pengajuan');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('editproduk', $data); //ini adalah viewnya
        $this->load->view('templates/footer');
    }
    public function proeditproduk()
    {
        $id = $this->input->post('id_produk');
        $data = [
            'nama_produk' => $this->input->post('nama_produk'),
            'katagori' => $this->input->post('katagori'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok'),
            'keterangan' => $this->input->post('keterangan')
        ];

        $this->db->set($data);
        $this->db->where('id_produk', $id);
        $this->db->update('tb_produk_rs');

        $this->session->set_flashdata('message', 'Data berhasil diUpdate!');
        $this->session->set_flashdata('status', 'success');
        redirect('Klinik/list_produk');
    }
    public function hapusproduk($id)
    {

        $this->db->where('id_produk', $id);
        $this->db->delete('tb_produk_rs');

        $this->session->set_flashdata('message', 'Produk berhasil dihapus!');
        $this->session->set_flashdata('status', 'success');
        redirect('Klinik/list_produk');
    }
    public function editjadwal($id)
    {
        $data['title'] = 'Edit Jadwal | Healty Pets';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['bio_pus'] =  $this->db->get_where('biodata_puskeswan', ['id_puskeswan' => $data['user']['id']])->row_array();

        $data['jadwal'] = $this->db->get_where('tb_fasilitas', ['id_fasilitas' => $id])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('editjadwal', $data); //ini adalah viewnya
        $this->load->view('templates/footer');
    }
    public function proeditjadwal()
    {
        $id = $this->input->post('id_fasilitas');
        $data = [
            'nama_fasilitas' => $this->input->post('nama_fasilitas'),
            'jadwal' => $this->input->post('jadwal'),
            'penaggung_jawab' => $this->input->post('penaggung_jawab'),
            'harga' => $this->input->post('harga'),
        ];

        $this->db->set($data);
        $this->db->where('id_fasilitas', $id);
        $this->db->update('tb_fasilitas');

        $this->session->set_flashdata('message', 'Data berhasil disimpan!');
        $this->session->set_flashdata('status', 'success');
        redirect('Klinik/list_jadwal');
    }
    public function hapusjadwal($id)
    {

        $this->db->where('id_fasilitas', $id);
        $this->db->delete('tb_fasilitas');

        $this->session->set_flashdata('message', 'Data berhasil dihapus!');
        $this->session->set_flashdata('status', 'success');
        redirect('Klinik/list_jadwal');
    }

    public function transaksi()
    {
        $data['title'] = 'Transaksi | Healty Pets';
        //wajib ada

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['bio_pus'] =  $this->db->get_where('biodata_puskeswan', ['id_puskeswan' => $data['user']['id']])->row_array();
        //wajib ada
        $data['jml_transaksi'] = $this->db->get_where('transaksi_faskes', ['id_faskes' => $data['user']['id']])->num_rows();

        $data['jml_fasilitas'] = $this->db->get_where('tb_fasilitas', ['id_puskeswan' => $data['user']['id']])->num_rows();

        $data['saldo'] = $this->db->select_sum('harga')->get_where('transaksi_faskes', ['id_faskes' => $data['user']['id'], 'status' => 200])->row_array();

        $data['transaksi'] = $this->db->get_where('transaksi', ['id_faskes' => $data['user']['id']])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('transaksi', $data);
        $this->load->view('templates/footer');
    }
    public function payout()
    {
        $data['title'] = 'Tarik Saldo | Healty Pets';
        //wajib ada
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['bio_pus'] =  $this->db->get_where('biodata_puskeswan', ['id_puskeswan' => $data['user']['id']])->row_array();
        //wajib ada

        $data['jml_transaksi'] = $this->db->get_where('transaksi', ['id_faskes' => $data['user']['id']])->num_rows();

        $data['payout'] = $this->db->get_where('tb_payout', ['id_user' => $data['user']['id']])->result_array();
        if ($data['bio_pus']['is_verify'] == 0) {
            $this->session->set_flashdata('message', 'Silahkan lengkapi data ini untuk proses pengajuan akun!');
            $this->session->set_flashdata('status', 'warning');
            redirect('klinik/pengajuan');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('saldo', $data); //ini adalah viewnya
        $this->load->view('templates/footer');
    }

    public function req_payout()
    {
        $user =  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $cek = $this->db->get_where('biodata_puskeswan', ['id_puskeswan' => $user['id']])->row_array();

        $jml_payout = $this->input->post('jml_payout');
        $data = [
            'id_payout' => rand() . $user['id'],
            'id_user' => $user['id'],
            'jml_payout' => $jml_payout,
            'gateway' => $this->input->post('gateway'),
            'no_rek' => $this->input->post('no_rek'),
            'is_verify' => 0
        ];

        if ($cek['saldo'] < $jml_payout) {
            $this->session->set_flashdata('message', 'Saldo anda tidak cukup');
            $this->session->set_flashdata('status', 'error');
        } else {
            $this->db->insert('tb_payout', $data);

            $this->db->set('saldo', $cek['saldo'] - $jml_payout);
            $this->db->where('id_puskeswan', $user['id']);
            $this->db->update('biodata_puskeswan');

            $this->session->set_flashdata('message', 'Pengajuan sudah dilakukan');
            $this->session->set_flashdata('status', 'success');
        }
        redirect('klinik/payout');
    }

    public function pengajuan()
    {
        $data['title'] = 'Pengajuan | Healty Pets';
        //wajib ada
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['bio_pus'] =  $this->db->get_where('biodata_puskeswan', ['id_puskeswan' => $data['user']['id']])->row_array();
        //wajib ada
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('lengkapi', $data); //ini adalah viewnya
        $this->load->view('templates/footer');
    }

    public function kirim_pengajuan()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = [
            'kota' => $this->input->post('kota'),
            'provinsi' => $this->input->post('provinsi'),
            'alamat' => $this->input->post('alamat'),
            'id_penanggung' => $this->input->post('ktp'),
            'nama' => $this->input->post('nama'),
            'id_npwp' => $this->input->post('id_npwp'),
            'is_verify' => 1
        ];

        //cek jika ada gambar upload SK
        $upload_sk = 'SK_' .  $_FILES['sk']['name'];

        if ($upload_sk) {
            $config['file_name'] = $upload_sk;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '60000';
            $config['upload_path'] = './assets/user/img/puskeswan/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('sk')) {
                $new_image = $this->upload->data('file_name');
                $this->db->set('sk_pendirian', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        //cek jika ada gambar upload KTP
        $upload_ktp = $_FILES['image']['name'];

        if ($upload_ktp) {
            $config['file_name'] = $upload_ktp;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '60000';
            $config['upload_path'] = './assets/user/img/puskeswan/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {

                $image_new = $this->upload->data('file_name');
                $this->db->set('gambar_profile', $image_new);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->db->set($data);
        $this->db->where('id_puskeswan', $user['id']);
        $this->db->update('biodata_puskeswan');

        $this->session->set_flashdata('message', 'Data berhasil disimpan, dan lagi ditinjau !');
        $this->session->set_flashdata('status', 'success');
        redirect('klinik');
    }
}
