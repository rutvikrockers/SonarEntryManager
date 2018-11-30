<script type="text/javascript">
function goBack() {
    window.history.back();
    }
</script>
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
                <div class="col-lg-12">
                    <h1><?php echo MAINTENANCE; ?> <small><?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></small></h1>
                </div>
                <div class="page-header border"></div>
                 <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo site_url();?>admin/home/dashboard">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-gears"></i> <?php echo ADMIN;?> <?php echo MAINTENANCE;?>
                    </li>
                </ol>
        </div>
         <?php 
                if($msg == 'update')
                    {   ?>
                        
                            <div class="alert alert-success" role="alert">
                            <button class="close" data-dismiss="alert">x</button>
                            <strong><?php echo SUCCESS; ?>!</strong> <?php echo RECORD_HAS_BEEN_SUCCESSFULLY_UPDATED;?>
                            </div>
            
            <?php } ?>

            <?php 
                if($error!= '')
                { ?>
                    
                            <div class="alert alert-danger" role="alert">
                            <button class="close" data-dismiss="alert">x</button>
                            <strong><?php echo ERRORS; ?>!</strong> <?php echo $error;?>
                            </div> 
                <?php } ?> 
        <?php
            $attributes = array('name' => 'frm_listadmin', 'class' => 'site-setting' , 'enctype' => 'multipart/form-data' );    
            echo form_open('admin/preferences/maintenance_setting/',$attributes);
        ?> 
         <input type="hidden" name="id"  value="<?php echo $id;?>"/>
        <div class="row">
        	<div class="col-lg-12 clearfix">
        		<div class="panel panel-default">
        			<div class="panel-heading">
                            <i class="fa fa-gears"></i> GENERAL
                     </div>
                   <div class="panel-body">
                   		 <div class="form-group clearfix">
	                        <div class="col-sm-3">
	                            <label><?php echo MAINTENANCE_MODE; ?></label>
	                        </div>
	                        <div class="col-sm-6">
                                <select class="form-control" name="site_mode">
                                    <option value="" style="display: none;">Select Site Mode</option>
                                     <option value="0" <?php if($site_mode == 0) { echo "selected"; } ?>>Deactivate</option>
                                     <option value="1" <?php if($site_mode == 1) { echo "selected"; } ?>>Activate</option>
                               </select>
                               <label style="font-size: 11px;">Activate or deactivate your Site (It is a good idea to Activate your site while you perform maintenance. Please note that the webservice will not be disabled).</label>
	                    	</div>
                   		</div>

                   		<div class="form-group clearfix">
	                        <div class="col-sm-3">
	                            <label><?php echo MAINTENANCE_IP; ?></label>
	                        </div>
	                        <div class="col-sm-6">
                                <input class="form-control" type="text" name="ip_address" value="<?php echo $ip_address; ?>">
                                <label style="font-size: 11px;">Your IP Address : <?php echo  $_SERVER['REMOTE_ADDR']; ?></label>
                                
	                    	</div>
                   		</div>
                   		
        		</div>
        	</div>
        	<div class="text-center mb20">
            <?php if(DEMO_MODE=="0"){ ?>
                <button type="submit" class="btn btn-default btn-lg"><i class="fa fa-floppy-o"></i> Save</button>
            <?php } ?>
                        <button type="button" class="btn btn-default btn-lg" onclick="goBack()"><?php echo CANCEL; ?></button>
            </div>
        </div>
        </form>
	</div>
</div>