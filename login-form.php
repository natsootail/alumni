<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title> Alumni Tracer </title>
	<style>
	*{
		box-sizing: border-box;
		font-family: "Cambria";
		padding: 0;
		margin: 0;
	}
	body{
		width: 80%;
		margin: 0 auto;
		margin-bottom: 50px;
		background: #f5f5f5;
	}
	button{
		cursor: pointer;
	}
	.header{
		background: url('elements/img/ads.png') no-repeat;
		background-size: 100% 100%;
	}
	.header-txt{
		padding: 8px;
		text-shadow: 0px 0px 3px black;
		color: white;
		font-weight: bold;
	}
	.header-txt h4{
		font-size: 30px;
		text-transform: uppercase;
	}
	.header-txt p{
		font-size: 25px;
		font-variant: small-caps;
	}
	.header-desc{
		width: 50%;
		margin: 0 auto;
		position: relative;
		top: 80px;
		position: relative;
	}
	.header-desc p{
		line-height: 1.6;
		min-height: 200px;
		font-size: 2em;
		padding: 20px;
		background: rgba(0,0,0,.5);
		color: white;
		text-shadow: 0px 0px 3px black;
		border: 2px solid white;
		letter-spacing: 1.2px;
		word-spacing: 3px;
		min-height: 150px;
	}
	.login-nav{
		display: flex;
		justify-content: flex-end;
		margin-right: 2px;
	}
	.dd-login{
		position: relative;
		font-size: 20px;
		background: #0a76d2;
		color: white;
		text-align: center;
		min-width: 100px;
		cursor: pointer;
		padding: 8px;
	}
	.dd-login > div{
		overflow: hidden;
		height: 0;
		position: absolute;
		top: 100%;
		width: 120%;
		right: 0;
		background: #0a90d2;
	}
	.dd-login.active > div{
		height: initial;
		border: 1px solid #0a76d2;
	}
	.about-wrapper{
		margin-top: 120px;
		margin-bottom: 50px;
	}
	.about-wrapper h4{
		font-size: 30px;
	}
	.about-wrapper p{
		font-size: 20px;
		letter-spacing: 1.5px;
		width: 80%;
		margin: 0 auto;
		margin-top: 20px;
		text-align: justify;
		line-height: 1.5;
	}
	button.login-btn{
		display: block;
		width: 100%;
		padding: 8px;
		font-size: 18px;
		background: none;
		color: white;
		border: none;
		text-align: left;
		border-bottom: 2px solid white;
	}
	button.login-btn:hover{
		background: #0a76d2;
	}
	button.login-btn:last-child{
		border-bottom: none;
	}
	.atg-gallery{
		position: relative;
	}
	.atg-items{
		overflow: hidden;
		height: 500px;
		position: relative;
	}
	.atg-item{
		position: absolute;
		width: 100%;
		height: 500px;
		top: 0;
		transform: scale(0);
		transition: .4s;
	}
	.atg-item img{
		width: 100%;
		height: 100%;
	}
	.atg-item:nth-child(2){
		transform: scale(.8, 1);
		left: 0;
	}
	.atg-item:nth-child(1){
		left: -100%;
	}
	.atg-item:nth-child(3){
		left: 100%;
	}
	.atg-nav{
		display: flex;
		flex-flow: row nowrap;
		align-items: center;
		justify-content: center;
	}
	.atg-nav button{
		font-size: 50px;
		border: none;
		background: none;
		font-weight: bold;
		margin: 0 10px;
		outline: none;
		opacity: .5;
		transition: .2s;
	}
	.atg-nav button:hover{
		opacity: 1;
		transform: scale(1.2);
	}
	.atg-footer p{
		text-align: center;
		font-weight: bold;
		font-size: 1.5em;
		font-variant: small-caps;
		letter-spacing: 1.5px;
	}
	.login-modal{
		display: none;
		position: fixed;
		top: 0;
		left: 0;
		background: rgba(0,0,0,.6);
		height: 100%;
		width: 100%;
	}
	.login-modal-wrapper{
		position: relative;
		top: 15%;
		width: 35%;
		margin: 0 auto;
		background: #f5f5f5;
		box-shadow: -5px 5px 5px 2px black;
	}
	.lm-header{
		position: relative;
		background: #0a76d2;
		color: white;
	}
	.lm-header h4{
		padding: 8px;
		padding-top: 20px;
		font-size: 25px;
		text-transform: capitalize;
		font-variant: small-caps;
		border-bottom: 2px solid #b3b3b3;
	}
	button.close{
		position: absolute;
		right: 5px;
		top: 0;
		border: none;
		color: White;
		background: none;
		font-weight: bold;
		font-size: 25px;
	}
	form.login-form{
		margin-top: 20px;
		min-height: 200px;
	}
	.fieldset{
		padding: 8px;
		width: 80%;
		margin: 0 auto;
	}
	.fieldset label{
		letter-spacing: 1.2px;
	}
	.input-wrapper input{
		width: 100%;
		padding: 3px;
		font-size: 20px;
	}
	button.login-submit{
		display: inline-block;
		width: 150px;
		padding: 8px;
		background: #0a76d2;
		border: none;
		color: white;
		font-size: 18px;
	}
	.fieldset.fieldset-btns{
		display: flex;
		justify-content: flex-end;
	}
	.lm-footer{
		padding: 8px;
		background: #0a76d2;
	}
	a#forgot-pass{
		display: inline-block;
		width: 80%;
		margin-left: 10%;
		padding: 8px;
		color: blue;
		letter-spacing: 1.2px;
		cursor: pointer;
	}
	a#forgot-pass:hover{
		text-decoration: underline;
	}
	.at-modal-wrapper#alumni-id-modal{
		width: 30%;
		left: 35%;
		background: #f5f5f5;
	}
	form#id-number-form{
		width: 80%;
		margin: 20px auto;
	}
	form#id-number-form input{
		width: 100%;
		padding: 8px;
		font-size: 15px;
	}
	button.submit-id-number{
		display: inline-block;
		width: 30%;
		margin-left: 70%;
		margin-top: 5px;
		padding: 8px;
		background: #333;
		color: white;
		border: none;
		box-shadow: -3px 3px 3px 1px grey;
	}
	.at-modal{
		display: none;
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background: rgba(255,255,255,.7);
		z-index: 9;
	}
	.at-modal-wrapper{
		width: 50%;
		position: absolute;
		left: 25%;
		border: 2px solid #333;
		animation: modalDrop .4s linear forwards;
	}
	@keyframes modalDrop-add-alumni-form{
		0%{
			top: -300px;
		}
		100%{
			top: 50px;
		}
	}
	@keyframes modalDrop{
		0%{
			top: -300px;
		}
		100%{
			top: 50px;
		}
	}
	.at-modal-header{
		background: #333;
		color: white;
		padding: 15px 0 2px 0;
		position: relative;
		border-bottom: 5px solid white;
	}
	.at-modal-header button{
		background: none;
		color: rgba(255,255,255,.5);
		border: none;
		font-size: 18px;
		position: absolute;
		right: 10px;
		top: 4px;
	}
	.at-modal-header button:hover{
		color: white;
	}
	.at-modal-header h4{
		font-size: 25px;
		text-indent: 12px;
		font-variant: small-caps;
	}
	.at-modal-content{
		max-height: 500px;
		overflow: auto;
	}
	.at-modal-footer{
		padding: 5px;
		background: #333;
		border-top: 5px solid white;
	}
	.modal-footer-btns{
		display: flex;
		flex-flow: row nowrap;
		justify-content: flex-end;
		padding: 8px;
	}
	.modal-footer-btns button{
		padding: 8px;
		color: white;
		background: #555;
		border: none;
		font-size: 15px;
		font-variant: small-caps;
		min-width: 120px;
	}
	.at-snackbar{
		visibility: hidden;
		width: 500px;
		margin-left: -250px;
		left: 50%;
		background: #333;
		color: #fff;
		text-align: center;
		border-radius: 2px;
		padding: 16px;
		position: fixed;
		z-index: 10;
		bottom: 30px;
	}
	.sb-active{
		visibility: visible !important;
		animation: fadeIn 0.5s forwards, fadeOut .5s 2.5s;
	}
	.at-snackbar.success{
		background: #0099ff;
	}
	.at-snackbar.error{
		background: #ff3333;
	}

	@keyframes fadeIn{
		0%{
			opacity: 0;
			bottom: 0;
		}
		100%{
			opacity: 1;
			bottom: 30px;
		}
	}
	@keyframes fadeOut{
		0%{
			opacity: 1;
			bottom: 30px;
		}
		100%{
			opacity: 0;
			bottom: 0;
		}
	}
	form.sq-form{
		padding: 8px;
		background: #f5f5f5;
	}
	.sq-row{
		padding: 5px;
	}
	.sq-fieldset{
		padding: 3px;
	}
	.sq-fieldset .input-wrapper input{
		padding: 8px;
		width: 100%;
		outline: none;
	}
	.sq-fieldset .input-wrapper{
		width: 60%;
		padding-left: 12px;
	}
	.sq-fieldset .input-wrapper hr{
		width: 0;
		transition: .3s;
		margin: 0 auto;
		border: none;
		background: #555;
		height: 3px;
	}
	.sq-fieldset .input-wrapper input:focus + hr{
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
	form#update-forgotten-pass{
		padding: 12px;
		background: #f5f5f5;
	}
	form#biodata-actions{
		display: flex;
		flex-flow: row nowrap;
	}
	@media only screen and (max-width: 767px){
		body{
			width: 100%;
		}
		.header, .about-wrapper, .at-gallery{
			width: 100%;
		}
		.header-desc{
			width: 90%;
		}
		.at-modal{
			overflow: auto;
		}
		.header-desc p{
			font-size: 1em;
		}
		.about-wrapper h4{
			text-indent: 15px;
		}
		.login-modal-wrapper,
		.at-modal-wrapper{
			width: 90%;
		}
		.at-modal-wrapper{
			left: 5%;
		}
		div.at-modal-wrapper#alumni-id-modal{
			left: 5%;
			width: 90%;
		}
		.sq-fieldset .input-wrapper{
			width: 100%;
		}
		.atg-items{
			height: 300px;
		}
		.atg-item img{
			height: 300px;
		}

	</style>
	<script src="elements/jquery-2.1.3.min.js"></script>
	<script>
	jQuery(function($){
	$(document) .on('click','button.next',function(){
		$('.atg-item:last-child').prependTo('.atg-items');
	});
	$(document) .on('click','button.prev',function(){
		$('.atg-item:first-child').appendTo('.atg-items');
	});
	$(document) .on('click','.dd-login',function(){
		$(this).toggleClass('active');
	});
	$(document) .on('click','a#forgot-pass',function(){
		$('.at-modal').load('alumni-id-modal.php').show();
	});
	$(document) .on('click','button.login-btn',function(){
		var myUser = $(this).attr('id');
		$('.login-modal').load('login-modal.php',{'user': myUser}).show();
	});
	$(document) .on('click','button.close',function(){
		$(this).parents('.at-modal, .login-modal').hide().html('');
	});
	$(document) .on('submit','form#id-number-form',function(e){
		e.preventDefault();
		e.stopImmediatePropagation();
		e.stopPropagation();
		var form1 = new FormData(this);
		$.ajax({
			'processData' : false,
			'contentType': false,
			'type' : 'post',
			'url' : 'validate-id-number.php',
			'data' : form1,
			'success' : function(response){
				if(response != "" && response != " "){
					var respo = JSON.parse(response);
					if(respo.type == 'success'){
						$('.at-modal').load('alumni-sq-modal.php');
					}else{
						$('.at-snackbar') .removeClass('sb-active error success');
						$('.at-snackbar') .addClass('error sb-active').html(respo.msg);
						setTimeout(function(){
							$('.at-snackbar').removeClass('sb-active error');
						},3000);
					}
				}
			}
		});
	});



	$(document) .on('submit','form#sq-form-fp',function(e){
		e.preventDefault();
		e.stopImmediatePropagation();
		e.stopPropagation();
		var form1 = new FormData(this);
		var submitBtn = $(this).find('button#submit');
		$.ajax({
			'beforeSend' : function(){
				$(submitBtn).attr('disabled','disabled');
				$('.at-snackbar') .removeClass('sb-active success error') .addClass('sb-active success').html("Please Wait...");
			},
			'processData' : false,
			'contentType': false,
			'type' : 'post',
			'url' : 'validate-answers.php',
			'data' : form1,
			'success' : function(response){
				if(response != "" && response != " "){
					var respo = JSON.parse(response);
					$('.at-snackbar') .removeClass('sb-active error success');
					$('.at-snackbar') .addClass(respo.type+' sb-active').html(respo.msg);
					setTimeout(function(){
						$('.at-snackbar').removeClass('sb-active error');
					},2800);
					if(respo.type == 'success'){
						$('.at-modal').hide().html('');
					}
				}
				$(submitBtn).removeAttr('disabled');
			}
		});
	});

	$(document) .on('submit','form#login-form',function(e){
		var form1 = new FormData(this);
		e.preventDefault();
		e.stopPropagation();
		e.stopImmediatePropagation();
		$.ajax({
			'processData' : false,
			'contentType' : false,
			'type' : 'post',
			'url' : 'login.php',
			'data' : form1,
			'success' : function(response){
				if(response != "" && response != " "){
					var respo = JSON.parse(response);
					$('.at-snackbar') .removeClass('sb-active error success');
					$('.at-snackbar') .addClass(respo.type+' sb-active').html(respo.msg);
					if(respo.type == 'success'){
						window.open('index.php','_self');
					}
					setTimeout(function(){
						$('.at-snackbar').removeClass('sb-active error');
					},2800);
				}
			}
		});
	});

	});
	</script>
