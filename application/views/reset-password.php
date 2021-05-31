<!-- =-=-=-=-=-=-= Transparent Breadcrumb =-=-=-=-=-=-= -->
      <div class="page-header-area">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="header-page">
                     <h1>Change Password</h1>
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
                 
                  <li><a class="active" href="<?php echo base_url(); ?>account/login">Reset Password</a></li>
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
                  <div class="col-md-8 col-md-offset-2 col-xs-12">
                     <!--  Form -->
                     <div class="form-grid">
                      <?php echo form_open('account/reset_password') ?>
                           <div class="form-group">
                              <label>Email</label>
                              <input name="password" placeholder="Password" class="form-control" type="password" value="<?php echo set_value('password'); ?>" required>
                           </div>
                           <div class="form-group">
                              <label>Password</label>
                              <input name="confirm_password" placeholder="Confirm Password" class="form-control" type="password" value="<?php echo set_value('confirm_password'); ?>" required>
                           </div>

                           <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                           <input type="hidden" name="hash" value="<?php echo $hash ?>">
                         
                           <button class="btn btn-theme btn-lg btn-block">Reset Password</button>
                        </form>
                     </div>
                     <!-- Form -->
                  </div>
              
                  <!-- Middle Content Area  End -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>