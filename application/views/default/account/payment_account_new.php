<script src="<?php echo base_url()?>js/jquery.form.js"></script>
<script>
$(document).ready(function(){
  $('#event_pay').click(function(){ 
    if($('#first_name').val()=="" && $('#Last_name').val()=="" && $('#event_pay_account').val()==""){
      alert('Please enter full Paypal Account Information');
      return false;
    }else if($('#first_name').val()==""){      
      alert('Please enter First Name');
      return false;      
    }else if($('#Last_name').val()==""){      
      alert('Please enter Last Name');
      return false;
    }else if($('#event_pay_account').val()==""){      
      alert('Please enter Paypal Email address');
      return false;
    }else{
      $('#first_form').submit();  
    }
  });
  
  if ((pic = jQuery('#first_form')).length )
  pic.ajaxForm({
      dataType: 'json',
      beforeSend:function (){
        $('#event_pay').val('Loading...');
      },
      success: function(data){
      
        if(data.success){
          $('#json_error').hide();
          $('#json_success').show();
          $('#json_success').html(data.success);
        }
        if(data.error){
          $('#json_error').show();
          $('#json_success').hide();
          $('#json_error').html(data.error);
        }
      
      },
      error: onError,
      complete: function(){
      $('#event_pay').val('Save');  
      },
    });
    
  $('#referral_pay').click(function(){ 
    if($('#pa_first_name').val()=="" && $('#pa_Last_name').val()=="" && $('#ref_pay_account').val()==""){
      alert('Please enter full Paypal Account Information');
      return false;
    }else if($('#pa_first_name').val()==""){      
      alert('Please enter First Name');
      return false;      
    }else if($('#pa_Last_name').val()==""){      
      alert('Please enter Last Name');
      return false;
    }else if($('#ref_pay_account').val()==""){      
      alert('Please enter Paypal Email address');
      return false;
    }else{
      $('#second_form').submit(); 
    }    
  });
  
  if ((pic = jQuery('#second_form')).length )
  pic.ajaxForm({
      dataType: 'json',
      beforeSend:function (){
        $('#referral_pay').val('Loading...'); 
      },
      success: function(data){
      
        if(data.success){
          $('#json_error').hide();
          $('#json_success').show();
          $('#json_success').html(data.success);
        }
        if(data.error){
          $('#json_error').show();
          $('#json_success').hide();
          $('#json_error').html(data.error);
        }
      },
      error: onError,
      complete: function(){
      $('#referral_pay').val('Save'); 
        
      },
    }); 
});

</script>
<script type="text/javascript">
  
  
function valid_iban()
   {

      
      if($('#bank_account_number').val()!=$('#re_bank_account_number').val())
      {
        alert('IBAN/Account Number not matched');
        // $('#re_bank_account_number').addclass('form-control');
        // $('#re_bank_account_number').parent().addclass('has-error');
        
        return false;
      }
   

  }

</script>
<div id="json_error" class="alert alert-danger message" style="display: none;"></div>
<div id="json_success"  class="alert alert-success message" style="display: none;"></div>
<?php  if($error != '') { ?>  
    <div id="json_error" class="alert alert-danger message"><?php echo $error;?></div>
    <?php } elseif($msg=='verify') {?>
    <div id="json_success"  class="alert alert-success message"><?php echo $msg;?></div>
    
    <?php }elseif($msg == 'fail') {  ?>
    <div id="json_error" class="alert alert-danger"><?php echo $msg;?></div>
<?php }?>
 <?php if($success_msg){
        ?>
        <div class="alert alert-success message"><?php echo $success_msg; ?></div>
      <?php }?>
      <?php if($error_msg){
        ?>
        <div class="alert alert-danger message"><?php echo $error_msg; ?></div>
      <?php }?>
