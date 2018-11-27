<?php
require 'db.php';
require 'functions-validate.php';
session_start();
$alumni_id = $_SESSION['alumni_id'];
$email_add = validate($_POST['email-add']);
$result = array();
$dupEAdds = $db->query("SELECT * FROM alumni_email_add WHERE email_add = '$email_add'");
if($dupEAdds->num_rows > 0){
	$result['type'] = "error";
	$result['msg'] = "Email Address Already Exists.";
	echo json_encode($result);
	exit;
}
if($db->query("INSERT INTO alumni_email_add VALUES(NULL, '$alumni_id', '$email_add', DEFAULT)")){
	$result['type'] = "success";
	$result['msg'] = "EMAIL ADDRESS ADDED!";
/****** ADD TO LOGS ******/
	$activity = "Added New Email Address.";
	$tbl = "alumni_email_add";
	$prev = "";
	$new = $email_add;
	$datetime = date('Y-m-d H:i:s');
	$remarks = "Alumni added new Email Address";
	$file = "alumni_logs/alumni_log(".$alumni_id.").json";
	$array = array("log_activity" => $activity, "log_tbl" => $tbl, "previous_value" => $prev, "new_value" => $new,
		"log_datetime" => $datetime, "log_remarks" => $remarks);
	$json = json_encode($array)."\n";
	file_put_contents($file, $json, FILE_APPEND);
/*********/
}else{
	$result['type'] = "error";
	$result['msg'] = "FAILED TO ADD EMAIL ADDRESS.";
}
echo json_encode($result);
exit;