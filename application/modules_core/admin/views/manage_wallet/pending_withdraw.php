<div id="page-wrapper">
            <div class="row">
               <div class="col-xs-12 clearfix">
                    <h1><?php echo PENDING_WITHDRAWALS; ?> - <?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></h1>
                </div>
                <div class="page-header border"></div>
            </div>
            <!-- /.row -->
            
            <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                            
                            	<div class="table-responsive">
                                  <table class="table table-striped table-bordered table-hover" id="sample_1">
                                    <thead>
                                        <tr>
                                        <th><?php echo EVENT_TITLE; ?></th>
                                            <th><?php echo USER; ?></th>
                                            <th><?php echo AMOUNT; ?></th>
                                            <th><?php echo WITHDRAW_IP_ADDRESS; ?></th>
                                            <th><?php echo REQUEST_DATE; ?></th>
                                            <th class="sorting_disabled"><?php echo ACTION; ?></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
										if($result)
											{
												foreach($result as $row)
													{
													
														$user_id=$row['user_id'];
														$withdraw_id=$row['id'];
														$withdraw_amount=$row['credit'];
														$withdraw_ip=$row['wallet_ip'];
                                                        $event_id = $row['event_id'];
                                                        
                                                        $event_detail= getRecordById('events','id',$event_id);
                                                        $user_email= getRecordById('users','id',$user_id);
                                                        $withdrow_detail = getRecordById('wallet_transaction_details','wallet_withdraw_id',$withdraw_id);
														$created_at=$withdrow_detail['created_at'];
														$amount = set_event_currency($withdraw_amount, $event_id);
									?>
                                        <tr class="odd gradeX">
                                         <td><a href="<?php echo site_url('admin/events/manage/'.$event_detail['id']);?>" target="_blank"><?php echo $event_detail['event_title'];?></a></td>
                                           	<td><?php echo SecureShowData($user_email['email']);?></td>
                                            <td><?php echo SecureShowData($amount); ?></td>
                                            <td><?php echo $withdraw_ip; ?></td>
                                            <td><?php echo $created_at; ?></td>
                                            <td><img src="<?php echo base_url(); ?>admin_images/tick1.png" alt=" " height=" " width=" "  /> <a href="<?php echo site_url('admin/wallet/confirm/'.$withdraw_id);?>">Confirm</a> | <a href="<?php echo site_url('admin/wallet/view_info/'.$withdraw_id); ?>">View</a></td>
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
                </div>
            </div>
            <!-- /.row -->
        </div>
       
    </div>
    <!-- /#wrapper -->

</body>
<script>
$(document).ready(function(){
		$('#sample_1').dataTable();
		
	});
</script>
</html>
