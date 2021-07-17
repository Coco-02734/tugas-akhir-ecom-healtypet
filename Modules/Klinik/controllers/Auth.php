<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('klinik');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {

            $data['title'] = 'Halaman Login | Klinik Healty Pet';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('login', $data);
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        //usernya Ada
        if ($user) {
            //jika usernya aktif
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    if ($user['role_id'] == 4) {
                        $data = [
                            'email' => $user['email'],
                            'role_id' => $user['role_id']
                        ];
                        $this->session->set_userdata($data);

                        redirect('klinik');
                    } else {
                        $this->session->set_flashdata('message', 'Bukan halaman akses anda!');
                        $this->session->set_flashdata('status', 'error');
                        redirect('klinik/auth');
                    }
                } else {
                    $this->session->set_flashdata('message', 'Password Salah !');
                    $this->session->set_flashdata('status', 'error');
                    redirect('klinik/auth');
                }
            } else {
                $this->session->set_flashdata('message', 'Email Belum Di Aktivasi. Emailmu !!!');
                $this->session->set_flashdata('status', 'warning');
                redirect('klinik/auth');
            }
        } else {

            $this->session->set_flashdata('message', 'Email Belum Terdaftar');
            $this->session->set_flashdata('status', 'error');
            redirect('admin/auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        session_destroy();

        $this->session->set_flashdata('message', 'Berhasil Logout!');
        $this->session->set_flashdata('status', 'success');
        redirect('klinik/auth');
    }

    public function daftar()
    {
        $data['title'] = 'Halaman Registrasi | Klinik Healty Pets';
        $this->load->view('klinik/templates/auth_header', $data);
        $this->load->view('klinik/register', $data);
        $this->load->view('klinik/templates/auth_footer');
    }

    public function registration()
    {
        $email = $this->input->post('email', true);
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'email' => htmlspecialchars($email),
            'image' => 'default.jpg',
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'no_tlpn' => htmlspecialchars($this->input->post('no_tlpn', true)),
            'role_id' => 4,
            'is_active' => 0,
            'date_created' => time()
        ];

        // siap token
        $token = base64_encode(random_bytes(32));
        $user_token = [
            'email' => $email,
            'token' => $token,
            'date_created' => time()
        ];

        $this->db->insert('user', $data);
        $this->db->insert('user_token', $user_token);

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        $triggerBio = [
            'id_puskeswan' => $user['id'],
            'is_verify' => 0
        ];
        $this->db->insert('biodata_puskeswan', $triggerBio);

        $this->_sendEmail($token, 'verify');

        $this->session->set_flashdata('message', 'Selamat Akun Kamu Telah Terdaftar. Cek email kamu untuk aktivasi akun kamu!');
        $this->session->set_flashdata('status', 'success');
        redirect('klinik/auth');
    }

    private function _sendEmail($token, $type)
    {
        // Konfigurasi email
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'cocodevapp37@gmail.com',  // Email gmail
            'smtp_pass'   => 'Mabajaya123',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        $this->email->set_mailtype("html");
        // Email dan nama pengirim
        // Email dan nama pengirim
        $this->email->from('no-reply@healtypet.com', 'Healty Pets (No-Replay)');

        // Email penerima
        $this->email->to($this->input->post('email')); // Ganti dengan email tujuan

        if ($type == 'verify') {
            // Lampiran email, isi dengan url/path file
            $this->email->attach('');

            // Subject email
            $this->email->subject('Verifikasi Akun Klinik Healty Pets ( No-Reply )');

            // Isi email
            $this->email->message('Silahkan klik <a href=' . base_url() . 'klinik/auth/verify?email=' . $this->input->post('email') .
                '&token=' . urlencode($token) . '> Disini </a> untuk aktifkan akun');
        } else if ($type == 'forgot') {
            // Subject email
            $this->email->subject('Reset Password Akun ( No-Reply )');
            // Isi email
            $this->email->message('Silahkan klik <a href=' . base_url() . 'klinik/resetpassword?email=' . $this->input->post('email') .
                '&token=' . urlencode($token) . '> Disini </a> untuk reset password');
        }
        // Tampilkan pesan sukses atau error 
        if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim.';
        } else {
            echo 'Error! email tidak dapat dikirim.';
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if ($user_token['date_created']) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', 'Email kamu ' . $email . ' telah aktif, Silahkan login');
                    $this->session->set_flashdata('status', 'success');
                    redirect('klinik/auth');
                } else {

                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', 'Token Expired !!!');
                    $this->session->set_flashdata('status', 'error');
                    redirect('klinik/auth');
                }
            } else {
                $this->session->set_flashdata('message', 'Hayo jangan nakal tokenmu salah !!!');
                $this->session->set_flashdata('status', 'error');
                redirect('klinik/auth');
            }
        } else {
            $this->session->set_flashdata('message', 'Hayo jangan nakal !!!');
            $this->session->set_flashdata('status', 'error');
            redirect('klinik/auth');
        }
    }
}
