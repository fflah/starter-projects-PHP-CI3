<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class TableTalk extends CI_Model{

    var $table = '';
    var $column_order = [];
    var $order = array('id' => 'asc'); // default order 
    var $column_show = [];
    var $column_search = [];
    var $join = [];
    var $table_dump = '';
    var $is_join ='';
	
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function set($table, $column_show, $column_search)
    {
        $this->table = $table;
        $this->column_show = $column_show;
        $this->column_search = $column_search;
        $this->column_order = $column_show;
    }

    public function set_join($table, $column_show, $column_search, $payload_join)
    {
        foreach ($payload_join as $index => $item) {    
            if($index == 0){
                $this->table_dump = $item['table_name'];
            }        
            foreach ($item['bridge'] as $key ) {                
                $this->join[] = $key;
            }
        }
        $this->is_join = true;
        $this->table = $table;
        $this->column_show = $column_show;
        $this->column_search = $column_search;
        $this->column_order = $column_show;
    }
    
    private function _get_datatables_query()
    {
        if ($this->is_join == true){
            $this->db->select('*');
            $this->db->from($this->table_dump);
            foreach ($this->join as $key) {
                $spells_table = explode(".",$key)[0];
                $this->db->join($spells_table, $key);
            }
        }else{
            $this->db->select($this->column_show);
            $this->db->from($this->table);
        }
        $i = 0;
        foreach ($this->column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {
                if($i===0) // looping awal
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) 
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            if ($this->is_join == true){
                $order = $this->table_dump.'.'.key($this->order);
                $this->db->order_by(strval($order), $this->order[key($this->order)]);

            }else{
                $order = $this->order;
                $this->db->order_by(key($order), $order[key($order)]);
            }

        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();        
        return $query->result_array();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->_get_datatables_query();
        return $this->db->count_all_results();
    }
	
}