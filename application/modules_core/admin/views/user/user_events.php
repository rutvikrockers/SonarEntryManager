  <div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 clearfix">
                    <h1><?php echo EVENT_LIST; ?> - <?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></h1>
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
                                            <th><?php echo EVENT_TITLE;?></th>
                                            <th><?php echo EVENT_VENUE;?></th>
                                            <th><?php echo START_DATE;?></th>
                                            <th><?php echo END_DATE;?></th>
                                            <th><?php echo ORGANIZER_HOST;?></th>
                                            <th><?php echo STATUS;?></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
										if($result)
										{
											foreach($result as $row)
											{
											
											$event_title=$row['event_title'];
											$event_venue=$row['name'];
											$start_date=$row['event_start_date_time'];
											$end_date=$row['event_end_date_time'];
											$name=$row['name'];
											$active=$row['active'];
									?>
                                        <tr class="odd gradeX">
                                            <td><?php echo SecureShowData($event_title);?></td>
                                            <td><?php echo SecureShowData($event_venue);?></td>
                                            <td><?php echo $start_date;?></td>
                                            <td><?php echo $end_date;?></td>
                                           	<td><?php echo SecureShowData($name);?></td> 
                                            <td><?php if($active==1){echo ACTIVE;}else { echo COMPLETED;}?></td>
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
</div>
</div>
            <!-- /.row -->
</body>

</html>
