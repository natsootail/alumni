<?php

require 'db.php';
require 'functions-validate.php';
$err = 0;
$msg = "";
$company_name = validate($_POST['company-name']);
$company_address = validate($_POST['company-address']);
$select1 = $db->query("SELECT * FROM companies WHERE company_name = '$company_name'");
if($select1->num_rows > 0){ echo "DUPLICATE COMPANY"; exit; }else{
	if($db->query("INSERT INTO companies VALUES(NULL, '$company_name', '$company_address')")){
		$company_id = $db->insert_id;
		if(!empty($_POST['contacts'])){
			foreach($_POST['contacts'] AS $key => $val){
				$key = validate(str_ireplace("-"," ",$key));
				if($db->query("INSERT INTO company_contacts VALUES(NULL, '$company_id', '$val', '$key', DEFAULT)")){
				}else{
					$msg .= mysqli_error($db);
					$err++;
				}
			}
		}
	}else{
		$err++;
		$msg .= "\nError Creating Company: ".mysqli_error($db);
	}
}
if(count($_POST['position']) > 0){
	foreach($_POST['position'] AS $pi => $position){
		if(!empty(validate($position))){
			$select2 = $db->query("SELECT * FROM positions WHERE company_id = '$company_id' AND position_name = '$position'");
			if($select2->num_rows == 0){
				if($db->query("INSERT INTO positions VALUES(NULL, '$company_id', '$position', DEFAULT)")){
					$position_id = $db->insert_id;
				}else{
					$msg .= "\nError creating Position: ".mysqli_error($db);
					$err++;
				}
			}else{
				$fetch2 = $select2->fetch_object();
				$position_id = $fetch2->position_id;
			}
			if(count($_POST['skill'][$pi]) > 0 && isset($position_id) && $position_id > 0){
				foreach($_POST['skill'][$pi] AS $si => $skill){
					if($skill > 0 ){
						$rating = $_POST['rating'][$pi][$si];
						if($db->query("INSERT INTO position_qualifications VALUES(NULL, '$position_id', '$skill', '$rating')")){
							
						}else{
							$msg .= "\nError creating Qualification: ".mysqli_error($db);
							$err++;
						}
					}
				}
			}
		}
	}
}

if($err == 0){
	echo "SUCCESS!";
}else{
	echo $msg;
}