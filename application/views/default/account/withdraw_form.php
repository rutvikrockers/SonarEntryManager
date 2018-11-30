
<?php

    $vanue_name = $event_venue['name'];
    $wcredit = $wallet[0]['wcredit'];
    $event_title = $event_detail['event_title'];
  	$event_logo = $event_detail['event_logo'];
    $ticket_amt = $wcredit;
	$event_image = event_image($event_id);
  	if($event_image && $event_image['image_name'] && file_exists('upload/event/thumb/'.$event_image['image_name'])){
  		$event_image = base_url().'upload/event/thumb/'.$event_image['image_name'];
  	} else {
  		$event_image = base_url().'upload/event/thumb/no_img.jpg';
  	}
?>
<style type="text/css">
  #paypal_info span.red{
    color: #ff0000;
  }
  #bank_info span.red{
    color: #ff0000;
  }
  #withdraw_amt span.red{
    color: #ff0000;
  }
  #cheque_info span.red{
    color: #ff0000;
  }
</style>
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
    withdraw_amt = '<?php echo $ticket_amt; ?>';   
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
      withdraw_amt = '<?php echo $ticket_amt; ?>';
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
      withdraw_amt = '<?php echo $ticket_amt; ?>';
      document.getElementById('withdraw_amt').value = withdraw_amt;
      
      $('#with_cheque').show();
      $('#with_paypal').hide();
      $('#with_bank').hide();
      
      $('#cheque_info').show();
      $('#bank_info').hide();
      $('#paypal_info').hide();
      
    }
}


