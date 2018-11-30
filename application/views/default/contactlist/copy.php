<?php  $session_user = $this->session->userdata('user_id'); ?>


<script type="text/javascript">
  function chk_name_list(){
    
    var name = $('#contact_list_name_copy').val();
    
        $("#namerr1").text('');
        
        if(name==''){
          $('#contact_list_name_copy').focus();
          $("#namerr1").text('<?php echo CONTACT_NAME_IS_REQUIRED; ?>');
          return false;
        }
        
        name = name.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');
        
        var page_path = '<?php echo site_url('contact_list/copy_list/'.$list_id)?>/'+name;
        
        $.ajax({
            type: "POST",
            data: $("#copycontactForm1").serialize(),
            url: page_path,
            success: function(data) {              
              if(data.charAt(0)=='1'){
                  $("#namerr1").removeClass('success');
                  $("#namerr1").addClass('error1');
                  $("#namerr1").text("<?php echo NAME_ALREADY_EXIST;?>");
                  return false;
              }else{                  
                  $("#namerr1").removeClass('error1');
                  $("#namerr1").addClass('success');
                  $("#namerr1").text("<?php echo SUCESSFULLY_ADDED?>");
        <?php $this->session->set_flashdata('clist_data', RECORD_HAS_BEEN_COPIED_SUCCESSFULLY); ?>
          setTimeout(function() {  
            parent.location.reload(true);}, 10);
          }
            }
        });
        return false;
  }
</script>
<style>
.successbox{
  color: #a94442;
} 
</style>

<div class="white-popup-block popup-container">
<div class="popupHead">
  <h1><?php echo COPY_CONTACT_LIST; ?></h1>
</div>

<div id="add_new" class="popup_Content">
              
   <form class="event-title" id="copycontactForm" name="copycontactForm" method="post" action="<?php echo site_url('contact_list/copy_list');?>">
       <div id="namerr1" class="error1 successbox" style="margin-left: 30%; display: block;">  </div>  
            <div class="form-group clearfix">
                 <div class="alert alert-success mar10" style="display:none" ><?php echo COPY_SUCCES_TO_NEW_CONTACT_LIST; ?></div>
              <div class="col-sm-3 col-xs-12 lable-rite">
                    <label><?php echo ENTER_NAME; ?> :</label>
                </div>
             <div class="col-sm-8 col-xs-12">
                     <input type="text" placeholder="Enter your name" name="contact_list_name_copy" id="contact_list_name_copy" value="" class="">
                </div>
          </div>              
          
            <div class="form-group clearfix">
              <input type="hidden" name="list_id" id="list_id" value="<?php echo $list_id; ?>"/>
              <input type="hidden" name="user_id" id="contact_list_user_id" value="<?php echo $session_user; ?>"/>
              <div class="col-sm-8 col-sm-offset-3 col-xs-12">                
                  <input type="submit" value="SAVE"  class="btn-event2" onclick='return chk_name_list();' />
                  <a class="btn-eventgrey btn-closeP marL10" href="javascript:"><?php echo Cancel;?></a>                    
              </div>
            </div>  
        <div class="clear"></div>
    </form>
   </div>
  </div>