<?php
include 'header.php';
include 'nav.php';
?>
	<style>
	*{
		font-family: "Cambria";
	}
	.home-header{
		margin: 0;
		text-align: center;
		font-size: 30px;
		color: #fd6421;
		font-variant: small-caps;
	}
	.home-wrapper{
		width: 80%;
		margin: 20px auto;
		display: flex;
		flex-flow: row nowrap;
	}
	.mvg-wrapper{
		flex: 1;
		display: flex;
		flex-flow: column nowrap;
		align-items: center;
		justify-content: center;
	}
	.mvg{
		font-weight: bold;
		margin: 20px 0;
		padding: 20px 12px;
		font-size: 22px;
		width: 100%;
		font-variant: small-caps;
		border: none;
		background: #fafafa;
		box-shadow: -3px 3px 5px 1px black;
		cursor: pointer;
	}
	.mvg:hover, .mvg:active{
		background: #fd6421;
		color: white;
	}
	.cac{
		flex: 1;
	}
	.carousel{
		-webkit-flex: 2;
		margin: 0 20px;
		box-shadow: -5px 5px 5px 2px grey;
		position: relative;
		max-height: 450px;
	}
	.carousel-items{
		display: flex;
		-webkit-flex-flow: row nowrap;
		height: 120px;
		background: #333;
	}
	.carousel-item{
		-webkit-flex: 1;
	}
	.carousel-item img{
		width: 100%;
		height: 100%;
		border: 2px solid transparent;
		-webkit-filter: grayscale(.5);
	}
	.carousel-item:hover img{
		border: 2px solid white;
		-webkit-filter: grayscale(0);
	}
	.carousel-item:first-child,
	.carousel-item:nth-child(5){
		z-index: 0;
	}
	.carousel-item:first-child img,
	.carousel-item:nth-child(5) img{
		-webkit-transform: scale(.8);
	}
	.carousel-item:nth-child(2),
	.carousel-item:nth-child(4){
		z-index: 1;
	}
	.carousel-item:nth-child(2) img,
	.carousel-item:nth-child(4) img{
		-webkit-transform: scale(1.5, 1);
	}
	.carousel-item:nth-child(3) img{
		-webkit-transform: scale(1.5, 1.2);
		-webkit-filter: grayscale(0);
	}
	.carousel-item:nth-child(3){
		z-index: 2;
	}
	.carousel-item:nth-child(5) ~ .carousel-item img{
		border: none !important;
	}
	.carousel-item:nth-child(5) ~ .carousel-item{
		-webkit-flex: 0 !important;
	}
	.image-preview{
		height: 330px;
	}
	.image-preview img{
		height: 100%;
		width: 100%;
	}
	.carousel-nav{
		position: absolute;
		bottom: 60px;
		width: 100%;
		display: flex;
		-webkit-align-items: center;
	}
	button.prev,
	button.next{
		background: none;
		font-size: 50px;
		font-weight: bold;
		color: white;
		position: absolute;
		border: none;
		text-shadow: 0px 0px 3px black;
		cursor: pointer;
		transition: .3s;
		outline: none;
		z-index: 5;
	}
	button.prev:hover,
	button.next:hover{
		transform: scale(1.3);
	}
	button.next:hover{
		left: 0px;
	}
	button.prev:hover{
		right: 0px;
	}
	button.next{
		left: 5px;
	}
	button.prev{
		right: 5px;
	}
	div.at-modal-wrapper#mvg-modal{
		animation: dropAt20 .4s linear forwards;
		background: rgba(0,0,0,.8);
		color: white;
		min-height: 250px;
		border: none;
		width: 80%;
		left: 10%;
		height: 50%;
	}
	div#mvg-modal .at-modal-header{
		border: none;
		background: none;
	}
	div#mvg-modal .at-modal-content{
		display: flex;
		height: 80%;
		flex-flow: column nowrap;
		justify-content: center;
		align-items: center;
		align-content: center;
	}
	div#mvg-modal h4{
		font-weight: bold;
		text-align: center;
		font-size: 35px;
		font-variant: small-caps;
	}
	div#mvg-modal p{
		width: 40%;
		margin: 20px auto;
		font-size: 25px;
		text-align: justify;
	}
	@keyframes dropAt20{
		from{
			top: -50%;
		}
		to{
			top: 15%;
		}
	}
	.cu-wrapper{
		width: 40%;
	}
	.co-item{
		display: flex;
		flex-flow: row nowrap;
		align-items: center;
		margin: 10px 8px;
//		border-left: 35px solid #fd6421;
		padding-left: 10px;
		border-bottom: 2px solid #fd6421;
	}
	.co-item:first-child{
		border-top: 2px solid #fd6421;
	}
	.coi-icon{
		height: 80px;
		flex-basis: 80px;
	}
	.coi-text{
		color: blue;
		text-decoration: underline;
		cursor: pointer;
	}
	.coi-icon img{
		width: 80px;
		height: 100%;
	}
	.cu-items{
		padding: 5px;
		overflow: auto;
	}
	.cu-item{
		border-bottom: 1px solid #3a3a3a;
		padding: 8px;
		padding-bottom: 3px;
		display: flex;
		flex-flow: row nowrap;
		margin: 8px 0;
	}
	.cu-label, .cu-text{
		flex: 1;
		font-size: 18px;
	}
	.dd-preview{
		font-size: 25px;
	}
	.dd-icon{
		display: none;
		font-weight: bold;
		transform: rotateZ(90deg) scale(2, 1) translateX(1px);
		margin-left: 4px;
	}
	.course-info{
		padding: 8px;
		background: #f5f5f5;
	}
	.course-info h4{
		font-size: 30px;
		text-align: center;
	}
	.course-info p{
		font-size: 20px;
		text-align: justify;
		line-height: 1.5;
		padding: 8px;
	}
	@media only screen and (max-width: 767px){
		.home-wrapper{
			display: flex;
			flex-flow: column nowrap;
			width: 100%;
		}
		.carousel{
			order: 1;
		}
		.mvg-wrapper{
			order: 3;
			width: 95%;
			margin: 0 auto;
		}
		.cac{
			order: 2;
			margin-top: 30px;
		}
		.carousel-nav{
		}
		.carousel-items{

		}
		div#mvg-modal .cu-wrapper,
		div#mvg-modal p{
			width: 95%;
			margin: 0 auto;
		}
		.cu-text{
			word-break: break-all;
		}
		.co-wrapper{
			display: none;
			width: 80%;
			margin: 0 auto;
		}
		.co-preview{
			text-align: center;
			width: 95%;
			font-weight: bold;
			margin: 20px 0;
			margin-left: 2.5%;
			padding: 20px 12px;
			font-size: 22px;
			font-variant: small-caps;
			border: none;
			background: #fafafa;
			box-shadow: -3px 3px 5px 1px black;
			cursor: pointer;		}
		}
		.co-preview1{
			text-align: center;
			border: 2px solid #fd6421;
			padding: 5px;
			font-size: 20px;
			color: #fd6421;
			font-weight: bold;
			width: 98%;
			margin: 0 auto;
		}
		.dd-icon{
			display: inline-block;
		}
	}
	</style>
	<script>
	jQuery(function($){
		$(document) .on('click','.co-preview',function(){
			$(this).next('.co-wrapper').toggle('fast');
		});
		$(document) .on('click','button.mvg',function(){
			var url = $(this).data('url');
			$('.at-modal') .load(url).show();
		});
		$(document) .ready(function(){
			$('.image-preview').html($('.carousel-item:nth-child(3) img').clone());
			function moveCarousel(){
				$('.carousel.moving button.prev').click();
				var x = setTimeout(moveCarousel,8000);
			}
			moveCarousel();
		});
		$('.carousel') .hover(function(){
			$(this).removeClass('moving');
		}, function(){
			$(this).addClass('moving');
		});
		$(document) .on('click','button.next',function(){
				$('.carousel-item:last-child').css({
					'flex' : 1
				}).prependTo($(this).parents('.carousel-nav').siblings('.carousel-items'));
				$('.image-preview') .html($('.carousel-item:nth-child(3) img').clone());
		});
		$(document) .on('click','button.prev',function(){
				$('.carousel-item:first-child').css({
					'flex' : 1
				}).appendTo($(this).parents('.carousel-nav').siblings('.carousel-items'));
				$('.image-preview') .html($('.carousel-item:nth-child(3) img').clone());
		});
		$(document) .on('click','.carousel-item',function(){
			var thisIndex = $(this).index() + 1;
			var img = $(this).children('img').clone();
			$('.image-preview').html(img);
			if(thisIndex == 1){
				$('.carousel-item:last-child ,.carousel-item:nth-last-child(2)').css({
					'flex' : 1
				}).prependTo($(this).parents('.carousel-items'))
				.siblings('.carousel-item:nth-child(3)');
				;
			}else if(thisIndex == 2){
				$('.carousel-item:last-child').css({
					'flex' : 1
				}).prependTo($(this).parents('.carousel-items'));
			}else if(thisIndex == 4){
				$('.carousel-item:first-child').css({
						'flex' : 1
				}).appendTo($(this).parents('.carousel-items'));
			}else if(thisIndex == 5){
				$('.carousel-item:first-child ,.carousel-item:nth-child(2)').css({
					'flex' : 1
				}).appendTo($(this).parents('.carousel-items'));
			}
		});
		$(document) .on('click','.coi-text',function(){
			var id = $(this).data('id');
			$.ajax({
				'type' : 'post',
				'url' : 'course-info-modal.php',
				'data' : {'id' : id},
				'success' : function(response){
					$('.at-modal').html(response).show();
				}
			});
		});
	});
	</script>
