<script type="text/javascript">
	function chk_name_list(){
		var select=document.getElementById('list_select').value;
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
              		setTimeout(function() {  parent.location.reload();
							   parent.jQuery.fancybox.close(); }, 10);
              }
            }
        });
        return false;
	}
</script>



	





<!-- Pop up menu -->
<div class="white-popup-block popup-container">
                        <div class="popupHead">
                          <h1>Edit Guests</h1>
                        </div>
                 <div id="add_new" class="popup_Content">
  						
                        
                       	<form accept-charset="UTF-8" action="<?php echo site_url('contacts/copy')?>" id="copycontactForm1" method="post" name="copycontactForm1" class="event-title">
                     
                            <div class="form-group clearfix">
                             
                              <div class="col-sm-3 col-xs-12 lable-rite">
                            		<label><?php echo PICK_A_LIST; ?></label>
                            	</div>
                                <div class="col-sm-8 col-xs-12">
                            	   
                                    <select class="select-pad" name="list_select" id="list_select">
                            			<option value=""><?php echo SELECT;?></option>
                            				
                            			 <?php 
                            			
                                            if($all_list){
                                            	foreach($all_list as $row_list){
                                            			
													$id = $row_list['id'];
													$list_name = $row_list['name'];
													if($list_id != $id){
													echo '<option value="'.$id.'">'.$list_name.'</option>';
													}
                                            	}
                                            }
                                            ?>
                                    </select>
                            	</div>
                            
                       
                            
				              <input type="hidden" name="copy_list" id="copy_list" value="<?php echo $copy_list ?>"/>
				              <div class="col-sm-8 col-sm-offset-3 col-xs-12 mt">
				                           	<input type="submit" value="<?php echo SAVE;?>"  class="btn-event2" onclick="return chk_name_list();" />
				                        	
				                           	<a class="btn-eventgrey btn-closeP marL10" href="javascript:" ><?php echo CANCEL; ?></a>
				                        
				                </div>
				          	
                            
                       </form>
                        
                        <div class="clearfix"></div>
                    </div>
                        </div>
                       </div>
                      </div>
                    </div>
                <!-- End Pop up menu  -->