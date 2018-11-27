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
$wes = $db->query("SELECT * FROM work_experiences 
	LEFT JOIN experienced_fields ON experienced_fields.we_id = work_experiences.we_id
	LEFT JOIN skills ON experienced_fields.skill_id = skills.skill_id
	WHERE work_experiences.alumni_id = '$id'
	");
$i = 1;
$fields = array();
while($we = $wes->fetch_object()){
	$fields[$we->we_id]['fields'][] = $we->skill_name;
	$fields[$we->we_id]['company'] = $we->company_name;
	$fields[$we->we_id]['level'] = $we->position_level;
	$fields[$we->we_id]['position'] = $we->position_name;
	$fields[$we->we_id]['date-start'] = date('Y-m-d',strtotime($we->we_date_start));
	$fields[$we->we_id]['date-end'] = !empty($we->we_date_end) ? date('Y-m-d',strtotime($we->we_date_end)) : "Ongoing";
	$fields[$we->we_id]['is-it-related'] = ($we->is_it_related == 1) ? "Yes" : "No";
}
?>
<!DOCTYPE html>
<html>
<head>
<title> Alumni Work Experience </title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<script src="elements/jquery-2.1.3.min.js"></script>
<script>
jQuery(function($){
	$(document) .on('click','button#view-exp',function(){
		var id = $(this).data('id');
		$.ajax({
			'type' : 'post',
			'url' : 'view-exp.php',
			'data' : {'id' : id },
			'success' : function(response){
				$('.at-modal').html(response).show();
			}
		});
	});
	$(document) .on('click','button.close',function(){
		$(this).parents('.at-modal').hide().html('');
	});
});
</script>
<style>
.at-modal{
	display: none;
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: rgba(255,255,255,.7);
	z-index: 9;
}
.at-modal-wrapper{
	width: 50%;
	position: absolute;
	left: 25%;
	border: 2px solid #333;
	animation: modalDrop .4s linear forwards;
}
.at-modal-wrapper#add-alumni-form{
	animation: modalDrop-add-alumni-form .4s linear forwards;
}
@keyframes modalDrop-add-alumni-form{
	0%{
		top: -300px;
	}
	100%{
		top: 50px;
	}
}
@keyframes modalDrop{
	0%{
		top: -300px;
	}
	100%{
		top: 50px;
	}
}
.at-modal-header{
	background: #333;
	color: white;
	padding: 15px 0 2px 0;
	position: relative;
	border-bottom: 5px solid white;
}
.at-modal-header button{
	background: none;
	color: rgba(255,255,255,.5);
	border: none;
	font-size: 18px;
	position: absolute;
	right: 10px;
	top: 4px;
}
.at-modal-header button:hover{
	color: white;
}
.at-modal-header h4{
	font-size: 25px;
	text-indent: 12px;
	font-variant: small-caps;
}
.at-modal-content{
	max-height: 500px;
	overflow: auto;
}
.at-modal-footer{
	padding: 5px;
	background: #333;
	border-top: 5px solid white;
}
*{
	box-sizing: border-box;
	padding: 0;
	margin: 0;
	font-family: "Cambria";
}
.pw-wrapper{
	background: url('imgs/some-header.png') no-repeat;
	background-size: 100%;
	padding: 25px;
	padding-top: 15%;
}
.pw-content{
	width: 80%;
	margin: 30px auto;
}
.pw-header{
	margin-top: 15px;
}
.pw-header h4{
	text-align: center;
	font-size: 25px;
}
.pw-header p{
	text-align: center;
	font-size: 22px;
}
.pw-row{
	display: flex;
	flex-flow: row nowrap;
}
.pw-cell{
	padding: 8px;
}
.pw-row-header{
	background: #0a76d2;
	color: white;
	font-size: 18px;
	font-weight: bold;
}
.pw-row-header .pw-cell{
	border-right: 1px solid white;
}
.pw-row-header .pw-cell:last-child{
	border-right: none;
}
.pw-cell#num{
	flex-basis: 50px;
	text-align: center;
}
.pw-cell#company{
	flex: 1;
}
.pw-cell#level{
	flex-basis: 120px;
}
.pw-cell#position{
	flex-basis: 170px;
}
.pw-cell#is-it-related{
	flex-basis: 110px;
	text-align: center;
}
.pw-cell#emp-date{
	flex-basis: 110px;
	text-align: center;
}
.pw-cell#fields{
	flex: 1;

}
.pw-list .pw-row{
	border-bottom: 1px solid #f5f5f5;
}
.pw-list .pw-row:nth-of-type(odd){
	background: #fafafa;
}
.pw-list .pw-cell{
	border-right: 1px solid #f5f5f5;
}
.pw-list .pw-cell:last-child{
	border-right: none;
}
@page{
	margin: 0;
}
@media print{
	.pw-header h4{
		font-size: 22px;
	}
	.pw-header p{
		font-size: 19px;
	}
	.pw-content{
		width: 95%;
	}
	.pw-row-header{
		font-size: 15px;
	}
	.pw-list .pw-row{
		font-size: 13px;
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
.pw-wrapper{
	background: none;
}
body{
	background: url('imgs/some-header.png') no-repeat;
	background-size: 100% 80px;
}
@media only screen and (max-width: 767px){
	body{
		margin: 0 !important;
		padding: 0 !important;
	}
	.pw-content,
	.pw-header{
		width: 100%;
	}
	.pw-wrapper{
		padding: 0;
		margin-top: 100px;
		overflow: auto;
	}
	.pw-header p,
	.pw-header h4{
		font-size: 1.1em;
	}
	.pw-row-header .pw-cell{
		font-size: .75em;
	}
	.hos{ display: none; }
	button#view-exp{
		border: none;
		background: none;
		color: blue;
		font-weight: bold;
	}
	.at-modal{
		overflow: auto;
	}
	.at-modal-wrapper{
		width: 90%;
		left: 5%;
		background: #f5f5f5;
		margin-bottom: 50px;
	}
	.pp-row{
		width: 95%;
		margin: 0 auto;
	}
	.pp-cell{
		display: flex;
		flex-flow: row wrap;
		border: 1px solid #b3b3b3;
		margin: 8px 0;
	}
	.pp-cell h4{
		padding: 5px;
		text-align: center;
		order: 2;
		width: 100%;
	}
	.pp-cell p{
		padding: 5px;
		width: 100%;
		order: 1;
		background: #b3b3b3;
	}
}
@media only screen and (min-width: 768px){
	.hol{ display: none; }
}
@media print{
	.hol{ display: none; }
}
@page{
	size: 11in 8in;
}
</style>
</head>
<body>
<button class="print" onclick="window.print()">Print</button>
<div class="pw-wrapper">
	<div class="pw-header">
		<h4> <?php echo $alumni->fname.' '.$alumni->mname.' '.$alumni->lname; ?> </h4>
		<p> Work Experience </p>
	</div>
	<div class="pw-content">
		<div class="pw-row pw-row-header">
<!--
			<div class="pw-cell" id="num"> # </div>
!-->
			<div class="pw-cell" id="company"> Company </div>
			<div class="pw-cell hos" id="level"> Position Level </div>
			<div class="pw-cell" id="position"> Position Name </div>
			<div class="pw-cell hos" id="emp-date"> Date Started </div>
			<div class="pw-cell hos" id="emp-date"> Date Ended </div>
			<div class="pw-cell hos" id="is-it-related"> IT Related </div>
			<div class="pw-cell hos" id="fields"> Fields of Experience </div>
			<div class="pw-cell hol sos"> Actions </div>
		</div>
		<div class="pw-list">
			<?php
			foreach($fields AS $we_id => $keys){
				$field = implode(", ",$keys['fields']);
				?>
				<div class="pw-row">
					<div class="pw-cell" id="company"> <?php echo $keys['company']; ?> </div>
					<div class="pw-cell hos" id="level"> <?php echo $keys['level']; ?> </div>
					<div class="pw-cell" id="position"> <?php echo $keys['position']; ?> </div>
					<div class="pw-cell hos" id="emp-date"> <?php echo $keys['date-start']; ?> </div>
					<div class="pw-cell hos" id="emp-date"> <?php echo $keys['date-end']; ?> </div>
					<div class="pw-cell hos" id="is-it-related"> <?php echo $keys['is-it-related']; ?> </div>
					<div class="pw-cell hos" id="fields"> <?php echo $field; ?> </div>
					<div class="pw-cell hol sos"> <button class="view-exp" id="view-exp" data-id="<?php echo $we_id;?>"> View </button> </div>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</div>
<div class="at-modal"></div>