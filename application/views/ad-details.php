<!-- =-=-=-=-=-=-= Light Header End  =-=-=-=-=-=-= -->
      <!-- =-=-=-=-=-=-= Transparent Breadcrumb =-=-=-=-=-=-= -->
      <div class="page-header-area">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="header-page">
                     <h1><?php echo $adverts['title'] ?></h1>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Small Breadcrumb -->
      <div class="small-breadcrumb">
         <div class="container">
            <div class=" breadcrumb-link">
               <ul>
                  <li><a href="<?php echo base_url() ?>">Home</a></li>
                 
                  <li><a class="active" href="#">Ad Detail</a></li>
               </ul>
            </div>
         </div>
      </div>
      <!-- Small Breadcrumb -->
      <!-- =-=-=-=-=-=-= Transparent Breadcrumb End =-=-=-=-=-=-= -->
      <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
      <div class="main-content-area clearfix">
         <?php echo $this->session->flashdata('msg') ?>
         <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
         <section class="section-padding error-page pattern-bgs gray ">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <!-- Middle Content Area -->
                  <div class="col-md-8 col-xs-12 col-sm-12">
                     <!-- Single Ad -->
                     <div class="single-ad">
                        <!-- Title -->
                        <div class="ad-box">
                           <h1><?php echo $adverts['title'] ?></h1>
                           <div class="short-history">
                              <ul>
                                 <li>Posted on: <b><?php $date = strtotime($adverts['ad_date']); ?><?php echo date('j F Y', $date); ?></b></li>
                                 <li>Category: <b><a href="#"><?php echo $adverts['category']; ?></a></b></li>
                                 <li>Location: <b><?php echo $adverts['ad_location']; ?></b></li>
                                 <li>Town: <b><?php echo $adverts['ad_town']; ?></b></li>
                              </ul>
                           </div>
                        </div>
                        <!-- Listing Slider  --> 
                        <div class="flexslider single-page-slider">
                           <div class="flex-viewport ">
                              <ul class="slides slide-main slide-img">
                                 
                                 <li class="flex-active-slide"><img alt="" src="<?=base_url().'uploads/'.$adverts['pic1']?>" title=""></li>
                                 
                                 <?php if( !empty($pix) ) { ?>
                                 <?php foreach ($pix as $row){ ?>
                                 <li><img alt="" src="<?=base_url().'uploads/'.$row['image']?>" title=""></li>
                                 
                                  <?php }} ?>
                              </ul>
                           </div>
                        </div>
                        <!-- Listing Slider Thumb --> 
                        <div class="flexslider" id="carousels">
                           <div class="flex-viewport">
                              <ul class="slides slide-thumbnail">
                                 
                                 <li class="flex-active-slide"><img alt="" draggable="false" src="<?=base_url().'uploads/'.$adverts['pic1']?>"> </li>
                                 <?php if( !empty($pix) ) { ?>
                                  <?php foreach ($pix as $row){ ?>
                                 <li class="thumb-img"><img alt="" draggable="false" src="<?=base_url().'uploads/'.$row['image']?>"></li>
                                 

                                 <?php }} ?>
                                 <!-- items mirrored twice, total of 12 -->
                              </ul>
                           </div>
                        </div>
                        <!-- Share Ad  --> 
                        <div class="ad-share text-center">
                           <div data-toggle="modal" data-target=".share-ad" class="ad-box col-md-4 col-sm-4 col-xs-12">
                              <i class="fa fa-share-alt"></i> <span class="hidetext">Share</span>
                           </div>
                           <?php if ($this->session->userdata('user_id') == TRUE) {?>

                           <a class="ad-box col-md-4 col-sm-4 col-xs-12" href="<?php echo base_url() ?>adverts/add-fav/<?php echo $adverts['slug'] ?>/<?php echo $adverts['post_id'] ?>"><i class="fa fa-star active"></i> <span class="hidetext">Add to Favourites</span></a>

                           <?php }else{ ?>

                              <a class="ad-box col-md-4 col-sm-4 col-xs-12" ><i class="fa fa-star active"></i> <span class="hidetext">Add to Favourites</span></a>

                           <?php } ?>

                           <?php if ($this->session->userdata('user_id') == TRUE) {?>

                           <div data-target=".report-quote" data-toggle="modal" class="ad-box col-md-4 col-sm-4 col-xs-12">
                              <i class="fa fa-warning"></i> <span class="hidetext">Report</span>
                           </div>

                        <?php }else{ ?>

                           <div data-target=".report-quote"  class="ad-box col-md-4 col-sm-4 col-xs-12">
                              <i class="fa fa-warning"></i> <span class="hidetext">Report</span>
                           </div>

                        <?php } ?>
                        </div>
                        <div class="clearfix"></div>
                        <!-- Short Description  --> 
                        <div class="ad-box">
                           <div class="short-features">
                              <!-- Heading Area -->
                              <div class="heading-panel">
                                 <h3 class="main-title text-left">
                                    Description 
                                 </h3>
                              </div>
                              <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                 <span><strong>Condition</strong> :</span> <?php echo $adverts['conditions']; ?>
                              </div>
                              <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                 <span><strong>Category</strong> :</span> <?php echo $adverts['category']; ?>
                              </div>
                              <div class="col-sm-4 col-md-4 col-xs-12 no-padding">
                                 <span><strong>Sub Category</strong> :</span> <?php echo $adverts['sub_category']; ?>
                              </div>
                             
                           </div>
                           <!-- Short Features  --> 
                           <div class="desc-points">
                              <?php echo $adverts['description']; ?>
                           </div>
                           <!-- Related Image  --> 
                          
                        
                           <div class="clearfix"></div>
                        </div>
                     </div>
                     <!-- Single Ad End --> 
           
                     <!-- Price Alert End --> 
                     <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
                     <div class="grid-panel margin-top-30">
                        <div class="heading-panel">
                           <div class="col-xs-12 col-md-12 col-sm-12">
                              <h3 class="main-title text-left">
                                 Featured Ads
                              </h3>
                           </div>
                        </div>
                        <!-- Ads Archive -->
                        <div class="posts-masonry">
                           <div class="col-md-12 col-xs-12 col-sm-12">
                              <!-- Ads Listing -->

                              <?php if( !empty($featured) ) { ?>
                              <?php foreach ($featured as $row1){ ?>

                              <div class="ads-list-archive">
                                 <!-- Image Block -->
                                 <div class="col-lg-5 col-md-5 col-sm-5 no-padding">
                                    <!-- Img Block -->
                                    <div class="ad-archive-img">
                                       <a href="<?php echo base_url('adverts/ad-details/'.$row1['slug']); ?>">
                                          <div class="ribbon popular"></div>
                                          <img class="img-responsive" src="<?=base_url().'uploads/'.$row1['pic1']?>" alt=""> 
                                       </a>
                                    </div>
                                    <!-- Img Block -->
                                 </div>
                                 <!-- Ads Listing -->
                                 <div class="clearfix visible-xs-block"></div>
                                 <!-- Content Block -->
                                 <div class="col-lg-7 col-md-7 col-sm-7 no-padding">
                                    <!-- Ad Desc -->
                                    <div class="ad-archive-desc">
                                       <!-- Price -->
                                       <div class="ad-price"><?php $number = $row1['price']   ?>
                                     €<?php echo $english_format_number = number_format($number); ?></div>
                                       <!-- Title -->
                                       <a href="<?php echo base_url('adverts/ad-details/'.$row1['slug']); ?>">
                                       <h3><?php echo $row1['title']; ?> </h3></a>
                                       <!-- Category -->
                                       <div class="category-title"> <span><a href="#"><?php echo $row1['category']; ?></a></span> </div>
                                       <!-- Short Description -->
                                       <div class="clearfix visible-xs-block"></div>
                                       <p class="hidden-sm"><?php echo $row1['description']; ?></p>
                                       <!-- Ad Features -->
                                       
                                       <!-- Ad History -->
                                       <div class="clearfix archive-history">
                                          <div class="last-updated">Last Updated: <?php $date = strtotime($row1['ad_date']); ?><?php echo date('j F Y', $date); ?></div>
                                          <div class="ad-meta"> 

                                            <?php if ($this->session->userdata('user_id') == TRUE) {?>  
                                             <a href="<?php echo base_url() ?>adverts/add-fav/<?php echo $row1['slug'] ?>/<?php echo $row1['post_id'] ?>" class="btn save-ad"><i class="fa fa-heart-o"></i> Save Ad.</a>
                                          <?php }else{ ?>
                                             <a class="btn save-ad"><i class="fa fa-heart-o"></i> Save Ad.</a>
                                          <?php } ?>

                                           <a href="<?php echo base_url('adverts/ad-details/'.$row1['slug']); ?>" class="btn btn-success"><i class="fa fa-phone"></i> View Details.</a> </div>
                                       </div>
                                    </div>
                                    <!-- Ad Desc End -->
                                 </div>
                                 <!-- Content Block End -->
                              </div>

                            <?php }} ?>



                            
                           
                             
                           </div>
                        </div>
                     </div>
                     <!-- =-=-=-=-=-=-= Latest Ads End =-=-=-=-=-=-= -->
                  </div>
                  <!-- Right Sidebar -->
                  <div class="col-md-4 col-xs-12 col-sm-12">
                     <!-- Sidebar Widgets -->
                     <div class="sidebar">
                        <!-- Contact info -->

                     <?php if ($this->session->userdata('user_id') == TRUE) {?>

                        <div class="contact white-bg">
                           <!-- Email Button trigger modal -->
                           <a href="<?php echo base_url('message/message/'.$adverts['user_id'].'/'.$adverts['post_id']); ?>"><button class="btn-block btn-contact contactEmail"  >Contact Seller</button> </a>
                           <!-- Email Modal -->
                           <a href=""><button class="btn-block btn-contact contactPhone number" ><span><?php echo $adverts['phone']; ?></span></button></a>
                        </div>
                     <?php } else { ?>

                        <div class="contact white-bg">
                           <!-- Email Button trigger modal -->
                           <a href="<?php echo base_url('message/message/'.$adverts['user_id'].'/'.$adverts['post_id']); ?>"><button class="btn-block btn-contact contactEmail"  >Contact Seller</button> </a>
                           <!-- Email Modal -->
                           <button class="btn-block btn-contact contactPhone number" data-toggle="tooltip" data-placement="top" title="" data-original-title="Signup/Login to view number" data-last="111111X" >080<span>XXXXXXXX</span></button>
                        </div>


                     <?php } ?>

                        <!-- Price info block -->   
                        <div class="ad-listing-price">
                           <p><?php $number = $adverts['price']   ?>
    €<?php echo $english_format_number = number_format($number); ?></p>
                        </div>
                        <!-- User Info -->
                        <div class="white-bg user-contact-info">
                           <div class="user-info-card">
                              <div class="user-photo col-md-4 col-sm-3  col-xs-4">
                                 <img src="images/users/3.jpg" alt="">
                              </div>
                              <div class="user-information no-padding col-md-8 col-sm-9 col-xs-8">
                                 <span class="user-name"><a class="hover-color" href="profile.html"><?php echo $adverts['name']; ?></a></span>
                                 <div class="item-date">
                                    <span class="ad-pub">Published on: <?php $date = strtotime($adverts['ad_date']); ?><?php echo date('j F Y', $date); ?></span><br>
                                    <a href="#" class="link">More Ads</a>
                                 </div>
                              </div>
                              <div class="clearfix"></div>
                           </div>
                           <div class="ad-listing-meta">
                              <ul>
                                 <li>Ad Id: <span class="color"><?php echo $adverts['post_id']; ?></span></li>
                                 <li>Categories: <span class="color"><?php echo $adverts['sub_category']; ?></span></li>
                                 <li>Views: <span class="color"><?php echo $adverts['views']; ?></span></li>
                                 <li>Location: <span class="color"><?php echo $adverts['ad_location']; ?></span></li>
                              </ul>
                           </div>
                           
                        </div>
                     

                    

                        <!-- Recent Ads --> 
                        <div class="widget">
                           <div class="widget-heading">
                              <h4 class="panel-title"><a>Recent Ads</a></h4>
                           </div>
                           <div class="widget-content recent-ads">
                              <!-- Ads -->

                              <?php if( !empty($recent_ads) ) { ?>
                              <?php foreach ($recent_ads as $row2){ ?>

                              <div class="recent-ads-list">
                                 <div class="recent-ads-container">
                                    <div class="recent-ads-list-image">
                                       <a href="<?php echo base_url('adverts/ad-details/'.$row2['slug']); ?>" class="recent-ads-list-image-inner">
                                       <img src="<?=base_url().'uploads/'.$row2['pic1']?>" alt="">
                                       </a><!-- /.recent-ads-list-image-inner -->
                                    </div>
                                    <!-- /.recent-ads-list-image -->
                                    <div class="recent-ads-list-content">
                                       <h3 class="recent-ads-list-title">
                                          <a href="<?php echo base_url('adverts/ad-details/'.$row2['slug']); ?>"><?php echo $row2['title']; ?></a>
                                       </h3>
                                       <ul class="recent-ads-list-location">
                                          <li><a href="#"><?php echo $row2['category']; ?></a></li>
                                          
                                       </ul>
                                       <div class="recent-ads-list-price">
                                          <?php $number = $row2['price']   ?>
    €<?php echo $english_format_number = number_format($number); ?>
                                       </div>
                                       <!-- /.recent-ads-list-price -->
                                    </div>
                                    <!-- /.recent-ads-list-content -->
                                 </div>
                                 <!-- /.recent-ads-container -->
                              </div>

                              <?php }} ?>
                    
                           </div>
                        </div>
                        <!-- Saftey Tips  --> 
                        <div class="widget">
                           <div class="widget-heading">
                              <h4 class="panel-title"><a>Safety tips for deal</a></h4>
                           </div>
                           <div class="widget-content saftey">
                              <ol>
                                 <li>Use a safe location to meet seller</li>
                                 <li>Avoid bank transactions</li>
                                 <li>Beware of unrealistic offers</li>
                              </ol>
                           </div>
                        </div>
                     </div>
                     <!-- Sidebar Widgets End -->
                  </div>
                  <!-- Middle Content Area  End -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
         <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->




