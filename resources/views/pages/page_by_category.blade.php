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
                            <div class="col-md-4">
                                <div class="mn-img">
                                    <img src="{{ asset($displayAll->img) }}" / style="height: 350px;width: 223px">
                                    <div class="mn-title">
                                        <center> 
                                    <h2></h2>
                                        </center>
                                        <a href="{{URL::to('/page_by_newsId',$displayAll->news_id )}}"><?php echo $displayAll->news_title ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                            
                           
                  
                        
                        </div>
                    </div>

                    <div class="col-lg-3" >
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