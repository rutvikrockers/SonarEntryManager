<script type="text/javascript">
$(document).ready(function () {
	todayDate = "<?php echo date('Y-m-d'); ?>";
	var dirty = false;
	window.onbeforeunload = function() {
		if (dirty) {
	    	return 'Are you sure you want to navigate away from this page?';
	    }
	};
	$('#create_event_form').change(function(){
		dirty = true;
	});
});
</script>
<?php 

$address='';
$min_purchase_allowed = $site_setting['min_purchase_allowed'];
$max_purchase_allowed = $site_setting['max_purchase_allowed'];
$show_seat = true;
if($site_setting['ticket_type']=="0"){ $show_seat = false; }

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
<script>
	var base_url = "<?php echo base_url();?>";
	var site_url = "<?php echo site_url();?>";

	var validat_js_enter_valid_zip= "<?php echo Enter_valid_zipcode; ?>";
	var validat_js_valid_zip = "<?php echo Valid_zipcode; ?>";
	var validat_js_organizer_host_required= "<?php echo organizer_host_required; ?>";
	var validat_js_organizer_description_required = "<?php echo organizer_description_required; ?>";
	
	var validat_js_event_title_req="<?php echo Event_title_field_is_required;?>";
	var validat_js_venue_name_req="<?php echo Venue_name_field_is_required;?>";
	var validat_js_street_add_req="<?php echo Street_address_field_is_required;?>";
	var validat_js_event_start_date_req="<?php echo Event_start_date_is_required;?>";
	var validat_js_event_start_time_req="<?php echo Event_start_time_is_required;?>";
	var validat_js_event_end_date_req="<?php echo Event_end_date_is_required;?>" ;
	var validat_js_event_end_time_req="<?php echo Event_end_time_is_required;?>" ;	
	var validat_js_end_date_min_start_date="<?php echo Event_end_date_should_be_minimum_3_hours_greater_than_event_start_date; ?>";
	var validat_js_end_date_greater_start_date="<?php echo Event_end_date_should_be_greater_than_event_start_date; ?>";
	var validat_js_upload_logo_req="<?php echo Event_Logo_is_required;?>";
	var validat_js_event_details_req="<?php echo Event_details_is_required;?>";
	var validat_js_org_host_req="<?php echo Organizer_is_required;?>";
	var validat_js_ticket_name_req="<?php echo Ticket_name_field_is_required_for_all_tickets;?>";
	var validat_js_ticket_qty_req="<?php echo Ticket_quantity_Field_is_required_for_all_tickets;?>";
	var validat_js_ticket_price_req="<?php echo Ticket_price_Field_is_required_for_all_paid_tickets;?>";
	var validat_js_ticket_start_date_not_grater_end_date="<?php echo Ticket_start_sale_date_shloud_not_be_greater_than_end_sale_date_for_all_tickets;?>";
	var validat_js_ticket_end_date_not_grater_end_date="<?php echo Ticket_end_sale_date_shloud_not_be_greater_than_event_end_date_for_all_tickets?>"	;
	var validat_js_valid_alpha_numeric="<?php echo Type_a_valid_alpha_numeric_data;?>";
	var validat_js_valid_link ="<?php echo Please_enter_a_valid_link;?>";
	var validat_js_min_ticket ="<?php echo Minimum_one_Ticket_Required_to_Make_Event_Live;?>";
	var validat_js_Password_is_required ="<?php echo Password_is_required;?>";
	var validat_js_Password_between_characters ="<?php echo Password_should_be_between_characters;?>";
</script>
<?php

    
    $first_checked="";
    $second_checked="";
    $third_checked="";

    if($event_pass_fees==1){
        $first_checked = 'checked';
    }else if($event_pass_fees==2){
        $second_checked = 'checked';
    }else if($event_pass_fees==3){
        $third_checked = 'checked';
    }else{
        $first_checked = 'checked';
    }
?>
        
<?php $this->load->view('default/common/dashboard-header'); ?>  
<?php
   		if($error!=''){ ?>
		 	<div class="alert alert-danger message"><?php echo $error; ?></div>
             <?php
		}
