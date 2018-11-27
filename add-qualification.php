<?php

require 'db.php';
require 'functions-validate.php';

$company_name = validate($_POST['company-name']);
$rating = validate($_POST['rating']);
$skill_id = validate($_POST['skill-id']);
$select = $db->query("SELECT * FROM companies WHERE company_name = '$company_name'");
if($select->num_rows > 0){
	$fetch = $select->fetch_object();
	$company_id  = $fetch->company_id;
}else{
	echo "COMPANY DOESN'T EXISTS.";
	exit();
}


$skills = $db->query("SELECT * FROM company_qualifications WHERE skill_id = '$skill_id' AND company_id = '$company_id'");
if($skills->num_rows == 0){
	if($db->query("INSERT INTO company_qualifications VALUES(NULL, '$company_id', '$skill_id', '$rating', DEFAULT)")){
		echo "SUCCESS!";
	}else{
		echo mysqli_error($db);
	}
}else{
	if($db->query("UPDATE company_qualifications SET rating = '$rating' WHERE company_id = '$company_id' AND skill_id = '$skill_id'")){
		echo "SUCCESS!";
	}else{
		echo mysqli_error($db);
	}
}