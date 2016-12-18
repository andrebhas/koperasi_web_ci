<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
    }

    public function index()
    {
        $barang = $this->Barang_model->get_all();
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Barang', '/barang');

        $data = array(
            'title'       => 'Barang' ,
            'content'     => 'barang/barang_list', 
            'breadcrumbs' => $this->breadcrumbs->show(),
            'user'        => $user ,
            
            'barang_data' => $barang
        );

        $this->load->view('layout/layout', $data);
    }

    public function read($id) 
    {
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Barang', '/barang');
        $this->breadcrumbs->push('detail', '/barang/read');
        $row = $this->Barang_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title'       => 'Barang' ,
                'content'     => 'barang/barang_read', 
                'breadcrumbs' => $this->breadcrumbs->show(),
                'user'        => $user ,
                
				'id_jenis' => $row->id_jenis,
				'nama_barang' => $row->nama_barang,
				'harga' => $row->harga,
			);
            $this->load->view('layout/layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }
    }

    public function create() 
    {
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Barang', '/barang');
        $this->breadcrumbs->push('tambah', '/barang/create');
        $data = array(
            'title'       => 'Barang' ,
            'content'     => 'barang/barang_form', 
            'breadcrumbs' => $this->breadcrumbs->show(),
            'user'        => $user ,

            'button' => 'Tambah',
            'action' => site_url('barang/create_action'),
		    'id_jenis' => set_value('id_jenis'),
		    'nama_barang' => set_value('nama_barang'),
		    'harga' => set_value('harga'),
		);
        $this->load->view('layout/layout', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'nama_barang' => $this->input->post('nama_barang',TRUE),
				'harga' => $this->input->post('harga',TRUE),
		    );

            $this->Barang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('barang'));
        }
    }
    
    public function update($id) 
    {
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Barang', '/barang');
        $this->breadcrumbs->push('update', '/barang/update');
        
        $row = $this->Barang_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title'       => 'Barang' ,
                'content'     => 'barang/barang_form', 
                'breadcrumbs' => $this->breadcrumbs->show(),
                'user'        => $user ,

                'button' => 'Update',
                'action' => site_url('barang/update_action'),
				'id_jenis' => set_value('id_jenis', $row->id_jenis),
				'nama_barang' => set_value('nama_barang', $row->nama_barang),
				'harga' => set_value('harga', $row->harga),
		    );
            $this->load->view('layout/layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jenis', TRUE));
        } else {
            $data = array(
				'nama_barang' => $this->input->post('nama_barang',TRUE),
				'harga' => $this->input->post('harga',TRUE),
		    );

            $this->Barang_model->update($this->input->post('id_jenis', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('barang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Barang_model->get_by_id($id);

        if ($row) {
            $this->Barang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('barang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('nama_barang', 'nama barang', 'trim|required');
		$this->form_validation->set_rules('harga', 'harga', 'trim|required');

		$this->form_validation->set_rules('id_jenis', 'id_jenis', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */
/* Please DO NOT modify this information : */
/* This file generated by Andre Bhaskoro (+62 82 333 817 317) At : 2016-12-05 09:58:11 */
/* http://bhas.web.id */