?> 
<?php if($success_msg){
?>
<div class="alert alert-success message"><?php echo $success_msg; ?></div>
<?php }?>
<?php if($error_msg){
?>
<div class="alert alert-danger message"><?php echo $error_msg; ?></div>
<?php }?>
<?php if($this->session->flashdata('error_msg')){
?>
<div class="alert alert-danger message"><?php echo $this->session->flashdata('error_msg'); ?></div>
<?php }?>
	   <div class="alert alert-danger message" id="client_error" style="display: none;"><span class='error_span'></span></div>
     <section>                  
            <div class="container marTB50">
                
                <?php 
					$attributes = array('id'=>'user_picture','name'=>'user_picture','enctype'=>'multipart/form-data','method'=>'post','accept-charset'=>'UTF-8');
					echo form_open_multipart('event/uploading', $attributes);
				?>
				
				  <div style="display:none" id="edit_user_picture_file"> </div>
				</form>

                <?php 
					$attributes = array('id'=>'event_images','name'=>'event_images','enctype'=>'multipart/form-data','method'=>'post','accept-charset'=>'UTF-8');
					echo form_open_multipart('event/uploading_images/'.$event_id, $attributes);
				?>
				
				  <div style="display:none" id="edit_event_images_file"> </div>
				</form>
				    <?php 
					$attributes = array('id'=>'event_audio','name'=>'event_audio','enctype'=>'multipart/form-data','method'=>'post','accept-charset'=>'UTF-8');
					echo form_open_multipart('event/audio_uploading/'.$event_id, $attributes);
				?>
				
				  <div style="display:none" id="edit_event_audio_file"> </div>
				</form>

				<?php
					if($event_id){
						$event_create_url = 'event/edit_event/'.$event_id;
					}else{
						$event_create_url = 'event/create_event';
					}
					$attributes = array('name'=>'create_event_form','id'=>'create_event_form','class'=>'event-title');
					echo form_open_multipart($event_create_url,$attributes);	
				?>
                   
                <!-- 1st part--> 
           
           <div class="row"> 
           
           
                <div class="event-webpage col-lg-12">
                    <div class="red-event clearfix">
                    	<h4 class="pull-left"><span class="titleNum">1</span> <?php echo ADD_YOUR_EVENT_DETAILS; ?></h4>  
                        <div class="expertTip">
                            <a href="<?php echo site_url('event/tip/Expert_Tip');?>" class="mfPopup" id="expert_tips"><?php echo Expert_Tips; ?></a>
                         </div>
                     </div>
                   
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                
           
                <div class="col-lg-12 clearfix mb">
                	<div class="event-detail pt">
                            <div class="form-group clearfix">
                            	<div class="col-sm-3 col-xs-12 lable-rite">
                            		<label><?php echo Event_Title; ?><span>&#42;</span></label>
                            	</div>
                            	<div class="col-sm-8 col-xs-12">
                            	<?php $max = '75'; if($event_title!=''){ $max = 75 - strlen($event_title); } ?>
                            		<input type="text" autocomplete="off" value="<?php echo SecureShowData($event_title);?>" name="event_title" id="event_title" placeholder="<?php echo Give_your_event_a_short_distinct_name; ?>" onkeyup="limitText(this.form.event_title,this.form.countdown,75);" onkeydown="limitText(this.form.event_title,this.form.countdown,75);">
                                    <p class="fromText"><?php echo Maximum_75_characters; ?> : <input type="text" value="<?php echo $max; ?>" disabled="disabled" name="countdown" class="countdown"><?php echo characters_left; ?></p>
                                    <span id="eventtitleInfo"></span>
                            	</div>
                        	</div>
                            
                            <div id="add_div" style="display:<?php if($online_event_option == 1){ echo 'none'; } else { echo 'block'; }?>;">
	                       
	                          <div id='venue_list' class="form-group clearfix">
	                            	<div class="col-sm-3 col-xs-12 lable-rite">
	                            		<label><?php echo Venue; ?><span>&#42;</span></label>
	                            	</div>

	                            	<div  class="col-sm-8 col-xs-12">
	                            		<select id="venue_id" name="venue_id" onchange="getMap(this);"> 
	                            		<option value=""><?php echo SELECT_VENUE;?></option>
	                            		<?php
	                            		foreach ($user_venues as $user_venue) 
	                            		{
											$address='';
											$event_venue=$user_venue;

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
											            $address=$venue_add1;
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
	                            		?>	
	                            			<option value="<?=$user_venue['id']?>" <?php if($venue_id==$user_venue['id']) { echo "selected='selected'"; } ?>><?=SecureShowData($user_venue['name']).', '.SecureShowData($address)?></option>
	                            			<?php

	                            			}?>	
	                            		</select>
                                        <div class="add-new mt10">
                                            <ul>
                                                <li class="comment"><a onclick="show_div('New_venue','venue_list','1');" href="javascript://"><i class="glyphicon glyphicon-map-marker"></i> <?php echo Create_New_Venue; ?> </a></li>
                                                <li> | </li>
                                                <li class="comment"><a onclick="set_online('online_event','add_div','1');" href="javascript://"><i class="glyphicon glyphicon-globe"></i> <?php echo online_event; ?></a></li>
                                            </ul>
	                            		</div>

	                            	</div>
	                            	
	                            	</div>
	                            
	                           <div id='New_venue' class="form-group clearfix">
	                            	<div class="col-sm-3 col-xs-12 lable-rite">
	                            		<label><?php echo Venue; ?><span>&#42;</span></label>
	                            	</div>
	                            	<div class="col-sm-8 col-xs-12">
	                            		<input type="text" value="" placeholder="Venue Name" id="vanue_name" name="venue_name">
	                            		<span id="vanuenameInfo"></span>
	                            		<p class="comment">  <b><i class="glyphicon glyphicon-map-marker"></i><a onclick="show_div('venue_list','New_venue','0');" href="javascript://"><?php echo Already_Venue; ?> </a></b></p>
	                            		<p class="comment"> <b><a onclick="set_online('online_event','add_div','1');" href="javascript://"> <?php echo online_event; ?></a></b></p>
	                            	
	                            	
	                        	</div>
	                        	 <div id='location' class="form-group clearfix">
	                            	<div class="col-sm-3 col-xs-12 lable-rite">
	                            		<label><?php echo Location; ?><span>&#42;</span></label>
	                            	</div>
	                       <div class="col-sm-8 col-xs-12">
	                            		<input type="text" onfocus="set_address_value()" value="<?php echo SecureShowData($street_address1); ?>" placeholder="<?php echo Specify_where_your_event_will_happen; ?>" autocomplete="off" name="street_address1" id="street_address1" >
	                            		<p class="comment"><a  onclick="show_div('venue_address_div','location','');"href="javascript://"><?php echo Cant_find_your_location;?></a></p>
	                            		<span id="streetaddressInfo"></span>
	                            	</div>


	                           
	                               </div>

	                            </div>
	                   <div id='venue_address_div' class="form-group clearfix">
						<div class="col-sm-3 col-xs-12 lable-rite">
                        	<label><?php echo Address; ?></label>
                        </div>
                           <div class="col-sm-8 col-xs-12">
                        	<input type="text" onkeypress="set_address_value()" onfocus="set_address_value()" placeholder="<?php echo Address_Line; ?> 1" id="sublocality_level_2" name="venue_add1" value='<?php if($event_id) { echo SecureShowData($venue_add1); } ?>'>
                        	<span class="comment" id="address1errInfo"></span><br /><br />
                        	<input type="text" onkeypress="set_address_value()" onfocus="set_address_value()" placeholder="<?php echo Address_Line; ?> 2" id="sublocality_level_1" name="venue_add2" value='<?php if($event_id) { echo SecureShowData($venue_add2); } ?>'><br /><br />
                        	<input type="text" onkeypress="set_address_value()" onfocus="set_address_value()" onkeyup="set_address_value()" placeholder="<?php echo City; ?> " id="locality" name="venue_city" value='<?php if($event_id) { echo SecureShowData($venue_city); } ?>' ><br /><br />
                        	<input type="text" onkeypress="set_address_value()" onfocus="set_address_value()" placeholder="<?php echo 'State'; ?>" id="administrative_area_level_1" name="venue_state" value='<?php if($event_id) { echo SecureShowData($venue_state); } ?>'  style="width:38%;">
                        	<input type="text" onkeypress="set_address_value()" onfocus="set_address_value()" placeholder="<?php echo "Country"; ?>" id="country" name="venue_country" style="width:38%;" value='<?php if($event_id) { echo SecureShowData($venue_country); } ?>'>
                        	<br /><br />
                        	<input type="text" onkeypress="set_address_value()" onfocus="set_address_value()" placeholder="<?php echo Zip_Code; ?>" id="postal_code" name="venue_zip" style="width:60%;" value='<?php if($event_id) { echo SecureShowData($event_venue['venue_zip']); } ?>'>
                        	<span id="addresszipInfo" class="comment" style="margin-left: 41%;"></span>
                        	<p class="comment">  <b><a onclick="show_div('location','venue_address_div','');" href="javascript://"><?php echo 'Reset Address'; ?> </a></b> ? </p>
                        </div>
                    </div>
	                <div id="div_replace">
	                	<div id='venue_location'  class="form-group clearfix">

                       			 <div class="col-sm-3 col-xs-12 lable-rite">
                                        <label><?php echo Location; ?><span>&#42;</span></label>
                          		</div>
                          		<div class="col-sm-8 col-xs-12">
                                        <input type="text" value="<?=($venue_id!='')?SecureShowData($address):'';?>" placeholder="<?php echo Specify_where_your_event_will_happen; ?>" autocomplete="off" name="venue_location_field" id="venue_location_field"  disabled >
                                      
                                        <span id="streetaddressInfo"></span>
                                </div>
                               
						</div>

	                
                  	 </div>
	                            <div class="form-group clearfix">
	     
	                                <div class="col-sm-8 col-sm-offset-3 mapimg clearfix" id="map_div">
	                               	 	<div id='map_canvas' style='width: 100%; height: 200px;'> </div>
	                                </div>
	                                
	                        	</div>
                            </div>

                            <div class="col-sm-8 col-sm-offset-3" id="show_on_map_div" <?php if($online_event_option==1){ echo 'style="display: none;"';} ?>>
	                                <div class="radio padL0">
	                                  <label>
	                                    <input type="checkbox" name="show_on_map" id="show_on_map" value="1" <?php if($show_on_map ==1) { echo 'checked="checked"'; }?>>
	                                   <?php echo SHOW_MAP_ON_EVENT_PAGE; ?>
	                                  </label>
	                                </div>
	                                </div>
                            
                            <div id="online_event" style="display:<?php if($online_event_option == 0){ echo 'none'; } else { echo 'block'; }?>;">
                            	<div class="form-group clearfix">
	                            	<div class="col-sm-3 col-xs-12 lable-rite">
	                            		<label><?php echo Location; ?><span>&#42;</span></label>
	                            	</div>
	                            	<div class="col-sm-8 col-xs-12">
	                            		<input type="text" value="<?php echo online_event_message; ?>" id="street_address2" name="street_address2" readonly="readonly" class="readonly">
	                            		<p class="fromText"><a onclick="set_online('add_div','online_event','0');" href="javascript://"> + <?php echo Add_an_address;?></a></p>
	                            	</div>
	                        	</div>
                            </div>
                            <input type="hidden" name="online_event_option" id="online_event_option" value="<?php echo $online_event_option;?>">
                            <input type="hidden" name="new_address" id="new_address" value=''>
                            <input type="hidden" name="total_ticket_cnt" id="total_ticket_cnt" value=''>
							<script type="text/javascript">
								function set_update_date_as_per_time_zone(me) {
									if($(me).val()) {
										show_loader();
										$.ajax({
											type: "POST",
											data: '[]',
											dataType: 'json',
											url: "<?php echo site_url('event/set_time_zone');?>/"+$(me).val()+"/<?php echo $event_id; ?>",
											success: function(resp) {
												if(resp.today != resp.old_date) {
													todayDate = resp.today;
													$('#event_start_date').datepicker("remove");
													$('#event_end_date').datepicker("remove");
													$('#event_start_date').datepicker({format: "yyyy-mm-dd", startDate : resp.today});
													$('#event_end_date').datepicker({format: "yyyy-mm-dd", startDate : resp.today});

													// newDate = new Date(resp.today);
													// olddate = $('#event_start_date').val();
													// if(olddate) {
													// 	selectedDate = new Date(olddate);
													// 	if(selectedDate < newDate) {
													// 		$('#event_start_date').val(resp.today);
													// 	}
													// }

													var dateval = $("#event_start_date").val();
													if(dateval) {
													} else {
														dateval = resp.today;
													}
													$(".free_start_sale_date").each(function() {
														$(this).datepicker("remove");
														$(this).datepicker({ format: "yyyy-mm-dd", startDate : resp.today, endDate : dateval});
													});
													$(".free_end_sale_date").each(function() {
														$(this).datepicker("remove");
														$(this).datepicker({ format: "yyyy-mm-dd", startDate : resp.today, endDate : dateval});
													});
													$(".paid_start_sale_date").each(function() {
														$(this).datepicker("remove");
														$(this).datepicker({ format: "yyyy-mm-dd", startDate : resp.today, endDate : dateval});
													});
													
													$(".paid_end_sale_date").each(function() {
														$(this).datepicker("remove");
														$(this).datepicker({ format: "yyyy-mm-dd", startDate : resp.today, endDate : dateval});
													});
													$(".donation_start_sale_date").each(function() {
														$(this).datepicker("remove");
														$(this).datepicker({ format: "yyyy-mm-dd", startDate : resp.today, endDate : dateval});
													});
													$(".donation_end_sale_date").each(function() {
														$(this).datepicker("remove");
														$(this).datepicker({ format: "yyyy-mm-dd", startDate : resp.today, endDate : dateval});
													});
												}
												hide_loader();
											}
										});
									}
								}
							</script>
							<div class="form-group clearfix">
								<div class="col-sm-3 col-xs-12 lable-rite">
									<label><?php echo TIME_ZONE; ?></label>
								</div>
								<div class="col-sm-8 col-xs-12">
								<?php if($event_time_zone == 0){ $event_time_zone=$site_setting['site_timezone']; } ?>
									<select id="event_time_zone" name="event_time_zone" class="select-pad" onchange="set_update_date_as_per_time_zone(this);">
										<option value="">-- <?php echo Select_Timezone;?> --</option>
										<?php
										foreach($gettimezoneArray as $key => $val){
											$select=''; 
											if($event_time_zone == $key) { $select = 'selected="selected"'; }
											echo '<option value="'.$key.'" '.$select.'>'.SecureShowData($val).'</option>';	
										}
										?>
									</select>
								</div>
						    	<div class="col-sm-8 col-sm-offset-3">
						    		<p class="fromText"><a class="mfPopupIn" href="#timezone_box" id="time_zone_event"><?php echo TIMEZONE_DATE_SETTINGS; ?></a></p>

						            <div class="radio padL0" style="display: none;">
						              <label>
						                <input <?php if($event_repeat != '' && $event_repeat != 0){  echo 'checked="checked"'; }?> type="checkbox" name="event_repeat_set" id="event_repeat_set" value="1" onclick="show_repeat_div('event_repeat_set','repeat_div');">
						               <?php echo This_Event_Repeats ; ?>
						              </label>
						            </div>
						        </div>
							</div>
                            <div class="form-group clearfix" >
                            	<div class="col-sm-3 col-xs-12 lable-rite">
                            		<label><?php echo Date_Time; ?><span>&#42;</span></label>
                            	</div>
                            	<div id="manual_date_div" class="clearfix">
	                            	<div class="col-sm-2 col-xs-12 m10 mb10">
	                            		<input type="text" placeholder="<?php echo EVENT_START_DATE; ?>" value="<?php echo convertDate($event_start_date);?>" name ="event_start_date" id="event_start_date" onchange="set_end_date_equal_start();" readonly="readonly" class="datepicker">
	                            		<span id="eventstartdateInfo"></span>
	                            	</div>
	                                <div class="col-sm-2 col-xs-12 m10 mb10">
	                            		<input type="text" placeholder="<?php echo EVENT_START_TIME; ?>" value="<?php echo $event_start_time;?>" name ="event_start_time" id="event_start_time" onchange="set_end_date_equal_start();" class="timepicker">
	                            		<span id="eventstarttimeInfo"></span>
	                            	</div>
	                                <div class="col-sm-2 col-xs-12 m10 mb10">
	                                	<input type="text" placeholder="<?php echo EVENT_END_DATE; ?>" value="<?php echo convertDate($event_end_date);?>" name="event_end_date" id="event_end_date" onchange="set_end_date_equal_ticket_date();" readonly="readonly" class="datepicker">
	                                	<span id="eventenddateInfo"></span>
	                            	</div>
	                                <div class="col-sm-2 col-xs-12">
	                            		<input type="text" placeholder="<?php echo EVENT_END_TIME; ?>" value="<?php echo $event_end_time;?>" name="event_end_time" id="event_end_time" onchange="set_end_date_equal_ticket_date();" class="timepicker" >
	                            		<span id="eventendtimeInfo"></span>
	                            	</div>
	                            	<input type="hidden" class="datepicker" name="temp_end_date" id="temp_end_date" value=''>
                            	</div>
                            	<div id="cust_date_div" style="display:none;" class="radio"><?php echo Custom_dates_and_times_are_set_for_this_event;?></div>
                            	
                            	<div class="col-sm-8 col-sm-offset-3">
	                                <div class="radio padL0" style="display: none;">
	                                  <label>
	                                    <input <?php if($event_repeat != '' && $event_repeat != 0){  echo 'checked="checked"'; }?> type="checkbox" name="event_repeat_set" id="event_repeat_set" value="1" onclick="show_repeat_div('event_repeat_set','repeat_div');">
	                                   <?php echo This_Event_Repeats ; ?>
	                                  </label>
	                                </div>
	                            </div>
                        	</div>
                        	
							
							<div style="display: none ;">
								<input id="event_repeat_text" type="hidden" name="event_repeat_text" value="<?php echo $event_repeat_text; ?>'>
								<input id="event_repeat" type="hidden"  name="event_repeat" value="<?php echo $event_repeat; ?>">
								<input id="daily" type="hidden" name="daily" value="<?php echo $daily; ?>">
								<input id="weekly" type="hidden"  name="weekly" value="<?php echo $weekly; ?>">
								<input id="monthly" type="hidden" name="monthly" value="<?php echo $monthly; ?>">
								<input id="other_specific" type="hidden" name="other_specific" value="<?php echo $other_specific; ?>">
							</div>

                           <!-- event image hide as per client requirement-->
                             <div class="form-group clearfix hide">
                            	<div class="col-sm-3 col-xs-12 lable-rite">
                            		<label><?php echo Event_Image; ?><span>&#42;</span></label>
                            	</div>
                                
                                <div class="col-sm-9 p0">
                                
                                <div class="col-sm-1 col-xs-12 bimg img-icon-alD mrgBt10" id="picture_file_field_display1">
                                	<?php 
                                	$image = base_url().'images/bimage.png';
                                	if($event_logo != '' && file_exists(base_path().'upload/event/thumb/'.$event_logo)){ 
                                		$image = base_url().'upload/event/thumb/'.$event_logo;
                                	}
                                	?>
                                	
                                	
                                	<img src="<?php echo $image;?>" alt=" " height=" " width=" ">
                                </div>
                                
                                 <div class="col-sm-1 col-xs-2 " id="progressbar"  style="display:none;">
                                	<img src="<?php echo base_url();?>images/bx_loader.gif" alt="" height="32" width="32"/>
                                </div>
                                
                                
                            	<div class="col-sm-5 col-xs-6 m10 upload1 img-Tfield-alD" >
                            		<input type="text" readonly="readonly" id="event_logo_name"  value="<?php echo $event_logo;?>" Placeholder=""  >	
                            		<p id="err1" class="error" ></p>
                            		<input type="hidden" name="event_logo" id="event_logo" value="<?php echo $event_logo;?>" />
                            	</div>
                            	<div class="pull-left clearfix browse1">
                                	<div class="upload_img upload">
                                  		<a href="javascript://" class="btn btn-event">Browse</a>
                                  		<input type="file" onchange="return filename(this.value);" name="upload_datafile" id="upload_datafile" class="uploads upload_user_picture">
                                   	</div>
                               </div>

                                <div class="col-sm-9 col-xs-12">
                                	<p class="fromText"><?php echo imagen_message_2MB; ?></p>
                                </div>
                                </div>
                        	</div>
                        	 <div class="form-group clearfix ">
                            	<div class="col-sm-3 col-xs-12 lable-rite">
                            		<label><?php echo IMAGE_FLYER; ?><span>&#42;</span></br>(<?php echo MAX_TWO_IMAGES; ?>)</label>
                            	</div>
                                <?php if($event_images){?>
                               <script type="text/javascript">
                               	  $(document).ready(function(){
						             		var img_jeson='<?php echo json_encode($event_images);?>';
						             		var images=  jQuery.parseJSON(img_jeson);
						             		images_update(images);
						             		
            					 });	
                               </script>
                                <?php } ?>

                                <div class="col-sm-9 p0">
                                <div class="col-sm-1 col-xs-2 " id="progressbar_image"  style="display:none;">
                                	<img src="<?php echo base_url();?>images/bx_loader.gif" alt="" height="32" width="32"/>
                                </div>
                                <div id='image_file_field_display1'>
                                	
	                                <div class="col-sm-1 col-xs-3 bimg img-icon-alD mrgBt10" id="image_file_field_0">
	                                	<?php 
	                                	$image = base_url().'images/bimage.png';
	                                	
	                                	?>
	                                	
	                                	
	                                	<img src="<?php echo $image;?>" alt=" " height=" " width=" ">
	                                </div>
	                                
	                                
	                                <div class="col-sm-1 col-xs-9 bimg img-icon-alD mrgBt10" id="image_file_field_1">
	                                	<?php 
	                                	$image = base_url().'images/bimage.png';
	                                	
	                                	?>
	                                	
	                                	
	                                	<img src="<?php echo $image;?>" alt=" " height=" " width=" ">
	                                </div>
                                </div>
                                
                                
                                
                            	<div class="col-sm-4 col-xs-6 m10 upload1 img-Tfield-alD" >
                            		<input type="text" readonly="readonly" id="flyer_images_text"  value="" Placeholder=""  >	
                            		<p id="err_images" class="error" ></p>
                            		<input type="hidden" name="flyer_images" id="flyer_images" value="" />
                            	</div>
                            	<div class="pull-left clearfix browse1">
                                	<div class="upload_imgs upload">
                                  		<a href="javascript://" class="btn btn-event"><?php echo BROWSE;?></a>
                                  		<input type="file" onchange="" name="upload_images" id="upload_images" class="uploads upload_event_images">
                                   	</div>
                               </div>

                                <div class="col-sm-9 col-xs-12">
                                	<p class="fromText"><?php echo imagen_message_2MB; ?></p>
                                </div>
                                </div>
                        	</div>
                            
                             <div class="form-group clearfix ">
                            	<div class="col-sm-3 col-xs-12 lable-rite">
                            		<label><?php echo EVENT_AUDIO; ?></label>
                            	</div>
                                
                                <div class="col-sm-9 p0">
                                
                                <div class="col-sm-1 col-xs-12 bimg img-icon-alD mrgBt10" id="audio_img">
                                	<?php 
                                	$image = base_url().'images/bimage_audio.png';
                                	
                                	?>
                                	
                                	
                                	<img src="<?php echo $image;?>" alt=" " height=" " width=" ">
                                </div>
                                
                                 <div class="col-sm-1 col-xs-2 " id="progressbar_audio"  style="display:none;">
                                	<img src="<?php echo base_url();?>images/bx_loader.gif" alt="" height="32" width="32"/>
                                </div>
                                
                                
                            	<div class="col-sm-5 col-xs-6 m10 upload1 img-Tfield-alD" >
                            		<input type="text" readonly="readonly" id="event_audio_name"  value="" Placeholder=""  >	
                            		<p>You can upload maximum 100MB file<p>
                            		<p id="err_audio" class="error" ></p>
                            	</div>
                            	<div class="pull-left clearfix browse1">
                                	<div class="upload_audio upload">
                                  		<a href="javascript://" class="btn btn-event"><?php echo BROWSE;?></a>
                                  		<input type="file"  name="upload_audio_file" id="upload_audio_file" class="uploads upload_event_audio">
                                   	</div>
                               </div>

                               
                                <div class="col-sm-9 col-xs-12" id="audio_div">
                                <?php if($audio){ ?>
									<audio loop controls><source src="<?php echo  base_url('upload/event/audio');?>/<?php echo SecureShowData($audio['audio_name']);?>" type="audio/mpeg"></audio>
								  <a href="javascript:"  onclick="remove_audio();" style=" text-decoration: underline;"> <?php echo REMOVE;?> </a>
								  <?php } ?>
                                </div>
                                </div>
                                 <div class="col-sm-8 col-sm-offset-3 col-xs-12" id="auto_play_audio" <?php if(!$audio){ echo 'style="display: none;"';} ?>>
	                                <div class="radio padL0">
	                                  <label>
	                                    <input type="checkbox" name="auto_play" id="auto_play" value="1">
	                                   <?php echo AUTO_PLAY_AUDIO; ?>
	                                  </label>
	                                </div>
	                                </div>
                        	</div>
                            <div class="form-group clearfix">
                            	<div class="col-sm-3 col-xs-12 lable-rite">
                            		<label><?php echo Evento_Description; ?><span>&#42;</span></label>
                            	</div>
                            	<div class="col-sm-8 col-xs-12 text-editor">
                            		<textarea id="event_detail" name="event_detail" ><?php echo SecureShowData($event_detail);?></textarea>
                            		<span id="eventdetailInfo"></span>
                            	</div>
                        	</div>
								
                             <div class="form-group clearfix " id="organization_unnamed">
                            	<div class="col-sm-3 col-xs-12 lable-rite">
                            		<label><?php echo Organizer; ?><span>&#42;</span></label>
                            	</div>
                            	
                            	
                            	<?php if($organizers) {  ?>
	                            	<div class="col-sm-8 col-xs-12" id="org_replace">
	                            		<select class="select-pad" onchange="$('#org_event_id').val(this.value); $('#organizer_id').val(this.value);"  name="organiser_id_event" id="organiser_id_event">
	                            		<?php
											foreach($organizers as $organizer){
												
												$select ='';
												if($organizer_id>0){
													if($organizer_id == $organizer['id']){
														$select = 'selected="selected"';
													}
												}else{
													if(isset($_SESSION['organizer_id']) && $_SESSION['organizer_id']==$organizer['id']){
														
														$organizer_id = $organizer['id'];
														$select = 'selected="selected"';
													} elseif(!isset($_SESSION['organizer_id']) || (isset($_SESSION['organizer_id']) && $_SESSION['organizer_id']=='')) {
														$organizer_id = $organizer['id'];
														if($organizer['is_default']){
															$select = 'selected="selected"';
														}
													}
												}
												echo '<option value="'.$organizer['id'].'" '.$select.'>'.SecureShowData($organizer['name']).'</option>';	
											}
											if(!isset($_SESSION['organizer_id']) || (isset($_SESSION['organizer_id']) && $_SESSION['organizer_id']==''))
											{
												$_SESSION['organizer_id']='';
											}
											?>
										</select>
										<p id="selectorganizererrorInfo"></p>	
	                            	</div>
									
									
									<div class="col-sm-8 col-sm-offset-3 col-xs-12 add-new clearfix">
                                                                            <?php 
                           	if(!$rights_for_organizer){ 
                           ?>
		                            <ul>
		                            	<a href="" class="mfPopup" id="organizer_edit_anchor_tag"></a>
		                                <li><a href="javascript:;" onClick="show_organization('organization_div','organization_unnamed','org','edit')"><?php echo Edit.' '.Organizer; ?></a></li>
                                        <li>|</li>
		                            	<li><a href="javascript:;" onClick="show_organization('organization_div','organization_unnamed','0','add')"> + <?php echo Add_New; ?></a></li>
		                                
		                            </ul>
                                                                             <?php 
                           	}
                           ?>
		                            </div>
								<?php } else { ?>
									<?php if($organizers) { ?>
									<div class="col-sm-11 col-xs-12 add-new MarT1 text-right clearfix">
								<?php }else{ ?>	
									<div class="col-sm-2 add-new clearfix">
								<?php } ?>
		                            <ul>
		                            	<li><a href="javascript://" onclick="show_organization('organization_div','organization_unnamed','0','add');"> + <?php echo Add_New; ?></a></li>
		                            </ul>
		                            </div>
								<?php } ?>
								
								<input id="org_event_id" type="hidden" value="<?php echo $organizer_id;?>" name="org_event_id">
								<input id="organizer_id" type="hidden" value="<?php echo $organizer_id;?>" name="organizer_id" >
								<input id="prev_organizer_id" type="hidden" value="<?php echo $organizer_id;?>" name="prev_organizer_id" >

                            </div>
                            
                            <div id="organization_div" style="display:none;">
                            
	                            <div class="form-group clearfix " >
	                            	<div class="col-sm-3 col-xs-12 lable-rite">
	                            		<label><?php echo Organizer; ?><span>&#42;</span></label>
	                            	</div>
	                            	
	                            	<div class="col-sm-8 col-xs-12">
	                            		<input type="text" name="organizer_host" value="<?php echo SecureShowData($organizer_host); ?>" id="organizer_host" Placeholder="<?php echo Organizer; ?>">	                       
	                            	</div>
	                            	
	                            	<div class="col-sm-11 col-xs-12 add-new MarT1 text-right clearfix">
	                            	 	<ul>
		                            		<li><a href="javascript:" onclick="show_organization('organization_unnamed','organization_div','<?php echo $organizer_id;?>','can');"><?php echo Cancel?></a></li>
		                            	</ul>
	                            	</div>
	                            </div>
	                           
	                            <div class="form-group clearfix ">
	                            	<div class="col-sm-3 col-xs-12 lable-rite">
	                            		<label><?php echo Organizer_Description; ?><span>&#42;</span></label>
	                            	</div>
	                            	
	                            	<div class="col-sm-8 col-xs-12 text-editor">
		                            	<textarea id="host_description" name="host_description" ><span id="span_host_description"><?php echo SecureShowData($host_description);?></span></textarea>
	                            	</div>
	                            </div>
                            
                            </div>
                            <div  class="MarL27" id="organizererrorInfo"></div>
							<input id="organizers_count" type="hidden" value="<?php if(is_array($organizers)){ echo count($organizers);} else { echo 0; } ?>" name="organizers_count">

                            
                            <div class="form-group clearfix">
                             <div class="col-sm-8 col-sm-offset-3 clearfix">
                                <div class="radio padL0">
                                  <label>
                                    <input <?php if($add_social_link ==1) { echo 'checked="checked"'; }?> type="checkbox" name="add_social_link" id="add_social_link" value="1" onclick="show_repeat_div('add_social_link','social_link');">
                                  	<?php echo Include_links_to_Facebook_and_Tiwtter; ?>
                                  </label>
                                </div>
                                
                                
                                
                                <div id="social_link" style="display: <?php if($add_social_link ==1) { echo 'block'; } else { echo 'none'; } ?>;"> 
	                                
		                                <div class="col-sm-4 col-xs-12 ">
		                                	 <label>
		                                	 	<input <?php if($add_facebook ==1) { echo 'checked="checked"'; }?> type="checkbox" name="add_facebook" id="add_facebook" value="1" onclick="if(this.checked){ $('#facebook_link').removeAttr( 'readonly', 'readonly' ); }else{ $('#facebook_link').attr( 'readonly', 'readonly' );}">
		                                	  	<img src="<?php echo base_url();?>images/icon-fb-small.png" alt=""> &nbsp;http://facebook.com/
		                                	  </label>
		                                </div>
		                                <div class="col-sm-5 col-xs-12">
		                                	<input id="facebook_link" name="facebook_link" value="<?php echo $facebook_link;?>" type="text" <?php if($add_facebook !=1) { echo 'readonly="readonly"'; }?> >
					                        <div id="event_facebook_link_err"></div>
					                        
		                                </div>
		                                <div class="col-sm-3 col-xs-12">
		                                	<label><a href="javascript://" data-toggle="tooltip"  class="tool_tip_class" data-placement="right" title="<?php echo facebook_address;?>"></a></label>
		                                </div>
	                                 	<div class="clear"></div><br />
	                                 	<div class="col-sm-4 col-xs-12 ">
		                                	 <label>
		                                	 	<input <?php if($add_twitter ==1) { echo 'checked="checked"'; }?> type="checkbox" name="add_twitter" id="add_twitter" value="1" onclick="if(this.checked){ $('#twitter_link').removeAttr( 'readonly', 'readonly' ); }else{ $('#twitter_link').attr( 'readonly', 'readonly' );}">
		                                	  	<img src="<?php echo base_url();?>images/icon_twitter-small.png" alt=""> &nbsp;http://twitter.com/
		                                	  </label>
		                                </div>
		                                <div class="col-sm-5 col-xs-12">
		                                	<input id="twitter_link" name="twitter_link" value="<?php echo $twitter_link;?>"type="text" <?php if($add_twitter !=1) { echo 'readonly="readonly"'; }?>>
					                        <div id="event_twitter_link_err"></div>
					                        
		                                </div>
		                                <div class="col-sm-3 col-xs-12">
		                                	<label><a href="javascript://" data-toggle="tooltip"  class="tool_tip_class" data-placement="right" title="<?php echo twitter_address;?>"></a></label>
		                                </div>
		                                <div class="clear"></div><br />
	                                
				                         
			                        </div>
			                         
			                         
			                 		</div>
                 
                 
                                </div>
                            
                       </div>
                        
                    </div>
                 
             </div>
             <!-- End row-->
             <!-- End 1st part-->
                 
             <!-- 2rd part--> 
                    
            <div class="row">                    
                <div class="event-webpage col-lg-12">
                    <div class="red-event clearfix">
                    	<h4 class="pull-left"><span class="titleNum">2</span> <?php echo Create_Tickets;?></h4>
                    	<div class="expertTip">
                            <a href="<?php echo site_url('event/tip/Ticket_Tip');?>" class="mfPopup" id="ticket_tips"><?php echo Ticket_Tips; ?></a>
                         </div>
                    </div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                
			
                <div class="col-lg-12 clearfix mb">
                    
                    <?php if($rights && $this->uri->segment(2)=='edit_event'){ ?>
                        
                   
                    <div style="position:relative;"> 
                        
                    <div class="hide_content"><h4> <?php echo YOU_DONT_HAVE_PERMISSION_ACCESS_THIS_SPECIFIC_PART;?> </h4></div>
                    <?php
                    }
                    ?>
                    
                    <div class="event-detail pt" id="create_ticket">
                    	
                    	<h3><?php echo Choose_a_type_of_ticket_to_start;?></h3>
                        
                        
                        
                        	<div class="form-group clearfix ">
                            	<div class="col-sm-3 col-xs-12 lable-rite mb10">
                            		<label><?php echo Add_a_Ticket;?><span>&#42;</span></label>
                            	</div>
                                
                            		<div class="cetr">
                                	<ul class="free-tckt col-sm-9 col-xs-12 mt10">

                                		<!-- Seat module -->
                            		<?php 
							  	 		$extension->load_view('seat_arrangment', $module_data);		
                            		 ?>
                              
	                                    <!-- end of seat module -->

	                                    <input type="hidden" id="ticket_temp" name="ticket_temp" value="1">
	                                    <li>
	                                    	<?php if($active == 0) { ?>
	                                    		<a id="ticket_tips" class="mfPopupIn" href="#multi_currency"><?php echo Edit;?></a>
	                                    	<?php } else { ?>
	                                    		<a id="ticket_tips" class="mfPopupIn" onclick="alert('You are not allowed to change the currency.');" href="javascript:void(0);"><?php echo Edit;?></a>
	                                    	<?php } ?>
	                                    	<label id="currency_lable">
	                                    	<?php 
	                                    		$currency = getRecordById('currency_codes','id',$currency_code_id);	                                    		
	                                    		echo getCurrencyLable($currency['currency_symbol'], $currency['currency_code']); 
	                                    	?>
	                                    	</label>
	                                    </li>
                                    </ul>
                            		</div>
                            		<div class="error etp-error" id="ticket_req_fields"></div>
                            		<div id="ticket_error"></div> 
                        	</div>

                        	<!-- Edit Multicurrency Code -->
                        	<script type="text/javascript">
                        	function set_event_currency(currency_code){
                        		document.getElementById('event_currency').value = currency_code;
                        	}
                        	function save_event_currency(){
                        		var sold = "<?php echo $sold_ticket; ?>";
                        		if(sold=='1'){
                        			document.getElementById('event_currency').value = "<?php echo $currency_code_id; ?>";
                        			$('#error_save').show(); return false;
                        		}else{
                        		var currency_code_id = $('#event_currency').val();
                        		var event_id = $('#event_id').val()

                        		$.ajax({
							        type: "POST",
							        data: {currency_code_id: currency_code_id, event_id: event_id}, 
							        url: "<?php echo site_url('event/setEventCurrenctCode/');?>",
							        success: function(data) {
							        	var res = data.split("^");
							        	var currencyLabel = res[0];
							        	var currencySymbol = res[1];
						        	 	cur_symbol = res[1];
							        	var currencyamout = res[2];
							        	payment_gateway_fee = res[3];
							        	payment_gateway_flat_fee = res[4];
							        	payment_gateway_fee = parseFloat(payment_gateway_fee);
										payment_gateway_flat_fee = parseFloat(payment_gateway_flat_fee);

							      		setCurrenyLablePrice(currencyLabel);
							      		$('.placeholderCurrency').attr('placeholder',currencySymbol);  								        	
							      		$('.cur_symbol').text(currencySymbol);
							      		$('#cur_symbol').val(currencySymbol);
							      		$('.paid_price_place').attr("placeholder", currencySymbol);
							      		$('.cur_amt').html('<label class="cur_symbol">'+currencyamout+'</label>');

							        	$('.btn-closeP').click();
										calculate_tickets_fee_structure();
							        }
							    }); 
                        		}
                        	}
                        	function setCurrenyLablePrice(data){                        		
                        		$('#currency_lable').text(data);
                        	}
                        	</script>
                        	<div id="multi_currency"  class="white-popup-block popup-container mfp-hide" >
			             	 <div class="popupHead">
								<h1><?php echo CHOOSE_CURRENCY;?></h1>
							 </div>
							 
							 <div class="event-title" >
							 
								<div class="form-group clearfix">
									<div class="col-sm-3 col-xs-12 lable-rite">
			                        	<label><?php echo WHICH_CURRENCY_WILL_YOU_USE; ?></label>
			                        </div>
			                        <div class="col-sm-8 col-xs-12">
			                        	<select name="daily_repeat_day" id="daily_repeat_day" class="select-pad width60" onchange="set_event_currency(this.value);">
											<?php 
												foreach($multi_currency as $mc){
													$select ='';
													if($mc['id'] == $currency_code_id){
														$select = 'selected="selected"';
													}
													echo '<option value="'.$mc['id'].'" '.$select.'>'.SecureShowData($mc['currency_name']).' '.$mc['currency_code'].' '.$mc['currency_symbol'].'</option>';	
												}
											?>
										</select>   								 		
			                        </div>
			                    </div>
			                    <input type="hidden" name="event_currency" id="event_currency" value="<?php echo $currency_code_id; ?>">
			                    <?php $currency = getRecordById('currency_codes','id',$currency_code_id);	?>
	                                  	</label>
			                    <input type="hidden" name="cur_symbol" id="cur_symbol" value="<?php echo getCurrenctCodeSymbolById($currency_code_id); ?>">
			                    
								<div class="form-group clearfix">
			                        <div class="col-sm-8 col-sm-offset-3 col-xs-12">
									    <a href="javascript://" class="btn-event" onclick="save_event_currency();"><?php echo Save;?></a>
				                    <a href="javascript://" class="btn-eventgrey btn-closeP marL10"><?php echo Cancel;?></a>
			                        </div>
			                    </div>
			                    <label id="error_save" style="display: none"><?php echo YOU_CANT_EDIT_CURRENCY; ?></label>	
				            </div>         	
			             </div> 
                        	<!-- End of Multicurrency Code -->
                            	
                            <!-- 1)table_res , 2)quantity-info (Responsive table class name)-->
                            
                            <?php if (count($free_tickets) > 0 || count($paid_tickets) > 0 || count($donation_tickets) > 0){ ?>
								 <div class="form-group clearfix"  id="main_ticket_head" >
							<?php } else { $event_capacity='0';?>
								 <p id="when_no_tic"> <?php echo Add_Ticket_Here; ?></p>
								 <div class="form-group clearfix"  id="main_ticket_head" style="display : none;">
							<?php }?>
								
							

                            	<div class="col-sm-12 col-xs-12">
                            	<table class="table tbl-ticket table_res FPD_ticket_table" id="add_more_div_1">      
                        			<?php include_once('event_tickets.php'); ?>
                                  </table>
                                  
                                  	<div class="col-sm-3 col-xs-12 lable-rite">
	                            		<label><?php echo Event_Capacity;?></label>
	                            	</div>
	                            	<div class="col-sm-2 col-xs-12 m10 mb10">
	                            		<input type="text" value="<?php echo $event_capacity;?>" readonly="readonly" placeholder="100" name="event_capacity" id="event_capacity">
	                            	</div>
                            	
                                    
   								</div>
                            </div>
                            
                            
                            
                            	<div class="form-group clearfix ">
                            	<div class="col-sm-3 col-xs-12 lable-rite">
                            		<label><?php echo I_Would_like_to;?></label>
                            	</div>
                            	<div class="col-sm-8 col-xs-12 clearfix tooltipradio" >
                                	<div class="radio">
                                          <label>
                                            <input type="radio" onclick="set_buyer_total(this.value);" name="event_pass_fees" id="event_pass_fees1" value="1" <?php echo $first_checked;?>>
                                           <?php echo Pass_on_fees_to_the_buyer;?>
                                          </label>
                                          <a class="tool_tip_class" data-placement="right" data-toggle="tooltip" href="javascript://" title="<?php echo event_pass_fees_tooltip1;?>"></a>
                                        </div>
                                        
                                     <div class="radio">
                                          <label>
                                            <input type="radio" onclick="set_buyer_total(this.value);" name="event_pass_fees" id="event_pass_fees2" value="2" <?php echo $second_checked;?>>
                                            <?php echo Absorb_the_fees;?>
                                          </label>
                                          <a class="tool_tip_class" data-placement="right" data-toggle="tooltip" href="javascript://" title="<?php echo event_pass_fees_tooltip2;?>"></a>
                                    </div>
                                     <div class="radio">
                                          <label>
                                            <input type="radio" onclick="set_buyer_total(this.value);" name="event_pass_fees" id="event_pass_fees3" value="3" <?php echo $third_checked;?>>
                                           <?php echo Customize_per_ticket_type;?>
                                          </label>
                                          <a class="tool_tip_class" data-placement="right" data-toggle="tooltip" href="javascript://" title="<?php echo event_pass_fees_tooltip3 ?>"></a>
                                    </div>
                                    
                            	</div>
                            	 <div class="col-sm-8 col-sm-offset-3 col-xs-12 ">
						          <div class="checkbox">
								  <label>
								    <input type="checkbox" value="1" id="event_display_sales_end" name="event_display_sales_end" <?php if($event_display_sales_end == 1){ echo 'checked="checked"'; }?>>
								    <?php echo DISPLAY_SALES_END_ON_EVENT_PAGE; ?>
								  </label>
								</div>
								</div>
                        	</div>
                    
                 </div>
             </div>
                    <?php 
                    if($this->uri->segment(2)=='edit_event' && $rights){ ?>
                        
                   
                    </div>
                        <?php
                    }
                    ?>
               
             
             </div>
             <!-- End row-->
             
             
           <!-- End 2nd part-->
                    
           <!-- 3rd part--> 
                    
               <div class="row">     
                <div class="event-webpage col-lg-12">
                    <div class="red-event clearfix">
                    	<h4 class="pull-left"><span class="titleNum">3</span> <?php echo Create_an_event_webpage;?></h4>
                    	<div class="expertTip">
                            <a href="<?php echo site_url('event/tip/Promote_Tip');?>" class="mfPopup" id="promote_tips"><?php echo Promote_your_event; ?></a>
                    </div>
                    </div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                
			            
                <div class="col-lg-12 clearfix mb">
                   <div class="event-detail pt pb ">
                   		
							<div class="form-group clearfix">
								<div class="col-sm-3 col-xs-12 lable-rite">
									<label><?php echo FACEBOOK_EVENT_LINK;?></label>
								</div>
								<div class="col-sm-8 col-xs-12 orgUrl">
								<img src="<?php echo base_url();?>images/icon-fb-small.png" alt=""> &nbsp;https://www.facebook.com/events/
									<input type="text" id="facebook_event" name="facebook_event" value="<?php echo $facebook_event; ?>" placeholder="101000210021100">
									<?php $facebook_event = str_replace(" ", "-", $facebook_event); ?>
									<?php if($facebook_event!=""){ 
										$fb_link = "https://www.facebook.com/events/".$facebook_event;
										?>
										<label>
											<a target="_blank" href="<?php echo $fb_link; ?>">View Event</a>
										</label>
									<?php } ?>
								</div>
							</div>	
                            <div class="form-group clearfix ">
                            	<div class="col-sm-3 col-xs-12 lable-rite">
                            		<label><?php echo Listing_privacy;?><span>&#42;</span></label>
                            	</div>
                            	<div class="col-sm-8 col-xs-12">
                                	<div class="radio">
                                          <label>
                                            <input type="radio" name="keep_private" id="keep_private1" value="0" checked  onclick="show_organization('keep_public_div','keep_private_div');" <?php if($keep_private == 0) { echo 'checked="checked"'; }?>>
                                            <?php echo Publico_event;?>
                                          </label>
                                    </div>
                                        
                                     <div class="radio">
                                          <label>
                                            <input type="radio" name="keep_private" id="keep_private2" value="1" onclick="show_organization('keep_private_div','keep_public_div');" <?php if($keep_private == 1) { echo 'checked="checked"'; }?>>
                                           <?php echo Private_event;?>
                                          </label>
                                    </div>
                            	</div>
                        	</div>
                        	
                        	
                            <div id="keep_public_div" style="display:<?php if($keep_private == 0) { echo 'block'; } else { echo 'none'; }?>">
	                             <div class="form-group clearfix ">
	                            	<div class="col-sm-3 col-xs-12 lable-rite">
	                            		<label><?php echo CATEGORY;?><span>&#42;</span></label>
	                            	</div>
	                            	<div class="col-sm-4 col-xs-12">
	                                	<select name="category" id="category" class="select-pad" onchange="set_subcategory(this.value)">
	                                    	<option value=""><?php echo "Select Category";?></option>
	                                    	<?php
		                                    	if($getParentCategory){
		                                    		
			                                    	foreach($getParentCategory as $cat){
			                                    		$select ='';
														
														if($cat['id'] == $category){
			                                    			$select ='selected="selected"';
														} ?>
			                                    		
														<option value="<?php echo $cat['id']; ?>" <?php echo $select; ?>><?php echo SecureShowData($cat['category_name']);?></option>
			                                    	<?php }
		                                    	}
	                                    	?>
	                                    </select>
	                            	</div>
	                        	</div>
	                            <script type="text/javascript">
	                            <?php if($subcategory=='' || $subcategory=='0'){?>
	                            	$(document).ready(function(){
	                            		$('#event_topic_div').hide();
	                            	});

	                            	<?php
	                            }?>
	                            </script>
	                            <div class="form-group clearfix " id="event_topic_div">
	                            	<div class="col-sm-3 col-xs-12 lable-rite">
	                            		<label><?php echo SUB_CATEGORY;?><span>&#42;</span></label>
	                            	</div>
	                            	<div class="col-sm-4 col-xs-12" id="subcat_list">
	                            	
		                            	<?php if($selectSubCategory != ''){ echo $selectSubCategory; } else {?>
		                                	<select class="select-pad" name="subcategory" id="subcategory">
		                                    	<option value=""><?php echo "Select Sub Category";?></option>
		                                    </select>
		                                <?php } ?>
	                            	</div>
	                               
	                        	</div>
	                             <div class="form-group clearfix ">
	                            	<div class="col-sm-3 col-xs-12 lable-rite">
	                            		<label><?php echo EVENT_TYPE;?><span>&#42;</span></label>
	                            	</div>
	                            	<div class="col-sm-4 col-xs-12">
	                                	<select name="event_type_id" id="event_type_id" class="select-pad">
	                                    	<option value=""><?php echo "Select Event Type";?></option>
	                                    	<?php
		                                    	if($event_types){
		                                    		
			                                    	foreach($event_types as $eventType){
			                                    		$select ='';
														
														if($eventType['id'] == $event_type_id){
			                                    			$select ='selected="selected"';
														} ?>
			                                    		
														<option value="<?php echo $eventType['id']; ?>" <?php echo $select; ?>><?php echo SecureShowData($eventType['event_type_name']);?></option>
			                                    	<?php }
		                                    	}
	                                    	?>
	                                    </select>
	                            	</div>
	                        	</div>
                        	</div>
                        	
                        	<div id="keep_private_div" style="display : <?php if($keep_private == 0) { echo 'none'; } else { echo 'block'; }?>;">
                        		<div class="form-group clearfix ">
	                            	<div class="col-sm-8 col-sm-offset-3 clearfix">
	                            		<input type="text" id="private_text" readonly="readonly" name="private_text" value="<?php echo This_event_is_private_and_will_not_be_listed_in_our_event_directory_or_on_search_engines;?>">
	                            	
		                            	<div class="checkbox" style="display : none;">
			                            	<label>
				                            	<input <?php if($share_on_social == 1) { echo 'checked="checked"'; }?> id="share_on_social" type="checkbox" onclick="if(this.checked){ $('#invite_only').removeAttr('checked'); }" value="1" name="share_on_social">
												<?php echo SecureShowData(Attendees_can_share_the_event_with_their_friends_on_Facebook);?>
			                            	</label>
		                            	</div>
	                            	</div>
                            	</div>
                            	
                            	<div class="form-group clearfix ">
	                            	<div class="col-sm-8 col-sm-offset-3 clearfix">
	                            		<div class="checkbox">
		                            		<label>
			                            		<input <?php if($invite_only == 1) { echo 'checked="checked"'; }?> id="invite_only" type="checkbox" onclick="if(this.checked){ $('#share_on_social').removeAttr('checked'); }" value="1" name="invite_only">
												<?php echo SecureShowData(sprintf(Invitation_Only_Attendees_must_receive_an_Halfevent_email_invitation_to_register,$site_setting['site_name']));?>
											</label> 
		                            	</div>
	                            	</div>
                            	</div>
                            	
                            	<div class="form-group clearfix ">
	                            	
	                            	<div class="col-sm-3 col-sm-offset-3 clearfix ">
	                            		<div class="checkbox">
		                            		<label>
			                            		<input <?php if($password_protect == 1) { echo 'checked="checked"'; }?> id="password_protect" type="checkbox" onclick="if(this.checked){ $('#password_value').removeAttr( 'readonly', 'readonly' ); }else{ $('#password_value').attr( 'readonly', 'readonly' );}" value="1" name="password_protect">
												<?php echo Password_Protected;?>
			                            	</label>
		                            	</div>
	                            	</div>
	                            	<div class="col-sm-2 col-xs-12">
	                            		<input onkeypress="DisableSpace();" id="password_value" value="<?php echo $password_value ?>" type="text" value="" name="password_value" <?php if($password_protect != 1) { echo 'readonly="readonly"'; }?>>
	                            	</div>
	                            	<p id="pass_div"></p> 
                            	
                            	</div>
                        	</div>
                        	
                        	<div class="form-group clearfix ">
                        		<div class="col-sm-8 col-sm-offset-3 clearfix">
                                	<div class="checkbox">
                                          <label>
                                            <input type="checkbox" <?php if($remaining_tickets == 1) { echo 'checked="checked"'; }?> name="remaining_tickets" id="remaining_tickets" value="1"><?php echo Show_the_number_of_tickets_remaining_on_the_registration_page;?>
                                          </label>
                                    </div>
                               	</div>
                            </div>
	                               
	                               
                            
                            <div class="form-group clearfix ">
                            	<div class="col-sm-3 col-xs-12 lable-rite">
                            		<label><?php echo ORIGNAL_URL;?><span>&#42;</span></label>
                            	</div>
                            	<div class="col-sm-9  col-xs-12 mievnt orgUrl">
                                	<p class="break-word-xsP"><?php echo site_url('event/view');?>/</p>
                              
                               	<input type="text" name="event_url_link" id="event_url_link" value="<?php echo SecureShowData($event_url_link);?>">
                               	<span id="eventurllinkInfo"></span>
                               </div>
                        	</div>   
                    	 <div class="form-group clearfix " >
                        	<div class="col-sm-3 col-xs-12 lable-rite ">
                        		<label><?php echo Customize_Web_Address;?></label>
                        	</div>
                        	<?php 	if($customize_web_url==''){
                        					$url_class='hide';
                        					$add_new_calss='';
                        				}else{
                        					$url_class='';
                        					$add_new_calss='hide';
                        				}
                        		?>
                        	<a href="javascript://" id='add_Custom_url' class="<?php echo $add_new_calss; ?>" onclick="add_Custom_url('add')"> + <?php echo Add_New; ?></a>
                        		
                        		<div id="custom_url" class="<?php echo $url_class;?>">
                        		<div class="col-sm-1 col-xs-2 " id="progressbar_url"  style="display:none;">
                                	<img src="<?php echo base_url();?>images/bx_loader.gif" alt="" height="32" width="32"/>
                                </div>
	                        	<div class="col-sm-9 col-md-6 col-xs-12 mievnt " >
	                        		<div class="width50">
	                        		<input type="text" name="customize_web_url" id="customize_web_url" value="<?php echo $customize_web_url;?>" >
		                        	</div>
		                        	<div class="width50">
		                        		<span>.<?php echo $_SERVER['HTTP_HOST'];?></span>
				                     	<button type="button" onclick="save_custom_url()" class="saveBtn"><i class="glyphicon glyphicon-ok"></i></button>
										<button class="cancelBtn" onclick="add_Custom_url('remove')" type="button" ><i class="glyphicon glyphicon-remove"></i></button>
		                        	</div>
	                           </div>
	                           	<div class="col-sm-9 col-sm-offset-3">
	                           		<span id="save_custom_url_error" class="text-danger"></span>
	                           		<span id="save_custom_url_success" class="text-success"></span>
                          		 </div>
                          		 </div>
                       
                    	</div>   
                    	<?php if($site_setting['on_event_payment'] == 1) { ?>
	                           <div class="row">
	                          	<div class="col-sm-3 col-xs-12 lable-rite">
	                          	<label>
	                          		<?php echo "Pay at event";?>
	                          		</label>
	                          	</div>
	                          	<div class="col-sm-8 col-xs-12 ">
		                        
		                                  <label>
		                                    <input type="checkbox" name="on_event_payment" id="on_event_payment" value="1" <?php if($event_details['on_event_payment']==1){ echo "checked";}?>  >
		                                  </label>
		                          
	                          	</div>
	                          </div>
                    	<?php } ?> 
                           <div class="row">
                          	<div class="col-sm-3 col-xs-12 lable-rite">
                          	<label>
                          		<?php echo REFUND_POLICY_ENABLED;?>
                          		</label>
                          	</div>
                          	<div class="col-sm-8 col-xs-12 ">
	                        
	                                  <label>
	                                    <input type="checkbox" name="refund_policy_enable" id="refund_policy_enable" value="1" <?php if($refund_policy_enable==1){ echo "checked";}?>  >
	                                  </label>
	                          
                          	</div>
                          </div>
                            <div class="row">
                            	<div class="col-sm-3 col-xs-12 lable-rite">
                            	<label>
                          			<?php echo REFUND_POLICY_TEXT;?>
                          			</label>
                          		</div>
                              <div class="col-sm-8 col-xs-12 ">
                                <textarea class="form-control" name="refund_policy_text"><?php echo SecureShowData($refund_policy_text);?></textarea>
                                </div>
                            </div>
                   </div>

                   <div class="clearfix"></div>
                 </div>
              </div><!-- End row-->
              <!-- End 3rd part-->
				<?php if($site_setting['is_wallet'] == 2 && $event_details['is_wallet'] == 2 && $event_details['is_wallet'] == 2) { ?>
					<?php $this->load->view("default/event/payout"); ?>
				<?php } ?>
             


             <?php //===========Cant find address fancybox open ==========// ?>
            
             <?php //===========Cant find address fancybox close ==========// ?>
             
             <?php //===========Timezone fancybox start ==========// ?>
             <div id="timezone_box"  class="white-popup-block popup-container mfp-hide" >
             	 <div class="popupHead">
					<h1><?php echo Date_Time_Settings;?></h1>
				 </div>
				 
				 <div class="clearfix"></div> 
				 <div class="festival pb"></div>
				 
				 <div class="event-title" >
                    
                    <div class="form-group clearfix">
						<div class="col-sm-3 col-xs-12 lable-rite">
                        	<label><?php echo Event_Page_Setting; ?></label>
                        </div>
                        <div class="col-sm-8 col-xs-12">
                        	<div class="radio">
							  <label>
							    <input type="checkbox" name="event_display_start_time" id="event_display_start_time" value="1" <?php if($event_display_start_time == 1){ echo 'checked="checked"'; }?>>
							    <?php echo Display_start_time_on_event_page; ?>
							  </label>
							</div>
							
							<div class="radio">
							  <label>
							    <input type="checkbox" value="1" id="event_display_end_time" name="event_display_end_time" <?php if($event_display_end_time == 1){ echo 'checked="checked"'; }?>>
							    <?php echo Display_end_time_on_event_page; ?>
							  </label>
							</div>
							
							<div class="radio">
							  <label>
							    <input type="checkbox" value="1" id="event_display_time_zone" name="event_display_time_zone" <?php if($event_display_time_zone == 1){ echo 'checked="checked"'; }?>>
							    <?php echo Display_time_zone_on_event_page; ?>
							  </label>
							</div>
							<!-- <div class="radio">
							  <label>
							    <input type="checkbox" value="1" id="event_display_sales_end" name="event_display_sales_end" <?php if($event_display_sales_end == 1){ echo 'checked="checked"'; }?>>
							    <?php echo DISPLAY_SALES_END_ON_EVENT_PAGE; ?>
							  </label>
							</div> -->
                        </div>
                    </div>
                    
                   
                    
                    <div class="text-center">
	                    <a href="javascript://" class="btn-event" onclick="set_time_zone();"><?php echo Save;?></a>
	                    <a href="javascript://" class="btn-event" onclick="$('.mfp-close').click();"><?php echo Cancel;?></a>
                    </div>
	            </div>         	
             </div>  
             <?php //===========Timezone fancybox close ==========// ?>
             
             
             <?php //===========Daily Repeat fancybox start ==========// ?>
             <div id="repeat_div_pop1"  class="white-popup-block popup-container mfp-hide" >
             	 <div class="popupHead">
					<h1><?php echo When_does_the_event_repeat;?></h1>
				 </div>
				 
				 <div class="event-title" >
				 
					<div class="form-group clearfix">
						<div class="col-sm-3 col-xs-12 lable-rite">
                        	<label><?php echo Repeat_Every; ?></label>
                        </div>
                        <div class="col-sm-8 col-xs-12">
                        	<select name="daily_repeat_day" id="daily_repeat_day" class="select-pad width60">
								<?php
									foreach($DAYS_NUMBER as $key=>$val){
										$select ='';
										if($key = $daily_repeat_day){
											$select = 'selected="selected"';
										}
										echo '<option value="'.$val.'" '.$select.'>'.SecureShowData($val).'</option>';	
									}
								?>
							</select>   
					 		<span><?php echo Day_s;?></span>
                        </div>
                    </div>
                    
                    <div class="form-group clearfix">
						<div class="col-sm-3 col-xs-12 lable-rite">
                        	<label><?php echo Ends_After; ?></label>
                        </div>
                        <div class="col-sm-8 col-xs-12">
						    <input type="text" readonly="readonly" value="<?php echo $daily_end_date;?>" name="daily_end_date" id="daily_end_date" class="repeat_datepicker width60">
						    <p id="daily_date_error" class="error"></p>
                        </div>
                    </div>
					<div class="form-group clearfix">
                        <div class="col-sm-8 col-sm-offset-3 col-xs-12">
						    <a href="javascript://" class="btn-event" onclick="save_event_repeat('1');"><?php echo Save;?></a>
	                    <a href="javascript://" class="btn-eventgrey btn-closeP marL10"><?php echo Cancel;?></a>
                        </div>
                    </div>	
	            </div>         	
             </div>  
             <?php //===========Daily Repeat fancybox close ==========// ?>
             
             <?php //===========Weekly Repeat fancybox start ==========// ?>
             <div id="repeat_div_pop2"  class="white-popup-block popup-container mfp-hide" >
             	 <div class="popupHead">
					<h1><?php echo When_does_the_event_repeat;?></h1>
				 </div>
				 
				 <div class="event-title" >
				 
					<div class="form-group clearfix">
						<div class="col-sm-3 col-xs-12 lable-rite">
                        	<label><?php echo Repeat_Every; ?></label>
                        </div>
                        <div class="col-sm-8 col-xs-12">
                        	<select name="weekly_repeat_week" id="weekly_repeat_week" class="select-pad width60">
								<?php
									foreach($WEEK_NUMBER as $key=>$val){
										$select ='';
										if($key = $weekly_repeat_week){
											$select = 'selected="selected"';
										}
										echo '<option value="'.$key.'" '.$select.'>'.SecureShowData($val).'</option>';	
									}
								?>
							</select>   
					 		<span><?php echo Week_s;?></span>
                        </div>
                    </div>
                    
                    <div class="form-group clearfix">
						<div class="col-sm-3 col-xs-12 lable-rite">
                        	<label><?php echo Repeat_On; ?></label>
                        </div>
                        <div class="col-sm-8 col-xs-12">
                        	<div class="radio PadL0">
                        	  <input type="hidden" value="0" name="weekly_repeat_day[]">
                        	
							  <label>
							    <input type="checkbox" name="weekly_repeat_day[]" id="weekly_repeat_day1" value="1" <?php if(in_array(1,$weekly_repeat_day)){  echo 'checked="checked"';} ?>>
							    <?php echo Mon; ?>
							  </label>
						
							  <label class="MarL3">
							    <input type="checkbox" name="weekly_repeat_day[]" id="weekly_repeat_day2" value="2" <?php if(in_array(2,$weekly_repeat_day)){  echo 'checked="checked"';} ?>>
							    <?php echo Tue; ?>
							  </label>
							
							  <label class="MarL3">
							    <input type="checkbox" name="weekly_repeat_day[]" id="weekly_repeat_day3" value="3" <?php if(in_array(3,$weekly_repeat_day)){  echo 'checked="checked"';} ?>>
							    <?php echo Wed; ?>
							  </label>
							  
							  <label class="MarL3">
							    <input type="checkbox" name="weekly_repeat_day[]" id="weekly_repeat_day4" value="4" <?php if(in_array(4,$weekly_repeat_day)){  echo 'checked="checked"';} ?>>
							    <?php echo Thu; ?>
							  </label>
						
							  <label class="MarL3">
							    <input type="checkbox" name="weekly_repeat_day[]" id="weekly_repeat_day5" value="5" <?php if(in_array(5,$weekly_repeat_day)){  echo 'checked="checked"';} ?>>
							    <?php echo Fri; ?>
							  </label>
							
							  <label class="MarL3">
							    <input type="checkbox" name="weekly_repeat_day[]" id="weekly_repeat_day6" value="6" <?php if(in_array(6,$weekly_repeat_day)){  echo 'checked="checked"';} ?>>
							    <?php echo Sat; ?>
							  </label>
							  
							   <label class="MarL3">
							    <input type="checkbox" name="weekly_repeat_day[]" id="weekly_repeat_day7" value="7" <?php if(in_array(7,$weekly_repeat_day)){  echo 'checked="checked"';} ?>>
							    <?php echo Sun; ?>
							  </label>
							  <p id="weekly_day_error" class="error"></p>
							</div>
                        </div>
                    </div>
                    
                    
                    <div class="form-group clearfix">
						<div class="col-sm-3 col-xs-12 lable-rite">
                        	<label><?php echo Ends_After; ?></label>
                        </div>
                        <div class="col-sm-8 col-xs-12">
						    <input type="text" readonly="readonly" value="<?php echo $weekly_end_date;?>" name="weekly_end_date" id="weekly_end_date" class="repeat_datepicker width60">
						    <p id="weekly_date_error" class="error"></p>
                        </div>
                    </div>
                     <div class="form-group clearfix">
                     	<div class="col-sm-8 col-sm-offset-3 col-xs-12">                     	
	                    <a href="javascript://" class="btn-event" onclick="save_event_repeat('2');"><?php echo Save;?></a>
	                    <a href="javascript://" class="btn-eventgrey btn-closeP marL10"><?php echo Cancel;?></a>
                        </div>
                     </div>
	            </div>         	
             </div>  
             <?php //===========Weekly Repeat fancybox close ==========// ?>
             
             <?php //===========Monthly Repeat fancybox start ==========// ?>
             <div id="repeat_div_pop3"  class="white-popup-block popup-container mfp-hide" >
             	 <div class="popupHead">
					<h1><?php echo When_does_the_event_repeat;?></h1>
				 </div>
                 
				 
				 <div class="event-title" >
                    
                    <div class="form-group clearfix">
						<div class="col-sm-3 col-xs-12 lable-rite">
                        	<label><?php echo Repeat_On; ?></label>
                        </div>
                        <div class="col-sm-8 col-xs-12">
                        	<div style="display: <?php if($monthly_repeat_on == 0) { echo 'none'; } else { echo 'block'; }?>;" id="select_by_date" >
                        	  <select onchange="monthly_repeat_on(this.value)" name="monthly_repeat_on" id="monthly_repeat_on" class="select-pad width30">
								<?php
									foreach($MONTH_REPEAT_NUM as $key=>$val){
										$select ='';
										if($key = $monthly_repeat_on){
											$select = 'selected="selected"';
										}
										
										echo '<option value="'.$key.'" '.$select.'>'.SecureShowData($val).'</option>';	
									}
								?>
							  </select>  
					 
							  <select name="monthly_repeat_day" id="monthly_repeat_day" class="select-pad width30">
								<?php
									foreach($MONTH_REPEAT_DAY as $key=>$val){
										$select ='';
										if($key = $monthly_repeat_day){
											$select = 'selected="selected"';
										}
										echo '<option value="'.$key.'" '.$select.'>'.SecureShowData($val).'</option>';	
									}
								?>
							  </select>   
							  <span><?php echo of_the_month;?> - <a onclick="select_by_day_of_week('select_by_day_of_week','select_by_date','0')" href="javascript://"><?php echo Select_by_Date?></a></span>
							</div>
							
							<div style="display: <?php if($monthly_repeat_on == 0) { echo 'block';} else { echo 'none'; }?>;; " id="select_by_day_of_week">
                        	  <select name="monthly_repeat_day_num" id="monthly_repeat_day_num" class="select-pad width30">
								<?php
									foreach($DAYS_NUMBER as $key=>$val){
										$select ='';
										if($key = $monthly_repeat_day_num){
											$select = 'selected="selected"';
										}
										echo '<option value="'.$key.'" '.$select.'>'.SecureShowData($val).'</option>';	
									}
								?>
							  </select>  
							  <span><?php echo day_of_the_month;?> - <a onclick="select_by_day_of_week('select_by_date','select_by_day_of_week','1')" href="javascript://"><?php echo Select_by_Day_of_Week;?></a></span>
							</div>
                        </div>
                        
                        <input type="hidden" value="" id="repeat_monthly_repeat_on" name="repeat_monthly_repeat_on" <?php echo $monthly_repeat_on;?>>
                    </div>
                    
                    <div class="form-group clearfix">
						<div class="col-sm-3 col-xs-12 lable-rite">
                        	<label><?php echo Repeat_Every; ?></label>
                        </div>
                        <div class="col-sm-8 col-xs-12">
                        	<select name="monthly_repeat_months" id="monthly_repeat_months" class="select-pad width30">
								<?php
									foreach($WEEK_NUMBER as $key=>$val){
										$select ='';
										if($key = $monthly_repeat_months){
											$select = 'selected="selected"';
										}
										echo '<option value="'.$key.'" '.$select.'>'.SecureShowData($val).'</option>';	
									}
								?>
							</select>   
					 		<span><?php echo Month_s;?></span>
                        </div>
                    </div>
                    
                    <div class="form-group clearfix">
						<div class="col-sm-3 col-xs-12 lable-rite">
                        	<label><?php echo Ends_After; ?></label>
                        </div>
                        <div class="col-sm-8 col-xs-12">
						    <input type="text" readonly="readonly" value="<?php echo $monthly_end_date; ?>" name="monthly_end_date" id="monthly_end_date" class="repeat_datepicker width30">
						    <p id="monthly_date_error" class="error"></p>
                        </div>
                    </div>

                    <div class="form-group clearfix">
                    	<div class="col-sm-8 col-sm-offset-3 col-xs-12">
                        <a href="javascript://" class="btn-event" onclick="save_event_repeat('3');"><?php echo Save;?></a>
	                    <a href="javascript://" class="btn-eventgrey btn-closeP marL10"><?php echo Cancel;?></a>
                        </div>
                    </div> 
	            </div>         	
             </div>  
             <?php //===========Monthly Repeat fancybox close ==========// ?>
             
             <?php //===========specific Repeat fancybox start ==========// ?>
             <div id="repeat_div_pop4"  class="white-popup-block popup-container mfp-hide" >
             	 <div class="popupHead">
					<h1><?php echo When_does_the_event_repeat;?></h1>
				 </div>
				 <div class="event-title" >

                    <div class="form-group clearfix">
						<div class="col-sm-3 col-xs-12 lable-rite">
                        	<label><?php echo Event_Starts; ?></label>
                        </div>
                        <div class="col-sm-3 col-xs-12 marB15-xs">
                        	<input type="text" readonly="readonly" value="<?php echo $spec_start_date;?>" name="spec_start_date" id="spec_start_date" class="repeat_datepicker">
                        </div>
                        <div class="col-sm-3 col-xs-12">
                        	<input type="text"  name="spec_start_time" value="<?php echo $spec_start_time;?>" id="spec_start_time" class="timepicker">
                        	<span id="spec_start_time_error" class="error"></span>
                        </div>
                    </div>
                    
                    <div class="form-group clearfix">
						<div class="col-sm-3 col-xs-12 lable-rite">
                        	<label><?php echo Event_Ends; ?></label>
                        </div>
                        <div class="col-sm-3 col-xs-12 marB15-xs">
                        	<input type="text" readonly="readonly" value="<?php echo $spec_end_date;?>" name="spec_end_date" id="spec_end_date" class="repeat_datepicker">
                        </div>
                        <div class="col-sm-3 col-xs-12">
                        	<input type="text" name="spec_end_time" value="<?php echo $spec_end_time;?>" id="spec_end_time" class="timepicker">
                        	<span id="spec_end_time_error" class="error"></span>
                        </div>
                    </div>
                    
                    <div class="form-group clearfix">
                        <div class="col-sm-8 col-sm-offset-3 col-xs-12">
                        	<span id="spec_end_date_error" class="error"></span>
	                        <div class="radio padL0 mar0" >
		                        <label>
								    <input type="checkbox" value="1" id="spec_display_end_date" name="spec_display_end_date" <?php if($spec_display_end_date == 1){ echo 'checked="checked"';}?>>
			          				<?php echo Display_end_date_on_registration_page;?>
			          			</label>
		          			</div>
                        </div>     
                    </div>
                    <div class="form-group clearfix">
                        <div class="col-sm-8 col-sm-offset-3 col-xs-12">
                    		<a onclick="show_your_date();" class="btn-event" href="javascript://"><?php echo Add_Date;?></a>
                        </div>
                    </div>
                    
                    <div id="your_date_display" style="display: none;">
        	     <!-- <label class="fl mar0">Your Date</label>-->
		          <div class="form-group clearfix" id="your_date">
			          
			      </div> 
			      
			      <div style="display: none;" id="your_date_old">
			          
			      </div> 
			     
			     <div class="form-group clearfix">
                        <div class="col-sm-8 col-sm-offset-3 col-xs-12">
						<?php echo Note_Past_event_dates;?>
                 	</div>       
                 </div>   
	          	 <div style="display:none;" id="your_date_content">
	          	 	
	          	 </div>	
	          	 
	          	 <div style="display:none;" id="your_date_content_old">
	          	 	
	          	 </div>	
	          	 	
			     <input type="hidden" value="<?php echo $spec_cnt;?>" id="spec_cnt" name="spec_cnt"> 
			  </div>  
			   <div class="red" id="spec_your_date_error"></div>      
	 
	 
	 
	 
                    
                    <input type="hidden" value="<?php echo $your_date_text?>" id="your_date_text" name="your_date_text">					
                    <div class="form-group clearfix">
                        <div class="col-sm-8 col-sm-offset-3 col-xs-12">
                        	<a href="javascript://" class="btn-event" onclick="save_event_repeat('4');"><?php echo Save;?></a>
	                    	<a href="javascript://" class="btn-eventgrey btn-closeP marL10"><?php echo Cancel;?></a>
                        </div>
                    </div>
	            </div>         	
             </div>  
             <?php //===========specific Repeat fancybox close ==========// ?>
             
             <input type="hidden" value="<?php echo $event_id;?>" name="event_id" id="event_id">
    	 	 <input type="hidden" value="<?php echo $event_repeat_id;?>" name="event_repeat_id" id="event_repeat_id">
             <input type="hidden" value="" name="submit_type" id="submit_type">
             <input type="hidden" value="<?php echo $active;?>" name="active" id="active">
              
              <div class="row">
              
             	<div class="col-sm-12 col-xs-12 text-center pb">
                    <ul class="save-preview">
                     <li><input id="save_event" class="btn-event" name="commit" onclick="return set_submit_type('save', event, 'save')" type="submit" value="<?php echo Save;?>" /></li>
					 <!--<?php if($event_id!=''){ ?>
					  <li>					 
					 <a target="_blank" href="<?php echo site_url('event/theme/'.$event_id) ?>" class="btn-event"><?php echo 'Choose Design'; ?>x</a>
					 </li>
					 <?php } ?> -->
					 <?php if($active == 0) {?>           
					 <li><input id="publish_event" class="btn-event" name="commit" onclick="return set_submit_type('live', event, 'save_live')" type="submit" value="<?php echo Make_Event_Live;?>" /></li>
					 <?php } ?>
			 	 	</ul>
                </div>
                
             </div>
             </form>
             
           
            
            
             
            </div><!-- End container -->
            
            
    </section>
 
