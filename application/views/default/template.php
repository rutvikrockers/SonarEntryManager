<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo SecureShowData(($meta_title!=""))?strip_tags(str_replace(array('&nbsp;'),'',SecureShowData($meta_title))):":: Welcome to FundraisingScript ::"; ?></title>
<meta name="title" content="<?php echo SecureShowData(($meta_title!=""))?strip_tags(str_replace(array('&nbsp;'),'',SecureShowData($meta_title))):":: Welcome to FundraisingScript ::"; ?>" />
<meta name="description" content="<?php echo SecureShowData(($meta_description!=""))?strip_tags(str_replace(array('&nbsp;'),'',SecureShowData($meta_description))):"FundraisingScript"; ?>" />
<meta name="keywords" content="<?php echo SecureShowData(($meta_keyword!=''))?strip_tags(str_replace(array('&nbsp;'),'',SecureShowData($meta_keyword))):"FundraisingScript"; ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
<?php  echo $og_view; 
 $site_image = site_setting();
 $site_logo =  $site_image['site_logo'];
 $site_fav_icon =  $site_image['site_fav_icon'];

?>


<!-- Favicon -->

<link rel="icon" href="<?php echo base_url(); ?>admin_images/<?php echo $site_fav_icon;?>" sizes="32x32">

<!-- Bootstrap core CSS -->
<link href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css" rel="stylesheet">

<link href="<?php echo base_url();?>css/style.css" rel="stylesheet">
<link href="<?php echo base_url();?>css/responsive.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
<link href="<?php echo base_url();?>css/nouislider.css" rel="stylesheet">
<link href="<?php echo base_url();?>css/jquery.fancybox.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/timepicker/jquery.timepicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/timepicker/bootstrap-datepicker.css" />

 <link rel="style" src="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="<?php echo base_url();?>js/jquery.min.js"></script>  
<script src="<?php echo base_url();?>js/jquery.cookie.js"></script>
<script src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>

<script src="<?php echo base_url();?>js/nouislider.min.js"></script>


<script type="text/javascript">var switchTo5x=true;</script>
 				
<script>
$( document ).ready(function() {

if($('.alert-success').css('display')=='block'){ 
setTimeout(function() {
//$('.alert-success').css({"top": "-73px"});  
$('.alert-success').slideUp("slow");  
}, 5000);  
}
$( ".message" ).click(function() {
//$( this ).css({"top": "-73px"});
$(this).slideUp("slow");
});
});
</script>
 						
<script>
	var base_url = '<?php echo base_url();?>';
	var site_url = '<?php echo site_url();?>';
</script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<?php echo $header; ?>

<div style="" id="ripMainContent">
<?php  echo $main_content; ?>
</div>	


<?php echo $footer; ?>

<script type="text/javascript">
	$(document).ready(function() {
		ripHeight = $(window).height() - $('#top').height() - $('footer').height();
		$('#ripMainContent').css('min-height', ripHeight);
	});
</script>
 
<div class="rip_loader">
<div class="cssload-clock"></div>
</div>
<script type="text/javascript">
	function show_loader() {
		$('.rip_loader').show();
	}
	function hide_loader() {
		$('.rip_loader').hide();
	}
</script>

</body>
</html>
