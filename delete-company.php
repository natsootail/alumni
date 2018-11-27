<?php

session_start();
if(!isset($_SESSION['admin_id']) || !isset($_POST['id'])) header('locaiton: index.php');
require 'db.php';
require 'functions-validate.php';
$id = validate($_POST['id']);
$err = 0;
$result = array();
$positions = $db->query("SELECT * FROM positions WHERE company_id = '$id'");
while($position = $positions->fetch_object()){
	$position_id = $position->position_id;
	if($db->query("DELETE FROM position_qualifications WHERE position_id = '$position_id'")){
		if($db->query("DELETE FROM positions WHERE position_id = '$position_id'")){
		}else{
			$err++;
		}
	}else{
		$err++;
	}
}
if(!$db->query("DELETE FROM company_contacts WHERE company_id = '$id'")) $err++;
if($err == 0){
	if($db->query("DELETE FROM companies WHERE company_id = '$id'")){
		$result['msg'] = "Company Deleted!";
		$result['type'] = "success";
	}else{
		$err++;
	}
}
if($err > 0){
	$result['type'] = "error";
	$result['msg'] = "Failed to delete Company.";
}
echo json_encode($result);