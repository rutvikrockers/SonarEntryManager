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
        <script>
        $(document).ready(function() {
		
		//$(".fancybox").fancybox({
			
		//});
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
        
	
    if(!(float)$ticket_total>0){
		$ticket_type = 'Free';
	}else{
		$ticket_type = 'Paid';
	}
	$event_images=getAllRecordById('event_images','event_id',$event_id);
  
  if($event_images){
    $event_logo=$event_images[0]['image_name'];
  }
	
	if($event_logo && file_exists('upload/event/thumb/'.$event_logo)){
		$event_image = base_url().'upload/event/thumb/'.$event_logo;
	}else{
		$event_image = base_url().'upload/event_default/no_img.jpg';
	}
?>
<section class="eventDash-head">
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
                        	<h4><?php echo ORDER_FOR; ?></h4>
                        </div>
                       <div class="event-detail pd15">
                            <div class="clearfix dashHeader">
                                <div class="dashHeaderLeft">
                                <h3><?php echo $event_title;?></h3>
                                <address>
                                <?php if($event_detail['online_event_option']!='0' && $event_detail['online_event_option']=='1'){ echo "Online Event";}else{ ?>
                                  <p><?php echo SecureShowData($vanue_name);?> | <?php echo setAddress($event_id, $event_venue); ?></p>
                                  <p>8:00 p.m.</p>
                                  <?php } ?>
                                </address>                                
                                  <p><strong><?php echo TICKET_NAME; ?>:</strong> <?php echo SecureShowData($ticket_name).'('.$ticket_type.')';?></p>
                                  <p><strong><?php echo TICKET_QUANTITY; ?>:</strong> <?php echo $ticket_qty;?></p>
                                
                                <div class="pt pb">
                                    <a href="<?php echo site_url('ticket/ticket_pdf/'.$purchase_id);?>" class="btn-event prnt-tckt"><?php echo PRINT_TICKETS; ?></a>
                                    <a href="<?php echo site_url('event/contact_organizer/'.$organizer_id.'/'.$event_id)?>" class="btn-eventgrey marL10 mfPopup"><?php echo CONTACT_THE_HOST; ?></a>
                                </div>
                                </div>
                                <div class="dashHeaderRight">
                                    <img src="<?php echo $event_image;?>" alt=" " height=" " width=" "  />
                                    
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
   