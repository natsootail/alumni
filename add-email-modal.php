<?php
require 'db.php';
session_start();
$alumni_id = $_SESSION['alumni_id'];

?>

<div class="at-modal-wrapper" style="width: 40%; left: 30%;" id="add-email-modal">
	<div class="at-modal-header">
		<button class="close"> &times; </button>
		<h4> Add Email Address </h4>
	</div>
	<div class="at-modal-content">
		<div class="upm-wrapper">
				<input type="text" name="email-add" id="email-add" placeholder="Enter Email Address" autofocus />
		</div>
		<button class="upm-submit" id="add-email-submit"> Save </button>
	</div>
	<div class="at-modal-footer">
	
	</div>
</div>