<?php 
if(!isset($map_address)) {
	$map_address= getip2location(getRealIP());
}
?>
<script type="text/javascript">
$(document).ready(function(){
	$('#New_venue').hide();
	$('#venue_address_div').hide();
	<?php
	if($event_id=='') {?>
			$('#map_div').hide();
			$('#venue_location').hide();
	
			<? }
			else
				{ ?>
					$('#map_div').show();
					$('#venue_location').show();

				set_map_center('<?=$address?>');

			<?php } ?>
			$('#vanue_name').val('Venue');
});
</script>
<script type="text/javascript">
var map;
            var geocoder;
            var centerChangedLast;
            var reverseGeocodedLast;
            var currentReverseGeocodeResponse;
   
    function getMap(a)
{
	var type_id=a.value;

	$.ajax({
        type: "POST",
        data: {category: type_id}, 
        url: "<?php echo site_url('event/getVenue/');?>",
        success: function(data) {
        	
            $("#div_replace").html(data);
            $('#map_div').show();
            set_map_center($('#venue_location_field').val());
             disabled_field(true);
             	
        }
    }); 


}
var componentForm = {
  sublocality_level_1: 'short_name',
  sublocality_level_2: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'long_name',
  country: 'long_name',
  postal_code: 'short_name'
};

	function initialize() {	

			var latitude = "<?php echo $map_address['latitude'];?>";
			var longitude = "<?php echo $map_address['longitude'];?>";

			var mapOptions = {
				  center: new google.maps.LatLng(latitude, longitude),
				  zoom: 13,
				  mapTypeId: google.maps.MapTypeId.ROADMAP
			};

	        var map = new google.maps.Map(document.getElementById('map_canvas'),mapOptions);
	        var input = document.getElementById('street_address1');
	        var autocomplete = new google.maps.places.Autocomplete(input);
	        autocomplete.bindTo('bounds', map);
	        var infowindow = new google.maps.InfoWindow();
	        var marker = new google.maps.Marker({
	        	map: map
	        	
			});

		    google.maps.event.addListener(autocomplete, 'place_changed', function() {
		
		    infowindow.close();
		    
		    var place = autocomplete.getPlace();
		    var j=true;
		   for (var i = 0; i < place.address_components.length; i++)
	  	{

		    	var addressType = place.address_components[i].types[0];
			 
			    if(addressType=='sublocality_level_1')
				{     
					var val = place.address_components[i]['long_name'];
		 		    document.getElementById('sublocality_level_1').value = val;
		 		   
				}
				if(addressType=='sublocality_level_2')
				{
					var val = place.address_components[i]['short_name'];
		 		    document.getElementById('sublocality_level_2').value = document.getElementById('sublocality_level_2').value+' '+val;
		 		   
				}
				if(addressType=='locality')
				{
					var val = place.address_components[i]['short_name'];
		 		    document.getElementById('locality').value = val;
		 		    
				}
				if(addressType=='administrative_area_level_1')
				{
					var val = place.address_components[i]['long_name'];
		 		    document.getElementById('administrative_area_level_1').value = val;
		 		   
				}
			  		if(addressType=='street_number')
				{
					var val = place.address_components[i]['short_name'];
		 		    document.getElementById('sublocality_level_2').value = document.getElementById('sublocality_level_2').value+' '+val;
		 		   
				}
			  	if(addressType=='country')
				{
					var val = place.address_components[i]['long_name'];
		 		    document.getElementById('country').value = val;
		 		   
				}
				if(addressType=='route')
				{
					var val = place.address_components[i]['long_name'];
		 		    document.getElementById('sublocality_level_2').value = document.getElementById('sublocality_level_2').value+' '+val;
		 		   
				}
				if(addressType=='postal_code')
				{
					var val = place.address_components[i]['short_name'];
		 		    document.getElementById('postal_code').value = val;
		 		   
				}
			 	if(addressType=='train_station')
				{
				
				    	
					var val = place.address_components[i]['short_name'];
		 		   document.getElementById('sublocality_level_2').value = document.getElementById('sublocality_level_2').value+' '+val;
				}
				           var val = place.name;
				     		var value_name = document.getElementById('vanue_name').value;
				     		
				     		if(value_name==""){
				     	  		document.getElementById('vanue_name').value = val;
				     	  	}

  		}
  		 show_div('venue_address_div','location','');
  			show_div('','venue_location','');
  			 set_address_value();

		    if (place.geometry.viewport) {
				map.fitBounds(place.geometry.viewport);
		 	} else {
				map.setCenter(place.geometry.location);
				map.setZoom(13); 
			}
			place.icon = 'https://mts.googleapis.com/vt/icon/name=icons/spotlight/spotlight-poi.png';
			var image = new google.maps.MarkerImage(
				place.icon,
				new google.maps.Size(71, 71),
				new google.maps.Point(0, 0),
				new google.maps.Point(17, 34),
				new google.maps.Size(22, 40));
				marker.setIcon(image);
				marker.setAnimation(google.maps.Animation.BOUNCE);
				marker.setPosition(place.geometry.location);
				
			});

		}
		 disabled_field(true);
	 	
	 	 <?php if($address!=''){?>
	 	 set_map_center('<?=$address?>');
	 	 <?php }else{?>
	 	 	 google.maps.event.addDomListener(window, 'load', initialize);
	 	 	 <?php }?>
