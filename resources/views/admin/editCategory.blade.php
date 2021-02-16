@extends('loginmaster')
@section('content')
<div id="content" class="span10" style="height: 1000px">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="">Add</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Category</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>News Category</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						  <h3 style="color:green">
                    <?php
                     $message=Session::get('message');
                     if($message){
                         echo $message;
                         Session::put('message',null);
                     }
                    ?>
                    </h3>
						 {!! Form::open(['url' => '/update_category','method' => 'post']) !!}
						  <fieldset>
							
							
							
							<div class="control-group">
							  <label class="control-label" for="date01">Category Name</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" style="background-color: #578EBE;color:white" name="cat_name" value="<?php echo $all_category_info->cat_name ?>">
								<input type="hidden" class="form-control input-lg" placeholder="Category Name" name="id" value="<?php echo $all_category_info->id ?>" />
							  </div>
							</div>

						         
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Update</button>
							</div>
						  </fieldset>
						  {!! Form::close() !!}   

					</div>
				</div><!--/span-->

			</div><!--/row-->
						@endsection
