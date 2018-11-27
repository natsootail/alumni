<?php
session_start();
$id = $_SESSION['alumni_id'];
$dir = scandir("alumni_biodata");
$found = 0;
$filename = "";
foreach($dir AS $file){
	if(stristr($file, "alumni_biodata($id)")){
		$found = 1;
		$filename = $file;
		break;
	}
}
?>

<div class="at-modal-wrapper">
	<div class="at-modal-header">
		<button class="close">&times;</button>
		<h4> Select Action </h4>
	</div>
	<div class="at-modal-content">
		<form method="post" action="upload-biodata.php" enctype="multipart/form-data" id="biodata-actions">
			<div class="biodata-option">
				<a href="alumni_biodata/template.docx" download >
					<span class="glyphicon glyphicon-download-alt"></span>
					DOWNLOAD TEMPLATE
				</a>
			</div>
			<div class="biodata-option">
				<label class="upload-label">
					<input type="file" name="biodata" id="biodata" />
					<div>
						<span class="glyphicon glyphicon-upload"></span>
						<?php echo ($found == 1) ? "RE-UPLOAD" : "UPLOAD"; ?> BIO-DATA 
					</div>
				</label>
			</div>
			<?php
			if($found == 1){
				?>
				<div class="biodata-option">
					<a href="<?php echo "alumni_biodata/$file"; ?>" download > 
						<span class="glyphicon glyphicon-download-alt"></span>
						DOWNLOAD BIO-DATA 
					</a>
				</div>
				<?php
			}
			?>
		</form>
	</div>
	<div class="at-modal-footer"></div>
</div>