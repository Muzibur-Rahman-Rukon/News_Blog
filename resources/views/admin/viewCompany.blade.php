	@extends('loginmaster')
@section('content')	
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<!-- start: Content -->
			<div id="content" class="span10" style="height:auto;">
	
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">News</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>News Table</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
						  							  
							  <tr>
								  <th>News Title</th>
								  <th>Category</th>
								  <th>Image</th>
								  <th>Description</th>
								 
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  		<?php
        foreach($all_news_info as $v_info){
    ?>
							<tr>
								<td class="center"><?php echo $v_info->news_title ?></td>
								<?php
        foreach($all_cat_info as $v_cat){
        	if ($v_cat->id==$v_info->id) {
        	
    ?>
								<td class="center"><?php echo $v_cat->cat_name ?></td>
							<?php } 
						} ?>
								<td class="center"><img  src="{{ asset($v_info->img) }}" / style="height: 130px;width: 400px">
								</td>
								<td class="center"><?php echo $v_info->news_body ?></td>
								
								
								<td class="center">
									
									<a class="btn btn-info" href="{{URL::to('/edit_news',$v_info->news_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{URL::to('/delete_news',$v_info->news_id)}}" onclick="return confirm('Are you sure?')">
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
