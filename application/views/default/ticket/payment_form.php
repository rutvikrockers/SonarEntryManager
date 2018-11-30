<?php $ticket_status = array_filter(ticket_setting()); 
$stripe = stripe_setting();
$authorize_net = authorize_net_setting();
$paypal = paypal_setting();
$site_setting['is_wallet'] = $event_details['is_wallet'];

?>
<?php 
if (strpos($order['tickets'], ',') !== false) {
	$ticket_array = explode(',',$order['tickets']);
} else {
  	$ticket_array[$order['tickets']] = $order['tickets'];
}
foreach($ticket_array as $key=>$val){
	$arr[$val] = $val;
}
$sessiondata = $this->input->get('session');

$allTicketsId = array_filter($_SESSION[$sessiondata]['ticket_qty']);
$selectKeyValueTicket = key(array_filter($_SESSION[$sessiondata]['ticket_qty']));

$flag = 0;
foreach($allTicketsId as $tkey => $tvalue){
	if(array_key_exists($tkey, $arr)){
		$flag = 1;
	}
}

if($order['ctype'] == 2 && $flag == 1){?>
<div class="panel panel-default who-go br">
	<div class="panel-heading brtl">
		<h3 class="panel-title"><?php echo TICKET_ATTENDEE_DETAILS;?></h3>
	</div>
	<div class="panel-body">
		<?php echo $this->load->view('default/ticket/ctype_2'); ?>
	</div>
</div>
<?php } ?>
<?php if(($dc >= 1 || $pc >= 1) && $attendee!="attendee" && $total!='0'){ ?>
<div class="panel panel-default who-go br">
	<div class="panel-heading brtl">
		<h3 class="panel-title">Payment Details</h3>
	</div>
	<div class="panel-body">	
		
		<?php if($authorize_net && $authorize_net['active'] == 1 && $site_setting['is_wallet'] == 1 && $event_details['is_wallet'] == 1) { ?>
		<div id="authorize_net_div" style="display: none;">
			<div class="form-group clearfix">
				<div class="col-sm-3 col-xs-12 lable-rite">
					<label><?php echo ADDRESS;?><span>*</span></label>
				</div>
				<div class="col-sm-8 col-xs-12">
					<input type="text" name="authorize_bill_add1" id="authorize_bill_add1" value="<?php echo SecureShowData($authorize_bill_add1);?>">
				</div>
			</div>

			<div class="form-group clearfix">
				<div class="col-sm-3 col-xs-12 lable-rite">
					<label><?php echo ADDRESS;?>2</label>
				</div>
				<div class="col-sm-8 col-xs-12">
					<input type="text" name="authorize_bill_add2" id="authorize_bill_add2" value="<?php echo SecureShowData($authorize_bill_add2);?>">
				</div>
			</div>

			<div class="form-group clearfix">
				<div class="col-sm-3 col-xs-12 lable-rite">
					<label><?php echo COUNTRY;?><span>*</span></label>
				</div>
				<div class="col-sm-8 col-xs-12">
					<select class="select-pad" name="authorize_bill_country" id="authorize_bill_country">
						<option value="">-- <?php echo SELECT_COUNTRY; ?> --</option>
						<?php 
						if($country){
							foreach($country as $countryb){
								
								$country_name = $countryb['country_name'];
								$country_id = $countryb['id'];
								
								if($country_id == $authorize_bill_country){
									$select='selected="selected"';
								}else{
									$select='';
								}
								
								echo '<option value="'.$country_id.'" '.$select.'>'.SecureShowData($country_name).'</option>';
								
							}
						}
						?>
					</select>
				</div>
			</div>

			<div class="form-group clearfix">
				<div class="col-sm-3 col-xs-12 lable-rite" >
					<label><?php echo STATE;?><span>*</span></label>
				</div>
				<div class="col-sm-8 col-xs-12" id="authorize_billdiv">
					<select class="select-pad" name="authorize_bill_state" id="authorize_bill_state">
						<option value="">-- <?php echo SELECT_STATE;?> --</option>
						<?php 
						if($state){
							foreach($state as $stateb){
								
								$state_name = $stateb['state_name'];
								$state_id = $stateb['id'];
								
								if($state_name == $authorize_bill_state){
									$select='selected="selected"';
								}else{
									$select='';
								}
								echo '<option value="'.$state_name.'" '.$select.'>'.SecureShowData($state_name).'</option>';
							}
						}
						?>
					</select>
				</div>
			</div>

			<div class="form-group clearfix">
				<div class="col-sm-3 col-xs-12 lable-rite">
					<label><?php echo CITY;?><span>*</span></label>
				</div>
				<div class="col-sm-8 col-xs-12">
					<input type="text" name="authorize_bill_city" id="authorize_bill_city" value="<?php echo SecureShowData($authorize_bill_city);?>">
				</div>
			</div>

			<div class="form-group clearfix">
				<div class="col-sm-3 col-xs-12 lable-rite">
					<label><?php echo ZIP;?> / <?php echo POSTAL_CODE;?><span>*</span></label>
				</div>
				<div class="col-sm-8 col-xs-12">
					<input type="text" name="authorize_bill_zip" id="authorize_bill_zip" value="<?php echo $authorize_bill_zip;?>" onkeypress="return IsNumeric(event);" maxlength="8">
				</div>
			</div>
		</div>
		<?php } ?>
		<?php if(($stripe && $stripe['active'] == 1) || ($authorize_net && $authorize_net['active'] == 1 && $site_setting['is_wallet'] == 1 && $event_details['is_wallet'] == 1)) { ?>
		<div id="stripe_div" style="display: none;">
			<?php $stripe_detail = getRecordById('stripe_paymant_details','user_id',$user_id);
			$credit_card_number = '';
			if($stripe_detail!=''){
				$credit_card_number = $stripe_detail['iban_number'];
			}
			?>
			<div class="form-group clearfix">
				<div class="col-sm-3 col-xs-12 lable-rite">
					<label><?php echo CREDIT_CARD_NUMBER; ?><span>*</span></label>
				</div>
				<div class="col-sm-8 col-xs-12">
					<input type="text" name="credit_card_number" id="credit_card_number" value="<?php echo $credit_card_number; ?>" maxlength="16" onkeypress="return IsNumeric(event);" placeholder="<?php echo CREDIT_CARD_NUMBER; ?>">
				</div>
			</div>
			<div class="form-group clearfix">
				<div class="col-sm-3 col-xs-12 lable-rite">
					<label><?php echo EXPIRY_MONTH; ?><span>*</span></label>
				</div>
				<div class="col-sm-3 col-xs-12">
					<select style="width:140px;" id="card_expiry_month" name="card_expiry_month" class="inputS_Default_S">
						<option value=""><?php echo MONTH; ?></option>
						<?php foreach (range(1,12) as $card_expiry_month) { ?>
						<option value="<?php echo $card_expiry_month; ?>"><?php echo $card_expiry_month; ?></option>
						<?php } ?>
					</select>
				</div>
				
				<div class="col-sm-2 col-xs-12 lable-rite">
					<label><?php echo EXPIRY_YEAR; ?><span>*</span></label>
				</div>
				<div class="col-sm-3 col-xs-12">
					<select style="width:140px;" id="card_expiry_year" name="card_expiry_year" class="inputS_Default_S">
						<option value=""><?php echo YEAR; ?></option>
						<?php $year1 = date('Y')+10;
						$year2 = date( "Y", strtotime(date('Y') ) );
						foreach (range($year2,$year1) as $card_expiry_year) { ?>
						<option value="<?php echo $card_expiry_year; ?>" ><?php echo $card_expiry_year; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group clearfix">
				<div class="col-sm-3 col-xs-12 lable-rite">
					<label><?php echo CCV_NUMBER; ?><span>*</span></label>
				</div>
				<div class="col-sm-8 col-xs-12">
					<input type="password" name="cvc_number" id="cvc_number" maxlength="4" value=""  onkeypress="return IsNumeric(event);" placeholder="<?php echo CCV_NUMBER; ?>">
				</div>
			</div>
		</div>
		<?php } ?>
		<div class="form-group clearfix">
			<div class="col-sm-3 col-xs-12 lable-rite">
				<label><?php echo Select_payment_gateway;?><span>*</span></label>
			</div>
			<div class="col-sm-8 col-xs-12">
				<?php if($paypal && $paypal['active'] == 1 && (($site_setting['is_wallet'] == 2 && $event_details['is_wallet'] == 2 && $paypal_event) || $site_setting['is_wallet'] == 1 && $event_details['is_wallet'] == 1)) { ?>
				<div class="radio">
					<label>
						<input type="radio" name="site[payment]" id="paypal" style="float:none;" value="paypal" onclick="set_payment_gateway();" /> <?php echo Paypal;?> 
						&nbsp;<img src="<?php echo base_url().'images/paypal_logo.png'; ?>" alt="paypal" style='height: 45px;width: 75px;'/>
					</label>
				</div>
				<?php } ?>
				<?php if($stripe && $stripe['active'] == 1 && (($site_setting['is_wallet'] == 2 && $event_details['is_wallet'] == 2 && $stripe_event) || $site_setting['is_wallet'] == 1 && $event_details['is_wallet'] == 1)) { ?>
				<div class="radio">
					<br/>
					<label>	
						<input type="radio" name="site[payment]" id="stripe" style="float:none;" value="stripe" onclick="set_payment_gateway();" /> <?php echo CREDIT_DEBIT_CARD; ?>
						&nbsp;<img src="<?php echo base_url().'images/credit_card_logos_15.gif'; ?>" alt="credit card" style='height: 45px;width: 200px;'/>
					</label>
				</div>
				<?php } ?>
				<?php if($authorize_net && $authorize_net['active'] == 1 && $site_setting['is_wallet'] == 1 && $event_details['is_wallet'] == 1) { ?>
				<div class="radio">
					<br/>
					<label>	
						<input type="radio" name="site[payment]" id="authorize_net" style="float:none;" value="authorize_net" onclick="set_payment_gateway();" /> <?php echo CREDIT_DEBIT_CARD; ?>
						&nbsp;<img src="<?php echo base_url().'images/credit_card_logos_15.gif'; ?>" alt="credit card" style='height: 45px;width: 200px;'/>
					</label>
				</div>
				<?php } ?>
				<?php if($site_setting['on_event_payment'] == 1 && $event_details['on_event_payment'] == 1) { ?>
				<div class="radio">
					<br/>
					<label>	
						<input type="radio" name="site[payment]" id="pay_at_event" style="float:none;" value="pay_at_event" onclick="set_payment_gateway();" /> <?php echo "Pay at event"; ?>
					</label>
				</div>
				<?php } ?>
			</div>
		</div>
		
	</div>
	
</div>
<?php } ?>
<div class="panel-body">
	<div class="text-center pt10 pb10">
		<?php if(!empty($ticket_status)) { ?>
		<i class="glyphicon glyphicon-warning-sign"></i> <span style="font-weight: bold;"><?php echo SOME_OSSUEON_TICKET_PURCHASE;?></span>
		<?php } elseif ($attendee == "attendee" || !$total) { ?>
		<a id="stop_dclick" href="javascript://" class="btn-event" onclick="submit_check_form();"><?php echo Pay_Now;?></a>
		<?php } else { ?>
		<a id="stop_dclick" href="javascript://" class="btn-event" onclick="submit_check_form();" style="display: none;"><?php echo Pay_Now;?></a>
		<?php } ?>
	</div>
</div>