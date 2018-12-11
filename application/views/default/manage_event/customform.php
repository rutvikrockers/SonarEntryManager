<!-- Start of Darshan Code -->
<?php 
$date_time_format = $site_setting['date_time_format'];
$eventStartDateTime=$event_details['event_start_date_time'];
$online_event_option = $event_details['online_event_option'];
$address='';
$cal_event_title=$event_details['event_title'];
$streetAddress = $event_details['street_address'];
$remainingTickets = $event_details['remaining_tickets'];
$event_pass_fees = $event_details['event_pass_fees'];
$invalid_date = "0000-00-00 00:00:00";
if ($access_codes) {
    $access_codes_tickets = $access_codes['tickets'];
    $access_codes_used_cnt = $access_codes['used_cnt'];
}
if($disc_codes) {
    $disc_codes_tickets = $disc_codes['tickets'];
    $disc_codes_disc_amt = $disc_codes['disc_amt'];
    $disc_codes_disc_perc = $disc_codes['disc_perc'];
    $disc_codes_end_date_time = $disc_codes['end_date_time'];
}
if($event_id!=''){
        $venue_add1 = $event_venue['venue_add1'];
        $venue_add2 = $event_venue['venue_add2'];
        $venue_city = $event_venue['venue_city'];
        $venue_state = $event_venue['venue_state'];
        $venue_country = $event_venue['venue_country'];
		if($venue_add1!='')
		{	

			$address=$venue_add1;
		}
		if($venue_add2!='')
		{
			if($address!=''){
			$address=$address.','.$venue_add2;
				}else
				{
					$address=$venue_add2;
				}
		}
		if($venue_city!='')
		{
			if($address!=''){
			$address=$address.','.$venue_city;
				}else
				{
					$address=$venue_city;
				}
		}
		if($venue_state!='')
		{
			if($address!=''){
			$address=$address.','.$venue_state;
				}else
				{
					$address=$venue_state;
				}
		}
		if($venue_country!='')
		{
			if($address!='')
			{
				$address=$address.','.$venue_country;
				}else
				{
					$address=$venue_country;
				}
		}
	}
?>

<!-- End of Darshan Code -->
<style>
.facebook_icon1 {
	background: #3B5998;
	background: #427cbd; /* Old browsers */
	background: -moz-linear-gradient(top, #427cbd 0%, #427cbd 4%, #8aa5d4 4%, #8aa5d4 7%, #427cbd 8%, #427cbd 8%, #3456a0 99%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #427cbd), color-stop(4%, #427cbd), color-stop(4%, #8aa5d4), color-stop(7%, #8aa5d4), color-stop(8%, #427cbd), color-stop(8%, #427cbd), color-stop(99%, #3456a0)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top, #427cbd 0%, #427cbd 4%, #8aa5d4 4%, #8aa5d4 7%, #427cbd 8%, #427cbd 8%, #3456a0 99%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top, #427cbd 0%, #427cbd 4%, #8aa5d4 4%, #8aa5d4 7%, #427cbd 8%, #427cbd 8%, #3456a0 99%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top, #427cbd 0%, #427cbd 4%, #8aa5d4 4%, #8aa5d4 7%, #427cbd 8%, #427cbd 8%, #3456a0 99%); /* IE10+ */
	background: linear-gradient(to bottom, #427cbd 0%, #427cbd 4%, #8aa5d4 4%, #8aa5d4 7%, #427cbd 8%, #427cbd 8%, #3456a0 99%); /* W3C */
 filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#427cbd', endColorstr='#3456a0', GradientType=0 ); /* IE6-9 */
	color: #fff;
	text-decoration: none;
	padding: 13px 35px;
	border-radius: 5px;
	font-size: 14px;
}
td._51m-._51mw a {
	color: #fff !important;
}
</style>
<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="<?php echo base_url();?>js/lib/jquery.mousewheel-3.0.6.pack.js"></script>

<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="<?php echo base_url();?>js/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>js/source/jquery.fancybox.css?v=2.1.5" media="screen" />

<!-- Add Button helper (this is optional) -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>js/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
<script type="text/javascript" src="<?php echo base_url();?>js/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

<!-- Add Thumbnail helper (this is optional) -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>js/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
<script type="text/javascript" src="<?php echo base_url();?>js/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

<!-- Add Media helper (this is optional) -->
<script type="text/javascript" src="<?php echo base_url();?>js/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
<script src="<?php echo base_url();?>js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap-datetimepicker.css" />
<?php
       
	if($event_details['active']==1){
            $is_purchase=1;    
        }else{
            $is_purchase=2;
        }
        
	$free_tickets = $this->event_model->getTickets($event_id,1);
	$paid_tickets = $this->event_model->getTickets($event_id,2);
	$donation_tickets = $this->event_model->getTickets($event_id,3);
	

	
	$headertext='';
	$footertext='';
	
	if($eventTheme){
		$headertext = $eventTheme['header_text_display'];
		$footertext = $eventTheme['footer_text_display'];
	}	
	
	
	$data = array();
	
	$back = $oneTheme['background'];
	$title = $oneTheme['event_title'];
	$head_text = $oneTheme['header_text'];
	$box_back = $oneTheme['box_background'];
	$body_text = $oneTheme['body_text'];
	$box_border = $oneTheme['box_border'];
	$link = $oneTheme['links'];
	$box_head = $oneTheme['box_header'];
	
	$updates = getEventUpdate($event_details['id']);
	
	?>
<script>
	
	//This code snippet hides the row if there's any empty column
	$(document).ready(function() {
		
		$(".fancybox").fancybox({
			
		});
		
		$('#ticket_table tr').filter(function() {
		    return $(this).find('td').filter(function() {
		      return ! $.trim($(this).text());  
		    }).length;
		}).hide();
	});
	//end of code 
	
	function show_promotional_code(){
		document.getElementById('sdsds').style.display = 'block';
		document.getElementById('promotional_text').style.display = 'none';
	}
	
	function save_event(){
		var subcategory_path = site_url+'/event/save_event/';
	        var id = '<?php echo $event_details['id']; ?>';
	        $.ajax({
	            type: "POST",
	            data: {event_id: id}, 
	            url: subcategory_path,
	            success: function(data) {  
	
	                if(data == "success"){
		                $("#saveeventInfo").removeClass('mar10 alert alert-danger');
		                $("#saveeventInfo").addClass('mar10 alert alert-success');
		                $("#saveeventInfo").text('<?php echo Event_saved_successfuuly;?>');
		                $("#getEventSaveCount").text(parseInt($("#getEventSaveCount").text())+parseInt(1));
	                }else{
		                $("#saveeventInfo").removeClass('mar10 alert alert-success');
		                $("#saveeventInfo").addClass('mar10 alert alert-danger');
		                $("#saveeventInfo").text(data);
	                
	            }   
	             setTimeout(function() { 
	                $("#saveeventInfo").text('')
	                $("#saveeventInfo").removeClass('mar10 alert alert-danger');
	                $("#saveeventInfo").removeClass('mar10 alert alert-success');
	             }, 1500);
	            }
	        });   
	}
	
	//Function to validate form 
	

	function submit_check_form(){
		var chk = true;
		
		$('#orderInfo').text("");
		$('#orderInfo').removeClass("mar10 alert alert-danger");
	
		<?php 
		if(count($free_tickets) > 0){
			foreach($free_tickets as $free){
		?>
			if($("#ticket_qty_<?php echo $free['id']?>").val() > 0){
				chk=false;
			}
		<? } 
        } ?>
		
		<?php 
		if(count($paid_tickets) > 0){
			foreach($paid_tickets as $paid){
		?>
			if($("#ticket_qty_<?php echo $paid['id']?>").val() > 0){
				chk=false;
			}
		<? } 
        } ?>
	
		<?php 
		if(count($donation_tickets) > 0){
			foreach($donation_tickets as $donation){
		?>
			if($("#ticket_price_<?php echo $donation['id']?>").val() > 0){
				chk=false;
			}
		<? } 
        } ?>
	
	   	 if(chk){
	   			$('#orderInfo').focus();
	   	 		$('#orderInfo').text("<?php echo Invalid_quantity_Please_enter_quantity_of_1_or_more_Or_amount;?>");
				$('#orderInfo').addClass("mar10 alert alert-danger");
				return false;
	   	 }else{
	   	 		$('#purchase').submit();
	   	 }
		
	}
	
	//Function for password-protected event						
	function submit_password_form(){
		
		if($('#event_password').val()==''){
			$('#event_pass_info').text('<?php echo Enter_Password;?>');
			return false;
		}
		$('#passwordform').submit();
	}
	
	
	
	//Function for password-protected event		
	function submit_check_promotional_code(){
		
		
		var code_val = $('#promotional_code');
		//alert(code_val);
		
		var codeerrInfo = $('#promotional_codeInfo');
		
		codeerrInfo.text('');
	
		var a = code_val.val();
		
		var filter=/^[a-zA-Z0-9_.@]+$/;
			//if it's valid url
			if(a==''){
				//alert();
				code_val.focus();
				codeerrInfo.text('<?php echo Enter_a_valid_promotional_code;?>');
				return false;
			}
			//if it's NOT valid
			else if(!filter.test(a)){
				code_val.focus();
				codeerrInfo.text('<?php echo Type_only_alpha_numeric_characters;?>');
				return false;
			}
			else {
				//alert("asdgjadshgj");
				var url = window.location.href;
				
				//alert(url+'?promo='+a);
				window.location = url+'/?promo='+a; 
				//window.location.reload()
			}	
	}
	
	</script>
<style>
#eventDesign.mainBGColor {
 background: <?php echo $back;
?>;
}
#eventDesign .eventTitleColor {
 color: <?php echo $title;
?>;
}
#eventDesign .eventTitleColor a, #eventDesign .eventTitleColor a:hover {
 color: <?php echo $title;
