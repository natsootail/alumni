<?php
require 'db.php';
$id = $_POST['id'];
$skills = $db->query("SELECT * FROM skills");
?>

<div class="alumni-input-row">
	<div class="alumni-fieldset">
		<div class="input-wrapper">
			<select name="<?php echo "new-skill[$id][]";?>">
				<option value="0">---SELECT SKILL---</option>
				<?php
				while($skill = $skills->fetch_object()){
					echo "<option value='".$skill->skill_id."'>".$skill->skill_name."</option>";
				}
				?>
			</select>
			<hr />
		</div>
		<label> Skill </label>
	</div>
	<div class="alumni-fieldset">
		<div class="input-wrapper">
			<select name="<?php echo "new-rating[$id][]";?>">
				<?php for($i = 1; $i <= 10; $i++){ ?>
					<option value="<?php echo $i;?>"> <?php echo $i; ?> </option>
				<?php } ?>
			</select>
			<hr />
		</div>
		<label> Rating </label>
	</div>
</div>