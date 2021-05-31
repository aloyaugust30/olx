 <!-- =-=-=-=-=-=-= Transparent Header =-=-=-=-=-=-= -->
      <!-- =-=-=-=-=-=-= Home Banner 2 =-=-=-=-=-=-= -->
      <div id="banner">
         <div class="container search-box">
            <div class="search-container ">
               <!-- Form -->
               <h2>What are you looking for ?</h2>
               <form action="<?php echo base_url(); ?>adverts/search" method="post" enctype="multipart/form-data">
                  <!-- Search Input -->
                  <div class="col-md-5 col-sm-6 col-xs-12 no-padding">
                     <div class="form-group">
                        <input type="text" class="form-control banner-icon-search" name="search" placeholder="used car, mobiles or looking for house" value="" required=""> 
                     </div>
                  </div>
                  <!-- Search Category -->
                  <div class="col-md-5 col-sm-6 col-xs-12 no-padding">
                     <div class="form-group">
                        <select class="category form-control" name="category" required="">
                           <option label="Select Option"></option>
                           <option value="Vehicles">Vehicles</option>
                           <option value="Mobile Phone & Tablets">Mobile Phone & Tablets</option>
                           <option value="Home, Furniture & Garden">Home, Furniture & Garden</option>
                           <option value="Real Estate">Real Estate</option>
                           <option value="Job & Services">Job & Services</option>
                           <option value="Electronic & Video">Electronic & Video</option>
                           <option value="Animals & Pets">Animals & Pets</option>
                           <option value="Hobbies, Arts & Sports">Hobbies, Arts & Sports</option>
                           <option value="Fashion">Fashion</option>
                           <option value="Others">Others</option>
                        </select>
                     </div>
                  </div>
                 
                  <div class="col-md-2 col-sm-3 col-xs-12 no-padding">
                     <div class="form-group form-action">
                        <input type="submit" name="submit" value="Search" class="btn btn-theme btn-search-submit">
                        
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
    
      <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
 
       


      <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
      <div class="main-content-area clearfix">
         


         


      <section class="custom-padding ">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">

               <!-- Heading Area -->
                  <div class="heading-panel">
                     <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                        <!-- Main Title -->
                        <h1><span class="heading-color"> Categories</span></h1>
                        <!-- Short Description -->
                      
                     </div>
                  </div>
                  <!-- Category Grid  -->
                  <div class="col-md-3 col-xs-3 col-sm-6">
                     <div class="box">
                        
                        <a href="<?php echo base_url() ?>adverts/category/Vehicle"><i class="fa fa-car fa-5x" aria-hidden="true" ></i></a>
                        <h4><a href="<?php echo base_url() ?>adverts/category/Vehicle"> Vehicles</a></h4>
                        <strong><?php echo $vehicles ?> Ads</strong> 
                     </div>
                  </div>
                  <!-- Category Grid  -->
                  <div class="col-md-3 col-xs-3 col-sm-6">
                     <div class="box">
                        <a href="<?php echo base_url() ?>adverts/category/Mobile-Phone-&-Tablets"><i class="fa fa-mobile fa-5x" aria-hidden="true"></i></a>
                        <h4><a href="<?php echo base_url() ?>adverts/category/Mobile-Phone-&-Tablets">Mobile Phone & Tablets</a></h4>
                        <strong><?php echo $mobile ?> Ads</strong> 
                     </div>
                  </div>
                  <!-- Category Grid  -->
                  <div class="col-md-3 col-xs-3 col-sm-6 category-box">
                     <div class="box">
                        <a href="<?php echo base_url() ?>adverts/category/Home,-Furniture-&-Garden"><i class="fa fa-television fa-5x" aria-hidden="true"></i></a>
                        <h4><a href="<?php echo base_url() ?>adverts/category/Home,-Furniture-&-Garden">Home, Furniture & Garden</a></h4>
                        <strong><?php echo $home ?> Ads</strong> 
                     </div>
                  </div>
                  <!-- Category Grid  -->
                  <div class="col-md-3 col-xs-3 col-sm-6">
                     <div class="box">
                        <a href="<?php echo base_url() ?>adverts/category/Real-Estate"><i class="fa fa-home fa-5x" aria-hidden="true"></i></a>
                        <h4><a href="<?php echo base_url() ?>adverts/category/Real-Estate">Real Estate & Rentals</a></h4>
                        <strong><?php echo $estate ?> Ads</strong> 
                     </div>
                  </div>
                  <!-- Category Grid  -->
                  <div class="col-md-3 col-xs-3 col-sm-6">
                     <div class="box">
                        <a href="<?php echo base_url() ?>adverts/category/Jobs-&-Services"><i class="fa fa-briefcase fa-5x" aria-hidden="true"></i></a>
                        <h4><a href="<?php echo base_url() ?>adverts/category/Jobs-&-Services">Job & Services</a></h4>
                        <strong><?php echo $job ?> Ads</strong> 
                     </div>
                  </div>
                  <!-- Category Grid  -->
                  <div class="col-md-3 col-xs-3 col-sm-6">
                     <div class="box">
                        <a href="<?php echo base_url() ?>adverts/category/Electronic-&-Video"><i class="fa fa-laptop fa-5x" aria-hidden="true"></i></a>
                        <h4><a href="<?php echo base_url() ?>adverts/category/Electronic-&-Video">Electronic & Video</a></h4>
                        <strong><?php echo $electronic ?> Ads</strong> 
                     </div>
                  </div>
                  <!-- Category Grid  -->
                  <div class="col-md-3 col-xs-3 col-sm-6">
                     <div class="box">
                        <a href="<?php echo base_url() ?>adverts/category/Animals-&-Pets"><i class="fa fa-paw fa-5x" aria-hidden="true"></i></a>
                        <h4><a href="<?php echo base_url() ?>adverts/category/Animals-&-Pets">Animals & Pets</a></h4>
                        <strong><?php echo $pets ?> Ads</strong> 
                     </div>
                  </div>
                  <!-- Category Grid  -->
                  <div class="col-md-3 col-xs-3 col-sm-6">
                     <div class="box">
                        <a href="<?php echo base_url() ?>adverts/category/Fashion"><i class="fa fa-female fa-5x" aria-hidden="true"></i></a>
                        <h4><a href="<?php echo base_url() ?>adverts/category/Fashion">Fashion & Beauty</a></h4>
                        <strong><?php echo $fashion ?> Ads</strong> 
                     </div>
                  </div>
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
   


       <!-- =-=-=-=-=-=-= Featured Ads =-=-=-=-=-=-= -->
         <section class="custom-padding gray">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <!-- Heading Area -->
                  <div class="heading-panel">
                     <div class="col-xs-12 col-md-12 col-sm-12">
                        <h3 class="main-title text-left">
                           Latest Featured Ads 
                        </h3>
                     </div>
                  </div>
                  <!-- Middle Content Box -->
                  <div class="col-md-12 col-xs-12 col-sm-12">
                     <div class="row no-gutter">
                        <!-- Featured Ad Grid -->
                        <?php foreach ($featured as $featured): ?>  
                        <div class="col-md-3 col-sm-3 col-xs-6 post-box1">
                           <div class="category-grid-box-1">
                              <div class="image featured-img">
                                 <a href="<?php echo base_url('adverts/ad-details/'.$featured['slug']); ?>"><img alt="Tour Package" src="<?=base_url().'uploads/'.$featured['pic1']?>" class="img-responsive"></a>
                                 
                              </div>
                              <div class="short-description-1 clearfix">
                                 <div class="category-title"> <span><a href="#"><?php echo $featured['category']; ?></a></span> </div>
                                 <h3><a title="" href="<?php echo base_url('adverts/ad-details/'.$featured['slug']); ?>">
                                    <?php $string = $featured['title']; ?>



                                    <?php echo $string = character_limiter($string, 20); ?></a></h3> <span class="featured-price"><?php $number = $featured['price']   ?>
    €<?php echo $english_format_number = number_format($number); ?></span>
                              </div>

                              <div class="ad-info-1 more-info">
                                 <ul>
                                    <li> <i class="fa fa-map-marker"></i><a href="#"><?php echo $featured['ad_location']; ?></a> </li>
                                    <li> <i class="fa fa-clock-o"></i><?php $date = strtotime($featured['ad_date']); ?><?php echo date('j F Y', $date); ?> </li>
                                 </ul>
                              </div>
                           </div>
                        </div>

                        <?php endforeach; ?>

                        <!-- Featured Ad Grid -->
                       
                     </div>
                  </div>
                  <!-- Middle Content Box End -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>



         <!-- =-=-=-=-=-=-= Trending Ads =-=-=-=-=-=-= -->
         <section class="custom-padding">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
                <div class="row no-gutter">
                  <!-- Heading Area -->
                  <div class="heading-panel">
                     <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                        <!-- Main Title -->
                        <h1><span class="heading-color"> Latest</span> Listings</h1>
                        <!-- Short Description -->
                       
                     </div>
                  </div>
                  <!-- Middle Content Box -->
                  <div class="col-md-12 col-xs-12 col-sm-12 mo">

               <?php foreach ($adverts as $row): ?>

                     <div class="col-md-3 col-xs-6 col-sm-2 post-box ">
                        <!-- Ad Box -->
                        <div class="category-grid-box">
                           <!-- Ad Img -->
                           <a href="<?php echo base_url('adverts/ad-details/'.$row['slug']); ?>">
                           <div class=" featured-img">
                              <img class="img-responsive" alt="" src="<?=base_url().'uploads/'.$row['pic1']?>">
                              <!-- Ad Status -->
                            
                          
                           </div></a>
                           <!-- Ad Img End -->
                           <div class="short-description">
                              <!-- Ad Category -->
                              <div class="category-title"> <span><a href="#"><?php echo $row['category']; ?></a></span> </div>
                              <!-- Ad Title -->
                              <h3><a title="" href="<?php echo base_url('adverts/ad-details/'.$row['slug']); ?>">
                                 <?php $string1 = $row['title']; ?>
                                 <?php echo $string1 = character_limiter($string1, 15); ?></a></h3>
                              <!-- Price -->
                              <div class="price"><?php $number = $row['price']   ?>
    €<?php echo $english_format_number = number_format($number); ?> <span class="negotiable">(<?php echo $row['price_status']; ?>)</span></div>
                           </div>
                           <!-- Addition Info -->
                           <div class="ad-info">
                              <ul>
                                 <li><i class="fa fa-map-marker"></i><?php echo $row['ad_location']; ?></li>
                                 <li><i class="fa fa-clock-o"></i> <?php $date = strtotime($row['ad_date']); ?><?php echo date('j F Y', $date); ?> </li>
                              </ul>
                           </div>
                        </div>
                        <!-- Ad Box End -->
                     </div>

                      <?php endforeach; ?>

                    
    
                  </div>

                  <!-- Middle Content Box End -->
               </div>
            </div>
            <div class="text-center">
                        <div class="load-more-btn">

                     <a class="btn btn-theme" href="<?php echo base_url('adverts/latest-ads'); ?>"> Load More <i class="fa fa-refresh"></i> </a>
                          
                        </div>

                     </div>
                     <div class="big-space"></div>
            <!-- Main Container End -->
         </section>
         <!-- =-=-=-=-=-=-= Trending Ads End =-=-=-=-=-=-= -->
        
         
