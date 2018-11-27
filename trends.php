<script src="Chartjs/chart.js"></script>
<script src="Chartjs/Chart.bundle.js"></script>
<script src="Chartjs/samples/utils.js"></script>
<style>
canvas{
	-moz-user-select: none;
	-webkit-user-select: none;
	-ms-user-select: none;
}
.canvas-wrapper{
	position: relative;
//	width: 80%;
	margin-top: 80px;
	border: 2px solid white;
	border-width: 2px 0;
}
.canvas-wrapper:nth-of-type(1){
	margin-top: 0;
}
.no-data{
	position: absolute;
	height: 100%;
	width: 100%;
	z-index: 1;
	background: rgba(200,200,200,.5);
	display: flex;
	align-items: center;
	justify-content: center;
}
.no-data p{
	background: rgba(255,255,255,.2);
	padding: 50px;
	border: 5px solid white;
	box-shadow: 0px 0px 5px 1px black inset;
	font-size: 50px;
	font-weight: bold;
	text-align: center;
	transform: rotateZ(-30deg);
}
.trends-wrapper{
	background: url('imgs/some-bg.png') fixed;
	background-repeat: no-repeat;
	background-size: 100%;
}
@media screen and (max-width: 767px){
	.trends-wrapper{
		margin: 0 !important;
		padding: 0;
		background-size: 100% 100%;
		width: 100% !important;
	}
	.no-data p{
		transform: scale(.8);
	}
	img.trends-header{ margin-top: 0; padding: 0; }
}
</style>


<?php
#trends line
include 'header.php';
include 'nav.php';
require 'db.php';
$courses[0] = "Bachelor of Science in Information System";
$courses[1] = "Bachelor of Science in Information Technology";
$courses[2] = "Bachelor of Science in Computer Science";
$courses[3] = "Masters in Information Technology";
$courses[4] = "Library Science";
$courses[5] = "Entertainment Multimedia Computing";
$empStats[0] = "Employed";
$empStats[1] = "Self-Employed";
$empStats[2] = "Unemployed";
?>
<style>
button.btn-filter-trends{
	position: fixed;
	right: 25px;
	top: 38.8%;
	padding: 3px;
	background: #fd6421;
	color: white;
	border: none;
	border-radius: 3px;
	cursor: pointer;
	outline: none;
	width: 55px;
	height: 55px;
}
button.btn-filter-trends span{
	font-size: 31px;
}
.tFilters-wrapper{
	display: none;
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	z-index: 2;
	background: rgba(0,0,0,.5);
}
.tFilters-wrapper.active{
	display: initial;
}
.tFilters{
	width: 40%;
	margin: 0 auto;
	animation: dropFilters .4s linear forwards paused;
	position: relative;
	top: -50%;
	transition: .4s;
	opacity: 0;
	background: #b3b3b3;
	overflow: hidden;
}
.tFilters-wrapper.active .tFilters{
	top: 15%;
	border: 1px solid #b3b3b3;
	box-shadow: -5px 5px 3px 1px black;
	opacity: 1;
}
.tShowns, .tHiddens{
	padding: 5px;
	border-bottom: 2px solid black;
}
.tShowns h4, .tHiddens h4{
	padding: 5px;
	background: #333;
	color: white;
	font-size: 22px;
}
label.tFilter-option{
	cursor: pointer;
}
label.tFilter-option input{
	display: none;
}
label.tFilter-option input + div{
	padding: 8px;
	color: white;
	background: #555;
	margin-left: 20px;
	margin-top: 10px;
	animation: fadeIn .4s linear forwards;
}
@keyframes fadeIn{
	0%{
		z-index: -1;
		opacity: 0;
		transform: translateY(50px) scale(0);
	}
	90%{
		opacity: 1;
		transform: translateY(0) scale(.8);
	}
	100%{
		transform: translateY(0) scale(1);
		z-index: 1;
	}
}

@keyframes fadeOut{
	0%{
		opacity: 1;
		transform: translateY(0) scale(1);
	}
	50%{
		opacity: 0;
		transform: translateY(0px) scale(0.8);
	}
	90%{
		z-index: -1;
		transform: translateY(80px) scale(.5);
	}
	100%{
		transform: translateY(120px) scale(0);
	}
}
button.close-filters{
	position: absolute;
	top: 2px;
	right: 2px;
	font-size: 18px;
	border: none;
	background: none;
	color: black;
	width: 30px;
	height: 30px;
}
.tFilters > h4{
	font-size: 22px;
	padding: 8px;
	border-bottom: 2px solid black;
}
@media only screen and (max-width: 767px){
	button.btn-filter-trends{
		left: 10px;
		top: initial;
		bottom: 20px;
		opacity: .5;
		z-index: 1;
	}
	.tFilters-wrapper{
		overflow: auto;
	}
	.tFilters{
		top: 5%;
		width: 90%;
		margin-bottom: 20px;
	}
	label.tFilter-option input + div{
		margin: 0 auto;
		margin-top: 10px;
	}
}

