<?php 
$id = $guests['id'];
$first_name = $guests['first_name'];
$last_name = $guests['last_name'];
$email = $guests['email'];

?>

<script type="text/javascript">
var email_reg_exp= /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;	
	function validate_editguestForm(){
		
		var form = $("#editguestForm");	
		
		var email = $("#email");
		var emailInfo = $("#guestemailInfo");
		var first_name = $("#first_name");
		var guestfirstInfo = $("#guestfirstInfo");
		var last_name = $("#last_name");
		var guestlastInfo = $("#guestlastInfo");
		
		//set all errors null 
		
		emailInfo.text("");
		t= true;

	if(first_name.val()=='')
		{
			first_name.focus();
			guestfirstInfo.text("<?php echo FIRST_NAME_REQUIRED; ?>");
			t= false;

		}
		else
		{
			guestfirstInfo.text("");
		}
		if(last_name.val()=='')
		{
			last_name.focus();
			guestlastInfo.text("<?php echo LAST_NAME_REQUIRED; ?>");
			t= false;

		}
		else
		{
			guestlastInfo.text("");
		}
		if(email.val()=='')
		{
			email.focus();
			emailInfo.text("<?php echo EMAIL_REQUIRED; ?>");
			t= false;

		}
		else
		{
			emailInfo.text("");
		}
		
		if(email.val()!=''){
			if(!email_reg_exp.test(email.val())){
				email.focus();	
				emailInfo.text("<?php echo PLEASE_ENTER_VALID_EMAIL_ADDRESS; ?>");
				
				t= false;
			}
		}
		if(!t)
		{
			return t;
		}
			///submit form 
			
			var url = '<?php echo site_url('invites/edit_guests')?>/<?php echo $id ; ?>'; // the script where you handle the form input.

		    $.ajax({
				   type: "POST",
		           url: url,
				   dataType: 'json',
		           data: $("#editguestForm").serialize(), // serializes the form's elements.
		           success: function(data)
		           {
		               // show response from the php script.
					   var obj = data.guests;
					     
		                if(data.msg == 'success'){
		                	var obj = data.guests;
							var firstname = obj["first_name"].replace('\\', '');
							var lastname = obj["last_name"].replace('\\', '');
							 parent.$('#first_name'+obj["id"]).text(firstname);
							// parent.$('#first_name'+obj["id"]).text(obj["first_name"]);
		                	parent.$('#last_name'+obj["id"]).text(lastname);
		                	parent.$('#email'+obj["id"]).text(obj["email"]);
							//parent.jQuery.fancybox.close();
							$('.mfp-close').click();
						 	 
						}else{
							
							email.focus();	
							emailInfo.text(data.msg);
						}
						
		           }
		         }); 
		
		    return false;
		
	
	}

</script>


<!-- Pop up menu -->
	<div class="white-popup-block popup-container">
                        <div class="popupHead">
                         <h1><?php echo EDIT_GUESTS;?></h1>
                        </div>
                 <div id="add_new" class="popup_Content">
  						
                      
                        	<?php if($error){
                		?>	
                			<div class="alert alert-error mar10"><?php echo $error; ?></div>
               			<?php }?>
                       	<form accept-charset="UTF-8" action="<?php echo site_url('invites/edit_guests')?>" id="editguestForm" method="post" name="editguestForm" class="event-title" enctype="multipart/form-data" >
                       		
                           
                                
                      <div class="form-group clearfix">
                         <div class="col-sm-3 col-xs-12 lable-rite">
                           <label><?php echo FIRST_NAME;?></label>
                         </div>
                         <div class="col-sm-7 col-xs-12">
                           <input type="text" name="first_name" value="<?php echo SecureShowData($first_name);?>" id="first_name" class="textbox">    
                           <div id="guestfirstInfo" class="error1" ></div> 
                         </div>
                      </div>
                      
                      <div class="form-group clearfix">
                         <div class="col-sm-3 col-xs-12 lable-rite">
                           <label><?php echo LAST_NAME;?></label>
                         </div>
                         <div class="col-sm-7 col-xs-12">
                           <input type="text" name="last_name" value="<?php echo SecureShowData($last_name);?>" id="last_name" class="textbox">    
                           <div id="guestlastInfo" class="error1" ></div> 
                         </div>
                      </div>
                      
                      <div class="form-group clearfix">
                         <div class="col-sm-3 col-xs-12 lable-rite">
                           <label><?php echo EMAIL;?></label>
                         </div>
                         <div class="col-sm-7 col-xs-12">
                           <input type="text" name="email" value="<?php echo $email ;?>" id="email" class="textbox"> 
                           <div id="guestemailInfo" class="error1" ></div>   
                         </div>
                      </div>
						
                        <input type="hidden" name="id" value="<?php echo $id ;?>" id="id" class="textbox"> 
                        
                           <div class="col-sm-8 col-sm-offset-3 col-xs-12">
                            <input type="submit" value="<?php echo SAVE;?>" class="btn-event2" onclick="return validate_editguestForm();">
                              <input type="button" value="<?php echo CANCEL;?>" class="btn-eventgrey btn-closeP marL10" >
                           </div> 
                     
                                
                    
                       </form>
                        
                        <div class="clearfix"></div>
                    </div>
                        
                    </div>
                <!-- End Pop up menu  -->