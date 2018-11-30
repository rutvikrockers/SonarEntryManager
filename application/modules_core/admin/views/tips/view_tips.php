<?php 

	$title = $tips['title'];
	 $description = $tips['description'];
	
?>  
<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class=" col-xs-12 clearfix">
                    <h1><?php echo TIP; ?>  -  <?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></h1>
                </div>
                <div class="page-header border"></div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <div class="row">
            	
                <div class="col-xs-12 clearfix">
                	    <div class="panel panel-default">
                          
                          <div class="panel-heading"><?php echo TIP_DETAILS; ?></div>
                         
                          <ul class="list-group">
                            <li class="list-group-item"><?php echo TITLE; ?> : <?php echo SecureShowData($title); ?></li>
                            <li class="list-group-item"><?php echo DESCRIPTION; ?> : <?php echo SecureShowData($description); ?></li>
                          </ul>
                        </div>
                </div><!-- col-lg-8  -->
                                
            </div>
           
    </div>
</div>
</body>

</html>
