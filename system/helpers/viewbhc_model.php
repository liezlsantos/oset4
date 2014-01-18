<?php

	class viewBHC_model extends CI_Model {
		
		public function getDates($bhc_id){
			 
		    $sql = $this->db->query("SELECT date as bm_date,id FROM bhc_maldate WHERE bhc_id='$bhc_id' ORDER BY STR_TO_DATE(bm_date, '%M %Y') DESC");
		    
		    if ($sql->num_rows() == 0){
		    	return null;
		    }
		    foreach ($sql->result() as $row){
		    	$results['dates'][]=$row->bm_date;
				$results['id'][]=$row->id;
		    }
			return $results;
		}
		
		public function getDateName($date_id){
			$sql = $this->db->query("SELECT date as bm_date FROM bhc_maldate where id='$date_id'");
			$row=$sql->row();
			return $row->bm_date;
		}
		
		public function getBrgyPerIndex($date, $i, $bhc_id){
			
			$sql = $this->db->query("SELECT *
					FROM barangay, barangay_maldate, barangay_malnutrition WHERE barangay.bhc_id='$bhc_id' 
					AND barangay_maldate.barangay_id=barangay.id AND barangay_malnutrition.maldate_id=barangay_maldate.id AND date='$date' 
					AND malnutrition_id='$i'");
					
			if ($sql->num_rows() == 0){
		    	return null;
		    }
			
			$i=0;
		    foreach ($sql->result() as $row){
		    	$results[$i][1]=$row->b1;
				$results[$i][2]=$row->g1;
				$results[$i][3]=$row->b2;
				$results[$i][4]=$row->g2;
				$results[$i][5]=$row->b3;
				$results[$i][6]=$row->g3;
				$results[$i][7]=$row->b4;
				$results[$i][8]=$row->g4;
				$results[$i][9]=$row->b5;
				$results[$i][10]=$row->g5;
				$results[$i][11]=$row->b6;
				$results[$i][12]=$row->g6;
				$results[$i][13]=$row->b7;
				$results[$i][14]=$row->g7;
				$results[$i]['name']=$row->name;
				$results[$i]['child_pop']=$row->child_pop;
				$results[$i]['elligible_pop']=$row->elligible_pop;
				$results[$i]['est_pop']=$row->est_pop;
				$results[$i]['success_rate']=$row->success_rate; //success rate wrt elligible pop
		
				$i++;
		    }
		    return $results;
		}
		
		public function getAdminInfo($id){
			$sql = $this->db->query("SELECT * from users where id=$id");
			$row= $sql->row();
			return $row->name." ".$row->surname;
		}
		
		
		public function getBHCdetails($date_id){
			$bhc_id=$this->session->userdata('bhc_id');
			$sql = $this->db->query("SELECT *, municipality.name as mname, bhc.name as bname, province.name as pname, bhc_maldate.date as bm_date FROM bhc,bhc_maldate, municipality, province WHERE bhc_maldate.bhc_id='$bhc_id' AND bhc.id=bhc_maldate.bhc_id AND municipality_id=municipality.id AND province_id=province.id AND bhc_maldate.id='$date_id'");
			$row= $sql->row();
			$data['name']=$row->bname;
			$data['date']=$row->bm_date;
			$data['est_pop']=$row->est_pop;
			$data['elligible_pop']=$row->elligible_pop;
			$data['success_rate']=$row->success_rate;
			$data['child_pop']=$row->child_pop;
			$data['municipality']=$row->mname;
			$data['province']=$row->pname;
			return $data;
		}
		
		public function deleteResult($id){
			$this->db->delete('bhc_maldate', array('id' => $id)); 
		}
		
		
		public function getBHCInfo($date, $bhc_id){
			$sql = $this->db->query("SELECT * FROM bhc_malnutrition WHERE maldate_id='$date' order by malnutrition_id ASC");
		    
		    if ($sql->num_rows() == 0){
		    	return null;
		    }
			
		   foreach ($sql->result() as $row){
		    	$results[$row->malnutrition_id][1]=$row->b1;
				$results[$row->malnutrition_id][2]=$row->g1;
				$results[$row->malnutrition_id][3]=$row->b2;
				$results[$row->malnutrition_id][4]=$row->g2;
				$results[$row->malnutrition_id][5]=$row->b3;
				$results[$row->malnutrition_id][6]=$row->g3;
				$results[$row->malnutrition_id][7]=$row->b4;
				$results[$row->malnutrition_id][8]=$row->g4;
				$results[$row->malnutrition_id][9]=$row->b5;
				$results[$row->malnutrition_id][10]=$row->g5;
				$results[$row->malnutrition_id][11]=$row->b6;
				$results[$row->malnutrition_id][12]=$row->g6;
				$results[$row->malnutrition_id][13]=$row->b7;
				$results[$row->malnutrition_id][14]=$row->g7;
		   }//end for
			return $results;
		}
		
	}
		
		
?>