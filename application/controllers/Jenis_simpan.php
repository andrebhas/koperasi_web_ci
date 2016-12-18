<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Jenis_simpan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jenis_simpan_model');
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
    }

    public function index()
    {
        $jenis_simpan = $this->Jenis_simpan_model->get_all();
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Jenis_simpan', '/jenis_simpan');

        $data = array(
            'title'       => 'Jenis_simpan' ,
            'content'     => 'jenis_simpan/jenis_simpan_list', 
            'breadcrumbs' => $this->breadcrumbs->show(),
            'user'        => $user ,
            
            'jenis_simpan_data' => $jenis_simpan
        );

        $this->load->view('layout/layout', $data);
    }

    public function read($id) 
    {
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Jenis_simpan', '/jenis_simpan');
        $this->breadcrumbs->push('detail', '/jenis_simpan/read');
        $row = $this->Jenis_simpan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title'       => 'Jenis_simpan' ,
                'content'     => 'jenis_simpan/jenis_simpan_read', 
                'breadcrumbs' => $this->breadcrumbs->show(),
                'user'        => $user ,
                
				'id_jenis' => $row->id_jenis,
				'jenis_simpanan' => $row->jenis_simpanan,
				'jumlah' => $row->jumlah,
			);
            $this->load->view('layout/layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_simpan'));
        }
    }

    public function create() 
    {
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Jenis_simpan', '/jenis_simpan');
        $this->breadcrumbs->push('tambah', '/jenis_simpan/create');
        $data = array(
            'title'       => 'Jenis_simpan' ,
            'content'     => 'jenis_simpan/jenis_simpan_form', 
            'breadcrumbs' => $this->breadcrumbs->show(),
            'user'        => $user ,

            'button' => 'Tambah',
            'action' => site_url('jenis_simpan/create_action'),
		    'id_jenis' => set_value('id_jenis'),
		    'jenis_simpanan' => set_value('jenis_simpanan'),
		    'jumlah' => set_value('jumlah'),
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
				'jenis_simpanan' => $this->input->post('jenis_simpanan',TRUE),
				'jumlah' => $this->input->post('jumlah',TRUE),
		    );

            $this->Jenis_simpan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenis_simpan'));
        }
    }
    
    public function update($id) 
    {
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Jenis_simpan', '/jenis_simpan');
        $this->breadcrumbs->push('update', '/jenis_simpan/update');
        
        $row = $this->Jenis_simpan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title'       => 'Jenis_simpan' ,
                'content'     => 'jenis_simpan/jenis_simpan_form', 
                'breadcrumbs' => $this->breadcrumbs->show(),
                'user'        => $user ,

                'button' => 'Update',
                'action' => site_url('jenis_simpan/update_action'),
				'id_jenis' => set_value('id_jenis', $row->id_jenis),
				'jenis_simpanan' => set_value('jenis_simpanan', $row->jenis_simpanan),
				'jumlah' => set_value('jumlah', $row->jumlah),
		    );
            $this->load->view('layout/layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_simpan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jenis', TRUE));
        } else {
            $data = array(
				'jenis_simpanan' => $this->input->post('jenis_simpanan',TRUE),
				'jumlah' => $this->input->post('jumlah',TRUE),
		    );

            $this->Jenis_simpan_model->update($this->input->post('id_jenis', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenis_simpan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenis_simpan_model->get_by_id($id);

        if ($row) {
            $this->Jenis_simpan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenis_simpan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_simpan'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('jenis_simpanan', 'jenis simpanan', 'trim|required');
		$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');

		$this->form_validation->set_rules('id_jenis', 'id_jenis', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Jenis_simpan.php */
/* Location: ./application/controllers/Jenis_simpan.php */
/* Please DO NOT modify this information : */
/* This file generated by Andre Bhaskoro (+62 82 333 817 317) At : 2016-12-05 10:01:21 */
/* http://bhas.web.id */