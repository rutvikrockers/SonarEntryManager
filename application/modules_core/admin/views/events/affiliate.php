<div id="page-wrapper">
  <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 clearfix">
                    <h1><?php echo AFFILIATE; ?> - <?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></h1>
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
                                        	
                                            <th><?php echo AFFILIATE_NAME;?></th>
                                            <th> <?php echo VISITS;?></th>
                                            <th> <?php echo AFFILIATES;?></th>
                                            <th><?php echo SALES;?></th>
                                            <th> <?php echo REFERRAL_FEE;?></th>
                                            <th> <?php echo AMOUNT;?></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
										if($result)
										{
											foreach($result as $affiliate)
												{
												
                                    $id = $affiliate['id'];
                                    $code = $affiliate['code'];
                                    $visits = checkValue($affiliate['visits']);
                                    $notes = $affiliate['notes'];
                                    $fee_amt = $affiliate['fee_amt'];
                                    $fee_perc = $affiliate['fee_perc'];
                                    $sales = $affiliate['sales'];
                                    $affiliates = $affiliate['affiliates'];
                                     $event_id = $affiliate['event_id'];
                                     if($fee_amt>0){
                                             $referall_fee = $fee_amt;
                                             $referall_fee = set_event_currency($referall_fee,$event_id);
                                      }else{
                                             $referall_fee = $fee_perc.'%';
                                      }
                                    
                                    $due = $affiliate['due'];
                                    $paid = $affiliate['paid'];
											
											
									?>
                                        <tr class="odd gradeX">
                                         <td><?php echo SecureShowData($code);?></td> 
                                        <td><?php echo SecureShowData($visits);?></td>
                                        <td><?php echo SecureShowData($affiliates);?></td>
                                        <td><?php echo set_event_currency($sales,$event_id);?></td>
                                        <td><?php echo SecureShowData($referall_fee); ?></td>
                                        <td><?php echo set_event_currency($due,$event_id);?></td>
                                            
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
