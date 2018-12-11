<?php 
$address='';
$currency = getRecordById('currency_codes','id',$event_details['currency_code_id']);
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
					$address=$event_venue['venue_add1'];
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


<style>

td._51m-._51mw a {
	color: #fff !important;
}
.sel-width90{
width: 80%;
}
.break-all-word p{
word-break: break-all;
}
</style>
<?php if($event_details['google_code']!=''){ ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '<?php echo $event_details['google_code']; ?>', 'auto');
  ga('send', 'pageview');

</script>
<?php } ?>

<!-- CSS/JS FOR FIXSLIDER-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/flexslider.css');?>">
<script type="text/javascript" src="<?php echo base_url('js/jquery.flexslider.js');?>"></script>
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
  $(window).load(function() {
  $('.flexslider').flexslider({
    animation: "fade",
    controlNav: false, 
    directionNav: false,
  });
});
    </script>
<script src="<?php echo base_url();?>js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap-datetimepicker.css" />
<?php
       
	if($event_details['active']==1)
	{
        $is_purchase=1;    
    }else{
        $is_purchase=2;
    }
        
	$free_tickets = $this->event_model->getTickets($event_id,1);
	$paid_tickets = $this->event_model->getTickets($event_id,2);
	$donation_tickets = $this->event_model->getTickets($event_id,3);

	$paid_ticket_fee = $site_setting['paid_ticket_fee'];
	
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
	$(".tool_tip_class").tooltip();		
		$('#ticket_table tr').filter(function() {
		    return $(this).find('td').filter(function() {
		      return ! $.trim($(this).text());  
		    }).length;
		}).hide();
	});
	
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
	
	function submit_check_form(){
		var chk = true;
		
		$('#orderInfo').text("");
		$('#orderInfo').removeClass("mar10 alert alert-danger");
	
		<?php ?><?php 
		if(count($free_tickets) > 0){
			foreach($free_tickets as $free){ ?>
				if($("#ticket_qty_<?php echo $free['id']?>").val() > 0){
					chk=false;
				}
		<? } 
		} ?>
		
		<?php 
		if(count($paid_tickets) > 0){
			foreach($paid_tickets as $paid){ ?>
				if($("#ticket_qty_<?php echo $paid['id']?>").val() > 0){
					chk=false;
				}
		<? } 
		} ?>
	
		<?php 
		if(count($donation_tickets) > 0){
			foreach($donation_tickets as $donation){ ?>
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
			
		var code_val = $('#promo');
		
		var codeerrInfo = $('#promotional_codeInfo');
		
		codeerrInfo.text('');
	
		var a = code_val.val();
		
		var filter=/^[a-zA-Z0-9_.@]+$/;
			//if it's valid url
			if(a==''){		
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
				var url = window.location.href;				
				window.location = url+'/?promo='+a; 
			}	
	}
	
	</script>
<style>

#eventDesign.mainBGColor {
	background: <?php echo $back; ?>;
}
#eventDesign .eventTitleColor {
	color: <?php echo $title; ?>;
}
#eventDesign .eventTitleColor a, #eventDesign .eventTitleColor a:hover {
	color: <?php echo $title; ?>;
}
#eventDesign .red-event {
	color: <?php echo $head_text; ?>;
}
#eventDesign .event-detail {
	background: <?php echo $box_back; ?>;
}
#eventDesign .event-detail, #eventDesign .icon-protection {
	color: <?php echo $body_text; ?>;
}
#eventDesign .brdrColor, #eventDesign .event-detail, #eventDesign .red-event, #eventDesign .eventBrdr, #eventDesign .org_Name, #eventDesign .table>thead>tr>th, #eventDesign .table>tbody>tr>td {
	border-color: <?php echo $box_border; ?>;
}
#eventDesign .linkColor, #eventDesign .org_Link, #eventDesign a, #eventDesign a:hover {
 	color: <?php echo $link; ?>;
}
#eventDesign .linkColor:hover, #eventDesign .org_Link:hover, #eventDesign .eventTitleColor a:hover {
	text-decoration: underline;
}
#eventDesign .event-webpage .red-event {
	background-color: <?php echo $box_head; ?>;
}
#eventDesign .btn-event, #eventDesign .btn-saveevent {
	background:<?php echo $body_text; ?>;
	color:<?php echo $box_back; ?>;
}
#eventDesign .btn-event:hover, #eventDesign .btn-saveevent:hover {
	background:<?php echo $body_text; ?>;
	color:<?php echo $box_back; ?>;
	box-shadow: none !important;
}
#eventDesign .passBox input[type="password"] {
	border-color: <?php echo $body_text;?>;
	box-shadow: none;
}
#eventDesign .red-event {
	border-bottom: 1px solid transparent !important;
}
</style>
<?php if($event_details['active']==2){ ?>
<div class="endedEvent">
	<i class="glyphicon glyphicon-time"></i> <?php echo THIS_EVENT_HAS_ENDED;?>
</div>
<?php }
else if($event_details['active']==3){ ?>
<div class="endedEvent">
	<i class="glyphicon glyphicon-time"></i> <?php THIS_EVENT_HAS_ENDED;?>
</div> <?php } ?>
<?php
	
 if($this->uri->segment('4')=='preview' && $this->uri->segment('2')=='view'){ $this->load->view('default/common/dashboard-header'); }

