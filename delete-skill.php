
<style>
	.confirm{
		width: 30%;
		margin: 150px auto;
	}
	.confirm h4{
		text-align: center;
		background: #555;
		color: #d4d4d4;
		padding: 12px;
	}
	.confirm a{
		display: inline-block;
		width: 40%;
		text-align: center;
		padding: 8px;
		border: 2px solid black;
		margin-left: 3.5%;
		text-decoration: none;
		background: #333;
	}
	a#confirm{
		color: #ee2222;
	}
	a#cancel{
		color: white;
	}
</style>
<?php

require 'db.php';
require 'functions-validate.php';
session_start();

$id = validate($_GET['id']);

$select = $db->query("SELECT * FROM skills WHERE skill_id = '$id'");
$fetch = $select->fetch_object();
$skill = $fetch->skill_name;

if(isset($_GET['confirmed']) && isset($_GET['id']) && $_GET['confirmed'] == 1){
	if($db->query("DELETE FROM skills WHERE skill_id = '$id'")){
		$_SESSION['msgtext'] = "$skill Deleted!";
		$_SESSION['msgtype'] = "success";
		header('location: add-skill-form.php');
	}else{
		$_SESSION['msgtext'] = mysqli_error($db);
		$_SESSION['msgtype'] = "error";
		header('location: add-skill-form.php');
	}
}else{
	?>
	<div class="confirm">
		<h4> Are you sure you want to delete <?php echo $skill;?> ? </h4>
		<a href='add-skill-form.php' id="cancel"> Cancel </a>
		<a href="delete-skill.php?id=<?php echo $id;?>&confirmed=1" id="confirm"> Confirm </a>
	</div>
	<?php
}
?>