<section class="eventDash-head">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 test-contct test-cntr">
        <h1><?php echo MY_ACCOUNT; ?></h1>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right pt mt10 con-cntr">
        <div class="halfacc">
          <p><?php echo SecureShowData($site_setting['site_name']); ?> <?php echo ACCOUNT_SINCE; ?> <span><?php echo datetimeformat($user_info['created_at']);?> <?php echo timeFormat($user_info['created_at']); ?></span></p>
        <?php 
            if($user_info['ref_id']){
              $admin=getRecordById('users','id',$user_info['ref_id']);

              ?><p><?php echo THE_MAIN_ACCOUNT_HOLDER_IS;?> <span><?php echo SecureShowData($admin['email']);?></span></p>
            <?php } ?>
            </div>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="container marTB50">
    
        
    <div class="row">
      <div class=" col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="row">
          <div class="event-webpage col-xs-12 col-sm-12">
            <div class="red-event width100 ">
              <h4><?php echo PAYPAL_EMAIL_ADDRESS_USED_FOR_YOUR_EVENTS; ?></h4>
            </div>
            <div class="clear"></div>
          </div>
          <!-- End event-webpage -->
          
          <div class="col-sm-12 clearfix mb">
            <div class="event-detail event-detail2 buyer">
              <form class="event-title pt" method="post" action="<?php echo site_url('account/paypal_email');?>" name="first_form" id="first_form">
                <div class="form-group clearfix">
                <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo FIRST_NAME; ?></label>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                <input type="text" value="<?php echo SecureShowData($withdrow_transaction_detail['paypal_first_name']); ?>" name="first_name"id="first_name" >
                              </div>
                              <div style="margin-left:27%" >
                                <label><i><?php echo VERIFICATION_PURPOUSE; ?></i></label>
                              </div>
                        </div>
                        
                          <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo LAST_NAME; ?></label>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                <input type="text" value="<?php echo SecureShowData($withdrow_transaction_detail['paypal_last_name']); ?>" name="last_name" id="Last_name" >
                              </div>
                              <div style="margin-left:27%" >
                                <label><i><?php echo VERIFICATION_PURPOUSE; ?></i></label>
                              </div>
                        </div>
                        
                 <div class="form-group clearfix">
                 <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo EMAIL; ?></label>
                              </div>
                 
                  <div class="col-sm-8 col-xs-12">
                    <input type="text"  name="event_pay_account" id="event_pay_account" value="<?php echo SecureShowData($withdrow_transaction_detail['paypal_email']); ?>"/>
                  </div>
                 
                </div>
               
                <div class="form-group clearfix">
                  
                  <div class="col-sm-3 col-xs-12 comonback brm20 tr8">
                    <input type="button" value="<?php echo SAVE; ?>" class="btn-event" id="event_pay">
                  </div>
                </div>
                <div class="form-group clearfix">
                	<div class="col-lg-12">
                		<div id="adiv" style="display:none">
                          <ul class="show-hide list-unstyled">
                            <?php if($event_title){foreach($event_title as $row) { ?>
                            <li><i class="glyphicon glyphicon-chevron-right"></i> <a href="<?php echo site_url('event/view/'.$row['event_url_link'])?>"><?php echo SecureShowData($row['event_title']);?></a></li>
                            <?php }
                            } ?>
                          </ul>
                        </div>
                	</div>
                </div>
              </form>
            </div>
            <!-- end event-detail --> 
          </div>
        </div>
        <!-- End Row-->

        <!-- Stripe start -->
   <div class="row">
          <div class="event-webpage col-xs-12 col-sm-12">
            <div class="red-event width100 ">
              <h4><?php echo BANK_ACCOUNT_USED_FOR; ?> </h4>
            </div>
            <div class="clear"></div>
          </div>
        


        
          <div class="col-sm-12 clearfix mb ">
            <div class="event-detail event-detail2 pt">
              <form class="event-title" method="post" action="<?php echo site_url('account/bank_details_save');?>" name="bank" onsubmit='return valid_iban()' >
                  <h4 class="pl15"><?php echo SETTLEMENT_BANK; ?>:</h4>
                      <hr>
                  <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo AC_HOLDER; ?></label>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                <input type="text" value="<?php echo SecureShowData($withdrow_transaction_detail['bank_account_holder_name']);?>" name="bank_account_holder_name" id="bank_account_holder_name" >
                              </div>
                        </div>
                    <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo IBAN_NUMBER; ?></label>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                <input type="text" value="<?php echo SecureShowData($withdrow_transaction_detail['bank_account_number']);?>" name="bank_account_number" id="bank_account_number" >
                              </div>
                    </div>
                     <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo RE_IBAN_NUMBER; ?></label>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                <input type="text" value="" name="re_bank_account_number" id="re_bank_account_number" >
                              </div>
                    </div>
                     <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo ROUTING_NUMBER; ?></label>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                <input type="text" value="<?php echo SecureShowData($withdrow_transaction_detail['routing_number']);?>" name="routing_number" id="routing_number" >
                              </div>
                    </div>
                    <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo BANK_NAME; ?></label>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                <input type="text" value="<?php echo SecureShowData($withdrow_transaction_detail['bank_name']);?>" name="bank_name" id="bank_name" >
                              </div>
                    </div>
                    <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo BANK_ADDRESS; ?></label>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                <input type="text" value="<?php echo SecureShowData($withdrow_transaction_detail['bank_address']);?>" name="bank_address" id="bank_address" >
                              </div>
                    </div>
                    <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo BANK_CITY; ?></label>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                <input type="text" value="<?php echo SecureShowData($withdrow_transaction_detail['bank_city']);?>" name="bank_city" id="bank_city" >
                              </div>
                    </div>
                    <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo BANK_STATE; ?></label>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                <input type="text" value="<?php echo SecureShowData($withdrow_transaction_detail['bank_state']);?>" name="bank_state" id="bank_state" >
                              </div>
                    </div>
                     <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo BANK_COUNTRY; ?></label>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                <input type="text" value="<?php echo SecureShowData($withdrow_transaction_detail['bank_country']);?>" name="bank_country" id="bank_country" >
                              </div>
                    </div>
                       <h4 class="pl15"><?php echo  RECEIVING_CUSTOMER; ?>:</h4>
                       <hr/>

                          <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo CUSTOMER_ADDRESS; ?></label>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                <input type="text" value="<?php echo SecureShowData($withdrow_transaction_detail['bank_settlement_address']);?>" name="bank_settlement_address" id="bank_settlement_address" >
                              </div>
                            </div>
                           <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo City; ?></label>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                <input type="text" value="<?php echo SecureShowData($withdrow_transaction_detail['bank_settlement_city']);?>" name="bank_settlement_city" id="bank_settlement_city" >
                              </div>
                             </div>
                           <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo Province; ?></label>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                <input type="text" value="<?php echo SecureShowData($withdrow_transaction_detail['bank_settlement_province']);?>" name="bank_settlement_province" id="bank_settlement_province" >
                              </div>
                              </div>
                            <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo Country; ?></label>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                <input type="text" value="<?php echo SecureShowData($withdrow_transaction_detail['bank_settlement_country']);?>" name="bank_settlement_country" id="bank_settlement_country" >
                              </div>
                            </div>
                          <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo Zip_Code; ?></label>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                <input type="text" value="<?php echo SecureShowData($withdrow_transaction_detail['bank_settlement_bankcode']);?>" name="bank_settlement_bankcode" id="bank_settlement_bankcode" >
                              </div>
                              </div>
                  <div class="form-group clearfix">
                            <div class="col-sm-3 col-xs-12 comonback brm20 tr8">
                    <input type="submit" value="<?php echo SAVE; ?>" class="btn-event" >
                  </div>
                        </div>
                
                 
              </form>
            </div>
            <!-- end event-detail --> 
          </div>
     </div> 

     <!-- Stripe end -->     
   <div class="row">
          <div class="event-webpage col-xs-12 col-sm-12">
            <div class="red-event width100 ">
              <h4><?php echo CHEQUE_DETAIL; ?></h4>
            </div>
            <div class="clear"></div>
          </div>
          <!-- End event-webpage -->
          
          <div class="col-sm-12 clearfix mb ">
            <div class="event-detail event-detail2 pt">
              <form class="event-title" method="post" action="<?php echo site_url('account/check_detail_save');?>" name="cheque_detail" id="cheque_detail">
                <h4 class="pl15"><?php echo CHEQUE_WILL_BE_ACCOUNTING; ?>:</h4>
                       <hr/>
                <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo NAME_ON_CHEQUE; ?></label>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                <input type="text" value="<?php echo SecureShowData($withdrow_transaction_detail['cheque_name']);?>" name="cheque_name"id="cheque_name" >
                              </div>
                        </div>
                         <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo BRANCH; ?></label>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                <input type="text" value="<?php echo SecureShowData($withdrow_transaction_detail['cheque_branch']);?>" name="cheque_branch"id="cheque_branch" >
                              </div>
                        </div>
               <h4 class="pl15"><?php echo POSTAL_ADDRESS; ?>:</h4>
                       <hr/>         
                        <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo Address; ?></label>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                <input type="text" value="<?php echo SecureShowData($withdrow_transaction_detail['org_address']);?>" name="org_address"id="org_address" >
                              </div>
                        </div>
                         <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo City; ?></label>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                <input type="text" value="<?php echo SecureShowData($withdrow_transaction_detail['org_city']);?>" name="org_city"id="org_city" >
                              </div>
                        </div>
                         <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo State; ?></label>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                <input type="text" value="<?php echo SecureShowData($withdrow_transaction_detail['org_state']);?>" name="org_state"id="org_state" >
                              </div>
                        </div>
                         <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo Country; ?></label>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                <input type="text" value="<?php echo SecureShowData($withdrow_transaction_detail['org_country']);?>" name="org_country"id="org_country" >
                              </div>
                        </div>
                         <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo Zip_Code; ?></label>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                <input type="text" value="<?php echo SecureShowData($withdrow_transaction_detail['org_zipcode']);?>" name="org_zipcode"id="org_zipcode" >
                              </div>
                        </div>
                        
                      
                 
                <div class="form-group clearfix">
                            <div class="col-sm-3 col-xs-12 comonback brm20 tr8">
                    <input type="submit" value="<?php echo SAVE; ?>" class="btn-event" id="referral_pay">
                  </div>
                        </div>
                
                 
              </form>
            </div>
            <!-- end event-detail --> 
          </div>
     </div> 
      </div>
      <!-- End col-sm-8 --> 
      
      <!-- RIGHT CONTENT --> 
      <?php echo $this->load->view('default/common/account_sidebar');?> </div>
  </div>
  <!-- End container --> 
</section>
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
<script type="text/javascript">
    function hideshow(which){
    if (!document.getElementById)
    return
    if (which.style.display=="block")
    which.style.display="none"
    else
    which.style.display="block"
    }
  </script>
</body></html>