?>;
}
#eventDesign .red-event {
 color: <?php echo $head_text;
?>;
}
#eventDesign .event-detail {
 background: <?php echo $box_back;
?>;
}
#eventDesign .event-detail, #eventDesign .icon-protection {
 color: <?php echo $body_text;
?>;
}
#eventDesign .brdrColor, #eventDesign .event-detail, #eventDesign .red-event, #eventDesign .eventBrdr, #eventDesign .org_Name {
 border-color: <?php echo $box_border;
?>;
}
#eventDesign .linkColor, #eventDesign .org_Link, #eventDesign a, #eventDesign a:hover {
 color: <?php echo $link;
?>;
}
#eventDesign .linkColor:hover, #eventDesign .org_Link:hover, #eventDesign .eventTitleColor a:hover {
	text-decoration: underline;
}
#eventDesign .event-webpage .red-event {
 background-color: <?php echo $box_head;
?>;
}
#eventDesign .btn-event, #eventDesign .btn-saveevent {
 background:<?php echo $body_text;
?>;
 color:<?php echo $box_back;
?>;
}
#eventDesign .btn-event:hover, #eventDesign .btn-saveevent:hover {
 background:<?php echo $body_text;
?>;
 color:<?php echo $box_back;
?>;
	box-shadow: none !important;
}
#eventDesign .passBox input[type="password"] {
 border-color: <?php echo $body_text;
