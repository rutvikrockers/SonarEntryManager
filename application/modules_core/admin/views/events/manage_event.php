<?php 
$site_setting = site_setting();
$address='';
if($event_id!=''){
  
    if($event_venue['venue_add1']!='')
    { 

      $address=$event_venue['venue_add1'];
    }
    if($event_venue['venue_add2']!='')
    {
      if($address!=''){
      $address=$address.','.$event_venue['venue_add2'];
        }else
        {
          $address=$event_venue['venue_add2'];
        }
    }
    if($event_venue['venue_city']!='')
    {
      if($address!=''){
      $address=$address.','.$event_venue['venue_city'];
        }else
        {
          $address=$event_venue['venue_city'];
        }
    }
    if($event_venue['venue_state']!='')
    {
      if($address!=''){
      $address=$address.','.$event_venue['venue_state'];
        }else
        {
          $address=$event_venue['venue_state'];
        }
    }
    if($event_venue['venue_country']!='')
    {
      if($address!='')
      {
        $address=$address.','.$event_venue['venue_country'];
        }else
        {
          $address=$event_venue['venue_country'];
        }
    }
  }
?>
<style type="text/css">
  
.panel>.table-bordered
{
  border: 1px solid #ddd;
}
.panel>.table-bordered>thead>tr>th 
{
  border-bottom: 2px solid #ddd !important;
}
.panel>.table-bordered>tbody>tr>td
{
  border-bottom: 1px solid #ddd !important;
}

</style>
<script type="text/javascript">
  function confirm_delete(){
    if(confirm("Are you sure want to delete this event ?")){
      return true;
    }
    else{
      return false;
    }
  }

  function prevent_default(){
    alert("You can not delete this event.");
  }

  function goBack() {
    window.history.back();
}

