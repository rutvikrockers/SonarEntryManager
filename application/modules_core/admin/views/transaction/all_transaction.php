<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class="col-xs-8 clearfix">
                    <h1><?php echo TRANSACTION_LIST; ?> <small><?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></small></h1>
                </div>

                 <?php
                    $export_url = site_url('admin/transaction/list_all_transaction');
                     if(DEMO_MODE=="0"){ 
                        $export_url = site_url('admin/transaction/all_transaction_report'); 
                    } ?>
                <div class="col-lg-4 col-xs-12 clearfix mt20 text-right">
                    <a href="<?php echo $export_url;?>" class="btn btn-primary"><i class="fa fa-download"></i>  <?php echo EXPORT_DATA; ?></a>
                </div>

                <div class="page-header border"></div>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo site_url();?>admin/home/dashboard">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> <?php echo TRANSACTION_LIST; ?>
                    </li>
                </ol>
                
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                            
                            	 <div class="table-responsive">
                                 
                                   <table class="table table-striped table-bordered table-hover" id="dataTables-example4">
                                    <thead>
                                        <tr>
                                            <th><?php echo FIRST_NAME; ?></th>
                                            <th><?php echo LAST_NAME; ?></th>
                                            <th><?php echo EMAIL; ?></th>
                                            <th><?php echo EVENT_TITLE; ?></th>
                                            <th><?php echo TICKET_QTY; ?></th>
                                            <th><?php echo AMOUNT; ?></th>
                                            <th><?php echo PURCHASED_AT; ?></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
										if($result)
											{
												foreach($result as $row)
													{
													
													$first_name=$row['first_name'];
													$last_name=$row['last_name'];
													$email=$row['email'];
                                                    $events = getRecordById('events','id',$row['event_id']);
                                                    $event_title = $events['event_title'];
													$ticket_qty=$row['ticket_qty'];
													$total=$row['total'];
													$created_at=$row['created_at'];
                                                    $event_id=$events['id'];
													$currency = set_event_currency($total, $event_id);
													 
													
									
									?>
                                        <tr class="odd gradeX">
                                            <td><?php echo SecureShowData($first_name); ?></td>
                                            <td><?php echo SecureShowData($last_name); ?></td>
                                            <td><?php echo SecureShowData($email); ?></td>
                                            <td><?php echo SecureShowData($event_title); ?></td>
                                            <td><?php echo $ticket_qty; ?></td>
                                            <td><?php echo $currency; ?></td>
                                            <td><?php echo $created_at; ?></p></td>
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
                </div><!-- col-lg-8  -->
            	
                
            </div>
            <!-- /.row -->
</div>
</div>
        <!-- /#page-wrapper -->

</body>
<script>

	$(document).ready(function(){
    	$('#dataTables-example4').dataTable();
	});
</script>
</html>
