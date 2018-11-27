<?php

require 'db.php';
function getTotalByCourse($course){
	global $db;
	$data = array();
	$yrs = array();
	$gYrs = $db->query("SELECT date_graduated FROM alumni WHERE course = '$course' GROUP BY date_graduated");
	while($fYrs = $gYrs->fetch_object()){
		$yrs[] = date('Y',strtotime($fYrs->date_graduated));
	}
	foreach($yrs AS $yr){
		$select = $db->query("SELECT * FROM alumni WHERE course = '$course' AND date_graduated LIKE '$yr%'");
		$data[$yr]['total'] = $select->num_rows;
		$data[$yr]['emps'] = 0;
		$data[$yr]['semps'] = 0;
		$data[$yr]['unemps'] = 0;
		while($fetch = $select->fetch_object()){
			$alumni_id = $fetch->alumni_id;
			$wes = $db->query("SELECT * FROM work_experiences WHERE alumni_id = '$alumni_id' AND we_date_end IS NULL ");
			if($wes->num_rows > 0){
				$we = $wes->fetch_object();
				if(empty($we->company_name)){ $data[$yr]['semps']++; }else{ $data[$yr]['emps']++; }
			}else{
				$data[$yr]['unemps']++;
			}
		}
	}
	return !empty($data) ? $data : false;
}
$result = array();
$result1 = array();
$byCourse = getTotalByCourse($_POST['course']);
if($byCourse){
	$tots = 0;
	foreach($byCourse AS $yr => $data){
		$years[] = $yr;
	}
	asort($years);
	$result1['years'][] = 0;
	for($i = $years[0]; $i <= $years[count($years) - 1]; $i++){
		$result1['years'][] = $i;
		if(array_key_exists($i, $byCourse)){
#			$result1[$i]['emps'] = 	number_format( ($byCourse[$i]['emps'] / $byCourse[$i]['total'] ) * 100,0);
#			$result1[$i]['semps'] = 	number_format( ($byCourse[$i]['semps'] / $byCourse[$i]['total'] ) * 100,0);
#			$result1[$i]['unemps'] = 	number_format( ($byCourse[$i]['unemps'] / $byCourse[$i]['total'] ) * 100,0);
			$result1[$i]['emps'] = $byCourse[$i]['emps'];
			$result1[$i]['semps'] = $byCourse[$i]['semps'];
			$result1[$i]['unemps'] = $byCourse[$i]['unemps'];
			$result1[$i]['total'] = 	number_format( $byCourse[$i]['total'],0);
		}else{
			$result1[$i]['emps'] = 0;
			$result1[$i]['semps'] = 0;
			$result1[$i]['unemps'] = 0;
			$result1[$i]['total'] = 0;
		}
		$tots += (isset($byCourse[$i]['total'])) ? $byCourse[$i]['total'] : 0;
	}
	$result1['tots'] = $tots;

	echo json_encode($result1);
	exit;
}
