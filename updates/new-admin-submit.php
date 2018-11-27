<?php
require 'db.php';
require 'functions-validate.php';

if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['fname']) || empty($_POST['mname']) || empty($_POST['lname'])) exit;

$username = validate($_POST['username']);
$password = md5($_POST['password']);
$fname = validate($_POST['fname']);
$mname = validate($_POST['mname']);
$lname = validate($_POST['lname']);
$result = array();
if($db->query("INSERT INTO admins VALUES(NULL, '$username', '$password', '$fname', '$mname', '$lname', DEFAULT)")){
	$result['type'] = 'success';
	$result['msg'] = "SUCCESS!";
}else{
	$result['type'] = 'error';
	$result['msg'] = mysqli_error($db);
}

echo json_encode($result);