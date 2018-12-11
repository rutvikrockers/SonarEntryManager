<?php
	$dc = 0;
	$pc = 0;
	$fc = 0;
	$currency = getRecordById('currency_codes','id',$event_details['currency_code_id']);
?>
				                <table class="table" id="ticket_table">
					                
					                <tbody>
					                <?php /*free ticket details start*/ ?>
					                <?php 
					                	$total=0;
	                                	$qty = 0;
	                                	$ticket_amt = 0;
	                                	$total_fees = 0;
	                                	$amt='';
	                                	if(is_array($free_tickets) && count($free_tickets) > 0){
	                                		foreach($free_tickets as $free){
	                                			if(isset($ticket_qty[$free['id']]) && $ticket_qty[$free['id']] != 0 && $ticket_qty[$free['id']] !=''){			
	                                ?>
		                                <tr>
		                                  	 <td><?php echo SecureShowData($free['ticket_name']);?>
		                                  	 <br/><span class="value-info">
		                                  	 <?php
		                                  	 
		                                   			if($attendee=='attendee'){	  
		                                   				$fee = 0;
							                        	                               			                               									                       		
														$ticket_amt_per = (isset($ticket_amount)) ? $ticket_amount[$free['id']] : 0;

						                        	}else{
														$fee = 0;    
							                        	$ticket_amt_per = 0;  	 			
						                        	}
						                        
						                        ?>
		                                  	 <?php echo set_event_currency(0,$event_details['id']); ?>x
		                                  	 <?php echo $ticket_qty[$free['id']];?>
		                                  	 </span>
		                                  	 </td>
		                                  	 <td>
		                                  	 <?php
		                                  	 if($attendee=='attendee' && isset($ticket_amount)){ $paid['buyer_total'] = $ticket_amount[$free['id']]; $amt = $paid['buyer_total'];}
		                                  	  if($amt==''){	$amt = 0;}
			                                  	 
			                                  	  echo set_event_currency($amt,$event_details['id']);
			                                  	  $total+=$amt;
			                                  	  $ticket_amt = $ticket_amt_per;
		                                  	 ?>
		                                  	 	<input type="hidden" name="ticket_qty_total[<?php echo $free['id'];?>]" value="<?php echo $amt;?>" />
		                                  	 	<input type="hidden" name="ticket_ids[]" value="<?php echo $free['id'];?>" />
		                                  	 	<input type="hidden" name="ticket_totals[]" value="<?php echo $amt; ?>" />
		                                  	 	<input type="hidden" name="ticket_amt[]" value="<?php echo $ticket_amt_per; ?>" />
		                                  	 	<input type="hidden" name="ticket_fees[]" value="<?php echo $fee; ?>" />		                                  	 	
		                                  	 	<input type="hidden" name="ticket_qtys[]" value="<?php echo $ticket_qty[$free['id']];?>" />
		                                  	 	<input type="hidden" name="ticket_gateway_fee[]" value="0">
		                                  	 	<input type="hidden" name="ticket_type[]" value="0">
		                                  	 </td>
		                                </tr>
	                                <?php 		$qty+=$ticket_qty[$free['id']]; $fc++;
	                                			}	
	                                		}
	                                	}
					                ?>
					                <?php /*free ticket details end*/ ?>
					                
					                <?php 
					                	if(is_array($paid_tickets) && count($paid_tickets) > 0){
					                		$buy_now = '0';
					                		$promo_code = '';
                                                                        $promo_tkts = '';
						                	if($promo_code_id > 0){		
                                                $promo_code = getRecordById('promotional_codes','id',$promo_code_id);
                                                $promo_tkts = $promo_code['tickets'];
												$promo_code_amt = $promo_code['disc_amt'];
												$promo_code_perc = $promo_code['disc_perc'];
						                	}
						                	
                                                                foreach($paid_tickets as $paid){
                                                                    if(isset($ticket_qty[$paid['id']]) && $ticket_qty[$paid['id']] != 0 && $ticket_qty[$paid['id']] !=''){        		
	                                ?>
		                                <tr>
		                                  	 <td>
		                                  	 <?php 
			                                  	 if($promo_code_id){
			                                  	 	 if($promo_code_id > 0){
			                                  	 	 	
														$promo_tkts_arr = explode(',',$promo_tkts);
														
			                                  	 	 	if($promo_tkts_arr != ''){
			                                  	 	 		if(in_array($paid['id'], $promo_tkts_arr)){		
				                                  	 	 		echo $paid['ticket_name'];
				                                  	 	 		if($promo_code_amt > 0){
				                                  	 	 			echo '<br />'.Discounted.set_event_currency($promo_code_amt,$event_details['id']);
				                                  	 	 		}
				                                  	 	 		
				                                  	 	 		if($promo_code_perc > 0){
				                                  	 	 			echo '<br />'.Discounted.$promo_code_perc.'%';
				                                  	 	 		}
			                                  	 	 		} else {
			                                  	 	 			echo $paid['ticket_name'];
			                                  	 	 		}
			                                  	 	 	}
			                                  	 	 }
			                                  	 } else {
			                                  	 	echo $paid['ticket_name'];
			                                  	 }
		                                  	 ?> 
	                                	<br/>	<span class="value-info">
		                                  	 (<?php 
			                                  	 if($promo_code_id && $promo_code_id > 0 && $promo_tkts_arr && in_array($paid['id'], $promo_tkts_arr) && $promo_code && $promo_code['code_type'] == 'disc'){
				                                  	 				
                                  	 				if($promo_code['disc_amt']!='' && $promo_code['disc_amt'] > 0){
						       			 				$paid['price'] = $paid['price'] - $promo_code['disc_amt'];
						       			 				$paid['buyer_total'] = $paid['buyer_total'] - $promo_code['disc_amt'];
						       			 				
                                  	 				} elseif($promo_code['disc_perc']!='' && $promo_code['disc_perc'] > 0){
						       			 				$perc = (($paid['price']  * $promo_code['disc_perc']) / 100);
						       			 				$paid['price'] = $paid['price'] - $perc;
						       			 				$paid['buyer_total'] = $paid['buyer_total'] - $perc;
                                  	 				}			
				                                  	 	 	
			                                  	 }
		                                  	 	echo set_event_currency($paid['price'],$event_details['id']);
		                                  	 ?> 
		                                  	+
		                                  	 <?php 				
		                                   		if($paid['fee']>0){
													if(($event_details['event_pass_fees']==1) || ($event_details['event_pass_fees']==3 && $paid['service_fee']==1)) {
			                                   			$ticket_amt += $paid['price'] * $ticket_qty[$paid['id']];
			                                   		} else {
														$gateway_fee = 0;
														if($event_details['is_wallet'] == 2) {
															$gateway_fee = $paid['gateway_fee'];
														}
			                                   			$ticket_amt += ($paid['price'] - $gateway_fee) * $ticket_qty[$paid['id']];
			                                   		}
			                                   	} else {
		                                   			$ticket_amt += $paid['price'] * $ticket_qty[$paid['id']];
			                                   	}
		                                   		if($paid['fee']>0){
													/*flat fee add in view start*/
													$paid_ticket_flat_fee =  $site_setting['paid_ticket_flat_fee'];
													$payment_gateway_flat_fee =  $currency['payment_gateway_flat_fee'];
		                                   			/*flat fee add in view  end*/
		                                   			if($attendee=='attendee'){	  
		                                   				$fee = 0;
							                        	$ticket_amt_per = 0;
							                        	$add_geteway_fee = 0;                       		
						                        	}else{
						                        		$gateway_fee = 0;
						                        		$add_geteway_fee = $paid['gateway_fee'];
						                        		if($event_details['is_wallet'] == 2) {
						                        			$gateway_fee = $paid['gateway_fee'];
						                        		}
														$fee = ($paid['fee'] + $paid_ticket_flat_fee) * $ticket_qty[$paid['id']];    
														if(($event_details['event_pass_fees']==1) || ($event_details['event_pass_fees']==3 && $paid['service_fee']==1)) {
															$ticket_amt_per = $paid['price'] * $ticket_qty[$paid['id']];	
														} else {
															$ticket_amt_per = ($paid['price'] - $gateway_fee) * $ticket_qty[$paid['id']];	
														}
						                        	}
						                        } else {
						                        	$fee = 0;
						                        	$ticket_amt_per = 0; 	
						                        	$add_geteway_fee = 0;                       		
						                        }
						                        $total_fees += $fee;
						                        
						                        if(($event_details['event_pass_fees']==1) || ($event_details['event_pass_fees']==3 && $paid['service_fee']==1)) {
						                        	$paidFee = $paid['fee'] + $paid_ticket_flat_fee + $add_geteway_fee;
						                        	if($attendee=='attendee'){
						                        		$paidFee = 0;
						                        	}
						                        	if($promo_code_id > 0){
						                        		
					                                  	
					                                  	if($promo_code){
				                                  	 		if(in_array($paid['id'], $promo_tkts_arr)){	
				                                  	 			if($promo_code['disc_perc'] != '' && $promo_code['disc_perc'] == 100){
				                                  	 				echo set_event_currency(0,$event_details['id']);
				                                  	 			} else {
				                                  	 				echo set_event_currency($paidFee,$event_details['id']);
				                                  	 			}
				                                  	 		} else {
				                                  	 			echo set_event_currency($paidFee,$event_details['id']);
				                                  	 		}
					                                  	} 
						                        	} else {
						                        		echo set_event_currency($paidFee,$event_details['id']);
						                        	}
						                        } else {
						                        	echo set_event_currency(0,$event_details['id']);
						                        }       	 
		                                  	 ?>)x <?php echo $ticket_qty[$paid['id']];?>
		                                  	 </span>
		                                  	 </td>
		                                  	 <td>
		                                  	 <?php 
		                                  	 	if($attendee=='attendee'){
		                                  	 		$paid['buyer_total'] = (isset($ticket_amount)) ? $ticket_amount[$paid['id']] : $paid['price'] * $ticket_qty[$paid['id']];
		                                  	 	}

			                                  	 if($paid['buyer_total']=='' ){
			                                  	 	$paid['buyer_total']=$paid['price']; 
			                                  	 }


			                                  	 
			                                  	 if($event_details['event_pass_fees']==1){ 
			                                  	 	if($attendee!="attendee"){
			                                  	 		$amt = $ticket_qty[$paid['id']] * $paid['buyer_total'];
			                                  	 		$ticket_type = "2";
			                                  	 	}else{
														   $ticket_type = "2";
			                                  	 		$amt = $paid['buyer_total'];
			                                  	 	}
			                                  	 } elseif($event_details['event_pass_fees']==3){ 
			                                  	 	if($paid['service_fee'] ==1){
			                                  	 		if($attendee!="attendee"){
			                                  	 		$ticket_type = "2";
			                                  	 			$amt = $ticket_qty[$paid['id']] * $paid['buyer_total'];
			                                  	 		}else{
			                                  	 			$ticket_type = "2";
			                                  	 			$amt = $paid['buyer_total'];
			                                  	 		}
			                                  	 	} else { 
			                                  	 		if($attendee!="attendee"){
			                                  	 			$ticket_type = "3";
			                                  	 			$amt = $paid['price'] * $ticket_qty[$paid['id']];
			                                  	 		}else{
			                                  	 			$ticket_type = "2";
			                                  	 			$amt = $paid['buyer_total'];
			                                  	 		}
		                                  	 			$ticket_amt -= $fee;
		                                  	 			$ticket_amt_per -= $fee;
			                                  	 	}
			                                  	 } else { 
			                                  	 	if($attendee!="attendee"){
		                                  	 			$ticket_type = "3";
			                                  	 		$amt = $paid['price'] * $ticket_qty[$paid['id']];
			                                  	 	}
			                                  	 	else
			                                  	 	{
		                                  	 			$ticket_type = "2";
			                                  	 		$amt = $paid['buyer_total'];
			                                  	 	}
		                                   			$ticket_amt -= $fee;
		                                   			$ticket_amt_per -= $fee;
			                                  	 }

			                                  	 if($promo_code_id > 0 && $promo_code && in_array($paid['id'], $promo_tkts_arr) && $promo_code['disc_perc'] != '' && $promo_code['disc_perc'] == 100){
		                                  	 	     $amt='';
			                                  	 }
			                                  	 
			                                  	 
			                                  	 if($amt==''){
			                                  	 		$amt = 0;
			                                  	 }
			                                  	 
			                                  	  echo set_event_currency($amt,$event_details['id']);
			                                  	  $total+=$amt;
		                                  	 ?>
		                                  	 	<input type="hidden" name="ticket_qty_total[<?php echo $paid['id'];?>]" value="<?php echo $amt;?>" />
		                                  	 	<input type="hidden" name="ticket_ids[]" value="<?php echo $paid['id'];?>" />
		                                  	 	<input type="hidden" name="ticket_totals[]" value="<?php echo $amt;?>" />
		                                  	 	<input type="hidden" name="ticket_amt[]" value="<?php echo $ticket_amt_per;?>" />
		                                  	 	<input type="hidden" name="ticket_fees[]" value="<?php echo $fee;?>" />
		                                  	 	<input type="hidden" name="ticket_qtys[]" value="<?php echo $ticket_qty[$paid['id']];?>" />

												
		                                  	 	<?php 
		                                  	 	if($attendee=='attendee'){
		                                  	 		$wallet_split_gateway_fee = 0;
		                                  	 	} else {
		                                  	 		$wallet_split_gateway_fee = $ticket_qty[$paid['id']] * $paid['gateway_fee']; 
		                                  	 	}
		                                  	 	?>
		                                  	 	<input type="hidden" name="ticket_gateway_fee[]" value="<?php echo $wallet_split_gateway_fee; ?>">
		                                  	 	<input type="hidden" name="ticket_type[]" value="<?php echo $ticket_type; ?>">
		                                  	 </td>
		                                </tr>
	                                <?php 		$qty += $ticket_qty[$paid['id']]; $pc++;
		                                		}
	                                		}
	                                	}
					                ?>
					                <?php /*paid ticket details end*/ ?>
					                
					                <?php /*donation ticket details start*/ ?>
									<?php
					                if(is_array($donation_tickets) && count($donation_tickets) > 0){
	                                		foreach($donation_tickets as $donation){
											$buy_now = '0';
	                                			if(isset($ticket_price[$donation['id']]) && $ticket_price[$donation['id']] !='0' && $ticket_price[$donation['id']] !=''){ 
	                                			
	                               					$ticket_qty[$donation['id']] = $ticket_price[$donation['id']];
	                                			
	                                ?>
		                                <tr>
		                                  	 <td><?php echo $donation['ticket_name'];?>
		                                  	<br/> <span class="value-info"><?php echo set_event_currency($ticket_qty[$donation['id']],$event_details['id']); ?>
											  + <?php 
		                                  	 if($attendee=="attendee"){
                                  	 			$ticket_type = "1";
		                                  	 	$fee = 0;
		                                  	 	$ticket_amt = $amt = (isset($ticket_amount)) ? $ticket_amount[$donation['id']] : $ticket_qty[$donation['id']];
		                                  	 	$total_fees = 0;
		                                  	 	$ticket_amt_per = (isset($ticket_amount)) ? $ticket_amount[$donation['id']] : $ticket_qty[$donation['id']];
		                                  	 	$donation_ticket_gateway_fee = $donation_gateway_fee = 0;
		                                  	 }else{
		                                  	 	$fee = $ticket_qty[$donation['id']] * $site_setting['paid_ticket_fee']/100 ;
												$paid_Fee = ($ticket_qty[$donation['id']] * $site_setting['paid_ticket_fee']) / 100;
												$fee = $paid_Fee = $paid_Fee + $site_setting['paid_ticket_flat_fee'];
												$total_fees += $fee;
	                                  	 		if($event_details['event_pass_fees']==1 || ($event_details['event_pass_fees']==3 && $donation['service_fee']==1)){
	                                  	 			$ticket_type = "2";
													$amt = $ticket_amt_per = $ticket_amt = ($ticket_qty[$donation['id']] + $paid_Fee + $currency['payment_gateway_flat_fee']) / (1 - ($currency['payment_gateway_fee'] / 100));
													$donation_gateway_fee = $ticket_amt_per - $ticket_qty[$donation['id']] - $fee;
													$donation_ticket_gateway_fee = $fee + $donation_gateway_fee;
	                                  	 		} else {

													$donation_gateway_fee = $ticket_qty[$donation['id']] * $currency['payment_gateway_fee'] / 100;
													$donation_gateway_fee += $currency['payment_gateway_flat_fee'];
	                                  	 			$ticket_type = "3";
	                                  	 			$ticket_amt = $amt = $ticket_amt_per = $ticket_qty[$donation['id']];
	                                  	 			$donation_ticket_gateway_fee = 0;
	                                  	 		}
	                                  	 	}
		                                  	 	
											if(($event_details['event_pass_fees']==1) || ($event_details['event_pass_fees']==3 && $donation['service_fee']==1)){
												echo set_event_currency($donation_ticket_gateway_fee,$event_details['id']);
											} else {
												echo set_event_currency(0,$event_details['id']);
											}
		                                  	 ?></span>
		                                  	 </td>
		                                  	 
		                                  	 <td>
		                                  	 <?php 
												   echo set_event_currency($ticket_amt_per,$event_details['id']);
												   $total+=$ticket_amt;
		                                  	 ?>
		                                  	 	<input type="hidden" name="ticket_qty_total[<?php echo $donation['id'];?>]" value="<?php echo $amt;?>" />
		                                  	 	<input type="hidden" name="ticket_ids[]" value="<?php echo $donation['id'];?>" />
		                                  	 	<input type="hidden" name="ticket_totals[]" value="<?php echo $amt;?>" />
		                                  	 	<input type="hidden" name="ticket_amt[]" value="<?php echo $ticket_amt_per;?>" />
		                                  	 	<input type="hidden" name="ticket_fees[]" value="<?php echo $fee;?>" />
		                                  	 	<input type="hidden" name="ticket_qtys[]" value="1" />
		                                  	 	<input type="hidden" name="ticket_gateway_fee[]" value="<?php echo $donation_gateway_fee; ?>">
		                                  	 	<input type="hidden" name="ticket_type[]" value="<?php echo $ticket_type; ?>">
		                                  	 </td>
		                                </tr>
	                                <?php 		$qty+=1;	$dc++;
	                                			}	
	                                		}
	                                	}
					                ?>
					                
					                
					                
					                
					                <?php /*donation ticket details end*/ ?>
					                </tbody>
					                
					                <tr>
					                <th colspan="4" style="text-align:right;"><?php echo Total_Amount;?> <?php echo set_event_currency($total,$event_details['id']); ?></th>
					               
					                
					                </tr>
				                </table>
				                <input type="hidden" name="aff_id" id="aff_id" value="<?php echo $aff_id;?>" />
	                            <input type="hidden" name="affu_id" id="affu_id" value="<?php echo $affu_id;?>" />
	                            
				                <input type="hidden" name="event_id" id="event_id" value="<?php echo $event_id;?>" />
			                    <input type="hidden" name="total" id="total" value="<?php echo $total;?>" />
			                    <input type="hidden" name="ticket_amt" id="ticket_amt" value="<?php echo $ticket_amt;?>" />
			                    <input type="hidden" name="total_fees" id="total_fees" value="<?php echo $total_fees;?>" />
			                    <input type="hidden" name="promotioal_code_id" id="promo_code_id" value="<?php echo $promo_code_id;?>" /> 
			                    <input type="hidden" name="random_no" id="random_no" value="<?php echo $random_no;?>" />
			                    <input type="hidden" name="barcode_random" id="barcode_random" value="<?php echo $barcode;?>" />
			                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>" />
			                    <input type="hidden" name="ticket_qty" id="user_id1" value="<?php echo $qty;?>" />
			                    <input type="hidden" name="ctype" value="<?php echo $order['ctype'];?>" />