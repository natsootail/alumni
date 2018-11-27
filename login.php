<?php

require 'db.php';
require 'functions-validate.php';
session_start();
$result = array();
if($_POST['user'] == 'alumni'){
	$alumni_id_number = validate($_POST['alumni_id_number']);
	$password = md5($_POST['password']);


	$select = $db->query("SELECT * FROM alumni WHERE alumni_id_number = '$alumni_id_number' AND password = '$password' ");

	if($select->num_rows == 1){
		$fetch = $select->fetch_object();
		$alumni_id = $fetch->alumni_id;
		$_SESSION['alumni_id'] = $fetch->alumni_id;
		$_SESSION['alumni_name'] = $fetch->fname.' '.$fetch->mname.' '.$fetch->lname;
		$isAnswered = $db->query("SELECT * FROM alumni_sq_answers WHERE alumni_id = '$alumni_id'");
		if($isAnswered->num_rows < 3){
			$_SESSION['redirect'] = 1;
		}

		/****** ADD TO LOGS ******/
			$activity = "Login.";
			$tbl = "";
			$prev = "";
			$new = "";
			$datetime = date('Y-m-d H:i:s');
			$remarks = "Alumni logged in.";
			$file = "alumni_logs/alumni_log(".$alumni_id.").json";
			$array = array("log_activity" => $activity, "log_tbl" => $tbl, "previous_value" => $prev, "new_value" => $new,
				"log_datetime" => $datetime, "log_remarks" => $remarks);
			$json = json_encode($array)."\n";
			file_put_contents($file, $json, FILE_APPEND);
		/*********/
		$result['msg'] = "SUCCESS!";
		$result['type'] = 'success';
	}else{
		$result['msg'] = "INCORRECT ID-NUMBER/PASSOWRD.";
		$result['type'] = 'error';
	}
}else if($_POST['user'] == 'admin'){
	$username = validate($_POST['username']);
	$password = md5($_POST['password']);
	$select = $db->query("SELECT * FROM admins WHERE username = '$username' AND password = '$password'");
	if($select->num_rows == 1){
		$fetch = $select->fetch_object();
		$_SESSION['admin_id'] = $fetch->admin_id;
		$result['msg'] = "SUCCESS!";
		$result['type'] = 'success';
		/****** ADD TO LOGS ******/
			$activity = "Login.";
			$tbl = "";
			$prev = "";
			$new = "";
			$datetime = date('Y-m-d H:i:s');
			$remarks = "Admin logged in.";
			$file = "admin_logs/admin_log(".$fetch->admin_id.").json";
			$array = array("log_activity" => $activity, "log_tbl" => $tbl, "previous_value" => $prev, "new_value" => $new,
				"log_datetime" => $datetime, "log_remarks" => $remarks);
			$json = json_encode($array)."\n";
			file_put_contents($file, $json, FILE_APPEND);
		/*********/
	}else{
		$result['type'] = 'error';
		$result['msg'] = "INCORRECT USERNAME/PASSWORD.";
	}
}
echo json_encode($result);