
<script type="text/javascript">
	function actionChange(a)
	{ 
		window.location.href='<?php echo site_url();?>'+a.value;

	}

</script>
<script type="text/javascript">
	function show(offset){
		var getStatusUrl= '<?php echo site_url('attendees/all_attendees_pagi');?>/'+offset;

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
$data1['events_id'] = $id;
?>
<?php $this->load->view('default/common/dashboard-header')?>
<section>  
	<div class="container marTB50">

		<div class="row">
			<div class="col-md-8 col-sm-12">

				<div class="row">    

					<div class="event-webpage col-sm-12 col-xs-12">
						<div class="red-event width100"><h4><?php echo ALL_ATTENDEES;?></h4></div>
						<div class="clear"></div>
					</div><!-- End event-webpage -->
					<div class="col-sm-12 col-xs-12">
						<div class="event-detail clearfix">

							<form class="event-title">

								<div class="col-sm-12 col-xs-12 pt15 pb15 alls">
									<table class="table table_res table_res2 mb0 event-info contct-table">
										<thead>
											<tr>
												<th><?php echo ATTENDEE_NAME; ?></th>   
												<th><?php echo EMAIL;?></th>
												<th><?php echo TICKET_TYPE?></th>
												<th>Barcode</th>
												<th><?php echo ACTIONS;?></th>
											</tr>
										</thead>

										<tbody>
											<?php
											$no=1;
											if($all_attendee){
												foreach($all_attendee as $attendee){
													$first_name = $attendee['first_name'];
													$attendee_id = $attendee['id'];
													$ticket_name = $attendee['ticket_name'];
													$last_name = $attendee['last_name'];
													$email = $attendee['email'];
													$checkin_status = $attendee['checkin_status'];
													?> 
													<tr>                                        
														<td><?php echo ucfirst(SecureShowData($first_name)).' '.ucfirst(SecureShowData($last_name));?></td>  
														<td><?php echo SecureShowData($email);?></td>
														<td><?php echo SecureShowData($ticket_name); ?></td>
														<td><?php echo $attendee['barcode_random']; ?></td>
														<td>
															<?php if($checkin_status=="0"){
																$check_div = 'check_div_'.$attendee_id; ?>
																<?php if($attendee['main_payment'] == 0 && $attendee['payment'] == 0 && $attendee['is_offline_payment'] == 1) { ?>
																<div id="<?php echo $check_div; ?>">
																	<a onClick="offline_payment(this);" class="check_in" data-id="<?php echo $attendee_id ?>" title="Payment"><i class="fa fa-check-circle-o" aria-hidden="true"></i></a>

																</div>
																<?php } else { ?>
																<div id="<?php echo $check_div; ?>">
																	<a onClick="checkin(this);" class="check_in" data-id="<?php echo $attendee_id ?>" title="Checkin"><i class="fa fa-check-circle-o" aria-hidden="true"></i></a>
																	<?php if ($attendee['is_offline_payment'] == 1){  ?>
																	<a onClick="revertpayment(this);" class="revert_payment" data-id="<?php echo $attendee_id ?>" title="Revert Payment"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>
																	<?php } ?>
																</div>
																<?php } ?>
																<?php }else{ 
																	$check_div = 'check_div_'.$attendee_id; ?>
																	<div id="<?php echo $check_div; ?>">
																		<a onClick="checkout(this);" class="checkin_ticked" data-id="<?php echo $attendee_id ?>" title="Checkout"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>

																	</div>
																	<?php } ?>
																</td>

															</tr>
															<?php
															$no++;
														}
													}else{?>
													<tr><td colspan="5"><?php echo NO_RECORDS; ?></td><td class="reg1" style="display: none"><?php echo $total_draft;?></td></tr>
													<?php } ?>


												</tbody>

											</table>
											<div class="text-right">
												<div class="pagi_block pagi_marB0">
													<?php echo $page_link; ?>
												</div>
												<div class="clear"></div>
											</div>
										</div>

									</form>

								</div> <!-- event detail closes -->

							</div>

						</div>

					</div> <!-- LEFT CONTENT ENDS -->

					<!-- RIGHT CONTENT -->
					<?php $this->load->view('default/common/event_dashboard_sidebar',$data1);?>
				</div>   

			</div><!-- End container -->
		</section>
		<script>
			$(document).ready(function(){
				$(".rover_tip").popover();
			});
		</script>

		<script>
			$(document).ready(function(){
				$(".edit").tooltip();
				$(".check_in").tooltip();
				$(".checkin_ticked").tooltip();
				$(".revert_payment").tooltip();
				$(".check_in").click(function(){
				});
			});

			function offline_payment(me) {
				var attendee_id = $(me).attr('data-id');
				var getUrl= '<?php echo site_url('attendees/offline_payment');?>/'+attendee_id;
				$.ajax({
					url: getUrl,
					dataType: 'json',
					type: 'POST',
					timeout: 99999,
					global: false,
					data: '[]',
					success: function(data)
					{   

						if(data.is_success) {
							// alert($.trim(data.attendee_id));
							console.log($("#check_div_"+$.trim(data.attendee_id)));
							$("#check_div_"+$.trim(data.attendee_id)).html('<a onClick="checkin(this);" class="check_in" data-id="'+$.trim(data.attendee_id)+'" title="Checkin"><i class="fa fa-check-circle-o" aria-hidden="true"></i></a>');
							 $("#check_div_"+$.trim(data.attendee_id)).find('a').after('<a onclick="revertpayment(this);" class="revert_payment" data-id="94" title="" data-original-title="Revert Payment"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>');
							$(".check_in").tooltip();
						}   
					},      
					error: function(XMLHttpRequest, textStatus, errorThrown)
					{
					}
				});
			}


			function revertpayment(me) {
				var attendee_id = $(me).attr('data-id');
				var getUrl= '<?php echo site_url('attendees/revert_payment');?>/'+attendee_id;
				$.ajax({
					url: getUrl,
					dataType: 'text',
					dataType: 'json',
					type: 'POST',
					timeout: 99999,
					global: false,
					data: '[]',
					success: function(data)
					{    
						if(data.is_success) {
							$("#check_div_"+$.trim(data.attendee_id)).html('<a onClick="offline_payment(this);" class="revert_payment" data-id="'+$.trim(data.attendee_id)+'" title="Payment"><i class="fa fa-check-circle-o" aria-hidden="true"></i></a>');
							$(".revert_payment").tooltip();

						}
					},      
					error: function(XMLHttpRequest, textStatus, errorThrown)
					{
					}
				});
			}

			function checkin(me) {
				var attendee_id = $(me).attr('data-id');
				var getUrl= '<?php echo site_url('attendees/checkin_attendee');?>/'+attendee_id;
				$.ajax({
					url: getUrl,
					dataType: 'text',
					type: 'POST',
					timeout: 99999,
					global: false,
					data: '[]',
					success: function(data)
					{                         
						$("#check_div_"+$.trim(data)).html('<a onClick="checkout(this);" class="checkin_ticked" data-id="'+$.trim(data)+'" title="Checkout"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>');
						$(".checkin_ticked").tooltip();

					},      
					error: function(XMLHttpRequest, textStatus, errorThrown)
					{
					}
				});
			}
			function checkout(me) {
				var attendee_id = $(me).attr('data-id');
				var getUrl= '<?php echo site_url('attendees/checkout_attendee');?>/'+attendee_id;
				$.ajax({
					url: getUrl,
					dataType: 'text',
					type: 'POST',
					timeout: 99999,
					global: false,
					data: '[]',
					success: function(data)
					{                         
						$("#check_div_"+$.trim(data)).html('<a onClick="checkin(this);" class="check_in" data-id="'+$.trim(data)+'" title="Checkin"><i class="fa fa-check-circle-o" aria-hidden="true"></i></a>');
						$(".check_in").tooltip();

						
					},      
					error: function(XMLHttpRequest, textStatus, errorThrown)
					{
					}
				});
			}


		</script>