</head>
<body>
<h4 class="home-header"> Alumni Tracing </h4>
<div class="home-wrapper">
	<div class="mvg-wrapper">
		<button class="mvg" data-url="mission.php"> Mission </button>
		<button class="mvg" data-url="vision.php"> Vision </button>
		<button class="mvg" data-url="gao.php"> Goals and Objectives </button>
		<button class="mvg" data-url="contact-us.php"> Contact Us </button>
	</div>
	<div class="carousel moving">
		<div class="image-preview"></div>
		<div class="carousel-items">
			<div class="carousel-item">
				<img src="elements/img/7.jpg" />
			</div>
			<div class="carousel-item">
				<img src="elements/img/10.jpg" />
			</div>
			<div class="carousel-item">
				<img src="elements/img/11.jpg" />
			</div>
			<div class="carousel-item">
				<img src="elements/img/12.jpg" />
			</div>
			<div class="carousel-item">
				<img src="elements/img/13.jpg" />
			</div>
			<div class="carousel-item">
				<img src="elements/img/14.jpg" />
			</div>
			<div class="carousel-item">
				<img src="elements/img/15.jpg" />
			</div>
			<div class="carousel-item">
				<img src="elements/img/8.jpg" />
			</div>
			<div class="carousel-item">
				<img src="elements/img/9.jpg" />
			</div>
		</div>
		<div class="carousel-nav">
			<button class="next"> &#x276C; </button>
			<button class="prev"> &#x276D; </button>
		</div>
	</div>
	<div class="cac">
		<div class="courses-offered">
			<div class="co-preview"> Courses Offered  </div>
			<div class="co-wrapper">
				<?php
				$logo[0] = "imgs/IS.jpg";
				$logo[1] = "imgs/IT.jpg";
				$logo[2] = "imgs/CS.jpg";
				$logo[3] = "imgs/MIT.jpg";
				$logo[4] = "imgs/LIS.jpg";
				$logo[5] = "imgs/EMC.jpg";
				$courses[0] = "Bachelor of Science in Information System";
				$courses[1] = "Bachelor of Science in Information Technology";
				$courses[2] = "Bachelor of Science in Computer Science";
				$courses[3] = "Masters in Information Technology";
				$courses[4] = "Library Science";
				$courses[5] = "Entertainment Multimedia Computing";
				$course_id[0] = "IS";
				$course_id[1] = "IT";
				$course_id[2] = "CS";
				$course_id[3] = "MIT";
				$course_id[4] = "LIS";
				$course_id[5] = "EMC";
				foreach($courses AS $i => $course){
					?>
					<div class="co-item">
						<div class="coi-icon"> <img src="<?php echo $logo[$i]; ?>" /> </div>
						<div class="coi-text" data-id="<?php echo $course_id[$i];?>"> <?php echo $course; ?>  </div>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>
