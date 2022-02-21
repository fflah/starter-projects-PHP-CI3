<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        if($this->session->userdata('email')){
            redirect('dashboard');
        }    
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';            
            $this->load->view('auth/login', $data);
       
        }else{
            $this->_login();
        }
        
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        //jika user ada
        if ($user) {
            //jika user aktif
            if ($user['is_active'] == 'active') {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'user_id' => $user['id'],
                        'active' => $user['is_active'],
                        'nama_lengkap' => $user['nama_lengkap'],
                        'id_group_user' => $user['id_group_user'],
                        'id_jabatan' => $user['id_jabatan'],
                    ];

                    $this->session->set_userdata($data);
                    redirect('dashboard');                    
                } else {
                    $this->session->set_flashdata('message','<div id="notif" class="alert alert-danger" role="alert">Password salah</div>');
                    redirect('auth');
                }

            }else {
            $this->session->set_flashdata('message','<div id="notif" class="alert alert-danger" role="alert">Email belum diaktifasi</div>');
            redirect('auth');
            }

        }else {            
            $this->session->set_flashdata('message','<div id="notif" class="alert alert-danger" role="alert">Email atau password yang anda masukan salah</div>');
            redirect('auth');
        }
    }


    public function register()
    {
        $this->magic_validation->set($this->input->post());
        if ($this->magic_validation->run() == false) {
            $data['title'] = 'Arsip Surat | Registrasi';
            $this->load->view('auth/register', $data);
        }else {
            $data = $this->input->post();
            $except = array('password_konfirmasi');
            $excess = [
                'id_group_user' => 3,
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),

            ];
            $this->QueryTalk->insert('user', $data, $except, $excess);
            $this->session->set_flashdata('message','<div id="notif" class="alert alert-success" role="alert">Registrasi berhasil, silakan login</div>');
            redirect('login');
        }
        
    }

    public function logout()
    { 
        $data = ['email', 'active', 'nama_lengkap', 'id_group_user', 'id_jabatan'];
        foreach($data as $value){
            $this->session->unset_userdata($value);
        }        
        $this->session->set_flashdata('message','<div id="notif" class="alert alert-success" role="alert">Anda berhasil Logout</div>');
        redirect('auth');
    }

}