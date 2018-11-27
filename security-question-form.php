<!DOCTYPE html>
<html>
<head>
	<title> Security Questions </title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
<style>
*{
	box-sizing: border-box;
	margin: 0;
	padding: 0;
	font-family: "Cambria";
}
.sq-wrapper{
	width: 50%;
	margin: 80px auto;
}
.sq-header{
}
.sq-header h4{
	padding: 8px;
	background: #555;
	color: white;
	font-size: 20px;
}
.sq-header p{
	border-bottom: 2px solid #b3b3b3;
}
.sq-content{
	border-left: 2px solid #b3b3b3;
}
.sq-row{
	padding: 5px;
}
.sq-fieldset{
	padding: 3px;
}
.input-wrapper input{
	padding: 8px;
	width: 100%;
	outline: none;
}
.input-wrapper{
	width: 60%;
	padding-left: 12px;
}
.input-wrapper hr{
	width: 0;
	transition: .3s;
	margin: 0 auto;
	border: none;
	background: #555;
	height: 3px;
}
.input-wrapper input:focus + hr{
	width: 100%;
	opacity: 1;
}
.sq-btn{
	padding: 8px;
	font-size: 18px;
	cursor: pointer;
	border: none;
	color: white;
}
.sq-btn#logout{
	background: #666;
}
.sq-btn#submit{
	background: #333;
}

div.cad{
	padding: 8px;
}
@media only screen and (max-width: 767px){
	.sq-wrapper{
		width: 100%;
		margin: 0 auto;
		margin-bottom: 15px;
	}
	.input-wrapper{
		width: 100%;
	}
}
</style>
<script src="elements/jquery-2.1.3.min.js"></script>
</head>
<body>
<?php
session_start();
require_once 'db.php';

$questions = $db->query("SELECT * FROM security_questions");
?>

<div class="sq-wrapper">
	<div class="sq-header">
		<h4> Welcome to Alumni Tracing System </h4>
		<p> Please answer at least 3 security questions </p>
	</div>
	<div class="sq-content">
		<form method="post" action="sq-form-submit.php" id="sq-form">
		<?php while($question = $questions->fetch_object()){ ?>
		<div class="sq-row">
			<div class="sq-fieldset">
				<label> <?php echo $question->security_question; ?> </label>
				<div class="input-wrapper">
					<input type="text" name="sq[<?php echo $question->sq_id;?>]" />
					<hr />
				</div>
			</div>
		</div>
		<?php } ?>
		<div class="cad">
			<p>
				<h3> Please read carefully before proceeding </h3>
				<br/>
				<b>Copyright:</b> <br/>
				Any material on this site is owned by the CICT alumni and any material or information 
				is hereby secure and prohibited to any third party sources. <br/>
				<b>Disclaimer: </b><br/>
				<b>1. </b>The following material and information of the CICT alumni is strictly for educational and
				academic purposes only and therefore belongs to its respective owner. <br/>
				<b>2. </b>You hereby pledge that the files you will upload and the forms you will fillout in the future are true
				and owned/created by you and the University shall not be held liable in any misinformation that you had input.<br/>
			</p>
			<br/>
			<h4> By clicking the Submit button, that means that you have read and agreed to our Copyright and Disclaimer. </h4>
		</div>
		<div class="sq-row sq-btns">
			<button class="sq-btn" id="logout" onclick="location.href='logout.php'" type="button"> LOGOUT </button>
			<button class="sq-btn" id="submit"> SUBMIT </button>
		</div>
		</form>
	</div>
</div>
<script>
jQuery(function($){
	
$(document) .on('submit','form#sq-form',function(e){
	e.preventDefault();
	e.stopImmediatePropagation();
	e.stopPropagation();
	var form1 = new FormData(this);
	$.ajax({
		'processData' : false,
		'contentType' : false,
		'type' : 'post',
		'url' : 'sq-form-submit.php',
		'data' : form1,
		'success' : function(response){
			if(response != " " && response != ""){
				var respo = JSON.parse(response);
				alert(respo.msg);
				if(respo.type == 'success'){
					location.href="index.php";
				}
			}
		}
	});
});
	
});
</script>
</body>
</html>