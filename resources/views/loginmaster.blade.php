<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>News Blog</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="{{URL::to('public/Admin/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{URL::to('public/Admin/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
	<link id="base-style" href="{{URL::to('public/Admin/css/style.css')}}" rel="stylesheet">
	<link id="base-style-responsive" href="{{URL::to('public/Admin/css/style-responsive.css')}}" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="{{URL::to('public/Admin/img/favicon.ico')}}">
	<!-- end: Favicon -->
	
		
		
		
</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="{{URL::to('/index')}}"><span>Admin Panel</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						
						<!-- start: Notifications Dropdown -->
						
						<!-- end: Notifications Dropdown -->
						<!-- start: Message Dropdown -->
						
						
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> {{Session::get('admin_name')}}
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Account Settings</span>
								</li>
								<li><a href="#"><i class="halflings-icon user"></i> Profile</a></li>
								<li><a href="{{URL::to('/logout')}}"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul  class="nav nav-tabs nav-stacked main-menu" style="margin-top: 35%">
						<li><a href="{{URL::to('/index')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>	
						<li>
							<a class="dropmenu" href=""><i class="icon-folder-close-alt"></i><span class="hidden-tablet">Category</span><span class="label label-important"> 2 </span></a>
							<ul>
								<li><a class="submenu" href="{{URL::to('/addJobCategory')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">Add Category </span></a></li>
								<li><a class="submenu" href="{{URL::to('/viewCategory')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">View All Category </span></a></li>
								
							</ul>	
						</li>
						
						<li>
							<a class="dropmenu" href=""><i class="icon-folder-close-alt"></i><span class="hidden-tablet">News</span><span class="label label-important"> 2 </span></a>
							<ul>
								<li><a class="submenu" href="{{URL::to('/addNews')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">Add News </span></a></li>
								<li><a class="submenu" href="{{URL::to('/viewAllNews')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">View All News </span></a></li>
								
							</ul>	
						</li>
						
						<li>
							<a class="dropmenu" href=""><i class="icon-folder-close-alt"></i><span class="hidden-tablet">Advertisement</span><span class="label label-important"> 2 </span></a>
							<ul>
								<li><a class="submenu" href="{{URL::to('/addAdvertisement')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">Add Advertisement</span></a></li>
								<li><a class="submenu" href="{{URL::to('/viewAllAdvertisement')}}"><i class="icon-file-alt"></i><span class="hidden-tablet">View All</span></a></li>
								
							</ul>	
						</li>
						<li><a href="{{URL::to('/viewallUser')}}"><i class="icon-tasks"></i><span class="hidden-tablet">User</span></a></li>
						<li><a href="{{URL::to('/viewallComment')}}"><i class="icon-tasks"></i><span class="hidden-tablet">Comment</span></a></li>
						
						
							
						
					
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->
			@yield('content')
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>
	
	<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-content">
			<ul class="list-inline item-details">
				<li><a href="http://themifycloud.com">Admin templates</a></li>
				<li><a href="http://themescloud.org">Bootstrap themes</a></li>
			</ul>
		</div>
	</div>
	
	<div class="clearfix"></div>
	
	@yield('footer')