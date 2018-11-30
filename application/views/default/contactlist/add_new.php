<script type="text/javascript">
    $(document).ready(function(){
       $('#fetch_type2').on( "click", function(){
            if($('#fetch_type2').is(':checked')){
                $('.alert-danger').hide();
            }
       }); 

       
       $("#contact_list_name").on("keypress", function(e) {
		    if (e.which === 32 && !this.value.length){
		        e.preventDefault();
		    }
	   });
       
    });

    function get_filename(){
		var f = $('#csv_file').val();
		var fn = f.replace("C:\\fakepath\\", "");
		$('#fname').val(fn);
	}

	function nospaces(t){
		if(t.value.match(/\s/g)){ 
			alert('<?php echo SORRY_YOU_ARE_NOT_ALLOWED_ENTER_ANY_SPACES;?>');
			t.value=t.value.replace(/\s/g,'');
		}
	}

	function validate_add_new(){

		var email_reg_exp= /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;

        var form = $("#newcontactForm");	
		
		var contact_list_name = $("#contact_list_name");
		var contactlistnameInfo = $("#contactlistnameInfo");
			
		var upload_datafile = $("#upload_datafile");
		var uploaddatafileInfo = $("#uploaddatafileInfo");
		
		var emails = $("#emails");
		var emailsInfo = $("#emailsInfo");
		
		var fetch_type1 = $("#fetch_type1");
		var fetch_type2 = $("#fetch_type2");
		
		uploaddatafileInfo.text("");
		emailsInfo.text("");
		
		form.submit(function(){
			
			if(contact_list_name.val()==''){		
				 contact_list_name.focus();
				 contactlistnameInfo.text("<?php echo CONTACT_NAME_IS_REQUIRED; ?>");
				 contactlistnameInfo.addClass("error1");
				 return false;
			}
			
			if(fetch_type1.is(':checked') || fetch_type2.is(':checked')) 
			{
				
				if (fetch_type1.is(':checked')) {
					
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
							
							if( t1!='csv')
							{
								upload_datafile.focus();
								uploaddatafileInfo.text("<?php echo INVALID_FILE; ?>");
								uploaddatafileInfo.addClass("error1");
								
								return false;
							}						
					}	
				}
				
				if (fetch_type2.is(':checked')) {
                    console.log(emails.val());
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
										emailsInfo.text('<?php echo ENTER_VALID_EMAIL; ?> "'+a+'"');
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
			 
			 parent.location.reload();
			 parent.jQuery.fancybox.close();
			 return true;
				
		});
	}
</script>
<script src="<?php echo base_url();?>js/rekha_validation.js"></script>
<style>
.successbox{
	color: #a94442;
}	
</style>
<section class="eventDash-head">
  	<div class="container">
    	<div class="row"> 
        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 test-contct">
               <h1><?php echo CREATE_A_CONTACT_LIST; ?></h1>
            </div>
      </div>
    </div>
  </section>
<section>  

<div class="container marTB50">
<?php 
	if($error!= '')
	{ ?>
		<div class="alert alert-danger" role="alert">
		<button class="close" data-dismiss="alert">x</button>
		<strong><?php echo ERROR; ?>!</strong> <?php echo $error;?>
        </div> 
<?php } ?>  
				
    <div class="row">
    <div class="col-md-4 col-md-offset-4 col-xs-12">
    	<div class="open-air pd15">
        <form accept-charset="UTF-8" action="<?php echo site_url('contact_list/add_new')?>" id="newcontactForm" method="post" name="newcontactForm" class="event-title" enctype="multipart/form-data">
            
            	<div class="form-group clearfix">
                	<label><?php echo NAME; ?></label>
    				<input type="text" name="contact_list_name" id="contact_list_name" class="textbox" value="" />
                    <div id="contactlistnameInfo" class="successbox"></div>
                </div>
                <div class="form-group clearfix">
                	<div class="radio">
                      <label class="fl">
                        <input type="radio" name="fetch_type" id="fetch_type1" value="files" checked="checked" onclick="if(this.checked){ $('#files_list').show(); $('#manually_list').hide(); }else{ $('#files_list').hide(); }">
                       	<?php echo UPLOAD_EMAILS_FROM_CSV_FILE; ?>
                      </label>
                       <a class="fr" href="<?php echo site_url("contact_list/export_csv");?>"><?php echo "Demo CSV:"?><img src="<?php echo base_url();?>/images/page-line.png?>" alt="Demo CSV" /></a>
                    </div>
                    <div class="contactUpload clearfix" id="files_list">
                    	<div class="contUpbox">
                    		<input type="text" placeholder="Upload emails from .csv file" class="form-control" id="fname">
                        </div>
                        <div class="upload">
                       		 <a href="javascript://" class="btn btn-event"><?php echo BROWSE; ?></a>
                    		 <input type="file" class="uploads" name="csv_file" id="csv_file" onchange="get_filename();">                                        
                        </div>
                    </div>
                    <div id="uploaddatafileInfo" class="successbox"></div>
                </div>
                <div class="form-group clearfix">
                	<div class="radio">
                      <label>
                        <input type="radio" name="fetch_type" id="fetch_type2" value="manually" onclick="if(this.checked){ $('#manually_list').show();  $('#files_list').hide(); }else{ $('#manually_list').hide(); }">
                      	<?php echo MANUALLY_ENTER_EMAIL_ADDRESS; ?>
                      </label>
                      
                    </div>
                    <div style="display: none;" class="contactUpload" id="manually_list">
                    	  <?php echo ENTER_EMAILS_SEPARATED_BY_COMMAS_OR_LINE_BREAKS; ?>
                    	<textarea name="emails" id="emails" class="TW97p"></textarea>
                        <div id="emailsInfo" class="successbox"></div>
                    </div>
                    
                </div>
             	<div class="form-group">
                    <input type="submit" value="<?php echo SAVE;?>"   class="btn-event2" onclick="return validate_add_new();" />
                    <a class="btn-eventgrey marL10" href="<?php echo site_url('contact_list/')?>" ><?php echo CANCEL; ?></a>                    
	            </div>
        </form>
    	</div><!-- End open-air -->
    </div>    
</div>                
</div><!-- End container -->
</section>
    
    
