<div class="small-breadcrumb">
         <div class="container">
            <div class=" breadcrumb-link">
               <ul>
                  <li><a href="<?php echo base_url(); ?>">Home</a></li>
                  
                  <li><a class="active" href="<?php echo base_url(); ?>account/index">Profile</a></li>
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
                  <?php echo $this->session->flashdata('msg'); ?>

                  <div class="col-md-12 col-xs-12 col-sm-12">
                    <section class="search-result-item">
                       <?php if($user['picture']==''){ ?>
                       <a class="image-link" href="#"><img class="image" alt="" src="<?php echo base_url(); ?>assets/images/users/9.jpg"> </a>
                        <?php }else{  ?>
                          <a class="image-link" href="#"><img src="<?=base_url().'profile/'.$user['picture']?>" alt=""></a>
                                 
                         <?php } ?>
                       <div class="search-result-item-body">
                          <div class="row">
                             <div class="col-md-5 col-sm-12 col-xs-12">
                              
                                <h4 class="search-result-item-heading"><a href="#"><?php echo $user['name'] ?></a></h4>
                                <p class="info"><?php echo $user['location'] ?></p>
                                <p class="description"> </p>
                               <!-- <span class="label label-warning">Paid Package</span>
                                <span class="label label-success">Dealer</span> -->
                                
                                
                             </div>
                             <div class="col-md-7 col-sm-12 col-xs-12">
                              <div class="row ad-history">
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <div class="user-stats">
                                            <h2><?php echo $sold_ads ?></h2>
                                            <small>Ad Sold</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <div class="user-stats">
                                            <h2><?php echo $total_ad ?></h2>
                                            <small>Total Listings</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <div class="user-stats">
                                            <h2><?php echo $fav_ads ?></h2>
                                            <small>Favourites Ads</small>
                                        </div>
                                    </div>
                                </div>
                             </div>
                             
                             
                             
                             
                             
                          </div>
                       </div>
                    </section>
                    
                    <div class="dashboard-menu-container">
                        <ul>
                     
                           
                           <li>
                              <a href="<?php echo base_url() ?>post/my-ads">
                                 <div class="menu-name">My Ads</div>
                              </a>
                           </li>
                           <li>
                              <a href="<?php echo base_url() ?>post/fav-ads">
                                 <div class="menu-name">Favourite Ads</div>
                              </a>
                           </li>
                            <li>
                              <a href="<?php echo base_url() ?>message/inbox">
                                 <div class="menu-name">Messages</div>
                              </a>
                           </li>
                          
                          <!-- <li>
                              <a href="#">
                                 <div class="menu-name">Close Account</div>
                              </a>
                           </li> -->
                           <li> 
                              <a href="<?php echo base_url() ?>account/logout">
                                 <div class="menu-name">Logout</div>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <!-- Middle Content Area  End -->
               </div>
               <!-- Row End -->
               
               <br>
               
               <div class="row">
                  <!-- Middle Content Area -->
                  
                  <div class="col-md-12 col-xs-12 col-sm-12">

                     <!-- Row -->
                     <div class="profile-section margin-bottom-20">
                        <div class="profile-tabs">
                           <ul class="nav nav-justified nav-tabs">
                              <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
                              <li><a href="#edit" data-toggle="tab">Edit Profile</a></li>
                               <li><a href="#payment" data-toggle="tab">Plan Setting</a></li> 
                              <li><a href="#settings" data-toggle="tab">Notification Settings</a></li>
                           </ul>
                           <div class="tab-content">
                              <div class="profile-edit tab-pane fade in active" id="profile">
                                 <h2 class="heading-md">Manage your Name, ID and Email Addresses.</h2>
                                 <p>Below are the name and email addresses on file for your account.</p>
                                 <dl class="dl-horizontal">
                                    <dt><strong>Your name </strong></dt>
                                    <dd>
                                       <?php echo $user['name'] ?>
                                    </dd>
                                    <dt><strong>Email Address </strong></dt>
                                    <dd>
                                       <?php echo $user['email'] ?>
                                    </dd>
                                    <dt><strong>Phone Number </strong></dt>
                                    <dd>
                                       <?php echo $user['phone'] ?>
                                    </dd>
                                    
                                    <dt><strong>City </strong></dt>
                                    <dd>
                                       <?php echo $user['location'] ?>
                                    </dd>
                                    
                                    <dt><strong>Address </strong></dt>
                                    <dd>
                                       <?php echo $user['address'] ?>
                                    </dd>
                                    <dt><strong>Registered </strong></dt>
                                    <dd>
                                       <?php $date = strtotime($user['reg_date']); ?><?php echo date('j F Y', $date); ?>
                                    </dd>
                                 </dl>
                              </div>
                              <div class="profile-edit tab-pane fade" id="edit">
                                 <h2 class="heading-md">Manage your Security Settings</h2>
                                 <p>Manage Your Account</p>
                                 <div class="clearfix"></div>
                                 <?php echo form_open_multipart('account/edit_profile/'. $user['user_id'] ) ?>
                                    <div class="row">
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                          <label>Your Name </label>
                                          <span class="text-danger"><?php echo form_error('name'); ?></span>
                                          <input type="text" name="name" class="form-control margin-bottom-20" required value="<?php echo $user['name'] ?>">
                                       </div>
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                          <label>Email Address <span class="color-red">*</span></label>
                                          <input type="text" class="form-control margin-bottom-20" value="<?php echo $user['email'] ?>" readonly>
                                       </div>
                                       <div class="col-md-12 col-sm-12 col-xs-12">  
                                          <label>Contact Number <span class="color-red">*</span></label>
                                          <span class="text-danger"><?php echo form_error('phone'); ?></span>
                                          <input type="text" name="phone" class="form-control margin-bottom-20" required="" value="<?php echo $user['phone'] ?>">
                                       </div>
                                       <div class="col-md-12 col-sm-12 col-xs-12">
                                          <label>Country <span class="color-red">*</span></label>
                                          <span class="text-danger"><?php echo form_error('location'); ?></span>
                                          <select class="form-control" name="location" required="">
                                            <option label="Select Location"></option>
                                            <option value="Baden-Württemberg" <?php echo ($user['location']=='Baden-Württemberg') ? "selected" : ""; ?>>Baden-Württemberg</option>
                                            <option value="Bavaria" <?php echo ($user['location']=='Bavaria') ? "selected" : ""; ?>>Bavaria</option>
                                            <option value="Berlin" <?php echo ($user['location']=='Berlin') ? "selected" : ""; ?>>Berlin</option>
                                            <option value="Brandenburg" <?php echo ($user['location']=='Brandenburg') ? "selected" : ""; ?>>Brandenburg</option>
                                            <option value="Bremen" <?php echo ($user['location']=='Bremen') ? "selected" : ""; ?>>Bremen</option>
                                            <option value="Hamburg" <?php echo ($user['location']=='Hamburg') ? "selected" : ""; ?>>Hamburg</option>
                                            <option value="Hesse" <?php echo ($user['location']=='Hesse') ? "selected" : ""; ?>>Hesse</option>
                                            <option value="Lower Saxony" <?php echo ($user['location']=='Lower Saxony') ? "selected" : ""; ?>>Lower Saxony</option>
                                            <option value="Mecklenburg-Vorpommern" <?php echo ($user['location']=='Mecklenburg-Vorpommern') ? "selected" : ""; ?>>Mecklenburg-Vorpommern</option>
                                            <option value="North Rhine-Westphalia" <?php echo ($user['location']=='North Rhine-Westphalia') ? "selected" : ""; ?>>North Rhine-Westphalia</option>
                                            <option value="Rhineland-Palatinate" <?php echo ($user['location']=='Rhineland-Palatinate') ? "selected" : ""; ?>>Rhineland-Palatinate</option>
                                            <option value="Saarland" <?php echo ($user['location']=='Saarland') ? "selected" : ""; ?>>Saarland</option>
                                            <option value="Saxony" <?php echo ($user['location']=='Saxony') ? "selected" : ""; ?>>Saxony</option>
                                            <option value="Saxony-Anhalt" <?php echo ($user['location']=='Saxony-Anhalt') ? "selected" : ""; ?>>Saxony-Anhalt</option>
                                            <option value="Schleswig-Holstein" <?php echo ($user['location']=='Schleswig-Holstein') ? "selected" : ""; ?>>Schleswig-Holstein</option>
                                            <option value="Thuringia" <?php echo ($user['location']=='Thuringia') ? "selected" : ""; ?>>Thuringia</option>
                                          </select>
                                       </div>
                                       
                                       <div class="col-md-12 col-sm-12 col-xs-12">
                                          <label>Address <span class="color-red">*</span></label>
                                          <span class="text-danger"><?php echo form_error('address'); ?></span>
                                          <textarea name="address" class = "form-control margin-bottom-20" rows = "3" required=""><?php echo $user['address'] ?></textarea>
                                       </div>
                                    </div>
                                    <div class="row margin-bottom-20">
                                       <div class="form-group">
                                          <div class="col-md-9">
                                             <div class="input-group">
                                                <span class="input-group-btn">
                                                <span class="btn btn-default btn-file">
                                                Browse… <input type="file" id="imgInp" name="picture">
                                                </span>
                                                </span>
                                                <input type="text" class="form-control" readonly>
                                             </div>
                                          </div>
                                          <div class="col-md-3">
                                             <img id="img-upload" class="img-responsive" src="<?php echo base_url() ?>assets/images/users/user.jpg" alt="" />
                                          </div>
                                       </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="row">
                                       <div class="col-md-8 col-sm-8 col-xs-12">
                                          <div class="form-group">
                                             <div class="skin-minimal">
                                                <ul class="list">
                                                   <li>
                                                      
                                                   </li>
                                                </ul>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-4 col-sm-4 col-xs-12 text-right">
                                          <button type="submit" class="btn btn-theme btn-sm">Update My Info</button>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                              <div class="profile-edit tab-pane fade" id="payment">
                                 <h2 class="heading-md">Manage your Package Settings</h2>
                                 <p>Below are the payment options for your account.</p>
                                 <br>
                                 <form action="#" id="sky-form" class="sky-form" novalidate>
                                    <!--Checkout-Form-->
                                    <dl class="dl-horizontal">
                                       <dt><strong>Current Plan</strong></dt>
                                       <dd>
                                          Free
                                       </dd>
                                       <dt><strong>Expiration Date </strong></dt>
                                       <dd>
                                           - 
                                       </dd>
                                    </dl>
                                    <div class="row">
                                       <div class="col-sm-12 col-md-12 margin-bottom-20">
                                          <label>Select Plan You Want To Change<span class="color-red">*</span></label>
                                          <select class="form-control">
                                             <option value="0">Free</option>
                                             <option value="1">Premium</option>
                                             <option value="2">Advanced</option>
                                          </select>
                                       </div>
                                    </div>
                                    <button class="btn btn-sm btn-default" type="button">Cancel</button>
                                    <button type="submit" class="btn btn-sm btn-theme">Save Changes</button>
                                    <!--End Checkout-Form-->
                                 </form>
                              </div>
                              <div class="profile-edit tab-pane fade" id="settings">
                                 <h2 class="heading-md">Manage your Notifications.</h2>
                                 <p>Below are the notifications you may manage.</p>
                                 <br>
                                 <form>
                                    <div class="skin-minimal">
                                       <ul class="list">
                                          <li>
                                             <input  type="checkbox" id="minimal-checkbox-1">
                                             <label for="minimal-checkbox-1">Send me email notification when Ad is processed</label>
                                          </li>
                                          <li>
                                             <input  type="checkbox" id="minimal-checkbox-2">
                                             <label for="minimal-checkbox-2">Send me email notification when user comment</label>
                                          </li>
                                          <li>
                                             <input  type="checkbox" id="minimal-checkbox-3">
                                             <label for="minimal-checkbox-3">Send me email notification for the latest update</label>
                                          </li>
                                          <li>
                                             <input  type="checkbox" id="minimal-checkbox-4">
                                             <label for="minimal-checkbox-4"> Receive our monthly newsletter</label>
                                          </li>
                                          <li>
                                             <input  type="checkbox" id="minimal-checkbox-5">
                                             <label for="minimal-checkbox-5">Email notification</label>
                                          </li>
                                       </ul>
                                    </div>
                                    <div class="button-group margin-top-20">
                                       <button class="btn btn-sm btn-default" type="button">Reset</button>
                                       <button type="submit" class="btn btn-sm btn-theme">Save Changes</button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Row End -->
                  </div>
                  <!-- Middle Content Area  End -->
               </div>
               
            </div>
            <!-- Main Container End -->
         </section>