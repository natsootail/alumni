<?php
require_once 'db.php';
require_once 'functions-validate.php';
session_start();
$result = array();
$alumni_id = validate($_SESSION['alumni_id']);
$err = 0;
$ans = 0;
foreach($_POST['sq'] AS $sq){
	if(!empty(validate($sq))) $ans++;
}
if($ans >= 3){
	foreach($_POST['sq'] AS $sq_id => $answer){
		$answer = validate($answer);
		$sq_id = validate($sq_id);
		$questions = $db->query("SELECT * FROM security_questions WHERE sq_id = '$sq_id'");
		$question = $questions->fetch_object();
		if(!empty($answer)){
			$dupAns = $db->query("SELECT * FROM alumni_sq_answers WHERE alumni_id = '$alumni_id' AND sq_id = '$sq_id'");
			if($dupAns->num_rows == 0){
				if($db->query("INSERT INTO alumni_sq_answers VALUES(NULL, '$alumni_id', '$sq_id', '$answer')")){
				/****** ADD TO LOGS ******/
					$activity = "Answered Security Question.";
					$tbl = "alumni_sq_answers";
					$prev = "";
					$new = $answer;
					$datetime = date('Y-m-d H:i:s');
					$remarks = "Alumni Answered the Security Question: ".$question->security_question;
					$file = "alumni_logs/alumni_log(".$alumni_id.").json";
					$array = array("log_activity" => $activity, "log_tbl" => $tbl, "previous_value" => $prev, "new_value" => $new,
						"log_datetime" => $datetime, "log_remarks" => $remarks);
					$json = json_encode($array)."\n";
					file_put_contents($file, $json, FILE_APPEND);
				/*********/
				}else{
					$err++;
				}
			}else{
				$dupAn = $dupAns->fetch_object();
				$answer_id = $dupAn->answer_id;
				if($db->query("UPDATE alumni_sq_answers SET alumni_answer = '$answer' WHERE answer_id = '$answer_id'")){
				/****** ADD TO LOGS ******/
					$activity = "Updated Security Questions.";
					$tbl = "alumni_sq_answers";
					$prev = $dupAn->alumni_answer;
					$new = $answer;
					$datetime = date('Y-m-d H:i:s');
					$remarks = "Alumni Updated Answer to the Security Question: ".$question->security_question.".";
					$file = "alumni_logs/alumni_log(".$alumni_id.").json";
					$array = array("log_activity" => $activity, "log_tbl" => $tbl, "previous_value" => $prev, "new_value" => $new,
						"log_datetime" => $datetime, "log_remarks" => $remarks);
					$json = json_encode($array)."\n";
					file_put_contents($file, $json, FILE_APPEND);
				/*********/
					
				}else{
					$err++;
				}
			}
		}
	}
	if($err == 0){
		$result['type'] = 'success';
		$result['msg'] = 'Success! Thank you for answering.';
		$_SESSION['redirect'] = 0;
	}else{
		$result['type'] = "error";
		$result['msg'] = 'There are some errors saving your answers. Please Try Again.';
	}
	echo json_encode($result);
}else{
	$result['type'] = 'error';
	$result['msg'] = "PLEASE ANSWER AT LEAST 3 QUESTIONS.";
	echo json_encode($result);
}