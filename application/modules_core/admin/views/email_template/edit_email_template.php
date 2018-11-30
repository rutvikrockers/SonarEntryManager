<script type="text/javascript">
  function goBack() {
    window.history.back();
  }
</script>
        <div id="page-wrapper">
            <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo EDIT_EMAIL_TEMPLATE; ?></h1>
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
								
							$attributes = array('name' => 'frm_listadmin', 'class' => 'site-setting');	
							echo form_open('admin/email_template/edit_email_template/'.$id,$attributes);

				 ?>   
                   
			  <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                        <div class="panel-body">
                                
                            	<div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo FORM_NAME; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="from_name" value="<?php echo SecureShowData($from_name); ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo FORM_ADDRESS; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="from_address" value="<?php echo SecureShowData($from_address); ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo REPLY_ADDRESS; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="reply_address" value="<?php echo SecureShowData($reply_address); ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo SUBJECT; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="subject" value="<?php echo SecureShowData($subject); ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo MESSAGE; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<textarea name="message" id="message"><?php echo SecureShowData($message); ?></textarea>
                                    </div>
                                </div>
                        </div>
                   	
                 </div>
                </div><!-- col-lg-12  -->
           
            </div>
            
           		<div class="text-center">
                <?php if(DEMO_MODE=="0"){ ?>
                   <button type="submit" class="btn btn-default btn-lg"><?php echo UPDATE_TEMPLATE; ?></button>
                <?php } ?>
                   <button type="button" class="btn btn-default btn-lg" onclick="goBack()">Cancel</button>
            	</div>
            </form>
        </div>
        </div>
        <!-- /#page-wrapper -->
</body>

</html>
   <!-- BEGIN JAVASCRIPTS -->    
   <script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
 <script>
CKEDITOR.replace( 'message',{
                     allowedContent: true,
                    filebrowserBrowseUrl :'<?php echo base_url();?>ckeditor/filemanager/browser/default/browser.html?Connector=<?php echo base_url(); ?>ckeditor/filemanager/connectors/php/connector.php',
                    filebrowserImageBrowseUrl : '<?php echo base_url(); ?>ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=<?php echo base_url(); ?>ckeditor/filemanager/connectors/php/connector.php',
                    filebrowserFlashBrowseUrl :'<?php echo base_url(); ?>ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=<?php echo base_url(); ?>ckeditor/filemanager/connectors/php/connector.php',
                    filebrowserUploadUrl  :'<?php echo base_url(); ?>ckeditor/filemanager/connectors/php/upload.php?Type=File', 
                    filebrowserImageUploadUrl : '<?php echo base_url(); ?>ckeditor/filemanager/connectors/php/upload.php?Type=Image',
                    filebrowserFlashUploadUrl : '<?php echo base_url();?>ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
                });



        </script>