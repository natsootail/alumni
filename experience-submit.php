<?php


require 'db.php';
require 'functions-validate.php';
session_start();
$alumni_id = $_SESSION['alumni_id'];

$err = 0;
$msg = "";
$company_name = (isset($_POST['company-name']) && !empty($_POST['company-name'])) ? "'".validate($_POST['company-name'])."'" : "NULL";
$position_level = (isset($_POST['position-level']) && !empty($_POST['position-level'])) ? "'".validate($_POST['position-level'])."'" : "NULL";
$position_name = validate($_POST['position-name']);
$date_start = validate($_POST['date-start']);
$date_end = (isset($_POST['date-end']) && !empty($_POST['date-end'])) ? "'".validate($_POST['date-end'])."'" : "NULL";
$it_related = validate($_POST['is_it_related']);
$it_related = ($it_related != 1) ? 0 : 1;
if($db->query("INSERT INTO work_experiences VALUES(NULL, '$alumni_id', $company_name, $position_level, '$position_name', '$date_start', $date_end, '$it_related')")){
	$we_id = $db->insert_id;
	/****** ADD TO LOGS ******/
		$activity = "Added Work Experience.";
		$tbl = "work_experiences";
		$prev = "";
		$new = $we_id;
		$datetime = date('Y-m-d H:i:s');
		$remarks = "Alumni added Work Experience.";
		$file = "alumni_logs/alumni_log(".$alumni_id.".)json";
		$array = array("log_activity" => $activity, "log_tbl" => $tbl, "previous_value" => $prev, "new_value" => $new,
			"log_datetime" => $datetime, "log_remarks" => $remarks);
		$json = json_encode($array)."\n";
		file_put_contents($file, $json, FILE_APPEND);
	/*********/
	if(count($_POST['fields']) > 0){
		foreach($_POST['fields'] AS $skill){
			if($skill != 0){
				$select = $db->query("SELECT * FROM experienced_fields WHERE we_id = '$we_id' AND skill_id = '$skill'");
				if($select->num_rows == 0){
					if($db->query("INSERT INTO experienced_fields VALUES(NULL, '$we_id', '$skill')")){
					}else{
						$err++;
						$msg = mysqli_error($db);
					}
				}
			}
		}
	}
}else{
	$err++;
	$msg = mysqli_error($db);
}

if($err == 0){
	echo "SUCCESS!";
}else{
	echo $msg;
}