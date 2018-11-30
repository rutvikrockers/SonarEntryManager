<?php 
    $default_time_zone_id = ($events['event_time_zone']) ? $events['event_time_zone'] : $site_setting['site_timezone'];
    $time_zone = getRecordById('timezones','id',$default_time_zone_id); 
    if($time_zone) {
        date_default_timezone_set($time_zone['tz']);
    }
?>
<script>
 
$(document).ready(function(){
    $( ".date_pick").datepicker({
        
        format: "yyyy/mm/dd",
        orientation: "top",
        autoclose: true
    });
     
    
    var dropval = $('#date_range').val();
    if(dropval=='custom'){
        $('#start_date').show();
        $('#end_date').show();
        $('#start_date').prop('disabled',false);
        $('#end_date').prop('disabled',false);
    
    }else{
        $('#start_date').hide();
        $('#end_date').hide();
        $('#start_date').prop('disabled',true);
        $('#end_date').prop('disabled',true);
    }
    
    $('#date_range').change(function(){
        var date_range = $('#date_range').val();
        
        if(date_range=='custom'){
            $('#start_date').show();
            $('#end_date').show();
            $('#start_date').prop('disabled',false);
            $('#end_date').prop('disabled',false);
    
        }else{
            $('#start_date').hide();
            $('#end_date').hide();
            $('#start_date').prop('disabled',true);
            $('#end_date').prop('disabled',true);
        }
    });    
});
</script>
<script type="text/javascript">
     function actionChange(a)
    {    if(a.value!=''){
          window.location.href='<?php echo site_url();?>'+a.value;
        }
    }
     function action1Change(a)
    { 
           if(a.value!=''){
           var res = a.value.split("/");
           
           if($.inArray( 'cancel_order', res )>-1)
           {
            
                    if(really())
                    {
                          window.location.href='<?php echo site_url();?>'+a.value;
                     }
                     else
                     {
                        $("select[name='action1']").val('');
                    }
           }else
           {
                window.location.href='<?php echo site_url();?>'+a.value;
             }
         }
    
    }
    function  really()
    {
       return confirm('<?php echo ARE_YOU_SURE_WANT_CANCEL_ORDER;?>');
    }
    function set_end_date_equal_start()
    {
        var start_date =new Date($("#start_date").val());
        var end_date = new Date($("#end_date").val());

        if (end_date < start_date) 
        { 
            alert('Start date must be less than end date');
            return false;
         } 

    }
</script>
<script type="text/javascript">
    function show(offset){
        
        var res = document.URL.split("?");
      
        if(res[1]!=undefined){ str='?'+res[1]; }
        else{ str=''; }
          
        var getStatusUrl= '<?php echo site_url()."attendees/attendees_orders_list";?>/'+offset+str;

            $.ajax({
                url: getStatusUrl,
                dataType: 'text',
                type: 'POST',
                timeout: 99999,
                global: false,
                data: '[]',
                
                success: function(data)
                { 
                    $('.alls').html(data);
                },      
                error: function(XMLHttpRequest, textStatus, errorThrown)
                {
                
                }
            });
        }
</script>

<?php 
    $manage_orders = check_permission_label('attendees','manage_orders',$id);
    $data1['events_id'] = $id;