function  empty_field()
		{
			$('#street_address1').val('');
			$('#sublocality_level_1').val('');
			$('#sublocality_level_2').val('');
			$('#administrative_area_level_1').val('');
			$('#locality').val('');
			$('#country').val('');
			$('#postal_code').val('');
			
		}

       function set_address_value(){
		
		var address = '';
		$('#address1errInfo').text("");
		
			
			address = $('#sublocality_level_2').val();
			
			 if($('#sublocality_level_1').val() != '')
			 	{   if(address=='')
			 			{ 
			 				address = $('#sublocality_level_1').val();

						 }else
						 {
							 address += ', '+$('#sublocality_level_1').val();
						}
				 }
			 	
			 

			 if($('#locality').val() != ''){
				if(address=='')
			 			{ 
			 				address = $('#locality').val();

						 }else
						 {
							 address += ', '+$('#locality').val();
						}
			 }

			 if($('#administrative_area_level_1').val() != ''){
				 if(address=='')
			 			{ 
			 				address = $('#administrative_area_level_1').val();

						 }else
						 {
							 address += ', '+$('#administrative_area_level_1').val();
						}
			 }
			 if($('#country').val() != ''){
				 if(address=='')
			 			{ 
			 				address = $('#country').val();

						 }else
						 {
							 address += ', '+$('#country').val();
						}
			 }

			 if($('#postal_code').val() != ''){
				 if(address=='')
			 			{ 
			 				address = $('#postal_code').val();

						 }else
						 {
							 address += ', '+$('#postal_code').val();
						}
			 }

			$('#street_address1').val(address);
			set_map_center(address);
			
	}

    function set_map_center(address){
    	var geocoder = new google.maps.Geocoder();
		var mapOptions = { zoom: 13 };
		var markersArray = [];
		var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
		geocoder.geocode({'address': address}, function(results, status) {
          if(status == google.maps.GeocoderStatus.OK) 
          {
               result = results[0].geometry.location;
               map.setCenter(result);
               marker = new google.maps.Marker({
                   map: map,
                   position: results[0].geometry.location,
                   animation: google.maps.Animation.BOUNCE,
             	});
             	markersArray.push(marker);
     		               
               
          }
		});	
	}

    function limitText(limitField, limitCount, limitNum) {

		if (limitField.value.length > limitNum) {
			limitField.value = limitField.value.substring(0, limitNum);
		} else {
			limitCount.value = limitNum - limitField.value.length;
		}
		name = limitField.value; 
		if(name==''){
	    	name="<?php echo UNTITLE_EVENT;?>";
	    }
	     $('#event_title_h3').text(name);
		name = name.replace(/[^a-zA-Z 0-9-]+/g,'').toLowerCase().replace(/\s/g,'-');

	    $('#event_url_link').val(name); 
	}

	function set_online(disp_div,hide_div,val){
		
		$('#online_event_option').val(val);
		$('#'+hide_div).hide();
		$('#'+disp_div).show();
		if(hide_div=='add_div')
		{
			$('#map_div').hide();
		   $('#New_venue').hide();
		   $('#show_on_map_div').hide();
		  
		}
		if(disp_div=='add_div')
		{
			
			$('#venue_location').show();
			$('#venue_list').show();
		    $('#venue_address_div').hide();
		    $('#new_address').val(0);
		    $('#show_on_map_div').show();

		    var address = $('#venue_location_field').val();

		    set_map_center(address);
		   
		}

	}
	function show_div(disp_div,hide_div,val){
		if(val!=''){
		$('#new_address').val(val);
		}
		$('#'+hide_div).hide();
		$('#'+disp_div).show();
		if(disp_div=='New_venue')
			{
				
			 $('#vanue_name').val('');
		  
		      empty_field();
		     $('#map_div').hide();
		     $('#venue_location').hide();
		      $('#location').show();
		     show_div('','venue_address_div','');

		     disabled_field(false);
				initialize('','');
		//	initialize('','');
			}
		if(disp_div=='venue_list')
		{
			$('#vanue_name').val('Venue');
		    $('#street_address1').val('Location');
		    $('#venue_address_div').hide();
		    $('#map_div').hide();
		    $('#venue_location').show();
		     
		     disabled_field(true);
				
		}
		if(disp_div=='location')
			{
			    empty_field();
			    $('#map_div').hide();
			}
		if(disp_div=='venue_address_div')
			{
		   		  $('#map_div').show();
		   		 $('#venue_location').hide();
			}
			
			
			
	}

	function disabled_field(val)
	{
		$('#sublocality_level_2').attr("disabled", val) ;
		$('#sublocality_level_1').attr("disabled", val) ;
		$('#locality').attr("disabled", val) ;
		$('#administrative_area_level_1').attr("disabled", val) ;
		$('#country').attr("disabled", val) ;
		$('#postal_code').attr("disabled", val) ;
	}
</script>

<div id="add_mor_divs">	

  <?php //======================== Free Ticket Start ========================== ?> 
<table style="display:none;" class="inner_content_two" id="more2">
       <tbody>
       
        <tr>
          <td><input maxlength="30" type="text" onkeyup="set_sales_status(this,'free','1');" id="free_ticket_name_1" name="free_ticket_name[]" placeholder="<?php echo General_Admission;?>"></td>
          <td><input type="text" onchange="set_event_capacity(this,'1','free');" autocomplete="off" id="free_qty_1" name="free_qty[]" ></td>
          <td>&nbsp;</td>
          <td class="PadT2"><?php echo Free; ?></td>
          <td>&nbsp;</td>
          <td class="text-center"><span id="free_sales_1"><span class="LinH40"><?php echo Incomplete; ?></span><input type="hidden" value="0" name="free_ticket_status[]"></span></td>
          <td class="text-center back-plain" id="example"><a href="javascript://" data-toggle="tooltip" data-placement="right" title="<?php echo Ticket_Setting; ?>" onclick="set_free_ticket_info('free_ticket_info_1','show');"><span class="setting"><i class="glyphicon glyphicon-cog"></i></span></a></td>
	      <td class="text-center"><a onclick="remove_ticket_div(1);" href="javascript://" data-toggle="tooltip" data-placement="right" title="<?php echo Ticket_Delete; ?>"><span class="setting"><i class="glyphicon glyphicon-trash"></i></span></a></td>                               	  
        </tr>
        
        <tr id="free_ticket_info_1" style="display : none;">
          <td colspan="8" class="back-grey creat_TS_td" >
          
	          <div class="col-sm-3 col-xs-12 lable-rite">
	          	<label class="boldL_sm"><?php echo Ticket_Description;?></label>
	          </div>
	          
	          <div class="col-sm-8 col-xs-12 m10 mb10">
	          	<input type="text" name="free_description[]" id="free_description" onkeyup="if($.trim(this.value)=='') {$('#free_hide_description1').prop('disabled',true).prop('checked', false); }else {$('#free_hide_description1').prop('disabled',false);} " autocomplete="off">
	          	<p class="fromText"><?php echo Maximum_50_characters; ?></p>
	          	<div class="radio">
		          	<label>
		          		<input autocomplete="off" value="1" type="checkbox" onclick="set_hide_description(this,'free','1')" id="free_hide_description1" disabled>
						<?php echo Hide_description_on_event_pages;?>
						<input class="hideDescription" autocomplete="off" type="hidden" name="free_hide_description[]" value="0">
					</label>
	          	</div>
	          </div>
	          <div class="clear"></div>

	          <div class="col-sm-3 col-xs-12 lable-rite">
	          	<label class="boldL_sm"><?php echo Date_Time;?> </label>
	          </div>

	          <div class="col-sm-2 col-xs-12 m10 mb10">
	          	<label><?php echo Sales_Starts;?></label>
	          	<input type="text" readonly="readonly" value="" class="free_start_sale_date" name="free_start_sale_date[]" id="dp1403068137981">
	          </div>
	          
	          <div class="col-sm-2 col-xs-12 m10 mb10">
	          	<label class="hide-sm">&nbsp;</label>
	          	<input type="text" value=""  class="free_start_sale_time" name="free_start_sale_time[]" id="dp1403068137981">
	          </div>

	          <div class="col-sm-2 col-xs-12 m10 mb10">
	          	<label><?php echo Sales_Ends;?></label>
	          	<input type="text" readonly="readonly" value=""  class="free_end_sale_date" name="free_end_sale_date[]" id="dp1403068137982">
	          </div>   
	          
	          <div class="col-sm-2 col-xs-12 m10 mb10">
	          	<label class="hide-sm">&nbsp;</label>
	          	<input type="text"  value=""  class="free_end_sale_time" name="free_end_sale_time[]" id="dp1403068137982">
	          </div> 
	          <div class="clear"></div> 
	          
	          <div class="col-sm-3 col-xs-12 lable-rite">
	          	<label class="hide-sm">&nbsp;</label>
	          </div>
	          <div class="col-sm-8 col-xs-12 m10 mb10">     	
	          	<div class="chks_start_chks_end error"></div> 
	          </div>
	          <div class="clear"></div>  
	          
	          <div class="col-sm-3 col-xs-12 lable-rite">
	          	<label class="boldL_sm"><?php echo Tickets_permitted_per_order;?> </label>
	          </div>

	          
	           <div class="col-sm-4 col-xs-12 m10 mb10">
	          	<label><?php echo Minimum;?></label>
	          	<input type="text" value="1"  onkeyup="return check_ticket_min_qty(this);" id="free_min_purchase" name="free_min_purchase[]">
	          </div>

	          <div class="col-sm-4 col-xs-12 m10 mb10">
	          	<label><?php echo Maximum;?></label>
	          	<input type="text" value="10" onkeyup="return check_ticket_max_qty(this);" id="free_max_purchase" name="free_max_purchase[]">
	          </div>  
	                  	
	          <div class="clear"></div> 
	                
	          
	          <input type="hidden" value="0" id="ticket_id" name="free_ticket_id[]">              
	          
	          <a class="btn-event fr" onclick="set_free_ticket_info('free_ticket_info_1','hide');" href="javascript://"><?php echo Apply;?></a>
  				<div class="clear"></div>
            </td>
        </tr>
      </tbody>
</table>
<?php //======================== Free Ticket End ========================== ?>   
         
<?php //======================== Paid Ticket Start ========================== ?>           
<table style="display:none;" class="inner_content_two" id="more1">
	<tbody>
		 <tr>
          <td><input maxlength="30" type="text" onkeyup="set_sales_status(this,'paid','1');" id="paid_ticket_name_1" name="paid_ticket_name[]" placeholder="<?php echo General_Admission;?>"></td>
          <td><input type="text" onchange="set_event_capacity(this,'1','paid');" autocomplete="off" id="paid_qty_1" name="paid_qty[]"></td>
          <td class="clearfix">
										          
	          <div class="col-sm-11 col-xs-11 pr pleft0">
                      <input type="text" class="paid_price_place" onkeyup="set_fee_and_total('1',this);" autocomplete="off" id="paid_price_1" name="paid_price[]" class="paid_price_place" style="text-align:right;" placeholder="<?php echo getCurrencySymbol($event_id); ?>">
	          </div> 
          
	          <div class="col-sm-1 col-xs-1 tool pre">
	              <div class="tool-hover">
		              <img width=" " height=" " class="" alt=" " src="<?php echo base_url();?>images/i.png">
		              <div class="docs-tooltip" id="docs_tooltip_1"><div class="clearfix"><?php echo Ticket_Price;?> <span> <?php echo set_event_currency('0.00',$event_id); ?>0.00</span></div><div class="clearfix"><?php echo Fee;?>  <span><?php echo set_event_currency('0.00',$currency_code_id); ?>0.00 </span></div><div class="botm-bodr clearfix"> <?php echo Buyer_Total;?> <span> <?php echo set_event_currency('0.00',$currency_code_id); ?>0.00</span></div></div>
	              </div>
              </div>
                                          
          </td>
          <td class="PadT2">
          	<span id="paid_fee_1" class="fee paid_fee_span"><?php echo set_event_currency('0.00',$event_id); ?></span>
          	<input type="hidden" value="" id="paid_fee_val_1" name="paid_fee[]">
          </td>
          <td class="text-center PadT2">
			<span id="paid_total_1" class="fee paid_total_span"><?php echo set_event_currency('0.00',$event_id); ?></span>
          	<input type="hidden" value="" id="paid_total_val_1" name="paid_buyer_total[]">
		  </td>
          <td class="text-center"><span id="paid_sales_1"><span class="LinH40"><?php echo Incomplete; ?></span><input type="hidden" value="0" name="paid_ticket_status[]"></span></td>
          <td class="text-center back-plain" id="example"><a href="javascript://" data-toggle="tooltip" data-placement="right" title="<?php echo Ticket_Setting; ?>" onclick="set_paid_ticket_info('paid_ticket_info_1','show');"><span class="setting"><i class="glyphicon glyphicon-cog"></i></span></a></td>
	      <td class="text-center"><a onclick="remove_paid_ticket_div(1);" href="javascript://" data-toggle="tooltip" data-placement="right" title="<?php echo Ticket_Delete; ?>"><span class="setting"><i class="glyphicon glyphicon-trash"></i></span></a></td>                               	  
        </tr>

        <tr id="paid_ticket_info_1" style="display : none;">
          <td colspan="8" class="back-grey creat_TS_td" >
          
	          <div class="col-sm-3 col-xs-12 lable-rite">
	          	<label><?php echo Ticket_Description;?></label>
	          </div>
	          
	          <div class="col-sm-8 col-xs-12 m10 mb10">
	          	<input type="text" name="paid_description[]" id="paid_description_1" onkeyup="if($.trim(this.value)=='') {$('#paid_hide_description_1').prop('disabled',true).prop('checked', false); }else {$('#paid_hide_description_1').prop('disabled',false);} " autocomplete="off">
	          	<p class="fromText"><?php echo Maximum_50_characters; ?></p>
	          	<div class="radio">
		          	<label>
		          		<input autocomplete="off" value="1" type="checkbox" onclick="set_hide_description(this,'paid','1')" id="paid_hide_description_1" disabled>
						<?php echo Hide_description_on_event_pages;?>
						<input class="hideDescription" autocomplete="off" type="hidden" name="paid_hide_description[]" value="0">
					</label>
	          	</div>
	          </div>
	          <div class="clear"></div>

	          <div class="col-sm-3 col-xs-12 lable-rite">
	          	<label class="boldL_sm"><?php echo Date_Time;?> </label>
	          </div>

	          <div class="col-sm-2 col-xs-12 m10 mb10">
	          	<label><?php echo Sales_Starts;?></label>
	          	<input type="text" readonly="readonly" value="" class="paid_start_sale_date" name="paid_start_sale_date[]" id="dp1403068137981">
	          </div>
	          
	          <div class="col-sm-2 col-xs-12 m10 mb10">
	          	<label  class="hide_xs">&nbsp;</label>
	          	<input type="text" value=""  class="paid_start_sale_time" name="paid_start_sale_time[]" id="dp1403068137982">
	          </div>

	          <div class="col-sm-2 col-xs-12 m10 mb10">
	          	<label><?php echo Sales_Ends;?></label>
	          	<input type="text" readonly="readonly" value=""  class="paid_end_sale_date" name="paid_end_sale_date[]" id="dp1403068137983">
	          </div>   
	          
	          <div class="col-sm-2 col-xs-12 m10 mb10">
	          	<label  class="hide_xs">&nbsp;</label>
	          	<input type="text"  value=""  class="paid_end_sale_time" name="paid_end_sale_time[]" id="dp1403068137984">
	          </div> 
	          <div class="clear"></div> 
	          
	          <div class="col-sm-3 col-xs-12 lable-rite">
	          	<label  class="hide_xs">&nbsp;</label>
	          </div>
	          <div class="col-sm-8 col-xs-12 m10 mb10">     	
	          	<div class="chks_start_chks_end error"></div> 
	          </div>
	          <div class="clear"></div>  
	          
	          <div class="col-sm-3 col-xs-12 lable-rite">
	          	<label  class="boldL_sm"><?php echo Tickets_permitted_per_order;?> </label>
	          </div>

	          <div class="col-sm-4 col-xs-12 m10 mb10">
	          	<label><?php echo Minimum;?></label>
	          	<input type="text" value="1"  onkeyup="return check_ticket_min_qty(this);" id="paid_min_purchase" name="paid_min_purchase[]">
	          </div>

	          <div class="col-sm-4 col-xs-12 m10 mb10">
	          	<label><?php echo Maximum;?></label>
	          	<input type="text" value="10" onkeyup="return check_ticket_max_qty(this);" id="paid_max_purchase" name="paid_max_purchase[]">
	          </div>          	
	          <div class="clear"></div> 
	          
			  <div class="paid_fee_div" style=" display:none;">
				  <div class="col-sm-3 col-xs-12 lable-rite">
		          	<label><?php echo Service_Fees ;?> </label>
		          </div>
	
		          <div class="col-sm-4 col-xs-12 m10 mb10">
		          	<div class="radio">
			          	<label>
			          		<input type="radio" checked="checked" onclick="set_paid_service_fee(this.value,'paid_service_fee_1');" value="1" id="paid_service_fees1" class="paidServiceFees" name="paid_service_fee1[]">
			          		&nbsp;<?php echo Pass_on_the_fees_to_the_ticket_buyer;?>
			          	</label>
		          	</div>
		          	
		          	<div class="radio">
			          	<label>
			          		<input type="radio" onclick="set_paid_service_fee(this.value,'paid_service_fee_1');" value="2" id="paid_service_fees2" class="paidServiceFees" name="paid_service_fee1[]">
			          		&nbsp;<?php echo Absorb_the_fees_into_the_ticket_price;?>
			          	</label>
		          	</div>
		          </div>
		          <input type="hidden" value="1" id="paid_service_fee_1" name="paid_service_fee[]">
	          
	          </div>
	          <div class="clear"></div>
			  
			  
	          <input type="hidden" value="0" id="ticket_id" name="paid_ticket_id[]">             
	          
          	<div class="take-estimate take-estimate-1 text-center" style="display: none;">
			    <h3><?php echo FEES_STRUCTURE;?></h3>
				<ul class="take-estimate-area">
				    <li> 
				        <h5><?php echo Buyer_Total;?></h5>
				        <p class="take-estimate-ticket-amount" id="take-estimate-ticket-amount-1">110.0 $</p>
				    </li>
				    <li class="no-brdr" style="width: 80px;">
				        - {
				    </li>
				    <li> 
				        <h5><?php echo Service_Fees;?> </h5>
				        <p>~<?php echo $site_setting['paid_ticket_fee']; ?>% + <?php echo $site_setting['paid_ticket_flat_fee']; ?></p>
				    </li>
				   
				    <li class="no-brdr">
				        +
				    </li>
				     <li> 
				        <h5><?php echo Gateway_fees;?></h5>
				        <p class="payment_gateway_fee_structure"></p>
				        <!-- <p>2.9% + 0.30¢</p> -->
				    </li>
				   	<li class="no-brdr" style="width: 80px;">
				        } =
				    </li>
				    <li> 
				        <h5><?php echo ACTUAL_TAKE_AWAY;?></h5>
				        <p class="take-away-amount" id="take-away-amount-1">~ 100.2 $</p>
				    </li>
				</ul>
			</div>

          	<div class="clear"></div>
	          <a class="btn-event fr" onclick="set_paid_ticket_info('paid_ticket_info_1','hide');" href="javascript://"><?php echo Apply;?></a>
  				<div class="clear"></div>
            </td>
        </tr>
	</tbody>