?>;
	box-shadow: none;
}
#eventDesign .red-event {
	border-bottom: 1px solid transparent !important;
}
</style>
<section class="mainBGColor" id="eventDesign">
  <div class="container padTB50">
    <?php if($error_msg){ ?>
    <div class="alert alert-danger mar10"><?php SecureShowData($error_msg); ?></div>
    <?php }?>
    <div id="event_view_page_theme">
      <div id="event_theme_page_change">
        <?php /*<div class="container">*/?>
        <div id="header_text_html">
          <?php if($headertext!=''){ echo SecureShowData($headertext); }?>
        </div>
        <div class="row">
          <div class="col-lg-9 eventTitleColor">
            <?php /*?><ul class="col-md-3 col-lg-2 col-sm-4 text-center ptbox">
				            	<li><strong><?php echo date('M d', strtotime($event_details['created_at']));?></strong></li>
				                <li><strong><?php echo date('h:i a', strtotime($event_details['created_at']));?></strong></li>
				            </ul><?php */?>
            <?php 
								$event_id = $event_details['organizer_id'];
								$organizers = getRecordById('organizers','id',$event_id);
							?>
            <h1 class="main_event_title"><?php echo ucfirst($cal_event_title);?></h1>
            <p class="orgName"><a href="<?php echo site_url().'/profile/user_profile/'.$organizers['page_url'] ?>"><?php echo SecureShowData($org_name);?></a></p>
            <p><?php echo date($date_time_format,strtotime($eventStartDateTime))?> - <?php echo date($date_time_format,strtotime($event_details['event_end_date_time']))?></p>
            <?php if(!$online_event_option){ ?>
            <p><?php echo ucfirst($event_venue['name']);?> | <?php echo SecureShowData($streetAddress);?></p>
            <?php } ?>
          </div>
          <div class="col-lg-3" style="display: none;">
            <div class="eventImg">
              <?php 
                                    $image = base_url().'images/no-preview.png';
                                    $event_logo =  $event_details['event_logo'];
                                    if($event_logo != '' && file_exists(base_path().'upload/event/orig/'.$event_logo)){ 
                                        $image = base_url().'upload/event/orig/'.$event_logo;
                                    }
                                    elseif($event_logo != '' && file_exists(base_path().'upload/event/thumb/'.$event_logo)){ 
                                        $image = base_url().'upload/event/thumb/'.$event_logo;
                                    }
                                ?>
              <img src="<?php echo $image; ?>" alt=" " height=" " width=" " > </div>
          </div>
        </div>
        <!-- End pt -->
        <div class="eventBrdr"></div>
        <div class="row event-webpage">
          <div class="col-lg-9">
            <div class="red-event">
              <h4><?php echo Ticket_Information;?></h4>
            </div>
            <div class="event-detail pd15">
              <div id="orderInfo"></div>
              <?php /*event tickets start*/ ?>
              <?php 
				        		$protect = 1;
				        		
				        		if($event_details['password_protect']==1 && $event_details['keep_private']==1){
				        			$protect = 0;
				        			if($event_details['password_value']==$event_password){
				        				$protect = 1;
				        			}
				        		}
				        		
				        	?>
              <?php if($protect == 1){ ?>
              <div  class="event_detail" id="event_detail">
                <?php  if (is_array($free_tickets) || is_array($paid_tickets) || is_array($donation_tickets)){ ?>
                <?php
									$attributes = array('name'=>'purchase','id'=>'purchase','class'=>'event-title');
									echo form_open('event/view/'.$event_url_link,$attributes);
								?>
                <table class="ticket table" id="ticket_table">
                  <thead>
                    <tr>
                      <th class="TW25p"><?php echo Ticket_name;?></th>
                      <th><?php echo Sales_Ends;?></th>
                      <th><?php echo Price;?></th>
                      <th><?php echo Fee;?></th>
                      <?php if($remainingTickets == 1){ ?>
                      <th><?php echo Available;?></th>
                      <?php }?>
                      <th><?php echo Quantity;?></th>
                    </tr>
                  </thead>
                  <?php /*free event tickets start*/ ?>
                  <tbody>
                    <?php 
					                	$pur_available=0;
					                	$now_date = date('Y-m-d H:i:s');
					                	$hidden=0;
				                		/****************************FREE TICKETS START**********************************/
				                		if($free_tickets){
				                			foreach($free_tickets as $free){
				                				
				                				if($code_type == 2 && isApplicablePromocode($access_codes, $free) == 1){
			                						$hidden=1;
				                				}
				                				
				                				$available = $free['qty'] - $free['used'];
                                                $free_ticket_name = $free['ticket_name'];
                                                $free_description = $free['description'];
                                                $free_ticket_status = $free['ticket_status'];
                                                $free_end_sale = $free['end_sale'];
                                                $free_min_purchase = $free['min_purchase'];
                                                $free_max_purchase = $free['max_purchase'];
				                				if($free_ticket_name != ''){		
				                	?>
                    <tr>
                      <td><?php 
							                    if ($access_codes){		                    	
							                    	$promo_tkts = $access_codes_tickets;
							                    	
													$promo_tkts_new = explode(',',$promo_tkts);
							                    	if($promo_tkts_new){
							                    		if(in_array($free['id'], $promo_tkts_new)){			                    		
							                    			echo SecureShowData($free_ticket_name);
															 if($free_description != ''){
										                    ?>
                        <a href="javascript:" onclick="if($('#<?php echo $free['id']; ?>').val()==1){ $('#desc_<?php echo $free['id']; ?>').hide(); $('#<?php echo $free['id']; ?>').val(0); this.innerHTML = '<?php echo View_More;?>'; }else{ $('#desc_<?php echo $free['id']; ?>').show(); $('#<?php echo $free['id']; ?>').val(1); this.innerHTML = '<?php echo Hide;?>';  }"><?php echo View_More;?></a>
                        <input type="hidden" id="<?php echo $free['id']; ?>" value="0" />
                        <div id="desc_<?php echo $free['id']; ?>" style="display: none;"> <?php echo $free_description;?> </div>
                        <?php  
										                    } 
							                    		}else {
							                    			if($free_ticket_status!=2){
							                    				echo SecureShowData($free_ticket_name);
																if($free_description != ''){
											                    ?>
                        <a href="javascript:" onclick="if($('#<?php echo $free['id']; ?>').val()==1){ $('#desc_<?php echo $free['id']; ?>').hide(); $('#<?php echo $free['id']; ?>').val(0); this.innerHTML = '<?php echo View_More;?>'; }else{ $('#desc_<?php echo $free['id']; ?>').show(); $('#<?php echo $free['id']; ?>').val(1); this.innerHTML = '<?php echo Hide;?>';  }"><?php echo View_More;?></a>
                        <input type="hidden" id="<?php echo $free['id']; ?>" value="0" />
                        <div id="desc_<?php echo $free['id']; ?>" style="display: none;"> <?php echo $free_description;?> </div>
                        <?php  
										                    	} 
															}
							                    		}		                    
															
							                    	}
							                	
							                    } else {
								                    if($free_ticket_status!=2  || $hidden==1 ){
								                    	echo SecureShowData($free_ticket_name);
														 if($free_description != ''){
										                    ?>
                        <a href="javascript:" onclick="if($('#<?php echo $free['id']; ?>').val()==1){ $('#desc_<?php echo $free['id']; ?>').hide(); $('#<?php echo $free['id']; ?>').val(0); this.innerHTML = '<?php echo View_More;?>'; }else{ $('#desc_<?php echo $free['id']; ?>').show(); $('#<?php echo $free['id']; ?>').val(1); this.innerHTML = '<?php echo Hide;?>';  }"><?php echo View_More;?></a>
                        <input type="hidden" id="<?php echo $free['id']; ?>" value="0" />
                        <div id="desc_<?php echo $free['id']; ?>" style="display: none;"> <?php echo SecureShowData($free_description);?> </div>
                        <?php  
										                 } 
								                    }		                    
					                			} ?></td>
                      <td><?php 
							                    if($free_end_sale != '' && $free_end_sale !== $invalid_date) {
							                    	  if ($access_codes){			                    	
								                    	$promo_tkts = $access_codes_tickets;
														  $promo_tkts_new = explode(',',$promo_tkts);
								                    	if($promo_tkts_new){
								                    		
								                    		if(in_array($free['id'], $promo_tkts_new)){				                    		
								                    				echo date($date_time_format,strtotime($free_end_sale));			                    			
								                    		} else {
								                    			if($free_ticket_status!=2 ){				                    		
								                    				echo date($date_time_format,strtotime($free_end_sale));
																}
															}				                    
								                    	}
								                    	
							                    	  } else {
								                    		echo date($date_time_format,strtotime($free_end_sale));                    
							                    	  }
							                    } 
							                    ?></td>
                      <td><?php echo Free;?></td>
                      <td><?php echo Free;?></td>
                      <?php if($remainingTickets == 1){ ?>
                      <td><?php  
							                    if($access_codes){	                    	
							                    	$promo_tkts = $access_codes_tickets;
													
													$promo_tkts_new = explode(',',$promo_tkts);
							                    	if ($promo_tkts_new){
							                    		if(in_array($free['id'], $promo_tkts_new)){		
							                    			if($access_codes['uses'] > 0 ){
																$qty = $access_codes['uses'] ;	
																# Calculate available tickets having discount 
								                    	      	$available = $qty  - $access_codes_used_cnt;
								                    	      	echo $available.'/'.$qty; 
								                   		    #For unlimited uses of discount code -->	
							                    			} elseif($access_codes['uses'] == 0 ){      
							                    	 		 	echo $available.'/'.$free['qty']; 
							                    			}	
							                    		}else{
															if($free_ticket_status!=2){
																echo $available.'/'.$free['qty'];	
															} 				                    		 
														}	  	
							                    	} else{
							                    		if($free_ticket_status!=2  || $hidden==1 ){
															echo $available.'/'.$free['qty'];	
														} 				                    		 
							                    	}			                    
							                    } else {
					                    	 		echo $available.'/'.$free['qty']; 	                    
							                    }	
							                ?></td>
                      <?php } ?>
                      <td><?php
				
					                    		if($free_end_sale=='' || $free_end_sale < $now_date || $free['start_sale'] > $now_date || $event_details['event_end_date_time'] < $now_date || $is_purchase==2 ) {
				                                    echo N_A;
													$free_ids=$free['id'];
													echo '<input type="hidden"  name="ticket_qty['.$free_ids.']" id="ticket_qty_'.$free_ids.'"/>';
					                    		} else {		                                		
				                                		
				                                	if ($free_min_purchase=='' || $free_min_purchase==0){
				                                		$free_min_purchase=$site_setting['min_purchase_allowed'];
				                    				}else {
				                    					$paid_min_purchase=$site_setting['min_purchase_allowed'];
				                    				}
				                                	
				                                	if ($free_max_purchase=='' || $free_max_purchase==0){
				                                		$free_max_purchase=$site_setting['max_purchase_allowed'];
				                    				}
				                                	
				                                	if ($available >= $free_min_purchase){
				                                		$pur_available=1;
				                                	
				                                		
				                                		if($available >= $free_max_purchase && $free_max_purchase>0){
				                                			$available = $free_max_purchase;
				                                		}
				                                		
						                    ?>
                        <div class="posrel">
                          <select name="ticket_qty[<?php echo $free['id'] ?>]" id="ticket_qty_<?php echo $free['id'] ?>" class="select-pad">
                            <option value="0">0</option>
                            <?php 
					                                        for($i = $free_min_purchase; $i<=$available; $i++){
					                                        	echo '<option value="'.$i.'">'.$i.'</option>';
					                                        }
					                                        ?>
                          </select>
                          <div class="clear"></div>
                        </div>
                        <?php 
				                    				} else {
				                                    	echo Sold_Out;
                                                                        $free_ids=$free['id'];
                                                                        echo '<input type="hidden"  name="ticket_qty['.$free_ids.']" id="ticket_qty_'.$free_ids.'"/>';
				                    				}  
					                    		}
						                    ?></td>
                    </tr>
                    <?php 
				                				}
					                		}
					                	}
					                ?>
                    <?php /****************************FREE TICKETS END**********************************/ ?>
                    <?php /****************************PAID TICKETS START**********************************/ ?>
                    <?php 
					                if($paid_tickets){
				                			foreach($paid_tickets as $paid){
				                				
				                				if($code_type == 1 && isApplicablePromocode($disc_codes, $paid) == 1){
			                						$hidden=1;
				                				}
				                				
				                				if($code_type == 2 && isApplicablePromocode($access_codes, $paid) == 1){
			                						$hidden=1;
				                				}
				                				
				                				$available = $paid['qty'] - $paid['used'];
                                                $paid_ticket_name = $paid['ticket_name'];
                                                $paid_ticket_status = $paid['ticket_status'];
                                                $paid_min_purchase = $paid['min_purchase'];
                                                $paid_max_purchase = $paid['max_purchase'];
                                                $paid_price = $paid['price'];
				                				if($paid_ticket_name != ''){		
				                	?>
                    <tr>
                      <td><?php 
							                    if($disc_codes){
							                    	
							                    	$promo_tkts = $disc_codes_tickets;
							                    	
													$promo_tkts_new = explode(',',$promo_tkts);
													
													
							                    	if($promo_tkts_new && $paid_ticket_status != 2){
							                    	
														
														
							                    		if(in_array($paid['id'], $promo_tkts_new)){
						                    										                    		
						                    				echo SecureShowData($paid_ticket_name);
															
							                    			if($disc_codes_disc_amt!=0)
						                    			{
										                    	
						                    				echo '<br /> ('.Discounted.set_event_currency($disc_codes_disc_amt,$event_details['currency_code_id']).')';
							                    			}
										                    if ($disc_codes_disc_perc!=0){
										                    	echo '<br /> ('.Discounted.$disc_codes_disc_perc.'%)';
										                   	}
							                    		} else {
							                    			
																echo SecureShowData($paid_ticket_name);	
															
							                    		}
							                    	}				                    
							                    }
							                    elseif ($access_codes){		                    	
							                    	$promo_tkts = $access_codes_tickets;
													$promo_tkts_new = explode(',',$promo_tkts);
							                    	
							                    	if($promo_tkts_new){
							                    		if(in_array($paid['id'], $promo_tkts_new)){			                    		
							                    			echo $paid_ticket_name;
							                    		}	else {
							                    			if($paid_ticket_status!=2){
																echo SecureShowData($paid_ticket_name);	
															}
															
							                    		}
							                    	}
	                	
							                    } else {
								                    if  ($paid_ticket_status!=2  || $hidden==1){
								                    	echo SecureShowData($paid_ticket_name);
								                    }		                    
					                			}
							                    	
							                    if($paid['description'] != ''){
                                                                                if($paid_ticket_status!=2  || $hidden==1){ ?>
                        <a href="javascript:" onclick="if($('#<?php echo $paid['id']; ?>').val()==1){ $('#desc_<?php echo $paid['id']; ?>').hide(); $('#<?php echo $paid['id']; ?>').val(0); this.innerHTML = '<?php echo View_More;?>'; }else{ $('#desc_<?php echo $paid['id']; ?>').show(); $('#<?php echo $paid['id']; ?>').val(1); this.innerHTML = '<?php echo Hide;?>';  }"><?php echo View_More;?></a>
                        <input type="hidden" id="<?php echo $paid['id']; ?>" value="0" />
<div id="desc_<?php echo $paid['id']; ?>" style="display: none;"> <?php echo SecureShowData($paid['description']);?> </div>
                        <?php
                                                                                }
                                                                              
                                                                                ?>
                        <?php  } ?></td>
                      <td><?php 
							                    	
							                    	  if($disc_codes){
							                    	  	$promo_tkts = $disc_codes_tickets;
														  
														  $promo_tkts_new = explode(',',$promo_tkts);
														  
								                    	if ($promo_tkts_new && $paid_ticket_status!= 2){
								                    	
															
								                    		if(in_array($paid['id'], $promo_tkts_new)){	
							
									                    			if($disc_codes_end_date_time!='' && $disc_codes_end_date_time!=$invalid_date){
									                    				
									                    				 echo date($date_time_format,strtotime($disc_codes_end_date_time));
									                    			} else {
									                    				
																			echo date($date_time_format,strtotime($paid_ticket_status));	
																		 	
											                    			
									                    			}
								                    		} else {
								                    					                    	
									                    		if($paid_ticket_status != '' && $paid_ticket_status !== $invalid_date){
							                    					echo date($date_time_format,strtotime($paid_ticket_status));	
									                    		}
							                    			
								                    		}			                    
								                    	}
							                    	  }
							                    	  elseif ($access_codes){			                    	
								                    	$promo_tkts = $access_codes_tickets;
														  $promo_tkts_new = explode(',',$promo_tkts);
								                    	if($promo_tkts_new){
								                    		
								                    		if(in_array($paid['id'], $promo_tkts_new)){	
				
								                    			if($access_codes['end_date_time']!=''){	
								                    				echo date($date_time_format,strtotime($access_codes['end_date_time']));	                    			 
									                    			 
								                    			} else {
											                    	echo date($date_time_format,strtotime($paid_ticket_status));	
								                    			}
								                    			
								                    		} else {
								                    			
																if($paid_ticket_status!=2  && $paid_ticket_status != '' && $paid_ticket_status !== $invalid_date){
						                    						echo date($date_time_format,strtotime($paid_ticket_status));	
																}				                    		
								                    			
								                    		}				                    
								                    	}
							                    	  }
							                    	   else {
								                    		echo date($date_time_format,strtotime($paid_ticket_status));                    
							                    	  }
							                   
							                    ?></td>
                      <td><?php
						                   		if($disc_codes){
							                        $promo_tkts = $disc_codes_tickets;
													
													$promo_tkts_new = explode(',',$promo_tkts);
												
							                    	if($promo_tkts_new && $paid_ticket_status!= 2){
							                    		
							                    		if(in_array($paid['id'], $promo_tkts_new)){
				
								                    		if($disc_codes_disc_amt!='' && $disc_codes_disc_amt > 0 ){
								                    			
																
								                    			$paid_price = $paid_price - $disc_codes_disc_amt;
																
								                    			echo set_event_currency($paid_price,$event_details['currency_code_id']);
																
																
								                    		} elseif($disc_codes_disc_perc!='' && $disc_codes_disc_perc > 0 && $disc_codes_disc_perc < 100 ){
								                    			 
								       			 				$perc = (($paid_price * $disc_codes_disc_perc) / 100);
									       			 			$paid_price = $paid_price- $perc;
									       			 			echo set_event_currency($paid_price,$event_details['currency_code_id']);
									       			 				
								                    		}elseif($disc_codes_disc_perc == 100){
									       			 		 	echo Free;
								                    		}
							                    		} else {
							                    					                    	
							                    			echo set_event_currency($paid_price,$event_details['currency_code_id']);
															
							                    		}				                    
							                    	} 
								                    	
						                   		} elseif($access_codes){  
						                    		$promo_tkts = $access_codes_tickets;
													
													$promo_tkts_new = explode(',',$promo_tkts);
						                    
							                    	if($promo_tkts_new){
							                    		
							                    		if(in_array($paid['id'], $promo_tkts_new)){
															echo set_event_currency($paid_price,$event_details['currency_code_id']);
														}else{
															if($paid_ticket_status!=2  ){
																echo set_event_currency($paid_price,$event_details['currency_code_id']);
															}
															
														}                 		
							                    	}
						                    	} else {
							                    	echo set_event_currency($paid_price,$event_details['currency_code_id']);
						                    	}
						                     ?></td>
                      <td><?php 
							                   if($disc_codes){
							                       $promo_tkts = $disc_codes_tickets;
												   
												   $promo_tkts_new = explode(',',$promo_tkts);
												   
							                    	if($promo_tkts_new && $paid_ticket_status!= 2){
							                    			
							                    		if(in_array($paid['id'], $promo_tkts_new)){	
							                    			   if (($event_pass_fees==1) || ($event_pass_fees==3 && $paid['service_fee']==1)) {
				                               					   if($disc_codes_disc_perc!= '' && $disc_codes_disc_perc == 100){
									       			 		 			echo Free;
				                               					   } else {
				                               						echo set_event_currency($paid_price,$event_details['currency_code_id']);
				                               					   }	
							                    			   } else {
							                    			   	echo set_event_currency(0,$event_details['currency_code_id']);
							                    			   }
							                    		} else {
				                               				echo set_event_currency($paid_price,$event_details['currency_code_id']);
							                    		}				                    
							                    	}         	
							                   } elseif($access_codes){  
							                    	$promo_tkts = $access_codes_tickets;
													
													$promo_tkts_new = explode(',',$promo_tkts);
							                    
							                    	if($promo_tkts_new){
							                    		if(in_array($paid['id'], $promo_tkts_new)){				                    		
							                    			if(($event_pass_fees==1) || ($event_pass_fees==3 && $paid['paid_service_fee']==1)) {
				                           						echo set_event_currency($paid['fee'],$event_details['currency_code_id']);
							                    			} else {
				                           						echo set_event_currency(0,$event_details['currency_code_id']);
							                    			}		
							                    		} else {
							                    			if($paid_ticket_status!=2){
							                    				echo set_event_currency($paid['fee'],$event_details['currency_code_id']);
															}
							                    		}			                    
							                    	}	
							                   } else {
						                    		 if(($event_pass_fees==1) || ($event_pass_fees==3 && $paid['service_fee']==1)){
				                               			echo set_event_currency($paid['fee'],$event_details['currency_code_id']);
						                    		 } else {
				                               			echo set_event_currency(0,$event_details['currency_code_id']);
						                    		 }
							                   }
							                   ?></td>
                      <?php if($remainingTickets == 1){ ?>
                      <td><?php  
							                    if($access_codes){	                    	
							                    	$promo_tkts = $access_codes_tickets;
													$promo_tkts_new = explode(',',$promo_tkts);
							                    	if ($promo_tkts_new){
							                    		if(in_array($paid['id'], $promo_tkts_new)){		
							                    			if($access_codes['uses'] > 0 ){
																$qty = $access_codes['uses'] ;	
																# Calculate available tickets having discount 
								                    	      	$available = $qty  - $access_codes_used_cnt;
								                    	      	echo $available.'/'.$qty; 
								                   		    #For unlimited uses of discount code
							                    			} elseif($access_codes['uses'] == 0 ){      
							                    	 		 	echo $available.'/'.$paid['qty']; 
							                    			}	
							                    		}else{
															if($paid_ticket_status!=2 ){ 				                    		 
						                    	 				echo $available.'/'.$paid['qty']; 
															}              
														}	  	
							                    	} else{
							                    		if($paid_ticket_status!=2 ){ 				                    		 
						                    	 			echo $available.'/'.$paid['qty']; 
														}                
							                    	}			                    
							                    }
												elseif($disc_codes){
													
													$promo_tkts = $disc_codes_tickets;
													$promo_tkts_new = explode(',',$promo_tkts);
							                    	if($promo_tkts_new && $paid_ticket_status!= 2){
							                    		if(in_array($paid['id'], $promo_tkts_new)){		
							                    			if($disc_codes['uses'] > 0){
																$qty = $disc_codes['uses']; 	
																	# Calculate available tickets having discount 
									                    	      $available = $qty  - $disc_codes['used_cnt'];
									                    	      echo $available/$qty;
									                   		 #For unlimited uses of discount code
							                    			} elseif($disc_codes['uses'] == 0){     
							                    	 		 	echo $available.'/'.$paid['qty'];                    			 	
							                    			}		  
							                    		                   
					                    			
							                    		} else {			                    		
							                    			echo $available.'/'.$paid['qty'];                    
							                    		}			                    
							                    	}
												}
							                    else {
					                    	 		echo $available.'/'.$paid['qty']; 	                    
							                    }	
							                ?></td>
                      <?php } ?>
                      <td><?php
					                    		if($paid_ticket_status=='' || $paid_ticket_status < $now_date || $paid['start_sale'] > $now_date || $event_details['event_end_date_time'] < $now_date || $is_purchase==2) {
				                                    echo N_A;
													$paid_ids = $paid['id'];
													echo '<input type="hidden"  name="ticket_qty['.$paid_ids.']" id="ticket_qty_'.$paid_ids.'"/>';
					                    		} else {		                                		
				                                		
				                                	if ($paid_min_purchase=='' || $paid_min_purchase==0){
				                                		$paid_min_purchase=$site_setting['min_purchase_allowed'];
				                    				} else {
				                    					$paid_min_purchase=$site_setting['min_purchase_allowed'];
				                    				}
				                                	
				                                	if ($paid_max_purchase=='' || $paid_max_purchase==0){
				                                		$paid_max_purchase=$site_setting['max_purchase_allowed'];
				                    				}
				                                	
				                                	if ($available >= $paid_min_purchase){
				                                		$pur_available=1;
				                                	
				                                		
				                                		if($available >= $paid_max_purchase && $paid_max_purchase>0){
				                                			$available = $paid_max_purchase;
				                                		}
						                    ?>
                        <div class="posrel">
                          <select name="ticket_qty[<?php echo $paid['id'] ?>]" id="ticket_qty_<?php echo $paid['id'] ?>" class="select-pad">
                            <option value="0">0</option>
                            <?php 
					                                        for($i = $paid_min_purchase; $i<=$available; $i++){
					                                        	echo '<option value="'.$i.'">'.$i.'</option>';
					                                        }
					                                        ?>
                          </select>
                          <div class="clear"></div>
                        </div>
                        <?php 
				                    				} else {
				                                    	echo Sold_Out;
                                                                        $paid_ids = $paid['id'];
                                                                        echo '<input type="hidden"  name="ticket_qty['.$paid_ids.']" id="ticket_qty_'.$paid_ids.'"/>';
				                    				}  
					                    		}
						                    ?></td>
                    </tr>
                    <?php 
				                				}
					                		}
					                	}
					                ?>
                    <?php /****************************PAID TICKETS END**********************************/ ?>
                    <?php /****************************DONATION TICKETS START**********************************/ ?>
                    <?php  if($donation_tickets){
				                			foreach($donation_tickets as $donation){
				                				
				                				if($code_type == 2 && isApplicablePromocode($access_codes, $donation) == 1){
			                						$hidden=1;
				                				}
				                				
				                				$available = $donation['qty'] - $donation['used'];
                                                $donation_ticket_name = $donation['ticket_name'];
                                                $donation_description = $donation['description'];
                                                $donation_ticket_status = $donation['ticket_status'];
                                                $donation_end_sale = $donation['end_sale'];
				                				if($donation_ticket_name != ''){		
				                	?>
                    <tr>
                      <td><?php 
							                    if ($access_codes){		                    	
							                    	$promo_tkts = $access_codes_tickets;
							                    	
													$promo_tkts_new = explode(',',$promo_tkts);
							                    	if($promo_tkts){
							                    		if(in_array($donation['id'], $promo_tkts_new)){			                    		
							                    			echo SecureShowData($donation_ticket_name);
							                    		}else { 
							                    			if($donation_ticket_status!=2){ 		
							                    				echo SecureShowData($donation_ticket_name);
                                                                                                }
							                    		}
							                    						                    
							                    	}
						                	
							                    } else {
								                    if  ($donation_ticket_status!=2  || $hidden==1){
								                    	echo SecureShowData($donation_ticket_name);
								                    }		                    
					                			}
							                    	
							                    if($donation_description != ''){
                                                                                
                                                                                if($donation_ticket_status!=2  || $hidden==1){ ?>
                        <a href="javascript:" onclick="if($('#<?php echo $donation['id']; ?>').val()==1){ $('#desc_<?php echo $donation['id']; ?>').hide(); $('#<?php echo $donation['id']; ?>').val(0); this.innerHTML = '<?php echo View_More;?>'; }else{ $('#desc_<?php echo $donation['id']; ?>').show(); $('#<?php echo $donation['id']; ?>').val(1); this.innerHTML = '<?php echo Hide;?>';  }"><?php echo View_More;?></a>
                        <input type="hidden" id="<?php echo $donation['id']; ?>" value="0" />
                        <div id="desc_<?php echo $donation['id']; ?>" style="display: none;"> <?php echo SecureShowData($donation_description);?> </div>
                        <?php
                                                                                }
                                                                            
							                    ?>
                        <?php  } ?></td>
                      <td><?php 
							                    if($donation_end_sale != '' && $donation_end_sale !== $invalid_date) {
							                    	  if ($access_codes){			                    	
								                    	$promo_tkts = $access_codes_tickets;
														  $promo_tkts_new = explode(',',$promo_tkts);
								                    	if($promo_tkts_new){
								                    		
								                    		if(in_array($donation['id'], $promo_tkts_new)){				                    		
								                    			echo date($date_time_format,strtotime($donation_end_sale));			                    			
								                    		} else {
								                    			if($donation_ticket_status!=2 ){ 						                    		
								                    				echo date($date_time_format,strtotime($donation_end_sale));
																}
															}				                    
								                    	}
								                    	
							                    	  } else {
								                    		echo date($date_time_format,strtotime($donation_end_sale));                    
							                    	  }
							                    } 
							                    ?></td>
                      <td><?php 
							                    if($access_codes){
							                    	$promo_tkts = $access_codes_tickets;
													$promo_tkts_new = explode(',',$promo_tkts);
							                    	if($promo_tkts_new){
							                    		if(in_array($donation['id'], $promo_tkts_new)){					                    		
							                    			echo N_A;
							                    		}
							                    		
							                    		if($donation_ticket_status!=2){
							                    			echo N_A;
							                    		}                  			
							                    	} 				                    	
									                    	
							                    } elseif($disc_codes){			                    	
						                    		$promo_tkts = $disc_codes_tickets;
													$promo_tkts_new = explode(',',$promo_tkts);
						                    		if($promo_tkts_new && $donation_ticket_status!= 2){				                    						                    		
						                    				echo N_A;
						                    		}
							                    } else {
									               echo N_A;
							                    } 
						                    ?></td>
                      <td><?php 
							                    if($access_codes){ 
							                    	$promo_tkts = $access_codes_tickets;
													$promo_tkts_new = explode(',',$promo_tkts);
							                    	if($promo_tkts_new){
							                    		if(in_array($donation['id'], $promo_tkts_new)){				                    		
							                    				echo N_A;
							                    		}
							                    		
								                    	if($donation_ticket_status!=2){
							                    			echo N_A;
							                    		}                  			
							                    	} 				                    	     	
							                    } elseif($disc_codes){			                    	
						                    		$promo_tkts = $disc_codes_tickets;
													$promo_tkts_new = explode(',',$promo_tkts);
						                    		if($promo_tkts_new && $donation_ticket_status!= 2){				                    						                    		
						                    				echo N_A;
						                    		}
							                    } else {
									               echo N_A;
							                    } 
						                    ?></td>
                      <?php if($remainingTickets == 1){ ?>
                      <td><?php  
							                    if($access_codes){	                    	
							                    	$promo_tkts = $access_codes_tickets;
													$promo_tkts_new = explode(',',$promo_tkts);
							                    	if ($promo_tkts_new){
							                    		if(in_array($donation['id'], $promo_tkts_new)){		
							                    			if($access_codes['uses'] > 0 ){
																$qty = $access_codes['uses'] ;	
																# Calculate available tickets having discount 
								                    	      	$available = $qty  - $access_codes_used_cnt;
								                    	      	echo $available.'/'.$qty; 
								                   		    #For unlimited uses of discount code -->	
							                    			} elseif($access_codes['uses'] == 0 ){      
							                    	 		 	echo $available.'/'.$donation['qty']; 
							                    			}	
							                    		}else{
															if($donation_ticket_status!=2 ){ 	
																echo $available.'/'.$donation['qty']; 
															}
														}	  	
							                    	} else{
							                    		if($donation_ticket_status!=2  || $hidden==1 ){ 		 				                    		 
						                    	 			echo $available.'/'.$donation['qty']; 
														}                
							                    	}			                    
							                    } else {
					                    	 		echo $available.'/'.$donation['qty']; 	                    
							                    }	
							                ?></td>
                      <?php } ?>
                      <td><?php
					                    		if($donation_end_sale=='' || $donation_end_sale < $now_date || $donation['start_sale'] > $now_date || $event_details['event_end_date_time'] < $now_date  || $is_purchase==2) {
												$donation_id = $donation['id'];
				                                    echo N_A;
													echo '<input type="hidden"  name="ticket_qty['.$donation_id.']" id="ticket_qty_'.$donation_id.'"/>';
													echo '<input type="hidden"  name="ticket_price['.$donation_id.']" id="ticket_price_'.$donation_id.'"/>';
					                    		} else {		                                		
				                                	if ($available > 0){
				                                		$pur_available=1;
				                                		$donation_id = $donation['id'];
				                                	
				                                		//echo Enter_Amount.'('.$site_setting['currency_symbol'].')<br /> 
				                                		echo Enter_Amount.'('.getCurrencySymbol($event_details['id']).')<br /> 
				                                		<input type="hidden"  name="ticket_qty['.$donation_id.']" id="ticket_qty_'.$donation_id.'"/>
				                                		<input type="text"  name="ticket_price['.$donation_id.']" id="ticket_price_'.$donation_id.'"/>';
				                    				} else {
				                                    	echo Sold_Out;
                                                                        $donation_id = $donation['id'];
                                                                               echo  '<input type="hidden"  name="ticket_qty['.$donation_id.']" id="ticket_qty_'.$donation_id.'"/>';
                                                                               echo '<input type="hidden"  name="ticket_price['.$donation_id.']" id="ticket_price_'.$donation_id.'"/>';
				                    				}  
					                    		}
						                    ?></td>
                    </tr>
                    <?php 
				                				}
					                		}
					                	}
					                ?>
                    <?php /****************************DONATION TICKETS END**********************************/ ?>
                  </tbody>
                </table>
            <input type="hidden" name="aff_id" id="aff_id" value="<?php echo SecureShowData($msg);?>" />
                <input type="hidden" name="affu_id" id="affu_id" value="<?php echo $affu_id;?>" />
                <input type="hidden" name="event_id" id="event_id" value="<?php echo $event_details['id']; ?>" />
                
                <!--  setting up return url if registratoin time gets over.  -->
                
                <input type="hidden" name="return_url" id="return_url" value="<?php if($msg != '') { echo str_replace('/'.$msg,'',getcurrenturl()); } else { echo getcurrenturl();}?>" />
                <!--  end of retun url   -->
                
                <?php
				                
				                if($code_type==1){ ?>
                <input type="hidden" name="promo_code_id" id="promo_code_id" value="<?php echo $disc_codes['id'];?>" />
                <input type="hidden" name="promo_code_amt" id="promo_code_amt" value="<?php echo $disc_codes_disc_amt;?>" />
                <input type="hidden" name="promo_code_perc" id="promo_code_perc" value="<?php echo $disc_codes_disc_perc;?>" />
                <?php } else if($code_type==2){ ?>
                <input type="hidden" name="promo_code_id" id="promo_code_id" value="<?php echo $access_codes['id'];?>" />
                
				<?php }	?>
				<?php if($this->uri->segment('2')!='theme'){ ?></form><?php }?> 
                <?php
				if($pur_available==1)
				                { ?>
                
              </div>
              <?php  if(check_user_authentication()=='')
		                	{ 
		                		
		                				$page_url=base64_encode(getcurrenturl());
	       					?>
              <div class="form-group clearfix MarB5 fr"> <strong><?php echo Login_first_to_buy_tickets; ?></strong> <a href="<?php echo site_url('user/login/'.$page_url); ?>"  class="btn-event"><?php echo Login;?></a> </div>
              <div class="clear"></div>
              <?php } 
	       					else 
	       					{ ?>
              <div class="form-group clearfix MarB5 fr"> <a href="javascript:" id="buy_btn" onclick="submit_check_form();" ondblclick="this.preventDefault();" class="btn-event"><?php echo Buy_Tickets;?></a> </div>
              <?php  $promotional_codes = getAllPromotionalCode($event_details['id']); ?>
              <!--Rahul Added -->
              <?php 
                                                    $promo = $this->input->get('promo');
                                                    if($promotional_codes && $is_purchase==1 && $code_type==0 && $protect==1)
                                                {?>
              <div> <a href="javascript:void(0);" onclick="show_promotional_code();" id="promotional_text">Click here to enter promotional code</a> </div>
              <div class="event_detail" id="sdsds" style="display: none;">
                <?php 
				                
				               
				                
				                if($code_type==0 && count($promotional_codes) > 0){
				                		 
				                	$attributes = array('name'=>'promocode','id'=>'promocode','class'=>'event-title','method'=>'get');
									echo form_open('event/view/'.$event_url_link,$attributes);	
									
				                ?>
                
                <div class="form-group clearfix">
                  <div class="col-xs-12 wth43">
                    <label><?php echo Enter_promotional_code_here_if_you_have; ?><span>&#42;</span></label>
                  </div>
                  <div class="col-sm-4 col-xs-12">
                    <input type="text" name="promo" id="promo" value=""  />
                    <span id="promotional_codeInfo" class="error"></span> </div>
                  <div class="col-sm-2 col-xs-12 fr">
                    <input type="submit"  value="Apply" class="btn-event fr"/>
                  </div>
                </div>
                <div class="clear"></div>
               				<?php if($this->uri->segment('2')!='theme'){ ?> </form> <?php } ?>
                <?php }    ?>
              </div>
              <?php  
                                                }
                                                ?>
              <div class="clear"></div>
              <?php } 
						} else { ?>
              <?php echo No_tickets_available_for_purchase_now;?> </div>
            <?php } 
            } else { ?>
            <?php echo No_tickets_available_for_purchase_now;?> </div>
          <?php } 
          } else {?>
          <div class="event_detail pad3 marT20">
            <?php
									$attributes = array('name'=>'passwordform','id'=>'passwordform','class'=>'event-title');
									echo form_open('event/view/'.$event_url_link,$attributes);	
									
								?>
            <div class="event_detail row form-group pt pb">
              <div class="col-sm-8 col-sm-offset-2">
                <div class="row">
                  <div class="col-sm-3 col-xs-12"> <i class="icon-protection"></i> </div>
                  <div class="col-sm-8 col-xs-12">
                    <h4><strong><?php echo This_event_is_password_protected;?></strong></h4>
                    <p><?php echo event_password_protected_enter_password;?></p>
                    <div class="passProtected">
                      <div class="passBox">
                        <input type="password" id="event_password" name="event_password" placeholder="<?php echo Enter_Password;?>" value="<?php echo $event_password; ?>" />
                      </div>
                      <a href="javascript:" onclick="submit_password_form();" class="btn-event"><?php echo View_Now;?></a>
                      <div id="event_pass_info" class="error" >
                        <?php  
                                                        if($event_password!='' ){
                                                            echo Incorrect_Password;
                                                        } 
                                                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           				<?php if($this->uri->segment('2')!='theme'){ ?> </form> <?php } ?>
            <div class="clear"></div>
          </div>
          <!-- end outer div of form tag-->
          
          <?php } ?>
        </div>
        <div class="pt" id="allow_facebook_id" style="display:<?php if($event_details['allow_facebook']==1){ echo 'block';} else { echo 'none'; } ?>">
          <div class="red-event">
            <h4><?php echo Whos_Going;?></h4>
          </div>
          <div class="event-detail pd15">
            <p><?php echo you_are_the_first_of_your_friends_to_connect_to_this_event;?></p>
            <div class="pt"> <a href="javascript://" onclick="Login();" class="facebook_icon fsize"> <img src="<?php echo base_url();?>images/social_icon.png" alt=" " height=" " width=" " > <span><?php echo Share_this_event_on_facebook;?></span> </a> </div>
          </div>
        </div>
        <div style="display:none;">
          <div class="red-event">
            <h4><?php echo Share_this_event;?></h4>
          </div>
          <div class="event-detail pd15">
            <?php $link = site_url('event/view/'.$event_details['id']);?>
            <ul>
              
              <li>
                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                                          var js, fjs = d.getElementsByTagName(s)[0];
                                          if (d.getElementById(id)) return;
                                          js = d.createElement(s); js.id = id;
                                          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=205173049644458&version=v2.0";
                                          fjs.parentNode.insertBefore(js, fjs);
                                        }(document, 'script', 'facebook-jssdk'));</script>
                <div class="fb-share-button facebook_icon1" data-href="<?php echo urlencode($link);?>" data-width="500"></div>
              </li>
              <li> <a href="javascript:void()" class="twitter_icon pdtw1" onClick="window.open('http://twitter.com/home?status=<?php echo SecureShowData($cal_event_title.' - '.$site_setting['site_name']); ?> <?php echo site_url('event/view/'.$event_url_link);?>','Share on Twitter','height=300,width=600,top=50,left=300');"> <img src="<?php echo base_url(); ?>images/twitter.png" alt=""  /> <span><?php echo Twitter;?></span> </a> </li>
              <?php /*
										<li><span class='st_sharethis_large' displayText='ShareThis'></span></li>
										<li>
									    	<a href="javascript:void()"  id="shareonfacebook" class="facebook_icon pdfb1">
									    		<img src="<?php echo base_url();?>images/social_icon.png" alt=" " height=" " width=" " >
									   			<span><?php echo Facebook;?></span>
									    	</a>
								   		</li>
								   		<li>
									   		<a href="javascript:void()" class="twitter_icon pdtw1" onClick="window.open('http://twitter.com/home?status=<?php echo $cal_event_title.' - '.$site_setting['site_name']; ?> <?php echo site_url('event/view/'.$event_url_link);?>','Share on Twitter','height=300,width=600,top=50,left=300');">
										   		<img src="<?php echo base_url(); ?>images/twitter.png" alt=""  />
										   		<span><?php echo Twitter;?></span>
									   		</a>
									 	</li>*/?>
              <li> <a  href="https://plus.google.com/share?url=<?php echo urlencode($link);?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"> <img style="margin-top: -4px;" src="https://www.gstatic.com/images/icons/gplus-32.png" alt=" " height="40" alt="Share on Google+" /> </a> </li>
            </ul>
          </div>
        </div>
        <?php if($protect==1){ ?>
        <div class="red-event">
          <h4>Event Details</h4>
        </div>
        <div class="event-detail pd15"> <?php echo SecureShowData($event_details['event_detail']);?> </div>
        <?php } ?>
        <?php  if($updates){?>
        <div class="red-event" style="display: none;">
          <h4><?php echo News_Updates;?></h4>
        </div>
        <div class="event-detail pd15" style="display: none;">
          <?php foreach($updates as $update){ ?>
          <div class=" pb">
            <h4><?php echo date($date_time_format,strtotime($update['updated_at']));?></h4>
            <p><?php echo strip_tags($update['updates']);?></p>
          </div>
          <?php } ?>
        </div>
        <?php } ?>
      </div>
      <div class="col-lg-3">
        <div class="event-detail brdrRadius5 pd15" style="display: none;">
          <?php 	
					         if(!check_user_authentication()){
					         	$page_url=base64_encode(getcurrenturl()); 
            ?>
          <a href="<?php echo site_url('home/login/'.$page_url); ?>" class="btn-saveevent"><i class="glyphicon glyphicon-bookmark"></i><?php echo Save_this_Event; ?></a>
          <?php } else { ?>
          <a onclick="save_event();" class="btn-saveevent" href="javascript://"><i class="glyphicon glyphicon-bookmark"></i> <?php echo Save_this_Event;?></a>
          <?php   }  ?>
          <div id="saveeventInfo"></div>
          <p class="saveEvenrtext"> <span id="getEventSaveCount"><?php echo getEventSaveCount($event_details['id']).'</span> '.person_have_saved_this; ?></span></p>
        </div>
        <div class="red-event pt" style="display: none;">
          <h4>When
            <?php if(!$online_event_option){ ?>
            & Where
            <?php } ?>
          </h4>
        </div>
        <?php
									$event_start_date_time=$eventStartDateTime;
									$temp=explode(" ",$eventStartDateTime);
									if(isset($temp[0])) {
                                        $event_start_date_time=$temp[0];
									}
									$event_end_date_time=$event_details['event_end_date_time'];
									$temp=explode(" ",$event_details['event_end_date_time']);
									if(isset($temp[0])) {
                                        $event_end_date_time=$temp[0];
                                    }
									$cal_start_date=str_replace("-","",$event_start_date_time);
									$cal_end_date=str_replace("-","",$event_end_date_time);
									$cal_event_desc=$event_details['event_detail'];
									$cal_location=$streetAddress;
									
									?>
        <div class="event-detail pd15" style="display: none;" >
          <?php $style=''; if($online_event_option){ $style='style="display: none;"';} ?>
          <div class="pb" <?php echo $style; ?>>
            <?php 
								if($streetAddress != '' && $event_details['show_on_map'] ==1 ){
								$street_address = str_replace(' ','+',$streetAddress);
								
								$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$street_address.'&sensor=false');
								$output= json_decode($geocode); //Store values in variable
								
								if($output->status == 'OK'){ // Check if address is available or not
									$lat = $output->results[0]->geometry->location->lat; //Returns Latitude
									$long = $output->results[0]->geometry->location->lng; // Returns Longitude
								
								
								?>
            <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script> 
            <script type="text/javascript">
								$(document).ready(function () {
									
									// Define the latitude and longitude positions
									var latitude = parseFloat("<?php echo $lat; ?>"); // Latitude get from above variable
									var longitude = parseFloat("<?php echo $long; ?>"); // Longitude from same
									var latlngPos = new google.maps.LatLng(latitude, longitude);
									
									// Set up options for the Google map
									var myOptions = {
										zoom: 15,
										center: latlngPos,
										mapTypeId: google.maps.MapTypeId.ROADMAP,
									};
									
									// Define the map
									map = new google.maps.Map(document.getElementById("map"), myOptions);
									
									// Add the marker
									var marker = new google.maps.Marker({
										position: latlngPos,
										map: map,
										title: "test",
										animation: google.maps.Animation.BOUNCE,
									});
								});
								</script>
            <div class="map" id="map"></div>
            <?php } 
            } ?>
          </div>
          <p class="padL0" <?php echo $style; ?>><strong><?php echo ucfirst($event_details['vanue_name']);?></strong></p>
          <p class="padL0" <?php echo $style; ?>><?php echo SecureShowData($streetAddress);?></p>
          <p class="padL0"><strong>From:</strong> <?php echo date($date_time_format,strtotime($eventStartDateTime))?></p>
          <p class="padL0"><strong>To: </strong><?php echo date($date_time_format,strtotime($event_details['event_end_date_time']))?></p>
          <p class="padL0"><a href="https://www.google.com/calendar/render?action=TEMPLATE&text=<?php echo SecureShowData($cal_event_title);?>&dates=<?php echo $cal_start_date;?>T093846Z/<?php echo $cal_end_date;?>T093846Z&details=<?php echo urlencode($cal_event_desc);?>&location=<?php echo $cal_location;?>&pli=1&uid=&sf=true&output=xml" target="_blank" class="linkColor" rel="nofollow"> <i class="glyphicon glyphicon-calendar"></i>&nbsp; Add to google calendar</a> </p>
        </div>
        <div class="red-event pt" style="display: none;">
          <h4><?php echo Organizer;?></h4>
        </div>
        <div class="event-detail pd15" style="display: none;">
          <p class="org_Name"><?php echo SecureShowData($org_name);?></p>
          <a href="<?php echo site_url('event/contact_organizer/'.$event_details['user_id'].'/'.$event_details['id']); ?>" class="btn-saveevent fancybox fancybox.iframe"><i class="glyphicon glyphicon-envelope"></i> <?php echo Contact_the_organizer ?></a> <a href="<?php echo site_url('profile/user_profile/'.$organizers['page_url']); ?>" class="org_Link"><i class="glyphicon glyphicon-eye-open"></i>&nbsp; <?php echo view_organizer_profile ?></a>
          <?php /*?> <?php echo anchor('event/contact_organizer/'.$event_details['user_id'].'/'.$event_details['id'],Contact_the_organizer,'class="btn-saveevent fancybox fancybox.iframe"')?>
                                <?php echo anchor('profile/user_profile/'.$organizers['page_url'],view_organizer_profile,'class="org_Link"')?> <?php */?>
        </div>
      </div>
    </div>
    <?php /*</div><!-- End container -->*/?>
    <div id="footer_text_html">
      <?php if($footertext!=''){ echo SecureShowData($footertext); }?>
    </div>
  </div>
  </div>
  </div>
  <!-- End container --> 
</section>
