<?php

require 'db.php';
require 'functions-validate.php';
session_start();
$alumni = $_SESSION['alumni_id'];
$id = validate($_POST['id']);
$status = validate($_POST['status']);

$select = $db->query("SELECT * FROM alumni WHERE alumni_id = '$alumni'");
$fetch = $select->fetch_object();
$emp_stat = $fetch->employment_status;
if($emp_stat == 'Employed' && $status == 'employed'){
	$emps = $db->query("SELECT * FROM employment_employed WHERE alumni_id = '$alumni' ORDER BY ee_id DESC LIMIT 1");
	$emp = $emps->fetch_object();
	if($emp->ee_id == $id){
		if($db->query("UPDATE alumni SET employment_status = 'Not Specified' WHERE alumni_id = '$alumni'")){
			
		}
	}
}else if($emp_stat == 'Self-Employed' && $status == 'self'){
	$selfs = $db->query("SELECT * FROM employment_self WHERE alumni_id = '$alumni' ORDER BY es_id DESC LIMIT 1");
	$self = $selfs->fetch_object();
	if($self->es_id == $id){
		if($db->query("UPDATE alumni SET employment_status = 'Not Specified' WHERE alumni_id = '$alumni'")){
			
		}
	}
}


if($status == 'employed'){
	if($db->query("DELETE FROM employment_employed WHERE alumni_id = '$alumni' AND ee_id = '$id'")){
		echo "SUCCESS!";
	}else{
		echo mysqli_error($db);
	}
}else if($status == 'self'){
	if($db->query("DELETE FROM employment_self WHERE alumni_id = '$alumni' AND es_id = '$id'")){
		echo "SUCCESS!";
	}else{
		echo mysqli_error($db);
	}
}

