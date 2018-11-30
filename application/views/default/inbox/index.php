
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
              <div class="col-lg-8">          
            <div class="event-webpage">
                <div class="red-event width100 "><h4><?php echo MY_INBOX;?></h4></div>
                <div class="clear"></div>
            </div><!-- End event-webpage -->
            
        
            
                <div class="event-detail event-detail2">

 	<ul class="list-unstyled inbox">	
          <?php 

			if($inbox_messages)

			{

			$is_read=1;	

			foreach($inbox_messages as $inbox_message)

			{	
			
			$msg=getUnreadCountPerMsg($inbox_message['message_id']);
			$unreadMsg=$msg['unread'];
			$unreadMsg_text='('.$unreadMsg.')';
			if($unreadMsg<=0)
			{
				$unreadMsg_text='';
			}

			$receiver_id = $inbox_message['receiver_id'];

			$sender_id = $inbox_message['sender_id'];

			if($receiver_id==$this->session->userdata('user_id'))

			{

			 $user_data=getRecordById('users','id',$sender_id);	

			}

			else

			{

			 $user_data=getRecordById('users','id',$receiver_id);	


			}

			$user_name = $user_data['first_name'];

			$email = $user_data['email'];

			$last_name = $user_data['last_name'];



			$user_image = 'noimage.jpg';



			$tw_id = $user_data['tw_id'];



			$fb_uid = $user_data['fb_id'];



			$tw_screen_name = $user_data['tw_screen_name'];



			$message_subject = $inbox_message['message_subject']; 



			$message_content = $inbox_message['message_content'];



			$message_id = $inbox_message['message_id']; 



			$date_added = $inbox_message['date_added'];



			$reply_message_id = $inbox_message['reply_message_id']; 

			

			$is_read=$inbox_message['is_read'];

			$event_title = $inbox_message['event_title'];

			$orgenizer = $inbox_message['name'];
			

			

		

			

			?>


                  
                    <li class="clearfix">
	                   <a href="<?php echo site_url('inbox/message_conversation/'.$message_id);?>">

	                   <div class="inbox-img">
                         
                           <?php



							if($user_data['image']!='') {

					

							if(file_exists(base_path().'upload/profile/small/'.$user_data['image'])){

					

							?>

					

								<img src="<?php echo base_url();?>upload/profile/small/<?php echo $user_data['image'];?>" alt="noimage" class="img-circle"  />

					

								<?php } else { ?>

					

								<img src="<?php echo base_url();?>images/no_img.jpg" class="img-circle" alt='noimage' />

					

								

					

						<?php } 
                        } else { ?>

					

								<img src="<?php echo base_url();?>images/no_img.jpg" alt="noimage" class="img-circle" />

					

						<?php }?>
	                   </div>
	                   <div class="indox-content <?php if($unreadMsg_text!='') { echo 'in-active'; } ?>">
	                    <?php 
	                    	$username = $email; 

	                    	if($user_name!='' || $last_name!=''){
	                    		$username = $user_name.' '.$last_name;
	                    	}	
	                    ?>
	                          <h3><?php echo SecureShowData($username); ?> <?php echo SecureShowData($unreadMsg_text); ?> <em> at <?php echo date($site_setting['date_format'],strtotime($date_added));?> </em></h3>
	                          <p><?php echo '<b>'.SUBJECT.' :</b>'.SecureShowData($message_subject).'<br/><b>'.EVENT_NAME.': </b> '.SecureShowData($event_title).'<br/><b> '.Organizer.':</b>'.SecureShowData($orgenizer) ?></p>
                          
	                   </div>	
	                  </a>
                    </li>

        



			<?php }

			

			}
			else{

			 ?>	

             <div class="brdr1 no_record_find">
				<p class="no_records">
					<?php echo THERE_ARE_NO_MESSAGE_IN_INBOX;?>
				</p>
			 </div>		

			<?php 

			}

			?>
		</ul>
                
              </div>


            </div>



  <?php echo $this->load->view('default/common/account_sidebar');?>

            </div>

		</div>

       

</section>







