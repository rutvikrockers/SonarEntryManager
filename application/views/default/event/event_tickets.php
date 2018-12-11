
<thead>
      <tr>
          <th width="20%"><?php echo Ticket_name;?><span>&#42;</span></th>
          <th width="20%"><?php echo QUANTITY;?><span>&#42;</span></th>
          <th width="20%"><?php echo Price;?><span>&#42;</span></th>
          <th width="10%"><?php echo Fee;?></th>
          <th width="10%"><?php echo Buyer_Total;?></th>
          <th width="10%"><?php echo Sales_Status;?></th>
          <th width="5%"><?php echo Setting;?></th>
          <th width="5%"><?php echo Action;?></th>
      </tr>
</thead> 
 
<tbody id="add_more2" >	
	<?php $free_ticket_cnt=1;
	if($free_tickets){
		foreach($free_tickets as $free){
			$free_ticket_cnt= $free['id'];
			$start_sale = explode(' ', $free['start_sale']);
			$end_sale = explode(' ', $free['end_sale']);
			
	?>	
	  <?php //======================== Free Ticket Start ========================== ?> 
	       <tbody id="ticket<?php echo $free['id']; ?>">
	       
	        <tr>
	          <td><input maxlength="30" type="text" value="<?php echo $free['ticket_name'];?>" onkeyup="set_sales_status(this,'free','<?php echo $free['id']; ?>');" id="free_ticket_name<?php echo $free['id']; ?>" name="free_ticket_name[]" placeholder="<?php echo General_Admission;?>"></td>
	          <td><input type="text" value="<?php echo $free['qty'];?>" onchange="if(check_less_quantity(this, '<?php echo $free['used']; ?>', '<?php echo $free['id']; ?>', '<?php echo $free['qty']; ?>')){ set_event_capacity(this,'<?php echo $free['id']; ?>','free'); }" autocomplete="off" id="free_qty<?php echo $free['id']; ?>" name="free_qty[]" ><?php if($free['used'] > 0) { 
				  $remainingQty = $free['qty'] - $free['used'];
				  echo '<br />'.$free['used'].Tickets_Sold.' / '.$remainingQty.' '.TICKET_AVAILABLE; 
				} ?></td>
	          <td>&nbsp;<input type="hidden" id="free_used" class="free_used_val" value="<?php if($free['used']>0){echo '1';}else{echo '0';} ?>"></td>
	          <td class="PadT2">&nbsp;<?php echo Free; ?></td>
	          <td>&nbsp;</td>
	          <td class="text-center"><span id="free_sales<?php echo $free['id']; ?>">
	          	<?php if($free['ticket_status'] == 0){?>
		          <span class="LinH40"><?php echo Incomplete; ?></span>
		          <input type="hidden" value="0" name="free_ticket_status[]">
	          	<?php } else { ?>
		          	<select name="free_ticket_status[]" class="select-pad" >
					<?php 
			          	foreach($ticketStatus as $status) { 
							$select='';
							if($status['id'] == $free['ticket_status']){ $select = 'selected="selected"';}
						echo '<option value="'.$status['id'].'" '.$select.' >'.SecureShowData($status['status_name']).'</option>' ;
						}
					?>
					</select>
	          	<?php }?>
	          </span></td>
	          <td class="text-center back-plain" id="example"><a href="javascript://" data-toggle="tooltip" data-placement="right" title="<?php echo Ticket_Setting; ?>" onclick="set_free_ticket_info('free_ticket_info<?php echo $free['id']; ?>','show');"><span class="setting"><i class="glyphicon glyphicon-cog"></i></span></a></td>
		      <td class="text-center"><?php if($free['used'] == 0) { ?><a onclick="remove_ticket_div(<?php echo $free['id']; ?>);" href="javascript://" data-toggle="tooltip" data-placement="right" title="<?php echo Ticket_Delete; ?>"><span class="setting"><i class="glyphicon glyphicon-trash"></i></span></a><?php } ?></td>                               	  
	        </tr>
	        
	        <tr id="free_ticket_info<?php echo $free['id']; ?>" style="display : none;">
	          <td colspan="8" class="back-grey creat_TS_td" >
	          
		          <div class="col-sm-3 col-xs-12 lable-rite">
		          	<label class="boldL_sm"><?php echo Ticket_Description;?></label>
		          </div>
		          
		          <div class="col-sm-8 col-xs-12 m10 mb10">
		          	<input maxlength="50" type="text" name="free_description[]" id="free_description_<?php echo $free['id']; ?>" onkeyup="if($.trim(this.value)=='') { $('#free_hide_description<?php echo $free['id']; ?>').prop('disabled',true).prop('checked', false); }else { $('#free_hide_description<?php echo $free['id']; ?>').prop('disabled',false);} " value="<?php echo $free['description'];?>" autocomplete="off">
		          	<p class="fromText"><?php echo Maximum_50_characters; ?></p>
		          	<div class="radio">
			          	<label>
			          		
			          		<input <?php if($free['hide_description'] == 1) { echo 'checked="checked"'; }  if($free['description'] == '') { echo 'disabled'; }?> autocomplete="off" value="1" type="checkbox" onclick="set_hide_description(this,'free','<?php echo $free['id']; ?>')" id="free_hide_description<?php echo $free['id']; ?>" >
							<?php echo Hide_description_on_event_pages;?>
							<input class="hideDescription" autocomplete="off" type="hidden" name="free_hide_description[]" value="<?php echo ($free['hide_description'] == 1) ? 1: 0; ?>">
						</label>
		          	</div>
		          </div>
		          <div class="clear"></div>
	
		          <div class="col-sm-3 col-xs-12 lable-rite">
		          	<label class="boldL_sm"><?php echo Date_Time;?> </label>
		          </div>
	
		          <div class="col-sm-2 col-xs-12 m10 mb10">
		          	<label><?php echo Sales_Starts;?></label>
		          	<input type="text" readonly="readonly" value="<?php echo $start_sale[0];?>" class="datepicker free_start_sale_date" name="free_start_sale_date[]" id="free_start_sale_date_<?php echo $free['id']; ?>">
		          </div>
		          
		          <div class="col-sm-2 col-xs-12 m10 mb10">
		          	<label class="hide_xs">&nbsp;</label>
		          	<input type="text" value="<?php echo $start_sale[1];?>"  class="timepicker" name="free_start_sale_time[]" id="free_start_sale_time_<?php echo $free['id']; ?>">
		          </div>
	
		          <div class="col-sm-2 col-xs-12 m10 mb10">
		          	<label><?php echo Sales_Ends;?></label>
		          	<input type="text" readonly="readonly" value="<?php echo $end_sale[0];?>"  class="datepicker free_end_sale_date" name="free_end_sale_date[]" id="free_end_sale_date_<?php echo $free['id']; ?>">
		          </div>   
		          
		          <div class="col-sm-2 col-xs-12 m10 mb10">
		          	<label  class="hide_xs">&nbsp;</label>
		          	<input type="text"  value="<?php echo $end_sale[1];?>"  class="timepicker" name="free_end_sale_time[]" id="free_end_sale_time_<?php echo $free['id']; ?>">
		          </div> 
		          <div class="clear"></div> 
		          
		          <div class="col-sm-3 col-xs-12 lable-rite">
		          	<label  class="hide_xs">&nbsp;</label>
		          </div>
		          <div class="col-sm-8 col-xs-12 m10 mb10">     	
		          	<div class="chks_start_chks_end error"></div> 
		          </div>
		          <div class="clear"></div>  
		          
		          <div class="col-sm-3 col-xs-12 lable-rite">
		          	<label class="boldL_sm"><?php echo Tickets_permitted_per_order;?> </label>
		          </div>
	
		         <div class="col-sm-4 col-xs-12 m10 mb10">
		          	<label><?php echo Minimum;?></label>
		          	<input type="text" value="<?php echo $free['min_purchase'];?>"  onkeyup="return check_ticket_min_qty(this);" id="free_min_purchase_<?php echo $free['id']; ?>" name="free_min_purchase[]">
		          </div>
	
		          <div class="col-sm-4 col-xs-12 m10 mb10">
		          	<label><?php echo Maximum;?></label>
		          	<input type="text" value="<?php echo $free['max_purchase'];?>" onkeyup="return check_ticket_max_qty(this);" id="free_max_purchase_<?php echo $free['id']; ?>" name="free_max_purchase[]">
		          </div>  
		                  	
		          <div class="clear"></div> 
		                
		          
		          <input type="hidden" value="<?php echo $free['id'];?>" id="ticket_id" name="free_ticket_id[]">										              
		          
		          <a class="btn-event fr" onclick="set_free_ticket_info('free_ticket_info<?php echo $free['id']; ?>','hide');" href="javascript://"><?php echo Apply;?></a>
	  				<div class="clear"></div>
	            </td>
	        </tr>
	      </tbody>
	<?php //======================== Free Ticket End ========================== ?>   
	<?php } } ?>				
	<input type="hidden" name="free_ticket_cnt" id="free_ticket_cnt" value="<?php echo $free_ticket_cnt;?>" />
	<input type="hidden" name="free_ticket_remove" id="free_ticket_remove" value="" />
