<!-- End of Darshan Code -->
<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="<?php echo base_url();?>js/lib/jquery.mousewheel-3.0.6.pack.js"></script>

<link href="<?php echo base_url();?>css/popup.css" rel="stylesheet" />
<script src="<?php echo base_url();?>js/jquery.magnific-popup.js"></script>
 <script type="text/javascript">
      $(document).ready(function() {
      
    $('.mfPopup').magnificPopup({
          type: 'ajax',
          overflowY: 'scroll' // as we know that popup content is tall we set scroll overflow by default to avoid jump
        });
        $('.mfPopup_add').magnificPopup({
          type: 'ajax',
          overflowY: 'scroll' // as we know that popup content is tall we set scroll overflow by default to avoid jump
        });
    $('.mfPopupIn').magnificPopup({
          type: 'inline',
          overflowY: 'scroll' // as we know that popup content is tall we set scroll overflow by default to avoid jump
        });

      });
    </script>
        <script type="text/javascript">
        function confirm_delete(){
            if(confirm('<?php echo ARE_YOU_SRE_WANT_TO_CANCEL_THIS_TICKET; ?>')){
                return true;
            }else{
                return false;
            }
        }
        </script>
        
<?php
   $p_id = $order_detail[0]['id'];
	$ticket_amt = $tickets[0]['ticket_amt'];
    $ticket_total = $tickets[0]['total'];
	$ticket_qty = $tickets[0]['ticket_qty'];
	$ticket_name = $tickets[0]['ticket_name'];
	$start_sale = $tickets[0]['start_sale'];
	$end_sale = $tickets[0]['end_sale'];
	$event_title = $tickets[0]['event_title'];
    $vanue_name = $event_venue['name'];
	$event_logo = $tickets[0]['event_logo'];
	$street_address = $tickets[0]['street_address'];
        $organizer_id = $tickets[0]['organizer_id'];
        $event_id = $tickets[0]['eid'];
    
    $event_end_date_time = datetimeformat($tickets[0]['event_start']);
    $street_address = setAddress($event_id, $event_venue);
        

	
	
	if($event_logo && file_exists('upload/event/thumb/'.$event_logo)){
		$event_image = base_url().'upload/event/thumb/'.$event_logo;
	}else{
		$event_image = base_url().'upload/event/thumb/no_img.jpeg';
	}
?>
<section class="eventDash-head pdTB0">
    <div class="container">
        <div class="row"> 
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 test-contct">
               <h1><?php echo MY_TICKETS; ?></h1>
            </div>
      </div>
    </div>
