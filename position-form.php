<?php
require 'db.php';
$skills = $db->query("SELECT * FROM skills");
$id = $_POST['id'];
$id++;

?>
<div class="positions-form">
	<div class="position-form" data-id="<?php echo $id;?>">
		<div class="alumni-input-row">
			<div class="alumni-fieldset">
				<div class="input-wrapper">
					<input type="text" name="<?php echo "position[$id]";?>" placeholder="Position" />
					<hr />
				</div>
				<label> Position </label>
			</div>
		</div>
		<div class="alumni-input-row" id="rs-row">
			<div class="alumni-fieldset">
				<div class="input-wrapper">
					<select name="<?php echo "skill[$id][]";?>">
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
					<select name="<?php echo "rating[$id][]";?>">
						<?php
						for($i=1; $i <= 10; $i++){ ?>
						<option value="<?php echo $i;?>"> <?php echo $i; ?> </option>
						<?php } ?>
					</select>
					<hr />
				</div>
				<label> Rating </label>
			</div>
		</div>
		<div class="alumni-input-row">
			<button class="ars" id="ars" data-id="<?php echo $id;?>" type="button"> Add Skill </button>
		</div>
	</div>
</div>
<div class="alumni-input-row">
	<button class="apos" id="apos" data-id="<?php echo $id;?>" type="button"> Add Position </button>
</div>
