<?php require 'db.php'; ?>

<div class="alumni-input-row">
	<div class="alumni-fieldset">
		<div class="input-wrapper">
			<textarea id="unemployed-reason" rows="3"></textarea>
			<hr />
		</div>
		<label> Reason for Unemployment </label>
	</div>
</div>

<div class="alumni-input-row" id="fields-label">
	<h4> Rate the contribution of the program of your study at your University to your Personal and Professional Growth. </h4>
	<p>(1-Poorly, 2-Fairly, 3-Highly, 4-Very-Highly) </p>
</div>
<?php

$select1 = $db->query("SELECT * FROM questions WHERE question_category = '1'");
while($fetch1 = $select1->fetch_object()){
	?>
	<div class="alumni-input-row" id="question-row">
		<label class="rating-question"> <?php echo $fetch1->question_name;?> </label>
		<?php
		for($i = 1; $i<=4; $i++){
			?>
			<label class="rating-label">
				<input type="radio" id="<?php echo $fetch1->remarks;?>" name="<?php echo $fetch1->remarks; ?>" value="<?php echo $i;?>" />
				<div class="rating-option"> <?php echo $i; ?> </div>
			</label>
			<?php
		}
		?>
	</div>
	<hr />
	<?php
}
?>

<div class="alumni-input-row" id="fields-label">
	<h4> How would you rate the degree program you finished at your Univesity. </h4>
	<p>(1-Poorly, 2-Fairly, 3-Highly, 4-Very-Highly) </p>
</div>
<?php

$select2 = $db->query("SELECT * FROM questions WHERE question_category = '2'");
while($fetch2 = $select2->fetch_object()){
	?>
	<div class="alumni-input-row" id="question-row">
		<label class="rating-question"> <?php echo $fetch2->question_name;?> </label>
		<?php
		for($i = 1; $i<=4; $i++){
			?>
			<label class="rating-label">
				<input type="radio" id="<?php echo $fetch2->remarks;?>" name="<?php echo $fetch2->remarks; ?>" value="<?php echo $i;?>" />
				<div class="rating-option"> <?php echo $i; ?> </div>
			</label>
			<?php
		}
		?>
	</div>
	<hr />
	<?php
}
?>
