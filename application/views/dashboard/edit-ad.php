<script type="text/javascript">
function deleteimage(image_id)
{
var answer = confirm ("Are you sure you want to delete from this post?");
if (answer)
{
        $.ajax({
                type: "POST",
                url: "<?php echo base_url('post/deleteimage');?>",
                data: "image_id="+image_id,
                success: function (response) {
                  if (response == 1) {
                    $(".imagelocation"+image_id).remove(".imagelocation"+image_id);
                  };
                  
                }
            });
      }
}
</script>

<div class="page-header-area">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="header-page">
                     <h1>Ad Posting </h1>
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
                 <li><a href="<?php echo base_url() ?>account/index">Profile</a></li>
                  <li><a class="active" href="<?php echo base_url(); ?>post/new-post">Post Ad</a></li>
               </ul>
            </div>
         </div>
      </div>
      <!-- Small Breadcrumb -->
      <!-- =-=-=-=-=-=-= Transparent Breadcrumb End =-=-=-=-=-=-= -->
      <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
      <div class="main-content-area clearfix">
         <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
         <section class="section-padding  gray ">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <div class="col-md-8 col-lg-8 col-xs-12 col-sm-12">
                     <!-- end post-padding -->
                     <div class="post-ad-form postdetails">
                        <div class="heading-panel">
                           <h3 class="main-title text-left">
                              Post Your Ad
                           </h3>
                        </div>
                        <?php echo $this->session->flashdata('msg') ?>
              <?php if( !empty($advert) ) {
              foreach($advert as $row) { ?>  
                        <p class="lead">Posting an ad on <a href="<?php echo base_url(); ?>">Yudala</a> is free! However, all ads must follow our rules:</p>
                        <form class="form-horizontal" action="<?php echo base_url(); ?>post/edit" method="post" enctype="multipart/form-data">
                           <!-- Title  -->
                           <div class="row">
                              <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                 <label class="control-label">Ad Title <small>Enter a short title for your project</small></label>
                                 <span class="text-danger"><?php echo form_error('title'); ?></span>
                                 <input name="title" class="form-control" placeholder="Brand new Iphone 6 for sale" type="text" required="" value="<?php echo $row['title']; ?>">
                              </div>
                           </div>


                           <div class="row">
                              <!-- Category  -->
                              <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                 <label class="control-label">Category <small>Select suitable category for your ad</small></label>
                                 <span class="text-danger"><?php echo form_error('category'); ?></span>
                                 <select onchange="print_state('state',this.selectedIndex);" id="country" name="category" class="form-control1" required></select>
                              </div>
                              <!-- Sub-category  -->
                              <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                 <label class="control-label">Sub-Category <small>Sub-category for your ad</small></label>
                                 <span class="text-danger"><?php echo form_error('sub_category'); ?></span>
                                <select name ="sub_category" id ="state" class="form-control1" required></select>
                         <script language="javascript">print_country("country");</script>
                              </div>
                           </div>
                           <!-- end row -->



                           <div class="row">
                              <!-- Price  -->
                              <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                 <label class="control-label">Price<small>USD only</small></label>
                                 <span class="text-danger"><?php echo form_error('price'); ?></span>
                                 <input name="price" class="form-control" placeholder="3500" type="text" required="" value="<?php echo $row['price']; ?>">
                              </div>

                              <!-- Price  -->
                              <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                 <label class="control-label">Price <small>Fixed or Negotiable</small></label>
                                 <select name="price_status" class="category form-control">
                                    <option value="Fixed" <?php echo ($row['price_status']=='1 Fixed') ? "selected" : ""; ?>>Price Fixed</option>
                                    <option value="Negotiable" <?php echo ($row['price_status']=='1 Negotiable') ? "selected" : ""; ?>>Price Negotiable</option>
                                    
                                    
                                 </select>
                              </div>
                           </div>
                           <!-- end row -->
                           <div class="small-space"></div>
                            <!-- Image Upload  -->
                           <div class="row">
                              <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                 <label class="control-label">Main Photo for your ad <small>Minium size (1200x700)</small></label>
                                 <span class="text-danger"> <?php if(isset($error)){print $error;}?> </span>
                                 <input type="file" name="pic1" accept="image/*" onchange="preview_image(event)" >
                              </div><br>
                              <img src="<?php echo base_url('uploads/').$row['pic1']; ?>" width="300" height="150" />
                           </div><hr>

                            <div class="small-space"></div>
                           <!-- Image Upload  -->
                           <div class="row">
                              <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                 <label class="control-label">Add more Photos for your ad <small>Multiple Pictures allowed</small></label>
                                 <input type="file" name="userfile[]"  id="file-input" accept=".png,.jpg,.jpeg,.gif" multiple>
                              </div>
                          <?php if( !empty($image) ) {
                        foreach($image as $pix) { ?> 
                        <div class="col-sm-3 other-pix imagelocation<?php echo $pix['id'] ?> ">
                        <div class="action">
                        <span style="cursor:pointer;" onclick="javascript:deleteimage(<?php echo $pix['id'] ?>)">X</span>
                        </div>
                        <img src="<?php echo base_url('uploads/').$pix['image']; ?>" class="img-responsive" />
                        </div>

                        <?php } }?>
                           </div>


                           


                          <div class="big-space"></div>
                           <!-- Ad Description  -->
                           <div class="row">
                              <div class="col-md-12 col-lg-12 col-xs-12  col-sm-12">
                                 <label class="control-label">Ad Description <small>Enter long description for your Advert</small></label>
                                 <span class="text-danger"><?php echo form_error('editor1'); ?></span>
                                 <textarea name="editor1" id="editor1" rows="12" class="form-control" placeholder="" required=""><?php echo $row['description']; ?></textarea>
                              </div>
                           </div>
                           <!-- end row -->
                           <div class="small-space"></div>
                           <!-- Ad Tags  -->
                           <div class="row">
                              <div class="col-md-12 col-lg-12 col-xs-12  col-sm-12">
                                 <label class="control-label">Ad Tags  <small>eg: laptop, car,camera for sale</small></label>
                                 <span class="text-danger"><?php echo form_error('tags'); ?></span>
                                 <input class="form-control" name="tags" id="tags" value="<?php echo $row['tags']; ?>" >
                              </div>
                           </div>
                           <!-- end row -->
                          
                          <div class="small-space"></div>
                           <!-- Ad Condition  -->
                           <div class="row">
                              <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                 <label class="control-label">Condition: <small>Item Condition</small></label>
                                 <span class="text-danger"><?php echo form_error('condition'); ?></span>
                                 <div class="skin-minimal">
                                    <ul class="list">
                                       <li>
                                          <input type="radio" id="new" name="condition" value="New" <?php echo ($row['conditions']=='New'?'checked="checked"':''); ?> >
                                          <label  for="new">New</label>
                                       </li>
                                       <li>
                                          <input type="radio" id="used" name="condition" value="Used" <?php echo ($row['conditions']=='Used'?'checked="checked"':''); ?>>
                                          <label for="used">Used</label>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <!-- end row -->
                           
                      
                       <input type="hidden" name="post_id" value="<?php echo $row['post_id'];?>" />

                     
                           <button class="btn btn-theme pull-right">Publish My Ad</button>
                        </form>
                     </div>
                     <!-- end post-ad-form-->

              <?php }} ?>
                  </div>
                  <!-- end col -->
                  <!-- Right Sidebar -->
                  <div class="col-md-4 col-xs-12 col-sm-12">
                     <!-- Sidebar Widgets -->
                     <div class="blog-sidebar">
                        <!-- Categories --> 
                        <div class="widget">
                           <div class="widget-heading">
                              <h4 class="panel-title"><a>Saftey Tips </a></h4>
                           </div>
                           <div class="widget-content">
                              <p class="lead">Posting an ad on <a href="#">Yudala</a> is free! However, all ads must follow our rules:</p>
                              <ol>
                                 <li>Make sure you post in the correct category.</li>
                                 <li>Do not post the same ad more than once or repost an ad within 48 hours.</li>
                                 <li>Do not upload pictures with watermarks.</li>
                                 <li>Do not post ads containing multiple items unless it's a package deal.</li>
                                 <li>Do not put your email or phone numbers in the title or description.</li>
                                 
                              </ol>
                           </div>
                        </div>
                        <!-- Latest News --> 
                     </div>
                     <!-- Sidebar Widgets End -->
                  </div>
                  <!-- Middle Content Area  End --><!-- end col -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
         <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->

         <script type='text/javascript'>
function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
</script>

<script type="text/javascript">
  
  function previewImages() {

  var preview = document.querySelector('#preview');
  
  if (this.files) {
    [].forEach.call(this.files, readAndPreview);
  }

  function readAndPreview(file) {

    // Make sure `file.name` matches our extensions criteria
    if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
      return alert(file.name + " is not an image");
    } // else...
    
    var reader = new FileReader();
    
    reader.addEventListener("load", function() {
      var image = new Image();
      image.height = 100;
      image.title  = file.name;
      image.src    = this.result;
      preview.appendChild(image);
    }, false);
    
    reader.readAsDataURL(file);
    
  }

}

document.querySelector('#file-input').addEventListener("change", previewImages, false);
</script>