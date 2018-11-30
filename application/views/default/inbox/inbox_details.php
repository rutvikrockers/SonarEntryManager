

<style type="text/css">

.limite
{
    max-height: 400px;
    overflow-y:  scroll;;
}    

</style>
<script src="<?php echo base_url();?>js/showHide.js" type="text/javascript"></script>
<script type="text/javascript">

$(document).ready(function(){
  var height=$('.inbox').height();
  
	$('.limite').animate({scrollTop : height},0);
	if($('#session_id').val()!= $('#sender_id').val() )
	{
		var newtest = 'Reply';
	}
	else
	{
		var newtest = 'Send New Message';
	}
   $('.show_hide').showHide({			 
		speed: 1000,  // speed you want the toggle to happen	
		easing: '',  // the animation effect you want. Remove this line if you dont want an effect and if you haven't included jQuery UI
		changeText: 1, // if you dont want the button text to change, set this to 0
		showText: newtest,// the button text to show when a div is closed
		hideText: 'Close' // the button text to show when a div is open
					 
	}); 

});

function check_comment_len(){
	var comment = document.getElementById('conversation').value;
	var len = comment.length;
	if(comment==''){
		document.getElementById('error1').innerHTML='<?php echo PLEASE_ENTER_TEXT; ?>';
		document.getElementById('error1').style.display='Block';
		return false;
	}
	return true;
	
}

