<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Cas_set extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('classes');
        $this->load->model('set/cas_set_model');
    }

    public function index() {
    }

    public function preview() {
        $data = $this->session->userdata('logged_in');
        $this->load->model('SET_model');
        $data['SET'] = $this->SET_model->getRecords();
        $data['preview'] = true;
        $this->load->view('set/CAS_SET_view', $data);
    }

    public function evaluate($oset_class_id) {
        $data = $this->session->userdata('logged_in');
        if ($this->cas_set_model->checkIfEvaluated($oset_class_id, $data['student_id']) == 0) {
            $data['preview'] = false;
            $data['class'] = $this->classes->getInformation($oset_class_id);
            $this->load->view('set/CAS_SET_view', $data);
        } else {
            redirect("student/home", "refresh");
        }
    }

    public function submit($oset_class_id) {
        //default fields
        $user_data = $this->session->userdata('logged_in');

        //other fields
        $data['student_id'] = $user_data['student_id'];
        $data['oset_class_id'] = $oset_class_id;

        if (!$this->cas_set_model->checkIfEvaluated($oset_class_id, $data['student_id'])) {
            //answer
            foreach ($this->input->post() as $key => $val) {
                $data[$key] = $val;
            }

            $data['part2_5'] = $this->input->post('part2_5');
            $data['part2_6'] = $this->input->post('part2_6');
            $data['part2_7'] = $this->input->post('part2_7');
            $data['part2_8'] = $this->input->post('part2_8');

            for ($i = 1; $i <= 39; $i++) {
                $data['part3_'.$i] = $this->input->post('part3_'.$i);
            }
            //insert to set table
            $this->cas_set_model->saveResponse($data);

            //insert to csv ($data, tablename)
            $this->load->model('csv');
            $this->csv->saveResponse($data, 'cas_set');

            //compute score
            $score = 0;

            $dom1 = 0; $dom2 = 0; $dom3 = 0; $dom4 = 0; $dom5 = 0; $dom6 = 0;
            for ($i = 1; $i <= 39; $i++) {
                if ($i <= 6) {
                    $dom1 += $data['part3_'.$i]*6;
                } elseif($i <= 14) {
                    $dom2 += $data['part3_'.$i]*3;
                } elseif($i <= 21) {
                    $dom3 += $data['part3_'.$i]*4;
                } elseif($i <= 27) {
                    $dom4 += $data['part3_'.$i];
                } elseif($i <= 33) {
                    $dom5 += $data['part3_'.$i]*2;
                } else {
                    $dom6 += $data['part3_'.$i]*5;
                }
            }
            $score = 0;
            $score = ($dom1 + $dom2 + $dom3 + $dom4 + $dom5 + $dom6) / 136;

            //save score
            $data2['student_id'] = $user_data['student_id'];
            $data2['score'] = $score;
            $data2['oset_class_id'] = $oset_class_id;
            $this->cas_set_model->saveScore($data2);
            //save eval status
            $data3['evaluated'] = 1;
            $this->cas_set_model->updateEvalStatus($oset_class_id, $user_data['student_id'], $data3);

            $_SESSION['msg'] = "Class evaluated.";
        }
        redirect("student/home", "refresh");
    }

    public function generateReportPerClass($oset_class_id) {
        $class = $this->classes->getInformation($oset_class_id);
        $filename = './reports/report_per_class/'.$class['instructor_code'].'-'.$class['class_id'].'.pdf';
        if (!file_exists($filename)) {
            $this->cas_set_model->generateReportPerClass($oset_class_id);
        }
        redirect(base_url($filename), 'refresh');
    }

}
