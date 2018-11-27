<?php

function getYears($alumni_id, $skill_id){
	global $db;
	$days = 0;
	$select = $db->query("SELECT * FROM experienced_fields LEFT JOIN work_experiences ON experienced_fields.we_id = work_experiences.we_id
		WHERE skill_id = '$skill_id' AND work_experiences.alumni_id = '$alumni_id' ORDER BY we_date_start ASC LIMIT 1");
	if($select->num_rows > 0){
		$fetch = $select->fetch_object();
		$newMin = $fetch->we_date_start;
		if(empty($fetch->we_date_end)){
			$newMax = date('Y-m-d',strtotime($fetch->we_date_end));
		}else{
			$newMax = $fetch->we_date_end;
		}
		if(!empty($fetch->we_date_end)){
			$go = 1;
			while($go == 1){
				$go = 0;
				$select2 = $db->query("SELECT MAX(we_date_end) AS max_date, we_date_end FROM experienced_fields
					LEFT JOIN work_experiences ON experienced_fields.we_id = work_experiences.we_id
					WHERE skill_id = '$skill_id' AND work_experiences.alumni_id = '$alumni_id'
					AND (we_date_start BETWEEN '$newMin' AND '$newMax')
					");
				if($select2->num_rows > 0){
					$fetch2 = $select2->fetch_object();
					if(empty($fetch2->we_date_end)){
						$newMax = date('Y-m-d');
					}else{
						$newMax = $fetch2->max_date;
					}
				}
				$select3 = $db->query("SELECT * FROM experienced_fields
					LEFT JOIN work_experiences ON experienced_fields.we_id = work_experiences.we_id
					WHERE skill_id = '$skill_id' AND work_experiences.alumni_id = '$alumni_id'
					AND (we_date_start >= '$newMax')
					");
				if($select3->num_rows > 0){
					$fetch3 = $select3->fetch_object();
					if(empty($fetch3->we_date_end)){
						$newMax = date('Y-m-d');
					}
					$dateDiff = date_diff(date_create($newMax), date_create($newMin));
					$days += $dateDiff->format("%a");
					$newMax = $fetch3->we_date_end;
					$newMin = $fetch3->we_date_start;
					$go = 1;
				}else{
					$dateDiff = date_diff(date_create($newMax), date_create($newMin));
					$days += $dateDiff->format("%a");
				}
			}
		}else{
			$dateDiff = date_diff(date_create(date('Y-m-d')), date_create($newMin));
			$days += $dateDiff->format("%a");
		}
	}
	$yrs = $days / 365;
	return ($yrs > 0) ? $yrs : false;
}