<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Example extends CI_Controller {
	public function __construct()
    {
        parent::__construct();        
        if (!$this->session->userdata('email')) {
            redirect('auth');
        } 

    }

	public function index()
	{		
		$data = array(
			'title' => 'Surat Keluar'
		);
		$this->template->load('template/base', 'surat_keluar/index', $data);
	}
	
	public function get_data_table()
	{
		$column_show = array('id', 'no_surat', 'tgl_surat', 'penerima', 'perihal', 'tgl_agenda');
		$column_search = array('no_surat', 'tgl_surat', 'penerima', 'perihal', 'tgl_agenda');
		$payload_join = null;
		$this->magic_table->set('surat_keluar', $column_show, $column_search, $payload_join);
		echo $this->magic_table->run();
	}

	public function add_surat_keluar()
	{				
		$this->magic_validation->set($this->input->post());
        if ($this->magic_validation->run() == false) {
            $data = array(
				'title' => 'Tambah Surat Keluar',
				'data_jenis_surat' => $this->QueryTalk->select('jenis_surat')->result_array(),		
			);			
			$this->template->load('template/base', 'surat_keluar/add', $data);
        }else {
            $data = $this->input->post();
            $except = null;
            $excess = null;
			$file_upload = [
				[
					'label' => 'file_surat',
					'path' => 'file/surat_keluar',
					'allowed_types' => 'pdf'
				]
			];

            $this->QueryTalk->insert('surat_keluar', $data, $except, $excess, $file_upload);
            $this->session->set_flashdata('message','<div id="notif" class="alert alert-success" role="alert">Data berhasil diinputkan</div>');
            redirect('surat-keluar');
        }
	}

    public function del_surat_keluar()
    {
        $this->magic_validation->set($this->input->post());
        if ($this->magic_validation->run() == true) {
            $this->QueryTalk->delete($this->input->post(), 'surat_keluar');
        }else{
            print_r($this->input->post());
        }

    }

	public function edit_surat_keluar($id = null)
	{
		$filter = [
			'id' => $id
		];
		$this->magic_validation->set($this->input->post());
		if ($this->magic_validation->run() == false) {
			$data = [
				'title' => 'Edit surat keluar',
				'data_surat' => $this->QueryTalk->select_filter('surat_keluar', $filter)->row_array()
			];
			$this->template->load('template/base', 'surat_keluar/edit', $data);
			
        }else {
			$file_upload = null;
			if ($_FILES['file_surat']['name'] != null) {
				$file_upload = [
					[
						'label' => 'file_surat',
						'path' => 'file/surat_keluar',
						'allowed_types' => 'pdf'
					]
				];
			}
			$data = $this->input->post();
            $this->QueryTalk->update($filter, $data, 'surat_keluar', $except=null, $excess=null, $file_upload);
            $this->session->set_flashdata('message','<div id="notif" class="alert alert-success" role="alert">Data berhasil diinputkan</div>');
            redirect('surat-keluar');
        }
	}

	public function detail_surat_keluar($id = null)
	{
		$filter = [
			'surat_keluar.id' => $id
		];
		$payload_join = [
			[
				'table_name' => 'surat_keluar',
				'bridge' => [
					'jenis_surat.id=surat_keluar.jenis_surat_id'
				]
			],				
		];

		$surat_keluar = $this->QueryTalk->select_filter('surat_keluar', $filter, $payload_join)->row_array();	
		$data = [
			'title' => 'Detail surat keluar',
			'data_surat' => $surat_keluar
		];
		$this->template->load('template/base', 'surat_keluar/detail', $data);
	}
}
