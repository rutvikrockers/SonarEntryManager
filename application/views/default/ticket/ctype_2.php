								  <?php 
                                  $tickets = $order['tickets'];
			                      if($order['ctype']==2){ 
									  
			                      		//=== Free ticket stat===//
			                      	$tick_count = 1;
			                      	if($free_tickets){
			                      		
			                      		foreach($free_tickets as $free){
			                      			
			                      			if($ticket_qty[$free['id']] && $ticket_qty[$free['id']]!='0'){
			                      				
			                      				$free_tick_count = 0;
			                      				
												$ticket_array = explode(',',$tickets);
												
			                      				foreach($ticket_array as $key=>$val){
			                      					$arr[$val] = $val;
			                      				}
													 //=== array_key_exists() start===// 
			                      				if(array_key_exists($free['id'],$arr))  {
			                      					
				                      				 	//=== while start===//
			                      					$x=1;
			                      					while($free_tick_count < $ticket_qty[$free['id']]){
			                      						
			                      						echo '<div class="panel-heading brtl"><h3 class="panel-title">'.Ticket.' #'.$tick_count.' '.$free['ticket_name'].'</h3></div><br />';
			                      						$data['tick_count'] = $tick_count;
			                      						$data['free'] = $free;
			                      						$data['ticket_type'] = 0;
			                      						echo $this->load->view('default/ticket/order_form_2',$data); 
			                      						
			                      						$free_tick_count++;
			                      						
			                      						$tick_count++; 
			                      						
				                      				 	}//=== while end===//  
				                      				 }//=== array_key_exists() end===// 
				                      				}
				                      				
				                      			}
				                      			
				                      		}

			                      		//=== Free ticket end===//
				                      		
			                      		//=== paid ticket start===//
				                      		if($paid_tickets){
				                      			
				                      			foreach($paid_tickets as $paid){
				                      				
				                      				if($ticket_qty[$paid['id']] && $ticket_qty[$paid['id']]!='0'){
				                      					
				                      					$paid_tick_count = 0;
				                      					
				                      					$ticket_array = explode(',',$tickets);
													  	
				                      					foreach($ticket_array as $key=>$val){
				                      						$arr[$val] = $val;
				                      					}
													 //=== array_key_exists() start===// 
				                      					if(array_key_exists($paid['id'],$arr))  {
				                      						
				                      				 	//=== while start===//
				                      						$x=1;
				                      						while($paid_tick_count < $ticket_qty[$paid['id']]){
				                      							
				                      							echo '<div class="panel-heading brtl"><h3 class="panel-title">'.Ticket.' #'.$tick_count.' '.$paid['ticket_name'].'</h3></div><br />';
				                      				 		
				                      							$data['tick_count'] = $tick_count;
				                      							$data['free'] = $paid;
				                      							$data['ticket_type'] = 2;
				                      							echo $this->load->view('default/ticket/order_form_2',$data); 
				                      							
				                      							$paid_tick_count++;
				                      							
				                      							$tick_count++; 
				                      							
				                      				 	}//=== while end===//  
				                      				 }//=== array_key_exists() end===// 
				                      				}
				                      				
				                      			}
				                      			
				                      		}
				                      		
			                      		//=== paid ticket end===//
				                      		
										  //=== donation ticket star===//
				                      		if($donation_tickets){
				                      			foreach($donation_tickets as $donation){

				                      				if($ticket_qty[$donation['id']] && $ticket_qty[$donation['id']]!='0' && $ticket_qty[$donation['id']]!=''){
														
														$don_tick_count = 0;							
														$ticket_array = explode(',',$tickets);
													  
				                      					foreach($ticket_array as $key=>$val){
				                      						$arr[$val] = $val;
														  }
														
															$x=1;				  
															
															echo '<div class="panel-heading brtl"><h3 class="panel-title">'.Ticket.' #'.$tick_count.' '.SecureShowData($donation['ticket_name']).'</h3></div><br />';		                      				 		
															$data['tick_count'] = $tick_count;
															$data['free'] = $donation;
															$data['ticket_type'] = 4;
															
															echo $this->load->view('default/ticket/order_form_2',$data); 
															
															
															$don_tick_count++;
															
															$tick_count++; 
														
				                      					
				                      				}
				                      				
				                      			}
				                      			
				                      		}
			                      		//=== donation ticket end===//
				                      		?>
				                      		
				                      		<?php } ?>