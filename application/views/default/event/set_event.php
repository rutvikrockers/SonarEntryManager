<?php $this->load->view('default/common/dashboard-header')?>
<section> 
	<?php
$data1['events_id'] = $id;
?> 
            <div class="container marTB50">
            	
                <?php 
                if($success){
                ?>
                	<div class="alert alert-success mar10"><?php echo $success; ?></div>
                <?php 
                }
				if($error){
				?>
					<div class="alert alert-danger mar10"><?php echo $error; ?></div>
                <?php 	
				}
                ?>
                <div class="row">
                <div class="col-md-8 col-sm-12">
                                
                 <div class="row">    
                            
                <div class="event-webpage col-sm-12">
                	<div class="red-event width100 "><h4><?php echo SET_EVENT_TYPE_LANGUAGE; ?> <span>(<?php echo ATTENDEES_WILL_SEE_THE_SETTINGS_YOU_SELECT; ?>)</span></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                <div class="col-sm-12">
                	<form class="event-title" name="event_lang" id="event_lang" method="post" action="<?php echo site_url('event/event_language/'.$id);?>">
                <div class="event-detail clearfix">
                
                
                
				<div class="form-group pt clearfix ">
                            	<div class="col-sm-4 col-xs-4 lable-rite width-xs">
                            		<label><?php echo EVENT_TYPE; ?></label>
                            	</div>
                            	<div class="col-sm-8 col-xs-8 width-xs">
                                	<div class="radio">
                                          <label>
                                            <input type="radio" name="event_type" id="optionsRadios1" value="0" <?php if($event['event_type']==0) { echo 'checked'; } ?>>
                                            <?php echo TICKETED_EVENT; ?>
                                          </label>
                                          <p class="p0"><?php echo CHOOSE_THIS_OPTION_IF_YOUR_EVENT_IS_A_TICKETED_EVENT_MUSIC_AND_PERFORMING_ARTS_COMEDY_FESTIVAL_ETC_EXAMPLE_TERMS_BUY_TICKETS_TICKET_INFORMATION_TICKET_TYPE;?></p>
                                        </div>
                                        
                                     <div class="radio pt">
                                          <label>
                                            <input type="radio" name="event_type" id="optionsRadios2" value="1" <?php if($event['event_type']==1) { echo 'checked'; } ?>>
                                            <?php echo REGISTRATION_EVENT; ?>
                                          </label>
                                          <p class="p0"><?php echo CHOOSE_THIS_OPTION_IF_YOUR_EVENT_IS_A_REGISTRATION_EVENT_CONFERENCE_ENDURANCE_EVENT_ETC_EXAMPLE_TERMS_REGISTER_REGISTRATION_INFORMATION_REGISTRATION_TYPE;?></p>
                                    </div>
                               </div>
                          </div>
                 
                 <div class="form-group clearfix">
                 <div class="col-sm-4 col-xs-4 width-xs lable-rite">
                   <label><?php echo DEFAULT_REPLY_TO_EMAIL_ADDRESS; ?></label>
                 </div>
                 <div class="col-sm-8 col-xs-8 width-xs p0">
                 <div class="col-sm-6 col-xs-6 width-xs">
                    <select class="select-pad" name="language" id="language">
                    	<?php
                    	if($language){
                    		foreach ($language as  $lang) {
								$language_name = $lang['language_name'];
								$language_id = $lang['id'];
								$select='';
								if($event['language_id']==$language_id){
									$select = 'selected=selected';
								}
								?>
								<option value="<?php echo $language_id; ?>" <?php echo $select;?> ><?php echo SecureShowData($language_name); ?></option>
								<?php
							}
                    	}
                    	 
                    	 ?>
                    </select>
                 </div>
                 <div class="col-sm-12 col-xs-12">
                   <p class="mt10 p0"><?php echo YOUR_EVENT_WILL_DISPLAY_IN_THE_DATE_TIME_AND_LANGUAGE_FORMAT_OF_YOUR_CHOICE; ?></p>
                 </div>
                 </div>
                 
                 </div>

                </div> <!-- event detail closes -->
                
                <div class="text-right pb">
                    <input type="submit" value="<?php echo SAVE_CHANGES;?>" class="btn-event2" >
                </div>
                 </form>
                </div>
                    
                 </div>
                 
             </div>
                
                <!-- RIGHT CONTENT -->
                  <?php $this->load->view('default/common/event_dashboard_sidebar',$data1);?>
                   </div> 
                   <div class="row">
                    <div class="col-lg-12">
                      <div class="row">    
                                
                    <div class="event-webpage col-sm-12 mt">
                        <div class="red-event width100 "><h4><?php echo PREVIEW; ?></h4></div>
                        <div class="clear"></div>
                    </div><!-- End event-webpage -->
                    <div class="col-sm-12">
                    <div class="event-detail clearfix">
                    <div class="preview-here">
                     <?php $this->load->view('default/event/event_view',$event_view_data); ?>
                     </div>
                    
                    
                    </div> <!-- event detail closes -->
                                    
                    </div>
                        
                     </div>
                    </div>
                 </div>
                
            </div><!-- End container -->
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