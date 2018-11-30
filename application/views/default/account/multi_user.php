<style>
  .all_event li {
    float: left;
  }
  .all_event li a:hover{
    background: transparent !important;
  }
  .successbox{
  color: #a94442;
}
.add-new ul{
    padding-left: 0px;
  }
</style>

<script type="text/javascript">
    function show(offset)
    {
        var getStatusUrl= '<?php echo site_url()."/account/multi_user_pagi";?>/'+offset;

        $.ajax({
            url: getStatusUrl,
            dataType: 'text',
            type: 'POST',
            timeout: 99999,
            global: false,
            data: '[]',
            
            success: function(data)
            { 
                $('.replace').html(data);
            },      
            error: function(XMLHttpRequest, textStatus, errorThrown)
            {
            
            }
        });
    }
</script>

<script>

$(document).ready(function() {
    $('#form').submit(function() {
      
      var chekboxinfo = $("#chekboxinfo");
      var chekboxinfo1 = $("#chekboxinfo1");
      var chekboxinfo2 = $("#chekboxinfo2");
      
      chekboxinfo.text("");
      chekboxinfo1.text("");
      chekboxinfo2.text("");
      
      var selected_events = $("#selected_events");
      var selected_action = $("#selected_action");
      var selected_email = $("#selected_email");
      
      var chkl=1;
      var create_eventl=1;
      var order_confirml=1;
    
      if(selected_events.is(':checked'))
      {
        
         chkl = $("input[name='chk[]']:checked").length;
         if(!chkl){
          chekboxinfo.text("<?php echo PLEASE_SELECT_ATLEAST_ONE_RECORD;?>");
         }
        
        } 
        
        if(selected_action.is(':checked')){
        
         create_eventl = $("input[name='create_event[]']:checked").length;
         if(!create_eventl){
          chekboxinfo1.text("<?php echo PLEASE_SELECT_ATLEAST_ONE_ACTION;?>");
         }
        
        } 
        
        if(selected_email.is(':checked')){
        
         order_confirml = $("input[name='order_confirm[]']:checked").length;
         if(!order_confirml){
          chekboxinfo2.text("<?php echo PLEASE_SELECT_ATLEAST_ONE_RECORD;?>");
         }
        }
        
        if(chkl>0 && create_eventl>0 && order_confirml>0){
          
          return true;
        }
        else{
          return false;
        } 
    });
});
</script>
<section class="eventDash-head">
    <div class="container">
      <div class="row">              
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 test-contct test-cntr">
                <h1><?php echo MY_ACCOUNT; ?></h1>
          </div>
         
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right pt mt10 con-cntr">
        
            <div class="halfacc">
             <p><?php echo SecureShowData($site_setting['site_name']); ?> <?php echo ACCOUNT_SINCE; ?> <span><?php echo datetimeformat($user_data['created_at']);?> <?php echo timeFormat($user_data['created_at']); ?></span></p>
            <?php 
            if($user_data['ref_id']){
              $admin=getRecordById('users','id',$user_data['ref_id']);

              ?><p><?php echo THE_MAIN_ACCOUNT_HOLDER_IS;?> <span><?php echo SecureShowData($admin['email']);?></span></p>
            <?php } ?>
            </div>
          </div>
        
      </div>
    </div>
  </section>
