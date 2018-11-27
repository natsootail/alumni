<?php

require 'db.php';
require 'functions-validate.php';
session_start();
$username = validate($_POST['username']);
$password = md5($_POST['password']);
$select = $db->query("SELECT * FROM admins WHERE username = '$username' AND password = '$password'");
if($select->num_rows == 1){
	$fetch = $select->fetch_object();
	$_SESSION['admin_id'] = $fetch->admin_id;
	header('location: index.php');
}else{
	header('location: index.php');
}