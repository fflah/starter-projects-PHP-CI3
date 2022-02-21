<?php
class QueryTalk extends CI_Model
{
    var $join = [];
    var $table_dump = '';
    var $is_join ='';

    public function insert($table, $data, $except=null, $excess=null, $file_upload=null)
    {
        if ($except != null && $excess == null) {
            foreach ($except as $key => $value) {
                unset($data[$value]);
            }
        }else if ($except == null && $excess != null) {
            foreach ($excess as $key => $value) {
                $data[$key] = $value;
            }
        }else if ($except != null && $excess != null) {
            foreach ($except as $key => $value) {
                unset($data[$value]);
            }
            foreach ($excess as $key => $value) {
                $data[$key] = $value;
            }
        }

        if ($file_upload != null) {
            foreach ($file_upload as $key => $value) {
                $config['upload_path']          = $value['path'];
                // $config['allowed_types']        = 'pdf|png|jpg|jpeg';
                $config['allowed_types']        = 'pdf';
                $config['max_size']             = 2000;
                $config['encrypt_name']			= TRUE;
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload($value['label'])) {
                    $error = array('error' => $this->upload->display_errors());
                    print_r($error);
                } else {
                    $arr_image = $this->upload->data();
                    $data[$value['label']] = $arr_image['file_name'];
                }
            }
        }
        
        return $this->db->insert($table, $data);
    }

    public function update($where, $data, $table,  $except=null, $excess=null, $file_upload=null)
    {
        if ($except != null && $excess == null) {
            foreach ($except as $key => $value) {
                unset($data[$value]);
            }
        }else if ($except == null && $excess != null) {
            foreach ($excess as $key => $value) {
                $data[$key] = $value;
            }
        }else if ($except != null && $excess != null) {
            foreach ($except as $key => $value) {
                unset($data[$value]);
            }
            foreach ($excess as $key => $value) {
                $data[$key] = $value;
            }
        }
        
        if ($file_upload != null) {
            foreach ($file_upload as $key => $value) {
                $config['upload_path']          = $value['path'];                
                $config['allowed_types']        = $value['allowed_types'];
                $config['max_size']             = 2000;
                $config['encrypt_name']			= TRUE;
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload($value['label'])) {
                    $error = array('error' => $this->upload->display_errors());
                    print_r($error);
                } else {
                    $arr_image = $this->upload->data();
                    $data[$value['label']] = $arr_image['file_name'];
                }
            }
        }
        
        $this->db->where($where);
		return $this->db->update($table, $data);
    }

    public function delete($where, $table)
    {
        $this->db->where($where);
		return $this->db->delete($table);
    }

    public function select($table)
    {
        return $this->db->get($table);
    }

    private function set_join($table, $filter, $payload_join)
    {
        foreach ($payload_join as $item) {            
            $this->table_dump = $item['table_name'];
            foreach ($item['bridge'] as $key ) {                
                $this->join[] = $key;
            }
        }
        $this->db->select('*');
        $this->db->from($table);
        foreach ($this->join as $key) {
            $spells_table = explode(".",$key)[0];
            $this->db->join($spells_table, $key);
        }    
        $this->db->where($filter);    
        
        return $this->db->get();
    }
    
    public function select_filter($table, $filter, $setjoin=null)
    {
        $query = null;
        if ($setjoin != null) {
            $query = $this->set_join($table, $filter, $setjoin);
        }else{
            $this->db->select('*');
            $this->db->from($table);
            $this->db->where($filter);
            $query = $this->db->get();
        }      
        
        return $query;
    }

    public function select_join()
    {
        $this->db->select('*');
        $this->db->from('blogs');
        $this->db->join('comments', 'comments.id = blogs.id');
        $query = $this->db->get();
        return $query;
    }

}

