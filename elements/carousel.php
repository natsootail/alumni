<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<script src="jquery-2.1.3.min.js"></script>
	<style>
		.carousel{
			width: 50%;
			margin: 120px auto;
			box-shadow: -5px 5px 5px 2px grey;
			position: relative;
		}
		.carousel-items{
			display: flex;
			flex-flow: row nowrap;
			height: 120px;
			background: #333;
		}
		.carousel-item{
			flex: 1;
//			opacity: 0;
//			transition: .5s;
//			animation: fadeIn .5s linear forwards;
//			transition: .5s ;
//			animation: toRight .3s linear forwards;
		}
		.carousel-item img{
			width: 100%;
			height: 100%;
			border: 2px solid transparent;
			filter: grayscale(.9);
		}
		.carousel-item:hover img{
			border: 2px solid white;
			filter: grayscale(0);
		}
		.carousel-item:first-child,
		.carousel-item:nth-child(5){
			z-index: 0;
		}
		.carousel-item:first-child img,
		.carousel-item:nth-child(5) img{
			transform: scale(.8);
		}
		.carousel-item:nth-child(2),
		.carousel-item:nth-child(4){
			z-index: 1;
		}
		.carousel-item:nth-child(2) img,
		.carousel-item:nth-child(4) img{
			transform: scale(1.5, 1);
		}
		.carousel-item:nth-child(3) img{
			transform: scale(1.5, 1.2);
			filter: grayscale(0);
		}
		.carousel-item:nth-child(3){
			z-index: 2;
		}
		.carousel-item:nth-child(5) ~ .carousel-item img{
			border: none !important;
		}
		.carousel-item:nth-child(5) ~ .carousel-item{
			flex: 0 !important;
		}
		@keyframes toRight{
			0%{
				transform : translateX(-50%);
			}
			100%{
				transform : translateX(0);
			}
		}
		@keyframes fadeIn{
			0%{
				opacity : 0;
			}
			100%{
				opacity : 1;
			}
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
			height: 0;
			display: flex;
			align-items: center;
		}
		button.prev,
		button.next{
			background: none;
			font-size: 50px;
			font-weight: bold;
			color: white;
			position: absolute;
			border: none;
			text-shadow: 0px 0px 5px black;
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
	</style>
	<script>
	jQuery(function($){
		$(document) .ready(function(){
			$('.image-preview').html($('.carousel-item:nth-child(3) img').clone());
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
	});
	</script>
</head>
<body>

<div class="carousel">
	<div class="image-preview"></div>
	<div class="carousel-items">
		<div class="carousel-item">
			<img src="img/dave_why.PNG" />
		</div>
		<div class="carousel-item">
			<img src="img/desert.jpg" />
		</div>
		<div class="carousel-item">
			<img src="img/Koala.jpg" />
		</div>
		<div class="carousel-item">
			<img src="img/Lighthouse.jpg" />
		</div>
		<div class="carousel-item">
			<img src="img/Penguins.jpg" />
		</div>
		<div class="carousel-item">
			<img src="img/Tulips.jpg" />
		</div>
	</div>
	<div class="carousel-nav">
		<button class="next"> &#x276C; </button>
		<button class="prev"> &#x276D; </button>
	</div>
</div>

</body>
</html>