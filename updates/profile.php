<?php
include 'header.php';
include 'nav.php';
require 'db.php';
if(isset($_SESSION['alumni_id'])){
$id = $_SESSION['alumni_id'];

$selects = $db->query("SELECT * FROM alumni WHERE alumni_id = '$id'");
$fetchs = $selects->fetch_object();
$selectGuardians = $db->query("SELECT * FROM alumni_guardians WHERE alumni_id = '$id'");
$guardians = array();
if($selectGuardians->num_rows > 0){
	while($fetchGuardians = $selectGuardians->fetch_assoc()){ $guardians[] = $fetchGuardians; }
}
$email_adds = $db->query("SELECT * FROM alumni_email_add WHERE alumni_id = '$id'");
$awes = $db->query("SELECT * FROM work_experiences WHERE alumni_id = '$id' AND we_date_end IS NULL");
if($awes->num_rows > 0){
	$emp_stat = "Employed";
}else{
	$emp_stat = "Unemployed";
}
?>
<div class="personal-profile-wrapper">
	<div class="personal-profile-header">
		<h4> Profile </h4>
	</div>
	<div class="personal-profile-content">
		<div class="personal-profile">
			<div class="pp-row">
				<div class="pp-cell">
					<h4> <?php echo $fetchs->fname; ?> </h4>
					<p> First Name </p>
				</div>
				<div class="pp-cell">
					<h4> <?php echo $fetchs->mname; ?> </h4>
					<p> Middle Name </p>
				</div>
				<div class="pp-cell">
					<h4> <?php echo $fetchs->lname; ?> </h4>
					<p> Last Name </p>
				</div>
			</div>
			<div class="pp-row">
				<div class="pp-cell">
					<h4> 
						<?php echo $fetchs->address_present; ?>
						<button class="update-profile-btn" id="update-profile-btn" data-type="present-address">
							<span class="glyphicon glyphicon-edit"></span>
						</button>
					</h4>
					<p> Present Address </p>
				</div>
			</div>
			<div class="pp-row">
				<div class="pp-cell">
					<h4> 
						<?php echo $fetchs->address_permanent; ?>
						<button class="update-profile-btn" id="update-profile-btn" data-type="permanent-address">
							<span class="glyphicon glyphicon-edit"></span>
						</button>
					</h4>
					<p> Permanent Address </p>
				</div>
			</div>
			<div class="pp-row">
				<div class="pp-cell">
					<h4> <?php echo $fetchs->gender; ?> </h4>
					<p> Gender </p>
				</div>
				<div class="pp-cell">
					<h4> <?php echo date('M d Y',strtotime($fetchs->date_of_birth)); ?> </h4>
					<p> Date of Birth </p>
				</div>
				<div class="pp-cell">
					<h4>
						<?php echo $fetchs->civil_status; ?>
						<button class="update-profile-btn" id="update-profile-btn" data-type="civil-status">
							<span class="glyphicon glyphicon-edit"></span>
						</button>
					</h4>
					<p> Civil Status </p>
				</div>
			</div>
			<hr />
			<div class="pp-row">
			<?php
			$eadd = 1;
			while($email_add = $email_adds->fetch_object()){
				?>
				<div class="pp-cell email-add-cell">
					<h4>
						<?php echo $email_add->email_add; ?>
						<button class="update-profile-btn" id="update-email-add" data-id="<?php echo $email_add->email_id; ?>">
							<span class="glyphicon glyphicon-edit"></span>
						</button>
					 </h4>
				</div>
				<?php
			}
			?>
			<p> Email Address(es) <button id="add-email-add-profile">ADD EMAIL ADDRESS </button> </p>
			</div>
			<hr /><br/>
			<div class="pp-row">
				<div class="pp-cell">
					<h4>
						<?php echo $fetchs->mobile_number; ?> 
						<button class="update-profile-btn" id="update-profile-btn" data-type="mobile-number">
							<span class="glyphicon glyphicon-edit"></span>
						</button>
					</h4>
					<p> Mobile Number </p>
				</div>
			</div>
			<div class="pp-row">
				<div class="pp-cell">
					<h4>
						<?php echo !empty($fetchs->place_of_birth) ? $fetchs->place_of_birth : "N/A"; ?>
						<button class="update-profile-btn" id="update-profile-btn" data-type="place-of-birth">
							<span class="glyphicon glyphicon-edit"></span>
						</button>
					</h4>
					<p> Place of Birth </p>
				</div>
			</div>
			<div class="pp-row">
				<div class="pp-cell">
					<h4>
						<?php echo (!empty($fetchs->youtube_link) ? $fetchs->youtube_link : "<i>Not Specified</i>" ); ?>
						<button class="update-profile-btn" id="update-profile-btn" data-type="youtube-link">
							<span class="glyphicon glyphicon-edit"></span>
						</button>
						</h4>
					<p> Youtube Channel </p>
				</div>
				<div class="pp-cell">
					<h4>
						<?php echo (!empty($fetchs->blog_link) ? $fetchs->blog_link : "<i>Not Specified</i>" ); ?>
						<button class="update-profile-btn" id="update-profile-btn" data-type="blog-link">
							<span class="glyphicon glyphicon-edit"></span>
						</button>
						</h4>
					<p> Blog Site </p>
				</div>
			</div>
			<div class="pp-row">
				<div class="pp-cell">
					<h4>
						<?php echo (!empty($fetchs->facebook_url) ? $fetchs->facebook_url : "<i>Not Specified</i>" ); ?>
						<button class="update-profile-btn" id="update-profile-btn" data-type="facebook-url">
							<span class="glyphicon glyphicon-edit"></span>
						</button>
						</h4>
					<p> Facebook URL </p>
				</div>
				<div class="pp-cell">
					<h4>
						<?php echo (!empty($fetchs->twitter_url) ? $fetchs->twitter_url : "<i>Not Specified</i>" ); ?>
						<button class="update-profile-btn" id="update-profile-btn" data-type="twitter-url">
							<span class="glyphicon glyphicon-edit"></span>
						</button>

					</h4>
					<p> Twitter </p>
				</div>
			</div>
			<hr />
			<?php if(count($guardians) > 0){ ?>
			<div class="pp-row">
				<div class="pp-cell">
					<h4>
						<?php echo !empty($guardians[0]) ? $guardians[0]['ag_fname'] : "N/A"; ?>
					</h4>
					<p> Guardian First Name </p>
				</div>
				<div class="pp-cell">
					<h4>
						<?php echo !empty($guardians[0]) ? $guardians[0]['ag_mname'] : "N/A"; ?>
					</h4>
					<p> Guardian Middle Name </p>
				</div>
				<div class="pp-cell">
					<h4>
						<?php echo !empty($guardians[0]) ? $guardians[0]['ag_lname'] : "N/A"; ?>
					</h4>
					<p> Guardian Last Name </p>
				</div>
			</div>
			<div class="pp-row">
				<div class="pp-cell">
					<h4>
						<?php echo !empty($guardians[0]) ? $guardians[0]['ag_bday'] : "N/A"; ?>
					</h4>
					<p> Guardian Birthdate </p>
				</div>
				<div class="pp-cell">
					<h4>
						<?php echo !empty($guardians[0]) ? $guardians[0]['ag_gender'] : "N/A"; ?>
					</h4>
					<p> Guardian Gender </p>
				</div>
				<div class="pp-cell">
					<h4>
						<?php echo !empty($guardians[0]) ? $guardians[0]['ag_relationship'] : "N/A"; ?>
					</h4>
					<p> Guardian Relationship </p>
				</div>
			</div>
			<hr />
			<div class="pp-row">
				<div class="pp-cell">
					<h4>
						<?php echo !empty($guardians[1]) ? $guardians[1]['ag_fname'] : "N/A"; ?>
					</h4>
					<p> Guardian First Name </p>
				</div>
				<div class="pp-cell">
					<h4>
						<?php echo !empty($guardians[1]) ? $guardians[1]['ag_mname'] : "N/A"; ?>
					</h4>
					<p> Guardian Middle Name </p>
				</div>
				<div class="pp-cell">
					<h4>
						<?php echo !empty($guardians[1]) ? $guardians[1]['ag_lname'] : "N/A"; ?>
					</h4>
					<p> Guardian Last Name </p>
				</div>
			</div>
			<div class="pp-row">
				<div class="pp-cell">
					<h4>
						<?php echo !empty($guardians[1]) ? $guardians[1]['ag_bday'] : "N/A"; ?>
					</h4>
					<p> Guardian Birthdate </p>
				</div>
				<div class="pp-cell">
					<h4>
						<?php echo !empty($guardians[1]) ? $guardians[1]['ag_gender'] : "N/A"; ?>
					</h4>
					<p> Guardian Gender </p>
				</div>
				<div class="pp-cell">
					<h4>
						<?php echo !empty($guardians[1]) ? $guardians[1]['ag_relationship'] : "N/A"; ?>
					</h4>
					<p> Guardian Relationship </p>
				</div>
			</div>
			<?php } ?>
			<div class="pp-row">
				<div class="pp-cell">
					<h4> <?php echo $fetchs->course.'<br/>'.date('F j, Y',strtotime($fetchs->date_graduated)); ?> </h4>
					<p> Course and Date Graduated </p>
				</div>
			</div>
			<?php
			$ebs = $db->query("SELECT * FROM more_educ_bgs WHERE alumni_id = '$id'");
			if($ebs->num_rows > 0){ ?>
			<br/>
			<hr/>
			<h3> Additional Educational Attainment </h3>
			<hr/>
			<?php
				while($eb = $ebs->fetch_object()){
					?>
					<div class="pp-row">
						<div class="pp-cell">
							<h4> <?php echo $eb->eb_course; ?> </h4>
							<p> Course </p>
						</div>
					</div>
					<div class="pp-row">
						<div class="pp-cell">
							<h4> <?php echo $eb->eb_school; ?> </h4>
							<p> School </p>
						</div>
					</div>
					<div class="pp-row">
						<div class="pp-cell">
							<h4> <?php echo $eb->eb_date_graduated; ?> </h4>
							<p> Date Graduated </p>
						</div>
					</div>
					<hr/>
					<?php
				}
			}
			?>
			<br/>
			<div class="pp-row">
				<div class="pp-cell">
					<h4>
						<?php echo $emp_stat; ?>
					</h4>
					<p> Employment Status </p>
				</div>
			</div>
		</div>
		<div class="other-account-settings">
			<button class="aos-btn" id="change-password"> Change Password </button>
			<button class="aos-btn" id="view-security-questions"> Security Questions </button>
			<a href="print-profile.php?id=<?php echo $id;?>" class="aos-btn" target="_blank"> Print Profile</a>
			<br/><br/>
			<button class="aos-btn" id="add-educ-bgs"> Add Educational Attainment </button>
		</div>
	</div>
</div>

<div class="personal-portfolio-wrapper">
	<div class="personal-portfolio-header">
		<h4> Portfolio </h4>
	</div>
	<div class="personal-portfolio-content">
		<div class="portfolio-wrapper">
			<div class="add-item-wrapper">
				<form class="add-item-option" id="image-form" method="post" action="upload-img.php" enctype="multipart/form-data">
					<label class="add-item-label" for="img_url">
						<input type="file" name="img_url" id="img_url" required accept="image/*" />
						<div class="add-item-thumbnail">
							<span class="glyphicon glyphicon-picture"></span>
							<div class="add-item-btn"> Upload Certificate </div>
						</div>
					</label>
					<div class="add-item-url" id="add-img-url">
						
					</div>
					<div class="add-item-desc">
						<input type="text" id="add-img-desc" name="img_desc" placeholder="Name or Description of the Image" required />
					</div>
					<div class="add-item-desc">
						<select name="skill_id">
						<option value="0"> Specify Skill </option>
						<?php
						$skills = $db->query("SELECT * FROM skills");
						while($skill = $skills->fetch_object()){
							echo "<option value='".$skill->skill_id."'>".$skill->skill_name.'</option>';
						}
						?>
						</select>
					</div>
					<button id="add-img-submit" class="upload-btn"> SUBMIT </button>
				</form>
				<div class="add-item-option">
					<label class="add-item-label" id="work-experience-label">
						<div class="add-item-thumbnail">
							<span class="glyphicon glyphicon-briefcase"></span>
							<button class="add-item-btn" id="add-experience"> Add Work Experience </button>
						<div class="add-item-desc">
							
						</div>
						</div>
					</label>
				</div>
				<div class="add-item-option">
					<?php
					$askills = $db->query("SELECT * FROM alumni_skills WHERE alumni_id = '$id'");
					$askill = $askills->fetch_object();
					?>
					<label class="add-item-label" id="skills-rating-label">
						<div class="add-item-thumbnail">
							<span class="glyphicon glyphicon-file"></span>
							<a href="view-rating.php?id=<?php echo $askill->as_id;?>" target="_blank">
								<button class="add-item-btn"> Skills Rating </button>
							</a>
						</div>
					</label>
				</div>
				<div class="add-item-option">
					<label class="add-item-label" id="download-biodata-template">
						<div class="add-item-thumbnail">
							<span class="glyphicon glyphicon-folder-close"></span>
							<a href="#" id="biodata-actions">
								<button class="add-item-btn" id="biodata-actions"> BIO-DATA </button>
							</a>
						</div>
					</label>
				</div>
			</div>
			<!--
			<div class="add-item-wrapper">
				<div class="add-item-option">
					<label class="add-item-label" for="add-survey-form">
						<div class="add-item-thumbnail">
							<span class="glyphicon glyphicon-pencil"></span>
							<div class="add-item-btn"> Skills Rating </div>
						</div>
					</label>
					<div class="add-item-desc">
					</div>
					<button id="add-survey-form" class="upload-btn" style="width: 90%; margin-left: 5%; margin-top: 40px;"> Fill out</button>
				</div>
			</div>
			!-->
			<div class="portfolio-items">
<!--
				<div class="pi-header">
					<h4> Ratings </h4>
				</div>
!-->
<!--
				<div class="pi-content">
					<?php
					$alumni_skills = $db->query("SELECT * FROM alumni_skills WHERE alumni_id = '$id'");
					while($alumni_skill = $alumni_skills->fetch_object()){
						?>
						<div class="portfolio-item">
							<div class="portfolio-thumbnail">
								<span class="glyphicon glyphicon-file"></span>
							</div>
							<div class="portfolio-desc">
								<a href="view-rating.php?id=<?php echo $alumni_skill->as_id;?>" target="_blank">
									Skills Rating
								</a>
							</div>
						</div>
						<?php
					}
					?>
				</div>
!-->
			</div>
			<div class="portfolio-items">
				<div class="pi-header">
					<h4> Certificates </h4>
					<a href="print-certs.php?id=<?php echo $id;?>" target="_blank">
						<button class="print-item"> <span class="glyphicon glyphicon-print"></span> <span class="pi-text">Print</span> </button>
					</a>
				</div>
				<div class="pi-content">
					<?php
					$certificates = $db->query("SELECT * FROM certificates WHERE alumni_id = '$id'");
					if($certificates->num_rows == 0){
						echo "No Certificates Uploaded.";
					}else{
						while($certificate = $certificates->fetch_object()){
							$desc = $certificate->description;
							$url = $certificate->img_url;
						?>
						<div class="portfolio-item">
							<div class="portfolio-thumbnail">
								<span class="glyphicon glyphicon-paperclip"></span>
							</div>
							<div class="portfolio-desc">
								<a href="<?php echo $url;?>"> <?php echo $desc;?> </a>
							</div>
						</div>
						<?php
					}
					}
					?>
				</div>
			</div>
			<?php
			$employeds = $db->query("SELECT* FROM work_experiences WHERE alumni_id = '$id'");
			?>
			<div class="portfolio-items">
				<div class="pi-header">
					<h4> Employment Experience </h4>
					<a href="print-we.php?id=<?php echo $id;?>" target="_blank">
						<button class="print-item"> <span class="glyphicon glyphicon-print"></span> <span class="pi-text">Print</span> </button>
					</a>

				</div>
				<div class="pi-content">
					<?php
					if($employeds->num_rows > 0){
						while($employed = $employeds->fetch_object()){
							?>
							<div class="portfolio-item">
<!--
								<button class="delete-portfolio-item" id="delete-employment-item" data-id="<?php echo $employed->ee_id;?>" data-status="employed">
									<span class="glyphicon glyphicon-trash"></span>
								</button>
!-->
								<div class="portfolio-thumbnail">
									<span class="glyphicon glyphicon-briefcase"></span>
								</div>
								<div class="portfolio-desc" id="employment-desc-div">
									<a id="update-we" data-id="<?php echo $employed->we_id;?>">
										<?php echo $employed->position_name.'@'.$employed->company_name;?>
									</a>
								</div>
							</div>
							<?php
						}
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php }else{
$id = $_SESSION['admin_id'];
$select = $db->query("SELECT * FROM admins WHERE admin_id = '$id'")	;
$fetch = $select->fetch_object();
?>

<div class="admin-profile-wrapper">
	<div class="admin-profile-header">
		<h4>
			Profile
			- <a class="view-logs" href="my-logs.php" target="_blank">View Logs</a>
		</h4>
		
	</div>
	<div class="admin-cell">
		<input type="text" id="fname" value="<?php echo $fetch->fname;?>" disabled />
		<p> First Name </p>
	</div>
	<div class="admin-cell">
		<input type="text" id="mname" value="<?php echo $fetch->mname;?>" disabled />
		<p> Middle Name </p>
	</div>
	<div class="admin-cell">
		<input type="text" id="lname" value="<?php echo $fetch->lname;?>" disabled />
		<p> Last Name </p>
	</div>
	<div class="admin-cell">
		<input type="text" id="username" value="<?php echo $fetch->username;?>" disabled />
		<p> Username </p>
	</div>
	<div class="admin-cell" id="password-cell">
		<input type="password" id="current-password" />
		<p> Current Password <small><i>*Required. To validate this is your account.</i></small></p>
	</div>
	<div class="admin-cell" id="password-cell">
		<input type="password" id="new-password" />
		<p> New Password <small><i>Not required to fill</i></small></p>
	</div>
	<button class="update-admin-acc" id="update-admin-acc" data-action="update"> Update </button>
	<button class="cancel-admin-acc" onclick="location.reload()"> Cancel </button>
</div>
<?php if(isset($_SESSION['admin_id']) && $_SESSION['admin_id'] == 1){ ?>
<style>
.add-admin-wrapper{
	width: 40%;
	margin-left: 30%;
	margin-bottom: 50px;
	display: flex;
	justify-content: flex-end;
}	
button.admins{
	outline: none;
	font-size: 20px;
	padding: 8px;
	border: none;
	background: #b3b3b3;
	color: white;
}
button.admins:hover{
	background: #0099ff;
}
form.new-admin-form{
	background: #f5f5f5;
	width: 80%;
	margin: 10px auto;
	padding: 8px;
}
form.new-admin-form .fieldset{
	padding: 8px;
	border-bottom: 2px solid #b3b3b3;
}
form.new-admin-form .input-wrapper input{
	padding: 3px;
	font-size: 18px;
	width: 70%;
}
button.submit-new-admin{
	padding: 8px;
	font-size: 20px;
	background: #0099ff;
	color: white;
	border: none;
}
@media only screen and (max-width: 767px){
	.add-admin-wrapper{
		width: 100%;
		margin: 0;
		justify-content: center;
	}
	form.new-admin-form{
		width: 100%;
	}
	form.new-admin-form .input-wrapper input{
		width: 100%;
	}
}
</style>
<div class="add-admin-wrapper">
	<button class="admins">Other Admins</button>
</div>
<script>
jQuery(function($){
	
$(document) .on('click','button.admins',function(){
	$('.at-modal').load('admins-modal.php').show();
});

$(document) .on('click','button#add-admin',function(){
	$('.at-modal').load('new-admin-modal.php').show();
});

$(document) .on('submit','form#new-admin-form',function(e){
	e.preventDefault();
	e.stopPropagation();
	e.stopImmediatePropagation();
	var form1 = new FormData(this);
	$.ajax({
		'processData' : false,
		'contentType' : false,
		'type' : 'post',
		'url' : 'new-admin-submit.php',
		'data' : form1,
		'success' : function(response){
			if(response != " " && response != ""){
				var respo = JSON.parse(response);
				alert(respo.msg);
				if(respo.type == 'success'){
					$('.at-modal').load('admins-modal.php').show();
				}
			}
		}
	});
});

$(document) .on('click','button.admin-btn#delete',function(){
	if(confirm("ARE YOU SURE? This action cannot be undone.") !== false){
		var id = $(this).data('id');
		$.ajax({
			'type' : 'post',
			'url' : 'delete-admin.php',
			'data' : {'id' :id},
			'success' : function(response){
				var respo = JSON.parse(response);
				alert(respo.msg);
				if(respo.type == 'success'){
					$('.at-modal').load('admins-modal.php').show();
				}
			}
		});
	}
});
	
});
</script>
<?php } ?>

	
<?php } ?>
<?php include 'footer.php'; ?>