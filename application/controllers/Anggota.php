<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Anggota extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Anggota_model');
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
    }

    public function index()
    {
        $anggota = $this->Anggota_model->get_all();
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Anggota', '/anggota');

        $data = array(
            'title'       => 'Anggota' ,
            'content'     => 'anggota/anggota_list', 
            'breadcrumbs' => $this->breadcrumbs->show(),
            'user'        => $user ,
            
            'anggota_data' => $anggota
        );

        $this->load->view('layout/layout', $data);
    }

    public function read($id) 
    {
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Anggota', '/anggota');
        $this->breadcrumbs->push('detail', '/anggota/read');
        $row = $this->Anggota_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title'       => 'Anggota' ,
                'content'     => 'anggota/anggota_read', 
                'breadcrumbs' => $this->breadcrumbs->show(),
                'user'        => $user ,
                
				'noanggota' => $row->noanggota,
				'namaanggota' => $row->namaanggota,
				'jk' => $row->jk,
				'tempat_lahir' => $row->tempat_lahir,
				'tgl_lahir' => $row->tgl_lahir,
				'alamat' => $row->alamat,
				'hp' => $row->hp,
				'noidentitas' => $row->noidentitas,
				//'pwd' => $row->pwd,
			);
            $this->load->view('layout/layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('anggota'));
        }
    }

    public function create() 
    {
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Anggota', '/anggota');
        $this->breadcrumbs->push('tambah', '/anggota/create');
        $data = array(
            'title'       => 'Anggota' ,
            'content'     => 'anggota/anggota_form', 
            'breadcrumbs' => $this->breadcrumbs->show(),
            'user'        => $user ,

            'button' => 'Tambah',
            'action' => site_url('anggota/create_action'),
		    'noanggota' => set_value('noanggota'),
		    'namaanggota' => set_value('namaanggota'),
		    'jk' => set_value('jk'),
		    'tempat_lahir' => set_value('tempat_lahir'),
		    'tgl_lahir' => set_value('tgl_lahir'),
		    'alamat' => set_value('alamat'),
		    'hp' => set_value('hp'),
		    'noidentitas' => set_value('noidentitas'),
		    //'pwd' => set_value('pwd'),
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
                'noanggota' => 'A'.random_string('numeric', 4),
				'namaanggota' => $this->input->post('namaanggota',TRUE),
				'jk' => $this->input->post('jk',TRUE),
				'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
				'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
				'alamat' => $this->input->post('alamat',TRUE),
				'hp' => $this->input->post('hp',TRUE),
				'noidentitas' => $this->input->post('noidentitas',TRUE),
				//'pwd' => $this->input->post('pwd',TRUE),
		    );

            $this->Anggota_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('anggota'));
        }
    }
    
    public function update($id) 
    {
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Anggota', '/anggota');
        $this->breadcrumbs->push('update', '/anggota/update');
        
        $row = $this->Anggota_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title'       => 'Anggota' ,
                'content'     => 'anggota/anggota_form', 
                'breadcrumbs' => $this->breadcrumbs->show(),
                'user'        => $user ,

                'button' => 'Update',
                'action' => site_url('anggota/update_action'),
				'noanggota' => set_value('noanggota', $row->noanggota),
				'namaanggota' => set_value('namaanggota', $row->namaanggota),
				'jk' => set_value('jk', $row->jk),
				'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
				'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
				'alamat' => set_value('alamat', $row->alamat),
				'hp' => set_value('hp', $row->hp),
				'noidentitas' => set_value('noidentitas', $row->noidentitas),
				//'pwd' => set_value('pwd', $row->pwd),
		    );
            $this->load->view('layout/layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('anggota'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('noanggota', TRUE));
        } else {
            $data = array(
				'namaanggota' => $this->input->post('namaanggota',TRUE),
				'jk' => $this->input->post('jk',TRUE),
				'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
				'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
				'alamat' => $this->input->post('alamat',TRUE),
				'hp' => $this->input->post('hp',TRUE),
				'noidentitas' => $this->input->post('noidentitas',TRUE),
				'pwd' => $this->input->post('pwd',TRUE),
		    );

            $this->Anggota_model->update($this->input->post('noanggota', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('anggota'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Anggota_model->get_by_id($id);

        if ($row) {
            $this->Anggota_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('anggota'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('anggota'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('namaanggota', 'namaanggota', 'trim|required');
		$this->form_validation->set_rules('jk', 'jk', 'trim|required');
		$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
		$this->form_validation->set_rules('tgl_lahir', 'tgl lahir', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('hp', 'hp', 'trim|required');
		$this->form_validation->set_rules('noidentitas', 'noidentitas', 'trim|required');
		//$this->form_validation->set_rules('pwd', 'pwd', 'trim|required');

		$this->form_validation->set_rules('noanggota', 'noanggota', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Anggota.php */
/* Location: ./application/controllers/Anggota.php */
/* Please DO NOT modify this information : */
/* This file generated by Andre Bhaskoro (+62 82 333 817 317) At : 2016-12-05 08:26:53 */
/* http://bhas.web.id */