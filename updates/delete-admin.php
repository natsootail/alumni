<?php
require 'db.php';
require 'functions-validate.php';
$id = validate($_POST['id']);
if($id == 1) exit;
$result = array();
if($db->query("DELETE FROM admins WHERE admin_id = '$id' AND admin_id != '1'")){
	$result['type'] = 'success';
	$result['msg'] = "SUCCESS!";
}else{
	$result['type'] = "error";
	$result['msg'] = "Unable to delete Admin.";
}
echo json_encode($result);