</style>
<script>
jQuery(function($){

$(document) .on('click','button.btn-filter-trends',function(){
	$('.tFilters-wrapper').addClass('active');
});
$(document) .on('click','button.close-filters',function(){
	$('.tFilters-wrapper').removeClass('active');
});


$(document) .on('change','input#tFilter',function(){
		var isChecked = this.checked;
		var val = $(this).val();
		if(isChecked !== false){
			var dest = '.tShowns';
			$('div[data-id*="'+val+'"]').show();
		}else{
			var dest = '.tHiddens';
			$('div[data-id*="'+val+'"]').hide();
		}
		$(this).next('div').css({
			'animation' : 'fadeOut .4s linear forwards'
		});
		var thisLabel = $(this).parents('label');
		var thisDiv = $(this).next('div');
		setTimeout(function(){
			$(thisDiv).css({
				'animation' : 'fadeIn .4s linear forwards'
			});
			$(thisLabel).appendTo(dest);
		},450);
});
	
});
</script>
<div class="tFilters-wrapper">
	<div class="tFilters">
		<h4> Filters </h4>
		<button class="close-filters">&times;</button>
		<div class="tShowns">
			<h4> Shown </h4>
			<label class="tFilter-option">
				<input type="checkbox" id="tFilter" value="total" checked />
				<div> Total </div>
			</label>
			<label class="tFilter-option">
				<input type="checkbox" id="tFilter" value="trends-employed" checked />
				<div> Employed Alumni </div>
			</label>
			<?php
			foreach($courses AS $course){
				?>
				<label class="tFilter-option">
					<input type="checkbox" id="tFilter" value="<?php echo $course;?>" checked />
					<div> <?php echo $course; ?> </div>
				</label>
				<?php
			}
			?>
		</div>
		<div class="tHiddens">
			<h4> Hidden </h4>
		</div>
	</div>
</div>
<div class="trends-wrapper">
	<img class="trends-header" src="imgs/trend-header.png" />
	<div class="canvas-wrapper" data-id="total">
		<canvas class="others" id="total"></canvas>
	</div>
	<div class="canvas-wrapper" data-id="trends-employed">
		<canvas class="others" id="trends-employed"></canvas>
	</div>
	<?php
	foreach($courses AS $course){
		?>
		<div class="canvas-wrapper" data-id="<?php echo $course;?>">
			<canvas id="<?php echo $course;?>"></canvas>
		</div>
		<?php
	}

	?>
</div>
<button class="btn-filter-trends" id="btn-filter-trends">
	<span class="glyphicon glyphicon-filter"></span>
	Filter
