
                <div class="event-webpage col-sm-12 pt ">
                	<div class="red-event width100 "><h4><?php echo ORDERS_SINCE_SALES_STARTED;?></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                <?php 
                 $manage_orders = check_permission_label('attendees','manage_orders',$id);    
				if($purchases){
					$cnt++;
					$not='';
					$type='';
					$newpid='';
					foreach($purchases as $purchase){
						$pid = $purchase['id'];
						$attendee_id = $purchase['attendee_id'];
						$ticket_qty = $purchase['ticket_qty'];
						$first_name = $purchase['first_name'];
						$last_name = $purchase['last_name'];
						$email = $purchase['email'];
						$total = set_event_currency($purchase['total'], $id);
						$created_at = datetimeformat($purchase['created_at']);
						$ticket_id = $purchase['ticket_id'];
						$transaction_key = $purchase['transaction_key'];
            $ticket_type_status = $purchase['type'];
            $ticket_type = '';
            if($ticket_type_status==1){
                $ticket_type = FREE;
            }
            if($ticket_type_status==2){
                $ticket_type = PAID;
            }
            if($ticket_type_status==3){
                $ticket_type = DONATION;
            }
						
						if($ticket_id==0){
							$tickets = $this->event_model->getOrder('',array('tickets'),array('purchases.id'=>'desc'),'','','no',array(),$pid);
						}else{
							$tickets = '';
						}

            $cancel_order = getRecordById('cancel_orders','id',$pid);
                        $div_class="";                        
                        if(is_array($cancel_order)){ $div_class='style="pointer-events: none;"';}
					
						?>
                        <div class="col-sm-12" <?php echo $div_class; ?> >
                            <div class="event-detail clearfix">
                            
                            <form class="event-title">
                                         
                             <div class="form-group pt clearfix">
                             <div class="col-sm-12 col-xs-12 width-xs lable-rite">
                               <div class="order-details event-webpage">
                                   <div class="col-sm-8 col-xs-12 width-xs p0">
                                   <div class="red-one pt pb text-center col-sm-3 col-xs-3 width-xs p0"><h4><?php echo $cnt;?>.</h4></div>
                                   <div class="col-sm-9 col-md-11 col-lg-9 col-xs-8 order-info text-left">
                                   <p class="p0-xs"><a href="javascript://"><?php echo ORDERS;?> #<?php echo $pid;?></a> 
                                                <span>- <?php echo $total;?></span>
                                                <?php if($div_class!=""){ echo ORDER_CANCEL; } ?>
                                                </p>
                                   </div>
                                   <div class="col-sm-9 col-md-11 col-lg-9 col-xs-8 order-info pright0 text-left">
                                   <span><?php echo ORDERED_BY;?> <a href="javascript://"><?php echo SecureShowData($first_name).' '.SecureShowData($last_name);?></a> 
                                                ( <a href="javascript://"><?php echo SecureShowData($email);?></a>) <br>
                                            <?php echo $created_at;?></span>
                                   </div>
                                   </div>
                                   <div class="col-sm-3 col-xs-4 pt10-xs fr width-xs" style="display: none;">
                                    <select class="select-pad" placeholder="11:00 PM" name="action" onchange="actionChange(this)">
                                        <option value=""><?php echo QUICK_ACTIONS;?></option>
                                        <option value="/attendees/edit_attendee_order/<?=$id?>/<?=$pid?>"><?php echo EDIT_TICKET_BUYER;?></option>
                                        <option value="/attendees/attendee_details/<?=$id?>/<?=$pid?>"><?php echo VIEW_ATTENDEE_DETAILS;?></option>
                                        <option value="/ticket/ticket_pdf/<?=$id?>/<?=$pid?>"><?php echo RESEND_CONFIRMATION_EMAIl;?></option>
                                        <option value="/attendees/resend_email/<?=$id?>/<?=$pid?>"><?php echo PRINT_TICKETS;?></option>
                                  </select>
                                     <input type="hidden" value="<?php echo $attendee_id;?>" name="attendee_id" id="attendee_id" />
                                     <input type="hidden" value="<?php echo $pid;?>" name="pid" id="pid" />
                                   </div>
                               </div>
                             </div>
                             </div>
                             
                             <div class="col-sm-12">
                             <table class="table table_res mb0 event-info contct-table table-fixed-layout">
                              <thead>
                                  <tr>
                                      <th><?php echo Ticket_Buyer;?></th>
                                      <th><?php echo QTY;?></th>
                                      <th><?php echo TICKET_TYPE;?></th>
                                      <th><?php echo PAID;?></th>
                                      <th><?php echo QUICK_ACTIONS;?></th>
                                  </tr>
                              </thead>
                              <tbody>
                                        
                    <?php 
										if($ticket_id==0){
											if($tickets){
												foreach($tickets as $tkt){
													 
													$tfirst_name = $tkt['first_name'];
													$tlast_name = $tkt['last_name'];
													$ttotal = set_event_currency($tkt['total'], $id);
													$tticket_qty = $tkt['ticket_qty'];
													$tpid = $tkt['id'];
													$tattendee_id = $tkt['attendee_id'];
                          $tticket_type_status = $tkt['type'];
                          $tticket_type = '';
                          if($tticket_type_status==1){
                              $tticket_type = FREE;
                          }
                          if($tticket_type_status==2){
                              $tticket_type = PAID;
                          }
                          if($tticket_type_status==3){
                              $tticket_type = DONATION;
                          }
										?>
                      	<tr>
                              <td><?php echo SecureShowData($tfirst_name).' '.SecureShowData($tlast_name);?></td>	
                              <td><?php echo SecureShowData($tticket_qty);?></td>
                              <td><?php echo SecureShowData($tticket_type);?></td>
                              <td><?php echo $ttotal;?></td>
                              <td>
                              <?php if(!$manage_orders) { ?>
                              <div class="col-sm-12 col-xs-6 float0-xs width-xs2 p0">
                                  <select class="select-pad" placeholder="11:00 PM" name="action1" onchange="action1Change(this)">
                                      <option value=""><?php echo QUICK_ACTIONS;?></option>
                                      <option value="/attendees/edit_attendee_order/<?=$id?>/<?=$tpid?>"><?php echo EDIT_TICKET_BUYER;?></option>
                                      <option value="/attendees/attendee_details/<?=$id?>/<?=$tpid?>"><?php echo VIEW_ATTENDEE_DETAILS;?></option>
                                      <option value="/attendees/resend_email/<?=$id?>/<?=$tpid?>"><?php echo RESEND_CONFIRMATION_EMAIl;?></option>
                                      <option value="/ticket/ticket_pdf/<?=$tpid?>"><?php echo PRINT_TICKETS;?></option>                                                                
                                  </select>
                              <input type="hidden" value="<?php echo $tattendee_id;?>" name="attendee_id1" id="attendee_id1" />
                              <input type="hidden" value="<?php echo $tpid;?>" name="pid1" id="pid1" />
                              </div>
                               <?php }else{ echo N_A;}?>
                              </td>                                                
                  		</tr>
                    <?php												
												}
											}
										}else{ 
										?>
                          	<tr>
                                  <td><?php echo SecureShowData($first_name).' '.SecureShowData($last_name);?></td>	
                                  <td><?php echo SecureShowData($ticket_qty);?></td>
                                  <td><?php echo $ticket_type;?></td>
                                  <td><?php echo $total;?></td>
                                  <td>
                                  <?php if(!$manage_orders) { ?>
                                  <div class="float0-xs width-xs2 p0">
                                     	<select class="select-pad" placeholder="11:00 PM" name="action1" onchange="action1Change(this)">
                                          <option value=""><?php echo QUICK_ACTIONS;?></option>
                                          <option value="/attendees/edit_attendee_order/<?=$id?>/<?=$pid?>"><?php echo EDIT_TICKET_BUYER;?></option>
                                          <option value="/attendees/attendee_details/<?=$id?>/<?=$pid?>"><?php echo VIEW_ATTENDEE_DETAILS;?></option>
                                          <option value="/attendees/resend_email/<?=$id?>/<?=$pid?>"><?php echo RESEND_CONFIRMATION_EMAIl;?></option>
                                          <option value="/ticket/ticket_pdf/<?=$pid?>"><?php echo PRINT_TICKETS;?></option>                                                      
                                  	</select>
                                  <input type="hidden" value="<?php echo $attendee_id;?>" name="attendee_id1" id="attendee_id1" />
                             			<input type="hidden" value="<?php echo $pid;?>" name="pid1" id="pid1" />
                                  </div>
                                   <?php }else{ echo N_A;}?>
                                  </td>                                                
                              </tr>
										          <?php } ?>               
                                        </tbody>
                                        <tbody>
                                        	<tr>
                                                <td>&nbsp;</td> 
                                                <td>&nbsp;</td>
                                                <td><div class="totalText"><?php echo Total;?></div></td>
                                                <td><div class="totalText"><?php echo $total;?></div></td>
                                                <td>&nbsp;</td>                                                
                                            </tr>
                                        </tbody>                                          
                                    </table>
                             </div>
                            </form>
                            
                            </div> 
                            <!-- event detail closes -->
                                
                </div>
                <?php  ?>
						<?php
						$cnt++;
						
					}
				}
				?>
<div class="text-right">
  <div class="pagi_block pagi_marB0">
    <?php echo $page_link; ?>
  </div>
  <div class="clear"></div>
</div>
                
                
                
                   