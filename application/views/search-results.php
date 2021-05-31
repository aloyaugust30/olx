<div class="page-header-area">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="header-page">
                     <h1> </h1>
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
                 
                  <li><a class="active" href="<?php echo base_url('adverts/latest-ads'); ?>">Listing</a></li>
               </ul>
            </div>
         </div>
      </div>
      <!-- Small Breadcrumb -->
      <!-- =-=-=-=-=-=-= Transparent Breadcrumb End =-=-=-=-=-=-= -->
      <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
      <div class="main-content-area clearfix">
         <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
         <section class="section-padding gray">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <!-- Middle Content Area -->
                  <div class="col-md-9 col-md-push-3 col-lg-9 col-sx-12">
                     <!-- Row -->
                     <div class="row">
                        <!-- Sorting Filters -->
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                           <!-- Sorting Filters Breadcrumb -->
                           <div class="filter-brudcrums">
                              <span>Showing <span class="showed">1 - 20</span> of <span class="showed"></span> results</span>
                              <div class="filter-brudcrums-sort">
                                 <ul>
                                    <li><span>Sort by:</span></li>
                                 
                                   
                                    
                                    <li><a href="">Lowest Price</a></li>
                                 </ul>
                              </div>
                           </div>
                           <!-- Sorting Filters Breadcrumb End -->
                        </div>
                        <!-- Sorting Filters End-->
                        <div class="clearfix"></div>
                        <!-- Ads Archive -->
                        <div class="posts-masonry">
                           <!-- Listing Ad Grid -->

                            <?php if( !empty($adverts) ) { ?>
                           <?php foreach ($adverts as $row){ ?>

                           


                           <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                              <div class="white category-grid-box-1 featured-img2">
                                 <!-- Image Box -->
                              <a href="<?php echo base_url('adverts/ad-details/'.$row['slug']); ?>">
                                 <div class="image"> <img alt="Tour Package" src="<?=base_url().'uploads/'.$row['pic1']?>"> </div>
                              </a>
                                 <!-- Short Description -->
                                 <div class="short-description-1 ">
                                    <!-- Category Title -->
                                    <div class="category-title"> <span><a href="#"><?php echo $row['category']; ?></a></span> </div>
                                    <!-- Ad Title -->
                                    <h3>
                                       <a title="" href="<?php echo base_url('adverts/ad-details/'.$row['slug']); ?>"><?php echo $row['title']; ?></a>
                                    </h3>
                                    <!-- Location -->
                                    <p class="location"><i class="fa fa-map-marker"></i> <?php echo $row['ad_location']; ?></p>
                                    <!-- Rating -->
                                    <div class="rating">
                                       <?php echo $row['price_status']; ?>
                                    </div>
                                    <!-- Price -->
                                    <span class="ad-price"><?php $number = $row['price']   ?>
    €<?php echo $english_format_number = number_format($number); ?> </span> 
                                 </div>
                                 <!-- Ad Meta Stats -->
                                 <div class="ad-info-1">
                                    <ul>
                                       <li> <i class="fa fa-eye"></i><a href="#"><?php echo $row['views']; ?> Views</a> </li>
                                       <li> <i class="fa fa-clock-o"></i><?php $date = strtotime($row['ad_date']); ?><?php echo date('j F Y', $date); ?></li>
                                    </ul>
                                 </div>
                              </div>
                           </div>

                            <?php }}else{ ?>

                              No Product Here Yet...

                            <?php }?>

                          
                           
                          
                        </div>
                        <!-- Ads Archive End -->  
                        <div class="clearfix"></div>
                        <!-- Pagination -->  
                        <div class="text-center margin-top-30">
                           <?php echo $this->pagination->create_links(); ?>
                        </div>
                        <!-- Pagination End -->   
                     </div>
                     <!-- Row End -->
                  </div>
                  <!-- Middle Content Area  End -->
                  <!-- Left Sidebar -->
                  <div class="col-md-3 col-md-pull-9 col-sx-12">
                     <!-- Sidebar Widgets -->
                     <div class="sidebar">
                        <!-- Panel group -->
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">



                         <div class="panel panel-default">
                              <!-- Heading -->
                              <div class="panel-heading" role="tab" id="headingOne">
                                 <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                     <i class="icon fa fa-car" aria-hidden="true" ></i> Vehicles
                                    </a>
                                 </h4>
                              </div>
                              <!-- Content -->
                              <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                 <div class="panel-body">
                                    <div class="skin-minimal">
                                       <ul class="links list-unstyled">
                                                <li><a href="<?php echo base_url() ?>adverts/sub-category/Cars-Accesories">Cars Accesories</a></li>
                                                <li><a href="<?php echo base_url() ?>adverts/sub-category/Motorcycles">Motorcycles </a></li>
                                                <li><a href="<?php echo base_url() ?>adverts/sub-category/Trucks,-Commercial-&-Agricultural">Trucks, Commercial & Agricultural</a></li>
                                               
                                             </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>

                         <div class="panel panel-default">
                              <!-- Heading -->
                              <div class="panel-heading" role="tab" id="headingTwo">
                                 <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                     <i class="icon fa fa-envira" aria-hidden="true"></i>Home, Furniture & Garden
                                    </a>
                                 </h4>
                              </div>
                              <!-- Content -->
                              <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                 <div class="panel-body">
                                    <div class="skin-minimal">
                                       <ul class="links list-unstyled">
                                                <li><a href="<?php echo base_url() ?>adverts/sub-category/Furniture">Furniture</a></li>
                                                <li><a href="<?php echo base_url() ?>adverts/sub-category/Home-Appliances">Home Appliances </a></li>
                                                <li><a href="<?php echo base_url() ?>adverts/sub-category/Decor,-Garden-&-Accesories">Decor, Garden & Accesories</a></li>
                                                <li><a href="<?php echo base_url() ?>adverts/sub-category/Office-&-Commercial-Furniture">Office & Commercial Furniture</a></li>
                                                <li><a href="<?php echo base_url() ?>adverts/sub-category/Agriculture-&-Farm-Produce">Agriculture & Farm Produce</a></li>
                                             
                                             </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>



                           <div class="panel panel-default">
                              <!-- Heading -->
                              <div class="panel-heading" role="tab" id="headingThree">
                                 <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                     <i class="icon fa fa-home"></i>Real Estate
                                    </a>
                                 </h4>
                              </div>
                              <!-- Content -->
                              <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                 <div class="panel-body">
                                    <div class="skin-minimal">
                                       <ul class="links list-unstyled">
                                                <li><a href="<?php echo base_url() ?>adverts/sub-category/Land">Land</a></li>
                                                <li><a href="<?php echo base_url() ?>adverts/sub-category/Houses-&-Apartments-for-Rent"> Houses & Apartments for Rent</a></li>
                                                <li><a href="<?php echo base_url() ?>adverts/sub-category/Houses-&-Apartments-for-Sale">Houses & Apartments for Sale</a></li>
                                                <li><a href="<?php echo base_url() ?>adverts/sub-category/Office,-Shops-&-Commercial">Office, Shops & Commercial</a></li>
                                                <li><a href="<?php echo base_url() ?>adverts/sub-category/Short-term-&-Holiday-Rentals">Short term & Holiday Rentals</a></li>
                                               
                                             </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- Condition Panel End -->   
                           <!-- Pricing Panel -->
                           <div class="panel panel-default">
                              <!-- Heading -->
                              <div class="panel-heading" role="tab" id="headingfour">
                                 <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                    <i class="icon fa fa-mobile" aria-hidden="true"></i>  Mobile Phone & Tablets
                                    </a>
                                 </h4>
                              </div>
                              <!-- Content -->
                              <div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                                 <div class="panel-body">
                                   <ul>
                                                <li><a href="<?php echo base_url() ?>adverts/sub-category/Phones-&-Mobile-Phones">Phones & Mobile Phones</a></li>
                                                <li><a href="<?php echo base_url() ?>adverts/sub-category/Accessories">Accessories</a></li>
                                                <li><a href="<?php echo base_url() ?>adverts/sub-category/Tablets">Tablets</a></li>
                                               
                                             </ul>
                                 </div>
                              </div>
                           </div>


                            <div class="panel panel-default">
                              <!-- Heading -->
                              <div class="panel-heading" role="tab" id="headingFive">
                                 <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                    <i class="icon fa fa-briefcase"></i>  Job & Services
                                    </a>
                                 </h4>
                              </div>
                              <!-- Content -->
                              <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                                 <div class="panel-body">
                                  <ul class="links list-unstyled">
                                                <li><a href="<?php echo base_url() ?>adverts/sub-category/Offered-Jobs">Offered Jobs</a></li>
                                                <li><a href="<?php echo base_url() ?>adverts/sub-category/Seeking-work-&-CVs">Seeking Work & CVs</a></li>
                                                <li><a href="<?php echo base_url() ?>adverts/sub-category/Services">Services</a></li>
                                                <li><a href="<?php echo base_url() ?>adverts/sub-category/Classes-&-Courses">Classes & Courses</a></li>
                                              
                                             </ul>
                                 </div>
                              </div>
                           </div>


                           <div class="panel panel-default">
                              <!-- Heading -->
                              <div class="panel-heading" role="tab" id="headingSix">
                                 <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                    <i class="icon fa fa-laptop"></i>  Electronic & Video
                                    </a>
                                 </h4>
                              </div>
                              <!-- Content -->
                              <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                                 <div class="panel-body">
                                  <ul class="links list-unstyled">
                                                <li><a href="<?php echo base_url() ?>adverts/sub-category/Cameras-&-Accessories">Cameras & Accessories</a></li>
                                                <li><a href="<?php echo base_url() ?>adverts/sub-category/Computers-&-Laptops">Computers & Laptops</a></li>
                                                <li><a href="<?php echo base_url() ?>adverts/sub-category/TV,-Audio-&-Video">TV, Audio & Video</a></li>
                                                <li><a href="<?php echo base_url() ?>adverts/sub-category/Video-Games-&-Accessories">Video Games & Accessories</a></li>
                                              
                                             </ul>
                                 </div>
                              </div>
                           </div>


                        <div class="panel panel-default">
                              <!-- Heading -->
                              <div class="panel-heading" role="tab" id="headingSeven">
                                 <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                    <i class="icon fa fa-paw"></i>  Animals & Pets
                                    </a>
                                 </h4>
                              </div>
                              <!-- Content -->
                              <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
                                 <div class="panel-body">
                                  <ul class="links list-unstyled">
                                       <li><a href="<?php echo base_url() ?>adverts/sub-category/Dogs-&-Cats">Dogs & Cats</a></li>
                                       <li><a href="<?php echo base_url() ?>adverts/sub-category/Other-Animals">Other Animals</a></li>
                                       <li><a href="<?php echo base_url() ?>adverts/sub-category/Pet-Accessories">Pet Accessories</a></li>
                                       </ul>
                                 </div>
                              </div>
                           </div>



                           <div class="panel panel-default">
                              <!-- Heading -->
                              <div class="panel-heading" role="tab" id="headingEight">
                                 <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                    <i class="icon fa fa-futbol-o"></i> Hobbies, Arts & Sports
                                    </a>
                                 </h4>
                              </div>
                              <!-- Content -->
                              <div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
                                 <div class="panel-body">
                                  <ul class="links list-unstyled">
                                       <li><a href="<?php echo base_url() ?>adverts/sub-category/Books,-CDs-&-DVDs">Books, CDs & DVDs</a></li>
                                       <li><a href="<?php echo base_url() ?>adverts/sub-category/Musical-Instruments">Musical Instruments</a></li>
                                       <li><a href="<?php echo base_url() ?>adverts/sub-category/Art-&-Collectibles">Art & Collectibles</a></li>
                                       <li><a href="<?php echo base_url() ?>adverts/sub-category/Crafts">Crafts</a></li>
                                       <li><a href="<?php echo base_url() ?>adverts/sub-category/Sporting-goods-&-Bicycles">Sporting goods & Bicycles</a></li>
                                       <li><a href="<?php echo base_url() ?>adverts/sub-category/Toys-&-Games">Toys & Games</a></li>
                                       </ul>
                                 </div>
                              </div>
                           </div>


                        
                        </div>
                        <!-- panel-group end -->


                  <!-- Recent Ads --> 
                        <div class="widget">
                           <div class="widget-heading">
                              <h4 class="panel-title"><a>Recent Ads</a></h4>
                           </div>
                           <div class="widget-content recent-ads">
                              <!-- Ads -->

                              <?php if( !empty($featured) ) { ?>
                              <?php foreach ($featured as $row2){ ?>

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
              


                     </div>
                     <!-- Sidebar Widgets End -->
                  </div>
                  <!-- Left Sidebar End -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>