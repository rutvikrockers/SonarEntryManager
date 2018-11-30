<!-- End of Darshan Code -->
<?php
	//echo '<pre>'; print_r($tickets);die;
	$ticket_amt = $tickets[0]['ticket_amt'];
  $total = $tickets[0]['total'];
	$ticket_qty = $tickets[0]['ticket_qty'];
	$ticket_name = $tickets[0]['ticket_name'];
	$start_sale = $tickets[0]['start_sale'];
	$end_sale = $tickets[0]['end_sale'];
	$event_title = $tickets[0]['event_title'];
	//$vanue_name = $tickets[0]['vanue_name'];
    $vanue_name = $event_venue['name'];
	$event_logo = $tickets[0]['event_logo'];
	//$event_detail = $tickets[0]['event_detail'];
	$street_address = $tickets[0]['street_address'];
        $organizer_id = $tickets[0]['organizer_id'];
        $event_id = $tickets[0]['eid'];
        
	
	if(!(float)$ticket_amt>0){
		$ticket_type = 'Free';
	}else{
		$ticket_type = 'Paid';
	}
	
	
	if($event_logo && file_exists('upload/event/thumb/'.$event_logo)){
		$event_image = base_url().'upload/event/thumb/'.$event_logo;
	}else{
		$event_image = base_url().'upload/event/thumb/no_img.jpeg';
	}
?>
<script>

 $(document).ready(function() {
    $('#paypal_info').show();
    $('#bank_info').hide();
    $('#cheque_info').hide();
                
     $('#with_paypal').show();
     $('#with_bank').hide();
     $('#with_cheque').hide(); 
            
   });
function set_withdraw_mode(){

    var result_value="";
    var withdraw_amt = document.getElementById('withdraw_amt');
      withdraw_amt = '<%= @withdraw_from_paypal.to_f %>';   
      document.getElementById('withdraw_amt').value = withdraw_amt;


    if (document.getElementById('paypal').checked) {
      result_value = document.getElementById('paypal').value;
     
      $('#with_paypal').show();
      $('#with_bank').hide();
      $('#with_cheque').hide();
     
      $('#paypal_info').show();
      $('#bank_info').hide();
      $('#cheque_info').hide();     

    }
    if (document.getElementById('net_banking').checked) {
      result_value = document.getElementById('net_banking').value;
      
      var withdraw_amt = document.getElementById('withdraw_amt');
      withdraw_amt = '<%= @withdraw_from_bank.to_f %>';
      document.getElementById('withdraw_amt').value = withdraw_amt;

      
      $('#with_bank').show();
      $('#with_paypal').hide();
      $('#with_cheque').hide();
      
      $('#bank_info').show();
      $('#paypal_info').hide();
      $('#cheque_info').hide();
    }
    if (document.getElementById('cheque').checked) {
      result_value = document.getElementById('cheque').value;
      
      var withdraw_amt = document.getElementById('withdraw_amt');
      withdraw_amt = '<%= @withdraw_from_cheque.to_f %>';
      document.getElementById('withdraw_amt').value = withdraw_amt;
      
      $('#with_cheque').show();
      $('#with_paypal').hide();
      $('#with_bank').hide();
      
      $('#cheque_info').show();
      $('#bank_info').hide();
      $('#paypal_info').hide();
      
    }
}