?>
<section class="mainBGColor" id="eventDesign">
  <div class="container padTB50">
    <?php if($error_msg){ ?>
    <div class="alert alert-danger mar10"><?php echo SecureShowData($error_msg); ?></div>
    <?php }?>
    <div id="event_view_page_theme">
      <div id="event_theme_page_change">
        <div id="header_text_html">
        <h1 style="text-align: center;"><?php echo SecureShowData($event_details['event_title']); ?></h1>
          <?php if($headertext!=''){ echo $headertext; }?>
        </div>
        <div id="header_text_html">
        	<a href="<?php echo site_url('event/view/'.$event_details['event_url_link']);?>" target="_blank" class="btn-event">More Details</a>
        </div>
       
        <div class="eventBrdr"></div>
        <div class="row event-webpage">
          <div class="col-lg-12">
            <div class="red-event <?php if(!($event_details['event_capacity']>0)){ echo "hide";}?>">
              <h4><?php echo Ticket_Information;?></h4>
            </div>
            <div class="event-detail pd15 <?php if(!($event_details['event_capacity']>0)){ echo "hide";}?>">
              <div id="orderInfo"></div>
              
              <?php 
	        		$protect = 1;
	        		if($this->uri->segment('2')=='theme'){ $event_details['keep_private']=0;}
	        		
	        		if($promo_code==''){
		        		if($event_details['password_protect']==1 && $event_details['keep_private']==1){
		        			$protect = 0;

		        			if($event_details['password_value']==$event_password){
		        				$protect = 1;
		        			}
		        		}
	        		}	
        		?>
              <?php if($protect == 1){ ?>
              <div  class="event_detail" id="event_detail">
                <?php  if (is_array($free_tickets) || is_array($paid_tickets) || is_array($donation_tickets)){ ?>
                <?php
					$attributes = array('name'=>'purchase','id'=>'purchase','class'=>'event-title mb', 'target'=>'_parent');
					echo form_open('event/view/'.$event_url_link,$attributes);	
				?>
                <table class="table table_res event_view_table contct-table" id="ticket_table">
                  <thead>
                    <tr>
                      <th class="TW25p"><?php echo Ticket_name;?></th>
                      <th><?php echo Sales_Ends;?></th>
                      <th><?php echo Price;?></th>
                      <th><?php echo Fee;?></th>
                      <?php if($event_details['remaining_tickets'] == 1){ ?>
                      <th><?php echo Available;?></th>
                      <?php }?>
                      <?php if($event_details['event_rand_id'] == ''){ ?>
                      <th><?php echo Quantity;?></th>
                      <?php } ?>
                    </tr>
                  </thead>
                  	
                  <tbody>
                    <?php 
	                	$pur_available=0;
	                	$now_date = date('Y-m-d H:i:s');
	                	$hidden=0;
		              		
                		/****************************FREE TICKETS START**********************************/
                		if($free_tickets){
                			foreach($free_tickets as $free){
                				
                				if($code_type == 2){
                					if(isApplicablePromocode($access_codes, $free) == 1){
                						$hidden=1;
                					}
                				}
                				
                				$available = $free['qty'] - $free['used'];
                				$available = $available - $free['temp_qty'];	
                				
                				if($free['ticket_name'] != ''){		
                	?>
                    <tr>
                      <td>
                      <?php 
	                    if ($access_codes){	                    	
	                    	$promo_tkts = $access_codes['tickets'];
	                    	
							$promo_tkts_new = explode(',',$promo_tkts);							
	                    	if($promo_tkts_new){ 
	                    		if(in_array($free['id'], $promo_tkts_new)){			                    		
	                    			echo SecureShowData($free['ticket_name']);	                    			
									 if($free['hide_description'] != ''){
	                    ?>
				                        <a href="javascript:" onclick="if($('#<?php echo $free['id']; ?>').val()==1){ $('#desc_<?php echo $free['id']; ?>').hide(); $('#<?php echo $free['id']; ?>').val(0); this.innerHTML = '<?php echo View_More;?>'; }else{ $('#desc_<?php echo $free['id']; ?>').show(); $('#<?php echo $free['id']; ?>').val(1); this.innerHTML = '<?php echo Hide;?>';  }"><?php echo View_More;?></a>
				                        <input type="hidden" id="<?php echo $free['id']; ?>" value="0" />
				                        <div id="desc_<?php echo $free['id']; ?>" style="display: none;"> <?php echo SecureShowData($free['description']);?> </div>
                        <?php  
	                    }else { ?>
		                    <div id="desc_<?php echo $free['id']; ?>"> <?php echo SecureShowData($free['description']);?> </div>
                		<?php }
	                    		}else{
	                    			echo SecureShowData($free['ticket_name']);	                    		
	                    		}		                    															
	                    	}							                	
	                    } else { 
		                    if($free['ticket_status']!=2  || $hidden==1 ){
		                    	echo SecureShowData($free['ticket_name']);
								 if($free['hide_description'] != ''){
				                    ?>
				                        <a href="javascript:" onclick="if($('#<?php echo $free['id']; ?>').val()==1){ $('#desc_<?php echo $free['id']; ?>').hide(); $('#<?php echo $free['id']; ?>').val(0); this.innerHTML = '<?php echo View_More;?>'; }else{ $('#desc_<?php echo $free['id']; ?>').show(); $('#<?php echo $free['id']; ?>').val(1); this.innerHTML = '<?php echo Hide;?>';  }"><?php echo View_More;?></a>
				                        <input type="hidden" id="<?php echo $free['id']; ?>" value="0" />
				                        <div id="desc_<?php echo $free['id']; ?>" style="display: none;"> <?php echo SecureShowData($free['description']);?> </div>
		                        <?php  
					                 }else{ ?>
					                 <div id="desc_<?php echo $free['id']; ?>"> <?php echo SecureShowData($free['description']);?> </div>
					                 <?php }
					                    }		                    
		                			}?>
            			</td>
                      	<td>
                      	<?php 
		                    if($free['end_sale'] != '' && $free['end_sale'] !== '0000-00-00 00:00:00') {
		                    	  if ($access_codes){			                    	
			                    	$promo_tkts = $access_codes['tickets'];
									  $promo_tkts_new = explode(',',$promo_tkts);
			                    	if($promo_tkts_new){
			                    		
			                    		if(in_array($free['id'], $promo_tkts_new)){				                    		
			                    			echo datetimeformat($free['end_sale']).' '.timeFormat($free['end_sale']);
			                    				//echo date($site_setting['date_time_format'],strtotime($free['end_sale']));			                    			
			                    		} else {
			                    			if($free['ticket_status']!=2 ){				                    		
			                    				echo datetimeformat($free['end_sale']).' '.timeFormat($free['end_sale']);
			                    				//echo date($site_setting['date_time_format'],strtotime($free['end_sale']));
											}
										}				                    
			                    	}
			                    	
		                    	  } else { 
		                    	  		echo datetimeformat($free['end_sale']).' '.timeFormat($free['end_sale']);
			                    		//echo date($site_setting['date_time_format'],strtotime($free['end_sale']));                    
		                    	  }
		                    } 
                    	?>
                    	</td>
						<td><?php echo Free;?></td>
						<td><?php echo Free;?></td>
                      	<?php 
                      	if($event_details['remaining_tickets'] == 1){ ?>
                      	<td>
                      	<?php  
		                    if($access_codes){	                    	
		                    	$promo_tkts = $access_codes['tickets'];
								
								$promo_tkts_new = explode(',',$promo_tkts);
		                    	if ($promo_tkts_new){
		                    		if(in_array($free['id'], $promo_tkts_new)){		
		                    			if($access_codes['uses'] > 0 ){
											$qty = $access_codes['uses'] ;	
																# Calculate available tickets having discount 
				                    	      	$available = $qty  - $access_codes['used_cnt'];
				                    	      	echo $available.'/'.$qty; 
								                   		    #For unlimited uses of discount code -->	
			                    			} elseif($access_codes['uses'] == 0 ){      
			                    	 		 	echo $available.'/'.$free['qty']; 
			                    			}	
			                    		}else{
											if($free['ticket_status']!=2){
												echo $available.'/'.$free['qty'];	
											} 				                    		 
										}	  	
			                    	} else{
			                    		if($free['ticket_status']!=2  || $hidden==1 ){
											echo $available.'/'.$free['qty'];	
										} 				                    		 
			                    	}			                    
			                    } else {
	                    	 		echo $available.'/'.$free['qty']; 	                    
			                    }	
		                ?>
		                </td>
                      <?php } ?>
                      <td><?php				
	                		if($free['end_sale']=='' || $free['end_sale'] < $now_date || $free['start_sale'] > $now_date || $event_details['event_end_date_time'] < $now_date || $is_purchase==2 ) {
	                            echo N_A;
								$free_ids=$free['id'];
								echo '<input type="hidden"  name="ticket_qty['.$free_ids.']" id="ticket_qty_'.$free_ids.'"/>';													
                    		} else {		                                						                                	
                            	if ($free['min_purchase']=='' || $free['min_purchase']==0){
                            		$free['min_purchase']=$site_setting['min_purchase_allowed'];
                				}
                				// else {
                				// 	$paid['min_purchase']=$site_setting['min_purchase_allowed'];
                				// }
				                                	
                            	if ($free['max_purchase']=='' || $free['max_purchase']==0){
                            		$free['max_purchase']=$site_setting['max_purchase_allowed'];
                				}
                            	
                            	if ($available >= $free['min_purchase']){
                            		$pur_available=1;
                            	
                            		
                            		if($available >= $free['max_purchase'] && $free['max_purchase']>0){
                            			$available = $free['max_purchase'];
                            		}
                            		
	                    ?>
                        <div class="posrel">
							<select name="ticket_qty[<?php echo $free['id'] ?>]" id="ticket_qty_<?php echo $free['id'] ?>" class="select-pad sel-width90">
								<option value="0">0</option>
								<?php 
								for($i = $free['min_purchase']; $i<=$available; $i++){
									echo '<option value="'.$i.'">'.$i.'</option>';
								}
								?>
							</select>
							 <a class="tool_tip_class" data-placement="left" data-toggle="tooltip" href="javascript://" title="<?php echo Maximum.' '.Purchase_Tickets.' : '.$available.' '.Minimum.' '.Purchase_Tickets. ' : '.$free['min_purchase'] ; ?>"></a>
                          <div class="clear"></div>
                        </div>
                        <?php 
            				} else {
            					if($free['qty']==$free['used']){ echo Sold_Out; }
            					else{ 
            						echo UNAVAILABLE; ?>
            						<i class="tool_tip_class ico-info" data-placement="right" data-toggle="tooltip" href="javascript://" title="<?php echo UNAVAILABLE_INFO;?>"></i>
            					<?php }
                        	    	
                                	$free_ids=$free['id'];
                                    echo '<input type="hidden"  name="ticket_qty['.$free_ids.']" id="ticket_qty_'.$free_ids.'"/>';
            				}  
                		}
                    ?>
                    </td>
                    </tr>
                    <?php 
            				}
                		}
                	}
                ?>
                    <?php /****************************FREE TICKETS END**********************************/ ?>


                    <?php /****************************PAID TICKETS START**********************************/ ?>
                    <?php 
		                $seat_data = getRecordById('seat_planner','plan_id',$event_details['id']); 
                    	 $plan_value = json_decode($seat_data['plan_value'], true);
                    	$guest_array = $plan_value['guests'];
                    	//print_r($guest_array);
		                if($paid_tickets){
                			foreach($paid_tickets as $paid){
                				
                				if($code_type == 1){
                					if(isApplicablePromocode($disc_codes, $paid) == 1){
                						$hidden=1;
                					}
                				}
                				
                				if($code_type == 2){
                					if(isApplicablePromocode($access_codes, $paid) == 1){
                						$hidden=1;
                					}
                				}
                				
                				$available = $paid['qty'] - $paid['used'];
	                			$available = $available - $paid['temp_qty'];

                				if($paid['ticket_name'] != ''){		
		                	?>

		                	<?php $color = '';
		                	if($guest_array)
		                		foreach ($guest_array as $key => $val) {
									if ($val['ticket_name'] === $paid['ticket_name']) {
									   $color = $guest_array[$key]['colorcode'];
									}
						   		}

		                	?>
		                	<?php if($color==''){ ?>
		                		<tr>
		                	<?php }else{ ?>
                    			<tr style="background:<?php echo $color; ?>; color: #ffffff;" >
                    		<?php } ?>
                      <td><?php 
		                    if($disc_codes){
		                    	
		                    	$promo_tkts = $disc_codes['tickets'];
		                    	
								$promo_tkts_new = explode(',',$promo_tkts);
								
								
		                    	if($promo_tkts_new && $paid['ticket_status'] != 2){
		                    	
		                    		if(in_array($paid['id'], $promo_tkts_new)){
	                    										                    		
	                    				echo SecureShowData($paid['ticket_name']);
										
		                    			if($disc_codes['disc_amt']!=0)
		                    			{										                    	
	                    					echo '<br /> ('.Discounted.set_event_currency($disc_codes['disc_amt'],$event_details['id']).')';
		                    			}
					                    if ($disc_codes['disc_perc']!=0){
					                    	echo '<br /> ('.Discounted.$disc_codes['disc_perc'].'%)';
					                   	}
		                    		} else {							                    		
										echo SecureShowData($paid['ticket_name']);	
										
		                    		}
		                    	}				                    
		                    }
		                    elseif ($access_codes){		                    	
		                    	$promo_tkts = $access_codes['tickets'];
								$promo_tkts_new = explode(',',$promo_tkts);
		                    	
		                    	if($promo_tkts_new){
		                    		if(in_array($paid['id'], $promo_tkts_new)){			                    		
		                    			echo SecureShowData($paid['ticket_name']);
		                    		}	else {
		                    			if($paid['ticket_status']!=2){		                    				
											echo SecureShowData($paid['ticket_name']);	
										}
										
		                    		}
		                    	}
	
		                    } else {
			                    if  ($paid['ticket_status']!=2  || $hidden==1){
			                    	echo SecureShowData($paid['ticket_name']);
			                    }		                    
                			}
							                    	
		                    if($paid['hide_description'] != '0'){
                                if($paid['ticket_status']!=2  || $hidden==1){ ?>
			                        <a href="javascript:" onclick="if($('#<?php echo $paid['id']; ?>').val()==1){ $('#desc_<?php echo $paid['id']; ?>').hide(); $('#<?php echo $paid['id']; ?>').val(0); this.innerHTML = '<?php echo View_More;?>'; }else{ $('#desc_<?php echo $paid['id']; ?>').show(); $('#<?php echo $paid['id']; ?>').val(1); this.innerHTML = '<?php echo Hide;?>';  }"><?php echo View_More;?></a>
			                        <input type="hidden" id="<?php echo $paid['id']; ?>" value="0" />
			                        <div id="desc_<?php echo $paid['id']; ?>" style="display: none;"> <?php echo SecureShowData($paid['description']);?> </div>
			                        <?php
                                } ?>
                <?php  }else{ ?><div id="desc_<?php echo $paid['id']; ?>"> <?php echo SecureShowData($paid['description']);?> </div> <?php }?></td>
					<td>
					<?php 							                    
                	  if($disc_codes){
                	  	$promo_tkts = $disc_codes['tickets'];
						  
						  $promo_tkts_new = explode(',',$promo_tkts);
						  
                  		  	if ($promo_tkts_new && $paid['ticket_status']!= 2){
                  			
                    		if(in_array($paid['id'], $promo_tkts_new)){	

	                    			if($disc_codes['end_date_time']!='' && $disc_codes['end_date_time']!='0000-00-00 00:00:00'){
										//echo date($site_setting['date_time_format'],strtotime($disc_codes['end_date_time']));			                
										echo datetimeformat($disc_codes['end_date_time']).' '.timeFormat($disc_codes['end_date_time']);
	                    			} else {			                    			
	                    				echo datetimeformat($paid['end_sale']).' '.timeFormat($paid['end_sale']);
										//echo date($site_setting['date_time_format'],strtotime($paid['end_sale']));	
									}
		                    } else {
		                    					                    	
	                    		if($paid['end_sale'] != '' && $paid['end_sale'] !== '0000-00-00 00:00:00'){
	            					//echo date($site_setting['date_time_format'],strtotime($paid['end_sale']));	
	            					echo datetimeformat($paid['end_sale']).' '.timeFormat($paid['end_sale']);
	                    		}
	                    			
                    		}			                    
                    	}
                	  }
                	  elseif ($access_codes){			                    	
                    	$promo_tkts = $access_codes['tickets'];
						$promo_tkts_new = explode(',',$promo_tkts);
                
                    	if($promo_tkts_new){
		                    		
    	            		if(in_array($paid['id'], $promo_tkts_new)){	
										
                    			if($access_codes['end_date_time']!='' && $access_codes['end_date_time']!='0000-00-00 00:00:00'){	
                    				//echo date($site_setting['date_time_format'],strtotime($access_codes['end_date_time']));	                    			 
                    				echo datetimeformat($access_codes['end_sale']).' '.timeFormat($access_codes['end_date_time']);
                    			} else {  
			                    	//echo date($site_setting['date_time_format'],strtotime($paid['end_sale']));	
			                    	echo datetimeformat($paid['end_sale']).' '.timeFormat($paid['end_sale']);
                    			}
		                    			
                    		} else {
		                    			
								if($paid['ticket_status']!=2 ){
									if($paid['end_sale'] != '' && $paid['end_sale'] !== '0000-00-00 00:00:00'){
                						//echo date($site_setting['date_time_format'],strtotime($paid['end_sale']));	
                						echo datetimeformat($paid['end_sale']).' '.timeFormat($paid['end_sale']);
	                    			}
								}				                    		
                			
	                    		}				                    
	                    	}
						}
						else {
                    		//echo date($site_setting['date_time_format'],strtotime($paid['end_sale']));                    
                    		echo datetimeformat($paid['end_sale']).' '.timeFormat($paid['end_sale']);
						}
                    ?>
                    </td>
                    <td>
                    <?php
                   		if($disc_codes){
	                        $promo_tkts = $disc_codes['tickets'];
													
							$promo_tkts_new = explode(',',$promo_tkts);
												
		                    	if($promo_tkts_new && $paid['ticket_status']!= 2){
							                    		
		                    		if(in_array($paid['id'], $promo_tkts_new)){
				
			                    		if($disc_codes['disc_amt']!='' && $disc_codes['disc_amt'] > 0 ){
								                    																			
			                    			$paid['price'] = $paid['price'] - $disc_codes['disc_amt'];																
			                    			echo set_event_currency($paid['price'],$event_details['id']);

			                    		} elseif($disc_codes['disc_perc']!='' && $disc_codes['disc_perc'] > 0 && $disc_codes['disc_perc'] < 100 ){
								                    			 
			       			 				$perc = (($paid['price'] * $disc_codes['disc_perc']) / 100);
				       			 			$paid['price'] = $paid['price']- $perc;
				       			 			echo set_event_currency($paid['price'],$event_details['id']);
									       			 				
			                    		}elseif($disc_codes['disc_perc'] == 100){
				       			 		 	echo Free;
		                    		}
	                    		} else {							                    					                    
	        
	                    			echo set_event_currency($paid['price'],$event_details['id']);
															
	                    		}				                    
	                    	} 
		                    	
                   		} elseif($access_codes){  

                    		$promo_tkts = $access_codes['tickets'];
													
							$promo_tkts_new = explode(',',$promo_tkts);
						                    
	                    	if($promo_tkts_new){
							                    		
	                    		if(in_array($paid['id'], $promo_tkts_new)){
									echo set_event_currency($paid['price'],$event_details['id']);
								}else{
									if($paid['ticket_status']!=2  ){
										echo set_event_currency($paid['price'],$event_details['id']);
									}															
								}
	                    	}
                    	} else {
	                    	echo set_event_currency($paid['price'],$event_details['id']);
                    	}
					?></td>
                      <td>
                      <?php 
                      		/*flat fee add in view start*/
                      	$paid_ticket_flat_fee =  $site_setting['paid_ticket_flat_fee'];
                      	$payment_gateway_flat_fee =  $currency['payment_gateway_flat_fee'];
                      	$paid['fee']=$paid['fee']+$paid_ticket_flat_fee + $payment_gateway_flat_fee;
		                 /*flat fee add in view  end*/
		                   if($disc_codes){
		                       $promo_tkts = $disc_codes['tickets'];
							   
							   $promo_tkts_new = explode(',',$promo_tkts);
							   
		                    	if($promo_tkts_new && $paid['ticket_status']!= 2){
		                    			
		                    		if(in_array($paid['id'], $promo_tkts_new)){	
		                    			   if (($event_details['event_pass_fees']==1) || ($event_details['event_pass_fees']==3 && $paid['service_fee']==1)) {
                           					   if($disc_codes['disc_perc']!= '' && $disc_codes['disc_perc'] == 100){
				       			 		 			echo Free;
                           					   } else {
                               						echo set_event_currency($paid['fee'],$event_details['id']);
                           					   }	
			                    			   } else {
                               						echo set_event_currency(0,$event_details['id']);
			                    			   }
				                    		} else {
	                               				echo set_event_currency($paid['fee'],$event_details['id']);
				                    		}				                    
				                    	}         	
				                   } elseif($access_codes){  
				                    	$promo_tkts = $access_codes['tickets'];
										
										$promo_tkts_new = explode(',',$promo_tkts);
				                    
				                    	if($promo_tkts_new){
				                    		if(in_array($paid['id'], $promo_tkts_new)){				                    		
				                    			if(($event_details['event_pass_fees']==1) || ($event_details['event_pass_fees']==3 && $paid['service_fee']==1)) {
	                           						echo set_event_currency($paid['fee'],$event_details['id']);
				                    			} else {
	                           						echo set_event_currency(0,$event_details['id']);
				                    			}		
				                    		} else {
				                    			if($paid['ticket_status']!=2){
				                    				echo set_event_currency($paid['fee'],$event_details['id']);
												}
				                    		}			                    
				                    	}	
				                   } else {
			                    		 if(($event_details['event_pass_fees']==1) || ($event_details['event_pass_fees']==3 && $paid['service_fee']==1)){
	                               			echo set_event_currency($paid['fee'],$event_details['id']);
			                    		 } else {
	                               			echo set_event_currency(0,$event_details['id']);
			                    		 }
									}
	                   ?></td>
                      <?php if($event_details['remaining_tickets'] == 1){ ?>
                      <td>
                      <?php  
	                    if($access_codes){	                    	
	                    	$promo_tkts = $access_codes['tickets'];
							$promo_tkts_new = explode(',',$promo_tkts);
	                    	if ($promo_tkts_new){
	                    		if(in_array($paid['id'], $promo_tkts_new)){		
	                    			if($access_codes['uses'] > 0 ){
										$qty = $access_codes['uses'] ;	
										# Calculate available tickets having discount 
		                    	      	$available = $qty  - $access_codes['used_cnt'];
		                    	      	echo $available.'/'.$qty; 
		                   		    #For unlimited uses of discount code
	                    			} elseif($access_codes['uses'] == 0 ){      
	                    	 		 	echo $available.'/'.$paid['qty']; 
	                    			}	
	                    		}else{
									if($paid['ticket_status']!=2 ){ 				                    		 
                    	 				echo $available.'/'.$paid['qty']; 
									}              
								}	  	
	                    	} else{
	                    		if($paid['ticket_status']!=2 ){ 				                    		 
                    	 			echo $available.'/'.$paid['qty']; 
								}                
	                    	}			                    
	                    }
						elseif($disc_codes){
							
							$promo_tkts = $disc_codes['tickets'];
							$promo_tkts_new = explode(',',$promo_tkts);
	                    	if($promo_tkts_new && $paid['ticket_status']!= 2){
	                    		if(in_array($paid['id'], $promo_tkts_new)){		
	                    			if($disc_codes['uses'] > 0){
										$qty = $disc_codes['uses']; 	
											# Calculate available tickets having discount 
			                    	      $available = $qty  - $disc_codes['used_cnt'];
			                    	      echo $available.'/'.$qty;
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

                      <?php 
                      if ($available >= $paid['min_purchase']){ $pur_available=1; }
                        		
                      if($event_details['event_rand_id']==''){ ?>
                      <td>
                      <?php
	            		if($paid['end_sale']=='' || $paid['end_sale'] < $now_date || $paid['start_sale'] > $now_date || $event_details['event_end_date_time'] < $now_date || $is_purchase==2) {
	                        echo N_A;
							$paid_ids = $paid['id'];
							echo '<input type="hidden"  name="ticket_qty['.$paid_ids.']" id="ticket_qty_'.$paid_ids.'"/>';
                		} else {		                                						                                		
                        	if ($paid['min_purchase']=='' || $paid['min_purchase']==0){
                        		$paid['min_purchase']=$site_setting['min_purchase_allowed'];
            				} 
            				// else {
            				// 	$paid['min_purchase']=$site_setting['min_purchase_allowed'];
            				// }
                        	
                        	if ($paid['max_purchase']=='' || $paid['max_purchase']==0){
                        		$paid['max_purchase']=$site_setting['max_purchase_allowed'];
            				}
                        	
                        	if ($available >= $paid['min_purchase']){
                        		$pur_available=1;                        	                        	
                        		if($available >= $paid['max_purchase'] && $paid['max_purchase']>0){
                        			$available = $paid['max_purchase'];
                        		}
	                    ?>
                        <div class="posrel">
                          <select name="ticket_qty[<?php echo $paid['id'] ?>]" id="ticket_qty_<?php echo $paid['id'] ?>" class="select-pad sel-width90" >
                            <option value="0">0</option>
                            <?php 
                                for($i = $paid['min_purchase']; $i<=$available; $i++){
                                	echo '<option value="'.$i.'">'.$i.'</option>';
                                }
                            ?>
                          </select>
                          <a class="tool_tip_class" data-placement="left" data-toggle="tooltip" href="javascript://" title="<?php echo Maximum.' '.Purchase_Tickets.' : '.$available.' '.Minimum.' '.Purchase_Tickets. ' : '.$paid['min_purchase'] ; ?>"></a>
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
	                <?php } ?>
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
	                				
	                				if($code_type == 2){
	                					if(isApplicablePromocode($access_codes, $donation) == 1){
	                						$hidden=1;
	                					}
	                				}
	                				
	                				$available = $donation['qty'] - $donation['used'];
	                				$available = $available - $donation['temp_qty'];
	                				
	                				if($donation['ticket_name'] != ''){		
		                	?>
                    <tr>
					<td>
					<?php 
	                    if ($access_codes){		                    	
	                    	$promo_tkts = $access_codes['tickets'];
	                    	
							$promo_tkts_new = explode(',',$promo_tkts);
	                    	if($promo_tkts){
	                    		if(in_array($donation['id'], $promo_tkts_new)){			                    		
	                    			echo SecureShowData($donation['ticket_name']);
	                    		}else { 
	                    			if($donation['ticket_status']!=2){ 		
	                    				echo SecureShowData($donation['ticket_name']);
                                                                        }
	                    		}
	                    						                    
	                    	}
                	
	                    } else {
		                    if  ($donation['ticket_status']!=2  || $hidden==1){
		                    	echo SecureShowData($donation['ticket_name']);
		                    }		                    
            			}
		                    	
	                    if($donation['hide_description'] != ''){
                                                                                
                            if($donation['ticket_status']!=2  || $hidden==1){ ?>
		                        <a href="javascript:" onclick="if($('#<?php echo $donation['id']; ?>').val()==1){ $('#desc_<?php echo $donation['id']; ?>').hide(); $('#<?php echo $donation['id']; ?>').val(0); this.innerHTML = '<?php echo View_More;?>'; }else{ $('#desc_<?php echo $donation['id']; ?>').show(); $('#<?php echo $donation['id']; ?>').val(1); this.innerHTML = '<?php echo Hide;?>';  }"><?php echo View_More;?></a>
		                        <input type="hidden" id="<?php echo $donation['id']; ?>" value="0" />
		                        <div id="desc_<?php echo $donation['id']; ?>" style="display: none;"> <?php echo SecureShowData($donation['description']);?> </div>
                        <?php } ?>
                        <?php }else{ ?>
                        	<div id="desc_<?php echo $donation['id']; ?>"> <?php echo SecureShowData($donation['description']);?> </div>
                        <?php } ?>
                    </td>
                    <td>
                    <?php 
	                    if($donation['end_sale'] != '' && $donation['end_sale'] !== '0000-00-00 00:00:00') {
	                    	  if ($access_codes){			                    	
		                    	$promo_tkts = $access_codes['tickets'];
								  $promo_tkts_new = explode(',',$promo_tkts);
		                    	if($promo_tkts_new){
		                    		
		                    		if(in_array($donation['id'], $promo_tkts_new)){				                    		
		                    			//echo date($site_setting['date_time_format'],strtotime($donation['end_sale']));			                    			
		                    			echo datetimeformat($donation['end_sale']).' '.timeFormat($donation['end_sale']);
		                    		} else {
		                    			if($donation['ticket_status']!=2 ){ 						                    		
		                    				//echo date($site_setting['date_time_format'],strtotime($donation['end_sale']));
		                    				echo datetimeformat($donation['end_sale']).' '.timeFormat($donation['end_sale']);
										}
									}				                    
		                    	}
		                    	
	                    	  } else {
		                    		//echo date($site_setting['date_time_format'],strtotime($donation['end_sale']));                    
		                    		echo datetimeformat($donation['end_sale']).' '.timeFormat($donation['end_sale']);
	                    	  }
			                    } 
                    ?></td>
                      <td>
                      <?php 
		                    if($access_codes){
		                    	$promo_tkts = $access_codes['tickets'];
								$promo_tkts_new = explode(',',$promo_tkts);
		                    	if($promo_tkts_new){
		                    		if(in_array($donation['id'], $promo_tkts_new)){					                    		
		                    			echo N_A;
		                    		}
		                    	
		                    		if($donation['ticket_status']!=2){
		                    			echo N_A;
		                    		}                  			
		                    	} 				                    	
				                    	
		                    } elseif($disc_codes){			                    	
	                    		$promo_tkts = $disc_codes['tickets'];
								$promo_tkts_new = explode(',',$promo_tkts);
	                    		if($promo_tkts_new && $donation['ticket_status']!= 2){				                    						                    		
	                    				echo N_A;
	                    		}
		                    } else {
				               echo N_A;
		                    } 
	                    ?></td>
                      <td>
                      <?php 
		                    if($access_codes){ 
		                    	$promo_tkts = $access_codes['tickets'];
								$promo_tkts_new = explode(',',$promo_tkts);
		                    	if($promo_tkts_new){
		                    		if(in_array($donation['id'], $promo_tkts_new)){				                    		
	                    				echo N_A;
		                    		}
		                    		
			                    	if($donation['ticket_status']!=2){
		                    			echo N_A;
		                    		}                  			
		                    	} 				                    	     	
		                    } elseif($disc_codes){			                    	
	                    		$promo_tkts = $disc_codes['tickets'];
								$promo_tkts_new = explode(',',$promo_tkts);
	                    		if($promo_tkts_new && $donation['ticket_status']!= 2){				                    						                    		
	                    				echo N_A;
	                    		}
		                    } else {
				               echo N_A;
		                    } 
	                    ?></td>
                      <?php if($event_details['remaining_tickets'] == 1){ ?>
                      <td>
                      <?php  
		                    if($access_codes){	                    	
		                    	$promo_tkts = $access_codes['tickets'];
								$promo_tkts_new = explode(',',$promo_tkts);
		                    	if ($promo_tkts_new){
		                    		if(in_array($donation['id'], $promo_tkts_new)){		
		                    			if($access_codes['uses'] > 0 ){
											$qty = $access_codes['uses'] ;	
											# Calculate available tickets having discount 
			                    	      	$available = $qty  - $access_codes['used_cnt'];
			                    	      	echo $available.'/'.$qty; 
			                   		    #For unlimited uses of discount code -->	
		                    			} elseif($access_codes['uses'] == 0 ){      
		                    	 		 	echo $available.'/'.$donation['qty']; 
		                    			}	
		                    		}else{
										if($donation['ticket_status']!=2 ){ 	
											echo $available.'/'.$donation['qty']; 
										}
									}	  	
		                    	} else{
		                    		if($donation['ticket_status']!=2  || $hidden==1 ){ 		 				                    		 
	                    	 			echo $available.'/'.$donation['qty']; 
									}                
		                    	}			                    
		                    } else {
                    	 		echo $available.'/'.$donation['qty']; 	                    
		                    }	
		                ?></td>
                      <?php } ?>
                      <td>
                      <?php				
                    		if($donation['end_sale']=='' || $donation['end_sale'] < $now_date || $donation['start_sale'] > $now_date || $event_details['event_end_date_time'] < $now_date  || $is_purchase==2) {
							$donation_id = $donation['id'];
                                echo N_A;
								echo '<input type="hidden"  name="ticket_qty['.$donation_id.']" id="ticket_qty_'.$donation_id.'"/>';
								echo '<input type="hidden"  name="ticket_price['.$donation_id.']" id="ticket_price_'.$donation_id.'"/>';
                    		} else {		                                		
                            	if ($available > 0){
                            		$pur_available=1;
                            		$donation_id = $donation['id'];
                            	
                            		echo Enter_Amount.'('.getCurrencySymbol($event_details['id']).')<br /> 
                            		<input type="hidden"  name="ticket_qty['.$donation_id.']" id="ticket_qty_'.$donation_id.'"/>'; 
                            		$d_name = "ticket_price[".$donation_id."]";
                            		$d_id = "ticket_price_".$donation_id;
                            		?>
                            		<input type="text"  name="<?php echo $d_name; ?>" id="<?php echo $d_id; ?>" onkeyup="if(this.value > 0){  }else{ this.value=''; }"/>
                				<?php } else {
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
                <input type="hidden" name="aff_id" id="aff_id" value="<?php echo $msg;?>" />
                <input type="hidden" name="affu_id" id="affu_id" value="<?php echo $affu_id;?>" />
                <input type="hidden" name="event_id" id="event_id" value="<?php echo $event_details['id']; ?>" />                                
                <input type="hidden" name="return_url" id="return_url" value="<?php if($msg != '') { echo str_replace('/'.$msg,'',getcurrenturl()); } else { echo getcurrenturl();}?>" />

                
                <?php 				                
                if($code_type==1){ ?>
	                <input type="hidden" name="promo_code_id" id="promo_code_id" value="<?php echo $disc_codes['id'];?>" />
	                <input type="hidden" name="promo_code_amt" id="promo_code_amt" value="<?php echo $disc_codes['disc_amt'];?>" />
	                <input type="hidden" name="promo_code_perc" id="promo_code_perc" value="<?php echo $disc_codes['disc_perc'];?>" />
			<?php } else if($code_type==2){ ?>
    	            <input type="hidden" name="promo_code_id" id="promo_code_id" value="<?php echo $access_codes['id'];?>" />               
			<?php }	?>
				<?php if($this->uri->segment('2')!='theme'){ ?></form><?php }?> 
                <?php if($pur_available==1) { ?>
                
              	</div>
              <?php  /*if(check_user_authentication()=='')
					{                 	
        				$page_url=base64_encode(getcurrenturl());
   					?>
						<div class="form-group clearfix MarB5 fr"> <strong><?php echo Login_first_to_buy_tickets; ?></strong> <a href="<?php echo site_url('user/login/'.$page_url); //$login_url;?>"  class="btn-event"><?php echo Login;?></a> </div>
						<div class="clear"></div>
              <?php } 
   					else 
   					{ */?>
              			<div class="form-group clearfix MarB5 fr">
              			<?php if(check_user_authentication()==''){ ?>
              				<a href="javascript:" id="buy_btn" onclick="submit_check_form();" ondblclick="this.preventDefault();" class="btn-event"><?php echo REGISTER;?></a> 
						<?php }else{ ?>
							<!-- <a href="javascript:" id="buy_btn" onclick="submit_check_form();" ondblclick="this.preventDefault();" class="btn-event"><?php echo Buy_Tickets;?></a>  -->
							<?php if($event_details['event_rand_id']==''){ ?>
              					<a href="javascript:" id="buy_btn" onclick="submit_check_form();" ondblclick="this.preventDefault();" class="btn-event"><?php echo Buy_Tickets;?></a> 
              				<?php }else{ ?>              				
              					<a target="_blank" href="<?php echo site_url('seat_plan/seat/'.$event_details['id'].'?step=step3&plan_id='.$event_details['id'].'&page=view'); ?>" id="buy_btn" ondblclick="this.preventDefault();" class="btn-event"><?php echo SELECT_SEAT;?></a> 
              				<?php } ?>
						<?php } ?>              				
              			</div>
              			<?php  $promotional_codes = getAllPromotionalCode($event_details['id']); ?>              
              			<?php 
                            $promo = $this->input->get('promo');
                            if($promotional_codes && $is_purchase==1 && $code_type==0 && $protect==1)
                            {?>
								<div> <a href="javascript:void(0);" onclick="show_promotional_code();" id="promotional_text">Click here to enter promotional code</a> </div>
								<div class="event_detail" id="sdsds" style="display: none;">
                				<?php 				               
					                if($code_type==0 && count($promotional_codes) > 0){
					                		 
					                	$attributes = array('name'=>'promocode','id'=>'promocode','class'=>'event-title','method'=>'get', 'onClick'=>'return submit_check_promotional_code();');
										echo form_open('event/view/'.$event_url_link,$attributes);	
										
				                ?>                
                <div class="form-group clearfix">
                  <div class="col-sm-4 col-xs-12">
                    <label><?php echo Enter_promotional_code_here_if_you_have; ?><span>&#42;</span></label>
                 </div>
                  <div class="col-sm-4 col-xs-12">
                    <input type="text" name="promo" id="promo" value=""  />
                    </div>
                  <div class="col-sm-2 col-xs-12 fr">
                    <input type="submit"  value="Apply" class="btn-event"/>
                  </div>
                </div>
                <div class="clear"></div>
           				<?php if($this->uri->segment('2')!='theme'){ ?> </form> <?php } ?>
                <?php }    ?>
              </div>
              <?php }?>
              <div class="clear"></div>
              <?php //} 
				} else { ?>
              <?php echo No_tickets_available_for_purchase_now;?> </div>
            <?php } } else { ?>
            <?php echo No_tickets_available_for_purchase_now;?> </div>
          <?php } } else {?>
          <div class="event_detail pad3 marT20">
            <?php
				$attributes = array('name'=>'passwordform','id'=>'passwordform','class'=>'event-title');
				echo form_open('event/view/'.$event_url_link.'/'.$msg.'/'.$affu_id,$attributes);	
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
                        <input type="password" id="event_password" name="event_password" placeholder="<?php echo Enter_Password;?>" value="" />
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
          <?php } ?>
        </div>

       
       
      </div>
     
       
       
      </div>
    </div>
    <?php /*</div><!-- End container -->*/?>
  
  </div>
  </div>
  </div>
  <!-- End container --> 
</section>
