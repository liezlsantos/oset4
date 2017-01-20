<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Exportdata extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('SET_model');
        $this->load->model('set_instrument');
        $this->load->model('college');
        $this->load->model('department');
    }

    public function index() {
        $data = $this->session->userdata('logged_in');
        $data['SET'] = $this->SET_model->getRecords();
        $data['records'] = $this->set_instrument->getRecords();
        $this->load->view('infoanalyst/set_instrument_list', $data);
    }

    public function downloadCSV($table_name) {
        $this->load->helper('file');
        $file = './csv/'.$table_name.'.csv';
        $data = file_get_contents($file); // Read the file's contents
        $this->load->helper('download');
        force_download($table_name.'.csv', $data);
    }

}
