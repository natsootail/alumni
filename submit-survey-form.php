<?php
require 'db.php';
require 'functions-validate.php';
session_start();
$alumni_id = $_SESSION['alumni_id'];

$employment_status = validate($_POST['employment-status']);
$unemployed_reason = "NULL";
$err = 0;
if($employment_status == 'Employed'){
	$workfield = "'".validate($_POST['workfield'])."'";

	$employer_name = validate($_POST['employer-name']);
	$org_type = validate($_POST['org-type']);
	$employment_type = validate($_POST['employment-type']);
	$occupation_type = validate($_POST['occupation-type']);
	$num_of_months = validate($_POST['num-of-months']);
	$place_of_work = validate($_POST['place-of-work']);
	$is_first_job = validate($_POST['is-first-job']);
	$reason = validate($_POST['reason']);
	$designation = validate($_POST['designation']);
	$department = validate($_POST['department']);
	$status = validate($_POST['status']);
	$monthly_income_range = validate($_POST['monthly-income-range']);
	if(
	empty($employer_name) ||
	empty($org_type) ||
	empty($employment_type) ||
	empty($occupation_type) ||
	empty($num_of_months) ||
	empty($place_of_work) ||
	empty($is_first_job) ||
	empty($reason) ||
	empty($designation) ||
	empty($department) ||
	empty($status) ||
	empty($monthly_income_range)
	){
		$msg = "Please Complete your Employment Information.";
		$err++;
	}else{
		if($db->query("INSERT INTO employment_employed VALUES (NULL, '$alumni_id', '$employer_name', '$org_type', '$employment_type', '$occupation_type', '$num_of_months', '$place_of_work', '$is_first_job', '$reason', '$designation', '$department', '$status', '$monthly_income_range')")){
		
		}else{
			echo mysqli_error($db);
			$err++;
		}
	}

}else if($employment_status == 'Self-Employed'){
	$workfield = "'".validate($_POST['workfield'])."'";
	$nature_of_employment = validate($_POST['nature-of-employment']);
	$num_of_years = validate($_POST['num-of-years']);
	$monthly_income_range = validate($_POST['monthly-income-range']);
	if(empty($nature_of_employment) || empty($num_of_years) || empty($monthly_income_range)){
		$msg = "Please Complete your Employment Information.";
		$err++;
	}else{
		if($db->query("INSERT INTO employment_self VALUES(NULL, '$alumni_id', '$nature_of_employment', '$num_of_years', '$monthly_income_range')")){
			
		}else{
			echo mysqli_error($db);
			$err++;
		}
	}
}else if($employment_status == 'Unemployed'){
	$workfield = "NULL";
	$questions = $db->query("SELECT * FROM questions");
	$unemployed_reason = validate($_POST['unemployed-reason']);
	if(empty($unemployed_reason)){
		$err++;
		$msg = "Please answer why are you unemployed.";
	}else{
		$unemployed_reason = "'$unemployed_reason'";
		while($question = $questions->fetch_object()){
			$rate = validate($_POST[$question->remarks]);
			$question_id = $question->question_id;
			$dup_rating = $db->query("SELECT * FROM alumni_rating WHERE alumni_id = '$alumni_id' AND question_id = '$question_id'");
			if($dup_rating->num_rows == 0){
				if($db->query("INSERT INTO alumni_rating VALUES(NULL, '$alumni_id', '$question_id', '$rate')")){
					
				}else{
					$msg = "THERE WAS AN ERROR SUBMITTING YOUR RATING.";
					$err++;
				}
			}else{
				while($fetch_rating = $dup_rating->fetch_object()){
					if($db->query("UPDATE alumni_rating SET rating = '$rate' WHERE alumni_id = '$alumni_id' AND question_id = '$question_id'")){
						
					}else{
						$msg = "Unable to update your rating. ".mysqli_error($db);
						$err++;
					}
				}
			}
		}
	}
}
if($err == 0){
	if($db->query("UPDATE alumni SET employment_workfield = $workfield, employment_status = '$employment_status', unemployed_reason = $unemployed_reason WHERE alumni_id = '$alumni_id'")){
		echo "SUCCESS!";
	}else{
		$msg = mysqli_error($db);
		$err++;
	}
}else{
	echo $msg;
}