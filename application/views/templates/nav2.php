<body>
      
  
      <!-- =-=-=-=-=-=-= Light Header =-=-=-=-=-=-= -->
      <div class="colored-header">
         <!-- Top Bar -->
         <div class="header-top">
            <div class="container">
               <div class="row">
                  <!-- Header Top Left -->
                  <div class="header-top-left col-md-8 col-sm-6 col-xs-12 hidden-xs">
                     <ul class="listnone">
                      
                        <li><a href="<?php echo base_url() ?>page/faq"><i class="fa fa-folder-open-o" aria-hidden="true"></i> FAQS</a></li>
                        
                     </ul>
                  </div>
                  <!-- Header Top Right Social -->
                  <div class="header-right col-md-4 col-sm-6 col-xs-12 ">
                     <div class="pull-right">
                         <?php if ($this->session->userdata('user_id') == TRUE) {?>

                        <ul class="listnone">
                           <li >
                           <div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                        </li>


                           <li><a href="<?php echo base_url(); ?>account/index"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                           <li><a href="<?php echo base_url(); ?>account/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
                        </ul>
                        <?php } else { ?>

                           <ul class="listnone">
                              <li >
                          <div id="google_translate_element"></div>

                     <script type="text/javascript">
                     function googleTranslateElementInit() {
                       new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
                     }
                     </script>

               <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                        </li>
                        
                           <li><a href="<?php echo base_url(); ?>account/login"><i class="fa fa-sign-in"></i> Log in</a></li>
                           <li><a href="<?php echo base_url(); ?>account/register"><i class="fa fa-unlock" aria-hidden="true"></i> Register</a></li>
                        </ul>

                        <?php } ?>



                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- Top Bar End -->
         <!-- Navigation Menu -->
         <nav id="menu-1" class="mega-menu">
               <!-- menu list items container -->
               <section class="menu-list-items">
                  <div class="container">
                     <div class="row">
                        <div class="col-lg-12 col-md-12">
                           <!-- menu logo -->
                           <ul class="menu-logo">
                              <li>
                                  <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="logo"> </a>
                              </li>
                           </ul>
                           <!-- menu links -->
                           <ul class="menu-links">
                              <!-- active class -->
                            
                              
                     
                       
                           </ul>
                           <ul class="menu-search-bar">
                              <li>
                                <a href="<?php echo base_url() ?>post/new-post" class="btn btn-light"><i class="fa fa-plus" aria-hidden="true"></i> Post Free Ad</a>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </section>
            </nav>
      </div>