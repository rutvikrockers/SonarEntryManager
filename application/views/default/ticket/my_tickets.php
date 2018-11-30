<script>
$(document).ready(function(){
    $('#all_order').click(function(){

            var getStatusUrl= '<?php echo site_url('ticket/list_allorders')?>';
            $.ajax({
                url: getStatusUrl,
                dataType: 'text',
                type: 'POST',
                timeout: 99999,
                global: false,
                data: '[]',
                success: function(data)
                { 
                    
                    $('#order_list').html(data);
                    $('#all_order').hide();

                     $('.flexslider').flexslider({
                        animation: "fade",
                        controlNav: false, 
                        directionNav: false,
                      });
                        
                },      
                error: function(XMLHttpRequest, textStatus, errorThrown)
                {
                
                }
            });
        });
});
</script>

<section class="eventDash-head pdTB0">
    <div class="container">
        <div class="row"> 
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 test-contct ">
               <h1><?php echo MY_TICKETS; ?></h1>
            </div>
      </div>
    </div>
</section>
<?php if($success_msg){
                    ?>
                    <div class="alert alert-success message"><?php echo $success_msg; ?></div>
                <?php }?> 
<section>  

            <div class="container marTB50">            
               
                <div class="row">
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                    <div class="subTitle">
                        <h4><?php echo CURRENT_ORDERS; ?></h4>
                        <h5><?php echo SELECT_AN_OREDER_TO_PRINT_TICKETS_REQUEST_A_REFUND_OR_CONTACT_THE_ORGANIZER; ?></h5>
                     </div>
                        
                    <div class="eventListContainer" id="order_list">
                         <ul class="clearfix padL0">
                        <?php 
                        if($tickets){
                            foreach ($tickets as $ticket) {
                                $ticket_amount = $ticket['ticket_amt'];
                                $ticket_quantity = $ticket['ticket_qty'];
                                $event_title = $ticket['event_title'];
                                $event_logo = $ticket['event_logo'];
                                $event_url_link = $ticket['event_url_link'];
                                $created_at = datetimeformat($ticket['created_at']);
                                $purchase_id = $ticket['id'];
                                
                                if($event_logo && file_exists('upload/event/thumb/'.$event_logo)){
                                    $event_image = base_url().'upload/event/thumb/'.$event_logo;
                                }else{
                                    $event_image = base_url().'upload/event_default/no_img.jpg';
                                }
                                ?>
                                <li>
                                     <div class="josef">                                      
                                        <div class="imgLeft">  
                                              <div class="flexslider">
                                                        <ul class="slides">
                                                          <?php  
                                                            $event_images=getAllRecordById('event_images','event_id',$ticket['eid']);

                                                            if($event_images){
                                                              foreach ($event_images as  $image_data) {
                                                              
                                                          ?>
                                                          <li>
                                                           <?php 
                                                                    $image = base_url().'upload/event_default/no_img.jpg';
                                                                    $image_slide =  $image_data['image_name'];
                                                                    if($image_slide != '' && file_exists(base_path().'upload/event/orig/'.$image_slide)){ 
                                                                        $image = base_url().'upload/event/thumb/'.$image_slide;
                                                                    }
                                                                    elseif($image_slide != '' && file_exists(base_path().'upload/event/thumb/'.$image_slide)){ 
                                                                        $image = base_url().'upload/event/thumb/'.$image_slide;
                                                                    }
                                                                ?>
                                                          <img src="<?php echo $image; ?>" alt=" "  height="" width=""  > 
                                                          </li>
                                                          <?php 
                                                            
                                                              }
                                                            } ?>
                                                          
                                                        </ul>
                                                      </div>
                                        </div>
                                            
                                        <div class="tour">
                                            <h2><a href="<?php echo site_url('event/view/'.$event_url_link);?>"><?php echo SecureShowData($event_title);?></a></h2>
                                            <p><?php echo TOTAL_QUANTITY.' : '.$ticket_quantity; ?></p>
                                            <p><?php echo $created_at;?> <?php echo timeFormat($ticket['created_at']); ?></p>
                                            <p class="view pb10"><a href="<?php echo site_url('ticket/order_detail/'.$purchase_id);?>"><?php echo VIEW_ORDER; ?></a></p>
                                        </div>
                                    </div>
                               </li>
                               
                                <?php
                            }   
                        }else{
                            ?><li class="text-center">
                                <p class="no_recordSearch"><?php echo YOU_DONOT_HAVE_PURCHASE_ANY_TICKET;?></p>
                                <a href="<?php echo site_url('search'); ?>" class="btn-event"><?php echo DISCOVER_EVENTS;?></a>
                              </li>
                            <?php
                            }
                        ?>
                        
                        </ul>
                        
                    </div>
                     <?php 
                        if($tickets && count($all_tickets)>3){
                            ?>
                                <div class="text-center pb mt10 comonback">
                                    <a href="javascript://" class="btn-event" id="all_order"><?php echo ALL_ORDERS; ?></a>
                                </div>
                            <?php } 
                        ?>
                      
                        </div>
                
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 clearfix pt15 pdlr" style="display: none;">
                            <div class="event-webpage">
                            <div class="red-event">
                            <h4>Connect with Facebook</h4>
                        </div>
                        <div class="event-detail">
                            <div class="text-center pt">
                                <p><?php echo CONNECT_WITH_FACEBOOK_TO_SEE_THE_EVENTS_YOUR_FRIENDS_ARE_ATTENDING; ?></p>
                                <div class="pb plr btn-common">
                                    <a href="javascript://" class="facebook_icon  fsize pdfb">
                                    <img src="<?php echo base_url();?>images/social_icon.png" alt=" " height=" " width=" " >
                                    <span><?php echo CONNECT_WITH_FACEBOOK; ?></span>
                                    </a>
                                </div>                                  
                                <div class="form-group clearfix">
                                    <div class="col-lg-12">
                                        <p class="text-center"><?php echo YOU_CAN_ALSO_CREATE_OWN_EVENT_JUST_CLICKING_BELOW_BUTTON;?></p>
                                        <div class=" text-center btn-common">
                                            <a href="javascript://" class="btn-event  cre-evnt"><?php echo CREATE_EVENT; ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>        
                            </div>      
                        </div>                
                <!-- End container -->
                </div>
            </div>
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
        <!-- CSS/JS FOR FIXSLIDER-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/flexslider.css');?>">
<script type="text/javascript" src="<?php echo base_url('js/jquery.flexslider.js');?>"></script>
<script type="text/javascript">
   $(window).load(function() {
  $('.flexslider').flexslider({
    animation: "fade",
    controlNav: false, 
    directionNav: false,
  });
});
history.pushState(null, null, location.href);
window.onpopstate = function () {
	history.go(1);
};
</script>