<section>  
            <div class="container marTB50">              

          <?php  if($error!= '') { ?>          
              <div class="alert alert-danger" role="alert">
                <button class="close" data-dismiss="alert">x</button>
                <strong></strong> <?php echo $error;?>
              </div> 
          <?php } ?>  
          <?php if($success_msg){ ?>
                <div class="alert alert-success mar10"><?php echo $success_msg; ?></div>
          <?php }?>
          <?php if($error_msg){ ?>
                <div class="alert alert-danger mar10"><?php echo $error_msg; ?></div>
          <?php }?>
              
                <div class="row">
                  <div class=" col-lg-8 col-md-8 col-sm-12 col-xs-12">                          
                <div class="row">    
                            
                <div class="event-webpage col-xs-12 col-sm-12">
                  <div class="red-event width100 "><h4><?php echo EMAIL_ADDRESS_WITH_ACCESS_TO_THIS_ACCOUNT; ?></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                
                  <div class="admin">    
                    </div>
      
                <div class="col-sm-12 clearfix">
                    <div class="event-detail event-detail2 pd15 replace">
                    
                    <p class="p0"><?php echo $email; ?> <?php echo ADMINISTRATOR;?></p>
                    
                      <table class="table table_res cancel-info contct-table">
                          <thead>
                              <tr>
                                  <th><?php echo EMAIL; ?></th>
                                    <th><?php echo ACTION; ?></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                             <?php if($user_email)
                                    {
                                        foreach($user_email as $reff_email)
                                        {
                                            $id = $reff_email['id'];
                                            $email = $reff_email['email'];
                                            $permission_email = $reff_email['permission_email'];
                                ?>
                              <tr>                                                                
                                  <td>
                                  <?php 
                                  if($email=='')
                                  {
                                    echo SecureShowData($permission_email);
                                  }else{
                                    echo SecureShowData($email);
                                  } ?>
                                  </td>
                                    <td>
                                    <div class="add-new ">
                                    <ul>
                                    <li><a href="<?php echo site_url('account/multi_user/1/'.$id);?>" id="edit_multi"><?php echo EDIT;?></a></li>
                                    <li><a href="<?php echo site_url('account/delete_multiuser/'.$id);?>" onclick="if(confirm('<?php echo ARE_YOU_SURE_DELETE_RECORD;?>')){return true;}else{return false;}">| <?php echo DELETE;?></a></li>
                                  </ul>
                              </div>
                              </td> 
                                </tr> 
                             <?php
                        }
                    }
                ?>          
                            </tbody>
                              
                        </table>
                        <div class="text-right">
                            <div class="pagi_block pagi_marB0">
                            <?php echo $page_link; ?>
                            </div>
                                <div class="clear"></div>
                        </div>                                           
                   </div><!-- end event-detail -->
               </div>      
                
              </div><!-- End Row-->                  
               <div class="text-right">
                        <?php 
                        if($p_id){ ?>
                            <a href="<?php echo site_url('account/multi_user');?>" class="btn-event2"><?php echo ADD_EMAIL; ?></a>
                        <?php }else{ ?>
                            <a href="javascript:hideshow(document.getElementById('adiv'))" class="btn-event2"><?php echo ADD_EMAIL; ?></a>
                        <?php } ?>
               </div>        
                
                <div id="adiv" class="pt" style="display:none">
                            
                <div class="event-webpage">
                  <div class="red-event width100 "><h4><?php if($p_id) { ?>Edit permissions for <?php echo $permission_email_edit; ?> <?php }else{ ?>Add new email address with access to this account <?php } ?></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                
                  
      <form class="event-title" method="post" action="<?php echo site_url('account/multi_user/1/'.$p_id);?>" id="form">
                <div class=" clearfix">
                    <div class="event-detail event-detail2 pb">                                        
                      <p class="pt10"><?php echo ACCESS_YOUR_ACCOUNT_PASSWORD;?></p>
                      <?php 
                      if($p_id){ ?>
                        <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo EMAIL; ?><span>*</span></label>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                <input type="text" value="<?php echo SecureShowData($permission_email_edit); ?>" disabled>
                              </div>
                        </div>
                  <?php }else{?>
                        <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo EMAIL; ?></label>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                <input type="text" placeholder="Enter your email" id="permission_email" name="permission_email" value="<?php echo SecureShowData($permission_email_new);?>">
                              </div>
                        </div>
                  <?php } ?>
                   <?php 
                         if($event_data!='all')
                         {  
                            $event_explode = explode(',',$event_data);
                         }
                         else
                         {
                          $event_explode=array();
                         }
                         
                         ?>   
                          <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo GRANT_USER_ACCESS; ?></label>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                
                                <div class="radio">
                                      <label>
                                        <input type="radio" name="all_event" value="all" id="all_event" checked="checked">
                                       <?php echo ALL_EVENTS;?>
                                      </label>
                                    </div>
                                    <?php
                                    if($event_title){ ?>
                                     <div class="radio">
                                      <label>
                                        <input type="radio" name="all_event" value="selected_events" id="selected_events" <?php if($event_data!='all') { echo "checked"; } ?> >
                                        <?php echo SELECTED_EVENTS_ONLY;?>
                                      </label>
                                    </div>
                                    <?php    
                                    }
                                    ?>                                                                        
                                    <div id="show_event" style="display:none;">
                                      <div id="chekboxinfo" class="successbox"></div>
                                      <?php if($event_title){ ?><ul class="all_event nav">
                                        <li><a id="selectall" href="javascript://"><?php echo SELECT_ALL_EVENTS; ?> </a></li>
                                        <li><a id="deselectall" href="javascript://"><?php echo DESELECT_ALL_EVENTS;?></a></li>
                                      </ul>
                                        <?php    
                                    }
                                    ?>
                                      
                                    <?php foreach($event_title as $event) 
                                          {
                                            $event_title1 = $event['event_title'];
                                            $event_id = $event['id'];
                                      ?>
                                      <div class="checkbox"  style="margin-left:20px;">
                                          <label>
                                            <input type="checkbox" value="<?php echo $event_id; ?>" name="chk[]" class="checkbox1" <?php if($event_data!='all' && in_array($event_id,$event_explode)) { ?> checked="checked" <?php }?> >
                                            <?php echo SecureShowData($event_title1); ?>
                                          </label>
                                      </div>
                                    <?php } ?>
                                    </div>
                                
                              </div>
                          </div>   
                            
                            <?php 
                            if($event_action!='all')
                            {                              
                                $event_action_ex = explode(',',$event_action);                                    
                            }else{
                                $event_action_ex=array();
                            }?>
                            <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo ACTION_USER_PERFORM;?></label>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                
                                <div class="radio">
                                      <label>
                                        <input type="radio" name="all_action" id="all_action" value="all" checked="checked">
                                         <?php echo ALL_ACTIONS;?>
                                      </label>
                                    </div>
                                    
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="all_action" id="selected_action" value="selected_action" <?php if($event_action!='all') { echo "checked"; } ?>>
                                         <?php echo SELECTED_ACTIONS?>
                                      </label>
                                    </div>
                                  
                                    <!-- actions-->
                                    <div id="show_action" style="display:none;">
                                      <div id="chekboxinfo1" class="successbox"></div>
                                      <ul class="all_event nav">
                                        <li><a id="action_selectall" href="javascript://"><?php echo SELECT_ALL_ACTION;?></a></li>
                                        <li><a id="action_deselectall" href="javascript://"><?php echo DESELECT_ALLL_ACTION; ?>s</a></li>
                                      </ul>
                                     <div class="checkbox" style="margin-left:20px;">
                                          <label>
                                            <input type="checkbox" name="create_event[]" id="optionsRadios2" value="create_event" <?php  if($event_action!='all' && in_array('create_event',$event_action_ex)) { ?> checked="checked" <?php } ?> class="checkbox2">
                                            <?php echo CREATE_NEW_EVENTS;?>
                                          </label>
                                     </div>
                                     
                                     <div class="checkbox" style="margin-left:20px;">
                                          <label>
                                            <input type="checkbox" name="create_event[]" id="optionsRadios2" value="edit_event" class="checkbox2 checkbox3" <?php  if($event_action!='all' && in_array('edit_event',$event_action_ex)) { ?> checked="checked" <?php } ?>>
                                            <?php echo  EDIT_EVENT_NOT_INCLUDING_PAYMENT_OPTIONS;?> 
                                          </label>
                                     </div>
                                     
                                      <div class="checkbox" style="margin-left:40px;">
                                          <label>
                                            <input type="checkbox" name="create_event[]" id="optionsRadios" value="edit_ticket" class="checkbox2 child_checked" <?php  if($event_action!='all' && in_array('edit_ticket',$event_action_ex)) { ?> checked="checked" <?php } ?>>
                                           <?php echo EDIT_TICKET_TYPES; ?> 
                                          </label>
                                        </div>
                                        
                                        <div class="checkbox" style="margin-left:40px;">
                                          <label>
                                            <input type="checkbox" name="create_event[]" id="optionsRadios" value="order_customize" class="checkbox2 child_checked" <?php  if($event_action!='all' && in_array('order_customize',$event_action_ex)) { ?> checked="checked" <?php } ?>>
                                             <?php echo CUSTOMIZE_REGISTRATION_PAGE;?>
                                          </label>
                                        </div>
                                        
                                       
                                      <div class="checkbox" style="margin-left:20px;">
                                          <label>
                                            <input type="checkbox" name="create_event[]" id="optionsRadios2" value="orders" class="checkbox2 checkbox4" <?php  if($event_action!='all' && in_array('orders',$event_action_ex)) { ?> checked="checked" <?php } ?>>
                                             <?php echo VIEW_ORDER_ATTENDEE_REPORTS; ?>
                                          </label>
                                      </div>
                                      
                                          <div class="checkbox" style="margin-left:40px;">
                                              <label>
                                                <input type="checkbox" name="create_event[]" id="optionsRadios2" value="manage_orders" class="checkbox2 oreder_check" <?php  if($event_action!='all' && in_array('manage_orders',$event_action_ex)) { ?> checked="checked" <?php } ?>>
                                                 <?php echo MANAGE_ORDERS_AND_ATTENDEES; ?>
                                              </label>
                                          </div>
                                     
                                      <div class="checkbox" style="margin-left:20px;">
                                          <label>
                                            <input type="checkbox" name="create_event[]" id="optionsRadios2" value="promotional_codes" class="checkbox2" <?php  if($event_action!='all' && in_array('promotional_codes',$event_action_ex)) { ?> checked="checked" <?php } ?>>
                                             <?php echo MANAGE_DISCOUNT_CODES;?>
                                          </label>
                                      </div> 
                                      
                                      <div class="checkbox" style="margin-left:20px;">
                                          <label>
                                            <input type="checkbox" name="create_event[]" id="optionsRadios2" value="all_affiliate" class="checkbox2" <?php  if($event_action!='all' && in_array('all_affiliate',$event_action_ex)) { ?> checked="checked" <?php } ?>>
                                            <?php echo MANAGE_AFFILIATE_LINKS; ?>
                                          </label>
                                      </div>
                                      
                                      <div class="checkbox" style="margin-left:20px;">
                                          <label>
                                            <input type="checkbox" name="create_event[]" id="optionsRadios2" value="index" class="checkbox2" <?php  if($event_action!='all' && in_array('index',$event_action_ex)) { ?> checked="checked" <?php } ?>>
                                            <?php echo SEND_INVITES_MANAGE_CONTACTS_EMAIL_ATTENDEES;?>
                                          </label>
                                      </div>  
                                      
                                      <div class="checkbox" style="margin-left:20px;">
                                          <label>
                                            <input type="checkbox" name="create_event[]" id="optionsRadios2" value="view_fees" class="checkbox2" <?php  if($event_action!='all' && in_array('view_fees',$event_action_ex)) { ?> checked="checked" <?php } ?>>
                                           <?php echo VIEW_FESS_AND_INVOICES; ?>
                                          </label>
                                      </div>
                                      
                                      <div class="checkbox" style="margin-left:20px;">
                                          <label>
                                            <input type="checkbox" name="create_event[]" id="optionsRadios2" value="create_organizer" class="checkbox2" <?php  if($event_action!='all' && in_array('create_organizer',$event_action_ex)) { ?> checked="checked" <?php } ?>>
                                            <?php echo ACCESS_ADD_EDIT_ORGANIZER_PROFILE;?>
                                          </label>
                                      </div> 
                                       <div class="checkbox" style="margin-left:20px;">
                                          <label>
                                            <input type="checkbox" name="create_event[]" id="optionsRadios2" value="all_widget" class="checkbox2" <?php  if($event_action!='all' && in_array('all_widget',$event_action_ex)) { ?> checked="checked" <?php } ?>>
                                            <?php echo ACCESS_EDIT_ALL_WIDGET;?>
                                          </label>
                                      </div> 

                                         <div class="checkbox" style="margin-left:20px;">
                                          <label>
                                            <input type="checkbox" name="create_event[]" id="optionsRadios2" value="edit_payment_account" class="checkbox2" <?php  if($event_action!='all' && in_array('edit_payment_account',$event_action_ex)) { ?> checked="checked" <?php } ?>>
                                            <?php echo EDIT_PAYMENT_OPTIONS; ?>
                                          </label>
                                         </div>
                  
                                    </div>
                                    
                                   <!-- actions-->
                              </div>
                          </div>
                            <?php 
                              if($event_email!='all' && $event_email!='no')
                              {
                                $event_email_ex = explode(',',$event_email);                            
                              }else{
                                $event_email_ex=array();
                              }
                            ?>
                            
                            
                            <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label><?php echo THIS_USER_SHOULD_RECEIVE_COPY;?></label>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                
                                <div class="radio">
                                      <label>
                                        <input type="radio"  name="email" id="all_email" value="all" checked="checked">
                                       <?php echo ALL_EMAILS; ?>
                                      </label>
                                    </div>
                                    
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="email" id="selected_email" value="selected_email" <?php if($event_email!='all' && $event_email!='no') { echo "checked"; } ?>>
                                        <?php echo SELECTED_EMAILS_ONLY; ?>
                                      </label>
                                    </div>
                                        
                                           <div id="show_email" style="display:none;">
                                            <div id="chekboxinfo2" class="successbox"></div>
                                               <div class="checkbox" style="margin-left:20px;">
                                                  <label>
                                                    <input type="checkbox" name="order_confirm[]" id="optionsRadios2" value="order_confirm" <?php  if($event_email!='all' && $event_email!='no' && in_array('order_confirm',$event_email_ex)) { ?> checked="checked" <?php } ?>>
                                                    <?php echo ORDER_CONFIRMATION;?>
                                                  </label>
                                              </div>
                              
                                              <div class="checkbox" style="margin-left:20px;">
                                                  <label>
                                                    <input type="checkbox" name="order_confirm[]" id="optionsRadios2" value="contact_org" <?php  if($event_email!='all' && $event_email!='no' && in_array('contact_org',$event_email_ex)) { ?> checked="checked" <?php } ?>>
                                                   <?php echo CONTACT_ORGANIZER;?>
                                                  </label>
                                              </div>
                                          </div> 
                                    
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="email" id="no_email" value="no" <?php if($event_email=='no') { echo "checked"; } ?>>
                                       <?php echo NO_EMAILS;?>
                                      </label>
                                    </div>                                
                              </div>
                          </div>                                                             
                   </div><!-- end event-detail -->
               </div>   
               
               <div class="text-right">
                    <input type="submit" class="btn-event2" value=" <?php echo SAVE;?>" />
                  </div> 
               </form>         
                  
                </div>
               
           </div><!-- End col-sm-8 -->          
                
                <!-- RIGHT CONTENT -->
                <?php echo $this->load->view('default/common/account_sidebar');?>
             </div> 
            </div><!-- End container -->
    </section>
