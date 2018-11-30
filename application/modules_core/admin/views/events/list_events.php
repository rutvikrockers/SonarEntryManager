<!-- Start of Darshan Code -->
<?php 
function getAddress($result){
$address='';


    
        if($result['venue_add1']!='')
        {   

            $address=$result['venue_add1'];
        }
        if($result['venue_add2']!='')
        {
            if($address!=''){
            $address=$address.','.$result['venue_add2'];
                }else
                {
                    $address=$result['venue_add2'];
                }
        }
        if($result['venue_city']!='')
        {
            if($address!=''){
            $address=$address.','.$result['venue_city'];
                }else
                {
                    $address=$result['venue_city'];
                }
        }
        if($result['venue_state']!='')
        {
            if($address!=''){
            $address=$address.','.$result['venue_state'];
                }else
                {
                    $address=$result['venue_state'];
                }
        }
        if($result['venue_country']!='')
        {
            if($address!='')
            {
                $address=$address.','.$result['venue_country'];
                }else
                {
                    $address=$result['venue_country'];
                }
        }

        return $address;
    }
?>

<!-- End of Darshan Code -->
<style>
.disabled {
    /*Disabled link style*/
     cursor:no-drop;
}
</style>
<script>
function setaction(elename, actionval, actionmsg, formname) {

var demo_mode = <?php echo DEMO_MODE; ?>;
    
    if(demo_mode=="0"){

    	vchkcnt=0;


        elem = document.getElementsByName(elename);
        
        var n = elem.length;

        var action_val;

        if(actionval=="enable"){ action_val="1"; }
        if(actionval=="disable"){ action_val="4"; }  


    	for(i=0;i<elem.length;i++){

    		if(elem[i].checked) vchkcnt++;	

            if(n===1){ 
                if($("#status_"+elem[i].value).val()==action_val){
                    alert("Event is already "+actionval+", you can not "+actionval+" it again.");
                    return false;
                }

            }

    	}

    	if(vchkcnt==0) {

    		alert('<?php echo PLEASE_SELECT_A_RECORD; ?>');

    	} else {

    		if(confirm(actionmsg))
    		{

    			document.getElementById('action').value=actionval;	

    			document.getElementById(formname).submit();

    		}		
    	}
    }else{
        alert('You can not do this action as you are in demo mode');
        return false;
    }

}
function set_make_feature(elename, actionval, actionmsg, formname) {
    elem = document.getElementsByName(elename);
    var n = elem.length;

    var action_val;
    if(actionval=="enable"){ action_val="1"; }

    if(confirm(actionmsg))
        {

            document.getElementById('feature_event_active').value=actionval;  

            document.getElementById(formname).submit();

        }
    
}
</script>     
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-xs-12 clearfix">
                    <h1><?php echo EVENTS; ?>  <small><?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></small></h1>
                </div>

                <?php
                    $export_url = site_url('admin/events/list_events');
                     if(DEMO_MODE=="0"){ 
                        $export_url = site_url('admin/events/event_report'); 
                    } ?>
                <div class="col-lg-4 col-xs-12  mt20 text-right clearfix">
                    <a href="<?php echo $export_url;?>" class="btn btn-primary"><?php echo EVENT_REPORT; ?></a>
                </div>

                 <div class="page-header border clearfix"></div>
                 <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo site_url();?>admin/home/dashboard">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-calendar-o"></i> <?php echo EVENTS; ?>
                    </li>
                </ol>
               
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
              <?php 

                if($msg == 'enable')

                    {   ?>

                            <div class="alert alert-success" role="alert">

                            <button class="close" data-dismiss="alert">x</button>

                            <strong><?php echo SUCCESS; ?>!</strong> <?php echo RECORD_HAS_BEEN_SUCCESSFULLY_ACTIVE;?>

                            </div>

                            

            <?php }
            if($msg == 'disable'){?>
                
                            <div class="alert alert-success" role="alert">

                            <button class="close" data-dismiss="alert">x</button>

                            <strong><?php echo SUCCESS; ?>!</strong> <?php echo RECORD_HAS_BEEN_SUCCESSFULLY_DISABLE;?>

                            </div>
                  <?php }
                  if($msg == 'delete'){?>
                
                            <div class="alert alert-success" role="alert">

                            <button class="close" data-dismiss="alert">x</button>

                            <strong><?php echo SUCCESS; ?>!</strong> <?php echo RECORD_HAS_BEEN_SUCCESSFULLY_DELETED?>

                            </div>
             <?php }
             if($msg == 'success'){?>
                
                            <div class="alert alert-success" role="alert">

                            <button class="close" data-dismiss="alert">x</button>

                            <strong><?php echo SUCCESS; ?>!</strong> <?php echo RECORD_HAS_BEEN_SUCCESSFULLY_UPDATED?>

                            </div>

                
            <?php } ?>
          <?php

                        $attributes = array('name'=>'frm_listpage','id'=>'frm_listpage');

                        echo form_open('admin/events/action_event/', $attributes);

            ?>
		 	
		 	 <input type="hidden" name="action" id="action" />   
            <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                      <div class="panel-heading">
                                    <h4 class="panel-title text-right">
                                        <button type="button" class="btn btn-success" onclick="setaction('chk[]','enable', '<?php echo ARE_YOU_SURE_YOU_WANT_TO_ENABLE_SELECTED_EVENT;?> ?', 'frm_listpage')"><?php echo ENABLE; ?></button>
                                        <button type="button" class="btn btn-warning" onclick="setaction('chk[]','disable', '<?php echo ARE_YOU_SURE_YOU_WANT_TO_DISABLE_SELECTED_EVENT; ?> ?', 'frm_listpage')"><?php echo DISABLE; ?></button> 
                                        <button type="button" class="btn btn-danger" onclick="setaction('chk[]','delete', '<?php echo ARE_YOU_SURE_YOU_WANT_TO_DELETE_SELECTED_EVENT; ?> ?', 'frm_listpage')"><?php echo DELETE; ?></button> 
                                    </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper dataTable_res form-inline" role="grid">
                            <div class="table-responsive">
                            
                                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        	<th class="sorting_disabled"><input type="checkbox" id="selecctall"></th>
                                            <th><?php echo EVENT_TITLE;?></th>
                                            <th><?php echo EVENT_VENUE;?></th>
                                            
                                            <th><?php echo EVENT_START;?>(Date/Time)</th>
                                            
                                            <th><?php echo CURRENT_STATUS;?></th>

                                            <th class="sorting_disabled"><?php echo TICKETS;?></th>
                                            <th class="sorting_disabled"><?php echo ACTION; ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
										if($result)
										{
											foreach($result as $row)
												{
											
											$id=$row['id'];
											$event_title=$row['event_title'];
											$event_venue=$row['name'];
                                            $event_feature=$row['feature'];
											//$street_add=$row['street_address']; // Darshan
                                            $street_add = getAddress($row); // Darshan
											$start_date=$row['event_start_date_time'];
											$end_date=$row['event_end_date_time'];
											$feature=$row['feature'];
											$current_status=$row['active'];
											$event_url_link=$row['event_url_link'];
                                            $event_check=$row['active'];
                                            $event_cancel=$row['cancel'];
                                            $event_keep_private=$row['keep_private'];
											 if($current_status!=5){
									?>
                                        <tr class="odd gradeX">
                                        	<th>
                                            <?php 
                                            $purchase = $this->event_model->getPurchaseOrder($id,array('purchases.id'=>'DESC'),0,'100','','','');
                                        
                                        if(!$purchase){
                                        
                                             ?>
                                                <?php if($current_status == 1||$current_status == 4) { ?><input type="checkbox" class="checkbox1" name="chk[]" value="<?php echo $id;?>"/> <?php } ?>
                                            <?php } ?>                                                
                                            </th>
                                            <td><?php echo SecureShowData($event_title); ?></td>
                                            <td><?php echo SecureShowData($event_venue); ?></td>
                                            <td><?php echo SecureShowData($start_date); ?></td>
                                            <td>
											<?php if($current_status == 0) { 
														echo DRAFT;
													}
													if($current_status == 3){
														echo CANCELLED;
													}
													if($current_status == 1){
														echo LIVE;
													}
													if($current_status == 2){
														echo COMPLETED;
													}
                                                    if($current_status == 4){
                                                        echo DISABLE;
                                                    }
											?>
                                            <input type="hidden" id="status_<?php echo $id; ?>" value="<?php echo $current_status; ?>">
                                            </td>
                                            <td><a href="<?php echo site_url('admin/events/ticket/'.$id);?>"><img src="<?php echo base_url();?>admin_images/ticketimg.png" alt=" " height=" " width=" " /></a></td>
                                            <td><a href="<?php echo site_url('admin/events/manage/'.$id);?>" ><?php echo MANAGE; ?></a> | 

                                            <?php if($current_status == 0) { ?>
                                                <a href="#" class="disabled"><?php echo VIEW;?></a>       
                                            <?php }
                                            if($current_status == 1 ||$current_status == 4){?>
                                                
                                            <a href="<?php echo site_url('event/view/'.$event_url_link);?>" target="_blank"><?php echo VIEW;?></a> 
                                                
                                            <?php }
                                            if($current_status == 3){?>
                                                <a href="#" class="disabled"><?php echo VIEW;?></a>
                                            <?php }
                                            if($current_status == 2){ ?>
                                                <a href="<?php echo site_url('event/view/'.$event_url_link);?>" target="_blank"><?php echo VIEW;?></a>
                                            <?php } ?> | 

                                            <?php if( $start_date > date('Y-m-d H:i:s') && $event_check == 1 && $event_cancel == 0  && $event_keep_private == 0 ) { ?>
                                                            <?php if($event_feature == 0) { ?>
                                                                <a href="<?php echo site_url('admin/events/make_feature_event/'.$id);?>" id="feature_event_active" name="feature_event_active" data-toggle="tooltip" title="Make Feature event"><i class="fa fa-star" style="font-size: 18px;color:blue;"></i></a>
                                                            <?php } else {?>
                                                                <a href="<?php echo site_url('admin/events/cancel_feature_event/'.$id);?>" id="feature_event_active" name="feature_event_active" data-toggle="tooltip" title="Cancel Feature event"><i class="fa fa-star" style="font-size: 18px;color:red;"></i></a>
                                                            <?php } ?>
                                                    <?php } else { ?>
                                                        <a class="disabled" href="#"><i class="fa fa-star" style="font-size: 18px;color:#A9A9A9;"></i></a>
                                                    <?php } ?>
                                            
                                            </td>    

                                            
                                        </tr>
                                        <?php 
												}
                                            }
										}		
										
										?>
                                        
                                    </tbody>
                                </table>
                            
                             </div>   
                                </div>
                         </div>
                   	</div>
                 </div>
                </div><!-- col-lg-8  -->
            	
                
            </div>
            <!-- /.row -->
            </form>
    </div>
    </div>
        <!-- /#page-wrapper -->
</body>
<script>

	$(document).ready(function(){
		$('#dataTables-example').dataTable({
          "iDisplayLength": 50
        });
	});
</script>

<script>

    $(document).ready(function() {

    

	$('#selecctall').click(function(event) {  //on click 
		
		//alert("VCVhvsjhgs");
        if(this.checked) { // check select status

            $('.checkbox1').each(function() { //loop through each checkbox

                this.checked = true;  //select all checkboxes with class "checkbox1"               

            });

        }else{

            $('.checkbox1').each(function() { //loop through each checkbox

                this.checked = false; //deselect all checkboxes with class "checkbox1"                       

            });         

        }

    });

    

});

        

</script>
</html>
