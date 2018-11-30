<script src="<?php echo base_url();?>ckeditor/ckeditor.js"></script> 
<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo EDIT_TIP; ?></h1>
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
								echo form_open('admin/tips/edit_tips/'.$id,$attributes);

				 ?>   
                   
			  <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                    <div class="panel-heading">
                          			<?php echo TIP; ?>                      
                            </div>
                        <div class="panel-body">
                            
                            	<div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo TIP_TYPE; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                    	<select class="form-control" name="tip_type">
                                                <option value="Expert Tip" <?php if($tip_type == 'Expert Tip') { echo "selected";}?>><?php echo EXPERT_TIP; ?></option>
                                            	<option value="Ticket Tip" <?php if($tip_type == 'Ticket Tip') { echo "selected";}?>><?php echo TICKET_TIP; ?></option>
                                                <option value="Promote Tip" <?php if($tip_type == 'Promote Tip') { echo "selected";}?>><?php echo PROMOTE_TIP; ?></option>
                                        </select>
                                    </div>
                                </div>
                                
                            	<div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo TITLE; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="title" value="<?php echo SecureShowData($title);?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo DESCRIPTION; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<textarea name="description" id="description"><?php echo SecureShowData($description);?></textarea>
											<script type="text/javascript">
                                                CKEDITOR.replace('description');
                                            </script>
                                    </div>
                                </div>
                        </div>
                   	
                 </div>
                 
                 
                 	
                </div><!-- col-lg-12  -->
           
            </div>
            <?php if(DEMO_MODE=="0"){ ?>
           		<div class="text-center">
                   <button type="submit" class="btn btn-default btn-lg"><?php echo UPDATE_TIP;?></button>
                    <a href="<?php echo site_url();?>admin/tips/list_tips" class="btn btn-default btn-lg"> <?php echo CANCEL; ?></a>
            	</div>
            <?php } ?>
            </form>
</div>
</div>
        <!-- /#page-wrapper -->
</body>

</html>
