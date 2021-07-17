<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        if (!$this->session->userdata('email')) {
            redirect('dokter/auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Home Klinik | Healty Pets';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['bio'] = $this->db->get_where('biodata_dokter', ['id_dokter' => $data['user']['id']])->row_array();

        $data['jml_transaksi'] = $this->db->get_where('transaksi_dokter', ['id_dokter' => $data['user']['id']])->num_rows();

        $data['transaksi'] = $this->db->from('transaksi_dokter')->join('transaksi', 'transaksi.id_transaksi=transaksi_dokter.id_transaksi')->join('user', 'user.id=transaksi.id_user')->where('id_faskes', $data['user']['id'])->get()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('index', $data);
        $this->load->view('templates/footer');
    }

    public function pengajuan()
    {
        $data['title'] = 'Formulir Pengajuan Dokter';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $cek = $this->db->get_where('biodata_dokter', ['id_dokter' => $data['user']['id']])->row_array();
        // var_dump($cek);
        // die;

        $this->load->view('dokter/pengajuan', $data);
    }

    public function kirim_pengajuan()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = [
            'kota' => $this->input->post('kota'),
            'provinsi' => $this->input->post('provinsi'),
            'alamat' => $this->input->post('alamat'),
            'id_identitas' => $this->input->post('ktp'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'jns_kelamin' => $this->input->post('jns_kelamin'),
            'lulusan' => $this->input->post('lulusan'),
            'is_verify' => 3,
            'id_sk' => $this->input->post('id_sk'),
            'harga' => $this->input->post('harga')
        ];

        //cek jika ada gambar upload SK
        $upload_sk = 'SK_' .  $_FILES['sk_dokter']['name'];

        if ($upload_sk) {
            $config['file_name'] = $upload_sk;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '60000';
            $config['upload_path'] = './assets/dokter/img/file/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('sk_dokter')) {
                $new_image = $this->upload->data('file_name');
                $this->db->set('sk_dokter', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
        //cek jika ada gambar upload KTP
        $upload_ktp = 'ktp_' .  $_FILES['gambar_ktp']['name'];

        if ($upload_ktp) {
            $config['file_name'] = $upload_ktp;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '60000';
            $config['upload_path'] = './assets/dokter/img/file/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar_ktp')) {

                $new_ktp = $this->upload->data('file_name');
                $this->db->set('gambar_ktp', $new_ktp);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->db->set($data);
        $this->db->where('id_dokter', $user['id']);
        $this->db->update('biodata_dokter');

        $this->session->set_flashdata('message', 'Data berhasil disimpan, Lalu lengkapi identitas!');
        $this->session->set_flashdata('status', 'success');
        redirect('dokter/upload_identitas');
    }

    public function upload_identitas()
    {
        $data['title'] = 'Formulir Pengajuan Dokter';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('dokter/swafoto', $data);
    }

    public function upload_proses()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        //cek jika ada gambar upload KTP
        $upload_ktp = 'selfie_' .  $_FILES['image']['name'];

        if ($upload_ktp) {
            $config['file_name'] = $upload_ktp;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '60000';
            $config['upload_path'] = './assets/dokter/img/file/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {

                $new_ktp = $this->upload->data('file_name');
                $this->db->set('bukti_identitas', $new_ktp);
                $this->db->set('is_verify', 1);
                $this->db->where('id_dokter', $user['id']);
                $this->db->update('biodata_dokter');
                redirect('dokter');
            } else {
                echo $this->upload->display_errors();
                $this->session->set_flashdata('message',  $this->upload->display_errors());
                $this->session->set_flashdata('status', 'error');
                redirect('dokter/upload_identitas');
            }
        }
    }

    public function pelayanan()
    {
        $data['title'] = 'Halaman List Pelayanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['layanan'] = $this->db->order_by('kloter', 'DESC')->from('transaksi_dokter')->join('transaksi', 'transaksi.id_transaksi=transaksi_dokter.id_transaksi')->join('user', 'user.id=transaksi.id_user')->where('id_dokter', $data['user']['id'])->get()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pelayanan', $data);
        $this->load->view('templates/footer');
    }

    public function cek_transaksi($id)
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $trans = $this->db->from('transaksi')->join('transaksi_dokter', 'transaksi_dokter.id_transaksi=transaksi.id_transaksi')->where('id_dokter', $user['id'])->where('transaksi.id_transaksi', $id)->where('transaksi.statusd', 200 || 1)->get()->row_array();


        if ($trans == null) {

            $this->session->set_flashdata('message', 'Masih menunggu pembayaran');
            $this->session->set_flashdata('status', 'error');
            redirect('dokter/pelayanan');
        } else {
            $this->db->set('statusd', 1);
            $this->db->where('id_transaksi', $trans['id_transaksi']);
            $this->db->update('transaksi');

            $this->db->set('status', 1);
            $this->db->where('id_transaksi', $trans['id_transaksi']);
            $this->db->update('transaksi_dokter');

            redirect('./chatapp/chat.php?id_user=' . $trans['id_user'] . '&id_dokter=' . $trans['id_dokter']);
        }
    }

    public function back_list()
    {
        session_unset($_SESSION['id']);
        redirect('dokter/pelayanan');
    }

    public function endsesi($id)
    {
        $cek = $this->db->get_where('transaksi_dokter', ['id_transaksi' => $id])->row_array();

        if ($cek['status'] == 0) {
            $this->session->set_flashdata('message', 'Sesi pelayanan Sudah Selesai');
            $this->session->set_flashdata('status', 'error');
        } else {
            $this->db->set('statusd', 0);
            $this->db->where('id_transaksi', $id);
            $this->db->update('transaksi');

            $this->db->set('status', 0);
            $this->db->where('id_transaksi', $id);
            $this->db->update('transaksi_dokter');

            $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $bio = $this->db->get_where('biodata_dokter', ['id_dokter' => $user['id']])->row_array();

            $this->db->set('saldo', $bio['saldo'] + $bio['harga']);
            $this->db->where('id_dokter', $user['id']);
            $this->db->update('biodata_dokter');

            $this->session->set_flashdata('message', 'Sesi pelayanan berhasil ditutup');
            $this->session->set_flashdata('status', 'success');
        }
        redirect('dokter/pelayanan');
    }

    public function transaksi()
    {
        $data['title'] = 'Home Transaksi | Healty Pets';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['jml_transaksi'] = $this->db->get_where('transaksi_dokter', ['id_dokter' => $data['user']['id']])->num_rows();

        $data['jml_transaksilive'] = $this->db->get_where('transaksi_dokter', ['id_dokter' => $data['user']['id'], 'status' => 200 || 1])->num_rows();

        $data['saldo'] = $this->db->select_sum('harga')->get_where('transaksi_dokter', ['id_dokter' => $data['user']['id'], 'status' => 0])->row_array();

        $data['transaksi'] = $this->db->from('transaksi_dokter')->join('transaksi', 'transaksi.id_transaksi=transaksi_dokter.id_transaksi')->join('user', 'user.id=transaksi.id_user')->where('id_faskes', $data['user']['id'])->get()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('transaksi', $data); //ini adalah viewnya
        $this->load->view('templates/footer');
    }
    public function saldo()
    {
        $data['title'] = 'Tarik Saldo | Healty Pets';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['jml_transaksi'] = $this->db->get_where('transaksi_dokter', ['id_dokter' => $data['user']['id']])->num_rows();

        $data['jml_transaksilive'] = $this->db->get_where('transaksi_dokter', ['id_dokter' => $data['user']['id'], 'status' => 200 || 1])->num_rows();


        $data['bio'] = $this->db->get_where('biodata_dokter', ['id_dokter' => $data['user']['id']])->row_array();

        $data['payout'] = $this->db->get_where('tb_payout', ['id_user' => $data['user']['id']])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('saldo', $data); //ini adalah viewnya
        $this->load->view('templates/footer');
    }

    public function req_payout()
    {
        $user =  $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $cek = $this->db->get_where('biodata_dokter', ['id_dokter' => $user['id']])->row_array();

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
            $this->db->where('id_dokter', $user['id']);
            $this->db->update('biodata_dokter');

            $this->session->set_flashdata('message', 'Pengajuan sudah dilakukan');
            $this->session->set_flashdata('status', 'success');
        }
        redirect('dokter/saldo');
    }

    public function profile()
    {
        $data['title'] = 'Home Dokter | Healty Pets';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jml_transaksi'] = $this->db->get_where('transaksi_faskes', ['id_faskes' => $data['user']['id']])->num_rows();
        $data['saldo'] = $this->db->select_sum('harga')->get_where('transaksi_faskes', ['id_faskes' => $data['user']['id'], 'status' => 200 | 0 | 1])->row_array();
        $data['profile'] = $this->db->get_where('biodata_dokter', ['id_dokter' => $data['user']['id']])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('profile', $data); //ini adalah viewnya
        $this->load->view('templates/footer');
    }

    public function update_user()
    {
        $data = [
            'nama' => $this->input->post('nama')
        ];

        $upload_gambar = $_FILES['image']['name'];

        if ($upload_gambar) {
            $config['file_name'] = $upload_gambar;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '60000';
            $config['upload_path'] = './assets/user/img/dokter/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {

                $new_update = $this->upload->data('file_name');
                $this->db->set('image', $new_update);
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->db->set($data);
        $this->db->where('email', $this->input->post('email'));
        $this->db->update('user');

        $this->session->set_flashdata('message', 'Data berhasil disimpan, Lalu lengkapi identitas!');
        $this->session->set_flashdata('status', 'success');
        redirect('dokter/profile');
    }

    public function update_bio()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = [
            'alamat' => $this->input->post('alamat'),
            'kota' => $this->input->post('kota'),
            'provinsi' => $this->input->post('provinsi'),
            'harga' => $this->input->post('harga'),
            'jam_kerja' => $this->input->post('jam_kerja')
        ];

        $this->db->set($data);
        $this->db->where('id_dokter', $user['id']);
        $this->db->update('biodata_dokter');

        $this->session->set_flashdata('message', 'Data berhasil disimpan!');
        $this->session->set_flashdata('status', 'success');
        redirect('dokter/profile');
    }
}
