<?php
include 'header.php';
require 'db.php';
if(!isset($_SESSION['admin_id'])){
	?>
	<script>
		alert("ADMIN MUST LOGIN!");
		window.open("index.php","_self");
	</script>
	<?php
	exit();
}
$categories = $db->query("SELECT * FROM categories");
$skills = $db->query("SELECT * FROM skills LEFT JOIN categories ON skills.category_id = categories.category_id");
?>

<?php
if(isset($_SESSION['msgtext']) && !empty($_SESSION['msgtext'])){
	echo "<div class='notif notif-".$_SESSION['msgtype']."'>".$_SESSION['msgtext']."</div>";
	$_SESSION['msgtext'] = $_SESSION['msgtype'] = "";	
}
?>
<form class="add-skill-form" method="post" action="add-skill.php">
	<div class="alumni-input-row">
		<div class="alumni-fieldset">
			<div class="input-wrapper">
				<input list="categories" name="category" autofocus />
				<hr />
				<datalist id="categories">
					<?php
					while($category = $categories->fetch_object()){
						?>
						<option value="<?php echo $category->category_name;?>" />
						<?php
					}
					?>
				</datalist>
			</div>
			<label> Category </label>
		</div>
	</div>
	<div class="alumni-input-row">
		<div class="alumni-fieldset">
			<div class="input-wrapper">
				<input type="text" name="skill" />
				<hr />
			</div>
			<label> Skill </label>
		</div>
	</div>
	<div class="alumni-input-row btns">
		<button name="submit-skill"> Submit </button>
	</div>
</form>
<div class="asf-skills">
	<div class="asf-skills-row">
		<div class="asf-skills-cell"> Skill </div>
		<div class="asf-skills-cell"> Category </div>
		<div class="asf-skills-cell actions"> Actions </div>
	</div>
	<?php
	while($skill = $skills->fetch_object()){
		?>
		<div class="asf-skills-row">
			<div class="asf-skills-cell"> <?php echo $skill->skill_name; ?> </div>
			<div class="asf-skills-cell"> <?php echo $skill->category_name; ?> </div>
			<div class="asf-skills-cell actions"> <a href="delete-skill.php?id=<?php echo $skill->skill_id;?>"> Delete </a> </div>
		</div>
		<?php
	}
	?>
</div>