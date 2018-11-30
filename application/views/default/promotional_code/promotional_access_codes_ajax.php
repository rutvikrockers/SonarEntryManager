<table class="table table_res event-info contct-table">
                        	<thead>
                            	<tr>
                                	<th><?php echo ACCESS_CODE; ?></th>
                                    <th><?php echo STARTS; ?></th>
                                    <th><?php echo ENDS; ?></th>
                                    <th><?php echo AVAILABLE; ?></th>
                                    <th><?php echo ACTION; ?></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            	
                          <?php if($access_codes){      
                                foreach ($access_codes as $single_code) {
								$id = $single_code['id'];
								$code = $single_code['code'];
								$disc_amt = $single_code['disc_amt'];
								$disc_perc = $single_code['disc_perc'];
								$used_cnt = $single_code['used_cnt'];
								$uses = $single_code['uses'];	
								$event_id = $single_code['event_id'];
								$end_now = $single_code['end_now'];
								$start_date_time = $single_code['start_date_time'];
								$end_date_time = $single_code['end_date_time'];
								$start_now = $single_code['start_now'];
								$start_day = $single_code['start_day'];
								$start_hour = $single_code['start_hour'];
								$start_minute = $single_code['start_minute'];
								
								$end_now = $single_code['end_now'];
								$end_day = $single_code['end_day'];
								$end_hour = $single_code['end_hour'];
								$end_minute = $single_code['end_minute'];
								
								?>
                                 <tr>
                                	<td class="reg"><?php echo $code; ?></td>
                                    <td>
                                       	<?php if ( $start_now ==0 ){ ?>
                                            <?php echo STARTED; ?>
                                        <?php }elseif ($start_now == 1) {?>
											<?php echo date('Y-m-d H:i',strtotime($start_date_time)) ; ?>
                                        <?php }else{ ?>
                                            <?php if ($start_day) {?>
                                                <?php echo $start_day ; ?> <?php echo DAYS ; ?>
                                            <?php } ?>
                                            
                                            <?php if ($start_hour) { ?>
                                                <?php echo $start_hour ; ?> <?php echo HOURS; ?>
                                            <?php } ?>
                                            
                                            <?php if ($start_minute){ ?>
                                                <?php echo $start_minute; ?> <?php echo MINUTES ; ?>
                                            <?php } ?>
                                            <?php echo BEFORE_EVENT; ?> 
                                       <?php } ?>
                                    </td>	
                                    <td>
                                       <?php if ($end_now==0) {?>
                                        <?php echo WHEN_SALES_END; ?>
                                    <?php }elseif ($end_now==1){ ?>
                                        <?php echo date('Y-m-d H:i',strtotime($end_date_time)) ; ?>
                                    <?php }else{ ?>
                                        <?php if ($end_day){ ?>
                                            <?php echo $end_day; ?> <?php echo DAYS ?>
                                        <?php } 
                                        if ($end_hour){ ?>
                                            <?php echo $end_hour; ?> <?php echo HOURS ?>
                                        <?php } ?>
                                        
                                        <?php if ($end_minute) { ?>
                                            <?php echo $end_minute; ?> <?php echo MINUTES; ?>
                                        <?php } ?>
                                        <?php echo BEFORE_EVENT; ?> 
                                    <?php } ?>
                                    </td>
                                    <td>
                                         <?php if ($used_cnt > $uses ) {
                                              $available = 0
                                        ?>
                                            <?php echo AVAILABLE; ?>/<?php $uses; ?>                        	
                                        <?php }elseif ($uses == 0){ ?>
                                            <?php echo NO_LIMITS; ?>
                                        <?php }else{
										   $result = $uses- $used_cnt;
										 ?>
                                            <?php echo SecureShowData($result); ?>/<?php echo SecureShowData($uses); ?>
                                        <?php } ?>
                                    </td>
                                    <td>
                                    <ul class="nav navbar-nav edit-delt text-center">
                                     
                                        <li class="del-icon icon3">
                                            <a href="<?php echo site_url('event/delete_code');?>/<?php echo $event_id ;?>/<?php echo $id ?>" data-original-title="Delete" onclick="return confirm('Are you sure? you,want to delete this record')"><i class="glyphicon glyphicon-trash edit" data-toggle="tooltip" data-placement="bottom" title="Delete"></i></a>
                                            </li>
                                        
                                        <li class="icon7">
                                        <a href="<?php echo site_url('event/edit_code');?>/<?php echo $event_id ;?>/<?php echo $id;?>" data-toggle="tooltip" data-placement="bottom" title="Edit" class="edit"></a>
		                                        </li>
                                    </ul>
                                    </td>
                                </tr>
                                
                              <?php }
							    }else {?>
                                
                                
                                <tr> <td colspan="6" style="text-align:center"><?php echo NO_DATA; ?> </td></tr>  
                                
                               <?php  }?> 
                                                                
                            </tbody>
                            	
                        </table>
                             <div class="text-right">
                            <div class="pagi_block pagi_marB0">
                            <?php echo $page_link; ?>
                            </div>
                                <div class="clear"></div>
                        </div>