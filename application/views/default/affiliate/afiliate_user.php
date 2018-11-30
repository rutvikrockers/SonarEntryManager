<script>
$(document).ready(function(){
	$('select[name="action"]').change(function(){
	
		var val = $(this).val();
		var id=$(this).next().val();

		if(val=='delete'){
            var r = confirm('<?php echo ARE_YOU_SURE_DELETE_AFFILIATE;?>');
            
            if (r == true) {
                window.location.href = '<?php echo site_url('affiliate/delete_affiliate_user/'.$id)?>/'+id;
            } else {
                
            }
			
		}
	});
});
</script>
<?php 
	$data1['events_id'] = $id;
?>
<section> 

<?php if($success_msg){ ?>
        <div class="alert alert-success message"><?php echo $success_msg; ?></div>
<?php }?>
<?php if($error_msg){ ?>
        <div class="alert alert-danger message"><?php echo $error_msg; ?></div>
<?php } ?>

    <div class="container">
    	
      <div class="pt">
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 test-contct">
           <h1><?php echo LIST_OF_AFFILIATES;?> <?php echo SecureShowData($affiliate['code']);?></h1>
    	</div>
        
      </div><!-- End pt -->
        
        <div class="clearfix"></div>
        
        <div class="festival pb"></div>
        
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 p0-xs2  pt15 ">
                        
         <div class="row">                            
            <div class="col-sm-12 col-xs-12">
            <div class="event-detail clearfix">

            <form class="event-title">
        
            <div class="col-sm-12 col-xs-12 pt15 pb15">
                
                <div class="form-group clearfix">
                    <div class="col-sm-12 col-xs-12  ">            
                        <div class="text-left">
                            <a href="<?php echo site_url('affiliate/all_affiliate/'.$id);?>" ><?php echo BACK_AFFILIATE_PROGRAM_LIST;?></a>
                    
                        </div>
                    </div>                    
                </div>
                 
                 <div class="form-group clearfix">
                     <div class="col-sm-4 col-xs-3 width-xs lable-rite">
                       	<label class="mt0-xs1"><?php echo AFFILIATE_PROGRAM_LINK;?></label>
                     </div>
                     <div class="col-sm-7 col-xs-8 width-xs">
                      	<input type="text" name="code" id="code" value="<?php echo site_url('home/invited/'.$id.'/'.$aff_id);?>" />
                     </div>
                </div>
                                 
                                 
                 <table class="table table_res table_res2 mb0 event-info contct-table">
                        	<thead>
                            	<tr>
                                    <th><?php echo AFFILIATE_EMAIL;?> </th>
                                    <th><?php echo VISITS;?> </th>
                                    <th><?php echo TICKETS_SOLD;?></th>
                                    <th><?php echo SALES;?></th>
                                    <th><?php echo Amount;?> </th>
                                    <th><?php echo ACTIONS;?></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            <?php

							if($aff_user){
								foreach($aff_user as $affiliate){

									$email = $affiliate['email'];
									$tickets_sold = checkValue($affiliate['tickets_sold']);
									$sales = $affiliate['sales'];
									$site_visits = checkValue($affiliate['site_visits']);
									$due = $affiliate['due'];
									$paid = $affiliate['paid'];
                                    $event_id=$affiliate['event_id'];
                                  
									?>
                                    <tr>
                                        <td><?php echo SecureShowData($email);?></td>	
                                        <td><?php echo checkValue($site_visits);?></td>
                                        <td><?php echo checkValue($tickets_sold);?></td>
                                        <td><?php echo set_event_currency($sales,$event_id);?></td>
                                        <td><?php echo set_event_currency($due,$event_id);?></td>                                    
                                        <td>
                                     
                                        <div class="col-sm-12 col-xs-7 float0-xs width-xs2 p0">
                                           <select class="select-pad" name="action" >
                                                <option value=""><?php echo QUICK_ACTIONS;?></option>
                                                <?php 
                                                if(count($aff_user) <= 1 ) 
                                                { 
                                                    if($tickets_sold == '')
                                                    { ?>
                                                        <option value="delete"><?php echo DELETE_AFFILIATE;?></option>
                                                <?php } ?>                                                
                                        <?php   }
                                                else
                                                {
                                                    if(!$tickets_sold)
                                                    { ?>
                                                        <option value="delete"><?php echo DELETE_AFFILIATE;?></option>
                                              <?php }                                                               
                                                } ?>
                                            
                                           </select>
                                           <input type="hidden" value="<?php echo $affiliate['id'];?>">                                          
                                        </div>
                                        </td>                                    
                                	</tr>
                                <?php
								}
							}else{ ?>
								 <tr>
                                 	<td colspan="7" style="text-align:center;"> <?php echo NO_RECORDS_FOUND;?></td>
                                 </tr>
							<?php	
							}
							?>
                                                 
                            </tbody>                            
                        </table>
                 </div>
                 
                </form>
                
                </div> <!-- event detail closes -->
                                
                </div>
                
                 </div>
                 
                 </div> <!-- LEFT CONTENT ENDS -->
                 
                <!-- RIGHT CONTENT -->
                <?php $this->load->view('default/common/event_dashboard_sidebar',$data1);?>
                    
            </div><!-- End container -->
            <div class="pb"></div>
    </section>
    <script>
    	$(document).ready(function(){
    		$(".rover_tip").popover();
       });
	</script>
    
    <script>
	   $(document).ready(function(){
    		$(".edit").tooltip();
	   });
	</script>