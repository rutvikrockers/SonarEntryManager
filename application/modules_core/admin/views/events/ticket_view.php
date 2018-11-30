<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-xs-12 clearfix">
                    <h1><?php echo SecureShowData($event['event_title']).' :: '.TICKETS; ?> - <?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></h1>
                </div>
                <div class="col-lg-4 col-xs-12  mt20 text-right clearfix">
                    <a href="<?php echo site_url().'/admin/events/ticket_report/'.$id;?>" class="btn btn-primary"><?php echo TICKET_REPORT; ?></a>
                </div>
                 <div class="page-header border clearfix"></div>
               
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
                                        	<th><?php echo TICKET_TYPE;?></th>
                                            <th><?php echo TICKET_NAME;?></th>
                                            <th><?php echo TICKET_DESCRIPTION;?></th>
                                            <th><?php echo SALES_END;?></th>
                                            <th><?php echo PRICE;?></th>
                                            <th><?php echo FEE;?></th>
                                            <th><?php echo TOTAL_QTY;?></th>
                                            <th><?php echo PURCHASED_QTY;?></th>
                                            <th><?php echo AVAILABLE_QTY;?></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
										if($result)
										{
											foreach($result as $row)
												{
												
											$type=$row['type'];
											$ticket_name=$row['ticket_name'];
											$description=$row['description'];
											$end_sale=$row['end_sale'];
											$price=set_event_currency($row['price'],$row['event_id']);
                                            $fee=set_event_currency($row['fee'],$row['event_id']);
											$qty=$row['qty'];
											$used=$row['used'];
											$available = $qty-$used;
											
											
									?>
                                        <tr class="odd gradeX">
                                        	<th><?php 
                                        		if($type==1)
												{
													echo FREE;
												}
												if($type==2)
                                        		{
                                        			echo PAID;
                                        		}
												if($type==3)
												{
													echo DONATION;
												}
                                        		?>
                                        	</th>
                                            <td><?php echo SecureShowData($ticket_name); ?></td>
                                            <td><?php echo SecureShowData($description); ?></td>
                                            <td><?php echo SecureShowData($end_sale); ?></td>
                                            <td><?php echo SecureShowData($price); ?></td>
                                            <td><?php echo SecureShowData($fee); ?></td>
                                            <td><?php echo SecureShowData($qty); ?></td>
                                            <td><?php echo SecureShowData($used); ?></td>
                                            <td><?php echo SecureShowData($available); ?></td>
                                            
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
            </form>
</div>
</div>
        <!-- /#page-wrapper -->
</body>
<script>

	$(document).ready(function(){
		$('#dataTables-example').dataTable();
	});
</script>

</html>