</head>
<body>
<div class="header">
	<div class="header-txt">
		<h4> Alumni </h4>
		<p> Tracer Study </p>
	</div>
	<div class="header-desc">
		<p>
			A Profiling and job matching website for you, Alumnus! Rate your skills and get a list of Company recommendations.
		</p>
		<div class="login-nav">
			<div class="dd-login">
				LOGIN
				<div>
					<button class="login-btn" id="alumni"> Alumni </button>
					<button class="login-btn" id="admin"> Admin </button>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="about-wrapper">
	<h4> About CICT </h4>
	<p>
		Information and Communications Technology has penetrated the core societal and individual lives. Its development
		is changing the course of all other technologies. ICT has now become less of a choice and more of a requirement
		for individuals and societies concerned with competitiveness in the international arena.
	</p>
</div>
<div class="at-gallery">
	<div class="atg-items">
		<div class="atg-item active">
			<img src="elements/img/2.jpg" />
		</div>
		<div class="atg-item active">
			<img src="elements/img/1.jpg" />
		</div>
		<div class="atg-item">
			<img src="elements/img/3.jpg" />
		</div>
		<div class="atg-item">
			<img src="elements/img/4.jpg" />
		</div>
		<div class="atg-item">
			<img src="elements/img/5.jpg" />
		</div>
		<div class="atg-item">
			<img src="elements/img/6.jpg" />
		</div>
	</div>
	<div class="atg-nav">
		<button class="prev"> &#x276E; </button>
		<button class="next"> &#x276F; </button>
	</div>
	<div class="atg-footer">
		<p> Follow the Future </p>
	</div>
</div>
<div class="at-snackbar"></div>
<div class="at-modal"></div>
<div class="login-modal">
	<?php include 'login-modal.php'; ?>
</div>
</body>
</html>
