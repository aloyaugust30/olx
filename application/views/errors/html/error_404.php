<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$ci = new CI_Controller();
$ci =& get_instance();
$ci->load->helper('url');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>404 Page Not Found</title>
<link href='http://fonts.googleapis.com/css?family=Amarante' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
<style type="text/css">
body{
    background:url(<?php echo base_url(); ?>assets/images/banner-3.jpg);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
}
.wrap{
    margin:0 auto;
    width:1000px;
}
.logo{
    text-align:center;
}   
.logo p span{
    color:lightgreen;
}   
.sub a{
    color:white;
    background:rgba(0,0,0,0.3);
    text-decoration:none;
    padding:5px 10px;
    font-size:13px;
    font-family: arial, serif;
    font-weight:bold;
}   
.footer{
    color:#555;
    position:absolute;
    right:10px;
    bottom:10px;
    font-weight:bold;
    font-family:arial, serif;
}   
.footer a{
    font-size:16px;
    color:#ff4800;
}   

.box{
	text-align: center;
	margin-top: 200px;
	color:;

}
</style>
</head>
<body>
   
     <div class="col-md-6 col-md-offset-3 box"> 
     	<h1>SORRY, WE CAN'T FND THE PAGE YOU ARE LOOKING FOR</h1> 
     	<br>
     	<P><a class="btn btn-primary" href="<?php echo base_url() ?>">Go back Home</a></P>
     </div>

</body>
</html>