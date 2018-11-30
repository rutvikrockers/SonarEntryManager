<!-- End of Darshan Code -->
<?php
   $vanue_name = $event_venue['name'];
  
  
  if($event_detail['event_logo'] && file_exists('upload/event/thumb/'.$event_detail['event_logo'])){
    $event_image = base_url().'upload/event/thumb/'.$event_detail['event_logo'];
  }else{
    $event_image = base_url().'upload/event/thumb/no_img.jpeg';
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
    var LetNumSpaceSpec=/^[0-9a-z A-Z_-]+.+$/;
    var ifsc_reg_exp = /[A-Z|a-z]{4}[0]\d{6}$/; // 4 letters + 0 + 6 numbers
    var ac_number_reg_exp=/^[0-9]+$/;
    
    var filter = email_reg_exp;
    var filter1 = name_reg_exp; 
    var filter2 = LetNumSpaceSpec;
    var filter3 = ifsc_reg_exp;
    var filter4 = name_reg_exp;
    var filter5 = ac_number_reg_exp;

    var first_name = $("#first_name").val();
    var email = $("#email").val();
    var message = $("#message").val();
    
    var first_name_err = $('#first_name_err');
    var email_err = $('#email_err');
    var message_err = $('#message_err');
    

    if(filter4.test(first_name) && filter.test(email) && message)
    {
      return true;
    }
    else if (!filter4.test(first_name)){
    
      first_name_err.text('<?php echo ENTER_NAME;?>');
      first_name_err.removeClass("success");
      first_name_err.addClass("error1");
      return false ;
    }
    else if (!filter.test(email)){
      email_err.text('<?php echo ENTER_VALID_EMAIL;?>');
      email_err.removeClass("success");
      email_err.addClass("error1");
      return false ;
    }
    else if (!message){
      message_err.text("<?php echo PLEASE_ENTER_MESSAGE;?>");
      message_err.removeClass("success");
      message_err.addClass("error1");
      return false ;
    }

    // For Paypal and Referrer email
    if (document.getElementById('paypal').checked) {
    
    var paypal_name = $("#gateway_name").val();
    var paypal_account = $('#gateway_account').val();
    $('#err_gateway_name').text('');
    $('#err_gateway_account').text('');
    
    
    if(paypal_name==""){
      $('#err_gateway_name').text('<?php echo ENTER_NAME;?>');
      return false ;     
    }
    
    if(paypal_account==""){
    
      
      $('#err_gateway_account').text('<?php echo ENTER_CORRECT_PAYPAL_EMAIL;?>');
      return false ;
     
    }else if (!filter.test(paypal_account)){
      $('#err_gateway_account').text('<?php echo ENTER_VALID_EMAIL;?>');
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
                
        achodererr.text('Type a valid A/C Holder Name  please');
        achodererr.removeClass("success");
        achodererr.addClass("error1");
        return false;
    }
    else if(!filter5.test(ac_number)) {
                
        acnumbererr.text('Type a valid A/C Number  please');
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
    else if(!filter5.test(customer_code)) {
                
        customer_code_err.text('Type a valid Custome Code please');
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
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 test-contct">
        <h1><?php echo CANCEL_ORDER_FORM; ?></h1>
      </div>
    </div>
  </div>
</section>
<section>
<div class="container marTB50">
<div class="col-md-8 col-md-offset-2 event-webpage">
  <div class="red-event">
    <h4>Request Refund </h4>
  </div>
  <div class="event-detail pd15">
    <div class="clearfix dashHeader">
      <div class="row">
        <div class="col-sm-7 mb">
          <form id="cancelorderForm" name="cancelorderForm" method="post" action="<?php echo site_url("ticket/cancel_confirm/".$p_id); ?>" accept-charset="UTF-8" class="event-title">
            <div class="form-group clearfix">
                <div id="paypal_info" class="form marT10">
                  <div class="shadow mt20">
                   
                    <label><?php echo YOUR_NAME; ?> <span class="red">*</span></label>
                    <input type="text" value="<?php echo SecureShowData($full_name); ?>" name="first_name" id="first_name" class="textbox" >
                    <div id="first_name_err" class="marL30p_r error1"></div>

                    <label><?php echo EMAIL_ADDRESS; ?> <span class="red">*</span></label>
                    <input type="text" name="email" id="email" class="textbox" value="<?php echo SecureShowData($email); ?>">
                    <div id="email_err" class="marL30p_r error1"></div>

                    <label><?php echo CANCEL_REASON; ?> <span class="red">*</span></label>
                    <textarea id="message" name="message" ></textarea>
                    <div id="message_err" class="marL30p_r error1"></div>
                  </div>
                </div>

            </div>
            <input type="hidden" name="id" id="id" value="<?php echo $purchase_id; ?>" />
            <input type="hidden" name="qtys" id="tic_qty" value="<?php echo $ticket_qty; ?>"/>
            <input type="hidden" name="user_type" id="user_type" value="<?php echo SecureShowData($_GET['user_type']); ?>" />
            <input type="hidden" name="withdraw_amt" id="withdraw_amt" value="<?php echo $ticket_amount; ?>">
            <div class="form-group clearfix">
              <input type="submit" style="margin-right: 0px;" onclick="return validateData();" class="btn-event fr marT10" value="Send Message" id="submit" name="submit">
            </div>
          </form>
        </div>
        
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
