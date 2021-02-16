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
						{!! Form::open(['url' => '/update_news','method' => 'post','enctype'=>'multipart/form-data']) !!}
						  <fieldset>


						 
							<div class="control-group">
							 <label type="text" class="form-control input-lg" placeholder="Publication Status"  value="" />Select Category</label>
							  <div class="controls">
								<select name="id">

								

							<option value="<?php echo $all_news_info->id ?>">
								<?php
                                    
                                    foreach ($all_category_info as $all_cat) {
                                    	if ($all_news_info->id==$all_cat->id) {
                                    		echo $all_cat->cat_name;
                                    	}
                                    }

								 ?>
							</option>
							<?php 
                                 
                                 foreach ($all_category_info as $all_cat) {
                                 	

							 ?>
							 <option value="<?php echo $all_cat->id ?>"><?php echo $all_cat->cat_name ?></option>
							<?php } ?>
							
                              
							</select>
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="date01">News Title</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="news_title" style="background-color: #578EBE;color:white"  value="<?php echo $all_news_info->news_title ?>">


							  </div>
							  <div class="controls">
								<input type="hidden" class="span6 typeahead" name="news_id"  value="<?php echo $all_news_info->news_id ?>">

							  </div>
							</div>
							
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Detail's</label>
							  <div class="controls">
								<textarea  rows="8"  name="news_body" style="background-color: #578EBE;color:white;width: 500px" placeholder="" ><?php echo $all_news_info->news_body ?></textarea>
							  </div>
							</div>
							
							

							<div class="control-group">
							  <label class="control-label" for="fileInput">Image</label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file" name="img" value="">
								<input type="hidden/file" name="prev_image" value="<?php echo $all_news_info->img ?>">
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
