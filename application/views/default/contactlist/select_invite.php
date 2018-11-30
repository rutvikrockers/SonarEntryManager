<?php 

$session_user = $this->session->userdata('user_id');

?>
<link href="<?php echo base_url();?>css/popup.css" rel="stylesheet" />
<script src="<?php echo base_url();?>js/jquery.magnific-popup.js"></script>
 <script type="text/javascript">
      $(document).ready(function() {
      
    parent.$('.mfPopup').magnificPopup({
          type: 'ajax',
          overflowY: 'scroll' // as we know that popup content is tall we set scroll overflow by default to avoid jump
        });        
      });
    </script>
<script type="text/javascript">

  function validate_select_invite(){
    var id = $('#invitation_id').val();
    parent.$('#select_invitation_id').val(id);
    parent.$('#contactForm').submit();    
    return false;
  }

</script>

<div class="white-popup-block popup-container">
<div class="popupHead">
  <h1><?php echo SELECT_INVITATION; ?></h1>
</div>
<div id="add_new" class="popup_Content">            
<?php if (is_array ( $new_list )){ ?>    
     <div id="namerr1" class="error1">  </div>  
            <div class="form-group event-title clearfix">
              <div class="col-sm-3 col-xs-12 lable-rite">
                    <label><?php echo SELECT_INVITATION; ?>:</label>
                </div>
             <div class="col-sm-8 col-xs-12">
                     <select name="invitation_id" id="invitation_id" class="selectbox">
              <?php foreach($new_list as $row){
                    ?>
                      <option value="<?php echo $row['id'] ?>"><?php echo  SecureShowData($row['subject']); ?></option>
                    <?php
                  }  
                ?>
                
              </select>
                
                </div>
          </div>              
          
            <div class="form-group event-title clearfix">
              <input type="hidden" name="list_id" id="list_id" value=""/>
              
              <div class="col-sm-8 col-sm-offset-3 col-xs-12">                  
                  <input type="button" value="<?php echo SEND;?>"  class="btn-event2" onclick='return validate_select_invite();' />
                  <a class="btn-eventgrey btn-closeP marL10" href="javascript:"><?php  echo CANCEL; ?></a>                            
              </div>
              
            </div>  
        <div class="clear"></div>
  <?php 
    }else{
      echo NO_INVITE_AVAILABLE;
    } ?>        

</div>