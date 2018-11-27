<?php

include 'header.php';
include 'nav.php';

?>
<div class="company-header">
	<h4> Companies </h4>
	<div class='company-search'>
		<input type="text" id="company-search" placeholder="Enter Company Name / Position" />
	</div>
	<div class="company-actions">
		<button class="com-btn" id="search-company"> Search </button>
		<?php if(isset($_SESSION['admin_id'])){ ?> <button class="com-btn" id="add-company"> Add </button> <?php } ?>
	</div>
</div>
<div class="companies"> <?php include 'company-list.php'; ?> </div>

<?php include 'footer.php'; ?>