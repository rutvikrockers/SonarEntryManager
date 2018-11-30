<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo EDIT_REFERRAL_SETTING; ?></h1>
                </div>
                <div class="page-header border"></div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
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
                               echo form_open('admin/site_setting/edit_referral_setting/',$attributes);

                 ?>   
                <input type="hidden" name="id"  value="<?php echo $id;?>"/>
                 
            <div class="row">
                <div class="col-lg-12 clearfix">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo BASIC_REFERRAL_SETTING; ?>
                        </div>
                        <div class="panel-body">
                           
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo SIGN_UP; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="sign_up" value="<?php echo $sign_up; ?>">
                                    </div>
                                </div>
                                  <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo CREATE_EVENT; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="event_create" value="<?php echo $create_event; ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                     
                                        <label><?php echo TICKET_PURCHASE; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="ticket_purchase" value="<?php echo $ticket_purchase; ?>">
                                    </div>
                                </div>
                            
                        </div>
                    
                 </div>
                   <div class="text-center mb20">
                        <button type="submit" class="btn btn-default btn-lg"><?php echo 'UPDATE_REFERRAL_SETTING'; ?></button>
                    </div>
                </div><!-- col-lg-12  -->
           
            </div>
            
            </form>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
</div>
    <!-- /#wrapper -->

</body>

</html>