 

 <div class="small-breadcrumb">
         <div class="container">
            <div class=" breadcrumb-link">
               <ul>
                  <li><a href="<?php echo base_url() ?>">Home</a></li>
                  
                  <li><a href="<?php echo base_url() ?>account/index">Profile</a></li>
                  <li><a class="active" href="<?php echo base_url() ?>post/my-ads">Active Ads</a></li>
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
                  <div class="col-md-3 col-sm-12 col-xs-12 leftbar-stick blog-sidebar">
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
                           <li  class="active"><a href="<?php echo base_url() ?>post/my-ads">My Ads <span class="badge"><?php echo $total_ad ?></span></a></li>
                           <li><a href="<?php echo base_url() ?>post/fav-ads">Favourite Ads <span class="badge"><?php echo $fav_ads ?></span></a></li>
                           <li><a href="<?php echo base_url() ?>post/sold-ads">Sold Ads <span class="badge"><?php echo $sold_ads ?></span></a></li>
                          
                           <li ><a href="<?php echo base_url() ?>message/inbox">Messages</a></li>
                           <li><a href="<?php echo base_url() ?>account/logout">Logout</a></li>
                        </ul>
                     </div>
                     <!-- Categories --> 
                 
                  </div>
                  <div class="col-md-9 col-sm-12 col-xs-12">
                     <!-- Row -->
                     <div class="row no-gutter">
                        <?php echo  $this->session->flashdata('msg') ?>
                        <!-- Sorting Filters -->
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                           <!-- Sorting Filters Breadcrumb -->
                           <!-- Sorting Filters Breadcrumb End -->
                        </div>
                        <!-- Sorting Filters End-->
                        <div class="clearfix"></div>
                        <!-- Ads Archive -->
                        <div class="posts-masonry">
                          <?php if( !empty($advert) ) {
                           foreach($advert as $row) { ?>  

                           <!-- Listing Ad Grid -->
                           <div class="col-md-4 col-lg-4 col-sm-4 col-xs-6 post-box3">
                              <div class="white category-grid-box-1 featured-img">
                                 <!-- Image Box -->
                                 <div class="image"> <img alt="Tour Package" src="<?=base_url().'uploads/'.$row['pic1']?>" > </div>
                                 <!-- Short Description -->
                                 <div class="short-description-1 ">
                                    <!-- Category Title -->
                                    <div class="category-title"> <span><a href="#"><?php echo $row['category'] ?></a></span> </div>
                                    <!-- Ad Title -->
                                    <h3>
                                       <a title="" href="<?php echo base_url('adverts/ad-details/'.$row['slug']); ?>"><?php echo $row['title'] ?></a>
                                    </h3>
                                    <!-- Location -->
                                    <p class="location"><i class="fa fa-map-marker"></i> <?php echo $user['location'] ?></p>
                                    <!-- Rating -->
                                    <div class="rating">
                                      <ul >
                                       
                                       <li> <i class="fa fa-clock-o"></i>  <?php $date = strtotime($row['ad_date']); ?><?php echo date('j F Y', $date); ?> </li>
                                    </ul>
                                      
                                    </div>
                                     <!-- Price --><span class="ad-price"><?php $number = $row['price']   ?>
                      €<?php echo $english_format_number = number_format($number); ?></span> 
                                 </div>
                                 <!-- Ad Meta Stats -->
                                 <div class="ad-info-1">
                                    <ul class="pull-left">
                                       <li> <i class="fa fa-eye"></i><a href="#"><?php echo $row['views'] ?> Views</a> </li>
                                       
                                    </ul>
                                    <ul class="pull-right">
                                       <li> <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit this Ad" href="<?php echo base_url() ?>post/edit-ad/<?php echo $row['post_id'] ?>"><i class="fa fa-pencil edit"></i></a> </li>

                                       <li> <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Mark Ad Sold" href="<?php echo base_url() ?>post/mark-sold/<?php echo $row['post_id'] ?>"><i class="fa fa-check Mark Sold"></i></a> </li>

                                       <li> <a  data-toggle="tooltip" data-placement="top" title="" onclick="return confirm(' you want to delete?');" data-original-title="Delete Ad" href="<?php echo base_url() ?>post/delete-ad/<?php echo $row['post_id'] ?>"><i class="fa fa-times delete"></i></a></li>
                                    </ul>
                                 </div>
                              </div>
                           </div>

                         <?php }} ?>
                           <!-- Listing Ad Grid -->
                
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

   