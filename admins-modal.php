<style>
.admins-wrapper{
	background: #f5f5f5;
	padding: 5px;
}
.admins-row{
	display: flex;
	flex-flow: row nowrap;
}
.admins-cell{
	flex: 1;
	padding: 8px;
	border-right: 2px solid #b3b3b3;
	line-height: 1.4;
}
.admins-cell:last-child{
	border-right: none;
}
.admins-row-header .admins-cell{
	font-size: 20px;
	text-align: center;
	border-bottom: 2px solid black;
	border-top: 2px solid black;
}
.admins-row:not(.admins-row-header):nth-of-type(odd){
	border-bottom: 2px solid #b3b3b3;
}
button.add-btn{
	padding: 8px;
	font-size: 18px;
	border: none;
	background: #0099ff;
	color: white;
}
button.admin-btn{
	padding: 8px;
	border: none;
	width: 120px;
}
button.admin-btn#delete{
	color: white;
	background: #ff5555;
}

@media only screen and (max-width: 767px){
	.admins-row .admins-cell{
		font-size: .9em;
		word-break: break-all;
	}
	button.admin-btn{
		width: 100%;
	}
}
</style>

<?php
@session_start();
if(!isset($_SESSION['admin_id']) || $_SESSION['admin_id'] != 1) exit;
require 'db.php';
require 'functions-validate.php';
$admins = $db->query("SELECT * FROM admins WHERE admin_id != '1'");
?>
<div class="at-modal-wrapper">
	<div class="at-modal-header">
		<button class="close">&times;</button>
		<h4> Other Admins </h4>
	</div>
	<div class="at-modal-content">
		<div class="admins-wrapper">
			<button class="add-btn" id="add-admin"> Add New Admin </button>
			<div class="admins-row admins-row-header">
				<div class="admins-cell"> First Name </div>
				<div class="admins-cell"> Middle Name </div>
				<div class="admins-cell"> Last Name </div>
				<div class="admins-cell admins-actions"> Actions </div>
			</div>
			<div class="admins-content">
			<?php
			while($admin = $admins->fetch_object()){
				?>
				<div class="admins-row">
					<div class="admins-cell"> <?php echo $admin->fname; ?> </div>
					<div class="admins-cell"> <?php echo $admin->mname; ?> </div>
					<div class="admins-cell"> <?php echo $admin->lname; ?> </div>
					<div class="admins-cell admins-actions">
						<button class="admin-btn" id="delete" data-id="<?php echo $admin->admin_id;?>"> Delete </button>
					</div>
				</div>
				<?php
			}	
			?>
			</div>
		</div>
	</div>
</div>