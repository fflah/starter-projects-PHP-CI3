<?php

class Magic_validation
{
    var $rules_text = "required|trim";
    var $rules_email = "required|trim|valid_email|is_unique[user.email]',['is_unique' => 'Email sudah pernah digunakan";
    var $rules_password = "trim|required|min_length[3]";
    var $rules_password_konfirmasi = "trim|required|matches[password]";
    var $data = [];

    function set($data_raw)
    {
        $name = array_keys($data_raw);
        foreach ($name as $key => $value) {
            $dump = array();
            array_push($dump, $value);
            $label =  ucwords($value);
            array_push($dump, $label);
            if ($label == 'Email') {
                array_push($dump, $this->rules_email);                
            }else if ($label == 'Password') {
                array_push($dump, $this->rules_password);                                
            }else if ($label == 'Password_konfirmasi') {
                array_push($dump, $this->rules_password_konfirmasi);
            }else{
                array_push($dump, $this->rules_text);
            }

            array_push($this->data, $dump);
        }
    }
    
    function run()
    {
        $this->CI = &get_instance();
        $this->CI->load->library('form_validation');
        foreach ($this->data as $key) {
            $this->CI->form_validation->set_rules($key[0], $key[1], $key[2]);
        }        
        return $this->CI->form_validation->run();
    }    
}
