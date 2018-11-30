<script>
$(document).ready(function(){
	$('select[name="action"]').change(function(){
	
		var val = $(this).val();
	
	
		var id=$(this).next().val();
		var aff_users = $('#aff_users_'+id).val();
		
		if(val=='user'){
			window.location.href = '<?php echo site_url('affiliate/afiliate_user/'.$id)?>/'+id;
		}
		if(val=='attendee'){
			window.location.href = '<?php echo site_url('affiliate/afiliate_user/'.$id)?>/'+id;
		}
		if(val=='invite'){
			window.location.href ='<?php echo site_url('affiliate/invite/'.$id)?>/'+id;
		}
		if(val=='edit'){
			window.location.href = '<?php echo site_url('affiliate/create_affiliate/'.$id)?>/'+id;
		}
		if(val=='delete')
		{
	
			if(aff_users > 1)
			{
				alert('<?php echo YOU_CAN_NOT_DELETE_AFFILIATE_PROGRAM_ALREADY_JOINED_YOUR_PROGRAM_PREVENT_FRUTHER_SIGN_UP;?> ');
                return false;
			}
			else
			{
				var r = confirm('<?php echo ARE_YOU_SURE_DELETE_AFFILIATE_PROGRAM;?>');
				if (r == true) {
					window.location.href = '<?php echo site_url('affiliate/delete_affiliate/'.$id)?>/'+id;
			    } else {
			        
			    }
				
			}
		}
	});
});
</script>
<style>
	.save-preview-aff li{
		float: left;
    	height: 100%;
	    list-style: none outside none;
	    padding: 2px;
	    width: 300px;
	}
</style>
<?php 
	$data1['events_id'] = $id;
?>
<?php $this->load->view('default/common/dashboard-header')?>
<section>  

    <div class="container marTB50">
   <?php if($success_msg){ ?>
             <div class="alert alert-success message"><?php echo $success_msg; ?></div>
    <?php }?>
    <?php if($error_msg){ ?>
             <div class="alert alert-danger message"><?php echo $error_msg; ?></div>
     <?php } ?>
    <section>  	
            	  
            <?php
			
			 if($this->session->flashdata('common_message') != ''){
            		?>
            		<div class="alert alert-success mar10"><?php echo $this->session->flashdata('common_message'); ?></div>
            	<?php }?>
                <div class="row">
                <div class="col-md-8 col-sm-12">
                                
                 <div class="row">    
                            
                <div class="event-webpage col-sm-12 col-xs-12">
                	<div class="red-event width100"><h4>Affiliate Program</h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                <div class="col-sm-12 col-xs-12">
                <div class="event-detail clearfix">
                
                <form class="event-title">
                
                 <div class="col-sm-12 col-xs-12 pt15 pb15">
                 	
               <div class="text-right pb">
                    <a href="<?php echo site_url('affiliate/create_affiliate/'.$id);?>" class="btn-event2">Create a new affiliate program</a>
                    
                </div>
                
                 <table class="table table_res table_res2 mb0 event-info contct-table earn_info_textoverflow">
                        	<thead>
                            	<tr>
                                    <th><?php echo AFFILIATE_NAME;?></th>
                                    <th><?php echo VISITS;?></th>
                                    <th><?php echo AFFILIATES;?></th>
                                    <th><?php echo SALES;?></th>
                                    <th><?php echo REFERRAL_FEE;?></th>
                                    <th><?php echo AMOUNT;?></th>
                                    <th><?php echo ACTIONS;?></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            <?php
							if($get_affiliates){
								foreach($get_affiliates as $affiliate){


									$id = $affiliate['id'];
									$code = $affiliate['code'];
									$visits = checkValue($affiliate['visits']);
									$notes = $affiliate['notes'];
									$fee_amt = $affiliate['fee_amt'];
									$fee_perc = $affiliate['fee_perc'];
									$sales = $affiliate['sales'];
									$affiliates = $affiliate['affiliates'];
                                    $event_id = $affiliate['event_id'];
									
									if($fee_amt>0){
                                    $referall_fee = $fee_amt;
                                    $referall_fee = set_event_currency($referall_fee,$event_id);
                                    }else{
                                     $referall_fee = $fee_perc.'%';
                                    }
									
									$due = $affiliate['due'];
									$paid = $affiliate['paid'];
									?>
                                    <tr>
                                        <td><?php echo SecureShowData($code);?></td>	
                                        <td><?php echo SecureShowData($visits);?></td>
                                        <td><?php echo SecureShowData($affiliates);?></td>
                                        <td><?php echo set_event_currency($sales,$event_id);?></td>
                                        <td><?php echo $referall_fee; ?></td>
                                        <td><?php echo set_event_currency($due,$event_id);?></td>
                                        <td>
                                        <div class="float0-xs width-xs2 p0">
                                           <select class="select-pad" name="action" id="action">
                                                <option value=""><?php echo QUICK_ACTIONS;?></option>
                                                <option value="user"><?php echo VIEW_USERS;?></option>
                                                <option value="invite"><?php echo INVITE_AFFILIATE;?></option>
                                                <option value="edit"><?php echo EDIT_AFFILIATE;?></option>
                                                <option value="delete"><?php echo DELETE_AFFILIATE_PROGRAM;?></option>
                                           </select>
                                           <?php 
                                           $aff_user = getAllRecordById('user_affiliates','affiliate_id',$id);
                                           ?>
                                           
                                          <input type="hidden" id="aff_id" value="<?php echo $id;?>" />
                                           <input type="hidden" id="aff_users_<?php echo $id; ?>" value="<?php echo count($aff_user);?>" />
                                           
                                        </div>
                                        </td>
                                    
                                	</tr>
                                <?php
								}
							} else { ?>
                                  <tr>
                                    <td colspan="7"><?php echo NO_RECORDS_AVAILABLE;?></td>
                                  </tr>
                            <?php } ?>
                            	
                                                 
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
                 </div>   
                
            </div><!-- End container -->
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