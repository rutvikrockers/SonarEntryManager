<?php 
	
	$from_name=$template['from_name'];
	$from_address=$template['from_address'];
	$reply_address=$template['reply_address'];
	$message=$template['message'];
    $task=$template['task'];
	
?>

<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class=" col-xs-12 clearfix">
                    <h1><?php echo EMAIL_TEMPLATES; ?> - <?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></h1>
                </div>
                <div class="page-header border"></div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <div class="row">
            	
                <div class="col-xs-12 clearfix">
                	<div class="panel panel-default">
                          
                          <div class="panel-heading"><?php echo YOUR_TICKETS_FROM_SITE_NAME; ?></div>
                         
                          <ul class="list-group">
                            <li class="list-group-item"><?php echo TITLE; ?> : <?php echo SecureShowData($task); ?></li>
                            <li class="list-group-item"><?php echo FORM_NAME; ?> : <?php echo SecureShowData($from_name); ?></li>
                            <li class="list-group-item"><?php echo FORM_ADDRESS; ?> : <?php echo SecureShowData($from_address); ?></li>
                            <li class="list-group-item"><?php echo REPLY_ADDRESS; ?> : <?php echo SecureShowData($reply_address); ?></li>
                            <li class="list-group-item"><?php echo MESSAGE; ?> : <?php echo SecureShowData($message); ?></li>
                            
                            
                          </ul>
                        </div>
                </div><!-- col-lg-8  -->
                                
            </div>
           
            </div>
        </div>
</body>

</html>
