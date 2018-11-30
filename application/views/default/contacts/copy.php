<link href="<?php echo base_url();?>css/popup.css" rel="stylesheet" />
<script src="<?php echo base_url();?>js/jquery.magnific-popup.js"></script>
 <script type="text/javascript">
      $(document).ready(function() {
      
    $('.mfPopup').magnificPopup({
          type: 'ajax',
          overflowY: 'scroll' // as we know that popup content is tall we set scroll overflow by default to avoid jump
        });
        $('.mfPopup_add').magnificPopup({
          type: 'ajax',
          overflowY: 'scroll' // as we know that popup content is tall we set scroll overflow by default to avoid jump
        });
    $('.mfPopupIn').magnificPopup({
          type: 'inline',
          overflowY: 'scroll' // as we know that popup content is tall we set scroll overflow by default to avoid jump
        });

      });
    </script>
    
<script type="text/javascript">
  function chk_name_list(){
    
      var fetch_type1 = $('#fetch_type1');
      var fetch_type2 = $('#fetch_type2');
    
      if(fetch_type1.is(':checked')){
    
          var name = $('#contact_list_name_copy').val();
    
          $("#namerr1").text('');
          
          if(name==''){
            $('#contact_list_name_copy').focus();
            $("#namerr1").html('<?php echo CONTACT_NAME_IS_REQUIRED; ?>');
            $("#namerr1").show();
            return false;
          }
          name = name.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');
          var page_path = '<?php echo site_url('contacts/copy/'.$list_id)?>/'+name;
        
        $.ajax({
            type: "POST",
            data: $("#copycontactForm1").serialize(),
            url: page_path,
            dataType: 'json',
            success: function(data) {
              
              if(data.err){

                $("#namerr1").removeClass('success');
                  $("#namerr1").addClass('error1');
                  $("#namerr1").html("<?php echo NAME_ALREADY_EXIST;?>");
                  $("#namerr1").show();
                  return false;
              }
              if(data.success){
                $("#namerr1").removeClass('error1');
                  $("#namerr1").addClass('success');
                  $("#namerr1").html("<?php echo SUCESSFULLY_ADDED;?>");
          <?php $this->session->set_flashdata('clist_data', RECORD_HAS_BEEN_COPIED_SUCCESSFULLY); ?>
            setTimeout(function() {  
              parent.$.magnificPopup.close();  
              parent.location.reload(true);
            }, 10);
              }                          
            }
        });
        return false;
          
  }
      
    else if (fetch_type2.is(':checked')) {

    var select = document.getElementById('list_select').value;
    if(select==""){ alert('Please select at least one list');return false; }
    var name = $('#contact_list_name_copy').val();
       $("#namerr1").text('');

         var page_path = '<?php echo site_url('contacts/copy');?>';
        $.ajax({
            type: "POST",
            data: $("#copycontactForm1").serialize(),
            url: page_path,
            success: function(data) {
              
              if(data.msg=='error'){
                  $("#namerr1").removeClass('success');
                  $("#namerr1").addClass('error1');
                  $("#namerr1").text(data.err);
              }else{
                  
                  $("#namerr1").removeClass('error1');
                  $("#namerr1").addClass('success');
                  $("#namerr1").text(data.suc);

              }
                setTimeout(function() {  
                  parent.$.magnificPopup.close();  
                  parent.location.reload(true);
                }, 10);

            }
        });
        return false;
        
        
        }
        else{
          alert('select 1');          
        }
  
  
}
</script>


<!-- Pop up menu -->
<div class="white-popup-block popup-container">
    <div class="popupHead">
            <h1><?php echo COPY_CONTACTS_TO; ?></h1>
    </div>

    <form accept-charset="UTF-8" action="<?php echo site_url('contacts/copy')?>" id="copycontactForm1" method="post" name="copycontactForm1" class="event-title">                    
        <div class="form-group clearfix">
            <div class="col-sm-8 ">
                <div class="radio">
                <label>
                  <input type="radio" name="fetch_type" id="fetch_type1" value="name" checked="checked" onclick="if(this.checked){ $('#name').show(); $('#pick_list').hide(); }else{ $('#name').hide(); }">                                    
                      <?php echo NEW_NAME_CONTACT; ?>
                  </label>
                  
                  </div>
                      <div id="uploaddatafileInfo" style="margin-left: 30px;" class="successbox"></div>
                  </div>

                  <div class="col-sm-12 col-xs-12 " id="name">                                  
                      <div class="col-sm-8  m10">
                        <input type="text" name="contact_list_name_copy" id="contact_list_name_copy" class="textbox" value="" placeholder="<?php echo NEW_NAME_CONTACT; ?>" />
                      </div>
                  </div>
                              
                  <div class="col-sm-8">
                    <div class="radio">
                      <label>
                        <input type="radio" name="fetch_type" id="fetch_type2" value="pick_list" onclick="if(this.checked){ $('#pick_list').show();  $('#name').hide(); }else{ $('#pick_list').hide(); }">
                        <?php echo PICK_A_LIST; ?>
                      </label>
                    </div>
                  </div>
                              
                  <div class="col-sm-12 col-xs-12 " style="display: none;" id="pick_list">                                
                      <div class="col-sm-8 mb">
                          <select class="select-pad" name="list_select" id="list_select">
                          <option value=""><?php echo SELECT;?></option>
                          <?php 
                            if($all_list){
                                foreach($all_list as $row_list){                                                  
                                  $id = $row_list['id'];
                                  $list_name = $row_list['name'];
                                  if($list_id != $id)
                                  {
                                    echo '<option value="'.$id.'">'.$list_name.'</option>';
                                  }
                                }
                            } ?>
                          </select>
                      </div>
                  </div>
                         
                  <div class="form-group clearfix pt">
                      <input type="hidden" name="copy_list" id="copy_list" value="<?php echo $copy_list ?>"/>
                      <div class="col-sm-8 col-xs-12">          
                          <input type="button" value="<?php echo SAVE;?>"  class="btn-event2" onclick="return chk_name_list();" />                        
                          <a class="btn-eventgrey btn-closeP marL10" href="javascript:"><?php echo CANCEL; ?></a>                   
                      </div>            
                  </div>                              
        </form>                        
    <div class="clearfix"></div>
</div>
                       
                <!-- End Pop up menu  -->