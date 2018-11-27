<?php
session_start();
require_once 'db.php'; 
require_once 'functions-validate.php';
$id = validate($_POST['id']);
$where = (!isset($_SESSION['admin_id'])) ? " AND contact_status = 'active'" : "";
$ccs = $db->query("SELECT * FROM company_contacts WHERE company_id = '$id' $where");
$companies = $db->query("SELECT * FROM companies WHERE company_id = '$id'");
$company = $companies->fetch_object();
?>
<div class="at-modal-wrapper">
	<div class="at-modal-header">
		<button class="close"> &times; </button>
		<h4> <?php echo $company->company_name; ?> </h4>
	</div>
	<div class="at-modal-content">
		<div class="contact-list">
			<div class="contact-row">
				<div class="contact-cell contact-type">
					Company Address
				</div>
				<div class="contact-cell contact-info">
					<?php echo $company->company_address; ?>
				</div>
			</div>
			<?php while($cc = $ccs->fetch_object()){ ?>
			<div class="contact-row">
				<div class="contact-cell contact-type">
					<?php echo ucwords($cc->contact_type).':'; ?>
				</div>
				<div class="contact-cell contact-info">
					<?php echo $cc->contact_info; ?>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>