<!-- =-=-=-=-=-=-= Share Modal =-=-=-=-=-=-= -->
      <div class="modal fade share-ad" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                  <h3 class="modal-title">Share</h3>
               </div>
               <div class="modal-body">
                  <div class="recent-ads">
                     <div class="recent-ads-list">
                        <div class="recent-ads-container">
                           <div class="recent-ads-list-image">
                              <a href="#" class="recent-ads-list-image-inner">
                              <img src="<?=base_url().'uploads/'.$adverts['pic1']?>" alt="">
                              </a><!-- /.recent-ads-list-image-inner -->
                           </div>
                           <!-- /.recent-ads-list-image -->
                           <div class="recent-ads-list-content">
                              <h3 class="recent-ads-list-title">
                                 <a href="#"><?php echo $adverts['title'] ?></a>
                              </h3>
                              <ul class="recent-ads-list-location">
                                 <li><a href="#"><?php echo $adverts['ad_location'] ?></a></li>
                                
                              </ul>
                              <div class="recent-ads-list-price">
                                <?php $number = $adverts['price']   ?>
    €<?php echo $english_format_number = number_format($number); ?>
                              </div>
                              <!-- /.recent-ads-list-price -->
                           </div>
                           <!-- /.recent-ads-list-content -->
                        </div>
                        <!-- /.recent-ads-container -->
                     </div>
                  </div>
                  <h3>Key Features</h3>
                  <p><?php echo $adverts['description'] ?></p>
                  <h3>Link</h3>
                  <p><a href="<?php echo base_url('adverts/ad-details/'.$adverts['slug']); ?>"><?php echo base_url('adverts/ad-details/'.$adverts['slug']); ?></a></p>
               </div>
               <div class="modal-footer">

                  <a href="http://www.facebook.com/sharer.php?u=<?php echo current_url(); ?>" class="btn btn-fb btn-md" target="_blank"><i class="fa fa-facebook"></i></a>
                  <a href="https://twitter.com/share?url=<?php echo current_url(); ?>/&amp;text=<?php echo $adverts['title'] ?>&amp;hashtags=Yudala" class="btn btn-twitter btn-md" target="_blank"><i class="fa fa-twitter"></i></a>
                  <a href="https://plus.google.com/share?url=<?php echo current_url(); ?>" class="btn btn-gplus btn-md" target="_blank"><i class="fa fa-google-plus"></i></a>
               </div>
            </div>
         </div>
      </div>



      <!-- =-=-=-=-=-=-= Report Ad Modal =-=-=-=-=-=-= -->
      <div class="modal fade report-quote" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                  <h3 class="modal-title">Why are you reporting this ad?</h3>
               </div>
               <div class="modal-body">
                  <!-- content goes here -->
                  <form action="<?php echo base_url(); ?>adverts/report" method="post" enctype="multipart/form-data">
                     <div class="skin-minimal">
                        <div class="form-group col-md-6 col-sm-6">
                           <ul class="list">
                              <li >
                                 <input type="radio" id="spam" name="reason" value="Spam">
                                 <label for="spam">Spam</label>
                              </li>
                              <li>
                                 <input  type="radio" id="duplicated" name="reason" value="Duplicated" >
                                 <label for="duplicated">Duplicated</label>
                              </li>
                           </ul>
                        </div>
                        <div class="form-group  col-md-6 col-sm-6">
                           <ul class="list">
                              <li >
                                 <input  type="radio" id="offensive" name="reason" value="Offensive">
                                 <label for="offensive">Offensive</label>
                              </li>
                              <li>
                                 <input  type="radio" id="expired" name="reason" value="Expired" checked>
                                 <label for="expired">Expired</label>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <div class="form-group  col-md-12 col-sm-12">
                        <label>Comments</label>
                        <textarea name="comment" placeholder="This ad not belong to me" rows="3" class="form-control">This ad not belong to me</textarea>
                     </div>
                     <input type="hidden" name="post_id" value="<?php echo $adverts['post_id'] ?>">
                     <input type="hidden" name="slug" value="<?php echo $adverts['slug'] ?>">
                     
                     <div class="clearfix"></div>
                     <div class="col-md-12 col-sm-12 margin-bottom-20 margin-top-20">
                        <button type="submit" class="btn btn-theme btn-block">Submit</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>