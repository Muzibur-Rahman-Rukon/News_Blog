@extends('loginmaster')
@section('content')
<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="">Add</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">News</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Instant News</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						{!! Form::open(['url' => '/update_ad','method' => 'post','enctype'=>'multipart/form-data']) !!}
						  <fieldset>


						 
							
							
							
							<div class="control-group">
							  <label class="control-label" for="date01">Company Name</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="company_name" style="background-color: #578EBE;color:white"  value="<?php echo $all_advertisement->company_name ?>">


							  </div>
							  <div class="controls">
								<input type="hidden" class="span6 typeahead" name="ad_id"  value="<?php echo $all_advertisement->ad_id ?>">

							  </div>
							</div>
							
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Contract</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="contract" style="background-color: #578EBE;color:white"  value="<?php echo $all_advertisement->contract ?>">
							  </div>
							</div>
							
							

							<div class="control-group">
							  <label class="control-label" for="fileInput">Image</label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file" name="img" value="">
								<input type="hidden" name="prev_image" value="<?php echo $all_advertisement->img ?>">
							  </div>
							</div>          
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Update</button>
							</div>
						
						  </fieldset>

						

					</div>
				</div><!--/span-->

			</div><!--/row-->
						@endsection
