
<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                <?php if($id=='')
            {
                $head_name=NEW_STATE;
            }else
            {
                $head_name=EDIT_STATE;
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
								echo form_open('admin/country/add_state/'.$id,$attributes);

				 ?>   
                   
			  <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                        <div class="panel-body">
                             <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo COUNTRY_NAME; ?></label>
                                    </div>
                            <div class="col-sm-4">
                                     
                                       <select class="form-control" name="country_id">
                                       <option value=""><?php echo SELECT ?></option>
                                    <?php   foreach($countries as $row):?>
                                    <?php
                                         $c_id = $row['id'];
                                        $country_name = $row['country_name'];
                                        $selected='';
                                        if($country_id==$row['id']) {
                                        	$selected='selected="selected"';
                                        }
                                    ?>
                                    <option value="<?php echo $c_id;?>" <?php echo $selected; ?> ><?php echo SecureShowData($country_name);?></option>
                                    <?php endforeach;?>
                                    </select>
                                   
                                    </div>
                                    </div>


                               
                            <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo STATE_NAME; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="state_name" value="<?php echo SecureShowData($state_name); ?>">
                                    </div>
                                </div>
                                
                               
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo STATE_STATUS; ?></label>
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
            <?php if($id=='')
            {
                $btn_name=CREATE_STATE;
            }else
            {
                $btn_name=UPDATE_STATE;
            }
           		?><div class="text-center">
                   <button type="submit" class="btn btn-default btn-lg"><?php echo $btn_name;?></button>
                   <a href="<?php echo site_url();?>admin/country/state_list" class="btn btn-default btn-lg"> <?php echo CANCEL; ?></a>
            	</div>
            </form>
</div>
</div>
        <!-- /#page-wrapper -->

