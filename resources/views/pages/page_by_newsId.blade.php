  @extends('master')
@section('body')
 <div class="main-news" style="margin-top: 5%">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row">
                             <?php 
                            
                            foreach ($allNews as $displayAll) {
                                # code...
                            

                             ?>
                            <div class="card" style="">
  <img class="card-img-top" src="{{ asset($displayAll->img) }}" alt="Card image cap">
  <center><h2 style="margin-top: 2%" class="card-title"><?php echo $displayAll->news_title ?></h3></center>
  
  <div class="card-body">
    <p class="card-text"><?php echo $displayAll->news_body ?></p>
     <h3 style="margin-top: 2%;margin-bottom: 2%;font-weight: bold;">মন্তব্য</h3>
     <?php 
         foreach ($allCommentByNewsId as $allComment) {
           # code...
         


      ?>
      <ul style="list-style-type: none;"><h4 style="font-weight: italic"><?php echo $allComment->user_name ?></h4>
        <li>
          <h5>  <input type="text" id="lname" name="lname" disabled value="<?php echo $allComment->comment_body ?>">
          </h5>
            
        </li>
      </ul>
      
    <?php } ?>
     <?php 
        
        if (Session::get('user_id')) {
          # code...
        $user_id=Session::get('user_id');
        $user_name=Session::get('user_name');

      ?>
    
     {!! Form::open(['url' => '/postComment','method' => 'post','enctype'=>'multipart/form-data']) !!}

  <div class="form-group">
    <label for="email">আপনার মন্তব্য:</label>
    <input type="text" class="form-control" id="email" name="comment_body">
    <input type="hidden" class="form-control" id="email" value="<?php echo $displayAll->news_id ?>" name="post_id">
    <input type="hidden" class="form-control" id="email" value="<?php echo $user_id ?>" name="user_id">
    <input type="hidden" class="form-control" id="email" value="<?php echo $user_name ?>" name="user_name">
  </div>
 
  
  <button type="submit" class="btn btn-default">পোস্ট করুন</button>
 {!! Form::close() !!}
<?php } ?>
  </div>

</div>
                           
      <?php } ?>                     
                            
                           
                  
                        
                        </div>
                    </div>

                    <div class="col-lg-3" >
                        <div class="mn-list" style="margin-left: 5%">
                            <h2>আরো পড়ুন</h2>
                            <ul >
                                <?php 
                            
                            foreach ($allCat as $aroPorun) {
                                # code...
                            
                                 ?>
                                <li><a href="{{URL::to('/page_by_category',$aroPorun->id)}}"><?php echo $aroPorun->cat_name ?></a></li>
                               
                            <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection