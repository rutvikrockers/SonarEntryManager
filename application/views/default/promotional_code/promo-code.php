<link href="<?php echo base_url(); ?>css/timepicker/bootstrap-datepicker.css" rel="stylesheet">
<style>
	.red{
		font-size: 20px;
	}
</style>
<script type="text/javascript">

	$(document).ready(function(){
		
		//radio uses...
		if($( "#uses_id").is(':checked') ){
			$('#uses').removeAttr('disabled');
			
		}
		if($( "#unlimited").is(':checked') ){
			$('#uses').attr('disabled','disabled');
			
		}
		//end uses...
		
		//radio starts...
		if($( "#now").is(':checked') ){
			$('#start_date_time').attr('disabled','disabled');
			$('#start_day').attr('disabled','disabled');
			$('#start_hour').attr('disabled','disabled');
			$('#start_minute').attr('disabled','disabled');
			
		}
		
		
		if($( "#start_select_date").is(':checked') ){
			$('#start_date_time').removeAttr('disabled');
			$('#start_day').attr('disabled','disabled');
			$('#start_hour').attr('disabled','disabled');
			$('#start_minute').attr('disabled','disabled');
			
		}
		
		if($( "#start_day_h_m").is(':checked') ){
			$('#start_day').removeAttr('disabled');
			$('#start_hour').removeAttr('disabled');
			$('#start_minute').removeAttr('disabled');
			$('#start_date_time').attr('disabled','disabled');
			
		}
		
		//end starts..
		
		//radio End...
		if($( "#sales_end").is(':checked') ){
			$('#end_date_time').attr('disabled','disabled');
			$('#end_day').attr('disabled','disabled');
			$('#end_hour').attr('disabled','disabled');
			$('#end_minute').attr('disabled','disabled');
			
		}
		
		
		if($( "#end_select_date").is(':checked') ){
			$('#end_date_time').removeAttr('disabled');
			$('#end_day').attr('disabled','disabled');
			$('#end_hour').attr('disabled','disabled');
			$('#end_minute').attr('disabled','disabled');
			
		}
		
		if($( "#end_day_h_m").is(':checked') ){
			$('#end_day').removeAttr('disabled');
			$('#end_hour').removeAttr('disabled');
			$('#end_minute').removeAttr('disabled');
			$('#end_date_time').attr('disabled','disabled');
			
		}
		//end End..
		
		
		
		
		$('#access_codes').hide();
		var va = $('#code_type').val();	
		
		$('.checkbox1').attr('disabled',true);
		$('.checkbox1').each(function() {
			var a = $(this).val();
			if(va=='disc'){
				$('#paid_'+a).removeAttr('disabled');
			}else{
				
				$('#hidden_'+a).removeAttr('disabled');
			}
		});
		
		var code_first=$('#code_id').val();
		$('#att_csv').attr('disabled','disabled');
		$('#att_upload').attr('disabled','disabled');
		
		if(code_first=='code1')
		{
			
			$('#att_csv').attr('disabled','disabled');
			$('#att_upload').attr('disabled','disabled');
		}
		
		$( "#code_id2").change(function() {
			
				 $('#att_csv').removeAttr('disabled');
		  		 $('#att_upload').removeAttr('disabled');
				 $('#code_space').attr('disabled','disabled');
		});
		
		$( "#code_id").change(function() {
				
				$('#att_csv').attr('disabled','disabled');
		  		 $('#att_upload').attr('disabled','disabled');
		  		 $('#code_space').removeAttr('disabled');
		});
		
		$( "#code_type").change(function() {
			
			var code_disc = $('#code_type').val();
			if(code_disc=='disc'){
				$('#dic_amount').show();
				$('#discount_codes').show();
				$('#access_codes').hide();
				$('#disc_amount').removeAttr('disabled');
				$('#disc_perc').removeAttr('disabled');
				
				
			}else{
				$('#dic_amount').hide();
				$('#access_codes').show();
				$('#discount_codes').hide();
				$('#disc_amount').attr('disabled','disabled');
				$('#disc_perc').attr('disabled','disabled');
			}	
			
			
		});
		
		//uses....
		//$('#uses').attr('disabled','disabled');
		//$('#start_date_time').attr('disabled','disabled');
		//$('#start_day').attr('disabled','disabled');
		//$('#start_hour').attr('disabled','disabled');
		//$('#start_minute').attr('disabled','disabled');
		
		
		$( "#uses_id").change(function() {
			$('#uses').removeAttr('disabled');
			
		});
		$( "#unlimited").change(function() {
			$('#uses').attr('disabled','disabled');
			
		});
		
		$('#now').change(function()
		{	$('#start_date_time').attr('disabled','disabled');
			$('#start_day').attr('disabled','disabled');
			$('#start_hour').attr('disabled','disabled');
			$('#start_minute').attr('disabled','disabled');
		});
		$( "#start_select_date").change(function() {
			$('#start_date_time').removeAttr('disabled');
			$('#start_day').attr('disabled','disabled');
			$('#start_hour').attr('disabled','disabled');
			$('#start_minute').attr('disabled','disabled');
			
		});
		$( "#start_day_h_m").change(function() {
			$('#start_day').removeAttr('disabled');
			$('#start_hour').removeAttr('disabled');
			$('#start_minute').removeAttr('disabled');
			$('#start_date_time').attr('disabled','disabled');
			
		});
		
		
		//$('#end_date_time').attr('disabled','disabled');
		//$('#end_day').attr('disabled','disabled');
		//$('#end_hour').attr('disabled','disabled');
		//$('#end_minute').attr('disabled','disabled');
		
		
		$('#sales_end').change(function()
		{	$('#end_date_time').attr('disabled','disabled');
			$('#end_day').attr('disabled','disabled');
			$('#end_hour').attr('disabled','disabled');
			$('#end_minute').attr('disabled','disabled');
		});
		$('#end_select_date').change(function(){
			$('#end_date_time').removeAttr('disabled');
			$('#end_day').attr('disabled','disabled');
			$('#end_hour').attr('disabled','disabled');
			$('#end_minute').attr('disabled','disabled');
		});
		$('#end_day_h_m').change(function(){
			$('#end_day').removeAttr('disabled');
			$('#end_hour').removeAttr('disabled');
			$('#end_minute').removeAttr('disabled');
			$('#end_date_time').attr('disabled','disabled');
		});
		
		
	});
	
	function chk_access(val)
	{
 		
 			$('.checkbox1').attr('disabled',true);
            $('.checkbox1').each(function() { //loop through each checkbox
				
				var a = $(this).val();
				if(val=='disc'){
					$('#paid_'+a).removeAttr('disabled');
				}else{
					$('#hidden_'+a).removeAttr('disabled');
				}
				
                //this.checked = true;  //select all checkboxes with class "checkbox1"               

            });
 	}
</script>
<?php $this->load->view('default/common/dashboard-header')?>
 <?php 
				if($error!= '')
				{ ?>
					
                    		<div class="alert alert-danger message" role="alert">
							<button class="close" data-dismiss="alert">x</button>
							 <?php echo $error;?>
                            </div> 
				<?php } ?> 
<section> 
	<?php 
	$data1['events_id'] = $id;
	
	?> 
            <div class="container marTB50">
                
               
				<div class="row">
                <form class="event-title event-title2" method="post" action="<?php echo site_url('event/add_code/'.$id);?>"  enctype="multipart/form-data">
                <div class="col-md-8 col-sm-12">
                <div class="row">    
                            
                <div class="event-webpage col-xs-12 col-sm-12">
                	<div class="red-event width100 "><h4><?php echo CREATE_A_NEW_PROMOTIONAL_CODES; ?></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                
			
                <div class="col-sm-12 col-xs-12 clearfix">
                    <div class="event-detail event-detail2 pt pb">
                        	
                            	<div class="form-group clearfix">
	                                 <div class="col-sm-4 col-xs-3 width-xs lable-rite">
	                                   	<label class="mt0-xs1"><?php echo CODE_TYPE; ?></label>
	                                 </div>
                                 <div class="col-sm-7 col-xs-8 width-xs">
	                                  <select class="select-pad" name="code_type" id="code_type" onchange="chk_access(this.value)">
	                                  		<option value="disc"><?php echo DISCOUNT; ?></option>
											<option value="access"><?php echo ACCESS; ?></option>
	                                  </select>
                                 </div>
                                 </div>
                 				
                                <div class="form-group pt clearfix ">
	                            	<div class="col-sm-4 col-xs-3 lable-rite width-xs">
	                            		<label><?php echo CODE; ?> <span class="red">*</span> </label>
	                            	</div>
	                                <div class="col-sm-8 col-xs-8 width-xs p0">
		                                <div class="col-sm-12 col-xs-12">
			                                <div class="discount-dollar pright0">
			                                  <div class="radio">
			                                      <label>
			                                      <input type="radio" name="code1"  value="0" id="code_id"  checked="checked">
			                                      </label>
			                                  </div>
			                                  
			                                </div>
		                                <div class="col-sm-9 col-xs-11 p0">
			                                <div class="col-sm-12 col-xs-12 width-xs">
			                                  <input type="text" name="code" id="code_space" value="<?php echo $code;?>">
			                              	</div>
			                              	<p class="create-promo col-sm-12 col-xs-12 pt10"><?php echo SPACES_APOSTROPHES_AND_NON_ALPHA_NUMERIC_CHARACTERS; ?> (except '-', '_', '@' and '.') <?php echo ARE_NOT_ALLOWED; ?> (Examples: johnsmith@gmail.com, earlybirdspecial_08, dc-121232)<br>
			                                <span class="or">- or -</span>
		                                	</p>
		                               </div>
                               </div>
                               
                               <div class="col-sm-12 col-xs-12">
                                <div class="discount-dollar pright0">
                                  <div class="radio">
                                      <label>
                                      <input type="radio" name="code1" value="1" id="code_id2">
                                      </label>
                                  </div>
                                  
                                </div>
                                
                                <div class="col-sm-9 col-xs-11 p0" >
                              
                              		<div class="col-sm-12 col-xs-12" >
                                	
	                                    <div class="col-sm-8">
	                            			<input type="text" placeholder="Upload .csv file" id="att_csv">
	                                    </div>
	                                    <div class="col-sm-4 col-xs-4 browse1">
	                                   		<div class="upload">
	                                   		 <a href="javascript://" class="btn btn-event"><?php echo BROWSE; ?></a>
	                                		 <input type="file" class="uploads" name="csv_file" id="att_upload">
	                                    </div>
	                                   	</div> 
                            		</div>
                            	
                            	
                                <p class="create-promo col-sm-12 col-xs-12 pt10"><?php echo FILE_MUST_BE_CSV_AND_CAN_CONTAIN_UP_TO_CODES_SEPARATED_BY_COMMAS_OR_LISTED_ON_SEPARATE_LINES_MAXIMUM_OF_CHARACTERS_PER_CODE_SPACES_APOSTROPHES_AND_NON_ALPHANUMERIC_CHARACTERS_ARE_NOT_ALLOWED;?>
                                <strong><?php echo "Demo CSV:"?></strong> <a href="<?php echo site_url("event/export_csv");?>"><img src="<?php echo base_url();?>/images/page-line.png?>" alt="export" /></a>	
                                </p>
                            	
                            	
                               </div>
                               
                               </div>
                               
                               
                              </div>
                              </div>
                              	
                                <div class="form-group clearfix" id="dic_amount">
                                 <div class="col-sm-4 col-xs-3 width-xs lable-rite">
                                   <label class="mt0-xs1"><?php echo DISCOUNT_AMOUNT; ?> <span class="red">*</span> </label>
                                 </div>
                                 <div class="col-sm-8 col-xs-9 width-xs p0">
                                
                                <div class="col-xs-4 pright0 width-xs">
	                                <div class="discount-dollar">
	                                  <label><?php echo getCurrencySymbol($id); ?></label>
	                                  </div>
	                                <div class="col-sm-9 col-xs-9 pright0">
	                                  	<input type="text" name="disc_amount" id="disc_amount" value="<?php echo $disc_amt; ?>">
	                                </div>
                                </div>
                                  
                                  <div class="col-xs-8 pleft0 pleft15-xs1 pt10-xs width-xs">
	                                  <div class="discount-dollar">
	                                  	<label>or</label>
	                                  </div>
	                                  <div class="col-sm-4 col-xs-4 pright0"> 
	                                  	<input type="text" name="disc_perc" id="disc_perc" value="<?php echo $disc_perc; ?>" onkeyup="if(this.value > 0){ }else{ this.value=''; }">
	                                  </div>
	                                  <div class="ticket-price pl10">
	                                  	<label><?php echo OFF_TICKET_PRICE; ?></label>
	                                  </div>
                                  
                                  </div>
                                  
                                  </div>
                                 </div>
                                 
                                <div class="form-group pt clearfix">
                                 <div class="col-sm-4 col-xs-3 width-xs lable-rite">
                                   <label class="mt0-xs1"><?php echo APPLIES_TO; ?> <span class="red">*</span> </label>
                                 </div>
                                 <div class="col-sm-8 col-xs-9 width-xs">
                                <div class="checkbox checkbox2">
                                          <label>
                                            <input type="checkbox" id="selectall" name="all" value="1" <?php if($all ==1){echo "checked";}?>>
                                            <strong><?php echo ALL_TICKET_TYPES; ?></strong> 
                         					<span id="discount_codes"><?php echo DISCOUNT_CODES_CAN_ONLY_BE_APPLIED_TO_PAID_TICKETS_ON_SALE; ?></span>
                         					<span id="access_codes"><?php echo ACCESS_CODES_CAN_ONLY_BE_APPLIED_TO_HIDDEN_FIELDS; ?></span>
                                          </label>
                                    </div>
                                    
                                   <?php  
			
                                   foreach($ticket_name as $ticket) 
                                   {
                                   				$ticket_name= $ticket['ticket_name'];
												$ticket_id= $ticket['id'];
												$ticket_type= $ticket['type'];
												$price= $ticket['price'];
												$ticket_status= $ticket['ticket_status'];
												
												$edit_tickets = explode(',',$tickets);
												$check='';
												
												foreach($edit_tickets as $checked_ticket)
												{
													
													if($checked_ticket == $ticket_id)
													{
														$check = 'checked="checked"';
														
													}
												}
                                   	?>
                                   	<?php if($ticket_type == 1) {
                                   			if($ticket_status==2){?>
                                   				<div class="checkbox pt10">
                                    	
			                                          <label>
			                                            <input type="checkbox" class="checkbox1" name="chk[]" id="hidden_<?php echo $ticket_id;?>" value="<?php echo $ticket_id;?>">
			                                            <?php echo SecureShowData($ticket_name);  ?>
			                                          </label>
			                                          
			                                    </div>
                                   			<?php
                                   			}else{ ?>
                                   				<div class="checkbox pt10">
                                    	
			                                          <label>
			                                            <input type="checkbox" class="checkbox1" name="chk[]" id="free_<?php echo $ticket_id;?>" value="<?php echo $ticket_id;?>"<?php echo $check;?>>
			                                            <?php echo SecureShowData($ticket_name);  ?>(<?php echo "Free";?>)
			                                          </label>
			                                          
			                                    </div>
                                   			<?php	
                                   			
											}
                                   			?>
                                    
                                    <?php } if($ticket_type == 2) {
                                    		if($ticket_status==2){?>
                                   				<div class="checkbox pt10">
                                    	
			                                          <label>
			                                            <input type="checkbox" class="checkbox1" name="chk[]" id="hidden_<?php echo $ticket_id;?>" value="<?php echo $ticket_id;?>">
			                                            <?php echo SecureShowData($ticket_name);  ?>
			                                          </label>
			                                          
			                                    </div>
                                   			<?php
                                   			}else{ ?>
                                   				<div class="checkbox pt10">
                                    	
			                                          <label>
			                                            <input type="checkbox" class="checkbox1" name="chk[]" id="paid_<?php echo $ticket_id;?>" value="<?php echo $ticket_id;?>"<?php echo $check;?>>
			                                            <?php echo SecureShowData($ticket_name);  ?>(<?php echo set_event_currency($price, $id); ?>)
			                                          </label>
			                                          
			                                    </div>
                                   			<?php	
                                   			
											}
                                   			?>
                                    <?php } if($ticket_type == 3) {
                                    		if($ticket_status==2){?>
                                   				<div class="checkbox pt10">
                                    	
			                                          <label>
			                                            <input type="checkbox" class="checkbox1" name="chk[]" id="hidden_<?php echo $ticket_id;?>" value="<?php echo $ticket_id;?>">
			                                            <?php echo SecureShowData($ticket_name);  ?>
			                                          </label>
			                                          
			                                    </div>
                                   			<?php
                                   			}else{ ?>
                                   				<div class="checkbox pt10">
                                    	
			                                          <label>
			                                            <input type="checkbox" class="checkbox1" name="chk[]" id="don_<?php echo $ticket_id;?>" value="<?php echo $ticket_id;?>"<?php echo $check;?>>
			                                            <?php echo SecureShowData($ticket_name);  ?>(<?php echo "Donation";?>)
			                                          </label>
			                                          
			                                    </div>
                                   			<?php	
                                   			
											}
                                   			?>
                                    <?php } 
                                    } ?>
                                    
                                  </div>
                                 </div>
                                 
                                 <div class="form-group pt clearfix ">
                            	<div class="col-sm-4 col-xs-3 lable-rite width-xs">
                            		<label><?php echo USES; ?></label>
                            	</div>
                            	<div class="col-sm-8 col-xs-9 pright0 width-xs">
                                <div class="col-sm-12 col-xs-12 p0">
                                	<div class="radio">
                                          <label>
                                            <input type="radio" name="unlimited" id="unlimited" value="0" <?php if($unlimited ==0){echo "checked";}?>>
                                           <?php echo UNLIMITED; ?>
                                          </label>
                                        </div>
                                </div>
                                
                                <div class="col-sm-12 col-xs-12 p0">
	                                <div class="discount-dollar p0">
	                                  <div class="radio">
	                                      <label>
	                                      <input type="radio" name="unlimited" id="uses_id" value="1" <?php if($unlimited ==1){echo "checked";}?>>
	                                      </label>
	                                  </div>
	                                  
	                                </div>
                                <div class="col-sm-9 col-xs-11 p0">
                                	<div class="col-sm-6 col-xs-6 pleft0">
                                  		<input type="text" name="uses" id="uses" value="<?php echo $uses; ?>">
                             	 	</div>
                              		<div class="col-sm-1 col-xs-2 p0">
                                  		<label><?php echo USES; ?></label>
                               	 	</div>
                              
                               </div>
                               </div>
                                        
                               </div>
                          </div>
                          
                          <div class="form-group pt clearfix ">
                            	<div class="col-sm-4 col-xs-3 lable-rite width-xs">
                            		<label><?php echo STARTS; ?></label>
                            	</div>
                            	<div class="col-sm-8 col-xs-9 width-xs">
                                <div class="col-sm-12 col-xs-12 p0">
                                	<div class="radio">
                                          <label>
                                            <input type="radio" name="starts" id="now" value="0" <?php if($starts==0) { echo "checked"; } ?>>
                                            <?php echo NOW; ?>
                                          </label>
                                        </div>
                                </div>
                                
                                <div class="col-sm-12 col-xs-12 p0">
                                <div class="discount-dollar p0">
                                  <div class="radio">
                                      <label>
                                      <input type="radio" name="starts" id="start_select_date" value="1" <?php if($starts==1) { echo "checked"; } ?>>
                                      </label>
                                  </div>
                                  
                                </div>
                                <div class="col-sm-9 col-xs-11 width-xs2 p0">
                              <div class="select-fix mt10">
                                  <label><?php echo SELECT_DATE; ?></label>
                                </div>
                              <div class="col-sm-7 col-xs-7 pleft0">
                                  <input type="text" name="start_date_time" id="start_date_time" value="<?php echo $start_date_time; ?>">
                              </div>
                               </div>
                               </div>
                               
                               <div class="col-sm-12 col-xs-12 pleft0 pright0 pt10">
                                <div class="discount-dollar p0">
                                  <div class="radio">
                                      <label>
                                      	<input type="radio" name="starts" id="start_day_h_m" value="2" <?php if($starts==2) { echo "checked"; } ?>>
                                      </label>
                                  </div>
                                  
                                </div>
                                <div class="col-sm-11 col-xs-11 width-xs pleft0 pright0 pleft15-xs1">
                                
                                <div class="col-sm-3 col-xs-2 pleft0 pright0 width-xs">
	                                <div class="col-sm-12 col-xs-12 pleft0">
	                                  <input type="text" placeholder="Days" name="start_day" id="start_day" value="<?php echo SecureShowData($start_day);?>">
	                                </div>
                                </div>
                                  
                                  <div class="col-sm-3 col-xs-2 pleft0 pright0 pt10-xs width-xs">
	                                  <div class="col-sm-12 col-xs-12 pleft0">
	                                  	<input type="text" placeholder="Hours" name="start_hour" id="start_hour" value="<?php echo $start_hour;?>">
	                                  </div>
                                  </div>
                                  
                                  <div class="col-sm-6 col-xs-8 pt10-xs pleft0 pright0 width-xs">
	                                  <div class="col-sm-6 col-xs-6 pleft0">
	                                  	<input type="text" placeholder="Minutes" name="start_minute" id="start_minute" value="<?php echo $start_minute;?>">
	                                  </div>
	                                  <div class="max-time3">
	                                  	<label><?php echo BEFORE_THE_EVENT_STARTS; ?></label>
	                                  </div>
                                  </div>
                                  
                                  </div>
                               </div>
                                        
                               </div>
                          </div>
                          
                          <div class="form-group pt clearfix ">
                            	<div class="col-sm-4 col-xs-3 lable-rite width-xs">
                            		<label><?php echo ENDS; ?></label>
                            	</div>
                            	<div class="col-sm-8 col-xs-9 width-xs">
                                <div class="col-sm-12 col-xs-12 p0">
                                	<div class="radio">
                                          <label>
                                            <input type="radio" name="sales_end" id="sales_end" value="0" <?php if($sales_end==0) { echo "checked"; } ?>>
                                          <?php echo WHEN_SALES_END; ?>
                                          </label>
                                        </div>
                                </div>
                                
                                <div class="col-sm-12 col-xs-12 p0">
                                <div class="discount-dollar p0">
                                  <div class="radio">
                                      <label>
                                      <input type="radio" name="sales_end" id="end_select_date" value="1" <?php if($sales_end==1) { echo "checked"; } ?>>
                                      </label>
                                  </div>
                                  
                                </div>
                                <div class="col-sm-9 col-xs-11 width-xs2 p0">
                              <div class="select-fix mt10">
                                  <label><?php echo SELECT_DATE; ?></label>
                                </div>
                              <div class="col-sm-7 col-xs-7 pleft0">
                                  <input type="text" name="end_date_time" id="end_date_time" value="<?php echo $end_date_time;?>">
                              </div>
                               </div>
                               </div>
                               
                               <div class="col-sm-12 col-xs-12 pleft0 pright0 pt10">
                                <div class="discount-dollar p0">
                                  <div class="radio">
                                      <label>
                                      	<input type="radio" name="sales_end" id="end_day_h_m" value="2" <?php if($sales_end==2) { echo "checked"; } ?>>
                                      </label>
                                  </div>
                                  
                                </div>
                                <div class="col-sm-11 col-xs-11 width-xs pleft0 pright0 pleft15-xs1">
                                
                                <div class="col-sm-3 col-xs-2 pleft0 pright0 width-xs">
	                                <div class="col-sm-12 col-xs-12 pleft0">
	                                  <input type="text" placeholder="Days" name="end_day" id="end_day" value="<?php echo $end_day;?>">
	                                </div>
                                </div>
                                  
                                  <div class="col-sm-3 col-xs-2 pleft0 pright0 pt10-xs width-xs">
	                                  <div class="col-sm-12 col-xs-12 pleft0">
	                                  	<input type="text" placeholder="Hours" name="end_hour" id="end_hour" value="<?php echo $end_hour;?>">
	                                  </div>
                                  </div>
                                  
                                  <div class="col-sm-6 col-xs-8 pt10-xs pleft0 pright0 width-xs">
	                                  <div class="col-sm-6 col-xs-6 pleft0">
	                                  	<input type="text" placeholder="Minutes" name="end_minute" id="end_minute" value="<?php echo $end_minute;?>">
	                                  </div>
	                                  <div class="max-time3">
	                                  	<label><?php echo BEFORE_THE_EVENT_ENDS; ?></label>
	                                  </div>
                                  </div>
                                  
                                  </div>
                               </div>
                                        
                               </div>
                          </div>
                              
                              
                        
                    </div>
                 </div>
                 
                 <div class="text-right col-lg-12">
                <input type="submit" value="<?php echo SAVE;?>" class="btn-event2"/>
                <a href="<?php echo site_url('event/promotional_codes/'.$id);?>" class="btn-eventgrey marL10"><?php echo CANCEL; ?></a>
                </div>
                
             </div>
             
                           
                 
             </div>
                </form>  
                <!-- RIGHT CONTENT -->
               <?php echo $this->load->view('default/common/event_dashboard_sidebar',$data1);?>
             </div>
                
            </div><!-- End container -->
    </section>
    
    <!-- Start footer -->
    
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
    <script>

    $(document).ready(function() {

	$('#selectall').click(function(event) {  //on click 

        if(this.checked) { // check select status
    
			
            $('.checkbox1').each(function() { //loop through each checkbox
				var d = $('#code_type').val();
				var a = $(this).val();
				if(d=='disc'){
					$('#paid_'+a).prop('checked',true);
					$('#hidden_'+a).prop('checked',false);
				}else{
					$('#paid_'+a).prop('checked',false);
					$('#hidden_'+a).prop('checked',true);
				}
				
                          

            });

        } else{

            $('.checkbox1').each(function() { //loop through each checkbox

                this.checked = false; //deselect all checkboxes with class "checkbox1"                       

            });         

        }

    });

    

});
</script>
<script src="<?php echo base_url(); ?>js/bootstrap-datepicker.js"></script>

        
<script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
              var today = "<?php echo $today ?>"
							var event_end_date = "<?php echo $event_end_date ?>"

							$('#start_date_time').datepicker({format: "yyyy-mm-dd",orientation: 'top', startDate : today, endDate : event_end_date });

							$('#end_date_time').datepicker({format: "yyyy-mm-dd",	orientation: 'top' , startDate : today, endDate : event_end_date });
				
            });
			
</script> 