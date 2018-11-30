<script src="<?php echo base_url();?>js/redactor/redactor.js"></script>
<link href="<?php echo base_url();?>css/redactor.css" rel="stylesheet" />
    
<script type="text/javascript">
    $(document).ready(function(){
        
      
        /*
         Name:Kalpesh Patel
         Use:For creating slug
         */
        $("#page_title").keyup(function(){
                var Text = $(this).val();
                Text = Text.toLowerCase();
                Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
                $("#slug").val(Text);        
        });
        
        
        /*
         Name:Kalpesh Patel
         Use:For validating page fields
         */
        $( "#site-setting1" ).submit(function(event){ 
          
         var title = $('#page_title').val();
         var slug = $('#slug').val();
         var content = $('#content').val();
         
         
            if(!title){
                                $('#page_title').closest('.col-sm-9').addClass('has-error');
                $('#page_title').closest('label').addClass('control-label');
                $('#page_title').addClass('form-control');
                                
                return false;
            } 
                        
        else if(!slug){
                                
                $('#slug').closest('.col-sm-9').addClass('has-error');
                $('#slug').closest('label').addClass('control-label');
                $('#slug').addClass('form-control');
                return false;
                
            }
               else if(!content){
            
                $('#content').closest('.col-sm-9').addClass('has-error');
                $('#content').closest('label').addClass('control-label');
                $('#content').addClass('cke_inner cke_reset');
                return false;
                
            }         
        });
        
    });
</script>
        <div id="page-wrapper">
            <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo EDIT_PAGE; ?></h1>
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
								echo form_open('admin/pages/edit_pages/'.$id,$attributes);

				 ?>   
                   
			  <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                        <div class="panel-body">
                                
                            	<div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo PAGE_TITLE; ?><em style="color: red">*</em></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="page_title" value="<?php echo SecureShowData($pages_title); ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo SLUG; ?><em style="color: red">*</em></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="slug" value="<?php echo SecureShowData($slug); ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo CONTENT; ?><em style="color: red">*</em></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<textarea name="content" id="content"><?php echo SecureShowData($content); ?></textarea>
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo STATUS; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="active">
                                                <option value="0" <?php if($active == '0'){ echo "selected"; } ?> ><?php echo INACTIVE; ?></option>
                                                <option value="1" <?php if($active == '1'){ echo "selected"; } ?>><?php echo ACTIVE; ?></option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo FOOTER_MENU; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                    	<select class="form-control" name="footer_menu">
                                                <option value="1" <?php if($footer_bar == '1'){ echo "selected"; } ?> ><?php echo YES; ?></option>
                                            	<option value="0" <?php if($footer_bar == '0'){ echo "selected"; } ?>><?php echo NO; ?></option>
                                        </select>
                                    </div>
                                </div>
                        </div>
                   	
                 </div>
                 
                 
                 	
                </div><!-- col-lg-12  -->
           
            </div>
            
              <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                        <div class="panel-heading">
                          	<?php echo FOOTER_OPTIONS; ?>                        
                        </div>
                        
                        <div class="panel-body">
                        	<div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo PLAN_EVENTS; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                    	<select class="form-control" name="plan_events">
                                                <option value="1" <?php if($plan == 1){ echo "selected"; } ?>><?php echo YES; ?></option>
                                            	<option value="0" <?php if($plan == 0){ echo "selected"; } ?>><?php echo NO; ?></option>
                                        </select>
                                    </div>
                                </div>
                            
                            <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo USING; ?> <?php echo SecureShowData($site_setting['site_name']);?></label>
                                    </div>
                                    <div class="col-sm-4">
                                    	<select class="form-control" name="using_halfevent">
                                                <option value="1" <?php if($using_halfevent == 1){ echo "selected"; } ?>><?php echo YES; ?></option>
                                            	<option value="0" <?php if($using_halfevent == 0){ echo "selected"; } ?>><?php echo NO; ?></option>
                                        </select>
                                    </div>
                                </div>    
                        	
                            <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo ABOUT; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                    	<select class="form-control" name="about">
                                                <option value="1" <?php if($about == 1){ echo "selected"; } ?>><?php echo YES; ?></option>
                                            	<option value="0" <?php if($about == 0){ echo "selected"; } ?>><?php echo NO; ?></option>
                                        </select>
                                    </div>
                                </div>
                                
                        </div>
                   	
                 </div>
                </div>
           
            </div>	
            
            <?php if(DEMO_MODE=="0"){ ?>
           		<div class="text-center">
                   <button type="submit" class="btn btn-default btn-lg"><?php echo UPDATE_PAGE;?></button>
                    <a href="<?php echo site_url();?>admin/pages/list_pages" class="btn btn-default btn-lg"> <?php echo CANCEL; ?></a>
            	</div>
            <?php } ?> 
            </form>
        </div>
        </div>
        <!-- /#page-wrapper -->
</body>

</html>
<script>
    $(document).ready(function() {
    $('#slug').keyup(function(){
          $('#slug').val($.trim($('#slug').val()));
     
});
});
</script>
   <!-- BEGIN JAVASCRIPTS -->    
   <script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
 <script>
CKEDITOR.replace( 'content',{
                     allowedContent: true,
                    filebrowserBrowseUrl :'<?php echo base_url();?>ckeditor/filemanager/browser/default/browser.html?Connector=<?php echo base_url(); ?>ckeditor/filemanager/connectors/php/connector.php',
                    filebrowserImageBrowseUrl : '<?php echo base_url(); ?>ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=<?php echo base_url(); ?>ckeditor/filemanager/connectors/php/connector.php',
                    filebrowserFlashBrowseUrl :'<?php echo base_url(); ?>ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=<?php echo base_url(); ?>ckeditor/filemanager/connectors/php/connector.php',
                    filebrowserUploadUrl  :'<?php echo base_url(); ?>ckeditor/filemanager/connectors/php/upload.php?Type=File', 
                    filebrowserImageUploadUrl : '<?php echo base_url(); ?>ckeditor/filemanager/connectors/php/upload.php?Type=Image',
                    filebrowserFlashUploadUrl : '<?php echo base_url();?>ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
                });



        </script>