</script>
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
           <?php
                if($msg=='error'){ ?>
                    <div class="alert alert-danger message"><?php echo PLEASE_ADD_CONVERSATION_TEXT; ?></div>
                     <?php
                }
       ?> 
        <?php
                if($msg=='send_success'){ ?>
                    <div class="alert alert-success message"><?php echo MESSAGE_SEND; ?></div>
                     <?php
                }
       ?>      
                
     <div class="row">    
        <div class="col-lg-8">  
            <div class="dash_whitebg clearfix">
       
           
      
                        
          <?php $conversavtion_data_sender =  getRecordById('users','id',$conversation_received_id);
		 	  $conversavtion_data_receiver = getRecordById('users','id',$conversation_sender_id); 
        
			if($conversation_received_id != $this->session->userdata('user_id'))
{

        $with_name_sender = $conversavtion_data_sender['first_name'].' '.$conversavtion_data_sender['last_name'];
       if($with_name_sender=='')
       {
           $with_name_sender = $conversavtion_data_sender['email'];
           
       }

      }
      else
      {
          $with_name_sender = $conversavtion_data_receiver['first_name'].' '.$conversavtion_data_receiver['last_name'];
          
          if($conversavtion_data_receiver['first_name'] !="" && $conversavtion_data_receiver['last_name'] !="")
          {
            $with_name_sender = $conversavtion_data_receiver['first_name'].' '.$conversavtion_data_receiver['last_name'];
          }
          else {
           $with_name_sender = $conversavtion_data_receiver['email']; 
          }
}
		 ?>
              <div class="event-webpage">
                <div class="red-event width100 "><h4><?php echo CONVERSATION_WITH;?>:  <a href="javascript://"><?php echo SecureShowData($with_name_sender); ?></a> <a href="<?php echo site_url('inbox');?>" class="back_inbox" style="float: right;"><?php echo BACK_TO_INBOX; ?></a></h4> </div>
                <div class="clear"></div>
            </div>
                  <?php if($list_messages)
                        {
                        ?>
                         
              <div class="event-detail event-detail2 ">
                 <div class="limite">
                 <ul class="list-unstyled  inbox" >   
                        <?php 
                        foreach($list_messages as $list_message)
                        {	

                        $sender_id = $list_message['sender_id'];
                        $receiver_id = $list_message['receiver_id'];

                        $user_image='no_img.jpg';

                        $message_subject = $list_message['message_subject']; 
                        $message_content = $list_message['message_content'];
                        $message_id = $list_message['message_id']; 
                        $date_added = $list_message['date_added'];
                        $reply_message_id = $list_message['reply_message_id'];
                        
                        
                        $sender_info = $user_data=getRecordById('users','id',$sender_id); 
                        $receiver_info = $user_data=getRecordById('users','id',$receiver_id); 
                        ?>
                        
                         <li class="clearfix">
                       <a href="javascript:void(0);">

                        <?php if($sender_id == $this->session->userdata('user_id')) { ?>
                            <div class="inbox-img-receiver">
                            <?php } else { ?>
                            <div class="inbox-img">
                            <?php } ?>
                           <?php
                                    if($sender_info['image']!='') {
                                    if(file_exists(base_path().'upload/profile/small/'.$sender_info['image'])){
                                ?>
                                        <img src="<?php echo base_url();?>upload/profile/small/<?php echo $sender_info['image'];?>" alt="noimage" class="img-circle"  />
                                        <?php } else { ?>
                                       <img src="<?php echo base_url();?>images/no_img.jpg" class="img-circle" alt="noimage"  />
                                        <?php }
                                        }else { ?>
                                       <img src="<?php echo base_url();?>images/no_img.jpg" alt="noimage" class="img-circle" />
                                <?php }?>
                       </div>
                       <?php if($sender_id == $this->session->userdata('user_id')) { ?>
                            <div class="indox-content-receiver">
                            <?php } else { ?>
                            <div class="indox-content">
                            <?php } ?>
                        
                              <h3>
                              <?php if($sender_info['first_name'] !="" && $sender_info['last_name'] !="") { ?>
                                  <?php echo SecureShowData($sender_info['first_name']).' '.SecureShowData($sender_info['last_name']);?>
                                <?php } else { ?>
                                  <?php echo SecureShowData($sender_info['email']);?>
                                <?php } ?>
                                  <em> at <?php echo date($site_setting['date_format'],strtotime($date_added));?> </em></h3>
                              <p><?php echo SecureShowData($message_content); ?></p>                          
                       </div>   
                      </a>
                    </li>

                         <?php } 
                        ?>
                       </ul>
                                    
                         </div>   
                        <?php
                        $attributes = array('name'=>'sitterconversation','id'=>'sitterconversation' ,'class'=>'event-title');
                        echo form_open('inbox/message_reply',$attributes);
                        ?>
                       <div class="form-group clearfix  inbox">
                  
             <?php     
                if($sender_id!=$this->session->userdata('user_id'))
								{
									$text_change =  'REPLY';									
								}
								else
								{
									$text_change =  'SEND';								
								}
								
								?>                            
                            <textarea class="form-control" id="conversation" name="conversation" row="8" placeholder="Type a message here..."></textarea>
                                
                            <input type="submit" value="<?php echo $text_change;?>" name="submit" class="btn-event2 pull-right mt10" id="submit" onclick="return check_comment_len();"/>                            
                            
                            <input type="hidden" name="sender_id" id="sender_id" value="<?php echo $receiver_info['id'];?>"/>
                            
                           <input type="hidden" name="session_id" id="session_id" value="<?php echo $this->session->userdata('user_id');?>"/>
                             <?php 
                if($receiver_info['id'] != $this->session->userdata('user_id'))
				{ ?>
				
				
				 <input type="hidden" name="receiver_id" id="receiver_id" value="<?php echo $receiver_info['id'];?>"/>
	<?php 		}
				else 
				{ ?>
				 <input type="hidden" name="receiver_id" id="receiver_id" value="<?php echo $sender_info['id'];?>"/>
	<?php			}
               ?> 
                            
                           <?php if($reply_message_id == 0){?>
                 <input type="hidden" name="message_id" id="message_id" value="<?php echo $message_id;?>"/>
                <?php }else
				{?>
                 <input type="hidden" name="message_id" id="message_id" value="<?php echo $reply_message_id;?>"/>
				<?php }?>
                
                            </div>
                        </div>
                        </form>	
              
                        
                       <?php }else{?>  
                         <div class="clear"></div>
                        <div align="center"><?php echo 'THERE_ARE_NO_MESSAGE_IN_INBOX'; ?></div>
                        <div class="clear"></div>
                         <?php }?>
                            </div>
                        </div>

          <?php echo $this->load->view('default/common/account_sidebar');?>

        </div>
	
</section>

