<?php
session_start();
require 'db.php';
require 'functions-validate.php';
$pf = validate($_POST['id']);
$alumni = validate($_SESSION['alumni_id']);


$select = $db->query("SELECT portfolio_url, portfolio_type FROM portfolios WHERE portfolio_id = '$pf' AND alumni_id ='$alumni' ");
if($select->num_rows == 1){
	$fetch = $select->fetch_object();
	if($fetch->portfolio_type == 'link' || unlink($fetch->portfolio_url)){
		if($db->query("DELETE FROM portfolios WHERE portfolio_id = '$pf' AND alumni_id = '$alumni'")){
			echo "SUCCESS!";
		}else{
			echo mysqli_error($db);
		}
	}else{
		echo "UNABLE TO DELETE FILE.";
	}
}