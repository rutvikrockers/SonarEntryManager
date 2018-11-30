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
                    $address=$result['venue_add1'];
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

	vchkcnt=0;

	elem = document.getElementsByName(elename);

	for(i=0;i<elem.length;i++){

		if(elem[i].checked) vchkcnt++;	

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

}

</script>     
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 clearfix">
                    <h1><?php echo EVENTS; ?> - <?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></h1>
                </div>
                <div class="page-header border"></div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <?php 

				if($msg == 'makefeature')

					{	?>

                        	<div class="alert alert-success" role="alert">

							<button class="close" data-dismiss="alert">x</button>

							<strong><?php echo SUCCESS; ?>!</strong> <?php echo RECORD_HAS_BEEN_SUCCESSFULLY_MAKE_FEATURE;?>

                            </div>

                            

            <?php }if($msg == 'cancelfeature'){?>
            	
            				<div class="alert alert-success" role="alert">

							<button class="close" data-dismiss="alert">x</button>

							<strong><?php echo SUCCESS; ?>!</strong> <?php echo RECORD_HAS_BEEN_SUCCESSFULLY_CANCEL_FEATURE;?>

                            </div>
            	
            <?php } ?>
            <?php

		 				$attributes = array('name'=>'frm_listpage','id'=>'frm_listpage');

						echo form_open('admin/events/makefeature/', $attributes);

		 	?>
		 	
		 	 <input type="hidden" name="action" id="action" />   
            <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                       <!-- <div class="panel-heading">
                                    <h4 class="panel-title text-right">
                                    	<img src="<?php echo base_url();?>admin_images/tick1.png" alt=" " width=" " height=" "  /><button type="button" class="btn btn-success" onclick="setaction('chk[]','makefeature', '<?php echo ARE_YOU_SURE_YOU_WANT_TO_MAKE_FEATURE_SELECTED_EVENT;?>', 'frm_listpage')"><?php echo MAKE_FEATURE; ?></button>
                                    	<img src="<?php echo base_url();?>admin_images/eb_close-fc.png" alt=" " width=" " height=" "  /><button type="button" class="btn btn-warning" onclick="setaction('chk[]','cancelfeature', '<?php echo ARE_YOU_SURE_YOU_WANT_TO_CANCEL_FEATURE_SELECTED_EVENT; ?>', 'frm_listpage')"><?php echo CANCEL_FEATURE; ?></button> 
                                    </h4>
                        </div>
                        -->
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                            <div class="table-responsive">
                            
                                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        	<!--<th class="sorting_disabled"><input type="checkbox" id="selecctall"></th>-->
                                            <th><?php echo EVENT_TITLE;?></th>
                                            <th><?php echo EVENT_VENUE;?></th>
                                            <th><?php echo STREET_ADDRESS;?></th>
                                            <th><?php echo EVENT_START;?>(Date/Time)</th>
                                            <th><?php echo EVENT_END;?>(Date/Time)</th>
                                            <!-- <th class="sorting_disabled"><?php echo FEATURE;?></th> -->
                                            <th class="sorting_disabled"><?php echo AFFILIATE;?>
                                            <th><?php echo CURRENT_STATUS;?></th>

                                            <th class="sorting_disabled"><?php echo TICKETS;?></th>
                                            <th class="sorting_disabled"><?php echo VIEW;?></th>
                                            <!--<th><?php echo ACTION;?></th>-->
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
											//$street_add=$row['street_address']; // Darshan
                                            $street_add = getAddress($row); // Darshan
											$start_date=$row['event_start_date_time'];
											$end_date=$row['event_end_date_time'];
											$feature=$row['feature'];
											$current_status=$row['active'];
											$event_url_link=$row['event_url_link'];
											
									?>
                                        <tr class="odd gradeX">
                                        	<!--<th><?php if($current_status == 1) { ?><input type="checkbox" class="checkbox1" name="chk[]" value="<?php echo $id;?>"/> <?php } ?></th>-->
                                            <td><?php echo SecureShowData($event_title); ?></td>
                                            <td><?php echo SecureShowData($event_venue); ?></td>
                                            <td><?php echo str_replace(',', ', ', $street_add); ?></td>
                                            <td><?php echo SecureShowData($start_date); ?></td>
                                            <td><?php echo SecureShowData($end_date); ?></td>
                                           <!--  <td>
                                            <?php if($feature == 0) {?>	
                                            	<img src="<?php echo base_url();?>admin_images/eb_close-fc.png" alt=" " height=" " width=" "  />
                                            <?php }else {?>
                                            	<img src="<?php echo base_url();?>admin_images/tick1.png" alt=" " height=" " width=" " />
                                            <?php } ?>    
                                            </td> -->

                                            <td>
                                            <a href="<?php echo site_url('admin/events/affiliate/'.$id);?>"><?php echo VIEW;?></a></td>
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
											?>
                                            </td>
                                            <td><a href="<?php echo site_url('admin/events/ticket/'.$id);?>"><img src="<?php echo base_url();?>admin_images/ticketimg.png" alt=" " height=" " width=" " /></a></td>
                                            
                                            <?php if($current_status == 0) { ?>
												<td><a href="#" class="disabled"><img src="<?php echo base_url();?>admin_images/event.png" alt=" " height=" " width=" "  /></a></td>		
											<?php }if($current_status == 1){?>
												
											<td><a href="<?php echo site_url();?>/event/view/<?php echo $event_url_link; ?>" target="_blank"><img src="<?php echo base_url();?>admin_images/event.png" alt=" " height=" " width=" "  /></a></td>	
												
											<?php }if($current_status == 3){?>
												<td><a href="#" class="disabled"><img src="<?php echo base_url();?>admin_images/event.png" alt=" " height=" " width=" "  /></a></td>
											<?php }if($current_status == 2){ ?>		
												<td><a href="<?php echo site_url();?>/event/view/<?php echo $event_url_link; ?>" target="_blank"><img src="<?php echo base_url();?>admin_images/event.png" alt=" " height=" " width=" "  /></a></td>	
											<?php } ?>
											
                                           <!--<td><?php echo anchor('admin/events/edit_event/'.$id.'/','Edit')?> /  <a href="">Delete</a></td>-->

                                            <?php if($current_status == 3){?>
                                                <td><a href="#" class="disabled"><?php echo MANAGE; ?></a></td>
                                            <?php }if($current_status == 2){ ?>     
                                                <td><a href="<?php echo site_url();?>/event/view/<?php echo $event_url_link; ?>" target="_blank"><?php echo MANAGE; ?></a></td>    
                                            <?php } ?>
                                            
                                        </tr>
                                        <?php 
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