</section>
<section>  
            <div class="container marTB50">
            
                
                <div class="col-md-9 event-webpage">
                	<div class="red-event">
                        	<h4><a><?php echo strtoupper(ORDER_NUMBER).' : '.$tickets[0]['transaction_key']; ?></a></h4>
                        </div>
                       <div class="event-detail pd15">
                            <div class="clearfix dashHeader TextL_xs order_for_wrap">
                                <div class="">
                                <h3><?php echo SecureShowData($event_title);?></h3>
                                <p><?php echo $event_end_date_time; ?> | <?php echo timeFormat($tickets[0]['event_start']); ?></p>
                                <address>
                                <?php if($event_detail['online_event_option']!='0' && $event_detail['online_event_option']=='1'){ echo "Online Event";}else{ ?>
                                  <p><?php echo SecureShowData($vanue_name);?> | <?php echo setAddress($event_id, $event_venue);?></p>
                                  <?php } ?></address>
                                  <strong><?php echo TICKET_QUANTITY; ?>:</strong> <?php echo $order_detail[0]['ticket_qty'];?>
                                  <hr>
                                </address>  
                               
                                
                                <div class="pb">
                                    <a href="<?php echo site_url('ticket/ticket_pdf/'.$purchase_id);?>" class="btn-event prnt-tckt"><?php echo DOWNLOAD_TICKETS; ?></a>                                    
                                    <?php $event_live = getEventStatus($event_id);
                                    
                                    if($event_live){
                                     ?>   
                                    <?php $cancel_order = getRecordById('cancel_orders','transaction_key',$purchase_id);  
                                      $cancel_available = cancel_available($p_id);
                                      ?>
                                      <?php if($cancel_available == 1) { ?>
                                      <a href="<?php echo site_url('/ticket/cancel_order_attendee/'.$purchase_id.'?cancel=yes&user_type=1'); ?>" class="btn-eventgrey marL10 prnt-tckt"><?php echo CANCEL_ORDER; ?></a>
                                      <?php } elseif($cancel_available == 2 ) { ?>
                                      <?php } ?>
                                    <?php } ?>
                                    <a href="<?php echo site_url('event/contact_organizer/'.$organizer_id.'/'.$event_id)?>" class="btn-eventgrey marL10 mfPopup marL0_xs"><?php echo CONTACT_THE_HOST; ?></a>
                                </div>

                                <!-- Orders Ticket Listing -->
                                <div class="eventListContainer" id="order_list">
                                       <div class="row clearfix padL0">
                                      <?php 
                                      if($tickets){
                                        foreach ($tickets as $ticket) {
                                          $t_id=$ticket['id'];
                                          $ticket_amount = $ticket['ticket_amt'];
                                          $ticket_quantity = $ticket['ticket_qty'];
                                          $event_title = $ticket['event_title'];
                                          $event_logo = $ticket['event_logo'];
                                          $event_url_link = $ticket['event_url_link'];
                                          $created_at = datetimeformat($ticket['created_at']);
                                          $purchase_id = $ticket['id'];
                                          $ticket_name = $ticket['ticket_name'];
                                          
                                          if($event_logo && file_exists('upload/event/thumb/'.$event_logo)){
                                            $event_image = base_url().'upload/event/thumb/'.$event_logo;
                                          }else{
                                            $event_image = base_url().'upload/event/thumb/no_img.jpeg';
                                          }
                                          ?>
                                          <div class="col-sm-4">
                                                               <div class="josef">
                                                                  <div class="tour">
                                                                      <h2><a><?php echo SecureShowData($ticket_name);?></a></h2>
                                                                      <p><?php echo TICKET_NUMBER.' : '.$t_id; ?></p>
                                                                      <p><?php echo $created_at;?> <?php echo timeFormat($ticket['created_at']); ?></p>
                                                                      <p class="view pb10"><a href="<?php echo site_url('ticket/ticket_pdf/'.$purchase_id);?>"><?php echo VIEW_TICKET; ?></a></p>
                                                                  </div>
                                                              </div>
                                                         </div>
                                                         
                                          <?php
                                        } 
                                                }
                                                ?>                                      
                                      </ul>
                                      
                                    </div>
                                <!-- End of Orders Ticket Listing -->

                                </div>                                
                            </div>
                        </div>                                  	                           
                		</div>

            <div class="pb"></div>
    </section>
     <script src="<?php echo base_url();?>js/bootstrap-datepicker.js"></script>
    <script>
    		$(document).ready(function(){
    		$(".rover_tip").popover();
	});
	</script>
	<script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#datepicker1').datepicker({
                    format: "dd/mm/yyyy",
					orientation: 'top'
                });
				
            });
			
			$(document).ready(function () {
                
                $('#datepicker2').datepicker({
                    format: "dd/mm/yyyy",
					orientation: 'top'
                });
				
            });


   </script>
   <style>
   #order_list .josef:hover{
      /* box-shadow:  0px 3px 4px rgba(0, 0, 0, 0.15) ;*/
      -webkit-box-shadow: 1px 1px 7px 0px rgba(0, 0, 0, 0.15);
      -moz-box-shadow:    1px 1px 7px 0px rgba(0, 0, 0, 0.15);
      box-shadow:         1px 1px 7px 0px rgba(0, 0, 0, 0.15);
   }
   #order_list .josef {
      background-color: #FDF5E6;
   }
   </style>