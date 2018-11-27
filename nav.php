<?php
$url = basename($_SERVER['PHP_SELF']);
if($url == 'trends.php'){
	$cTrends = "active";
}else{
	$cTrends = "";
}
if($url == 'companies.php'){
	$cJM = "active";
}else{
	$cJM = "";
}
if($url == 'graduates.php'){
	$cGrads = "active";
}else{
	$cGrads = "";
}
if($url == 'profile.php'){
	$cProfile = "active";
}else{
	$cProfile = "";
}
if($url == 'index.php'){
	$cHome = "active";
}else{
	$cHome = "";
}

?>
<nav class="at-navbar">
	<ul class="at-nav-mobile">
		<li>
			<a href="index.php" class="<?php echo $cHome;?>">
				<div class="nav-icon1"> <img src="imgs/home.png" /> </div>
				<div class="nav-txt">Home</div>
			</a>
		</li>
		<li>
			<a href="trends.php" class="<?php echo $cTrends;?>">
				<div class="nav-icon1"> <img src="imgs/trends.png" /> </div>
				<div class="nav-txt">Trends</div>
			</a>
		</li>
		<?php if(isset($_SESSION['admin_id'])){ ?>
		<li>
			<a href="companies.php" class="<?php echo $cJM;?>">
				<div class="nav-icon1"> <img src="imgs/companies.png" /> </div>
				<div class="nav-txt">Companies</div>
			</a>
		</li>
		<?php } ?>
		<li>
			<a href="graduates.php" class="<?php echo $cGrads;?>">
				<div class="nav-icon1"> <img src="imgs/glist.png" /> </div>
				<div class="nav-txt">Alumni List</div>
			</a>
		</li>
		<li>
			<a href="profile.php" class="<?php echo $cProfile;?>">
				<div class="nav-icon1"> <img src="imgs/profile.png" /> </div>
				<div class="nav-txt">Profile</div>
			</a>
		</li>
		<li>
			<a href="logout.php">
				<div class="nav-icon1"> <img src="imgs/logout.png" /> </div>
				<div class="nav-txt">Logout</div>
			</a>
		</li>
	</ul>
	<ul class="at-nav-top">
		<!--
		<li>
			<a href="#" id="showSearchWrapper" title="Click to keep the Search-Box shown. Click again to hide.">
				<span class="glyphicon glyphicon-search"></span>
			</a>
			<div class="search-wrapper">
				<input type="text" id="keyword" placeholder="Enter Keyword..." />
				<button class="btn-search" id="search"> Search </button>
			</div>
		</li>
		!-->
		<li>
			<a href="index.php" class="<?php echo $cHome;?>">
				<div class="nav-icon">
					<img src="imgs/home.png" />
				</div>
			</a>
			<div class="at-nav-item">
				Home
			</div>
		</li>
		<li>
			<a href="trends.php" class="<?php echo $cTrends;?>">
				<div class="nav-icon">
					<img src="imgs/trends.png" />
				</div>
			</a>
			<div class="at-nav-item">
				Trend
			</div>
		</li>
		<?php if(isset($_SESSION['admin_id'])){ ?>
		<li>
			<a href="companies.php" class="<?php echo $cJM;?>">
				<div class="nav-icon">
					<img src="imgs/companies.png" />
				</div>
			</a>
			<div class="at-nav-item">
				Companies
			</div>
		</li>
		<?php } ?>
		<li>
			<a href="graduates.php" class="<?php echo $cGrads;?>">
				<div class="nav-icon">
					<img src="imgs/glist.png" />
				</div>
			</a>
			<div class="at-nav-item">
				Alumni List
			</div>
		</li>
		<li>
			<a href="profile.php" class="<?php echo $cProfile;?>">
				<div class="nav-icon">
					<img src="imgs/profile.png" />
				</div>
			</a>
			<div class="at-nav-item">
				Profile
			</div>
		</li>
		<li>
			<a href="logout.php">
				<div class="nav-icon">
					<img src="imgs/logout.png" />
				</div>
			</a>
			<div class="at-nav-item">
				Logout
			</div>
		</li>
	</ul>
</nav>
