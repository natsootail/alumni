<?php
require 'db.php';
require 'functions-validate.php';
session_start();
$id = $_SESSION['admin_id'];
$fname = validate($_POST['fname']);
$mname = validate($_POST['mname']);
$lname = validate($_POST['lname']);
$username = validate($_POST['username']);
$cPassword = md5($_POST['current-password']);
$nPassword = (!isset($_POST['new-password']) || empty($_POST['new-password'])) ? $cPassword : md5($_POST['new-password']);

$msg = "";
if(empty($fname)){
	$msg .= " Please fill First Name.";
}
if(empty($mname)){
	$msg .= " Please fill Middle Name.";
}
if(empty($lname)){
	$msg .= " Please fill Last Name.";
}
if(empty($username)){
	$msg .= " Please fill Username.";
}
if(empty($_POST['current-password'])){
	$msg .= " Please fill Current Password.";
}
if(empty($_POST['new-password'])){
#	$msg .= " Please fill New Password.";
}
$select = $db->query("SELECT * FROM admins WHERE admin_id = '$id' AND password = '$cPassword'");
if($select->num_rows == 0){
	$msg .= " INCORRECT CURRENT PASSWORD.";
}
if(empty($msg)){

	if($db->query("UPDATE admins SET fname = '$fname', mname = '$mname', lname = '$lname', username = '$username', password = '$nPassword' WHERE admin_id = '$id'")){
		echo "SUCCESS!";

		/****** ADD TO LOGS ******/
			$activity = "Update Account.";
			$tbl = "";
			$prev = "";
			$new = "";
			$datetime = date('Y-m-d H:i:s');
			$remarks = "Admin Updated Account.";
			$file = "admin_logs/admin_log(".$id.").json";
			$array = array("log_activity" => $activity, "log_tbl" => $tbl, "previous_value" => $prev, "new_value" => $new,
				"log_datetime" => $datetime, "log_remarks" => $remarks);
			$json = json_encode($array)."\n";
			file_put_contents($file, $json, FILE_APPEND);
		/*********/

	}else{
		$msg .= mysqli_error($db);
	}
}else{
	echo $msg;
}