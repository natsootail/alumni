<?php
require 'db.php';
function getIsItRelated(){
	global $db;
	$data = array();
	$yrs = array();
	$gDateGrad = $db->query("SELECT date_graduated FROM alumni GROUP BY date_graduated");
	while($fDateGrad = $gDateGrad->fetch_object()){
		$dateGrad = date('Y',strtotime($fDateGrad->date_graduated));
		$yrs[] = $dateGrad;
	}
	foreach($yrs AS $yr){
		$gAlumni = $db->query("SELECT * FROM alumni WHERE date_graduated LIKE '$yr%'");
		$data[$yr]['related'] = 0;
		$data[$yr]['unrelated'] = 0;
		$unrelateds = array();
		$relateds = array();
		while($alumni = $gAlumni->fetch_object()){
			$alumni_id  = $alumni->alumni_id;
			$wes = $db->query("SELECT * FROM work_experiences WHERE alumni_id = '$alumni_id' AND we_date_end IS NULL");
			if($wes->num_rows > 0){
				while($we = $wes->fetch_object()){
					if($we->is_it_related == 1){
						$relateds[$alumni_id][] = $we->we_id;
					}else{
						$unrelateds[$alumni_id][] = $we->we_id;
					}
				}
				if(!empty($relateds[$alumni_id]) && count($relateds[$alumni_id]) > 0){
					$data[$yr]['related']++;
				}else if(!empty($unrelateds[$alumni_id]) && count($unrelateds[$alumni_id]) > 0){
					$data[$yr]['unrelated']++;
				}
			}
			$data[$yr]['total'] = $data[$yr]['related'] + $data[$yr]['unrelated'];
		}
	}
	return !empty($data) ? $data : false;
}
$result = array();
$isITRelateds = getIsItRelated();
if($isITRelateds){
	$tots = 0;
	$years = array();
	foreach($isITRelateds AS $yr => $stat){
		$years[] = $yr;
	}
	$result['years'][] = 0;
	asort($years);
	for($i = $years[0]; $i <= $years[count($years) - 1]; $i++){
		$result['years'][] = $i;
		if(array_key_exists($i, $isITRelateds)){
			if($isITRelateds[$i]['related'] > 0){
#				$result[$i]['related'] = 	number_format( ($isITRelateds[$i]['related'] / $isITRelateds[$i]['total'] ) * 100,0);
				$result[$i]['related'] = $isITRelateds[$i]['related'];
			}else{
				$result[$i]['related'] = 0;
			}
			if($isITRelateds[$i]['unrelated']){
				$result[$i]['unrelated'] = $isITRelateds[$i]['unrelated'];
#				$result[$i]['unrelated'] = 	number_format( ($isITRelateds[$i]['unrelated'] / $isITRelateds[$i]['total'] ) * 100,0);
			}else{
				$result[$i]['unrelated'] = 0;
			}
			$result[$i]['total'] = 	number_format( $isITRelateds[$i]['total'],0);
		}else{
			$result[$i]['related'] = 0;
			$result[$i]['unrelated'] = 0;
			$result[$i]['total'] = 0;
		}
		$tots+= $result[$i]['total'];
	}
	$result['tots'] = $tots > 0 ? $tots." Alumni" : 0;
	echo json_encode($result);
	exit;

}
