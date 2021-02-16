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
					<a href="#">Advertisement</a>
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
						<h3 style="color:green">
                    <?php
                     $message=Session::get('message');
                     if($message){
                         echo $message;
                         Session::put('message',null);
                     }
                    ?>
                    </h3>
						{!! Form::open(['url' => '/save_advertisement','method' => 'post','enctype'=>'multipart/form-data']) !!}
						  <fieldset>

						 
							
							
							<div class="control-group">
							  <label class="control-label" for="date01">Company/Person Name</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="company_name" style="background-color: #578EBE;color:white">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="date01">Contract Number</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="contract" style="background-color: #578EBE;color:white">
							  </div>
							</div>
							
							
							
							

							<div class="control-group">
							  <label class="control-label" for="fileInput">Image</label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file" name="img">
							  </div>
							</div>          
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Post</button>
							</div>
						  </fieldset>
						{!! Form::close() !!}

					</div>
				</div><!--/span-->

			</div><!--/row-->
						@endsection
