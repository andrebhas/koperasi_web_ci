<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Shu_model');
        $this->load->model('Barang_model');
        $this->load->model('Anggota_model');
        $this->load->model('Transaksi_koperasi_model');
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
    }

    public function index()
    {
        $shu = $this->Shu_model->get_all();
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Shu', '/shu');

        $data = array(
            'title'       => 'Shu' ,
            'content'     => 'shu/shu_list', 
            'breadcrumbs' => $this->breadcrumbs->show(),
            'user'        => $user ,
            
            'shu_data' => $shu
        );

        $this->load->view('layout/layout', $data);
    }

    public function read($id) 
    {
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Shu', '/shu');
        $this->breadcrumbs->push('detail', '/shu/read');
        $row = $this->Shu_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title'       => 'Shu' ,
                'content'     => 'shu/shu_read', 
                'breadcrumbs' => $this->breadcrumbs->show(),
                'user'        => $user ,
                
				'id_shu' => $row->id_shu,
				'tgl' => $row->tgl,
				'noanggota' => $row->noanggota,
				'jml_shu_diterima' => $row->jml_shu_diterima,
				'jml_shu_keseluruhan' => $row->jml_shu_keseluruhan,
				'laba' => $row->laba,
			);
            $this->load->view('layout/layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('shu'));
        }
    }

    public function create() 
    {
        $user = $this->ion_auth->user()->row();
        $anggota = $this->Anggota_model->get_all();
        $transaksi_kop = $this->Transaksi_koperasi_model->get_total_transaksi_kop()->total_transaksi;
        $json_anggota = json_encode($anggota);
        $this->breadcrumbs->push('Shu', '/shu');
        $this->breadcrumbs->push('tambah', '/shu/create');
        $data = array(
            'title'        => 'Shu' ,
            'content'      => 'shu/shu_form', 
            'breadcrumbs'  => $this->breadcrumbs->show(),
            'user'         => $user ,
            'transaksi_kop'=> $transaksi_kop ,
            'anggota_data' => $json_anggota ,
            'button'       => 'Tambah',
            'action'       => site_url('shu/create_action'),
            'id_shu'       => set_value('id_shu'),
            'tgl'          => set_value('tgl'),
		    'noanggota' => set_value('noanggota'),
		    'jml_shu_diterima' => set_value('jml_shu_diterima'),
		    'jml_shu_keseluruhan' => set_value('jml_shu_keseluruhan'),
		    'laba' => set_value('laba'),
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
				'jml_shu_diterima' => $this->input->post('jml_shu_diterima',TRUE),
				'jml_shu_keseluruhan' => $this->input->post('jml_shu_keseluruhan',TRUE),
				'laba' => $this->input->post('laba',TRUE),
		    );

            $this->Shu_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('shu'));
        }
    }
    
    public function update($id) 
    {
        $user = $this->ion_auth->user()->row();
        $this->breadcrumbs->push('Shu', '/shu');
        $this->breadcrumbs->push('update', '/shu/update');
        
        $row = $this->Shu_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title'       => 'Shu' ,
                'content'     => 'shu/shu_form', 
                'breadcrumbs' => $this->breadcrumbs->show(),
                'user'        => $user ,

                'button' => 'Update',
                'action' => site_url('shu/update_action'),
				'id_shu' => set_value('id_shu', $row->id_shu),
				'tgl' => set_value('tgl', $row->tgl),
				'noanggota' => set_value('noanggota', $row->noanggota),
				'jml_shu_diterima' => set_value('jml_shu_diterima', $row->jml_shu_diterima),
				'jml_shu_keseluruhan' => set_value('jml_shu_keseluruhan', $row->jml_shu_keseluruhan),
				'laba' => set_value('laba', $row->laba),
		    );
            $this->load->view('layout/layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('shu'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_shu', TRUE));
        } else {
            $data = array(
				'tgl' => $this->input->post('tgl',TRUE),
				'noanggota' => $this->input->post('noanggota',TRUE),
				'jml_shu_diterima' => $this->input->post('jml_shu_diterima',TRUE),
				'jml_shu_keseluruhan' => $this->input->post('jml_shu_keseluruhan',TRUE),
				'laba' => $this->input->post('laba',TRUE),
		    );

            $this->Shu_model->update($this->input->post('id_shu', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('shu'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Shu_model->get_by_id($id);

        if ($row) {
            $this->Shu_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('shu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('shu'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
		$this->form_validation->set_rules('noanggota', 'noanggota', 'trim|required');
		$this->form_validation->set_rules('jml_shu_diterima', 'jml shu diterima', 'trim|required');
		$this->form_validation->set_rules('jml_shu_keseluruhan', 'jml shu keseluruhan', 'trim|required');
		$this->form_validation->set_rules('laba', 'laba', 'trim|required');

		$this->form_validation->set_rules('id_shu', 'id_shu', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "shu.xls";
        $judul = "shu";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
		xlsWriteLabel($tablehead, $kolomhead++, "Tgl");
		xlsWriteLabel($tablehead, $kolomhead++, "Noanggota");
		xlsWriteLabel($tablehead, $kolomhead++, "Jml Shu Diterima");
		xlsWriteLabel($tablehead, $kolomhead++, "Jml Shu Keseluruhan");
		xlsWriteLabel($tablehead, $kolomhead++, "Laba");

		foreach ($this->Shu_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
		    xlsWriteLabel($tablebody, $kolombody++, $data->tgl);
		    xlsWriteLabel($tablebody, $kolombody++, $data->noanggota);
		    xlsWriteNumber($tablebody, $kolombody++, $data->jml_shu_diterima);
		    xlsWriteNumber($tablebody, $kolombody++, $data->jml_shu_keseluruhan);
		    xlsWriteNumber($tablebody, $kolombody++, $data->laba);

		    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function getdata_transaksi($noanggota)
    {
        $transaksi = $this->Transaksi_koperasi_model->get_by_noanggota($noanggota);
        echo json_encode($transaksi);
    }

    public function get_total($noanggota)
    {
        $total = $this->Transaksi_koperasi_model->get_total_transaksi($noanggota);
        echo json_encode($total);
    }

}

/* End of file Shu.php */
/* Location: ./application/controllers/Shu.php */
/* Please DO NOT modify this information : */
/* This file generated by Andre Bhaskoro (+62 82 333 817 317) At : 2016-12-16 10:48:45 */
/* http://bhas.web.id */