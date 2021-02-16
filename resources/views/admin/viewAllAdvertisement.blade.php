	@extends('loginmaster')
@section('content')	

			<noscript>
				<div class="alert alert-block span10 con" >
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<!-- start: Content -->
			<div id="content" class="span10" style="height:100vh;">
	
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{URL::to('/index')}}">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Categories</h2>
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
							  	  <th>Number</th>
								  <th>Company Name</th>
								  <th>Contract </th>
								  <th>Image</th>
								  <th>Active Status</th>
								 
								 
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	<?php
        foreach($all_advertisement as $v_category){
    ?>
							<tr>
								<td> <?php
        echo $v_category->ad_id;
    ?></td>
								<td class="center"><?php
        echo $v_category->company_name;
    ?></td>
    <td class="center"><?php
        echo $v_category->contract;
    ?></td>
    <td class="center"><img  src="{{ asset($v_category->img) }}" / style="height: 130px;width: 400px"></td>
     <td class="center">
    	<?php
    	     if ($v_category->active_status==0) {
    	      	# code...
    	     
    	 ?>
    	  <a href="{{URL::to('/make_ad_active',$v_category->ad_id)}}"><button type="button" class="btn btn-danger">Deactive</button></a>
    	<?php }else{ ?>
    		<a href="{{URL::to('/make_ad_deactive',$v_category->ad_id)}}"><button type="button" class="btn btn-success">Active</button></a>
    	<?php } ?>
    </td>
   
    
    <td class="center">
									
									<a class="btn btn-info" href="{{URL::to('/edit_advertisement',$v_category->ad_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{URL::to('/delete_advertisement',$v_category->ad_id)}}" onclick="return confirm('Are you sure?')">
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
