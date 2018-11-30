<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    
                    <h1><?php echo EDIT_REFFERAL_SETTING; ?></h1>
                </div>
                <div class="page-header border"></div>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo site_url();?>admin/home/dashboard">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> <?php echo EDIT_REFFERAL_SETTING; ?>
                    </li>
                </ol>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <?php 
				if($msg == 'update')
					{	?>
						
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
								
				    $refferal = array('name' => 'frm_listadmin', 'class' => 'site-setting' , 'enctype' => 'multipart/form-data' );	
				    echo form_open('admin/refferal_setting/edit_refferal_setting/',$refferal);
                                                                 
				 ?>   
                 <input type="hidden" name="id"  value="<?php echo $id;?>"/>
               
            <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo BASIC_REFFERAL_SETTING; ?>
                        </div>
                        <div class="panel-body">
                           
                            	<div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo REFFERAL_MODE; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                    	<select class="form-control" name="refferal_status">
                                                 <option value="0" <?php if($refferal_status == 0) { echo "selected"; } ?> ><?php echo DISABLE; ?></option>
                                                 <option value="1" <?php if($refferal_status == 1) { echo "selected"; } ?>><?php echo ENABLE; ?></option>
                                         </select>
                                    </div>
                                </div>
                                
                           <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo REFFERAL_CREATE_EVENT_COMMISION; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="event_create_comission" value="<?php echo $event_create_comission;?>">
                                    </div>
                              </div>
                             <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo REFFERAL_BUY_TICKET_COMMISION; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="ticket_purchase_comission" value="<?php echo $ticket_purchase_comission ;?>">
                                    </div>
                             </div>
                                
                                
                            
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo WITHDRWAL_REFFERAL_MINIMUM_AMOUNT; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="refferal_amount" value="<?php echo $refferal_amount;?>">
                                    </div>
                                </div>
                        </div>
                   	
                 </div>
                 	<?php if(DEMO_MODE=="0"){ ?>
                 	<div class="text-center mb20">
                 		<button type="submit" class="btn btn-default btn-lg"><?php echo UPDATE_REFERRAL_SETTING; ?></button>
                        </div>
                    <?php } ?>    
                </div><!-- end of col-lg-12  -->
           
            </div>
            
            </form>
            <!-- end of form -->
</div>
</div>
        <!-- end of page-wrapper -->
</body>

</html>
