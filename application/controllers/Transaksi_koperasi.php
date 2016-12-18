<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi_koperasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_koperasi_model');
        $this->load->model('Barang_model');
        $this->load->model('Anggota_model');
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
    }

    public function index()
    {
        $transaksi_koperasi = $this->Transaksi_koperasi_model->get_all();
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Transaksi_koperasi', '/transaksi_koperasi');

        $data = array(
            'title'       => 'Transaksi_koperasi' ,
            'content'     => 'transaksi_koperasi/transaksi_kop_list', 
            'breadcrumbs' => $this->breadcrumbs->show(),
            'user'        => $user ,
            
            'transaksi_koperasi_data' => $transaksi_koperasi
        );

        $this->load->view('layout/layout', $data);
    }

    public function read($id) 
    {
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Transaksi_koperasi', '/transaksi_koperasi');
        $this->breadcrumbs->push('detail', '/transaksi_koperasi/read');
        $row = $this->Transaksi_koperasi_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title'       => 'Transaksi_koperasi' ,
                'content'     => 'transaksi_koperasi/transaksi_kop_read', 
                'breadcrumbs' => $this->breadcrumbs->show(),
                'user'        => $user ,
                
				'id_transaksi' => $row->id_transaksi,
				'tgl' => $row->tgl,
				'noanggota' => $row->noanggota,
				'id_jenis' => $row->id_jenis,
				'jumlah' => $row->jumlah,
				'user_id' => $row->user_id,
			);
            $this->load->view('layout/layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi_koperasi'));
        }
    }

    public function create() 
    {
        $user = $this->ion_auth->user()->row();
        $barang = $this->Barang_model->get_all();
        $anggota = $this->Anggota_model->get_all();
        $this->breadcrumbs->push('Transaksi_koperasi', '/transaksi_koperasi');
        $this->breadcrumbs->push('tambah', '/transaksi_koperasi/create');
        $data = array(
            'title'       => 'Transaksi_koperasi' ,
            'content'     => 'transaksi_koperasi/transaksi_kop_form', 
            'breadcrumbs' => $this->breadcrumbs->show(),
            'user'        => $user ,
            'barang_data' => $barang ,
            'anggota_data' => $anggota ,
            'button' => 'Tambah',
            'action' => site_url('transaksi_koperasi/create_action'),
		    'id_transaksi' => set_value('id_transaksi'),
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
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'tgl' => $this->input->post('tgl',TRUE),
				'noanggota' => $this->input->post('noanggota',TRUE),
				'id_jenis' => $this->input->post('id_jenis',TRUE),
				'jumlah' => $this->input->post('jumlah',TRUE),
				'user_id' => $this->input->post('user_id',TRUE),
		    );

            $this->Transaksi_koperasi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('transaksi_koperasi'));
        }
    }
    
    public function update($id) 
    {
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Transaksi_koperasi', '/transaksi_koperasi');
        $this->breadcrumbs->push('update', '/transaksi_koperasi/update');
        $barang = $this->Barang_model->get_all();
        $anggota = $this->Anggota_model->get_all();
        $row = $this->Transaksi_koperasi_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title'       => 'Transaksi_koperasi' ,
                'content'     => 'transaksi_koperasi/transaksi_kop_form', 
                'breadcrumbs' => $this->breadcrumbs->show(),
                'user'        => $user ,
                'barang_data' => $barang ,
                'anggota_data' => $anggota ,
                'button' => 'Update',
                'action' => site_url('transaksi_koperasi/update_action'),
				'id_transaksi' => set_value('id_transaksi', $row->id_transaksi),
				'tgl' => set_value('tgl', $row->tgl),
				'noanggota' => set_value('noanggota', $row->noanggota),
				'id_jenis' => set_value('id_jenis', $row->id_jenis),
				'jumlah' => set_value('jumlah', $row->jumlah),
				'user_id' => set_value('user_id', $row->user_id),
		    );
            $this->load->view('layout/layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi_koperasi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_transaksi', TRUE));
        } else {
            $data = array(
				'tgl' => $this->input->post('tgl',TRUE),
				'noanggota' => $this->input->post('noanggota',TRUE),
				'id_jenis' => $this->input->post('id_jenis',TRUE),
				'jumlah' => $this->input->post('jumlah',TRUE),
				'user_id' => $this->input->post('user_id',TRUE),
		    );

            $this->Transaksi_koperasi_model->update($this->input->post('id_transaksi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('transaksi_koperasi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Transaksi_koperasi_model->get_by_id($id);

        if ($row) {
            $this->Transaksi_koperasi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('transaksi_koperasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi_koperasi'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
		$this->form_validation->set_rules('noanggota', 'noanggota', 'trim|required');
		$this->form_validation->set_rules('id_jenis', 'id jenis', 'trim|required');
		$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
		$this->form_validation->set_rules('user_id', 'user id', 'trim|required');

		$this->form_validation->set_rules('id_transaksi', 'id_transaksi', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }


    public function test($id_brng)
    {
        $this->load->model('Barang_model');
        $data_barang = $this->Barang_model->get_by_id($id_brng);
        echo json_encode($data_barang);
    }

}

/* End of file Transaksi_koperasi.php */
/* Location: ./application/controllers/Transaksi_koperasi.php */
/* Please DO NOT modify this information : */
/* This file generated by Andre Bhaskoro (+62 82 333 817 317) At : 2016-12-06 04:59:07 */
/* http://bhas.web.id */