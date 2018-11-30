<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo ($meta_title!="")?strip_tags(str_replace(array('&nbsp;'),'',SecureShowData($meta_title))):":: Welcome to FundraisingScript ::"; ?></title>
<meta name="title" content="<?php echo SecureShowData(($meta_title!=""))?strip_tags(str_replace(array('&nbsp;'),'',SecureShowData($meta_title))):":: Welcome to FundraisingScript ::"; ?>" />
<meta name="description" content="<?php echo SecureShowData(($meta_description!=""))?strip_tags(str_replace(array('&nbsp;'),'',SecureShowData($meta_description))):"FundraisingScript"; ?>" />
<meta name="keywords" content="<?php echo SecureShowData(($meta_keyword!=''))?strip_tags(str_replace(array('&nbsp;'),'',SecureShowData($meta_keyword))):"FundraisingScript"; ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"/>

<!-- Bootstrap core CSS -->
<link href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>css/style.css" rel="stylesheet">
<link href="<?php echo base_url();?>css/responsive.css" rel="stylesheet">


</head>

<body>

<?php echo $header; ?>

	
<?php  echo $main_content; ?>


<?php echo $footer; ?>
 
 
</body>
</html>