<script type="text/javascript">
	       

			function myfunction(){
				
       parent.$('.mfPopup').magnificPopup({
          type: 'ajax',
          overflowY: 'scroll' // as we know that popup content is tall we set scroll overflow by default to avoid jump
        });
		
          	parent.$('.check_all').change(function (e) {
    	
    	if(	parent.$(".check_all").is(':checked') ){
    	
				 		parent.$('.check').prop('checked', this.checked)
				 	//$('#guest_id').attr( 'checked="checked"');
				 }
				 else
				 {
				 		parent.$('.check').prop('checked', '')
				 	//$('#guest_id').attr( 'checked=""');
				 }
    	
    });

			}
				</script> 
 
<script type="text/javascript">

	
	function validate_add_new(){
		var email_reg_exp= /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
		var form = $("#newguestForm");	
		
			
		var upload_datafile = $("#upload_datafile");
		var uploaddatafileInfo = $("#uploaddatafileInfo");
		
		var emails = $("#emails");
		var emailsInfo = $("#emailsInfo");
		
		var fetch_type1 = $("#fetch_type1");
		var fetch_type2 = $("#fetch_type2");
		
		
		//set all errors null 
		uploaddatafileInfo.text("");
		emailsInfo.text("");
		
		
		//On Submittingd
		form.submit(function(){
			
			if(fetch_type1.is(':checked') || fetch_type2.is(':checked')) //|| fetch_type2.is(':checked') || fetch_type3.is(':checked')
			{
				if (fetch_type1.is(':checked')) {
					chks = upload_datafile;
					if (chks.val()=='')
	                {
	                        upload_datafile.focus();
							uploaddatafileInfo.text("<?php echo PLEASE_UPLOAD_CSV; ?>");
							uploaddatafileInfo.addClass("error1");
							
							return false;
	                }
					else 
					{
							value = chks.val();
							
							t1 = value.substring(value.lastIndexOf('.') + 1,value.length);
							
							if(t1!='csv'){
								upload_datafile.focus();
								uploaddatafileInfo.text("<?php echo INVALID_FILE; ?>");
								uploaddatafileInfo.addClass("error1");
								
								return false;
							}
							
					}	
				}
				
				if (fetch_type2.is(':checked')) {
					if(emails.val()==''){
						 emails.focus();
						 emailsInfo.text("<?php echo ENTER_ATLEAST_ONE_RECORD; ?>");
						 emailsInfo.addClass("error1");
						 return false;
					}else{
						
						var mails = emails.val().split('\n');
						for (var i = 0; i < mails.length; i++)
				        {
				        	var cmmails = mails[i].split(',');
				            for (var j = 0; j < cmmails.length; j++)
				        	{
				        		var a = cmmails[j];
								var filter = email_reg_exp;
								//if it's valid email
								if(a!=''){
										
									if(!filter.test(a)){
										emails.focus();	
										emailsInfo.text("<?php echo PLEASE_ENTER_VALID_EMAIL_ADDRESS; ?>");
										emailsInfo.addClass("error1");
										return false;
									}
								}
				        	}	
				            //alert(mails[i]);
				         }
						
					}
				}
					
			}else{
				 emailsInfo.text("<?php echo SELECT_ATLEST_ONE_RECORD; ?>");
				 emailsInfo.addClass("error1");
				 return false;
			}
			//alert("before ajax");
			//return false;
			// parent.location.reload();
			var url = '<?php echo site_url('invites/add_guests')?>'; // the script where you handle the form input.
			var formData = new FormData($('form#newguestForm')[0]);
			
			 $.ajax({
		           type: "POST",
		           url: url,
				 	dataType: 'json',
		           data: formData,
        		  // async: false,
		           success: function(data)
		           {
		           	//alert(data);
		           	//  $("#show_guest_list_replace").html(data);
		           	// $('#show_guest_list_replace').show();
		           		//alert('data');
		           	
		           	$('#show_guest_list_errInfo').text('');
		               // show response from the php script.
					   //alert(JSON.stringify(data.guests));
					   //alert(data);
					   alert(data.msg);
					  
		                if(data.guests.length > 0){
		                	
		                	var table = '<div class="eventinrcont" style="border: none;"><table class="should_come table table_res invite_edittable tck-type"><thead><tr><th><input type="checkbox" class="check_all" name="select_all" id="select_all" value=""></th><th><?php echo 'Email'; ?></th><th><?php echo 'First Name'; ?></th><th><?php echo 'Last Name'; ?></th><th><?php echo 'Action' ; ?></th></tr></thead>';
				            var obj = data.guests;
				            
			               	for (i=0; i < obj.length; i++) {
							  // or if (Object.prototype.hasOwnProperty.call(obj,prop)) for safety...
							    prop = obj[i]
							    if(prop["first_name"]=='null' || prop["first_name"]=='' || prop["first_name"]==null)
							    {
							    	var first_name = 'N/A';
							    }else{
							    	var first_name = prop["first_name"];
							    }
							    
							    if(prop["last_name"]=='null' || prop["last_name"]=='' || prop["last_name"]==null)
							    {
							    	var last_name = 'N/A';
							    }else{
							    	var last_name = prop["last_name"];
							    }
							    
							    
							    table=table+'<tr><td><input type="checkbox" class="check" name="guest_id" id="guest_id"  value="'+prop["id"]+'" /></td><td id="email'+prop["id"]+'">'+prop["email"]+'</td><td id="first_name'+prop["id"]+'">'+first_name+'</td><td  id="last_name'+prop["id"]+'">'+last_name+'</td><td class="reg"><a href="<?php echo site_url('invites/edit_guests');?>/'+prop["id"]+'" class="mfPopup" ><?php echo 'Edit'; ?></a></td></tr>';
							$("#addguest_error").text("");      
							}
							
							table=table+'</table></div><div class="clr"></div>';
							parent.$('#show_guest_list').html(table);
							//parent.$('#show_guest_list').hide();
							myfunction();
							parent.$('#show_guest_list').show();
							
							parent.$('#remove_contact_option').css('visibility', 'visible');
							var guests_div = parent.$("#addguest_error");
		 					guests_div.text("");
							
							//$(".eventinrcont .rr").colorbox();
							
							
						}else{
							$('#show_guest_list').html('<p><?php NO_RECORDS_AVAILABLE; ?></p>');
							$('#remove_contact_option').hide();
							$('#show_guest_list_errInfo').text('<?php echo EMAIL_IS_ALREADY_EXIST; ?>');
						}
						setTimeout(function() {  
							  $('.mfp-close').click(); //parent.jQuery.fancybox.close(); 
							}, 1000);
		          },
					cache: false,
			        contentType: false,
			        processData: false
		         });
			
			 return false;
				
		});
	}
