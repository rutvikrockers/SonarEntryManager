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
                                        	
                                     
                                    <th>Amount</th>
                                    <th>Paid</th>
                                    <th>Due</th>
                                   
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 

											 $p_data=getreferral_data_byuser($user_id);
                       if($p_data){
                         $amount ='';$paid='';$status='';$due='';
                           if(is_array($p_data))
                           {
                             foreach($p_data as $vall)
                             {
                              if(is_array($vall))
                               {
                                if( $amount=='') { $amount= $vall['currency_symbol'].$vall['shares']; }
                                else { $amount.=",".$vall['currency_symbol'].$vall['shares']; }
                              
                              /*  check by kartik */
                               /* check by Kartik */
                               }

                             }
                          
                          /* end the account code */

                          /* this is used for a paid & due */


                          $p_get1 = getreferral_data_status_byuser($user_id,0);
                         
                           $p_get = getreferral_data_status_byuser($user_id,1);
                           if(is_array($p_get))
                           {
                             foreach($p_get as $vall)
                             {
                              
                               if(is_array($vall))
                               {
                                
                                if( $paid=='') { $paid= $vall['currency_symbol'].$vall['shares']; }
                                else { $paid.=",".$vall['currency_symbol'].$vall['shares']; }
                              }

                             }
                            } 
                            if(is_array($p_get1))
                           {
                             foreach($p_get1 as $vall)
                             {
                              
                               if(is_array($vall))
                               {
                                
                                if( $due=='') { $due= $vall['currency_symbol'].$vall['shares']; }
                                else { $due.=",".$vall['currency_symbol'].$vall['shares']; }
                              }

                             }
                          } 
                              ?> 
                          
                               <tr>
                                
                                    <td><?php echo $amount; ?></td> 
                                    <td><?php echo $paid; ?></td>
                                    <td><?php echo $due; ?></td>
                                  
                                       
                                      <?php }
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
