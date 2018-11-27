<?php
include 'header.php';
include 'nav.php';
if(!isset($_SESSION['admin_id']) && !isset($_SESSION['alumni_id'])){
	?>
	<script>
	window.open("index.php","_self");
	</script>
	<?php
}
require 'db.php';
$graduates = $db->query("SELECT * FROM alumni ");
?>

<?php if(isset($_SESSION['alumni_id'])){ ?>
<!--
<div class="logged-in-alumni">
	<h4> <?php echo $_SESSION['alumni_name']; ?> </h4>
</div>
!-->
<?php } ?>
<style>
.graduates-wrapper{
	width: 80%;
	background: url('imgs/some-bg.png') fixed;
	background-repeat: no-repeat;
	background-size: 100%;
}
.glist-header{
	width: 80%;
	height: 440px;
	margin-left: 10%;
}
@media only screen and (max-width: 569px){
	.graduates-wrapper{
		width: 100%;
		border: none;
		background-size: 100% 100%;
	}
}
</style>
<img class="glist-header" src="imgs/glist-header.png" width="100%" height="500px" />
<div class="graduates-wrapper">
	<div class="graduates-header">
		<h4> Alumni List </h4>
		<div class="graduates-options">
			<a href="#" class="at-tooltip" id="search">
				<span class="glyphicon glyphicon-search"></span>
				<span class="at-tooltip-text"> Search </span>
			</a>
			<a href="#" class="at-tooltip" id="filter">
				<span class="glyphicon glyphicon-filter"></span>
				<span class="at-tooltip-text"> Filter </span>
			</a>
			<a href="#" class="at-tooltip" id="sort">
				<span class="glyphicon glyphicon-sort"></span>
				<span class="at-tooltip-text"> Sort </span>
			</a>
			<?php
			if(isset($_SESSION['admin_id'])){ ?>
			<a href="#" class="at-tooltip" id="add-alumni">
				<span class="glyphicon glyphicon-plus"></span>
				<span class="at-tooltip-text"> Add </span>
			</a>
			<?php } ?>
		</div>
	</div>
	<div class="alumni-list-row alumni-list-label">
		<div class="alumni-list-cell alc-dcg">
			Course and Date Graduated
		</div>
		<!--
		<div class="alumni-list-cell id-number">
			ID Number
		</div>
		!-->
		<div class="alumni-list-cell">
			Name
		</div>
		<?php if(isset($_SESSION['admin_id'])){ ?>
		<div class="alumni-list-cell">
			Actions
		</div>
		<?php } ?>
	</div>
	<div class="alumni-list-wrapper">
		<?php include 'graduate-list.php'; ?>
	</div>
	<div class="graduates-footer">
	
	</div>
	
</div>

<div class="hidden-filter">
	<input type="hidden" id="cs" />
	<input type="hidden" id="is" />
	<input type="hidden" id="it" />
	<input type="hidden" id="hidden-date-from" />
	<input type="hidden" id="hidden-date-to" />
	<input type="hidden" id="hidden-keyword" />
	<input type="hidden" id="hidden-sort" />
</div>

<?php include 'footer.php'; ?>