// Validations
function validateData(){
    
    var email_reg_exp = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
    var name_reg_exp = /^[a-z A-Z]+$/;  
    var LetNumSpaceSpec=/^[0-9a-z A-Z_-]+$/;
    var ifsc_reg_exp = /[A-Z|a-z]{4}[0]\d{6}$/; // 4 letters + 0 + 6 numbers
    var ac_number_reg_exp=/^[0-9]+$/;
    
    var filter = email_reg_exp;
    var filter1 = name_reg_exp; 
    var filter2 = LetNumSpaceSpec;
    var filter3 = ifsc_reg_exp;
    var filter4 = name_reg_exp;
    var filter5 = ac_number_reg_exp;
    
    // For Paypal and Referrer email
    if (document.getElementById('paypal').checked) {
    
    var paypal_name = $("#gateway_name").val();
    var paypal_account = $('#gateway_account').val();
    $('#err_gateway_name').text('');
    $('#err_gateway_account').text('');
    
    
    if(paypal_name==""){
      $('#err_gateway_name').text('<?php echo PLEASE_ENTER_RECIPIENT_NAME;?>');
      return false ;     
    }
    
    if(paypal_account==""){
    
      
      $('#err_gateway_account').text('<?php echo PLEASE_ENTER_PAYPAL_EMAIL;?>');
      return false ;
     
    }else if (!filter.test(paypal_account)){
      $('#err_gateway_account').text('<?php echo PAYPAL_EMAIL_SHOULD_BE_VALID;?>');
      return false ;
    }

    
    }// end paypal 

    
    /* ===== list of textboxes ===== */
    // for net-bank
    var bankname = $("#bank_name").val();
    var bankaddress = $("#bank_address").val();
    var bankcity = $("#bank_city").val();
    var bankstate = $("#bank_state").val();
    var bankcountry = $("#bank_country").val();

    var ac_holder_name = $('#bank_account_holder_name').val();
    var ac_number = $('#bank_account_number').val();
    
    var customer_address = $('#customer_address').val();
    var customer_city = $('#customer_city').val();
    var customer_country = $('#customer_country').val();
    var customer_province = $('#customer_province').val();
    var customer_code = $('#customer_code').val();
    
    // for cheque
    var cheque_name = $("#cheque_name").val();
    var chbranch = $('#cheque_branch').val();
    var chaddress = $('#org_address').val();
    
    /* ===== list of error divs ===== */
    
    
    
    // for bank
    var banknameerr = $("#banknameerr");
    
    //var brancherr = $('#brancherr');
    //var ifscerr = $('#ifscerr'); // pending
    var achodererr = $('#acholdererr');
    var acnumbererr = $('#acnumbererr');
    
    var customer_address_err = $('#customer_address_err');
    var customer_city_err = $('#customer_city_err');
    var customer_country_err = $('#customer_country_err');
    //var customer_ibak_err = $('#customer_ibak_err');
    var customer_code_err = $('#customer_code_err');
    var customer_province_err = $('#customer_province_err');
    
    
    // for cheque
    var chnameerr = $("#chnameerr");
    var chbrancherr = $('#chbrancherr');
    //var chifscerr = $('#chifscerr');
    //var chacnumbererr = $('#chacnumbererr');
    var chaddresserr = $('#chaddresserr');


    // Validations for Paypal and Referrer email
if (document.getElementById('net_banking').checked) {
    if(filter4.test(ac_holder_name) && filter5.test(ac_number) && filter1.test(bankname) && filter2.test(bankaddress) && filter1.test(bankcity) && filter1.test(bankstate) && filter1.test(bankcountry) && filter2.test(customer_address) && filter1.test(customer_city) && filter1.test(customer_province) && filter1.test(customer_country) && filter5.test(customer_code) ){
                    
        banknameerr.text('Name is valid');
        banknameerr.removeClass("error1");
        banknameerr.addClass("success");
        ifscerr.text('Valid IFSC  ');
        ifscerr.removeClass("error1");
        ifscerr.addClass("success");
        brancherr.removeClass("error1");
        ifscerr.removeClass("error1");
        
        
        return true;
    }   
    // Validations for Bank information     
    else if(!filter4.test(ac_holder_name)) {
                
        achodererr.text('<?php echo TYPE_A_VALID_AC_HOLDER_NAME_PLEASE;?>');
        achodererr.removeClass("success");
        achodererr.addClass("error1");
        return false;
    }
    else if(!filter5.test(ac_number)) {
                
        acnumbererr.text('<?php echo TYPE_VALID_AC_NUMBER_PLEASE;?>');
        acnumbererr.removeClass("success");
        acnumbererr.addClass("error1");
        return false;
    }
    else if(!filter1.test(bankname)) {
                
        banknameerr.text('<?php echo TYPE_A_VALID_NAME_PLEASE;?>');
        banknameerr.removeClass("success");
        banknameerr.addClass("error1");
        return false;
    }
    else if(!filter2.test(bankaddress)) {
                
        bank_address_err.text('<?php echo TYPE_A_VALID_ADDRESS_PLEASE;?>');
        bank_address_err.removeClass("success");
        bank_address_err.addClass("error1");
        return false;
    }
    else if(!filter1.test(bankcity)) {
                
        bank_city_err.text('<?php echo TYPE_A_VALID_CITY_PLEASE;?>');
        bank_city_err.removeClass("success");
        bank_city_err.addClass("error1");
        return false;
    }
    else if(!filter1.test(bankstate)) {
                
        bank_state_err.text('<?php echo TYPE_A_VALID_STATE_PLEASE;?>');
        bank_state_err.removeClass("success");
        bank_state_err.addClass("error1");
        return false;
    }
    else if(!filter1.test(bankcountry)) {
                
        bank_country_err.text('<?php echo TYPE_A_VALID_COUNTRY_PLEASE;?>');
        bank_country_err.removeClass("success");
        bank_country_err.addClass("error1");
        return false;
    }
    else if(!filter2.test(customer_address)) {
                
        customer_address_err.text('<?php echo TYPE_A_VALID_CUSTOME_ADDRESS_PLEASE;?>');
        customer_address_err.removeClass("success");
        customer_address_err.addClass("error1");
        return false;
    }
    else if(!filter1.test(customer_city)) {
                
        customer_city_err.text('<?php echo TYPE_A_VALID_CITY_PLEASE;?>');
        customer_city_err.removeClass("success");
        customer_city_err.addClass("error1");
        return false;
    }
    else if(!filter1.test(customer_province)) {
                
        customer_province_err.text('<?php echo TYPE_VALID_PROVINCE_PLEASE ?>');
        customer_province_err.removeClass("success");
        customer_province_err.addClass("error1");
        return false;
    }
    else if(!filter1.test(customer_country)) {
                
        customer_country_err.text('<?php echo TYPE_A_VALID_COUNTRY_PLEASE;?>');
        customer_country_err.removeClass("success");
        customer_country_err.addClass("error1");
        return false;
    }
    else if(!filter5.test(customer_code)) {
                
        customer_code_err.text('<?php echo TYPE_A_VALID_CUSTOME_CODE_PLEASE;?>');
        customer_code_err.removeClass("success");
        customer_code_err.addClass("error1");
        return false;
    }
        
}
// For Cheque..
if (document.getElementById('cheque').checked) {
    
    if(filter2.test(cheque_name) && filter2.test(chbranch) && filter3.test(chbranch) &&  filter2.test(chaddress)){
        return true;
    }
    else if(!filter2.test(cheque_name)) {
                
        chnameerr.text('<?php echo TYPE_A_VALID_CHEQUE_NAME;?>');
        chnameerr.removeClass("success");
        chnameerr.addClass("error1");
        return false;
    }   
    else if(!filter2.test(chbranch)) {
                
        chbrancherr.text('<?php echo TYPE_A_VALID_CHEQUE_BRANCH;?>');
        chbrancherr.removeClass("success");
        chbrancherr.addClass("error1");
        return false;
    }
    else if(!filter2.test(chaddress)) {
                
        chaddresserr.text('<?php echo TYPE_A_VALID_ADDRESS_PLEASE;?>');
        chaddresserr.removeClass("success");
        chaddresserr.addClass("error1");
        return false;
    }       
}
}// end function

