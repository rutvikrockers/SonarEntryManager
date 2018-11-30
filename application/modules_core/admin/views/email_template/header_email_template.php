<script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/validation.css"/>

<div id="page-wrapper">
	<div class="container-fluid">
	<div class="row">
                <div class="col-lg-12">
                    <h1><?php echo EDIT_HEADER_MASTER; ?></h1>
                </div>
                <div class="page-header border"></div>
                <!-- /.col-lg-12 -->
    </div>

    <?php
		$attributes = array('name' => 'frm_listadmin', 'class' => 'site-setting');	
		echo form_open('admin/email_template/header_email_template/',$attributes);
	?>  
	<input type="hidden" name="id"  value="<?php echo $id;?>"/>
	<div class="row">
		<div class="col-lg-12 clearfix">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="form-group clearfix">
						<div class="col-sm-3">
                            <label><?php echo HEADER_MESSAGE; ?><em style="color: red">*</em></label>
                        </div>
                        <div class="col-sm-9">
                        	<textarea name="header_content" id="header_content">
                        		<?php echo SecureShowData($header_content);?>
                        	</textarea>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
  <?php if(DEMO_MODE=="0"){ ?>
	<div class="text-center">
                   <button type="submit" class="btn btn-default btn-lg"><?php echo UPDATE_HEADER_MASTER;?></button>
            	</div>
  <?php } ?>
	</form>
</div>
</div>
<script>
    CKEDITOR.replace( 'header_content',{
      allowedContent: true,
      extraAllowedContent : '*(*);*{*}',
      baseUrl : "<?php echo base_url(); ?>upload/editor/images/",
      baseDir : "<?php echo $base_path; ?>",
      filebrowserBrowseUrl :'<?php echo base_url();?>ckeditor/filemanager/browser/default/browser.html?Connector=<?php echo base_url(); ?>ckeditor/filemanager/connectors/php/connector.php',
      filebrowserImageBrowseUrl : '<?php echo base_url(); ?>ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=<?php echo base_url(); ?>ckeditor/filemanager/connectors/php/connector.php',
      filebrowserFlashBrowseUrl :'<?php echo base_url(); ?>ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=<?php echo base_url(); ?>ckeditor/filemanager/connectors/php/connector.php',
  		filebrowserUploadUrl  :'<?php echo base_url(); ?>ckeditor/filemanager/connectors/php/upload.php?Type=File', 
  		filebrowserImageUploadUrl : '<?php echo base_url(); ?>ckeditor/filemanager/connectors/php/upload.php?Type=Image',
  		filebrowserFlashUploadUrl : '<?php echo base_url();?>ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
  	});
		</script>