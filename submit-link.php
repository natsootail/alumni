<?php
require 'db.php';
require 'functions-validate.php';
session_start();
$id = $_SESSION['alumni_id'];
$url = validate($_POST['link']);
$desc = validate($_POST['link_desc']);

if($db->query("INSERT INTO portfolios VALUES(NULL, '$id', '$url', '$desc', 'link')")){
	echo "SUCCESS!";
}else{
	echo mysqli_error($db);
}
?>
