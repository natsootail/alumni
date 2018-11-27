<?php
require 'db.php';
function getRate($id){
	global $db;
	$select = $db->query("SELECT * FROM skills WHERE skill_id = '$id'");
	$fetch = $select->fetch_object();
	return $fetch->skill_name;
}

