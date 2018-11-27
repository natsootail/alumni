<?php

session_start();
require 'db.php';
require 'functions-validate.php';
$alumni_id = validate($_SESSION['alumni_id']);

$company_name = (isset($_POST['company-name']) && !empty($_POST['company-name'])) ? "'".validate($_POST['company-name'])."'" : "NULL";
$position_name = (isset($_POST['position-name']) && !empty($_POST['position-name'])) ? "'".validate($_POST['position-name'])."'" : "NULL";
$position_level = (isset($_POST['position-level']) && !empty($_POST['position-level'])) ? "'".validate($_POST['position-level'])."'" : "NULL";
$date_start = validate($_POST['date-start']);
$date_end = (isset($_POST['date-end']) && !empty($_POST['date-end'])) ? "'".validate($_POST['date-end'])."'" : "NULL";
$it_related = validate($_POST['is_it_related']);
$we_id = validate($_POST['we_id']);
$err = 0;
$result = array();

if($db->query("UPDATE work_experiences SET company_name = $company_name, position_name = $position_name,
	position_level = $position_level, we_date_start = '$date_start', we_date_end = $date_end,
	is_it_related = '$it_related' WHERE we_id = '$we_id' AND alumni_id = '$alumni_id' ")){
		
}else{
	$err++;
}

foreach($_POST['fields'] AS $ef_id => $skill_id){
	if($skill_id > 0){
		$efs2 = $db->query("SELECT * FROM experienced_fields WHERE ef_id = '$ef_id' AND we_id = '$we_id'");
		if($efs2->num_rows == 0){
			if($db->query("INSERT INTO experienced_fields VALUES(NULL, '$we_id', '$skill_id')")){
			}else{
				$err++;
			}
		}
		$efs = $db->query("SELECT * FROM experienced_fields WHERE we_id = '$we_id' AND skill_id = '$skill_id'");
		if($efs->num_rows == 0){
			if($db->query("INSERT INTO experienced_fields VALUES(NULL, '$we_id', '$skill_id')")){
			}else{
				$err++;
			}
		}
	}
}

if($err == 0){
	/****** ADD TO LOGS ******/
		$activity = "Update Work Experience.";
		$tbl = "work_experiences, experienced_fields";
		$prev = "";
		$new = "";
		$datetime = date('Y-m-d H:i:s');
		$remarks = "Alumni Updated Work Experience. ($company_name)";
		$file = "alumni_logs/alumni_log(".$alumni_id.").json";
		$array = array("log_activity" => $activity, "log_tbl" => $tbl, "previous_value" => $prev, "new_value" => $new,
			"log_datetime" => $datetime, "log_remarks" => $remarks);
		$json = json_encode($array)."\n";
		file_put_contents($file, $json, FILE_APPEND);
	/*********/
	$result['type'] = "success";
	$result['msg'] = "SUCCESS!";
}else{
	$result['type'] = "error";
	$result['msg'] = "FAILED TO UPDATE!";
}
echo json_encode($result);