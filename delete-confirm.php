<div class="at-modal-wrapper" style="width: 30%; left: 35%;" id="delete-confirm">
	<div class="at-modal-header">
		<button class="close"> &times; </button>
		<h4> <span class="glyphicon glyphicon-trash"></span>Are you sure? </h4>
	</div>
	<div class="at-modal-content">
		<div class="delete-form">
			<button id="delete-now" data-action="no"> No </button>
			<button id="delete-now" data-action="yes" data-id="<?php echo $_POST['id'];?>"> Yes </button>
		</div>
	</div>
</div>