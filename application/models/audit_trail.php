<?php

class Audit_trail extends CI_Model {

    public function saveToDatabase($action) {
        $data['date_time'] = $this->db->query("SELECT NOW() datetime")->row()->datetime;
        $data['action'] = $action;
        $user = $this->session->userdata('logged_in');

        if (isset($user['username'])) {
            $data['name'] = strtoupper($user['last_name'].', '.$user['first_name']);
            $data['username'] = $user['username'];
        } else {
            $data['name'] = $user['name'];
            $data['username'] = substr($user['student_id'], 0, 4).'-'.substr($user['student_id'], 4, 10);
        }
        $this->db->insert('audit_trail', $data);
    }

    public function getRecords($keyword, $date1, $date2) {
        if ($date1 && $date2) {
            $sql = $this->db->query("
                SELECT username,
                    name,
                    audit_id,
                    action,
                    DATE_FORMAT(date_time,'%b %d %Y %h:%i %p') date_time
                FROM audit_trail
                WHERE (
                        username LIKE '%$keyword%'
                        OR name LIKE '%$keyword%'
                        OR action LIKE '%$keyword%'
                    )
                    AND date_time > '$date1'
                    AND date_time < '$date2'
                ORDER BY audit_id
                DESC
                LIMIT 0, 30
            ");
        } elseif ($date1) {
            $sql = $this->db->query("
                SELECT username,
                    name,
                    audit_id,
                    action,
                    DATE_FORMAT(date_time,'%b %d %Y %h:%i %p') date_time
                FROM audit_trail
                WHERE (
                        username LIKE '%$keyword%'
                        OR name LIKE '%$keyword%'
                        OR action LIKE '%$keyword%'
                    )
                    AND date_time > '$date1'
                ORDER BY audit_id
                DESC
                LIMIT 0, 30
            ");
        } elseif($date2) {
            $sql = $this->db->query("
                SELECT username,
                    name,
                    audit_id,
                    action,
                    DATE_FORMAT(date_time,'%b %d %Y %h:%i %p') date_time
                FROM audit_trail
                WHERE (
                        username LIKE '%$keyword%'
                        OR name LIKE '%$keyword%'
                        OR action LIKE '%$keyword%'
                    )
                    AND date_time < '$date2'
                ORDER BY audit_id
                DESC
                LIMIT 0, 30
            ");
        } else
            $sql = $this->db->query("
                SELECT username,
                    name,
                    audit_id,
                    action,
                    DATE_FORMAT(date_time,'%b %d %Y %h:%i %p') date_time
                FROM audit_trail
                WHERE username LIKE '%$keyword%'
                    OR name LIKE '%$keyword%'
                    OR action LIKE '%$keyword%'
                ORDER BY audit_id
                DESC
                LIMIT 0, 30");
        }
        return $sql->result();
    }

    public function deleteRecord($id) {
        $this->db->where('audit_id', $id);
        $this->db->delete('audit_trail');
    }

}
