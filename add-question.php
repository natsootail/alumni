<?php

require 'functions-validate.php';
require 'db.php';

$question = validate($_POST['question']);
$category = $_POST['category'];

if(isset($_POST['submit']) && !empty($question)){

	if($db->query("INSERT INTO questions VALUES(NULL,'$question','$category')")){
		header('location: add-question-form.php');
	}else{
		echo mysqli_error($db);
	}
	
}else{
	header('location: add-question-form.php');
}