<!-- =-=-=-=-=-=-= Transparent Breadcrumb =-=-=-=-=-=-= -->
      <div class="page-header-area">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="header-page">
                     <h1>User Sign In</h1>
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
                  <li><a href="<?php echo base_url(); ?>">Home</a></li>
                 
                  <li><a class="active" href="<?php echo base_url(); ?>account/login">Sign In</a></li>
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
         <section class="section-padding error-page pattern-bg ">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <!-- Middle Content Area -->
                  <div class="col-md-5 col-md-push-7 col-sm-6 col-xs-12">
                     <!--  Form -->
                     <div class="form-grid">
                      <?php echo form_open('account/login') ?>
                           <div class="form-group">
                              <label>Email</label>
                              <input name="email" placeholder="Your Email" class="form-control" type="email" value="<?php echo set_value('email'); ?>" required>
                           </div>
                           <div class="form-group">
                              <label>Password</label>
                              <input name="password" placeholder="Your Password" class="form-control" type="password" value="<?php echo set_value('password'); ?>" required>
                           </div>
                           <div class="form-group">
                              <div class="row">
                                 <div class="col-xs-12">
                                    <div class="skin-minimal">
                                       <ul class="list">
                                          <li>
                                             <input  type="checkbox" id="minimal-checkbox-1">
                                             <label for="minimal-checkbox-1">Remember Me</label>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div class=" col-sm-6 text-right">
                                  <p class="help-block"><a href="<?php echo base_url() ?>account/register">Sign Up</a>  | <a href="<?php echo base_url() ?>account/forgotpassword">Forgot password?</a>
                                    </p>
                                 </div>
                              </div>
                           </div>
                           <button class="btn btn-theme btn-lg btn-block">Login With Us</button>
                        </form>
                     </div>
                     <!-- Form -->
                  </div>
                  <div class="col-md-7  col-md-pull-5  col-xs-12 col-sm-6">
                     <div class="heading-panel">
                        <h3 class="main-title text-left">
                           Sign In to your account   
                        </h3>
                     </div>
                     <div class="content-info">
                        <div class="features">
                           <div class="features-icons">
                              <i class="fa fa-envelope fa-5x"></i>
                           </div>
                           <div class="features-text">
                              <h3>Chat & Messaging</h3>
                              <p>
                                 Access your chats and account info from any device.
                              </p>
                           </div>
                        </div>
                        <div class="features">
                           <div class="features-icons">
                              <i class="fa fa-check-square fa-5x"></i>
                           </div>
                           <div class="features-text">
                              <h3>User Dashboard</h3>
                              <p>
                                 Maintain a wishlist by saving your favourite items.
                              </p>
                           </div>
                        </div>
                        <span class="arrowsign hidden-sm hidden-xs"><img src="<?php echo base_url() ?>assets/images/arrow.png" alt="" ></span>
                     </div>
                  </div>
                  <!-- Middle Content Area  End -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>