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
                           <div class="author">
                              <div class="image">
                                 <?php if($user1['picture']==''){ ?>
                                 <img src="<?php echo base_url() ?>assets/images/users/user.jpg" alt="">
                                 <?php }else{  ?>
                                 <img src="<?=base_url().'profile/'.$user1['picture']?>" alt="">
                                 
                                    <?php } ?>
                              </div>
                              <span class="author-name"><?php echo $user1['name'] ?></span>
                              <em><?php $date = strtotime($advert['ad_date']); ?><?php echo date('j F Y', $date); ?></em>
                           </div>
                           <h2><?php echo $advert['title'] ?></h2>

                           <?php echo $this->session->flashdata('sent') ?>
                           
                           <ul class="messages">

                              <?php if( !empty($mess) ) { ?>
                                  <?php foreach ($mess as $row){ ?>

                                   <?php if ($row['user'] == "buyer" ) {?>
                              <li class="friend-message clearfix">
                                 <figure class="profile-picture">
                                     <?php if($row['picture']==''){ ?>

                                     <img src="<?php echo base_url() ?>assets/images/users/user.jpg" class="img-circle" alt="Profile Pic">
                                 <?php }else{  ?>
                                    <img src="<?=base_url().'profile/'.$row['picture']?>" class="img-circle" alt="Profile Pic">

                                 <?php } ?>
                                 </figure>

                                 <div class="message">
                                    <?php echo $row['message'] ?>
                                    <div class="time"><i class="fa fa-clock-o"></i> <?php $date = strtotime($row['mess_date']); ?><?php echo date('j F Y', $date); ?></div>
                                 </div>
                              </li>
                           <?php }else{ ?>
                              <li class="my-message clearfix">
                                 <figure class="profile-picture">
                                     <?php if($row['picture']==''){ ?>

                                     <img src="<?php echo base_url() ?>assets/images/users/user.jpg" class="img-circle" alt="Profile Pic">
                                 <?php }else{  ?>
                                    <img src="<?=base_url().'profile/'.$row['picture']?>" class="img-circle" alt="Profile Pic">

                                 <?php } ?>
                                 </figure>
                                 
                                 <div class="message">
                                     <?php echo $row['message'] ?>
                                    <div class="time"><i class="fa fa-clock-o"></i> <?php $date = strtotime($row['mess_date']); ?><?php echo date('j F Y', $date); ?></div>
                                 </div>
                              </li>

                           <?php } ?>

                           <?php }} ?>


                           </ul>
                           <div class="chat-form ">
                              <form role="form" class="form-inline" action="<?php echo base_url(); ?>message/post" method="post" enctype="multipart/form-data">
                                 <div class="form-group">
                                    <input name="message" style="width: 100%" placeholder="Type a message here..." class="form-control" type="text" required="">
                                    <input type="hidden" name="post_id" value="<?php echo $advert['post_id'] ?>">
                                    <input type="hidden" name="user_id" value="<?php echo $user['user_id'] ?>">


                                    <?php if ($this->session->userdata('user_id') ==  $owner) {?>
                                       <input type="hidden" name="user" value="owner">
                                    <?php }else{ ?>
                                       <input type="hidden" name="user" value="buyer">
                                    <?php } ?>

                                 </div>
                                 <button class="btn btn-theme" type="submit">Send</button>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>