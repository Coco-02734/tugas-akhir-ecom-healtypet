<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        if (!$this->session->userdata('email')) {
            redirect('admin/auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Halaman Admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['jml_dok'] = $this->db->get('biodata_dokter')->num_rows();
        $data['jml_faskes'] = $this->db->get('biodata_puskeswan')->num_rows();
        $data['jml_user'] = $this->db->get('biodata_user')->num_rows();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('index', $data);
        $this->load->view('templates/footer');
    }

    public function verif_dokter()
    {
        $data['title'] = 'Halaman Verifikasi Dokter';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['dokter'] = $this->db->get_where('user', ['role_id' => 3])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('verif_dokter', $data);
        $this->load->view('templates/footer');
    }
    public function detail_dok($id)
    {
        $data['title'] = 'Detail Dokter';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['dokter'] = $this->db->get_where('user', ['id' => $id])->row_array();

        $data['bio_dok'] = $this->db->get_where('biodata_dokter', ['id_dokter' => $id])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('detail_dok', $data);
        $this->load->view('templates/footer');
    }

    public function diterima($id)
    {
        $data = [
            'is_verify' => 2
        ];
        $this->db->set($data);
        $this->db->where('id_dokter', $id);
        $this->db->update('biodata_dokter');

        $this->session->set_flashdata('message', 'Dokter berhasil diverifikasi !');
        $this->session->set_flashdata('status', 'success');
        //redirect halaman
        redirect('admin/detail_dok/' . $id);
    }

    public function ditolak($id)
    {
        $data = [
            'is_verify' => 3
        ];
        $this->db->set($data);
        $this->db->where('id_dokter', $id);
        $this->db->update('biodata_dokter');

        $this->session->set_flashdata('message', 'Dokter berhasil Di tolak !');
        $this->session->set_flashdata('status', 'success');
        //redirect halaman
        redirect('admin/detail_dok/' . $id);
    }

    public function daftar_dokter()
    {
        $data['title'] = 'Daftar Dokter';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['dokter'] = $this->db->get_where('user', ['role_id' => 3])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('verif_dokter', $data);
        $this->load->view('templates/footer');
    }

    public function verif_faskes()
    {
        $data['title'] = 'Halaman Verifikasi Faslitas Kesehatan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['faskes'] = $this->db->from('biodata_puskeswan')->join('user', 'user.id=biodata_puskeswan.id_puskeswan')->get()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('verif_faskes', $data);
        $this->load->view('templates/footer');
    }

    public function detail_faskes($id)
    {
        $data['title'] = 'Detail Faskes';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['faskes'] = $this->db->get_where('user', ['id' => $id])->row_array();

        $data['bio_fas'] = $this->db->get_where('biodata_puskeswan', ['id_puskeswan' => $id])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('detail_faskes', $data);
        $this->load->view('templates/footer');
    }

    public function diterima_fas($id)
    {
        $data = [
            'is_verify' => 2
        ];
        $this->db->set($data);
        $this->db->where('id_puskeswan', $id);
        $this->db->update('biodata_puskeswan');

        $this->session->set_flashdata('message', 'Faskes berhasil diverifikasi !');
        $this->session->set_flashdata('status', 'success');
        //redirect halaman
        redirect('admin/detail_faskes/' . $id);
    }

    public function ditolak_fas($id)
    {
        $data = [
            'is_verify' => 3
        ];
        $this->db->set($data);
        $this->db->where('id_puskeswan', $id);
        $this->db->update('biodata_puskeswan');

        $this->session->set_flashdata('message', 'Faskes berhasil Di tolak !');
        $this->session->set_flashdata('status', 'success');
        //redirect halaman
        redirect('admin/detail_faskes/' . $id);
    }

    public function daftar_faskes()
    {
        $data['title'] = 'Daftar Fasilitas Kesehatan Hewan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['faskes'] = $this->db->from('biodata_puskeswan')->join('user', 'user.id=biodata_puskeswan.id_puskeswan')->get()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('verif_faskes', $data);
        $this->load->view('templates/footer');
    }
    public function transaksi()
    {
        $data['title'] = 'Daftar Transaksi Lengkap';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['transaksi'] = $this->db->get('transaksi')->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('transaksi', $data);
        $this->load->view('templates/footer');
    }

    public function payout_reques()
    {
        $data['title'] = 'Daftar Reques Payout Saldo';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['payout'] = $this->db->from('tb_payout')->join('user', 'user.id=tb_payout.id_user')->get()->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('payout_req', $data);
        $this->load->view('templates/footer');
    }

    public function payout_diterima($id)
    {
        $data = [
            'date_payout' => time(),
            'is_verify' => 1
        ];
        $this->db->set($data);
        $this->db->where('id_payout', $id);
        $this->db->update('tb_payout');

        $this->session->set_flashdata('message', 'Berhasil mengirim uang !');
        $this->session->set_flashdata('status', 'success');
        //redirect halaman
        redirect('admin/payout_reques');
    }
    public function payout_ditolak($id)
    {
        $data = [
            'date_payout' => time(),
            'is_verify' => 2
        ];
        $this->db->set($data);
        $this->db->where('id_payout', $id);
        $this->db->update('tb_payout');

        $this->session->set_flashdata('message', 'Berhasil Menolak Payout Uang !');
        $this->session->set_flashdata('status', 'success');
        //redirect halaman
        redirect('admin/payout_reques');
    }

    public function iklan()
    {
        $data['title'] = 'Kelola Iklan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['iklan'] = $this->db->get('tb_iklan')->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('iklan', $data);
        $this->load->view('templates/footer');
    }
    public function edit_iklan($id)
    {
        $data['title'] = 'Edit Iklan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['iklan'] = $this->db->get_where('tb_iklan', ['id_iklan' => $id])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('edit_iklan', $data);
        $this->load->view('templates/footer');
    }

    public function update_iklan()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id = $this->input->post('id_iklan');
        $data = [
            'nama' => $this->input->post('nama'),
            'link' => $this->input->post('link'),
            'publisher' => $user['nama'],
            'is_active' => 1
        ];

        $upload_iklan = $_FILES['image']['name'];

        if ($upload_iklan) {
            $config['file_name'] = $upload_iklan;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '60000';
            $config['upload_path'] = './assets/user/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {

                $new_iklan = $this->upload->data('file_name');
                $this->db->set('image', $new_iklan);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $this->db->set($data);
        $this->db->where('id_iklan', $id);
        $this->db->update('tb_iklan');
        $this->session->set_flashdata('message',  "Iklan berhasil di update!");
        $this->session->set_flashdata('status', 'success');
        redirect('admin/iklan');
    }

    public function upload_iklan()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $data = [
            'nama' => $this->input->post('nama'),
            'link' => $this->input->post('link'),
            'publisher' => $user['nama'],
            'is_active' => 1
        ];

        $upload_iklan = $_FILES['image']['name'];

        if ($upload_iklan) {
            $config['file_name'] = $upload_iklan;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '60000';
            $config['upload_path'] = './assets/user/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $new_iklan = $this->upload->data('file_name');
                $this->db->set('image', $new_iklan);

                $this->db->insert('tb_iklan', $data);
                $this->session->set_flashdata('message',  "Iklan berhasil di Tambahkan!");
                $this->session->set_flashdata('status', 'success');
                redirect('admin/iklan');
            } else {
                $this->session->set_flashdata('message',  $this->upload->display_errors());
                $this->session->set_flashdata('status', 'error');
                redirect('admin/iklan');
            }
        }
    }

    public function hapus_iklan($id)
    {
        $this->db->where('id_iklan', $id);
        $this->db->delete('tb_iklan');
        $this->session->set_flashdata('message',  "Iklan berhasil di Hapus!");
        $this->session->set_flashdata('status', 'success');
        redirect('admin/iklan');
    }
    public function berita()
    {
        $data['title'] = 'Kelola Berita';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['berita'] = $this->db->get('tb_berita')->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('berita', $data);
        $this->load->view('templates/footer');
    }
    public function edit_berita($id)
    {
        $data['title'] = 'Edit Berita';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['berita'] = $this->db->get_where('tb_berita', ['id_berita' => $id])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('edit_berita', $data);
        $this->load->view('templates/footer');
    }

    public function update_berita()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id = $this->input->post('id_berita');
        $data = [
            'judul' => $this->input->post('judul'),
            'diskripsi' => $this->input->post('diskripsi'),
            'isi' => $this->input->post('isi'),
            'publisher' => $user['nama'],
            'is_active' => 1
        ];

        $upload_iklan = $_FILES['image']['name'];

        if ($upload_iklan) {
            $config['file_name'] = $upload_iklan;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '60000';
            $config['upload_path'] = './assets/user/img/berita/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {

                $new_iklan = $this->upload->data('file_name');
                $this->db->set('image', $new_iklan);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $this->db->set($data);
        $this->db->where('id_berita', $id);
        $this->db->update('tb_berita');
        $this->session->set_flashdata('message',  "Berita berhasil di update!");
        $this->session->set_flashdata('status', 'success');
        redirect('admin/berita');
    }

    public function upload_berita()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $data = [
            'judul' => $this->input->post('judul'),
            'diskripsi' => $this->input->post('diskripsi'),
            'isi' => $this->input->post('isi'),
            'publisher' => $user['nama'],
            'is_active' => 1
        ];

        $upload_iklan = $_FILES['image']['name'];

        if ($upload_iklan) {
            $config['file_name'] = $upload_iklan;
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '60000';
            $config['upload_path'] = './assets/user/img/berita/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $new_iklan = $this->upload->data('file_name');
                $this->db->set('image', $new_iklan);

                $this->db->insert('tb_berita', $data);
                $this->session->set_flashdata('message',  "Berita berhasil di Tambahkan!");
                $this->session->set_flashdata('status', 'success');
                redirect('admin/berita');
            } else {
                $this->session->set_flashdata('message',  $this->upload->display_errors());
                $this->session->set_flashdata('status', 'error');
                redirect('admin/berita');
            }
        }
    }

    public function hapus_berita($id)
    {
        $this->db->where('id_berita', $id);
        $this->db->delete('tb_berita');
        $this->session->set_flashdata('message',  "Berita berhasil di Hapus!");
        $this->session->set_flashdata('status', 'success');
        redirect('admin/berita');
    }
}
