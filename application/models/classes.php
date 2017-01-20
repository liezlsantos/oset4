<?php

class Classes extends CI_Model {

    public function getRecords($college_code) {
        $sql = $this->db->query("
            SELECT *
            FROM class
            WHERE college_code = '$college_code'
            ORDER BY subject,
                section,
                instructor
        ");

        if ($sql->num_rows() == 0) {
            return null;
        }

        foreach ($sql->result() as $row) {
            $results['oset_class_id'][] = $row->oset_class_id;
            $results['class_id'][] = $row->class_id;
            $results['subject'][] = $row->subject;
            $results['instructor'][] = $row->instructor;
            $results['section'][] = $row->section;
            $results['activated'][] = $row->activated;
        }
        return $results;
    }

    // get records with controllers
    public function getClassesForReport($college_code, $subject, $department) {
        $sql = $this->db->query("
            SELECT oset_class_id,
                subject,
                instructor,
                section,
                controller_name
            FROM class,
                set_instrument
            WHERE college_code = '$college_code'
                AND open = '2'
                AND class.set_instrument_id = set_instrument.set_instrument_id
                AND subject LIKE '%$subject%'
                AND department_code LIKE '%$department%'
            ORDER BY subject,
                section,
                instructor
        ");

        if ($sql->num_rows() == 0) {
            return null;
        }

        foreach ($sql->result() as $row) {
            $results['oset_class_id'][] = $row->oset_class_id;
            $results['controller_name'][] = $row->controller_name;
            $results['subject'][] = $row->subject;
            $results['instructor'][] = $row->instructor;
            $results['section'][] = $row->section;
        }
        return $results;
    }

    public function getAllClassesForReport() {
        $sql = $this->db->query("
            SELECT oset_class_id,
                instructor,
                model_name,
                class_id
            FROM class,
                set_instrument
            WHERE open = '2'
                AND class.set_instrument_id = set_instrument.set_instrument_id
        ");

        if ($sql->num_rows() == 0) {
            return null;
        }

        foreach ($sql->result() as $row) {
            $results['class_id'][] = $row->class_id;
            $results['oset_class_id'][] = $row->oset_class_id;
            $results['model_name'][] = $row->model_name;
            $results['instructor_code'][] = $row->instructor;
        }
        return $results;
    }

    // faculty summarized report
    public function getFacultyWithAllClassesClosed($college, $instructor) {
        $sql = $this->db->query("
            SELECT DISTINCT instructor,
                name
            FROM class,
                faculty
            WHERE instructor = instructor_code
                AND college_code = '$college'
                AND name LIKE '%$instructor%'
                AND instructor NOT IN (
                    SELECT DISTINCT instructor
                    FROM class
                    WHERE open < '2'
                        AND activated = '1'
                )
                AND activated='1'
            ORDER BY name
        ");

        if ($sql->num_rows() == 0) {
            return null;
        }

        foreach ($sql->result() as $row) {
            $ins['instructor'][] = $row->instructor;
            $ins['name'][] = $row->name;
        }
        return $ins;
    }

    public function getRating($score) {
        $rating = "";
        if ($score >= 1) {
            if ($score <= 1.24) {
                $rating = "Outstanding";
            } elseif ($score <= 1.75) {
                $rating = "Very satisfactory";
            } elseif ($score <= 2.25) {
                $rating = "Satisfactory";
            } elseif ($score <= 2.75) {
                $rating = "Fair";
            } else {
                $rating = "Needs improvement";
            }
        }
        return $rating;
    }

    public function getClassesByInstructor($college, $instructor) {
        $sql = $this->db->query("
            SELECT subject,
                section,
                credits,
                no_of_students,
                no_of_respondents,
                score,
                score*credits total
            FROM class
            WHERE college_code = '$college'
                AND instructor = '$instructor'
                AND open = '2'
            ORDER by subject,
                section
        ");

        if ($sql->num_rows() == 0) {
            return null;
        }

        foreach ($sql->result() as $row) {
            $classes['subject'][] = $row->subject.' / '.$row->section;
            $classes['units'][] = $row->credits;
            $classes['score'][] = $row->score;
            $classes['total'][] = $row->total;
            $classes['no_of_students'][] = $row->no_of_students;
            $classes['no_of_respondents'][] = $row->no_of_respondents;
            $classes['rating'][] = $this->getRating($row->score);
        }
        return $classes;
    }

    // get Info per individual oset_class id
    public function getInformation($oset_class_id) {
        $sql = $this->db->query("
            SELECT faculty.name,
                subject,
                section,
                set_instrument_id,
                no_of_respondents,
                instructor,
                class_id,
                department_code,
                college_code
            FROM class,
                faculty
            WHERE oset_class_id = '$oset_class_id'
                AND instructor = instructor_code
            ORDER BY instructor ASC
        ");

        if ($sql->num_rows() == 0) {
            return null;
        }

        foreach ($sql->result() as $row) {
            $results['oset_class_id'] = $oset_class_id;
            $results['subject'] = $row->subject;
            $results['section'] = $row->section;
            $results['no_of_respondents'] = $row->no_of_respondents;
            $results['class_id'] = $row->class_id;
            $results['set_instrument_id'] = $row->set_instrument_id;
            $results['instructor'] = $row->name;
            $results['department_code'] = $row->department_code;
            $results['college_code'] = $row->college_code;
            $results['instructor_code'] = $row->instructor;
        }
        return $results;
    }

    //get Info per individual class id
    public function getInfo($class_id)
    {
        $sql = $this->db->query("
            SELECT instructor,
                subject,
                section,
                set_instrument_id
            FROM class
            WHERE class_id = '$class_id'
            ORDER BY instructor ASC
        ");

        if ($sql->num_rows() == 0) {
            return null;
        }

        foreach ($sql->result() as $row) {
            $instructor = $row->instructor;
            $results['instructors'][] = $row->instructor;
            $sql2 = $this->db->query("
                SELECT name,
                    faculty_id
                FROM faculty
                    WHERE instructor_code = '$instructor'
            ");
            if ($sql2->num_rows()) {
                $results['names'][] = $sql2->row()->name;
                $results['faculty_id'][] = $sql2->row()->faculty_id;
            }
        }

        $results['class_id'] = $class_id;
        $results['subject'] = $row->subject;
        $results['section'] = $row->section;
        $results['set_instrument_id'] = $row->set_instrument_id;

        return $results;
    }

    // SET instrument
    public function getActivatedClasses($college_code, $subject, $department) {
        $sql = $this->db->query("
            SELECT oset_class_id,
                faculty.name AS instructor,
                subject,
                section,
                set_instrument.name
            FROM class,
                set_instrument,
                faculty
            WHERE college_code = '$college_code'
                AND activated = '1'
                AND open = '0'
                AND class.set_instrument_id = set_instrument.set_instrument_id
                AND instructor = instructor_code
                AND subject LIKE '%$subject%'
                AND department_code LIKE '%$department%'
            ORDER BY subject,
                section,
                instructor");

        if ($sql->num_rows() == 0) {
            return null;
        }

        foreach ($sql->result() as $row) {
            $results['oset_class_id'][] = $row->oset_class_id;
            $results['subject'][] = $row->subject;
            $results['section'][] = $row->section;
            $results['instructor'][] = $row->instructor;
            $results['set_instrument'][] = $row->name;
        }
        return $results;
    }

    // evaluation mode
    public function getClassesByStatus($status, $college_code, $subject, $department) {
        if ($status == 2) {
            $sql = $this->db->query("
                SELECT oset_class_id,
                    open,
                    no_of_students,
                    no_of_respondents,
                    name,
                    instructor,
                    subject,
                    section
                FROM class,
                    faculty
                WHERE college_code = '$college_code'
                    AND activated = '1'
                    AND open > '0'
                    AND subject LIKE '%$subject%'
                    AND department_code LIKE '%$department%'
                    AND instructor=instructor_code
                ORDER BY subject,
                    section,
                    instructor
            ");

            if ($sql->num_rows() == 0) {
                return null;
            }

            foreach ($sql->result() as $row) {
                $results['oset_class_id'][] = $row->oset_class_id;
                $results['subject'][] = $row->subject;
                $results['section'][] = $row->section;
                $results['instructor'][] = $row->name;
                $results['no_of_students'][] = $row->no_of_students;
                $results['no_of_respondents'][] = $row->no_of_respondents;
                $results['status'][] = $row->open;
            }
        } else {
            $sql = $this->db->query("
                SELECT oset_class_id,
                    no_of_students,
                    no_of_respondents,
                    name,
                    instructor,
                    subject,
                    section
                FROM class,
                    faculty
                WHERE college_code = '$college_code'
                    AND activated = '1'
                    AND open = '$status'
                    AND subject LIKE '%$subject%'
                    AND department_code LIKE '%$department%'
                    AND instructor = instructor_code
                ORDER BY subject,
                    section,
                    instructor
            ");

            if ($sql->num_rows() == 0) {
                return null;
            }

            foreach ($sql->result() as $row) {
                $results['oset_class_id'][] = $row->oset_class_id;
                $results['subject'][] = $row->subject;
                $results['section'][] = $row->section;
                $results['instructor'][] = $row->name;
                $results['no_of_students'][] = $row->no_of_students;
                $results['no_of_respondents'][] = $row->no_of_respondents;
            }
        }
        return $results;
    }

    // score
    public function getScore($oset_class_id) {
        $score = 0;
        $sql = $this->db->query("
            SELECT AVG(score) average
            FROM `score_per_respondent`
            WHERE oset_class_id = '$oset_class_id'
                AND score > '0'
        ");

        if ($sql->num_rows()) {
            $score = $sql->row()->average;
        }
        return $score;
    }

    // instructors
    public function getInstructors($class_id) {
        $sql = $this->db->query("
            SELECT instructor,
                faculty_id,
                activated
            FROM class,
                faculty
            WHERE class_id = '$class_id'
                AND instructor_code = instructor
            ORDER BY instructor ASC
        ");

        if ($sql->num_rows() == 0) {
            $sql = $this->db->query("
                SELECT instructor,
                    activated
                FROM class
                    WHERE class_id = '$class_id'
                ORDER BY instructor ASC
            ");

            foreach ($sql->result() as $row) {
                $result['instructors'][] = $row->instructor;
                $result['faculty_id'][] = "";
                $result['activated'][] = $row->activated;
            }
            return $result;
        }

        foreach ($sql->result() as $row) {
            $result['instructors'][] = $row->instructor;
            $result['faculty_id'][] = $row->faculty_id;
            $result['activated'][] = $row->activated;
        }
        return $result;
    }

    public function getDistinctClass($college_code, $subject, $department) {
        $sql = $this->db->query("
            SELECT DISTINCT class_id,
                subject,
                section
            FROM class
            WHERE college_code = '$college_code'
                AND subject LIKE '%$subject%'
                AND department_code LIKE '%$department%'
            ORDER BY subject, section ASC
        ");

        if ($sql->num_rows() == 0) {
            return null;
        }

        foreach ($sql->result() as $row) {
            $results['class_id'][] = $row->class_id;
            $results['subject'][] = $row->subject;
            $results['section'][] = $row->section;
            $res = $this->getInstructors($row->class_id);
            $results['activated'][$row->class_id] = $res['activated'];
            $results['instructors'][$row->class_id] = $res['instructors'];
            $results['faculty_id'][$row->class_id] = $res['faculty_id'];
        }
        return $results;
    }

    // instructors_______________________
    public function deleteInstructor($class_id, $instructor) {
        $sql = $this->db->query("
            SELECT *
            FROM class
            WHERE class_id = '$class_id'
        ");

        if ($sql->num_rows() > 1) {
            $sql = $this->db->query("
                SELECT instructor_code
                FROM faculty
                WHERE faculty_id = '$instructor'
            ");
            $instructor = $sql->row()->instructor_code;
            $sql = $this->db->query("
                DELETE
                FROM class
                WHERE class_id = '$class_id'
                    AND instructor = '$instructor'
            ");
        } else {
            $data['instructor'] = "";
            $this->db->where('class_id', $class_id);
            $this->db->update('class', $data);
        }
    }

    public function addInstructor($class_id, $instructor) {
        $sql = $this->db->query("
            SELECT *
            FROM class
            WHERE class_id = '$class_id'
        ");

        if ($sql->num_rows() == 1) {
            if (!$sql->row()->instructor) {
                $data['instructor'] = $instructor;
                $this->db->where('class_id', $class_id);
                $this->db->update('class', $data);
                return;
            }
        }

        $data['class_id'] = $class_id;
        $data['subject'] = $sql->row()->subject;
        $data['section'] = $sql->row()->section;
        $data['credits'] = $sql->row()->credits;
        $data['no_of_students'] = $sql->row()->no_of_students;
        $data['activated'] = '0';
        $data['department_code'] = $sql->row()->department_code;
        $data['college_code'] = $sql->row()->college_code;
        $data['instructor'] = $instructor;
        $this->db->insert('class', $data);
    }

    public function checkInstructorCode($class_id, $instructor) {
        $sql = $this->db->query("
            SELECT *
            FROM class
            WHERE class_id = '$class_id'
                AND instructor = '$instructor'
        ");

        if ($sql->num_rows() == 0) {
            return true;
        }

        return false;
    }

    // delete
    public function deleteAll() {
        $sql = $this->db->query("TRUNCATE class");
        $sql = $this->db->query("TRUNCATE classlist");
    }

    public function deleteByCollegeCode($college_code) {
        $sql = $this->db->query("
            DELETE
            FROM class
            WHERE college_code = '$college_code'
        ");
    }

    // updates
    public function update($oset_class_id, $data) {
        $this->db->where('oset_class_id', $oset_class_id);
        $this->db->update('class', $data);
    }

    public function updateActivationStatus($class_id, $instructor, $data) {
        $this->db->where('instructor', $instructor);
        $this->db->where('class_id', $class_id);
        $this->db->update('class', $data);
    }

    // download
    public function downloadClasses($college_code) {
        $this->deleteByCollegeCode($college_code);

        $this->load->model('SET_model');
        $setdata = $this->SET_model->getRecords();
        $sem = $setdata['semester'];

        $sql = $this->db->query("
            SELECT *
            FROM department
            WHERE college_code = '$college_code'
        ");

        if ($sql->num_rows() == 0) {
            return null;
        }

        foreach ($sql->result() as $row) {
            $departments[] = $row->department_code;
        }

        $sem = (int)$sem;
        $sem1 = $sem + 1;
        $sem = (int)$sem * 100000;
        $sem1 = (int)$sem1 * 100000;

        $query = "SELECT classid,
            extracode,
            section,
            subject,
            instructors,
            unit,
            actualcredits,
            enlisted
            FROM osetuser_classes_view
            WHERE classid > '$sem'
                AND classid < '$sem1'
                AND subject NOT LIKE '%RESIDEN%'
                AND class NOT LIKE '%cancelled%'
                AND enlisted > '0' AND (";

        $dcounter = 0;

        while ($dcounter < count($departments)) {
            $query .= " unit = '" . $departments[$dcounter]. "'";
            $dcounter++;
            if ($dcounter < count($departments)){
                $query .= ' OR ';
            }
        }
        $query .= ")";

        $this->db_crs = $this->load->database('crs', true);

        $sql = $this->db_crs->query($query);

        if ($sql->num_rows() == 0) {
            return null;
        }

        $instructor = "";
        $subject = "";

        foreach ($sql->result() as $row) {
            if ($row->instructors == "TBA") {
                $instructor = "";
            } else {
                $instructor = $row->instructors;
            }
            $subject = $row->subject;

            if ($row->extracode != "") {
                if (substr($row->extracode,0,3) == "LAB" ) {
                    $subject = $subject." LAB";
                } else if (substr($row->extracode,0,3) == "LEC"){
                    $subject = $subject." LEC";
                }
            }

            // split instructors
            if ($index = strpos($instructor, ";") > 0) {
                $instructors = explode(';', $instructor);

                foreach ($instructors as $instructor) {
                    $instructor = trim($instructor);
                    $data = array(
                        'class_id' => $row->classid,
                        'section' => $row->section,
                        'credits' => $row->actualcredits,
                        'no_of_students' => $row->enlisted,
                        'subject' => $subject,
                        'instructor' => $instructor,
                        'department_code' => $row->unit,
                        'college_code' => $college_code
                     );

                    $this->db->insert('class', $data);

                    // import instructor
                    if ($instructor) {
                        $sql = $this->db->query("
                            SELECT *
                            FROM faculty
                            WHERE instructor_code = '$instructor'
                        ");

                        if ($sql->num_rows() == 0) {
                            $sql2 = $this->db_crs->query("
                                SELECT instructorcode,
                                    firstname,
                                    lastname
                                FROM osetuser_employees_view
                                WHERE instructorcode = '$instructor'
                            ");

                            if ($sql2->num_rows() != 0) {
                                $data = array(
                                    'name' => strtoupper($sql2->row()->firstname).Chr(32).strtoupper($sql2->row()->lastname),
                                    'instructor_code' => $sql2->row()->instructorcode
                                );

                                $this->db->insert('faculty', $data);
                            } else {
                                $data = array(
                                    'name' => $instructor,
                                    'instructor_code'  => $instructor
                                );
                                $this->db->insert('faculty', $data);
                            }
                        }
                    }
                }
            } else {
                if (!$instructor) {
                    $instructor = "";
                }
                $data = array(
                    'class_id' => $row->classid,
                    'section' => $row->section,
                    'subject' => $subject,
                    'credits' => $row->actualcredits,
                    'no_of_students' => $row->enlisted,
                    'instructor' => $instructor,
                    'department_code' => $row->unit,
                    'college_code' => $college_code
                );

                $this->db->insert('class', $data);

                // import instructor
                if ($instructor) {
                    $sql = $this->db->query("
                        SELECT *
                        FROM faculty
                        WHERE instructor_code = '$instructor'
                    ");

                    if ($sql->num_rows() == 0) {

                        $sql2 = $this->db_crs->query("
                            SELECT instructorcode,
                                employeeid,
                                firstname,
                                lastname
                            FROM osetuser_employees_view
                            WHERE instructorcode = '$instructor'
                        ");

                        if ($sql2->num_rows() != 0) {
                            $data = array(
                                'name'=> strtoupper($sql2->row()->firstname).Chr(32).strtoupper($sql2->row()->lastname),
                                'instructor_code' => $sql2->row()->instructorcode
                            );
                            $this->db->insert('faculty', $data);
                        } else {
                            $data = array(
                                'name' => $instructor,
                                'instructor_code' => $instructor
                            );
                            $this->db->insert('faculty', $data);
                        }
                    }
                }
            }
        }

        $this->db->where('college_code', $college_code);
        $value['downloaded'] = 1;
        $this->db->update('college', $value);
    }

}
