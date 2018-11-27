<?php

require 'db.php';
require 'functions-validate.php';

$name = validate($_POST['company-name']);
if(!empty($name)){
	$select = $db->query("SELECT * FROM companies WHERE company_name = '$name'");
	if($select->num_rows > 0){
		echo "COMPANY ALREADY EXISTS.";
		exit();
	}else{
		if($db->query("INSERT INTO companies VALUES(NULL, '$name')")){
			$company_id = $db->insert_id;
			$ok = 1;
			if(!empty($_POST['contacts'])){
				foreach($_POST['contacts'] AS $key => $val){
					$key = validate(str_ireplace("-"," ",$key));
					if($db->query("INSERT INTO company_contacts VALUES(NULL, '$company_id', '$val', '$key', DEFAULT)")){
					}else{
						echo mysqli_error($db);
						$ok = 0;
					}
				}
			}
#			echo ($ok == 1) ? "SUCCESS" : "FAILED TO ADD CONTACTS";
		}else{
			echo mysqli_error($db);
		}
	}
}else{
	echo "PLEASE ENTER COMPANY NAME.";
}