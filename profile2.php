<?php
include 'header.php';
include 'nav.php';
require 'db.php';
if(isset($_SESSION['alumni_id'])){
$id = $_SESSION['alumni_id'];
$selects = $db->query("SELECT alumni.*, employment_employed.*, employment_self.*,
	employment_employed.monthly_income AS employed_income, employment_self.monthly_income AS self_income
	FROM alumni
	LEFT JOIN employment_employed ON employment_employed.alumni_id = alumni.alumni_id
	LEFT JOIN employment_self ON employment_self.alumni_id = alumni.alumni_id
	WHERE alumni.alumni_id = '$id' 
	");
$fetchs = $selects->fetch_object();
if($fetchs->employment_status == 'Employed'){
	$select = $db->query("SELECT alumni.*, employment_employed.*, employment_employed.monthly_income AS employed_income
		FROM alumni LEFT JOIN employment_employed ON employment_employed.alumni_id = alumni.alumni_id WHERE alumni.alumni_id ORDER BY ee_id DESC");
}else if($fetchs->employment_status == 'Self-Employed'){
	$select = $db->query("SELECT alumni.*, employment_self.*, employment_self.monthly_income AS self_income
		FROM alumni LEFT JOIN employment_self ON employment_self.alumni_id = alumni.alumni_id WHERE alumni.alumni_id ORDER BY es_id DESC");
}else if($fetchs->employment_status == 'Not Specified'){
	$select = $db->query("SELECT * FROM alumni");
}
if($fetchs->employment_status == 'Unemployed'){
	$ratings = $db->query("SELECT * FROM alumni_rating LEFT JOIN questions ON alumni_rating.question_id = questions.question_id WHERE alumni_id = '$id' ");
}
$fetch = $select->fetch_object();
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
			<div class="pp-row">
				<div class="pp-cell">
					<h4>
						<?php echo $fetchs->email_address; ?> 
						<button class="update-profile-btn" id="update-profile-btn" data-type="email-address">
							<span class="glyphicon glyphicon-edit"></span>
						</button>
					</h4>
					<p> E-mail Address </p>
				</div>
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
			<div class="pp-row">
				<div class="pp-cell">
					<h4> <?php echo $fetchs->course.'<br/>'.date('F j, Y',strtotime($fetchs->date_graduated)); ?> </h4>
					<p> Course and Date Graduated </p>
				</div>
			</div>
			<div class="pp-row">
				<div class="pp-cell">
					<h4> <?php echo $fetchs->employment_status; ?> </h4>
					<p> Employment Status </p>
				</div>
			</div>
			<?php
			if($fetchs->employment_status == 'Employed'){
				?>
				<div class="pp-row">
					<div class="pp-cell">
						<h4> <?php echo $fetchs->employer_name; ?> </h4>
						<p> Name of Employer/Organization </p>
					</div>
				</div>
				<div class="pp-row">
					<div class="pp-cell">
						<h4> <?php echo $fetchs->employer_type; ?> </h4>
						<p> Type of Employer/Organization </p>
					</div>
					<div class="pp-cell">
						<h4> <?php echo $fetchs->employment_type; ?> </h4>
						<p> Employment Type </p>
					</div>
				</div>
				<div class="pp-row">
					<div class="pp-cell">
						<h4> <?php echo $fetchs->occupation; ?> </h4>
						<p> Occupation Classification </p>
					</div>
				</div>
				<div class="pp-row">
					<div class="pp-cell">
						<h4> <?php echo $fetchs->designation; ?> </h4>
						<p> Designation </p>
					</div>
					<div class="pp-cell">
						<h4> <?php echo $fetchs->department_or_division; ?> </h4>
						<p> Department / Division </p>
					</div>
				</div>
				<div class="pp-row">
					<div class="pp-cell">
						<h4> <?php echo $fetchs->num_of_months; ?> </h4>
						<p> Number of Months in the Company </p>
					</div>
					<div class="pp-cell">
						<h4> <?php echo $fetchs->place_of_work; ?> </h4>
						<p> Place of Work </p>
					</div>
					<div class="pp-cell">
						<h4> <?php echo $fetchs->is_first_job; ?> </h4>
						<p> Is this your first job after finishing your degree? </p>
					</div>
				</div>
				<div class="pp-row">
					<div class="pp-cell">
						<h4> <?php echo $fetchs->status; ?> </h4>
						<p> Status </p>
					</div>
					<div class="pp-cell">
						<h4> <?php echo $fetchs->employed_income; ?> </h4>
						<p> Monthly Income Range </p>
					</div>
				</div>
				<div class="pp-row">
					<div class="pp-cell">
						<h4 style="text-align: justify;"> <?php echo $fetchs->reason_for_staying; ?> </h4>
						<p> Reason for staying in the Company </p>
					</div>
				</div>
				<?php
			}else if($fetchs->employment_status == "Self-Employed"){
				?>
				<div class="pp-row">
					<div class="pp-cell">
						<h4> <?php echo $fetchs->nature_of_employment; ?> </h4>
						<p> Nature of Employment </p>
					</div>
				</div>
				<div class="pp-row">
					<div class="pp-cell">
						<h4> <?php echo $fetchs->num_of_years; ?> </h4>
						<p> Number of Years </p>
					</div>
					<div class="pp-cell">
						<h4> <?php echo $fetchs->self_income; ?> </h4>
						<p> Monthly Income Range </p>
					</div>
				</div>
				<?php
			}else if($fetchs->employment_status == "Unemployed"){
				$ratings = $db->query("SELECT * FROM alumni_rating LEFT JOIN questions ON alumni_rating.question_id = questions.question_id WHERE alumni_id = '$id'");
				?>
				<div class="pp-row">
					<div class="pp-cell">
						<h4 style="text-align: justify;"> <?php echo $fetchs->unemployed_reason; ?> </h4>
						<p> Reason why you are unemployed </p>
					</div>
				</div>
				<div class="pp-rating-wrapper">
				<?php
				while($rating = $ratings->fetch_object()){
					?>
					<div class="pp-stars-wrapper">
						<div class="pp-stars">
							<?php
							for($i = 1; $i <= $rating->rating; $i++){
								?> <span class="glyphicon glyphicon-star"></span> <?php
							}
							for($x = 1; $x <= 4 - $rating->rating; $x++){
								?> <span class="glyphicon glyphicon-star-empty"></span> <?php
							}
							?>
						</div>
						<div class="pp-rating-question">
							<?php echo $rating->question_name; ?>
						</div>
					</div>
					<?php
				}
				?>
				</div>
				<?php
			}
			?>
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
				<div class="add-item-option">
					<label class="add-item-label" for="add-survey-form">
						<div class="add-item-thumbnail">
							<span class="glyphicon glyphicon-pencil"></span>
							<div class="add-item-btn"> Survery Form </div>
						</div>
					</label>
					<div class="add-item-desc">
					</div>
					<button id="add-survey-form" class="upload-btn" style="width: 90%; margin-left: 5%; margin-top: 40px;"> Fill out</button>
				</div>
			</div>
			<?php
			$employeds = $db->query("SELECT* FROM employment_employed WHERE alumni_id = '$id'");
			$selfs = $db->query("SELECT * FROM employment_self WHERE alumni_id = '$id'");
			$portfolios = $db->query("SELECT * FROM portfolios WHERE alumni_id = '$id' ORDER BY portfolio_type ASC ");
			$url = [];
			?>
			<div class="portfolio-items">
				<div class="pi-header">
					<h4> Employment Experience </h4>
				</div>
				<div class="pi-content">
					<?php
					if($employeds->num_rows > 0){
						while($employed = $employeds->fetch_object()){
							?>
							<div class="portfolio-item">
								<button class="delete-portfolio-item" id="delete-employment-item" data-id="<?Php echo $employed->ee_id;?>" data-status="employed">
									<span class="glyphicon glyphicon-trash"></span>
								</button>
								<div class="portfolio-thumbnail">
									<span class="glyphicon glyphicon-briefcase"></span>
								</div>
								<div class="portfolio-desc" id="employment-desc-div">
									<a href="view-employment.php?id=<?php echo $employed->ee_id;?>&status=employed" target="_blank">
										<?php echo $employed->occupation.'@'.$employed->employer_name;?>
									</a>
								</div>
							</div>
							<?php
						}
					}
					?>
					
					<?php
					if($selfs->num_rows > 0){
						while($self = $selfs->fetch_object()){
							?>
							<div class="portfolio-item">
								<button class="delete-portfolio-item" id="delete-employment-item" data-id="<?php echo $self->es_id;?>" data-status="self">
									<span class="glyphicon glyphicon-trash"></span>
								</button>
								<div class="portfolio-thumbnail">
									<span class="glyphicon glyphicon-briefcase"></span>
								</div>
								<div class="portfolio-desc">
									<a href="view-employment.php?id=<?php echo $self->es_id;?>&status=self" target="_blank">
										<?php echo $self->nature_of_employment; ?>
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
		<h4> Profile </h4>
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
		<p> Current Password </p>
	</div>
	<div class="admin-cell" id="password-cell">
		<input type="password" id="new-password" />
		<p> New Password </p>
	</div>
	<button class="update-admin-acc" id="update-admin-acc" data-action="update"> Update </button>
	<button class="cancel-admin-acc" onclick="location.reload()"> Cancel </button>
</div>
	
<?php } ?>
<?php include 'footer.php'; ?>