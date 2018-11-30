<style>
.remove-btn-clr{
color:#e0336b
}
.remove-btn-clr:hover{
color:#4c4c4c;
}
</style>
<script>
	function remove_div(a){
      if($('.remove-btn').length!=1){
          $(a).parent().parent().parent().remove();
      }
	}
	$(document).ready(function(){            	
                
		$('#chk_choice').hide();
		$('#chk_radio_drop').hide();
		$('#value').hide();
                
               
		var value = $('#question_type').val();
                if(value=='text'){
				$('#chk_choice').hide();
				$('#chk_radio_drop').hide();	
				$('#value').hide();
                                 $('#not_waiver').show();
			}else if(value=='para'){
				$('#chk_choice').hide();
				$('#chk_radio_drop').hide();
				$('#value').hide();
                                 $('#not_waiver').show();
			}else if(value=='check'){
				$('#chk_choice').show();
				$('#chk_radio_drop').show();
				$('#value').hide();
                                 $('#not_waiver').show();
				
			}else if(value=='radio'){
				$('#chk_choice').show();
				$('#chk_radio_drop').show();
				$('#value').hide();
                                 $('#not_waiver').show();
			}else if(value=='select'){
				$('#chk_choice').show();
				$('#chk_radio_drop').show();
				$('#value').hide();
                                 $('#not_waiver').show();
			}else if(value=='waiver'){
				$('#chk_choice').hide();
				$('#chk_radio_drop').hide();
				
				$('#value').show();
                                 $('#not_waiver').hide();
			}
				
		$('#question_type').change(function(){
			var value = $('#question_type').val();
		
			if(value=='text'){
				$('#chk_choice').hide();
				$('#chk_radio_drop').hide();	
				$('#value').hide();
                                 $('#not_waiver').show();
			}else if(value=='para'){
				$('#chk_choice').hide();
				$('#chk_radio_drop').hide();
				$('#value').hide();
                                 $('#not_waiver').show();
			}else if(value=='check'){
				$('#chk_choice').show();
				$('#chk_radio_drop').show();
				$('#value').hide();
                                 $('#not_waiver').show();
				
			}else if(value=='radio'){
				$('#chk_choice').show();
				$('#chk_radio_drop').show();
				$('#value').hide();
                                 $('#not_waiver').show();
			}else if(value=='select'){
				$('#chk_choice').show();
				$('#chk_radio_drop').show();
				$('#value').hide();
                                 $('#not_waiver').show();
			}else if(value=='waiver'){
				$('#chk_choice').hide();
				$('#chk_radio_drop').hide();
				
				$('#value').show();
                                 $('#not_waiver').hide();
			}

		});
		
		
		$('#add_option').click(function(){
                    
			
      var html = $('#single_option').children(":first").clone();
      
			html.children().children().val('');
            $('#single_option').append(html);
			
		});
		
	});
</script>
<section>  
<?php

$data1['events_id'] = $id;

