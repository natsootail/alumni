<!DOCTYPE html>
<htm>
<head>
<title> Alumni Profile </title>
<meta name="viewport" content="width=device-width, intial-scale=1" />
<style>
*{
	box-sizing: border-box;
	padding: 0;
	margin: 0;
	font-family: "Cambria";
}
bodyx{
	background-image: url('imgs/pp-bg.png');
	background-size: 100%;
	background-origin: border-box;
	background-clip: content-box;
}

.print-profile-wrapperx{
	border-top: 150px solid transparent;
//	border-width: 150px 0px 50px 0px;
	border-image: url('imgs/pp-bg.png');
	border-image-repeat: round;
	border-image-width: 100%;
	border-image-slice: 1 100;
	padding: 15px;
}
.print-profile-wrapper{
	background: url('imgs/some-header.png') no-repeat;
	background-size: 100%;
	background-position: center top;
	padding: 25px;
	padding-top: 15%;
}
.pp-header h4{
	font-size: 25px;
	font-variant: small-caps;
	text-align: center;
	padding: 8px;
}
.pp-row{
	display: flex;
	flex-flow: row nowrap;
	padding: 5px;
	margin: 12px 5px;
	page-break-inside: avoid;
}
.pp-cell{
	flex: 1;
	margin: 0px 5px;
	border-bottom: 1px solid #f5f5f5;
}
.pp-cell.name-label{
	flex: initial;
	flex-basis: 80px;
}
.pp-name-fields{
	display: flex;
	flex-flow: row nowrap;
	align-items: flex-end;
}
.pp-field{
	flex: 1;
	margin: 0px 8px;
	text-align: center;
}
.pp-field h4{
	border-bottom: 1px solid #b3b3b3;
}
h4.pp-content-header{
	background: #0a76d2;
	color: white;
	padding: 8px;
	font-size: 17px;
	border-bottom: 15px double white;
	margin-top: 12px;
}
.pp-cell{
	display: flex;
	flex-flow: row nowrap;
}
.pp-cell label{
	flex-basis: 160px;
	padding-bottom: 3px;
}
.pp-cell h4{
	flex: 1;
	margin-left: 8px;
	padding-bottom: 3px;
}
@page{
	margin: 0;
}
.bottom-border{
	width: 100%;
	height: 20px;
}
@media print{
	.bottom-border{
		position: fixed;
		bottom: 0;
	}
	button.print{
		display: none;
	}
}
button.print{
	position: fixed;
	top: 25%;
	left: 5px;
	padding: 8px;
	font-size: 22px;
	width: 120px;
	cursor: pointer;
	background: black;
	color: white;
	border: none;
	opacity: .2;
	transition: .2s;
}
button.print:hover{
	opacity: .8;
	box-shadow: 3px 3px 5px 1px grey;
}
@media only screen and (max-width: 767px){
	body{
	}
	.print-profile-wrapper{
		background-repeat: no-repeat;
		background-size: 100% 80px;
		width: 95%;
		margin: 0 auto;
		overflow: auto;
		padding: 0;
	}
	.pp-header{
		margin-top: 80px;
	}
	.pp-row{
		flex-wrap: wrap;
		margin: 0;
		padding: 0;
	}
	.pp-cell{
		flex: initial;
		width: 100%;
		flex-wrap: wrap;
		border: 1px solid #b3b3b3;
		margin: 5px 0;
	}
	.pp-cell.name-label{
		background: #b3b3b3;
		flex-basis: 100%;
		padding: 3px;
		margin-top: 0;
	}
	.pp-name-fields{
		flex-wrap: wrap;
		border: none;
		padding: 0px 5px;
	}
	.pp-row-name{
		border: 1px solid #b3b3b3;
	}
	.pp-field{
		flex: initial;
		width: 100%;
		display: flex;
		flex-flow: row wrap;
		margin: 0;
		margin-bottom: 5px;
		border: 1px solid #b3b3b3;
	}
	.pp-field p{
		width: 100%;
		padding: 3px;
		order: 1;
		text-align: left;
		background: #b3b3b3;
	}
	.pp-field h4{
		order: 2;
		border: none;
	}
	.pp-cell label{
		flex: initial;
		width: 100%;
		background: #b3b3b3;
		padding: 3px;
	}
	.pp-cell h4{
		text-align: center;
	}
}
</style>
</head>
<body>
<button class="print" onclick="window.print()">Print</button>
<?php
session_start();
if(isset($_SESSION['admin_id']) || isset($_SESSION['alumni_id'])){
	if(isset($_SESSION['alumni_id']) && $_SESSION['alumni_id'] != $_GET['id']){
		header('location: index.php');
	}
}else{
	header('location: index.php');
}
require 'db.php';
require 'functions-validate.php';
$id = validate($_GET['id']);

$alumniGet = $db->query("SELECT * FROM alumni WHERE alumni_id = '$id'");
$alumni = $alumniGet->fetch_object();
$guardians = $db->query("SELECT * FROM alumni_guardians WHERE alumni_id = '$id'");
$guardians_arr = array();
if($guardians->num_rows > 0){
	while($guardian = $guardians->fetch_object()){
		$rel = ucwords($guardian->ag_relationship);
		if($rel != "Mother" && $rel != "Father"){
			$rel = "Guardian";
		}
		$guardians_arr[$rel] = $guardian->ag_fname.' '.$guardian->ag_mname.' '.$guardian->ag_lname;
	}
}
$emailAdds = $db->query("SELECT * FROM alumni_email_add WHERE alumni_id = '$id'");
$ebs = $db->query("SELECT * FROM more_educ_bgs WHERE alumni_id = '$id'");
?>

