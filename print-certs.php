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
$certs = $db->query("SELECT * FROM certificates LEFT JOIN skills ON certificates.skill_id = skills.skill_id WHERE alumni_id = '$id'");

?>
<!DOCTYPE html>
<html>
<head>
<title> Alumni Certificates </title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<style>
*{
	box-sizing: border-box;
	padding: 0;
	margin: 0;
}
@page{
	margin: 25px;
	padding: 0;
	orientation: landscape;
}
@media screen{
	.certificate-wrapper{
		width: 80%;
		margin: 50px auto;
		height: 300px;
		width: 700px;
		box-shadow: -8px 8px 8px 2px grey;
	}
	.certificate-wrapper img{
		height: 100%;
		width: 100%;
	}
	.pc-header{
		background: url('imgs/pp-bg.png');
		background-size: 100%;
		background-position: center top;
		padding-top: 18%;
		text-align: center;
		font-size: 25px;
	}
	.pc-header h4{
		background: #0a76d2;
		width: 60%;
		padding-top: 18px;
		margin: 0 auto;
		color: white;
	}
	.pc-header p{
		letter-spacing: 1.5px;
		width: 60%;
		margin: 0 auto;
		color: white;
		background: #0a76d2;
		font-variant: small-caps;
		font-weight: bold;
	}
	
}
@media print{
	.pc-header{
		display: none;
	}
	.certificate-wrapper{
		margin: 0 auto;
		height: initial;
		width: initial;
		page-break-after: always;
		height: 8in;
	}
	.certificate-wrapper img{
		height: 100%;
		width: 100%;
	}
	button.print{
		display: none;
	}
}
@page{
	size: 11in 8.6in;
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
	.certificate-wrapper{
		width: 100%;
	}
}
</style>
</head>
<body>
<button class="print" onclick="window.print()">Print</button>
<div class="pc-header">
 <h4> <?php echo $alumni->fname.' '.$alumni->mname.' '.$alumni->lname; ?> </h4>
 <p> Certificates </p>
</div>
<?php
while($cert = $certs->fetch_object()){
	?>
	<div class="certificate-wrapper">
		<img src="<?php echo $cert->img_url; ?>" />
	</div>
	<?php
}
?>

</body>
</html>