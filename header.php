<?php
session_start();
if(!isset($_SESSION['admin_id']) && !isset($_SESSION['alumni_id']) && basename($_SERVER['PHP_SELF']) != 'login-form.php'){
	header('location: login-form.php');
}
if(isset($_SESSION['redirect']) && $_SESSION['redirect'] == 1){
	header('location: security-question-form.php');
}
?>
<!DOCTYPE html>
<head>
<html>
	<title> Alumni Tracing </title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="elements/glyphs.css" />
	<script src="elements/jquery-2.1.3.min.js"></script>
	<style>
	*{
		box-sizing: border-box;
		padding: 0;
		margin: 0;
		font-family: "Prestige Elite Std";
	}
	button{
		cursor: pointer;
	}
	button:disabled{
		cursor: not-allowed;
	}
	.at-header{
		max-height: 200px;
		display: flex;
		flex-flow: row nowrap;
		align-items: center;
		margin-top: 10px;
		padding: 8px 20px;
	}
	.at-westinfo{
		flex-grow: 3;
		text-align: center;
		line-height: 1.5;
	}
	.at-westinfo h2, .at-westinfo p{
		color: #0099ff;
	}
	.at-westinfo h4{
		color: #f48128;
	}
	.logo img{
		width: 150px;
	}
	.at-loginform-wrapper{
		width: 70%;
		margin: 20px auto;
		border: 1px solid #333;
	}
	.at-loginform-header{
		padding: 8px;
		text-indent: 8px;
		padding-top: 18px;
		font-size: 20px;
		background: #333;
		color: white;
	}
	.at-loginform-content{
		width: 50%;
		margin: 20px auto;
	}
	.at-input-field{
		border: 2px solid grey;
		display: flex;
		flex-flow: row nowrap;
		align-items: center;
		width: 70%;
		padding-left: 5px;
		margin-top: 8px;
		background: grey;
	}
	.at-input-wrapper{
		flex-grow: 2;
	}
	.at-input-field span{
		font-size: 25px;
		color: white;
		padding-right: 8px;
	}
	.at-input-wrapper input{
		width: 100%;
		color: #333;
		font-size: 18px;
		padding: 5px;
		outline: none;
	}
	.at-input-field.at-af-btns{
		width: 30%;
	}
	.at-input-field.at-af-btns input:disabled{
		cursor: not-allowed;
		color: grey;
	}
	.at-input-field.at-af-btns input{
		background: white;
		color: grey;
		border: none;
	}
	.at-input-field.at-af-btns input:not(:disabled){
		cursor: pointer;
		color: black
	}
	button.forgot-pass{
		background: none;
		margin-top: 8px;
		border: none;
		color: blue;
		font-size: 15px;
	}
	button.forgot-pass:hover{
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
	p.login-failed{
		padding: 5px;
		background: #ff9900;
		color: white;
	}
	.admin-login-div{
		position: relative;
	}
	button.login-admin{
		position: absolute;
		right: -1px;
		top: 12px;
		padding: 8px;
		width: 150px;
		color: white;
		border: none;
		background: #666;
		font-variant: small-caps;
		font-size: 18px;
		box-shadow: 1px 2px 8px 1px gray;
		transition: .2s;
	}
	button.login-admin:hover{
		box-shadow: 5px 8px 8px 1px gray;
		background: #555;
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
	.at-modal-wrapper#add-alumni-form{
		animation: modalDrop-add-alumni-form .4s linear forwards;
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
	.admin-loginform{
		width: 50%;
		margin: 0 auto;
		padding: 15px 0;
	}
	.at-modal-content .alumni-input-row#fields-label{
		background: #333;
		color: white;
		padding: 8px;
		text-indent: 5px;
	}
	.at-modal-content .alumni-input-row#fields-label span.glyphicon{
		vertical-align: -3px;
	}
	.admin-loginform span{
		font-size: 20px;
	}
	.admin-loginform input{
		padding: 2px;
	}
	
	.at-navbar{
		position: fixed;
		left: 15px;
		top: 30%;
		z-index: 2;
	}
	.at-nav-top{
		display: flex;
		flex-flow: column nowrap;
		list-style-type: none;
		width: 0;
	}
	.at-nav-top:hover{
		width: initial;
	}
	.at-nav-top li{
		display: flex;
		margin-top: 8px;
		align-items: center;
		z-index: 1;
	}
	.at-nav-top li a{
		font-size: 30px;
		color: white;
//		background: grey;
//		padding: 8px 12px;
//		padding-bottom: 3px;
		padding: 3px;
		border-radius: 3px;
		background: #fd6421;
		filter: grayscale(1);
	}
	.at-nav-top li a + div{
		display: flex;
		align-items: center;
		min-height: 56px;
		background: #fd6421;
		color: white;
		padding: 11px 0;
		font-size: 23px;
		transition: .35s;
		overflow: hidden;
		white-space: nowrap;
		flex: 0;
		margin-left: -3px;
		text-indent: 8px;
		border-radius: 0px 15px 15px 0;
	}
	.at-nav-top li a#showSearchWrapper{

	}
	.at-nav-top li div.search-wrapper{
		padding: 0;
		display: flex;
		flex-flow: row nowrap;
	}
	.at-nav-top li a:hover + div, .at-nav-top li a + div.active{
		flex-grow: 1;
		background: #fd6421;
		padding-right: 8px;
	}
	.at-nav-top li a.active, .at-nav-top li a:hover{
		background: #fd6421;
		filter: grayscale(0);
	}
	.at-nav-top li div.search-wrapper input{
		padding: 5px 6px;
		border: 2px solid #0099ff;
		position: relative;
		left: -2px;
		outline: none;
		width: 100%;
		color: #0099ff;
	}
	div.nav-icon{
		width: 50px;
		height: 50px;
	}
	div.nav-icon img{
		width: 100%;
		height: 100%;
	}
	.at-nav-top li div.search-wrapper button{
		background: none;
		border: none;
		color: white;
		padding: 5px 6px;
		width: 100%;
		flex: 1;
	}
	.logged-in-alumni{
		width: 70%;
		margin: 0 auto;
		font-size: 20px;
		text-shadow: 1px 2px 3px gray;
	}
	.graduates-wrapper{
		width: 70%;
		margin: 20px auto;
	}
	.graduates-wrapper{
		border: 2px solid #333;
		margin-bottom: 50px;
	}
	.graduates-header{
		background: #333;
		color: white;		
		padding: 8px 0;
		position: relative;
		border-bottom: 1px solid white;
	}
	.graduates-header h4{
		text-align: center;
		font-size: 30px;
	}
	.graduates-header .graduates-options{
		position: absolute;
		right: 10px;
		bottom: 12px;
	}
	.graduates-header .graduates-options a{
		text-decoration: none;
		color: white;
	}
	.graudate-list{
		display: flex;
		flex-flow: column nowrap;
	}
	.gl-header, .gl-content{
		display: flex;
		flex-flow: row nowrap;
	}
	.gl-header{
		background: #333;
		color: white;
		padding: 5px 8px;
	}
	.gl-label, .gl-item{
		flex: 1;
		padding: 8px;
	}
	.gl-actions{
		text-align: center;
	}
	.at-tooltip{
		position: relative;
	}
	.at-tooltip-text{
		position: absolute;
		display: none;
		bottom: 105%;
		right: 75%;
		border-radius: 5px 5px 0 5px;
		padding: 5px;
#		background: rgba(51,170,255,.5);
		background: rgba(0,0,0,.5);
		box-shadow: 0px 0px 1px 1px rgba(255,255,255,1);
	}
	.at-tooltip:hover .at-tooltip-text{
		display: initial;
	}
	.add-company-form,
	.alumni-form{
		padding: 8px;
		display: flex;
		flex-flow: column nowrap;
		background: #f5f5f5;
	}
	.alumni-input-row{
		display: flex;
		flex-flow: row wrap;
		width: 100%;
		padding: 8px 5px;
		text-align: center;
	}
	.alumni-fieldset{
		flex: 1;
		padding: 5px;
	}
	.alumni-fieldset .input-wrapper input[type="date"]{
		font-size: 12px;
		
	}
	.alumni-fieldset .input-wrapper input,
	.alumni-fieldset .input-wrapper textarea,
	.alumni-fieldset .input-wrapper select{
		width: 100%;
		outline: none;
		border: none;
		padding: 5px;
		font-size: 15px;
		border-bottom: 2px solid grey;
	}
	.alumni-fieldset .input-wrapper hr{
		margin: 0 auto;
		width: 0;
		position: relative;
		top: -2px;
		background: black;
		height: 2px;
		transition: .4s;
		border: none;
	}
	.alumni-fieldset .input-wrapper input:focus,
	.alumni-fieldset .input-wrapper textarea:focus,
	.alumni-fieldset .input-wrapper select:focus{
		color: black;
		border-color: transparent;
	}
	.alumni-fieldset .input-wrapper input:focus + hr,
	.alumni-fieldset .input-wrapper textarea:focus + hr,
	.alumni-fieldset .input-wrapper select:focus + hr{
		width: 100%;
	}
	.alumni-fieldset .input-wrapper textarea + hr{
		top: -8px;
	}
	button#add-degree{
		padding: 8px 16px;
		background: #333;
		color: white;
		border: none;
		margin-left: 8px;
	}
	label.employment-label,
	label.rating-label,
	label.org-type{
		flex: 1;
		color: white;
		border: 2px solid #f5f5f5;
		cursor: pointer;
		align-self: center;
	}
	label.employment-label input,
	label.rating-label input,
	label.org-type input{
		display: none;
	}
	.employment-option,
	.rating-option,
	.org-type-option{
		background: grey;
		padding: 8px 16px;
		flex: 1;
	}
	label.employment-label input:checked + .employment-option, label.employment-label:hover .employment-option,
	label.rating-label input:checked + .rating-option, label.rating-label:hover .rating-option,
	label.org-type input:checked + .org-type-option, label.org-type:hover .org-type-option{
		background: #333;
	}
	.alumni-input-row.btns{
		display: flex;
		flex-flow: row wrap;
		justify-content: flex-end;
	}
	.alumni-input-row.btns button{
		padding: 8px 16px;
		background: #333;
		color: white;
		font-size: 18px;
		border: none;
		border-radius: 3px;
		margin: 8px 5px;
	}
	.alumni-input-row#fields-label p{
		background: #333;
		width: 100%;
		text-align: center;
		padding: 5px 8px;
	}
	.rating-question{
		align-self: center;
		background: #333;
		color: white;
		padding: 5px 8px;
		flex: 1;
	}
	.alumni-list-wrapper{
		padding: 5px;

	}
	.alumni-list-row{
		display: flex;
		flex-flow: row nowrap;
		border-bottom: 2px solid #f4f4f4;
	}
	.alumni-list-label{
		background: #333;
		padding: 8px;
		color: white;
		text-align: center;
	}
	.alumni-list-cell{
		padding: 5px;
	}
	.alumni-list-cell:not(.alc-dcg){
		flex: 1;
		text-align: center;
	}
	.alumni-list-cell.alc-dcg{
		width: 30%;
		text-align: justify;
	}
	.alumni-list-cell.alc-dcg:nth-child(1),
	.alumni-list-cell.alc-dcg:nth-child(2){
		width: 40%;
	}
	.alumni-list{
		width: 70%;
	}
	.al-inner-row{
		display: flex;
		flex-flow: row nowrap;
	}
	.al-inner-row:nth-of-type(even){
		background: #f8f8f8;
	}
	.al-inner-row div{
		flex: 1;
		align-self: center;
	}
	.alumni-list-cell.id-number{
		width: 20%;
	}
	.alc-actions button{
		background: #333;
		padding: 8px;
		width: 100%;
		border: none;
		color: white;
		margin-top: 3px;
		text-align: left;
		text-indent: 20%;
		transition: .4s;
	}
	.alumni-list-cell.alc-actions{
		flex: initial;
		width: 35%;

	}
	button#delete-alumni{
		background: #ff5555;
	}
	.alc-actions button:hover{
		text-indent: 15%;
	}
	.filter-wrapper, .by-course, .by-graduation-date, .by-keyword{
		display: flex;
		flex-flow: column nowrap;
		padding: 8px;
		background: #f5f5f5;
	}
	.category-header{
		font-size: 18px;
		padding: 8px;
		color: white;
		background: #333;
	}
	.course-options, .graduation-date-options{
		display: flex;
		flex-flow: row wrap;
		align-items: center;
		text-align: center;
	}
	.course-label{
		width: 30%;
		margin: 5px;
	}
	.gdo-wrapper{
		flex: 1;
	}
	.course-label input{
		display: none;
	}
	.course-option{
		padding: 8px;
		background: #5c5c5c;
		color: white;
		margin: 8px;
		cursor: pointer;
	}
	.course-label input:checked + .course-option{
		background: #111;
	}
	.gdo-wrapper, .filter-keyword-wrapper{
		padding: 8px;
	}
	.filter-keyword-wrapper{
		display: flex;
		flex-flow: column nowrap;
		align-items: center;
	}
	.filter-keyword-wrapper .input-wrapper{
		width: 100%;
	}
	.gdo-wrapper .input-wrapper input,
	.filter-keyword-wrapper .input-wrapper input{
		width: 100%;
		font-size: 15px;
		padding: 3px;
		outline: none;
		border: 2px solid #e5e5e5;
		color: #333;
		text-align: center;
	}
	.filter-keyword-wrapper .input-wrapper input + hr,
	.gdo-wrapper .input-wrapper input + hr{
		width: 0;
		position: relative;
		top: -2px;
		height: 2px;
		border: none;
		background: #333;
		margin: 0 auto;
		transition: .4s;
	}
	.filter-keyword-wrapper .input-wrapper input:focus,
	.gdo-wrapper .input-wrapper input:focus{
		border-color: #0099ff;
		border-bottom-color: rgba(0,0,0,0);
	}
	.filter-keyword-wrapper .input-wrapper input:focus + hr,
	.gdo-wrapper .input-wrapper input:focus + hr{
		width: 100%;
	}
	.filter-keyword-wrapper .input-wrapper input{
		padding: 8px;
		font-size: 15px;
	}
	.filter-keyword-wrapper .input-wrapper input:focus{
		border-color: #e5e5e5;
	}
	button.submit-filter{
		width: 20%;
		align-self: flex-end;
		font-size: 15px;
		padding: 8px;
		background: #333;
		color: white;
		border: none;
	}
	.sort-wrapper{
		display: flex;
		flex-flow: column nowrap;
	}
	.sort-options{
		display: flex;
		flex-flow: row nowrap;
		padding: 8px;
	}
	.sort-label{
		flex: 1;
	}
	.sort-label input{
		display: none;
	}
	.sort-option{
		padding: 8px;
		background: #5c5c5c;
		color: white;
		text-align: center;
		margin: 0 8px;
		cursor: pointer;
	}
	.sort-option:hover, .sort-label input:checked + .sort-option{
		background: #333;
	}
	.delete-form{
		padding: 10px;
		display: flex;
		flex-flow: row nowrap;
		justify-content: space-between;
	}
	button#delete-now{
		flex: 1;
		margin: 0 15px;
		padding: 8px 16px;
		background: #333;
		color: white;
		border: none;
		font-size: 18px;
	}
	button#delete-now[data-action="yes"]{
		background: #ff0055;
	}
	.profile-wrapper{
		padding: 8px;
		display: flex;
		flex-flow: column nowrap;
	}
	.profile-row{
		display: flex;
		flex-flow: row nowrap;
		margin-top: 8px;
		border-bottom: 2px solid #fafafa;
	}
	.profile-row.profile-rating-row{
		flex-wrap: wrap;
		align-items: flex-start;
	}
	.profile-cell{
		flex: 1;
		display: flex;
		flex-flow: column nowrap;
		align-items: center;
		justify-content: flex-end;
	}
	.profile-cell h4{
		width: 95%;
		background: #333;
		color: white;
		padding: 8px 16px;;
		text-align: center;
		word-wrap: break-word;
	}
	.profile-cell p{
		padding: 5px;
		color: #333;
		text-shadow: 0px 0px 5px white, 0px 0px 1px #0099ff;
	}
	.profile-rating-row{
		justify-content: flex-start;
		align-content: flex-start;
	}
	.profile-rating-row .profile-cell{
		min-width: 30%;
		max-width: 33%;
		border: 1px solid #33aaff;
		border-radius: 8px;
		padding-top: 8px;
		align-self: stretch;
		display: flex;
		justify-content: flex-start;
		background: rgba(255,255,255,.8);
		margin: 3px;
		box-shadow: 5px 5px 5px 1px grey;
		cursor: context-menu;
	}
	.profile-rating-row .profile-cell h4{
		border-radius: 5px;
	}
	.profile-rating-row .profile-cell p{
		text-align: center;
	}
	h4.unemployed-reason{
		text-align: left;
	}
	.stars-wrapper{
		
	}
	.stars-wrapper span{
		color: #0099ff;
		font-size: 20px;
		transition: .2s;
	}
	.stars-wrapper span[class*="empty"]{
		text-shadow: none;
	}
	.profile-rating-row .profile-cell:hover span:not([class*="empty"]){
		transform: scale(1.3);
		text-shadow: 2px 2px 1px grey;
	}
	.personal-profile-wrapper,
	.personal-portfolio-wrapper{
		display: inline-flex;
		flex-flow: column nowrap;
		width: 40%;
		margin-left: 10%;
		margin-top: 20px;
		margin-bottom: 50px;
		border: 2px solid #333;
		box-shadow: 8px 8px 10px 1px #9c9c9c;

	}
	.personal-profile-header,
	.personal-portfolio-header{
		background: #333;
		flex: 1;
	}
	.personal-profile-header h4,
	.personal-portfolio-header h4{
		padding: 8px;
		color: white;
		text-align: center;
		font-size: 25px;
	}
	.personal-profile-content{
		display: flex;
		flex-flow: column nowrap;
	}
	.personal-profile{
		padding: 10px;
	}
	.pp-row{
		display: flex;
		flex-flow: row wrap;
		margin: 5px 0;
	}
	.pp-cell{
		flex: 1;
		text-align: center;
		padding: 0px 3px;
	}
	.pp-cell h4{
		margin-bottom: 3px;
		color: #333;
		text-shadow: 0px 0px 1px #666;
		font-size: 17px;
		box-shadow: 2px 2px 5px 1px grey;
		padding: 8px;
		position: relative;
	}
	.pp-cell h4 button.update-profile-btn{
		position: absolute;
		right: 8px;
		background: none;
		border: none;
		font-size: 18px;
		color: #333;
		opacity: .4;
	}
	.multi-btns{
		position: absolute;
		right: 8px;
		top: 5px;
		display: flex;
		flex-flow: row nowrap;
		justify-content: flex-end;
	}
	.multi-btns button{
		position: initial !important;
		margin: 0px 3px;
		background: none;
		border: none;
		font-size: 18px;
		color: #333;
		opacity: .4;
	}
	button.add-email-add:hover,
	.pp-cell h4 button.update-profile-btn:hover{
		opacity: 1;
	}
	.pp-cell p{
		font-size: 14px;
	}
	.pp-cell.email-add-cell{
		flex: initial;
		width: 100% !important;
	}
	.pp-rating-wrapper{
		display: flex;
		flex-flow: row wrap;
		max-height: 600px;
		overflow: auto;
		margin-top: 15px;
	}
	.pp-stars-wrapper{
		display: inline-block;
		text-align: center;
		width: 48%;
		vertical-align: top;
		margin: 5px 2px;
		padding: 16px 8px;
		border: 1px solid #333;
		color: #333;
	}
	.pp-stars span:not([class*="empty"]){
		font-size: 20px;
		text-shadow: 2px 2px 1px black;
	}
	.pp-rating-question{
		letter-spacing: 2px;
		color: #33aaff;
	}
	.personal-portfolio-wrapper{
		margin-left: 30px;
	}
	.add-item-wrapper{
		display: flex;
		flex-flow: row wrap;
		padding: 5px;
	}
	.add-item-option{
		flex-basis: 30%;
		border: 2px solid #333;
		margin: 5px;
	}
	label.add-item-label{
		padding: 8px;
		text-align: center;
	}
	.add-item-label input{
		display: none;
	}
	.add-item-label span{
		font-size: 50px;
		color: #666;
	}
	.add-item-btn{
		padding: 5px;
		width: 80%;
		margin: 0 auto;
		background: #333;
		cursor: pointer;
		color: white;
		border-radius: 3px;
		font-size: 15px;
	}
	.add-item-option input{
		width: 98%;
		padding: 5px;
		outline: none;
		border: solid #333;
		border-width: 2px 0;
		margin-left: 1%;
	}
	button.upload-btn{
		padding: 5px;
		color: white;
		background: #333;
		border: none;
		display: inline-block;
		width: 50%;
		margin-left: 25%;
		margin-top: 8px;
		margin-bottom: 8px;
		font-size: 15px;
	}
	.portfolio-items{
		padding: 0px 8px;
		margin-bottom: 30px;
		display: flex;
		flex-flow: column nowrap;
	}
	.pi-content{
		display: flex;
		flex-flow: row wrap;
		margin-top: 20px;
	}
	.portfolio-item{
		position: relative;
		width: 30%;
		border: 2px solid #333;
		padding: 8px;
		margin: 8px;
		display: flex;
		flex-flow: column nowrap;
		justify-content: space-between;
		color: #333;
	}
	.portfolio-item:not(.image){
		width: 22%;
	}
	button.delete-portfolio-item{
		position: absolute;
		top: -10px;
		cursor: pointer;
		right: -10px;
		border: none;
		color: #ff3333;
		background: none;
		font-size: 25px;
		text-shadow: 3px 3px 5px #a5a5a5;
	}
	.portfolio-thumbnail{
	}
	.portfolio-thumbnail span{
		font-size: 80px;
		text-align: center;
		width: 100%;
		text-shadow: 5px 5px 3px grey;		
	}
	.pi-header{
		position: relative;
		text-transform: capitalize;
		font-variant: small-caps;
		font-size: 20px;
//		background: linear-gradient(to right, #0099ff, white);
//		background: linear-gradient(to right, black, white);
		background: #333;
		color: white;
		padding: 12px;
	}
	.portfolio-item img{
		height: 200px;
		width: 100%;
	}
	.portfolio-desc{
		text-align: center;
	}
	.portfolio-item a{
		color: black;
	}
	.admin-profile-wrapper{
		width: 40%;
		margin-left: 30%;
		border: 2px solid #0099ff;
		display: flex;
		flex-flow: column nowrap;
	}
	.admin-profile-header{
		background: #0099ff;
		color: white;
		padding: 10px;
		font-size: 25px;
		font-variant: small-caps;
		position: relative;
	}
	a.view-logs{
		display: inline-block;
		font-size: 15px;
		color: white;
		font-style: italic;
		font-variant: normal;
	}
	.admin-cell{
		flex: 1;
		padding: 8px;
		text-align: center;
	}
	.admin-cell input{
		width: 100%;
		padding: 3px 8px;
		border: none;
		border-bottom: 2px solid #0099ff;
		text-align: center;
		font-size: 20px;
		letter-spacing: 2px;
		color: white;
		background: #0099ff;
	}
	.admin-cell input:disabled{
		background: none;
		color: #0099ff;
	}
	.admin-cell input:focus{
		background: #0099ff;
		color: white;
	}
	#password-cell{
		display: none;
	}
	.admin-cell p{
		font-size: 15px;
	}
	button.update-admin-acc,
	button.cancel-admin-acc{
		padding: 8px;
		color: white;
		background: #0099ff;
		border: none;
		cursor: pointer;
		width: 40%;
		margin: 3px auto;
		font-variant: small-caps;
		font-size: 20px;
	}
	button.cancel-admin-acc{
		display: none;
	}
	.portfolio-modal-wrapper{
		padding: 5px;
		max-height: 400px;
		overflow: auto;
	}
	h4.portfolio-empty{
		text-align: center;
		font-size: 25px;
		color: #0099ff;
	}
	.portfolio-empty span{
	}
	.portfolio-modal-item{
		width: 30%;
		display: inline-block;
		border: 2px solid #0099ff;
		position: relative;
		margin: 5px;
		padding: 8px;
		vertical-align: top;
	}
	.pmi-thumbnail{
		text-align: center;
		font-size: 50px;
		color: #0099ff;
	}
	.pmi-thumbnail img{
		width: 100%;
		height: 200px;
	}
	.pmi-desc{

	}
	.pmi-desc a{
		display: block;
		text-decoration: none;
		color: #0099ff;
		font-size: 15px;
		padding: 8px;
		text-align: center;
		background: white;
		border: 2px solid #33aaff;
	}
	.trends-wrapper{
		display: flex;
		flex-flow: column nowrap;
		width: 80%;
		margin: 20px auto;
	}
	.trends-header{
		font-size: 25px;
		background: #333;
		color: white;
		padding: 8px;
	}
	.trends-content{
		display: flex;
		flex-flow: column nowrap;
	}
	.trend-results-wrapper{
		display: flex;
		flex-flow: column nowrap;
	}
	.trc-outer{
		display: flex;
		flex-flow: row nowrap;
	}
	.trend-results-header{
//		background: #0099ff;
		background: linear-gradient(black, rgba(100,100,100,.4));
		margin-top: 20px;
		text-align: center;
		color: white;
		padding: 8px;
		font-variant: small-caps;
		font-size: 20px;
	}
	.trend-results-content{
		displaay: flex;
		flex-flow: column wrap;
		flex: 1;
		margin: 20px 10px;
		overflow: auto;
	}
	.trc-header{
	}
	.trc-header h4{
		text-align: center;
		background: #333;
		color: white;
		padding: 8px;
	}
	.trc-inner{
		height: 400px;
		overflow: auto;
		display: flex;
		flex-flow: column nowrap;
		justify-content: flex-end;
		padding: 8px;
		border: 2px solid #333;
	}
	.trc-bars-wrapper{
		height: 90%;
		display: flex;
		flex-flow: row nowrap;
		align-items: flex-end;
		white-space: nowrap;
	}
	.trc-years-wrapper{
		background: white;
		margin-top: 2px;
		height: initial;
		display: flex;
		flex-flow: row nowrap;
		position: relative;
	}
	.outer-bar{
		min-width: 90px;
		padding: 0px 15px;
		border-bottom: 2px solid #333;
		height: 100%;
		display: flex;
		align-items: flex-end;
	}
	.trc-years-wrapper div{
		text-align: center;
		margin: 0
		text-align: center;
		color: #333;
		min-width: 90px;
		max-width: 90px;
	}
	.bottom-label{
		border: 1px solid #d5d5d5;
	}
	.bottom-label div{
		padding: 3px;
	}
	.yrlabel{
		border-bottom: 1px solid #d5d5d5;
	}
	.outer-bar div{
		flex: 1;
		text-align: center;
//		background: linear-gradient(#0055ff,#0099ff,#33aaff);
		background: radial-gradient(grey, #333);
		color: white;
	}
	.jm-wrapper{
		width: 80%;
		margin: 20px auto;
		display: flex;
		flex-flow: column nowrap;
	}
	.jm-header h4{
		background: #333;
		color: White;
		padding: 8px;
		font-size: 25px;
	}
	.jm-content{
		padding: 8px;
		display: flex;
		flex-flow: column nowrap;
	}
	.jm-courses{
		flex: 1;
		margin: 20px 0;
		border: 2px solid #0099ff;
	}
	.jm-courses-header h4{
		padding: 8px;
		background: #33aaff;
		color: white;
	}
	.jm-courses-content{
		display: flex;
		flex-flow: column nowrap;
		height: 400px;
		overflow: auto;
		justify-content: flex-end;
		margin-top: 20px;
	}
	.jm-bars-wrapper, .jm-workfields-wrapper{
		display: flex;
		flex-flow: row nowrap;
	}
	.jm-bars-wrapper{
		height: 90%;
	}
	.jm-workfields-wrapper{
		height: 10%;
	}
	.jm-bars-wrapper .outer-bar{
		min-width: 120px;
		max-width: 120px;
		padding: 0 20px;
	}
	.jm-workfields-wrapper{
		display: flex;
		flex-flow: row nowrap;
	}
	.jm-workfields-wrapper div{
		min-width: 120px;
		max-width: 120px;
		text-align: center;
		color: #0099ff;
		z-index: 9999999;
	}
	input#keyword{
		width: 95%;
		padding: 8px;
		margin-left: 2%;
	}
	div#employment-desc-div{
		word-break: keep-all;
		overflow: hidden;
		text-overflow: ellipsis;
		text-align: left;
	}
	div#employment-desc-div:hover{
		overflow: visible;
		text-shadow: 0px 0px 1px black;
	}
	.view-employment-wrapper{
		display: flex;
		flex-flow: column nowrap;
		width: 50%;
		margin: 30px 25%;
	}
	.view-employment-header h4{
		padding: 8px;
		background: #0099ff;
		color: white;
		font-size: 30px;
	}
	.view-employment-content{
		display: flex;
		flex-flow: column nowrap;
	}
	.view-employment-row{
		display: flex;
		flex-flow: row nowrap;
		margin: 10px 0;
	}
	.view-employment-cell{
		flex: 1;
		margin: 5px;
		display: flex;
		flex-flow: column nowrap;
		justify-content: space-between;
//		border: 2px solid #0099ff;
		box-shadow: 3px 3px 5px 1px #555;
	}
	.view-employment-cell h4{
//		flex: 1;
		display: flex;
		align-items: center;
		justify-content: center;
		background: #33aaff;
		color: white;
		padding: 8px;
		font-size: 18px;
	}
	.view-employment-cell p{
		text-align: center;
		color: #0099ff;
		text-shadow: 0px 0px 1px black;
		font-variant: small-caps;
		font-size: 20px;
	}
	.new-line{
		padding: 8px;
		width: 100%;
		background: #0099ff;
		color: white;
		text-transform: capitalize;
		font-variant: small-caps;
		font-size: 25px;
	}
	.upm-wrapper{
		padding: 8px;
		display: flex;
		flex-flow: column nowrap;
	}
	.upm-wrapper input, .upm-wrapper select{
		width: 90%;
		margin-left: 5%;
		font-size: 18px;
		color: #0099ff;
		border: 2px solid #0099ff;
		padding: 8px;
		margin-top: 5px;
	}
	button.upm-submit{
		width: 30%;
		margin-left: 35%;
		padding: 8px;
		font-size: 15px;
		color: white;
		border: none;
		background: #0099ff;
	}
	.add-skill-form{
		width: 40%;
		display: inline-block;
		margin: 50px;
	}
	.notif{
		width: 90%;
		margin: 20px auto;
		border-radius: 5px;
		color: white;
		padding: 8px;
	}
	.notif-error{
		background: rgba(220,50,50,.9);
	}
	.notif-success{
		background: rgba(50,220,50,.9);
	}
	.asf-skills{
		vertical-align: top;
		display: inline-flex;
		flex-flow: column nowrap;
		width: 40%;
		margin: 50px;
		border: 1px solid #d5d5d5;
		text-align: center;
		max-height: 500px;
		overflow: auto;
	}
	.asf-skills-row{
		border-bottom: 2px solid #d5d5d5;
		display: flex;
		flex-flow: row nowrap;
	}
	.asf-skills-row:nth-child(1){
		font-size: 18px;
		background: #e5e5e5;
	}
	.asf-skills-cell{
		flex: 1;
		padding: 5px;
		border-right: 2px solid #d5d5d5;
	}
	.asf-skills-cell:last-child{
		border-right: none;
	}
	
	.skills-category{
		font-size: 20px;
		background: #d5d5d5;
		padding: 8px;
	}
	.skills-rating-wrapper{
		
	}
	.skills-label{
		padding: 8px;
		background: #5e5e5e;
		color: white;
		margin-top: 10px;
	}
	.skills-range{
		display: flex;
		flex-flow: row nowrap;
		width: 98%;
		margin: 5px auto;
	}
	.skill-rating{
		flex: 1;
		text-align: center;
		border: 2px solid #d5d5d5;
		cursor: pointer;
	}
	.skill-rating h4{
		padding: 8px;
	}
	.skill-rating input{
		display: none;
	}
	.skill-rating input:checked + h4{
		background: #333;
		transform: scale(1.3);
		color: white;
	}
	div#company-field{
		display: none;
	}
	
	.view-rating{
		width: 80%;
		margin: 50px auto;
	}
	.view-rating-header{
		font-size: 22px;
		background: #222;
		color: white;
		padding: 12px;
		margin-bottom: 10px;
		position: relative;
	}
	button.update-rating{
		position: absolute;
		right: 5px;
		min-width: 120px;
//		box-shadow: 6px 0px 0px 0px white;
		top: 14%;
		background: none;
		border: 1px solid white;
		padding: 8px;
		color: white;
	}
	.cr-header{
		padding: 8px;
		font-size: 20px;
		background: #555;
		color: white;
	}
	.cr-inner{
		display: flex;
		flex-flow: row wrap;
	}
	.skill-rating-wrapper{
		flex: 1;
		width: 90%;
		margin: 10px 5px;
		display: flex;
		flex-flow: row nowrap;
		align-content: center;
	}
	.cr-skill-rating{
		border: 2px solid #333;
		padding: 8px 12px;
		transform: scale(1.3);
		background: #333;
		color: white;
		display: flex;
		align-items: center;
	}
	.skill-name{
		border: 2px solid #333;
		flex-grow: 2;
		padding: 8px;
	}
	.matches-table{
		width: 80%;
		margin: 20px auto;
	}
	.mt-header{
		display: flex;
		flex-flow: row nowrap;
		background: #333;
		color: white;
		text-align: center;
	}
	.mt-row{
		display: flex;
		flex-flow: row nowrap;
		text-align: center;
	}
	.mt-row div{
		border: 2px solid #333;
	}
	.mt-row div:not(#rating-cell),
	.mt-header div:not(#rating-cell){
		width: 35%;
		padding: 8px;
	}
	.mt-row div#rating-cell,
	.mt-header div#rating-cell{
		width: 15%;
		display: flex;
		align-items: center;
		justify-content: center;
	}
	.no-match{
		padding: 8px;
		text-align: center;
		width: 100%;
		background: #555;
		color: white;
	}
	h4.matched-companies{
		padding: 8px;
		font-size: 20px;
		text-align: center;
		background: #666;
		color: white;
	}
	.companies{
		width: 80%;
		margin: 0px auto;
		margin-bottom: 50px;
	}
	table.company-table{
		width: 100%;
		border-spacing: 0;
		border-collapse: collapse;
//		table-layout: fixed;
	}
	table.company-table thead{
		background: #d5d5d5;
	}
	table.company-table th,
	table.company-table td{
		padding: 8px;
		border: 2px solid #333;
	}
	table.company-table td.blankcell{
		padding: 1px;
		background: #777;
	}
	table.company-table td.blankcellpos{
		padding: 1px;
		background: #a5a5a5;
	}
	table.company-table tbody tr{
		border-bottom: 2px solid #e5e5e5;
	}
	table.company-table tbody tr td:last-child{
		text-align: center;
		width: 20%;
	}
	td.compname{
		position: relative;
		text-align: center;
		background: #efefef;
		box-shadow: 0px 0px 5px 1px white inset;
	}
	tr.blanktr td{
		padding: 0;
	}
	td.compactions{
		border: none;
	}
	div.compactions{
		display: flex;
		flex-flow: row nowrap;
	}
	td.compactions button{
		flex: 1;
		background: none;
		border: none;
		margin: 0 auto;
		padding: 3px;
	}
	button#company-update{
		border-right: 1px solid black;
	}
	button.company-action:hover{
		background: #333;
		color: white;
	}
	button.view-contacts{
		display: block;
		width: 50%;
		margin: 0 auto;
		background: none;
		border: none;
		color: blue;
		font-style: italic;
	}
	div.company-header{
		display: flex;
		flex-flow: row nowrap;
		width: 80%;
		margin: 0px auto;
		margin-top: 20px;
		font-size: 25px;
		background: #333;
		padding: 8px;
		color: White;
		align-items: center;
	}
	div.company-header h4{
		flex-basis: 200px;
	}
	div.company-search{
		width: 250px;
	}
	input#company-search{
		width: 100%;
		padding: 5px;
		border: 2px solid white;
		background: none;
		color: white;
		border-right: none;
	}
	button.com-btn{
		padding: 5px;
		background: none;
		border: 2px solid white;
		color: white;
		min-width: 100px;
	}
	div.company-actions{
	}
	.skills-selection{
		width: 95%;
		margin: 10px auto;
	}
	h4.ss-category{
		background: #555;
		color: white;
		padding: 8px;
	}
	div.ss-skill{
		padding: 5px;
		display: flex;
		flex-flow: row nowrap;
		background: #777;
	}
	h4.ss-name{
		flex: 1;
		color: white;
		padding: 5px;
		border: 2px solid white;
		border-width: 2px 0 2px 2px;
	}
	button#add-qualification{
		flex-basis: 100px;
		background: #555;
		color: white;
		border: 2px solid white;
	}
	input#search-ss{
		margin-left: 2.5%;
		margin-top: 10px;
		padding: 8px;
		width: 300px;
	}
	table.skills-match{
		border-collapse: collapse;
		width: 80%;
		margin: 50px auto;
	}
	table.skills-match tr{
		border-bottom: 2px solid #f5f5f5;
	}
	table.skills-match tr td,
	table.skills-match tr th{
		padding: 8px;
		text-align: center;
	}
	table.skills-match td:last-child{
		text-align: right;
		padding-right: 15px;

	}
	table.skills-match thead tr{
		background: #999;
	}
	table.skills-match thead tr th{
		border-left: 2px solid white;
		font-variant: small-caps;
		font-size: 20px;
	}
	tr.quali-result{
		background: #f5f5f5;
	}
	.add-item-desc select{
		padding: 3px;
		font-size: 12px;
		width: 95%;
		margin-top: 5px;
		margin-left: 2.5%;
	}
	.add-item-desc select option{
		font-size: 15px;
	}
	.certificates-header{
		width: 80%;
		margin: 20px auto;
		padding: 8px;
		background: #666;
		color: white;
		font-size: 25px;
		position: relative;
	}
	button.print-item{
		position: absolute;
		right: 5px;
		top: 13%;
		padding: 8px;
		background: none;
		border: 1px solid white;
		color: white;
		font-variant: small-caps;
		min-width: 120px;
		transform: translate(-6px, 0px);
		box-shadow: 6px 0px 0px 0px white;
	}
	button.print-item:hover{
		transform: translate(-4px, 0px);
		box-shadow: 4px 0px 0px 0px white;
	}
	.certificates{
		display: flex;
		flex-flow: row wrap;
		width: 90%;
		margin: 50px auto;
		justify-content: center;
	}
	.certificate{
		flex-basis: 300px;
		height: 250px;
		border: 2px solid #555;
		box-shadow: 5px 5px 5px 1px #888;
		margin: 15px;
	}
	.certificate-thumbnail{
		width: 100%;
		height: 80%;
		padding: 8px;
	}
	.certificate-thumbnail img{
		width: 100%;
		height: 100%;
	}
	.certificate-desc{
		text-align: center;
		background: #555;
		height: 20%;
		color: white;
		display: flex;
		flex-flow: column nowrap;
		align-items: center;
		justify-content: center;
	}
	.certificate-desc h4{
		font-weight: bold;
	}
	.certificate-desc p{
		
	}
	th.companies-matched-header{
		font-size: 25px;
		padding: 8px;
		background: #666;
		color: white;
	}
	label#work-experience-label .add-item-thumbnail{
		margin-top: 20%;
	}
	form.experience-form{
		padding: 15px;
		display: flex;
		flex-flow: column nowrap;
		background: #f5f5f5;
	}
	fieldset.ef-fieldset{
		display: flex;
		flex-flow: column nowrap;
		border: none;
		padding: 8px;
	}
	fieldset.ef-fieldset input,
	fieldset.ef-fieldset select{
		width: 100%;
		padding: 5px;
		font-size: 18px;
	}
	fieldset.ef-fieldset label{
		text-align: center;
		padding: 5px;
		display: inline-block;
		width: 50%;
		margin: 0 auto;
		border-bottom: 2px solid #d5d5d5;
	}
	button.ef-btn{
		width: 200px;
		margin: 15px auto;
		padding: 8px;
		border: none;
		background: #555;
		color: white;
		border-radius: 3px;
		font-size: 18px;
	}
	h4.no-cert{
		width: 80%;
		margin: 0 auto;
		padding: 8px;
		color: white;
		background: #555;
		font-size: 20px;
	}
	.add-company-form{
	}
	.positions-form{
		border: 2px solid grey;
		padding: 8px;
		margin-top: 10px;
	}
	button.ars,
	button.apos,
	button.submit-company{
		display: inline-block;
		padding: 8px;
		width: 40%;
		margin: 0 auto;
		border: 2px solid grey;
		background: #333;
		color: white;
	}
	.contact-list{
		padding: 8px;
		background: #f5f5f5;
	}
	.contact-row{
		display: flex;
		flex-flow: row nowrap;
		border-bottom: 2px solid #333;
	}
	.contact-cell{
		padding: 8px;
		flex: 1;
	}
	.other-account-settings{
		padding: 12px;
		border-top: 2px solid #b3b3b3;
	}
	.aos-btn{
		padding: 12px;
		border: none;
		cursor: pointer;
		background: #555;
		color: white;
		font-size: 15px;
	}
	form#change-password-form{
		background: #f5f5f5;
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
	.biodata-option{
		flex: 1;
		margin: 12px;
	}
	.biodata-option a{
		display: inline-block;
		padding: 8px;
		text-decoration: none;
		color: white;
		background: #555;
	}
	label.upload-label{
	}
	label.upload-label input{
		display: none;
	}
	label.upload-label div{
		background: #555;
		color: white;
		padding: 8px;
		cursor: pointer;
		text-align: center;
	}
	label.alumni-actions-dd{
		width: 100%;
		display: block;
		position: relative;
	}
	label.alumni-actions-dd:hover div.dd-preview{
		background: #333;
		color: white;
	}
	div.dd-preview{
		background: #d5d5d5;
		padding: 8px;
		font-size: 13px;
		cursor: pointer;
	}
	label.alumni-actions-dd input{
		display: none;
	}
	label.alumni-actions-dd input + div{
		width: 250px;
		display: none;
		position: absolute;
		left: 0px;
		top: 100%;
		z-index: 1;
		background: #f5f5f5;
		box-shadow: 5px 5px 3px 1px black;
	}
	label.alumni-actions-dd input:checked ~ div.dd-preview{
		background: #333;
		color: white;
	}
	label.alumni-actions-dd input:checked + div{
		display: initial;
	}
	.work-experiences-wrapper{
		width: 80%;
		margin: 50px auto;
	}
	.we-header{
		position: relative;
		padding: 10px;
		background: #333;
		color: white;
		font-size: 22px;
	}
	.we-content{
		margin-top: 12px;
	}
	.we-row{
		display: flex;
		flex-flow: row nowrap;
	}
	.we-row.we-row-header{
		background: #555;
		color: white;
	}
	.we-cell{
		padding: 8px;
		flex: 1;
	}
	.we-row-header .we-cell{
		border-right: 2px solid white;
		text-align: center;
	}
	.we-cell#company{
