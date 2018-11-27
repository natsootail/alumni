<?php

require 'db.php';
$skills = $db->query("SELECT * FROM skills");
?>

<div class="at-modal-wrapper">
	<div class="at-modal-header">
		<button class="close">&times;</button>
		<h4> Add Company </h4>
	</div>
	<div class="at-modal-content">
		<form method="post" action="add-company-submit.php" class="add-company-form" id="add-company-form">
			<div class="alumni-input-row">
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="text" name="company-name" placeholder="Company Name" required />
						<hr />
					</div>
					<label> Company Name </label>
				</div>
			</div>
			<div class="alumni-input-row">
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="text" name="company-address" placeholder="Company Address" required />
						<hr />
					</div>
					<label> Company Address </label>
				</div>
			</div>
			<div class="alumni-input-row">
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="text" name="contacts[contact-person]" placeholder="Contact Person" required />
						<hr />
					</div>
					<label> Contact Person </label>
				</div>
			</div>
			<div class="alumni-input-row">
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="text" name="contacts[telephone-number]" placeholder="Telephone Number" required />
						<hr />
					</div>
					<label> Telephone Number </label>
				</div>
			</div>
			<div class="alumni-input-row">
				<div class="alumni-fieldset">
					<div class="input-wrapper">
						<input type="text" name="contacts[mobile-number]" placeholder="Mobile Number" />
						<hr />
					</div>
					<label> Mobile Number </label>
				</div>
			</div>
			<div class="positions-form">
				<div class="position-form" data-id="1">
					<div class="alumni-input-row">
						<div class="alumni-fieldset">
							<div class="input-wrapper">
								<input type="text" name="position[1]" placeholder="Position" />
								<hr />
							</div>
							<label> Position </label>
						</div>
					</div>
					<div class="alumni-input-row" id="rs-row">
						<div class="alumni-fieldset">
							<div class="input-wrapper">
								<select name="skill[1][]">
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
								<select name="rating[1][0]">
								<?php for($i=1; $i <= 10; $i++){ ?>
									<option value="<?php echo $i;?>"> <?php echo $i; ?> </option>
								<?php } ?>
								</select>
								<hr />
							</div>
							<label> Rating </label>
						</div>
					</div>
					<div class="alumni-input-row">
						<button class="ars" id="ars" data-id="1" type="button"> Add Skill </button>
					</div>
				</div>
			</div>
			<div class="alumni-input-row">
				<button class="apos" id="apos" data-id="1" type="button"> Add Position </button>
			</div>
			<div class="alumni-input-row">
				<button class="submit-company"> Submit </button>
			</div>
		</form>
	</div>
	<div class="at-modal-footer"></div>
</div>