<script>

$(document).ready(function() {
  
  
  $('#selectall').click(function(event) {  //on click 
    $('.checkbox1').each(function() { //loop through each checkbox      
      this.checked = true;  //select all checkboxes with class "checkbox1"               
    });
  });

  $('#deselectall').click(function(event) {  //on click 
    $('.checkbox1').each(function() { //loop through each checkbox    
      this.checked = false;  //select all checkboxes with class "checkbox1"               
    });
  });

  $('#action_selectall').click(function(event1) {  //on click 
    $('.checkbox2').each(function() { //loop through each checkbox
      this.checked = true;  //select all checkboxes with class "checkbox1"               
    });
  });
     
  $('#action_deselectall').click(function(event) {  //on click 
    $('.checkbox2').each(function() { //loop through each checkbox
      this.checked = false;  //select all checkboxes with class "checkbox1"               
    });
  });
    
  $('.child_checked').click(function(event) {  
    $('.checkbox3').each(function() { 
      this.checked = true;             
    });
  });
    
  $('.checkbox3').click(function() {  
    $('.child_checked').each(function() { 
      this.checked = false;               
    });
  });
    
  $('.oreder_check').click(function(event) {  
    $('.checkbox4').each(function() { 
      this.checked = true;               
    });
  });
    
    
  $('.checkbox4').click(function() {  
    $('.oreder_check').each(function() { 
      this.checked = false;                
    });
  });

});

