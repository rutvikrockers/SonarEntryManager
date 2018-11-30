<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0" name="viewport" />   
<meta charset="utf-8" />
   <title>:: Welcome to <?php $meta_setting = meta_setting(); echo SecureShowData($meta_setting['title']); ?> Admin::</title>
   <meta content="" name="description" />
   <meta content="" name="author" />
   
   <!-- Core CSS - Include with every page -->
   <link href="<?php echo base_url(); ?>admin_css/admin.css" rel="stylesheet">
   <link href="<?php echo base_url(); ?>admin_css/bootstrap.min.css" rel="stylesheet">
   <link href="<?php echo base_url(); ?>admin_css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
   <link href="<?php echo base_url(); ?>admin_fonts/font-awesome/css/font-awesome.css" rel="stylesheet">

   <!-- SB Admin CSS - Include with every page -->
   <link href="<?php echo base_url(); ?>admin_css/sb-admin.css" rel="stylesheet">
      <!-- Core Scripts - Include with every page -->
    
    <script src="<?php echo base_url(); ?>admin_js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url(); ?>admin_js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_js/plugins/metisMenu/jquery.metisMenu.js"></script>
    
    
    <script src="<?php echo base_url(); ?>admin_js/plugins/dataTables/jquery.dataTables.js"></script>
	<script src="<?php echo base_url(); ?>admin_js/plugins/dataTables/dataTables.bootstrap.js"></script>
   

    <script src="<?php echo base_url(); ?>admin_js/sb-admin.js"></script>
    
</head>

 <?php 
 $segment = $this->uri->segment('3');
 if(DEMO_MODE=="1" && ($segment != 'index' && $segment != null)){ ?>
<div class="demo-mode-msg">
   <?php echo ADMIN_DEMO_MESSAGE; ?>
</div>
<?php } ?>
<body >
 <div id="wrapper">
 <?php echo $header; ?>
<?php echo $main_content; ?>        
<?php echo $footer; ?>
</div>
</body>
</html>