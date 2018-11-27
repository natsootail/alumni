<?php

require 'db.php';
function getTotalByES(){
	global $db;
	$emps = 0;
	$unEmps = 0;
	$data = array();
	$yrs = array();
	$gDateGrad = $db->query("SELECT date_graduated FROM alumni GROUP BY date_graduated");
	while($fDateGrad = $gDateGrad->fetch_object()){
		$dateGrad = date('Y',strtotime($fDateGrad->date_graduated));
		$yrs[] = $dateGrad;
	}
	foreach($yrs AS $yr){
		$gAlumni = $db->query("SELECT * FROM alumni WHERE date_graduated LIKE '$yr%'");
		$data[$yr]['total'] = $gAlumni->num_rows;
		$data[$yr]['emps'] = 0;
		$data[$yr]['unemps'] = 0;
		while($alumni = $gAlumni->fetch_object()){
			$alumni_id  = $alumni->alumni_id;
			$wes = $db->query("SELECT * FROM work_experiences WHERE alumni_id = '$alumni_id' AND we_date_end IS NULL");
			if($wes->num_rows > 0){ $data[$yr]['emps']++; }else{ $data[$yr]['unemps']++; } 
		}
	}
	return !empty($data) ? $data : false;
}
$totalByES = getTotalByES();
$result = array();
if($totalByES){
	$totals = $db->query("SELECT * FROM alumni");
	foreach($totalByES AS $yr => $stat){
		$years[] = $yr;
	}
	asort($years);
	$result['tots'] = $totals->num_rows;
	$result['years'][] = 0;
	for($i = $years[0]; $i <= $years[count($years) - 1]; $i++){
		$result['years'][] = $i;
		if(array_key_exists($i, $totalByES)){
//			$result[$i]['emps'] = 	number_format( ($totalByES[$i]['emps'] / $totalByES[$i]['total'] ) * 100,0);
//			$result[$i]['unemps'] = 	number_format( ($totalByES[$i]['unemps'] / $totalByES[$i]['total'] ) * 100,0);
			$result[$i]['emps'] = $totalByES[$i]['emps'];
			$result[$i]['unemps'] = $totalByES[$i]['unemps'];
		}else{
			$result[$i]['emps'] = 0;
			$result[$i]['unemps'] = 0;
		}
			$result['total'] = (isset($totalByES[$i]['total'])) ?	number_format( $totalByES[$i]['total'],0) : "";
		
	}
	echo json_encode($result);
	exit;
}