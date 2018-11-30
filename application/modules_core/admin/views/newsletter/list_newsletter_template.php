<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
               <div class="col-lg-8 col-xs-12 clearfix">
                    <h1><?php echo NEWSLETTER_TEMPLATE; ?> - <?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></h1>
                </div>
                <div class="col-lg-4 col-xs-12 clearfix mt20 text-right">
                	<a href="<?php echo base_url();?>admin/newsletter/add_newsletter_template" class="btn btn-primary"><?php echo NEW_NEWSLETTER_TEMPLATE; ?></a>
                </div>
                 <div class="page-header border clearfix"></div>
            </div>
            <!-- /.row -->
            <?php 
				if($msg == 'add')
					{	?>
						
                        	<div class="alert alert-success" role="alert">
							<button class="close" data-dismiss="alert">x</button>
							<strong><?php echo SUCCESS; ?>!</strong> <?php echo RECORD_HAS_BEEN_SUCCESSFULLY_ADDED;?>
                            </div>
                            
            <?php 
			} 
				if($msg == 'update')
					{	?>
						
                        	<div class="alert alert-success" role="alert">
							<button class="close" data-dismiss="alert">x</button>
							<strong><?php echo SUCCESS; ?>!</strong> <?php echo RECORD_HAS_BEEN_SUCCESSFULLY_UPDATED;?>
                            </div>
			
			<?php }
				if($msg == 'delete')
					{	?>
						
                        	<div class="alert alert-success" role="alert">
							<button class="close" data-dismiss="alert">x</button>
							<strong><?php echo SUCCESS; ?>!</strong> <?php echo RECORD_HAS_BEEN_SUCCESSFULLY_DELETED;?>
                            </div>
			<?php } ?>
            
            <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                            
                            <div class="table-responsive">
                            
                                  <table class="table table-striped table-bordered table-hover" id="sample_1">
                                    <thead>
                                        <tr>
                                            <th><?php echo SUBJECT; ?></th>
                                            <th><?php echo CONTENT; ?></th>
                                             <th><?php echo ACTION; ?></th
                                            <?php /*?><th><?php echo VIEW; ?></th><?php */?>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
										if($result)
											{
												foreach($result as $row)
													{
													
														$subject = $row['subject'];
														$template_content = $row['template_content'];
										
									?>	
                                        <tr class="odd gradeX">
                                            <td><?php echo SecureShowData($subject); ?></td>
                                            <td><?php echo SecureShowData($template_content); ?></td>
                                            <td><?php echo anchor('admin/newsletter/edit_newsletter_template/'.$row['id'].'/',EDIT)?>/<!-- 
                                            <?php echo anchor('admin/newsletter/edit_newsletter_template/'.$row['id'].'/',DELETE)?> --><a href="<?php echo site_url('admin/newsletter/delete_newsletter_template/'.$row['id']);?>"  onclick='return confirm("<?php echo ARE_YOU_SURE_YOU_WANT_TO_DELETE;?>");'><?php echo DELETE;?></a></td>
                                             <?php /*?><td><img src="<?php echo base_url();?>admin_images/event.png" alt=" " height=" " width=" "  /></td><?php */?>
                                        </tr>
                                    <?php 
													}
											}		
									?>    
                                    </tbody>
                                </table>
                            </div>   
                                
                                </div>
                         </div>
                   	</div>
                 </div>
                </div><!-- col-lg-8  -->
            	
                
            </div>
            <!-- /.row -->
</div>
</div>
        <!-- /#page-wrapper -->

    <!-- /#wrapper -->

  
</body>
<script>
$(document).ready(function(){
		$('#sample_1').dataTable();
		
	});
</script>
</html>