//		flex-basis: 370px;	
		flex-grow: 2;
	}
	.we-cell#position-level{
//		flex-basis: 200px;
	}
	.we-cell#position-name{
//		flex-basis: 250px;
	}
	.we-cell#fields{
		flex-grow: 2;
	}
	.we-cell#years{
		border-right: none;
		text-align: center;
		flex: initial;
		flex-basis: 80px;
	}
	.we-content .we-row{
		border-bottom: 2px solid #555;
	}
	.we-list .we-cell{
		border-right: 2px solid #555;
	}
	h4.alumni-name{
		width: 90%;
		margin: 30px auto;
		background: #333;
		color: white;
		padding: 18px 8px 5px 8px;
		font-size: 28px;
		font-variant: small-caps;
		letter-spacing: 1.3px;
		box-shadow: -5px 5px 5px 1px grey;
	}
	.is_it_related{
		display: flex;
		flex-flow: row nowrap;
		border-bottom: 2px solid #d5d5d5;
	}
	.is_it_related label.radio-label{
		margin: 0 15px;
		cursor: pointer;
		border: none;
	}
	.is_it_related label.radio-label input{
		display: none;
	}
	.is_it_related label.radio-label input + div{
		background: #e5e5e5;
		padding: 8px;
	}
	.is_it_related label.radio-label input:checked + div{
		background: #0a76d2;
		color: white;
	}
	body{
		background: url('imgs/some-header.png');
		background-size: 100%;
		background-repeat: no-repeat;
		margin-top: 220px;
	}
	.at-nav-mobile{ display: none; }
	.educ-bgs-form{
		background: #fafafa;
		padding: 0px 50px;
	}
	a#update-we{
		cursor: pointer;
		text-decoration: underline;
	}
	.at-modal-wrapper#liability-agreement{
		background: #f5f5f5;
	}
	.at-modal-wrapper#liability-agreement p{
		padding: 5px;
	}
	button.agreed{
		border: none;
		padding: 8px;
		background: #0a76d2;
		color: white;
		display: inline-block;
		width: 50%;
		font-size: 20px;
		margin-left: 25%;
		margin-bottom: 10px;
	}
	.alc-dcg hr{
		display: none;
	}
	@media only screen and(min-width: 600px){
		/* For Tablets */
		
	}
	@media only screen and (min-width: 768px){
		/* For Desktop */
		.hol{
			display: none;
		}
	}
	@media only screen and (max-width: 767px){
		/* For Mobile */
		*{
			font-family: Cambria;
		}
		.at-modal-wrapper{
			width: 90%;
			left: 5%;
		}
		body{
			margin-top: 0;
			padding: 0;
		}
		.at-nav-top{ display: none; }
		.at-navbar{ position: relative; margin-top: 80px; top: 0; left: 0;}
		ul.at-nav-mobile{
			list-style-type: none;
			display: flex;
			flex-flow: row wrap;
			background: #0a76d2;
			padding: 0;
			padding-bottom: 0;
		}
		ul.at-nav-mobile li{
			padding: 5px;
		}
		ul.at-nav-mobile li a{
			text-decoration: none;
			color: black;
			display: flex;
			flex-flow: row nowrap;
			align-items: center;
		}
		ul.at-nav-mobile li a.active{
			font-weight: bold;
			color: white;
		}
		ul.at-nav-mobile div.nav-icon1{
			width: 30px;
			display: none;
		}
		div.nav-txt{
			color: #f5f5f5;
			font-size: .85em;
		}
		ul.at-nav-mobile li img{
			height: 100%;
			width: 100%;
		}
		img.glist-header{
			width: 100%;
			margin: 0;
		}
		
		label.alumni-actions-dd input + div{
			left: initial;
			right: 0;
			width: 150px;
			padding: 0px;
		}
		div.alumni-list{
			width: 100%;
		}
		.alumni-list-label{
			display: none;
		}
		.alumni-list-row{
			flex-wrap: wrap;
		}
		.alumni-list-cell.alc-dcg{
			flex: initial;
			width: 100% !important;
			font-weight: bold;
			color: #555;
//			border-bottom: 1px solid #f5f5f5;
		}
		.alc-dcg hr{
			display: block;
			width: 75%;
			margin: 5px auto;
			border: none;
			background: white;
			height: 2px;
		}
		.alumni-list-content{
			margin-top: 10px;
			border-top: 2px solid black;
		}
		.alumni-list-content:first-child{
			border-top: none;
		}
		.al-inner-row{
			background: none;
		}
		.al-inner-row:nth-of-type(even){
			background: rgba(255,255,255,.2);
		}
		.alumni-list-cell#alumni-name{
			flex: initial;
			width: 100% !important;
			text-align: left;
		}
		.alumni-list-cell.alc-actions{
			flex: initial;
		}
		span.sa-text{
			display: none;
		}
		.graduates-header h4{
			font-size: 1.5em;
		}
		.graduates-options{
			width: 50%;
			margin: 0 auto;
			position: relative !important;
			bottom: initial !important;
			right: initial !important;
			text-align: center;
			display: flex;
			justify-content: space-around;
		}
		.at-modal{
			overflow: auto;
		}
		.at-modal-wrapper{
			margin-bottom: 30px;
		}
		.profile-wrapper{
			background: #fafafa;
		}
		.profile-row{
			flex-flow: column nowrap;
		}
		.profile-cell{
			margin-bottom: 5px;
		}
		.profile-cell p{
			font-size: .8em;
		}
		.at-modal-wrapper#search-form{
			width: 80% !important;
			left: 10% !important;
		}
		.course-label{
			width: 45%;
		}
		.alumni-input-row{
			flex-wrap: wrap;
		}
		.alumni-fieldset{
			flex: initial;
			width: 100%;
		}
		.at-loginform-wrapper{
			margin-top: 100px;
			width: 90%;
		}
		.at-loginform-header{
			font-size: .9em;
			text-indent: 0;
		}
		.at-loginform-content{
			width: 90%;
		}
		.at-loginform{
			width: 100%;
		}
		.at-input-field{
			width: 100%;
		}
		.at-input-field.at-af-btns{
			width: 50%;
		}
		.admin-loginform{
			width: 90%;
		}
		.at-modal-wrapper#alumni-id-modal{
			width: 80%;
			left: 10%;
		}
		.admin-profile-wrapper{
			width: 90%;
			margin: 50px auto;
		}
		.personal-portfolio-wrapper,
		.personal-profile-wrapper{
			width: 95%;
			margin-left: 2.5%;
			box-shadow: none;
		}
		.pp-row{
			flex-wrap: wrap;
		}
		.pp-cell{
			flex: initial;
			width: 100%;
			margin-bottom: 8px;
			display: flex;
			flex-flow: column nowrap;
			border: 1px solid #b3b3b3;
			padding: 0;
		}
		.pp-cell p{
			order: 1;
			text-align: left;
			border-bottom: 1px solid #b3b3b3;
//			background: rgba(0,0,0,.5);
			background: #b3b3b3;
			padding: 3px;
//			color: white;
		}
		.pp-cell h4{
			order: 2;
			padding: 3px;
			box-shadow: none;
//			border: 1px solid #b3b3b3;
		}
		.at-modal-wrapper#upm-modal{
			width: 90% !important;
			left: 5% !important;
		}
		.add-item-option{
			flex-basis: 45%;
		}
		.portfolio-item:not(.image){
			width: 45%;
		}
		button.print-item{
			min-width: initial;
			box-shadow: none;
			right: 0;
			width: 50px !important;
		}
		span.pi-text{ display: none; }
		.at-modal-wrapper#add-email-modal{
			width: 90% !important;
			left: 5% !important;
		}
		div.company-header{
			width: 100% !important;
			flex-wrap: wrap;
			padding: 0;
			padding-bottom: 8px;
		}
		div.company-header h4{
			flex-basis: 100%;
			padding: 8px;
		}
		div.company-search{
			width: 50% !important;
			padding-left: 5px;
		}
		div.company-actions{
			width: 50%;
			display: flex;
			padding-top: 5px;
		}
		button.com-btn{
			flex: 1;
			margin-right: 5px;
			min-width: initial;
		}
		.companies{
			width: 100%;
			overflow: auto;
		}
		body{
			background-size: 100% 80px;
		}
		.hos{
			display: none;
		}
		h4.alumni-name{
			font-size: 1.2em;
			box-shadow: none;
			margin: 0 auto;
			margin-top: 100px;
			width: 100%;
			padding-top: initial;
			padding: 8px;
			font-weight: normal;
			text-align: center;
		}
		.view-rating{
			width: 100%;
		}
		button.update-rating{
			min-width: 50px;
		}
		.update-text{ display: none; }
		.view-rating-header h4{ font-size: .9em; }
		.work-experiences-wrapper{
			width: 100%;
		}
		.we-cell#position-name{
			flex-basis: 70px;
		}
		button.view-exp{
			width: 100%;
			background: none;
			border: none;
			color: blue;
			font-weight: bold;
		}
		div.skills-match{
			overflow: auto;
		}
		table.skills-match thead th{
			font-size: .9em !important;
		}
		div.certificates-header{
			width: 100%;
		}
		.certificates{
			width: 100%;
		}
		.certificate{
			flex-basis: 40%;
			height: 150px;
			margin: 5px;
			box-shadow: none;
		}
		.certificate-thumbnail{
			padding: 0;
			height: 75%;
		}
		.certificate-desc{
			height: 25%;
			padding: 8px;
			font-size: .9em;
		}
		form#update-rating-form{
			overflow: auto;
		}
		.skills-range{
			flex-wrap: wrap;
		}
		.skill-rating{
			flex: initial;
			flex-basis: 20%;
		}
		input#skill-rating + h4{
			font-size: .8em !important;
		}
		.at-modal-wrapper#view-exp-modal{
			background: #f5f5f5;
		}
		.at-modal-wrapper#view-exp-modal .at-modal-content{
			padding: 0 5px;
		}
		div.at-modal-wrapper#delete-confirm{
			background: #f5f5f5;
			width: 90% !important;
			left: 5% !important;
		}
		.graduates-wrapper{
			background-size: 100% 100% !important;
			background-attachment: fixed;
			padding-bottom: 5px;
		}
	}
	</style>
</head>
<body>
	<!--
	<div class="at-header">
		<div class="logo" id="left">
			<img src="imgs/west-logo.png" height="auto" />
		</div>
		<div class="at-westinfo">
			<h2> West Visayas State University </h2>
			<p> Luna St. Lapaz Iloilo City </p>
			<h4> College of Information and Communications Technology </h4>
		</div>
		<div class="logo" id="right">
			<img src="imgs/cict-logo.png" height="auto" <?php echo (!isset($_SESSION['admin_id']) && !isset($_SESSION['alumni_id']) ? "id='cict'" : ""); ?> />
		</div>
	</div>
	!-->
	
	
