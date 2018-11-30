<script src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
<script>
	$(document).ready(function(){
		
		$('#msg_pdf').hide();		$('#ticket_msg').hide();
		if($("#pdf_attach").is(':checked')){
			$('#ticket_msg').removeAttr('disabled');
			$('#ticket_msg').show();
			
			$('#texteditors').hide();
			$('#msg_pdf').show();
			$('#msg_email').hide();
					
		}
		
		$('#pdf_attach').change(function(){
			if($("#pdf_attach").is(':checked')){
				$('#ticket_msg').removeAttr('disabled');
				$('#ticket_msg').show();
				
				$('#texteditors').hide();
				$('#msg_pdf').show();
				$('#msg_email').hide();
			}else{
				$('#ticket_msg').attr('disabled','disabled');
				$('#ticket_msg').hide();
				
				$('#texteditors').show();
				$('#msg_pdf').hide();
				$('#msg_email').show();
				
			}
		});
	});
</script>
<?php
$data1['events_id'] = $id;
?>
<?php $this->load->view('default/common/dashboard-header')?>
<?php if($error){?>
   <div class="alert alert-danger message"><?php echo $error; ?></div>
<?php } ?>

<?php if($success){?>
   <div class="alert alert-success message"><?php echo $success; ?></div>
<?php } ?>
<section>  
            <div class="container marTB50">
            	<div class="row">                
                <div class="col-md-8 col-sm-12">
                                
                 <div class="row">    
                            
                <div class="event-webpage col-sm-12">
                	<div class="red-event width100 "><h4><?php echo EDIT_ORDER_CONFIRMATIONS; ?></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                <div class="col-sm-12">
                	
                <form class="event-title" name="edit_email" id="edit_email" method="post" action="<?php echo site_url('event/email_confirmation/'.$id);?>">
                <div class="event-detail clearfix">
                
               
                
				<div class="form-group pt clearfix">
                 <div class="col-sm-4 col-xs-4 width-xs lable-rite">
                   <label><?php echo CUSTOMIZE_EMAIL; ?></label>
                 </div>
                 <div class="col-sm-7 col-xs-8 width-xs">
                   <p class="mt1"><?php echo YOUR_ATTENDEES_WILL_RECEIVE_AN_EMAIL_AFTER_REGISTRATION_CONFIRMING_THEIR_ORDER;?></p>
                 </div>
                 </div>
                 
                 <div class="form-group clearfix">
                 <div class="col-sm-4 col-xs-4 width-xs lable-rite">
                   <label><?php echo DEFAULT_REPLY_TO_EMAIL_ADDRESS; ?></label>
                 </div>
                 <div class="col-sm-7 col-xs-8 width-xs">
                   <input type="text" placeholder="" value="<?php echo $reply_email;?>" name="reply_email" id="reply_email">
                 </div>
                 </div>
                 
                 <div class="form-group clearfix">
                 <div class="col-sm-4 col-xs-4 width-xs lable-rite">
                   <label><?php echo ATTACHMENTS; ?></label>
                 </div>
                 <div class="col-sm-7 col-xs-8 width-xs clearfix">
                     <div class="checkbox">
                     <label>
                     	<?php if($pdf_attach){ ?>
                      <input type="checkbox" value="1" name="pdf_attach" id="pdf_attach" checked><?php echo ATTACH_PDF_TICKETS_IN_CONFIRMATION_EMAIL;
                      }else{ ?>
                        <input type="checkbox" value="1" name="pdf_attach" id="pdf_attach"><?php echo ATTACH_PDF_TICKETS_IN_CONFIRMATION_EMAIL;
                        } ?>
                     </label>
                     </div>
                 </div>
                
                 </div>
                 <div class="form-group clearfix">
                 <div class="col-sm-4 col-xs-4 width-xs lable-rite" id="msg_pdf">
                   <label><?php echo MESSAGE_TO_BE_DISPLAYED_ON_PDF_TICKET;?></label>
                 </div>
                 <div class="col-sm-7 col-xs-8 width-xs clearfix">
                 	<textarea name="ticket_msg" id="ticket_msg"><?php echo SecureShowData($ticket_msg);?></textarea>
                 </div>
                
                 </div>
                 
                 <div class="form-group clearfix ">
                   <div class="col-sm-4 col-xs-4 width-xs lable-rite" id="msg_email" >
                   	<label><?php echo MESSAGE_TO_BE_DISPLAYED_ON_CONFIRMATION_EMAIL;?></label>
                   </div>
                   <div class="col-sm-7 col-xs-8 width-xs text-editor" id="texteditors">
                   	<textarea name="ticket_content" id="ticket_content"><?php echo $ticket_content;?></textarea>
                   
                   	<script type="text/javascript">
            				 CKEDITOR.replace('ticket_content',

                          {

                                                   filebrowserBrowseUrl :'<?php
                               echo base_url();
                               ?>ckeditor/filemanager/browser/default/browser.html?Connector=<?php
                               echo base_url();
                               ?>ckeditor/filemanager/connectors/php/connector.php',



                                                   filebrowserImageBrowseUrl : '<?php
                               echo base_url();
                               ?>ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=<?php
                               echo base_url();
                               ?>ckeditor/filemanager/connectors/php/connector.php',



                                                   filebrowserFlashBrowseUrl :'<?php
                               echo base_url();
                               ?>ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=<?php
                               echo base_url();
                               ?>ckeditor/filemanager/connectors/php/connector.php',

                                                   filebrowserUploadUrl  :'<?php
                               echo base_url();
                               ?>ckeditor/filemanager/connectors/php/upload.php?Type=File',



                                                   filebrowserImageUploadUrl : '<?php
                               echo base_url();
                               ?>ckeditor/filemanager/connectors/php/upload.php?Type=Image',



                                                   filebrowserFlashUploadUrl : '<?php
                               echo base_url();
                               ?>ckeditor/filemanager/connectors/php/upload.php?Type=Flash'

                   });
                    
        			</script>
                   	
                   </div>
                 </div>
                 
                 <div class="form-group clearfix">
                 <div class="col-sm-4 col-xs-4 width-xs lable-rite">
                   <label><?php echo CUSTOMIZE_ORDER_CONFIRMATION_WEBPAGE; ?></label>
                 </div>
                 <div class="col-sm-7 col-xs-8 width-xs">
                   <p class="mt1"><?php echo YOUR_ATTENDEES_WILL_ALSO_BE_TAKEN_TO_A_CONFIRMATION_PAGE_WITHIN_THEIR_BROWSER_WHEN_THEIR_ORDER_IS_COMPLETED_REDIRECT_USERS_TO_YOUR_OWN_WEBPAGE_ONCE_THE_ORDER_IS_PROCESSED_CLEAR_ALL_OF_THE_TEXT_BELOW_AND_ENTER_YOUR_WEBSITE_URL_INCLUDING_THE_HTTP;?></p>
                 </div>
                 </div>
                                  
                 <div class="form-group clearfix">
                 <div class="col-sm-4 col-xs-4 width-xs lable-rite">
                   <label><?php echo MESSAGE_TO_BE_DISPLAYED_ON_CONFIRMATION_WEBPAGE; ?></label>
                 </div>
                 <div class="col-sm-7 col-xs-8 width-xs">
                   <textarea name="confirm_message" id="confirm_message"><?php echo SecureShowData($confirm_msg);?></textarea>
                   <div class="col-sm-6 col-xs-6 p0">                   
                 </div>
                 </div>
                 </div>

                </div> <!-- event detail closes -->
                
                <div class="text-right">
                    <input type="submit" value="<?php echo SAVE;?>" class="btn-event2">
                </div>
                </form>
                </div>
                    
                 </div>
             </div>
                
                <!-- RIGHT CONTENT -->
               <?php $this->load->view('default/common/event_dashboard_sidebar',$data1);?>
             </div>
                
            </div><!-- End container -->
    </section>