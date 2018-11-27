<?php
session_start();
DATE_DEFAULT_TIMEZONE_SET('ASIA/MANILA');
$activity = "Logout.";
$tbl = "";
$prev = "";
$new = "";
$datetime = date('Y-m-d H:i:s');
if(isset($_SESSION['alumni_id'])){
	$alumni_id = $_SESSION['alumni_id'];
	/****** ADD TO LOGS ******/
		$remarks = "Alumni Logged out.";
		$file = "alumni_logs/alumni_log(".$alumni_id.").json";
		$array = array("log_activity" => $activity, "log_tbl" => $tbl, "previous_value" => $prev, "new_value" => $new,
			"log_datetime" => $datetime, "log_remarks" => $remarks);
	/*********/
}else if(isset($_SESSION['admin_id'])){
	/****** ADD TO LOGS ******/
		$remarks = "Admin Logged out.";
		$file = "admin_logs/admin_log(".$_SESSION['admin_id'].").json";
		$array = array("log_activity" => $activity, "log_tbl" => $tbl, "previous_value" => $prev, "new_value" => $new,
			"log_datetime" => $datetime, "log_remarks" => $remarks);
	/*********/
}else{
	exit;
}
$json = json_encode($array)."\n";
file_put_contents($file, $json, FILE_APPEND);

session_destroy();
header('location: index.php');