<table class="table table_res table_res2 mb0 event-info contct-table">
                        	<thead>
                            	<tr>
                                    <th><?php echo NO;?>.</th>
                                    <th><?php echo First_Name;?></th>
                                    <th><?php echo Last_Name;?></th>
                                    <th><?php echo EMAIL;?></th>
                                    <th><?php echo ACTIONS;?></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            <?php
                            $no++;
							if($all_attendee){
								foreach($all_attendee as $attendee){
									$first_name = $attendee['first_name'];
									$attendee_id = $attendee['id'];
									$pid = $attendee['pid'];
									
									$last_name = $attendee['last_name'];
									$email = $attendee['email'];
									?>
                                    <tr>
                                        <td><?php echo $no;?></td>
                                        <td><?php echo SecureShowData($first_name);?></td>	
                                        <td><?php echo SecureShowData($last_name);?></td>
                                        <td><?php echo SecureShowData($email);?></td>
                                        <td>
                                        <div class="col-sm-7 col-xs-7 float0-xs width-xs2 p0">
                                           <select class="select-pad" name="action"  onchange="actionChange(this)">
                                                <option value=""><?php echo QUICK_ACTIONS;?></option>
                                                <option value="/attendees/edit_attendee_order/<?=$id?>/<?=$pid?>"><?php echo EDIT_TICKET_BUYER;?></option>
                                                <option value="/attendees/attendee_details/<?=$id?>/<?=$pid?>"><?php echo VIEW_ATTENDEE_DETAILS;?></option>
                                                <option value="/attendees/resend_email/<?=$id?>/<?=$pid?>"><?php echo RESEND_CONFIRMATION_EMAIl;?></option>
                                                <option value="/ticket/ticket_pdf/<?=$pid?>"><?php echo PRINT_TICKETS;?></option>
                                                <option value="/attendees/cancel_order/<?=$id?>/<?=$pid?>"><?php echo CANCEL_THIS_ORDER;?></option>
                                           </select>
                                           <input type="hidden" value="<?php echo $attendee_id;?>" name="attendee_id" id="attendee_id" />
                                           <input type="hidden" value="<?php echo $pid;?>" name="pid" id="pid" />
                                           
                                        </div>
                                        </td>
                                    
                                	</tr>
                                <?php
                                 $no++;
								}
							}
							?>
                            	
                                                 
                            </tbody>
                            	
                        </table>
                        <div class="text-right">
                            <div class="pagi_block pagi_marB0">
                            <?php echo $page_link; ?>
                            </div>
                                <div class="clear"></div>
                        </div>