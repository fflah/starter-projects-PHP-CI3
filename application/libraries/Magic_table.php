<?php

class Magic_table
{
    var $data = [];
    public function set($table, $where, $field_show, $field_filter, $payload_join=null)
    {
        $this->CI = &get_instance();
        $this->CI->load->model('TableTalk');
        if ($payload_join != null) {
            $this->CI->TableTalk->set_join($table, $where, $field_show, $field_filter, $payload_join);
            $this->data = $this->CI->TableTalk->get_datatables();
        }else{
            $this->CI->TableTalk->set($table, $where, $field_show, $field_filter);
            $this->data = $this->CI->TableTalk->get_datatables(); 
        }
    }
    
    
    public function run($spells=null)
    {        
        $this->CI = &get_instance();
        $list = null;
        $output = array();
        if ($spells != null) {
            $list = $spells['data'];
            $output["draw"] = $_POST['draw'];
            $output["recordsTotal"] = $spells['recordsTotal'];
            $output["recordsFiltered"] = $spells['recordsFiltered'];
        }else{
            $list = $this->data;            
            $output["draw"] = $_POST['draw'];
            $output["recordsTotal"] = $this->CI->TableTalk->count_all();
            $output["recordsFiltered"] = $this->CI->TableTalk->count_filtered();
            
        }
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $value) {
            $row = array();
            $no++;
            foreach ($value as $key => $item) {
                $row['no'] = $no;
                $row[$key] = $item;
            }
            $data[] = $row;
        }
        $output['data'] = $data;
        return json_encode($output);
    }

}