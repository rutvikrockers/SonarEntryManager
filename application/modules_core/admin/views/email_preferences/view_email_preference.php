<?php 
	
	$user_id=$preference['user_id'];
	$attendee_update=$preference['attendee_update'];
	$attendee_picks=$preference['attendee_picks'];
	$attendee_unsubscribe=$preference['attendee_unsubscribe'];
	$attendee_buy_ticket=$preference['attendee_buy_ticket'];
	$org_update=$preference['org_update'];
	$org_picks=$preference['org_picks'];
	$org_unsubscribe=$preference['org_unsubscribe'];
	$org_next_event=$preference['org_next_event'];
	$org_order_confirm=$preference['org_order_confirm'];
	$created_at=$preference['created_at'];
	$updated_at=$preference['updated_at'];
	
	$user_email = getRecordById('users','id',$user_id);
?>

<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class=" col-xs-12 clearfix">
                    <h1><?php echo EMAIL_PREFERENCE; ?></h1>
                </div>
                <div class="page-header border"></div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <div class="row">
            	
                <div class="col-xs-12 clearfix">
                	<div class="panel panel-default">
                          
                          <div class="panel-heading"><?php echo EMAIL_PREFERENCE_DETAILS; ?></div>
                         
                          <ul class="list-group">
                          
                            <li class="list-group-item"><?php echo USER; ?> : <?php echo $user_email['email']; ?></li>
                            <li class="list-group-item"><?php echo ATTENDEE_UPDATE; ?> : <?php if($attendee_update == 1) { echo YES; }else { echo NO; }  ?></li>
                            <li class="list-group-item"><?php echo ORG_UPDATE; ?> : <?php if($org_update == 1) { echo YES; }else { echo NO; }  ?></li>
                          </ul>
                        </div>
                </div><!-- col-lg-8  -->
                                
            </div>
           
            </div>
        </div>
</body>

</html>
