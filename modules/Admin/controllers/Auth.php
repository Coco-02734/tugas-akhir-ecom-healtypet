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
            redirect('admin');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {

            $data['title'] = 'Halaman Login | Admin Healty Pets';
            $this->load->view('admin/templates/auth_header', $data);
            $this->load->view('admin/login', $data);
            $this->load->view('admin/templates/auth_footer');
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
                    if ($user['role_id'] == 1) {
                        $data = [
                            'email' => $user['email'],
                            'role_id' => $user['role_id']
                        ];
                        $this->session->set_userdata($data);

                        redirect('admin');
                    } else {
                        $this->session->set_flashdata('message', 'Bukan halaman akses anda!');
                        $this->session->set_flashdata('status', 'error');
                        redirect('admin/auth');
                    }
                } else {
                    $this->session->set_flashdata('message', 'Password Salah !');
                    $this->session->set_flashdata('status', 'error');
                    redirect('admin/auth');
                }
            } else {
                $this->session->set_flashdata('message', 'Email Belum Di Aktivasi. Emailmu !!!');
                $this->session->set_flashdata('status', 'warning');
                redirect('admin/auth');
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
        redirect('admin/auth');
    }
}
