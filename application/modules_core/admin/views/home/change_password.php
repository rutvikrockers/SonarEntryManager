<script type="text/javascript">
function goBack() {
    window.history.back();
    }
</script>

<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                    <h1><?php echo CHANGE_PASSWORD; ?> <small><?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></small></h1>
                </div>
                <div class="page-header border"></div>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo site_url();?>admin/home/dashboard">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-lock"></i> <?php echo CHANGE_PASSWORD; ?> 
                    </li>
                </ol>
                <!-- /.col-lg-12 -->
            </div>
            <?php 
                if($msg!='')
                    {   ?>
                        
                            <div class="alert alert-success" role="alert">
                            <button class="close" data-dismiss="alert">x</button>
                            <strong><?php echo SUCCESS; ?>!</strong> <?php echo $msg; ?>
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
                                
                    $attributes = array('name' => 'frm_listadmin', 'class' => 'site-setting' ); 
                    echo form_open('admin/home/change_password/',$attributes);

                 ?>   
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12 clearfix">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <?php echo CHANGE_PASSWORD; ?>
                        </div>
                        <div class="panel-body">
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo OLD_PASSWORD; ?></label>
                                    </div>
                                    <div class="col-sm-3">
                                        <input class="form-control" type="password" name="old_password" id="old_password" value="">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo NEW_PASSWORD; ?></label>
                                    </div>
                                    <div class="col-sm-3">
                                        <input class="form-control" type="password" name="new_password" id="new_password" value="">
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo CONFIRM_PASSWORD; ?></label>
                                    </div>
                                    <div class="col-sm-3">
                                        <input class="form-control" type="password" name="confirm_password" id="confirm_password" value="">
                                    </div>
                                </div>                                
                            
                        </div>
                    
                 </div>
                 
                 
                    <div class="text-center">
                    <?php if(DEMO_MODE=="0"){ ?>
                        <button type="submit" class="btn btn-default btn-lg"><i class="fa fa-lock"></i> <?php echo SAVE; ?></button>
                    <?php } ?>
                        <button type="button" class="btn btn-default btn-lg" onclick="goBack()"><?php echo CANCEL; ?></button>
                    </div>
                </div>
           
            </div>
           
</div>
</div>
</body>

</html>
