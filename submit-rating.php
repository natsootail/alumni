<?php

require 'functions-validate.php';
require 'db.php';
session_start();
$err = 0;
$alumni = $_SESSION['alumni_id'];

$employment = validate($_POST['employment-status']);
if(isset($_POST['skill']) && count($_POST['skill']) > 0){
	if($employment == 'Employed' && !empty(validate($_POST['company']))){
		if($db->query("UPDATE alumni SET employment_status = '$employment' WHERE alumni_id = '$alumni'")){
			
		}else{
			echo mysqli_error($db);
			exit();
		}
		if($employment == 'Employed'){
			$company = validate($_POST['company']);
			$companies = $db->query("SELECT * FROM companies WHERE company_name = '$company'");
			if($companies->num_rows > 0){
				$companiesF = $companies->fetch_object();
				$company_id = $companiesF->company_id;
			}else{
				if($db->query("INSERT INTO companies VALUES(NULL, '$company')")){
					$company_id = $db->insert_id;
				}
			}
		}else{
			$company_id = "NULL";
		}
		if($db->query("INSERT INTO alumni_skills VALUES(NULL, '$alumni', $company_id, NOW())")){
			$as_id = $db->insert_id;
			foreach($_POST['skill'] AS $skill_id => $skill_rating){
				if($db->query("INSERT INTO skills_rating VALUES(NULL, '$as_id', '$skill_id', '$skill_rating')")){
					
				}else{
					$err++;
					$msg = mysqli_error($db);
				}
			}
			if($err > 0){
				echo $msg;
			}else{
				echo "SUCCESS!";
			}
		}else{
			echo mysqli_error($db);
		}
	}else{
		echo "Please Specify Company.";
	}
}else{
	echo "Please select at least 1 skill.";
}