</tbody>

<tbody id="add_more1"> 
	<?php $paid_ticket_cnt=1; 
	if($paid_tickets){ 
		foreach($paid_tickets as $paid){ $paid_ticket_cnt++;
			$paid_ticket_cnt = $paid['id'];
			$start_sale = explode(' ', $paid['start_sale']);
			$end_sale = explode(' ', $paid['end_sale']);
			
			$site_setting = site_setting();
			$paid_ticket_flat_fee =  $site_setting['paid_ticket_flat_fee'];
			$currency_symbol =  $site_setting['currency_code'];
			$event_data = getRecordById('events','id',$event_id);
			$event_main_id = $event_data['id'];

			$currency_fee_total  = convert_event_currency($paid_ticket_flat_fee,$currency_symbol,$event_main_id);
	?>	

	<?php //======================== Paid Ticket Start ========================== ?>           
		<tbody id="paid_ticket<?php echo $paid['id']; ?>"  >
			 <tr>
	          <td><input maxlength="30" value="<?php echo $paid['ticket_name'];?>" type="text" onkeyup="set_sales_status(this,'paid','<?php echo $paid['id']; ?>');" id="paid_ticket_name<?php echo $paid['id']; ?>" name="paid_ticket_name[]" placeholder="<?php echo General_Admission;?>"></td>
	          <td><input value="<?php echo $paid['qty'];?>" type="text" onchange="if(check_less_quantity(this, '<?php echo $paid['used']; ?>', '<?php echo $paid['id']; ?>', '<?php echo $paid['qty']; ?>')){  set_event_capacity(this,'<?php echo $paid['id']; ?>','paid'); } " autocomplete="off" id="paid_qty<?php echo $paid['id']; ?>" name="paid_qty[]"><?php if($paid['used'] > 0) { 
				  $remainingQty = $paid['qty'] - $paid['used'];
				  echo '<br />'.$paid['used'].Tickets_Sold.' / '.$remainingQty.' '.TICKET_AVAILABLE;
				  } ?></td>
	          <input type="hidden" id="paid_used" class="paid_used_val" value="<?php if($paid['used']>0){echo '1';}else{echo '0';} ?>">
	          <td class="clearfix">
	          
		          <div class="col-sm-11 col-xs-11 pr pleft0">
		          	<input value="<?php echo $paid['price'];?>" type="text" onkeyup="set_fee_and_total('<?php echo $paid['id']; ?>',this);" id="paid_price<?php echo $paid['id']; ?>" class="paid_price_place" name="paid_price[]" style="text-align:right;" placeholder="<?php echo $site_setting['currency_symbol']; ?>">
		          </div>
		          <div class="col-sm-1 col-xs-1 tool pre">
                      <div class="tool-hover">
                     	 	<img width=" " height=" " class="" alt=" " src="<?php echo base_url();?>images/i.png">
                      		<div class="docs-tooltip ticketlabel" id="docs_tooltip<?php echo $paid['id']; ?>">
                      			<div style="display: inline-block;width: 100%;"><div class="clearfix"><?php echo Ticket_Price;?> 
                      				<span> <?php echo set_event_currency($paid['price'],$event_id); ?></span></div>
                      			</div> 
                      			<div style="display: inline-block;width: 100%;">
                      			<div class="clearfix"><?php echo Fee;?>  <span><?php if($paid['service_fee'] == 2) { echo N_A; } else {echo set_event_currency($paid['fee'],$event_id);} ?> </span></div>
                      			</div>
                      			<div style="display: inline-block;width: 100%;">
                      			<div class="clearfix"><?php echo Flat_Fee;?>  <span><?php if($paid['service_fee'] == 2) { echo N_A; } else { echo set_event_currency($currency_fee_total,$event_id); } ?> </span></div>
                      			</div>
                      			<div class="botm-bodr"> 
                      				<div class="clearfix"><?php echo Buyer_Total;?> 
                      				<span> <?php echo set_event_currency($paid['buyer_total'],$event_id); ?></span></div>
                      				</div>
              				</div>
                      </div>
                  </div>
                  
	          </td>
	          <td class="PadT2">
	          	<span id="paid_fee<?php echo $paid['id']; ?>" class="fee paid_fee_span"><?php if($paid['fee'] != '') { echo set_event_currency($paid['fee'],$event_id); } else { echo set_currency(0);} ?></span>
	          	<input type="hidden" value="<?php echo $paid['fee']; ?>" id="paid_fee_val<?php echo $paid['id']; ?>" name="paid_fee[]">
	          </td>
	          <td class="text-center PadT2">
				<span id="paid_total<?php echo $paid['id']; ?>" class="fee paid_total_span">
					  <?php 
		          if($paid['buyer_total']!=''){
  					if ($event_pass_fees==2 || ($event_pass_fees == 3 && $paid['service_fee']==2)){
  						echo set_event_currency($paid['price'], $event_id);
  					} else {
  						echo set_event_currency($paid['buyer_total'], $event_id);
  					}
		          } else { echo set_currency(0); }
		          ?>
				</span>
	          	<input type="hidden" value="<?php echo $paid['buyer_total'];?>" id="paid_total_val<?php echo $paid['id']; ?>" name="paid_buyer_total[]">
			  </td>
	          <td class="text-center"><span id="paid_sales<?php echo $paid['id']; ?>">
	          
	            <?php if($paid['ticket_status'] == 0){?>
		          <span class="LinH40"><?php echo Incomplete; ?></span>
		          <input type="hidden" value="0" name="paid_ticket_status[]"
	          	<?php } else { ?>
		          	<select name="paid_ticket_status[]" class="select-pad" >
					<?php 
			          	foreach($ticketStatus as $status) { 
							$select='';
							if($status['id'] == $paid['ticket_status']){ $select = 'selected="selected"';}
						echo '<option value="'.$status['id'].'" '.$select.' >'.SecureShowData($status['status_name']).'</option>' ;
						}
					?>
					</select>
	          	<?php }?>
	    		</span></td>
	          <td class="text-center back-plain" id="example"><a href="javascript://" data-toggle="tooltip" data-placement="right" title="<?php echo Ticket_Setting; ?>"  onclick="set_paid_ticket_info('paid_ticket_info<?php echo $paid['id']; ?>','show');"><span class="setting"><i class="glyphicon glyphicon-cog"></i></span></a></td>
		      <td class="text-center"><?php if($paid['used'] == 0) { ?><a onclick="remove_paid_ticket_div(<?php echo $paid['id']; ?>);" href="javascript://" data-toggle="tooltip" data-placement="right" title="<?php echo Ticket_Delete; ?>"><span class="setting"><i class="glyphicon glyphicon-trash"></i></span></a><?php } ?></td>                               	  
	        </tr>
	
	        <tr id="paid_ticket_info<?php echo $paid['id']; ?>" style="display : none;">
	          <td colspan="8" class="back-grey creat_TS_td" >
	          
		          <div class="col-sm-3 col-xs-12 lable-rite">
		          	<label><?php echo Ticket_Description;?></label>
		          </div>
		          
		          <div class="col-sm-8 col-xs-12 m10 mb10">
		          	<input maxlength="50" type="text" value = "<?php echo SecureShowData($paid['description']); ?>" name="paid_description[]" id="paid_description_<?php echo $paid['id']; ?>" onkeyup="if($.trim(this.value)=='') { $('#paid_hide_description_<?php echo $paid['id']; ?>').prop('disabled',true).prop('checked', false); }else { $('#paid_hide_description_<?php echo $paid['id']; ?>').prop('disabled',false);} " autocomplete="off">
		          	<p class="fromText"><?php echo Maximum_50_characters; ?></p>
		          	<div class="radio">
			          	<label>
			          		<input <?php if($paid['hide_description'] == 1) { echo 'checked="checked"'; } if($paid['description'] == '') { echo 'disabled'; } ?>  autocomplete="off" value="1" type="checkbox" onclick="set_hide_description(this,'paid','<?php echo $paid['id']; ?>')" id="paid_hide_description_<?php echo $paid['id']; ?>">
							<?php echo Hide_description_on_event_pages;?>
							<input class="hideDescription" autocomplete="off" type="hidden" name="paid_hide_description[]" value="<?php echo ($paid['hide_description'] == 1) ? 1: 0; ?>">
						</label>
		          	</div>
		          </div>
		          <div class="clear"></div>
	
		          <div class="col-sm-3 col-xs-12 lable-rite">
		          	<label><?php echo Date_Time;?> </label>
		          </div>
	
		          <div class="col-sm-2 col-xs-12 m10 mb10">
		          	<label><?php echo Sales_Starts;?></label>
		          	<input type="text" readonly="readonly" value="<?php echo $start_sale[0];?>" class="datepicker paid_start_sale_date" name="paid_start_sale_date[]" id="paid_start_sale_date_<?php echo $paid['id']; ?>">
		          </div>
		          
		          <div class="col-sm-2 col-xs-12 m10 mb10">
		          	<label  class="hide_xs">&nbsp;</label>
		          	<input type="text" value="<?php echo $start_sale[1];?>"  class="timepicker" name="paid_start_sale_time[]" id="paid_start_sale_time_<?php echo $paid['id']; ?>">
		          </div>
	
		          <div class="col-sm-2 col-xs-12 m10 mb10">
		          	<label><?php echo Sales_Ends;?></label>
		          	<input type="text" readonly="readonly" value="<?php echo $end_sale[0];?>"  class="datepicker paid_end_sale_date" name="paid_end_sale_date[]" id="paid_end_sale_date_<?php echo $paid['id']; ?>">
		          </div>   
		          
		          <div class="col-sm-2 col-xs-12 m10 mb10">
		          	<label  class="hide_xs">&nbsp;</label>
		          	<input type="text"  value="<?php echo $end_sale[1];?>"  class="timepicker" name="paid_end_sale_time[]" id="paid_end_sale_time_<?php echo $paid['id']; ?>">
		          </div> 
		          <div class="clear"></div> 
		          
		          <div class="col-sm-3 col-xs-12 lable-rite">
		          	<label  class="hide_xs">&nbsp;</label>
		          </div>
		          <div class="col-sm-8 col-xs-12 m10 mb10">     	
		          	<div class="chks_start_chks_end error"></div> 
		          </div>
		          <div class="clear"></div>  
		          
		          <div class="col-sm-3 col-xs-12 lable-rite">
		          	<label class="boldL_sm"><?php echo Tickets_permitted_per_order;?> </label>
		          </div>
	
		          <div class="col-sm-4 col-xs-12 m10 mb10">
		          	<label><?php echo Minimum;?></label>
		          	<input type="text" value="<?php echo $paid['min_purchase'];?>"  onkeyup="return check_ticket_min_qty(this);" id="paid_min_purchase_<?php echo $paid['id']; ?>" name="paid_min_purchase[]">
		          </div>
	
		          <div class="col-sm-4 col-xs-12 m10 mb10">
		          	<label><?php echo Maximum;?></label>
		          	<input type="text" value="<?php echo $paid['max_purchase'];?>" onkeyup="return check_ticket_max_qty(this);" id="paid_max_purchase_<?php echo $paid['id']; ?>" name="paid_max_purchase[]">
		          </div>       	
		          <div class="clear"></div> 
		          
				  <div class="paid_fee_div" style=" display: <?php if($event_pass_fees == 3){ echo 'block'; } else { echo 'none';}?>;">
					  <div class="col-sm-3 col-xs-12 lable-rite">
			          	<label><?php echo Service_Fees ;?> </label>
			          </div>
		
			          <div class="col-sm-4 col-xs-12 m10 mb10">
			          	<div class="radio">
				          	<label>
				          		<input <?php if($paid['service_fee'] == 1) { echo 'checked="checked"'; } ?> type="radio" checked="checked" onclick="set_paid_service_fee(this.value,'paid_service_fee<?php echo $paid['id']; ?>');" value="1" id="paid_service_fees1" class="paidServiceFees" name="paid_service_fee<?php echo $paid['id']; ?>[]">
				          		&nbsp;<?php echo Pass_on_the_fees_to_the_ticket_buyer;?>
				          	</label>
			          	</div>
			          	
			          	<div class="radio">
				          	<label>
				          		<input <?php if($paid['service_fee'] == 2) { echo 'checked="checked"'; } ?> type="radio" onclick="set_paid_service_fee(this.value,'paid_service_fee<?php echo $paid['id']; ?>');" value="2" id="paid_service_fees2" class="paidServiceFees" name="paid_service_fee<?php echo $paid['id']; ?>[]">
				          		&nbsp;<?php echo Absorb_the_fees_into_the_ticket_price;?>
				          	</label>
			          	</div>
			          </div>
			          <input type="hidden" value="<?php echo $paid['service_fee'];?>" id="paid_service_fee<?php echo $paid['id']; ?>" name="paid_service_fee[]">

		          
		          </div>
		          <div class="clear"></div>
				  
				  
		          <input type="hidden" value="<?php echo $paid['id']; ?>" id="ticket_id" name="paid_ticket_id[]">				
	          
		          	<div class="take-estimate text-center take-estimate-<?php echo $paid['id']; ?>" style="display: none;">
					    <h3><?php echo FEES_STRUCTURE;?></h3>
						<ul class="take-estimate-area">
						    <li> 
						        <h5><?php echo Buyer_Total;?></h5>
						        <p class="take-estimate-ticket-amount" id="take-estimate-ticket-amount-<?php echo $paid['id']; ?>">110.0 $</p>
						    </li>
						    <li class="no-brdr" style="width: 80px;">
						        - {
						    </li>
						    <li> 
						        <h5><?php echo Service_Fees;?> </h5>
						        <p>~<?php echo $site_setting['paid_ticket_fee']; ?>% + <?php echo $site_setting['paid_ticket_flat_fee']; ?></p>
						    </li>
						   
						    <li class="no-brdr">
						        +
						    </li>
						     <li> 
						        <h5><?php echo Gateway_fees;?></h5>
						        <p class="payment_gateway_fee_structure"></p>
						        <!-- <p>2.9% + 0.30¢</p> -->
						    </li>
						   	<li class="no-brdr" style="width: 80px;">
						        } =
						    </li>
						    <li> 
						        <h5><?php echo ACTUAL_TAKE_AWAY;?></h5>
						        <p class="take-away-amount" id="take-away-amount-<?php echo $paid['id']; ?>">~ 100.2 $</p>
						    </li>
						</ul>
					</div>
		          <div class="clear"></div>
		          <a class="btn-event fr" onclick="set_paid_ticket_info('paid_ticket_info<?php echo $paid['id']; ?>','hide');" href="javascript://"><?php echo Apply;?></a>
	  				<div class="clear"></div>
	            </td>
	        </tr>
		</tbody>
	<?php //======================== Paid Ticket End ========================== ?>  
	<?php  } 
    }?>
	<input type="hidden" name="paid_ticket_cnt" id="paid_ticket_cnt" value="<?php echo $paid_ticket_cnt;?>" />
	<input type="hidden" name="paid_ticket_remove" id="paid_ticket_remove" value="" />
