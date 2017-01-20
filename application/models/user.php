<?php

class User extends CI_Model {

    public function login($username, $password) {
        $sql = $this->db->query("
            SELECT username,
                password,
                user_type,
                first_name,
                last_name,
                college_code,
                salt
            FROM users
            WHERE username='$username'
        ");
        $row = $sql->row();

        if ($row) {
            $password = $password.$row->salt;
            if ($row->password == MD5($password)) {
                return $sql->row();
            }
        } else {
            // check if student
            $username = str_replace("-", "", $username);
            $sql = $this->db->query("
                SELECT name,
                    password,
                    student_id,
                    salt
                FROM student
                WHERE student_id='$username'
            ");
            $row = $sql->row();

            if ($row) {
                $password = $password.$row->salt;
                if ($row->password == MD5($password)) {
                    return $sql->row();
                }
            }
        }
        return false;
    }

    public function saveToDatabase($data) {
        $result = $this->db->insert('users',$data);
        $this->load->model('audit_trail');
        $this->audit_trail->saveToDatabase('Added user account');
    }

    public function updateRecord($data, $id) {
        $this->db->where('username', $id);
        $this->db->update('users', $data);
        $this->load->model('audit_trail');
        $this->audit_trail->saveToDatabase('Updated user account');
    }

    public function deleteRecord($id) {
        $this->db->where('username', $id);
        $this->db->delete('users');
        $this->load->model('audit_trail');
        $this->audit_trail->saveToDatabase('Deleted user account');
    }

    public function getInfo($username) {
        $sql = $this->db->query("
            SELECT *
            FROM users
            WHERE username='$username'
        ");
        return $sql->row();
    }

    public function getRecords($keyword) {
        if ($keyword == "") {
            $sql = $this->db->query("
                SELECT *
                FROM users
                ORDER BY last_name ASC
            ");
        } else {
            $sql = $this->db->query("
                SELECT *
                FROM users
                WHERE username LIKE '%$keyword%'
                    OR first_name LIKE '%$keyword%'
                    OR last_name LIKE '%$keyword%'
                ORDER BY first_name ASC
            ");
        }

        if ($sql->num_rows() == 0) {
            return null;
        }

        $i = 0;
        foreach ($sql->result() as $row) {
            $results['username'][] = $row->username;
            $results['first_name'][] = $row->first_name;
            $results['last_name'][] = $row->last_name;
            $results['college_code'][] = $row->college_code;

            $results['user_type'][$i] = "";
            if (strpos($row->user_type, '1') !== false) {
                $results['user_type'][$i] .= "administrator, ";
            }
            if (strpos($row->user_type, '2') !== false) {
                $results['user_type'][$i] .= "clerk, ";
            }
            if (strpos($row->user_type, '3') !== false) {
                $results['user_type'][$i] .= "information security analyst, ";
            }
            $results['user_type'][$i] = substr($results['user_type'][$i], 0, strlen($results['user_type'][$i])-2);
            $i++;
        }
        return $results;
    }

    public function checkUsername($username) {
        $sql = $this->db->query("
            SELECT *
            FROM users
            WHERE username='$username'
        ");

        if ($sql->num_rows() == 0) {
            return true;
        }
        return false;
    }

}
