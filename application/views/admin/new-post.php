<!--content-->
<div class="content">
					<div class="monthly-grid">
						<div class="panel panel-widget">
							<div class="panel-title">
							 New Classified Ads
							  
							</div>
							<div class="panel-body">
								<!-- status -->
								
								<!-- status -->
                                
							</div>
						</div>
  <!-- content start -->
                      
                      
                      <p>Post a New Ad</p>  
   <div class="forms">
<h3 class="title1"></h3>
<div class="form-three widget-shadow">
<form class="form-horizontal" action="<?php echo base_url(); ?>admin/new_post" method="post" enctype="multipart/form-data">

<?php echo $this->session->flashdata('msg') ?>
<div class="form-group">
<span class="text-danger"><?php echo form_error('title'); ?></span>
<div class="col-sm-2">
Product Title *
</div>
<div class="col-sm-8">
 <input name="title" class="form-control1" placeholder="Brand new Iphone 6 for sale" type="text" required="" value="<?php echo set_value('title'); ?>">
</div>

</div>

<div class="form-group">

<div class="col-sm-2">
Category *
</div>
<div class="col-sm-3">
<span class="text-danger"><?php echo form_error('category'); ?></span>
      <select onchange="print_state('state',this.selectedIndex);" id="country" name="category" class="form-control1" required></select>
</div>

<div class="col-sm-2">
Sub Category*
</div>

<div class="col-sm-3">
<span class="text-danger"><?php echo form_error('sub_category'); ?></span>
<select name ="sub_category" id ="state" class="form-control1" required></select><script language="javascript">print_country("country");</script>
</div>
</div>


<div class="form-group">

<div class="col-sm-2">
Price *
</div>
<div class="col-sm-3">
<span class="text-danger"><?php echo form_error('price'); ?></span>
<input name="price" class="form-control1" placeholder="3500" type="text" required="" value="<?php echo set_value('price'); ?>">
</div>

<div class="col-sm-2">
Price <small>Fixed or Negotiable</small>
</div>

<div class="col-sm-3">
	<span class="text-danger"><?php echo form_error('price_status'); ?></span>
<select name="price_status" class="category form-control1" required="">
    <option value="Fixed">Price Fixed</option>
    <option value="Negotiable">Price Negotiable</option>
    
    
 </select>
</div>
</div>




<div class="form-group">
<span class="text-danger"><?php echo form_error('description'); ?></span>
<div class="col-sm-2">
Description *
</div>

<div class="col-sm-8">
<span class="text-danger"><?php echo form_error('editor1'); ?></span>
<textarea name="editor1" id="editor1" rows="12" class="form-control" placeholder="" required=""><?php echo set_value('editor1'); ?></textarea>
</div>
</div>


<div class="form-group">
<span class="text-danger"><?php echo form_error('tags'); ?></span>
<div class="col-sm-2">
Ad Tags  <small>eg: laptop, car,camera for sale</small>
</div>

<div class="col-sm-8">
<span class="text-danger"><?php echo form_error('tags'); ?></span>
 <input class="form-control" name="tags" id="tags" value="<?php echo set_value('tags'); ?>" >
</div>
</div>




<div class="form-group">

<div class="col-sm-2">
Condition
</div>
<div class="col-sm-3">
<span class="text-danger"><?php echo form_error('condition'); ?></span>
 
      <input type="radio" id="new" name="condition" value="New" checked>
      <label  for="new">New</label>
   
      <input type="radio" id="used" name="condition" value="Used">
      <label for="used">Used</label>
</div>

<div class="col-sm-2">
Featured Ads<small> paid users</small>
</div>

<div class="col-sm-3">
	<span class="text-danger"><?php echo form_error('featured'); ?></span>
<select name="featured" class="category form-control">
	<option value="No">No</option>
    <option value="Yes">Yes</option>
    
    
    
 </select>
</div>
</div>




<div class="form-group">

<div class="col-sm-2">
Ad Location*
</div>
<div class="col-sm-8">
<span class="text-danger"><?php echo form_error('ad_location'); ?></span>
 <select name="ad_location" class="category form-control1" required="" >
    <option label="Select Location"></option>
    <option value="Baden-Württemberg">Baden-Württemberg</option>
    <option value="Bavaria">Bavaria</option>
    <option value="Berlin">Berlin</option>
    <option value="Brandenburg">Brandenburg</option>
    <option value="Bremen">Bremen</option>
    <option value="Hamburg">Hamburg</option>
    <option value="Hesse">Hesse</option>
    <option value="Lower Saxony">Lower Saxony</option>
    <option value="Mecklenburg-Vorpommern">Mecklenburg-Vorpommern</option>
    <option value="North Rhine-Westphalia">North Rhine-Westphalia</option>
    <option value="Rhineland-Palatinate">Rhineland-Palatinate</option>
    <option value="Saarland">Saarland</option>
    <option value="Saxony">Saxony</option>
    <option value="Saxony-Anhalt">Saxony-Anhalt</option>
    <option value="Schleswig-Holstein">Schleswig-Holstein</option>
    <option value="Thuringia">Thuringia</option>
    
 </select>
</div>

</div>








<div class="form-group">
<span class="text-danger"> <?php if(isset($error)){print $error;}?> </span>
<div class="col-sm-2">
Main Image *
</div>
<div class="col-sm-8">

   <input type="file" name="pic1" accept="image/*" onchange="preview_image(event)" required >
<img id="output_image"/>

</div>
</div>

<div class="form-group">

<div class="col-sm-2">
More Pictures *
</div>
<div class="col-sm-8">
<label class="control-label">Add more Photos for your ad <small>Multiple Pictures allowed</small></label>
 <input type="file" name="userfile[]" required id="file-input" accept=".png,.jpg,.jpeg,.gif" multiple>

 <div id="preview"></div>
</div>


</div>



<div class="form-group">
<input type="submit" value="Post Ad" class="btn btn-danger" />
</div>

</form>
</div>
</div>
                   
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
  <!--content-->                      
					</div>
								
		</div>
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