<?php

class Department extends CI_Model {

    public function getRecords() {
        $sql = $this->db->query("
            SELECT *
            FROM department
            ORDER BY college_code
        ");

        if ($sql->num_rows() == 0) {
            return null;
        }

        $i = 0;
        foreach ($sql->result() as $row) {
            $results['college_code'][] = $row->college_code;
            $results['department_code'][] = $row->department_code;
            $results['department_name'][] = $row->department_name;
        }
        return $results;
    }

}