</table>
<?php //======================== Paid Ticket End ========================== ?>    

<?php //======================== Donation Ticket Start ========================== ?>                    
<table style="display:none;" class="inner_content_two" id="more3">
	<tbody>
	
		<tr>
          <td><input maxlength="30" type="text" onkeyup="set_sales_status(this,'donation','1');" id="donation_ticket_name_1" name="donation_ticket_name[]" placeholder="<?php echo General_Admission;?>"></td>
          <td><input type="text" onchange="set_event_capacity(this,'1','donation');" autocomplete="off" id="donation_qty_1" name="donation_qty[]"></td>
          <td>&nbsp;</td>
          <td class="PadT2"><?php echo Donation;?></td>
          <td class="text-center PadT2">&nbsp;</td>
          <td class="text-center"><span id="donation_sales_1"><span class="LinH40"><?php echo Incomplete; ?></span><input type="hidden" value="0" name="donation_ticket_status[]"></span></td>
          <td class="text-center back-plain" id="example"><a href="javascript://" data-toggle="tooltip" data-placement="right" title="<?php echo Ticket_Setting; ?>" onclick="set_donation_ticket_info('donation_ticket_info_1','show');"><span class="setting"><i class="glyphicon glyphicon-cog"></i></span></a></td>
	      <td class="text-center"><a onclick="remove_donation_ticket_div(1);" href="javascript://" data-toggle="tooltip" data-placement="right" title="<?php echo Ticket_Delete; ?>"><span class="setting"><i class="glyphicon glyphicon-trash"></i></span></a></td>                               	  
        </tr>

        <tr id="donation_ticket_info_1" style="display:none;">
          <td colspan="8" class="back-grey creat_TS_td">
          
         	 <div class="col-sm-3 col-xs-12 lable-rite">
	          	<label><?php echo Ticket_Description;?></label>
	          </div>
	          
	          <div class="col-sm-8 col-xs-12 m10 mb10">
	          	<input type="text" name="donation_description[]" id="donation_description" onkeyup="if($.trim(this.value)=='') {$('#donation_hide_description1').prop('disabled',true).prop('checked', false); }else {$('#donation_hide_description1').prop('disabled',false);} " autocomplete="off">
	          	<p class="fromText"><?php echo Maximum_50_characters; ?></p>
	          	<div class="radio">
		          	<label>
		          		<input autocomplete="off" value="1" type="checkbox" onclick="set_hide_description(this,'donation','1')" id="donation_hide_description1" disabled>
						<?php echo Hide_description_on_event_pages;?>
						<input class="hideDescription" autocomplete="off" type="hidden" name="donation_hide_description[]" value="0">
					</label>
	          	</div>
	          </div>
	          <div class="clear"></div>
	          
	          <div class="col-sm-3 col-xs-12 lable-rite">
	          	<label><?php echo Date_Time;?> </label>
	          </div>

	          <div class="col-sm-2 col-xs-12 m10 mb10">
	          	<label><?php echo Sales_Starts;?></label>
	          	<input type="text" readonly="readonly" value="" class="donation_start_sale_date" name="donation_start_sale_date[]" id="dp1403068137981">
	          </div>
	          
	          <div class="col-sm-2 col-xs-12 m10 mb10">
	          	<label  class="hide_xs">&nbsp;</label>
	          	<input type="text" value=""  class="donation_start_sale_time" name="donation_start_sale_time[]" id="dp1403068137982">
	          </div>

	          <div class="col-sm-2 col-xs-12 m10 mb10">
	          	<label><?php echo Sales_Ends;?></label>
	          	<input type="text" readonly="readonly" value=""  class="donation_end_sale_date" name="donation_end_sale_date[]" id="dp1403068137983">
	          </div>   
	          
	          <div class="col-sm-2 col-xs-12 m10 mb10">
	          	<label  class="hide_xs">&nbsp;</label>
	          	<input type="text"  value=""  class="donation_end_sale_time" name="donation_end_sale_time[]" id="dp1403068137984">
	          </div> 
	          <div class="clear"></div> 
	          
	          <div class="col-sm-3 col-xs-12 lable-rite">
	          	<label  class="hide_xs">&nbsp;</label>
	          </div>
	          <div class="col-sm-8 col-xs-12 m10 mb10">     	
	          	<div class="chks_start_chks_end error"></div> 
	          </div>
	          <div class="clear"></div>

			  <div class="paid_fee_div" style=" display:none;">
				  <div class="col-sm-3 col-xs-12 lable-rite">
		          	<label><?php echo Service_Fees ;?> </label>
		          </div>
	
		          <div class="col-sm-4 col-xs-12 m10 mb10">
		          	<div class="radio">
			          	<label>
			          		<input type="radio" checked="checked" onclick="set_paid_service_fee(this.value,'donation_service_fee_1');" value="1" id="donation_service_fee1" name="donation_service_fee[]">
			          		&nbsp;<?php echo Pass_on_the_fees_to_the_ticket_buyer;?>
			          	</label>
		          	</div>
		          	
		          	<div class="radio">
			          	<label>
			          		<input type="radio" onclick="set_paid_service_fee(this.value,'donation_service_fee_1');" value="2" id="donation_service_fee2" name="donation_service_fee[]">
			          		&nbsp;<?php echo Absorb_the_fees_into_the_ticket_price;?>
			          	</label>
		          	</div>
		          </div>
		          <input type="hidden" value="1" id="donation_service_fee_1" name="donation_service_fee[]">
	          
	          </div>
	          <div class="clear"></div>
	          
	          <input type="hidden" value="0" id="ticket_id" name="donation_ticket_id[]">            
	          
	          <a class="btn-event fr" onclick="set_donation_ticket_info('donation_ticket_info_1','hide');" href="javascript://"><?php echo Apply;?></a>
	          <div class="clear"></div>
            </td> 
        </tr>
	</tbody>
