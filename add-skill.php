<?php

require 'db.php';
require 'functions-validate.php';
session_start();

$category = validate($_POST['category']);
$skill = validate($_POST['skill']);

$categorys = $db->query("SELECT * FROM categories WHERE category_name = '$category'");
if($categorys->num_rows > 0){
	$categoryf = $categorys->fetch_object();
	$category_id = $categoryf->category_id;
}else{
	if($db->query("INSERT INTO categories VALUES(NULL, '$category')")){
		$category_id = $db->insert_id;
	}else{
		$_SESSION['msgtext'] = mysqli_error($db);
		$_SESSION['msgtype'] = "error";
		header('location: add-skill-form.php');
	}
}

$skills = $db->query("SELECT * FROM skills WHERE skill_name = '$skill'");
if($skills->num_rows > 0){
	$_SESSION['msgtext'] = "DUPLICATE SKILLS";
	$_SESSION['msgtype'] = "error";
	header('location: add-skill-form.php');
}else{
	if($db->query("INSERT INTO skills VALUES(NULL, '$category_id', '$skill')")){
		$_SESSION['msgtext'] = "SUCCESS!";
		$_SESSION['msgtype'] = "success";
		header('location: add-skill-form.php');
	}else{
		$_SESSION['msgtext'] = mysqli_error($db);
		$_SESSION['msgtype'] = "error";
		header('location: add-skill-form.php');
	}
}