function validateData(){
    
    var email_reg_exp = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
    var name_reg_exp = /^[a-z A-Z]+$/;  
    var LetNumSpaceSpec=/^[0-9a-z A-Z_-]+$/;
    var ifsc_reg_exp = /[A-Z|a-z]{4}[0]\d{6}$/; 
    var ac_number_reg_exp=/^[0-9]+$/;
    var LetNumChar=/^[0-9a-zA-Z]+$/;
    
    var filter = email_reg_exp;
    var filter1 = name_reg_exp; 
    var filter2 = LetNumSpaceSpec;
    var filter3 = ifsc_reg_exp;
    var filter4 = name_reg_exp;
    var filter5 = ac_number_reg_exp;
    var filter6 = LetNumChar;
        
    if (document.getElementById('paypal').checked) {
    
    var paypal_first_name = $("#paypal_first_name").val();
    var paypal_last_name = $("#paypal_last_name").val();
    var paypal_account = $('#paypal_email').val();
    $('#err_gateway_name').text('');
    $('#err_gateway_account').text('');
    
    
    if(paypal_first_name==""){
      $('#err_gateway_name').text('Please enter recipient name.');
      return false ;     
    }
    
    if(paypal_account==""){
    
      
      $('#err_gateway_account').text('Please enter Paypal email.');
      return false ;
     
    }else if (!filter.test(paypal_account)){
      $('#err_gateway_account').text('Paypal email should be valid.');
      return false ;
    }

    
    }

    
    /* ===== list of textboxes ===== */
    // for net-bank
    var bankname = $("#bank_name").val();
    var bankaddress = $("#bank_address").val();
    var bankcity = $("#bank_city").val();
    var bankstate = $("#bank_state").val();
    var bankcountry = $("#bank_country").val();

    var ac_holder_name = $('#bank_account_holder_name').val();
    var ac_number = $('#bank_account_number').val();
    var routing_number = $('#routing_number').val();
    
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
    
    var achodererr = $('#acholdererr');
    var acnumbererr = $('#acnumbererr');
    var re_acnumbererr = $('#re_acnumbererr');
     var routing_number_err = $('#routing_number_err');
    
    var customer_address_err = $('#customer_address_err');
    var customer_city_err = $('#customer_city_err');
    var customer_country_err = $('#customer_country_err');
    
    var customer_code_err = $('#customer_code_err');
    var customer_province_err = $('#customer_province_err');
    
    
    // for cheque
    var chnameerr = $("#chnameerr");
    var chbrancherr = $('#chbrancherr');    
    var chaddresserr = $('#chaddresserr');


    // Validations for Paypal and Referrer email
  if (document.getElementById('net_banking').checked) {
    if(filter4.test(ac_holder_name) && filter6.test(ac_number) && filter1.test(bankname) && filter2.test(bankaddress) && filter1.test(bankcity) && filter1.test(bankstate) && filter1.test(bankcountry) && filter2.test(customer_address) && filter1.test(customer_city) && filter1.test(customer_province) && filter1.test(customer_country) && filter5.test(customer_code) ){
                    
        //banknameerr.text('Name is valid');
       // banknameerr.removeClass("error1");
        //banknameerr.addClass("success");
        // ifscerr.text('Valid IFSC  ');
        // ifscerr.removeClass("error1");
        // ifscerr.addClass("success");
        // brancherr.removeClass("error1");
        // ifscerr.removeClass("error1");
        
        
        //return true;
     }   
   
    // Validations for Bank information     
    if(!filter4.test(ac_holder_name)) {
                
        achodererr.text('Type a valid A/C Holder Name  please');
        achodererr.removeClass("success");
        achodererr.addClass("error1");
        return false;
    }
    else if(!filter6.test(ac_number)) {
                
        acnumbererr.text('Type a valid A/C Number  please');
        acnumbererr.removeClass("success");
        acnumbererr.addClass("error1");
        return false;
    }else if($('#bank_account_number').val()!=$('#re_bank_account_number').val()){
        re_acnumbererr.text('Type a valid A/C Number Not match please Confirm.');
        re_acnumbererr.removeClass("success");
        re_acnumbererr.addClass("error1");
        return false;
    }
     else if(routing_number=='') {
                
        acnumbererr.text('Type a routing number Number please');
        acnumbererr.removeClass("success");
        acnumbererr.addClass("error1");
        return false;
      }
      else if(!filter1.test(bankname)) {
                
        banknameerr.text('Type a valid name please');
        banknameerr.removeClass("success");
        banknameerr.addClass("error1");
        return false;
    }
    else if(!filter2.test(bankaddress)) {
                
        bank_address_err.text('Type a valid Address please');
        bank_address_err.removeClass("success");
        bank_address_err.addClass("error1");
        return false;
    }
    else if(!filter1.test(bankcity)) {
                
        bank_city_err.text('Type a valid City please');
        bank_city_err.removeClass("success");
        bank_city_err.addClass("error1");
        return false;
    }
    else if(!filter1.test(bankstate)) {
                
        bank_state_err.text('Type a valid State please');
        bank_state_err.removeClass("success");
        bank_state_err.addClass("error1");
        return false;
    }
    else if(!filter1.test(bankcountry)) {
                
        bank_country_err.text('Type a valid Country please');
        bank_country_err.removeClass("success");
        bank_country_err.addClass("error1");
        return false;
    }
    else if(!filter2.test(customer_address)) {
                
        customer_address_err.text('Type a valid Custome Address please');
        customer_address_err.removeClass("success");
        customer_address_err.addClass("error1");
        return false;
    }
    else if(!filter1.test(customer_city)) {
                
        customer_city_err.text('Type a valid City please');
        customer_city_err.removeClass("success");
        customer_city_err.addClass("error1");
        return false;
    }
    else if(!filter1.test(customer_province)) {
                
        customer_province_err.text('Type a valid  Province please');
        customer_province_err.removeClass("success");
        customer_province_err.addClass("error1");
        return false;
    }
    else if(!filter1.test(customer_country)) {
                
        customer_country_err.text('Type a valid  Country please');
        customer_country_err.removeClass("success");
        customer_country_err.addClass("error1");
        return false;
    }
    // else if(!filter5.test(customer_code)) {
                
    //     customer_code_err.text('Type a valid Custome Code please');
    //     customer_code_err.removeClass("success");
    //     customer_code_err.addClass("error1");
    //     return false;
    // }
        
}
// For Cheque..
if (document.getElementById('cheque').checked) {
    
    if(filter2.test(cheque_name) && filter2.test(chbranch) && filter3.test(chbranch) &&  filter2.test(chaddress)){
        return true;
    }
    else if(!filter2.test(cheque_name)) {
                
        chnameerr.text('Type a valid cheque name');
        chnameerr.removeClass("success");
        chnameerr.addClass("error1");
        return false;
    }   
    else if(!filter2.test(chbranch)) {
                
        chbrancherr.text('Type a valid cheque branch');
        chbrancherr.removeClass("success");
        chbrancherr.addClass("error1");
        return false;
    }
    else if(!filter2.test(chaddress)) {
                
        chaddresserr.text('Type a valid Address please');
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
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 test-contct test-cntr">
                <h1><?php echo MY_ACCOUNT; ?></h1>
          </div>
         
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right pt mt10 con-cntr">
        
            <div class="halfacc">
             <p><?php echo $site_setting['site_name']; ?> <?php echo ACCOUNT_SINCE; ?> <span><?php echo datetimeformat($user_info['created_at']);?> <?php echo timeFormat($user_info['created_at']); ?></span></p>
             <?php if($user_info['ref_id'])
                  {
                    $admin=getRecordById('users','id',$user_info['ref_id']);
                  ?><p><?php echo THE_MAIN_ACCOUNT_HOLDER_IS;?> <span><?php echo $admin['email'] ;?></span></p>
            <?php } ?>
            <!--code change by darshan end-->
            </div>
          </div>
        
      </div>
    </div>
  </section>
<section>
 <?php if($success_msg){
        ?>
        <div class="alert alert-success message"><?php echo $success_msg; ?></div>
      <?php }?>
      <?php if($error_msg){
        ?>
        <div class="alert alert-danger message"><?php echo $error_msg; ?></div>
      <?php }?>
<div class="container marTB50">
	<div class="row">
    	<div class="col-md-8 col-md-offset-2 event-webpage">
  <div class="red-event">
    <h4><?php echo $event_title;?></h4>
  </div>
  <div class="event-detail pd15">
    <div class="clearfix dashHeader withdraw_form">
      <div class="row">
      	<div class="col-sm-7 mb">
        <address>
        <?php if($event_detail['online_event_option']){ echo "Online Event"; }else{ ?>
        <p><?php echo $vanue_name;?> | <?php echo setAddress($event_id, $event_venue);?></p>
        <?php } ?>
        </address>
        <p><strong><?php echo TOTAL_AMOUNT; ?>:</strong> <?php echo set_event_currency($wcredit, $event_id);?></p>
        <form id="cancelorderForm" name="cancelorderForm" method="post" action="<?php echo site_url('account/withdraw_request/'.$event_id); ?>" accept-charset="UTF-8">
          <div class="form-group clearfix">
          	<input type="hidden" name="amount" value="<?php echo $wcredit;?>">
            	<div class="shadow form mt">
                <div>
                  <h4><?php echo SELECT_REFUND_MODE; ?> <span>*</span></h4>
                  <ul class="list-unstyled">
                    <li>
                      <input type="radio" name="withdraw_mode" id="paypal" value="1" onclick="set_withdraw_mode();" checked="checked" />
                      <?php echo Paypal; ?> </li>
                    <li>
                      <input type="radio" name="withdraw_mode" id="net_banking" value="2" onclick="set_withdraw_mode();" />
                      <?php echo BANK_WIRE; ?> </li>
                    <li>
                      <input type="radio" name="withdraw_mode" id="cheque" value="3" onclick="set_withdraw_mode();" />
                      <?php echo CHEQUE; ?> </li>
                  </ul>
                  <p><?php echo CANCEL_NOTE; ?></p>
                </div>
              </div>
                  <!-- Start Div Paypal Info -->
                  <div id="paypal_info" style="display:none;" class="form mt40">
                    <div class="shadow marT10 event-title">
                      <h4><?php echo PAYPAL_DETAIL; ?></h4>
                      <hr />
                      <label><?php echo FIRST_NAME; ?> <span class="red">*</span></label>
                      <input type="text"  name="paypal_first_name" id="paypal_first_name" class="textbox" value="<?php echo SecureShowData($withdrow_transaction_detail['paypal_first_name']); ?>">
                      <div id="err_paypal_first_name" class="marL30p_r error1"></div>
                       <label><?php echo LAST_NAME; ?> <span class="red">*</span></label>
                      <input type="text" name="paypal_last_name" id="paypal_last_name" value="<?php echo SecureShowData($withdrow_transaction_detail['paypal_last_name']); ?>" class="textbox">
                      <div id="err_paypal_last_name" class="marL30p_r error1"></div>
                      <label><?php echo PAYPAL_EMAIL; ?> <span class="red">*</span></label>
                      <input type="text" name="paypal_email" id="paypal_email" class="textbox" value="<?php echo SecureShowData($withdrow_transaction_detail['paypal_email']); ?>">
                      <div id="err_gateway_account" class="marL30p_r error1"></div>
                    </div>
                  </div>
                  <!-- End Div Paypal Info -->
                  <!-- Start Div Bank Info -->
                  <div class="event-title">
                      <div id="bank_info" style="display: none;" class="form mt40">
                        <div class="shadow marT10 has-error">
                          <h4><?php echo  SETTLEMENT_BANK; ?>:</h4>
                          <hr />
                          <label><?php echo AC_HOLDER; ?>: <span class="red">*</span></label>
                          <input type="text" name="bank_account_holder_name" id="bank_account_holder_name" class="textbox" value="<?php echo SecureShowData($withdrow_transaction_detail['bank_account_holder_name']); ?>">
                          <div id="acholdererr" style="margin-left: 190px;"></div>
                          <label><?php echo IBAN_NUMBER; ?>:<span class="red">*</span></label>
                          <input type="text" name="bank_account_number" maxlength="18" id="bank_account_number" class="textbox" value="<?php echo SecureShowData($withdrow_transaction_detail['bank_account_number']); ?>">
                          <div id="acnumbererr" style="margin-left: 190px;"></div>
                          <label><?php echo RE_IBAN_NUMBER; ?>:<span class="red">*</span></label>
                          <input type="text" name="re_bank_account_number" maxlength="18" id="re_bank_account_number" class="textbox" value="">
                          <div id="re_acnumbererr" style="text-align: right;"></div>
                          <label><?php echo ROUTING_NUMBER; ?>:<span class="red">*</span></label>
                          <input type="text" name="routing_number" id="routing_number" class="textbox" value="<?php echo SecureShowData($withdrow_transaction_detail['routing_number']); ?>">
                          <div id="routing_number_err" style="margin-left: 190px;"></div>
                          <label><?php echo BANK_NAME; ?>: <span class="red">*</span></label>
                          <input type="text" name="bank_name" id="bank_name" class="textbox" value="<?php echo SecureShowData($withdrow_transaction_detail['bank_name']); ?>">
                          <div id="banknameerr" style="margin-left: 190px;"></div>
                          <label><?php echo BANK_ADDRESS; ?> : <span class="red">*</span></label>
                          <input type="text" name="bank_address" id="bank_address" class="textbox" value="<?php echo SecureShowData($withdrow_transaction_detail['bank_address']); ?>">
                          <div id="bank_address_err" style="margin-left: 190px;"></div>
                          <label><?php echo BANK_CITY; ?> : <span class="red">*</span></label>
                          <input type="text" name="bank_city" id="bank_city" class="textbox" value="<?php echo SecureShowData($withdrow_transaction_detail['bank_city']); ?>">
                          <div id="bank_city_err" style="margin-left: 190px;"></div>
                          <label><?php echo BANK_STATE; ?> : <span class="red">*</span></label>
                          <input type="text" name="bank_state" id="bank_state" class="textbox" value="<?php echo SecureShowData($withdrow_transaction_detail['bank_state']); ?>">
                          <div id="bank_state_err" style="margin-left: 190px;"></div>
                          <label><?php echo BANK_COUNTRY; ?> : <span class="red">*</span></label>
                          <input type="text" name="bank_country" id="bank_country" class="textbox" value="<?php echo SecureShowData($withdrow_transaction_detail['bank_country']); ?>">
                          <div id="bank_country_err" style="margin-left: 190px;"></div>
                        </div>
                        <div class="shadow mt40">
                          <h4><?php echo RECEIVING_CUSTOMER; ?>:</h4>
                          <hr />
                          <label><?php echo CUSTOMER_ADDRESS; ?>: <span class="red">*</span></label>
                          <input type="text" name="bank_settlement_address" id="customer_address" class="textbox" value="<?php echo SecureShowData($withdrow_transaction_detail['bank_settlement_address']); ?>">
                          <div id="customer_address_err" style="margin-left: 190px;"></div>
                          <label><?php echo City; ?>: <span class="red">*</span></label>
                          <input type="text" name="bank_settlement_city" id="customer_city" class="textbox" value="<?php echo SecureShowData($withdrow_transaction_detail['bank_settlement_city']); ?>">
                          <div id="customer_city_err" style="margin-left: 190px;"></div>
                          <label><?php echo Province; ?>: <span class="red">*</span></label>
                          <input type="text" name="bank_settlement_province" id="customer_province" class="textbox" value="<?php echo SecureShowData($withdrow_transaction_detail['bank_settlement_province']); ?>">
                          <div id="customer_province_err" style="margin-left: 190px;"></div>
                          <label><?php echo Country; ?>: <span class="red">*</span></label>
                          <input type="text" name="bank_settlement_country" id="customer_country" class="textbox" value="<?php echo SecureShowData($withdrow_transaction_detail['bank_settlement_country']); ?>">
                          <div id="customer_country_err" style="margin-left: 190px;"></div>
                          <label><?php echo Zip_Code; ?>: </label>
                          <input type="text" name="bank_settlement_bankcode" id="customer_code" class="textbox" value="<?php echo SecureShowData($withdrow_transaction_detail['bank_settlement_bankcode']); ?>">
                          <div id="customer_code_err" style="margin-left: 190px;"></div>
                        </div>
                      </div>
                  </div>
                  <!-- End Div Bank Info -->
                  <!-- Start Div Cheque Info -->
                  <div id="cheque_info" style="display: none;" class="form mt40">
                    <div class="shadow mt40 event-title">
                      <h4> <?php echo CHEQUE_DETAIL; ?></h4>
                      <hr />
                      <h5><?php echo CHEQUE_WILL_BE_ACCOUNTING; ?></h5>
                      <label><?php echo NAME_ON_CHEQUE; ?>: <span class="red">*</span></label>
                      <input type="text" name="cheque_name" id="cheque_name" class="textbox" value="<?php echo SecureShowData($withdrow_transaction_detail['cheque_name']); ?>">
                      <div id="chnameerr" class="marL30p_r error1"></div>
                      <label><?php echo BRANCH; ?>: <span class="red">*</span></label>
                      <input type="text" name="cheque_branch" id="cheque_branch" class="textbox" value="<?php echo SecureShowData($withdrow_transaction_detail['cheque_branch']); ?>">
                      <div id="chbrancherr" class="marL30p_r error1"></div>
                    </div>
                    <div class="shadow mt40 event-title">
                      <h4><?php echo POSTAL_ADDRESS; ?>:</h4>
                      <hr />
                      <label><?php echo Address; ?>: <span class="red">*</span></label>
                      <input type="text" name="org_address" id="org_address" class="textbox" value="<?php echo SecureShowData($withdrow_transaction_detail['org_address']); ?>">
                      <div id="chaddresserr" class="marL30p_r error1"></div>
                      <label><?php echo City; ?>: </label>
                      <input type="text" name="org_city" id="org_city" class="textbox" value="<?php echo SecureShowData($withdrow_transaction_detail['org_city']); ?>">
                      <label><?php echo State; ?>: </label>
                      <input type="text" name="org_state" id="org_state" class="textbox" value="<?php echo SecureShowData($withdrow_transaction_detail['org_state']); ?>">
                      <label><?php echo Country; ?>: </label>
                      <input type="text" name="org_country" id="org_country" class="textbox" value="<?php echo SecureShowData($withdrow_transaction_detail['org_country']); ?>">
                      <label><?php echo Zip_Code; ?>: </label>
                      <input type="text" name="org_zipcode" id="org_zipcode" class="textbox" value="<?php echo SecureShowData($withdrow_transaction_detail['org_zipcode']); ?>">
                    </div>
                  </div>
                  <!-- End Div Cheque Info -->
            
          </div>
          <div class="form-group clearfix">
          	
            	<input type="hidden" name="event_id" id="event_id" value="<?php echo $event_id; ?>" />
                  <input type="hidden" name="withdraw_amt" id="withdraw_amt" value="<?php echo $ticket_amt; ?>">
                  <div>
                    <input type="submit" onclick="return validateData();" class="btn-event fr marT10" value="<?php echo SAVE;?>" id="submit" name="submit">
                  </div>
            
          </div>
        </form>
      </div>
      <div class="col-sm-5"> <img src="<?php echo $event_image;?>" alt=" " class="img-responsive"  /> </div>
      </div>
    </div>
  </div>
</div>
		<div class="pb"></div>
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