</button>
<script>
jQuery(function($){
	$('canvas#trends-employed') .ready( function(){
		var parelement = $(this).parents('.canvas-wrapper');
		$.ajax({
			'url' : 'trends-by-is-related.php',
			'success' : function(response){
				if(response != " " && response !=""){
					var respo = JSON.parse(response);
					var years = respo.years;
					var related = [];
					var unrelated = [];
					var len = years.length - 1
					related.push(0);
					unrelated.push(0);
					for(var i = years[1]; i <= years[len]; i++){
							related.push(respo[i].related);
							unrelated.push(respo[i].unrelated);
					}
					var tots = respo.tots+" Alumni";
				}else{
					related = 0;
					unrelated = 0;
					$("<div class='no-data'><p>NO DATA</p></div>").prependTo(parelement);
					var tots = "No Alumni Found";
				}
				if(respo.tots == 0 || respo.tots == 'undefined'){
					var tots = "No Alumni Found";
				}
				var config = {
					type : 'line',
					data : {
						labels : years,
						datasets : [{
							label : 'Others',
							backgroundColor: window.chartColors.red,
							borderColor: window.chartColors.red,
							data : unrelated,
							borderDash : [30,20],
							fill : false
						},{
							label : 'IT Related',
							backgroundColor: window.chartColors.green,
							borderColor: window.chartColors.green,
							data : related,
							fill : false
						}],
					},
					options: {
						elements : {
							line : {
								tension : 0.000001
							}
						},
						responsive: true,
						title: {
							display: true,
							text: "Employed Alumni ("+tots+")"
						},
						tooltips: {
							mode: 'index',
							intersect: 'intersect'
						},
						hover: {
							mode: 'nearest',
							intersect: 'intersect'
						},
						scales: {
							xAxes: [{
								display: true,
								scaleLabel: {
									display: true,
									labelString: 'Years'
								}
							}],
							yAxes: [{
								display: true,
								scaleLabel: {
									display: true,
									labelString: 'Number of Alumni'
								},
								ticks : {
									suggestedMax : 10,
							 	}
							}]
						}
					}
				}
				var ctx = document.getElementById('trends-employed').getContext('2d');
				window.myLine = new Chart(ctx, config);
			}
		});
	});
	$('canvas#total') .ready( function(){
		var parelement = $(this).parents('.canvas-wrapper');
		$.ajax({
			'url' : 'trends-by-total.php',
			'success' : function(response){
				if(response != " " && response !=""){
					var respo = JSON.parse(response);
					var tots = respo.tots;
					var years = respo.years;
					var emps = [];
					var unemps = [];
					var len = years.length - 1
					emps.push(0);
					unemps.push(0);
					for(var i = years[1]; i <= years[len]; i++){
							emps.push(respo[i].emps);
							unemps.push(respo[i].unemps);
					}
					if(parseInt(respo.total) > 10){
						var totalAlumni = respo.total;
					}else{
						var totalAlumni = 10;
					}
					var tots = respo.tots+" Alumni";
				}else{
					emps = 0;
					unemps = 0;
					$("<div class='no-data'><p>NO DATA</p></div>").prependTo(parelement);
					var tots = "No Alumni Found";
				}
				var config = {
					type : 'line',
					data : {
						labels : years,
						datasets : [{
							label : 'Unmployed',
							backgroundColor: window.chartColors.red,
							borderColor: window.chartColors.red,
							data : unemps,
							borderDash : [30,20],
							fill : false
						},{
							label : 'Employed',
							backgroundColor: window.chartColors.green,
							borderColor: window.chartColors.green,
							data : emps,
							fill : false
						}],
					},
					options: {
						elements : {
							line : {
								tension : 0.000001
							}
						},
						responsive: true,
						title: {
							display: true,
							text: "Total ("+tots+")"
						},
						tooltips: {
							mode: 'index',
							intersect: 'intersect'
						},
						hover: {
							mode: 'nearest',
							intersect: 'intersect'
						},
						scales: {
							xAxes: [{
								display: true,
								scaleLabel: {
									display: true,
									labelString: 'Years'
								}
							}],
							yAxes: [{
								display: true,
								scaleLabel: {
									display: true,
									labelString: 'Number of Alumni'
								},
								ticks : {
									suggestedMin : 0,
									suggestedMax : 10
								}
							}]
						}
					}
				}
				var ctx = document.getElementById('total').getContext('2d');
				window.myLine = new Chart(ctx, config);
			}
		});
	});
	$('canvas:not(.others)') .each(function(){
		var course = $(this).attr('id');
		var parelement = $(this).parents('.canvas-wrapper');
		$.ajax({
			'type' : 'post',
			'url' : 'trends-by-course.php',
			'data' : {'course' : course},
			'success' : function(response){
				if(response != "" && response != " "){
					var respo = JSON.parse(response);
					var years = respo.years;
					var emps = [];
					var semps = [];
					var unemps = [];
					var len = years.length - 1
					emps.push(0);
					semps.push(0);
					unemps.push(0);
					for(var i = years[1]; i <= years[len]; i++){
							emps.push(respo[i].emps);
							semps.push(respo[i].semps);
							unemps.push(respo[i].unemps);
					}
					var tots = respo.tots+" Alumni";
				}else{
					emps = 0;
					semps = 0;
					unemps = 0;
					$("<div class='no-data'><p>NO DATA</p></div>").prependTo(parelement);
					var tots = "No Alumni Found";
				}
				var config = {
					type : 'line',
					data : {
						labels : years,
						datasets : [{
							label : 'Self-Employed',
							backgroundColor: window.chartColors.purple,
							borderColor: window.chartColors.purple,
							borderDash : [30,20],
							data : semps,
							fill : false
						},{
							label : 'Employed',
							backgroundColor: window.chartColors.green,
							borderColor: window.chartColors.green,
							data : emps,
							fill : false
						},{
							label : 'Unmployed',
							backgroundColor: window.chartColors.red,
							borderColor: window.chartColors.red,
							data : unemps,
							fill : false
						}],
					},
					options: {
						elements : {
							line : {
								tension : 0.000001
							}
						},
						responsive: true,
						title: {
							display: true,
							text: course+" ("+tots+")"
						},
						tooltips: {
							mode: 'index',
							intersect: 'intersect'
						},
						hover: {
							mode: 'nearest',
							intersect: 'intersect'
						},
						scales: {
							xAxes: [{
								display: true,
								scaleLabel: {
									display: true,
									labelString: 'Years'
								}
							}],
							yAxes: [{
								display: true,
								scaleLabel: {
									display: true,
									labelString: 'Number of Alumni'
								},
								ticks : {
									suggestedMin : 0,
									suggestedMax : 10
								}
							}]
						}
					}
				}
					var ctx = document.getElementById(course).getContext('2d');
					window.myLine = new Chart(ctx, config);
				//}
			}
		});
		
	});
	
});
</script>