</script>

<section class="eventDash-head">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 test-contct">
        <h1><?php echo CANCEL_TICKET_FORM; ?></h1>
      </div>
    </div>
  </div>
</section>
<section>
<div class="container marTB50">
<div class="col-md-8 col-md-offset-2 event-webpage">
  <div class="red-event">
    <h4><?php echo $event_title;?></h4>
  </div>
  <div class="event-detail pd15">
    <div class="clearfix dashHeader">
      <div class="row">
        <div class="col-sm-7 mb">
          <address>
          <p><?php if($event_detail['online_event_option']!='0' && $event_detail['online_event_option']=='1'){ echo "Online Event";}else{echo SecureShowData($vanue_name);?> | <?php echo setAddress($event_id, $event_venue);}?></p>
          </address>
          <p><strong><?php echo TOTAL_AMOUNT; ?>:</strong> <?php echo set_event_currency($total, $event_id);?></p>
          <p><strong><?php echo TICKET_NAME; ?>:</strong> <?php echo SecureShowData($ticket_name).'('.$ticket_type.')';?></p>
          <p><strong><?php echo TICKET_QUANTITY; ?>:</strong> <?php echo $ticket_qty;?></p>
          <form id="cancelorderForm" name="cancelorderForm" method="post" action="<?php echo site_url("ticket/cancel_confirm/".$p_id); ?>" accept-charset="UTF-8" class="event-title">
            <div class="form-group clearfix">
            	<div class="shadow form mt">
              <h4><?php echo SELECT_REFUND_MODE; ?><span>*</span></h4>
              <hr />
              <ul class="list-unstyled">
                <li>
                  <input type="radio" name="withdraw_mode" id="paypal" value="1" onclick="set_withdraw_mode();" checked="checked" />
                  <?php echo Paypal; ?> </li>
                <li>
                  <input type="radio" name="withdraw_mode" id="net_banking" value="2" onclick="set_withdraw_mode();" />
                  <?php echo NET_BANKING; ?> </li>
                <li>
                  <input type="radio" name="withdraw_mode" id="cheque" value="3" onclick="set_withdraw_mode();" />
                  <?php echo CHEQUE; ?> </li>
              </ul>
              <p><?php echo CANCEL_NOTE; ?></p>
            </div>
                <!-- Start Div Paypal Info -->
                <div id="paypal_info" style="display: none;" class="form marT10">
                  <div class="shadow mt40">
                    <h4><?php echo PAYPAL_DETAIL; ?></h4>
                    <hr />
                    <label><?php echo RECEIPT_NAME; ?> <span class="red">*</span></label>
                    <input type="text" value="" name="gateway_name" id="gateway_name" class="textbox">
                    <div id="err_gateway_name" class="marL30p_r error1"></div>
                    <label><?php echo PAYPAL_EMAIL; ?> <span class="red">*</span></label>
                    <?php if($user_detail['event_pay_account']!='') {?>
                    <input type="text" name="gateway_account" id="gateway_account" class="textbox" value="<?php echo $user_detail['event_pay_account']; ?>">
                    <div id="err_gateway_account" class="marL30p_r error1"></div>
                    <?php }else{ ?>
                    <input type="text" name="gateway_account" id="gateway_account" class="textbox" value="">
                    <?php } ?>
                  </div>
                </div>
                <!-- End Div Paypal Info -->
                <!-- Start Div Bank Info -->
                <div id="bank_info" style="display: none;" class="form marT10">
                  <div class="shadow mt40">
                    <h4><?php echo RECEIVING_CUSTOMER; ?>:</h4>
                    <hr />
                    <label><?php echo AC_HOLDER; ?>: <span class="red">*</span></label>
                    <input type="text" name="bank_account_holder_name" id="bank_account_holder_name" class="textbox">
                    <div id="acholdererr" style="margin-left: 190px;"></div>
                    <label><?php echo IBAN_NUMBER; ?>:<span class="red">*</span></label>
                    <input type="text" name="bank_account_number" maxlength="18" id="bank_account_number" class="textbox">
                    <div id="acnumbererr" style="margin-left: 190px;"></div>
                    <label><?php echo BANK_NAME; ?>: <span class="red">*</span></label>
                    <input type="text" name="bank_name" id="bank_name" class="textbox">
                    <div id="banknameerr" style="margin-left: 190px;"></div>
                    <label><?php echo BANK_ADDRESS; ?> : <span class="red">*</span></label>
                    <input type="text" name="bank_address" id="bank_address" class="textbox">
                    <div id="bank_address_err" style="margin-left: 190px;"></div>
                    <label><?php echo BANK_CITY; ?> : <span class="red">*</span></label>
                    <input type="text" name="bank_city" id="bank_city" class="textbox">
                    <div id="bank_city_err" style="margin-left: 190px;"></div>
                    <label><?php echo BANK_STATE; ?> : <span class="red">*</span></label>
                    <input type="text" name="bank_state" id="bank_state" class="textbox">
                    <div id="bank_state_err" style="margin-left: 190px;"></div>
                    <label><?php echo BANK_COUNTRY; ?> : <span class="red">*</span></label>
                    <input type="text" name="bank_country" id="bank_country" class="textbox">
                    <div id="bank_country_err" style="margin-left: 190px;"></div>
                  </div>
                  <div class="shadow mt40">
                    <h4><?php echo SETTLEMENT_BANK; ?>:</h4>
                    <hr />
                    <label><?php echo CUSTOMER_ADDRESS; ?>: <span class="red">*</span></label>
                    <input type="text" name="bank_customer_address" id="customer_address" class="textbox">
                    <div id="customer_address_err" style="margin-left: 190px;"></div>
                    <label><?php echo City; ?>: <span class="red">*</span></label>
                    <input type="text" name="bank_customer_city" id="customer_city" class="textbox">
                    <div id="customer_city_err" style="margin-left: 190px;"></div>
                    <label><?php echo Province; ?>: <span class="red">*</span></label>
                    <input type="text" name="bank_customer_province" id="customer_province" class="textbox">
                    <div id="customer_province_err" style="margin-left: 190px;"></div>
                    <label><?php echo Country; ?>: <span class="red">*</span></label>
                    <input type="text" name="bank_customer_country" id="customer_country" class="textbox">
                    <div id="customer_country_err" style="margin-left: 190px;"></div>
                    <label><?php echo CUSTOMER_CODE; ?>: <span class="red">*</span></label>
                    <input type="text" name="bank_customer_code" id="customer_code" class="textbox">
                    <div id="customer_code_err" style="margin-left: 190px;"></div>
                  </div>
                </div>
                <!-- End Div Bank Info -->
                <!-- Start Div Cheque Info -->
                <div id="cheque_info" style="display: none;" class="form marT10">
                  <div class="shadow mt40">
                    <h4> <?php echo CHEQUE_DETAIL; ?></h4>
                    <h5><?php echo CHEQUE_WILL_BE_ACCOUNTING; ?></h5>
                    <hr />
                    <label><?php echo NAME_ON_CHEQUE; ?>: <span class="red">*</span></label>
                    <input type="text" name="cheque_name" id="cheque_name" class="textbox">
                    <div id="chnameerr" class="marL30p_r error1"></div>
                    <label><?php echo BRANCH; ?>: <span class="red">*</span></label>
                    <input type="text" name="cheque_branch" id="cheque_branch" class="textbox">
                    <div id="chbrancherr" class="marL30p_r error1"></div>
                  </div>
                  <div class="shadow mt40">
                    <h4><?php echo POSTAL_ADDRESS; ?>:</h4>
                    <hr />
                    <label><?php echo Address; ?>: <span class="red">*</span></label>
                    <input type="text" name="org_address" id="org_address" class="textbox">
                    <div id="chaddresserr" class="marL30p_r error1"></div>
                    <label><?php echo City; ?>: </label>
                    <input type="text" name="org_city" id="org_city" class="textbox">
                    <label><?php echo State; ?>: </label>
                    <input type="text" name="org_state" id="org_state" class="textbox">
                    <label><?php echo Country; ?>: </label>
                    <input type="text" name="org_country" id="org_country" class="textbox">
                    <label><?php echo Zip_Code; ?>: </label>
                    <input type="text" name="org_zipcode" id="org_zipcode" class="textbox">
                  </div>
                </div>
                <!-- End Div Cheque Info -->
            </div>
            <input type="hidden" name="id" id="id" value="<?php echo $purchase_id; ?>" />
            <input type="hidden" name="qtys" id="tic_qty" value="<?php echo $ticket_qty; ?>"/>
            <input type="hidden" name="withdraw_amt" id="withdraw_amt" value="<?php echo $ticket_amt; ?>">
            <div class="form-group clearfix">
              <input type="submit" style="margin-right: 0px;" onclick="return validateData();" class="btn-event fr marT10" value="Submit" id="submit" name="submit">
            </div>
          </form>
        </div>
        <div class="col-sm-5"> <img src="<?php echo $event_image;?>" alt=" " class="img-responsive"  /> </div>
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