</tbody>
<tbody id="add_more3"> 
	<?php 
	$donation_ticket_cnt=1; 
	if($donation_tickets){
		foreach($donation_tickets as $donation){
			
			$donation_ticket_cnt =$donation['id'];
			
			$start_sale = explode(' ', $donation['start_sale']);
			$end_sale = explode(' ', $donation['end_sale']);

	?>
	<?php //======================== Donation Ticket Start ========================== ?>                    

		<tbody id="donation_ticket<?php echo $donation['id']; ?>">
			<tr>
	          <td><input maxlength="30" value="<?php echo SecureShowData($donation['ticket_name']); ?>"type="text" onkeyup="set_sales_status(this,'donation','<?php echo $donation['id']; ?>');" id="donation_ticket_name<?php echo $donation['id']; ?>" name="donation_ticket_name[]" placeholder="<?php echo General_Admission;?>"></td>
	          <td><input value= "<?php echo $donation['qty']; ?>" type="text" onchange="if(check_less_quantity(this, '<?php echo $donation['used']; ?>', '<?php echo $donation['id']; ?>', '<?php echo $donation['qty']; ?>')){ set_event_capacity(this,'<?php echo $donation['id']; ?>','donation'); } " autocomplete="off" id="donation_qty<?php echo $donation['id']; ?>" name="donation_qty[]"><?php if($donation['used'] > 0) { 
				  $remainingQty = $donation['qty'] - $donation['used'];
				  echo '<br />'.$donation['used'].Tickets_Sold.' / '.$remainingQty.' '.TICKET_AVAILABLE;
				}?></td>
	          <td><input type="hidden" id="donation_used" class="donation_used_val" value="<?php if($donation['used']>0){echo '1';}else{echo '0';} ?>"></td>
	          <td class="PadT2"><?php echo Donation;?></td>
	          <td class="text-center PadT2">&nbsp;</td>
	          <td class="text-center"><span id="donation_sales<?php echo $donation['id']; ?>">
	          	<?php if($donation['ticket_status'] == 0){?>
		          <span class="LinH40"><?php echo Incomplete; ?></span>
		          <input type="hidden" value="0" name="donation_ticket_status[]"
	          	<?php } else { ?>
		          	<select name="donation_ticket_status[]" class="select-pad" >
					<?php 
			          	foreach($ticketStatus as $status) { 
							$select='';
							if($status['id'] == $donation['ticket_status']){ $select = 'selected="selected"';}
						echo '<option value="'.$status['id'].'" '.$select.' >'.$status['status_name'].'</option>' ;
						}
					?>
					</select>
	          	<?php }?>
	          </span></td>
	          
	          <td class="text-center back-plain" id="example"><a href="javascript://" data-toggle="tooltip" data-placement="right" title="<?php echo Ticket_Setting; ?>" onclick="set_donation_ticket_info('donation_ticket_info<?php echo $donation['id']; ?>','show');"><span class="setting"><i class="glyphicon glyphicon-cog"></i></span></a></td>
		      <td class="text-center"><?php if($donation['used']==0){ ?><a onclick="remove_donation_ticket_div(<?php echo $donation['id']; ?>);" href="javascript://" data-toggle="tooltip" data-placement="right" title="<?php echo Ticket_Delete; ?>"><span class="setting"><i class="glyphicon glyphicon-trash"></i></span></a><?php } ?></td>                               	  
	        </tr>
	
	        <tr id="donation_ticket_info<?php echo $donation['id']; ?>" style="display:none;">
	          <td colspan="8" class="back-grey creat_TS_td">
	          
	         	 <div class="col-sm-3 col-xs-12 lable-rite">
		          	<label class="boldL_sm"><?php echo Ticket_Description;?></label>
		          </div>
		          
		          <div class="col-sm-8 col-xs-12 m10 mb10">
		          	
		          	<input maxlength="50" type="text" name="donation_description[]" id="donation_description_<?php echo $donation['id']; ?>" onkeyup="if($.trim(this.value)=='') { $('#donation_hide_description<?php echo $donation['id']; ?>').prop('disabled',true).prop('checked', false); }else { $('#donation_hide_description<?php echo $donation['id']; ?>').prop('disabled',false);} " value="<?php echo SecureShowData($donation['description']); ?>" autocomplete="off">
		          	<p class="fromText"><?php echo Maximum_50_characters; ?></p>
		          	<div class="radio">
			          	<label>
			          		
			          		<input <?php if($donation['hide_description'] == 1 ) { echo 'checked="checked"'; } if($donation['description'] == '') { echo 'disabled'; }?> autocomplete="off" value="1" type="checkbox" onclick="set_hide_description(this,'donation','<?php echo $donation['id']; ?>')" id="donation_hide_description<?php echo $donation['id']; ?>">
							<?php echo Hide_description_on_event_pages;?>
							<input class="hideDescription" autocomplete="off" type="hidden" name="donation_hide_description[]" value="<?php echo ($donation['hide_description'] == 1) ? 1: 0; ?>">
						</label>
		          	</div>
		          </div>
		          <div class="clear"></div>
		          
		          <div class="col-sm-3 col-xs-12 lable-rite">
		          	<label class="boldL_sm"><?php echo Date_Time;?> </label>
		          </div>
	
		          <div class="col-sm-2 col-xs-12 m10 mb10">
		          	<label><?php echo Sales_Starts;?></label>
		          	<input type="text" readonly="readonly" value="<?php echo $start_sale[0];?>" class="datepicker donation_start_sale_date " name="donation_start_sale_date[]" id="donation_start_sale_date_<?php echo $paid['id']; ?>">
		          </div>
		          
		          <div class="col-sm-2 col-xs-12 m10 mb10">
		          	<label  class="hide_xs">&nbsp;</label>
		          	<input type="text" value="<?php echo $start_sale[1];?>"  class="timepicker" name="donation_start_sale_time[]" id="donation_start_sale_time_<?php echo $paid['id']; ?>">
		          </div>
	
		          <div class="col-sm-2 col-xs-12 m10 mb10">
		          	<label><?php echo Sales_Ends;?></label>
		          	<input type="text" readonly="readonly" value="<?php echo $end_sale[0];?>"  class="datepicker donation_end_sale_date" name="donation_end_sale_date[]" id="donation_end_sale_date_<?php echo $paid['id']; ?>">
		          </div>   
		          
		          <div class="col-sm-2 col-xs-12 m10 mb10">
		          	<label  class="hide_xs">&nbsp;</label>
		          	<input type="text"  value="<?php echo $end_sale[1];?>"  class="timepicker" name="donation_end_sale_time[]" id="donation_end_sale_time_<?php echo $paid['id']; ?>">
		          </div> 
		          <div class="clear"></div> 
		          
		          <div class="col-sm-3 col-xs-12 lable-rite">
		          	<label  class="hide_xs">&nbsp;</label>
		          </div>
		          <div class="col-sm-8 col-xs-12 m10 mb10">     	
		          	<div class="chks_start_chks_end error"></div> 
		          </div>
		          <div class="clear"></div>
	
				  <div class="paid_fee_div" style=" display:<?php if($event_pass_fees == 3) { echo 'block'; } else { echo 'none'; }?>;">
					  <div class="col-sm-3 col-xs-12 lable-rite">
			          	<label><?php echo Service_Fees ;?> </label>
			          </div>
		
			          <div class="col-sm-4 col-xs-12 m10 mb10">
			          	<div class="radio">
				          	<label>
				          		<input <?php if($donation['service_fee'] == 1 ) { echo 'checked="checked"'; } ?> type="radio" onclick="set_paid_service_fee(this.value,'donation_service_fee<?php echo $donation['id']; ?>');" value="1" id="donation_service_fee1" name="donation_service_fee<?php echo $donation['id']; ?>[]">
				          		&nbsp;<?php echo Pass_on_the_fees_to_the_ticket_buyer;?>
				          	</label>
			          	</div>
			          	
			          	<div class="radio">
				          	<label>
				          		<input <?php if($donation['service_fee'] == 2 ) { echo 'checked="checked"'; } ?> type="radio" onclick="set_paid_service_fee(this.value,'donation_service_fee<?php echo $donation['id']; ?>');" value="2" id="donation_service_fee2" name="donation_service_fee<?php echo $donation['id']; ?>[]">
				          		&nbsp;<?php echo Absorb_the_fees_into_the_ticket_price;?>
				          	</label>
			          	</div>
			          </div>
			          <input type="hidden" value="1" id="donation_service_fee<?php echo $donation['id']; ?>" name="donation_service_fee[]" value="<?php echo $donation['service_fee'];?>">
		          
		          </div>
		          <div class="clear"></div>
		         
		          <input type="hidden"  id="ticket_id" name="donation_ticket_id[]" value="<?php echo $donation['id']; ?>">										           
		          
		          <a class="btn-event fr" onclick="set_donation_ticket_info('donation_ticket_info<?php echo $donation['id']; ?>','hide');" href="javascript://"><?php echo Apply;?></a>
					<div class="clear"></div>
	            </td> 
	        </tr>
		</tbody>
	<?php //======================== Donation Ticket End ========================== ?>
	<?php		
			}
		}
	?>		 
	<input type="hidden" name="donation_ticket_cnt" id="donation_ticket_cnt" value="<?php echo $donation_ticket_cnt;?>" />
	<input type="hidden" name="donation_ticket_remove" id="donation_ticket_remove" value="" />
