<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Simpanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Simpanan_model');
        $this->load->model('Anggota_model');
        $this->load->model('Jenis_simpan_model');
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
    }

    public function index()
    {
        $simpanan = $this->Simpanan_model->get_list_simpanan();
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Simpanan', '/simpanan');
        $data = array(
            'title'       => 'Simpanan' ,
            'content'     => 'simpanan/simpanan_list', 
            'breadcrumbs' => $this->breadcrumbs->show(),
            'user'        => $user ,
            
            'simpanan_data' => $simpanan
        );

        $this->load->view('layout/layout', $data);
    }

    public function read($noanggota) 
    {
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Simpanan', '/simpanan');
        $this->breadcrumbs->push('detail', '/simpanan/read');
        $simpanan_data= $this->Simpanan_model->get_by_noanggota($noanggota);

            $data = array(
                'title'       => 'Simpanan' ,
                'content'     => 'simpanan/simpanan_read', 
                'breadcrumbs' => $this->breadcrumbs->show(),
                'user'        => $user ,
				'simpanan_data' => $simpanan_data,
                'noanggota' => $noanggota ,
			);
            $this->load->view('layout/layout', $data);
    }

    public function create() 
    {
        $user = $this->ion_auth->user()->row();
        $anggota = $this->Anggota_model->get_all();
        $jenis_simpan = $this->Jenis_simpan_model->get_all();
        $this->breadcrumbs->push('Simpanan', '/simpanan');
        $this->breadcrumbs->push('tambah', '/simpanan/create');
        $data = array(
            'title'       => 'Simpanan' ,
            'content'     => 'simpanan/simpanan_form', 
            'breadcrumbs' => $this->breadcrumbs->show(),
            'user'        => $user ,
            'anggota'     => $anggota ,
            'jenis_simpan' => $jenis_simpan,
            'button' => 'Tambah',
            'action' => site_url('simpanan/create_action'),
		    'id_simpanan' => set_value('id_simpanan'),
		    'tgl' => set_value('tgl'),
		    'noanggota' => set_value('noanggota'),
		    'id_jenis' => set_value('id_jenis'),
		    'jumlah' => set_value('jumlah'),
		    'user_id' => set_value('user_id'),
		);
        $this->load->view('layout/layout', $data);
    }
    
    public function create_action() 
    {
        $user = $this->ion_auth->user()->row();
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'tgl' => $this->input->post('tgl',TRUE),
				'noanggota' => $this->input->post('noanggota',TRUE),
				'id_jenis' => $this->input->post('id_jenis',TRUE),
				'jumlah' => $this->input->post('jumlah',TRUE),
				'user_id' => $user->id,
		    );

            $this->Simpanan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('simpanan'));
        }
    }
    
    public function update($id) 
    {
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Simpanan', '/simpanan');
        $this->breadcrumbs->push('update', '/simpanan/update');
        
        $row = $this->Simpanan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title'       => 'Simpanan' ,
                'content'     => 'simpanan/simpanan_form', 
                'breadcrumbs' => $this->breadcrumbs->show(),
                'user'        => $user ,

                'button' => 'Update',
                'action' => site_url('simpanan/update_action'),
				'id_simpanan' => set_value('id_simpanan', $row->id_simpanan),
				'tgl' => set_value('tgl', $row->tgl),
				'noanggota' => set_value('noanggota', $row->noanggota),
				'id_jenis' => set_value('id_jenis', $row->id_jenis),
				'jumlah' => set_value('jumlah', $row->jumlah),
				'user_id' => set_value('user_id', $row->user_id),
		    );
            $this->load->view('layout/layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('simpanan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_simpanan', TRUE));
        } else {
            $data = array(
				'tgl' => $this->input->post('tgl',TRUE),
				'noanggota' => $this->input->post('noanggota',TRUE),
				'id_jenis' => $this->input->post('id_jenis',TRUE),
				'jumlah' => $this->input->post('jumlah',TRUE),
				'user_id' => $this->input->post('user_id',TRUE),
		    );

            $this->Simpanan_model->update($this->input->post('id_simpanan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('simpanan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Simpanan_model->get_by_id($id);

        if ($row) {
            $this->Simpanan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('simpanan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('simpanan'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
		$this->form_validation->set_rules('noanggota', 'noanggota', 'trim|required');
		$this->form_validation->set_rules('id_jenis', 'id jenis', 'trim|required');
		$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');

		$this->form_validation->set_rules('id_simpanan', 'id_simpanan', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Simpanan.php */
/* Location: ./application/controllers/Simpanan.php */
/* Please DO NOT modify this information : */
/* This file generated by Andre Bhaskoro (+62 82 333 817 317) At : 2016-12-05 10:11:52 */
/* http://bhas.web.id */