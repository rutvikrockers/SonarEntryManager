<script src="<?php echo base_url();?>ckeditor/ckeditor.js"></script> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/validation.css"/>

<div id="page-wrapper">
	<div class="container-fluid">
	<div class="row">
                <div class="col-lg-12">
                    <h1><?php echo EDIT_FOOTER_MASTER; ?></h1>
                </div>
                <div class="page-header border"></div>
                <!-- /.col-lg-12 -->
    </div>

    <?php
		$attributes = array('name' => 'frm_listadmin', 'class' => 'site-setting');	
		echo form_open('admin/email_template/footer_email_template/',$attributes);
	?>  
	<input type="hidden" name="id"  value="<?php echo $id;?>"/>
	<div class="row">
		<div class="col-lg-12 clearfix">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="form-group clearfix">
						<div class="col-sm-3">
                            <label><?php echo FOOTER_MESSAGE; ?><em style="color: red">*</em></label>
                        </div>
                        <div class="col-sm-9">
                        	<textarea name="footer_content" id="footer_content"><?php echo SecureShowData($footer_content); ?></textarea>
											<script type="text/javascript">
                                                CKEDITOR.replace('footer_content');
                                            </script>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php if(DEMO_MODE=="0"){ ?>
	<div class="text-center">
                   <button type="submit" class="btn btn-default btn-lg"><?php echo UPDATE_FOOTER_MASTER;?></button>
            	</div>
    <?php } ?>
	</form>
</div>
</div>