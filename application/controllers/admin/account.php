<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Account extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user');
        $this->load->model('SET_model');
    }

    public function index() {
        $data = $this->session->userdata('logged_in');
        $data['records'] = $this->user->getRecords('');
        $data['SET'] = $this->SET_model->getRecords();
        unset($_SESSION['keyword']);
        $this->load->view('admin/account_list', $data);
    }

    public function search() {
        $data = $this->session->userdata('logged_in');

        if (empty($_POST)) {
            if ($_SESSION['keyword']) {
                $data['records'] = $this->user->getRecords($_SESSION['keyword']);
                $data['keyword'] = $_SESSION['keyword'];
            } else {
                $data['records'] = $this->user->getRecords('');
            }
        } else {
            $data['records'] = $this->user->getRecords($this->input->post('keyword'));
            $_SESSION['keyword'] = $this->input->post('keyword');
            $data['keyword'] = $this->input->post('keyword');
        }
        $data['SET'] = $this->SET_model->getRecords();
        $this->load->view('admin/account_list', $data);
    }

    public function add() {
        $data = $this->session->userdata('logged_in');
        $this->load->model('college');
        $data['colleges'] = $this->college->getRecords();
        $data['SET'] = $this->SET_model->getRecords();
        $data['msg'] = "User account added.";
        $this->load->view('admin/add_user', $data);
    }

    public function delete($username) {
        $this->user->deleteRecord($username);

        $_SESSION['msg'] = "User account deleted.";
        if (!isset($_SESSION['keyword'])) {
            $_SESSION['keyword'] = "";
        }

        redirect('admin/account/search', 'refresh');
    }

    public function edit($username) {
        $data = $this->session->userdata('logged_in');
        $data['info']= $this->user->getInfo($username);
        $this->load->model('college');
        $data['colleges'] = $this->college->getRecords();
        $data['SET']=$this->SET_model->getRecords();
        $this->load->view('admin/edit_user', $data);
    }

    public function submit() {
        if ($this->input->post('password')!= $this->input->post('password2')) {
            $data = $this->session->userdata('logged_in');
            $data['user'] = $this->input->post();
            $data['user']['user_type'] = $this->getUserRoleCode();
            $data['error_msg'] = "Passwords do not match.";
            $this->load->model('college');
            $data['colleges'] = $this->college->getRecords();
            $this->load->view('admin/add_user', $data);
        } else {
            if (!($this->input->post('isAdmin') ||
                $this->input->post('isClerk') ||
                $this->input->post('isAnalyst'))) {
                $data = $this->session->userdata('logged_in');
                $data['user'] = $this->input->post();
                $data['user']['user_type'] = $this->getUserRoleCode();
                $data['error_msg'] = "Please check at least one user role.";
                $this->load->model('college');
                $data['colleges'] = $this->college->getRecords();
                $this->load->view('admin/add_user', $data);
            } else {
                $valid = $this->user->checkUsername($this->input->post('username'));

                if (!$valid) {
                    $data = $this->session->userdata('logged_in');
                    $data['error_msg'] = "Username already exists.";
                    $data['user'] = $this->input->post();
                    $data['user']['user_type'] = $this->getUserRoleCode();
                    $this->load->model('college');
                    $data['colleges'] = $this->college->getRecords();
                    $this->load->view('admin/add_user', $data);
                } else {
                    $salt = substr(MD5(uniqid(rand(), true)), 0, 6);
                    $data= array(
                        'username' => $this->input->post('username'),
                        'first_name' => $this->input->post('first_name'),
                        'last_name' => $this->input->post('last_name'),
                        'user_type' => $this->getUserRoleCode(),
                        'salt' => $salt,
                        'password' => MD5($this->input->post('password').$salt)
                        );

                    if ($this->input->post('isClerk')) {
                        $data['college_code'] = $this->input->post('college_code');
                    }

                    $username = $this->user->saveToDatabase($data);
                    $_SESSION['msg'] = "User account added.";
                    redirect('admin/account/', 'refresh');
                }
            }
        }
    }

    public function update($username)
    {
        if ($this->input->post('changePassword') == "yes") {
            if ($this->input->post('password')!= $this->input->post('password2')) {
                $data = $this->session->userdata('logged_in');
                $data['user'] = $this->input->post();
                $data['user']['username'] = $username;
                $data['user']['user_type'] = $this->getUserRoleCode();
                $data['error_msg'] = "Passwords do not match.";
                $this->load->model('college');
                $data['colleges'] = $this->college->getRecords();
                $this->load->view('admin/edit_user', $data);
            } else {
                $row = $this->user->getInfo($username);
                $salt = $row->salt;

                $data= array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'user_type' => $this->getUserRoleCode(),
                'password' => MD5($this->input->post('password').$salt)
                );

                if ($this->input->post('isClerk')) {
                    $data['college_code'] = $this->input->post('college_code');
                } else {
                    $data['college_code'] = "";
                }

                $this->user->updateRecord($data, $username);
                $_SESSION['msg'] = "User account updated.";
                redirect('admin/account/search', 'refresh');
            }
        } else {
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'user_type' => $this->getUserRoleCode()
            );

            if ($this->input->post('isClerk')) {
                $data['college_code'] = $this->input->post('college_code');
            } else {
                $data['college_code'] = "";
            }

            $this->user->updateRecord($data, $username);
            $_SESSION['msg'] = "User account updated.";
            redirect('admin/account/search', 'refresh');
        }

    }

    function getUserRoleCode() {
        $user_type = "";
        if ($this->input->post('isAdmin')) {
            $user_type .= "1";
        }
        if ($this->input->post('isClerk')) {
            $user_type .= "2";
        }
        if ($this->input->post('isAnalyst')) {
            $user_type .= "3";
        }

        return $user_type;
    }

}
