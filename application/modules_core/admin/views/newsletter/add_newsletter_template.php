<script type="text/javascript">
function goBack() {
    window.history.back();
    }
</script>
<script src="<?php echo base_url();?>ckeditor/ckeditor.js"></script> 
<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo NEW_NEWSLETTER_TEMPLATE; ?></h1>
                </div>
                <div class="page-header border"></div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <?php 
				if($error!= '')
				{ ?>
					
                    		<div class="alert alert-danger" role="alert">
							<button class="close" data-dismiss="alert">x</button>
							<strong><?php echo ERRORS; ?>!</strong> <?php echo $error;?>
                            </div> 
				<?php } ?>   
                <?php
								
								$attributes = array('name' => 'frm_listadmin', 'class' => 'site-setting', 'enctype' => 'multipart/form-data');	
								echo form_open('admin/newsletter/add_newsletter_template/',$attributes);

				 ?>   
                   
			  <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                        <div class="panel-body">
                            
                            	<div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo SUBJECT; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                    	<input class="form-control" type="text" name="subject">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo CONTENT; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<textarea name="template_content" id="template_content"></textarea>
											<script type="text/javascript">
                                                CKEDITOR.replace('template_content');
                                            </script>
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo FILE_UPLOAD; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input type="file" name="attach_file">
                                         
                                    </div>	
                                </div>
                        </div>
                   	
                 </div>
                 
                 
                 	
                </div><!-- col-lg-12  -->
           
            </div>
           		<div class="text-center">
                   <button type="submit" class="btn btn-default btn-lg"><?php echo CREATE_NEWSLETTER_TEMPLATE; ?></button>
                   <button type="button" class="btn btn-default btn-lg" onclick="goBack()"><?php echo CANCEL; ?></button>
            	</div>
            </form>
</div>
</div>
        <!-- /#page-wrapper -->
</body>

</html>
