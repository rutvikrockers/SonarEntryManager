<?php $session_user = $this->session->userdata('user_id'); ?>

<script type="text/javascript">

	function set_record(id){

		$("#namerr"+id).html('');
        var page_path = '<?php echo site_url('contacts/edit/');?>';

        var first_name = $('#first_name').val();
        var firstnameinfo = $('#firstnameinfo').val();
       
        var last_name = $('#last_name').val();
        var lastnameinfo = $('#lastnameinfo').val();
        var email = $('#email').val();
		var email_reg_exp= /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;

		$('#firstnameinfo').html('');
		$('#lastnameinfo').html('');
		$('#emailinfo').html('');

		if(first_name==''){
			$('#first_name').focus();
			 $('#firstnameinfo').html("<?php echo FIRST_NAME_CONTACT; ?>");
			return false;
		}
		
		if(last_name==''){
			$('#last_name').focus();
			$('#lastnameinfo').html("<?php echo LAST_NAME_CONTACT;?>");
			return false;
		}
				
		if(email==''){
			$('#emailinfo').html('<?php echo ENTER_VALID_EMAIL;?>');
			return false;
		}
		else if(email_reg_exp.test(email)){
				
			 $.ajax({
	            type: "POST",
	            data: {id: id, first_name: first_name, last_name: last_name, email:email}, 
	            url: page_path,
	            success: function(data) {
	               name = first_name+" "+last_name
	               parent.$("#name").html(name);
	               parent.$("#email").html(email);
				   parent.location.reload();
				   parent.jQuery.fancybox.close();
				   return false;
	            }
	        });
		}
		else{
			$('#emailinfo').html('<?php echo NOT_VALID;?>');
			return false;
		}	
}

</script>

<div class="white-popup-block popup-container">
    <div class="popupHead">
		<h1><?php echo EDIT_CONTACT; ?></h1>
	</div>
              
	<div id="namerr" class="error1" style="margin-left: 30%; height: 12px; display: block;">  </div>  
     	 <div class="event-title">
        	  <div class="form-group clearfix">
        	  	<div class="col-sm-3 col-xs-12 lable-rite">
                    <label><?php echo FIRST_NAME; ?></label>
                </div>
		         <div class="col-sm-8 col-xs-12">
                   <input type="text" name="first_name" id="first_name" class="textbox" value="<?php echo  SecureShowData($one_list[0]['first_name']); ?>" />
		            <div id="firstnameinfo" class="error1" style="color:red;"></div> 
                </div>
		      </div>
		      <div class="form-group clearfix">
        	  	<div class="col-sm-3 col-xs-12 lable-rite">
                    <label><?php echo LAST_NAME; ?></label>
               </div>
		         <div class="col-sm-8 col-xs-12">
                   <input type="text" name="last_name" id="last_name" class="textbox" value="<?php echo  SecureShowData($one_list[0]['last_name']); ?>" />
		       <div id="lastnameinfo" class="error1" style="color:red;"></div>      
                </div>
		      </div>
		      <div class="form-group clearfix">
        	  	<div class="col-sm-3 col-xs-12 lable-rite">
                    <label><?php echo EMAIL; ?></label>
                </div>
		         <div class="col-sm-8 col-xs-12">
                   <input type="text" name="email" id="email" class="textbox" value="<?php echo SecureShowData($one_list[0]['email']); ?>" />
		           <div id="emailinfo" class="error1" style="color:red;" ></div>   
                </div>
		      </div>              
          
            <div class="form-group clearfix">
              	<input type="hidden" name="list_id" id="list_id" value=""/>              
				<div class="col-sm-8 col-sm-offset-3 col-xs-12">                    
                   	<input type="button" value="<?php echo SAVE; ?>"  class="btn-event2" onclick="set_record('<?php echo $one_list[0]['id']; ?>');" />                           	                           	                      
					<a class="btn-eventgrey btn-closeP marL10" href="javascript://" onclick="parent.jQuery.fancybox.close();" ><?php echo CANCEL; ?></a>                        
                </div>          	  
          	</div>  
          	
          	</div>
        <div class="clear"></div>    
   </div>