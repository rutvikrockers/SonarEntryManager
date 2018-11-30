<?php 

	$event_type_name = $event_type['event_type_name'];
	$event_type_status = $event_type['event_type_status'];
	$event_type_description = $event_type['event_type_description'];
	$event_type_image = $event_type['event_type_image'];
	

?>  
  
  <div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class=" col-xs-12 clearfix">
                    <h1><?php echo EVENT_TYPE; ?>  -  <?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></h1>
                </div>
                <div class="page-header border"></div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <div class="row">
            	
                <div class="col-xs-12 clearfix">
                	<div class="panel panel-default">
                          
                          <div class="panel-heading"><?php echo EVENT_TYPE_DETAILS; ?></div>
                         
                          <ul class="list-group">
                            <li class="list-group-item"><?php echo EVENT_TYPE_NAME; ?> : <?php echo SecureShowData($event_type_name); ?></li>
                            <li class="list-group-item"><?php echo EVENT_TYPE_STATUS; ?> : <?php if($event_type_status == 1){ echo ACTIVE; }else{ echo INACTIVE; } ?></li>
                            <li class="list-group-item"><?php echo EVENT_TYPE_DESCRIPTION; ?> : <?php echo SecureShowData($event_type_description); ?></li>
                            <li class="list-group-item"><?php echo EVENT_TYPE_IMAGE; ?> : 
                            <?php if(file_exists('upload/event_type_default/'.$event_type_image)) { ?>
                            <img src="<?php echo base_url(); ?>upload/event_type_default/<?php echo SecureShowData($event_type_image); ?>" alt=" " height="150" width="190" >
                            <?php }else { ?>
                            <img src="<?php echo base_url(); ?>upload/event_type_default/no_img.jpg" alt=" " height="150" width="190" >
                            <?php } ?></li>
                          </ul>
                        </div>
                </div><!-- col-lg-8  -->
                                
            </div>
           
            </div>
        </div>
</body>

</html>
