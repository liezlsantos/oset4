<?php

class College extends CI_Model {

    public function saveToDatabase($data) {
        $result = $this->db->insert('college',$data);

        if ($result) {
            return $this->db->insert_id();
        }

        return false;
    }

    public function updateRecord($data, $id) {
        $this->db->where('college_code', $id);
        $this->db->update('college', $data);
    }

    public function deleteRecord($id) {
        $this->db->where('college_code', $id);
        $this->db->delete('college');
    }

    public function getInfo($college_code) {
        $sql = $this->db->query("
            SELECT *
            FROM college
            WHERE college_code = '$college_code'
        ");
        return $sql->row();
    }

    public function getRecords() {
        $sql = $this->db->query("
            SELECT *
            FROM college
            ORDER BY college_name ASC
        ");

        if ($sql->num_rows() == 0) {
            return null;
        }

        $i = 0;
        foreach ($sql->result() as $row) {
            $results['college_code'][] = $row->college_code;
            $results['college_name'][] = $row->college_name;
            $results['downloaded'][] = $row->downloaded;
        }
        return $results;
    }

    public function getDepartments($college_code) {
        $sql = $this->db->query("
            SELECT *
            FROM department
            WHERE college_code = '$college_code'
            ORDER BY department_name ASC
        ");

        if ($sql->num_rows() == 0) {
            return null;
        }

        $i = 0;
        foreach ($sql->result() as $row) {
            $results['department_code'][] = $row->department_code;
            $results['department_name'][] = $row->department_name;
        }
        return $results;
    }

    public function resetDownloadStatus() {
        $value['downloaded'] = 0;
        $this->db->update('college', $value);
    }

    public function checkCollegeCode($college_code) {
        $sql = $this->db->query("
            SELECT *
            FROM college
            WHERE college_code='$college_code'
        ");

        if ($sql->num_rows() == 0) {
            return true;
        }
        return false;
    }

}
