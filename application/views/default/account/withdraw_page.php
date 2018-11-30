<?php 

$referral_setting = referral_setting();
$minimum_withdraw_amnt=$referral_setting['withdrawl_minimum_amount'];
$u_id = check_user_authentication(true);

?>
<?php $p_get1 = getreferral_data_status_byuser($u_id);?>
<link href="<?php echo base_url();?>css/popup.css" rel="stylesheet" />

<script>
  function valdiation()
  {
    var val=document.getElementById('invitation_id').value;

    var arr=Array();
  
    <?php 
   foreach($p_get1 as $vall)
   {
      $amnt=$vall['shares'];
      if($amnt>=$minimum_withdraw_amnt)
      { ?>
        arr['<?php echo $vall['currency_symbol'].$vall['shares']?>']='<?php echo $vall['currency_code'];?>';
<?php }
    }?>

  if(val=='')
  {
    alert("Please Select <?php echo WITHDRAW_AMOUNT?>");
    return false;
  }

document.getElementById('currency_code').value=arr[val];
return true;
}
  </script>
 <?php echo form_open('account/mywithdraw_value') ;?>
<div class="white-popup-block popup-container">
<div class="popupHead">
  <h1><?php echo WITHDRAW_AMOUNT; ?>(<?php echo MINIMUM_WITHDRAW_AMOUNT.":".$minimum_withdraw_amnt; ?>)</h1>
</div>
<div id="add_new" class="popup_Content">            
     <div id="namerr1" class="error1">  </div>     
            <div class="form-group event-title clearfix">
              <div class="col-sm-3 col-xs-12 lable-rite">
                    <label><?php echo WITHDRAW_AMOUNT; ?>:</label>
                </div>
                 <div class="col-sm-8 col-xs-12">
                     <select name="withdraw_id" id="invitation_id" class="selectbox">
                         <option value=""><?php echo SELECT_AMOUNT;?></option>
                          <?php 
                             foreach($p_get1 as $vall)
                             {
                              $amnt=$vall['shares'];
                              if($amnt>$minimum_withdraw_amnt)
                              {
                              ?>
                                <option value="<?php echo $vall['currency_symbol'].$vall['shares']?>"><?php echo  $vall['currency_symbol'].$vall['shares'] ?></option>
                            <?php } 
                            }
                             ?>                            
                    </select>                
                </div>
          </div>              
          
          <div class="form-group event-title clearfix">
              <input type="hidden" name="list_id" id="list_id" value=""/>
              <input type="hidden" name="currency_code" id="currency_code" value=""/>
      
              <div class="col-sm-8 col-sm-offset-3 col-xs-12">
                    
                <input type="submit" onclick="return valdiation();" value="<?php echo WITHDRAW_BUTTON;?>" class="btn-event2">
                <a class="btn-eventgrey btn-closeP marL10" href="javascript:"><?php  echo CANCEL; ?></a>
                                                    
              </div>
              
        </div>  
        <div class="clear"></div>
   </div>
   <?php echo form_close();?>