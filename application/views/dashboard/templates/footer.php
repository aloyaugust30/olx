<!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
         <footer class="footer-area no-bg">
            <!--Footer Upper-->
    
            <!--Footer Bottom-->
            <div class="footer-copyright">
               <div class="container clearfix">
                  <!--Copyright-->
                  <div class="copyright text-center">Yudala 2018 ©, All Rights Reserved.</div>
               </div>
            </div>
         </footer>
         <!-- =-=-=-=-=-=-= FOOTER END =-=-=-=-=-=-= -->
      </div>
      
      <!-- Back To Top -->
      <a href="#0" class="cd-top">Top</a>
     
    
      <!-- =-=-=-=-=-=-= JQUERY =-=-=-=-=-=-= -->
      <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
      <!-- Bootstrap Core Css  -->
      <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
      <!-- Jquery Easing -->
      <script src="<?php echo base_url(); ?>assets/js/easing.js"></script>
      <!-- Menu Hover  -->
      <script src="<?php echo base_url(); ?>assets/js/forest-megamenu.js"></script>
      <!-- Jquery Appear Plugin -->
      <script src="<?php echo base_url(); ?>assets/js/jquery.appear.min.js"></script>
      <!-- Numbers Animation   -->
      <script src="<?php echo base_url(); ?>assets/js/jquery.countTo.js"></script>
      <!-- Jquery Smooth Scroll  -->
      <script src="<?php echo base_url(); ?>assets/js/jquery.smoothscroll.js"></script>
      <!-- Jquery Select Options  -->
      <script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>
      <!-- noUiSlider -->
      <script src="<?php echo base_url(); ?>assets/js/nouislider.all.min.js"></script>
      <!-- Carousel Slider  -->
      <script src="<?php echo base_url(); ?>assets/js/carousel.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/slide.js"></script>
      <!-- Image Loaded  -->
      <script src="<?php echo base_url(); ?>assets/js/imagesloaded.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/isotope.min.js"></script>
      <!-- CheckBoxes  -->
      <script src="<?php echo base_url(); ?>assets/js/icheck.min.js"></script>
      <!-- Jquery Migration  -->
      <script src="<?php echo base_url(); ?>assets/js/jquery-migrate.min.js"></script>
      <!-- Sticky Bar  -->
      <script src="<?php echo base_url(); ?>assets/js/theia-sticky-sidebar.js"></script>
      <!-- Style Switcher -->
      <script src="<?php echo base_url(); ?>assets/js/color-switcher.js"></script>
      <!-- Template Core JS -->
      <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>

      <!-- For this Page Only -->
      <!-- Ckeditor  -->
      <script src="<?php echo base_url(); ?>assets/js/ckeditor/ckeditor.js" ></script>
      <!-- Ad Tags  -->
      <script src="<?php echo base_url(); ?>assets/js/jquery.tagsinput.min.js"></script>
      <!-- DROPZONE JS  -->
      <script src="<?php echo base_url(); ?>assets/js/dropzone.js" ></script>
      <script src="<?php echo base_url(); ?>assets/js/form-dropzone.js" ></script>
      <script type="text/javascript">
      "use strict";
      
      /*--------- Textarea Ck Editor --------*/
        CKEDITOR.replace( 'editor1' );
       
      /*--------- Ad Tags --------*/ 
       $('#tags').tagsInput({
            'width':'100%'
       });
      
         /*--------- create remove function in dropzone --------*/
         Dropzone.autoDiscover = false;
         var acceptedFileTypes = "image/*"; //dropzone requires this param be a comma separated list
         var fileList = new Array;
         var i = 0;
         $("#dropzone").dropzone({
           addRemoveLinks: true,
           maxFiles: 5, //change limit as per your requirements
         acceptedFiles: '.jpeg,.jpg,.png,.gif',
           dictMaxFilesExceeded: "Maximum upload limit reached",
           acceptedFiles: acceptedFileTypes,
         url: "uploads",
           dictInvalidFileType: "upload only JPG/PNG",
           init: function () {
               // Hack: Add the dropzone class to the element
               $(this.element).addClass("dropzone");
           }
         });
       (jQuery);

       function uploadFile(target) {
   document.getElementById("file-name").innerHTML = target.files[0].name;
}


      </script>
      <!-- JS -->

   </body>
</html>