</table>
<?php //======================== Donation Ticket End ========================== ?>   
</div>
 <link href="<?php echo base_url();?>css/popup.css" rel="stylesheet" />
 <script src="<?php echo base_url();?>js/jquery.magnific-popup.js"></script>
 <script src="<?php echo base_url();?>js/select2-4.0.3/dist/js/select2.min.js"></script>
 <link href="<?php echo base_url();?>js/select2-4.0.3/dist/css/select2.css" rel="stylesheet" />
 <script type="text/javascript">
      $(document).ready(function() {
      	$('select#venue_id').select2();
        $('.mfPopup').magnificPopup({
          type: 'ajax',
          overflowY: 'scroll' // as we know that popup content is tall we set scroll overflow by default to avoid jump
        });
		$('.mfPopupIn').magnificPopup({
          type: 'inline',
          overflowY: 'scroll' // as we know that popup content is tall we set scroll overflow by default to avoid jump
        });

      });
    </script>
    <script src="<?php echo base_url();?>js/rekha_validation.js"></script>
    <script src="<?php echo base_url();?>js/rekha_custom_validation.js"></script>
	<script src="<?php echo base_url();?>js/jquery.form.js" type="text/javascript"></script>
	

     <script type="text/javascript" src="<?php echo base_url();?>css/timepicker/jquery.timepicker.js"></script>
     <script type="text/javascript" src="<?php echo base_url();?>css/timepicker/bootstrap-datepicker.js"></script>
     <script type="text/javascript" src="<?php echo base_url();?>css/timepicker/site.js"></script>
	  
    <script src="<?php echo base_url();?>js/redactor/redactor.min.js"></script>
    <link href="<?php echo base_url();?>css/redactor.css" rel="stylesheet" />
    <script>
    		$(document).ready(function(){
    		$(".rover_tip").popover();
    		$('#event_detail').redactor({
    			minHeight: 200,
    			imageUpload: "<?php echo base_url('event/image_upload') ;?>"
    		});
    		$('#host_description').redactor({
    			minHeight: 200,
    			imageUpload: "<?php echo base_url('event/image_upload') ;?>"
    		});
	});
	</script>
    
    <script>
    		$(document).ready(function(){
    		$(".edit").tooltip();
	});
	</script>
	 <style type="text/css">
     .form-control-error{

		border-color: #a94442 !important;
		-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075)!important;
		box-shadow: inset 0 1px 1px rgba(0,0,0,.075)!important;
     }
     </style>

   <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
             
                frm_submit_type = "save";
            	$(".tool_tip_class").tooltip();
            	
                
                $('.datepicker').datepicker({                    
                    format: "yyyy-mm-dd", 
                    startDate : todayDate
                });

                $('.timepicker').timepicker({                    
                    timeFormat: 'g:i A',
                    minTime: '00:00',
                   	maxTime: '23:45',
                    autoclose: true,
                    ampm: true,
                    'step': 15                    
                });

            });

            function set_end_date_equal_start(){
                
            	var dateval = $("#event_start_date").val();
            	// alert(dateval);
            	var dateval_get = $("#event_start_date").datepicker('getDate');
            	// alert(dateval_get);
            	var end_dateval = $("#event_end_date").val();
            	var timeval = $("#event_start_time").val();
            	var temp_end_date = $("#temp_end_date").val();
            	var datetime = dateval+' '+timeval;
            	var dateval1 = $("#event_end_date").datepicker('getDate');
				if(dateval) {
					$("#event_end_date").datepicker({ format: "yyyy-mm-dd",startDate : todayDate});
					$("#event_end_date").datepicker('update', dateval);
				}
				// if(dateval) {
				//     	var timeval1 = timeval.split(':');
				//     	var hour = timeval1[0];
				//     	var minute = timeval1[1];
				//     	var n = minute.lastIndexOf("AM");
				//     	// console.log(hour);
				//     	if(minute.lastIndexOf("AM") > -1 ){
				    		
				//     		if(parseInt(hour)>=9 && parseInt(hour)==12){
				//     			var n_hour = parseInt(hour) + parseInt(3)+12;
				//     		}else{
				//     			var n_hour = parseInt(hour) + parseInt(3);
				//     		}
				//     	}else{
				    			
				    		
				//     		if(parseInt(hour) >= 9 && parseInt(hour)==12){
				//     			var n_hour = parseInt(hour) + parseInt(3);
				//     		}else{
				//     			var n_hour = parseInt(hour) + parseInt(3)+12;
				//     		}
				//     	}
				//     	if(parseInt(n_hour) >= 24  ){
				// 			    		dateval1.setDate(dateval_get.getDate()+1);
				// 			 	   }else{
				// 			 	   		dateval1.setDate(dateval_get.getDate());
				// 			 	   }
				//     	var hour = n_hour;
				//     	var minute= minute.replace(/AM/g, "").replace(/PM/g, "").trim();
				//     	var timeval2 = hour+':'+minute;


				// 		if($("#event_end_date").val()!="" || $("#event_end_time").val()!=""){
				// 			$("#event_end_date").datepicker({ format: "yyyy-mm-dd",startDate : new Date()});
				// 			$("#event_end_date").datepicker('update', dateval1);
				// 			$("#temp_end_date").datepicker('update', dateval1);
				// 			$("#event_end_time").timepicker({timeFormat:'g:i A', minTime : timeval2,  'step': 15 });
				// 			$("#event_end_time").timepicker('setTime',timeval2);
				// 		}
				// }


            }
            

            function set_end_date_equal_ticket_date(){
            	
            	var dateval = $("#event_end_date").val();
            	var timeval = $("#event_end_time").val();
            	var datetime = dateval+' '+timeval;

            } 
            var is_redirect = true;
            function set_submit_type(type, e, sub_type, redirect=true) { 
            	is_redirect= redirect;  
            	e.preventDefault();
            	var active="<?php echo $active;?>";
            	if($('#event_title').val()==''){
            		$('#event_title').addClass('form-control-error');
            		$('#client_error').css('display', 'block');
            		var error = "<?php echo Event_title_field_is_required; ?>";
            		$('.error_span').text(error);
            		location.hash = '#client_error';
            		$('html, body').animate({
		               scrollTop: $("#client_error").offset().top
		            }, 200);
            		return false;
            	}
            	if(type=='live'|| active=='1'){
            		$('.form-control-error').removeClass('form-control-error');
            	/*Event Title Field is required*/
            	
            	if(($('#new_address').val()=='' || $('#new_address').val()=='0') && $('#online_event_option').val()!='1')
            	{
	            	if($('#venue_id').val()==''){
	            			$('#client_error').css('display', 'block');
	            			$('#venue_id').addClass('form-control-error');
		            		var error = "<?php echo "Please select venue from list"; ?>";
		            		$('.error_span').text(error);
		            		location.hash = '#client_error';	
		            		$('html, body').animate({
		               scrollTop: $("#client_error").offset().top
		            }, 200);
		            		return false;
	            	}
            	}
				           
            	if($('#online_event_option').val()!=="1" && $('#new_address').val()==="1"){
            		
            		if($('#vanue_name').val()==''){
            			$('#vanue_name').addClass('form-control-error');
            			$('#client_error').css('display', 'block');
	            		var error = "<?php echo Venue_name_required; ?>";
	            		$('.error_span').text(error);
	            		location.hash = '#client_error';	
	            		$('html, body').animate({
		               scrollTop: $("#client_error").offset().top
		            }, 200);
	            		return false;
            		}
            		if($('#street_address1').val()==''){
            			$('#street_address1').addClass('form-control-error');
						$('#client_error').css('display', 'block');
	            		var error = "<?php echo Location_required; ?>";
	            		$('.error_span').text(error);
	            		location.hash = '#client_error';	
	            		$('html, body').animate({
		               scrollTop: $("#client_error").offset().top
		            }, 200);
	            		return false;
            		} 
            	}
            	/*End of event title*/

            	if($('#event_start_date').val()=='' || $('#event_end_date').val()=='' || $('#event_start_time').val()=='' || $('#event_end_time').val()==''){
            		if($('#event_start_date').val()==''){
            			$('#event_start_date').addClass('form-control-error');
	            		$('#client_error').css('display', 'block');
	            		var error = "<?php echo Event_start_date_is_required; ?>";
	            		$('.error_span').text(error);
	            		location.hash = '#client_error';
	            		$('html, body').animate({
		               scrollTop: $("#client_error").offset().top
		            }, 200);
	            		return false;
            		}
            		if($('#event_end_date').val()==''){
	            		$('#client_error').css('display', 'block');
	            		$('#event_end_date').addClass('form-control-error');
	            		var error = "<?php echo Event_end_date_is_required; ?>";
	            		$('.error_span').text(error);
	            		location.hash = '#client_error';
	            		$('html, body').animate({
		               scrollTop: $("#client_error").offset().top
		            }, 200);
	            		return false;
            		}
            		if($('#event_start_time').val()==''){
	            		$('#event_start_time').addClass('form-control-error');
	            		$('#client_error').css('display', 'block');

	            		var error = "<?php echo Event_start_time_is_required; ?>";
	            		$('.error_span').text(error);
	            		location.hash = '#client_error';
	            		$('html, body').animate({
		               scrollTop: $("#client_error").offset().top
		            }, 200);
	            		return false;
            		}
            		if($('#event_end_time').val()==''){
            			$('#event_end_time').addClass('form-control-error');
	            		$('#client_error').css('display', 'block');
	            		var error = "<?php echo Event_end_time_is_required; ?>";
	            		$('.error_span').text(error);
	            		location.hash = '#client_error';
	            		$('html, body').animate({
		               scrollTop: $("#client_error").offset().top
		            }, 200);
	            		return false;
            		}
            	}

            	var start_date =new Date($("#event_start_date").val());
		       var end_date = new Date($("#event_end_date").val());

		       if (end_date < start_date) 
		       { 		
		              
		            $('#client_error').css('display', 'block');
		            $('#event_end_date').addClass('form-control-error');
		           	var error = "<?php echo 'Start date must be less than end date'; ?>";
		           	$('.error_span').text(error);
		           	location.hash = '#client_error';		           
					$('html, body').animate({
		               scrollTop: $("#client_error").offset().top
		            }, 200);
		           	return false;
		        } 
		        
		        		
		        if($("#event_start_date").val()==$("#event_end_date").val())
		        { 
		        		var event_start_time = $("#event_start_time");
		        		var event_end_time=$("#event_end_time");
		        		
		        if(event_start_time.val().indexOf("PM") > -1)
		        	{
		        		var event_start_time_val=event_start_time.val().replace('PM', '');
		        		var strt_hr = event_start_time_val.split(':');
		        		if(strt_hr[0]=='12'){
		        			strt_hr[0]='00';
		        		}
						//var star_time = (parseInt(strt_hr[0])+12)+':'+strt_hr[1];
						var star_time = (parseInt(strt_hr[0])+12)+':'+strt_hr[1];
						
		        	}
		        	 if(event_start_time.val().indexOf("AM") > -1)
		        	{
		        		var event_start_time_val=event_start_time.val().replace('AM', '');
		        		var strt_hr = event_start_time_val.split(':');
		        		if(parseInt(strt_hr[0])==12){
		        			strt_hr[0]='00';
		        		}

						var star_time = (parseInt(strt_hr[0]))+':'+strt_hr[1];
						
		        	}
		        	if(event_end_time.val().indexOf("PM") > -1)
		        	{
		        		var event_end_time_val=event_end_time.val().replace('PM', '');
		        		var strt_hr = event_end_time_val.split(':');
		        		if(strt_hr[0]=='12'){
		        			strt_hr[0]='00';
		        		}
						//var end_time = (parseInt(strt_hr[0])+12)+':'+strt_hr[1];
						var end_time = (parseInt(strt_hr[0])+12)+':'+strt_hr[1];
						
		        	}
		        	 if(event_end_time.val().indexOf("AM") > -1)
		        	{
		        		var event_end_time_val=event_end_time.val().replace('AM', '');
		        		var strt_hr = event_end_time_val.split(':');
		        		if(strt_hr[0]=='12'){
		        			strt_hr[0]='00';
		        		}
						var end_time = (parseInt(strt_hr[0]))+':'+strt_hr[1];
						
		        	}
		        		
					   
						var strt_hr = event_start_time_val.split(':');
						var strt = star_time;
						var endd =end_time;
					
						endd = parseInt(endd.replace(':', ''), 10); 
						strt = parseInt(strt.replace(':', ''), 10); 
					   
							if(endd<strt)
							{
								$('#event_end_time').addClass('form-control-error');
								$('#client_error').css('display', 'block');
			            		var error = "<?php echo EVENT_END_TIME_MUST_BE_GREATER_THAN_START_TIME;?> ";
			            		$('.error_span').text(error);
			            		location.hash = '#client_error';
			            		$('html, body').animate({
				               scrollTop: $("#client_error").offset().top
				        	    }, 200);
		            		return false;	
						}
					

		        }
            	 if($('#flyer_images').val()==''){
            		$('#flyer_images_text').addClass('form-control-error');
					$('#client_error').css('display', 'block');
            		var error = "<?php echo IMAGE_FLYER_IS_REQUIRED; ?>";
            		$('.error_span').text(error);
            		$('html, body').animate({
		               scrollTop: $("#client_error").offset().top
		            }, 200);
            		return false;
            	}

            	 if($('#event_detail').val()==''){
            		$('#eventdetailInfo').addClass('form-control-error');
					$('#client_error').css('display', 'block');
            		var error = "<?php echo Event_details_is_required; ?>";
            		$('.error_span').text(error);
            		$('html, body').animate({
		               scrollTop: $("#client_error").offset().top
		            }, 200);
            		return false;
            	}


       		    if($('#organization_unnamed').css('display')=='block'){
								if($('#organiser_id_event').val()==''){ 
									$('#organiser_id_event').addClass('form-control-error');
									$('#client_error').css('display', 'block');
				            		var error = "<?php echo Organizer_is_required; ?>";
				            		$('.error_span').text(error);
				            		location.hash = '#client_error';
				            		$('html, body').animate({
						               scrollTop: $("#client_error").offset().top
						            }, 200);
				            		return false;
				            	}else{
				            		var count_org = "<?php echo count($organizers); ?>";
				            		if(count_org==0){
				            			if($('#organizer_host').val()==''){
				            				$('#organizer_host').addClass('form-control-error');
					            			$('#client_error').css('display', 'block');
						            		var error = "<?php echo organizer_host_required; ?>";
						            		$('.error_span').text(error);
						            		location.hash = '#client_error';
						            		$('html, body').animate({
						               scrollTop: $("#client_error").offset().top
						            }, 200);
						            		return false;	
					            		}
				            		}            		
				            	}
            		}else{
            			if($('#organizer_host').val()==''){ 
									$('#organizer_host').addClass('form-control-error');
									$('#client_error').css('display', 'block');
				            		var error = "<?php echo Organizer_is_required; ?>";
				            		$('.error_span').text(error);
				            		location.hash = '#client_error';
				            		$('html, body').animate({
						               scrollTop: $("#client_error").offset().top
						            }, 200);
				            		return false;
				        }
				        if($('#host_description').val()==''){ 
									$('#host_description').addClass('form-control-error');
									$('#client_error').css('display', 'block');
				            		var error = "<?php echo ORGANIZER_DESCRIPTION_IS_REQUIRED; ?>";
				            		$('.error_span').text(error);
				            		location.hash = '#client_error';
				            		$('html, body').animate({
						               scrollTop: $("#client_error").offset().top
						            }, 200);
				            		return false;
				        }

            		}

            	/*Event Capacity Field is required*/
            	/*End of event capacity */

            	/*Event Customize Web Address is required*/
            	if($('#event_url_link').val()==''){
            		$('#event_url_link').addClass('form-control-error');
            		$('#client_error').css('display', 'block');
            		var error = "<?php echo Customize_Web_Address_required; ?>";
            		$('.error_span').text(error);
            		location.hash = '#client_error';
            		$('html, body').animate({
		               scrollTop: $("#client_error").offset().top
		            }, 200);
            		return false;
            	}
            	/*End of customize web address */
            	
            	/*Event Customize Web Address is required*/
            	if($('#keep_private1').is(':checked')){
	            	if($('#category').val()==''){
	            		$('#category').addClass('form-control-error');
	            		$('#client_error').css('display', 'block');
	            		var error = "<?php echo "Event Category field is required"; ?>";
	            		$('.error_span').text(error);
	            		location.hash = '#client_error';
	            		$('html, body').animate({
		               scrollTop: $("#client_error").offset().top
		            }, 200);
	            		return false;
	            	}
	          	if($('#subcategory').val()=='NO_TOPIC'){
	          		$('#ev').addClass('form-control-error');
	            		$('#client_error').css('display', 'block');
	            		var error = "<?php echo "Sub Category field is required"; ?>";
	            		$('.error_span').text(error);
	            		location.hash = '#client_error';
	            		$('html, body').animate({
		               scrollTop: $("#client_error").offset().top
		            }, 200);
	            		return false;
	            	}
					if($('#event_type_id').val()==''){
						$('#event_type_id').addClass('form-control-error');
						$('#client_error').css('display', 'block');
						var error = "<?php echo "Event Type field is required"; ?>";
						$('.error_span').text(error);
						location.hash = '#client_error';
						$('html, body').animate({
						scrollTop: $("#client_error").offset().top
					}, 200);
						return false;
					}
            	}

            	if($('#keep_private2').is(':checked')){
	            	if($('#password_protect').is(":checked")){
	            		if($('#password_value').val()==''){
	            			$('#password_value').addClass('form-control-error');
			            	$('#client_error').css('display', 'block');
		            		var error = "<?php echo Password_is_required; ?>";
		            		$('.error_span').text(error);
		            		location.hash = '#client_error';
		            		$('html, body').animate({
		               scrollTop: $("#client_error").offset().top
		            }, 200);
		            		return false;		
	            		}
	            	}
            	}
            	/*End of customize web address */

            	if($('#vanue_name')=='')
              	{
              		$('#vanue_name').focus();
              		return false;
              	}
             }
            	// document.getElementById('submit_type').value = type;
          	
				if(sub_type == "save_live") {
					frm_submit_type = "save_before_live";
            		document.getElementById('submit_type').value = "save";
				} else {
            		document.getElementById('submit_type').value = type;
				}
				show_loader();

				$('#create_event_form').submit();
            	// return true;
            }
			if ((pic = jQuery('#create_event_form')).length)
				pic.ajaxForm({
					dataType: 'json',
					beforeSerialize: function(form, options) {

					},
					beforeSubmit: function() {
					},
					beforeSend: function () {
					},
					success: function (result) {
						window.onbeforeunload = null;
						// if(result.event_ticket_view) {
						// 	$('#add_more_div_1').html(result.event_ticket_view);
						// }

						if(result.errorMsg) {
							// console.log('in');
							if(result.redirect) {
								if(!is_redirect){
								window.location.href = "<?php echo site_url();?>seat_plan/seat/<?php echo $event_id;?> ?step=step1&plan_id=<?php echo $event_id;?>"
								hide_loader();
								return false;
								
							}
								hide_loader();
								window.location.href = result.redirect;
							} else {
								$('#publish_event').attr('onclick', "return set_submit_type('live', event, 'save_live')");
								$('.error_span').html(result.errorMsg);
								$('#client_error').css('display', 'block');
								location.hash = '#client_error';
								$('html, body').animate({
									scrollTop: $("#client_error").offset().top
								}, 200);
							}
							hide_loader();
						} else {
							// console.log('out');
							if(!is_redirect){
								window.location.href = "<?php echo site_url();?>seat_plan/seat/<?php echo $event_id;?> ?step=step1&plan_id=<?php echo $event_id;?>"
								hide_loader();
								return false;
								
							}
							if(frm_submit_type == 'save_before_live') {
								$('#create_event_form').attr('action', "<?php echo base_url('event/make_live/'.$event_id); ?>");
								$('#publish_event').attr('onclick', "return set_submit_type('live', event, 'live')");
								$('#publish_event').click();
								frm_submit_type = "live";
							} else if(result.redirect) {

								hide_loader();
								window.location.href = result.redirect;
							} else {
								hide_loader();
							}
						}
					},
				});

            function DisableSpace() {

            	var str = $('#password_value').val();
            	
            	if(str.length=="0"){
            		if (event.keyCode == 32) {
                		event.returnValue = false;
                		return false;
            		}	
            	}
            	
        	}
            
            function show_repeat_div(chk,div){
            	
        		var event_start_date = $("#event_start_date");
        		var eventstartdateInfo = $("#eventstartdateInfo");
        		
        		var event_start_time = $("#event_start_time");
        		var eventstarttimeInfo = $("#eventstarttimeInfo");
        	
        		var event_end_date = $("#event_end_date");
        		var eventenddateInfo = $("#eventenddateInfo");
        		
        		var event_end_time = $("#event_end_time");
        		var eventendtimeInfo = $("#eventendtimeInfo");
        		
        		if(div!='social_link'){
        			if(event_start_date.val()==''){
        				document.getElementById(chk).checked=false;
        				event_start_date.focus();
        				eventstartdateInfo.text("<?php echo event_start_date;?>");
        				eventstartdateInfo.addClass("error");
        				return false;
        			}

        			if(event_start_time.val()==''){
        				document.getElementById(chk).checked=false;
        				event_start_time.focus();
        				eventstarttimeInfo.text("<?php echo event_start_time;?>");
        				eventstarttimeInfo.addClass("error");
        				return false;
        			}
        			
        			if(event_end_date.val()==''){
        				document.getElementById(chk).checked=false;
        				event_end_date.focus();
        				eventenddateInfo.text("<?php echo event_end_date;?>");
        				eventenddateInfo.addClass("error");
        				return false;
        			}

					if(event_end_time.val()==''){
        				document.getElementById(chk).checked=false;
        				event_end_time.focus();
        				eventendtimeInfo.text("<?php echo event_end_time;?>");
        				eventendtimeInfo.addClass("error");
        				return false;
        			}
        		}
        		eventstartdateInfo.text("");
        		eventstarttimeInfo.text("");
        		eventenddateInfo.text("");
        		eventendtimeInfo.text("");
        		
        		if(document.getElementById(chk).checked==true){
        			$("#"+div).css({ display: "block" });
        		}else{
        			$("#"+div).css({ display: "none" });
        		}	
        	}

			function set_time_zone(){
            	
            	var tzval = $("#event_time_zone").val();
            	$("#event_event_time_zone").val(tzval);
            	var magnificPopup = $.magnificPopup.instance; 
				magnificPopup.close(); 
            	
            } 
            
            function set_new_repeat(val){

            	$('#event_repeat').val(val);
            	var dateval = $("#event_start_date").val();

            	if(val==4){
            		$('#spec_start_date').val(dateval);
            		$('#spec_start_time').val($("#event_start_time").val());
            		$('#spec_end_date').val($("#event_end_date").val());
            		$('#spec_end_time').val($("#event_end_time").val());	
            	}
            	
            	if(val > 0){
            		document.getElementById("repeat_anchor_tag").href='#repeat_div_pop'+val;
            		$(".repeat_datepicker").datepicker({ format: "yyyy-mm-dd", startDate : dateval});
            		$('#repeat_anchor_tag').trigger('click');
            		
            	}else{
            		$('#show_repeat_info').html('');
            		$('#manual_date_div').css({display:"block"});
            		$('#cust_date_div').css({display:"none"});
            		$('#event_event_repeat_text').val('');
            	}
            	
            	$("#event_repeat1").find('option:selected').bind('click', function() {
            	     set_new_repeat($(this).val());
            	});	
            }

            

            function save_event_repeat(val){

            	$("#event_repeat").val(val);
            	var ret=false;
            	
            	var sdate = $("#event_start_date").val()+' '+$("#event_start_time").val();
            	var endate = $("#event_end_date").val()+' '+$("#event_end_time").val();

            	var strtime = sdate.split(' ');
        		var endtime = endate.split(' ');
        		
            	$("#manual_date_div").css({ display: "block" });
            	$("#cust_date_div").css({ display: "none" });
            	
            	var dayarr = { 1: "<?php echo monday;?>",    2: "<?php echo tuesday;?>",   3: "<?php echo wednesday;?>",   4: "<?php echo thursday;?>",   5: "<?php echo friday;?>",   6: "<?php echo saturday;?>",   7: "<?php echo sunday;?>"};
            				
            	if(val==1){
            		var eday = $("#daily_repeat_day").val();
            		var edate = $("#daily_end_date").val();
            		
            		if(edate <= endtime[0]){
            			$("#daily_date_error").html('');

            			var repeatinfo = '<?php echo Every;?> '+eday+' <?php echo Day_s;?>: '+strtime[1]+' <?php echo to;?> '+endtime[1]+' <?php echo until;?> '+edate+' [<?php echo anchor('javascript://',Edit,'onclick="set_new_repeat(1);"') ;?>]';
            			$("#show_repeat_info").html(repeatinfo);
            			$("#daily").val(1);
            			$("#weekly").val(0);
            			$("#monthly").val(0);
            			$("#other_specific").val(0);
            			$("#event_repeat_text").val(repeatinfo);
            			ret = true;
            		}else{
            			$("#daily_date_error").html("<?php echo The_repeat_end_date_cannot_be_after_the_event_end_date;?>");
            		}
            	}
            	
            	if(val==2){
                	
            		var wday = $("#weekly_repeat_week").val(); 
            		var dayname = document.getElementsByName('weekly_repeat_day[]');
            		var edate = $("#weekly_end_date").val(); 

            		 var chk = 0, daysn='';
            		 for (var i = 0; i < dayname.length; i++)
                     {
                     	 if(dayname[i].checked==true){
                     	 	chk=1;
                     	 	if(daysn=='') daysn=dayarr[dayname[i].value];
                     	 	else daysn+=' &'+dayarr[dayname[i].value];
                     	 }
                     }

            		$("#weekly_day_error").html('');
            		$("#weekly_date_error").html('');
            		
            		if(chk==0){
            			$("#weekly_day_error").html("<?php echo Please_choose_at_least_one_day;?>");
            		}
            		else if(edate < strtime[0]){
            			$("#weekly_date_error").html("<?php echo The_repeat_end_date_cannot_be_before_the_event_start_date;?>");
            		}else{

            			var repeatinfo = '<?php echo Every;?> '+wday+' <?php echo weeks?> - '+daysn+': '+strtime[1]+' <?php echo to;?> '+endtime[0]+' <?php echo until;?> '+edate+' [<?php echo anchor('javascript://',Edit,'onclick="set_new_repeat(2);"') ;?>]';
            			$("#show_repeat_info").html(repeatinfo);
            			$("#daily").val(0);
            			$("#weekly").val(1);
            			$("#monthly").val(0);
            			$("#other_specific").val(0);
            			$("#event_repeat_text").val(repeatinfo);
            			ret = true;	
            		}
            	}
            	
            	if(val==3){
            		var mday = $("#monthly_repeat_day").val(); 
            		var mdaynum = $("#monthly_repeat_day_num").val(); 
            		var mnum = $("#monthly_repeat_months").val(); 
            		var edate = $("#monthly_end_date").val(); 

            				
                    var cntarr = { 1: "<?php echo first; ?>",    2: "<?php echo second; ?>",   3: "<?php echo third; ?>",   4: "<?php echo fourth; ?>",   5: "<?php echo fifth; ?>",   6: "<?php echo last; ?>" };		
                        	
            		if(edate < strtime[0]){
            			$("#show_repeat_info").html("<?php echo The_repeat_end_date_cannot_be_before_the_event_start_date;?>");
            		}else{
                		
            			var type = $("#repeat_monthly_repeat_on").val();
            			document.getElementById('monthly_date_error').innerHTML = '';
            			if(type==0){
            				$("#show_repeat_info").html('<?php echo Every;?>'+mnum+' <?php echo months;?>, <?php echo Day;?> '+mdaynum+' <?php echo of_the_month;?>: '+strtime[1]+' <?php echo to;?> '+endtime[0]+'  <?php echo until;?> '+edate+' [<?php echo anchor('javascript://',Edit,'onclick="set_new_repeat(3);"')?>]');
            			}else{
            				$("#show_repeat_info").html('<?php echo Every;?> '+mnum+' <?php echo months;?>, '+cntarr[mnum]+' '+dayarr[mday]+' <?php echo of_every_month;?>: '+strtime[1]+' <?php echo to;?> '+endtime[0]+' <?php echo until;?> '+edate+' [<?php echo anchor('javascript://',Edit,'onclick="set_new_repeat(3);"')?>]');
            			}

                		$("#daily").val(0);
                		$("#weekly").val(0);
                		$("#monthly").val(1);
                		$("#other_specific").val(0);
                		$("#event_repeat_text").val($("#show_repeat_info").html());
                		ret = true;	
            		}
            	}
            	
            	if(val==4){
                	
            		var spec_cnt = $("#spec_cnt").val(); 

            		var spstdate = $("#spec_start_date").val();
             		var spendate = $("#spec_end_date").val();

             		var spsttime = $("#spec_start_time").val();
             		var spentime = $("#spec_end_time").val();

             		if(spsttime == ''){
             			$("#spec_start_time_error").html("<?php echo event_start_time; ?>");
             		}
             		else if(spentime == ''){
             			$("#spec_end_time_error").html("<?php echo event_end_time; ?>");
                 	}
             		else if(spendate < spstdate){
             			$("#spec_end_date_error").html("<?php echo The_repeat_end_date_cannot_be_before_the_event_start_date; ?>");
             		}else{
            		
	            		if(spec_cnt > 0){
	            			
	            			$("#spec_your_date_error").html('');
	            			var date_content = $("#your_date_content").html(); 
	            			date_content = date_content.replace('on the following days: [<a href="javascript:" onclick="set_new_repeat(4);"><?php echo Edit;?></a>]<br>','');
	            			
	            			var repeatinfo = 'on the following days: [<a href="javascript:" onclick="set_new_repeat(4);"><?php echo Edit;?></a>]<br />'+date_content;
	            			$("#show_repeat_info").html(repeatinfo); 
	            			$("#manual_date_div").css({ display: "none" });
	            			$("#cust_date_div").css({ display: "inline-block" });
	            			$("#daily").val(0);
	                		$("#weekly").val(0);
	                		$("#monthly").val(0);
	                		$("#other_specific").val(1);
	            			$("#event_repeat_text").val(repeatinfo); 
	            			$("#your_date_text").val($("#your_date").html());
	            			ret = true;
	            		}else{
	            			$("#spec_your_date_error").html("<?php echo Please_add_custom_dates_to_your_repeating_event;?>");
	            		}
	            	}
            		
            	} 
            	if(ret==true){
            		var magnificPopup = $.magnificPopup.instance; 
					magnificPopup.close(); 
            	}
            } 

            function select_by_day_of_week(showd,hided,val){

            	$("#"+showd).css({ display: "block" });
            	$("#"+hided).css({ display: "none" });
            	
            	if(val=='0'){
            		$("#repeat_monthly_repeat_on").val(val);
            	}else{
            		$("#repeat_monthly_repeat_on").val($("#monthly_repeat_on").val());
            	}
            }

            function monthly_repeat_on(val){
            	$("#repeat_monthly_repeat_on").val(val);
            }

            function show_your_date(){
         		
         		var spstdate = $("#spec_start_date").val()+' '+$("#spec_start_time").val();
         		var spendate = $("#spec_end_date").val()+' '+$("#spec_end_time").val();
         		
         		if(spendate < spstdate){
         			$("#spec_end_date_error").html("<?php echo The_repeat_end_date_cannot_be_before_the_event_start_date; ?>");
         		}else{

         			$("#your_date_display").css({ display: "block" });
         			$("#spec_end_date_error").html('');
        	 		
        	 		var spec_cnt = $("#spec_cnt").val();
        	 		spec_cnt++;
        	 		$("#spec_cnt").val(spec_cnt);
        	 		var content = $("#your_date").html();
        	 		var date_content = $("#your_date_content").html();
        	 		
        	 		var strtime = spstdate.split(' ');
        	 		var endtime = spendate.split(' ');
        	 		
        	 		var content = content +'<div  id="your_date_text'+spec_cnt+'"class="col-xs-12"><label><?php echo FROM;?> '+strtime[0]+' '+strtime[1]+' <?php echo to;?> '+endtime[0]+' '+endtime[1]+'</label><img src="<?php echo base_url();?>/admin_images/eb_close-fc.png" onclick="remove_your_date('+spec_cnt+')" style="margin-left:20%;" /><div class="clear"></div></div>';
        	 		var date_content = date_content + '<div class="your_date_text_con'+spec_cnt+' cust_date_mar_20"> <?php echo FROM;?> '+strtime[0]+' '+strtime[1]+' <?php echo to;?> '+endtime[0]+' '+strtime[1]+'</div>';

        	 		$("#your_date").html(content);
        	 		$("#your_date_content").html(date_content);
        	 	}	
        }

        function remove_your_date(id){
        	$('#your_date_text'+id).remove();
        	var e = $("#your_date_content"); 

        	var cusid_ele = $(".your_date_text_con"+id);
        	for (var i = 0; i < 2; ++i) {
        	    var item = cusid_ele[i];  
        	   $('#your_date_content .your_date_text_con'+id).remove();
        	}
        	
        	var spec_cnt = $("#spec_cnt").val(); 
        	spec_cnt--;
        	$("#spec_cnt").val(spec_cnt); 

        	if(spec_cnt==0 || spec_cnt=='0'){
        		$("#your_date_display").css({ display: "none" });
        	}	
        }

        function show_organization(disp_div,hide_div,id,type){
        	if(id=='org'){
        		id = $("#org_event_id").val(); 
        	}
        	if(type=='can'){
        		$("#organizer_id").val(id); 
        		$("#"+hide_div).css({ display: "none" });
        		$("#"+disp_div).css({ display: "block" });
        	}
        	else if(type=='add'){
        		$("#organizer_id").val(id); 
        		$("#organizer_host").val(''); 
        		$("#host_description").val(''); 

        		$("#"+hide_div).css({ display: "none" });
        		$("#"+disp_div).css({ display: "block" });
        	}
        	else if(type=='edit'){
        		$("#organizer_id").val(id); 

        		if(id == ''){

        			$("#selectorganizererrorInfo").focus();
        			$("#selectorganizererrorInfo").html("<?php echo Please_choose_at_least_one_organizer;?>");
    				$("#selectorganizererrorInfo").addClass("error");

        		} else { 
            		
        			$("#selectorganizererrorInfo").html('');
        			document.getElementById("organizer_edit_anchor_tag").href="<?php echo site_url('event/edit_organizer')?>/"+id;
            		$('#organizer_edit_anchor_tag').trigger('click');
        		}

        	}
        	else{
        		$("#"+hide_div).css({ display: "none" });
        		$("#"+disp_div).css({ display: "block" });
        	}
        }

        
        var glob_submit=false;    
        
        
        // This submits the primary baseball picture form when the file upload name changes //
        $(function() {
        	$('.upload_user_picture').on('change', function(event) {
         	check=true;
        	if(glob_submit==false)
        	{  
          		glob_submit=true;    
          		var chks = document.getElementById('upload_datafile');
                if (chks.value=='')
                {
                        check=false;
        				var dv = document.getElementById('err1');
        				dv.innerHTML = "<?php echo Event_Logo_is_required;?>";
        				dv.style.display='block';
        				dv.style.color='#f00';
        			  	hasChecked = true;
                        glob_submit=false;
        				return false;
                } else {
        				value = chks.value;
        				t1 = value.substring(value.lastIndexOf('.') + 1,value.length);
        				if( t1=='jpg' || t1=='jpeg' || t1=='gif' || t1=='png' || t1=='JPEG' || t1=='JPG'  ||  t1=='PNG' || t1=='GIF')
        				{
        					document.getElementById('err1').style.display='none';
        					check=true;
        				}
        				else
        				{						
        					check=false;
        					i=0;
        					var dv = document.getElementById('err1');
        					dv.innerHTML = "<?php echo Event_Logo_type_is_not_valid;?>";
        					dv.style.display='block';
        					dv.style.color='#f00';
        					hasChecked = true;
        					glob_submit=false;
        					return false;
        				}	
        		}

           if(check==true){
        		$('#progressbar').show();
        		$('#picture_file_field_display1').hide();
        		$('#edit_user_picture_file').children().remove();
        		$(this).prependTo('#edit_user_picture_file').addClass('hidden-file-field');
        		$('#user_picture').submit();
        		$(this).clone(true).appendTo(".upload_img").removeClass('hidden-file-field');	
        	}
        	}//main if for true/false	
          });
          
        });

        $(document).ready(function() 
        {
          // bind form id and provide a simple callback function
	         if ((pic = jQuery('#user_picture')).length )
	              pic.ajaxForm({dataType: 'json',
	              success: onSuccess1,
	              error: onError1,
	              complete: onComplete1,
	         });
          // bind form id and provide a simple callback function
         });

        function onError1(jqXHR, textStatus, errorThrown) {
         glob_submit=false;
        }
        
        function onComplete1(jqXHR, textStatus) {
          glob_submit=false;
        }
        
        var new_img='';
        var error ='';
        function onSuccess1(data, textStatus, jqXHR)
        {
        	glob_submit=false;
            new_img = data.msg.image; 
            error =  data.msg.error; 
         
            if(error != '') {
            	 $("#err1").html(error);
            	 $("#picture_file_field_display1").html('<img src="<?php echo base_url().'images/bimage.png';?>" alt="" width="64" height="64" id="img_thumb" />');
            	 $('#picture_file_field_display1').show();
            	 $('#progressbar').hide();
		         $('#picture_file_field_display1 img').show(); 
		         $('#err1').show(); 
            } else {
            	  $("#err1").html('');	
	        	  $("#picture_file_field_display1").html('<img src="'+ base_url +'upload/event/thumb/'+ new_img +'" alt="" width="64" height="64" id="img_thumb" /><br /><a href="javascript:" name="remove" id="remove" onclick="remove_image();" style=" text-decoration: underline;"> Remove </a> ');
		          $("#event_logo").val(new_img);
		          $("#edit_user_picture_file").html('');
		          $('#progressbar').hide();
		          $('#picture_file_field_display1').show();
		          $('#picture_file_field_display1 img').show(); 
            }		  
        			  
        	
        }
         

       // This submits the primary baseball picture form when the file upload name changes //
        $(function() {
        	$('.upload_event_images').on('change', function(event) {
         	check=true;
        	if(glob_submit==false)
        	{  
          		glob_submit=true;    
          		var chks = document.getElementById('upload_images');
                if (chks.value=='')
                {
                        check=false;
        				var dv = document.getElementById('err_images');
        				dv.innerHTML = "<?php echo EVENT_FLAYER_IMAGES_ARE_REQUIRED;?>";
        				dv.style.display='block';
        				dv.style.color='#f00';
        			  	hasChecked = true;
                        glob_submit=false;
        				return false;
                } else {
        				value = chks.value;
        				t1 = value.substring(value.lastIndexOf('.') + 1,value.length);
        				if( t1=='jpg' || t1=='jpeg' || t1=='gif' || t1=='png' || t1=='JPEG' || t1=='JPG'  ||  t1=='PNG' || t1=='GIF')
        				{
        					document.getElementById('err_images').style.display='none';
        					check=true;
        				}
        				else
        				{						
        					check=false;
        					i=0;
        					var dv = document.getElementById('err_images');
        					dv.innerHTML = "<?php echo IMAGE_IS_INVALID;?>";
        					dv.style.display='block';
        					dv.style.color='#f00';
        					hasChecked = true;
        					glob_submit=false;
        					return false;
        				}	
        		}

           if(check==true){
        		$('#progressbar_image').show();
        		$('#image_file_field_display1').hide();
        		$('#edit_event_images_file').children().remove();
        		$(this).prependTo('#edit_event_images_file').addClass('hidden-file-field');
        		$('#event_images').submit();
        		$(this).clone(true).appendTo(".upload_imgs").removeClass('hidden-file-field');	
        	}
        	}//main if for true/false	
          });
          
        });

        $(document).ready(function() 
        {
          // bind form id and provide a simple callback function
	         if ((pic = jQuery('#event_images')).length )
	              pic.ajaxForm({dataType: 'json',
	              success: onSuccess_img,
	              error: onError_img,
	              complete: onComplete_img,
	         });
          // bind form id and provide a simple callback function
         });

        function onError_img(jqXHR, textStatus, errorThrown) {
         glob_submit=false;
        }
        
        function onComplete_img(jqXHR, textStatus) {
          glob_submit=false;
        }
        
        var new_img='';
        var error ='';
        function onSuccess_img(data, textStatus, jqXHR)
        {
        	glob_submit=false;
           // new_img = data.msg.image; 
            error =  data.msg.error; 
         	
         	  //var obj = jQuery.parseJSON(data);
         	//  console.log(data);
         	 // console.log(obj);

            if(error != '') {
            	 $("#err_images").html(error);
            	// $("#image_file_field_display1").html('<img src="<?php echo base_url().'images/bimage.png';?>" alt="" width="64" height="64" id="img_thumb" />');
            	 $('#image_file_field_display1').show();
            	 $('#progressbar_image').hide();
		         $('#image_file_field_display1 img').show(); 
		         $('#err_images').show(); 
            } else {
            	  $("#err_images").html('');	
	        	  //$("#image_file_field_display1").html('<img src="'+ base_url +'upload/event/thumb/'+ new_img +'" alt="" width="64" height="64" id="img_thumb" /><br /><a href="javascript:" name="remove" id="remove" onclick="remove_image();" style=" text-decoration: underline;"> Remove </a> ');
		          // $("#event_logo").val(new_img);
		          $("#edit_event_images_file").html('');
		          $('#progressbar_image').hide();
		          $('#image_file_field_display1').show();
		          $('#image_file_field_display1 img').show(); 
            }	
            images_update(data.images); 
        			  
        	
        }

        function images_update(images){
			for (i=0; i < images.length; i++) {
				$('#flyer_images').val('1');
			$("#image_file_field_"+i).html('<img src="'+ base_url +'upload/event/thumb/'+ images[i]['image_name'] +'" alt="" width="64" height="64" id="img_thumb" /><br /><a href="javascript:" name="remove" id="remove" onclick="remove_images('+images[i]['event_images_id']+');" style=" text-decoration: underline;"> Remove </a> ');
			}
			if(i==1){
				$("#image_file_field_1").html('<img src="<?php echo base_url().'images/bimage.png';?>" alt="" width="64" height="64" id="img_thumb" />');
			}else if(i==0){
				$('#flyer_images').val('');
				$("#image_file_field_0").html('<img src="<?php echo base_url().'images/bimage.png';?>" alt="" width="64" height="64" id="img_thumb" />');
				$("#image_file_field_1").html('<img src="<?php echo base_url().'images/bimage.png';?>" alt="" width="64" height="64" id="img_thumb" />');
			}
        }


           // This submits the primary baseball Audio form when the file upload name changes //
        $(function() {
        	$('.upload_event_audio').on('change', function(event) {
         	check=true;
        	if(glob_submit==false)
        	{  
          		glob_submit=true;    
          		/*	var chks = document.getElementById('upload_audio_file');
                
        				value = chks.value;
        				alert(value);
        				t1 = value.substring(value.lastIndexOf('.') + 1,value.length);
        				if( t1=='mp3' || t1=='wave' || t1=='acc' )
        				{
        					document.getElementById('err1').style.display='none';
        					check=true;
        				}
        				else
        				{						
        					check=true;
        					i=0;
        					var dv = document.getElementById('err_audio');
        					dv.innerHTML = "<?php echo EVENT_AUDIO_TYPE_IS_NOT_VALID;?>";
        					dv.style.display='block';
        					dv.style.color='#f00';
        					hasChecked = true;
        					glob_submit=false;
        					//return false;
        				}	
        			*/

	           if(check==true){
	        		$('#progressbar_audio').show();
	        		$('#audio_img').hide();
	        		$('#edit_event_audio_file').children().remove();
	        		$(this).prependTo('#edit_event_audio_file').addClass('hidden-file-field');
	        		$('#event_audio').submit();
	        		$(this).clone(true).appendTo(".upload_audio").removeClass('hidden-file-field');	
	        	}
        	}//main if for true/false	
          });
          
        });

        $(document).ready(function() 
        {
          // bind form id and provide a simple callback function
	         if ((pic = jQuery('#event_audio')).length )
	              pic.ajaxForm({dataType: 'json',
	              success: onSuccess_audio,
	              error: onError_audio,
	              complete: onComplete_audio,
	         });
          // bind form id and provide a simple callback function
         });

        function onError_audio(jqXHR, textStatus, errorThrown) {
         glob_submit=false;
        }
        
        function onComplete_audio(jqXHR, textStatus) {
          glob_submit=false;
        }
        
        var new_img='';
        var error ='';
        function onSuccess_audio(data, textStatus, jqXHR)
        {
        	glob_submit=false;
            new_audio = data.msg.audio; 
            error =  data.msg.error; 
          
         

            if(error != '') {
            	 $("#err_audio").html(error);
            	 $("#audio_img").html('<img src="<?php echo base_url().'images/bimage_audio.png';?>" alt="" width="64" height="64" id="img_thumb" />');
            	 $('#audio_img').show();
            	 $('#progressbar_audio').hide();
		         $('#audio_img img').show(); 
		         $('#err_audio').show(); 
            } else {
            	  $("#err_audio").html('');	
            	  $('#audio_div').html(data.msg.view);
      			  $('#auto_play_audio').show();
	        	  $("#audio_img").html('<img src="<?php echo base_url().'images/bimage_audio.png';?>" alt="" width="64" height="64" id="img_thumb" />');
		       	  $('#audio_img').show();
		          $("#edit_event_audio_file").html('');
		          $('#progressbar_audio').hide();
		          $('#audio_img').show();
		          $('#audio_img img').show(); 
            }		  
        			  
        	
        }


        function remove_image(){
        	var con = confirm("<?php echo Are_you_sure_you_want_to_remove_this_Logo; ?>");
        	if(con){
        		$("#upload_datafile").val('');
        	 	$("#picture_file_field_display1").html('<img src="<?php echo base_url();?>images/bimage.png" alt="" />');
        		document.getElementById('err1').style.display='none';
        		$("#event_logo").val('');
        	}	
        } 	

        function remove_images(img_id){
        	var con = confirm("<?php echo ARE_YOU_SURE_YOU_WANT_TO_REMOVE_THIS_IMAGE; ?>");
        	if(con){
        	
                $.ajax({
                    type: "POST",
                    data: {event_id: <?php echo $event_id;?>,image_id : img_id}, 
                    url: "<?php echo site_url('event/delete_image'); ?>",
                    success: function (data) {
                    	var obj = jQuery.parseJSON(data);
                    	alert(obj['msg']['success']);
                    	images_update(obj['images']);
		        		document.getElementById('err_images').style.display='none';
		        		
                    }
                }); 
        		
        	}	
        } 

        function remove_audio(){
        	var con = confirm("<?php echo ARE_YOU_SURE_YOU_WANT_TO_REMOVE_THIS_AUDIO; ?>");
        	if(con){
        	
                $.ajax({
                    type: "POST",
                    data: {event_id: <?php echo $event_id;?>}, 
                    url: "<?php echo site_url('event/delete_audio'); ?>",
                    success: function (data) {
                    	var obj = jQuery.parseJSON(data);
                    	alert(obj['msg']['success']);
                    	$("#upload_audio_file").val('');
		        	 	$("#audio_div").html('');
		        		document.getElementById('err_audio').style.display='none';
		        		$("#event_logo").val('');
		        		$('#auto_play_audio').hide();
                    }
                }); 
        		
        	}	
        } 	

        function filename(name)
        {
              $("#event_logo_name").val(name.replace("C:\\fakepath\\",""));
        }

        /********* free ticket div start**********/
        function append_div2()
        {
        	$('#when_no_tic').hide();
        	$("#main_ticket_head").css({ display: "block" });

        	var tmp_div2 = document.createElement("tbody");
        	tmp_div2.className = "inner_content_two";
        	
        	var ticket_cnt = $('#free_ticket_cnt').val(); 
        	var num = parseInt(ticket_cnt)+1;
        	
        	$('#free_ticket_cnt').val(num); 
        	
        	tmp_div2.id='ticket'+num;
        	
        	content = $('#more2').html();				
        	content = content.replace('remove_ticket_div(1);','remove_ticket_div('+num+');');	
        	content = content.replace('free_ticket_info_1','free_ticket_info'+num);
        	content = content.replace('free_ticket_info_1','free_ticket_info'+num);
        	content = content.replace('free_ticket_info_1','free_ticket_info'+num);
        	content = content.replace("set_hide_description(this,'free','1')","set_hide_description(this,'free','"+num+"')");
        	
        	content = content.replace('free_hide_description1','free_hide_description_'+num);
        	content = content.replace('free_hide_description1','free_hide_description_'+num);
        	content = content.replace('free_hide_description1','free_hide_description_'+num);
        	content = content.replace('free_hide_description1','free_hide_description_'+num);
        	content = content.replace('free_max_purchase','free_max_purchase_'+num);
        	content = content.replace('free_min_purchase','free_min_purchase_'+num);
        		
        	content = content.replace("set_sales_status(this,'free','1')","set_sales_status(this,'free','"+num+"')");	
        	content = content.replace('free_sales_1','free_sales'+num);
        	content = content.replace("set_event_capacity(this,'1','free')","set_event_capacity(this,'"+num+"','free')");	
        	content = content.replace('free_ticket_name_1','free_ticket_name'+num);
        	content = content.replace('free_qty_1','free_qty'+num);
        	
 
        	tmp_div2.innerHTML = content;

        	document.getElementById('add_more_div_1').appendChild(tmp_div2);
        	var nowDate = todayDate;

        	var total_ticket_cnt = $("#total_ticket_cnt").val();
        	total_ticket_cnt++;
        	$("#total_ticket_cnt").val(total_ticket_cnt);

        	var dateval =  $("#event_end_date").val();
        	var timeval =  $("#event_end_time").val();

        	if(dateval==''){ dateval = todayDate; }
    		if(timeval==''){ timeval = '11:45 PM'; }

        	$(".free_start_sale_date").datepicker({ format: "yyyy-mm-dd", startDate : nowDate, endDate : dateval});
        	$(".free_end_sale_date").datepicker({ format: "yyyy-mm-dd", startDate : nowDate, endDate : dateval});
        	$('.free_start_sale_time').timepicker({ timeFormat: 'g:i A',autoclose: true, 'step': 15   });
        	$('.free_end_sale_time').timepicker({ timeFormat: 'g:i A',autoclose: true, 'step': 15   });
        	
        	$('#ticket'+num+' [name="free_start_sale_date[]"]').val(todayDate);
        	$('#ticket'+num+' [name="free_start_sale_time[]"]').val('12:00 AM');
        	$('#ticket'+num+' [name="free_end_sale_date[]"]').val(dateval);
        	$('#ticket'+num+' [name="free_end_sale_time[]"]').val(timeval);
        }
        /********* free ticket div end**********/

        	function remove_ticket_div(id)
        	{		
        		var con= confirm("<?php echo Are_you_sure_you_want_to_delete_this_ticket; ?>");
        		
        		if(con){
        			
        			if(id=='1'){
        				var element = document.getElementById('more2');
        			}
        			else{
        				var element = document.getElementById('ticket'+id);
        			}
        			var add_more = parent.document.getElementById('add_more2');
        			var add_parent=add_more.parentNode.offsetHeight;
        			var remove_height=parseInt(element.offsetHeight);
        			var final_height=add_parent - remove_height;

        			var old = $("#event_capacity").val();
        			var cap = $("#free_qty"+id).val();
        			if(cap!='' && cap!=0){
        				$("#event_capacity").val(parseInt(old) - parseInt(cap));
        			}
        			
        			element.parentNode.removeChild(element);
        			if(id=='1'){	
        				$("#add_more2").html('<input type="hidden" name="free_ticket_cnt" id="free_ticket_cnt" value="1" />');
        			}	

        			var total_ticket_cnt = $("#total_ticket_cnt").val();
        			total_ticket_cnt--;
        			$("#total_ticket_cnt").val(total_ticket_cnt);

					var free_ticket_remove = $("#free_ticket_remove").val();
					if(free_ticket_remove == ''){
						free_ticket_remove = id;
					} else {
						free_ticket_remove = free_ticket_remove+','+id;
					}
        			$("#free_ticket_remove").val(free_ticket_remove);

        			
	        		 var chks1 = $('[name="free_qty[]"]');
	        	 	 var chks2 = $('[name="paid_qty[]"]');
	        	     var chks3 = $('[name="donation_qty[]"]');

        			if(chks1.length==1 && chks2.length==1 && chks3.length==1){
        				$('#main_ticket_head').hide();
        				$('#when_no_tic').show();
        			}
        		}
        	}

        	function set_free_ticket_info(id,disp){

        		if(disp=='show'){
        			var vis = $('#'+id).toggle().is(":visible");	
        		}
        		if(disp=='hide'){
        			
        			var chks_start = new Date($('#'+id+' [name="free_start_sale_date[]"]').val()+' '+$('#'+id+' [name="free_start_sale_time[]"]').val());
        			var chks_end = new Date($('#'+id+' [name="free_end_sale_date[]"]').val()+' '+$('#'+id+' [name="free_end_sale_time[]"]').val());
        			var event_end_date_time =  new Date($("#event_end_date").val()+' '+$("#event_end_time").val());

        			ticket_req_fields = $('#'+id+' .chks_start_chks_end');
        			ticket_req_fields.text('');

        			if(chks_start > chks_end) {      
        				$('#'+id+' [name="free_start_sale_date[]"]').focus();
        				ticket_req_fields.text("<?php echo Ticket_start_sale_date_should_not_be_greater_than_end_sale_date; ?>");
        				
        		    }
        		    
        			else if(chks_end > event_end_date_time) {  
        				$('#'+id+' [name="free_end_sale_date[]"]').focus();    
        				ticket_req_fields.text("<?php echo Ticket_end_sale_date_should_not_be_greater_than_event_end_date;?>");
        		    }
        		    else{
        				$("#"+id).css({ display: "none" });
        			}
     
        		}
        	
        	}

        	function set_event_capacity(ele,id,type){
        	
        		var testPattern=/^[0-9]+$/;

        		if(testPattern.test(ele.value)==false || ele.value ==0)
        		{
        			$("#"+ele.id).val('');
        		}
        		
        		var max_ticket_qnty = "<?php echo $site_setting['max_ticket_qnty'];?>";
        		var tick_limit = document.getElementById(ele.id).value;
	
        	    if(parseInt(tick_limit) > parseInt(max_ticket_qnty)){
        	    	$('#ticket_req_fields').show();
        	    	$('#ticket_req_fields').text("<?php echo Ticket_quantity_should_be_less_than_or_equal_to.' '.$site_setting['max_ticket_qnty'];?>"); 
        	    	$("#"+ele.id).val('');
        	    	
        	    } else {
        	    	$('#ticket_req_fields').text("");
        	    }
        							
        	   var old = 0;
        	   var chks1 = $("[name='free_qty[]']");
        	   for (var i = 0; i < chks1.length; i++){
        	   		
        	   		val1 = chks1[i].value;
        	   		
        	   		if(val1!='' && val1!=0){
        	   			
        	   			if(old!=0 && old!=''){
        					old = parseInt(old) + parseInt(val1);
        				}else{
        					old = parseInt(val1);
        				}
        	   		}
        	   			
        			
        	   }
        	   
        	   var chks2 = $("[name='paid_qty[]']"); 
        	   for (var i = 0; i < chks2.length; i++){
        	   		val2 = chks2[i].value;
        	   		
        	   		if(val2!='' && val2!=0){
        		   			
        		   		if(old!=0 && old!=''){
        					old = parseInt(old) + parseInt(val2);
        				}else{
        					old = parseInt(val2);
        				}	
        			}
        	   }
        		   
        	   var chks3 = $("[name='donation_qty[]']");
        	   for (var i = 0; i < chks3.length; i++){
        	   		val3 = chks3[i].value;
        	   		
        	   		if(val3!='' && val3!=0){
        		   		if(old!=0 && old!=''){
        					old = parseInt(old) + parseInt(val3);
        				}else{
        					old = parseInt(val3);
        				}	
        			}
        	   }

        	   $("#event_capacity").val(old);

        	   if(type=='free'){
        			var tkt_name = $("#free_ticket_name"+id).val();

        			if(ele.value=='0' || ele.value=='' || tkt_name=='' || tkt_name==null)
        			{	
        				$("#free_sales"+id).html('<span class="LinH40"><?php echo Incomplete;?></span> <input type="hidden" name="free_ticket_status[]" value="0" />');
        			}else{
        				$("#free_sales"+id).html('<select name="free_ticket_status[]" class="select-pad" > <?php echo $selectTicketStatus ?> </select>');
        			}	
        	   }

        	   if(type=='paid'){
        			var tkt_name = $("#paid_ticket_name"+id).val();

    				if(ele.value=='0' || ele.value=='' || tkt_name=='' || tkt_name==null)
    				{	
    					$("#paid_sales"+id).html('<span class="LinH40"><?php echo Incomplete;?></span> <input type="hidden" name="paid_ticket_status[]" value="0" />');
    				}else{
    					$("#paid_sales"+id).html('<select name="paid_ticket_status[]" class="select-pad" > <?php echo $selectTicketStatus ?> </select>');
    				}	
        		}
        		
        		if(type=='donation'){

        			var tkt_name = $("#donation_ticket_name"+id).val();

        			if(ele.value=='0' || ele.value=='' || tkt_name=='' || tkt_name==null)
        			{	
        				$("#donation_sales"+id).html('<span class="LinH40"><?php echo Incomplete;?></span> <input type="hidden" name="donation_ticket_status[]" value="0" />');
        			}else{
        				$("#donation_sales"+id).html('<select name="donation_ticket_status[]" class="select-pad" > <?php echo $selectTicketStatus ?> </select>');
        			}		
        		}
        		
        	}

        	function set_sales_status(ele,type,id){
        		
        		if(type=='free'){
        			var qty = $("#free_qty"+id).val();

        			if(ele.value=='0' || ele.value=='' || qty=='' || qty==null)
        			{	
        				$("#free_sales"+id).html('<span class="LinH40"><?php echo Incomplete;?></span> <input type="hidden" name="free_ticket_status[]" value="0" />');
        			}else{
        				$("#free_sales"+id).html('<select name="free_ticket_status[]" class="select-pad" > <?php echo $selectTicketStatus ?> </select>');
        			}		
        		}
        		
        		
        		if(type=='paid'){
        			var qty = $("#paid_qty"+id).val();
        			
        			if(ele.value=='0' || ele.value=='' || qty=='' || qty==null)
        			{	
        				$("#paid_sales"+id).html('<span class="LinH40"><?php echo Incomplete;?></span> <input type="hidden" name="paid_ticket_status[]" value="0" />');
        			}else{
        				$("#paid_sales"+id).html('<select name="paid_ticket_status[]" class="select-pad" > <?php echo $selectTicketStatus ?> </select>');
        			}			
        		}
        		
        		
        		if(type=='donation'){

        			var qty = $("#donation_qty"+id).val();

        			if(ele.value=='0' || ele.value=='' || qty=='' || qty==null)
        			{	
        				$("#donation_sales"+id).html('<span class="LinH40"><?php echo Incomplete;?></span> <input type="hidden" name="donation_ticket_status[]" value="0" />');
        			}else{
        				$("#donation_sales"+id).html('<select name="donation_ticket_status[]" class="select-pad" > <?php echo $selectTicketStatus ?> </select>');
        			}		
        		}
        	}

        	function set_hide_description(chk, type, id){
        		label = $(chk).closest('label');
        		hideDescription = label.find('.hideDescription');
        		if(chk.checked==true)
        		{
        			hideDescription.val(1);
        			if(type=='free'){
        				$("#free_hide_description"+id).val(1);
        			}
        			if(type=='donation'){
        				$("#donation_hide_description"+id).val(1);
        			}
        			if(type=='paid'){
        				$("#paid_hide_description"+id).val(1);
        			}	
        		}else{
        			hideDescription.val(0);
        			if(type=='free'){
        				$("#free_hide_description"+id).val(0);
        			}
        			if(type=='donation'){
        				$("#donation_hide_description"+id).val(0);
        			}
        			if(type=='paid'){
        				$("#paid_hide_description"+id).val(0);
        			}
        		}
        	}

      		function check_ticket_min_qty(min){

      		var  selected_id=$(min).attr('id');
        		var ids=selected_id.split('_');
        		if(ids[0]=='free')
        		{
        			
			      	var max_val = $('#free_qty'+ids[3]).val();
			      		if(max_val=='')
			      		{
			      				min.value = '';
			        	}else
			        		{
	        					if(parseInt(max_val)<parseInt(min.value))
	        					{
	        						min.value=max_val;
	        					}
		        			}
		        		var maximum_val=$('#free_max_purchase_'+ids[3]).val();
		        		if(maximum_val!='')
		        		{
		        			if(parseInt(maximum_val)<parseInt(min.value))
		        			{
		        				min.value=maximum_val;
		        			}
		        		}	
		        }else
		        	{
		        	var max_val = $('#paid_qty'+ids[3]).val();
			      		if(max_val=='')
			      		{
			      				min.value = '';
			        				}else
			        				{
			        					if(parseInt(max_val)<parseInt(min.value))
			        					{
			        						min.value=max_val;
			        					}
		        				}
		        		var maximum_val=$('#paid_max_purchase_'+ids[3]).val();
		        		if(maximum_val!='')
		        		{
		        			if(parseInt(maximum_val)<parseInt(min.value))
		        			{
		        				min.value=maximum_val;
		        			}
		        		}	
	        			}
      			
        		var testPattern = /^[0-9]+$/;
                
        		if(testPattern.test(min.value) == true && min.value !='')
        		{
        			if(min.value >= parseInt(<?php echo $min_purchase_allowed;?>) && min.value <= parseInt(<?php echo $max_purchase_allowed;?>)){
        				return true;
        			}else{
        				if(min.value < parseInt(<?php echo $min_purchase_allowed;?>)){
        					min.value = <?php echo $min_purchase_allowed;?>;
        				}else{
        					min.value = <?php echo $max_purchase_allowed;?>;
        				}	
        				return true;
        			}
        		}else{
        			min.value='';
        			return false;
        		}		
        	}

        	function check_ticket_max_qty(max){
        		var  selected_id=$(max).attr('id');
        		var ids=selected_id.split('_');
        		if(ids[0]=='free')
        		{
			      		var max_val = $('#free_qty'+ids[3]).val();
			      		if(max_val=='')
			      		{
			        					max.value = '';
			        				}else
			        				{
		        					if(parseInt(max_val)<parseInt(max.value))
		        					{
		        						max.value=max_val;
		        					}
		        				}

		        		var minimum_val=$('#free_min_purchase_'+ids[3]).val();
		        		if(minimum_val!='')
		        		{
		        			if(parseInt(minimum_val)>parseInt(max.value))
		        			{
		        				max.value=minimum_val;
		        			}
		        		}		
		        		
		       	}else
		        {
	        			var max_val = $('#paid_qty'+ids[3]).val();
			      		if(max_val=='')
			      		{
			      				max.value = '';
			        	}else
			        		{
        					if(parseInt(max_val)<parseInt(max.value))
	        					{
	        						max.value=max_val;
	        					}
		        			}
			        	var minimum_val=$('#paid_min_purchase_'+ids[3]).val();
		        		if(minimum_val!='')
		        		{
		        			if(parseInt(minimum_val)>parseInt(max.value))
		        			{
		        				max.value=minimum_val;
		        			}
		        		}	

		        }
        		


        		var testPattern=/^[0-9]+$/;
        		 if(testPattern.test(max.value)==true && max.value !='')
        		 {
        				if(max.value < parseInt(<?php echo $min_purchase_allowed;?>)){
        					max.value = <?php echo $min_purchase_allowed;?>;
        					return true;
        				}else if(max.value <= parseInt(<?php echo $max_purchase_allowed;?>)){
        					return true;
        				
        				}else{
        					max.value = <?php echo $max_purchase_allowed;?>;
        					return true;
        				}
        		}else{
        				max.value='';
        				return false;
        		}		
        	}




        	function append_div1()
        	{
        		$('#when_no_tic').hide();
        		$("#main_ticket_head").css({ display: "block" });

            	var tmp_div2 = document.createElement("tbody");
            	tmp_div2.className = "inner_content_two";
        		
        		var paid_ticket_cnt=$('#paid_ticket_cnt').val(); 
        		var num=parseInt(paid_ticket_cnt)+1;
        		$('#paid_ticket_cnt').val(num); 

        		tmp_div2.id='paid_ticket'+num;
        		
        		content=$('#more1').html();	

        			
        		
        		content = content.replace('remove_paid_ticket_div(1);','remove_paid_ticket_div('+num+');');	
        		content = content.replace('paid_ticket_info_1','paid_ticket_info'+num);
        		content = content.replace('paid_ticket_info_1','paid_ticket_info'+num);
        		content = content.replace('paid_ticket_info_1','paid_ticket_info'+num);
        		
        		content = content.replace('paid_service_fee_1','paid_service_fee'+num);
        		content = content.replace('paid_service_fee_1','paid_service_fee'+num);
        		content = content.replace('paid_service_fee_1','paid_service_fee'+num);

        		content = content.replace('paid_max_purchase','paid_max_purchase_'+num);
        		content = content.replace('paid_min_purchase','paid_min_purchase_'+num);
        		
        		content = content.replace('paid_service_fee1[]','paid_service_fee'+num+'[]');
        		content = content.replace('paid_service_fee1[]','paid_service_fee'+num+'[]');
        		content = content.replace('take-estimate-ticket-amount-1','take-estimate-ticket-amount-'+num);
        		content = content.replace('take-away-amount-1','take-away-amount-'+num);
        		content = content.replace('take-estimate-1','take-estimate-'+num);
        		
        		content = content.replace("set_fee_and_total('1',this)","set_fee_and_total('"+num+"',this)");
        		content = content.replace('paid_fee_1','paid_fee'+num);
        		content = content.replace('paid_total_1','paid_total'+num);
        		content = content.replace('paid_fee_val_1','paid_fee_val'+num);
        		content = content.replace('paid_total_val_1','paid_total_val'+num);
        		
        		content = content.replace('paid_qty_1','paid_qty'+num);
        		content = content.replace('paid_price_1','paid_price'+num);
        		
        		content = content.replace("set_hide_description(this,'paid','1')","set_hide_description(this,'paid','"+num+"')");	
        		content = content.replace('paid_hide_description_1','paid_hide_description_'+num);
        		content = content.replace('paid_hide_description_1','paid_hide_description_'+num);
        		content = content.replace('paid_hide_description_1','paid_hide_description_'+num);
        		content = content.replace('paid_hide_description_1','paid_hide_description_'+num);
        		content = content.replace("set_sales_status(this,'paid','1')","set_sales_status(this,'paid','"+num+"')");	
        		content = content.replace('paid_sales_1','paid_sales'+num);
        		content = content.replace('docs_tooltip_1','docs_tooltip'+num);
        		
        		content = content.replace("set_event_capacity(this,'1','paid')","set_event_capacity(this,'"+num+"','paid')");	
        		content = content.replace('paid_ticket_name_1','paid_ticket_name'+num);

        		tmp_div2.innerHTML = content;
        		document.getElementById('add_more_div_1').appendChild(tmp_div2);
        		
        		var total_ticket_cnt = $("#total_ticket_cnt").val();
        		total_ticket_cnt++;
        		$("#total_ticket_cnt").val(total_ticket_cnt);


        		var nowDate = todayDate;
	        	var dateval =  $("#event_end_date").val();
	        	var timeval =  $("#event_end_time").val();

	        	if(dateval==''){ dateval = todayDate; }
        		if(timeval==''){ timeval = '11:45 PM'; }
				
	        	$(".paid_start_sale_date").datepicker({ format: "yyyy-mm-dd", startDate : nowDate, endDate : dateval});
	        	$(".paid_end_sale_date").datepicker({ format: "yyyy-mm-dd", startDate : nowDate, endDate : dateval});
	        	$('.paid_start_sale_time').timepicker({ timeFormat: 'g:i A',autoclose: true, 'step': 15   });
	        	$('.paid_end_sale_time').timepicker({ timeFormat: 'g:i A',autoclose: true, 'step': 15   });

	        	$('#paid_ticket'+num+' [name="paid_start_sale_date[]"]').val(todayDate);
	        	$('#paid_ticket'+num+' [name="paid_start_sale_time[]"]').val('12:00 AM');
	        	$('#paid_ticket'+num+' [name="paid_end_sale_date[]"]').val(dateval);
	        	$('#paid_ticket'+num+' [name="paid_end_sale_time[]"]').val(timeval);	

	        	if($('#event_pass_fees3').is(':checked')){
	        		$('.paid_fee_div').css('display','block');
	        	}else{
	        		$('.paid_fee_div').css('display','none');
	        	}
        		
        	}
        	        	
        	function set_paid_ticket_info(id,disp){

        		if(disp=='show'){
        			var vis = $('#'+id).toggle().is(":visible");	
        		}

        		if(disp=='hide'){

        			var chks_start = new Date($('#'+id+' [name="paid_start_sale_date[]"]').val()+' '+$('#'+id+' [name="paid_start_sale_time[]"]').val());

        			var chks_end =   new Date($('#'+id+' [name="paid_end_sale_date[]"]').val()+' '+$('#'+id+' [name="paid_end_sale_time[]"]').val());
        			var event_end_date_time =  new Date($("#event_end_date").val()+' '+$("#event_end_time").val());
        			
        			ticket_req_fields = $('#'+id+' .chks_start_chks_end');
        			ticket_req_fields.text('');
        			
        			if(chks_start > chks_end) {      
        				$('#'+id+' [name="paid_start_sale_date[]"]').focus();
        				ticket_req_fields.text("<?php echo Ticket_start_sale_date_should_not_be_greater_than_end_sale_date; ?>");	
        		    }
        		    
        			else if(chks_end > event_end_date_time) {  
        				$('#'+id+' [name="paid_end_sale_date[]"]').focus();    
        				ticket_req_fields.text("<?php echo Ticket_end_sale_date_should_not_be_greater_than_event_end_date;?>");
        		    }
        		    
        		    else{
        				$('#'+id).hide();
        			}
        		}	
        	}

        	function remove_paid_ticket_div(id)
        	{	
				var con= confirm("<?php echo Are_you_sure_you_want_to_delete_this_ticket; ?>");
        		
        		if(con){
        			
        			if(id=='1'){
        				var element =document.getElementById('more1');
        			}
        			else{
        				var element =document.getElementById('paid_ticket'+id);
        			}
        			var add_more = parent.document.getElementById('add_more1');
        			var add_parent=add_more.parentNode.offsetHeight;
        			var remove_height=parseInt(element.offsetHeight);
        			var final_height=add_parent - remove_height;

        			var old = $('#event_capacity').val(); 
        			var cap = $('#paid_qty'+id).val(); 
        			if(cap!='' && cap!=0){
        				$('#event_capacity').val(parseInt(old) - parseInt(cap));
        			}
        			
        			element.parentNode.removeChild(element);
        			if(id=='1'){
        				$('#add_more1').html('<input type="hidden" name="paid_ticket_cnt" id="paid_ticket_cnt" value="1" />');
        			}	

        			var total_ticket_cnt = $("#total_ticket_cnt").val();
        			total_ticket_cnt--; //alert(total_ticket_cnt);
        			$("#total_ticket_cnt").val(total_ticket_cnt);

        			var paid_ticket_remove = $("#paid_ticket_remove").val();
					if(paid_ticket_remove == ''){
						paid_ticket_remove = id;
					} else {
						paid_ticket_remove = paid_ticket_remove+','+id;
					}
        			$("#paid_ticket_remove").val(paid_ticket_remove);
        						
	        		 var chks1 = $('[name="free_qty[]"]');
	        	 	 var chks2 = $('[name="paid_qty[]"]');
	        	     var chks3 = $('[name="donation_qty[]"]');

        			if(chks1.length==1 && chks2.length==1 && chks3.length==1){
        				$('#main_ticket_head').hide();
        				$('#when_no_tic').show();
        			}
        		}
        		
        	} 
        	function append_div3()
        	{
        		$('#when_no_tic').hide();
        		$("#main_ticket_head").css({ display: "block" });
        		
        		var tmp_div2 = document.createElement("tbody");
        		tmp_div2.className = "inner_content_two";

        		var paid_ticket_cnt=$('#donation_ticket_cnt').val();
        		var num=parseInt(paid_ticket_cnt)+1;
        		$('#donation_ticket_cnt').val(num);
        		tmp_div2.id = 'donation_ticket'+num;
        		
        		content=$('#more3').html();	

        		content = content.replace('remove_donation_ticket_div(1);','remove_donation_ticket_div('+num+');');	
        		content = content.replace('donation_ticket_info_1','donation_ticket_info'+num);
        		content = content.replace('donation_ticket_info_1','donation_ticket_info'+num);
        		content = content.replace('donation_ticket_info_1','donation_ticket_info'+num);//alert(content);
        		
        		content = content.replace('donation_service_fee_1','donation_service_fee'+num);
        		content = content.replace('donation_service_fee_1','donation_service_fee'+num);
        		content = content.replace('donation_service_fee_1','donation_service_fee'+num);
        		
        		content = content.replace('donation_qty_1','donation_qty'+num);
        		
        		content = content.replace("set_hide_description(this,'donation','1')","set_hide_description(this,'donation','"+num+"')");	
        		
        		content = content.replace('donation_hide_description1','donation_hide_description_'+num);
	        	content = content.replace('donation_hide_description1','donation_hide_description_'+num);
	        	content = content.replace('donation_hide_description1','donation_hide_description_'+num);
        		content = content.replace('donation_hide_description1','donation_hide_description_'+num);
        	
        		content = content.replace("set_sales_status(this,'donation','1')","set_sales_status(this,'donation','"+num+"')");	
        		content = content.replace('donation_sales_1','donation_sales'+num);
        		
        		
        		content = content.replace("set_event_capacity(this,'1','donation')","set_event_capacity(this,'"+num+"','donation')");	
        		content = content.replace('donation_ticket_name_1','donation_ticket_name'+num);
        		
        		
        		

        		tmp_div2.innerHTML = content;

        		document.getElementById('add_more_div_1').appendChild(tmp_div2);

        		var nowDate = todayDate;

            	var total_ticket_cnt = $("#total_ticket_cnt").val();
            	total_ticket_cnt++;
            	$("#total_ticket_cnt").val(total_ticket_cnt);

            	var dateval =  $("#event_end_date").val();
            	var timeval =  $("#event_end_time").val();
			
            	if(dateval==''){ dateval = todayDate; }
        		if(timeval==''){ timeval = '11:45 PM'; }

            	$(".donation_start_sale_date").datepicker({ format: "yyyy-mm-dd", startDate : nowDate, endDate : dateval});
            	$(".donation_end_sale_date").datepicker({ format: "yyyy-mm-dd", startDate : nowDate, endDate : dateval});
            	$('.donation_start_sale_time').timepicker({ timeFormat: 'g:i A',autoclose: true, 'step': 15   });
            	$('.donation_end_sale_time').timepicker({ timeFormat: 'g:i A',autoclose: true, 'step': 15   });
            	
            	$('#donation_ticket'+num+' [name="donation_start_sale_date[]"]').val(todayDate);
            	$('#donation_ticket'+num+' [name="donation_start_sale_time[]"]').val('12:00 AM');
            	$('#donation_ticket'+num+' [name="donation_end_sale_date[]"]').val(dateval);
            	$('#donation_ticket'+num+' [name="donation_end_sale_time[]"]').val(timeval);

            	if($('#event_pass_fees3').is(':checked')){
	        		$('.paid_fee_div').css('display','block');
	        	}else{
	        		$('.paid_fee_div').css('display','none');
	        	}
        	}

        	function set_donation_ticket_info(id,disp){
        		if(disp=='show'){
        			var vis = $('#'+id).toggle().is(":visible");	
        		}
        		if(disp=='hide'){

        			var chks_start = new Date($('#'+id+' [name="donation_start_sale_date[]"]').val()+' '+$('#'+id+' [name="donation_start_sale_time[]"]').val());
        			var chks_end =   new Date($('#'+id+' [name="donation_end_sale_date[]"]').val()+' '+$('#'+id+' [name="donation_end_sale_time[]"]').val());
        			var event_end_date_time =  new Date($("#event_end_date").val()+' '+$("#event_end_time").val());

        			ticket_req_fields = $('#'+id+' .chks_start_chks_end');
        			ticket_req_fields.text('');

        			if(chks_start > chks_end) {      
        				$('#'+id+' [name="donation_start_sale_date[]"]').focus();
        				ticket_req_fields.text("<?php echo Ticket_start_sale_date_should_not_be_greater_than_end_sale_date; ?>");	
        		    }
        		    
        			else if(chks_end > event_end_date_time) {  
        				$('#'+id+' [name="donation_end_sale_date[]"]').focus();    
        				ticket_req_fields.text("<?php echo Ticket_end_sale_date_should_not_be_greater_than_event_end_date;?>");
        		    }
        		    else{
        		    	$('#'+id).hide();
        			}
        		}	
        	}  

        	function remove_donation_ticket_div(id)
        	{						
        		var con= confirm("<?php echo Are_you_sure_you_want_to_delete_this_ticket; ?>");
        			
        		if(con){	
        		
        			if(id=='1'){
        				var element = document.getElementById('more3');
        			}
        			else{
        				var element = document.getElementById('donation_ticket'+id);
        			}
        			var add_more = parent.document.getElementById('add_more3');
        			var add_parent=add_more.parentNode.offsetHeight;
        			var remove_height=parseInt(element.offsetHeight);
        			var final_height=add_parent - remove_height;
        			
        			var old = $('#event_capacity').val(); 
        			var cap = $('#donation_qty'+id).val();

        			
        			if(cap!='' && cap!=0){
        				$('#event_capacity').val(parseInt(old) - parseInt(cap));
        			}
        			
        			element.parentNode.removeChild(element);
        			if(id=='1'){
        				$('#add_more3').html('<input type="hidden" name="donation_ticket_cnt" id="donation_ticket_cnt" value="1" />');
        			}

        			var total_ticket_cnt = $("#total_ticket_cnt").val();
        			total_ticket_cnt--;
        			$("#total_ticket_cnt").val(total_ticket_cnt);

        			var donation_ticket_remove = $("#donation_ticket_remove").val();
					if(donation_ticket_remove == ''){
						donation_ticket_remove = id;
					} else {
						donation_ticket_remove = donation_ticket_remove+','+id;
					}
        			$("#donation_ticket_remove").val(donation_ticket_remove);
        			
        			var chks1 = $('[name="free_qty[]"]');
        		 	var chks2 = $('[name="paid_qty[]"]');
        		    var chks3 = $('[name="donation_qty[]"]');
        		 
        			if(chks1.length==1 && chks2.length==1 && chks3.length==1){
        				$('#main_ticket_head').hide();
        				$('#when_no_tic').show();
        			}
        		}
        	} 

        	function set_subcategory(val){

                var subcategory_path = site_url+'event/subcategory_selection/';
                var category_id = val;
                $.ajax({
                    type: "GET",
                    data: {category: category_id}, 
                    url: subcategory_path+category_id,
                    success: function(data) {
                         $("#subcat_list").html(data);
                        if($('#subcategory').val()=='NO_TOPIC')
                        {
                        	$('#event_topic_div').show();
                        	$('#lbl_event_topic').html("<?php echo Event_Topic; ?><span>&#42;</span>");
                        }else{
                        		$('#event_topic_div').hide();
                        }
                    }
                }); 
        	}    

        	function check_less_quantity(ele, used, id, orig){
        	 	$('#ticket_req_fields').text("");
        	 	if(parseInt(ele.value) < used && used>0){
        	 		$('#ticket_req_fields').text("<?php echo Quantity_can_not_be_less_than_the_tickets_already_sold;?>");
        	 		ele.value = orig;
        	 		$('html, body').animate({
        	        	scrollTop: $("#ticket_req_fields").offset().top
        	         }, 200);
        	 		return true;
        	 	}else{
        	 		return true;	
        	 	}
        	 	
        	 }

        	 function org_change(a)
        	 {

        	 	$('#org_event_id').val(a.value); 
        	 	$('#organizer_id').val(a.value);
        	 	
        	 } 	  	       		
             function save_custom_url () {
             	var customize_web_url=$('#customize_web_url').val();
             	
             	$('#save_custom_url_error').text('');
             	$('#save_custom_url_success').text('');
             	$('#progressbar_url').show();

             	if(!/^[a-zA-Z0-9-_]+$/.test(customize_web_url)){
             		$('#progressbar_url').hide();
             		$('#save_custom_url_error').text("<?php echo ONLY_ALPHANUMERIC_AND_HYPHEN_ALLOWED;?>");
             		return false;
             	}
         		$.ajax({
						        type: "POST",
						        data: {customize_web_url: customize_web_url, event_id: <?php echo $event_id;?>}, 
						        url: "<?php echo site_url('event/customizeWebUrlCheck/');?>",
						        success: function(data) {
						        	var obj =jQuery.parseJSON(data);

						        	// console.log(obj);
						        	if(obj['error']!=''){
						        	   $('#save_custom_url_error').text(obj['error']);
						        	}else{
						        		$('#save_custom_url_success').text(obj['success']);
						        	}
						        	$('#progressbar_url').hide();
						        }
							    }); 
             }

             function add_Custom_url(arg)  {
             	if(arg=='add'){
             		$('#custom_url').removeClass('hide');
             		$('#add_Custom_url').addClass('hide');
             		$('#customize_web_url').val('');
             	}else if(arg=='remove'){
             		$('#custom_url').addClass('hide');
             		$('#add_Custom_url').removeClass('hide');
             	}
             }
		$(document).ready(function () {
			paid_ticket_fee = <?php echo $site_setting['paid_ticket_fee']; ?>;
			paid_ticket_fee = parseFloat(paid_ticket_fee);
			payment_gateway_fee = <?php echo $currency['payment_gateway_fee']; ?>;
			payment_gateway_fee = parseFloat(payment_gateway_fee);
			paid_ticket_flat_fee = <?php echo $site_setting['paid_ticket_flat_fee']; ?>;
			paid_ticket_flat_fee = parseFloat(paid_ticket_flat_fee);
			payment_gateway_flat_fee = <?php echo $currency['payment_gateway_flat_fee']; ?>;
			payment_gateway_flat_fee = parseFloat(payment_gateway_flat_fee);
			max_ticket_price = <?php echo $site_setting['max_ticket_price']?>;
			max_ticket_price = parseFloat(max_ticket_price);
			cur_symbol = $('#cur_symbol').val();
			if(cur_symbol==''){
				cur_symbol = "<?php echo getCurrencySymbol($event_id); ?>";
			}
			is_wallet = <?php echo ($event_details['is_wallet']) ? $event_details['is_wallet'] : 1; ?>;
			calculate_tickets_fee_structure();
		});
		function calculate_tickets_fee_structure() {
			$('input[name="paid_price[]"]').each(function(){
				calculate_ticket_fee_structure(this);
			});
		};
		function calculate_ticket_fee_structure(me) {
			// console.log("calculate_ticket_fee_structure");
			tbody = $(me).closest('tbody');
			price = tbody.find('input[name="paid_price[]"]');
			// console.log(price.length);
			if(price.length) {
				price_id = price.attr('id');
				if(price_id != "paid_price_1") {
					check_valid_price(price);
					// paid_ticket_id = tbody.find('input[name="paid_ticket_id[]"]');
					// paid_ticket_id = $(paid_ticket_id).val();
					take_estimate_ticket_amount = tbody.find('.take-estimate-ticket-amount');
					// take_estimate_ticket_amount = "#take-estimate-ticket-amount-"+paid_ticket_id;
					take_away_amount = tbody.find('.take-away-amount');
					// take_away_amount = "#take-away-amount-"+paid_ticket_id;
					take_estimate = tbody.find('.take-estimate');
					payment_gateway_fee_structure = take_estimate.find('.payment_gateway_fee_structure');
					// take_estimate = ".take-estimate-"+paid_ticket_id;
					paidServiceFees = tbody.find('input:radio.paidServiceFees:checked');
					// paidServiceFees = 'input[name="paid_service_fee'+paid_ticket_id+'[]"]:radio.paidServiceFees:checked';
					docs_tooltip = tbody.find('.docs-tooltip');
					// docs_tooltip = "#docs_tooltip"+paid_ticket_id;
					// docs_tooltip = tbody.find('.docs-tooltip');
					paid_fee_val = tbody.find('input[name="paid_fee[]"]');
					paid_total_val = tbody.find('input[name="paid_buyer_total[]"]');
					paid_fee_span = tbody.find('.paid_fee_span');
					paid_total_span = tbody.find('.paid_total_span');

					event_pass_fees = $('input[name="event_pass_fees"]:checked').val();
					if(event_pass_fees == 3) {
						// console.log($(paidServiceFees).val());
						if($(paidServiceFees).val() == 2) {
							is_pass = false;
						} else {
							is_pass = true;
						}
					} else if(event_pass_fees == 2) {
						is_pass = false;
					} else {
						is_pass = true;
					}
					buyer_amount = Fee = paidPrice = flatFee = 0.00;

					payment_gateway_fee_structure.html('~'+payment_gateway_fee.toFixed(2)+'% + '+payment_gateway_flat_fee.toFixed(2)+cur_symbol);
					totalSiteFee = 0;
					if($(price).val()) {
						// console.log("in");
						paidPrice = parseFloat($(price).val());
						gateway_fee = paidPrice * payment_gateway_fee / 100;
						gateway_fee = parseFloat(gateway_fee);
						// console.log("gateway_fee");
						// console.log(gateway_fee);
						// console.log("payment_gateway_flat_fee");
						// console.log(payment_gateway_flat_fee);
						total_gateway_fee = (gateway_fee + payment_gateway_flat_fee);
						// console.log("total_gateway_fee");
						// console.log(total_gateway_fee);
						// console.log('total_gateway_fee');
						// console.log(total_gateway_fee);
						siteFee = (paidPrice * paid_ticket_fee) / 100;
						totalSiteFee = siteFee + paid_ticket_flat_fee;
						owner_amount = 0;
						if(is_wallet == 1 && is_pass) {
							// console.log('Wallet and pass');
							Fee = siteFee;
							buyer_amount = (paidPrice + totalSiteFee + payment_gateway_flat_fee) / (1 - (payment_gateway_fee / 100));
							owner_amount = paidPrice;
						} else if(is_wallet == 1 && !is_pass) {
							// console.log('Wallet and absorb');
							owner_amount = paidPrice - totalSiteFee - total_gateway_fee;
							buyer_amount = paidPrice;
						} else if(is_wallet == 2 && is_pass) {
							// console.log('splite and pass');
							Fee = siteFee;
							// console.log("totalSiteFee");
							// console.log(totalSiteFee);
							// console.log("payment_gateway_flat_fee");
							// console.log(payment_gateway_flat_fee);
							// console.log("payment_gateway_fee");
							// console.log(payment_gateway_fee);
							buyer_amount = (paidPrice + totalSiteFee + payment_gateway_flat_fee) / (1 - (payment_gateway_fee / 100));
							owner_amount = paidPrice;
						} else if(is_wallet == 2 && !is_pass) {
							// console.log('splite and absorb');
							owner_amount = paidPrice - totalSiteFee - total_gateway_fee;
							// console.log('total_gateway_fee');
							// console.log(total_gateway_fee);
							// console.log('owner_amount');
							// console.log(owner_amount);
							buyer_amount = paidPrice;
						}
						// console.log("buyer_amount");
						// console.log(buyer_amount);
						buyer_amount = buyer_amount.toFixed(2);
						owner_amount = owner_amount.toFixed(2);
						
						flatFee = paid_ticket_flat_fee;
						$(take_estimate_ticket_amount).html(buyer_amount+' <label class="cur_symbol">'+cur_symbol+'</label>');
						$(take_away_amount).html('~'+owner_amount+' <label class="cur_symbol">'+cur_symbol+'</label>');
						$(take_estimate).css('display', 'block');
					} else {
						$(take_estimate).css('display', 'none');
					}
					buyer_amount = parseFloat(buyer_amount).toFixed(2);
					Fee = parseFloat(Fee).toFixed(2);
    				paidPrice = parseFloat(paidPrice).toFixed(2);
					flatFee = parseFloat(flatFee).toFixed(2);

    				$(paid_total_span).html('<label class="cur_symbol">'+cur_symbol+'</label>'+buyer_amount);
    				$(paid_total_val).val(buyer_amount);
					$(paid_fee_val).val(Fee);
					if(is_pass) {
						// console.log(buyer_amount);
						gatewayFee = parseFloat(buyer_amount) - parseFloat(paidPrice) - parseFloat(totalSiteFee);
						gatewayFee = parseFloat(gatewayFee).toFixed(2);
						totalFee = parseFloat(gatewayFee) +  parseFloat(totalSiteFee);
						totalFee = parseFloat(totalFee).toFixed(2);
    					$(paid_fee_span).html('<label class="cur_symbol">'+cur_symbol+'</label>'+totalFee);
						FeeLabel = '<span><label class="cur_symbol">'+cur_symbol+'</label>'+ Fee + '</span>';
						flatFeeLabel = '<span><label class="cur_symbol">'+cur_symbol+'</label>'+ flatFee + '</span>';
						gatewayLabel = '<span><label class="cur_symbol">'+cur_symbol+'</label>'+ gatewayFee + '</span>';
					} else {
						flatFeeLabel = "<span><?php echo N_A; ?> </span>";
						FeeLabel = "<span><?php echo N_A; ?> </span>";
						gatewayLabel = "<span><?php echo N_A; ?> </span>";
    					$(paid_fee_span).html('<label class="cur_symbol">'+cur_symbol+'</label>0.00');
					}
					var datatoltip = '<div class="clearfix">'
					datatoltip += "<?php echo Ticket_Price;?>"
					datatoltip += '<span>'
					datatoltip += '<label class="cur_symbol">'+cur_symbol+'</label>'+paidPrice+'</span>'
					datatoltip += '</div>'
					datatoltip += '<div class="clearfix">'
					datatoltip += "<?php echo Fee;?>"+FeeLabel+'</div>'
					datatoltip += '<div class="clearfix">'
					datatoltip += "<?php echo Flat_Fee;?>"+flatFeeLabel+'</div>'
					datatoltip += '<div class="clearfix">'
					datatoltip += "<?php echo "Gateway Fee";?>"+gatewayLabel+'</div>'
					datatoltip += '<div class="botm-bodr clearfix">'
					datatoltip += "<?php echo Buyer_Total;?>"
					datatoltip += '<span>'+$(paid_total_span).html()+'</span>'
					datatoltip += '</div>'
					$(docs_tooltip).html(datatoltip);
				}
			}
		}

		function check_valid_price(me) {
	    	$('#ticket_req_fields').html("");
	    	$('#ticket_req_fields').hide();

			ticket_price = $(me).val();
    		var testPattern=/^[0-9]*\.?[0-9]*$/;
		 	if(testPattern.test(ticket_price)==false || ticket_price ==0) {
		 		$(me).val('');
		 		ticket_price = '';
		 	} else if(ticket_price > max_ticket_price) {
		 		$(me).val('');
		 		ticket_price = '';
		    	$('#ticket_req_fields').html("<?php echo Ticket_price_should_be_less_than_or_equal_to.$site_setting['max_ticket_price']?>"); 
		    	$('#ticket_req_fields').show();
		 	}
		}

		function set_fee_and_total(id,ele){
			var eventValue = ele.value;
			calculate_ticket_fee_structure(ele);
		}
		function set_buyer_total(val) {
		 	if(val==3) {
		 		$('.paid_fee_div').show();
		 	} else {
		 		$('.paid_fee_div').hide();
		 	}
			calculate_tickets_fee_structure();
		}

		function set_paid_service_fee(val,id) {
			$('#'+id).val(val);
			// console.log(id);
			calculate_ticket_fee_structure("#"+id);
		}
 	</script>
