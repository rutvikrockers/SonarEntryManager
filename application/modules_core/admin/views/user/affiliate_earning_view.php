
<div id="page-wrapper">
  <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 clearfix">
                    <h1><?php echo MYERNE; ?> - <?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></h1>
                </div>
                <div class="page-header border"></div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
		 	   
            <div class="row">
            	<div class="col-lg-12 clearfix">
              <ul class="nav nav-tabs ">
                      
                          <li <?php if($type==0){?>class="active"<?php } ?>><a href="<?php echo site_url('admin/admin_user/earning/0/'.$user_id)?>">Event Earn</a></li>
                          <li <?php if($type==1){?>class="active"<?php } ?>><a href="<?php echo site_url('admin/admin_user/earning/1/'.$user_id)?>">Referral Earn</a></li>
                        
                          <li <?php if($type==2){?>class="active"<?php } ?>><a href="<?php echo site_url('admin/admin_user/earning/2/'.$user_id)?>" >Affiliate Earn</a></li>
                          
                    </ul>
                	<div class="panel panel-default">
                        
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                            <div class="table-responsive">
                            
                                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        	
                                     
                                      <th>Event Name</th>
                                      <th>Amount</th>
                                     
                                      <th>Date</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
										if($result)
										{
											
											 foreach($result as $aearn){
                                      
                        $id = $aearn['id'];
                        $event_title = $aearn['event_title'];
                                                 $event_id = $aearn['id'];//code add by darshan 
                        
                                                                                               

                                                $credit = $aearn['credit'];
                                                                                               
                                                  $debit = $aearn['wcredit'];
                                                $amount = set_event_currency($debit,$event_id) .' dr'; //code add by darshan 
                                                $paid = $aearn['paid'];
                                                $due = $aearn['due'];
                                                $created_at = $aearn['created_at'];
                                                $status = $aearn['status'];
                              ?>
                              <tr>
                                
                                  <td><?php echo SecureShowData($event_title); ?></td>
                                    <td><?php echo $amount; ?></td> 
                                    <td><?php echo $created_at; ?></td>
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
