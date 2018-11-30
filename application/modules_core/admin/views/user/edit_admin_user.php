        <div id="page-wrapper">
            <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo EDIT_ADMIN_USER; ?></h1>
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
            <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                        <div class="panel-heading">
                           <?php echo ADMIN_DETAILS; ?>
                        </div>
                        <div class="panel-body">
                            
                            <?php
								
								$attributes = array('name' => 'frm_listadmin', 'class' => 'site-setting');	
								echo form_open('admin/admin_user/edit_admin_user/'.$id,$attributes);

				 			 ?>     
                                
                            	<div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo EMAIL; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="email" value="<?php echo SecureShowData($email); ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo USERNAME; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="username" value="<?php echo SecureShowData($username); ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo ADMIN_TYPE; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                    	<select class="form-control" name="admin_type">
                                        		<?php if($admin_type=='1') { ?>
                                                <option value="1" <?php if($admin_type=='1'){ echo "selected"; } ?>><?php echo SUPER_ADMIN;?></option>
                                                <?php }else  {  ?>
                                            	<option value="0" <?php if($admin_type=='0'){ echo "selected"; } ?>><?php echo ADMIN;?></option>
                                                <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo STATUS; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                    	<select class="form-control" name="status">
                                                <option value="1" <?php if($active=='1'){ echo "selected"; } ?>><?php echo ACTIVE;?></option>
                                            	<option value="0" <?php if($active=='0'){ echo "selected"; } ?>><?php echo INACTIVE;?></option>
                                        </select>
                                    </div>
                                </div>
                               
                               
                                
                                <div class="text-center">
                                <?php if(DEMO_MODE=="0"){ ?>
                                <button type="submit" class="btn btn-default btn-lg"><?php echo  UPDATE_ADMIN_USER; ?></button>
                                 <a href="<?php echo site_url();?>admin/admin_user/list_admin" class="btn btn-default btn-lg"> <?php echo CANCEL; ?></a>
                                <?php } ?>
                                
                                </div>
                            </form>
                        </div>
                   	
                 </div>
                 
                 <?php if($admin_id==$id ){?>
                 <div class="panel panel-default">
                        <div class="panel-heading">
                           <?php echo CHANGE_PASSWORD; ?>
                        </div>
                        <div class="panel-body">
                            
                            <?php
                                
                                $attributes = array('name' => 'frm_listadmin', 'class' => 'site-setting' );  
                                echo form_open('admin/admin_user/change_password/'.$id,$attributes);

                             ?>     
                               
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo OLD_PASSWORD; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="password" name="old_password" value="" id='old_password' >
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo NEW_PASSWORD; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="password" name="new_password" id="new_password" value="">
                                    </div>
                                </div>
                                  <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo CONFIRM_PASSWORD; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="password" name="confirm_password" id="confirm_password" value="">
                                    </div>
                                </div>
                                
                                
                                
                                <div class="text-center">
                                <button type="submit" onclick="return match_password() "  class="btn btn-default btn-lg"><?php echo  CHANGE_PASSWORD; ?></button>
                                <a href="<?php echo site_url();?>admin/admin_user/list_admin" class="btn btn-default btn-lg"> <?php echo CANCEL; ?></a>
                                </div>
                            </form>
                        </div>
                    
                 </div>
                 <?php }elseif ($admin_type==0 && $this->session->userdata('admin_type')==1) { ?>

                   <div class="panel panel-default">
                        <div class="panel-heading">
                         <?php echo UPDATE.' '.PASSWORD; ?>
                        </div>
                        <div class="panel-body">
                            
                            <?php
                                
                                $attributes = array('name' => 'frm_listadmin', 'class' => 'site-setting' );  
                                echo form_open('admin/admin_user/update_password/'.$id,$attributes);

                             ?>     
                               
                            
                                
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo NEW_PASSWORD; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="password" name="new_password" id="new_password" value="">
                                    </div>
                                </div>
                                
                                
                                <div class="text-center">
                                <?php if(DEMO_MODE=="0"){ ?>
                                <button type="submit"  class="btn btn-default btn-lg"><?php echo UPDATE.' '.PASSWORD; ?></button>
                                <?php } ?>
 <a href="<?php echo site_url();?>admin/admin_user/list_admin" class="btn btn-default btn-lg"> <?php echo CANCEL; ?></a>
                                </div>
                            </form>
                        </div>
                    
                 </div>

                   <?php } ?>
                 	
                </div><!-- col-lg-12  -->
           
            </div>
            <!-- /.row -->
        </div>
        </div>
        <!-- /#page-wrapper -->

<script type="text/javascript">
    function match_password ()
     {
               var old_password=   $('#old_password').val();
               var new_password=   $('#new_password').val();
               var confirm_password=   $('#confirm_password').val();
               $('.has-error').removeClass('has-error');
               if(old_password.trim()==''){
                  alert('Old password required..!')
                 $('#old_password').parent().addClass('has-error');
                return false;
               }
                if(new_password.trim()==''||confirm_password.trim()==''){
                    alert('Both password field are required..!');
                    $('#new_password').parent().addClass('has-error');
                    $('#confirm_password').parent().addClass('has-error');
                    return false;
                }
               if(new_password!=confirm_password){
                    alert('Confirm password did not match..!');
                    $('#confirm_password').parent().addClass('has-error');

                    return false;

               }

    }
</script>