<div class="print-profile-wrapper">
	<div class="pp-header">
		<h4> Alumni Profile </h4>
	</div>
	<div class="pp-content">
		<h4 class="pp-content-header"> Personal Information </h4>
		<div class="pp-row pp-row-name">
			<div class="pp-cell name-label"> Name: </div>
			<div class="pp-cell pp-name-fields">
				<div class="pp-field">
					<h4> <?php echo $alumni->lname; ?> </h4>
					<p> Last </p>
				</div>
				<div class="pp-field">
					<h4> <?php echo $alumni->fname; ?> </h4>
					<p> First </p>
				</div>
				<div class="pp-field">
					<h4> <?php echo !empty($alumni->mname) ? $alumni->mname: "" ; ?> </h4>
					<p> Middle </p>
				</div>
				<?php if(!empty($alumni->past_name)){ ?> 
				<div class="pp-field">
					<h4> <?php echo !empty($alumni->past_name) ? $alumni->past_name: "" ; ?> </h4>
					<p> Maiden </p>
				</div>
				<?php } ?>
			</div>
		</div>
		<div class="pp-row">
			<div class="pp-cell">
				<label> Present Address: </label>
				<h4> <?php echo $alumni->address_present; ?> </h4>
			</div>
		</div>
		<div class="pp-row">
			<div class="pp-cell">
				<label> Permanent Address: </label>
				<h4> <?php echo $alumni->address_permanent; ?> </h4>
			</div>
		</div>
		<div class="pp-row">
			<div class="pp-cell pp-cell-half">
				<label> Gender: </label>
				<h4> <?php echo $alumni->gender; ?> </h4>
			</div>
			<div class="pp-cell pp-cell-half">
				<label> Civil Status: </label>
				<h4> <?php echo $alumni->civil_status; ?> </h4>
			</div>
		</div>
		<div class="pp-row">
			<div class="pp-cell pp-cell-half">
				<label> Date of Birth: </label>
				<h4> <?php echo $alumni->date_of_birth; ?> </h4>
			</div>
			<div class="pp-cell pp-cell-half">
				<label> Place of Birth: </label>
				<h4> <?php echo $alumni->place_of_birth; ?> </h4>
			</div>
		</div>
		<?php if(!empty($guardians_arr['Father'])) { ?>
		<div class="pp-row">
			<div class="pp-cell">
				<label> Father's Name: </label>
				<h4> <?php echo !empty($guardians_arr['Father']) ? $guardians_arr['Father'] : ""; ?> </h4>
			</div>
		</div>
		<?php } ?>
		<?php if(!empty($guardians_arr['Mother'])){ ?>
		<div class="pp-row">
			<div class="pp-cell">
				<label> Mother's Name: </label>
				<h4> <?php echo !empty($guardians_arr['Mother']) ? $guardians_arr['Mother'] : ""; ?> </h4>
			</div>
		</div>
		<?php } ?>
		<?php if(!empty($guardians_arr['Guardian'])){ ?>
		<div class="pp-row">
			<div class="pp-cell">
				<label> Guardian's Name: </label>
				<h4> <?php echo !empty($guardians_arr['Guardian']) ? $guardians_arr['Guardian'] : ""; ?> </h4>
			</div>
		</div>
		<?php } ?>
		<?php
		if($ebs->num_rows > 0){
			?>
			<?php
			while($eb = $ebs->fetch_object()){
				?>
				<div class="pp-row">
					<div class="pp-cell">
						<label> Additional Educational Attainment: </label>
						<h4> <?php echo $eb->eb_course.' - '.$eb->eb_school.' - '.$eb->eb_date_graduated; ?> </h4>
					</div>
				</div>
				<?php
			}
		}
		?>
		<h4 class="pp-content-header"> Contact Information </h4>
		<div class="pp-row">
			<div class="pp-cell pp-cell-half">
				<label> Mobile Number: </label>
				<h4> <?php echo $alumni->mobile_number; ?> </h4>
			</div>
			<div class="pp-cell pp-cell-half">
				<label> Email Address(es): </label>
				<div class="email-address">
					<?php
					if($emailAdds->num_rows > 0){
						while($emailAdd = $emailAdds->fetch_object()){
							?>
							<h4> <?php echo $emailAdd->email_add; ?> </h4>
							<?php
						}
					}
					?>
				</div>
			</div>
		</div>
		<div class="pp-row">
			<div class="pp-cell pp-cell-half">
				<label> Facebook: </label>
				<h4> <?php echo $alumni->facebook_url; ?> </h4>
			</div>
			<div class="pp-cell pp-cell-half">
				<label> Twitter: </label>
				<h4> <?php echo $alumni->twitter_url; ?> </h4>
			</div>
		</div>
		<div class="pp-row">
			<div class="pp-cell pp-cell-half">
				<label> Youtube Channel: </label>
				<h4> <?php echo $alumni->youtube_link; ?> </h4>
			</div>
			<div class="pp-cell pp-cell-half">
				<label> Blog Link: </label>
				<h4> <?php echo $alumni->blog_link; ?> </h4>
			</div>
		</div>
		<div class="pp-row">
			<div class="pp-cell">
				<label> Course Graduated: </label>
				<h4> <?php echo $alumni->course; ?> </h4>
			</div>
		</div>
		<div class="pp-row">
			<div class="pp-cell">
				<label> Date Graduated: </label>
				<h4> <?php echo date('F j, Y',strtotime($alumni->date_graduated)); ?> </h4>
			</div>
		</div>
	</div>
</div>
<!--<img src="imgs/bottom-border.png" class="bottom-border" />!-->
</body>
</html>
