	@extends('loginmaster')
@section('content')	
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<!-- start: Content -->
			<div id="content" class="span10" style="height: 1000px">
	
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Comment</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>User's Comment</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr><th>ID</th>
								  <th>User Name</th>
								  <th>Post ID</th>
								  
								  <th>Comment Body</th>
								
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	<?php
						  	foreach ($allcomment as $userlist) {
						  	 	# code...
						  	 
						  	 ?>
							<tr>
								<td><?php echo $userlist->comment_id  ?></td>
								<td><?php echo $userlist->user_name  ?></td>
								<td><?php echo $userlist->post_id  ?></td>
								<td><?php echo $userlist->comment_body  ?></td>
								
								<td class="center">
									
									<a class="btn btn-danger" href="{{URL::to('/delete_comment',$userlist->comment_id)}}" onclick="return confirm('Are you sure?')">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							<?php } ?>			
				
							
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

			
			<!-- end: Content -->
									@endsection
