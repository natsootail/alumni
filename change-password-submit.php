<?php
session_start();
require 'db.php';
require 'functions-validate.php';

$alumni_id = $_SESSION['alumni_id'];
$oldPass = md5($_POST['old-password']);
$newPass = md5($_POST['new-password']);
$confirmPass = md5($_POST['new-password-confirm']);
$result = array();
$oldPassCheck = $db->query("SELECT * FROM alumni WHERE alumni_id = '$alumni_id' AND password = '$oldPass'");
if($oldPassCheck->num_rows == 1){
	if($newPass == $confirmPass){
		if($db->query("UPDATE alumni SET password = '$newPass' WHERE alumni_id = '$alumni_id'")){
			$result['type'] = "success";
			$result['msg'] = "PASSWORD UPDATED!";
			/****** ADD TO LOGS ******/
				$activity = "Password Update.";
				$tbl = "";
				$prev = "";
				$new = "";
				$datetime = date('Y-m-d H:i:s');
				$remarks = "Alumni updated Password.";
				$file = "alumni_logs/alumni_log(".$alumni_id.").json";
				$array = array("log_activity" => $activity, "log_tbl" => $tbl, "previous_value" => $prev, "new_value" => $new,
					"log_datetime" => $datetime, "log_remarks" => $remarks);
				$json = json_encode($array)."\n";
				file_put_contents($file, $json, FILE_APPEND);
			/*********/
		}
	}else{
		$result['type'] = "error";
		$result['msg'] = "Password Does Not Match";
	}
}else{
	$result['type'] = "error";
	$result['msg'] = "INCORRECT OLD PASSWORD.";
}
echo json_encode($result);