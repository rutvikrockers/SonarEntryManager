<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                <?php if($id=='')
            {
                $head_name=NEW_COUNTRY;
            }else
            {
                $head_name=EDIT_COUNTRY;
            }
                ?>
                    <h1><?php echo $head_name; ?></h1>
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
								echo form_open('admin/country/add_country/'.$id,$attributes);

				 ?>   
                   
			  <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                        <div class="panel-body">
                             
                          
                               
                            <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo COUNTRY_NAME; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="country_name" value="<?php echo SecureShowData($country_name); ?>">
                                    </div>
                                </div>
                                
                               
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo COUNTRY_STATUS; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                    	<select class="form-control" name="country_status">
                                                <option value="1" <?php if($active=='1') { echo "selected"; } ?> ><?php echo ACTIVE; ?></option>
                                            	<option value="0" <?php if($active=='0') { echo "selected"; } ?> ><?php echo INACTIVE; ?></option>
                                        </select>
                                    </div>
                                </div>
                                

                             
                        </div>
                	 </div>
                </div><!-- col-lg-12  -->
            </div>
            <?php if(DEMO_MODE=="0"){ ?>
            <?php if($id=='')
            {
                $btn_name=CREATE_COUNTRY;
            }else
            {
                $btn_name=UPDATE_COUNTRY;
            }
           		?><div class="text-center">
                   <button type="submit" class="btn btn-default btn-lg"><?php echo $btn_name;?></button>
                   <a href="<?php echo site_url();?>admin/country/country_list" class="btn btn-default btn-lg"> <?php echo CANCEL; ?></a>
            	</div>
            <?php } ?>
            </form>
</div>
</div>
        <!-- /#page-wrapper -->
</body>
</html>
