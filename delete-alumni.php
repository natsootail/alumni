<?php

session_start();
require 'db.php';
require 'functions-validate.php';

if(!isset($_SESSION['admin_id'])){
	exit();
	echo " ERROR! ";
}

$id = validate($_POST['id']);
if($db->query("DELETE FROM verification_codes WHERE alumni_id = '$id'")){}

$ass = $db->query("SELECT * FROM alumni_skills WHERE alumni_id = '$id'");
$ass_arr = array();
while($as = $ass->fetch_object()){
	$ass_arr[] = $as->as_id;
}
$ass_txt = join(",",$ass_arr);
if($db->query("DELETE FROM skills_rating WHERE as_id IN ($ass_txt)")){}
if($db->query("DELETE FROM alumni_skills WHERE alumni_id = '$id'")){}

$wes = $db->query("SELECT * FROM work_experiences WHERE alumni_id = '$id'");
$wes_arr = array();
while($we = $wes->fetch_object()){ $wes_arr[] = $we->we_id; }
$wes_txt = join(",",$wes_arr);
if($db->query("DELETE FROM experienced_fields WHERE we_id IN ($wes_txt)")){}
if($db->query("DELETE FROM work_experiences WHERE alumni_id = '$id'")){}

if($db->query("DELETE FROM alumni_sq_answers WHERE alumni_id = '$id'")){}
if($db->query("DELETE FROM alumni_email_add WHERE alumni_id = '$id'")){}
if($db->query("DELETE FROM alumni_guardians WHERE alumni_id = '$id'")){}
if($db->query("DELETE FROM more_educ_bgs WHERE alumni_id = '$id'")){}
if($db->query("DELETE FROM previous_addresses WHERE alumni_id = '$id'")){}

$certificates = $db->query("SELECT * FROM certificates WHERE alumni_id = '$id'");
while($certificate = $certificates->fetch_object()){
	if(unlink($certificate->img_url)){
		$certificate_id = $certificate->certificate_id;
		if($db->query("DELETE FROM certificates WHERE certificate_id = '$certificate_id'")){}
	}
}

$found = 0;
$filename = "";
$dir = scandir("alumni_biodata");
foreach($dir AS $file){
	if(stristr($file, "alumni_biodata($id)")){
		$found = 1;
		$filename = $file;
		if(unlink("alumni_biodata/$file")){}
		break;
	}
}

$log_dir = scandir("alumni_logs");
foreach($log_dir AS $log_file){
	if(stristr($log_file,"alumni_log($id)")){
		if(unlink("alumni_logs/$log_file")){}
		break;
	}
}

if($db->query("DELETE FROM alumni WHERE alumni_id = '$id'")){
	echo "SUCCESS!";
}else{
	echo mysqli_error($db);
}