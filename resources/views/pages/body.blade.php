 @extends('master')
@section('body')


 <div class="top-news">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 tn-left">
                        <div class="row tn-slider">
                            <?php 
                             
                             foreach ($best_two_slide as $slide) {
                                 # code...
                             

                             ?>
                            <div class="col-md-6">
                                <div class="tn-img">
                                    <img src="{{ asset($slide->img) }}" / style="height: 450px;width: 350px">
                                    <div class="tn-title">
                                        <a href="{{URL::to('/page_by_newsId',$slide->news_id )}}"><?php echo $slide->news_title ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                           
                        </div>
                    </div>
                    <div class="col-md-6 tn-right">
                        <div class="row">
                            <?php 
                              foreach ($randon_four_image as $fourImage) {
                                  # code...
                              
                             ?>
                            <div class="col-md-6">
                                <div class="tn-img">
                                    <img src="{{ asset($fourImage->img) }}" style="height: 225px;width: 223px" >
                                    <div class="tn-title">
                                        <a href="{{URL::to('/page_by_newsId',$fourImage->news_id )}}"><?php echo $fourImage->news_title ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                           
                           
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top News End-->

        <!-- Category News Start-->
         <?php 
                         $i=0;
                         $four_active_category = (array) $four_active_category;
                         foreach ($four_active_category as $four_active_cat) {
                             # code...
                         

                         ?>
        <div class="cat-news">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-6">

                        <h2><?php echo $four_active_cat[$i]->cat_name ?></h2>
                        <div class="row cn-slider">
                                                             <?php 
                                 foreach ($allNews as $allNe) {
                                   if ($four_active_cat[$i]->id==$allNe->id) {
                                       # code...
                                   
                                 
                                 ?>
                            <div class="col-md-6">

                                <div class="cn-img">
                                    <img src="{{ asset($allNe->img) }}" / style="height: 350px;width: 223px">
                                    <div class="cn-title">
                                        <a href="{{URL::to('/page_by_newsId',$allNe->news_id )}}"><?php echo $allNe->news_title ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php 
                             }
                    } ?>
                           
                            
                            
                        </div>
                    </div>
              
                    <div class="col-md-6">
                        <h2><?php
                         $i++;
                         echo $four_active_cat[$i]->cat_name ?></h2>
                        <div class="row cn-slider">
                                                            <?php 
                                 foreach ($allNews as $allNe) {
                                   if ($four_active_cat[$i]->id==$allNe->id) {
                                       # code...
                                   
                                 
                                 ?>
                            <div class="col-md-6">

                                <div class="cn-img">
                                    <img src="{{ asset($allNe->img) }}" / style="height: 350px;width: 223px">
                                    <div class="cn-title">
                                        <a href="{{URL::to('/page_by_newsId',$allNe->news_id )}}"><?php echo $allNe->news_title ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php 
                             }
                    } ?>
                           
                            
                            
                        </div>
                    </div>
                     <div class="col-md-6">
                        <h2><?php
                         $i++;
                         echo $four_active_cat[$i]->cat_name ?></h2>
                        <div class="row cn-slider">
                                                            <?php 
                                 foreach ($allNews as $allNe) {
                                   if ($four_active_cat[$i]->id==$allNe->id) {
                                       # code...
                                   
                                 
                                 ?>
                            <div class="col-md-6">

                                <div class="cn-img">
                                    <img src="{{ asset($allNe->img) }}" / style="height: 350px;width: 223px">
                                    <div class="cn-title">
                                        <a href="{{URL::to('/page_by_newsId',$allNe->news_id )}}"><?php echo $allNe->news_title ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php 
                             }
                    } ?>
                           
                           
                           
                        </div>
                    </div>
                     <div class="col-md-6">
                        <h2><?php
                         $i++;
                         echo $four_active_cat[$i]->cat_name ?></h2>
                        <div class="row cn-slider">
                                                            <?php 
                                 foreach ($allNews as $allNe) {
                                   if ($four_active_cat[$i]->id==$allNe->id) {
                                       # code...
                                   
                                 
                                 ?>
                            <div class="col-md-6">

                                <div class="cn-img">
                                    <img src="{{ asset($allNe->img) }}" / style="height: 350px;width: 223px">
                                    <div class="cn-title">
                                        <a href="{{URL::to('/page_by_newsId',$allNe->news_id )}}"><?php echo $allNe->news_title ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php 
                             }
                    } ?>
                           
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category News End-->
          <?php } ?>

        <!-- Category News Start-->
        
        <!-- Category News End-->
        
        <!-- Tab News Start-->
        <div class="tab-news">
            <div class="container">
                <div class="row">
                    
                    
                    <div class="col-md-12">
                        <ul class="nav nav-pills nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#m-viewed">আলোচিত খবর</a>
                            </li>
                           
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#m-recent">সর্বশেষ খবর</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="m-viewed" class="container tab-pane active">
                                <?php
                                foreach ($commonPost as $CP) {
                                     # code...
                                 foreach ($allNews as $allnews) {
                                    if ($allnews->news_id==$CP->post_id) {
                                        # code...
                                    
                                 
                                 ?>
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="{{ asset($allnews->img) }}" / style="height: 100px;width: 130px">
                                    </div>
                                    <div class="tn-title">
                                        <a href=""><?php echo $allnews->news_title ?></a>
                                    </div>
                                </div>
                            <?php  } 
                        }
                        } ?>
                               
                                
                            </div>
                      
                            <div id="m-recent" class="container tab-pane fade">
                                <?php
                                foreach ($lastThreeeRecord as $last3) {
                                     # code...
                                  
                                 ?>
                                <div class="tn-news">
                                    <div class="tn-img">
                                        <img src="{{ asset($last3->img) }}" / style="height: 100px;width: 130px">
                                    </div>
                                    <div class="tn-title">
                                        <a href=""><?php echo $last3->news_title ?></a>
                                    </div>
                                </div>
                            <?php } ?>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tab News Start-->

        <!-- Main News Start-->
        <div class="main-news">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row">
                            <?php 
                            
                            foreach ($allNews as $displayAll) {
                                # code...
                            

                             ?>
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="{{ asset($displayAll->img) }}" / style="height: 350px;width: 223px">
                                    <div class="mn-title">
                                        <a href="{{URL::to('/page_by_newsId',$displayAll->news_id )}}"><?php echo $displayAll->news_title ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                            
                           
                  
                        
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="mn-list">
                            <h2>আরো পড়ুন</h2>
                            <ul>
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