</tbody>
<script>
	$(document).ready(function(){

		var nowDate = todayDate;
		var dateval =  $("#event_end_date").val();
		var timeval =  $("#event_end_time").val();

		if(dateval==''){ dateval = todayDate; }
		if(timeval==''){ timeval = '11:45 PM'; }
		
		$('.donation_start_sale_date').datepicker({ format: "yyyy-mm-dd", startDate: nowDate, endDate: dateval});
		$('.donation_end_sale_date').datepicker({ format: "yyyy-mm-dd", startDate: nowDate, endDate: dateval});
		$('.free_start_sale_date').datepicker({ format: "yyyy-mm-dd", startDate: nowDate, endDate: dateval});
		$('.free_end_sale_date').datepicker({ format: "yyyy-mm-dd", startDate: nowDate, endDate: dateval});
		$('.paid_start_sale_date').datepicker({ format: "yyyy-mm-dd", startDate: nowDate, endDate: dateval});
		$('.paid_end_sale_date').datepicker({ format: "yyyy-mm-dd", startDate: nowDate, endDate: dateval});

		// $(".donation_start_sale_date .donation_end_sale_date .free_start_sale_date .free_end_sale_date .paid_start_sale_date .paid_end_sale_date").datepicker({ format: "yyyy-mm-dd", startDate: nowDate, endDate: dateval});
	});
</script>
