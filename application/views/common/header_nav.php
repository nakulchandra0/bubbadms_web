<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$routename = $this->uri->uri_string();
?>
<nav class="navbar navbar-expand-md navbar-light" id="SecondNav">
	<div class="nav-menu navbar-collapse" id="secondnavbar">
		<ul class="navbar-nav mr-auto ml-auto pt-2 pb-2">
			<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 <?php if($routename == 'dashboard' || $routename == 'inventoryarea' || $routename == 'buyerarea' || $routename == 'math'  || $routename == 'yourdeal'  || $routename == 'startdeal')echo 'active'; ?>">
				<a class="nav-link" href="<?php echo base_url(); ?>dashboard">Dashboard</a>
			</li>
			<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 <?php if($routename == 'dealer' || $routename == 'profile' || $routename == 'detail' || $routename == 'inventory')echo 'active'; ?>">
				<a class="nav-link" href="<?php echo base_url(); ?>dealer">Dealer Settings</a>
			</li>
			<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 <?php if($routename == 'reports')echo 'active'; ?>">
				<a class="nav-link" href="<?php echo base_url(); ?>reports">Reports</a>
			</li>
			<li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4 <?php if($routename == 'upgradeplan')echo 'active'; ?>">
				<a class="nav-link" href="<?php echo base_url(); ?>upgradeplan">Upgrade Plan</a>
			</li>
		</ul>
	</div>
</nav>