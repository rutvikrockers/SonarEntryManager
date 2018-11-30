<script type="text/javascript">
	function validate_add_new(){
		var email_reg_exp= /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
        var form = $("#newcontactForm");			
		var upload_datafile = $("#upload_datafile");
		var uploaddatafileInfo = $("#uploaddatafileInfo");		
		var emails = $("#emails");
		var emailsInfo = $("#emailsInfo");		
		var fetch_type1 = $("#fetch_type1");
		var fetch_type2 = $("#fetch_type2");
		
		uploaddatafileInfo.text("");
		emailsInfo.text("");
		
		
		form.submit(function(){
			
			if(fetch_type1.is(':checked') || fetch_type2.is(':checked')) 
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
							
							if( t1!='csv'){
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
								a = a.trim();
								if(a!=''){
										
									if(!filter.test(a)){
										emails.focus();	
										emailsInfo.text("<?php echo ENTER_VALID_EMAIL; ?>");
										emailsInfo.addClass("error1");
										return false;
									}
								}
				        	}	

				         }
						
					}
				}
					
			}else{
				 
				 emailsInfo.text("<?php echo ENTER_ATLEAST_ONE_RECORD; ?>");
				 emailsInfo.addClass("error1");
				 return false;
			}
			
			upload_datafile.delay(10);
			return true;
			
		});
		
				
	}
	
	function get_filename(){
		var f = $('#upload_datafile').val();
		var fn = f.replace("C:\\fakepath\\", "");
		$('#fname').val(fn);
	}

</script>

<style>

.successbox{
	color: #a94442;
}


</style>
<!-- Pop up menu -->
<div class="white-popup-block popup-container">
                 <div class="popupHead">
  						<h1><?php echo ADD_CONTACTS_FROM; ?></h1>
                 </div>       
                      <?php 
                      	if($error)
							{
								echo $error;	
							}
                      		
                      ?>
                       	<form accept-charset="UTF-8" action="<?php echo site_url('contacts/add_new')?>" id="newcontactForm" method="post" name="newcontactForm" class="event-title" enctype="multipart/form-data">
                       		
                            <div class="form-group clearfix">
                            
                                <div class="col-sm-8 ">
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="fetch_type" id="fetch_type1" value="files" checked="checked" onclick="if(this.checked){ $('#files_list').show(); $('#manually_list').hide(); }else{ $('#files_list').hide(); }">
                                   	<?php echo UPLOAD_EMAILS_FROM_CSV_FILE; ?>
                                  </label>
                                  <?php echo DEMO_CSV;?> <a href="<?php echo site_url("contacts/export_csv");?>"><img src="<?php echo base_url();?>/images/page-line.png?>" alt="demo csv "/></a>
                                </div>
                                <div id="uploaddatafileInfo" style="margin-left: 30px;" class="successbox"></div>
                                </div>
                                
                                
                                
                                <div class="col-sm-12 col-xs-12 " id="files_list">
                                	
                                    <div class="col-sm-8  m10">
                            			<input type="text" placeholder="Upload emails from .csv file" id="fname">	
                            	   </div>
                                
                                  <div class="col-sm-3 col-xs-12 clearfix browse1">
                                	<div class="upload">
                                   		 <a href="javascript://" class="btn btn-event"><?php echo BROWSE; ?></a>
                                		 <input type="file" class=" uploads" name="contact_csv" id="upload_datafile" onchange="get_filename()">
                                    </div>
                                </div>
                                   
                                   
                            	</div>
                                
                               <div class="col-sm-8 mt">
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
                                    <div id="emailsInfo" style="margin-left: 30px;" class="successbox"></div>
                          		</div>
                            
                            <div class="form-group clearfix">
				              <input type="hidden" name="list_id" id="list_id" value="<?php echo $list_id ?>"/>
				              <div class="col-sm-8 col-xs-12" style="margin-left: 15px; margin-top: 10px;">
	                           	<input type="submit" value="<?php echo SAVE;?>"  class="btn-event2" onclick="return validate_add_new();" />				                        
	                           	<a class="btn-eventgrey btn-closeP marL10" href="javascript:"><?php echo CANCEL; ?></a>				                        
				              </div>
				          	  
				          	</div>
                            
                       </form>
                        
                        <div class="clearfix"></div>
                    </div>
                       
                <!-- End Pop up menu  -->