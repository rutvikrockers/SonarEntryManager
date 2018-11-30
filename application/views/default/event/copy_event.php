<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script>
$(document).ready(function(){
  $('#save_btn').click(function(){
    if($('#first_name').val().trim()!=''){
      $('#copy_form').submit();
    }else{
      $('.error1').css('display','block');
      return false;
    }
  }); 
});
</script>

    
</head>

<body>
<div class="white-popup-block popup-container">
                 <div class="popupHead">
     <h1><?php echo COPY_EVENT; ?></h1>
</div>
 <p><?php echo MAY_COPY_THIS_EVENT_TO_QUICKLY_CREATE_A_NEW_EVENT_WITH_THE_SAME_DESCRIPTION_TICKET_TYPES_SURVEY_AND_DATES_YOU_MAY_ALSO_MAKE_WHATEVER_CHANGES_ARE_NECESSARY_TO_THE_NEW_EVENT_BOTH_BEFORE_AND_AFTER_PUBLISHING_YOU_MUST_PRESS_THE_PUBLISH_EVENT_BUTTON_ON_THE_NEXT_PAGE_BEFORE_THE_NEW_EVENT_WILL_BE_AVAILABLE_FOR_ATTENDEE_REGISTRATIONS;?>
</p>

 <?php 
  if($success){
  ?>  
    <div class="alert alert-success mar10"><?php echo $success; ?></div>
   <?php }?>
  
  <?php if($error){
  ?>  
    <div class="alert alert-error mar10"><?php echo $error; ?></div>
   <?php }?>
              
  <form method="post" action="<?php echo site_url('event/copy_event/'.$id);?>" name="copy_form" id="copy_form">
    
        <div class="event-title event-detail2 pb">
                  
                        
        <div class="form-group clearfix">
                    <div class="col-sm-3 col-xs-12 lable-rite">
                        <label><?php echo NEW_EVENT_NAME; ?></label><span>*</span>
                    </div>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" name="event_name" id="first_name" value="" class="valid" maxlength="75">
                        <div class=" error1"  style="display:none;"><?php echo EVENT_NAME_IS_REQUIRED; ?></div>
                    </div>
            </div>
              
      <div class="col-sm-8 col-sm-offset-3 col-xs-12">                  
          <input type="button" value="<?php echo SAVE;?>" id="save_btn" class="btn-event2">                                                
          <input type="button" value="<?php echo CANCEL;?>" class="btn-eventgrey btn-closeP marL10" id="cancel-btn">                                                
       </div> 
       </div>             
   </form>
   </div>
</body>
</html>