?>
<?php $this->load->view('default/common/dashboard-header')?>
<?php if($success_msg){
?>
<div class="alert alert-success message"><?php echo $success_msg; ?></div>
<?php }?>
<section>  
            <div class="container marTB50">
                
                <div class="row">
                <div class="col-md-8 col-sm-12">
                                
                 <div class="row">    
                            
                <div class="event-webpage col-sm-12">
                    <div class="red-event width100 "><h4><i class="glyphicon glyphicon-download-alt"></i> <?php echo ORDERS;?> <span>(<a href="<?php echo site_url('attendees/export_csv_report');?>"><?php echo DOWNLOAD_CSV_REPORT;?></a>)</span></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                <div class="col-sm-12">
                <div class="event-detail clearfix">
                
                <form class="event-title" name="search_form" onsubmit="return set_end_date_equal_start(this)" action="<?php echo site_url('attendees/orders/');?>" method="get">
                
                <div class="form-group pt clearfix">
                 <div class="col-sm-4 col-xs-3 width-xs lable-rite">
                   <label class="mt0-xs1"><?php echo DATE_RANGE;?></label>
                 </div>
                 <div class="col-sm-7 col-xs-8 width-xs">
                    <select class="select-pad" placeholder="11:00 PM" name="date_range" id="date_range">
                    <option value="start" <?php if($date_range=='start') { echo 'selected'; } ?>><?php echo SINCE_SALES_STARTED;?></option>
                    <option value="week" <?php if($date_range=='week') { echo 'selected'; } ?>><?php echo THIS_WEEK;?></option>
                    <option value="month" <?php if($date_range=='month') { echo 'selected'; } ?>><?php echo THIS_MONTH;?></option>
                    <option value="year" <?php if($date_range=='year') { echo 'selected'; } ?>><?php echo THIS_YEAR; ?></option>
                    <option value="custom" <?php if($date_range=='custom') { echo 'selected'; } ?>><?php echo CUSTOM_DATE_RANGE;?></option>
                  </select>
                 </div>
                 </div>
                 
                 <div class="form-group clearfix">
                 <div class="col-sm-4 col-xs-3 width-xs lable-rite">
                  
                 </div>
                 <div class="col-sm-3 col-xs-8 width-xs">
                  <input type="text" placeholder="Ex." name="start_date" id="start_date" class="date_pick" value="<?php echo $start_date;?>" onchange="set_end_date_equal_start();" >
                 </div>
                 <div class="col-sm-3 col-xs-8 width-xs">
                  <input type="text" placeholder="Ex." name="end_date" id="end_date" class="date_pick" value="<?php echo $end_date;?>">
                 </div>
                 </div>
                 
                 <div class="form-group clearfix">
                 <div class="col-sm-4 col-xs-3 width-xs lable-rite">
                   <label class="mt0-xs1"><?php echo SEARCH_FOR_ORDERS;?></label>
                 </div>
                 <div class="col-sm-7 col-xs-8 width-xs">
                  <input type="text" placeholder="Ex." name="order" id="order" value="<?php echo $order;?>">
                 </div>
                 </div>
                 <div class="col-sm-11 col-xs-11 width-xs p0">
                 <div class="col-sm-4 col-xs-6 save-btn pb text-right fr clearfix">
                 <input type="submit" value="<?php echo SEARCH;?>" class="btn-event2"   /> 
                </div>
                </div>
                </form>
                
                </div> <!-- event detail closes -->
                                
                </div>
                    
                 </div>
                 
                 <div class="row oderList alls">    
                            
                <div class="event-webpage col-sm-12 pt ">
                    <div class="red-event width100 "><h4><?php echo ORDERS_SINCE_SALES_STARTED;?></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                <?php 
                if($purchases){
                    $cnt=1;
                    $not='';
                    $type='';
                    $newpid='';
                    foreach($purchases as $purchase){

                        $pid = $purchase['id'];
                        $attendee_id = $purchase['attendee_id'];
                        $ticket_qty = $purchase['ticket_qty'];
                        $first_name = $purchase['first_name'];
                        $last_name = $purchase['last_name'];
                        $email = $purchase['email'];
                        $total = set_event_currency($purchase['total'], $id);
                        $created_at = datetimeformat($purchase['created_at']);
                        $ticket_id = $purchase['ticket_id'];
                        $transaction_key = $purchase['transaction_key'];
                                                $ticket_type_status = $purchase['type'];
                                                $ticket_type = '';
                                                if($ticket_type_status==1){
                                                    $ticket_type = FREE;
                                                }
                                                if($ticket_type_status==2){
                                                    $ticket_type = PAID;
                                                }
                                                if($ticket_type_status==3){
                                                    $ticket_type = DONATION;
                                                }
                        
                        if($ticket_id==0){                   
                            $tickets = $this->event_model->getOrder('',array('tickets'),array('purchases.id'=>'desc'),'','','no',array(),$pid);
                        }else{
                            $tickets = '';
                        }
                        
                        $cancel_order = getRecordById('cancel_orders','transaction_key',$pid);
                        $cancel_available = cancel_available($pid);
                        ?>

                        <div class="col-sm-12">
                            <div class="event-detail clearfix">
                            <form class="event-title">
                                         
                             <div class="form-group pt clearfix">
                             <div class="col-sm-12 col-xs-12 width-xs lable-rite">
                               <div class="order-details event-webpage">
                                   <div class="col-sm-8 col-xs-12 width-xs p0">
                                   <div class="red-one pt pb text-center col-sm-3 col-xs-3 width-xs p0"><h4><?php echo $cnt;?>.</h4></div>
                                   <div class="col-sm-9 col-md-11 col-lg-9 col-xs-8 order-info text-left">
                                   <p class="p0-xs"><a href="javascript://">Orders #<?php echo $pid;?></a> 
                                                <span>- <?php echo $total;?></span>
                                               
                                                </p>
                                   </div>
                                   <div class="col-sm-9 col-md-11 col-lg-9 col-xs-8 order-info pright0 text-left">
                                   <span><?php echo ORDERED_BY ;?> <a href="javascript://"><?php echo SecureShowData($first_name).' '.SecureShowData($last_name);?></a> 
                                                ( <a href="javascript://"><?php echo SecureShowData($email);?></a>) <br>
                                            <?php echo $created_at;?></span>
                                   </div>
                                   </div>
                                   <div class="col-sm-3 col-xs-4 pt10-xs fr width-xs" >
                                    <select class="select-pad" placeholder="11:00 PM" name="action" onchange="actionChange(this)">
                                        <option value=""><?php echo QUICK_ACTIONS;?></option>
                                        <option value="/attendees/edit_attendee_order/<?=$id?>/<?=$pid?>"><?php echo EDIT_TICKET_BUYER;?></option>
                                        <option value="/attendees/attendee_details/<?=$id?>/<?=$pid?>"><?php echo VIEW_ATTENDEE_DETAILS;?></option>
                                        <option value="/attendees/resend_email/<?=$id?>/<?=$pid?>"><?php echo RESEND_CONFIRMATION_EMAIl;?></option>
                                        <option value="/ticket/ticket_pdf/<?=$pid?>"><?php echo PRINT_TICKETS;?></option>
                                        
                                        <?php if($cancel_available == 1 ) { ?>
                                        <option value="/ticket/cancel_order_attendee/<?=$pid?>?cancel=yes&user_type=2"><?php echo CANCEL_THIS_ORDER;?></option>
                                        <?php } ?>
                                    </select>
                                     
                                   </div>
                               </div>
                             </div>
                             </div>
                             
                             <div class="col-sm-12">
                             <table class="table table_res mb0 event-info contct-table table-fixed-layout">
                                        <thead>
                                            <tr>
                                                 <th><?php echo Ticket_Buyer;?></th>
                                                <th><?php echo QTY;?></th>
                                                <th><?php echo TICKET_TYPE;?></th>
                                                <th><?php echo PAID;?></th>
                                                <th><?php echo QUICK_ACTIONS;?></th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        
                                        <?php 
                                        if($ticket_id==0){
                                            if($tickets){
                                                foreach($tickets as $tkt){
                                                     
                                                    $tfirst_name = $tkt['first_name'];
                                                    $tlast_name = $tkt['last_name'];
                                                    $ttotal = set_event_currency($tkt['total'], $id);
                                                    $tticket_qty = $tkt['ticket_qty'];
                                                    $tpid = $tkt['id'];
                                                    $tattendee_id = $tkt['attendee_id'];
                                                    $tticket_type_status = $tkt['type'];
                                                    $tticket_type = '';
                                                    if($tticket_type_status==1){
                                                        $tticket_type = FREE;
                                                    }
                                                    if($tticket_type_status==2){
                                                        $tticket_type = PAID;
                                                    }
                                                    if($tticket_type_status==3){
                                                        $tticket_type = DONATION;
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $tfirst_name.' '.$tlast_name;?></td> 
                                                        <td><?php echo $tticket_qty;?></td>
                                                        <td><?php echo $tticket_type;?></td>
                                                        <td><?php echo $ttotal;?></td>
                                                        <td>
                                                        <?php if(!$manage_orders) { ?>
                                                        <div class="col-sm-12 col-xs-6 float0-xs width-xs2 p0">
                                                            <select class="select-pad" placeholder="11:00 PM" name="action1" onchange="action1Change(this)">
                                                                <option value=""><?php echo QUICK_ACTIONS;?></option>
                                                                <option value="/attendees/edit_attendee_order/<?=$id?>/<?=$tpid?>"><?php echo EDIT_TICKET_BUYER;?></option>
                                                                <option value="/attendees/attendee_details/<?=$id?>/<?=$tpid?>"><?php echo VIEW_ATTENDEE_DETAILS;?></option>
                                                                <option value="/attendees/resend_email/<?=$id?>/<?=$tpid?>"><?php echo RESEND_CONFIRMATION_EMAIl;?></option>
                                                                <option value="/ticket/ticket_pdf/<?=$tpid?>"><?php echo PRINT_TICKETS;?></option> 
                                                                <?php 
                                                                    $ticket_cancel_available = ticket_cancel_available($tpid);
                                                                    if($ticket_cancel_available == 1 && IS_PARTIAL_REFUND_ENABLE) {
                                                                ?>
                                                                    <option value="/ticket/cancel_order_attendee/<?=$tpid?>?cancel=yes&user_type=2"><?php echo CANCEL_THIS_TICKET;?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <?php }else{ echo N_A;}?>
                                                        </td>
                                                
                                                    </tr>
                                                <?php
                                                
                                                }
                                            }
                                        }else{ 
                                        ?>
                                            <tr>
                                                <td><?php echo $first_name.' '.$last_name;?></td>   
                                                <td><?php echo $ticket_qty;?></td>
                                                <td><?php echo $ticket_type;?></td>
                                                <td><?php echo $total;?></td>
                                                <td>
                                                <?php if(!$manage_orders) {?>
                                                <div class="float0-xs width-xs2 p0">
                                                    <select class="select-pad" placeholder="11:00 PM" name="action1" onchange="action1Change(this)">
                                                        <option value=""><?php echo QUICK_ACTIONS;?></option>
                                                        <option value="/attendees/edit_attendee_order/<?=$id?>/<?=$pid?>"><?php echo EDIT_TICKET_BUYER;?></option>
                                                        <option value="/attendees/attendee_details/<?=$id?>/<?=$pid?>"><?php echo VIEW_ATTENDEE_DETAILS;?></option>
                                                        <option value="/attendees/resend_email/<?=$id?>/<?=$pid?>"><?php echo RESEND_CONFIRMATION_EMAIl;?></option>
                                                        <option value="/ticket/ticket_pdf/<?=$pid?>"><?php echo PRINT_TICKETS;?></option>                                                       
                                                    </select>
                                                <input type="hidden" value="<?php echo $attendee_id;?>" name="attendee_id1" id="attendee_id1" />
                                                <input type="hidden" value="<?php echo $pid;?>" name="pid1" id="pid1" />
                                                </div>
                                                <?php }else{ echo N_A;}?>
                                                </td>
                                                
                                            </tr>
                                        <?php
                                        }
                                        
                                        ?>
                                                
                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <td>&nbsp;</td> 
                                                <td>&nbsp;</td>
                                                <td><div class="totalText"><?php echo Total;?></div></td>
                                                <td><div class="totalText"><?php echo $total;?></div></td>
                                                <td>&nbsp;</td> 
                                            </tr>
                                        </tbody>
                                            
                                    </table>
                             </div>
                            </form>
                            
                            </div> 
                            <!-- event detail closes -->
                                
                </div>
                <?php ?>
                        <?php
                        $cnt++;
                        
                    }
                }
                ?>
                 <div class="text-right">
                            <div class="pagi_block pagi_marB0">
                            <?php echo $page_link; ?>
                            </div>
                                <div class="clear"></div>
                        </div>
                
                
                    
                 </div>
                
                    
                 </div> <!-- LEFT CONTENT ENDS -->
                 
                <!-- RIGHT CONTENT -->
               <?php $this->load->view('default/common/event_dashboard_sidebar',$data1);?>
               </div>     
                
            </div><!-- End container -->
    </section>
    <script src="<?php echo base_url();?>js/bootstrap-datepicker.js"></script>
    