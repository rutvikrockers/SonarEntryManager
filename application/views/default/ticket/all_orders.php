<ul class="clearfix padL0">
<?php
if($tickets){
	foreach ($tickets as $ticket) {
		$ticket_amount = $ticket['ticket_amt'];
		$ticket_quantity = $ticket['ticket_qty'];
		$event_title = $ticket['event_title'];
		$event_url_link = $ticket['event_url_link'];
		$event_logo = $ticket['event_logo'];
		$created_at = datetimeformat($ticket['created_at']);
		$purchase_id = $ticket['id'];

		if($event_logo && file_exists('upload/event/thumb/'.$event_logo)){
			$event_image = base_url().'upload/event/thumb/'.$event_logo;
		}else{
			$event_image = base_url()."upload/event/thumb/no_img.jpeg";
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
                                                                    if($image_slide != '' && file_exists(base_path().'upload/event/thumb/'.$image_slide)){ 
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
                    	}
                    	?>
                    	
                    	</ul>