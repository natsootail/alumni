<!DOCTYPE html>
<html>
<head>
<title> Alumni Rating </title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<style>
*{
	box-sizing: border-box;
	padding: 0;
	margin: 0;
	font-family: "Cambria";
}
body{
	width: 80%;
	margin: 80px auto;
}
.rate-wrapper{
	width: 30%;
	height: 300px;
	display: inline-block;
//	margin: 30px;
	box-shadow: 3px 3px 5px 1px grey;
	padding: 8px;
}
.rate-number{
	text-align: center;
	font-size: 150px;
	height: 230px;
	display: flex;
	align-items: center;
	justify-content: center;
}
.rate-icons{
	height: 30px;
}
.bars-wrapper{
	display: flex;
	flex-flow: row nowrap;
}
.rate-icon{
	margin: 3px;
	width: 19%;
	height: 15px;
	background: #d5d5d5;
}
.rate-icon.active{
	background: #0a76d2;
}
.rate-skill{
	height: 40px;
	font-weight: bold;
	display: flex;
	align-items: center;
	justify-content: center;
}

</style>
</head>
<body>

<?php
session_start();
if(!isset($_SESSION['admin_id']) && isset($_SESSION['alumni_id'])){
	if($_SESSION['alumni_id'] != $_GET['id']){
		header('location: index.php');
	}
}else{
	header('location: index.php');
}
require 'db.php';
require 'functions-validate.php';
$id = validate($_GET['id']);
$as_id = validate($_GET['as_id']);
$alumniGet = $db->query("SELECT * FROM alumni WHERE alumni_id = '$id'");
$alumni = $alumniGet->fetch_object();

$ratings = $db->query("SELECT * FROM skills_rating
	LEFT JOIN alumni_skills ON skills_rating.as_id = alumni_skills.as_id
	LEFT JOIN skills ON skills_rating.skill_id = skills.skill_id
	LEFT JOIN categories ON skills.category_id = categories.category_id
	WHERE skills_rating.as_id = '$as_id'
	ORDER BY skills.category_id
	");
	
$ratings_arr = array();
$cat_id = 0;

function getRating($rating){
	?>
	<div class="bars-wrapper">
	<?php
	for($i = 6; $i <= 10; $i++){
		$active = ($i <= $rating) ? "active" : "";
		?>
		<div class="rate-icon <?php echo $active;?>"></div>
		<?php
	}
	?>
	</div>
	<div class="bars-wrapper">
	<?php
	for($i = 1; $i <= 5; $i++){
		$active = ($i <= $rating) ? "active" : "";
		?>
		<div class="rate-icon <?php echo $active;?>"></div>
		<?php
	}
	?>
	</div>
	<?php
}
?>
<div class="pr-wrapper">
	<div class="pr-header">
		<h4> <?php echo $alumni->fname.' '.$alumni->mname.' '.$alumni->lname; ?> </h4>
		<p> Skills Rating </p>
	</div>
	<div class="pr-content">
		<div class="pr-row">
			<div class="pr-cell">
		</div>
		<div class="pr-list">
		
		
		</div>
	</div>
</div>
<?php
while($rating = $ratings->fetch_object()){
	if($cat_id != $rating->category_id){
		?>
		<h4> <?php echo $rating->category_name; ?> </h4>
		<?php
	}
	$cat_id = $rating->category_id;
	$sRating = $rating->rating;
	?>
	<div class="rate-wrapper">
		<div class="rate-number">
			<?php echo $sRating; ?>
		</div>
		<div class="rate-icons">
			<?php echo getRating($sRating); ?>
		</div>
		<div class="rate-skill">
			<?php echo $rating->skill_name; ?>
		</div>
	</div>
	<?php
}