</script>
<script type="text/javascript">
		function filename(name)
		{

       		document.getElementById('csv_name').value=name.replace("C:\\fakepath\\","");
		}
		</script>
        
		<div class="white-popup-block popup-container">
                        <div class="popupHead">
                          <h1><?php echo ADD_GUESTS; ?></h1>
                        </div>

<form name="csv_form" id="csv_form"	action="<?php echo site_url('invites/csv_upload');  ?>" method="post" enctype="multipart/form-data">
    	<div class="input-item-file" id="edit_csv_file"  style="display:none">
  		</div>
    </form> 

<!-- Pop up menu -->
                 <div id="add_new" class="popup_Content">
  						 
                        <div class="alert alert-success mar10" id="jsonsuccess" style="display:none"></div>
               			 <div class="alert alert-danger mar10" id="jsonerror" style="display:none"></div>
                       	<form accept-charset="UTF-8" action="<?php echo site_url('invites/add_guests')?>" id="newguestForm" method="post" name="newguestForm" class="event-title" enctype="multipart/form-data" >
                       		
                            <div class="form-group clearfix">
                            
                                <div class="col-sm-8 ">
                                <div class="radio">
                                 	
                                  <label>
                                    <input type="radio" name="fetch_type" id="fetch_type1" value="files" checked="checked" onclick="if(this.checked){ $('#files_list').show(); $('#manually_list').hide(); }else{ $('#files_list').hide(); }">
                                   	<?php echo UPLOAD_EMAILS_FROM_CSV_FILE; ?>
                                  </label>
                                  
                                  <?php echo "Demo CSV:"?> <a href="<?php echo site_url("invites/export_csv");?>"><i class="glyphicon glyphicon-list-alt"></i></a>
                                </div>
                                
                                </div>
                                <div class="contactUpload mar0 col-sm-12 " id="files_list">
      <div class="contUpbox">
        <input type="text" disabled name="csv_name" id="csv_name" value="" placeholder="Upload CSV" >	
      </div>
      <div class="upload"> <a href="javascript://" class="btn btn-event browsebtn"><?php echo BROWSE; ?></a>
          <input type="file" name="guest_csv" id="upload_datafile" class="uploads" onchange="return filename(this.value);">
        </div>
    </div>
                                
                                 
                               <div class="col-sm-8">
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="fetch_type" id="fetch_type2" value="manually" onclick="if(this.checked){ $('#manually_list').show();  $('#files_list').hide(); }else{ $('#manually_list').hide(); }">
                                  	<?php echo MANUALLY_ENTER_EMAIL_ADDRESS; ?>
                                  </label>
                                </div>
                                </div>
                              
                                <div class="col-sm-12 col-xs-12 " style="display: none;" id="manually_list">
                                	
                                    <div class="col-sm-8">
                                        <?php echo ENTER_EMAILS_SEPARATED_BY_COMMAS_OR_LINE_BREAKS; ?>
                            		<textarea name="emails" id="emails" class="TW97p"></textarea>
                                    </div>
                                    <div id="emailsInfo" style="margin-left: 30px;"></div>
                          		</div>
                            
                            <div class="form-group clearfix pt">
				              <input type="hidden" name="invite_id" id="invite_id" value="<?php echo $invitation_id; ?>"/>
                              <input type="hidden" name="random_no" id="random_no" value="<?php echo $rand_num; ?>"/>
				              
				          	  
				          	</div>
                            <div class="col-lg-12">
				                           	<input type="submit" value="<?php echo SAVE;?>"  class="btn-event2" onclick="return validate_add_new();" />  
				                           	        	<a class="btn-eventgrey btn-closeP marL10" href="javascript:" >Cancel</a>
				                        
				                   
				                </div>
                            
                            
                       </form>
                        
                        <div class="clearfix"></div>
                    </div>
                        
                    </div>
                <!-- End Pop up menu  -->