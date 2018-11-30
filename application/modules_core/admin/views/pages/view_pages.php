<?php 

	$pages_title = $page['pages_title'];
	$description =SecureShowData($page['description']);
	$slug = $page['slug'];
	

?>  
  
  <div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class=" col-xs-12 clearfix">
                    <h1><?php echo PAGE_DETAIL; ?>  -  <?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></h1>
                </div>
                <div class="page-header border"></div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <div class="row">
            	
                <div class="col-xs-12 clearfix">
                	<div class="panel panel-default">
                          
                          <div class="panel-heading"><?php echo DETAILS; ?></div>
                         
                          <ul class="list-group">
                            <li class="list-group-item"><?php echo PAGE_TITLE; ?> : <?php echo SecureShowData($pages_title); ?></li>
                            <li class="list-group-item"><?php echo PAGE_LINK; ?> : <?php echo site_url('pages').'/'; ?><?php echo $slug; ?></li>
                            <li class="list-group-item"><?php echo CONTENT; ?> : <?php echo SecureShowData($description); ?></li>
                          </ul>
                        </div>
                </div><!-- col-lg-8  -->
                                
            </div>
           
            </div>
        </div>
</body>

</html>
