
<div class="at-modal-wrapper">
	<div class="at-modal-header">
		<button class="close">&times;</button>
		<h4> <?php echo $_POST['company-name']; ?> - Add Skill Requirements </h4>
	</div>
	<div class="at-modal-content">
		<input type="hidden" id="company-name" value="<?php echo trim($_POST['company-name']); ?>" />
		<input type="text" id="search-ss" placeholder="Search Skills..." />
		<div class="skills-selection"> <?php include 'skills-selection.php'; ?> </div>
		<hr />
		<div class="skills-selected"></div>
	</div>
</div>