 <!-- Small Breadcrumb -->
      <div class="small-breadcrumb">
         <div class="container">
            <div class=" breadcrumb-link">
               <ul>
                  <li><a href="<?php echo base_url() ?>">Home</a></li>
                  
                  <li><a href="<?php echo base_url() ?>account/index">Profile</a></li>
                  <li><a class="active" href="<?php echo base_url() ?>post/fav-ads">Favourite Ads</a></li>
               </ul>
            </div>
         </div>
      </div>
      <!-- Small Breadcrumb -->
      <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
      <div class="main-content-area clearfix">
         <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
         <section class="section-padding gray">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <!-- Middle Content Area -->
                  <div class="col-md-4 col-sm-12 col-xs-12 leftbar-stick blog-sidebar">
                     <!-- Sidebar Widgets -->
                    <div class="user-profile">
                       <?php if($user['picture']==''){ ?>
                        <a href="<?php echo base_url() ?>account/index"><img src="<?php echo base_url() ?>assets/images/users/9.jpg" alt=""></a>
                        <?php }else{  ?>
                          <a href="<?php echo base_url() ?>account/index"><img src="<?=base_url().'profile/'.$user['picture']?>" alt=""></a>
                        <?php } ?>
                        <div class="profile-detail">
                           <h6><?php echo $user['name'] ?></h6>
                           <ul class="contact-details">
                              <li>
                                 <i class="fa fa-map-marker"></i> <?php echo $user['location'] ?>
                              </li>
                              <li>
                                 <i class="fa fa-envelope"></i><?php echo $user['email'] ?>
                              </li>
                              <li>
                                 <i class="fa fa-phone"></i> <?php echo $user['phone'] ?>
                              </li>
                           </ul>
                        </div>
                        <ul>
                           <li ><a href="<?php echo base_url() ?>account/index">Profile</a></li>
                           <li  ><a href="<?php echo base_url() ?>post/my-ads">My Ads <span class="badge"><?php echo $total_ad ?></span></a></li>
                           <li class="active" ><a href="<?php echo base_url() ?>post/fav-ads">Favourite Ads <span class="badge"><?php echo $fav_ads ?></span></a></li></span></a></li>

                           <li><a href="<?php echo base_url() ?>post/sold-ads">Sold Ads <span class="badge"><?php echo $sold_ads ?></span></a></li>
                          
                           <li ><a href="<?php echo base_url() ?>message/inbox">Messages</a></li>
                           <li><a href="<?php echo base_url() ?>account/logout">Logout</a></li>
                        </ul>
                     </div>
                     <!-- Categories --> 
                     <div class="widget">
                        <div class="widget-heading">
                           <h4 class="panel-title"><a>Change Your Plan</a></h4>
                        </div>
                        <div class="widget-content">
                           <select class=" form-control">
                              <option label="Select Option"></option>
                              <option value="0">Free</option>
                              <option value="1">Premium</option>
                              <option value="2">Featured</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-8 col-sm-12 col-xs-12">
                     <!-- Row -->
                     <div class="row no-gutter">
                        <!-- Sorting Filters -->
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 heading">
                           <!-- Advertisement Panel -->
                           <div class="panel panel-default">
                              <div class="panel-heading" >
                                 <div class="col-md-4 col-sm-4 col-xs-4">
                                    <h4 class="panel-title">
                                       <a>
                                       My Favourite Ads
                                       </a>
                                    </h4>
                                 </div>
                                 <div class="col-md-8 col-sm-4 col-xs-4">
                                    <div class="search-widget pull-right">
                                       <input placeholder="search" type="text">
                                       <button type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- Advertisement Panel End -->
                        </div>
                        <!-- Sorting Filters End-->
                        <div class="clearfix"></div>
                        <!-- Ads Archive -->
                        <div class="posts-masonry">
                           <div class="col-md-12 col-xs-12 col-sm-12 user-archives">
                              <!-- Ads Listing -->

                              <?php if( !empty($advert) ) {
                           foreach($advert as $row) { ?> 

                              <div class="ads-list-archive">
                                 <!-- Image Block -->
                                 <div class="col-lg-3 col-md-3 col-sm-3 no-padding">
                                    <!-- Img Block -->
                                    <div class="ad-archive-img">
                                       <a href="<?php echo base_url('adverts/ad-details/'.$row['slug']); ?>">
                                       <img src="<?=base_url().'uploads/'.$row['pic1']?>" alt="">
                                       </a>
                                    </div>
                                    <!-- Img Block -->   
                                 </div>
                                 <!-- Ads Listing -->    
                                 <div class="clearfix visible-xs-block"></div>
                                 <!-- Content Block -->     
                                 <div class="col-lg-9 col-md-9 col-sm-9 no-padding">
                                    <!-- Ad Desc -->     
                                    <div class="ad-archive-desc">
                                       <!-- Price -->    
                                       <div class="ad-price"><span class="ad-price"><?php $number = $row['price']   ?>
                      €<?php echo $english_format_number = number_format($number); ?></span> </div>
                                       <!-- Title -->    
                                       <h3><?php echo $row['title'] ?></h3>
                                       <!-- Category -->
                                       <div class="category-title"> <span><a href="#"><?php echo $row['category'] ?></a></span> </div>
                                       <!-- Short Description -->
                                       <div class="clearfix visible-xs-block"></div>
                                       <!-- Ad Features -->
                                       <!-- Ad History -->
                                       <div class="clearfix archive-history">
                                          <div class="last-updated">Updated: <?php $date = strtotime($row['fav_date']); ?><?php echo date('j F Y', $date); ?></div>
                                          <div class="ad-meta">
                                             <a href="<?php echo base_url('post/un-fav/'.$row['post_id']); ?>" class="btn save-ad"><i class="fa fa-minus-circle"></i> unfaourite</a>
                                             <a href="<?php echo base_url('adverts/ad-details/'.$row['slug']); ?>" class="btn btn-success"><i class="fa fa-eye"></i> View Details</a>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- Ad Desc End -->     
                                 </div>
                                 <!-- Content Block End --> 
                              </div>
                           <?php }} ?>


                              
                           </div>
                        </div>
                        <!-- Ads Archive End -->  
                        <div class="clearfix"></div>
                        <!-- Pagination -->  
                        <div class="col-md-12 col-xs-12 col-sm-12">
                          <?php echo $this->pagination->create_links(); ?>
                        </div>
                        <!-- Pagination End -->   
                     </div>
                     <!-- Row End -->
                  </div>
                  <!-- Middle Content Area  End -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>