</script>

  <div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                  <div class="col-lg-8 col-xs-12 clearfix">
                    <h1><?php echo SecureShowData($event_detail['event_title']); ?>  <small><?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></small></h1>
                </div>
                 <?php if($event_detail['active']==1||$event_detail['active']==4){?>
                 <div class="col-lg-4 col-xs-12  mt20 text-right clearfix">
                   <a href="<?php echo site_url('admin/events/edit_event/'.$event_detail['id']);?>" class="btn btn-warning"><?php echo EDIT.' '.EVENT; ?></a>                    
                   <?php if($purchases){ ?>
                      <a href="javascript:void(0);" onClick="return prevent_default();" class="btn btn-danger"><?php echo DELETE.' '.EVENT; ?></a>                
                   <?php }else{ ?>
                      <a href="<?php echo site_url('admin/events/delete_event/'.$event_detail['id']);?>" onClick="return confirm_delete();" class="btn btn-danger"><?php echo DELETE.' '.EVENT; ?></a>                
                   <?php } ?>
                </div>
                <?php }?>
                 <div class="page-header border clearfix"></div>
                 <p>
                 <button type="button" class="btn btn-xs btn-primary" onclick="goBack()">Back</button>
                 </p>
            </div>
            <!-- /.row -->
            
            <div class="row">            	
                <div class="col-lg-12 col-xs-12 clearfix">

                	<div class="panel panel-default">
                          <!-- Default panel contents -->
                          <div class="panel-heading"><?php echo ORGANZERS_DETAIL; ?></div>
                          <!-- List group -->
                          <?php  $org_user_detail = getRecordById('users','id', $org['user_id']); ?>
                          <ul class="list-group">
                            <li class="list-group-item"><?php echo ORG_NAME; ?> : <?php echo $org['name']; ?></li>
                            <li class="list-group-item"><?php echo EMAIL; ?> : <?php echo $org_user_detail['email']; ?></li>
                            <li class="list-group-item"><?php echo ORG_PAGE_URL; ?> : <a href="<?php echo site_url('/profile/user_profile/'.$org['page_url']); ?>"><?php echo $org['page_url']; ?></a></li>                                                                                
                          </ul>
                        </div>
                </div><!-- col-lg-8  -->                              
            </div>     
            
            <div class="row">    
                <div class="col-lg-6 col-xs-12 clearfix">
                  <div class="panel panel-default">
                          <!-- Default panel contents -->
                          <div class="panel-heading"><?php echo EVENT_REPORT; ?></div>
                          <!-- List group -->                          
                          <ul class="list-group">
                            <li class="list-group-item"><?php echo PAGE_VIEWS ?> : <?php echo SecureShowData($status['page_visits']);?></li>
                            <li class="list-group-item"><?php echo TICKETS_SOLD; ?>  : <?php echo SecureShowData($status['sold']);?></li>
                            <li class="list-group-item"><?php echo TICKETS_AVAILABLE;?> : <?php  echo SecureShowData($status['total_tickets']) - SecureShowData($status['sold']); ?></li>                                                                                
                            <li class="list-group-item"><?php echo "Online Sales"; ?> : <?php echo set_event_currency($online_sale, $event_id);?></li>
                            <li class="list-group-item"><?php echo "Manual Sales"; ?> : <?php echo set_event_currency($manual_sale, $event_id);?></li>
                            <li class="list-group-item"><?php echo "Offline Sales"; ?> : <?php echo set_event_currency($offline_sale, $event_id);?></li>
                            <li class="list-group-item"><?php echo GROSS_SALES; ?> : <?php echo set_event_currency($gross_sales, $event_id);?></li>                                                                                
                            <li class="list-group-item"><?php echo "Processing Fees"; ?> : <?php echo set_event_currency($processing_fees, $event_id);?></li>
                            <li class="list-group-item"><?php echo "Payment Gateway Fees"; ?> : <?php echo set_event_currency($payment_gateway_fees, $event_id);?></li>
                            <li class="list-group-item"><?php echo "Net Sales"; ?> : <?php echo set_event_currency($net_sales, $event_id);?></li>
                          </ul>
                        </div>
                </div><!-- col-lg-8  -->             
                <div class="col-lg-6 col-xs-12 clearfix">
                  <div class="panel panel-default">
                          <!-- Default panel contents -->
                          <div class="panel-heading"><?php echo EVENTS_DETAIL; ?></div>
                          <!-- List group -->
                          <?php $event_status = ''; 

                              if($event_detail['active']=="0"){ $event_status = DRAFT; }
                              if($event_detail['active']=="1"){ $event_status = LIVE; }                              
                              if($event_detail['active']=="2"){ $event_status = COMPLETED; }
                              if($event_detail['active']=="3"){ $event_status = CANCELLED; }

                          ?>
                          <?php  $org_user_detail = getRecordById('users','id', $org['user_id']); ?>
                          <ul class="list-group">
                            <li class="list-group-item"><?php echo EVENT_STATUS; ?> : <?php echo SecureShowData($event_status); ?></li>
                            <li class="list-group-item"><?php echo DATE__TIME; ?>  : <?php echo date('d M, Y H:i', strtotime($event_detail['event_start_date_time'])); ?> - <?php echo date('d M, Y H:i', strtotime($event_detail['event_end_date_time'])); ?></li>
                            <li class="list-group-item"><?php echo VENUE; ?> : <?php if(!$event_detail['online_event_option']){ ?><?php echo ucfirst($event_venue['name']);?> <?php echo '| '.$address;?><?php }else{ echo online_event; }?>

                            </li>                                                                                
                            <li class="list-group-item"><?php echo PAGE_URL; ?> : <a href="<?php echo site_url('/event/view/'.$event_detail['event_url_link']); ?>"><?php echo $event_detail['event_title']; ?></a></li>                                                                                
                          </ul>
                        </div>
                </div><!-- col-lg-8  -->  

            </div>


            <div class="row">             
                                          
            </div>

            <div class="row">             
                <div class="col-lg-12 col-xs-12 clearfix  mb20">
                  <div class="panel panel-default">
                          <!-- Default panel contents -->
                          <div class="panel-heading"><?php echo ORDER; ?></div>
                          <!-- List group -->
                          <table class="col-lg-10 col-xs-12 clearfix table table-bordered">
                           <thead>
                              <tr>
                                  <th><?php echo ORDER.' #'; ?></th>
                                  <th><?php echo TICKET_BUYER; ?></th>
                                  <th><?php echo QUANTITY; ?></th>
                                  <th><?php echo PRICE; ?></th>
                                  <th><?php echo DATE; ?></th>
                              </tr>
                          </thead>
                          <tbody>
                    <?php 
                    if($purchases){
                        foreach($purchases as $purchase){
                            $purchase_id = $purchase['id'];
                            $first_name = $purchase['first_name'];
                            $last_name = $purchase['last_name'];
                            $ticket_qty = $purchase['ticket_qty'];
                            $created_at = $purchase['created_at'];
                            $total = $purchase['total'];
                         ?>
                            <tr>
                                <td class="reg"><?php echo $purchase_id;?></td>
                                <td><?php echo SecureShowData($first_name).' '.SecureShowData($last_name);?></td> 
                                <td><?php echo SecureShowData($ticket_qty);?></td>
                                <td><?php echo set_event_currency($total, $event_data['id']); ?></td>
                                <td><?php echo $created_at;?></td>
                            </tr>
                <?php }
                    }else{ ?>
                         <tr>
                         <td colspan="5"><?php echo NO_RECORDS; ?></td>
                         </tr>
                    <?php             
                    }
                    ?>
                
                                                    
                    </tbody>
                          </table>
                        </div>
                </div><!-- col-lg-8  -->                              
            </div>


             <div class="row">             
                <div class="col-lg-12 col-xs-12 clearfix mb20">
                  <div class="panel panel-default">
                          <!-- Default panel contents -->
                          <div class="panel-heading"><?php echo ATTENDEE; ?></div>
                          <!-- List group -->
                          <table class="col-lg-10 col-xs-12 clearfix table table-bordered">
                          <thead>
                              <tr>
                                    <th><?php echo NAME; ?></th>
                                   
                                    <th><?php echo QUANTITY; ?></th>
                                    <th><?php echo PRICE; ?></th>
                                    
                                </tr>
                            </thead>
                            
                            <tbody>
                            <?php 
              if($attendees){
                foreach($attendees as $purchase){
                  $first_name = $purchase['first_name'];
                  $last_name = $purchase['last_name'];
                  $ticket_qty = $purchase['ticket_qty'];
                  $created_at = $purchase['created_at'];
                  $total = $purchase['total'];
                  
                  
                  ?>
                                    <tr>
                                       
                                        <td><?php echo SecureShowData($first_name).' '.SecureShowData($last_name);?></td> 
                                        <td><?php echo SecureShowData($ticket_qty);?></td>
                                        <td><?php echo $total;?></td>
                                       
                                  </tr>
                                    <?php
                }
              }else{ ?>
                 <tr>
                                 <td colspan="3"><?php echo NO_RECORDS; ?></td>
                                 </tr>
              <?php             
              }
              ?>
                                                            
                            </tbody>
                              
                        </table>
                        </div>
                </div><!-- col-lg-8  -->                              
            </div>

           

                 
            </div>
        </div>
</body>

</html>
