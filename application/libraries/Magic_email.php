<?php

class Magic_email
{
    // DB table
    private $table_email_queue = 'mailqueue';
    public function __construct()
    {

        $this->expiration = 60 * 5;
        $this->CI = &get_instance();
        $this->CI->load->database('default');
        $user_smtp = $this->CI->db->get('config_ppdb')->row();
        $config = Array(
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => "ssl://smtp.gmail.com",
            'smtp_user' => $user_smtp->email_host,
            'smtp_pass'   => $user_smtp->password_email_host,
            'smtp_port'   => "465",
            'crlf'    => "\r\n",
            'newline' => "\r\n",
            'smtp_timeout' => '4',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );        
        
        $this->CI->load->library('email');
        $this->CI->email->initialize($config);
    }


    public function send($email_data)
    {
        $this->CI->email->from('no-reply@ppdb-smpmuh3mplati');
        $this->CI->email->to($email_data['destination']);
        $this->CI->email->subject($email_data['subject']);
        $msg = $this->CI->load->view($email_data['tempalate'], $email_data, true);
        $this->CI->email->message($msg);            
        if ($this->CI->email->send()) {
            return true;
        } else {
            show_error($this->CI->email->print_debugger());
        }

    }
}