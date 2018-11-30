
<link href="<?php echo base_url();?>css/popup.css" rel="stylesheet" />
<script >
  
            $(document).ready(function () {                
                
            
                $('.submit_button').click(function(){

                  var page_path = '<?php echo site_url('event/contact_organizer_ajax/'.$user_id.'/'.$event_id);?>';
                  
                  var name = $("#name").val();
                  var message = $("#message").val();
                  var email = $("#email").val();
                  var subject = $("#subject").val();
                  
                  $.ajax({
                    type: "POST",
                    data: {name: name, message: message, email: email, subject:subject}, 
                    url: page_path,
                    success: function(data) {
                    
                      
                      var data1 = data.split("^");

                      if(data1[1]=='1'){
                        $('.alert-success').html(data1[0]);
                        $('.alert-success').show();
                        setTimeout(function(){$('.alert-success').click()}, 5000);

                        setTimeout(function() {  
                            $('.mfp-close').click(); 
                          }, 1000);

                        
                      }else{
                        $('.alert-danger').html(data1[0]);
                        $('.alert-danger').show();
                        setTimeout(function(){$('.alert-danger').click()}, 5000);
                      }
                    }
                  });                    
                });      
            });

</script>

<!-- Pop up menu -->
                 
<div class="white-popup-block popup-container">
      <div class="popupHead">                           
        <h1><?php echo CONTACT_ORGANIZER; ?></h1>
      </div>     
        
      <div class="alert alert-success message" style="display: none;"></div>                                          
      <div class="alert alert-danger message" style="display: none;"></div>
                     
            <form accept-charset="UTF-8" action="<?php echo site_url('event/contact_organizer/'.$user_id.'/'.$event_id)?>" id="newguestForm" method="post" name="newguestForm" class="event-title" enctype="multipart/form-data" >
                <div class="col-sm-12 clearfix mb">

                         <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo NAME;?></label><span>*</span>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                <input type="text" name="name" id="name">
                              </div>
                        </div>
                        
                        <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo EMAIL;?></label><span>*</span>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                <input type="text" name="email" id="email">
                              </div>
                        </div>

                        <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo SUBJECT;?></label><span>*</span>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                <input type="text" name="subject" id="subject">
                              </div>
                        </div>
                        
                        <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo MESSAGE;?></label><span>*</span>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                <textarea name="message" id="message"></textarea>
                                
                              </div>
                        </div>
                        
                       <div class="col-sm-8 col-sm-offset-3 col-xs-12">
                       
                                <input type="button" value="<?php echo SEND;?>" class="btn-event2 submit_button">
                                <input type="button" value="<?php echo CLOSE;?>" class="btn-eventgrey btn-closeP marL10">
                          
                    </div>
                    
                    
               
                  </div>
                  <div class="clearfix"></div>
                        </form>
                        </div>
                      
                <!-- End Pop up menu  -->