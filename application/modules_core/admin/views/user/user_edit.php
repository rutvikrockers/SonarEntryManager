<style type="text/css">
    .red{
        color: red;
    }
</style>
<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo EDIT_USER; ?></h1>
                </div>
                <div class="page-header border"></div>
                
                
            </div>
            
            <?php 
				if($error!= '')
				{ ?>
					
                    		<div class="alert alert-danger" role="alert">
							<button class="close" data-dismiss="alert">x</button>
							<strong><?php echo ERRORS; ?>!</strong> <?php echo $error;?>
                            </div> 
				<?php } ?>
            <?php 
					$attributes = array('name' => 'frm_listadmin' , 'class' => 'site-setting');
					echo form_open('admin/admin_user/edit_user/'.$id ,$attributes);
			?>
            
            <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                        <div class="panel-heading">
                           <?php echo BASIC_INFORMATION; ?>
                        </div>
                        <div class="panel-body">
                        
                            <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo PREFIX; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="prefix" value="<?php echo SecureShowData($prefix); ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo FIRST_NAME; ?><span class="red">*</span></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="first_name" value="<?php echo SecureShowData($first_name); ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo LAST_NAME; ?><span class="red">*</span></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="last_name" value="<?php echo SecureShowData($last_name); ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo SUFFIX; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="suffix" value="<?php echo SecureShowData($suffix); ?>">
                                    </div>
                                </div>
                           
                        </div>
                   	
                 </div>
                </div>
           
            </div>
            
            
            <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                        <div class="panel-heading">
                          <?php echo OTHER_INFORMATION; ?>
                        </div>
                        <div class="panel-body">
                                
                            	<div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo EMAIL;?><span class="red">*</span></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="email" value="<?php echo SecureShowData($email); ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo HOME_PHONE;?><span class="red">*</span></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="home_phone" value="<?php echo SecureShowData($home_phone); ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo CELL_PHONE;?><span class="red">*</span></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="cell_phone" value="<?php echo SecureShowData($cell_phone); ?>">
                                    </div>
                                </div>
                                <!-- Code Added By Darshan -->
                                <div class="form-group clearfix">
                                   <div class="col-sm-3">
                                       <label><?php echo STATUS; ?></label>
                                   </div>
                                   <div class="col-sm-4">
                                       <select class="form-control" name="active">
                                               <option value="1" <?php if($active=='1'){ echo "selected"; } ?>><?php echo ACTIVE;?></option>
                                               <option value="0" <?php if($active=='0'){ echo "selected"; } ?>><?php echo INACTIVE;?></option>
                                               <option value="2" <?php if($active=='2'){ echo "selected"; } ?>><?php echo SUSPEND;?></option>
                                       </select>
                                   </div>
                               </div>
                               <!-- Code End by Darshan -->
                        </div>
                   	
                 </div>
                </div>
           
            </div>
            <?php if(DEMO_MODE=="0"){ ?>
            <div class="text-center">
                <button type="submit" class="btn btn-default btn-lg"><?php echo UPDATE_USER; ?></button>
                <a href="<?php echo site_url();?>admin/admin_user/list_users" class="btn btn-default btn-lg"> <?php echo CANCEL; ?></a>
            </div>
            <?php } ?>                    
           </form>
           
</div>            
</div>
        <!-- /#page-wrapper -->


</body>

</html>
