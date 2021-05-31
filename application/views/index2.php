 <!-- =-=-=-=-=-=-= Transparent Header =-=-=-=-=-=-= -->
      <!-- =-=-=-=-=-=-= Home Banner 2 =-=-=-=-=-=-= -->
      <div id="banner">
         <div class="container">
            <div class="search-container">
               <!-- Form -->
               <h2>What are you looking for ?</h2>
               <form action="<?php echo base_url(); ?>advert/search" method="post" enctype="multipart/form-data">
                  <!-- Search Input -->
                  <div class="col-md-4 col-sm-6 col-xs-12 no-padding">
                     <div class="form-group">
                        <input type="text" class="form-control banner-icon-search" name="search" placeholder="used car, mobiles or looking for house" value="" required=""> 
                     </div>
                  </div>
                  <!-- Search Category -->
                  <div class="col-md-3 col-sm-6 col-xs-12 no-padding">
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
                           <option value="Others">Others</option>
                        </select>
                     </div>
                  </div>
                  <!-- Search Location -->
                  <div class="col-md-3 col-sm-9 col-xs-12 no-padding">
                     <div class="form-group">
                        <select name="location" class="category form-control" >
                                    <option label="Select Location"></option>
                                    <option value="Baden-Württemberg">Baden-Württemberg</option>
                                    <option value="Bavaria">Bavaria</option>
                                    <option value="Berlin">Berlin</option>
                                    <option value="Brandenburg">Brandenburg</option>
                                    <option value="Bremen">Bremen</option>
                                    <option value="Hamburg">Hamburg</option>
                                    <option value="Hesse">Hesse</option>
                                    <option value="Lower Saxony">Lower Saxony</option>
                                    <option value="Mecklenburg-Vorpommern">Mecklenburg-Vorpommern</option>
                                    <option value="North Rhine-Westphalia">North Rhine-Westphalia</option>
                                    <option value="Rhineland-Palatinate">Rhineland-Palatinate</option>
                                    <option value="Saarland">Saarland</option>
                                    <option value="Saxony">Saxony</option>
                                    <option value="Saxony-Anhalt">Saxony-Anhalt</option>
                                    <option value="Schleswig-Holstein">Schleswig-Holstein</option>
                                    <option value="Thuringia">Thuringia</option>
                                    
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
         <!-- =-=-=-=-=-=-= Featured Ads =-=-=-=-=-=-= -->
         <section class="custom-padding">
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
                     <div class="row">
                        <!-- Featured Ad Grid -->
                        <?php foreach ($featured as $featured): ?>  
                        <div class="col-md-4 col-sm-6 col-xs-12">
                           <div class="category-grid-box-1">
                              <div class="image featured-img">
                                 <a href="<?php echo base_url('adverts/ad-details/'.$featured['slug']); ?>"><img alt="Tour Package" src="<?=base_url().'uploads/'.$featured['pic1']?>" class="img-responsive"></a>
                                 <div class="price-tag">
                                    <div class="price"><span><?php $number = $featured['price']   ?>
    $<?php echo $english_format_number = number_format($number); ?></span></div>
                                 </div>
                              </div>
                              <div class="short-description-1 clearfix">
                                 <div class="category-title"> <span><a href="#"><?php echo $featured['category']; ?></a></span> </div>
                                 <h3><a title="" href="<?php echo base_url('adverts/ad-details/'.$featured['slug']); ?>"><?php echo $featured['title']; ?></a></h3>
                              </div>
                              <div class="ad-info-1">
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



         
   <section class="section-padding">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <!-- Heading Area -->
                  <div class="heading-panel">
                     <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                         <h1><span class="heading-color"> Categories</span></h1>
                     </div>
                  </div>
                  <!-- Middle Content Box -->
                  <div class="col-md-12 category-blocks">
                     <ul class="popular-categories">
                        <li><a href="<?php echo base_url() ?>adverts/category/Vehicle"><i class="flaticon-transport-9"></i> Cars & Vehicles <span class="count">( <?php echo $vehicles ?> )</span></a></li>
                        <li><a href="<?php echo base_url() ?>adverts/category/Mobile-Phone-&-Tablets"><i class="flaticon-technology-19"></i> Mobiles & Tablets <span class="count">( <?php echo $mobile ?> )</span></a></li>
                        <li><a href="<?php echo base_url() ?>adverts/category/Home,-Furniture-&-Garden"><i class="flaticon-vintage"></i> Home, Furniture & Garden <span class="count">( <?php echo $home ?> )</span></a></li>
                        <li><a href="<?php echo base_url() ?>adverts/category/Real-Estate"><i class="flaticon-home-1"></i> Real Estate <span class="count">( <?php echo $estate ?> )</span></a></li>
                        <li><a href="<?php echo base_url() ?>adverts/category/Jobs-&-Services"><i class="flaticon-cleaning"></i> Job & Services <span class="count">( <?php echo $job ?> )</span></a></li>
                        
                        <li><a href="<?php echo base_url() ?>adverts/category/Electronic-&-Video"><i class="flaticon-computer-2"></i> Electronic & Video <span class="count">( <?php echo $electronic ?> )</span></a></li>
                        <li><a href="<?php echo base_url() ?>adverts/category/Animals-&-Pets"><i class="flaticon-dog"></i> Animals & Pets <span class="count">( <?php echo $pets ?> )</span></a></li>
                        <li><a href="<?php echo base_url() ?>adverts/category/Hobbies,-Arts-&-Sports"><i class="flaticon-book-1"></i> Hobbies, Arts & Sports <span class="count">( <?php echo $hobbies ?> )</span></a></li>
                       
                        <li><a href="<?php echo base_url() ?>adverts/category/Fashion-&-Beauty"><i class="flaticon-woman"></i> Fashion & Beauty <span class="count">( 230 )</span></a></li>
                        <li><a href="<?php echo base_url() ?>adverts/category/Others"><i class="flaticon-people"></i> Others <span class="count">( 230 )</span></a></li>
                     </ul>
                  </div>
                  <!-- Middle Content Box End -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
         






         





      <section class="custom-padding gray">
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
                        <p class="heading-text"></p>
                     </div>
                  </div>
                  <!-- Category Grid  -->
                  <div class="col-md-3 col-xs-12 col-sm-6">
                     <div class="box">
                        
                        <i class="fa fa-car fa-5x" aria-hidden="true" ></i>
                        <h4><a href="<?php echo base_url() ?>adverts/category/Vehicle"> Vehicles</a></h4>
                        <strong>1,265 Jobs</strong> 
                     </div>
                  </div>
                  <!-- Category Grid  -->
                  <div class="col-md-3 col-xs-12 col-sm-6">
                     <div class="box">
                        <i class="fa fa-mobile fa-5x" aria-hidden="true"></i>
                        <h4><a href="<?php echo base_url() ?>adverts/category/Mobile-Phone-&-Tablets">Mobile Phone & Tablets</a></h4>
                        <strong>1,265 Ads</strong> 
                     </div>
                  </div>
                  <!-- Category Grid  -->
                  <div class="col-md-3 col-xs-12 col-sm-6">
                     <div class="box">
                        <i class="fa fa-television fa-5x" aria-hidden="true"></i>
                        <h4><a href="<?php echo base_url() ?>adverts/category/Home,-Furniture-&-Garden">Home, Furniture & Garden</a></h4>
                        <strong>6,213 Ads</strong> 
                     </div>
                  </div>
                  <!-- Category Grid  -->
                  <div class="col-md-3 col-xs-12 col-sm-6">
                     <div class="box">
                        <i class="fa fa-home fa-5x" aria-hidden="true"></i>
                        <h4><a href="<?php echo base_url() ?>adverts/category/Real-Estate">Real Estate</a></h4>
                        <strong>3,750 Ads</strong> 
                     </div>
                  </div>
                  <!-- Category Grid  -->
                  <div class="col-md-3 col-xs-12 col-sm-6">
                     <div class="box">
                        <i class="fa fa-briefcase fa-5x" aria-hidden="true"></i>
                        <h4><a href="<?php echo base_url() ?>adverts/category/Jobs-&-Services">Job & Services</a></h4>
                        <strong>5,913 Ads</strong> 
                     </div>
                  </div>
                  <!-- Category Grid  -->
                  <div class="col-md-3 col-xs-12 col-sm-6">
                     <div class="box">
                        <i class="fa fa-laptop fa-5x" aria-hidden="true"></i>
                        <h4><a href="<?php echo base_url() ?>adverts/category/Electronic-&-Video">Electronic & Video</a></h4>
                        <strong>9,942 Ads</strong> 
                     </div>
                  </div>
                  <!-- Category Grid  -->
                  <div class="col-md-3 col-xs-12 col-sm-6">
                     <div class="box">
                        <i class="fa fa-paw fa-5x" aria-hidden="true"></i>
                        <h4><a href="<?php echo base_url() ?>adverts/category/Animals-&-Pets">Animals & Pets</a></h4>
                        <strong>3,891 Ads</strong> 
                     </div>
                  </div>
                  <!-- Category Grid  -->
                  <div class="col-md-3 col-xs-12 col-sm-6">
                     <div class="box">
                        <i class="fa fa-book fa-5x" aria-hidden="true"></i>
                        <h4><a href="<?php echo base_url() ?>adverts/category/Hobbies,-Arts-&-Sports">Hobbies, Arts & Sports</a></h4>
                        <strong>7,418 Ads</strong> 
                     </div>
                  </div>
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
   

         <div class="big-space"></div>



         <!-- =-=-=-=-=-=-= Trending Ads =-=-=-=-=-=-= -->
         <section class="custom-padding">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
                <div class="row">
                  <!-- Heading Area -->
                  <div class="heading-panel">
                     <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                        <!-- Main Title -->
                        <h1><span class="heading-color"> Latest</span> Listings</h1>
                        <!-- Short Description -->
                        <p class="heading-text">  </p>
                     </div>
                  </div>
                  <!-- Middle Content Box -->
                  <div class="col-md-12 col-xs-12 col-sm-12">

               <?php foreach ($adverts as $row): ?>

                     <div class="col-md-4 col-xs-12 col-sm-6">
                        <!-- Ad Box -->
                        <div class="category-grid-box">
                           <!-- Ad Img -->
                           <a href="<?php echo base_url('adverts/ad-details/'.$row['slug']); ?>">
                           <div class="category-grid-img featured-img">
                              <img class="img-responsive" alt="" src="<?=base_url().'uploads/'.$row['pic1']?>">
                              <!-- Ad Status -->
                            
                          
                           </div></a>
                           <!-- Ad Img End -->
                           <div class="short-description">
                              <!-- Ad Category -->
                              <div class="category-title"> <span><a href="#"><?php echo $row['category']; ?></a></span> </div>
                              <!-- Ad Title -->
                              <h3><a title="" href="<?php echo base_url('adverts/ad-details/'.$row['slug']); ?>"><?php echo $row['title']; ?></a></h3>
                              <!-- Price -->
                              <div class="price"><?php $number = $row['price']   ?>
    $<?php echo $english_format_number = number_format($number); ?> <span class="negotiable">(<?php echo $row['price_status']; ?>)</span></div>
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
        
         