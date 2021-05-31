      <!-- Small Breadcrumb -->
      <div class="small-breadcrumb">
         <div class="container">
            <div class=" breadcrumb-link">
               <ul>
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                  <li><a href="<?php echo base_url(); ?>account/index">Profile</a></li>
                  <li><a class="active" href="<?php echo base_url(); ?>message/inbox">Inbox</a></li>
               </ul>
            </div>
         </div>
      </div>
      
      <!-- Small Breadcrumb -->
      <!-- =-=-=-=-=-=-= Transparent Breadcrumb End =-=-=-=-=-=-= -->
      <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
      <div class="main-content-area clearfix">
         <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
         <!-- COURSE CONCERN -->
         <section class="section-padding gray">
            <div class="container">
                  <div class="row">
                   <div class="message-body">
                     <div class="col-md-4 col-sm-5 col-xs-12">
                        <div class="message-inbox">
                           <div class="message-header">
                              <h4>Inbox</h4>
                           </div>
                           <ul class="message-history">
                              <!-- LIST ITEM -->
                           <?php if( !empty($inbox) ) { ?>
                           <?php foreach ($inbox as $row1){ ?>

                              <li class="message-grid">
                                 <a href="<?php echo base_url('message/messages/'.$row1['ad_owner'].'/'.$row1['post_id'].'/'.$row1['user_id']); ?>">
                                    <div class="image">
                                       <img src="images/users/1.jpg" alt="">
                                    </div>
                                    <div class="user-name">
                                       <div class="author">
                                          <span><?php echo $row1['name'] ?></span><div class="user-status"></div>
                                       </div>
                                       <p><?php echo $row1['title'] ?></p>
                                       <div class="time">
                                           <span><?php $date = strtotime($row1['inbox_date']); ?><?php echo date('j F Y', $date); ?></span>
                                       </div>
                                    </div>
                                 </a>
                              </li>
                           <?php }} ?>

                            
                              <!-- END / LIST ITEM -->
                           </ul>
                        </div>
                     </div>
                     <div class="col-md-8 clearfix col-sm-5 col-xs-12 message-content">
                        <div class="message-details">
                          
                          <p>Select a Message</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>