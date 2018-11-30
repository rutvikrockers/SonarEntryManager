<script type="text/javascript">
function goBack() {
    window.history.back();
    }
</script>
<link href="<?php echo base_url(); ?>admin_css/datepicker.css" rel="stylesheet">
 <script type="text/javascript">
    // When the document is ready
    $(document).ready(function () {
        $('#start_date').datepicker({
            format: "yyyy-mm-dd",
            orientation: 'top',
            autoclose: true,
            minDate:0
        });
        $('#end_date').datepicker({
            format: "yyyy-mm-dd",
            orientation: 'top',
            autoclose: true,
            minDate:0
         });
    });
</script>
<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                    <h1><?php echo TICKET_SETTING; ?> <small><?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></small></h1>
                </div>
                <div class="page-header border"></div>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo site_url();?>admin/home/dashboard">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-ticket"></i> <?php echo TICKET_SETTING; ?> 
                    </li>
                </ol>
                <!-- /.col-lg-12 -->
            </div>
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
								
								$attributes = array('name' => 'frm_listadmin', 'class' => 'site-setting' );	
								echo form_open('admin/preferences/edit_ticket_setting/',$attributes);

				 ?>   
                 <input type="hidden" name="id"  value="<?php echo $id;?>"/>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                        <div class="panel-heading">
                           <?php echo TICKET_SETTING; ?>
                        </div>
                        <div class="panel-body">
                                <div class="alert alert-info">
                                   <i class="fa fa-ticket"></i> <strong>Notice !</strong> Stop purchase tickets for particular Time.
                                </div>
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo START_DATE; ?></label>
                                    </div>
                                    <div class="col-sm-3">
                                    	<input class="form-control" type="text" name="start_date" id="start_date" value="<?php echo $start_date ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo END_DATE; ?></label>
                                    </div>
                                    <div class="col-sm-3">
                                    	<input class="form-control" type="text" name="end_date" id="end_date" value="<?php echo $end_date ?>">
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo STATUS; ?></label>
                                    </div>
                                    <div class="col-sm-3">
                                        <select class="form-control" name="ticket_status">
                                                <option value="0" <?php if($ticket_status == 0) { echo "selected"; } ?> ><?php echo DISABLE; ?></option>
                                                <option value="1" <?php if($ticket_status == 1) { echo "selected"; } ?>><?php echo ENABLE; ?></option>
                                        </select>
                                        <label style="font-size: 11px;">Enable or Disable Tickets (Please note that user can not purchase any Tickets).</label>
                                    </div>
                                </div>
                                
                            
                        </div>
                   	
                 </div>
                 
                 
                 	<div class="text-center">
                    <?php if(DEMO_MODE=="0"){ ?>
                 		<button type="submit" class="btn btn-default btn-lg"><i class="fa fa-ticket"></i> <?php echo UPDATE_TICKET_SETTING; ?></button>
                        <?php } ?>
                        <button type="button" class="btn btn-default btn-lg" onclick="goBack()"><?php echo CANCEL; ?></button>
                    </div>
                </div>
           
            </div>
           
</div>
</div>
<script src="<?php echo base_url(); ?>admin_js/bootstrap-datepicker.js"></script>    
</body>

</html>
