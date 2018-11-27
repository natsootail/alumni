<!DOCTYPE html>
<html>
<head>
	<title> ALUMNI LOGS </title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<style>
	*{
		box-sizing: border-box;
		padding: 0;
		margin: 0;
		font-family: "Prestige Elite Std";
	}
	.logs-wrapper{
		width: 90%;
		margin: 80px auto;
		box-shadow: 5px 5px 5px 1px grey;
	}
	.logs-wrapper{}
	.logs-wrapper h4{
		padding: 8px;
		background: #333;
		color: white;
		font-size: 25px;
	}
	.logs-row{
		display: flex;
		flex-flow: row nowrap;
	}
	.logs-cell{
		padding: 8px;
	}
	.logs-row.logs-row-header{
		background: #d5d5d5;
	}
	.logs-row.logs-row-header .logs-cell{
		border-right: 1px solid white;
	}
	.logs-list .logs-row{
		border-bottom: 1px solid #b3b3b3;
	}
	.logs-list .logs-cell{
		border-right: 1px solid #b3b3b3;
	}
	.logs-cell#num{
		flex-basis: 50px;
		text-align: center;
	}
	.logs-cell#datetime{
		flex-basis: 250px;
	}
	.logs-cell#activity{
		flex-basis: 200px;
	}
	.logs-cell#value-from,
	.logs-cell#value-to{
		flex-basis: 200px;
		word-break: break-all;
	}
	.logs-cell#remarks{
		flex: 1;
	}
	@media only screen and (max-width: 767px){
		.logs-cell#activity,
		.logs-cell#value-from,
		.logs-cell#value-to{
			display: none;
		}
		.logs-cell{
			flex: 1 !important;
		}
		.logs-cell#num{
			flex: initial !important;
			flex-basis: 50px !important;
		}
	}
	</style>
</head>
<body>
<?php
require 'functions-validate.php';
require 'db.php';
function getID($filename){
	$OP_pos = strpos($filename, "(");
	$CP_pos = strpos($filename, ")");
	$strlen = $CP_pos - $OP_pos;
	return substr($filename, $OP_pos + 1, $strlen - 1);
}

$id = validate($_GET['id']);
$getAlumni = $db->query("SELECT * FROM alumni WHERE alumni_id = '$id'");
$alumni = $getAlumni->fetch_object();


$file = file("alumni_logs/alumni_log($id).json");
?>

<div class="logs-wrapper">
	<div class="logs-headers">
		<h4> <?php echo $alumni->lname.', '.$alumni->fname.' '.$alumni->mname; ?> - Logs </h4>
	</div>
	<div class="logs-content">
		<div class="logs-row logs-row-header">
			<div class="logs-cell" id="num"> # </div>
			<div class="logs-cell" id="datetime"> Date and Time </div>
			<div class="logs-cell" id="activity"> Activity </div>
			<div class="logs-cell" id="value-from"> Previous Value </div>
			<div class="logs-cell" id="value-to"> New Value </div>
			<div class="logs-cell" id="remarks"> Remarks </div>
		</div>
		<div class="logs-list">
		<?php
		$i = 1;
		foreach($file AS $line){
			$data = json_decode($line);
			?>
			<div class="logs-row">
			<div class="logs-cell" id="num"> <?php echo $i++; ?> </div>
			<div class="logs-cell" id="datetime"> <?php echo date('M d Y - h:iA',strtotime($data->log_datetime)); ?> </div>
			<div class="logs-cell" id="activity"> <?php echo $data->log_activity; ?> </div>
			<div class="logs-cell" id="value-from"> <?php echo $data->previous_value; ?> </div>
			<div class="logs-cell" id="value-to"> <?php echo $data->new_value; ?> </div>
			<div class="logs-cell" id="remarks"> <?php echo $data->log_remarks; ?> </div>
			</div>
			<?php
		}
		?>
		</div>
	</div>
</div>