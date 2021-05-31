<!-- =-=-=-=-=-=-= Transparent Breadcrumb =-=-=-=-=-=-= -->
      <div class="page-header-area">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="header-page">
                     <h1>Forgot Password </h1>
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
                 
                  <li><a class="active" href="<?php echo base_url(); ?>account/forgotpassword">Forgot Password</a></li>
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
                      <?php echo form_open('account/forgotpassword') ?>
                           <div class="form-group">
                              <label>Email</label>
                              <input name="email" placeholder="Your Email" class="form-control" type="email" value="<?php echo set_value('email'); ?>" required>
                           </div>
                           
                          
                           <button class="btn btn-theme btn-lg btn-block">Submit</button>
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