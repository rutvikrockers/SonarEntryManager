<script src="<?php echo base_url()?>js/jquery.form.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/spectrum.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/spectrum.css" />
<script type="text/javascript">
    function set_preview_invite(ele,id){
                    var hex = ele.value;
                    
                    if(id=='span_event_color'){
                        $("#event_bg_color").val(hex);
                    }
    }
</script>

<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                    <h1><?php echo EDIT_CALENDER_SETTING; ?> - <small><?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></small></h1>
                </div>
                <div class="page-header border"></div>
                <!-- /.col-lg-12 -->
            </div>
            <?php
							
			$attributes = array('name' => 'frm_listadmin', 'class' => 'site-setting' );	
			echo form_open('admin/site_setting/edit_calender_setting/'.$id,$attributes);

			 ?>   
               <input type="hidden" name="id" value="<?php echo $id;?>">  
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                        <div class="panel-heading">
                           <?php echo CALENDER_SETTING; ?>
                        </div>
                         <div class="panel-body">
                         <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input  class="form-control" type="text" id="name" name="name" value="<?php echo SecureShowData($name); ?>" readonly>
                                    </div>
                        </div>

                        <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label>Color</label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input  class="form-control" type="text" id="event_bg_color" name="event_bg_color" value="<?php echo $event_bg_color; ?>" readonly>
                                    </div>
                                    <div class="col-sm-1 back">
                                        
                                        <input type='color' id="span_event_color" class="full" value="<?php echo $event_bg_color; ?>" onchange="set_preview_invite(this,'span_event_color');"/>
                                    </div>
                        </div>
                   	</div>
                </div>
                    <?php if(DEMO_MODE=="0"){ ?>
                 	<div class="text-center">
                 		<button type="submit" class="btn btn-default btn-lg"><?php echo UPDATE_CALENDER_SETTING; ?></button>
                         <a href="<?php echo site_url();?>admin/site_setting/calender_list" class="btn btn-default btn-lg"> <?php echo CANCEL; ?></a>
                    </div>
                    <?php } ?>
                </div>
           
            </div>
           
</div>
</div>
      
</body>

</html>
