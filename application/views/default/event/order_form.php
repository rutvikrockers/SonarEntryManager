<script>
	$('document').ready(function(){
		
		
		if($("#prefix_r").is(':checked') || $("#prefix_i").is(':checked')){
			$("#prefix_r").removeAttr("disabled");
		}
		if($("#suffix_r").is(':checked') || $("#suffix_i").is(':checked')){
			$("#suffix_r").removeAttr("disabled");
		}
		if($("#home_phone_r").is(':checked') || $("#home_phone_i").is(':checked')){
			$("#home_phone_r").removeAttr("disabled");
		}
		if($("#job_title_r").is(':checked') || $("#job_title_i").is(':checked')){
			$("#job_title_r").removeAttr("disabled");
		}
		if($("#company_r").is(':checked') || $("#company_i").is(':checked')){
			$("#company_r").removeAttr("disabled");
		}
		if($("#work_address_r").is(':checked') || $("#work_address_i").is(':checked')){
			$("#work_address_r").removeAttr("disabled");
		}
		if($("#work_phone_r").is(':checked') || $("#work_phone_i").is(':checked')){
			$("#work_phone_r").removeAttr("disabled");
		}
		if($("#website_r").is(':checked') || $("#website_i").is(':checked')){
			$("#website_r").removeAttr("disabled");
		}
		if($("#blog_r").is(':checked') || $("#blog_i").is(':checked')){
			$("#blog_r").removeAttr("disabled");
		}
		if($("#billing_address_r").is(':checked') || $("#billing_address_i").is(':checked')){
			$("#billing_address_r").removeAttr("disabled");
		}
		if($("#home_address_r").is(':checked') || $("#home_address_i").is(':checked')){
			$("#home_address_r").removeAttr("disabled");
		}
		if($("#shipping_address_r").is(':checked') || $("#shipping_address_i").is(':checked')){
			$("#shipping_address_r").removeAttr("disabled");
		}
		if($("#gender_r").is(':checked') || $("#gender_i").is(':checked')){
			$("#gender_r").removeAttr("disabled");
		}
		if($("#birthdate_r").is(':checked') || $("#birthdate_i").is(':checked')){
			$("#birthdate_r").removeAttr("disabled");
		}
		if($("#age_r").is(':checked') || $("#age_i").is(':checked')){
			$("#age_r").removeAttr("disabled");
		}
		if($("#info_radio_basic").is(':checked')){
			$("#inter_chk").hide();
			$("#advanced_chk").hide();
			$("#third_info").hide();
			$('input[type="submit"]').removeAttr("disabled");
			
		}
		if($("#info_radio_inter").is(':checked')){
			$("#inter_chk").show();
			$("#advanced_chk").hide();
			$("#third_info").hide();
			$('input[type="submit"]').removeAttr("disabled");
		}
		if($("#info_radio_advanced").is(':checked')){
			$("#inter_chk").show();
			$("#advanced_chk").show();
			$("#third_info").show();
			if($('input[name="attendee_chk[]"]:checked').length > 0){
				$('input[type="submit"]').removeAttr("disabled");
			}else{
				$('#show_chk_err').show();
				$('input[type="submit"]').attr("disabled", true);
			}
		}
		
		
		
		$('#info_radio_basic').on( "click", function(){
			if($("#info_radio_basic").is(':checked')){
				$("#inter_chk").hide();
				$("#advanced_chk").hide();
				$("#third_info").hide();
				$('input[type="submit"]').removeAttr("disabled");
			}
		});
		
		$('#info_radio_inter').on( "click", function(){
			if($("#info_radio_inter").is(':checked')){
				$("#inter_chk").show();
				$("#advanced_chk").hide();
				$("#third_info").hide();
				$('input[type="submit"]').removeAttr("disabled");
			}
		});
		
		$('#info_radio_advanced').on( "click", function(){
			if($("#info_radio_advanced").is(':checked')){
				$("#inter_chk").show();
				$("#third_info").show();
				$("#advanced_chk").show();
				if($('input[name="attendee_chk[]"]:checked').length > 0){
					$('input[type="submit"]').removeAttr("disabled");
				}else{
					$('#show_chk_err').show();
					$('input[type="submit"]').attr("disabled", true);
				}
			}
		});
		
		$('#sel_all').on( "click", function(){
			$( "input[id=attendee_chk]" ).prop('checked', true);
			$('#show_chk_err').hide();
			$('input[type="submit"]').removeAttr("disabled");
		});
		
		$('#desel_all').on( "click", function(){
			$( "input[id=attendee_chk]" ).prop('checked', false);
			$('#show_chk_err').show();
			$('input[type="submit"]').attr("disabled", true);
		});
		
		
		$('#fname_i').on( "click", function(){
			$( "#fname_i" ).prop('checked', true);
		});
		$('#fname_r').on( "click", function(){
			$( "#fname_r" ).prop('checked', true);
		});
		$('#lname_i').on( "click", function(){
			$( "#lname_i" ).prop('checked', true);
		});
		$('#lname_r').on( "click", function(){
			$( "#lname_r" ).prop('checked', true);
		});
		$('#email_i').on( "click", function(){
			$( "#email_i" ).prop('checked', true);
		});
		$('#email_r').on( "click", function(){
			$( "#email_r" ).prop('checked', true);
		});
		$('#cell_phone_i').on( "click", function(){
			$( "#cell_phone_i" ).prop('checked', true);
		});
		$('#cell_phone_r').on( "click", function(){
			$( "#cell_phone_r" ).prop('checked', true);
		});
		
		/*enable checboxes*/
		$('#prefix_i').on( "click", function(){
			if($("#prefix_i").is(':checked')){
				$("#prefix_r").removeAttr("disabled");
			}else{
				$( "#prefix_r" ).prop('checked', false);
				$("#prefix_r").attr("disabled", true);
			}
			
		});
		
		$('#suffix_i').on( "click", function(){
			if($("#suffix_i").is(':checked')){
				$("#suffix_r").removeAttr("disabled");
			}else{
				$( "#suffix_r" ).prop('checked', false);
				$("#suffix_r").attr("disabled", true);
			}
			
		});
		
		$('#home_phone_i').on( "click", function(){
			if($("#home_phone_i").is(':checked')){
				$("#home_phone_r").removeAttr("disabled");
			}else{
				$( "#home_phone_r" ).prop('checked', false);
				$("#home_phone_r").attr("disabled", true);
			}
			
		});
		
		$('#job_title_i').on( "click", function(){
			if($("#job_title_i").is(':checked')){
				$("#job_title_r").removeAttr("disabled");
			}else{
				$("#job_title_r" ).prop('checked', false);
				$("#job_title_r").attr("disabled", true);
			}
			
		});
		
		$('#company_i').on( "click", function(){
			if($("#company_i").is(':checked')){
				$("#company_r").removeAttr("disabled");
			}else{
				$( "#company_r" ).prop('checked', false);
				$("#company_r").attr("disabled", true);
			}
			
		});
		
		$('#work_address_i').on( "click", function(){
			if($("#work_address_i").is(':checked')){
				$("#work_address_r").removeAttr("disabled");
			}else{
				$( "#work_address_r" ).prop('checked', false);
				$("#work_address_r").attr("disabled", true);
			}
			
		});
		
		$('#work_phone_i').on( "click", function(){
			if($("#work_phone_i").is(':checked')){
				$("#work_phone_r").removeAttr("disabled");
			}else{
				$( "#work_phone_r" ).prop('checked', false);
				$("#work_phone_r").attr("disabled", true);
			}
			
		});
		
		$('#website_i').on( "click", function(){
			if($("#website_i").is(':checked')){
				$("#website_r").removeAttr("disabled");
			}else{
				$( "#website_r" ).prop('checked', false);
				$("#website_r").attr("disabled", true);
			}
			
		});
		
		$('#blog_i').on( "click", function(){
			if($("#blog_i").is(':checked')){
				$("#blog_r").removeAttr("disabled");
			}else{
				$( "#blog_r" ).prop('checked', false);
				$("#blog_r").attr("disabled", true);
			}
			
		});
		
		$('#billing_address_i').on( "click", function(){
			if($("#billing_address_i").is(':checked')){
				$("#billing_address_r").removeAttr("disabled");
			}else{
				$( "#billing_address_r" ).prop('checked', false);
				$("#billing_address_r").attr("disabled", true);
			}
			
		});
		$('#home_address_i').on( "click", function(){
			if($("#home_address_i").is(':checked')){
				$("#home_address_r").removeAttr("disabled");
			}else{
				$( "#home_address_r" ).prop('checked', false);
				$("#home_address_r").attr("disabled", true);
			}
			
		});
		$('#shipping_address_i').on( "click", function(){
			if($("#shipping_address_i").is(':checked')){
				$("#shipping_address_r").removeAttr("disabled");
			}else{
				$( "#shipping_address_r" ).prop('checked', false);
				$("#shipping_address_r").attr("disabled", true);
			}
			
		});
		$('#gender_i').on( "click", function(){
			if($("#gender_i").is(':checked')){
				$("#gender_r").removeAttr("disabled");
			}else{
				$( "#gender_r" ).prop('checked', false);
				$("#gender_r").attr("disabled", true);
			}
			
		});
		$('#birthdate_i').on( "click", function(){
			if($("#birthdate_i").is(':checked')){
				$("#birthdate_r").removeAttr("disabled");
			}else{
				$( "#birthdate_r" ).prop('checked', false);
				$("#birthdate_r").attr("disabled", true);
			}
			
		});
		$('#age_i').on( "click", function(){
			if($("#age_i").is(':checked')){
				$("#age_r").removeAttr("disabled");
			}else{
				$( "#age_r" ).prop('checked', false);
				$("#age_r").attr("disabled", true);
			}
			
		});
		
		$('input[name="questions_i[]"]').on( "click", function(){
			if($(this).is(':checked')){ 
				$(this).parent().parent().parent().next().find('input[name="questions_r[]"]').removeAttr("disabled");
			}else{
				$(this).parent().parent().parent().next().find('input[name="questions_r[]"]').prop('checked', false);
				$(this).parent().parent().parent().next().find('input[name="questions_r[]"]').attr("disabled", true);
			}
			
		});
		$('input[name="questions_i[]"]').each(function(){
			var get_id = this.id.split('_');
			get_id = get_id[get_id.length-1];
			
			if($(this).is(':checked')){
				$('#questions_r_'+get_id).removeAttr("disabled"); 
			}
			
		});
		
		$('input[name="attendee_chk[]"]').on( "click", function(){
			if($('input[name="attendee_chk[]"]:checked').length > 0){
				$('#show_chk_err').hide();
				$('input[type="submit"]').removeAttr("disabled");
			}else{
				$('#show_chk_err').show();
				$('input[type="submit"]').attr("disabled", true);
			}
			
		});
		
		
		
	});