</script> 
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
    
    <script>
    var errors = "<?php echo $errors;?>";
   
  $(document).ready(function(){
    
    if(errors==1){
      $('#adiv').show();
    }else{
      $('#adiv').hide();
    }
      $("#all_event").click(function(){
      $("#show_event").hide();
      });
      $("#selected_events").click(function(){
      $("#show_event").show();
      
      });
      
      <?php if($event_data!='all'){?>
        $("#show_event").show();
     <?php  }else {?>
      $("#show_event").hide();
     <?php }?>
     
    <?php  if($event_action!='all'){ ?>
      $("#show_action").show();
    
    <?php }else{?>
      $("#show_action").hide();
    <?php } ?>
    
    
    <?php if($event_email!='all' && $event_email!='no'){ ?>
        $("#show_email").show();
      <?php }else{?>
        
        $("#show_email").hide();
    <?php   } ?>
      
      $("#all_action").click(function(){
      $("#show_action").hide();
      });
      $("#selected_action").click(function(){
      $("#show_action").show();
      
      });
      
       $("#all_email").click(function(){
      $("#show_email").hide();
      });
      $("#no_email").click(function(){
      $("#show_email").hide();
      });
      $("#selected_email").click(function(){
      $("#show_email").show();
      
      });
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
   
  </body>
</html>