if($question_data){
    $que_type = $question_data[0]['que_type'];
    $que = $question_data[0]['que'];
    $show_attendee = $question_data[0]['show_attendee'];
}else{
    $que_type = '';
    $que = '';
    $show_attendee = '';
}
if($que_type=='waiver'){
	$show_val='waiver';
}else if($que_type=='check' || $que_type=='radio' || $que_type=='select'){
	$show_val='not_waiver';
}else{
	$show_val='';
}
?>

            <div class="container">
              <div class="pt">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 test-contct">
                   <h1><?php echo $event['event_title'];?></h1>
            	</div>
                
              </div><!-- End pt -->
                
                <div class="clearfix"></div>
                <?php
                	if($error){ ?>
						<div class="alert alert-danger"><?php echo $error; ?></div> 
				<?php	}
					if($success){?>
						<div class="alert alert-success"><?php echo $success; ?></div> 
				  <?php
					}
				?>
                
                <div class="festival pb"></div>
                
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 p0-xs2  pt15 ">
                <div class="row">    
                    <form class="event-title event-title2" name="que_form" method="post" id="que_form" action="<?php echo site_url('event/question/'.$id.'/'.$question_id);?>">
                        	        
                <div class="event-webpage col-xs-12 col-sm-12">
                	<div class="red-event width100 "><h4><?php echo CREATE_NEW_QUESTION; ?></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                
			
                <div class="col-sm-12 col-xs-12 clearfix">
                    <div class="event-detail event-detail2 pt10 pb10">
                        
                        
                            <div class="form-group clearfix">
                             <div class="col-sm-4 col-xs-3 width-xs lable-rite">
                               <label><?php echo QUESTION; ?></label>
                             </div>
                             <div class="col-sm-7 col-xs-8 width-xs">
                               <input type="text" name="que" id="que" value="<?php echo $que;?>">
                             </div>
                             </div>
                 
                            	<div class="form-group pt clearfix">
                                 <div class="col-sm-4 col-xs-3 width-xs lable-rite">
                                   <label class="mt0-xs1"><?php echo QUESTION_TYPE;?></label>
                                 </div>
                                 <div class="col-sm-4 col-xs-5 width-xs">
                                  <select class="select-pad" placeholder="11:00 PM" name="question_type" id="question_type">
                                      <option value="para" <?php if($que_type=='para') { echo 'selected=selected'; } ?>><?php echo PARAGRAPH_TEXT; ?></option>
                                    <option value="check" <?php if($que_type=='check') { echo 'selected=selected'; } ?>><?php echo CHECKBOXES; ?></option>
                                    <option value="radio" <?php if($que_type=='radio') { echo 'selected=selected'; } ?>><?php echo RADIO_BUTTONS;?></option>
                                    <option value="select" <?php if($que_type=='select') { echo 'selected=selected'; } ?>><?php echo DROPDOWN; ?></option>
                                    <option value="waiver" <?php if($que_type=='waiver') { echo 'selected=selected'; } ?>><?php echo WAIVER;?></option>
                                  </select>
                                 </div>
                                
                                 </div>
                 
                              	
                                <div class="form-group pt clearfix" id="chk_radio_drop">
                                 <div class="col-sm-4 col-xs-3 width-xs lable-rite">
                                   <label class="mt0-xs1"><?php echo OPTIONS_AVAILABLE; ?></label>
                                 </div>
                                 
                                 <div class="col-sm-8 col-xs-9 width-xs p0">
                                  <div class="col-xs-12 pt10-xs pright0 width-xs">
                                  
                                  	<div id="single_option">
                                           <?php 
                                           if($question_data){
                                               foreach ($question_data as $question){ ?>
                                                   <div class="col-sm-12 col-xs-12 pleft0 pright0 marB5">
                                                    <div class="col-sm-10 col-xs-10 pleft0">
                                                    <input type="text" placeholder="Quantity" name="quantity[]" value="<?php if($show_val=='not_waiver') { echo SecureShowData($question['value']); } ?>">

                                                    </div>
                                                    
                                                    <div>
                                                    
                                                    <label><a class="remove-btn remove-btn-clr" id="removediv" onclick="remove_div(this)" href="javascript://"><i class="glyphicon glyphicon-remove"></i></a></label>
                                                    </div>
                                                    </div>  
                                         <?php }
                                           }else{ ?>
                                                <div class="col-sm-12 col-xs-12 pleft0 pright0" id="first">
                                                <div class="col-sm-4 col-xs-4 pleft0">
                                                <input type="text" placeholder="Quantity" name="quantity[]">

                                                </div>
                                                
                                                <div class="col-sm-4 col-xs-4 ticket-price option-available pl10">
                                                
                                                <label><a class="remove-btn remove-btn-clr" id="removediv" onclick="remove_div(this)" href="javascript://"><i class="glyphicon glyphicon-remove ml10"></i></a></label>
                                                </div>
                                                </div>
                                           <?php } ?>
                                         
                                     	
                                    </div>
                                    
                                      <!-- Add new option -->
                                      <div class="col-sm-12 col-xs-12 reg pt10 pleft0 pright0">
                                      <span><a href="javascript://" id="add_option">+ <?php echo ADD_ANOTHER_OPTION; ?></a></span>
                                      </div>
                                  
                                  </div>
                                  
                                  </div>
                                   <input type="hidden" name="cnt" id="cnt" value="1" />
                                 </div>
                                <div class="form-group pt clearfix">
                                	<div class="col-sm-4 col-xs-3 width-xs lable-rite">
                                   		<label class="mt0-xs1"></label>
                                	 </div>
	                                 <div class="col-sm-4 col-xs-5 width-xs">
	                                  <textarea name="value" id="value"><?php if($show_val=='waiver') { echo $question['value']; } ?> </textarea>
	                                 </div>
                                </div>
                        
                                <div class="form-group pt clearfix" id="not_waiver">
                                 <div class="col-sm-4 col-xs-3 width-xs lable-rite">
                                   <label class="mt0-xs1"><?php echo OPTIONAL_SETTINGS; ?></label>
                                 </div>
                                 <div class="col-sm-8 col-xs-9 width-xs">
                                 
                                    
                                    <div class="checkbox pt10">
                                          <label>
                                            <input type="checkbox" value="1" id="show_attendee" name="show_attendee" <?php if($show_attendee) { echo 'checked'; } ?>>
                                            <?php echo SHOW_THE_ATTENDEE_ANSWER_TO_THIS_QUESTION_ON_THE_ORDER_CONFIRMATION; ?>
                                          </label>
                                    </div>
                                    
                                    
                                  </div>
                                 </div>
                                 
                        
                    </div>
                 </div>
                 
                 <div class="col-sm-12">
                
                <div class="text-right pb">
                    <input type="submit" class="btn-event2" value="<?php echo SAVE;?>" />
                    <a href="<?php echo site_url('event/order_customize/'.$id)?>" class="btn-eventgrey marL10"><?php echo CANCEL;?></a> 
              	</div>
                
                </div>
                </form>
             </div>
             
                             
                 <div class="row">    
                            
                <!-- End event-webpage -->
                
                    
                 </div>
             </div>
                
                <!-- RIGHT CONTENT -->
               <?php $this->load->view('default/common/event_dashboard_sidebar',$data1);?>
             
                
            </div><!-- End container -->
            <div class="pb"></div>
    </section>
    
    <!-- Start footer -->
   
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