function delete_question(id){
	if(confirm('<?php echo ARE_YOU_SURE_YOU_WANT_TO_DELETE_THIS_QUESTION; ?>')){
		window.location.href = '<?php echo site_url('event/delete_question/'.$id)?>/'+id; 
	}
	
}
</script>
<?php $this->load->view('default/common/dashboard-header')?>
<?php if($msg){
	?>	
	<div class="alert alert-success message"><?php echo $msg; ?></div>
	<?php }?>
	
	<?php if($error){
		?>	
		<div class="alert alert-danger message"><?php echo $error; ?></div>
		<?php }?>
		<section> 
			<?php 
			$data1['events_id'] = $id;
			$event_title =  $single_event[0]['event_title'];
			
			$ctype = $single_forms['ctype'];
			$ticketss = $single_forms['tickets'];
			$ticket_array = explode(',', $ticketss);
			$prefix = $single_forms['prefix'];
			$first_name = $single_forms['first_name'];
			$last_name = $single_forms['last_name'];
			$suffix = $single_forms['suffix'];
			$email = $single_forms['email'];
			$home_phone = $single_forms['home_phone'];
			$cell_phone = $single_forms['cell_phone'];
			$billing_address = $single_forms['billing_address'];
			$home_address = $single_forms['home_address'];
			$shipping_address = $single_forms['shipping_address'];
			$job_title = $single_forms['job_title'];
			$company = $single_forms['company'];
			$work_address = $single_forms['work_address'];
			$work_phone = $single_forms['work_phone'];
			$website = $single_forms['website'];
			$blog = $single_forms['blog'];
			$gender = $single_forms['gender'];
			$birth_date = $single_forms['birth_date'];
			$age = $single_forms['age'];
			$title_of_page = $single_forms['title_of_page'];
			$instructions = $single_forms['instructions'];
			$time_limit = $single_forms['time_limit'];
			$management = $single_forms['management'];
			$return_policy = $single_forms['return_policy'];
			
			?>
			
			<div class="container marTB50">
				
				<div class="row">
					<div class="col-md-8 col-sm-12">
						
						<form id="order_form" name="order_form" class="event-title event-title2" method="post" action="<?php echo site_url('event/order_customize/'.$id);?>">
							<div class="row">    
								
								<div class="event-webpage col-xs-12 col-sm-12">
									<div class="red-event width100 "><h4><?php echo CUSTOMIZE_ORDER_FORM;?></h4></div>
									<div class="clear"></div>
								</div><!-- End event-webpage -->
								
								
								<div class="col-sm-12  clearfix mb">
									<div class="event-detail event-detail2 pt pb">
										
										
										<div class="form-group clearfix " >
											<div class="col-sm-12 col-xs-12">
												<h3><?php echo WHAT_TYPE_OF_INFORMATION_DO_YOU_WANT_TO_COLLECT; ?></h3>
											</div>
										</div>	
										
										<div class="form-group clearfix ">
											<div class="col-sm-4 col-xs-4 lable-rite width-xs">
												<label><?php echo YOU_HAVE; ?> 3 <?php echo OPTIONS; ?></label>
											</div>
											<div class="col-sm-8 col-xs-8 width-xs">
												<div class="radio">
													<label>
														<input type="radio" name="info_radio" id="info_radio_basic" value="0" <?php if($ctype==0) { echo 'checked'; } ?> >
														<?php echo COLLECT_ONLY_BASIC_INFORMATION; ?> (<?php echo EMAIL;?>, <?php echo NAME;?>)
													</label>
												</div>
												
												<div class="radio">
													<label>
														<input type="radio" name="info_radio" id="info_radio_inter" value="1" <?php if($ctype==1) { echo 'checked'; } ?>>
														<?php echo COLLECT_INFORMATION_BELOW_FOR_THE_TICKET_BUYER_ONLY; ?>
													</label>
												</div>
												
												<div class="radio">
													<label>
														<input type="radio" name="info_radio" id="info_radio_advanced" value="2" <?php if($ctype==2) { echo 'checked'; } ?>>
														<?php echo COLLECT_INFORMATION_BELOW_FOR_EACH_ATTENDEE; ?>
														<i class="glyphicon glyphicon-question-sign edit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Collect information from just the ticket buyer or from all attendees (tickets purchased)."></i>
													</label>
												</div>
												<div class="col-sm-12" id="third_info">
													<p class="comment"><?php echo FOR_WHICH_TICKET_TYPES_DO_YOU_WANT_TO_COLLECT_INFORMATION; ?></p>
												</div>
											</div>
											
											<div class="pb col-sm-7 col-sm-offset-5  col-xs-8 col-xs-offset-5 offset2-xs selectall-container clearfix" id="advanced_chk">
												<div class="select-all select-all2">
													<ul>
														<li id="sel_all"><a href="javascript://"><?php echo SELECT_ALL; ?></a></li>
														<li id="desel_all"><a href="javascript://"><?php echo DESELECT_ALL; ?></a></li>
													</ul>
												</div>
												<?php	
												if($tickets){
													
													foreach($tickets as $tkt) {
														$ticket_names = $tkt['ticket_name'];
														$ticket_id = $tkt['tid'];
														$select='';
														
														if(in_array($ticket_id, $ticket_array)){
															$select='checked'; 
														}
														
														?>
														<div class="checkbox">
															<label>
																<input type="checkbox" value="<?php echo $ticket_id;?>" name="attendee_chk[]" id="attendee_chk" <?php echo $select;?>><?php echo SecureShowData($ticket_names);?>
															</label>
														</div>
														<?php
													}	
												} 
												?>
												<div class="checkbox" id="show_chk_err" style="display:none;">
													<label style="color:red;">
														<?php echo SELECT_AT_LEAST_ONE_TICKET; ?>
													</label>
												</div>                      
											</div>
											
											<div id="inter_chk">
												<div class="form-group clearfix pt ">
													<div class="col-sm-12 col-xs-12">
														<h3><?php echo INFORMATION_TO_COLLECT; ?></h3>
													</div>
												</div>
												
												
												<div class="col-xs-12 col-sm-6  clearfix">
													<div class="info-collect clearfix">
														<div class="col-xs-6 col-sm-6 p0">
															<label class="bold-label"><?php echo CONTACT; ?></label>
														</div>
														<div class="col-xs-6 col-sm-6 p0-xs2">
															<div class="col-xs-6 col-sm-6 p0">
																<label><?php echo INCL_UDE;?></label>
															</div>
															<div class="col-xs-6 col-sm-6 p0">
																<label><?php echo REQUIRED; ?></label>
															</div>
														</div>
														<div  class="info-field col-xs-12 col-sm-12 p0">
															<div class="col-xs-6 col-sm-6 p0">
																<label class="pt10 pr10"><?php echo PREFIX; ?> (<?php echo MR;?>., <?php echo MRS; ?>., <?php echo ETC; ?>.) :</label>
															</div>
															
															<div class="col-xs-6 col-sm-6 p0-xs2">
																<div class="col-xs-6 col-sm-6">
																	<div class="checkbox">
																		<label>
																			<input type="checkbox" value="1" name="prefix_i" id="prefix_i" <?php if($prefix) { echo 'checked'; } ?>>
																		</label>
																	</div>
																</div>
																<div class="col-xs-6 col-sm-6">
																	<div class="checkbox">
																		<label>
																			<input type="checkbox" value="1" disabled name="prefix_r" id="prefix_r" <?php if($prefix==11) { echo 'checked'; } ?>>
																		</label>
																	</div>
																</div>
																
															</div>
														</div>
														
														<div  class="info-field col-xs-12 col-sm-12 p0">
															<div class="col-xs-6 col-sm-6 p0">
																<label class="pt10 pr10"><?php echo  FIRST_NAME;?> :</label>
															</div>
															
															<div class="col-xs-6 col-sm-6 p0-xs2">
																<div class="col-xs-6 col-sm-6">
																	<div class="checkbox">
																		<label>
																			<input type="checkbox" value="1" name="fname_i" id="fname_i" checked>
																		</label>
																	</div>
																</div>
																<div class="col-xs-6 col-sm-6">
																	<div class="checkbox">
																		<label>
																			<input type="checkbox" value="1" name="fname_r" id="fname_r" checked>
																		</label>
																	</div>
																</div>
																
															</div>
														</div>
														
														<div  class="info-field col-xs-12 col-sm-12 p0">
															<div class="col-xs-6 col-sm-6 p0">
																<label class="pt10 pr10"><?php echo  LAST_NAME;?> :</label>
															</div>
															
															<div class="col-xs-6 col-sm-6 p0-xs2">
																<div class="col-xs-6 col-sm-6">
																	<div class="checkbox" >
																		<label>
																			<input type="checkbox" name="lname_i" id="lname_i" value="1" checked>
																		</label>
																	</div>
																</div>
																<div class="col-xs-6 col-sm-6">
																	<div class="checkbox">
																		<label>
																			<input type="checkbox" value="1" name="lname_r" id="lname_r" checked>
																		</label>
																	</div>
																</div>
																
															</div>
														</div>
														
														<div  class="info-field col-xs-12 col-sm-12 p0">
															<div class="col-xs-6 col-sm-6 p0">
																<label class="pt10 pr10"><?php echo  SUFFIX;?> :</label>
															</div>
															
															<div class="col-xs-6 col-sm-6 p0-xs2">
																<div class="col-xs-6 col-sm-6">
																	<div class="checkbox">
																		<label>
																			<input type="checkbox" value="1" name="suffix_i" id="suffix_i" <?php if($suffix) { echo 'checked'; } ?>>
																		</label>
																	</div>
																</div>
																<div class="col-xs-6 col-sm-6">
																	<div class="checkbox">
																		<label>
																			<input type="checkbox" value="1" disabled name="suffix_r" id="suffix_r" <?php if($suffix==11) { echo 'checked'; } ?>>
																		</label>
																	</div>
																</div>
																
															</div>
														</div>
														
														<div  class="info-field col-xs-12 col-sm-12 p0">
															<div class="col-xs-6 col-sm-6 p0">
																<label class="pt10 pr10"><?php echo EMAIL_ADDRESS; ?> :</label>
															</div>
															
															<div class="col-xs-6 col-sm-6 p0-xs2">
																<div class="col-xs-6 col-sm-6">
																	<div class="checkbox">
																		<label>
																			<input type="checkbox" value="1" name="email_i" id="email_i" checked>
																		</label>
																	</div>
																</div>
																<div class="col-xs-6 col-sm-6">
																	<div class="checkbox">
																		<label>
																			<input type="checkbox" value="1" name="email_r" id="email_r" checked>
																		</label>
																	</div>
																</div>
																
															</div>
														</div>
														
														<div  class="info-field col-xs-12 col-sm-12 p0">
															<div class="col-xs-6 col-sm-6 p0">
																<label class="pt10 pr10"><?php echo HOME_PHONE;?> :</label>
															</div>
															
															<div class="col-xs-6 col-sm-6 p0-xs2">
																<div class="col-xs-6 col-sm-6">
																	<div class="checkbox">
																		<label>
																			<input type="checkbox" value="1" name="home_phone_i" id="home_phone_i" <?php if($home_phone) { echo 'checked'; } ?>>
																		</label>
																	</div>
																</div>
																<div class="col-xs-6 col-sm-6">
																	<div class="checkbox">
																		<label>
																			<input type="checkbox" value="1" disabled name="home_phone_r" id="home_phone_r" <?php if($home_phone==11) { echo 'checked'; } ?>>
																		</label>
																	</div>
																</div>
																
															</div>
														</div>
														
														<div  class="info-field col-xs-12 col-sm-12 p0">
															<div class="col-xs-6 col-sm-6 p0">
																<label class="pt10 pr10"><?php echo CELL_PHONE;?> :</label>
															</div>
															
															<div class="col-xs-6 col-sm-6 p0-xs2">
																<div class="col-xs-6 col-sm-6">
																	<div class="checkbox">
																		<label>
																			<input type="checkbox" value="1" name="cell_phone_i" id="cell_phone_i" checked>                                               </label>
																		</div>
																	</div>
																	<div class="col-xs-6 col-sm-6">
																		<div class="checkbox">
																			<label>
																				<input type="checkbox" value="1" name="cell_phone_r" id="cell_phone_r" checked>
																			</label>
																		</div>
																	</div>
																	
																</div>
															</div>
															
															
														</div>
														
													</div>
													
													<div class="col-xs-12 col-sm-6  clearfix">
														<div class="info-collect clearfix">
															<div class="col-xs-6 col-sm-6 p0">
																<label class="bold-label"><?php echo WORK; ?></label>
															</div>
															<div class="col-xs-6 col-sm-6 p0-xs2">
																<div class="col-xs-6 col-sm-6 p0">
																	<label><?php echo INCL_UDE;?></label>
																</div>
																<div class="col-xs-6 col-sm-6 p0">
																	<label><?php echo REQUIRED; ?></label>
																</div>
															</div>
															<div class="info-field col-xs-12 col-sm-12 p0">
																<div class="col-xs-6 col-sm-6 p0">
																	<label class="pt10 pr10"><?php echo WORK_ADDRESS; ?> :</label>
																</div>
																
																<div class="col-xs-6 col-sm-6 p0-xs2">
																	<div class="col-xs-6 col-sm-6">
																		<div class="checkbox">
																			<label>
																				<input type="checkbox" value="1" name="work_address_i" id="work_address_i" <?php if($work_address) { echo 'checked'; } ?>>
																			</label>
																		</div>
																	</div>
																	<div class="col-xs-6 col-sm-6">
																		<div class="checkbox">
																			<label>
																				<input type="checkbox" value="1" disabled name="work_address_r" id="work_address_r" <?php if($work_address==11) { echo 'checked'; } ?>>
																			</label>
																		</div>
																	</div>
																	
																</div>
															</div>
															<div class="info-field col-xs-12 col-sm-12 p0">
																<div class="col-xs-6 col-sm-6 p0">
																	<label class="pt10 pr10"><?php echo Job_Title;?> :</label>
																</div>
																
																<div class="col-xs-6 col-sm-6 p0-xs2">
																	<div class="col-xs-6 col-sm-6">
																		<div class="checkbox">
																			<label>
																				<input type="checkbox" value="1" name="job_title_i" id="job_title_i" <?php if($job_title) { echo 'checked'; } ?>>
																			</label>
																		</div>
																	</div>
																	<div class="col-xs-6 col-sm-6">
																		<div class="checkbox">
																			<label>
																				<input type="checkbox" value="1" disabled name="job_title_r" id="job_title_r" <?php if($job_title==11) { echo 'checked'; } ?>>
																			</label>
																		</div>
																	</div>
																	
																</div>
															</div>
															
															<div class="info-field col-xs-12 col-sm-12 p0">
																<div class="col-xs-6 col-sm-6 p0">
																	<label class="pt10 pr10"><?php echo Company;?> / <?php echo ORGANIZATION; ?> :</label>
																</div>
																
																<div class="col-xs-6 col-sm-6 p0-xs2">
																	<div class="col-xs-6 col-sm-6">
																		<div class="checkbox">
																			<label>
																				<input type="checkbox" value="1" name="company_i" id="company_i" <?php if($company) { echo 'checked'; } ?>>
																			</label>
																		</div>
																	</div>
																	<div class="col-xs-6 col-sm-6">
																		<div class="checkbox">
																			<label>
																				<input type="checkbox" value="1" disabled name="company_r" id="company_r" <?php if($company==11) { echo 'checked'; } ?>>
																			</label>
																		</div>
																	</div>
																	
																</div>
															</div>
															
															
															
															<div class="info-field col-xs-12 col-sm-12 p0">
																<div class="col-xs-6 col-sm-6 p0">
																	<label class="pt10 pr10"><?php echo Work_Phone;?> :</label>
																</div>
																
																<div class="col-xs-6 col-sm-6 p0-xs2">
																	<div class="col-xs-6 col-sm-6">
																		<div class="checkbox">
																			<label>
																				<input type="checkbox" value="1" name="work_phone_i" id="work_phone_i" <?php if($work_phone) { echo 'checked'; } ?>>
																			</label>
																		</div>
																	</div>
																	<div class="col-xs-6 col-sm-6">
																		<div class="checkbox">
																			<label>
																				<input type="checkbox" value="1" disabled name="work_phone_r" id="work_phone_r" <?php if($work_phone==11) { echo 'checked'; } ?>>
																			</label>
																		</div>
																	</div>
																	
																</div>
															</div>
															
															<div  class="info-field col-xs-12 col-sm-12 p0">
																<div class="col-xs-6 col-sm-6 p0">
																	<label class="pt10 pr10"><?php echo Website;?> :</label>
																</div>
																
																<div class="col-xs-6 col-sm-6 p0-xs2">
																	<div class="col-xs-6 col-sm-6">
																		<div class="checkbox">
																			<label>
																				<input type="checkbox" value="1" name="website_i" id="website_i" <?php if($website) { echo 'checked'; } ?>>
																			</label>
																		</div>
																	</div>
																	<div class="col-xs-6 col-sm-6">
																		<div class="checkbox">
																			<label>
																				<input type="checkbox" value="1" disabled name="website_r" id="website_r" <?php if($website==11) { echo 'checked'; } ?>>
																			</label>
																		</div>
																	</div>
																	
																</div>
															</div>
															
															<div  class="info-field col-xs-12 col-sm-12 p0">
																<div class="col-xs-6 col-sm-6 p0">
																	<label class="pt10 pr10"><?php echo Blog; ?> :</label>
																</div>
																
																<div class="col-xs-6 col-sm-6 p0-xs2">
																	<div class="col-xs-6 col-sm-6">
																		<div class="checkbox">
																			<label>
																				<input type="checkbox" value="1" name="blog_i" id="blog_i" <?php if($blog) { echo 'checked'; } ?>>
																			</label>
																		</div>
																	</div>
																	<div class="col-xs-6 col-sm-6">
																		<div class="checkbox">
																			<label>
																				<input type="checkbox" value="1" disabled name="blog_r" id="blog_r" <?php if($blog==11) { echo 'checked'; } ?>>
																			</label>
																		</div>
																	</div>
																	
																</div>
															</div>
															
															
														</div>
														
													</div>
													
													<div class="clear"></div>
													
													<div class="col-xs-12 col-sm-6  clearfix">
														<div class="info-collect clearfix pt">
															<div class="col-xs-6 col-sm-6 p0">
																<label class="bold-label"><?php echo ADDRESS_INFORMATION; ?></label>
															</div>
															<div class="col-xs-6 col-sm-6 p0-xs2">
																<div class="col-xs-6 col-sm-6 p0">
																	<label><?php echo INCL_UDE;?></label>
																</div>
																<div class="col-xs-6 col-sm-6 p0">
																	<label><?php echo REQUIRED; ?></label>
																</div>
															</div>
															<div  class="info-field col-xs-12 col-sm-12 p0">
																<div class="col-xs-6 col-sm-6 p0">
																	<label class="pt10 pr10"><?php echo Billing_Address; ?> :</label>
																</div>
																
																<div class="col-xs-6 col-sm-6 p0-xs2">
																	<div class="col-xs-6 col-sm-6">
																		<div class="checkbox">
																			<label>
																				<input type="checkbox" value="1" name="billing_address_i" id="billing_address_i" <?php if($billing_address) { echo 'checked'; } ?>>
																			</label>
																		</div>
																	</div>
																	<div class="col-xs-6 col-sm-6">
																		<div class="checkbox">
																			<label>
																				<input type="checkbox" value="1" disabled name="billing_address_r" id="billing_address_r" <?php if($billing_address==11) { echo 'checked'; } ?>>
																			</label>
																		</div>
																	</div>
																	
																</div>
															</div>
															
															<div  class="info-field col-xs-12 col-sm-12 p0">
																<div class="col-xs-6 col-sm-6 p0">
																	<label class="pt10 pr10"><?php echo Home_Address;?> :</label>
																</div>
																
																<div class="col-xs-6 col-sm-6 p0-xs2">
																	<div class="col-xs-6 col-sm-6">
																		<div class="checkbox">
																			<label>
																				<input type="checkbox" value="1" name="home_address_i" id="home_address_i" <?php if($home_address) { echo 'checked'; } ?>> 
																			</label>
																		</div>
																	</div>
																	<div class="col-xs-6 col-sm-6">
																		<div class="checkbox">
																			<label>
																				<input type="checkbox" value="1" disabled name="home_address_r" id="home_address_r" <?php if($home_address==11) { echo 'checked'; } ?>>
																			</label>
																		</div>
																	</div>
																	
																</div>
															</div>
															
															<div  class="info-field col-xs-12 col-sm-12 p0">
																<div class="col-xs-6 col-sm-6 p0">
																	<label class="pt10 pr10"><?php echo Shipping_Address; ?> :</label>
																</div>
																
																<div class="col-xs-6 col-sm-6 p0-xs2">
																	<div class="col-xs-6 col-sm-6">
																		<div class="checkbox">
																			<label>
																				<input type="checkbox" value="1" name="shipping_address_i" id="shipping_address_i" <?php if($shipping_address) { echo 'checked'; } ?>>
																			</label>
																		</div>
																	</div>
																	<div class="col-xs-6 col-sm-6">
																		<div class="checkbox">
																			<label>
																				<input type="checkbox" value="1" disabled name="shipping_address_r" id="shipping_address_r" <?php if($shipping_address==11) { echo 'checked'; } ?>>
																			</label>
																		</div>
																	</div>
																	
																</div>
															</div>
															
														</div>
														
													</div>
													
													<div class="col-xs-12 col-sm-6  clearfix">
														<div class="info-collect clearfix pt">
															<div class="col-xs-6 col-sm-6 p0">
																<label class="bold-label"><?php echo OTHER; ?></label>
															</div>
															<div class="col-xs-6 col-sm-6 p0-xs2">
																<div class="col-xs-6 col-sm-6 p0">
																	<label><?php echo INCL_UDE;?></label>
																</div>
																<div class="col-xs-6 col-sm-6 p0">
																	<label><?php echo REQUIRED; ?></label>
																</div>
															</div>
															<div class="info-field col-xs-12 col-sm-12 p0">
																<div class="col-xs-6 col-sm-6 p0">
																	<label class="pt10 pr10"><?php echo Gender; ?> :</label>
																</div>
																
																<div class="col-xs-6 col-sm-6 p0-xs2">
																	<div class="col-xs-6 col-sm-6">
																		<div class="checkbox">
																			<label>
																				<input type="checkbox" value="1" name="gender_i" id="gender_i" <?php if($gender) { echo 'checked'; } ?>>
																			</label>
																		</div>
																	</div>
																	<div class="col-xs-6 col-sm-6">
																		<div class="checkbox">
																			<label>
																				<input type="checkbox" value="1" disabled name="gender_r" id="gender_r" <?php if($gender==11) { echo 'checked'; } ?>>
																			</label>
																		</div>
																	</div>
																	
																</div>
															</div>
															
															<div class="info-field col-xs-12 col-sm-12 p0">
																<div class="col-xs-6 col-sm-6 p0">
																	<label class="pt10 pr10"><?php echo Birth_Date; ?> :</label>
																</div>
																
																<div class="col-xs-6 col-sm-6 p0-xs2">
																	<div class="col-xs-6 col-sm-6">
																		<div class="checkbox">
																			<label>
																				<input type="checkbox" value="1" name="birthdate_i" id="birthdate_i" <?php if($birth_date) { echo 'checked'; } ?>>
																			</label>
																		</div>
																	</div>
																	<div class="col-xs-6 col-sm-6">
																		<div class="checkbox">
																			<label>
																				<input type="checkbox" value="1" disabled name="birthdate_r" id="birthdate_r" <?php if($birth_date==11) { echo 'checked'; } ?>>
																			</label>
																		</div>
																	</div>
																	
																</div>
															</div>
															
															<div class="info-field col-xs-12 col-sm-12 p0">
																<div class="col-xs-6 col-sm-6 p0">
																	<label class="pt10 pr10"><?php echo Age; ?> :</label>
																</div>
																
																<div class="col-xs-6 col-sm-6 p0-xs2">
																	<div class="col-xs-6 col-sm-6">
																		<div class="checkbox">
																			<label>
																				<input type="checkbox" value="1" name="age_i" id="age_i" <?php if($age) { echo 'checked'; } ?>>
																			</label>
																		</div>
																	</div>
																	<div class="col-xs-6 col-sm-6">
																		<div class="checkbox">
																			<label>
																				<input type="checkbox" value="1" disabled name="age_r" id="age_r" <?php if($age==11) { echo 'checked'; } ?>>
																			</label>
																		</div>
																	</div>
																	
																</div>
															</div>
															
														</div>
														
													</div>
													<div class="col-xs-12 col-sm-12  clearfix">
														<div class="info-collect clearfix pt">
															<?php
															if($questions){
																
																?>
																<div class="col-xs-6 col-sm-6 p0">
																	<label class="bold-label"><?php echo QUESTIONS; ?></label>
																</div>
																<div class="col-xs-6 col-sm-6 p0-xs2">
																	<div class="col-xs-6 col-sm-4 p0">
																		<label><?php echo INCL_UDE;?></label>
																	</div>
																	<div class="col-xs-6 col-sm-4 p0">
																		<label><?php echo REQUIRED;?></label>
																	</div>
																	<div class="col-xs-6 col-sm-4 p0">
																		<label><?php echo EDIT;?>/<?php echo DELETE;?></label>
																	</div>
																</div>
																<?php
																foreach($questions as $que){
																	
																	$question = $que['que'];
																	$question_id = $que['qid'];
																	$rules = $que['rules'];
																	
																	?>
																	<input type="hidden" value="<?php echo $question_id;?>" name="qid[]">
																	<div class="info-field col-xs-12 col-sm-12 p0">
																		<div class="col-xs-6 col-sm-6 p0">
																			<label class="pt10 pr10"><?php echo $question;?> :</label>
																		</div>
																		
																		<div class="col-xs-6 col-sm-6 p0-xs2">
																			<div class="col-xs-6 col-sm-4">
																				<div class="checkbox">
																					<label>
																						<input type="checkbox" value="<?php echo $question_id;?>" name="questions_i[]" id="questions_i_<?php echo $question_id;?>" <?php if($rules==1 || $rules==11) { echo 'checked'; } ?> >
																					</label>
																				</div>
																			</div>
																			<div class="col-xs-6 col-sm-4">
																				<div class="checkbox">
																					<label>
																						<input type="checkbox" value="<?php echo $question_id;?>" disabled name="questions_r[]" id="questions_r_<?php echo $question_id;?>" <?php if($rules==11) { echo 'checked'; } ?>>
																					</label>
																				</div>
																			</div>
																			<div class="col-xs-6 col-sm-4">
																				<div class="checkbox edit_deleteLink">
																					<label>
																						<input type="hidden" name="q_id" id="q_id" value="<?php echo $question_id;?>" />
																						<a href="<?php echo site_url('event/question/'.$id.'/'.$question_id);?>" class="edit_delete">Edit</a> | <a href="javascript://" onClick="delete_question(<?php echo $question_id;?>)" class="edit_delete">Delete</a>
																					</label>
																				</div>
																			</div>
																			
																		</div>
																	</div>
																	
																	
																	<?php }
																} ?>
															</div>
														</div>
														
														<div class="col-sm-4 col-xs-6 add-question fr clearfix browse">
															<a id="add_question" href="<?php echo site_url('event/question/'.$id);?>" class="btn-event2">Add Question</a>
															<input type="hidden" name="add_question_clicked" value="0" id="add_question_clicked" />
														</div>
													</div>   
												</div>
												
												

												
											</div>
										</div>
									</div>
									
									
									<div class="row">    
										
										<div class="event-webpage col-sm-12">
											<div class="red-event width100 "><h4><?php echo REGISTRATION_OPTIONS; ?> <span>(<?php echo OPTIONAL_SETTINGS; ?>)</span></h4></div>
											<div class="clear"></div>
										</div><!-- End event-webpage -->
										<div class="col-sm-12">
											<div class="event-detail clearfix">
												
												
												
												<div class="form-group pt clearfix">
													<div class="col-sm-4 col-xs-12 lable-rite">
														<label><?php echo TITLE_FOR_YOUR_ATTENDEE_INFO_PAGE; ?></label>
													</div>
													<div class="col-sm-7 col-xs-12">
														<input type="text" placeholder="Registration Information" name="title_of_page" id="title_of_page" value="<?php echo SecureShowData($title_of_page);?>">
													</div>
												</div>
												
												<div class="form-group clearfix">
													<div class="col-sm-4 col-xs-12 lable-rite">
														<label><?php echo INSTRUCTIONS_FOR_YOUR_ATTENDEES;?></label>
													</div>
													<div class="col-sm-7 col-xs-12">
														<textarea name="instructions" id="instructions"><?php echo SecureShowData($instructions);?></textarea>
													</div>
												</div>
												
												<div class="form-group clearfix pt">
													<div class="col-sm-4 col-xs-12 lable-rite">
														<label><?php echo REGISTRATION_TIME_LIMIT; ?></label>
													</div>
													<div class="col-sm-7 col-xs-12">
														<div class="col-sm-4 col-xs-4 width-xs2 p0-xs2">
															<input type="text" placeholder="15" name="time_limit" id="time_limit" value="<?php echo SecureShowData($time_limit);?>">
														</div>
														<div class="col-sm-8 p0">
															<label><?php echo MINUTES;?></label>
															<i class="glyphicon glyphicon-question-sign edit" data-toggle="tooltip" data-placement="top" title="" data-original-title="The Attendee transaction time limit locks tickets as pending transaction for the time period specified until the attendee completes the registration or time limit has been exceeded.If the transaction does not occur in specified time limit then ticket will be released. This is to prevent overselling of tickets."></i>
														</div>
													</div>
												</div>
												
												
												<div class="form-group clearfix">
													<div class="col-sm-4 col-xs-12 lable-rite">
														<label><?php echo ATTENDEE_MANAGEMENT; ?></label>
													</div>
													<div class="col-sm-7 clearfix">
														<div class="checkbox">
															<label>
																<input type="checkbox" value="1" name="management" id="management" <?php if($management) { echo 'checked'; } ?>><?php echo ALLOW_ATTENDEE_TO_UPDATE_INFORMATION_AFTER_REGISTRATION; ?>
															</label>
														</div>
													</div>
												</div>
               
             </div> <!-- event detail closes -->
             
             <div class="text-right">
             	<input type="submit" value="<?php echo SAVE;?>" class="btn-event2">
             </div>
             
           </div>
           
         </div>
       </form>	
     </div>
     
     <!-- RIGHT CONTENT -->
     <?php $this->load->view('default/common/event_dashboard_sidebar',$data1);?>
   </div>
   
 </div><!-- End container -->
 
</section>

<script>
	$(document).ready(function(){
		$("#add_question").click(function(){
			$('#add_question_clicked').val(1);
			$('#order_form').submit();
			return false;
		});
	});
</script>

<script>
	$(document).ready(function(){
		$(".rover_tip").popover();
	});
</script>

<script>
	$(document).ready(function(){
		$(".edit").tooltip();
	});
</script>