<?php

require 'db.php';
require 'functions-validate.php';
session_start();
if(!isset($_SESSION['alumni_id'])) header('location: index.php');
$alumni_id = validate($_SESSION['alumni_id']);


$course = validate($_POST['course']);
$school = validate($_POST['school']);
$date_graduated = validate($_POST['date-graduated']);
$result = array();
$dups = $db->query("SELECT * FROM more_educ_bgs WHERE alumni_id = '$alumni_id' AND eb_course = '$course'");
if($dups->num_rows == 0){
	if($db->query("INSERT INTO more_educ_bgs VALUES(NULL, '$alumni_id', '$course', '$school', '$date_graduated')")){
		$result['type'] = "success";
		$result['msg'] = "SUCCESS!";
		/****** ADD TO LOGS ******/
			$activity = "Add Educational Background.";
			$tbl = "more_educ_bgs";
			$prev = "";
			$new = $course;
			$datetime = date('Y-m-d H:i:s');
			$remarks = "Alumni Graduated $course from $school on ".date('F j, Y',strtotime($date_graduated));
			$file = "alumni_logs/alumni_log(".$alumni_id.").json";
			$array = array("log_activity" => $activity, "log_tbl" => $tbl, "previous_value" => $prev, "new_value" => $new,
				"log_datetime" => $datetime, "log_remarks" => $remarks);
			$json = json_encode($array)."\n";
			file_put_contents($file, $json, FILE_APPEND);
		/*********/
	}else{
		$result['type'] = "error";
		$result['msg'] = mysqli_error($db);
	}
}else{
	$result['type'] = "error";
	$result['msg'] = "DUPLICATE EDUCATIONAL BACKGROUND.";
}
echo json_encode($result);