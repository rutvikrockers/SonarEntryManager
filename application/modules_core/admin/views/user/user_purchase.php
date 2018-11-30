  <div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 clearfix">
                    <h1><?php echo PURCHASED_TICKET_LIST; ?> - <?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></h1>
                </div>
                <div class="page-header border"></div>
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
                            		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th><?php echo FIRST_NAME; ?></th>
                                            <th><?php echo LAST_NAME; ?></th>
                                            <th><?php echo EMAIL; ?></th>
                                            <th><?php echo EVENT_TITLE; ?></th>
                                             <th><?php echo TICKET_NAME; ?></th>
                                            <th><?php echo TICKET_QTY; ?></th>
                                            <th><?php echo PRICE; ?></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php 
											if($result){
												foreach($result as $row)
													{
        												$f_name=$row['first_name'];
        												$l_name=$row['last_name'];
        												$email=$row['email'];
        												$event_title=$row['event_title'];
        												$ticket_qty=$row['ticket_qty'];
                                                        $ticket_name=$row['ticket_name'];
                                                        
												        $total=set_event_currency($row['total'],$row['id']);
										
										?>
                                        <tr class="odd gradeX">
                                            <td><?php echo SecureShowData($f_name); ?></td>
                                            <td><?php echo SecureShowData($l_name); ?></td>
                                            <td><?php echo SecureShowData($email); ?></td>
                                            <td><?php echo SecureShowData($event_title); ?></td>
                                            <td><?php echo SecureShowData($ticket_name); ?></td>
                                           	<td><?php echo $ticket_qty;?></td> 
                                            <td><?php echo $total; ?></td>
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
            </div>
            </div>
            <!-- /.row -->
</body>

</html>
