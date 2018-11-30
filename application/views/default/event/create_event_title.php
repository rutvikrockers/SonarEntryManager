<script src='https://www.google.com/recaptcha/api.js'></script>

<div class="container marTB50">
  <?php   if($error!=''){
                        			?>
                        			<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>  <?php echo $error; ?></div>
                        		<?php
                        		}?>
<div class="row"> 
           
           
                <div class="event-webpage col-lg-12">
                    <div class="red-event clearfix">
                    	<h4 class="pull-left"><span class="titleNum">1</span>  <?php echo CREATE_YOUR_EVENT; ?> </h4>  
                    
                     </div>
                   
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
           <form class="event-title" name="attendee_search" method="post" action="">
                <div class="col-lg-12 clearfix mb">
            
                	<div class="event-detail pt">
                            <div class="form-group clearfix">
                            	<div class="col-sm-3 col-xs-12 lable-rite">
                            		<label><?php echo Event_Title; ?><span>*</span></label>
                            	</div>
                            	<div class="col-sm-8 col-xs-12">
                            	  <input type="text" autocomplete="off" value="<?php echo SecureShowData($event_title);?>" name="event_title" id="event_title" placeholder="<?php echo Event_Title;?>" onkeyup="limitText(this.form.event_title,this.form.countdown,75);" onkeydown="limitText(this.form.event_title,this.form.countdown,75);">
                                    <p class="fromText"><?php echo MAXIMUM_75_CHAR;?> : <input type="text" value="75" disabled="disabled" name="countdown" class="countdown"><?php echo CHAR_LEFT;?></p>
                                    <span id="eventtitleInfo"></span>
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
                        	   <?php $result = getRecordById('captcha_settings','id','1');?>
                                  <?php if($result['status'] == 1) { ?>
                                  <?php } else {?>
                                  
                                    <div class="form-group clearfix">
                                    	<div class="col-sm-3 col-xs-12 lable-rite">
	                            		 	<label class="captchabg" for="captcha"><?php echo 'Security Check';?></label>  
	                            		</div>
	                                     <div class="col-sm-8 col-xs-12">
	                                    <div class="pr g-recaptcha" data-sitekey="<?php echo $result['captcha_site_key']; ?>"></div>
	                                    </div>
                                </div>
                                  <?php } ?>
                         
                          
                          <div class="form-group clearfix">
                        <div class="text-center">
                            <input type="submit" value="<?php echo CREATE_YOUR_EVENT;?>" class="btn-event2">
                        </div>
                        </div>
                    </div>
                 
             </div>
             </form>
             </div>
         </div>
<script type="text/javascript">
    function limitText(limitField, limitCount, limitNum) {
        if (limitField.value.length > limitNum) {
            limitField.value = limitField.value.substring(0, limitNum);
        } else {
            limitCount.value = limitNum - limitField.value.length;
        }
        name = limitField.value; 
        name = name.replace(/[^a-zA-Z 0-9-]+/g,'').toLowerCase().replace(/\s/g,'-');
        $('#event_url_link').val(name); 
    }
</script>
