<?php

require 'db.php';
require 'functions-validate.php';
session_start();
$admin_id = $_SESSION['admin_id'];
if(!isset($_SESSION['admin_id'])){
	exit();
}

$err = 0;
$id_number = validate($_POST['id-number']);
$password = md5($_POST['password']);
$fname = validate($_POST['fname']);
$mname = validate($_POST['mname']);
$lname = validate($_POST['lname']);
$address_present = validate($_POST['address-present']);
$address_permanent = validate($_POST['address-permanent']);
$gender = validate($_POST['gender']);
$date_of_birth = validate($_POST['date-of-birth']);
$place_of_birth = validate($_POST['place-of-birth']);
$civil_status = validate($_POST['civil-status']);
//$email_address = validate($_POST['email-address']);
$youtube_link = validate($_POST['youtube-link']);
$blog_link = validate($_POST['blog-link']);
$mobile_number = validate($_POST['mobile-number']);
$facebook_url = validate($_POST['facebook-url']);
$twitter_acc = validate($_POST['twitter-acc']);
$course = validate($_POST['course']);
$date_graduated = validate($_POST['date-graduated']);
#if( (date('Y',strtotime($date_graduated)) > date('Y') ) || (date('Y',strtotime($date_graduated))) == date('Y') && date('n',strtotime($date_graduated)) < 3){
if( ( date('n',strtotime($date_graduated)) != 3 && date('n',strtotime($date_graduated)) != 4 && date('n', strtotime($date_graduated)) != 10 ) || 
	( date('Y',strtotime($date_graduated)) == date('Y') && date('n',strtotime($date_graduated)) != 3) ||
	( date('Y',strtotime($date_graduated)) == date('Y') && date('n',strtotime($date_graduated)) != 4) ||
	( date('Y',strtotime($date_graduated)) == date('Y') && date('n',strtotime($date_graduated)) != 10) ||
	( date('Y',strtotime($date_graduated)) == date('Y') && date('n') < 3) ||
	date('Y',strtotime($date_graduated)) > date('Y') 
){
		
	echo "INVALID DATE GRADUATED.";
	exit();
}
$age = date('Y') - date('Y',strtotime($date_of_birth));
if(date('n',strtotime($date_of_birth)) > date('n')) $age -= 1;
if($age < 19){
	echo "Must be 19 y/o or above.";
	exit();
}

#$workfield = validate($_POST['workfield']);

if(empty($id_number) || empty($password) || empty($fname) || empty($mname) || empty($lname) || empty($address_present) || empty($address_permanent)
		|| empty($gender) || empty($date_of_birth) || empty($civil_status) 
		|| empty($course) || empty($date_graduated)
	){
		echo "PLEASE COMPLETE THE FORM BEFORE SUBMITTING.";
		exit();
	}
$select = $db->query("SELECT * FROM alumni WHERE fname = '$fname' AND mname = '$mname' AND lname = '$lname'");
if($select->num_rows == 0){
	if($db->query("INSERT INTO alumni VALUES(NULL, '$admin_id', '$id_number', '$password', '$fname', '$mname', '$lname', '$address_present', '$address_permanent', '$gender', '$date_of_birth', '$place_of_birth', '$civil_status', '$mobile_number', '$youtube_link', '$blog_link', '$facebook_url', '$twitter_acc', '$course', '$date_graduated', NULL, NULL, NULL, NULL)")){
		$alumni_id = $db->insert_id;
		if($db->query("INSERT INTO alumni_skills VALUES(NULL, '$alumni_id', NOW())")){
			
		}
		if(isset($_POST['parents_fname1'] , $_POST['parents_mname1'] , $_POST['parents_lname1'] , $_POST['parents_bday1'] , $_POST['parents_gender1'] , $_POST['parents_relationship1'])
			&& !empty($_POST['parents_fname1']) && !empty($_POST['parents_mname1']) && !empty($_POST['parents_lname1']) && !empty($_POST['parents_bday1']) && !empty($_POST['parents_gender1']) && !empty($_POST['parents_relationship1'])
		){
			$pFname1 = validate($_POST['parents_fname1']);
			$pMname1 = validate($_POST['parents_mname1']);
			$pLname1 = validate($_POST['parents_lname1']);
			$pBday1 = validate($_POST['parents_bday1']);
			$pGender1 = validate($_POST['parents_gender1']);
			$pRelationship1 = validate($_POST['parents_relationship1']);
			if($db->query("INSERT INTO alumni_guardians VALUES(NULL, '$alumni_id', '$pFname1', '$pMname1', '$pLname1', '$pBday1', '$pGender1', '$pRelationship1')")){
				
			}
		}
		if(isset($_POST['parents_fname2'] , $_POST['parents_mname2'] , $_POST['parents_lname2'] , $_POST['parents_bday2'] , $_POST['parents_gender2'] , $_POST['parents_relationship2'])
			&& !empty($_POST['parents_fname2']) && !empty($_POST['parents_mname2']) && !empty($_POST['parents_lname2']) && !empty($_POST['parents_bday2']) && !empty($_POST['parents_gender2']) && !empty($_POST['parents_relationship2'])
			){
			$pFname2 = validate($_POST['parents_fname2']);
			$pMname2 = validate($_POST['parents_mname2']);
			$pLname2 = validate($_POST['parents_lname2']);
			$pBday2 = validate($_POST['parents_bday2']);
			$pGender2 = validate($_POST['parents_gender2']);
			$pRelationship2 = validate($_POST['parents_relationship2']);
			if($db->query("INSERT INTO alumni_guardians VALUES(NULL, '$alumni_id', '$pFname2', '$pMname2', '$pLname2', '$pBday2', '$pGender2', '$pRelationship2')")){
				
			}
		}
		if(isset($_POST['email-adds'])){
			foreach($_POST['email-adds'] AS $email_add){
				$email_add = validate($email_add);
				if(!empty($email_add)){
					$dupEAdds = $db->query("SELECT * FROM alumni_email_add WHERE email_add = '$email_add'");
					if($dupEAdds->num_rows == 0){
						if($db->query("INSERT INTO alumni_email_add VALUES(NULL, '$alumni_id', '$email_add', DEFAULT)")){
							
						}
					}
				}
			}
		}
	}else{
		$msg = "PLEASE MAKE SURE YOU FILLED YOUR PERSONAL INFORMATION CORRECTLY.";
		$err++;
	}
}else{
	$msg = "ALUMNI ALREADY EXISTS.";
	$err++;

}


if($err == 0){
	echo "SUCCESS!";
}else{
	echo $msg;
}