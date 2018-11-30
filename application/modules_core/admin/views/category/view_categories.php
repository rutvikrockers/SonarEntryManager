<?php 

	$category_name = $category['category_name'];
	$category_status = $category['category_status'];
	$category_description = $category['category_description'];
	$category_image = $category['category_image'];
	

?>  
  
  <div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class=" col-xs-12 clearfix">
                    <h1><?php echo CATEGORY; ?>  -  <?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></h1>
                </div>
                <div class="page-header border"></div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <div class="row">
            	
                <div class="col-xs-12 clearfix">
                	<div class="panel panel-default">
                          
                          <div class="panel-heading"><?php echo CATEGORIE_DETAILS; ?></div>
                         
                          <ul class="list-group">
                            <li class="list-group-item"><?php echo CATEGORY_NAME; ?> : <?php echo SecureShowData($category_name); ?></li>
                            <li class="list-group-item"><?php echo CATEGORY_STATUS; ?> : <?php if($category_status == 1){ echo ACTIVE; }else{ echo INACTIVE; } ?></li>
                            <li class="list-group-item"><?php echo CATEGORY_DESCRIPTION; ?> : <?php echo SecureShowData($category_description); ?></li>
                            <li class="list-group-item"><?php echo CATEGORY_IMAGE; ?> : 
                            <?php if(file_exists('upload/category_default/'.$category_image)) { ?>
                            <img src="<?php echo base_url(); ?>upload/category_default/<?php echo SecureShowData($category_image); ?>" alt=" " height="150" width="190" >
                            <?php }else { ?>
                            <img src="<?php echo base_url(); ?>upload/category_default/no_img.jpg" alt=" " height="150" width="190" >
                            <?php } ?></li>
                          </ul>
                        </div>
                </div><!-- col-lg-8  -->
                                
            </div>
           
            </div>
        </div>
</body>

</html>
